# Sessionspromotion

En session kan tilhøre en **promotion** (en årgang inden for en karriere, som administreres under **Administration > Karrierer og promotioner**). Integrationer angiver den med standardoperationen `PATCH /api/sessions/{id}`, som erstatter parameteren `promotion_id` i 1.11.x-webtjenesten `update_session`.

Forveksl ikke en promotion med en sessionskategori (`/api/session_categories`), som er en anden gruppering.

## Adgang

Kun platformsadministratorer (`ROLE_ADMIN`) kan læse promotioner og ændre en sessions promotion. Andre brugere modtager `403 Forbidden`.

## Sådan finder du en promotion

Promotioner eksponeres som skrivebeskyttede. De oprettes og redigeres stadig fra administrationen.

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

`status` er `1` for en aktiv promotion og `0` for en inaktiv.

## Sådan angives en sessions promotion

```http
PATCH /api/sessions/42
Authorization: Bearer <token>
Content-Type: application/merge-patch+json
```

```json
{ "promotion": "/api/promotions/3" }
```

Send `{ "promotion": null }` for at frakoble sessionen fra dens promotion.

Promotionen skal angives som en IRI. Et numerisk id eller en IRI, der ikke matcher nogen promotion, afvises med `400 Bad Request`.

## Sådan læses en sessions promotion

`GET /api/sessions/{id}` returnerer promotionens IRI eller udelader feltet, når sessionen ikke har nogen promotion:

```json
{
  "@id": "/api/sessions/42",
  "title": "Accounting basics - October 2026",
  "promotion": "/api/promotions/3"
}
```

En session, der er oprettet med [Sessionsduplikering](session-duplication.md), beholder promotionen fra sin modelsession.