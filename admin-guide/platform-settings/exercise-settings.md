# Exercises (Tests) Settings

Defaults and behaviour of the **Exercises (Tests)** tool — question display, scoring, attempts, and similar.

Access these settings under **Administration > Configuration settings > Exercises (Tests)**. This category contains **63 settings**, listed below with the title and comment shipped in the platform's settings fixtures (`SettingsCurrentFixtures.php`).

> The variable name in code is shown in monospace. Use it when scripting via the API or when you need to change those settings at a global level by editing [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Settings

### `add_exercise_best_attempt_in_report`

**Enable display of best score attempt**

Provide a list of courses and tests' IDs that will show the best score attempt for any learner in the reports.

### `allow_coach_feedback_exercises`

**Allow coaches to comment in review of exercises**

Allow coaches to edit feedback during review of exercises

### `allow_edit_exercise_in_lp`

**Allow teachers to edit tests in learning paths**

By default, Chamilo prevents you from editing tests that are included inside a learning path. This is to avoid changes that would affect learners (past and future) differently regarding the results and/or progress in the learning path. This option allows teachers to bypass this restriction.

### `allow_exercise_categories`

**Enable test categories**

Test categories are not enabled by default because they add a level of complexity. Enable this feature to show all test categories related management icons appear.

### `allow_mandatory_question_in_category`

**Enable selecting mandatory questions**

Enable the selection of mandatory questions in a test when using random categories.

### `allow_notification_setting_per_exercise`

**Test notification settings at test-level**

Enable the configuration of test submission notifications at the test level rather than the course level. Falls back to course-level settings if not defined at test-level.

### `allow_quick_question_description_popup`

**Quick image addition to question**

Enable an additional icon in the test questions list to add an image as question description. This vastly accelerates question edition when the questions are in the title and the description only includes an image.

### `allow_quiz_question_feedback`

**Add question feedback if incorrect answer**

By default, Chamilo allows you to show feedback on each answer in a question. With this option, an additional field is created to provide pre-defined feedback to the whole question. This feedback will only appear if the user answered incorrectly.

### `allow_quiz_results_page_config`

**Enable test results page configuration**

Define an array of settings you want to apply to all tests results pages. Settings can be 'hide_question_score', 'hide_expected_answer', 'hide_category_table', 'hide_correct_answered_questions', 'hide_total_score' and possibly more in the future. Look for ‘getPageConfigurationAttribute’ in the code to see what’s in use.

### `allow_quiz_show_previous_button_setting`

**Show 'previous' button in test to navigate questions**

Set this to false to disable the 'previous' button when answering questions in a test, thus forcing users to always move ahead.

### `allow_teacher_comment_audio`

**Audio feedback to submitted answers**

Allow teachers to provide feedback to users through audio (alternatively to text) on each question in a test.

### `allow_time_per_question`

**Enable time per question in tests**

By default, it is only possible to limit the time per test. Limiting it per question adds an extra layer of possibilities, and you can (carefully) combine both.

### `block_category_questions`

**Lock questions of previous categories in a test**

When using this option, an additional option will appear in the test's configuration. When using a test with multiple question categories and asking for a distribution by category, this will allow the user to navigate questions per category. Once a category is finished, (s)he moves to the next category and cannot return to the previous category.

### `block_quiz_mail_notification_general_coach`

**Block sending test notifications to general coach**

Learners completing a test usually sends notifications to coaches, including the general session coach. Enable this option to omit the general coach from these notifications.

### `configure_exercise_visibility_in_course`

**Enable to bypass the configuration of Exercise invisible in session at a base course level**

To enable the configuration of the exercise invisibility in session in the base course to by pass the global configuration. If not set the global parameter is used.

### `disable_clean_exercise_results_for_teachers`

**Disable 'clean results' for teachers**

Disable the option to delete test results from the tests list. This is often used when less-careful teachers manage courses, to avoid critical mistakes.

### `email_alert_manager_on_new_quiz`

**Default e-mail alert setting on new quiz**

Whether you want course managers (teachers) to be notified by e-mail when a quiz is answered by a student. This is the default value to be given to all new courses, but each teacher can still change this setting in his/her own course.

### `enable_quiz_scenario`

**Enable Quiz scenario**

From here you will be able to create exercises that propose different questions depending in the user's answers.

### `exercise_additional_teacher_modify_actions`

**Additional links for teachers in tests list**

Configure callback elements to generate new action icons for teachers to the right side of the tests list, in the form of an array, e.g. ['myplugin' => ['MyPlugin', 'urlGeneratorCallback']]

### `exercise_attempts_report_show_username`

**Show username in test results page**

Show the username (instead or, or as well as, the user info) on the test results page.

### `exercise_category_report_user_extra_fields`

**Add user extra fields in exercise category report**

Define an array with the list of user extra fields to add to the report.

### `exercise_category_round_score_in_export`

**Round score in test exports**

When enabled, test scores are rounded to the nearest integer when exporting exercise reports.

### `exercise_embeddable_extra_types`

**Embeddable question types**

By default, only single answer and multiple answer questions are considered when deciding whether a test can be embedded in a video or not. With this option, you can decide that more question types are available. Be aware that not all question types fit nicely in the space assigned to videos. Questions types are availalble in the code in question.class.php.

### `exercise_hide_ip`

**Hide user IP from test reports**

By default, we show user information and its IP address, but this might be considered personal data, so this option allows you to remove this info from all test reports.

### `exercise_hide_label`

**Hide question ribbon (right/wrong) in test results**

In test results, a ribbon appears by default to indicate if the answer was right or wrong. Enable this option to remove the ribbon globally.

### `exercise_invisible_in_session`

**Exercise invisible in Session**

If an exercise is visible in the base course then it appears invisible in the session. If an exercise is invisible in the base course then it does not appear in the session.

### `exercise_max_editors_in_page`

**Max editors in exercise result screen**

Because of the sheer number of questions that might appear in an exercise, the correction screen, allowing the teacher to add comments to each answer, might be very slow to load. Set this number to 5 to ask the platform to only show WYSIWYG editors up to a certain number of answers on the screen. This will speed up the correction page loading time considerably, but will remove WYSIWYG editors and leave only a plain text editor.

### `exercise_max_score`

**Maximum score of exercises**

Define a maximum score (generally 10,20 or 100) for all the exercises on the platform. This will define how final results are shown to users and teachers.

### `exercise_min_score`

**Minimum score of exercises**

Define a minimum score (generally 0) for all the exercises on the platform. This will define how final results are shown to users and teachers.

### `exercise_result_end_text_html_strict_filtering`

**Bypass HTML filtering in test end messages**

Consider messages at the end of tests are always safe. Removing the filter makes it possible to use JavaScript there.

### `exercise_score_format`

**Tests score format**

Select between the following forms for the display of users' score in various reports: 1 = SCORE_AVERAGE (5 / 10); 2 = SCORE_PERCENT (50%); 3 = SCORE_DIV_PERCENT (5 / 10 (50%)). Use the numerical ID of the form you want to use.

### `exercises_disable_new_attempts`

**Disable new test attempts**

Disable new test attempts globally. Usually used when there is a problem with tests in general and you want some time to analyse without blocking the whole platform.

### `hide_free_question_score`

**Hide open questions' score**

Hide the fact that open questions (including audio and annotations) have a score by hiding the score display in all learner-facing reports.

### `hide_user_info_in_quiz_result`

**Hide user info on test results page**

The default test results page shows a user datasheet (photo, name, etc) which might, in some contexts, be considered as pushing the limits of personal data treatment. Enable this option to remove user details from the test results.

### `limit_exercise_teacher_access`

**Limit teachers' permissions over tests**

When enabled, teachers cannot delete tests nor questions, change tests visibility, download to QTI, clean results, etc.

### `my_courses_show_pending_exercise_attempts`

**Global pending tests list**

Enable to display to the final user a page with the list of pending tests across all courses.

### `question_exercise_html_strict_filtering`

**Bypass HTML filtering in test questions**

Consider questions text in tests are always safe. Removing the filter makes it possible to use JavaScript there.

### `question_pagination_length`

**Question pagination length for teachers**

Number of questions to show on every page when using the question pagination for teachers option.

### `quiz_answer_extra_recording`

**Enable extra test answers recording**

Enable recording of all answers (even temporary) in the track_e_attempt_recording table. This feautre is experimentaland can create issues in the reporting pages when attempting to grade a test.

### `quiz_check_all_answers_before_end_test`

**Check all answers before submitting test**

Display a popup with the list of answered/unanswered questions before submitting the test.

### `quiz_check_button_enable`

**Add answer-saving process check before test**

Make sure users are all set to start the test by providing a simulation of the question-saving process before entering the test. This allows for early detection of some connection issues and reduces user experience frictions.

### `quiz_confirm_saved_answers`

**Add checkbox for answers count confirmation**

This option adds a checkbox at the end of each test asking the user to confirm the number of answers saved. This provides better auditing data for critical tests.

### `quiz_discard_orphan_in_course_export`

**Discard orphan questions in course export**

When exporting a course, do not export the questions that are not part of any test.

### `quiz_generate_certificate_ending`

**Generate certificate on test end**

Generate certificate when ending a quiz. The quiz needs to be linked in the gradebook tool and have a pass percentage configured.

### `quiz_hide_attempts_table_on_start_page`

**Hide test attempts table on test start page**

Hide the table showing all previous attempts on the test start page.

### `quiz_hide_question_number`

**Hide question number**

Hide the question incremental numbering when taking a test.

### `quiz_image_zoom`

**Enable test images zooming**

Enable this feature to allow users to zoom on images used in the tests.

### `quiz_keep_alive_ping_interval`

**Keep session active in tests**

Keep session active by maintaining a regular ping signal to the server every x seconds, define here. We recommend once every 300 seconds.

### `quiz_open_question_decimal_score`

**Decimal score in open question types**

Allow the teacher to rate the open, oral expression and annotation question types with a decimal score.

### `quiz_prevent_copy_paste`

**Block copy-pasting in tests**

Block copy/paste/save/print keys and right-clicks in exercises.

### `quiz_question_delete_automatically_when_deleting_exercise`

**Automatically delete questions when deleting test**

The default behaviour is to make questions orphan when the only test using them is deleted. When enabled, this option ensure that all questions that would otherwise end up orphan are deleted as well.

### `quiz_results_answers_report`

**Show link to download test results**

On the test results page, display a link to download the results as a file.

### `quiz_show_description_on_results_page`

**Always show test description on results page**

When enabled, the test description is always displayed on the results page after test completion.

### `score_grade_model`

**Score grades model**

Define an array of score ranges and colors to display reports using this model. This allows you to show colors rather than numerical grades.

### `send_score_in_exam_notification_mail_to_manager`

**Add score in mail notification of test submission**

Add the learner's score to the e-mail notification sent to the teacher after a test was submitted.

### `show_exercise_attempts_in_all_user_sessions`

**Show test attempts from all sessions in pending tests report**

Show test attempts from users in all sessions where the general coach has access in pending tests report.

### `show_exercise_expected_choice`

**Show expected choice in test results**

Show the expected choice and a status (right/wrong) for each answer on the test results page (if the test has been configured to show results).

### `show_exercise_question_certainty_ribbon_result`

**Show score for certainty degree questions**

By default, Chamilo does not show a score for the certainty degree question types.

### `show_exercise_session_attempts_in_base_course`

**Show test attempts from all sessions in base course**

Show test attempts from users in all sessions to the teacher in the base course.

### `show_official_code_exercise_result_list`

**Display official code in exercises results**

Whether to show the students' official code in the exercises results reports

### `show_question_id`

**Show question IDs in tests**

Show questions' internal IDs to let users take note of issues on specific questions and report them more efficiently.

### `show_question_pagination`

**Show question pagination for teachers**

For tests with many questions, use pagination if the number of questions is higher than this setting. Set to 0 to prevent using pagination.

### `tracking_my_progress_show_deleted_exercises`

**Show deleted tests in 'My progress'**

Enable this option to display, on the 'My progress' page, the results of all tests you have taken, even the ones that have been deleted.

