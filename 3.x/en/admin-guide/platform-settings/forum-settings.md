# Forums Settings

Behaviour of the course **Forums** tool.

Access these settings under **Administration > Configuration settings > Forums**. This category contains **14 settings**, listed below with the title and comment shipped in the platform's settings fixtures (`SettingsCurrentFixtures.php`).

> The variable name in code is shown in monospace. Use it when scripting via the API or when you need to change those settings at a global level by editing [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Settings

### `allow_forum_category_language_filter`

**Forum categories language filter**

Add a language filter to the forum view to only see categries configured in a specific language. Requires using the 'language' extra field on the 'forum_category' entity.

*Default: `false`*

### `allow_forum_post_revisions`

**Forum post review**

Enable this option to allow asking for a review or a translation to one's post in a forum. When extensively configured, can be used to collaborate with other users in a language-learning forum.

*Default: `false`*

### `community_managers_user_list`

**Community managers list**

Provide an array of user IDs that will be considered community managers in the special course designated as global forum. Community managers have additional privileges on the global forum.

### `default_forum_view`

**Default forum view**

What should be the default option when creating a new forum. Any trainer can however choose a different view for every individual forum

*Default: `flat`*

### `display_groups_forum_in_general_tool`

**Display group forums in general forum**

Display group forums in the forum tool at the course level. This option is enabled by default (in this case, group forum individual visibilities still act as an additional criteria). If disabled, group forums will only be visible through the group tool, be them public or not.

*Default: `true`*

### `first_reply_min_words`

**Minimum words for first forum reply**

Minimum reply length when the user has no previous post in the same forum thread. A shorter reply is refused with the message "N word minimum requirement not met". It applies to every user replying to a thread, but not to the opening post of a new thread. Set to 0 to accept replies of any length.

*Default: `0`*

### `forum_fold_categories`

**Fold forum categories**

Visual effect to enable forum categories folding/unfolding.

*Default: `false`*

### `global_forums_course_id`

**Use course as global forum**

Set the course ID (numerical) of a course reserverd to use as a global forum. This replaces the 'Social groups' link in the social network by a link to the forum of that course.

*Default: `0`*

### `hide_forum_post_revision_language`

**Hide forum post review language**

Hide the possibility to assign a language to a forum post review.

*Default: `false`*

### `show_category_description_in_thread`

**Show the forum category description in threads**

Display the category title and a shortened description above each thread, with **Read more** available for a long description.

*Default: `false`*

### `show_thread_replies_after_participation`

**Show thread replies only after participating**

For learners, return only the opening post of a thread until they contribute a post themselves. Administrators, teachers, session coaches and group tutors still see all posts; posts waiting for moderation count toward participation.

*Default: `false`*

### `subscribe_users_to_forum_notifications_also_in_base_course`

**Forum notifications from base course as well**

Enable this option to enable notifications coming from the base course forum, even if following the course through a session.

*Default: `false`*

### `subsequent_reply_min_words`

**Minimum words for subsequent forum replies**

Minimum reply length when the user already has a post in the same forum thread, to require for example a substantial first answer and allow shorter follow-up replies. Set to 0 to accept replies of any length.

*Default: `0`*

### `thread_participation_progress_posts`

**Posts required to complete a forum thread**

Number of learner posts required for the progress bar to reach 100%. Moderated posts awaiting approval count. Set to `0` to hide the bar. This is separate from the single-post requirement for revealing other replies.

*Default: `0`*
