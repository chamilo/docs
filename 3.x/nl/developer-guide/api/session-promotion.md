# Sessiepromotie

Een sessie kan tot een **promotie** behoren (een cohort van een carrière, beheerd in **Beheer > Carrières en promoties**). Integraties stellen dit in met de standaardbewerking `PATCH /api/sessions/{id}`, die de parameter `promotion_id` van de webservice `update_session` uit 1.11.x vervangt.

Verwar een promotie niet met een sessiecategorie (`/api/session_categories`); dat is een andere groepering.

## Toegang

Alleen platformbeheerders (`ROLE_ADMIN`) kunnen promoties lezen en de promotie van een sessie wijzigen. Andere gebruikers ontvangen `403 Forbidden`.

## Een promotie zoeken

Promoties worden alleen-lezen beschikbaar gesteld. Ze worden nog steeds aangemaakt en bewerkt vanuit het beheer.

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

`status` is `1` voor een actieve promotie en `0` voor een inactieve promotie.

## De promotie van een sessie instellen

```http
PATCH /api/sessions/42
Authorization: Bearer <token>
Content-Type: application/merge-patch+json
```

```json
{ "promotion": "/api/promotions/3" }
```

Stuur `{ "promotion": null }` om de sessie los te koppelen van haar promotie.

De promotie moet als IRI worden opgegeven. Een numerieke id, of een IRI die met geen enkele promotie overeenkomt, wordt geweigerd met `400 Bad Request`.

## De promotie van een sessie lezen

`GET /api/sessions/{id}` retourneert de IRI van de promotie, of laat het veld weg wanneer de sessie geen promotie heeft:

```json
{
  "@id": "/api/sessions/42",
  "title": "Accounting basics - October 2026",
  "promotion": "/api/promotions/3"
}
```

Een sessie die is aangemaakt met [Sessieduplicatie](session-duplication.md) behoudt de promotie van de modelsessie.