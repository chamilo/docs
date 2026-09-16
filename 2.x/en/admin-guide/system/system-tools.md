# System Tools

This page covers the System block's maintenance and inspection utilities.

## Clean Temporary Files

**System > Clean temporary files** shows how many temporary upload files exist and how much space they use, then lets you purge them — either everything, or only files older than a configurable age. A dry-run mode lets you preview what would be deleted first. The same action also clears stale legacy build files and regenerates compiled CSS assets.

## System Update

**System > System update** runs Chamilo's self-update workflow directly from the admin panel, as a sequence of discrete, resumable steps:

1. **Status** — Reports the installed version and where update/staging/backup directories are, along with the trusted signing key in use
2. **Check** — Looks up whether a newer version is available from the configured update source
3. **Verify** — Downloads the update package and its signature, and checks it against the manifest checksum and the trusted public key
4. **Preflight** — Validates system requirements and compatibility before anything is touched
5. **Stage** — Extracts the verified package into an isolated staging directory; nothing in the live installation changes yet
6. **Apply plan** — Builds a diff of files to add, replace, or remove, based on the staged package
7. **Apply files** — Copies files into place. This requires explicit confirmation, and creates a backup of every file it overwrites plus a lock file that blocks a second update from running concurrently
8. **Migration safety / post-apply checks** — Validates pending database migrations and post-install state
9. **Run post-apply** — Executes post-apply console commands (such as database migrations), but only if your server configuration allows running them from the UI, and only after you type an explicit confirmation phrase and confirm a backup was taken

Long-running steps report progress so the page can be safely left open while they complete. The combination of signature verification, staging before applying, pre-overwrite backups, a concurrency lock, and typed confirmations before database changes is designed to make this workflow safe to run without shell access — but a manual backup before starting is still good practice; see [Backups](../maintenance/backups.md).

## File Info

**System > File info** lists every uploaded resource file, searchable by name, showing its physical path, whether it's an orphan (not linked to any course or session), and how many places reference it. From here you can attach an orphaned file to a resource, detach it, or delete it — useful for tracking down and cleaning up storage that no longer belongs to any course.

## Resources by Type

**System > Resources by type** lets you pick a resource type and see, across every course and session, an aggregated count and list of items of that type, when they were created, and (where applicable) which users are associated with them. Use it to answer questions like "how many forums exist platform-wide" or "which courses have the most documents."

## List Icons

**System > List icons** is a browsable catalog of Chamilo's built-in icon set, grouped by category. It's mainly useful when developing plugins or themes and needing to confirm an icon's exact name, but it's exposed here as a general reference.

## Development-Only Tools

Two more items can appear in this block, but only when the server has a `tests/` directory present — which normally only happens on a development or QA install, never in production:

* **Data filler** generates large volumes of fake users, courses, and online-user records, for load- or QA-testing.
* **E-mail tester** sends a real test e-mail through the platform's configured mailer, to confirm your SMTP/mail settings actually work, and shows recent send failures if any.

If you don't see these two links, that's expected — it means your installation doesn't have a `tests/` directory, which is the normal, correct state for a production platform.
