# Class Membership and Enrollment API

For integrations, Chamilo provides endpoints to read and synchronize the members, sessions and courses associated with an existing **class**. A class is a `Usergroup` of the *normal class* type; these routes do **not** apply to social groups.

Unlike the session student API, the three class `PUT` actions **replace the entire specified list**. Omitted IDs are removed from that relationship. Read the existing list before updating it, and avoid using `PUT` to add just one member unless you also submit everyone who should remain.

## Authorization

All routes below require the authenticated platform `ROLE_ADMIN` role. The target class must be available in the current access URL. A missing or out-of-scope class returns `404`; a usergroup that is not a normal class returns `409 Conflict`.

The controller checks that submitted user, course and session IDs exist. In a multi-URL installation, submitted **course and session IDs** are filtered to the current portal; however, the current implementation does **not** apply that same portal filter to **user IDs**. Integrators must not treat this endpoint as a guarantee of user-level portal isolation. See the delivery review notes for this outstanding security consideration.

## Read class relationships

```http
GET /api/usergroups/31/subscriptions
Authorization: Bearer <admin-token>
```

Example response:

```json
{
  "userIds": [17, 23],
  "sessionIds": [42],
  "courseIds": [8, 11]
}
```

## Replace one relationship list

| Method | Endpoint | Request property |
|--------|----------|------------------|
| `PUT` | `/api/usergroups/{id}/users` | `userIds` |
| `PUT` | `/api/usergroups/{id}/sessions` | `sessionIds` |
| `PUT` | `/api/usergroups/{id}/courses` | `courseIds` |

For example, to set the full class roster:

```http
PUT /api/usergroups/31/users
Authorization: Bearer <admin-token>
Content-Type: application/json
```

```json
{ "userIds": [17, 23, 29] }
```

Example response:

```json
{
  "success": true,
  "applied": [17, 23, 29],
  "ignored": []
}
```

`applied` lists accepted IDs, not necessarily newly added IDs. `ignored` identifies requested IDs that could not be applied (for instance, an unknown ID or a course/session outside the current portal). Non-positive values are omitted, duplicates are removed, and malformed JSON or a non-array request property returns `400`.

To replace the linked sessions instead, call `PUT /api/usergroups/31/sessions` with `{ "sessionIds": [42, 57] }`. To replace linked courses, call `PUT /api/usergroups/31/courses` with `{ "courseIds": [8, 11] }`.

**Important:** Chamilo applies these changes via the `UsergroupHelper` synchronization methods. Changing the class roster or its session/course bindings can also change related enrollments. Do not manipulate usergroup relation tables directly, and review the effect of replacing lists before running a production integration.

For the interface and concept, see [Classes](../../admin-guide/sessions/classes.md). To add or remove specific learners from one session *without* replacing all members, use the [Session Student Enrollment API](session-students.md).

**Implementation:** `src/CoreBundle/Controller/Api/UsergroupSubscriptionController.php`. Added in Chamilo LMS commit `d8809925a4`.
