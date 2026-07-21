# Login Attempts

The Login Attempts report shows a record of failed login attempts, with charts to help you spot brute-force or credential-stuffing patterns.

## Accessing Login Attempts

From the administration panel, click **Security > Login attempts**.

## What It Shows

![The Login attempts page showing charts for attempts by day, top IPs, failed attempts by month, success vs failed logins, attempts by hour, and unique IPs per day, followed by a table of failed login attempts](/.gitbook/assets/admin-security-login-attempts.png)

* **Attempts by day (last 7 days)** — Daily count of failed attempts
* **Top IPs (last 30 days)** — Which IP addresses generated the most attempts
* **Failed attempts by month (last 12 months)** — Longer-term trend
* **Success vs failed (last 30 days)** — Daily breakdown of successful versus failed logins
* **Attempts by hour (last 7 days)** — Time-of-day distribution, useful for spotting automated/scripted attempts
* **Unique IPs per day (last 30 days)** — How many distinct IPs attempted logins each day
* **Failed login attempts table** — Every failed attempt, with date, IP address, and username tried

Use the **Username**, **IP**, and date-range fields above the charts to filter the report.

## Related Settings

This report is a monitoring tool; the actual brute-force protections are configured in [Security Settings](../platform-settings/security-settings.md):

* **Max login attempts before lockdown** (`login_max_attempt_before_blocking_account`) — Locks an account after too many failed attempts
* **CAPTCHA** (`allow_captcha`) and **CAPTCHA mistakes allowance** (`captcha_number_mistakes_to_block_account`) — Slows down automated attempts and locks accounts that keep failing the CAPTCHA

See also the [Security Guide](../appendix/security-guide.md) for server-level brute-force protection (fail2ban).
