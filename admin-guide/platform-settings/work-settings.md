# Assignments (Work) Settings

Defaults and behaviour of the **Assignments (Student Publications)** tool.

Access these settings under **Administration > Configuration settings > Assignments (Work)**. This category contains **12 settings**, listed below with the title and comment shipped in the platform's settings fixtures (`SettingsCurrentFixtures.php`).

> The variable name in code is shown in `monospace`. Use it when scripting via the API or referring to settings in `.env` overrides.

## Settings

### `allow_compilatio_tool`

**Enable Compilatio**

Compilatio is an anti-cheating service that compares text between two submissions and reports if there is a high probability the content (usually assignments) is not genuine.

### `allow_my_student_publication_page`

**Enable My assignments page**

_No description in fixtures._

### `allow_only_one_student_publication_per_user`

**Students can only upload one assignment**

_No description in fixtures._

### `allow_redirect_to_main_page_after_work_upload`

**Redirect to assigment tool homepage after upload or comment**

Redirect to assignments list after uploading an assignment or a adding a comment

### `assignment_prevent_duplicate_upload`

**Prevent duplicate uploads in assignments**

_No description in fixtures._

### `block_student_publication_add_documents`

**Prevent adding documents to assignments**

_No description in fixtures._

### `block_student_publication_edition`

**Prevent assignments edition**

_No description in fixtures._

### `block_student_publication_score_edition`

**Prevent teacher from modifying assignment scores**

_No description in fixtures._

### `compilatio_tool`

**Compilatio settings**

Configure the Compilatio connection details here.

### `considered_working_time`

**Enable time effort for assignments**

This will allow teachers to give an estimated time effort (in hh:mm:ss format) to complete the assignment. Upon submission of the assignment and approval by the teacher (the assignment is given a score), the learner will automatically be assigned the corresponding time.

### `force_download_doc_before_upload_work`

**Force download of document before assignment upload**

Force users to download the provided document in the assignment definition before they can upload their assignment.

### `my_courses_show_pending_work`

**Display link to 'pending' assignments from My courses page**

_No description in fixtures._

