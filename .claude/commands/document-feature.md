Document the Chamilo feature described by `$ARGUMENTS` in this GitBook site. Work through the
steps below in order. **Read before writing.** Present your findings and your proposed placement
to the user and wait for confirmation before creating or editing any `.md` page — unless the user's
arguments already specify the target section, in which case follow that instruction directly.

`$ARGUMENTS` is one of:
- A feature name or free-text description (e.g. `the new course description catalog popup`)
- One or more commit SHAs (short or long, space-separated) from `chamilo/chamilo-lms`
- Either of the above followed by an explicit target, e.g. `... in admin-guide/platform-settings`
  or `... section: teacher-guide/creating-your-course`

---

## Step 1 — Parse arguments

Split `$ARGUMENTS` into:
- **subject**: the commit SHA(s) or the free-text feature description.
- **target_section** (optional): if the text contains "in `<path>`" or "section: `<path>`", extract
  it as the user-mandated placement. Otherwise leave unset — you will propose a placement in Step 4.

---

## Step 2 — Locate the source

Prefer the local checkout at `/var/www/chamilo/master` (Chamilo LMS, `master` branch — the branch
that corresponds to this docs site's `3.x` line). Do not `git pull`/`git fetch` without checking
first whether the referenced commit(s) already exist locally — a silent fetch can pull in unrelated
upstream changes onto a checkout that may have local state.

```bash
cd /var/www/chamilo/master
git status                      # confirm branch and cleanliness before doing anything
git log --oneline -5
git cat-file -e <sha>^{commit} 2>/dev/null && echo present || echo missing
```

- If the commit(s) are present locally, use `git show <sha>` / `git log --grep` / `git log -S` there.
- If missing locally, or no local checkout is available, fall back to
  `https://github.com/chamilo/chamilo-lms/commit/<sha>` or
  `https://github.com/chamilo/chamilo-lms/tree/master` via WebFetch — read the diff and any linked
  PR description.
- If `subject` is a free-text description with no commit given, search the local checkout instead:
  `grep -rn` across `src/CoreBundle/`, `src/CourseBundle/`, `assets/vue/` for matching controllers,
  entities, Vue views, and locale strings (`assets/locales/en_US.json`) that implement the feature.

---

## Step 3 — Understand the feature

From the diff/code, answer before writing anything:
- What does the feature actually do, end to end? What problem does it solve for the user?
- Who is it for — admin, teacher, learner, or all? Is it course-scoped, session-scoped, or
  platform-wide?
- Is it gated behind a platform setting (`SettingsCurrentFixtures.php`, `config/settings_override.yaml`)
  or a role/permission check? Note the exact setting variable name if so.
- Does it introduce new UI (Vue view/component), a new API endpoint, or is it backend/admin-only
  with no visible UI (in which case a screenshot may not be possible or useful)?
- What is the exact user-facing wording? Pull button/label text from
  `assets/locales/en_US.json` or the Vue template — never invent UI copy from memory.
- Is there a related MDI icon (`<span class="mdi mdi-...">` in the Vue component)? Note its name.

If the feature is unclear or the commit is a pure refactor/fix with no user-visible behavior change,
stop and tell the user — do not manufacture documentation for something with nothing to document.

---

## Step 4 — Decide where it belongs

If `target_section` was given, validate it exists (or is a sensible new file under an existing
section) and use it — no need to ask.

Otherwise, inspect `SUMMARY.md` and the three guides (`admin-guide/`, `teacher-guide/`,
`developer-guide/`) to find the best-fitting existing section, following the same reasoning as
existing placements (e.g. audience — admin-only config vs. teacher-facing course tool vs. developer
API/architecture; and proximity — does it belong as its own page, or as a subsection of an existing
page). Prefer adding to an existing page over creating a new one when the feature is a small
addition to an existing tool/setting.

Present to the user:
- The proposed file (new or existing) and its position in `SUMMARY.md`.
- A one-line justification (mirrors how "Course Description" was justified as its own page under
  Creating Your Course rather than under a generic Tools list).

Wait for explicit confirmation before proceeding to Step 6, unless `target_section` was already given.

---

## Step 5 — Prepare the local instance for screenshots (only if the write-up will exceed ~500 words)

Use the local instance at **http://my.chamilo.net** (served from `/var/www/chamilo/master/public`).
Automate it with real Playwright, available via the `playwright` package already installed under
`/var/www/chamilo/playwright/node_modules` — run Node scripts from that directory so the module
resolves:

```bash
cd /var/www/chamilo/playwright
node -e "
const { chromium } = require('playwright');
(async () => {
  const browser = await chromium.launch();
  const page = await browser.newPage({ viewport: { width: 1440, height: 900 } });
  // ... navigate, log in, set language, screenshot ...
  await browser.close();
})();
"
```

Before shooting:
1. **Log in** as an account with the role you need (admin/admin for admin-guide shots; a teacher
   account for teacher-guide shots).
2. **Force English interface language** for that profile: go to the user's account settings
   (profile edit page) and set **Language** to English, *before* navigating to the feature — do
   this even if you believe it is already English, since the shared demo instance's state is not
   guaranteed between sessions.
3. **If the feature is course-related**, open the course's settings and confirm/set the course
   **Language** to English too, so course-scoped strings (that follow the course language rather
   than the platform interface language) render in English.
4. Navigate to the actual feature screen, wait for network idle / the relevant element to be
   visible, then screenshot the smallest meaningful region (prefer `page.locator(...).screenshot()`
   over a full-page shot when a card/panel/dialog is the actual subject).
5. Save under `.gitbook/assets/` following the existing naming convention (`<guide-prefix>-<feature-slug>.png`,
   e.g. `admin-mcp-api-key.png`, `course-creation-form.png`).

Only take a screenshot if it adds real information beyond the text (a form layout, a result the
user needs to recognize, an icon's exact appearance). Skip it for pure text/behavior descriptions.

---

## Step 6 — Write the page

Follow this site's existing conventions (see `CLAUDE.md` and neighboring pages in the target guide):
- Match heading structure of sibling pages in the same section (a top `#` title, then `##` sections).
- Reference the feature's icon inline on first mention with
  `<img src="/.gitbook/assets/icons/mdi-<name>.svg" alt="..." data-size="line">`. If the icon SVG
  doesn't exist yet under `.gitbook/assets/icons/`, source the real path data from
  `/var/www/MaterialDesign/svg/<name>.svg` (local MaterialDesign checkout) — never fabricate path
  data — and reformat it to the single-line convention already used by other icons in that
  directory (no `id`/`class` attributes, `viewBox="0 0 24 24"`).
- Embed screenshots with a full descriptive alt text: `![What the image shows](/.gitbook/assets/<name>.png)`.
- Keep heading levels and code-fence/image-reference counts intentional — the translation pipeline
  (`scripts/translate-docs.php`) asserts these match exactly between source and translated pages.
- Explain any gating platform setting by name (`` `variable_name` ``) and where to find it in
  **Administration > Configuration settings > \<category>**, matching the phrasing used in
  `admin-guide/platform-settings/*.md`.

Then wire the page in:
- `SUMMARY.md` — insert the new entry in the position agreed in Step 4.
- The section's `README.md` index (if that section has one with a page list / "Next Steps"), adding
  a one-line description, matching the style of existing entries.

---

## Step 7 — Verify

- Re-read the written page. Confirm every relative link resolves given the file's actual location
  (a common past mistake: writing a `../` link from inside a file that doesn't need it).
- Confirm every referenced icon/screenshot file actually exists at the path used.
- Confirm the `SUMMARY.md` entry's path matches the file's real path exactly.
- If the section lists a settings/tool count anywhere (e.g. "This category contains **N settings**"),
  update it.

---

## Step 8 — Summary

Report to the user, without committing anything (this repo only commits when explicitly asked):
- Files created/edited, with paths.
- Screenshot(s) taken and where they were saved, or why none were needed.
- The commit prefix this change should use if/when committed (per
  `developer-guide/contributing/git-workflow.md` — `Documentation:` for docs-only changes, or the
  singular tool-name prefix if one clearly fits).
- Any part of the feature you could not verify (e.g. a setting whose effect you inferred from code
  rather than observed live) — flag it as `[inferred]` inline in the doc, matching the convention
  already used in `admin-guide/platform-settings/*.md`.
