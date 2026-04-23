# Security Guide

This guide covers security best practices for running a Chamilo 2.0 platform in production. Security is a shared responsibility between the platform software, your server configuration, and ongoing operational practices.

## Keep Chamilo Updated

The most important security practice is keeping your Chamilo installation up to date.

* Subscribe to the Chamilo security mailing list or watch the GitHub repository for release announcements.
* Apply security patches promptly. Minor updates within the 2.0 branch are designed to be safe to apply.
* Follow the [upgrade process](../installation/upgrading.md) for each update.

## HTTPS

Always serve Chamilo over HTTPS in production.

* Obtain an SSL/TLS certificate (Let's Encrypt provides free certificates via Certbot).
* Configure your web server to redirect all HTTP traffic to HTTPS.
* Enable the HSTS (HTTP Strict Transport Security) header to prevent downgrade attacks:

  ```
  Strict-Transport-Security: max-age=31536000; includeSubDomains
  ```

* Set `APP_URL` in `.env.local` to an `https://` URL.

Without HTTPS, login credentials, session cookies, and all user data are transmitted in plain text and can be intercepted on the network.

## File Permissions

Restrict file permissions to the minimum necessary.

| Path | Owner | Permissions | Notes |
|------|-------|-------------|-------|
| Application files (source code) | root or deploy user | 755 (dirs), 644 (files) | Web server needs read-only access. |
| `var/cache/` | web server user | 775 | Must be writable for Symfony cache. |
| `var/log/` | web server user | 775 | Must be writable for logs. |
| `var/upload/` | web server user | 775 | Must be writable for file uploads. |
| `.env.local` | root or deploy user | 640 | Contains secrets. Web server needs read access only. |

Never set permissions to 777. Never run the web server as root.

## Password Policies

Configure strong password requirements in [Security Settings](../platform-settings/security-settings.md):

* Minimum length of 8 characters (12+ recommended).
* Require a mix of uppercase, lowercase, numbers, and special characters.
* Consider enabling password expiration for compliance-driven environments.
* Educate users about choosing strong, unique passwords.

## Rate Limiting and Brute-Force Protection

### Application Level

* Set **max login attempts** to 5 in Chamilo security settings.
* Enable **CAPTCHA** after 3 failed attempts.
* Set a lockout duration of at least 15 minutes.

### Server Level

Use **fail2ban** to monitor login failures and block offending IP addresses:

```ini
# /etc/fail2ban/jail.d/chamilo.conf
[chamilo]
enabled = true
port = http,https
filter = chamilo-auth
logpath = /path/to/chamilo/var/log/prod.log
maxretry = 5
bantime = 900
```

Create a matching filter in `/etc/fail2ban/filter.d/chamilo-auth.conf` to match authentication failure log entries.

## Session Management

* Set a reasonable **session lifetime** (e.g., 3600 seconds / 1 hour) in security settings.
* Configure **session cookie flags** in your Symfony configuration:

  ```yaml
  # config/packages/framework.yaml
  framework:
      session:
          cookie_secure: true      # Only send over HTTPS
          cookie_httponly: true     # Not accessible via JavaScript
          cookie_samesite: lax     # CSRF protection
  ```

* Consider disabling "Remember me" on platforms with sensitive content.

## HTTP Security Headers

Configure your web server to send security headers:

| Header | Value | Purpose |
|--------|-------|---------|
| `X-Content-Type-Options` | `nosniff` | Prevents MIME-type sniffing. |
| `X-Frame-Options` | `SAMEORIGIN` | Prevents clickjacking via iframes. |
| `X-XSS-Protection` | `1; mode=block` | Legacy XSS protection for older browsers. |
| `Referrer-Policy` | `strict-origin-when-cross-origin` | Controls referrer information leakage. |
| `Content-Security-Policy` | Varies | Controls which resources can be loaded. Requires careful tuning for Chamilo. |

Example for Apache:

```apache
Header always set X-Content-Type-Options "nosniff"
Header always set X-Frame-Options "SAMEORIGIN"
Header always set Referrer-Policy "strict-origin-when-cross-origin"
```

Example for Nginx:

```nginx
add_header X-Content-Type-Options "nosniff" always;
add_header X-Frame-Options "SAMEORIGIN" always;
add_header Referrer-Policy "strict-origin-when-cross-origin" always;
```

## File Upload Security

* Block executable file extensions (exe, bat, sh, php, phtml, cgi) in [Security Settings](../platform-settings/security-settings.md).
* Configure your web server to **never execute uploaded files**. For Apache, add to the upload directory:

  ```apache
  <Directory /path/to/chamilo/var/upload>
      php_admin_flag engine off
      RemoveHandler .php .phtml .php3 .php5
  </Directory>
  ```

* Scan uploaded files with an antivirus (ClamAV) if your environment requires it.

## Database Security

* Use a **dedicated database user** for Chamilo with only the privileges it needs (SELECT, INSERT, UPDATE, DELETE, CREATE, ALTER, DROP, INDEX on the Chamilo database).
* Do not use the root database account.
* Ensure the database is not accessible from the public internet. Bind it to localhost or a private network.
* Enable database audit logging for compliance-sensitive environments.

## Backups

* Schedule **daily automated backups** of both the database and uploaded files.
* Store backups in a separate location from the server (offsite or cloud storage).
* Test backup restoration periodically to verify that backups are usable.
* Encrypt backups if they contain sensitive data.

See [Backups](../maintenance/backups.md) for detailed instructions.

## Monitoring

* Monitor Chamilo logs at `var/log/prod.log` for errors and suspicious activity.
* Set up server monitoring (CPU, memory, disk) to detect resource exhaustion.
* Configure alerts for repeated authentication failures.
* Periodically review user accounts for unauthorized or dormant accounts.

## Checklist

Use this checklist when deploying or auditing a Chamilo installation:

- [ ] HTTPS enabled with valid certificate
- [ ] HTTP to HTTPS redirect configured
- [ ] `APP_ENV=prod` and `APP_DEBUG=0` in `.env.local`
- [ ] Unique `APP_SECRET` generated
- [ ] File permissions restricted (no 777)
- [ ] Password policy configured
- [ ] Max login attempts and CAPTCHA enabled
- [ ] Executable file extensions blocked
- [ ] Security headers configured on web server
- [ ] Session cookie flags set (secure, httponly, samesite)
- [ ] Database user has minimal privileges
- [ ] Automated backups scheduled and tested
- [ ] Log monitoring in place
- [ ] Chamilo version is current
