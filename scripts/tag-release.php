#!/usr/bin/env php
<?php
// Creates a versioned tag (e.g. 2.x-v3) and updates <version>/en/CHANGELOG.md.
// Run from the `all` branch, which holds every version and language as
// <version>/<language>/ directories (see gitbook-docs.yaml at the repo root).
// Usage: php scripts/tag-release.php <version> [--dry-run]
// Example: php scripts/tag-release.php 3.x --dry-run

declare(strict_types=1);

// ── Helpers ───────────────────────────────────────────────────────────────────

function run(string $command): string
{
    exec($command, $output, $code);
    if ($code !== 0) {
        error("Command failed (exit $code): $command");
    }
    return implode("\n", $output);
}

function lines(string $command): array
{
    exec($command, $output, $code);
    if ($code !== 0) {
        error("Command failed (exit $code): $command");
    }
    return array_filter(array_map('trim', $output));
}

function error(string $message): never
{
    fwrite(STDERR, "Error: $message\n");
    exit(1);
}

// ── Parse arguments ───────────────────────────────────────────────────────────

$dryRun  = in_array('--dry-run', $argv, strict: true);
$version = null;
foreach (array_slice($argv, 1) as $arg) {
    if ($arg !== '--dry-run') {
        $version = $arg;
        break;
    }
}

if ($version === null) {
    error('missing <version> argument. Usage: php scripts/tag-release.php <version> [--dry-run] (e.g. 3.x)');
}

if (!preg_match('/^\d+(\.\d+)*\.x$/', $version)) {
    error("'$version' doesn't look like a version directory (expected e.g. 2.x, 3.x, 1.11.x)");
}

if (!is_dir($version) || !is_dir("$version/en")) {
    error("'$version/en' not found. Run this from the repository root of the `all` branch, and check the version exists.");
}

$series = $version; // kept as a separate name below for readability at call sites

// ── Require clean working tree (not needed for dry-run) ──────────────────────

if (!$dryRun) {
    exec('git diff --quiet && git diff --cached --quiet', $_, $dirty);
    if ($dirty !== 0) {
        error('uncommitted changes present. Commit or stash them first.');
    }
}

// ── Find last tag and compute next ────────────────────────────────────────────

$tags    = lines("git tag --list '{$series}-v*' --sort=-version:refname");
// Exclude per-language sync tags (e.g. 2.x-fr-v3) — only the plain {series}-vN tags count here.
$tags    = array_values(array_filter($tags, fn($t) => preg_match('/^' . preg_quote($series, '/') . '-v\d+$/', $t)));
$lastTag = $tags[array_key_first($tags)] ?? null;

if ($lastTag === null) {
    $nextNum      = 1;
    $range        = null;
    $rangeDisplay = 'initial snapshot';
} else {
    preg_match('/v(\d+)$/', $lastTag, $m);
    $nextNum      = (int) $m[1] + 1;
    $range        = "$lastTag..HEAD";
    $rangeDisplay = "since $lastTag";
}

$newTag = "{$series}-v{$nextNum}";
$date   = date('Y-m-d');

// ── Collect .md changes, scoped to <version>/en/ ──────────────────────────────

$sourceRoot = "{$version}/en";

function stripRoot(string $file, string $root): string
{
    return str_starts_with($file, "$root/") ? substr($file, strlen($root) + 1) : $file;
}

if ($range === null) {
    $commitLines = lines("git log -n 40 --oneline --no-merges -- '{$sourceRoot}/*.md'");
    $fileLines   = array_values(array_filter(
        array_map(fn($f) => stripRoot($f, $sourceRoot), lines("git ls-files '{$sourceRoot}/*.md'")),
        fn($f) => $f !== 'CHANGELOG.md',
    ));
    sort($fileLines);
} else {
    $commitLines = lines("git log -n 40 '$range' --oneline --no-merges -- '{$sourceRoot}/*.md'");
    $fileLines   = array_values(array_filter(
        array_map(fn($f) => stripRoot($f, $sourceRoot), lines("git diff '$range' --name-only --diff-filter=ACMR -- '{$sourceRoot}/*.md'")),
        fn($f) => $f !== 'CHANGELOG.md',
    ));
}

