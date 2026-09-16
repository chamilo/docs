# Cron Jobs Settings

Configuration of scheduled jobs (cron tasks) shipped with Chamilo.

Access these settings under **Administration > Configuration settings > Cron Jobs**. This category contains **5 settings**, listed below with the title and comment shipped in the platform's settings fixtures (`SettingsCurrentFixtures.php`).

> The variable name in code is shown in monospace. Use it when scripting via the API or when you need to change those settings at a global level by editing [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Settings

### `cron_remind_course_expiration_activate`

**Remind Course Expiration cron**

Enable the Remind Course Expiration cron

*Default: `false`*

### `cron_remind_course_expiration_frequency`

**Frequency for the Remind Course Expiration cron**

Number of days before the expiration of the course to consider to send reminder mail

### `cron_remind_course_finished_activate`

**Send course finished notification**

Whether to send an e-mail to students when their course (session) is finished. This requires cron tasks to be configured (see main/cron/ directory).

*Default: `false`*

### `cron_certificate_expiry_reminder_activate`

**Certificate expiry reminder cron**

Enable the `app:send-certificate-expiry-reminders` cron, which reminds learners whose certificates have expired or are about to expire.

*Default: `false`*

### `cron_certificate_expiry_reminder_days`

**Certificate expiry reminder window (days)**

Default number of days ahead to scan for certificates about to expire, used unless the cron is run with `--days-ahead`.

*Default: `30`*

## Certificate Expiry Reminders

Gradebook certificates can be given a validity period (in days), configured per gradebook category — see [Certificates and Skills](../../teacher-guide/tracking-and-reporting/certificates-and-skills.md). Once a certificate has an expiry date, Chamilo can remind the learner by e-mail and internal message as it approaches (or after it passes) that expiry date.

Enabling `cron_certificate_expiry_reminder_activate` above only turns on the *feature*; the reminder is actually sent by a console command that you still need to schedule at the OS level (e.g. via `crontab`), since Chamilo does not run its own background scheduler:

```bash
php bin/console app:send-certificate-expiry-reminders
```

Useful options:

| Option | Effect |
|--------|--------|
| `--days-ahead=N` | How many days ahead of expiry to include (defaults to `cron_certificate_expiry_reminder_days`) |
| `--force` | Actually send the reminders. Without it, the command only reports what it *would* send — safe to run to check before wiring it into cron |
| `--resend` | Re-send reminders even for a certificate/expiry-date pair already notified |
| `--access-url-id=N` | Restrict the scan to one portal (multi-URL installations) |
| `--include-unsubscribed-users` | Also notify learners who unsubscribed from platform e-mails |

Teachers can send the same reminders manually, without needing this cron — see [Certificates and Skills](../../teacher-guide/tracking-and-reporting/certificates-and-skills.md#certificate-validity-and-expiry).

