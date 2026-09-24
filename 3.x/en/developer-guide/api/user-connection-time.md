# User Connection Time

`GET /api/users/{id}/connection-time` returns the total time a user spent connected to the platform. It replaces the `get_user_total_connexion_time` action of the 1.11.x `webservices/api/v2.php` webservice, and can be restricted to a period.

## Access

| Caller | Allowed |
|--------|---------|
| `ROLE_ADMIN` | Any user of the current access URL |
| Any authenticated user | Their own connection time only |
| Anyone else | `403 Forbidden` |

The endpoint takes the user's numeric id. To start from a username, look the user up first with `GET /api/users?username=...`.

## Request

```http
GET /api/users/42/connection-time?startDate=2026-10-01T00:00:00%2B02:00&endDate=2026-12-15T23:59:59%2B01:00
Authorization: Bearer <token>
```

| Query parameter | Required | Description |
|-----------------|----------|-------------|
| `startDate` | No | ISO 8601 date-time. Only connections that **started** at or after this moment are counted. |
| `endDate` | No | ISO 8601 date-time, not before `startDate`. Only connections that **ended** at or before this moment are counted. |

Without either parameter, every connection is counted. With only `startDate`, connections are counted from that date on, with no end limit. With only `endDate`, connections are counted up to that date, with no start limit.

A connection that overlaps a bound (for example one that started before `startDate`) is not counted at all: connection times are never split. This is the same rule as the custom period filter of the 1.11.x reporting.

Include the time zone offset. In a URL, `+` must be encoded as `%2B`. A value without an offset is read in the server's time zone.

## Response

```json
{
  "id": 42,
  "username": "jdupont",
  "totalConnectionTime": 5025,
  "totalConnectionTimeFormatted": "01:23:45"
}
```

| Field | Description |
|-------|-------------|
| `totalConnectionTime` | Total in seconds |
| `totalConnectionTimeFormatted` | The same total as `HH:MM:SS`, the format the 1.11.x webservice returned. Hours can exceed 24. |

## Errors

| Status | When |
|--------|------|
| `400` | A date that cannot be parsed, or `endDate` before `startDate` |
| `401` | No or invalid credentials |
| `403` | The caller is neither an administrator nor the user in question |
| `404` | The user does not exist, or does not belong to the current access URL |

## How the time is computed

The total is the sum of `logout_date − login_date` over the user's rows in the `track_e_login` table.

> **Warning:** A connection only gets a `logout_date` when the user logs out explicitly. Chamilo 1.11.x updated it on every page the user opened, but Chamilo 3 does not yet. As a result, a connection that ends because the session expires, or because the browser is closed, counts as zero, and the total is lower than the time the user actually spent on the platform.
