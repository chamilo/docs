# Registration Settings

Self-registration policy and post-registration redirects — what new users are asked for and where they land.

Access these settings under **Administration > Configuration settings > Registration**. This category contains **20 settings**, listed below with the title and comment shipped in the platform's settings fixtures (`SettingsCurrentFixtures.php`).

> The variable name in code is shown in `monospace`. Use it when scripting via the API or referring to settings in `.env` overrides.

## Settings

### `allow_double_validation_in_registration`

**Double validation for registration process**

Simply display a confirmation request on the registration page before going forward with the user creation.

### `allow_fields_inscription`

**Restrict fields shown during registration**

If you only want to show some of the available profile field, your can complete the array here with sub-elements 'fields' and 'extra_fields' containing arrays with a list of the fields to show.

### `allow_lostpassword`

**Lost password**

Are users allowed to request their lost password?

### `allow_registration`

**Registration**

Is registration as a new user allowed? Can users create new accounts?

### `allow_registration_as_teacher`

**Registration as teacher**

Can one register as a teacher (with the ability to create courses)?

### `allow_terms_conditions`

**Enable terms and conditions**

This option will display the Terms and Conditions in the register form for new users. Need to be configured first in the portal administration page.

### `drh_autosubscribe`

**Human resources director autosubscribe**

Human resources director autosubscribe - not yet available

### `extendedprofile_registration`

**Portfolio fields at registration**

Which of the following fields of the portfolio have to be available in the user registration process? This requires that the portfolio option be enabled (see above).

### `extendedprofile_registrationrequired`

**Required portfolio fields in registration**

Which of the following fields of the portfolio are *required* in the user registration process? This requires that the portfolio option be enabled and that the field be also available in the registration form (see above).

### `extldap_config`

**LDAP connection configuration**

Array defining host and port for the LDAP server.

### `hide_legal_accept_checkbox`

**Hide legal accept checkbox in Terms and Conditions page**

If set to true, removes the "I have read and accept" checkbox in the Terms and Conditions page flow.

### `platform_unsubscribe_allowed`

**Allow unsubscription from platform**

By enabling this option, you allow any user to definitively remove his own account and all data related to it from the platform. This is quite a radical action, but it is necessary for portals opened to the public where users can auto-register. An additional entry will appear in the user profile to unsubscribe after confirmation.

### `redirect_after_login`

**Redirect after login (per profile)**

Define redirection per profile after login using a JSON object like {"STUDENT":"", "ADMIN":"admin-dashboard"}

### `required_extra_fields_in_inscription`

**Required extra fields during registration**

_No description in fixtures._

### `required_profile_fields`

**Required fields during registration**

_No description in fixtures._

### `send_inscription_msg_to_inbox`

**Send the welcome message to e-mail and inbox**

By default, the welcome message (with credentials) is sent only by e-mail. Enable this option to send it to the user's Chamilo inbox as well.

### `sessionadmin_autosubscribe`

**Session admin autosubscribe**

Session administrator autosubscribe - not available yet

### `student_autosubscribe`

**Learner autosubscribe**

Learner autosubscribe - not yet available

### `teacher_autosubscribe`

**Teacher autosubscribe**

Teacher autosubscribe - not yet available

### `user_hide_never_expire_option`

**Hide 'never expires' option for users**

Remove the option 'never expires' when creating/editing a user account.

