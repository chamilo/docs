#!/usr/bin/env php
<?php
declare(strict_types=1);

/**
 * translate-docs.php — Translates Chamilo documentation Markdown pages using the Grok API.
 *
 * All versions and languages live in one branch (`all`), as <version>/<language>/
 * directories (e.g. `3.x/en/`, `3.x/fr/`) — see gitbook-docs.yaml at the repo root.
 * This script always translates FROM <version>/en/ INTO one or more <version>/<lang>/
 * directories.
 *
 * Usage:
 *   php scripts/translate-docs.php --version <version> [options] [lang1] [lang2] ...
 *
 * Options:
 *   --version VER  Required (except with --fix-wrappers). The version directory to
 *                  translate, e.g. 3.x, 2.x, 1.11.x.
 *   --from TAG    Only translate files changed since TAG (e.g. 3.x-v1).
 *                 Without this, all .md files under <version>/en/ are translated.
 *   --force       Re-translate files that already exist in the output directory.
 *   --dry-run     Show what would be done without making any API calls.
 *   --test        Translate only the first file per language (for smoke-testing).
 *   --single-file  Translate the given file (relative to <version>/en/), not all others.
 *                  Use with --force to force the re-translation from scratch.
 *   --fix-wrappers Scan already-translated files under translated/ and remove any
 *                  leading/trailing "---" wrapper lines that GitBook rejects. No API
 *                  calls are made. Scoped to --version if given, otherwise all versions.
 *                  Combine with --dry-run to preview what would be changed.
 *   --commit      After translating, for each language that produced output, rsync
 *                 translated/<version>/<lang>/ into <version>/<lang>/ (creating it, with
 *                 a .gitbook.yaml and a copy of CHANGELOG.md, if it doesn't exist yet) and
 *                 commit locally. Requires a clean working tree before it starts (nothing
 *                 is stashed for you) and a named branch checked out (not detached HEAD).
 *                 Never pushes — review and push manually when ready. Also tags
 *                 <version>-<lang>-vN to match the current <version>-vN release tag, so
 *                 `tag-release.php`'s "Translation sync status" reflects the sync.
 *                 A language with no translated output, or whose sync produced no file
 *                 changes, is skipped and reported, not treated as an error.
 *
 * Language codes: GitBook's codes (fr, es, de, pt, pt-br, zh, zh-tw, ...) — the same
 * codes used as directory names under <version>/ and as `content.language` in
 * gitbook-docs.yaml. If no language codes are given, the script looks for existing
 * <version>/<lang>/ directories (besides en/).
 *
 * Output:  translated/<version>/<lang>/ (mirrors the <version>/en/ tree)
 * Apply:   rsync -av translated/3.x/fr/ 3.x/fr/ && git add 3.x/fr
 *          (done automatically per language when --commit is passed)
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

$apiKey   = $translationAPIKey      ?? '';
$apiUrl   = $translationAPIEndpoint ?? 'https://api.x.ai/v1/chat/completions';
//$model   = $translationModel       ?? 'grok-3';
$model    = $translationModel       ?? 'grok-4-1-fast-non-reasoning';
$repoRoot = dirname(__DIR__);

// Reasoning-capable models (e.g. grok-4.6) default to reasoning_effort=high,
// which costs ~30-45s of time-to-first-token per request and was causing chunk
// requests to hit the cURL timeout. We therefore send reasoning_effort=low
// (overridable in config.php) and use a longer cURL timeout than PHP's 30s default.
$reasoningEffort = $translationReasoningEffort ?? 'low';
$timeoutSeconds  = (int) ($translationTimeoutSeconds ?? 180);
if ($timeoutSeconds < 30) {
    $timeoutSeconds = 30;
}

// Target size (bytes) for each API request chunk.
// Pages are split at heading boundaries so no line or section is ever broken.
// Adjacent small sections are greedily batched together up to this limit.
// A single section that already exceeds this size is sent as its own chunk.
$chunkTargetBytes = (int) ($translationChunkTarget ?? 5_000);
if ($chunkTargetBytes < 1) {
    $chunkTargetBytes = 5_000;
}
define('CHUNK_TARGET', $chunkTargetBytes);

// Max attempts per page (or chunk) before giving up and keeping original English.
const MAX_ATTEMPTS = 2;

// ── CLI argument parsing ──────────────────────────────────────────────────────

$args         = array_slice($argv, 1);
$dryRun       = false;
$testMode     = false;
$force        = false;
$fromTag      = null;
$singleFile   = null;
$fixWrappers  = false;
$commit       = false;
$version      = null;
$langCodes    = [];

for ($i = 0, $n = count($args); $i < $n; $i++) {
    switch ($args[$i]) {
        case '--dry-run':      $dryRun      = true;                  break;
        case '--test':         $testMode    = true;                  break;
        case '--force':        $force       = true;                  break;
        case '--from':         $fromTag     = $args[++$i] ?? null;   break;
        case '--single-file':  $singleFile  = $args[++$i] ?? null;   break;
        case '--fix-wrappers': $fixWrappers = true;                  break;
        case '--commit':       $commit      = true;                  break;
        case '--version':      $version     = $args[++$i] ?? null;   break;
        default:               $langCodes[] = $args[$i];             break;
    }
}

if (!$fixWrappers && $version === null) {
    fwrite(STDERR, "Error: --version is required (e.g. --version 3.x).\n");
    exit(1);
}
if ($version !== null && (!preg_match('/^\d+(\.\d+)*\.x$/', $version) || !is_dir("$repoRoot/$version/en"))) {
    fwrite(STDERR, "Error: '$version/en' not found. Pass the version directory name, e.g. --version 3.x.\n");
    exit(1);
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
 * Run a git command relative to the repo root, returning whether it exited 0.
 * Output lines are captured into $output by reference for callers that need them.
 */
