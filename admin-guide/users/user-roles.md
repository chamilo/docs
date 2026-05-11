# User Roles

Chamilo uses a role-based permission system. Each user is assigned a role that determines what they can see and do on the platform.

## Platform-Level Roles

These roles control access to platform-wide features:

| Role |  Description |
|------|------------|
| **Learner (Student)** | The default role. Can enroll in courses, access learning content, submit assignments, and take exercises. |
| **Teacher (Trainer)** | Can create and manage courses, add content, grade students, and view course-level reports. |
| **Sessions Administrator** | Can create and manage sessions (i.e. time-based course packages), enroll users in sessions, and assign coaches. Cannot access general platform settings. |
| **Human Resources Manager (HRM)** | Can view tracking and reporting data for assigned users. Used for supervisors who need to monitor employee training but not manage content nor the platform. |
| **Portal Administrator** | Full access to all platform administration features. Can manage users, courses, sessions, plugins, and all settings. |
| **Global Administrator** | Same as Portal Administrator but with access across all access URLs in a multi-URL (i.e. multi-tenant) setup. |
| **Anonymous** | A special role for visitors who are not logged in. Can access public courses and content if enabled. |

## Course-Level Roles

Within a course, users have specific roles:

| Role | Description |
|------|-------------|
| **Student** | Default course role. Can access content, take exercises, submit assignments. |
| **Course assistant** | Has limited management permissions within the course. Can help manage content and moderate forums. |
| **Teacher** | Full control over the course: manage content, tools, settings, and enrollment. |

## Session-Level Roles

Within a session, additional roles exist:

| Role | Description |
|------|-------------|
| **Session tutor** | Oversees all courses within a session. Can view tracking across all courses in the session. |
| **Course tutor** | Teaches a specific course within a session. Can manage content and track learners for that course in that session. |

Note: The coach and tutor names are very similar in meaning and are generally dependent on the organization. We use both terms interchangeably in Chamilo 2.0, but most of the time we mean tutor, a person that will help you learn from the course, not a personal coach. We might use "tutor" exclusively in the future.

## Assigning Roles

When creating or editing a user account in the administration panel, you select their platform-level role. Course and session roles are assigned when enrolling users in courses or sessions.

## Role Hierarchy

Higher-privileged roles inherit the capabilities of lower-privileged roles:

* An administrator can do everything a teacher can do
* A teacher can do everything a student can do
* Session-level roles (coach) provide additional capabilities only within their assigned session

## Tips

* **Use the principle of least privilege** — Assign users the minimum role they need to perform their tasks
* **Use Sessions Administrators** for delegated management — If you have staff who need to manage training sessions but not the entire platform, give them the Sessions Administrator role instead of full administrator access
* **Use HRM for supervisors** — Human Resources Managers can monitor training progress without having access to modify courses or platform settings
* **Roles creation** — Chamilo 2.x has the internal structure ready for the creation of new roles, but the feature lacks more testing for wide release. It can be enabled through [Official providers of Chamilo](https://chamilo.org/providers).
