#!/usr/bin/env php
<?php
declare(strict_types=1);

/**
 * translate-docs.php — Translates Chamilo 2.0 documentation Markdown pages using the Grok API.
 *
 * Usage:
 *   php scripts/translate-docs.php [options] [lang1] [lang2] ...
 *
 * Options:
 *   --from TAG    Only translate files changed since TAG (e.g. 2.x-v1).
 *                 Without this, all .md files are translated.
 *   --force       Re-translate files that already exist in the output directory.
 *   --dry-run     Show what would be done without making any API calls.
 *   --test        Translate only the first file per language (for smoke-testing).
 *   --single-file Translate the given file, not all others.
 *                 Use with --force to force the re-translation from scratch.
 *
 * Language codes (same as Chamilo .po convention): fr_FR, es, de, pt_BR, etc.
 * If no language codes are given, the script looks for existing 2.x-?? branches.
 *
 * Output:  translated/<lang_code>/ (mirrors the source tree)
 * Apply:   git checkout 2.x-fr && rsync -av translated/fr_FR/ ./ && git add -A
 *
 * Requires: config.php in the same directory (copy config.dist.php and fill in your key).
 */

if (PHP_SAPI !== 'cli') {
    die('This script can only be executed from the command line.' . PHP_EOL);
}

// ── Config ────────────────────────────────────────────────────────────────────

$configFile = __DIR__ . '/config.php';
if (!is_file($configFile)) {
    exit('No config.php found in scripts/. Copy scripts/config.dist.php to scripts/config.php and fill in your API key.' . PHP_EOL);
}
require_once $configFile;

$apiKey  = $translationAPIKey      ?? '';
$apiUrl  = $translationAPIEndpoint ?? 'https://api.x.ai/v1/chat/completions';
$model   = $translationModel       ?? 'grok-3';

// Target size (bytes) for each API request chunk.
// Pages are split at heading boundaries so no line or section is ever broken.
// Adjacent small sections are greedily batched together up to this limit.
// A single section that already exceeds this size is sent as its own chunk.
const CHUNK_TARGET = 5_000;

// Max attempts per page (or chunk) before giving up and keeping original English.
const MAX_ATTEMPTS = 2;

// ── CLI argument parsing ──────────────────────────────────────────────────────

$args       = array_slice($argv, 1);
$dryRun     = false;
$testMode   = false;
$force      = false;
$fromTag    = null;
$singleFile = null;
$langCodes  = [];

for ($i = 0, $n = count($args); $i < $n; $i++) {
    switch ($args[$i]) {
        case '--dry-run':     $dryRun     = true;                  break;
        case '--test':        $testMode   = true;                  break;
        case '--force':       $force      = true;                  break;
        case '--from':        $fromTag    = $args[++$i] ?? null;   break;
        case '--single-file': $singleFile = $args[++$i] ?? null;   break;
        default:              $langCodes[] = $args[$i];            break;
    }
}

// ── Helpers ───────────────────────────────────────────────────────────────────

function eprintln(string $msg, bool $timestamp = false): void
{
    if ($timestamp) {
        $msg = '[' . date('H:i:s') . '] ' . $msg;
    }
    fwrite(STDERR, $msg . PHP_EOL);
}

function run(string $cmd): array
{
    exec($cmd, $output, $code);
    return ['lines' => $output, 'code' => $code];
}

/**
 * @return array<string> Sorted list of human-readable language names keyed by code.
 */
