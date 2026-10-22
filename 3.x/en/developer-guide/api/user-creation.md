# User Creation

`POST /api/access_urls/{id}/user` creates a platform user and adds them to the access URL `{id}`. It is the Chamilo 3 replacement for the `save_user_json` action of the 1.11.x `webservices/api/v2.php` webservice, and is meant for integrations that create learner accounts (shops, HR systems, enrolment portals).

## Access

| Caller | Allowed |
|--------|---------|
| `ROLE_ADMIN` | Yes |
| `ROLE_SESSION_MANAGER` | Yes |
| Anyone else | `403 Forbidden` |

Authenticate with a JWT or an external API key, as described in [Authentication](authentication.md).

## Request

```http
POST /api/access_urls/1/user
Authorization: Bearer <token>
Content-Type: application/json
```

```json
{
  "username": "jdoe-20261022",
  "email": "jane.doe@example.com",
  "firstname": "Jane",
  "lastname": "Doe",
  "password": "S3cret!pass",
  "sendEmail": true,
  "extraFields": { "my_user_field": "value" }
}
```

| Field | Required | Description |
|-------|----------|-------------|
| `username` | Yes | Login of the new user. Must not already be used by another account (compared case-insensitively). |
| `email` | Yes | A valid e-mail address. Several accounts may share the same address, unless `checkEmailDuplicates` is `true`. |
| `firstname`, `lastname` | No | First and last name. |
| `password` | No | Initial password. When it is empty and `sendEmail` is `true`, the e-mail contains a link to set a password instead. |
| `locale` | No | Interface language, e.g. `fr_FR`. Defaults to the platform language. |
| `timezone` | No | Defaults to the platform timezone. |
| `status` | No | `5` (learner) by default; `1` for a teacher. |
| `sendEmail` | No | `true` by default. Sends the user a message and an e-mail with their access details. |
| `checkEmailDuplicates` | No | `false` by default. When `true`, the request is refused with `409 email_already_exists` if any account already uses this e-mail address (compared case-insensitively). Same behaviour as the `check_email_duplicates` parameter of `save_user_json`. |
| `extraFields` | No | User extra field values keyed by the field's variable. Every variable must be an existing user extra field. |

### Shared e-mail addresses

Chamilo does not require e-mail addresses to be unique: the administrator's user creation form accepts an address that another account already uses, the user import only refuses it when its **Check unique e-mail** option is ticked, and there is no platform setting to change this. A common case is a learner re-enrolled under a new identifier who keeps the same address. Send `checkEmailDuplicates: true` only when your integration wants to treat an existing address as an error.

When the **Login is email** setting is enabled, the username is the e-mail address, so the username check already rejects duplicates.

## Response

`201 Created` with the new user (`user:read` serialization group), including its `id`.

## Errors

| Status | Body | When |
|--------|------|------|
| `401` | | No or invalid credentials |
| `403` | | The caller is neither an administrator nor a session administrator |
| `409` | `{"error": "username_already_exists"}` | The username is already used |
| `409` | `{"error": "email_already_exists"}` | `checkEmailDuplicates` is `true` and the e-mail address is already used |
| `422` | | Missing `username` or `email`, or invalid e-mail address |

## Implementation

* Operation: the `AccessUrlUser` resource declared on `src/CoreBundle/Entity/User.php`
* Input: `src/CoreBundle/Dto/CreateUserOnAccessUrlInput.php`
* Controller: `src/CoreBundle/Controller/Api/CreateUserOnAccessUrlAction.php`
* The session administrator's **Register student** page (`/admin-dashboard/register/{courseId}`) uses this endpoint with `checkEmailDuplicates: true`, so it warns when the address is already in use.
