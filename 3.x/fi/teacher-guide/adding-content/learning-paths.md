# Oppimispolut

Oppimispolut mahdollistavat oppimisaktiviteettien jäsenneltyjen sarjojen luomisen. Oppimispolku ohjaa oppijat tiettyyn järjestykseen dokumentteja, harjoituksia, linkkejä ja muita resursseja, valinnaisilla esitiedoilla ja edistymisen seurannalla.

Tämä työkalu on todennäköisesti eniten käytetty kurssityökalu, koska se toimii säveltäjänä monille muille työkaluille ja voi hyvin olla ***ainoa*** työkalu, jonka oppijat näkevät.

## Miksi käyttää oppimispolkuja?

Oppimispolut ovat hyödyllisiä, kun haluat:

* **Hallita sisältöjen kulutuksen järjestystä** — varmistaa, että oppijat suorittavat perustavan materiaalin ennen etenemistä
* **Seurata edistymistä** — nähdä tarkalleen, missä kukin oppija on sarjassa
* **Asettaa esitietoja** — vaatia oppijoita läpäisemään harjoitus ennen seuraavaan osioon pääsyä
* **Myöntää suorituksen** — yhdistää oppimispolun suoritus arviointikirjaan ja todistuksiin
* **Paketoida sisältöä** — luoda itsenäisiä oppimismoduuleja, joita oppijat voivat käydä läpi omaan tahtiinsa

## Oppimispolun luominen

1. Avaa **Oppimispolut**-työkalu <img src="../../.gitbook/assets/icons/mdi-map-marker-path.svg" alt="Oppimispolut" data-size="line"> kurssin etusivulta
2. Napsauta **Luo oppimispolku**
3. Anna **otsikko** ja valinnainen kuvaus
4. Tallenna — sinut viedään oppimispolun editoriin

## Oppimispolun editori

![Oppimispolun editori, vasemmalla kohdepuu ja oikealla sisällön esikatselu](../../.gitbook/assets/learning-path-editor.png)

Editorissa on kaksi pääaluetta:

* **Vasen paneeli** — Oppimispolun kohteiden (vaiheiden) luettelo puurakenteena
* **Oikea paneeli** — Valitun kohteen sisältö

### Kohteiden lisääminen

Napsauta **Lisää kohde** ja valitse, mitä lisätään:

| Kohteen tyyppi | Kuvaus |
|-----------|-------------|
| **Osio** | Otsikko, joka ryhmittelee liittyvät kohteet (kuten luvun otsikko). Osiot eivät itse sisällä sisältöä. |
| **Dokumentti** | Tiedosto tai verkkosivu kurssin Dokumentit-työkalusta |
| **Harjoitus** | Tietovisa tai testi Harjoitukset-työkalusta |
| **Linkki** | Ulkoinen URL |
| **Tehtävä** | Opiskelijan julkaisu Tehtävät-työkalusta |
| **Foorumi** | Linkki kurssin foorumiin |
| **Kysely** | Linkki kyselyyn |
| **Todistus** | Erityinen sivu, joka käynnistää suoritustodistuksen luomisen tai taitojen myöntämisen |

### Kohteiden järjestäminen

* **Vedä ja pudota** kohteita niiden järjestyksen muuttamiseksi
* **Sisäkkäistä kohteita** osioiden alle vetämällä niitä oikealle
* **Poista** kohteita, joita et enää tarvitse

### Esitietojen asettaminen

Esitiedot varmistavat, että oppijat suorittavat tietyt vaiheet ennen muiden käyttöä:

1. Valitse kohde oppimispolusta
2. Avaa sen **esitietoasetukset**
3. Valitse, mitkä edeltävät kohteet on suoritettava ensin
4. Harjoituksille voit vaatia **vähimmäispisteet** (esim. "On saatava vähintään 70 % visasta 1 ennen moduuliin 2 pääsyä")

## Oppijan kokemus

Kun oppija avaa oppimispolun:

* Hän näkee kohdeluettelon vasemmassa paneelissa
* Suoritetut kohteet merkitään rastilla
* Kohteet, joiden esitiedot eivät täyty, ovat lukittuja
* Edistyminen seurataan automaattisesti — jos oppija poistuu ja palaa, hän jatkaa siitä, mihin jäi
* Edistymispalkki näyttää kokonaissuoritusprosentin

## SCORM-sisältö

Chamilon oppimispolkutyökalu voi tuoda **SCORM 1.2** -paketteja — laajimmin käytettyä e-oppimisen standardia. Lataa SCORM-ZIP-tiedosto, ja Chamilo luo siitä oppimispolun seuraten edistymistä ja pisteitä SCORM-määrittelyn mukaisesti.

SCORM-paketin tuominen:

1. Oppimispolut-työkalussa avaa toimintovalikko ja napsauta **Lataa**
2. Lataa ZIP-tiedosto
3. Chamilo purkaa paketin ja luo oppimispolun automaattisesti

### CMI5- / xAPI-paketit

CMI5-paketteja (SCORMin moderni, xAPI-pohjainen seuraaja) tuetaan **XApi**-lisäosan kautta. Kun ylläpitäjä on ottanut lisäosan käyttöön, voit tuoda CMI5-paketin ja oppijat voivat käynnistää sen kurssilta; heidän lausuntonsa välitetään määritettyyn Learning Record Storeen.

## Sisällön tuottaminen C-Studiolla

*Käytettävissä, jos ylläpitäjä on ottanut C-Studio-lisäosan käyttöön.*

C-Studio lisää sisäänrakennetun, vedä ja pudota -visuaalieditorin interaktiivisen sisällön luomiseen suoraan oppimispolussa — vaihtoehto SCORM-paketin tuonnille, kun sinulla ei ole (tai et halua opetella) erillistä tuottotyökalua kuten Articulate tai iSpring. Rakennat sisällön sivu sivulta suoraan Chamilossa, ja se tallennetaan ja seurataan kuten mikä tahansa muu oppimispolun kohde.

### C-Studio-projektin aloittaminen

Kun liitännäinen on aktiivinen, oppimispolkujen luettelossa näkyy tavallisen toimintovalikon vieressä ylimääräinen painike, jossa on "+" ja työkaluvihje "Studio Tools":

![Oppimispolkujen luettelo, jossa näkyy C-Studion "Studio Tools" -painike tavallisen toimintovalikon vieressä](../../.gitbook/assets/cstudio-lp-button.png)

Napsauta sitä aloittaaksesi. Sinua pyydetään luomaan uusi projekti tyhjästä tai tuomaan olemassa oleva:

![C-Studion aloitusnäyttö, jossa voi luoda uuden projektin tai tuoda olemassa olevan](../../.gitbook/assets/cstudio-start-screen.png)

Tämä näyttö on tällä hetkellä saatavilla vain ranskaksi alustan tai kurssin kielestä riippumatta — tunnettu rajoitus käytössä olevassa liitännäisversiossa. Anna projektille otsikko, niin se avautuu suoraan editoriin.

### Editori

![C-Studion visuaalinen editori, jossa näkyvät sivun kangas, työkalupaletti oikealla ja projektipaneeli vasemmalla](../../.gitbook/assets/cstudio-editor.png)

Editori on sivukohtainen visuaalinen rakentaja:

* **Vasen paneeli** — projektisi sivut, "+" uusien lisäämiseen sekä **Tools**-osio alareunassa (Clean data, Preview, Colors, Options, Quit)
* **Keskimmäinen kangas** — sivu, jota rakennat; napsauta mitä tahansa elementtiä muokataksesi sitä paikan päällä
* **Oikea paneeli** — komponenttipaletti, jota vedetään kankaalle

Paletti kattaa perusrakennuspalikat (sarakkeet, kuvat, ääni, otsikot, teksti, painikkeet, kortit) sekä useita interaktiivisia harjoitustyyppejä: **Drag Drop**, **Fill text**, **Hotspot Img**, **Mark Words**, **Find Words** ja **Sort paragraphs**, plus **iframe**-lohko ulkoisen sisällön upottamiseen ja **Quiz**-lohko.