function gitOk(string $repoRoot, string $cmd, ?array &$output = null): bool
{
    exec('git -C ' . escapeshellarg($repoRoot) . ' ' . $cmd . ' 2>&1', $output, $code);
    return $code === 0;
}

/**
 * @return string Human-readable English name for a GitBook language code.
 */
function getLanguageName(string $code): string
{
    static $map = [
        'en'    => 'English',
        'fr'    => 'French',
        'de'    => 'German',
        'es'    => 'Spanish',
        'it'    => 'Italian',
        'pt'    => 'Portuguese',
        'pt-br' => 'Brazilian Portuguese',
        'ru'    => 'Russian',
        'ja'    => 'Japanese',
        'zh'    => 'Simplified Chinese',
        'zh-tw' => 'Traditional Chinese',
        'yue'   => 'Cantonese',
        'ko'    => 'Korean',
        'ar'    => 'Arabic',
        'hi'    => 'Hindi',
        'nl'    => 'Dutch',
        'pl'    => 'Polish',
        'tr'    => 'Turkish',
        'sv'    => 'Swedish',
        'no'    => 'Norwegian',
        'da'    => 'Danish',
        'fi'    => 'Finnish',
        'el'    => 'Greek',
        'cs'    => 'Czech',
        'hu'    => 'Hungarian',
        'ro'    => 'Romanian',
        'th'    => 'Thai',
        'vi'    => 'Vietnamese',
        'id'    => 'Indonesian',
        'ms'    => 'Malay',
        'he'    => 'Hebrew',
        'uk'    => 'Ukrainian',
        'sk'    => 'Slovak',
        'bg'    => 'Bulgarian',
        'hr'    => 'Croatian',
        'lt'    => 'Lithuanian',
        'lv'    => 'Latvian',
        'et'    => 'Estonian',
        'sl'    => 'Slovenian',
        // Not a GitBook site-structure language code (no content.language value
        // exists for it), but used as a directory name on 1.11.x/ga/.
        'ga'    => 'Galician',
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
 * Remove leading/trailing lines that consist only of dashes (e.g. "---"),
 * which the model sometimes adds as wrapper separators and which GitBook rejects.
 * Returns the cleaned text and a boolean indicating whether anything was removed.
 */
function stripDashWrappers(string $text): array
{
    $lines   = explode("\n", $text);
    $changed = false;

    // Strip leading dash-only lines (and any blank lines immediately after them)
    while (!empty($lines) && preg_match('/^-+$/', ltrim($lines[0]))) {
        array_shift($lines);
        $changed = true;
        // Also drop the blank line that typically follows
        if (!empty($lines) && trim($lines[0]) === '') {
            array_shift($lines);
        }
    }

    // Strip trailing dash-only lines (and any blank lines immediately before them)
    while (!empty($lines) && preg_match('/^-+$/', ltrim($lines[count($lines) - 1]))) {
        array_pop($lines);
        $changed = true;
        if (!empty($lines) && trim($lines[count($lines) - 1]) === '') {
            array_pop($lines);
        }
    }

    return [implode("\n", $lines), $changed];
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
 * Transient errors (timeout, 429, 5xx) are retried with backoff. Other
 * errors (bad request, malformed response structure) throw immediately.
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
    string $markdownChunk,
    int $timeoutSeconds = 180,
    string $reasoningEffort = 'low'
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
    if ($reasoningEffort !== '') {
        $payload['reasoning_effort'] = $reasoningEffort;
    }

    $payloadJson = json_encode($payload, JSON_UNESCAPED_UNICODE);
    if ($payloadJson === false) {
        throw new RuntimeException('Failed to encode Grok request payload as JSON.');
    }

    $maxAttempts = 3;
    $lastError   = null;
    $body        = null;
    $httpCode    = 0;

    for ($attempt = 1; $attempt <= $maxAttempts; $attempt++) {
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
                'x-grok-conv-id: chamilo-docs-translate-v1',
            ],
            CURLOPT_POSTFIELDS     => $payloadJson,
            CURLOPT_CONNECTTIMEOUT => 15,
            CURLOPT_TIMEOUT        => $timeoutSeconds,
        ]);

        $startedAt = microtime(true);
        $body      = curl_exec($ch);
        $elapsed   = round(microtime(true) - $startedAt, 1);
        $httpCode  = (int) curl_getinfo($ch, CURLINFO_HTTP_CODE);

        if ($body === false) {
            $err   = curl_error($ch);
            $errno = curl_errno($ch);
            curl_close($ch);
            $lastError = "cURL error ({$errno}): {$err} after {$elapsed}s";
            if ($attempt < $maxAttempts && in_array($errno, [CURLE_OPERATION_TIMEDOUT, CURLE_COULDNT_CONNECT, CURLE_RECV_ERROR], true)) {
                $sleep = $attempt * 2;
                eprintln("    [Grok] {$lastError} - retrying in {$sleep}s (attempt {$attempt}/{$maxAttempts}).", true);
                sleep($sleep);
                continue;
            }
            throw new RuntimeException($lastError);
        }

        curl_close($ch);

        if ($httpCode === 429 || $httpCode >= 500) {
            $snippet   = mb_substr($body, 0, 300);
            $lastError = "Grok API HTTP error {$httpCode} after {$elapsed}s: {$snippet}";
            if ($attempt < $maxAttempts) {
                $sleep = $attempt * 3;
                eprintln("    [Grok] {$lastError} - retrying in {$sleep}s (attempt {$attempt}/{$maxAttempts}).", true);
                sleep($sleep);
                continue;
            }
            throw new RuntimeException($lastError);
        }

        break; // got a non-retryable response (2xx or a non-429/5xx error) — stop retrying
    }

    if ($httpCode < 200 || $httpCode >= 300) {
        throw new RuntimeException("Grok API HTTP {$httpCode}: " . mb_substr((string) $body, 0, 300));
    }

    $data = json_decode((string) $body, true);
    if (json_last_error() !== JSON_ERROR_NONE) {
        throw new RuntimeException('Invalid JSON in API response: ' . json_last_error_msg());
    }

    if (!isset($data['choices'][0]['message']['content'])) {
        throw new RuntimeException('Unexpected API response structure (missing choices/content).');
    }

    $usage            = $data['usage'] ?? [];
    $promptTokens     = $usage['prompt_tokens'] ?? '?';
    $completionTokens = $usage['completion_tokens'] ?? '?';
    $reasoningTokens   = $usage['completion_tokens_details']['reasoning_tokens']
        ?? $usage['reasoning_tokens']
        ?? '?';
    eprintln(
        "    [Grok] HTTP {$httpCode} in {$elapsed}s"
        . " (prompt={$promptTokens}, completion={$completionTokens}, reasoning={$reasoningTokens}).",
        true
    );

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
    string $content,
    int $timeoutSeconds = 180,
    string $reasoningEffort = 'low'
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
                    $chunk,
                    $timeoutSeconds, $reasoningEffort
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

