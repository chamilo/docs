# Database Schema

Chamilo 2.0 maps a large set of Doctrine entities to database tables. The exact counts drift between releases — read the entity directories listed below for the current state.

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
| `user_group` | Platform-wide user groups |

### Courses

| Table | Purpose |
|-------|---------|
| `course` | Courses |
| `course_category` | Course categories |
| `course_rel_user` | Course enrollments |

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
| `resource_file` | File attachments |
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
| `settings_current` | Platform settings |
| `settings_options` | Setting option definitions |

## Migrations

Database schema changes are managed through Doctrine Migrations in `src/CoreBundle/Migrations/`. Run migrations with:

```bash
php bin/console doctrine:migrations:migrate
```
