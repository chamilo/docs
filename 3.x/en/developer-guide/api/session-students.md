# Session Student Enrollment API

Integrations can list, enroll and remove learners in a session using administrator-only endpoints. These actions use the session enrollment behavior of Chamilo's administration screens. They are separate from `/api/course-sessions/actions/*`, which belongs to a different tutor-oriented workflow.

## Authentication and access

Every operation below requires authentication with the `ROLE_ADMIN` platform role. Being a session administrator alone does **not** grant access. Use the authentication method described in [Authentication](authentication.md).

In multi-URL installations, the requested session must belong to the current access URL; otherwise the endpoint responds with `404`.

## Routes

| Method | Endpoint | Purpose |
|--------|----------|---------|
| `GET` | `/api/sessions/{id}/students` | List learner user IDs enrolled in this session |
| `POST` | `/api/sessions/{id}/students/subscribe` | Add the specified learners, retaining existing learners |
| `POST` | `/api/sessions/{id}/students/unsubscribe` | Remove only the specified learners |

Replace `{id}` with the numeric session ID. For both POST requests, send JSON containing the `userIds` array:

```http
POST /api/sessions/42/students/subscribe
Authorization: Bearer <admin-token>
Content-Type: application/json
```

```json
{ "userIds": [17, 23] }
```

A successful subscription produces a response with the following structure; IDs depend on your installation:

```json
{
  "success": true,
  "applied": [17],
  "alreadyThere": [23],
  "ignored": []
}
```

`applied` contains newly enrolled learners; `alreadyThere` contains learners already enrolled; `ignored` lists ineligible or unavailable IDs. When subscribing, Chamilo also enrolls the added learners in the session's courses. It **does not** replace the entire session roster.

To inspect membership:

```http
GET /api/sessions/42/students
Authorization: Bearer <admin-token>
```

```json
{ "userIds": [17, 23] }
```

To remove selected learners:

```http
POST /api/sessions/42/students/unsubscribe
Authorization: Bearer <admin-token>
Content-Type: application/json
```

```json
{ "userIds": [17] }
```

The unsubscribe response contains `success`, `applied` (removed IDs), and `ignored` (IDs not enrolled). Other learners remain in the session.

## Validation and limitations

* `userIds` must be an array of numeric IDs (integers or digit-only strings). Repeated IDs are deduplicated; non-positive values are omitted.
* For enrollment, eligible users must exist, not be soft-deleted, not be anonymous or HR managers, and belong to the current access URL.
* Missing or malformed JSON or `userIds` returns `400 Bad Request`.
* Missing/out-of-scope sessions return `404 Not Found`; callers without administrator permission cannot use these routes.
* The student enrollment routes are **not** generic CRUD endpoints for the `Session` entity, and do not accept a session roster as a replacement document.

For the corresponding administration interface, see [Managing Sessions](../../admin-guide/sessions/managing-sessions.md). For copying a model session before enrolling students, see [Session Duplication](session-duplication.md).

**Implementation:** `src/CoreBundle/Controller/Api/SessionStudentsController.php`. Added in Chamilo LMS commit `bdfb2dd661`.
