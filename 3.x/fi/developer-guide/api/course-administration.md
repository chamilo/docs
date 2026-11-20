# Kurssihallinnan API

Chamilo 3.1:ssä järjestelmänvalvojien integraatiot voivat päivittää kurssien metatietoja ja poistaa kursseja `Course`-API-resurssin kautta. Nämä toiminnot lisättiin synkronointia varten ulkoisten hallintajärjestelmien, kuten ERP-järjestelmän, kanssa.

## Käyttöoikeudet

| Toiminto | Metodi ja päätepiste | Vaadittu rooli |
|-----------|---------------------|---------------|
| Listaa kurssit | `GET /api/courses` | Opettaja tai alustan järjestelmänvalvoja |
| Näytä kurssi | `GET /api/courses/{id}` | Oikeus tarkastella kyseistä kurssia |
| Luo kurssi | `POST /api/courses` | Opettaja tai alustan järjestelmänvalvoja |
| Päivitä kurssi | `PATCH /api/courses/{id}` | **Alustan järjestelmänvalvoja (`ROLE_ADMIN`)** |
| Poista kurssi | `DELETE /api/courses/{id}` | **Alustan järjestelmänvalvoja (`ROLE_ADMIN`)** |

`PUT` ei ole määritetty toiminnoksi tälle resurssille. Opettajien tulee edelleen muokata omia kurssejaan kurssiasetusten käyttöliittymän kautta; uudet API:n kirjoitustoiminnot on tarkoitettu vain järjestelmänvalvojille.

Käytä todennettua tiliä tai integraatiotunnuksia, joilla on tarvittavat käyttöoikeudet. Katso [API-todennus](authentication.md).

## Päivitä kurssin metatiedot

Lähetä API Platformin JSON Merge Patch -pyyntö, jotta muutat vain pyynnön rungossa annettuja ominaisuuksia:

```http
PATCH /api/courses/42
Authorization: Bearer <admin-token>
Content-Type: application/merge-patch+json
Accept: application/ld+json
```

```json
{
  "title": "Introduction to Accounting - 2026"
}
```

Pyyntö päivittää olemassa olevan kurssin sen sijaan, että loisi uuden. API hyväksyy kirjoitettavat ominaisuudet, jotka on määritelty `course:write`-serializer-ryhmässä, entiteetin validoinnin alaisina. Esimerkkejä ovat `title`, `visibility`, `categories`, `departmentUrl`, `videoUrl`, `sticky` ja `duration`. Relaatio-ominaisuudet, kuten `categories`, edellyttävät API:n odottamaa resurssiesitystä; tarkista OpenAPI-dokumentaatio sen sijaan, että lähettäisit mielivaltaisia tietokannan tunnisteita.

**Tärkeää:** kurssin sisäinen `code` **ei** ole kirjoitettavissa tämän PATCH-toiminnon kautta. Älä yritä nimetä kurssin sisäistä koodia uudelleen lähettämällä `code`- tai `visualCode`-kenttää.

## Poista kurssi

```http
DELETE /api/courses/42
Authorization: Bearer <admin-token>
```

Tämä on **tuhoava** hallintatoiminto. Chamilo kutsuu samaa kurssin poistamisen apurutiinia, jota kurssien ylläpito käyttää, sen sijaan että poistaisi Doctrine-entiteetin suoraan. Se siivoaa liittyvät ilmoittautumiset, istunto- ja luokkalinkit, seurantatiedot ja niihin liittyvän hakuindeksoinnin soveltuvin osin.

**Multi-URL**-asennuksessa poisto saattaa vain irrottaa kurssin nykyisestä access URL -osoitteesta sen sijaan, että poistaisi sen kaikkialta. Kurssin asiakirjoja ei poisteta ylläpitokäyttöliittymän erillisellä *poista yksinomaiset asiakirjat* -valinnalla. Älä tulkitse API-poistoa takuuksi siitä, että jokainen asiakirja poistetaan fyysisesti.

Jos aktiivinen riippuvuus estää poiston (esimerkiksi resurssisekvenssi), päätepiste voi vastata `409 Conflict`. Tarkista kurssin riippuvuudet ja varmuuskopiot ennen DELETE-pyyntöjen lähettämistä, erityisesti eräintegraatioissa.

## Virheet ja toiminnalliset huomautukset

* Kutsuja, jolla ei ole vaadittua järjestelmänvalvojan roolia, hylätään; käytä oikein valtuutettua tiliä opettajan tunnuksen sijaan PATCH- tai DELETE-toiminnoissa.
* Virheelliset pyyntötiedot voivat epäonnistua entiteetin validoinnissa. Hae nykyinen kurssi ennen sen PATCH-päivitystä ja lähetä vain ne ominaisuudet, jotka aiot muuttaa.
* Nämä toiminnot on julkaistu API Platformin kautta; tarkista asennetun instanssin OpenAPI-dokumentaatiosta tarkka vastausskeema ja hyväksytyt kenttämuodot.
* Testaa kurssin poistoa hävitettävällä kurssilla, ei kurssilla, joka sisältää tuotantoympäristön oppijoiden tietueita.

Kurssien hallinnasta käyttöliittymässä katso [Kurssien hallinta](../../admin-guide/courses/managing-courses.md). Istuntoilmoittautumisten integraatioista katso [Opiskelijoiden ilmoittautuminen istuntoon](session-students.md).

**Toteutus:** `src/CoreBundle/Entity/Course.php` (`Patch`- ja `Delete`-toiminnot) sekä `src/CoreBundle/State/CourseDeleteProcessor.php`. Lisätty Chamilo LMS -commitissa `8cc9d4b33d`.