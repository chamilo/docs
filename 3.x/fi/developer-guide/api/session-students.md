# Istunnon opiskelijoiden ilmoittautumisen API

Integraatiot voivat listata, ilmoittaa ja poistaa oppijoita istunnossa käyttämällä vain järjestelmänvalvojille tarkoitettuja päätepisteitä. Nämä toiminnot käyttävät Chamilon hallintanäyttöjen istuntoilmoittautumisen toimintatapaa. Ne ovat erillisiä polusta `/api/course-sessions/actions/*`, joka kuuluu toiseen, ohjaajille suunnattuun työnkulkuun.

## Todennus ja käyttöoikeus

Jokainen alla oleva toiminto edellyttää todennusta alustan roolilla `ROLE_ADMIN`. Pelkkä istunnon järjestelmänvalvojan asema **ei** myönnä käyttöoikeutta. Käytä kohdassa [Todennus](authentication.md) kuvattua todennusmenetelmää.

Usean URL-osoitteen asennuksissa pyydetyn istunnon on kuuluttava nykyiseen käyttö-URL-osoitteeseen; muuten päätepiste vastaa koodilla `404`.

## Reitit

| Menetelmä | Päätepiste | Tarkoitus |
|--------|----------|---------|
| `GET` | `/api/sessions/{id}/students` | Listaa tähän istuntoon ilmoittautuneiden oppijoiden käyttäjä-ID:t |
| `POST` | `/api/sessions/{id}/students/subscribe` | Lisää määritetyt oppijat ja säilyttää olemassa olevat oppijat |
| `POST` | `/api/sessions/{id}/students/unsubscribe` | Poistaa vain määritetyt oppijat |

Korvaa `{id}` numeerisella istuntotunnuksella. Lähetä molemmissa POST-pyynnöissä JSON, joka sisältää `userIds`-taulukon:

```http
POST /api/sessions/42/students/subscribe
Authorization: Bearer <admin-token>
Content-Type: application/json
```

```json
{ "userIds": [17, 23] }
```

Onnistunut ilmoittautuminen tuottaa vastauksen, jolla on seuraava rakenne; tunnukset riippuvat asennuksestasi:

```json
{
  "success": true,
  "applied": [17],
  "alreadyThere": [23],
  "ignored": []
}
```

`applied` sisältää juuri ilmoittautuneet oppijat; `alreadyThere` sisältää jo ilmoittautuneet oppijat; `ignored` luettelee kelpaamattomat tai käytettävissä olemattomat tunnukset. Ilmoittautumisen yhteydessä Chamilo ilmoittaa lisätyt oppijat myös istunnon kursseille. Se **ei** korvaa koko istunnon osallistujaluetteloa.

Jäsenyyden tarkistamiseksi:

```http
GET /api/sessions/42/students
Authorization: Bearer <admin-token>
```

```json
{ "userIds": [17, 23] }
```

Valittujen oppijoiden poistamiseksi:

```http
POST /api/sessions/42/students/unsubscribe
Authorization: Bearer <admin-token>
Content-Type: application/json
```

```json
{ "userIds": [17] }
```

Ilmoittautumisen peruutusvastaus sisältää kentät `success`, `applied` (poistetut tunnukset) ja `ignored` (tunnukset, jotka eivät olleet ilmoittautuneita). Muut oppijat pysyvät istunnossa.

## Validointi ja rajoitukset

* `userIds`-arvon on oltava numeeristen tunnusten taulukko (kokonaislukuja tai vain numeroista koostuvia merkkijonoja). Toistuvat tunnukset poistetaan kaksoiskappaleina; ei-positiiviset arvot jätetään pois.
* Ilmoittautumista varten kelvollisten käyttäjien on oltava olemassa, heitä ei saa olla pehmeästi poistettu (soft-deleted), he eivät saa olla anonyymejä tai HR-päälliköitä, ja heidän on kuuluttava nykyiseen käyttö-URL-osoitteeseen.
* Puuttuva tai virheellinen JSON tai `userIds` palauttaa vastauksen `400 Bad Request`.
* Puuttuvat tai käyttöalueen ulkopuoliset istunnot palauttavat vastauksen `404 Not Found`; kutsujat, joilla ei ole järjestelmänvalvojan oikeuksia, eivät voi käyttää näitä reittejä.
* Opiskelijoiden ilmoittautumisreitit **eivät** ole yleisiä CRUD-päätepisteitä `Session`-entiteetille, eivätkä ne hyväksy istunnon osallistujaluetteloa korvaavana dokumenttina.

Vastaavaa hallintakäyttöliittymää varten katso [Istuntojen hallinta](../../admin-guide/sessions/managing-sessions.md). Mallistunnon kopioimisesta ennen opiskelijoiden ilmoittamista katso [Istunnon monistaminen](session-duplication.md).

**Toteutus:** `src/CoreBundle/Controller/Api/SessionStudentsController.php`. Lisätty Chamilo LMS -commitissa `bdfb2dd661`.