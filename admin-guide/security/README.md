# Security

The **Security** block on the administration dashboard groups the platform's built-in security monitoring and auditing tools. It is separate from [Security Settings](../platform-settings/security-settings.md), which configures security *policy* (password rules, CAPTCHA, HTTP security headers, and so on) — this block gives you the *reports and tools* that watch the platform for suspicious activity and unwanted changes.

![The Security block on the administration dashboard, listing Activities audit, Login attempts, Simple IDS, Password strength checker, and File integrity](/.gitbook/assets/admin-security-block.png)

The block was introduced in Chamilo 2.0 with four tools and extended in Chamilo 2.1 with a fifth, **File integrity**.

## Accessing the Security Block

From the administration panel, the **Security** block appears alongside the other dashboard blocks (Users, Courses, Platform management, System, and so on). Click any of its links to open the corresponding tool.

## What's in the Block

* **[Activities Audit](activities-audit.md)** — Browse important administrative and platform events (user, course, session, and other changes) by event type
* **[Login Attempts](login-attempts.md)** — Review failed and successful login attempts, with charts and a searchable log
* **[Simple IDS](simple-ids.md)** — See requests flagged by Chamilo's built-in, lightweight intrusion detection system
* **[Password Strength Checker](password-strength-checker.md)** — Scan active users for passwords that match a list of commonly used passwords
* **[File Integrity](file-integrity.md)** *(new in Chamilo 2.1)* — Detect unexpected additions, modifications, deletions, or permission changes in the installed files

## Who Can Access It

All five tools require **Portal Administrator** access. File integrity's scan, pause, and re-baseline actions additionally require **Global Administrator** access, and pausing alerts or establishing a new baseline requires re-entering your own password — see [File Integrity](file-integrity.md#actions) for details.
