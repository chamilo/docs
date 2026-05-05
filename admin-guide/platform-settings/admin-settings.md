# Administrator Identity Settings

Identity and contact details of the platform administrator. These values appear in the platform footer and in some system-generated emails.

Access these settings under **Administration > Configuration settings > Administrator Identity**. This category contains **12 settings**, listed below with the title and comment shipped in the platform's settings fixtures (`SettingsCurrentFixtures.php`).

> The variable name in code is shown in monospace. Use it when scripting via the API or when you need to change those settings at a global level by editing [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Settings

### `administrator_email`

**Portal Administrator: e-mail**

The e-mail address of the Platform Administrator (appears in the footer on the left)

### `administrator_name`

**Portal Administrator: First Name**

The First Name of the Platform Administrator (appears in the footer on the left)

### `administrator_phone`

**Portal Administrator: Phone number**

The phone number of the Platform Administrator (appears in the footer on the left)

### `administrator_surname`

**Portal Administrator: Last Name**

The Family Name of the Platform Administrator (appears in the footer on the left)

### `chamilo_latest_news`

**Latest news**

Get the latest news from Chamilo, including security vulnerabilities and events, directly inside your administration panel. These pieces of news will be checked on the Chamilo news server every time you load the administration page and are only visible to administrators.

*Default: `true`*

### `chamilo_support`

**Chamilo support block**

Get pro tips and an easy way to contact official service providers for professional support, directly from the makers of Chamilo. This block appears on your administration page, is only visible by administrators, and refreshes every time you load the administration page.

*Default: `true`*

### `max_anonymous_users`

**Multiple anonymous users**

Enable this option to allow multiple system users for anonymous users. This is useful when using this platform as a public showroom for some courses. Having multiple anonymous users will let tracking work for the duration of the experience for several users without mixing their data (which could otherwise confuse them).

*Default: `0`*

### `redirect_admin_to_courses_list`

**Redirect admin to courses list**

The default behaviour is to send administrators directly to the administration panel (while teachers and students are sent to the courses list or the platform homepage). Enable to redirect the administrator also to his/her courses list.

*Default: `false`*

### `send_inscription_notification_to_general_admin_only`

**Notify global admin only of new users**

When enabled, only the global administrator receives email notifications about new user registrations instead of all administrators.

*Default: `false`*

### `show_link_request_hrm_user`

**Show link to request bond between user and HRM**

Display a link on the profile page allowing Human Resources directors to request to be linked with a user account.

*Default: `false`*

### `user_status_option_only_for_admin_enabled`

**Hide role from normal users**

Allows hiding users' role when this option is set to true and the following array sets the corresponding role to 'true'.

*Default: `false`*

### `user_status_option_show_only_for_admin`

**Define which roles are hidden to normal users**

The roles set to 'true' will only appear to administrators. Other users will not be able to see them.