### Kieli

C-Studion oma käyttöliittymä voi oletuksena olla ranskaksi, kun avaat sen ensimmäisen kerran, riippumatta Chamilo-käyttöliittymän kielestä tai kurssin kielestä. Jos näin on, siirry kohtaan **File > UI language** ja valitse kielesi — editori latautuu uudelleen heti ja muistaa valintasi sen jälkeen.

![File-valikko avoinna, jossa näkyy "UI language" -vaihtoehto](../../.gitbook/assets/cstudio-file-menu.png)

### Tallentaminen ja vieminen

Käytä **File > Save** työskennellessäsi. **File > Export...** pakkaa projektisi SCORM-tiedostoksi, jonka voit ladata, varmuuskopioida tai käyttää uudelleen muualla **Import...**-toiminnolla. **File > Quit** palauttaa sinut oppimispolkujen luetteloon, jossa C-Studio-projektisi näkyy nyt tavallisena kohteena.

## Oppimispolun asetukset

Määritä, miten oppimispolku käyttäytyy:

| Asetus | Kuvaus |
|---------|-------------|
| **Näkyvyys** | Piilota tai näytä oppimispolku oppijoille |
| **Esivaatimukset** | Edellytä muiden oppimispolkujen suorittamista ennen tätä |
| **Automaattinen käynnistys** | Avaa tämä oppimispolku automaattisesti, kun oppijat siirtyvät kurssille |
| **Kertynyt SCORM-aika** | Kerätäänkö aika useiden istuntojen yli |

## Linkittäminen arviointikirjaan

Voit sisällyttää oppimispolun suorittamisen arvioituna aktiviteettina arviointikirjaan. Näin oppimispolun edistyminen voi vaikuttaa oppijan kokonaiskurssiarvosanaan ja todistuskelpoisuuteen.

## Tekoälyn käyttäminen

Jos ylläpitäjä on ottanut käyttöön tekoälyavusteisen oppimispolun luonnin, löydät tekoälygeneraattorin vaihtoehdon avattavasta toimintovalikosta. Anna tekoälylle niin tarkka konteksti kuin haluat oppimispolullesi, pyydä sivujen määrää ja likimääräistä sanamäärää sivua kohden, kerro sitten, haluatko täyttää sen testeillä, ja käynnistä. Muutaman minuutin kuluttua katsot valmista, tekstipohjaista oppimispolkua.

Muokkaa asiakirjoja luodaksesi kuvituksia lisää tekoälyllä, ja sinulla on jäljellä vain tarkistus ennen kuin voit jakaa sen oppijoillesi.

## Vinkkejä

* **Aloita hahmotelmalla** — Suunnittele osiot ja kohteet ennen polun rakentamista
* **Käytä osioita lukuina** — Ryhmittele liittyvät kohteet osikkojen alle selkeyden vuoksi
* **Aseta esivaatimukset arvioinneille** — Edellytä oppijoilta sisällön opiskelua ennen tentin tekemistä
* **Yhdistele sisältötyyppejä** — Yhdistä lukemistoja, videoita, interaktiivisia harjoituksia ja ulkoisia resursseja mukaansatempaavan oppimiskokemuksen luomiseksi
* **Tarkista oppijan näkymä** — Käytä Student View -ominaisuutta kokeaksesi oppimispolun kuten oppija
* **Käytä SCORMia interaktiivisuuteen** — Jos sinulla on pääsy SCORM-tekijätyökaluihin (kuten Articulate, iSpring tai vastaavat), luo rikasta interaktiivista sisältöä ja tuo se Chamiloon. Jos ylläpitäjäsi on ottanut käyttöön C-Studio-liitännäisen, voit rakentaa vastaavaa interaktiivista sisältöä suoraan Chamilossa — katso [Sisällön tuottaminen C-Studiolla](#content-authoring-with-c-studio) yllä