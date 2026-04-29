# Course Settings

Course settings define defaults and policies for how courses behave across the platform. Access them from **Administration > Configuration settings > Course**.

## Default Course Visibility

When a new course is created, its visibility is set to the platform default. The creator can change it afterward.

| Visibility | Description |
|------------|-------------|
| **Public** | Anyone, including anonymous visitors, can access the course without enrolling. |
| **Open** | Any registered user can access the course without enrolling. |
| **Private — access granted by privileged users** | Only enrolled users can access the course. This is the most common default. |
| **Closed** | Only the course teacher and administrators can access it. Useful for courses under construction. |

Set the default visibility under the **Default course visibility** option. Individual course creators can override this when creating or editing a course.

## Course Creation Permissions

| Setting | Description |
|---------|-------------|
| **Allow non administrators (teachers) to create new courses** (`allow_users_to_create_courses`) | When enabled, non-admin users with the appropriate role (typically teachers) can create courses directly. When disabled, only administrators can create courses. |
| **Course creation requires validation** | When enabled, newly created courses must be approved by an administrator before they become active (see Course Validation below). |

## Course Catalog

The course catalog allows users to browse and self-enroll in available courses.

| Setting | Description |
|---------|-------------|
| **Enable course catalog** | Show or hide the course catalog in the platform navigation. |
| **Catalog layout** | Controls how courses are displayed in the catalog (grid or list). |
| **Show courses by category** | Organizes the catalog by course categories instead of a flat list. |
| **Allow self-enrollment** | When enabled, users can enroll themselves in courses directly from the catalog. When disabled, enrollment is managed by administrators or teachers. |
| **Enrollment password** | Course creators can set a password that users must enter to self-enroll, providing lightweight access control. |

## Course Validation

When course validation is enabled, new courses go through an approval workflow:

1. A teacher creates a course. The course is marked as "pending."
2. An administrator reviews pending courses in **Administration > Course validation requests**.
3. The administrator approves or rejects the request.
4. If approved, the course becomes active and visible according to its settings.

This is useful for organizations that want to maintain editorial control over the course catalog.

## Default Tools Enabled

Each new course is created with a set of tools enabled by default. Administrators can control which tools are active in new courses.

| Tool | Description |
|------|-------------|
| **Documents** | File repository for course materials. |
| **Exercises** | Quizzes and tests. |
| **Learning paths** | Structured, sequential learning content (supports SCORM). |
| **Announcements** | Course-level announcements. |
| **Forums** | Discussion boards. |
| **Assignments** | Student work submission and grading. |
| **Agenda** | Course calendar. |
| **Chat** | Real-time messaging within the course. |
| **Wiki** | Collaborative pages. |
| **Glossary** | Term definitions. |
| **Surveys** | Questionnaires and feedback forms. |
| **Attendance** | Attendance tracking sheets. |

Teachers can enable or disable individual tools within their own courses regardless of the platform default.

## Tips

* **Use "Private" as the default visibility** for most platforms — it ensures students must enroll before accessing content.
* **Enable course validation** if you have many teachers creating courses and want to maintain quality control.
* **Disable non-admin course creation** unless you specifically want a peer-teaching or community-driven platform.
