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
* `.gitbook/assets/` — screenshots referenced from that space's pages with a **relative** path, `../` once per directory level between the page and its own space root, e.g. `../../.gitbook/assets/<name>.png` from a page two levels deep. **Never use a leading-slash path** (`/.gitbook/assets/<name>.png`) — in this monorepo/site-wide Git Sync setup a leading slash does not resolve to the space's own root, and pages using it render with no image at all on the published site (confirmed the hard way: every `2.x`/`3.x` page used to use this form, and every image on the live site was broken as a result — fixed across 2609 files). **Assets are not shared across spaces** — GitBook has no central/shared assets mechanism for a monorepo-style site, so the same screenshot is duplicated once per language directory that needs it. Never point a page at another space's `.gitbook/assets/`.
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

## Scripts

`scripts/tag-release.php` and `scripts/translate-docs.php` operate on one
`<version>` at a time (pass it explicitly, e.g. `--version 3.x`), reading
from `<version>/en/` and writing to `<version>/<lang>/`. Run each with no
arguments (or `--help`-style misuse) to see usage. `translate-docs.php` uses
GitBook's language codes (`fr`, `pt-br`, `zh-tw`, ...), not Chamilo's own
locale codes — see the note in `## Screenshots` below, the same mismatch
applies there.

## Screenshots

Every screenshot in `<version>/en/.gitbook/assets/` is catalogued in
`<version>/en/.gitbook/assets/screenshot-catalogue.yaml`: filename, the doc
page it appears on, the `my.chamilo.net` URL that shows it, the account role
needed, and any steps beyond plain navigation. This is what lets a
screenshot be reproduced in another language without re-guessing the page
from its surrounding prose every time.

Two Claude Code commands drive this:

* `.claude/commands/document-feature.md` — writes a new English doc page for
  a feature, taking any needed screenshots and recording them in the
  catalogue (Step 5).
* `.claude/commands/localize-screenshots.md` — given a target language,
  reproduces the catalogued screenshots in that language's UI and saves them
  into `<version>/<lang>/.gitbook/assets/`.

Both drive the local instance at `http://my.chamilo.net` (admin/admin) with
Playwright (`/var/www/chamilo/playwright`, not this repo — there is no
Node.js tooling here). **Chamilo's own profile-language codes don't match
GitBook's** (e.g. GitBook `fr` is Chamilo `fr_FR`, `zh` is `zh_CN`, `no` has
no exact match — see the catalogue file's header for the full table).

Course-scoped screenshots (any catalogue `url` with `cid=`) don't follow the
account's profile locale — they follow the *course's own* Language setting,
chrome included. Use the **AI Act** course (`cid=1`, node `5`) for these: it's
configured with "Show course in user's language: Yes", so it just works with
no course-settings changes. Details in `localize-screenshots.md`, Step 4.

## Commit messages

Follow the `<Prefix>: <imperative summary>` convention from
`3.x/en/developer-guide/contributing/git-workflow.md`. The prefix is the
**singular** canonical tool name (e.g. `Exercise:`, `Learnpath:`,
`Gradebook:`). Changes that touch only this documentation site use the
`Documentation:` prefix.