// ── --fix-wrappers: strip "---" wrapper lines from already-translated files ───

if ($fixWrappers) {
    $repoRoot = dirname(__DIR__);

    // Resolve version/language pairs to scan: translated/<version>/<lang>/,
    // scoped to --version if given, otherwise every version found.
    $targets = [];
    $versionDirs = $version !== null ? [$version] : array_map(
        'basename',
        glob($repoRoot . '/translated/*', GLOB_ONLYDIR) ?: []
    );
    foreach ($versionDirs as $v) {
        foreach (glob($repoRoot . '/translated/' . $v . '/*', GLOB_ONLYDIR) ?: [] as $dir) {
            $targets[] = ['version' => $v, 'lang' => basename($dir), 'dir' => $dir];
        }
    }

    if (empty($targets)) {
        eprintln('No translated/<version>/<lang>/ directories found' . ($version !== null ? " under translated/{$version}/" : '') . '.');
        exit(1);
    }

    $totalFixed = 0;

    foreach ($targets as $target) {
        ['version' => $v, 'lang' => $lang, 'dir' => $outDir] = $target;
        $fixedIn = 0;

        $iterator = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($outDir));
        foreach ($iterator as $file) {
            if ($file->getExtension() !== 'md') {
                continue;
            }
            $path = $file->getPathname();
            $text = file_get_contents($path);
            if ($text === false) {
                continue;
            }
            [$cleaned, $changed] = stripDashWrappers($text);
            if (!$changed) {
                continue;
            }
            $rel = substr($path, strlen($repoRoot) + 1);
            if ($dryRun) {
                eprintln("  DRY-RUN  {$rel}");
            } else {
                file_put_contents($path, $cleaned);
                eprintln("  FIXED    {$rel}");
            }
            $fixedIn++;
        }

        $label = $dryRun ? 'would fix' : 'fixed';
        eprintln("{$v}/{$lang}: {$label} {$fixedIn} file(s).");
        $totalFixed += $fixedIn;
    }

    $label = $dryRun ? 'would be fixed' : 'fixed';
    eprintln('');
    eprintln("Done. {$totalFixed} file(s) {$label} across " . count($targets) . " version/language director(y/ies).");
    exit(0);
}

