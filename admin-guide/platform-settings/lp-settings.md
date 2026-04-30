# Learning Paths Settings

Defaults and behaviour of the **Learning Paths** tool — autostart, default view, prerequisites, SCORM behaviour and similar.

Access these settings under **Administration > Configuration settings > Learning Paths**. This category contains **51 settings**, listed below with the title and comment shipped in the platform's settings fixtures (`SettingsCurrentFixtures.php`).

> The variable name in code is shown in `monospace`. Use it when scripting via the API or referring to settings in `.env` overrides.

## Settings

### `add_all_files_in_lp_export`

**Export all files when exporting a learning path**

When exporting a LP, all files and folders in the same path of an html will be exported too.

### `allow_htaccess_import_from_scorm`

**Allow .htaccess from SCORM packages**

Normally, all .htaccess files are filtered and removed when importing content in Chamilo. This feature allows .htaccess to be imported if it is present in a SCORM package.

### `allow_import_scorm_package_in_course_builder`

**SCORM import within course import**

Enable to copy the directory structure of SCORM packages when restoring a course (from the course maintenance tool).

### `allow_lp_chamilo_export`

**Export learning paths in the Chamilo backup format**

Enable the possibility to export any of your learning paths in a Chamilo course backup format.

### `allow_lp_return_link`

**Show learning paths return link**

Disable this option to hide the 'Return to homepage' button in the learning paths

### `allow_lp_subscription_to_usergroups`

**Learning paths subscription for classes**

Enable subscription to learning paths and learning path categories to groups/classes.

### `allow_session_lp_category`

**Learning paths categories can be managed in sessions**

[inferred] Enable learners and instructors to organize and manage learning paths by categories within session courses.

### `allow_teachers_to_access_blocked_lp_by_prerequisite`

**Teachers can access blocked learning paths**

Teachers do not need to pass complete learning paths to have access to a prerequisites-blocked learning path.

### `disable_js_in_lp_view`

**Disable JS in learning paths view**

Disable JS files that Chamilo usually adds to HTML files in the learning path (while displaying them).

### `disable_my_lps_page`

**Hide 'My learning paths' page**

The page 'My learning path' was added in 1.11. Use this option to hide it.

### `download_files_after_all_lp_finished`

**Download button after finishing learning paths**

Show download files button after finishing all LP. Example: if ABC is the course code, and 1 and 100 are the doc id, choose: ['courses' => ['ABC' => [1, 100]]].

### `force_edit_exercise_in_lp`

**Edition of tests included in learning paths**

Enable editing tests even if they have been included in a learning path. The default is to prevent edition if the test is in a learning path, because that can affect consistency of tracking among many learners if test modifications are significant.

### `hide_accessibility_label_on_lp_item`

**Hide requirements label in learning paths**

Hide the pre-requisites tooltip on learning path items. This is mostly an estaethic choice.

### `hide_lp_time`

**Hide time from learning paths records**

Hide learning paths time spent in reports in general.

### `hide_scorm_copy_link`

**Hide SCORM Copy**

Hide the Learning Path Copy icon from the Learning Paths list

### `hide_scorm_export_link`

**Hide SCORM Export**

Hide the SCORM Export icon from the Learning Paths list

### `hide_scorm_pdf_link`

**Hide Learning Path PDF export**

Hide the Learning Path PDF Export icon from the Learning Paths list

### `lp_allow_export_to_students`

**Learners can export learning paths**

Enable this to allow learners to download the learning paths as SCORM packages.

### `lp_enable_flow`

**Navigate between learning paths**

Add the possibility to select a 'next' learning path and show buttons inside the learning path to move from one to the next.

### `lp_fixed_encoding`

**Fixed encoding in learning path**

Reduce resource usage by ignoring a check on the text encoding in imported learning paths.

### `lp_item_prerequisite_dates`

**Date-based learning path items prerequisites**

Adds the option to define prerequisites with start and end dates for learnpath items.

### `lp_menu_location`

**Learning path menu location**

Set this to 'left' or 'right' to change the side of the learning path menu.

### `lp_minimum_time`

**Minimum time to complete learning path**

Add a minimum time field to learning paths. If the user has not spent that much time on the learning path, the last item of the learning path cannot be completed.

### `lp_prerequisit_on_quiz_unblock_if_max_attempt_reached`

**Unlock learning path item if max attempt is reached for test prerequisite**

[inferred] Automatically unlock subsequent learning path items when a learner exhausts maximum quiz attempts for a prerequisite test.

### `lp_prerequisite_on_quiz_unblock_if_max_attempt_reached`

**Unlock prerequisites after last test attempt**

Allows users to continue in a learning path after using all quiz attempts of a test used as prerequisite for other items.

### `lp_prerequisite_use_last_attempt_only`

**Use last score in learning path test prerequisites**

