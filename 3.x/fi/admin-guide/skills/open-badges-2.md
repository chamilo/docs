# Open Badges 2.0 -tunnusten myöntäminen ja varmennus

Chamilo 3.1 voi julkaista **Open Badges 2.0** -tunnuksia hankituista taidoista, mukaan lukien merkkikuvan, jonka PNG-metatietoihin on upotettu assertion. Merkkien varmennus käyttää julkisia badge-, assertion- ja issuer-päätepisteitä.

## Issuerin ja taitojen määrittäminen

1. Määritä alustan **laitoksen nimi** ja kelvollinen **ylläpitäjän yhteyssähköposti**; issuer-profiili edellyttää molempia.
2. Määritä taidolle otsikko, kuvaus ja merkin kriteerit.
3. Liitä tarvittaessa kelvollinen PNG-merkkikuva. Chamilo voi käyttää myös oletusmerkkikuvaansa, jos taidolla ei ole mukautettua resurssia.
4. Myönnä tai vahvista taidon hankinta oppijalle tavanomaisen taitojen työnkulun kautta.

Tunnukset riippuvat hankitun taidon suhteesta. Peruutetun tai ei enää hankitun taidon assertion ilmoitetaan peruutetuksi. Taito- ja merkkiresurssit on rajattu asianmukaiseen käyttö-URL-osoitteeseen.

## Julkiset varmennustiedot

Jokaisella myöntämisellä on isännöity assertion. Liittyvät URL-osoitteet johdetaan sovelluksen julkisesta juuresta, ja niihin kuuluvat:

- `main/skills/assertion.php?issue=<issue-id>` — JSON-assertion tietylle taidon myöntämiselle.
- `main/skills/class.php?id=<skill-id>` — merkkiluokan metatiedot, mukaan lukien kriteerit ja issuer-viittaus.
- `main/skills/issuer.php` — myöntävän laitoksen profiili.
- `main/skills/image.php?id=<skill-id>` — merkkikuvan resurssi.

Tarkat luodut URL-osoitteet riippuvat asennuksen julkisesta peruspolusta. Assertion sisältää vastaanottajan sähköpostiosoitteen suolatun tiivisteen sen sijaan, että julkaistaisiin selväkielinen sähköpostiosoite, ja se yksilöi issuerin sekä hankitun taidon. Merkki-PNG voi sisältää assertionin `openbadges`-iTXt-lohkossa.

## Varmenna myönnetty merkki

Avaa isännöidyt assertion-, merkkiluokka- ja issuer-päätepisteet ilman kirjautunutta istuntoa. Niiden tulee palauttaa johdonmukainen linkitetty tunnus. Lataa myönnetty PNG taidon tuetun vientiprosessin kautta ja varmista, että sen upotettu assertion vastaa isännöityä esitystä. Jos taito on peruutettu, tarkista, että varmennus heijastaa sen peruutettua tilaa.

Pelkkä PNG, jossa on visuaalinen merkkigrafiikka, **ei** todista kelvollista tunnusta. Älä sekoita Open Badges 2.0 -myöntämistä siihen liittymättömään todistus- tai allekirjoitettuun PDF-toiminnallisuuteen.

Katso [Taitojen hallinta](managing-skills.md) ja [Allekirjoitetun todistuksen varmennus](../maintenance/signed-certificate-verification.md). Toteutus: [PR #9346](https://github.com/chamilo/chamilo-lms/pull/9346).