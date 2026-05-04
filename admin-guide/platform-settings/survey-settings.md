# Surveys Settings

Defaults and behaviour of the **Surveys** tool.

Access these settings under **Administration > Configuration settings > Surveys**. This category contains **12 settings**, listed below with the title and comment shipped in the platform's settings fixtures (`SettingsCurrentFixtures.php`).

> The variable name in code is shown in monospace. Use it when scripting via the API or when you need to change those settings at a global level by editing [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Settings

### `extend_rights_for_coach_on_survey`

**Extend rights for coachs on surveys**

Activate this option will allow the coachs to create and edit surveys

### `hide_survey_edition`

**Prevent survey edition**

Prevent editing surveys for all surveys listed here (by code). Use * to prevent edition of all surveys.

### `hide_survey_reporting_button`

**Hide survey reporting button**

Allows admins to hide survey reporting button if surveys are used to survey teachers.

### `show_pending_survey_in_menu`

**Show "Pending surveys" in menu**

Display a menu item that lets users access their pending surveys.

### `show_surveys_base_in_sessions`

**Display surveys from base course in all session courses**

[inferred] Make surveys from the base course visible and available to learners in all related session courses.

### `survey_additional_teacher_modify_actions`

**Add additional actions (as links) to survey lists for teachers**

Add actions (usually connected to plugins) in the list of surveys. Use array syntax ['myplugin' => ['MyPlugin', 'urlGeneratorCallback']].

### `survey_allow_answered_question_edit`

**Allow teachers to edit survey questions after students answered**

[inferred] Allow instructors to modify survey questions even after learners have submitted responses.

### `survey_anonymous_show_answered`

**Allow teachers to see who answered in anonymous surveys**

Allow teachers to see which learners have already answered an anonymous survey. This only appears once more than one user has answered, so it remains difficult to identify who answered what.

### `survey_backwards_enable`

**Enable 'previous question' button in surveys**

[inferred] Enable a "previous question" navigation button to allow learners to review earlier survey questions.

### `survey_duplicate_order_by_name`

**Order by student name when using survey duplication feature**

The survey duplication feature is oriented towards teachers and is meant to ask teachers to give their appreciation about each student in order. This option will order the questions by learner's lastname.

### `survey_email_sender_noreply`

**Survey e-mail sender (no-reply)**

Should the survey invitations use the coach e-mail address or the no-reply address defined in the main configuration section?

### `survey_mark_question_as_required`

**Mark all survey questions as 'required' by default**

[inferred] Automatically mark all newly created survey questions as required responses by default.