When a test is used as prerequisite for an item in the learning path, use the last attempt of the test only as validation for the prerequisite (default is to use best attempt).

### `lp_prevents_beforeunload`

**Prevent beforeunload JS event in learning path**

This helps with browser compatibility by preventing tricky JS events to execute.

### `lp_score_as_progress_enable`

**Use learning path score as progress**

This is useful when using SCORM content with only one large SCO. SCORM does not communicate progress, so this is a trick to use the score as progress. Enabling this option will let you configure this on a per-learning path basis.

### `lp_show_max_progress_instead_of_average`

**Show max progress instead of average for learning paths reporting**

[inferred] Calculate learning path progress based on maximum item completion rather than averaging all items.

### `lp_show_max_progress_or_average_enable_course_level_redefinition`

**Select max progress vs average for learning paths at course level**

Enable redefinition of the setting to show the best progress instead of averages in reporting of learnpaths at a course level.

### `lp_show_reduced_report`

**Learning paths: show reduced report**

Inside the learning paths tool, when a user reviews his own progress (through the stats icon), show a shorten (less detailed) version of the progress report.

### `lp_start_and_end_date_visible_in_student_view`

**Display learning path availability to learners**

Show learning paths to learners with their availability dates, rather than hiding them until the date comes.

### `lp_subscription_settings`

**Learning paths subscription settings**

Configure additional options for the learning paths subscription feature. Options include 'allow_add_users_to_lp' and 'allow_add_users_to_lp_category'.

### `lp_view_accordion`

**Foldable learning paths' items**

[inferred] Display learning path items in collapsible accordion format for improved navigation and content organization.

### `lp_view_settings`

**Learning path display settings**

Configure additional options for the learning paths display. Options include 'show_reporting_icon', 'hide_lp_arrow_navigation', 'show_toolbar_by_default', 'navigation_in_the_middle' and 'add_extra_quit_to_home_icon'.

### `scorm_api_extrafield_to_use_as_student_id`

**Use extra field as student\_id in SCORM communication**

Give the name of the extra field to be used as student_id for all SCORM communication.

### `scorm_api_username_as_student_id`

**Use username as student\_id in SCORM communication**

[inferred] Use learner username as the student identifier in SCORM API communication instead of learner ID.

### `scorm_lms_update_sco_status_all_time`

**Update SCO status autonomously**

If the SCO is not sending a status, take over and update the status based on what can be observed in Chamilo.

### `scorm_upload_from_cache`

**Upload SCORM from cache dir**

Allow admins to upload a SCORM package (in zip form) into the cache directory and to use it as import source on the SCORM upload page.

### `show_hidden_exercise_added_to_lp`

**Display tests from learning paths even if invisible**

Show hidden exercises that were added to a LP in the exercise list. If we are in a session, the test is invisible in the base course, it is included in a LP and the setting to show it is not specifically set to true, then hide it.

### `show_invisible_exercise_in_lp_list`

**Display tests in list of learning path tests even if invisible**

[inferred] Include hidden tests in the list of available tests when viewing learning path contents.

### `show_invisible_exercise_in_lp_toc`

**Invisible tests visible in learning paths**

Make tests marked as 'invisible' in the tests tool appear when they are included in a learning path.

### `show_invisible_lp_in_course_home`

**Display link to learning path on course home when invisible**

If a learning path is set to invisible but the teacher/coach decided to make it available from the course homepage, this option prevents Chamilo from hiding the link on the course homepage.

### `show_prerequisite_as_blocked`

**Learning path's prerequisites**

On the learning paths lists, display a visual element to show that other learning paths are currently blocked by some prerequisites rule.

### `student_follow_page_add_LP_acquisition_info`

**Add acquisition column in learner follow-up**

Add column to learner follow-up page to show acquisition status by a learner on a learning path.

### `student_follow_page_add_LP_invisible_checkbox`

**Add visibility information for learning paths on learner follow-up page**

[inferred] Display visibility status indicator for learning paths on the learner progress tracking page.

### `student_follow_page_add_LP_subscription_info`

**Unlocked information in learning paths list**

This adds an 'unlocked' column in the learning paths list if the learner is subscribed to the given learning path and has access to it.

### `student_follow_page_hide_lp_tests_average`

**Hide percentage sign in average of tests in learning paths in learner follow-up**

Hides the icon of percentage in 'Average of tests in Learning Paths' indication on a student tracking

### `student_follow_page_include_not_subscribed_lp_students`

**Include learning paths not subscribed to on learner follow-up page**

[inferred] Show learning paths on progress pages even when learners are not subscribed to them.

### `ticket_lp_quiz_info_add`

**Add learning paths and tests info to ticket reporting**

[inferred] Include learning path and test information in support ticket reporting for better issue tracking.

### `validate_lp_prerequisite_from_other_session`

**Use learning path item status from other sessions**

Allow users to complete prerequisites in a learning path if the corresponding item was already completed in another session.

