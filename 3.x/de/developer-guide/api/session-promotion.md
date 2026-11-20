# Sitzungspromotion

Eine Sitzung kann einer **Promotion** angehören (eine Kohorte einer Laufbahn, verwaltet unter **Administration > Laufbahnen und Promotionen**). Integrationen setzen sie mit der Standardoperation `PATCH /api/sessions/{id}`, die den Parameter `promotion_id` des Webservices `update_session` von 1.11.x ersetzt.

Verwechseln Sie eine Promotion nicht mit einer Sitzungskategorie (`/api/session_categories`), die eine andere Gruppierung darstellt.

## Zugriff

Nur Plattformadministratoren (`ROLE_ADMIN`) können Promotionen lesen und die Promotion einer Sitzung ändern. Andere Benutzer erhalten `403 Forbidden`.

## Eine Promotion finden

Promotionen werden nur lesend bereitgestellt. Sie werden weiterhin über die Administration erstellt und bearbeitet.

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

`status` ist `1` für eine aktive Promotion und `0` für eine inaktive.

## Die Promotion einer Sitzung festlegen

```http
PATCH /api/sessions/42
Authorization: Bearer <token>
Content-Type: application/merge-patch+json
```

```json
{ "promotion": "/api/promotions/3" }
```

Senden Sie `{ "promotion": null }`, um die Sitzung von ihrer Promotion zu lösen.

Die Promotion muss als IRI angegeben werden. Eine numerische ID oder eine IRI, die keiner Promotion entspricht, wird mit `400 Bad Request` abgelehnt.

## Die Promotion einer Sitzung lesen

`GET /api/sessions/{id}` gibt die IRI der Promotion zurück oder lässt das Feld weg, wenn die Sitzung keine Promotion hat:

```json
{
  "@id": "/api/sessions/42",
  "title": "Accounting basics - October 2026",
  "promotion": "/api/promotions/3"
}
```

Eine mit [Sitzungsduplizierung](session-duplication.md) erstellte Sitzung behält die Promotion ihrer Modell-Sitzung.