Reproduce the English documentation screenshots of `3.x` in another language's UI, so
`<lang>/.gitbook/assets/` gets faithful, native-language screenshots instead of leftover English
ones. Work through the steps below in order.

`$ARGUMENTS` is: a target language code, matching an existing `3.x/<lang>/` directory (GitBook
code, e.g. `fr`, `de`, `zh-tw` — see `gitbook-docs.yaml`), optionally followed by one or more
specific screenshot filenames to scope the run (space-separated, e.g. `fr admin-mcp-api-key.png
admin-dashboard-overview.png`). With no filenames given, process every catalogue entry whose
`confidence` is not `unreconstructed`, i.e. everything currently known how to reproduce — do **not**
silently attempt `unreconstructed` entries; see Step 3.

---

## Step 1 — Resolve the target language

Confirm `3.x/<lang>/` exists (it must already have real content — this command only replaces
screenshots, it doesn't create a new language space). Map the GitBook code to Chamilo's own
profile-locale code using the table in `3.x/en/.gitbook/assets/screenshot-catalogue.yaml`'s header
— they do not match (e.g. GitBook `zh` is Chamilo `zh_CN`, `no` has no exact Chamilo equivalent, use
`nb_NO`). If the language isn't in that table, stop and ask rather than guessing a locale code.

---

## Step 2 — Load the catalogue and pick the work set

Read `3.x/en/.gitbook/assets/screenshot-catalogue.yaml`. Build the work set:
- If specific filenames were given in `$ARGUMENTS`, use exactly those entries (error out by name for
  any that aren't in the catalogue at all).
- Otherwise, use every entry with `confidence: verified` or `confidence: inferred (...)`.

Report the work set size and list to the user before proceeding — this drives a real, time-costed
browser automation pass, not something to run silently on a large scope by default.

---

## Step 3 — Reconstruct `unreconstructed` entries first (if any are in scope)

For an entry still marked `unreconstructed`:
1. Read `doc_page` (relative to `3.x/en/`) and look at the paragraph(s) around the image reference
   for context — the alt text is often already a near-complete description of the UI state.
2. Search `/var/www/chamilo/master/assets/vue/router/*.js` for a route whose `name`/breadcrumb
   label matches the feature area (e.g. an "Access URLs" screenshot → search `admin.js` for
   `accessurl`/`AccessUrl`). Note the full path, composing parent `path:` prefixes as needed (routes
   nest under a parent's `path`, e.g. `admin.js`'s own top-level `path: "/admin"`).
3. Navigate there live (Step 5's login, still in English) to confirm the page matches the alt text
   before trusting the route. If it requires specific demo data (a named example, a particular
   count of child items, etc.) that doesn't exist by default, note that in `steps` rather than
   fabricating data to match — flag it to the user instead of inventing platform state.
4. Update the entry in `screenshot-catalogue.yaml`: fill `url`, `role`, `steps`, and set
   `confidence` to `verified` once you've actually seen the English page match the alt text live (or
   `inferred (...)` with a reason, if you're reasonably confident but haven't loaded it live).

This step touches `3.x/en/`'s catalogue regardless of which language you're localizing — it benefits
every future language, not just this run.

---

## Step 4 — Take the screenshots

Automate `http://my.chamilo.net` with Playwright, run from `/var/www/chamilo/playwright` so the
already-installed `playwright` package resolves (see `document-feature.md`, Step 5, for the same
pattern):

```bash
cd /var/www/chamilo/playwright
node -e "..."   # or write a throwaway .js file and run it from this directory / with
                # NODE_PATH=/var/www/chamilo/playwright/node_modules if it lives elsewhere
```

1. **Log in as admin/admin** first, always — this is also how you reach non-admin roles:
   - For an `admin`-role entry, stay logged in as admin.
   - For a `teacher`/`student` (Learner) entry, go to `/admin/user-list`, click **Advanced search**,
     select the **Teacher** or **Learner** role in the Roles multi-select, click **Search users**,
     then click the **Login as** action (`title="Login as"`) on a suitable demo account in the
     results (e.g. the purpose-built `teacher`/`teacher@example.com` account) — confirmed working:
     it shows an "Attempting to login as ..." then "Login successful" notification and switches the
     session to that user, with their own (smaller) menu replacing the admin one.
   - To get back to admin between entries needing different roles: open the avatar menu, **Sign
     out**, then log back in as admin/admin. There is no "return to admin" shortcut from a
     logged-in-as session — sign out and back in every time you need to switch role.
2. **Set the baseline**: go to `/account/edit`, set `#profile_locale` to `en_US`, submit. Confirm
   (e.g. by title or a known English string) before moving on — the shared instance's state is not
   guaranteed between runs. Do this for whichever account is currently logged in (admin, or the
   teacher/student you just logged in as) — each user has their own locale setting.
3. **Switch to the target locale**: same page, set `#profile_locale` to the Chamilo code resolved in
   Step 1, submit.
4. **For each entry in the work set with this role**: navigate to `url`, perform any `steps`, wait
   for network idle / the relevant element, then screenshot. Prefer `page.locator(...).screenshot()`
   over full-page when the entry's `alt` describes a specific card/panel/dialog rather than the
   whole screen. Save to `3.x/<lang>/.gitbook/assets/<file>` — same filename as the English
   original, overwriting any placeholder that's there.

   **Course-scoped entries (any `url` with `cid=`) do NOT follow the account's profile locale** —
   they follow the *course's own* Language setting instead, and once inside a course context that
   also governs the sidebar/topbar chrome, not just the tool content. Use the **AI Act** course
   (`cid=1`, resource node `5`, e.g. `/resources/gradebook/5/?cid=1&gid=0`) for every course-scoped
   entry — it's configured with "Show course in user's language: Yes" (`/resources/course-settings/5/?cid=1&gid=0`),
   so it automatically renders in whichever language the logged-in account's profile locale is set
   to, with no course-settings changes needed at all. Do not use a fixed-language course (e.g.
   "English for beginners", `cid=3`) for course-scoped entries — you'd have to toggle its Language
   field to match and back, which is extra risk for no benefit now that AI Act exists. The demo
   teacher and `fbaggins` (learner) are both already enrolled in AI Act; if a course-scoped entry
   needs a role/account not yet enrolled there, enroll it (`/resources/course-users/5/subscribe?cid=1&gid=0`)
   rather than switching courses. One known gap: AI Act's own gradebook has no items, so
   `gradebook-overview.png`-style entries render an empty table — use a different populated course
   for those specifically if a non-empty table is needed, and note it in the catalogue.
5. **Switch back to English**: return to `/account/edit`, set `#profile_locale` back to `en_US`,
   submit. Confirm the value stuck (`page.locator('#profile_locale').inputValue()`). Do this for
   *every* account you logged into this run (admin and any teacher/student used), even if something
   failed partway through Step 4 — never leave a shared account in a non-English state. If you used
   a teacher/student account, sign out of it and log back in as admin/admin before finishing, so the
   session doesn't end logged in as a non-admin demo user.

---

## Step 5 — Report

- Which screenshots were captured, into which files, for which language.
- Any entry skipped because it needed a role/credentials you didn't have, or demo data that doesn't
  exist on the shared instance — list these explicitly, don't silently drop them.
- Confirm the account's language was restored to English at the end.
- Remind the user nothing is committed automatically (this repo only commits when asked).
