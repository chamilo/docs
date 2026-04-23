# Course Settings

Course settings allow you to control how your course behaves — who can access it, how it appears, and what features are enabled.

To access course settings, enter your course and click the **Settings** <img src="/.gitbook/assets/icons/mdi-cog.svg" alt="Settings" data-size="line"> icon next to the **Switch to student view** button.

## General Settings

### Course Information

* **Course title** — The display name of your course
* **Course code** — A short unique identifier (read-only after creation in most configurations)
* **Course language** — The primary language for the course interface
* **Course category** — The category under which the course appears in the catalog
* **Course picture** — Upload a thumbnail that represents your course in course listings (will be resized depending on context)

By default, all users entering your course will see the whole Chamilo interface in the language of your course. This is an immersive feature. Administrators can change this behaviour, but you can also change it with one of the first options: **Show course in user's language** (set to No by default) if you believe this makes it too hard for your users.

The department and department URL are deprecated fields. They are only maintained for legacy support reasons.

If enabled, you can switch the style inside your course with the **Style sheets** option, using existing stylesheets on your portal. This option is often disabled by admins, for a more integrated global design.

### Disk Quota

Each course has a storage limit (disk quota) for uploaded files. The quota is set by the platform administrator. You can see your current limit in the course settings, and the current usage in the **Documents** tool.

> If you are running out of space, contact your platform administrator to request a quota increase, or remove unused files from the Documents tool.

### Course Visibility

![The course visibility settings showing public, open, registered, and closed options](/.gitbook/assets/course-settings-visibility.png)

Control who can access your course:

| Setting | Description |
|---------|-------------|
| **Public** | Anyone, including anonymous visitors, can access the course |
| **Open to platform** | All registered users on the platform can access the course |
| **Registered only** | Only users explicitly enrolled in the course can access it |
| **Closed** | The course is locked; no one can access it except the teacher |

#### Enrollment Settings

Depending on your platform configuration, you may be able to control:

* **Allow self-enrollment** — Whether learners can subscribe themselves through the course catalog
* **Allow self-unsubscription** — Whether learners can leave the course on their own
* **Enrollment password** — Require a password for self-enrollment (useful for restricting access to a specific group) but the security level is low as the same course-access password is shared between all users.

### Document Settings

Choose whether to show or hide the system folders in the **Documents** tool (hidden by default, you don't really need them in most cases and showing them might cause issues with hidden content and learners).

### E-mail Notification Settings

Configure how course activity triggers notifications:

* **Email notifications for new content** — Notify enrolled users when you add new documents, announcements, or other content

### User Rights

Control what learners are allowed to do within the course:

* **Allow learners to edit their own publications** — Whether students can modify their submitted assignments
* **Allow learners to see other learners' work** — Whether student submissions are visible to peers

### Chat Settings

Control how the **Chat** tool will show.

### Learning path Settings

* **Enable course themes** — Allow learning paths to change appearance (not recommended for integrated user experience)
* **Learning path return link** — Decide where users will return when they click the **Home** icon in the learning paths

### Thematic Advance Settings

Configure how the thematic advance messages will appear on the course homepage.

### Forum Settings

Control behaviour in the forum tool of this course.

### Assignment Settings

* **Default setting for the visibility of newly posted files** — Decide whether new documents uploaded by learners in the **Assignments** tool are shared with all other learners (No by default)
* **Allow learners to delete their own publications** — Allow learners to delete the assignments they have already uploaded (in case they want to upload a correction).

### Autolaunch Settings

A course can be set to have an auto-launch behaviour, which will shorten the path of learners to get to the important parts of your course. If enabled, the learners entering your course will be sent directly to the selected tool and will not see the course homepage as an intermediate step. You can even select specific learning paths or exercises to launch on arrival to the course. In this case, you need to select the option here, then go to the learning paths or exercises list and clic the rocket <img src="/.gitbook/assets/icons/mdi-rocket-launch.svg" alt="Auto-launch" data-size="line"> icon on the selected item.

### AI Helpers Settings

This section only appears if your administrator has enabled AI tools on the platform. It allows you to refine the selection of AI helper services available through different tools of your Chamilo platform. Disable them if you don't want to use them, but that would probably be a bad idea as these are very powerful.

These features are explained in the **AI Tools** section of this guide.

### External Tools (LTI)

If enabled on your platform, Learning Tools Integration allows you to integrate external, compatible activities to this course, as individual icons on the course homepage. Discussing LTI is out of the scope of this guide, but this is a powerful integration system for teachers.

### Others

Additional sections or options might appear on this page depending on options and versions of Chamilo.
