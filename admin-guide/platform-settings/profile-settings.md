# User Profile Settings

Which fields appear on the user profile, which ones the user can edit, and related preferences.

Access these settings under **Administration > Configuration settings > User Profile**. This category contains **29 settings**, listed below with the title and comment shipped in the platform's settings fixtures (`SettingsCurrentFixtures.php`).

> The variable name in code is shown in `monospace`. Use it when scripting via the API or referring to settings in `.env` overrides.

## Settings

### `account_valid_duration`

**Account validity**

A user account is valid for this number of days after creation

### `add_user_course_information_in_mailto`

**Pre-fill the mail with user and course info in footer contact**

Add subject and body in the mailto: footer.

### `allow_show_linkedin_url`

**Allow show the user LinkedIn URL**

Add a link on the user social block, allowing visit the user's LinkedIn profile

### `allow_show_skype_account`

**Allow show the user Skype account**

Add a link on the user social block allowing start a chat by Skype

### `allow_social_map_fields`

**Users geolocation on a map**

Enable the display of a map in the social network allowing you to locate other users. This includes several positions (current and destination) which have to be defined as addresses or coordinates in separate extra fields. The extra fields must be set as an array here.

### `allow_teachers_to_classes`

**Allow teachers to manage classes**

_No description in fixtures._

### `allow_user_headings`

**Allow users profiling inside courses**

Can a teacher define learner profile fields to retrieve additional information?

### `allow_users_to_change_email_with_no_password`

**Allow users to change e-mail without password**

When changing the account information

### `changeable_options`

**Fields users are allowed to change in their profile**

Select the fields users will be able to change on their profile page.

### `enable_profile_user_address_geolocalization`

**Enable user's geolocalization**

Enable user's address field and show it on a map using geolocalization features

### `extended_profile`

**Portfolio**

If this setting is on, a user can fill in the following (optional) fields: 'My personal open area', 'My competences', 'My diplomas', 'What I am able to teach'

### `hide_username_in_course_chat`

**Hide username in course chat**

In the course chat, hide the username. Only display people's names.

### `hide_username_with_complete_name`

**Hide username when already showing complete name**

Some internal functions will return the username when returning the user's complete name. With this option enabled, you ensure the username will not appear.

### `linkedin_organization_id`

**LinkedIn Orgnization ID**

When sharing a badge on LinkedIn, LinkedIn allows you to set an organization ID that will link to the LinkedIn's page of your organization (to link the organization attributing the badge).

### `login_is_email`

**Use the email as username**

Use the email in order to login to the system

### `my_space_users_items_per_page`

**Default number of items per page in mySpace**

_No description in fixtures._

### `pass_reminder_custom_link`

**Custom page for password reminder**

Set your own URL to a password reset page. Useful when using a federated account management system.

### `profile_fields_visibility`

**Fields visible on profile page**

Array of fields and whether (boolean) they are visible or not on the user's profile page (also works with extra fields labels).

### `registration_add_helptext_for_2_names`

**Add helper to add two names in registration**

Add help text for users to enter two names in the registration form when double lastnames are common.

### `send_notification_when_user_added`

**Send mail to admin when user created**

Send email notification to admin when a user is created.

### `show_conditions_to_user`

**Show specific registration conditions**

Show multiple conditions to user during sign up process. Provide an array with each element containing 'variable' (internal extra field name), 'display_text' (simple text for a checkbox), 'text_area' (long text of conditions).

### `show_official_code_whoisonline`

**Official code on 'Who is online'**

Show official code on the 'Who is online' page, below the username.

### `show_terms_if_profile_completed`

**Terms and conditions only if profile complete**

By enabling this option, terms and conditions will be available to the user only when the extra profile fields that start with 'terms_' and set to visible are completed.

### `split_users_upload_directory`

**Split users' upload directory**

On high-load portals, where a lot of users are registered and send their pictures, the upload directory (main/upload/users/) might contain too many files for the filesystem to handle (it has been reported with more than 36000 files on a Debian server). Changing this option will enable a one-level splitting of the directories in the upload directory. 9 directories will be used in the base directory and all subsequent users' directories will be stored into one of these 9 directories. The change of this option will not affect the directories structure on disk, but will affect the behaviour of the Chamilo code, so if you change this option, you have to create the new directories and move the existing directories by yourself on te server. Be aware that when creating and moving those directories, you will have to move the directories of users 1 to 9 into subdirectories of the same name. If you are not sure about this option, it is best not to activate it.

### `use_users_timezone`

**Enable users timezones**

Enable the possibility for users to select their own timezone. Once configured, users will be able to see assignment deadlines and other time references in their own timezone, which will reduce errors at delivery time.

### `user_import_settings`

**Options for user import**

Array of options to apply as default parameters in the CSV/XML user import.

### `user_search_on_extra_fields`

**Search users by extra fields in users list for admins**

Naturally include the given extra fields (array of extra fields labels) in the user searches.

### `user_selected_theme`

**User theme selection**

Allow users to select their own visual theme in their profile. This will change the look of Chamilo for them, but will leave the default style of the portal intact. If a specific course or session has a specific theme assigned, it will have priority over user-defined themes.

### `visible_options`

**List of visible fields in profile**

Controls which profile fields are visible to users and others.

