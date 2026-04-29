# Dropbox Settings

Behaviour of the **Dropbox** file-exchange tool.

Access these settings under **Administration > Configuration settings > Dropbox**. This category contains **8 settings**, listed below with the title and comment shipped in the platform's settings fixtures (`SettingsCurrentFixtures.php`).

> The variable name in code is shown in `monospace`. Use it when scripting via the API or referring to settings in `.env` overrides.

## Settings

### `dropbox_allow_group`

**Dropbox: allow group**

Users can send files to groups

### `dropbox_allow_just_upload`

**Dropbox: Upload to own dropbox space?**

Allow trainers and users to upload documents to their dropbox without sending  the documents to themselves

### `dropbox_allow_mailing`

**Dropbox: Allow mailing**

With the mailing functionality you can send each learner a personal document

### `dropbox_allow_overwrite`

**Dropbox: Can documents be overwritten**

Can the original document be overwritten when a user or trainer uploads a document with the name of a document that already exist? If you answer yes then you loose the versioning mechanism.

### `dropbox_allow_student_to_student`

**Dropbox: Learner <-> Learner**

Allow users to send documents to other users (peer 2 peer). Users might use this for less relevant documents also (mp3, tests solutions, ...). If you disable this then the users can send documents to the trainer only.

### `dropbox_hide_course_coach`

**Dropbox: hide course coach**

Hide session course coach in dropbox when a document is sent by the coach to students

### `dropbox_hide_general_coach`

**Hide general coach in dropbox**

Hide general coach name in the dropbox tool when the general coach uploaded the file

### `dropbox_max_filesize`

**Dropbox: Maximum file size of a document**

How big (in MB) can a dropbox document be?

