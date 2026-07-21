# File Integrity

*New in Chamilo 2.1.*

File Integrity compares the files installed on your server against a trusted baseline, to detect additions, modifications, deletions, and permission changes you didn't expect — the kind of change a successful intrusion, a compromised dependency, or a mistaken manual edit would leave behind.

## Accessing File Integrity

From the administration panel, click **Security > File integrity**.

## What It Shows

![The File integrity page showing last scan information, panels for Added, Modified, Deleted and Permissions changed files, an Alert history list, and Actions to run a scan, pause alerts, or establish a new baseline](/.gitbook/assets/admin-security-file-integrity.png)

* **Last scan** — When the most recent scan ran and how many files it checked
* **Added / Modified / Deleted** — Files that differ from the baseline, identified by comparing SHA-256 checksums (each list is capped at 500 paths, with a note if the full list is longer — see the CEF log below for the complete list)
* **Permissions changed** — Files whose permissions differ from the baseline. On Linux, this compares POSIX mode bits directly (for example, a file becoming world-writable is flagged); on Windows, only the read-only attribute is tracked, since `fileperms()` doesn't reflect real NTFS ACLs
* **Alert history** — A durable, append-only log of every scan that found something (up to the last 50). Unlike the report above, this list is never cleared by a clean scan or a new baseline, so past alerts stay visible even after the drift they flagged has been resolved

The check walks the entire installed file tree except the `var/` and `.git/` directories — with one exception: `.git/config` is still watched individually, specifically to catch a Git remote being silently repointed to a hostile server. Symbolic links are never followed, to avoid traversal loops or escaping the installation directory.

Because a full scan of a large installation can take several minutes, the walk is chunked (one top-level directory at a time) and its progress is tracked in a lock file — so the page can safely be reloaded to check progress, and a crashed or killed scan is never mistaken for one still running.

## Actions

* **Run a scan now** — Compares the current file tree to the baseline immediately
* **Pause for 1 hour** — Temporarily suspends alerting (for example, while you deploy an update). Requires re-entering your own password. While paused, a scan silently adopts the current tree as the new baseline instead of alerting, so the pause window closes without leftover alerts. The maximum pause is 24 hours
* **Establish new baseline** — Adopts the current file tree as the new trusted reference. Requires re-entering your own password

Pausing alerts or establishing a new baseline can hide an ongoing intrusion, which is why both require your password again — a hijacked admin session alone is not enough to silence detection while files are being tampered with.

## Running from Cron

The same checks are available as console commands, intended to be scheduled with cron rather than run from the admin page on a schedule:

```bash
# Scan for drift and alert admins if anything changed
0 3 * * * cd /var/www/chamilo/master && php bin/console app:file-integrity:scan

# Generate or regenerate the baseline (run once after install, or after a manual update)
php bin/console app:file-integrity:baseline

# Pause alerting from the command line (prompts for a global administrator's username and password)
php bin/console app:file-integrity:snooze
```

`app:file-integrity:scan` does nothing if file integrity checking is disabled in settings (see below). If a pause is active, it re-baselines silently instead of alerting, matching the behavior of a scan triggered from the admin page.

## Settings

Two related settings live in **Configuration settings > Security**:

* **`file_integrity_check_enabled`** — Turns the scheduled/cron check on or off (default: off)
* **`file_integrity_check_notify_admins`** — A list of e-mail addresses to notify when drift is found; if left empty, every Global Administrator is notified

## SIEM Integration

Every scan also writes CEF (Common Event Format) log lines to `var/logs/security/file_integrity.log`, suitable for ingestion by a SIEM (Wazuh, Splunk, QRadar, ArcSight, Elastic/Filebeat, and similar tools). Each line is tagged with a signature ID identifying the kind of change:

| Signature | Meaning |
|-----------|---------|
| `FIM-ADDED` | A new file appeared |
| `FIM-MODIFIED` | A file's contents changed |
| `FIM-DELETED` | A file disappeared |
| `FIM-GITCONFIG` | `.git/config` changed (possible hijacked remote) |
| `FIM-PERMS` | A file's permissions changed |
| `FIM-TRUNCATED` | The report for a category was capped; consult the log for the full list |

## Recommended Use

1. Establish a baseline right after installation, and again after every manual update or deployment
2. Enable `file_integrity_check_enabled` and schedule `app:file-integrity:scan` in cron (for example, nightly)
3. Before a planned maintenance window that will change files (an update, a migration), use **Pause for 1 hour** rather than disabling checks outright
4. Feed `var/logs/security/file_integrity.log` into your existing log monitoring or SIEM if you have one
