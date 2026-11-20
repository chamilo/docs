# Luokan jäsenyys- ja ilmoittautumisrajapinta

Integraatioita varten Chamilo tarjoaa päätepisteet, joilla voi lukea ja synkronoida olemassa olevaan **luokkaan** liittyvät jäsenet, istunnot ja kurssit. Luokka on *normal class* -tyyppinen `Usergroup`; nämä reitit **eivät** koske sosiaalisia ryhmiä.

Toisin kuin istunnon opiskelijarajapinnassa, kolme luokan `PUT`-toimintoa **korvaavat koko määritetyn luettelon**. Pois jätetyt tunnisteet poistetaan kyseisestä suhteesta. Lue olemassa oleva luettelo ennen sen päivittämistä, äläkä käytä `PUT`-toimintoa vain yhden jäsenen lisäämiseen, ellet lähetä samalla kaikkia, joiden tulee säilyä.

## Valtuutus

Kaikki alla olevat reitit edellyttävät todennettua alustan `ROLE_ADMIN`-roolia. Kohdeluokan on oltava käytettävissä nykyisessä käyttö-URL-osoitteessa. Puuttuva tai käyttöalueen ulkopuolinen luokka palauttaa `404`; käyttäjäryhmä, joka ei ole tavallinen luokka, palauttaa `409 Conflict`.

Ohjain tarkistaa, että lähetetyt käyttäjä-, kurssi- ja istuntotunnisteet ovat olemassa. Usean URL-osoitteen asennuksessa lähetetyt **kurssi- ja istuntotunnisteet** suodatetaan nykyiseen portaaliin; nykyinen toteutus **ei** kuitenkaan sovella samaa portaalisuodatinta **käyttäjätunnisteisiin**. Integraattoreiden ei tule pitää tätä päätepistettä takeena käyttäjätason portaali-eristyksestä. Katso toimituksen tarkastusmuistiinpanot tästä avoimesta tietoturvanäkökohdasta.

## Luokkasuhteiden lukeminen

```http
GET /api/usergroups/31/subscriptions
Authorization: Bearer <admin-token>
```

Esimerkkivastaus:

```json
{
  "userIds": [17, 23],
  "sessionIds": [42],
  "courseIds": [8, 11]
}
```

## Yhden suhdeluettelon korvaaminen

| Menetelmä | Päätepiste | Pyynnön ominaisuus |
|--------|----------|------------------|
| `PUT` | `/api/usergroups/{id}/users` | `userIds` |
| `PUT` | `/api/usergroups/{id}/sessions` | `sessionIds` |
| `PUT` | `/api/usergroups/{id}/courses` | `courseIds` |

Esimerkiksi koko luokan jäsenluettelon asettaminen:

```http
PUT /api/usergroups/31/users
Authorization: Bearer <admin-token>
Content-Type: application/json
```

```json
{ "userIds": [17, 23, 29] }
```

Esimerkkivastaus:

```json
{
  "success": true,
  "applied": [17, 23, 29],
  "ignored": []
}
```

`applied` luettelee hyväksytyt tunnisteet, ei välttämättä juuri lisättyjä tunnisteita. `ignored` yksilöi pyydetyt tunnisteet, joita ei voitu soveltaa (esimerkiksi tuntematon tunniste tai nykyisen portaalin ulkopuolinen kurssi tai istunto). Ei-positiiviset arvot jätetään pois, kaksoiskappaleet poistetaan, ja virheellinen JSON tai taulukoksi kelpaamaton pyyntöominaisuus palauttaa `400`.

Linkitettyjen istuntojen korvaamiseksi kutsu sen sijaan `PUT /api/usergroups/31/sessions` arvolla `{ "sessionIds": [42, 57] }`. Linkitettyjen kurssien korvaamiseksi kutsu `PUT /api/usergroups/31/courses` arvolla `{ "courseIds": [8, 11] }`.

**Tärkeää:** Chamilo soveltaa nämä muutokset `UsergroupHelper`-synkronointimenetelmien kautta. Luokan jäsenluettelon tai sen istunto- ja kurssisidosten muuttaminen voi muuttaa myös niihin liittyviä ilmoittautumisia. Älä käsittele käyttäjäryhmien suhdettauluja suoraan, ja tarkista luetteloiden korvaamisen vaikutus ennen tuotantointegraation ajamista.

Käyttöliittymästä ja käsitteestä katso [Luokat](../../admin-guide/sessions/classes.md). Tiettyjen oppijoiden lisäämiseksi tai poistamiseksi yhdestä istunnosta *korvaamatta* kaikkia jäseniä käytä [istunnon opiskelijoiden ilmoittautumisrajapintaa](session-students.md).

**Toteutus:** `src/CoreBundle/Controller/Api/UsergroupSubscriptionController.php`. Lisätty Chamilo LMS -commitissa `d8809925a4`.