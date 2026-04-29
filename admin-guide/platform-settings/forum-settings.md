# Forums Settings

Behaviour of the course **Forums** tool.

Access these settings under **Administration > Configuration settings > Forums**. This category contains **9 settings**, listed below with the title and comment shipped in the platform's settings fixtures (`SettingsCurrentFixtures.php`).

> The variable name in code is shown in `monospace`. Use it when scripting via the API or referring to settings in `.env` overrides.

## Settings

### `allow_forum_category_language_filter`

**Forum categories language filter**

Add a language filter to the forum view to only see categries configured in a specific language. Requires using the 'language' extra field on the 'forum_category' entity.

### `allow_forum_post_revisions`

**Forum post review**

Enable this option to allow asking for a review or a translation to one's post in a forum. When extensively configured, can be used to collaborate with other users in a language-learning forum.

### `community_managers_user_list`

**Community managers list**

Provide an array of user IDs that will be considered community managers in the special course designated as global forum. Community managers have additional privileges on the global forum.

### `default_forum_view`

**Default forum view**

What should be the default option when creating a new forum. Any trainer can however choose a different view for every individual forum

### `display_groups_forum_in_general_tool`

**Display group forums in general forum**

Display group forums in the forum tool at the course level. This option is enabled by default (in this case, group forum individual visibilities still act as an additional criteria). If disabled, group forums will only be visible through the group tool, be them public or not.

### `forum_fold_categories`

**Fold forum categories**

Visual effect to enable forum categories folding/unfolding.

### `global_forums_course_id`

**Use course as global forum**

Set the course ID (numerical) of a course reserverd to use as a global forum. This replaces the 'Social groups' link in the social network by a link to the forum of that course.

### `hide_forum_post_revision_language`

**Hide forum post review language**

Hide the possibility to assign a language to a forum post review.

### `subscribe_users_to_forum_notifications_also_in_base_course`

**Forum notifications from base course as well**

Enable this option to enable notifications coming from the base course forum, even if following the course through a session.

