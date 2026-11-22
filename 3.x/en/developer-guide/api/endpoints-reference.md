# Endpoints Reference

API Platform automatically generates REST endpoints for entities annotated with `#[ApiResource]`. Chamilo exposes 100+ resources.

## Standard Operations

For each API resource, the following operations are typically available:

| Method | Path | Description |
|--------|------|-------------|
| `GET` | `/api/{resources}` | List (collection) |
| `POST` | `/api/{resources}` | Create |
| `GET` | `/api/{resources}/{id}` | Read (single item) |
| `PUT` | `/api/{resources}/{id}` | Full update |
| `PATCH` | `/api/{resources}/{id}` | Partial update |
| `DELETE` | `/api/{resources}/{id}` | Delete |

Not all operations are enabled for every resource — security constraints apply.

## Key API Resources

### Platform Resources

| Resource | Path | Description |
|----------|------|-------------|
| Users | `/api/users` | User accounts |
| Courses | `/api/courses` | Courses |
| Sessions | `/api/sessions` | Training sessions |
| Promotions | `/api/promotions` | Career promotions, read-only (see [Session Promotion](session-promotion.md)) |
| Resource Nodes | `/api/resource_nodes` | Unified content nodes |
| Access URLs | `/api/access_urls` | Multi-URL portals |
| Messages | `/api/messages` | Platform messages |

### Course Content Resources

| Resource | Path | Description |
|----------|------|-------------|
| Documents | `/api/documents` | Course documents |
| Learning Paths | `/api/learning_paths` | Learning paths |
| Glossaries | `/api/glossaries` | Glossary terms |
| Links | `/api/links` | External links |
| Calendar Events | `/api/c_calendar_events` | Agenda events |
| Student Publications | `/api/c_student_publications` | Assignments |
| Blogs | `/api/c_blogs` | Course blogs |
| Groups | `/api/c_groups` | Course groups |

### Tracking Resources

| Resource | Path | Description |
|----------|------|-------------|
| Gradebook Categories | `/api/gradebook_categories` | Gradebook setup |
| Gradebook Results | `/api/gradebook_results` | Grades |

## Administrator Course Operations

In addition to listing and creating courses, the `Course` API resource provides administrator-only `PATCH /api/courses/{id}` and `DELETE /api/courses/{id}` operations. There is no `PUT` operation for this resource, and the internal course code cannot be patched. Deletion uses the course-maintenance cleanup process; its effects in multi-URL portals require care.

See [Course Administration](course-administration.md) for requests, permissions, side effects and limitations.

## Administrative Enrollment Actions

The following explicitly implemented controller routes are **not** generic API Platform resource operations. They require `ROLE_ADMIN` and have their own request and response contracts.

| Method | Path | Details |
|--------|------|---------|
| `GET` | `/api/sessions/{id}/students` | List enrolled learner IDs |
| `POST` | `/api/sessions/{id}/students/subscribe` | Add specified learners |
| `POST` | `/api/sessions/{id}/students/unsubscribe` | Remove specified learners |
| `GET` | `/api/usergroups/{id}/subscriptions` | Read class user/session/course IDs |
| `PUT` | `/api/usergroups/{id}/users` | Replace class member list |
| `PUT` | `/api/usergroups/{id}/sessions` | Replace class session list |
| `PUT` | `/api/usergroups/{id}/courses` | Replace class course list |

See [Session Student Enrollment](session-students.md) and [Class Subscriptions](class-subscriptions.md) for validation, permissions, multi-URL scope and important differences between additive and replacing operations.

## Scoped API access for session administrators (3.1)

A session administrator (`ROLE_SESSION_MANAGER`) can use the following standard collection and item GET operations without being granted `ROLE_ADMIN`. The API scope is evaluated server-side against their assigned sessions and current Access URL.

| Collection | Scope for session administrators |
|------------|----------------------------------|
| `/api/sessions` | Managed sessions on the current portal |
| `/api/courses` | Courses in those sessions that also belong to the current portal |
| `/api/extra_fields` | Course/session field definitions when the corresponding scope is non-empty |
| `/api/extra_field_values` | Only values belonging to the authorized courses or sessions |

The equivalent item GET routes (`/{id}`) enforce the corresponding item-level rules. Regular collection filtering and pagination still apply; query parameters cannot expand the authorization scope. If the portal setting `session.allow_session_admins_to_manage_all_sessions` is enabled, the manager may read all sessions in the current Access URL, not sessions on other portals. The user must belong to the current portal. User profile extra fields are not included in this extension. Other existing access rules (such as ordinary course membership) are not replaced by the scoped read extension.

Authorized course-description reads are also supported through `/api/course-description/list?cid={courseId}` (optionally with `sid` for the session context). Supplying a session ID must not widen access. `POST /api/enrollment-notifications` allows administrators and scoped session managers to notify an already enrolled user; the action checks both the target scope and existing enrollment and does not enroll the user.

This is not a general write grant. The administrative enrollment routes listed above still require `ROLE_ADMIN`, and existing create/update/delete permissions remain unchanged. See [Authentication](authentication.md#session-administrator-tokens) and [LMS PR #9508](https://github.com/chamilo/chamilo-lms/pull/9508).

Implementation: `SessionManagerApiScope` supplies the scope, `SessionManagerApiCollectionExtension` applies collection restrictions to operations explicitly marked `sessionManagerScoped`, and `SessionManagerApiReadVoter` evaluates the `SESSION_MANAGER_API_READ` item permission. New API integrations must enforce both collection and object checks; never rely only on a hidden menu or client-supplied course/session ID.

## Filtering and Pagination

API Platform supports:

* **Pagination**: `?page=2&itemsPerPage=30`
* **Filtering**: `?title=Introduction` (depends on configured filters)
* **Ordering**: `?order[title]=asc`
* **Search**: Full-text search on configured fields

## Content Negotiation

The API supports multiple formats:

* `application/ld+json` (default — JSON-LD)
* `application/json`
* `text/html` (API documentation)

Set the `Accept` header to choose the response format.

## Security

Each endpoint enforces security through:

* JWT authentication (required for most endpoints)
* Symfony security voters (resource-level permissions)
* Role-based access control (e.g., admin-only endpoints)
