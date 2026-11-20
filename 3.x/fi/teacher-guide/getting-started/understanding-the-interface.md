# Käyttöliittymän ymmärtäminen

Chamilo 3.0:ssa on selkeä, moderni käyttöliittymä, joka on suunniteltu pitämään navigointi yksinkertaisena. Tällä sivulla selitetään käyttöliittymän jokainen osa yksityiskohtaisesti.

## Yläpalkki

![Yläpalkki, jossa on merkittyjä elementtejä, kuten logo, saapuneet, tukipyyntö ja käyttäjän avatar](/.gitbook/assets/top-bar-annotated.png)

Yläpalkki on aina näkyvissä jokaisen sivun yläosassa. Se sisältää:

* **Alustan logo** — Napsauta sitä palataksesi etusivulle milloin tahansa.
* **Saapuneet-kuvake** <img src="/.gitbook/assets/icons/mdi-inbox.svg" alt="Inbox" data-size="line"> — Näyttää viestisi. Punainen merkki ilmaisee lukemattomia viestejä. Napsauta avataksesi saapuneet.
* **Tukipyyntökuvake** <img src="/.gitbook/assets/icons/mdi-ticket-account.svg" alt="Support" data-size="line"> — Jos ylläpitäjä on ottanut sen käyttöön, tämä antaa pääsyn tukipyyntöjärjestelmään.
* **Avatarisi** — Pyöreä kuva oikeassa yläkulmassa. Napsauta sitä avataksesi avattavan valikon, jossa on linkit profiiliisi, tiliasetuksiin ja uloskirjautumiseen.

## Sivupalkki

Vasemmalla oleva sivupalkki on pääasiallinen navigointisi. Se voidaan tiivistää, jotta sisältöalueelle jää enemmän tilaa. Napsauta sen oikeassa reunassa olevaa nuolta laajentaaksesi tai tiivistääksesi sen. Chamilo muistaa valintasi.

Sivupalkki sisältää seuraavat linkit (osa niistä voi olla piilotettu alustan määrityksistä riippuen):

![Sivupalkin navigointipaneeli laajennetussa tilassa, jossa näkyvät kaikki valikkokohdat](/.gitbook/assets/sidebar-expanded.png)

| Valikkokohta | Kuvake | Kuvaus |
|-----------|------|-------------|
| **Koti** | <img src="/.gitbook/assets/icons/mdi-home.svg" alt="Home" data-size="line"> | Palauttaa pääkoontinäyttöön |
| **Kurssini** | <img src="/.gitbook/assets/icons/mdi-book-open-page-variant.svg" alt="Courses" data-size="line"> | Luettelee kaikki kurssit, joille olet ilmoittautunut |
| **Istuntoni** | <img src="/.gitbook/assets/icons/mdi-google-classroom.svg" alt="Sessions" data-size="line"> | Luettelee koulutustilaisuutesi (nykyiset, menneet, tulevat) |
| **Tutustu muihin kursseihin** | <img src="/.gitbook/assets/icons/mdi-bookmark-multiple.svg" alt="Catalogue" data-size="line"> | Selaa kurssiluetteloa uusien kurssien löytämiseksi |
| **Agenda** | <img src="/.gitbook/assets/icons/mdi-calendar-text.svg" alt="Agenda" data-size="line"> | Henkilökohtainen ja kurssikalenterisi |
| **Raportointi** | <img src="/.gitbook/assets/icons/mdi-chart-box.svg" alt="Reporting" data-size="line"> | Pääsy oppijoiden seurantaan ja kurssiraportteihin |
| **Sosiaalinen verkosto** | <img src="/.gitbook/assets/icons/mdi-sitemap-outline.svg" alt="Social network" data-size="line"> | Yhdistä muihin käyttäjiin, lähetä viestejä, liity ryhmiin |
| **Videoneuvottelu** | <img src="/.gitbook/assets/icons/mdi-video.svg" alt="Video" data-size="line"> | Pääsy live-videoistuntoihin (jos määritetty) |
| **Hallinta** | <img src="/.gitbook/assets/icons/mdi-cogs.svg" alt="Admin" data-size="line"> | Alustan hallinta (näkyy vain ylläpitäjille) |

