# FAQ

Frequently asked questions for Chamilo 2.0 administrators.

## Installation and Setup

**Q: What PHP version does Chamilo 2.0 require?**
A: PHP 8.2 or higher. PHP 8.3 is recommended. See [Server Requirements](../installation/server-requirements.md).

**Q: Can I run Chamilo on shared hosting?**
A: It is possible but not recommended. Chamilo 2.0 requires Composer, Node.js, and command-line access for installation and maintenance. A VPS or dedicated server provides a much better experience.

**Q: Which database should I use?**
A: MySQL 8.0+ or MariaDB 10.4+ are the most commonly used and best tested. PostgreSQL 13+ is also supported.

**Q: Can I install Chamilo without the command line?**
A: No. You need the command line to install Composer dependencies, build frontend assets, and run database migrations. The web-based wizard handles the database setup and initial configuration, but the surrounding steps require shell access.

## Users and Authentication

**Q: How do I reset a user's password?**
A: Go to **Administration > User list**, find the user, click edit, and set a new password. Alternatively, the user can use the "Forgot password" link on the login page (if email is configured).

**Q: Can I import users in bulk?**
A: Yes. Go to **Administration > Import users** and upload a CSV or XML file with user data. The import supports creating new users and updating existing ones.

**Q: How do I integrate with LDAP or Active Directory?**
A: Configure LDAP settings in the authentication configuration. See [LDAP](../authentication/ldap.md). Users are synchronized on login or via scheduled sync.

**Q: Can users belong to multiple sessions at the same time?**
A: Yes. Users can be enrolled in any number of sessions simultaneously. Each session tracks progress independently.

## Courses and Content

**Q: How do I back up a single course?**
A: Within the course, go to **Maintenance > Create a backup**. This generates a downloadable archive of course content and settings. You can restore it on the same or a different Chamilo instance.

**Q: Can I copy a course?**
A: Yes. Use **Administration > Copy course** or the course maintenance tool within the course. You can copy content between courses or create a new course from an existing one.

**Q: What SCORM versions are supported?**
A: Chamilo supports SCORM 1.2 and SCORM 2004 (editions 3 and 4). SCORM packages are imported as learning paths.

**Q: How do I limit who can create courses?**
A: Go to **Administration > Configuration settings > Course** and disable **Allow non administrators (teachers) to create new courses** (`allow_users_to_create_courses`). When disabled, only administrators can create courses.

## Performance and Maintenance

**Q: The platform is slow. What should I check first?**
A: In order of impact: (1) Ensure `APP_ENV=prod` and `APP_DEBUG=0` in `.env.local`. (2) Verify PHP OPcache is enabled. (3) Check database performance. (4) See [Performance Tuning](../platform-settings/performance-tuning.md).

**Q: How do I clear the cache?**
A: Run `php bin/console cache:clear --env=prod` from the command line. Do not delete the `var/cache/` directory manually while the application is running.

**Q: How much disk space does Chamilo need?**
A: The application itself needs about 1 GB. Total space depends on uploaded content (documents, videos, SCORM packages). Monitor disk usage and plan accordingly.

**Q: How do I set up automated backups?**
A: See [Backups](../maintenance/backups.md). At minimum, schedule a daily database dump and regular file-level backups of the upload directory.

## Email

**Q: Users are not receiving emails. What should I check?**
A: (1) Verify `MAILER_DSN` in `.env.local`. (2) Run `php bin/console mailer:test someone@example.com` to test. (3) Check spam folders. (4) Verify SPF/DKIM DNS records. See [Email Configuration](../installation/email-configuration.md).

**Q: Can I use Gmail to send emails?**
A: Yes, for small platforms or development. Use an App Password and be aware of Gmail's daily sending limits (500 emails/day for regular accounts).

## Security

**Q: How do I force HTTPS?**
A: Configure your web server to redirect HTTP to HTTPS. Additionally, enable the "Force HTTPS" setting in **Administration > Configuration settings > Security**. See [Security Settings](../platform-settings/security-settings.md).

**Q: How do I block brute-force login attacks?**
A: Configure max login attempts and CAPTCHA in security settings. Consider also using fail2ban at the server level for additional protection.

**Q: A user forgot their password and email is not working. How do I help them?**
A: As an administrator, edit the user account directly and set a new password. Go to **Administration > User list**, find the account, and update the password field.

## Upgrades

**Q: Can I upgrade directly from Chamilo 1.11.x to 2.0?**
A: Yes, but it is a major migration, not a simple update. See [Upgrading](../installation/upgrading.md). Always test on a staging server first.

**Q: Will my plugins work after upgrading to 2.0?**
A: No. Plugins from 1.11.x are not compatible with 2.0 and must be rewritten or replaced with equivalent 2.0 functionality.
