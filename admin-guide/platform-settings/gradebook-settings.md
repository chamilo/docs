# Gradebook (Assessments) Settings

Defaults applied across the **Gradebook (Assessments)** tool — score display, decimal precision, certificate score thresholds, and aggregation.

Access these settings under **Administration > Configuration settings > Gradebook (Assessments)**. This category contains **34 settings**, listed below with the title and comment shipped in the platform's settings fixtures (`SettingsCurrentFixtures.php`).

> The variable name in code is shown in monospace. Use it when scripting via the API or when you need to change those settings at a global level by editing [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Settings

### `allow_gradebook_comments`

**Gradebook comments**

Enable gradebook comments so teachers can add a comment to the overall performance of the learner in this course. The comment will appear in the PDF export for the learner.

### `allow_gradebook_stats`

**Cache results in the gradebook**

Put some of the large calculations of averages in cached fields for the links and evaluations to increase speed (considerably). The potential negative impact is that it can take some time to refresh the gradebook results tables.

### `gradebook_badge_sidebar`

**Gradebook badges sidebar**

Generate a block inside the side menu where a few badges can be shown as pending approval. Requires gradebooks to be listed here, by (numerical) ID.

### `gradebook_default_grade_model_id`

**Default grade model**

This value will be selected by default when creating a course

### `gradebook_default_weight`

**Default weight in Gradebook**

This weight will be use in all courses by default

### `gradebook_dependency`

**Inter-gradebook dependencies**

Enables a mechanism of gradebook dependencies that lets people know which other items they need to go through first in order to complete the gradebook.

### `gradebook_dependency_mandatory_courses`

**Mandatory courses for gradebook dependencies**

When using inter-gradebook dependencies, you can choose a list of mandatory courses that will be required before approving any gradebook that has dependencies.

### `gradebook_detailed_admin_view`

**Show additional columns in gradebook**

Show additional columns in the student view of the gradebook with the best score of all students, the relative position of the student looking at the report and the average score of the whole group of students.

### `gradebook_display_extra_stats`

**Gradebook extra statistics**

Add additional columns to the gradebook's main report (1 = ranking, 2 = best score, 3 = average).

### `gradebook_enable`

**Assessments tool activation**

The Assessments tool allows you to assess competences in your organization by merging classroom and online activities evaluations into Performance reports. Do you want to activate it?

### `gradebook_enable_grade_model`

**Enable Gradebook model**

Enables the auto creation of gradebook categories inside a course depending of the gradebook models.

### `gradebook_enable_subcategory_skills_independant_assignement`

**Enable skills by gradebook's subcategory**

Skills are normally attributed for completing a whole gradebook. By enabling this option, you allow skills to be attached to sub-sections of gradebooks.

### `gradebook_flatview_extrafields_columns`

**User extra fields in gradebook flat view**

Add the given columns ('variables' array) to the main results table in the gradebook.

### `gradebook_hide_graph`

**Hide gradebook charts**

If your portal is resources-limited, reducing the generation of the dynamic gradebok charts with potentially thousands of results is a good option.

### `gradebook_hide_link_to_item_for_student`

**Hide item links for learners in gradebook**

Avoid learners clicking on items from the gradebook by removing the links on the items.

### `gradebook_hide_pdf_report_button`

**Hide gradebook button 'download PDF report'**

Removes the PDF export button from gradebook views for learners.

### `gradebook_hide_table`

**Hide gradebook table for learners**

Reduce gradebook load time by hiding the results table (but still giving access to certificates, skills, etc).

### `gradebook_locking_enabled`

**Enable locking of assessments by teachers**

Once enabled, this option will enable locking of any assessment by the teachers of the corresponding course. This, in turn, will prevent any modification of results by the teacher inside the resources used in the assessment: exams, learning paths, tasks, etc. The only role authorized to unlock a locked assessment is the administrator. The teacher will be informed of this possibility. The locking and unlocking of gradebooks will be registered in the system's report of important activities

### `gradebook_multiple_evaluation_attempts`

**Allow multiple evaluation attempts in gradebook**

Allows adding comments to multiple evaluation attempts in gradebook and result tables.

### `gradebook_number_decimals`

**Number of decimals**

Allows you to set the number of decimals allowed in a score

### `gradebook_pdf_export_settings`

**Gradebook PDF export options**

Change the PDF export for learners based on the provided settings ('hide_score_weight', 'hide_feedback_textarea', ...)

### `gradebook_report_score_style`

**Gradebook reports score style**

Add gradebook score style configuration in the flat view. See api.lib.php in order to find the options: examples SCORE_DIV = 1, SCORE_PERCENT = 2, etc

### `gradebook_score_display_colorsplit`

**Threshold**

The threshold (in %) under which scores will be colored red

### `gradebook_score_display_custom`

**Competence levels labelling**

Tick the box to enable Competence levels labelling

### `gradebook_score_display_custom_standalone`

**Custom score display in gradebook's standalone column**

Shows custom competence level values in a separate column in gradebook flatview when using custom score display.

### `gradebook_score_display_upperlimit`

**Display score upper limit**

Tick the box to show the score's upper limit

### `gradebook_use_apcu_cache`

**Use APCu caching to speed up gradebok**

Improve speed when rendering gradebook student reports using Doctrine APCU cache. APCu is an optional but recommended PHP extension.

### `gradebook_use_exercise_score_settings_in_categories`

**Use test settings for grades display**

Applies exercise score display settings (percentage vs. points) to category scores in gradebook.

### `gradebook_use_exercise_score_settings_in_total`

**Use global score display setting in gradebook**

Applies global exercise score display settings to total score calculations in gradebook.

### `hide_gradebook_percentage_user_result`

**Hide percentage in best/average gradebook results**

Removes percentage display from best/average score results shown to learners in gradebook.

### `my_display_coloring`

**Display colors for scores in the gradebook**

Enables color coding for better score visibility in the gradebook.

### `student_publication_to_take_in_gradebook`

**Assignment considered for gradebook**

In the assignments tool, students can upload more than one file. In case there is more than one for a single assignment, which one should be considered when ranking them in the gradebook? This depends on your methodology. Use 'first' to put the accent on attention to detail (like handling in time and handling the right work first). Use 'last' to highlight collaborative and adaptative work.

### `teachers_can_change_grade_model_settings`

**Teachers can change the Gradebook model settings**

When editing a Gradebook

### `teachers_can_change_score_settings`

**Teachers can change the Gradebook score settings**

When editing the Gradebook settings

