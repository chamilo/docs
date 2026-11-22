# Database Schema

Chamilo 3.0 maps a large set of Doctrine entities to database tables. The exact counts drift between releases — read the entity directories listed below for the current state.

## Entity locations

| Bundle | Where | Prefix |
|--------|-------|--------|
| CoreBundle | `src/CoreBundle/Entity/` | None (e.g., `user`, `course`, `session`) |
| CourseBundle | `src/CourseBundle/Entity/` | `c_` (e.g., `c_document`, `c_quiz`, `c_lp`) |
| LtiBundle | `src/LtiBundle/Entity/` | `lti_` |

## Key Tables

### User and Authentication

| Table | Purpose |
|-------|---------|
| `user` | User accounts |
| `access_url` | Multi-URL portals |
| `access_url_rel_user` | User-portal assignments |
| `usergroup` | Platform-wide user groups |

### Courses

| Table | Purpose |
|-------|---------|
| `course` | Courses |
| `course_category` | Course categories |
| `course_rel_user` | Course enrollments, including direct-course student access (`visibility`) in 3.1 |

### Sessions

| Table | Purpose |
|-------|---------|
| `session` | Training sessions |
| `session_rel_user` | Session enrollments |
| `session_rel_course` | Courses in sessions |
| `session_rel_course_rel_user` | User enrollment per session-course |

### Resource System

| Table | Purpose |
|-------|---------|
| `resource_node` | Unified content abstraction |
| `resource_file` | File attachments; `size` uses `BIGINT` in 3.1 |
| `resource_link` | Visibility/access per context |
| `resource_type` | Resource type registry |

### Course Content (c_ prefix)

| Table | Purpose |
|-------|---------|
| `c_document` | Documents |
| `c_quiz` | Exercises/tests |
| `c_quiz_question` | Quiz questions |
| `c_quiz_answer` | Question answers |
| `c_lp` | Learning paths |
| `c_lp_item` | Learning path items |
| `c_forum_category` | Forum categories |
| `c_forum_forum` | Forums |
| `c_forum_thread` | Forum threads |
| `c_forum_post` | Forum posts |
| `c_student_publication` | Assignments/submissions |
| `c_survey` | Surveys |
| `c_survey_answer` | Survey responses, with nullable UTC creation/update timestamps in 3.1 |
| `c_glossary` | Glossary terms |
| `c_calendar_event` | Calendar events |
| `c_attendance` | Attendance sheets |

### Tracking

| Table | Purpose |
|-------|---------|
| `track_e_login` | Login tracking |
| `track_e_online` | Online user tracking |
| `track_e_default` | Generic activity tracking |
| `gradebook_category` | Gradebook categories |
| `gradebook_result` | Grades |

### Settings

| Table | Purpose |
|-------|---------|
| `settings` | Platform settings |
| `settings_options` | Setting option definitions |

### Security audit

| Table | Purpose |
|-------|---------|
| `antivirus_scan` | Independent upload scan history, including rejected uploads |

The Chamilo 3.1 antivirus audit table stores the portal ID, optional user/course/session IDs, filename, size, SHA-256 when available, scanner, status, threat, source, scan time and duration. It does not require a resource to have been created or store the uploaded content. Audit writes are separate from the upload transaction. See [Antivirus Upload Scanning](../../admin-guide/security/antivirus-upload-scanning.md) and [LMS PR #9562](https://github.com/chamilo/chamilo-lms/pull/9562).

### Selected Chamilo 3.1 schema changes

* `course_rel_user.visibility`: integer, default `1` (enabled); `0` disables direct student access when the global workflow setting is enabled. This is not `user.active`, course visibility or session enrollment. See [LMS PR #9551](https://github.com/chamilo/chamilo-lms/pull/9551).
* `resource_file.size`: `BIGINT`, allowing sizes over 2 GB; HTTP upload limits and disk capacity still apply. See [LMS PR #9532](https://github.com/chamilo/chamilo-lms/pull/9532).
* `c_survey_answer.created_at` and `updated_at`: nullable timestamps. Historical rows with unknown dates retain `NULL`; creation and modification times are recorded for new/updated answers. See [LMS PR #9549](https://github.com/chamilo/chamilo-lms/pull/9549).

Apply the release's migrations as part of the normal upgrade process. Do not fabricate missing historical timestamps or manually delete subscription/audit records to implement these features.

## Migrations

Database schema changes are managed through Doctrine Migrations in `src/CoreBundle/Migrations/`. Run migrations with:

```bash
php bin/console doctrine:migrations:migrate
```