Sivupalkin aivan alareunassa on **Kirjaudu ulos** -vaihtoehto, jolla voit kirjautua nopeasti ulos, kun olet valmis. Tämä vaihtoehto on myös käytettävissä avatar-kuvakkeen avattavasta valikosta oikeassa yläkulmassa.
Jos alustaa hallitaan ulkoisilla todennusmenetelmillä, nämä uloskirjautumisvaihtoehdot eivät välttämättä ole käytettävissä.

## Pääsisältöalue

Näytön keskialue näyttää nykyisen sivun sisällön. Yläosassa näet usein **murupolun**, joka näyttää sijaintisi alustalla (esimerkiksi: Koti > Rock-musiikki > Dokumentit). Käytä murupolkua palataksesi ylemmälle sivulle.

## Kurssin etusivu

Kun siirryt kurssille, näet **kurssin etusivun**. Tämä käsitellään yksityiskohtaisesti osiossa [Kurssin luominen](../creating-your-course/), mutta tässä on lyhyt yleiskatsaus:

* **Kurssin otsikko** — Näkyy korostetusti yläosassa
* **Kurssin esittely** — Valinnainen rich-text-kuvaus, jota voit muokata
* **Työkaluruudukko** — Ruudukko kuvakkeita, jotka edustavat kurssin työkaluja (Dokumentit, Harjoitukset, Foorumit jne.)

Opettajana näet lisäohjaimia:

* **Opiskelijanäkymä** <img src="/.gitbook/assets/icons/mdi-eye.svg" alt="Student view" data-size="line"> — Vaihda tämä nähdäksesi kurssin sellaisena kuin opiskelija sen näkisi
* **Muokkaa esittelyä** <img src="/.gitbook/assets/icons/mdi-pencil.svg" alt="Edit" data-size="line"> — Muokkaa kurssin esittelytekstiä
* **Näytä kaikki / Piilota kaikki** — Muuta nopeasti kaikkien työkalujen näkyvyyttä opiskelijoille
* **Järjestä** — Ota käyttöön vedä ja pudota työkalujen uudelleenjärjestämiseksi etusivulla

## Ikonien värit

Tämä on edelleen kokeellista eikä täysin valmista Chamilo 3.0:ssa, mutta pyrimme noudattamaan seuraavia sääntöjä kaikissa käyttöliittymän painikkeissa ja toimintokuvakkeissa:

* **Vihreä** luontitoiminnoille. Tähän kuuluvat lisääminen, luominen, tuominen, arviointi, tallentaminen ja sisällön kopioiminen.
* **Sininen** katselutoiminnoille. Tähän kuuluvat vienti, katselu, esikatselu luetteloissa tai yksityiskohtanäkymissä, haku ja lataaminen.
* **Oranssi** muokkaustoiminnoille. Tähän kuuluvat muokkaaminen, siirtäminen, määrittäminen, käyttöönotto/käytöstä poisto, piilottaminen ja näyttäminen.
* **Punainen** poisto-/poistamistoiminnoille. Tähän kuuluvat poistaminen, poistaminen ja tilauksen peruminen.
* **Harmaa** peruutustoiminnoille. Asiat jätetään ennalleen.

## Responsiivinen suunnittelu

Chamilo 3.0 mukautuu eri näyttökokoihin. Mobiililaitteella tai kapeassa selainikkunassa:

* Sivupalkki on oletuksena piilotettu, ja sen voi avata napauttamalla valikkokuvaketta
* Kurssikortit näytetään yhdessä sarakkeessa ruudukon sijaan
* Taulukoita voi vierittää vaakasuunnassa

Tämä tarkoittaa, että sinä ja oppijasi voitte käyttää alustaa puhelimella, tabletilla tai tietokoneella, mutta käyttöliittymä voi näyttää hieman erilaiselta.