if (empty($fileLines)) {
    echo "No Markdown changes in {$sourceRoot} ($rangeDisplay). Nothing to tag.\n";
    exit(0);
}

// ── Build changelog entry ─────────────────────────────────────────────────────

$fileCount   = count($fileLines);
$pagesBlock  = implode("\n", array_map(fn($f) => "- $f", $fileLines));
$commitsBlock = implode("\n", array_map(fn($c) => "- $c", $commitLines));

$entry = <<<MD
    ## $newTag -- $date

    **$fileCount page(s) updated ($rangeDisplay)**

    ### Pages changed
    $pagesBlock

    ### Commits
    $commitsBlock

    MD;

// Remove the 4-space heredoc indentation
$entry = preg_replace('/^    /m', '', $entry);

if ($dryRun) {
    echo "=== DRY RUN -- would create tag: $newTag ===\n\n$entry\n";
    echo "Run without --dry-run to apply.\n";
    exit(0);
}

// ── Update <version>/en/CHANGELOG.md ──────────────────────────────────────────

$changelogPath = "{$sourceRoot}/CHANGELOG.md";

if (file_exists($changelogPath)) {
    $existing     = file_get_contents($changelogPath);
    $existingBody = implode("\n", array_slice(explode("\n", $existing), 2));
    $newContent   = "# Documentation Changelog\n\n$entry\n$existingBody";
} else {
    $newContent = "# Documentation Changelog\n\n$entry";
    echo "Note: add CHANGELOG.md to {$sourceRoot}/SUMMARY.md so GitBook renders it as a page.\n";
}

file_put_contents($changelogPath, $newContent);

// ── Propagate the (untranslated) changelog to every sibling language space ────
// CHANGELOG.md is deliberately excluded from AI translation (see
// translate-docs.php), so every <version>/<lang>/CHANGELOG.md is meant to be a
// verbatim copy of the English one, not a translation of it.

$propagated = [];
foreach (glob("{$version}/*", GLOB_ONLYDIR) ?: [] as $langDir) {
    $lang = basename($langDir);
    if ($lang === 'en') {
        continue;
    }
    $dest = "{$langDir}/CHANGELOG.md";
    if (!is_file($dest) || file_get_contents($dest) !== $newContent) {
        file_put_contents($dest, $newContent);
        $propagated[] = $dest;
    }
}

// ── Commit and tag ────────────────────────────────────────────────────────────

$pathsToAdd = array_merge([$changelogPath], $propagated);
run('git add ' . implode(' ', array_map('escapeshellarg', $pathsToAdd)));
run("git commit -m 'docs: changelog for $newTag'");
run("git tag $newTag");

echo "Tagged: $newTag\n";
if (!empty($propagated)) {
    echo "Propagated CHANGELOG.md to: " . implode(', ', array_map(fn($p) => dirname($p), $propagated)) . "\n";
}

// ── Translation sync status ───────────────────────────────────────────────────
// Sync state is tracked with per-language tags on this same branch
// (e.g. 2.x-fr-v3, created by translate-docs.php --commit), one per language
// directory that exists under <version>/ besides en/.

$langDirs = array_values(array_filter(
    array_map('basename', glob("{$version}/*", GLOB_ONLYDIR) ?: []),
    fn($lang) => $lang !== 'en',
));

if (!empty($langDirs)) {
    echo "\nTranslation sync status:\n";
    foreach ($langDirs as $lang) {
        $langTags = lines("git tag --list '{$series}-{$lang}-v*' --sort=-version:refname");
        $langLast = $langTags[array_key_first($langTags)] ?? null;

        if ($langLast === null) {
            echo "  {$series}/{$lang}: never synced -- needs full translation\n";
        } else {
            preg_match('/v(\d+)$/', $langLast, $m);
            $langNum = (int) $m[1];
            $behind  = $nextNum - $langNum;
            echo $behind > 0
                ? "  {$series}/{$lang}: at v$langNum -- $behind version(s) behind\n"
                : "  {$series}/{$lang}: up to date\n";
        }
    }
}

// ── Show translation diff command ─────────────────────────────────────────────

echo "\nFiles to translate:\n";
echo $range !== null
    ? "  git diff $lastTag..$newTag --name-only -- '{$sourceRoot}/*.md'\n"
    : "  git ls-files '{$sourceRoot}/*.md'\n";
