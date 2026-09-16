# Password Strength Checker

The Password Strength Checker scans active users' stored password hashes against a short list of commonly used passwords (`123456`, `password`, `qwerty123`, and similar). It never displays or transmits the passwords themselves — only whether a user's current password matches one of the known-weak candidates.

## Accessing the Password Strength Checker

From the administration panel, click **Security > Password strength checker**.

## Running a Scan

![The Password strength checker page, with a field for user IDs to scan and a button to run the scan](/.gitbook/assets/admin-security-password-strength.png)

* Leave **User IDs to scan** empty to scan every active user, or enter a comma-separated list of user IDs to check a subset
* Click **Run password strength scan**

The scan runs asynchronously in the background so it does not freeze the page, showing live progress (verified users so far, out of the total, and how many weak passwords have been found). Because every candidate password has to be checked against every selected user's hash, scanning all users on a large platform can take a while — the candidate list is kept intentionally short to limit this cost.

## Acting on Results

![The completed scan results, listing a flagged user with Name, Username, and E-mail columns, and per-row actions to request a password change or force a password reset](/.gitbook/assets/admin-security-password-strength-results.png)

Once the scan finishes, flagged users are listed with two available actions, either per user or as a bulk action for all selected users:

* **Request password change** (envelope icon) — Sends the user an e-mail asking them to change their password
* **Force password reset** (reset icon) — Immediately invalidates the user's current password and e-mails them a new one

Both actions re-verify the selected users against the weak-password list before acting, so a stale or tampered request cannot be used to reset an account that no longer has a weak password.

## Recommended Use

* Run this scan periodically, especially after a bulk user import (imported accounts sometimes ship with simple default passwords)
* Pair it with the **Minimal password syntax requirements** and **Password rotation interval** settings in [Security Settings](../platform-settings/security-settings.md) to prevent weak passwords from being set in the first place, rather than only catching them after the fact
