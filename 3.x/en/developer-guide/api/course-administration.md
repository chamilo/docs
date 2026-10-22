# Course Administration API

Chamilo 3.1 lets administrator integrations update course metadata and delete courses through the `Course` API resource. These operations were added for synchronization with external administration systems, such as an ERP.

## Permissions

| Operation | Method and endpoint | Required role |
|-----------|---------------------|---------------|
| List courses | `GET /api/courses` | Teacher or platform administrator |
| View a course | `GET /api/courses/{id}` | Permission to view that course |
| Create a course | `POST /api/courses` | Teacher or platform administrator |
| Update a course | `PATCH /api/courses/{id}` | **Platform administrator (`ROLE_ADMIN`)** |
| Delete a course | `DELETE /api/courses/{id}` | **Platform administrator (`ROLE_ADMIN`)** |

`PUT` is not configured as an operation on this resource. Teachers should continue to edit their own courses through the course settings interface; the new API write operations are administrator-only.

Use an authenticated account or integration credential with the necessary permissions. See [API Authentication](authentication.md).

## Update course metadata

Send an API Platform JSON Merge Patch request to change only the properties supplied in the body:

```http
PATCH /api/courses/42
Authorization: Bearer <admin-token>
Content-Type: application/merge-patch+json
Accept: application/ld+json
```

```json
{
  "title": "Introduction to Accounting - 2026"
}
```

The request updates the existing course rather than creating a new one. The API accepts writable properties defined by the `course:write` serializer group, subject to entity validation. Examples include `title`, `visibility`, `categories`, `departmentUrl`, `videoUrl`, `sticky`, and `duration`. Relationship properties such as `categories` require the API's expected resource representation; check the OpenAPI documentation rather than sending arbitrary database IDs.

**Important:** the internal course `code` is **not** writable through this PATCH operation. Do not attempt to rename a course's internal code by sending a `code` or `visualCode` field.

## Delete a course

```http
DELETE /api/courses/42
Authorization: Bearer <admin-token>
```

This is a **destructive** administration operation. Chamilo calls the same course-deletion helper used by course maintenance instead of directly deleting the Doctrine entity. It cleans up associated registrations, session and class links, tracking data and related search indexing as applicable.

In a **multi-URL** installation, deletion may only detach the course from the current access URL rather than deleting it everywhere. Course documents are not deleted using the separate *delete exclusive documents* option from the maintenance interface. Do not interpret an API deletion as a guarantee that every document is physically removed.

If an active dependency prevents deletion (for example, a resources sequence), the endpoint can respond with `409 Conflict`. Review course dependencies and backups before sending DELETE requests, especially in batch integrations.

## Errors and operational notes

* A caller without the required administrator role is refused; use a correctly authorized account rather than a teacher credential for PATCH or DELETE.
* Invalid request data can fail entity validation. Fetch the current course before patching it, and send only properties you intend to change.
* These operations are exposed by API Platform; consult the installed instance's OpenAPI documentation for its exact response schema and accepted field formats.
* Test course deletion on a disposable course, not on a course that contains production learner records.

For course administration in the interface, see [Managing Courses](../../admin-guide/courses/managing-courses.md). For session enrollment integrations, see [Session Student Enrollment](session-students.md).

**Implementation:** `src/CoreBundle/Entity/Course.php` (`Patch` and `Delete` operations), and `src/CoreBundle/State/CourseDeleteProcessor.php`. Added in Chamilo LMS commit `8cc9d4b33d`.
