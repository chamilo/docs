# Session Promotion

A session can belong to a **promotion** (a cohort of a career, managed in **Administration > Careers and promotions**). Integrations set it with the standard `PATCH /api/sessions/{id}` operation, which replaces the `promotion_id` parameter of the 1.11.x `update_session` webservice.

Do not confuse a promotion with a session category (`/api/session_categories`), which is a different grouping.

## Access

Only platform administrators (`ROLE_ADMIN`) can read promotions and change the promotion of a session. Other users receive `403 Forbidden`.

## Finding a promotion

Promotions are exposed read-only. They are still created and edited from the administration.

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

`status` is `1` for an active promotion and `0` for an inactive one.

## Setting the promotion of a session

```http
PATCH /api/sessions/42
Authorization: Bearer <token>
Content-Type: application/merge-patch+json
```

```json
{ "promotion": "/api/promotions/3" }
```

Send `{ "promotion": null }` to detach the session from its promotion.

The promotion must be given as an IRI. A numeric id, or an IRI that matches no promotion, is rejected with `400 Bad Request`.

## Reading the promotion of a session

`GET /api/sessions/{id}` returns the promotion's IRI, or omits the field when the session has no promotion:

```json
{
  "@id": "/api/sessions/42",
  "title": "Accounting basics - October 2026",
  "promotion": "/api/promotions/3"
}
```

A session created with [Session Duplication](session-duplication.md) keeps the promotion of its model session.
