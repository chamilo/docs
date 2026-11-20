# Istunnon promootio

Istunto voi kuulua **promootioon** (uran kohortti, jota hallitaan kohdassa **Hallinta > Urat ja promootiot**). Integraatiot asettavat sen tavallisella `PATCH /api/sessions/{id}` -toiminnolla, joka korvaa version 1.11.x `update_session`-verkkopalvelun `promotion_id`-parametrin.

Älä sekoita promootiota istuntokategoriaan (`/api/session_categories`), joka on eri ryhmittely.

## Käyttöoikeus

Vain alustan ylläpitäjät (`ROLE_ADMIN`) voivat lukea promootioita ja muuttaa istunnon promootiota. Muut käyttäjät saavat vastauksen `403 Forbidden`.

## Promootion etsiminen

Promootiot on julkaistu vain luku -muodossa. Ne luodaan ja muokataan edelleen hallinnasta.

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

`status` on `1` aktiiviselle promootiolle ja `0` ei-aktiiviselle.

## Istunnon promootion asettaminen

```http
PATCH /api/sessions/42
Authorization: Bearer <token>
Content-Type: application/merge-patch+json
```

```json
{ "promotion": "/api/promotions/3" }
```

Lähetä `{ "promotion": null }`, jos haluat irrottaa istunnon promootiostaan.

Promootio on annettava IRI-muodossa. Numeerinen tunniste tai IRI, joka ei vastaa mitään promootiota, hylätään vastauksella `400 Bad Request`.

## Istunnon promootion lukeminen

`GET /api/sessions/{id}` palauttaa promootion IRI:n tai jättää kentän pois, jos istunnolla ei ole promootiota:

```json
{
  "@id": "/api/sessions/42",
  "title": "Accounting basics - October 2026",
  "promotion": "/api/promotions/3"
}
```

[Istunnon kopiointi](session-duplication.md) -toiminnolla luotu istunto säilyttää mallistuntonsa promootion.