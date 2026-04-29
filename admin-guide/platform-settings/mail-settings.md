# Mail Settings

How outgoing mail is built — sender identity, layout, signature, and special-purpose addresses.

Access these settings under **Administration > Configuration settings > Mail**. This category contains **18 settings**, listed below with the title and comment shipped in the platform's settings fixtures (`SettingsCurrentFixtures.php`).

> The variable name in code is shown in `monospace`. Use it when scripting via the API or referring to settings in `.env` overrides.

## Settings

### `allow_email_editor_for_anonymous`

**E-mail editor for anonymous**

Allow anonymous users to send e-mails from the platform. In this day and age of information security this is not a recommended option.

### `cron_notification_help_desk`

**E-mail addresses to send cronjobs execution reports**

Given as array of e-mail addresses. Does not work for all cronjobs yet.

### `mail_content_style`

**Extra e-mail HTML body attributes**

_No description in fixtures._

### `mail_header_style`

**Extra e-mail HTML header attributes**

_No description in fixtures._

### `mailer_debug_enable`

**Mail: Debug**

Select whether you want to enable the e-mail sending debug logs. These will give you more information on what is happening when connecting to the mail service, but are not elegant and might break page design. Only use when there is not user activity.

### `mailer_dkim`

**Mail: DKIM headers**

Enter a JSON array of your DKIM configuration settings (see example).

### `mailer_dsn`

**Mail DSN**

The DSN fully includes all parameters needed to connect to the mail service. You can learn more at https://symfony.com/doc/6.4/mailer.html#using-built-in-transports. Here are a few examples of supported DSN syntaxes: https://symfony.com/doc/6.4/mailer.html#using-a-3rd-party-transport

### `mailer_exclude_json`

**Mail: Avoid using LD+JSON**

Some e-mail clients do not understand the descriptive LD+JSON format, showing it as a loose JSON string to the final user. If this is your case, you might want to set the variable below to 'false' to disable this header.

### `mailer_from_email`

**Send all e-mails from this e-mail address**

Sets the default email address used in the "from" field of emails.

### `mailer_from_name`

**Send all e-mails as originating from this (organizational) name**

Sets the default display name used for sending platform emails. e.g. "Support team".

### `mailer_mails_charset`

**Mail: character set**

In case you need to define the charset to use when sending those e-mails. Leave empty if you're not sure.

### `mailer_xoauth2`

**Mail: XOAuth2 options**

If you use some XOAuth2-based e-mail service, use this setting in JSON to save your specific configuration (see example) and select XOAuth2 in the mail service setting.

### `messages_hide_mail_content`

**Hide e-mail content to bring users to platform**

Prefer short e-mail versions with a link to the messaging space on the platform to increase platform-based engagement.

### `notifications_extended_footer_message`

**Extended notifications footer**

Add a custom extra footer for notifications emails for a specific language, for example for privacy policy notices. Multiple languages and paragraphs can be added.

### `send_notification_score_in_percentage`

**Send score in percentage in test results notification**

_No description in fixtures._

### `send_two_inscription_confirmation_mail`

**Send 2 registration e-mails**

Send two separate e-mails on registration. One for the username, another one for the password.

### `show_user_email_in_notification`

**Show sender's e-mail address in notifications**

_No description in fixtures._

### `update_users_email_to_dummy_except_admins`

**Update users e-mail to dummy value during imports**

During special CSV cron imports of users, automatically replace e-mails with dummy e-mail username@example.com.

