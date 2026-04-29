# Privacy Settings

Privacy and data-protection (GDPR-style) controls — consent, data export, account deletion requests, and similar.

Access these settings under **Administration > Configuration settings > Privacy**. This category contains **6 settings**, listed below with the title and comment shipped in the platform's settings fixtures (`SettingsCurrentFixtures.php`).

> The variable name in code is shown in `monospace`. Use it when scripting via the API or referring to settings in `.env` overrides.

## Settings

### `data_protection_officer_email`

**Data protection officer e-mail address**

_No description in fixtures._

### `data_protection_officer_name`

**Data protection officer name**

_No description in fixtures._

### `data_protection_officer_role`

**Data protection officer role**

_No description in fixtures._

### `disable_change_user_visibility_for_public_courses`

**Disable making tool users visible in public courses**

Avoid anyone making the 'users' tool visible in a public course.

### `disable_gdpr`

**Disable GDPR features**

If you already manage your personal data protection declaration to users elsewhere, you can safely disable this feature.

### `hide_user_field_from_list`

**Hide fields from users list in course**

By default, we show all data from users in the users tool in the course. This array allows you to specify which fields you do not want to display. Only affects main fields (not extra fields).

