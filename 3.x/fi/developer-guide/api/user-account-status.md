# Käyttäjätilin tila

Käyttäjän `active`-kenttä on tilin tila. Ylläpitäjä estää tilin tai poistaa eston muuttamalla kenttää kutsulla `PATCH /api/users/{id}`. Tämä korvaa version 1.11.x `webservices/api/v2.php`-verkkopalvelun `active`-kentän.

## Arvot

| `active` | Merkitys |
|----------|---------|
| `1` | Aktiivinen: käyttäjä voi kirjautua sisään |
| `0` | Ei-aktiivinen: tili on estetty |
| `-1` | Alustan automaattisesti poistama käytöstä |
| `-2` | Poistettu (roskakorissa) |

API voi asettaa vain arvot `1` tai `0`. Poistaminen tapahtuu kutsulla `DELETE /api/users/{id}`, ja poistetun tilin palauttaminen hallinnan roskakorin kautta.

## Tilan lukeminen

`active` palautetaan kutsuilla `GET /api/users/{id}` ja `GET /api/users?username=...`.

```http
GET /api/users/42
Authorization: Bearer <token>
Accept: application/json
```

```json
{ "id": 42, "username": "jdupont", "active": 1 }
```

## Tilan muuttaminen

```http
PATCH /api/users/42
Authorization: Bearer <token>
Content-Type: application/merge-patch+json
Accept: application/json

{ "active": 0 }
```

Vastaus on päivitetty käyttäjä. Lähetä `{ "active": 1 }` poistaaksesi tilin eston. `active` voidaan lähettää yhdessä käyttäjän muiden kenttien kanssa.

## Käyttöoikeus

| Kutsuja | Sallittu |
|--------|---------|
| `ROLE_ADMIN` | Mikä tahansa käyttäjä, jota he saavat muokata, lukuun ottamatta omaa tiliään |
| Mikä tahansa muu käyttäjä | Ei sallittu, ei edes omalla tilillä |

Nykyisen arvon lähettämistä ei koskaan hylätä, joten asiakasta, joka lähettää koko käyttäjän takaisin, ei estetä.

## Virheet

| Tila | Milloin |
|--------|------|
| `400` | Muu arvo kuin `0` tai `1` |
| `401` | Tunnistetiedot puuttuvat tai ovat virheelliset |
| `403` | Kutsuja ei ole ylläpitäjä tai muuttaa omaa tilaansa |
| `404` | Käyttäjää ei ole olemassa |