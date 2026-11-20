# Brukerkontostatus

`active`-feltet til en bruker er kontostatusen. En administrator blokkerer eller opphever blokkeringen av en konto ved å endre det med `PATCH /api/users/{id}`. Dette erstatter `active`-feltet i 1.11.x-webtjenesten `webservices/api/v2.php`.

## Verdier

| `active` | Betydning |
|----------|---------|
| `1` | Aktiv: brukeren kan logge inn |
| `0` | Inaktiv: kontoen er blokkert |
| `-1` | Deaktivert automatisk av plattformen |
| `-2` | Slettet (i papirkurven) |

API-et kan bare sette `1` eller `0`. Sletting skjer via `DELETE /api/users/{id}`, og gjenoppretting av en slettet konto skjer via administrasjonens papirkurv.

## Lese statusen

`active` returneres av `GET /api/users/{id}` og av `GET /api/users?username=...`.

```http
GET /api/users/42
Authorization: Bearer <token>
Accept: application/json
```

```json
{ "id": 42, "username": "jdupont", "active": 1 }
```

## Endre statusen

```http
PATCH /api/users/42
Authorization: Bearer <token>
Content-Type: application/merge-patch+json
Accept: application/json

{ "active": 0 }
```

Svaret er den oppdaterte brukeren. Send `{ "active": 1 }` for å oppheve blokkeringen av kontoen. `active` kan sendes sammen med andre felt for brukeren.

## Tilgang

| Anroper | Tillatt |
|--------|---------|
| `ROLE_ADMIN` | Enhver bruker de kan redigere, unntatt sin egen konto |
| Enhver annen bruker | Ikke tillatt, heller ikke på egen konto |

Å sende gjeldende verdi blir aldri avvist, slik at en klient som sender tilbake hele brukeren, ikke blir blokkert.

## Feil

| Status | Når |
|--------|------|
| `400` | En annen verdi enn `0` eller `1` |
| `401` | Manglende eller ugyldige legitimasjonsopplysninger |
| `403` | Anroperen er ikke administrator, eller endrer sin egen status |
| `404` | Brukeren finnes ikke |