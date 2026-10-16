# User Account Status

The `active` field of a user is the account status. An administrator blocks or unblocks an account by changing it with `PATCH /api/users/{id}`. This replaces the `active` field of the 1.11.x `webservices/api/v2.php` webservice.

## Values

| `active` | Meaning |
|----------|---------|
| `1` | Active: the user can log in |
| `0` | Inactive: the account is blocked |
| `-1` | Deactivated automatically by the platform |
| `-2` | Deleted (in the trash) |

The API can only set `1` or `0`. Deleting goes through `DELETE /api/users/{id}`, and restoring a deleted account through the administration's trash.

## Reading the status

`active` is returned by `GET /api/users/{id}` and by `GET /api/users?username=...`.

```http
GET /api/users/42
Authorization: Bearer <token>
Accept: application/json
```

```json
{ "id": 42, "username": "jdupont", "active": 1 }
```

## Changing the status

```http
PATCH /api/users/42
Authorization: Bearer <token>
Content-Type: application/merge-patch+json
Accept: application/json

{ "active": 0 }
```

The response is the updated user. Send `{ "active": 1 }` to unblock the account. `active` can be sent together with other fields of the user.

## Access

| Caller | Allowed |
|--------|---------|
| `ROLE_ADMIN` | Any user they may edit, except their own account |
| Any other user | Not allowed, even on their own account |

Sending the current value is never refused, so a client that sends back the whole user is not blocked.

## Errors

| Status | When |
|--------|------|
| `400` | A value other than `0` or `1` |
| `401` | No or invalid credentials |
| `403` | The caller is not an administrator, or changes their own status |
| `404` | The user does not exist |
