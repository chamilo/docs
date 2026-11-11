# Groups Settings

Behaviour of the course **Groups** tool.

Access these settings under **Administration > Configuration settings > Groups**. This category contains **4 settings**, listed below with the title and comment shipped in the platform's settings fixtures (`SettingsCurrentFixtures.php`).

> The variable name in code is shown in monospace. Use it when scripting via the API or when you need to change those settings at a global level by editing [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Settings

### `allow_group_categories`

**Group categories**

Allow teachers to create categories in the Groups tool?

*Default: `false`*


### `allow_invite_non_friends_to_social_groups`

**Allow inviting non-friends to social groups**

Only a platform administrator or the admin/moderator of a social group can invite people to it (**Social network > Groups >** the group **> Invite friends**). This setting controls whom they can invite.

* **Off (default)** — the group admin or moderator can only invite their own confirmed friends. The invitation form lists those friends only, and the server also refuses any other user, even if one is submitted by hand: a warning "Some of the selected users cannot be invited and were skipped" is shown. Pending friend requests do not count as friends.
* **On** — they can also invite any other user of the platform. An extra **Users** search field appears below the friends list of the invitation form.

The same rule applies to the group invitation screen of the new social interface.

Variable: `group.allow_invite_non_friends_to_social_groups`

**Existing installations:** the setting row is created by re-running the settings synchronisation migration (`doctrine:migrations:execute 'Chamilo\CoreBundle\Migrations\Schema\V310\Version20261023140000' --up`). Until then the setting behaves as "Off" and does not appear in the administration page.

*Default: `false`*


### `hide_course_group_if_no_tools_available`

**Hide course group if no tool**

If no tool is available in a group and the user is not registered to the group itself, hide the group completely in the groups list.

*Default: `false`*


### `show_groups_to_users`

**Show classes to users**

Show the classes to users. Classes are a feature that allow you to register/unregister groups of users into a session or a course directly, reducing the administrative hassle. When you pick this option, learners will be able to see in which class they are through their social network interface.

*Default: `false`*


