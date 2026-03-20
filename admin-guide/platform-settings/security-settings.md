# Security Settings

Security settings protect your Chamilo platform against unauthorized access and common attacks. Access them from **Administration > Configuration settings > Security**.

![The security settings page showing login protection, password policy, and file upload restriction options](/.gitbook/assets/admin-settings-security.png)

## Login Protection

| Setting | Description |
|---------|-------------|
| **Max login attempts** | The number of failed login attempts allowed before the account is temporarily locked. A typical value is 5. Set to 0 to disable lockout (not recommended). |
| **Lockout duration (minutes)** | How long an account remains locked after exceeding the max login attempts. |
| **Enable CAPTCHA** | Display a CAPTCHA on the login page after a configurable number of failed attempts. Helps prevent brute-force attacks. |
| **CAPTCHA attempts threshold** | The number of failed attempts before the CAPTCHA is shown. For example, set to 3 to show CAPTCHA after 3 failed logins. |

## Password Policy

Configure minimum requirements for user passwords.

| Setting | Description |
|---------|-------------|
| **Minimum password length** | The minimum number of characters required. Recommended: 8 or more. |
| **Require uppercase letters** | Passwords must contain at least one uppercase character. |
| **Require lowercase letters** | Passwords must contain at least one lowercase character. |
| **Require numbers** | Passwords must contain at least one digit. |
| **Require special characters** | Passwords must contain at least one non-alphanumeric character (e.g., !, @, #). |
| **Password expiration (days)** | Force users to change their password after a set number of days. Set to 0 to disable expiration. |

Password policy changes apply to newly created passwords. Existing passwords are not retroactively validated, but users will be required to meet the new policy on their next password change.

## File Upload Restrictions

| Setting | Description |
|---------|-------------|
| **Allowed file extensions** | A whitelist of permitted file extensions for uploads (e.g., pdf, docx, png, zip). Files with extensions not on the list are rejected. |
| **Blocked file extensions** | A blacklist of prohibited extensions (e.g., exe, bat, sh, php). Takes precedence over the allowed list. |
| **Maximum upload size** | The maximum file size allowed per upload. This is also constrained by the PHP `upload_max_filesize` and `post_max_size` directives. |

Always block executable file types to prevent users from uploading malicious files.

## Intrusion Detection System (IDS)

Chamilo includes a basic intrusion detection mechanism that monitors incoming requests for suspicious patterns such as SQL injection attempts, cross-site scripting (XSS), and path traversal.

| Setting | Description |
|---------|-------------|
| **Enable IDS** | Activates request inspection. |
| **IDS action** | What happens when a suspicious request is detected: **log only**, **log and block**, or **log and notify administrator**. |
| **IDS sensitivity** | Controls how aggressively the system flags requests. Higher sensitivity catches more threats but may produce false positives. |

IDS logs are stored in the system and can be reviewed by administrators to identify potential attacks.

## Additional Security Settings

| Setting | Description |
|---------|-------------|
| **Allow browser auto-remember** | Whether the "Remember me" checkbox appears on the login page. |
| **Session lifetime (seconds)** | How long a user session remains valid without activity. Default is typically 3600 (1 hour). |
| **Force HTTPS** | Redirect all HTTP requests to HTTPS. Requires a valid SSL/TLS certificate on your web server. |
| **Prevent iframe embedding** | Send X-Frame-Options headers to prevent your platform from being embedded in iframes on other sites (clickjacking protection). |

## Tips

* **Always enforce HTTPS** in production. Credentials and session cookies sent over unencrypted connections can be intercepted.
* **Set a reasonable lockout policy** -- 5 attempts with a 15-minute lockout balances security and usability.
* **Block executable extensions** as a baseline and use an allowlist for known-safe file types.
* **Review IDS logs periodically** to identify attack patterns and adjust your security configuration.
