# Email Configuration

Chamilo sends emails for account creation, password resets, course notifications, message alerts, and other platform events. Email delivery is configured through the `MAILER_DSN` environment variable.

## Configuration

Set the `MAILER_DSN` in your `.env.local` file. The format depends on your email transport.

### SMTP

The most common configuration, suitable for any SMTP server:

```bash
# Basic SMTP
MAILER_DSN=smtp://username:password@smtp.example.com:587

# SMTP with TLS (most providers)
MAILER_DSN=smtp://username:password@smtp.example.com:587?encryption=tls

# SMTP without authentication (local relay)
MAILER_DSN=smtp://localhost:25
```

Replace `username`, `password`, and the host with your SMTP server credentials.

### Amazon SES

```bash
# Using SMTP interface
MAILER_DSN=ses+smtp://ACCESS_KEY:SECRET_KEY@default?region=us-east-1

# Using API
MAILER_DSN=ses+api://ACCESS_KEY:SECRET_KEY@default?region=us-east-1
```

Install the Symfony Amazon Mailer transport:

```bash
composer require symfony/amazon-mailer
```

### Mailjet

```bash
MAILER_DSN=mailjet+api://API_KEY:SECRET_KEY@default
```

Install the transport:

```bash
composer require symfony/mailjet-mailer
```

### Brevo (formerly Sendinblue)

```bash
MAILER_DSN=brevo+api://API_KEY@default
```

The Brevo transport (`symfony/brevo-mailer`) is already in Chamilo's `composer.json`, so no extra `composer require` step is needed.

### Gmail (Development/Small Platforms)

```bash
MAILER_DSN=gmail+smtp://your-email@gmail.com:app-password@default
```

Use an App Password, not your regular Gmail password. This is suitable for small platforms or development only, as Gmail has sending limits.

## Platform Email Settings

In addition to the transport, configure the sender identity in the administration panel under **Administration > Configuration settings > Portal**:

| Setting | Description |
|---------|-------------|
| **Administrator email** | The "From" address for all system emails. Must be a valid address accepted by your mail transport. |
| **Administrator name** | The display name associated with system emails. |
| **No-reply email** | An optional separate address for automated notifications where replies are not expected. |

## Testing Email Delivery

After configuring `MAILER_DSN`, test that emails are delivered:

```bash
# Send a test email using the Symfony console
php bin/console mailer:test someone@example.com
```

If the command completes without errors but the email is not received:

1. Check the recipient's spam/junk folder.
2. Verify that your sending domain has proper DNS records (SPF, DKIM, DMARC).
3. Check your mail provider's sending logs for bounces or rejections.
4. Review the Chamilo log at `var/log/prod.log` for mailer errors.

## Email Queue (Async Delivery)

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
* **Configure SPF, DKIM, and DMARC** DNS records for your sending domain to maximize delivery rates and prevent emails from being marked as spam.
* **Use async delivery** on platforms with more than a few dozen active users -- synchronous email sending can noticeably slow down web requests.
