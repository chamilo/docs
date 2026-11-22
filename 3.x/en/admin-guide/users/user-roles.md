# User Roles

Chamilo uses a role-based permission system. Each user is assigned a role that determines what they can see and do on the platform.

## Platform-Level Roles

These roles control access to platform-wide features:

| Role |  Description |
|------|------------|
| **Learner (Student)** | The default role. Can enroll in courses, access learning content, submit assignments, and take exercises. |
| **Teacher (Trainer)** | Can create and manage courses, add content, grade students, and view course-level reports. |
| **Sessions Administrator** | Can create and manage sessions (i.e. time-based course packages), enroll users in sessions, and assign tutors. Cannot access general platform settings. |
| **Human Resources Manager (HRM)** | Can view tracking and reporting data for assigned users. Used for supervisors who need to monitor employee training but not manage content nor the platform. |
| **Portal Administrator** | Full access to all platform administration features. Can manage users, courses, sessions, plugins, and all settings. |
| **Global Administrator** | Same as Portal Administrator but with access across all access URLs in a multi-URL (i.e. multi-tenant) setup — or, if registered on a non-root URL, scoped to just that URL's branch. See [Subtree Administrators](../multi-url/access-urls.md#subtree-administrators). |
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

Note: This role was called "coach" in Chamilo versions before 3.0. As of Chamilo 3.0, "coach" has been replaced by "tutor" everywhere in the platform's interface and documentation — a tutor is a person who helps learners through a course, not a personal coach. The underlying setting names in `Configuration settings` still contain "coach" for backward compatibility (for example `add_users_by_coach`), but their labels now read "tutor".

## HRM terminology and compatibility

Chamilo 3.x uses **HRM** (Human Resources Manager) in place of the older **DRH** designation. Existing HR relationships and session assignments retain their stored values; the change does not create a different role or require reassigning users. Some older integrations and configuration entries may still use `DRH` or `ROLE_DRH`; the current role is `ROLE_HR`, with compatibility handling for legacy references.

For new configuration, use `HRM` in role-keyed settings such as `registration.redirect_after_login` and `security.mcp_allowed_roles`. The older `DRH` key is still accepted for existing configurations, but `HRM` takes precedence when both keys are provided. The canonical platform settings are `registration.hrm_autosubscribe`, `session.hrm_can_access_all_session_content` and `workflows.hrm_allow_access_to_all_students`; legacy `drh_*` keys remain recognized for compatibility.

See [Registration Settings](../platform-settings/registration-settings.md), [Session Settings](../platform-settings/session-settings.md) and [Workflows Settings](../platform-settings/workflows-settings.md) for configuration details.

## Assigning Roles

When creating or editing a user account in the administration panel, you select their platform-level role. Course and session roles are assigned when enrolling users in courses or sessions.

## Delegating course creation

An administrator can grant the existing `course:create` permission to a configured platform role from the permissions management page (`/permissions`). Select the permission for the intended role and save. This allows, for example, an HR manager or student boss to create courses without becoming a platform administrator or teacher globally.

For non-administrators, `workflows.allow_users_to_create_courses` must also be enabled. The grant is evaluated on explicitly assigned roles rather than permissions inherited implicitly through the Symfony role hierarchy. Existing teacher and administrator behavior is preserved. Course limits, approval policies and BuyCourses restrictions still apply; the grant does not authorize general administration or editing unrelated courses.

Verify with a test account carrying only the intended role: check the course creation action and create or request a test course, then remove the grant and confirm that creation is no longer available (unless another assigned role independently permits it).

See [Workflows Settings](../platform-settings/workflows-settings.md), [Managing Courses](../courses/managing-courses.md#course-creation-and-approval) and [PR #9511](https://github.com/chamilo/chamilo-lms/pull/9511).

## Role Hierarchy

Higher-privileged roles inherit the capabilities of lower-privileged roles:

* An administrator can do everything a teacher can do
* A teacher can do everything a student can do
* Session-level roles (tutor) provide additional capabilities only within their assigned session

## Tips

* **Use the principle of least privilege** — Assign users the minimum role they need to perform their tasks
* **Use Sessions Administrators** for delegated management — If you have staff who need to manage training sessions but not the entire platform, give them the Sessions Administrator role instead of full administrator access
* **Use HRM for supervisors** — Human Resources Managers can monitor training progress without having access to modify courses or platform settings
* **Roles creation** — Chamilo 3.x has the internal structure ready for the creation of new roles, but the feature lacks more testing for wide release. It can be enabled through [Official providers of Chamilo](https://chamilo.org/providers).
