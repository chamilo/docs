# Security Settings

Security settings protect your Chamilo platform against unauthorized access and common attacks. Access them from **Administration > Configuration settings > Security**.

![The security settings page showing login protection, password policy, and file upload restriction options](/.gitbook/assets/admin-settings-security.png)

## Login Protection

| Setting | Description |
|---------|-------------|
| **Max login attempts before blocking account** (`login_max_attempt_before_blocking_account`) | The number of failed login attempts allowed before the account is blocked. Set to 0 to disable. |
| **Enable CAPTCHA** | Globally turn on the CAPTCHA on the login page. Helps prevent brute-force attacks. CAPTCHA is either on or off — there is no built-in setting that switches it on automatically after N failed logins. |
| **CAPTCHA mistakes before blocking** (`captcha_number_mistakes_to_block_account`) | When CAPTCHA is enabled, the number of CAPTCHA mistakes a user can make before their account is blocked. This is independent of the login-attempt counter above. |

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

## Two-Factor Authentication

| Setting | Description |
|---------|-------------|
| **Enable two-factor authentication** (`2fa_enable`) | When enabled, users can turn on TOTP-based 2FA from their profile. The login flow then asks for the 6-digit code from their authenticator app in addition to their password. |

## Intrusion Detection System (IDS)

Chamilo ships with a minimal IDS that scans incoming requests for common attack signatures (SQL injection, XSS, path traversal, command injection, scanner probes). It is configured via environment variables in `.env` (or `.env.local`) — see `config/packages/chamilo_ids.yaml`:

| Variable | Description |
|----------|-------------|
| `IDS_ENABLED` | `true` (default) to enable scanning, `false` to disable. |
| `IDS_BLOCK` | `false` (default) only logs detections; `true` rejects suspicious requests with HTTP 400. |
| `IDS_SECURITY_HEADERS` | `true` to inject standard OWASP response headers (`X-Frame-Options`, `X-Content-Type-Options`, `Referrer-Policy`, etc.) for every response. |

Detections are written to `var/logs/ids/ids_events.log` with daily rotation. The admin UI at **/admin/security/simple-ids** lists recent events and shows a daily-volume chart.

## Additional Security Settings

| Setting | Description |
|---------|-------------|
| **Allow browser auto-remember** | Whether the "Remember me" checkbox appears on the login page. |
| **Session lifetime (seconds)** | How long a user session remains valid without activity. Default is typically 3600 (1 hour). |
| **Force HTTPS** | Redirect all HTTP requests to HTTPS. Requires a valid SSL/TLS certificate on your web server. |
| **Prevent iframe embedding** | Send X-Frame-Options headers to prevent your platform from being embedded in iframes on other sites (clickjacking protection). |

## Tips

* **Always enforce HTTPS** in production. Credentials and session cookies sent over unencrypted connections can be intercepted.
* **Set a reasonable lockout policy** — a small number of allowed login failures, combined with CAPTCHA on the login page, raises the cost of brute-force attempts noticeably.
* **Block executable extensions** as a baseline and use an allowlist for known-safe file types.
* **Review IDS logs periodically** — the admin IDS view (or `var/logs/ids/ids_events.log`) is the fastest way to see what scanners and probes are hitting your portal.
