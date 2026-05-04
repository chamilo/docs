# Platform Settings

Platform-level identity and behaviour — institution name, time zone, registration policy, online users, performance flags.

Access these settings under **Administration > Configuration settings > Platform**. This category contains **29 settings**, listed below with the title and comment shipped in the platform's settings fixtures (`SettingsCurrentFixtures.php`).

> The variable name in code is shown in monospace. Use it when scripting via the API or when you need to change those settings at a global level by editing [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Settings

### `allow_my_files`

**Enable 'My Files' section**

Allow users to upload files to a personal space on the platform.

### `chamilo_database_version`

**Current version of the database schema used by Chamilo**

Displays the current DB version to match the Chamilo core version.

### `cookie_warning`

**Cookie privacy notification**

If enabled, this option shows a banner on top of your platform that asks users to acknowledge that the platform is using cookies necessary to provide the user experience. The banner can easily be acknowledged and hidden by the user. This allows Chamilo to comply with EU web cookies regulations.

### `disable_copy_paste`

**Disable copy-pasting**

When enabled, this option disables as well as possible the copy-pasting mechanisms. Useful in restrictive exams setups.

### `donotlistcampus`

**Do not list this campus on chamilo.org**

By default, Chamilo portals are automatically registered in a public list at chamilo.org, just using the title you gave to this portal (not the URL nor any private data). Check this box to avoid having the title of your portal appear.

### `generate_random_login`

**Generate random username**

When importing users (batch processes), automatically generate a random string for username. Otherwise, the username will be generated on the basis of the firstname and lastname, or the prefix of the e-mail.

### `hosting_limit_identical_email`

**Limit identical email usage**

Maximum number of accounts allowed to share the same e-mail address. Set to 0 to disable this limit.

### `hosting_limit_users_per_course`

**Global limit of users per course**

Defines a global maximum number of users (teachers included) allowed to be subscribed to any single course in the platform. Set this value to 0 to disable the limit. This helps avoid courses being overloaded in open portals.

### `institution`

**Organization name**

The name of the organization (appears in the header on the right)

### `institution_address`

**Institution address**

Address

### `institution_url`

**Organization URL (web address)**

The URL of the institutions (the link that appears in the header on the right)

### `max_courses_per_user`

**Maximum courses per user**

Maximum number of courses a teacher/trainer can create. Set to 0 to disable the limit. Can be overridden per user via a BuyCourses service purchase.

### `notification_event`

**Enable the notification tool for a more impactful communication channel with students**

Activates popup or system notifications for important platform events.

### `pdf_img_dpi`

**PDF export resolution**

This represents the resolution of generated PDF files (in dot per inch, or dpi). The default is 96. Increasing it will give you better resolution PDF files but will also increase the weight and generation time of the files.

### `platform_logo_url`

**URL for alternative platform logo**

Replaces the Chamilo logo by loading a (possibly remote) URL. Make sure this is allowed by your security policies.

### `portfolio_advanced_sharing`

**Enable portfolio advanced sharing**

Decide who can view the posts and comments of the portfolio.

### `portfolio_show_base_course_post_in_sessions`

**Show base course posts in session course**

Decide who can view the posts and comments of the portfolio.

### `push_notification_settings`

**Push notification settings (JSON)**

JSON configuration for Push notifications integration.

### `server_type`

**Server Type**

Defines the environment type: "prod" (normal production), "validation" (like production but without reporting statistics), or "test" (debug mode with developer tools such as untranslated string indicators).

### `session_admin_access_to_all_users_on_all_urls`

**Allow session admins to see all users on all URLs**

If enabled, session admins can search and list users from all access URLs, regardless of their current URL.

### `site_name`

**E-learning portal name**

The Name of your Chamilo Portal (appears in the header)

### `timepicker_increment`

**Timepicker increment**

Minimal time increment (in minutes) when selecting a date and time with the timepicker widget. For example, it might not be useful to have less than 5 or 15 minutes increments when talking about assignment submission, availability of a test, start time of a session, etc.

### `timezone`

**Default timezone**

Select the default timezone for this portal. This will help set the timezone (if the feature is enabled) for each new user or for any user that has not set a specific timezone yet. Timezones help show all time-related information on screen in the specific timezone of each user.

### `unoconv_binaries`

**UNO converter binaries**

Give the system path to the UNO converter library to enable some extra exporting features.

### `use_career_external_id_as_identifier_in_diagrams`

**Use external career ID in diagrams**

If using career diagrams, show an extra field instead of the internal career ID.

### `use_custom_pages`

**Use custom pages**

Enable this feature to configure specific login pages by role

### `use_virtual_keyboard`

**Use virtual keyboard**

Make a virtual keyboard appear. This is useful when setting up restrictive exams in a physical room where students have no keyboard to limit their ability to cheat.

### `user_status_show_option`

**Roles display options**

An array of role => true/false that defines whether that role should be shown or hidden.

### `user_status_show_options_enabled`

**Selective display of roles**

Enable to use an array to define which roles should be clearly displayed and which should be hidden.

