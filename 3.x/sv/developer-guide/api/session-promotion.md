# Sessionspromotion

En session kan tillhöra en **promotion** (en årskull inom en karriär, som hanteras under **Administration > Karriärer och promotioner**). Integrationer anger den med den vanliga operationen `PATCH /api/sessions/{id}`, som ersätter parametern `promotion_id` i webbtjänsten `update_session` i version 1.11.x.

Förväxla inte en promotion med en sessionskategori (`/api/session_categories`), som är en annan gruppering.

## Åtkomst

Endast plattformsadministratörer (`ROLE_ADMIN`) kan läsa promotioner och ändra en sessions promotion. Övriga användare får `403 Forbidden`.

## Hitta en promotion

Promotioner exponeras skrivskyddade. De skapas och redigeras fortfarande från administrationen.

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

`status` är `1` för en aktiv promotion och `0` för en inaktiv.

## Ange promotionen för en session

```http
PATCH /api/sessions/42
Authorization: Bearer <token>
Content-Type: application/merge-patch+json
```

```json
{ "promotion": "/api/promotions/3" }
```

Skicka `{ "promotion": null }` för att koppla loss sessionen från dess promotion.

Promotionen måste anges som en IRI. Ett numeriskt id, eller en IRI som inte matchar någon promotion, avvisas med `400 Bad Request`.

## Läsa en sessions promotion

`GET /api/sessions/{id}` returnerar promotionens IRI, eller utelämnar fältet när sessionen saknar promotion:

```json
{
  "@id": "/api/sessions/42",
  "title": "Accounting basics - October 2026",
  "promotion": "/api/promotions/3"
}
```

En session som skapats med [Sessionsduplicering](session-duplication.md) behåller promotionen från sin modellsession.