# Course Copy

`POST /api/courses/copy` copies an existing course into another course, or into a newly created course. It is the webservice equivalent of the in-app course copy tool, and is meant for integrations that create courses from a template.

The copy is **synchronous**. A large source course can take a long time, so send one source and one target per request. There is no batch input.

## Access

Only platform administrators (`ROLE_ADMIN`) can call this endpoint. Teachers, session administrators and other roles receive `403 Forbidden`.

Authenticate with a JWT or an external API key, as described in [Authentication](authentication.md).

On a multi-URL portal, both the source and the target must belong to the current access URL. A course from another URL is treated as missing (`404`). A newly created target is attached to the current access URL.

## Request

```http
POST /api/courses/copy
Authorization: Bearer <token>
Content-Type: application/json
```

Copy into an existing course:

```json
{
  "sourceId": 12,
  "targetId": 34
}
```

Create a new course and copy into it:

```json
{
  "sourceCode": "TEMPLATE",
  "targetCode": "ACC2026",
  "targetTitle": "Accounting basics 2026",
  "targetCategoryId": 3,
  "targetLanguage": "en"
}
```

| Field | Required | Description |
|-------|----------|-------------|
| `sourceId` | One of `sourceId` or `sourceCode` | Numeric identifier of the source course. |
| `sourceCode` | One of `sourceId` or `sourceCode` | Official code of the source course. If both are sent, they must refer to the same course. |
| `targetId` | No | Numeric identifier of an existing target course. The target must be different from the source. |
| `targetCode` | See below | Official code of the target. If the code already exists, the content is copied into that course. If it does not, `targetTitle` is required and a new course is created with that code. |
| `targetTitle` | When creating a new course | Title of the new course (max. 255 characters). You may omit `targetCode` and let Chamilo generate a code from the title. |
| `targetCategoryId` | No | Category identifier to assign when creating a new course. |
| `targetLanguage` | No | Language of a newly created course, as an isocode (`en_US`) or a short prefix (`en`). When omitted, the source course language is reused. |
| `tools` | No | Allow-listed tool keys to copy. When omitted, every tool from a full in-app copy is included (documents, forums, links, quizzes, learning paths, assignments, gradebook, and the other course maintenance tools). Unknown keys are rejected. |

## What is copied

The endpoint wraps the same `CourseBuilder` / `CourseRestorer` pipeline as **Course maintenance > Copy**. Users of the source course are not copied. When a file with the same name already exists in the target, it is renamed, which is the default of the in-app tool.

## Response

`200 OK`:

```json
{
  "id": "course_copy",
  "status": "copied",
  "created": true,
  "targetId": 57,
  "targetCode": "ACC2026"
}
```

| Field | Description |
|-------|-------------|
| `status` | `copied` when the copy finished. |
| `created` | `true` when the target course was created by this request, `false` when an existing course was used. |
| `targetId` | Identifier of the target course. |
| `targetCode` | Official code of the target course. |

## Errors

| Status | When |
|--------|------|
| `401` | No or invalid credentials |
| `403` | The caller is not a platform administrator |
| `404` | The source or an existing target was not found, or it belongs to another access URL |
| `422` | Missing source, missing title when creating a course, source and target are the same course, invalid code, language or tool list, or the requested new course code already conflicts |

If the copy itself fails after a new target has been created, the empty course may remain. It can be removed with `DELETE /api/courses/{id}` (see [Course Administration](course-administration.md)).

## Implementation

* Resource: `src/CoreBundle/ApiResource/CourseCopy/CourseCopy.php`
* Processor: `src/CoreBundle/State/CourseCopy/CourseCopyProcessor.php`, which calls `CourseBuilder` and `CourseRestorer` (the same classes as the course maintenance copy tool) and `CourseHelper::createCourse()` when a new target is requested.
