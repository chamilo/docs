# Workflows Settings

Cross-cutting workflow toggles — course creation, enrollment validation, assignment workflows, and similar.

Access these settings under **Administration > Configuration settings > Workflows**. This category contains **23 settings**, listed below with the title and comment shipped in the platform's settings fixtures (`SettingsCurrentFixtures.php`).

> The variable name in code is shown in `monospace`. Use it when scripting via the API or referring to settings in `.env` overrides.

## Settings

### `allow_user_course_subscription_by_course_admin`

**Allow User Course Subscription By Course Admininistrator**

Activate this option will allow course administrator to subscribe users inside a course

### `allow_users_to_create_courses`

**Allow non admin to create courses**

Allow non administrators (teachers) to create new courses on the server

### `allow_working_time_edition`

**Enable edition of course work time**

Enable this feature to let teachers manually update the time spent in the course by learners.

### `course_visibility_change_only_admin`

**Course visibility changes for admins only**

Remove the possibility for non-admins to change the course visibility. Visibility can be an issue when there are too many teachers to control directly. Forcing visibilities allows the organization to better manage courses catalogues.

### `default_menu_entry_for_course_or_session`

**Default menu entry for courses**

Define the default sub-elements of the 'Courses' entry to display if user is not registered to any course nor session.

### `disable_user_conditions_sender_id`

**Internal ID of the user used to send disabled account notifications**

Avoid being too personal with users by using a 'bot' account to send e-mails to users when their account is disabled for some reason.

### `disabled_edit_session_coaches_course_editing_course`

**Disable the ability to edit course coaches**

When disabled, admins do not have a link to quickly assign coaches to session-courses on the course edition page.

### `drh_allow_access_to_all_students`

**HRM can access all students from reporting pages**

_No description in fixtures._

### `gamification_mode`

**Gamification mode**

Activate the stars achievement in learning paths

### `go_to_course_after_login`

**Go directly to the course after login**

When a user is registered in one course, go directly to the course after login

### `load_term_conditions_section`

**Load term conditions section**

The legal agreement will appear during the login or when enter to a course.

### `multiple_url_hide_disabled_settings`

**Hide disabled settings in sub-URLs**

Set to yes to hide settings completely in a sub-URL if the setting is disabled in the main URL (where the access_url_changeable field = 0)

### `plugin_redirection_enabled`

**Enable redirection plugin**

Enable only if you are using the Redirection plugin

### `redirect_index_to_url_for_logged_users`

**Redirect index.php to given URL for authenticated users**

If you do not want to use the index page (announcements, popular courses, etc), you can define here the script (from the document root) where users will be redirected when trying to load the index.

### `send_all_emails_to`

**Send all e-mails to**

Give a list of e-mail addresses to whom *all* e-mails sent from the platform will be sent. The e-mails are sent to these addresses as a visible destination.

### `session_admin_user_subscription_search_extra_field_to_search`

**Extra user field used to search and name sessions**

This setting defines the extra user field key (e.g., "company") that will be used to search for users and to define the name of the session when registering students from /admin-dashboard/register.

### `teacher_can_select_course_template`

**Teacher can select a course as template**

Allow pick a course as template for the new course that teacher is creating

### `update_student_expiration_x_date`

**Set expiration date on first login**

Array defining the 'days' and 'months' to set the account expiration date when the user first logs in.

### `user_edition_extra_field_to_check`

**Set an extra field as trigger for registration as ex-learner**

Give an extra field label here. If this extra field is updated for any user, a process is triggered to check the access to this user to courses with the same given extra field.

### `user_number_of_days_for_default_expiration_date_per_role`

**Default expiration days by role**

An array of role => number which represents the number of days an account has before expiration, depending on the role.

### `usergroup_do_not_unsubscribe_users_from_course_nor_session_on_user_unsubscribe`

**Disable user unsubscription from course/session on user unsubscription from group/class**

_No description in fixtures._

### `usergroup_do_not_unsubscribe_users_from_course_on_course_unsubscribe`

**Disable user unsubscription from course on course removal from group/class**

_No description in fixtures._

### `usergroup_do_not_unsubscribe_users_from_session_on_session_unsubscribe`

**Disable user unsubscription from session on session removal from group/class**

_No description in fixtures._

