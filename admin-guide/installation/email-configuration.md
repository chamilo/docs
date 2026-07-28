# Email Configuration

Chamilo now manages the emails sending configuration from the administration dashboard, platform settings section (there is a specific entry for emails). Emails are sent for account creations, password resets, course notifications, message alerts, and other platform events. Email delivery is configured through a `MAILER_DSN` configuration setting.

## Configuration

Set the `Mail DSN` option in the /admin/settings/mail section. The format depends on your email transport.

### SMTP

The most common configuration, suitable for any SMTP server:

```bash
# Let the system decide
native://default

# Basic SMTP
smtp://username:password@smtp.example.com:587

# SMTP with TLS (most providers)
smtp://username:password@smtp.example.com:587?encryption=tls

# SMTP without authentication (local relay)
smtp://localhost:25
```

Replace `username`, `password`, and the host with your SMTP server credentials.

### Amazon SES

```bash
# Using SMTP interface
ses+smtp://ACCESS_KEY:SECRET_KEY@default?region=us-east-1

# Using API
ses+api://ACCESS_KEY:SECRET_KEY@default?region=us-east-1
```

The Symfony Amazon Mailer transport comes embedded into Chamilo. No additional install required.

### Mailjet

```bash
mailjet+api://API_KEY:SECRET_KEY@default
```

The Symfony Mailjet transport comes embedded into Chamilo. No additional install required.

### Brevo (formerly Sendinblue)

```bash
brevo+api://API_KEY@default
```

The Symfony Brevo transport comes embedded into Chamilo. No additional install required.

### Gmail (Development/Small Platforms)

```bash
gmail+smtp://your-email@gmail.com:app-password@default
```

Use an App Password, not your regular Gmail password. This is suitable for small platforms or development only, as Gmail has sending limits.

## Platform Email Settings

In addition to the transport, configure the sender identity on the same page:

| Setting | Description |
|---------|-------------|
| **Send all e-mails as originating from this (organizational) name** | The display name associated with system emails. |
| **Send all e-mails from this e-mail address** | The "From" address for all system emails. Must be a valid address accepted by your mail transport. We recommend using a "no reply" address like `no-reply@yourdomain.com` to avoid getting pointless answers to automated e-mails. |

## Testing Email Delivery

After configuring `MAILER_DSN`, test that emails are delivered: Go to *Administration* > *System* > *E-mail tester*, specify a recipient, a subject and an e-mail body and click **Send test email**.

If the command completes without errors but the email is not received:

1. Check the recipient's spam/junk folder.
2. Verify that your sending domain has proper DNS records (SPF, DKIM, DMARC).
3. Check your mail provider's sending logs for bounces or rejections.
4. Review the Chamilo log at `var/log/prod.log` for mailer errors.
5. In the E-mail configuration settings, enable *Mail: Debug* (not available in 3.0, will be soon).

## Experimental: Email Queue (Async Delivery)

By default, emails are sent synchronously during the web request. For better performance, configure asynchronous delivery using Symfony Messenger:

```yaml
# config/packages/messenger.yaml
framework:
    messenger:
        transports:
            async: '%env(MESSENGER_TRANSPORT_DSN)%'
        routing:
            'Symfony\Component\Mailer\Messenger\SendEmailMessage': async
```

With async delivery, emails are queued and sent by a background worker:

```bash
php bin/console messenger:consume async
```

Run this as a system service (e.g., via systemd or supervisord) so it stays running.

## Tips

* **Use a dedicated email service** (SES, Mailjet, Brevo) for production platforms. Direct SMTP to your own mail server requires careful configuration to avoid deliverability issues.
* **Configure SPF, DKIM, and DMARC** DNS records for your sending domain to maximize delivery rates and prevent emails from being marked as spam. You can also configure DKIM headers from the e-mail settings page.
* **Use async delivery** on platforms with more than a few dozen active users -- synchronous email sending can noticeably slow down web requests.
