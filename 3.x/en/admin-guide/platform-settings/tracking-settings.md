# Tracking Settings

Tracking-related defaults — what is recorded, what reports are exposed, time computation rules.

Access these settings under **Administration > Configuration settings > Tracking**. This category contains **14 settings**, listed below with the title and comment shipped in the platform's settings fixtures (`SettingsCurrentFixtures.php`).

> The variable name in code is shown in monospace. Use it when scripting via the API or when you need to change those settings at a global level by editing [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Settings

### `block_my_progress_page`

**Prevent access to 'My progress'**

In specific implementations like online exams, you might want to prevent user access to the 'My progress' page.

*Default: `false`*

### `footer_extra_content`

**Extra content in footer**

You can add HTML code like meta tags

### `header_extra_content`

**Extra content in header**

You can add HTML code like meta tags

### `meta_description`

**Meta description**

This will show an OpenGraph Description meta (og:description) in your site's headers

### `meta_image_path`

**Meta image path**

This Meta Image path is the path to a file inside your Chamilo directory (e.g. home/image.png) that should show in a Twitter card or a OpenGraph card when showing a link to your LMS. Twitter recommends an image of 120 x 120 pixels, which might sometimes be cropped to 120x90.

### `meta_title`

**OpenGraph meta title**

This will show an OpenGraph Title meta (og:title) in your site's headers

### `meta_twitter_creator`

**Twitter Creator account**

The Twitter Creator is a Twitter account (e.g. @ywarnier) that represents the *person* that created the site. This field is optional.

### `meta_twitter_site`

**Twitter Site account**

The Twitter site is a Twitter account (e.g. @chamilo_news) that is related to your site. It is usually a more temporary account than the Twitter creator account, or represents an entity (instead of a person). This field is required if you want the Twitter card meta fields to show.

### `my_progress_course_tools_order`

**Order of tools on 'My progress' page**

Change the order of tools shown on the 'My progress' page for learners. Options include 'quizzes', 'learning_paths' and 'skills'.

### `tracking_skip_generic_data`

**Skip generic data in learner self-tracking page**

If the 'My progress' page takes too long to load, you might want to remove the processing of generic statistics for the user. In this case enable this setting.

*Default: `false`*

### `hide_ip_address`

**Hide IP address from reports**

Hide IP addresses from visual reports and report exports. The setting defaults to enabled; hiding values in reports does not erase IP addresses already stored or prevent access through authorized personal-data procedures.

*Default: `true`*

See [IP visibility PR #9312](https://github.com/chamilo/chamilo-lms/pull/9312).

### `maximum_inactive_time_to_consider`

**Maximum inactive time to consider (minutes)**

A course page left open can generate automatic requests. After this interval without a meaningful user action, the period no longer contributes to tracked course activity time. This is a reporting rule, not an automatic logout mechanism.

*Default: `15` minutes*

### `max_time_spent_per_session_threshold`

**Max time spent per session threshold (minutes)**

Caps the amount of a single login session counted as activity in reports so an exceptionally long open session does not inflate study-time totals. Separate login sessions can still contribute to the total time. This does not terminate a learner session.

*Default: `360` minutes*

See [session time cap PR #9445](https://github.com/chamilo/chamilo-lms/pull/9445).

### `recycle_bin_retention_hours`

**Recycle bin retention (hours)**

Minimum age of deleted exercise attempts and learning-path progress before permanent purge is allowed. The cleanup command `chamilo:recycle-bin:purge` previews by default; permanent cleanup requires `--execute`. The setting does not by itself schedule automatic cleanup.

*Default: `720` hours (30 days)*

See [exercise and LP recycle bins PR #9383](https://github.com/chamilo/chamilo-lms/pull/9383).
