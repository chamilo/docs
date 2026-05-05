# Groups Settings

Behaviour of the course **Groups** tool.

Access these settings under **Administration > Configuration settings > Groups**. This category contains **3 settings**, listed below with the title and comment shipped in the platform's settings fixtures (`SettingsCurrentFixtures.php`).

> The variable name in code is shown in monospace. Use it when scripting via the API or when you need to change those settings at a global level by editing [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Settings

### `allow_group_categories`

**Group categories**

Allow teachers to create categories in the Groups tool?

*Default: `false`*


### `hide_course_group_if_no_tools_available`

**Hide course group if no tool**

If no tool is available in a group and the user is not registered to the group itself, hide the group completely in the groups list.

*Default: `false`*


### `show_groups_to_users`

**Show classes to users**

Show the classes to users. Classes are a feature that allow you to register/unregister groups of users into a session or a course directly, reducing the administrative hassle. When you pick this option, learners will be able to see in which class they are through their social network interface.

*Default: `false`*


