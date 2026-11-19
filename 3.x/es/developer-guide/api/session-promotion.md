# Promoción de sesión

Una sesión puede pertenecer a una **promoción** (una cohorte de una carrera, gestionada en **Administración > Carreras y promociones**). Las integraciones la establecen con la operación estándar `PATCH /api/sessions/{id}`, que sustituye el parámetro `promotion_id` del servicio web `update_session` de la versión 1.11.x.

No confunda una promoción con una categoría de sesión (`/api/session_categories`), que es una agrupación distinta.

## Acceso

Solo los administradores de la plataforma (`ROLE_ADMIN`) pueden leer las promociones y cambiar la promoción de una sesión. Los demás usuarios reciben `403 Forbidden`.

## Búsqueda de una promoción

Las promociones se exponen en modo de solo lectura. Siguen creándose y editándose desde la administración.

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

`status` es `1` para una promoción activa y `0` para una inactiva.

## Establecimiento de la promoción de una sesión

```http
PATCH /api/sessions/42
Authorization: Bearer <token>
Content-Type: application/merge-patch+json
```

```json
{ "promotion": "/api/promotions/3" }
```

Envíe `{ "promotion": null }` para desvincular la sesión de su promoción.

La promoción debe indicarse como un IRI. Un identificador numérico, o un IRI que no coincida con ninguna promoción, se rechaza con `400 Bad Request`.

## Lectura de la promoción de una sesión

`GET /api/sessions/{id}` devuelve el IRI de la promoción, u omite el campo cuando la sesión no tiene promoción:

```json
{
  "@id": "/api/sessions/42",
  "title": "Accounting basics - October 2026",
  "promotion": "/api/promotions/3"
}
```

Una sesión creada con [Duplicación de sesión](session-duplication.md) conserva la promoción de su sesión modelo.