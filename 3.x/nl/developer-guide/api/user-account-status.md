# Status van gebruikersaccount

Het veld `active` van een gebruiker is de accountstatus. Een beheerder blokkeert of deblokkeert een account door dit te wijzigen met `PATCH /api/users/{id}`. Dit vervangt het veld `active` van de webservice `webservices/api/v2.php` van versie 1.11.x.

## Waarden

| `active` | Betekenis |
|----------|---------|
| `1` | Actief: de gebruiker kan inloggen |
| `0` | Inactief: het account is geblokkeerd |
| `-1` | Automatisch gedeactiveerd door het platform |
| `-2` | Verwijderd (in de prullenbak) |

De API kan alleen `1` of `0` instellen. Verwijderen verloopt via `DELETE /api/users/{id}`, en het herstellen van een verwijderd account via de prullenbak van de administratie.

## De status uitlezen

`active` wordt teruggegeven door `GET /api/users/{id}` en door `GET /api/users?username=...`.

```http
GET /api/users/42
Authorization: Bearer <token>
Accept: application/json
```

```json
{ "id": 42, "username": "jdupont", "active": 1 }
```

## De status wijzigen

```http
PATCH /api/users/42
Authorization: Bearer <token>
Content-Type: application/merge-patch+json
Accept: application/json

{ "active": 0 }
```

Het antwoord is de bijgewerkte gebruiker. Stuur `{ "active": 1 }` om het account te deblokkeren. `active` kan samen met andere velden van de gebruiker worden verzonden.

## Toegang

| Aanroeper | Toegestaan |
|--------|---------|
| `ROLE_ADMIN` | Elke gebruiker die zij mogen bewerken, behalve hun eigen account |
| Elke andere gebruiker | Niet toegestaan, ook niet voor het eigen account |

Het verzenden van de huidige waarde wordt nooit geweigerd, zodat een client die de volledige gebruiker terugstuurt niet wordt geblokkeerd.

## Fouten

| Status | Wanneer |
|--------|------|
| `400` | Een andere waarde dan `0` of `1` |
| `401` | Geen of ongeldige referenties |
| `403` | De aanroeper is geen beheerder, of wijzigt de eigen status |
| `404` | De gebruiker bestaat niet |