// ── --commit preflight: fail fast, before spending any API calls ─────────────

if ($commit && !$dryRun) {
    if (!gitOk($repoRoot, 'diff --quiet') || !gitOk($repoRoot, 'diff --cached --quiet')) {
        eprintln('Error: uncommitted changes present. Commit or stash them before using --commit.');
        exit(1);
    }

    $branchOutput = [];
    if (!gitOk($repoRoot, 'symbolic-ref --short HEAD', $branchOutput) || empty($branchOutput)) {
        eprintln('Error: HEAD is detached. --commit needs a named branch checked out to commit onto.');
        exit(1);
    }
}

// ── Detect languages ──────────────────────────────────────────────────────────

if (empty($langCodes)) {
    // Auto-detect from existing <version>/<lang>/ directories (besides en/)
    foreach (glob("{$repoRoot}/{$version}/*", GLOB_ONLYDIR) ?: [] as $dir) {
        $lang = basename($dir);
        if ($lang !== 'en') {
            $langCodes[] = $lang;
        }
    }
    if (empty($langCodes)) {
        eprintln("No languages specified and no {$version}/<lang>/ directories detected.");
        eprintln('Usage: php scripts/translate-docs.php --version ' . $version . ' [--from TAG] fr es de ...');
        exit(1);
    }
    eprintln('Auto-detected languages from existing directories: ' . implode(', ', $langCodes));
}

// ── Collect files to translate, scoped to <version>/en/ ──────────────────────

$sourceRoot = "{$version}/en";

function stripSourceRoot(string $file, string $root): string
{
    return str_starts_with($file, "$root/") ? substr($file, strlen($root) + 1) : $file;
}

if ($fromTag !== null) {
    $res   = run("git -C " . escapeshellarg($repoRoot) . " diff " . escapeshellarg($fromTag) . "..HEAD --name-only --diff-filter=ACMR -- " . escapeshellarg("{$sourceRoot}/*.md"));
    $files = array_filter(
        array_map(fn($f) => stripSourceRoot($f, $sourceRoot), $res['lines']),
        fn($f) => $f !== 'CHANGELOG.md' && trim($f) !== '',
    );
} else {
    $res   = run("git -C " . escapeshellarg($repoRoot) . " ls-files " . escapeshellarg("{$sourceRoot}/*.md"));
    $files = array_filter(
        array_map(fn($f) => stripSourceRoot($f, $sourceRoot), $res['lines']),
        fn($f) => $f !== 'CHANGELOG.md' && trim($f) !== '',
    );
}

