# Tickets Settings

Behaviour of the **Tickets** (helpdesk) system.

Access these settings under **Administration > Configuration settings > Tickets**. This category contains **7 settings**, listed below with the title and comment shipped in the platform's settings fixtures (`SettingsCurrentFixtures.php`).

> The variable name in code is shown in monospace. Use it when scripting via the API or when you need to change those settings at a global level by editing [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Settings

### `show_link_bug_notification`

**Show link to report bug**

Show a link in the header to report a bug inside of our support platform (http://support.chamilo.org). When clicking on the link, the user is sent to the support platform, on a wiki page that describes the bug reporting process.

*Default: `false`*


### `show_link_ticket_notification`

**Show ticket creation link**

Show the ticket creation link to users on the right side of the portal

*Default: `false`*


### `ticket_allow_category_edition`

**Allow tickets categories edition**

Allow category edition by administrators.

*Default: `false`*

### `ticket_allow_student_add`

**Allow users to add tickets**

Allows all users to add tickets not only the administrators.

*Default: `false`*

### `ticket_project_user_roles`

**Access by role to ticket projects**

Allow ticket projects to be accesses by specific user roles. Example: ['permissions' => [1 => [17]] where project_id = 1, STUDENT_BOSS = 17.

### `ticket_send_warning_to_all_admins`

**Send ticket warning messages to administrators**

Send a message if a ticket was created without a category or if a category doesn't have any administrator assigned.

*Default: `false`*


### `ticket_warn_admin_no_user_in_category`

**Send alert to administrators if tickets category has no one in charge**

Send a warning message (e-mail and Chamilo message) to all administrators if there's not a user assigned to a category.

*Default: `false`*


