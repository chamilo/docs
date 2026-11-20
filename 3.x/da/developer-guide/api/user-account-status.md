# Brugerkontostatus

Feltet `active` for en bruger er kontostatus. En administrator blokerer eller ophæver blokeringen af en konto ved at ændre den med `PATCH /api/users/{id}`. Dette erstatter feltet `active` i 1.11.x-webtjenesten `webservices/api/v2.php`.

## Værdier

| `active` | Betydning |
|----------|---------|
| `1` | Aktiv: brugeren kan logge ind |
| `0` | Inaktiv: kontoen er blokeret |
| `-1` | Deaktiveret automatisk af platformen |
| `-2` | Slettet (i papirkurven) |

API'en kan kun sætte `1` eller `0`. Sletning sker via `DELETE /api/users/{id}`, og gendannelse af en slettet konto sker via administrationens papirkurv.

## Læsning af status

`active` returneres af `GET /api/users/{id}` og af `GET /api/users?username=...`.

```http
GET /api/users/42
Authorization: Bearer <token>
Accept: application/json
```

```json
{ "id": 42, "username": "jdupont", "active": 1 }
```

## Ændring af status

```http
PATCH /api/users/42
Authorization: Bearer <token>
Content-Type: application/merge-patch+json
Accept: application/json

{ "active": 0 }
```

Svaret er den opdaterede bruger. Send `{ "active": 1 }` for at ophæve blokeringen af kontoen. `active` kan sendes sammen med andre felter for brugeren.

## Adgang

| Kaldende | Tilladt |
|--------|---------|
| `ROLE_ADMIN` | Enhver bruger de må redigere, undtagen deres egen konto |
| Enhver anden bruger | Ikke tilladt, heller ikke på deres egen konto |

Afsendelse af den aktuelle værdi afvises aldrig, så en klient, der sender hele brugeren tilbage, blokeres ikke.

## Fejl

| Status | Hvornår |
|--------|------|
| `400` | En anden værdi end `0` eller `1` |
| `401` | Ingen eller ugyldige legitimationsoplysninger |
| `403` | Den kaldende er ikke administrator, eller ændrer sin egen status |
| `404` | Brugeren findes ikke |