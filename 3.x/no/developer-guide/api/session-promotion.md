# Promotering av økt

En økt kan tilhøre en **promotering** (et kull i en karriere, administrert under **Administrasjon > Karrierer og promoteringer**). Integrasjoner angir den med standardoperasjonen `PATCH /api/sessions/{id}`, som erstatter parameteren `promotion_id` i webtjenesten `update_session` fra 1.11.x.

Ikke forveksle en promotering med en øktkategori (`/api/session_categories`), som er en annen gruppering.

## Tilgang

Bare plattformadministratorer (`ROLE_ADMIN`) kan lese promoteringer og endre promoteringen til en økt. Andre brukere får `403 Forbidden`.

## Finne en promotering

Promoteringer eksponeres skrivebeskyttet. De opprettes og redigeres fortsatt fra administrasjonen.

```http
GET /api/promotions
GET /api/promotions/{id}
```

```json
{
  "@id": "/api/promotions/3",
  "id": 3,
  "title": "Accounting 2026",
  "status": 1
}
```

`status` er `1` for en aktiv promotering og `0` for en inaktiv.

## Angi promoteringen til en økt

```http
PATCH /api/sessions/42
Authorization: Bearer <token>
Content-Type: application/merge-patch+json
```

```json
{ "promotion": "/api/promotions/3" }
```

Send `{ "promotion": null }` for å koble økten fra promoteringen.

Promoteringen må oppgis som en IRI. En numerisk id, eller en IRI som ikke samsvarer med noen promotering, avvises med `400 Bad Request`.

## Lese promoteringen til en økt

`GET /api/sessions/{id}` returnerer promoteringens IRI, eller utelater feltet når økten ikke har noen promotering:

```json
{
  "@id": "/api/sessions/42",
  "title": "Accounting basics - October 2026",
  "promotion": "/api/promotions/3"
}
```

En økt opprettet med [Øktduplisering](session-duplication.md) beholder promoteringen til modelløkten.