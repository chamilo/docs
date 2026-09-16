# Health Check

Health Check is a small block on the administration dashboard that runs a handful of live checks on your installation and flags anything that needs attention — no need to dig through configuration files to spot common misconfigurations.

![The Health check block on the administration dashboard, showing pass/fail status for e-mail settings, admin URL assignment, and file permission checks](/.gitbook/assets/admin-health-check-block.png)

## Accessing Health Check

From the administration panel, the **Health check** block appears alongside the other dashboard blocks — no click needed, the results are shown directly.

## The Checks

* **E-mail settings** — Verifies that a mailer connection string and a "from" e-mail/name are configured. If not, links to Mail settings to fix it.
* **All URLs have at least one admin assigned** — On a multi-URL install, checks that every access URL has at least one administrator who can manage it. If one doesn't, links to the access URL/user assignment page.
* **`.env` is not writable** — `.env` holds secrets and should not be writable by the web server after installation. Flagged as an error if it is; links to the Security Guide.
* **`config/` is not writable** — Same reasoning as `.env`: this directory should not be web-writable in normal operation. Links to the Security Guide.
* **`var/cache` is writable** — The opposite check: Symfony needs to write to its cache directory, so this one is flagged as an error if it *isn't* writable. Links to the Performance Tuning / optimization guide.
* **Install folder is not present** — The `public/main/install` folder is only needed during installation and should be removed afterward. This is flagged as a warning (not a hard error) if it still exists, since it's a lower-severity risk than the two writability checks above. Links to the Security Guide.

## What to Do About It

Each check links directly to where you'd fix the underlying issue — either a settings page or the relevant guide. Run through this list right after installation, and periodically afterward (for example, after a manual file transfer or permissions change), since a passing check today doesn't guarantee it stays that way. For a broader production hardening checklist beyond these six checks, see the [Security Guide](appendix/security-guide.md).
