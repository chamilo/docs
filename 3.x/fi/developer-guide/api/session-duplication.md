# Istunnon kopiointi

`POST /api/sessions/{id}/duplicate` luo uuden istunnon olemassa olevasta **malli-istunnosta**. Se on Chamilo 3:n korvaaja 1.11.x-version `webservices/api/v2.php`-verkkopalvelun `create_session_from_model`-toiminnolle, ja se on tarkoitettu integraatioille, jotka avaavat uuden koulutuskierroksen mallipohjaisesta istunnosta.

## Käyttöoikeus

| Kutsuja | Sallittu |
|--------|---------|
| `ROLE_ADMIN` | Mikä tahansa istunto |
| `ROLE_SESSION_MANAGER` | Vain hallinnoimansa istunnot (he ovat malli-istunnon istunnon ylläpitäjiä), ellei asetus **Allow session administrators to see all sessions** ole käytössä |
| Kuka tahansa muu | `403 Forbidden` |

Tunnistaudu JWT:llä tai ulkoisella API-avaimella, kuten kohdassa [Tunnistautuminen](authentication.md) on kuvattu.

## Pyyntö

```http
POST /api/sessions/42/duplicate
Authorization: Bearer <token>
Content-Type: application/json
```

```json
{
  "title": "Accounting basics - October 2026",
  "startDate": "2026-10-01T09:00:00+02:00",
  "endDate": "2026-12-15T18:00:00+01:00",
  "extraFields": { "my_session_field": "value" },
  "copySessionContent": false
}
```

| Kenttä | Pakollinen | Kuvaus |
|-------|----------|-------------|
| `title` | Kyllä | Uuden istunnon otsikko. Ei saa olla jo toisen istunnon käytössä (enintään 150 merkkiä). |
| `startDate` | Kyllä | ISO 8601 -päivämäärä ja -aika. Käytetään pääsyn, näytön ja valmentajan pääsyn alkupäivänä. |
| `endDate` | Kyllä | ISO 8601 -päivämäärä ja -aika, ei ennen `startDate`-arvoa. Käytetään pääsyn, näytön ja valmentajan pääsyn loppupäivänä. |
| `extraFields` | Ei | Istunnon lisäkenttien arvot kentän muuttujan mukaan avaimina. Ne korvaavat mallista kopioidut arvot. Jokaisen muuttujan on oltava olemassa oleva istunnon lisäkenttä. |
| `copySessionContent` | Ei | Oletuksena `false`. Kun arvo on `true`, kunkin kurssin istuntokohtainen sisältö (asiakirjat, oppimispolut, testit, kalenteritapahtumat, ilmoitukset, arvosanakirja…) kopioidaan uuteen istuntoon. Kurssin perussisältö jaetaan aina, sitä ei koskaan kopioida. Tämä lippu on riippumaton alustan asetuksesta **Enable the copy of session-specific content to another session**. |

## Mitä kopioidaan

| Kopioidaan mallista | Ei kopioida |
|-----------------------|------------|
| Kategoria, näkyvyys, kesto, kuvaus ja ”näytä kuvaus” | Kurssivalmentajat |
| Istunnon lisäkenttien arvot | HR-päälliköt (DRH) |
| Kurssit samassa järjestyksessä | Opiskelijat |
| Yleiset valmentajat | |
| Istunnon ylläpitäjät (jos mallilla ei ole yhtään, kutsujasta tulee istunnon ylläpitäjä) | |
| ”Lähetä tilausilmoitus” -asetus | |
| Kampanja | |
| Istuntokohtainen kurssisisältö vain, kun `copySessionContent` on `true` | |

Opiskelijat jätetään tarkoituksella pois: jokainen kierros saa omat oppijansa. Tilaa heidät jälkikäteen kutsulla `POST /api/course-sessions/actions/subscribe-users`.

Uusi istunto liitetään nykyiseen käyttö-URL-osoitteeseen.

## Vastaus

`201 Created` ja uusi istunto:

```json
{
  "id": 57,
  "title": "Accounting basics - October 2026",
  "nbrCourses": 3,
  "visibility": 1,
  "generalCoachesSubscriptions": [{ "user": "/api/users/7" }]
}
```

## Virheet

| Tila | Milloin |
|--------|------|
| `401` | Tunnistetiedot puuttuvat tai ovat virheelliset |
| `403` | Kutsuja ei saa hallinnoida malli-istuntoa |
| `404` | Malli-istuntoa ei ole olemassa |
| `422` | Puuttuva tai virheellinen kenttä, `endDate` ennen `startDate`-arvoa, otsikko on jo käytössä tai tuntematon lisäkentän muuttuja |

Kaikki tarkistukset suoritetaan ennen kuin mitään luodaan, joten hylätty pyyntö ei koskaan jätä jälkeensä osittaista istuntoa.

## Toteutus

* Toiminto: `duplicate_session` resurssissa `Session` (`src/CoreBundle/Entity/Session.php`)
* Syöte: `src/CoreBundle/Dto/SessionDuplicateInput.php`
* Käsittelijä: `src/CoreBundle/State/Session/SessionDuplicateProcessor.php`, joka kutsuu `SessionManager::copy()`-metodia (käytetään myös istuntoluettelon **Copy**-toiminnossa) ja soveltaa sen jälkeen pyydetyn otsikon, päivämäärät ja lisäkentät sekä mallin kampanjan, istunnon ylläpitäjät, ilmoitusasetuksen ja kurssijärjestyksen.