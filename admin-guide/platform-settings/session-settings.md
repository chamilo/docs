# Sessions Settings

Defaults and behaviour for **Sessions** — session lifecycle, coach access windows, course visibility within a session, and similar.

Access these settings under **Administration > Configuration settings > Sessions**. This category contains **68 settings**, listed below with the title and comment shipped in the platform's settings fixtures (`SettingsCurrentFixtures.php`).

> The variable name in code is shown in monospace. Use it when scripting via the API or when you need to change those settings at a global level by editing [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Settings

### `add_users_by_coach`

**Register users by Coach**

Coach users may create users to the platform and subscribe users to a session.

*Default: `false`*

### `allow_career_diagram`

**Enable career diagrams**

Career diagrams allow you to display diagrams of careers, skills and courses.

*Default: `false`*


### `allow_career_users`

**Enable career diagrams for users**

If career diagrams are enabled, users can only see them (and only the diagrams that correspond to their studies) if you enable this option.

*Default: `false`*

### `allow_coach_to_edit_course_session`

**Allow coaches to edit inside course sessions**

Allow coaches to edit inside course sessions

*Default: `true`*

### `allow_delete_user_for_session_admin`

**Session admins can delete users**

Session administrators can remove users from the platform when managing their session(s).

*Default: `false`*


### `allow_disable_user_for_session_admin`

**Session admins can disable users**

Session administrators can disable user accounts to prevent login while retaining enrollment records in their session(s).

*Default: `false`*


### `allow_edit_tool_visibility_in_session`

**Allow tool visibility edition in sessions**

When using sessions, the default behaviour is to use the tool visibility defined in the base course. This setting changes that to allow coaches in session courses to adapt tool visibilities to their needs.

*Default: `false`*

### `allow_redirect_to_session_after_inscription_about`

**Redirect to session after registration in session's 'About' page**

Automatically redirect new users to their session page after they complete registration through a session's About page.

*Default: `false`*


### `allow_search_diagnostic`

**Enable sessions search diagnosis**

Allow tutors to get a diagnosis that will allow them to search for the best sessions for learners.

*Default: `false`*


### `allow_session_admin_extra_access`

**Session admin can access batch user import, update and export**

Session administrators can access batch user import, update, and export functionality in addition to their standard permissions.

*Default: `false`*


### `allow_session_admin_login_as_teacher`

**Session admins can 'login as' teachers**

Session administrators can impersonate teacher accounts to preview course content and student experience within their session(s).

*Default: `false`*


### `allow_session_admin_read_careers`

**Session admins can view careers**

[inferred] Session administrators can view and access career paths and promotion workflows linked to their managed sessions.

*Default: `false`*


### `allow_session_admins_to_manage_all_sessions`

**Allow session administrators to see all sessions**

When this option is not enabled (default), session administrators can only see the sessions they have created. This is confusing in an open environment where session administrators might need to share support time between two sessions.

*Default: `false`*

### `allow_session_course_copy_for_teachers`

**Allow session-to-session copy for teachers**

Enable this option to let teachers copy their content from one course in a session to a course in another session. By default, this option is only available to platform administrators.

*Default: `false`*

### `allow_teachers_to_create_sessions`

**Allow teachers to create sessions**

Teachers can create, edit and delete their own sessions.

*Default: `false`*

### `allow_tutors_to_assign_students_to_session`

**Tutors can assign students to sessions**

When enabled, course coaches/tutors in sessions can subscribe new users to their session. This option is otherwise only available to administrators and session administrators.

*Default: `false`*

### `allow_user_session_collapsable`

**Allow user to collapse sessions in My sessions**

Users can collapse session cards or groups in the My sessions page to reduce visual clutter and improve navigation.

*Default: `false`*


### `assignment_base_course_teacher_access_to_all_session`

**Base course teacher can see assignments from all sessions**

Show all learner publications (from base course and from all sessions) in the work/pending.php page of the base course.

*Default: `false`*

### `career_diagram_disclaimer`

**Display a disclaimer below the career diagram**

Add a disclaimer below the career diagram. A language variable called 'Career diagram disclaimer' must exist in your sub-language.

*Default: `false`*

### `career_diagram_legend`

**Display a legend below the career diagram**

Add a career legend below the career diagram. A language variable called 'Career diagram legend' must exist in your sub-language.

*Default: `false`*

### `courses_list_session_title_link`

**Type of link for the session title**

On the courses/sessions page, the session title can be either of the following : 0 = no link (hide session title) ; 1 = link title to a special session page ; 2 = link to the course if there is only one course ; 3 = session title makes the courses list foldable ; 4 = no link (show session title).

*Default: `1`*

### `default_session_list_view`

**Default sessions list view**

Select the default tab you want to see when opening the sessions list as admin.

*Default: `all`*


### `drh_can_access_all_session_content`

**HR directors access all session content**

If enabled, human resources directors will get access to all content and users from the sessions (s)he follows.

*Default: `true`*

### `duplicate_specific_session_content_on_session_copy`

**Enable the copy of session-specific content to another session**

Allows duplication of resources that were created in the session when duplicating the session.

*Default: `false`*


### `email_template_subscription_to_session_confirmation_lost_password`

**Add reset password link to e-mail notification of subscription to session**

Include a password reset link in subscription confirmation emails sent to users when they are enrolled in a session.

### `email_template_subscription_to_session_confirmation_username`

**Add username to e-mail notification of subscription to session**

Include the user's username in subscription confirmation emails sent when they are enrolled in a session.

### `enable_auto_reinscription`

**Enable Automatic Reinscription**

Enable or disable automatic reinscription when course validity expires. The related cron job must also be activated.

*Default: `false`*


### `enable_session_replication`

**Enable Session Replication**

Enable or disable automatic session replication. The related cron job must also be activated.

*Default: `false`*


### `extend_rights_for_coach`

**Extend rights for coach**

Activate this option will give the coach the same permissions as the trainer on authoring tools

*Default: `false`*

### `hide_courses_in_sessions`

**Hide courses list in sessions**

When showing the session block in your courses page, hide the list of courses inside that session (only show them inside the specific session screen).

*Default: `false`*

### `hide_reporting_session_list`

**Hide sessions list in reporting tool**

Sessions that include the course are listed in the reporting tool inside the course itself, which can add considerable weight if the same course is used in hundreds of sessions. This option removes that list.

*Default: `false`*


### `hide_search_form_in_session_list`

**Hide search form in sessions list**

Remove the search input field from the session list view in the administration interface.

*Default: `false`*


### `hide_session_graph_in_my_progress`

**Hide session chart in My progress**

Conceal session progress charts and visualizations from the My progress page in learner dashboards.

*Default: `false`*


### `hide_tab_list`

**Hide tabs on the session page**

Remove navigation tabs from the session detail page to simplify the interface.

### `limit_session_admin_list_users`

**Session admins are forbidden access to the users list**

Prevent session administrators from accessing the global users list in the administration interface.

*Default: `false`*


### `limit_session_admin_role`

**Limit session admins permissions**

If enabled, the session administrators will only see the User block with the 'Add user' option and the Sessions block with the 'Sessions list' option.

*Default: `false`*

### `my_courses_session_order`

**Change the default sorting of session in My sessions**

By default, sessions are ordered by start date. Change this by providing an array of type ['field' => 'end_date', 'order' => 'desc'].

### `my_courses_view_by_session`

**View my courses by session**

Enable an additional 'My courses' page where sessions appear as part of courses, rather than the opposite.

*Default: `false`*

### `my_progress_session_show_all_courses`

**My progress: show course details in session**

Display all details of each course in session when clicking on session details.

*Default: `false`*


### `prevent_session_admins_to_manage_all_users`

**Prevent session admins to manage all users**

By enabling this option, session admins will only be able to see, in the administration page, the users they created.

*Default: `false`*

### `remove_session_url`

**Hide link to session page**

Hide link to the session page from the sessions list.

*Default: `false`*


### `session_admins_access_all_content`

**Session admins can access all course content**

Session administrators can view all course content within their sessions, including restricted or archived materials.

*Default: `false`*

### `session_admins_edit_courses_content`

**Session admins can edit course content**

Session administrators can modify course content (documents, exercises, tools) in courses assigned to their sessions.

*Default: `false`*

### `session_automatic_creation_user_id`

**Auto-created session's creator ID**

Set the user to use as creator of the automatically-created sessions (to avoid assigning every session to user '1' which is often the portal administrator).

*Default: `1`*


### `session_classes_tab_disable`

**Disable add class in session course for non-admin**

Disable tab to add classes in session course for non-admins.

*Default: `false`*


### `session_coach_access_after_duration_end`

**Sessions by duration always available to coaches**

Otherwise, session coaches only have access to sessions by duration during the active duration.

*Default: `false`*


### `session_course_ordering`

**Session courses manual ordering**

Enable this option to allow the session administrators to order the courses inside a session manually. If disabled, courses are ordered alphabetically on course title.

*Default: `false`*

### `session_course_users_subscription_limited_to_session_users`

**Limit subscriptions to course to only users of the session**

Restrict the list of students to subscribe in the course session. And disable registration for users in all courses from Resume Session page.

*Default: `false`*


### `session_courses_read_only_mode`

**Set course read-only in session**

Let teachers set some courses in read-only mode when opened through sessions. In the course properties, check the 'Lock course in session' option.

*Default: `false`*


### `session_creation_form_set_extra_fields_mandatory`

**Set mandatory extra fields in session creation form**

Require the listed fields during session creation.

### `session_creation_user_course_extra_field_relation_to_prefill`

**Pre-fill session fields with user fields**

Array of relationships between user extra fields and session extra fields, so the session can be pre-filled with data matching the user's data.

### `session_days_after_coach_access`

**Default coach access days after session**

Default number of days a coach can access his session after the official session end date

*Default: `0`*

### `session_days_before_coach_access`

**Default coach access days before session**

Default number of days a coach can access his session before the official session start date

*Default: `0`*

### `session_import_settings`

**Options for session import**

Array of options to apply as default parameters in the CSV/XML session import.

### `session_list_order`

**Sessions support manual sorting**

Enable manual reordering of sessions in the administration session list via drag-and-drop or similar mechanism.

*Default: `false`*


### `session_list_show_count_users`

**Show number of users in sessions list**

The admin can see the number of users in each session. This adds additional weight to the sessions list, so if you use it often, consider carefully whether you want the extra waiting time.

*Default: `false`*


### `session_list_view_remaining_days`

**Show remaining days in My Sessions**

If enabled, the session dates on the "My Sessions" page will be replaced by the number of remaining days.

*Default: `false`*

### `session_model_list_field_ordered_by_id`

**Sort session templates by id in session creation form**

[inferred] Sort session templates by their numeric ID in the session creation form dropdown instead of alphabetically by name.

*Default: `false`*


### `session_multiple_subscription_students_list_avoid_emptying`

**Prevent emptying the subscribed users in session subscription**

When using the multiple learners subscription to a session, prevent the normal behaviour which is to unsubscribe users who are not in the right panel when clicking submit. Keep all users there.

*Default: `false`*


### `show_all_sessions_on_my_course_page`

**Show all sessions on 'My courses' page**

If enabled, this option show all sessions of the user in calendar-based view.

*Default: `true`*


### `show_session_coach`

**Show session coach**

Show the global session coach name in session title box in the courses list

*Default: `false`*

### `show_session_data`

**Show session data title**

Show session data comment

*Default: `false`*

### `show_session_description`

**Show session description**

Show the session description wherever this option is implemented (sessions tracking pages, etc)

*Default: `false`*

### `show_simple_session_info`

**Show simple session info**

Add coach and dates to the session's subtitle in the sessions' list.

*Default: `true`*


### `show_users_in_active_sessions_in_tracking`

**Only display users from active sessions in tracking**

Display only users from currently active sessions in learner tracking and reporting views.

*Default: `false`*


### `tracking_columns`

**Customize course-session tracking columns**

Define an array of columns for the following reports: 'course_session', 'my_students_lp', 'my_progress_lp', 'my_progress_courses'.

### `user_s_session_duration`

**Auto-created sessions duration**

Duration (in days) of the single-user, auto-created sessions. After expiry, the user cannot register to the same course (no other session is created).

*Default: `1095`*


### `user_session_display_mode`

**My Sessions display mode**

Choose how the "My Sessions" page is displayed: as a modern visual block (card) view or the classic list style.

*Default: `list`*
