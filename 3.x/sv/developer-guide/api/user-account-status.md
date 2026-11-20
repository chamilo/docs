# Användarkontostatus

Fältet `active` för en användare är kontostatusen. En administratör blockerar eller avblockerar ett konto genom att ändra det med `PATCH /api/users/{id}`. Detta ersätter fältet `active` i webbtjänsten `webservices/api/v2.php` i version 1.11.x.

## Värden

| `active` | Betydelse |
|----------|---------|
| `1` | Aktiv: användaren kan logga in |
| `0` | Inaktiv: kontot är blockerat |
| `-1` | Inaktiverat automatiskt av plattformen |
| `-2` | Borttaget (i papperskorgen) |

API:et kan endast sätta `1` eller `0`. Borttagning sker via `DELETE /api/users/{id}`, och återställning av ett borttaget konto via administrationens papperskorg.

## Läsa statusen

`active` returneras av `GET /api/users/{id}` och av `GET /api/users?username=...`.

```http
GET /api/users/42
Authorization: Bearer <token>
Accept: application/json
```

```json
{ "id": 42, "username": "jdupont", "active": 1 }
```

## Ändra statusen

```http
PATCH /api/users/42
Authorization: Bearer <token>
Content-Type: application/merge-patch+json
Accept: application/json

{ "active": 0 }
```

Svaret är den uppdaterade användaren. Skicka `{ "active": 1 }` för att avblockera kontot. `active` kan skickas tillsammans med andra fält för användaren.

## Åtkomst

| Anropare | Tillåtet |
|--------|---------|
| `ROLE_ADMIN` | Alla användare de får redigera, utom sitt eget konto |
| Alla andra användare | Inte tillåtet, inte ens för det egna kontot |

Att skicka det aktuella värdet avvisas aldrig, så en klient som skickar tillbaka hela användaren blockeras inte.

## Fel

| Status | När |
|--------|------|
| `400` | Ett annat värde än `0` eller `1` |
| `401` | Inga eller ogiltiga autentiseringsuppgifter |
| `403` | Anroparen är inte administratör, eller ändrar sin egen status |
| `404` | Användaren finns inte |