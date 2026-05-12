#!/usr/bin/env php
<?php
// Creates a versioned tag (e.g. 2.x-v3) and updates CHANGELOG.md.
// Run from the English source branch (e.g. 2.x) before syncing translations.
// Usage: php scripts/tag-release.php [--dry-run]

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

$dryRun = in_array('--dry-run', $argv, strict: true);

// ── Detect branch series ──────────────────────────────────────────────────────

$branch = run('git symbolic-ref --short HEAD');

if (!preg_match('/^(\d+\.x)$/', $branch, $m)) {
    if (preg_match('/^(\d+\.x)/', $branch, $m)) {
        error("run this from the primary branch ({$m[1]}), not a translation branch ($branch)");
    }
    error('must be run from a versioned doc branch (e.g. 2.x)');
}

$series = $m[1];

// ── Require clean working tree (not needed for dry-run) ──────────────────────

if (!$dryRun) {
    exec('git diff --quiet && git diff --cached --quiet', $_, $dirty);
    if ($dirty !== 0) {
        error('uncommitted changes present. Commit or stash them first.');
    }
}

// ── Find last tag and compute next ────────────────────────────────────────────

$tags = lines("git tag --list '{$series}-v*' --sort=-version:refname");
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

// ── Collect .md changes ───────────────────────────────────────────────────────

if ($range === null) {
    $commitLines = lines('git log -n 40 --oneline --no-merges -- \'*.md\'');
    $fileLines   = array_values(array_filter(
        lines('git ls-files \'*.md\''),
        fn($f) => $f !== 'CHANGELOG.md',
    ));
    sort($fileLines);
} else {
    $commitLines = lines("git log -n 40 '$range' --oneline --no-merges -- '*.md'");
    $fileLines   = array_values(array_filter(
        lines("git diff '$range' --name-only --diff-filter=ACMR -- '*.md'"),
        fn($f) => $f !== 'CHANGELOG.md',
    ));
}

if (empty($fileLines)) {
    echo "No Markdown changes ($rangeDisplay). Nothing to tag.\n";
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

// ── Update CHANGELOG.md ───────────────────────────────────────────────────────

$changelogPath = 'CHANGELOG.md';

if (file_exists($changelogPath)) {
    $existing     = file_get_contents($changelogPath);
    $existingBody = implode("\n", array_slice(explode("\n", $existing), 2));
    $newContent   = "# Documentation Changelog\n\n$entry\n$existingBody";
} else {
    $newContent = "# Documentation Changelog\n\n$entry";
    echo "Note: add CHANGELOG.md to SUMMARY.md so GitBook renders it as a page.\n";
}

file_put_contents($changelogPath, $newContent);

// ── Commit and tag ────────────────────────────────────────────────────────────

run("git add $changelogPath");
run("git commit -m 'docs: changelog for $newTag'");
run("git tag $newTag");

echo "Tagged: $newTag\n";

// ── Translation sync status ───────────────────────────────────────────────────

$langBranches = array_filter(
    lines("git branch --list '{$series}-??' '{$series}-???'"),
    fn($b) => $b !== $series,
);

if (!empty($langBranches)) {
    echo "\nTranslation sync status:\n";
    foreach ($langBranches as $langBranch) {
        $langTags = lines("git tag --list '{$langBranch}-v*' --sort=-version:refname");
        $langLast = $langTags[array_key_first($langTags)] ?? null;

        if ($langLast === null) {
            echo "  $langBranch: never synced -- needs full translation\n";
        } else {
            preg_match('/v(\d+)$/', $langLast, $m);
            $langNum = (int) $m[1];
            $behind  = $nextNum - $langNum;
            echo $behind > 0
                ? "  $langBranch: at v$langNum -- $behind version(s) behind\n"
                : "  $langBranch: up to date\n";
        }
    }
}

// ── Show translation diff command ─────────────────────────────────────────────

echo "\nFiles to translate:\n";
echo $range !== null
    ? "  git diff $lastTag..$newTag --name-only -- '*.md'\n"
    : "  git ls-files '*.md'\n";
