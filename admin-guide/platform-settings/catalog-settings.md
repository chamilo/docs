# Course Catalog Settings

Behaviour of the course catalog (the public list where users can browse and self-enroll).

Access these settings under **Administration > Configuration settings > Course Catalog**. This category contains **13 settings**, listed below with the title and comment shipped in the platform's settings fixtures (`SettingsCurrentFixtures.php`).

> The variable name in code is shown in `monospace`. Use it when scripting via the API or referring to settings in `.env` overrides.

## Settings

### `allow_session_auto_subscription`

**Auto Session Subscription**

Enable automatic subscription to sessions for users.

### `allow_students_to_browse_courses`

**Allow Student Browsing**

Permit students to browse and filter the course catalog.

### `course_catalog_display_in_home`

**Display Catalog on Homepage**

Show the course catalog block on the platform homepage.

### `course_catalog_hide_private`

**Hide Private Courses**

Exclude private courses from the catalog display.

### `course_catalog_published`

**Publish course catalogue**

Make the courses catalogue available to anonymous users (the general public) without the need to login.

### `course_catalog_settings`

**Course catalogue settings**

JSON configuration for course catalog: link settings, filters, sort options, and more.

### `course_subscription_in_user_s_session`

**Subscription in Session View**

Allow users to subscribe to courses directly from their session page.

### `hide_public_link`

**Hide Public Link**

Remove the public URL link from course cards.

### `only_show_course_from_selected_category`

**Only show matching categories in courses catalogue**

When not empty, only the courses from the given categories will appear in the courses catalogue.

### `only_show_selected_courses`

**Only Selected Courses**

Show only manually selected courses in the catalog.

### `session_catalog_settings`

**Session Catalog Settings**

JSON configuration for session catalog: filters and display options.

### `show_courses_descriptions_in_catalog`

**Show Course Descriptions**

Display course descriptions within the catalog listing.

### `show_courses_sessions`

**Show Courses & Sessions**

Include both courses and sessions in catalog results.

