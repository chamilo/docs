# Surveys Settings

Defaults and behaviour of the **Surveys** tool.

Access these settings under **Administration > Configuration settings > Surveys**. This category contains **12 settings**, listed below with the title and comment shipped in the platform's settings fixtures (`SettingsCurrentFixtures.php`).

> The variable name in code is shown in `monospace`. Use it when scripting via the API or referring to settings in `.env` overrides.

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

_No description in fixtures._

### `survey_additional_teacher_modify_actions`

**Add additional actions (as links) to survey lists for teachers**

Add actions (usually connected to plugins) in the list of surveys. Use array syntax ['myplugin' => ['MyPlugin', 'urlGeneratorCallback']].

### `survey_allow_answered_question_edit`

**Allow teachers to edit survey questions after students answered**

_No description in fixtures._

### `survey_anonymous_show_answered`

**Allow teachers to see who answered in anonymous surveys**

Allow teachers to see which learners have already answered an anonymous survey. This only appears once more than one user has answered, so it remains difficult to identify who answered what.

### `survey_backwards_enable`

**Enable 'previous question' button in surveys**

_No description in fixtures._

### `survey_duplicate_order_by_name`

**Order by student name when using survey duplication feature**

The survey duplication feature is oriented towards teachers and is meant to ask teachers to give their appreciation about each student in order. This option will order the questions by learner's lastname.

### `survey_email_sender_noreply`

**Survey e-mail sender (no-reply)**

Should the survey invitations use the coach e-mail address or the no-reply address defined in the main configuration section?

### `survey_mark_question_as_required`

**Mark all survey questions as 'required' by default**

_No description in fixtures._