function getLanguageName(string $code): string
{
    static $map = [
        'ar'    => 'Arabic',
        'bg'    => 'Bulgarian',
        'ca_ES' => 'Catalan',
        'cs_CZ' => 'Czech',
        'da'    => 'Danish',
        'de'    => 'German',
        'el'    => 'Greek',
        'es'    => 'Spanish',
        'es_MX' => 'Spanish (Mexico)',
        'eu_ES' => 'Basque',
        'fa_IR' => 'Persian',
        'fi_FI' => 'Finnish',
        'fr_FR' => 'French',
        'he_IL' => 'Hebrew',
        'hi'    => 'Hindi',
        'hr_HR' => 'Croatian',
        'hu_HU' => 'Hungarian',
        'id_ID' => 'Indonesian',
        'it'    => 'Italian',
        'ja'    => 'Japanese',
        'ko_KR' => 'Korean',
        'lt_LT' => 'Lithuanian',
        'ms_MY' => 'Malay',
        'nl'    => 'Dutch',
        'pl_PL' => 'Polish',
        'pt_BR' => 'Brazilian Portuguese',
        'pt_PT' => 'Portuguese',
        'ro_RO' => 'Romanian',
        'ru_RU' => 'Russian',
        'sk_SK' => 'Slovak',
        'sl_SI' => 'Slovenian',
        'sq'    => 'Albanian',
        'sr_RS' => 'Serbian',
        'sv_SE' => 'Swedish',
        'th'    => 'Thai',
        'tr'    => 'Turkish',
        'uk_UA' => 'Ukrainian',
        'vi_VN' => 'Vietnamese',
        'zh_CN' => 'Simplified Chinese',
        'zh_TW' => 'Traditional Chinese',
    ];
    return $map[$code] ?? $code;
}

/**
 * Infer which guide a file belongs to, for the system prompt context.
 */
function guideContext(string $relPath): array
{
    return match (true) {
        str_starts_with($relPath, 'teacher-guide/') => [
            'type'     => 'Teacher Guide',
            'audience' => 'teachers and course instructors creating courses, adding content, and assessing learners',
        ],
        str_starts_with($relPath, 'admin-guide/') => [
            'type'     => 'Admin Guide',
            'audience' => 'system administrators installing, configuring, and maintaining a Chamilo LMS instance',
        ],
        str_starts_with($relPath, 'developer-guide/') => [
            'type'     => 'Developer Guide',
            'audience' => 'software developers extending Chamilo through plugins, themes, or API integrations',
        ],
        default => [
            'type'     => 'Documentation',
            'audience' => 'Chamilo LMS users',
        ],
    };
}

/**
 * Split Markdown content into chunks that target CHUNK_TARGET bytes each,
 * without ever breaking a line or a heading section.
 *
 * Strategy:
 * 1. Split the content at every heading boundary (any level, H1–H6) using a
 *    lookahead so each section starts with its own heading.
 * 2. Greedily accumulate adjacent sections into a chunk until adding the next
 *    section would exceed the target. Then flush and start a new chunk.
 * 3. A single section that already exceeds the target is emitted as-is — we
 *    never break within a section, as the user requires.
 */
function splitIntoChunks(string $content, int $target = CHUNK_TARGET): array
{
    // Any heading at the start of a line starts a new section (lookahead keeps it)
    $sections = preg_split('/(?=^#{1,6} )/m', $content) ?: [$content];
    $sections = array_values(array_filter($sections, fn($s) => trim($s) !== ''));

    if (empty($sections)) {
        return [$content];
    }

    $chunks  = [];
    $current = '';

    foreach ($sections as $section) {
        if ($current === '') {
            $current = $section;
        } elseif (strlen($current) + strlen($section) <= $target) {
            $current .= $section;
        } else {
            $chunks[] = $current;
            $current  = $section;
        }
    }

    if ($current !== '') {
        $chunks[] = $current;
    }

    return $chunks;
}

/**
 * Verify that the translated Markdown preserves structural integrity.
 * Returns a list of warning strings (empty = all good).
 */
function checkIntegrity(string $source, string $translation): array
{
    $warnings = [];

    // Heading counts by level
    preg_match_all('/^(#{1,6})\s/m', $source,      $srcH);
    preg_match_all('/^(#{1,6})\s/m', $translation, $trnH);
    $srcCount = count($srcH[0]);
    $trnCount = count($trnH[0]);
    if ($srcCount !== $trnCount) {
        $warnings[] = "Heading count mismatch: source {$srcCount}, translation {$trnCount}";
    }

    // Code fence count (must stay even — each ``` opens or closes a block)
    preg_match_all('/^```/m', $source,      $srcCB);
    preg_match_all('/^```/m', $translation, $trnCB);
    $srcCbCount = count($srcCB[0]);
    $trnCbCount = count($trnCB[0]);
    if ($srcCbCount !== $trnCbCount) {
        $warnings[] = "Code fence count mismatch: source {$srcCbCount}, translation {$trnCbCount}";
    }

    // Image references
    preg_match_all('/!\[/', $source,      $srcImg);
    preg_match_all('/!\[/', $translation, $trnImg);
    $srcImgCount = count($srcImg[0]);
    $trnImgCount = count($trnImg[0]);
    if ($srcImgCount !== $trnImgCount) {
        $warnings[] = "Image reference count mismatch: source {$srcImgCount}, translation {$trnImgCount}";
    }

    // Check that image paths were not altered (extract paths and compare)
    preg_match_all('/!\[[^\]]*\]\(([^)]+)\)/', $source,      $srcPaths, PREG_SET_ORDER);
    preg_match_all('/!\[[^\]]*\]\(([^)]+)\)/', $translation, $trnPaths, PREG_SET_ORDER);
    $srcPathList = array_column($srcPaths, 1);
    $trnPathList = array_column($trnPaths, 1);
    sort($srcPathList);
    sort($trnPathList);
    if ($srcPathList !== $trnPathList) {
        $warnings[] = 'One or more image paths were altered by the translation';
    }

    return $warnings;
}