$files = array_values($files);

if ($singleFile !== null) {
    // Normalise: strip leading ./ and a redundant <version>/en/ prefix if the user typed it
    $singleFile = ltrim($singleFile, './');
    $singleFile = stripSourceRoot($singleFile, $sourceRoot);
    if (!in_array($singleFile, $files, true)) {
        eprintln("Error: '{$singleFile}' not found under {$sourceRoot}/ (path should be relative to that directory).");
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
    eprintln($fromTag ? "No Markdown files changed under {$sourceRoot}/ since {$fromTag}." : "No Markdown files found under {$sourceRoot}/.");
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

eprintln(
    "Grok client: model={$model} reasoning_effort={$reasoningEffort}"
    . " timeout={$timeoutSeconds}s chunk_target=" . CHUNK_TARGET . 'B.',
    true
);

// ── Per-language translation loop ─────────────────────────────────────────────

// report[lang] = ['ok'=>[], 'warnings'=>[file=>[msgs]], 'failed'=>[file=>reason]]
$report = [];

foreach ($langCodes as $lang) {
    $lang     = trim($lang);
    $langName = getLanguageName($lang);
    $outDir   = "{$repoRoot}/translated/{$version}/{$lang}";

    eprintln('');
    eprintln("── {$version}/{$lang} ({$langName}) " . str_repeat('─', max(0, 50 - strlen($version) - strlen($lang) - strlen($langName))));

    $report[$lang] = ['ok' => [], 'warnings' => [], 'failed' => []];
    $fileList      = $testMode ? array_slice($files, 0, 1) : $files;

    foreach ($fileList as $idx => $relPath) {
        $srcPath = "{$repoRoot}/{$sourceRoot}/{$relPath}";
        $dstPath = "{$outDir}/{$relPath}";
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

        $result = translatePage(
            $apiUrl, $apiKey, $model, $lang, $langName, $relPath, $source,
            $timeoutSeconds, $reasoningEffort
        );

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

        [$translatedText, $stripped] = stripDashWrappers($result['text']);
        if ($stripped) {
            eprintln('    NOTE: stripped leading/trailing "---" wrapper lines');
        }

        @mkdir(dirname($dstPath), 0755, true);
        file_put_contents($dstPath, $translatedText);
        $report[$lang]['ok'][] = $relPath;

        // Polite pause between pages
        if ($idx < count($fileList) - 1) {
            sleep(1);
        }
    }
}

// ── Commit translations directly into <version>/<lang>/ (--commit) ───────────

// commitReport[lang] = ['status' => 'committed'|'no-changes'|'error', 'detail' => string]
$commitReport = [];

if ($commit && !$dryRun) {
    eprintln('');
    eprintln(str_repeat('─', 60));
    eprintln('Committing translations (--commit)');
    eprintln(str_repeat('─', 60));

    // Standard per-space boilerplate for a brand-new <version>/<lang>/ directory.
    $gitbookYamlTemplate = "root: ./\n\nstructure:\n  readme: README.md\n  summary: SUMMARY.md\n";

    // Current release tag number for this version, if any — used to tag sync status.
    $currentTagRes = run("git -C " . escapeshellarg($repoRoot) . " tag --list " . escapeshellarg("{$version}-v*") . " --sort=-version:refname");
    $currentTagNum = null;
    foreach ($currentTagRes['lines'] as $t) {
        if (preg_match('/^' . preg_quote($version, '/') . '-v(\d+)$/', trim($t), $m)) {
            $currentTagNum = (int) $m[1];
            break;
        }
    }

    foreach ($langCodes as $lang) {
        $lang = trim($lang);

        if (empty($report[$lang]['ok'])) {
            continue; // nothing was translated for this language; nothing to commit
        }

        $srcDir  = "translated/{$version}/{$lang}";
        $destDir = "{$version}/{$lang}";
        $isNew   = !is_dir("{$repoRoot}/{$destDir}");

        if ($isNew) {
            @mkdir("{$repoRoot}/{$destDir}", 0755, true);
            file_put_contents("{$repoRoot}/{$destDir}/.gitbook.yaml", $gitbookYamlTemplate);
            $changelogSrc = "{$repoRoot}/{$sourceRoot}/CHANGELOG.md";
            if (is_file($changelogSrc)) {
                copy($changelogSrc, "{$repoRoot}/{$destDir}/CHANGELOG.md");
            }
            eprintln("  {$lang}: new space — seeded .gitbook.yaml" . (is_file($changelogSrc) ? ' and CHANGELOG.md' : ''));
        }

        exec('rsync -a ' . escapeshellarg("{$repoRoot}/{$srcDir}/") . ' ' . escapeshellarg("{$repoRoot}/{$destDir}/"), $_, $rsyncCode);
        if ($rsyncCode !== 0) {
            eprintln("  {$lang}: ERROR — rsync from {$srcDir}/ failed (exit {$rsyncCode}).");
            $commitReport[$lang] = ['status' => 'error', 'detail' => 'rsync failed'];
            continue;
        }

        if (!gitOk($repoRoot, 'add ' . escapeshellarg($destDir))) {
            eprintln("  {$lang}: ERROR — 'git add {$destDir}' failed.");
            $commitReport[$lang] = ['status' => 'error', 'detail' => 'git add failed'];
            continue;
        }

        if (gitOk($repoRoot, 'diff --cached --quiet -- ' . escapeshellarg($destDir))) {
            eprintln("  {$lang}: no changes after sync — nothing to commit.");
            $commitReport[$lang] = ['status' => 'no-changes', 'detail' => $destDir];
            continue;
        }

        $filesChanged = count(run("git -C " . escapeshellarg($repoRoot) . " diff --cached --name-only -- " . escapeshellarg($destDir))['lines']);
        $langName     = getLanguageName($lang);
        $subject      = "Documentation: Sync {$langName} translation for {$version}";
        $commitMsg    = escapeshellarg($subject);

        if (!gitOk($repoRoot, "commit -m {$commitMsg} -- " . escapeshellarg($destDir))) {
            eprintln("  {$lang}: ERROR — 'git commit' failed.");
            $commitReport[$lang] = ['status' => 'error', 'detail' => 'git commit failed'];
            continue;
        }

        eprintln("  {$lang}: committed {$filesChanged} file(s) in {$destDir} (not pushed).");
        $detail = "{$filesChanged} file(s) in {$destDir}";

        if ($currentTagNum !== null) {
            $syncTag = "{$version}-{$lang}-v{$currentTagNum}";
            if (gitOk($repoRoot, 'rev-parse --verify ' . escapeshellarg("refs/tags/{$syncTag}"))) {
                eprintln("  {$lang}: tag {$syncTag} already exists — leaving it as is.");
            } elseif (gitOk($repoRoot, 'tag ' . escapeshellarg($syncTag))) {
                eprintln("  {$lang}: tagged {$syncTag} (in sync with {$version}-v{$currentTagNum}).");
                $detail .= ", tagged {$syncTag}";
            } else {
                eprintln("  {$lang}: WARNING — could not create tag {$syncTag}.");
            }
        }

        $commitReport[$lang] = ['status' => 'committed', 'detail' => $detail];
    }
}

// ── Final report ──────────────────────────────────────────────────────────────

echo PHP_EOL;
echo str_repeat('═', 60) . PHP_EOL;
echo '  ['.date('H:i:s').']  TRANSLATION REPORT — ' . $version . PHP_EOL;
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
        $srcDir  = "translated/{$version}/{$lang}";
        $destDir = "{$version}/{$lang}";
        echo PHP_EOL . "Output: {$srcDir}/" . PHP_EOL;

        if (isset($commitReport[$lang])) {
            $c = $commitReport[$lang];
            echo match ($c['status']) {
                'committed'  => "Committed: {$c['detail']} (not pushed — review and push when ready)",
                'no-changes' => "Committed: nothing to do — synced content was already up to date in {$c['detail']}",
                'error'      => "Not committed: {$c['detail']}. Apply manually:\n"
                              . "  rsync -av {$srcDir}/ {$destDir}/ && git add {$destDir}",
            } . PHP_EOL;
        } else {
            echo "Apply:  rsync -av {$srcDir}/ {$destDir}/ && git add {$destDir}" . PHP_EOL;
        }
    }
}

if ($commit && !$dryRun) {
    echo PHP_EOL . "(--commit was used: local commits only, nothing was pushed to any remote.)" . PHP_EOL;
}

echo PHP_EOL . str_repeat('═', 60) . PHP_EOL;
