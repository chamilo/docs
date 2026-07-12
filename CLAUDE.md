# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

## What this repository is

This is the **Chamilo 2.0 documentation site** — a GitBook Markdown project. It is *not* the Chamilo application. There is no build step, no test suite, no `package.json` or `composer.json` here. The Chamilo LMS itself lives in a separate repo ([github.com/chamilo/chamilo-lms](https://github.com/chamilo/chamilo-lms)); pages under `developer-guide/contributing/` (PHPUnit, PHPStan, Composer commands, coding conventions) describe **that** codebase and are not runnable here.

GitBook renders the site from the committed Markdown; the only executable code is the two PHP scripts in `scripts/`.

## Layout

* `SUMMARY.md` — the single source of truth for GitBook's table of contents. Adding/removing a page requires editing this file or the page won't appear in the book.
* `teacher-guide/`, `admin-guide/`, `developer-guide/` — the three authored guides, each a nested directory tree of `.md` pages with per-section `README.md` index pages.
* `.gitbook/assets/` — all screenshots referenced as `/.gitbook/assets/<name>.png` (note the leading slash, repo-root-relative).
* `CHANGELOG.md` — one entry per documentation tag (`2.x-vN`).
* `scripts/` — release tagging + AI translation tooling.
* `translated/` — **gitignored** output of the translation script (per-language mirrors of the source tree).

## Branch model

* **`2.x`** — the English *source* branch. All authoring and editing happens here. This is the active working branch.
* **`2.x-<lang>`** — per-language translation branches (e.g. `2.x-fr`, `2.x-es`, `2.x-de`, `2.x-zh_CN`). They mirror the same tree, translated. Sync status is tracked via matching tags (`2.x-fr` carries `2.x-fr-vN` to show how far behind it is).
* **`1.9.x` / `1.10.x` / `1.11.x`** — older Chamilo doc series with their own translation branches. Don't touch these for 2.0 work.
* **`master`** — the historical default branch; 2.0 work is on `2.x`.

## Common commands

### Tagging a release

Run **only from a clean `2.x` checkout** (it checks for uncommitted changes). Creates the next `2.x-vN` git tag, prepends an entry to `CHANGELOG.md` (pages changed + commit list), commits, tags, then reports how far behind each translation branch is:

```bash
php scripts/tag-release.php --dry-run   # preview the entry + tag
php scripts/tag-release.php             # apply
```

### Translating pages (Grok API)

Translates Markdown pages into one or more languages, writing into `translated/<lang>/`. Requires `scripts/config.php` (copy from `scripts/config.dist.php` and add an x.ai key — **this file is gitignored because it holds a live API key; never commit it**).

```bash
# Translate everything that changed since the last tag (incremental)
php scripts/translate-docs.php --from 2.x-v2 fr_FR es

# Smoke-test one file in one language
php scripts/translate-docs.php --test --single-file admin-guide/installation/configuration.md fr_FR

# Re-translate an existing file from scratch
php scripts/translate-docs.php --single-file <path> --force fr_FR

# Repair files the model wrapped in stray "---" lines (GitBook rejects these)
php scripts/translate-docs.php --fix-wrappers fr_FR

# No-arg run auto-detects languages from the 2.x-* branches and translates all .md
php scripts/translate-docs.php --dry-run
```

Applying translations to a branch (the script prints this at the end):

```bash
git checkout 2.x-fr && rsync -av translated/fr_FR/ ./ && git add -A -- ':!translated/'
```

Language codes follow Chamilo's `.po` convention (`fr_FR`, `es`, `pt_BR`, `zh_CN`, …). Short branch suffixes (`2.x-fr`) map to full codes internally.

## How the translation pipeline constrains authoring

`translate-docs.php` splits each page at heading boundaries into ~5 KB chunks, sends each to the model, then runs `checkIntegrity()` comparing source vs. translation. It asserts **heading count, code-fence count, image-reference count, and image paths all match exactly**. To keep translations clean and these checks passing:

* Keep heading levels consistent and intentional — the translator is instructed never to add/demote headings, and mismatches surface as warnings.
* Keep image paths verbatim (`/.gitbook/assets/...`) — altered paths are flagged.
* Code blocks and inline code are passed through untranslated; they must be balanced.

## Commit messages

Follow the `<Prefix>: <imperative summary>` convention from `developer-guide/contributing/git-workflow.md`. The prefix is the **singular** canonical tool name (e.g. `Exercise:`, `Learnpath:`, `Gradebook:`). Changes that touch **only this documentation site** use the `Documentation:` prefix. The full prefix table lives in that git-workflow page.