/**
 * Call the Grok API to translate one chunk of Markdown.
 * Returns the translated text, or throws on unrecoverable error.
 */
function callGrokTranslateChunk(
    string $apiUrl,
    string $apiKey,
    string $model,
    string $langCode,
    string $langName,
    string $filename,
    string $guideType,
    string $audience,
    string $markdownChunk
): string {
    $systemPrompt = <<<PROMPT
        You are an expert technical translator for Chamilo LMS (Learning Management System) documentation.
        Chamilo is an open-source e-learning platform used by universities, schools, and organisations worldwide.
        Your task is to produce a professional, publication-quality translation from English into {$langName}.

        == ABSOLUTE RULES ==

        1. OUTPUT FORMAT
           Return ONLY the translated Markdown. Nothing else — no explanations, no surrounding
           code fences, no "Here is the translation:" preamble or postamble.
           Your response must begin with the very first character of the translated document.

        2. MARKDOWN STRUCTURE — MUST BE PRESERVED EXACTLY
           - Every heading (#, ##, ###, ####, #####) must appear with the IDENTICAL level.
             Never add, remove, promote, or demote any heading.
           - Bullet lists (- or *), numbered lists (1.), tables, blockquotes (>), and
             horizontal rules (---) must be kept exactly as structured.
           - Blank lines between elements must be preserved — do NOT collapse them.
           - Do NOT merge paragraphs, split paragraphs, or reorder content.

        3. CODE — NEVER TRANSLATE
           - Content inside code blocks (``` ... ```) must be copied byte-for-byte.
           - Inline code (`like this`) must be copied byte-for-byte.
           - Never translate: command names, file paths, config keys, PHP/JS/SQL/YAML/JSON
             code, environment variables, API endpoints, shell commands.

        4. LINKS AND IMAGES
           - Markdown links [visible text](url): translate the visible text; keep the URL unchanged.
           - Images ![alt text](path): translate alt text if it is meaningful English prose;
             keep the image path completely unchanged.

        5. PROPER NOUNS — DO NOT TRANSLATE
           Keep in English: Chamilo, GitBook, OnlyOffice, Keycloak, Azure, AWS S3, Google Cloud,
           Symfony, Vue, PrimeVue, Tailwind, Moodle, SCORM, xAPI, LTI, LDAP, CAS, OAuth, JWT,
           SCIM, OpenAI, Gemini, Grok, Mistral, DeepSeek, PHP, CSS, HTML, SQL, REST, API, JSON,
           YAML, Markdown, GitHub, Docker, Composer, npm.

        6. TERMINOLOGY CONSISTENCY
           Use the same translation for the same English term every time it appears.
           Prefer formal, academic register appropriate for institutional software manuals.
           If an English term has no established equivalent in {$langName}, keep the English
           term on first use and optionally add a parenthetical translation.

        == CONTEXT ==
        Guide:    {$guideType}
        Audience: {$audience}
        File:     {$filename}
        PROMPT;

    // Remove leading indentation from the heredoc
    $systemPrompt = preg_replace('/^        /m', '', $systemPrompt);

    $userPrompt = "Translate the following Markdown page excerpt from English into {$langName}.\n\n"
        . "---\n"
        . $markdownChunk;

    $payload = [
        'model'       => $model,
        'messages'    => [
            ['role' => 'system', 'content' => $systemPrompt],
            ['role' => 'user',   'content' => $userPrompt],
        ],
        'temperature' => 0.1, // Low: we want consistent, literal translation
    ];

    $ch = curl_init($apiUrl);
    if ($ch === false) {
        throw new RuntimeException('Failed to initialise cURL.');
    }

    curl_setopt_array($ch, [
        CURLOPT_POST           => true,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_HTTPHEADER     => [
            'Content-Type: application/json',
            'Accept: application/json',
            'Authorization: Bearer ' . $apiKey,
        ],
        CURLOPT_POSTFIELDS => json_encode($payload, JSON_UNESCAPED_UNICODE),
        CURLOPT_TIMEOUT    => 120,
    ]);

    $body = curl_exec($ch);

    if ($body === false) {
        $err   = curl_error($ch);
        $errno = curl_errno($ch);
        curl_close($ch);
        throw new RuntimeException("cURL error ({$errno}): {$err}");
    }

    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    if ($httpCode < 200 || $httpCode >= 300) {
        throw new RuntimeException("Grok API HTTP {$httpCode}: " . mb_substr($body, 0, 300));
    }

    $data = json_decode($body, true);
    if (json_last_error() !== JSON_ERROR_NONE) {
        throw new RuntimeException('Invalid JSON in API response: ' . json_last_error_msg());
    }

    if (!isset($data['choices'][0]['message']['content'])) {
        throw new RuntimeException('Unexpected API response structure (missing choices/content).');
    }

    $content = trim($data['choices'][0]['message']['content']);

    // Strip accidental wrapper code fences the model sometimes adds
    if (str_starts_with($content, '```') && str_ends_with($content, '```')) {
        $content = preg_replace('/^```[^\n]*\n/s', '', $content);
        $content = preg_replace('/\n```$/s', '', $content);
        $content = trim($content);
    }

    return $content;
}

/**
 * Translate a full Markdown page, chunked to ~CHUNK_TARGET bytes per request.
 *
 * Returns ['text' => string, 'warnings' => string[], 'chunks' => int, 'error' => string|null].
 */
function translatePage(
    string $apiUrl,
    string $apiKey,
    string $model,
    string $langCode,
    string $langName,
    string $relPath,
    string $content
): array {
    ['type' => $guideType, 'audience' => $audience] = guideContext($relPath);
    $filename = basename($relPath);

    $chunks = splitIntoChunks($content);

    $translatedChunks = [];
    $allWarnings      = [];
    $totalChunks      = count($chunks);

    foreach ($chunks as $chunkIndex => $chunk) {
        $chunkLabel = $totalChunks > 1
            ? " (chunk " . ($chunkIndex + 1) . "/{$totalChunks})"
            : '';

        $translated = null;
        $lastError  = null;

        for ($attempt = 1; $attempt <= MAX_ATTEMPTS; $attempt++) {
            try {
                $translated = callGrokTranslateChunk(
                    $apiUrl, $apiKey, $model,
                    $langCode, $langName,
                    $filename . $chunkLabel, $guideType, $audience,
                    $chunk
                );
                break; // success
            } catch (Throwable $e) {
                $lastError = $e->getMessage();
                eprintln("    Attempt {$attempt}/" . MAX_ATTEMPTS . " failed: {$lastError}", true);
                if ($attempt < MAX_ATTEMPTS) {
                    sleep(3);
                }
            }
        }

        if ($translated === null) {
            // All attempts failed: keep original English for this chunk
            return [
                'text'     => null,
                'warnings' => [],
                'chunks'   => $totalChunks,
                'error'    => "All " . MAX_ATTEMPTS . " attempts failed{$chunkLabel}: {$lastError}",
            ];
        }

        // Integrity check per chunk
        $warnings = checkIntegrity($chunk, $translated);
        foreach ($warnings as $w) {
            $allWarnings[] = $totalChunks > 1 ? "{$w}{$chunkLabel}" : $w;
        }

        $translatedChunks[] = $translated;

        // Brief pause between chunks to avoid rate-limiting
        if ($chunkIndex < $totalChunks - 1) {
            sleep(1);
        }
    }

    $fullTranslation = implode("\n\n", $translatedChunks);

    // Additional whole-page integrity check when we split and reassembled
    if ($totalChunks > 1) {
        $wholeWarnings = checkIntegrity($content, $fullTranslation);
        foreach ($wholeWarnings as $w) {
            if (!in_array($w, $allWarnings, true)) {
                $allWarnings[] = "(whole-page) {$w}";
            }
        }
    }

    return [
        'text'     => $fullTranslation,
        'warnings' => $allWarnings,
        'chunks'   => $totalChunks,
        'error'    => null,
    ];
}

// ── Detect languages ──────────────────────────────────────────────────────────

if (empty($langCodes)) {
    // Auto-detect from existing translation branches (e.g. 2.x-fr → fr)
    $branchRes = run("git branch --list '*.x-??' '*.x-???'");
    foreach ($branchRes['lines'] as $b) {
        $b = trim($b, ' *');
        if (preg_match('/^\d+\.x-(.+)$/', $b, $m)) {
            // Map short branch suffix to a lang code in our map
            $suffix = $m[1]; // e.g. "fr"
            // Find a matching full lang code (fr_FR, es, de, ...)
            foreach (array_keys((new ReflectionFunction('getLanguageName'))->getStaticVariables()['map'] ?? []) as $code) {
                if (strtolower(explode('_', $code)[0]) === strtolower($suffix)) {
                    $langCodes[] = $code;
                    break;
                }
            }
            if (!in_array($suffix, $langCodes, true)) {
                $langCodes[] = $suffix; // fallback: use suffix directly
            }
        }
    }
    if (empty($langCodes)) {
        eprintln('No languages specified and no translation branches detected.');
        eprintln('Usage: php scripts/translate-docs.php [--from TAG] fr_FR es de ...');
        exit(1);
    }
    eprintln('Auto-detected languages from branches: ' . implode(', ', $langCodes));
}

// ── Collect files to translate ────────────────────────────────────────────────

$repoRoot = dirname(__DIR__);

if ($fromTag !== null) {
    $res   = run("git -C " . escapeshellarg($repoRoot) . " diff " . escapeshellarg($fromTag) . "..HEAD --name-only --diff-filter=ACMR -- '*.md'");
    $files = array_filter($res['lines'], fn($f) => $f !== 'CHANGELOG.md' && trim($f) !== '');
} else {
    $res   = run("git -C " . escapeshellarg($repoRoot) . " ls-files '*.md'");
    $files = array_filter($res['lines'], fn($f) => $f !== 'CHANGELOG.md' && trim($f) !== '');
}

$files = array_values($files);

if ($singleFile !== null) {
    // Normalise: strip leading ./ if the user typed it
    $singleFile = ltrim($singleFile, './');
    if (!in_array($singleFile, $files, true)) {
        eprintln("Error: '{$singleFile}' not found in the file list (check the path is relative to the repo root).");
        eprintln('Known files matching that name:');
        foreach ($files as $f) {
            if (str_contains($f, basename($singleFile))) {
                eprintln("  {$f}");
            }
        }
        exit(1);
    }
    $files = [$singleFile];
}

if (empty($files)) {
    eprintln($fromTag ? "No Markdown files changed since {$fromTag}." : 'No Markdown files found.');
    exit(0);
}

eprintln(sprintf(
    'Files to translate: %d%s',
    count($files),
    $fromTag ? " (changed since {$fromTag})" : ''
));

if ($dryRun) {
    eprintln('DRY RUN — no API calls will be made.');
}

if ($apiKey === '' || $apiKey === '{your_api_key}') {
    eprintln('WARNING: API key is not set. Edit scripts/config.php before running for real.');
    if (!$dryRun) {
        exit(1);
    }
}

// ── Per-language translation loop ─────────────────────────────────────────────

// report[lang] = ['ok'=>[], 'warnings'=>[file=>[msgs]], 'failed'=>[file=>reason]]
$report = [];

foreach ($langCodes as $lang) {
    $lang     = trim($lang);
    $langName = getLanguageName($lang);
    $outDir   = $repoRoot . '/translated/' . $lang;

    eprintln('');
    eprintln("── {$lang} ({$langName}) " . str_repeat('─', max(0, 50 - strlen($lang) - strlen($langName))));

    $report[$lang] = ['ok' => [], 'warnings' => [], 'failed' => []];
    $fileList      = $testMode ? array_slice($files, 0, 1) : $files;

    foreach ($fileList as $idx => $relPath) {
        $srcPath = $repoRoot . '/' . $relPath;
        $dstPath = $outDir . '/' . $relPath;
        $progress = sprintf('[%d/%d]', $idx + 1, count($fileList));

        if (!$force && !$dryRun && is_file($dstPath)) {
            eprintln("  {$progress} SKIP  {$relPath}  (already translated; use --force to redo)");
            $report[$lang]['ok'][] = $relPath . ' (skipped)';
            continue;
        }

        $source = file_get_contents($srcPath);
        if ($source === false) {
            eprintln("  {$progress} ERROR {$relPath}  (cannot read source file)");
            $report[$lang]['failed'][$relPath] = 'Cannot read source file';
            continue;
        }

        $sizeKB    = round(strlen($source) / 1024, 1);
        $chunks    = count(splitIntoChunks($source));
        $chunkNote = $chunks > 1 ? " → {$chunks} chunks" : '';
        eprintln("  {$progress} {$relPath}  ({$sizeKB} KB{$chunkNote})", true);

        if ($dryRun) {
            $report[$lang]['ok'][] = $relPath . ' (dry-run)';
            continue;
        }

        $result = translatePage($apiUrl, $apiKey, $model, $lang, $langName, $relPath, $source);

        if ($result['error'] !== null) {
            eprintln("    FAILED: " . $result['error']);
            $report[$lang]['failed'][$relPath] = $result['error'];
            // Write original English as placeholder so the output tree is complete
            @mkdir(dirname($dstPath), 0755, true);
            file_put_contents($dstPath, $source);
            continue;
        }

        if (!empty($result['warnings'])) {
            eprintln('    WARNINGS:');
            foreach ($result['warnings'] as $w) {
                eprintln("      - {$w}");
            }
            $report[$lang]['warnings'][$relPath] = $result['warnings'];
        } else {
            eprintln('    OK');
        }

        @mkdir(dirname($dstPath), 0755, true);
        file_put_contents($dstPath, $result['text']);
        $report[$lang]['ok'][] = $relPath;

        // Polite pause between pages
        if ($idx < count($fileList) - 1) {
            sleep(1);
        }
    }
}

// ── Final report ──────────────────────────────────────────────────────────────

echo PHP_EOL;
echo str_repeat('═', 60) . PHP_EOL;
echo '  TRANSLATION REPORT' . PHP_EOL;
echo str_repeat('═', 60) . PHP_EOL;

foreach ($report as $lang => $data) {
    $langName  = getLanguageName($lang);
    $okCount   = count($data['ok']);
    $warnCount = count($data['warnings']);
    $failCount = count($data['failed']);
    $total     = $okCount + $warnCount + $failCount;

    echo PHP_EOL;
    echo "Language: {$lang} ({$langName})" . PHP_EOL;
    echo "Files processed: {$total}" . PHP_EOL;
    echo "  ✓ OK:       {$okCount}" . PHP_EOL;
    echo "  ⚠ Warnings: {$warnCount}" . PHP_EOL;
    echo "  ✗ Failed:   {$failCount}" . PHP_EOL;

    if (!empty($data['warnings'])) {
        echo PHP_EOL . 'Warnings:' . PHP_EOL;
        foreach ($data['warnings'] as $file => $msgs) {
            echo "  {$file}" . PHP_EOL;
            foreach ($msgs as $msg) {
                echo "    - {$msg}" . PHP_EOL;
            }
        }
    }

    if (!empty($data['failed'])) {
        echo PHP_EOL . 'Failed (original English kept as placeholder):' . PHP_EOL;
        foreach ($data['failed'] as $file => $reason) {
            echo "  {$file}" . PHP_EOL;
            echo "    - {$reason}" . PHP_EOL;
        }
    }

    if (!$dryRun && $okCount > 0) {
        $outDir = 'translated/' . $lang;
        $branch = '2.x-' . strtolower(explode('_', $lang)[0]);
        echo PHP_EOL . "Output: {$outDir}/" . PHP_EOL;
        echo "Apply:  git checkout {$branch} && rsync -av {$outDir}/ ./ && git add -A -- ':!translated/'" . PHP_EOL;
    }
}

echo PHP_EOL . str_repeat('═', 60) . PHP_EOL;
