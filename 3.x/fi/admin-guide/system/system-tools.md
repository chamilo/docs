# Järjestelmätyökalut

Tämä sivu käsittelee Järjestelmä-lohkon ylläpito- ja tarkastustyökaluja.

## Väliaikaisten tiedostojen puhdistus

**Järjestelmä > Puhdista väliaikaiset tiedostot** näyttää, kuinka monta väliaikaista lataustiedostoa on olemassa ja kuinka paljon tilaa ne käyttävät, ja antaa sitten tyhjentää ne — joko kaikki tai vain määritettävää ikää vanhemmat tiedostot. Koekäyttötila antaa ensin esikatsella, mitä poistettaisiin. Sama toiminto tyhjentää myös vanhentuneet legacy-koontitiedostot ja regeneroi käännetyt CSS-resurssit.

Tämä toiminto ohittaa tarkoituksella Symfonyn omat välimuistihakemistot (`var/cache/dev`, `var/cache/prod`, `var/cache/test` ja välimuistipoolit) — se puhdistaa vain harhailevat tiedostot, jotka ovat päätyneet muualle `var/cache/`-hakemiston alle. Se **ei** ota huomioon muutosta, jonka teit tiedostossa `.env` tai hakemistossa `config/` (esimerkiksi API-dokumentaation käyttöönotto — katso [Ota API-dokumentaatio käyttöön](../installation/configuration.md#enable-the-api-documentation)). Sitä varten tarvitset komentorivipääsyn komennon `php bin/console cache:clear` suorittamiseen.

## Järjestelmäpäivitys

**Järjestelmä > Järjestelmäpäivitys** suorittaa Chamilon itsepäivitystyönkulun suoraan ylläpitopaneelista erillisinä, jatkettavina vaiheina:

1. **Tila** — Raportoi asennetun version ja päivitys-/staging-/varmuuskopiohakemistojen sijainnit sekä käytössä olevan luotetun allekirjoitusavaimen
2. **Tarkistus** — Selvittää, onko uudempi versio saatavilla määritetystä päivityslähteestä
3. **Varmistus** — Lataa päivityspaketin ja sen allekirjoituksen ja tarkistaa sen manifestin tarkistussummaa ja luotettua julkista avainta vasten
4. **Esitarkistus** — Vahvistaa järjestelmävaatimukset ja yhteensopivuuden ennen kuin mitään muutetaan
5. **Stage** — Puraa varmennettu paketti eristettyyn staging-hakemistoon; live-asennukseen ei vielä tehdä muutoksia
6. **Sovella suunnitelma** — Rakentaa eron lisättävistä, korvattavista tai poistettavista tiedostoista stageatun paketin perusteella
7. **Sovella tiedostot** — Kopioi tiedostot paikoilleen. Tämä vaatii nimenomaisen vahvistuksen ja luo varmuuskopion jokaisesta ylikirjoitettavasta tiedostosta sekä lukkotiedoston, joka estää toisen päivityksen yhtäaikaisen suorituksen
8. **Migraation turvallisuus / soveltamisen jälkeiset tarkistukset** — Vahvistaa odottavat tietokantamigraatiot ja asennuksen jälkeisen tilan
9. **Suorita soveltamisen jälkeen** — Suorittaa soveltamisen jälkeiset konsolikomennot (kuten tietokantamigraatiot), mutta vain jos palvelinkonfiguraatio sallii niiden ajamisen käyttöliittymästä, ja vasta sen jälkeen kun kirjoitat nimenomaisen vahvistuslauseen ja vahvistat, että varmuuskopio on otettu

Pitkäkestoiset vaiheet raportoivat edistymisen, joten sivun voi jättää turvallisesti auki niiden valmistuessa. Allekirjoituksen varmistuksen, stageamisen ennen soveltamista, ylikirjoitusta edeltävien varmuuskopioiden, rinnakkaisuuslukon ja tietokantamuutoksia edeltävien kirjoitettujen vahvistusten yhdistelmä on suunniteltu tekemään tästä työnkulusta turvallisen ilman komentorivipääsyä — mutta manuaalinen varmuuskopio ennen aloittamista on silti hyvä käytäntö; katso [Varmuuskopiot](../maintenance/backups.md).

## Tiedostotiedot

**Järjestelmä > Tiedostotiedot** luettelee jokaisen ladatun resurssitiedoston, haettavissa nimen perusteella, näyttäen sen fyysisen polun, onko se orpo (ei kytketty mihinkään kurssiin tai sessioon) ja kuinka monessa paikassa siihen viitataan. Täältä voit liittää orvon tiedoston resurssiin, irrottaa sen tai poistaa sen — hyödyllistä jäljitettäessä ja siivottaessa tallennustilaa, joka ei enää kuulu millekään kurssille.

## Resurssit tyypin mukaan

**Järjestelmä > Resurssit tyypin mukaan** antaa valita resurssityypin ja nähdä kaikissa kursseissa ja sessioissa aggregoidun määrän ja luettelon kyseisen tyypin kohteista, milloin ne luotiin ja (soveltuvin osin) mitkä käyttäjät liittyvät niihin. Käytä sitä vastaamaan kysymyksiin kuten "kuinka monta foorumia on koko alustalla" tai "millä kursseilla on eniten dokumentteja."

## Listaa kuvakkeet

**Järjestelmä > Listaa kuvakkeet** on selattava luettelo Chamilon sisäänrakennetusta kuvakejoukosta, ryhmiteltynä kategorioittain. Se on pääasiassa hyödyllinen kehitettäessä liitännäisiä tai teemoja ja tarvittaessa vahvistamaan kuvakkeen tarkka nimi, mutta se on esillä täällä yleisenä viitteenä.

## Vain kehitykseen tarkoitetut työkalut

Kaksi muuta kohdetta voi näkyä tässä lohkossa, mutta vain kun palvelimella on `tests/`-hakemisto — mikä normaalisti tapahtuu vain kehitys- tai QA-asennuksessa, ei koskaan tuotannossa:

* **Data filler** generoi suuria määriä valheellisia käyttäjiä, kursseja ja online-käyttäjätietueita kuormitus- tai QA-testausta varten.
* **E-mail tester** lähettää oikean testiviestin alustan määritetyn sähköpostilähettimen kautta, jotta SMTP-/sähköpostiasetusten toimivuus voidaan varmistaa, ja näyttää viimeaikaiset lähetysvirheet, jos niitä on.

Jos et näe näitä kahta linkkiä, se on odotettua — se tarkoittaa, että asennuksessasi ei ole `tests/`-hakemistoa, mikä on tuotantoalustan normaali, oikea tila.