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

### Microsoft 365 / Outlook (Microsoft Graph API)

Microsoft is retiring SMTP with basic authentication in Exchange Online, so a plain `smtp://user:password@smtp.office365.com:587` DSN only works while your tenant administrator keeps "Authenticated SMTP" explicitly enabled on that specific mailbox. Send through the Microsoft Graph API instead — it does not use SMTP at all:

```bash
microsoftgraph+api://CLIENT_ID:CLIENT_SECRET@default?tenantId=TENANT_ID
```

The Symfony Microsoft Graph transport comes embedded into Chamilo. No additional install required.

To obtain those three values, in the [Microsoft Entra admin center](https://entra.microsoft.com):

1. Register an application. Its **Application (client) ID** and **Directory (tenant) ID** are `CLIENT_ID` and `TENANT_ID`.
2. Under *API permissions*, add the Microsoft Graph **application** permission `Mail.Send` (not the delegated one), then grant admin consent.
3. Under *Certificates & secrets*, create a client secret. Its **value** (not its ID) is `CLIENT_SECRET`.

Notes:

* URL-encode any character with a special meaning in a URL that appears in the client secret (`@` as `%40`, `+` as `%2B`, `/` as `%2F`, and so on).
* The address configured in **Send all e-mails from this e-mail address** must be a real mailbox inside your tenant, otherwise Microsoft rejects the message.
* Add `&noSave=true` to the DSN if you do not want a copy of every platform email stored in the sender's *Sent Items* folder.
* For national clouds, point the DSN at the right endpoints, without the `https://` prefix: `microsoftgraph+api://CLIENT_ID:CLIENT_SECRET@microsoftgraph.chinacloudapi.cn?tenantId=TENANT_ID&authEndpoint=login.partner.microsoftonline.cn`.

**Security warning:** the `Mail.Send` *application* permission lets the registered application send email as **any** mailbox in the tenant, not only the one Chamilo uses. Restrict it to the sender mailbox with an Exchange Online application access policy:

```powershell
New-ApplicationAccessPolicy -AppId CLIENT_ID -PolicyScopeGroupId no-reply@yourdomain.com -AccessRight RestrictAccess -Description "Restrict Chamilo to its sender mailbox"
```

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
