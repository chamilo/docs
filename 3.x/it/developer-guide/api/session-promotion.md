# Promozione della sessione

Una sessione può appartenere a una **promozione** (una coorte di una carriera, gestita in **Amministrazione > Carriere e promozioni**). Le integrazioni la impostano con l'operazione standard `PATCH /api/sessions/{id}`, che sostituisce il parametro `promotion_id` del webservice `update_session` della versione 1.11.x.

Non confondere una promozione con una categoria di sessione (`/api/session_categories`), che costituisce un raggruppamento diverso.

## Accesso

Solo gli amministratori della piattaforma (`ROLE_ADMIN`) possono leggere le promozioni e modificare la promozione di una sessione. Gli altri utenti ricevono `403 Forbidden`.

## Individuare una promozione

Le promozioni sono esposte in sola lettura. Vengono comunque create e modificate dall'amministrazione.

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

`status` vale `1` per una promozione attiva e `0` per una inattiva.

## Impostare la promozione di una sessione

```http
PATCH /api/sessions/42
Authorization: Bearer <token>
Content-Type: application/merge-patch+json
```

```json
{ "promotion": "/api/promotions/3" }
```

Inviare `{ "promotion": null }` per scollegare la sessione dalla sua promozione.

La promozione deve essere indicata come IRI. Un id numerico, oppure un IRI che non corrisponde ad alcuna promozione, viene rifiutato con `400 Bad Request`.

## Leggere la promozione di una sessione

`GET /api/sessions/{id}` restituisce l'IRI della promozione, oppure omette il campo quando la sessione non ha una promozione:

```json
{
  "@id": "/api/sessions/42",
  "title": "Accounting basics - October 2026",
  "promotion": "/api/promotions/3"
}
```

Una sessione creata con [Duplicazione della sessione](session-duplication.md) conserva la promozione della sessione modello.