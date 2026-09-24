# Session Duplication

`POST /api/sessions/{id}/duplicate` creates a new session from an existing **model session**. It is the Chamilo 3 replacement for the `create_session_from_model` action of the 1.11.x `webservices/api/v2.php` webservice, and is meant for integrations that open a new training run from a template session.

## Access

| Caller | Allowed |
|--------|---------|
| `ROLE_ADMIN` | Any session |
| `ROLE_SESSION_MANAGER` | Only sessions they manage (they are a session admin of the model), unless the **Allow session administrators to see all sessions** setting is enabled |
| Anyone else | `403 Forbidden` |

Authenticate with a JWT or an external API key, as described in [Authentication](authentication.md).

## Request

```http
POST /api/sessions/42/duplicate
Authorization: Bearer <token>
Content-Type: application/json
```

```json
{
  "title": "Accounting basics - October 2026",
  "startDate": "2026-10-01T09:00:00+02:00",
  "endDate": "2026-12-15T18:00:00+01:00",
  "extraFields": { "my_session_field": "value" },
  "copySessionContent": false
}
```

| Field | Required | Description |
|-------|----------|-------------|
| `title` | Yes | Title of the new session. Must not already be used by another session (max. 150 characters). |
| `startDate` | Yes | ISO 8601 date-time. Used as the access, display and coach access start date. |
| `endDate` | Yes | ISO 8601 date-time, not before `startDate`. Used as the access, display and coach access end date. |
| `extraFields` | No | Session extra field values keyed by the field's variable. They override the values copied from the model. Every variable must be an existing session extra field. |
| `copySessionContent` | No | `false` by default. When `true`, the session-specific content of each course (documents, learning paths, tests, calendar events, announcements, gradebook…) is duplicated into the new session. Course base content is always shared, never copied. This flag is independent of the **Enable the copy of session-specific content to another session** platform setting. |

## What is copied

| Copied from the model | Not copied |
|-----------------------|------------|
| Category, visibility, duration, description and "show description" | Course coaches |
| Session extra field values | HR managers (DRH) |
| Courses, in the same order | Students |
| General coaches | |
| Session admins (if the model has none, the caller becomes the session admin) | |
| "Send subscription notification" option | |
| Promotion | |
| Session-specific course content, only when `copySessionContent` is `true` | |

Students are left out on purpose: each run gets its own learners. Subscribe them afterwards with `POST /api/course-sessions/actions/subscribe-users`.

The new session is attached to the current access URL.

## Response

`201 Created` with the new session:

```json
{
  "id": 57,
  "title": "Accounting basics - October 2026",
  "nbrCourses": 3,
  "visibility": 1,
  "generalCoachesSubscriptions": [{ "user": "/api/users/7" }]
}
```

## Errors

| Status | When |
|--------|------|
| `401` | No or invalid credentials |
| `403` | The caller may not manage the model session |
| `404` | The model session does not exist |
| `422` | Missing or invalid field, `endDate` before `startDate`, title already used, or unknown extra field variable |

All the checks run before anything is created, so a rejected request never leaves a partial session behind.

## Implementation

* Operation: `duplicate_session` on the `Session` resource (`src/CoreBundle/Entity/Session.php`)
* Input: `src/CoreBundle/Dto/SessionDuplicateInput.php`
* Processor: `src/CoreBundle/State/Session/SessionDuplicateProcessor.php`, which calls `SessionManager::copy()` (also used by the **Copy** action of the session list) and then applies the requested title, dates and extra fields, and the model's promotion, session admins, notification option and course order.
