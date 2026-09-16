# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

## What this repository is

This is the **Chamilo documentation site** — a GitBook Markdown project. It is *not* the Chamilo application. There is no build step, no test suite, no `package.json` or `composer.json` here. The Chamilo LMS itself lives in a separate repo ([github.com/chamilo/chamilo-lms](https://github.com/chamilo/chamilo-lms)); pages under `<version>/<language>/developer-guide/contributing/` (PHPUnit, PHPStan, Composer commands, coding conventions) describe **that** codebase and are not runnable here.

GitBook renders the site from the committed Markdown; the only executable code is the two PHP scripts in `scripts/`.

## Layout

This branch (`all`) holds every documented version and every language as one
GitBook site, mapped from a single `gitbook-docs.yaml` at the repository
root:

```
<version>/<language>/
```

e.g. `3.x/en/`, `3.x/fr/`, `2.x/es/`, `1.11.x/de/`. Each such directory is
one GitBook **space** — a self-contained book with its own:

* `.gitbook.yaml` — space-level config (content root, first page, nav file)
* `README.md` — the space's front page
* `SUMMARY.md` — the space's table of contents (GitBook's source of truth for that space's navigation — see `developer-guide/contributing` pages under each language for authoring conventions)
* `.gitbook/assets/` — screenshots referenced from that space's pages as `/.gitbook/assets/<name>.png` or `../../.gitbook/assets/<name>.png`, depending on the version. **Assets are not shared across spaces** — GitBook has no central/shared assets mechanism for a monorepo-style site, so the same screenshot is duplicated once per language directory that needs it. Never point a page at another space's `.gitbook/assets/`.
* the guide folders themselves (`teacher-guide/`, `admin-guide/`, `developer-guide/`, `student-guide/` for `3.x`; equivalent translated folder names for older versions/languages, e.g. `manual-del-profesor/` for `1.11.x/es/`)

`scripts/` (release tagging + AI translation tooling) lives once at the
repository root — it's tooling, not per-space content, so it isn't
duplicated into every version/language directory.

Versions included in this structure: `1.11.x`, `2.x`, `3.x`. Older versions
(`1.9.x`, `1.10.x`) predate the GitBook Markdown format entirely (`.odt`
files and an HTML export, no `SUMMARY.md`) and are **not** part of this
branch; they remain on their own legacy branches as an archive.

## Branch model (superseded)

Before this branch existed, each version+language combination lived on its
own branch (`3.x`, `3.x-fr`, `2.x`, `2.x-fr`, ...), because GitBook's older
Git Sync connected one space to one branch. GitBook's Git Sync now expects a
single site-wide `gitbook-docs.yaml` mapping every space to a **directory**
within **one** branch — a branch can no longer stand in for "one language of
one version." Those old branches still exist (useful as history / fallback)
but are no longer where documentation changes should be made; edit here, in
`all`, going forward.

## Known follow-up work

`scripts/tag-release.php` and `scripts/translate-docs.php` were written
against the old one-branch-per-version-per-language layout (they operate on
the repository root and on other branches by name). They have **not** been
updated for the `<version>/<language>/` directory structure yet, and will
need changes before they can be used as-is against this branch — check their
current behavior before relying on them here.

## Commit messages

Follow the `<Prefix>: <imperative summary>` convention from
`3.x/en/developer-guide/contributing/git-workflow.md`. The prefix is the
**singular** canonical tool name (e.g. `Exercise:`, `Learnpath:`,
`Gradebook:`). Changes that touch only this documentation site use the
`Documentation:` prefix.
