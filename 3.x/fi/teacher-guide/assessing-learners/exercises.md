# Harjoitukset

Harjoitustyökalu (kutsutaan myös nimellä ”testit”) mahdollistaa automaattisesti arvioitavien visailujen ja tenttien luomisen. Chamilo tukee laajaa valikoimaa kysymystyyppejä yksinkertaisista monivalinnoista interaktiivisiin hotspot-kysymyksiin.

## Harjoituksen luominen

1. Avaa **Harjoitukset**-työkalu <img src="/.gitbook/assets/icons/mdi-order-bool-ascending-variant.svg" alt="Harjoitukset" data-size="line"> kurssin etusivulta
2. Napsauta **Uusi harjoitus**
3. Anna **otsikko** ja valinnainen **kuvaus**
4. Määritä harjoituksen asetukset (ks. alla)
5. Tallenna ja lisää sitten kysymyksiä

## Harjoituksen asetukset

![Harjoituksen asetuspaneeli, jossa on vaihtoehtoja näytölle, ajalle, yrityksille ja palautteelle](/.gitbook/assets/exercise-settings.png)

### Näyttö ja navigointi

| Asetus | Vaihtoehdot | Kuvaus |
|---------|---------|-------------|
| **Kysymysten asettelu** | Kaikki yhdellä sivulla / Yksi per sivu | Näytä kaikki kysymykset kerralla tai yksi kerrallaan |
| **Piilota kysymysten otsikot** | Kyllä / Ei | Näytetäänkö kysymysten otsikot oppijoille |
| **Näytä Edellinen-painike** | Kyllä / Ei | Salli oppijoiden palata edellisiin kysymyksiin |
| **Estä taaksepäin navigointi** | Kyllä / Ei | Pakota oppijat vastaamaan järjestyksessä ilman paluuta |

### Aika ja saatavuus

| Asetus | Kuvaus |
|---------|-------------|
| **Aikaraja** | Enimmäisaika (minuutteina) harjoituksen suorittamiseen. Oppijalle näytetään lähtölaskenta |
| **Alkamispäivä** | Milloin harjoitus tulee oppijoiden saataville |
| **Päättymispäivä** | Milloin harjoitus lakkaa olemasta saatavilla |

### Yritykset ja pisteytys

| Asetus | Kuvaus |
|---------|-------------|
| **Enimmäisyritykset** | Kuinka monta kertaa oppija voi suorittaa harjoituksen (0 = rajaton) |
| **Hyväksymisprosentti** | Vähimmäispistemäärä hyväksymiseen (esim. 70 %). Oppijat, jotka eivät saavuta tätä kynnystä, näkevät hylkäysviestin |
| **Levitä negatiivinen pisteytys** | Vähentävätkö yksittäisten kysymysten negatiiviset pisteet kokonaispistemäärää nollan alapuolelle |

### Palaute

| Asetus | Vaihtoehdot |
|---------|---------|
| **Lopussa** | Näytä tulokset ja oikeat vastaukset sen jälkeen, kun oppija on lähettänyt vastaukset |
| **Välitön** | Näytä palaute kunkin kysymyksen jälkeen (hyödyllinen oppimisharjoituksissa) |
| **Tenttitila** | Älä näytä palautetta tai tuloksia |

### Tulosten näyttö

Hallitse, mitä oppijat näkevät harjoituksen suorittamisen jälkeen:

* Näytä pistemäärä ja odotetut vastaukset
* Näytä vain pistemäärä
* Näytä pistemäärä luokkakohtaisella erittelyllä
* Näytä sijoitus muihin oppijoihin nähden
* Näytä vain viimeisellä yrityksellä
* Näytä tutkakaavion visualisointi

### Suoritusviestit

* **Onnistumisviesti** — Mukautettu teksti, joka näytetään, kun oppija läpäisee
* **Epäonnistumisviesti** — Mukautettu teksti, joka näytetään, kun oppija ei saavuta hyväksymisprosenttia

### Kysymysten satunnaistaminen

| Asetus | Kuvaus |
|---------|-------------|
| **Satunnainen kysymysjärjestys** | Sekoita kysymysten järjestys jokaista yritystä varten |
| **Satunnaiset vastaukset** | Sekoita vastausvaihtoehdot kunkin kysymyksen sisällä |
| **Satunnainen luokittain** | Valitse satunnaisia kysymyksiä kustakin kysymysluokasta |

Voit myös määrittää edistyneitä valintastrategioita, jotka yhdistävät luokat ja satunnaistamisen.

## Kysymystyypit

![Yleiskatsaus saatavilla olevista kysymystyypeistä harjoituksen luontikäyttöliittymässä](/.gitbook/assets/exercise-question-types.png)

Chamilo tarjoaa runsaan joukon kysymystyyppejä, jotka on jaettu useisiin luokkiin:

### Yksittäinen valinta

* **Monivalinta (yksi vastaus)** — Oppija valitsee yhden oikean vastauksen vaihtoehtoluettelosta
* **Yksi vastaus kuvilla** — Sama kuin yllä, mutta vastausvaihtoehdot näytetään kuvina

### Monivalinta

* **Useita vastauksia** — Oppija valitsee yhden tai useamman oikean vastauksen
* **Useita vastauksia (pudotusvalikko)** — Vastausvaihtoehdot esitetään pudotusvalikkoina
* **Tosi/epätosi** — Sarja väittämiä, jotka oppija merkitsee tosiksi tai epätosiksi
* **Tosi/epätosi varmuusasteella** — Tosi/epätosi lisävarmuustasolla, mikä mahdollistaa hienojakoisemman pisteytyksen

### Aukkotehtävät

* **Täytä aukot** — Oppija täydentää tekstistä puuttuvat sanat. Määrität aukot ja hyväksytyt vastaukset kysymystä luodessasi.

### Yhdistäminen

* **Yhdistäminen** — Oppija yhdistää kohteita kahdesta sarakkeesta
* **Yhdistäminen (vedettävä)** — Sama periaate, mutta vedä ja pudota -käyttöliittymällä
* **Vedettävä** — Vedä kohteet oikeisiin paikkoihin

### Avoimet vastaukset

* **Vapaa vastaus (essee)** — Oppija kirjoittaa tekstivastauksen. Vaatii manuaalisen arvioinnin (tai tekoälyavusteisen arvioinnin, jos se on määritetty)
* **Suullinen ilmaisu** — Oppija tallentaa äänivastauksen mikrofonillaan
* **Lataa vastaus** — Oppija lataa tiedoston vastaukseksi

### Hotspot

* **Hotspot** — Oppija napsauttaa kuvan tiettyjä alueita vastatakseen
* **Hotspot-rajaus** — Oppija piirtää rajat kuvan alueiden ympärille

### Laskettu

* **Laskettu vastaus** — Numeerisia kysymyksiä kaavalla ja toleranssialueella. Hyödyllinen matematiikan ja luonnontieteiden kursseilla.

### Erityiset

* **Luetun ymmärtäminen** — Testit, jotka perustuvat tekstikatkelman lukemiseen
* **Annotointi** — Opettaja lataa kuvan ja oppija annotoi sen
* **Vastaus Office-asiakirjassa** — Kun OnlyOffice-lisäosa on käytössä, oppija vastaa kysymykseen muokkaamalla upotettua Office-asiakirjaa (Word, Excel, PowerPoint). Vastaus tallennetaan erillisenä tiedostona harjoituksen alle, jotta se voidaan tarkistaa yhdessä muun yrityksen kanssa.

## Kysymysten lisääminen harjoitukseen

1. Avaa harjoitus ja napsauta **Lisää kysymys**
2. Valitse kysymystyyppi
3. Kirjoita **kysymysteksti** (tukee rikasta tekstiä kuvineen ja muotoiluineen)
4. Määritä **vastaukset** ja niiden pisteytys:
   * Kullekin vastausvaihtoehdolle määritä, onko se oikein ja kuinka monta pistettä se on arvoinen
   * Voit antaa vääristä vastauksista negatiivisia pisteitä arvailun vähentämiseksi
5. Lisää valinnaisesti **palaute** — selitykset, jotka näytetään oppijalle vastaamisen jälkeen
6. Aseta **vaikeustaso** ja **kategoria** (hyödyllisiä satunnaisvalinnassa ja raporteissa)
7. Tallenna

## Kysymyskategoriat

Voit järjestää kysymykset kategorioihin (esim. "Moduuli 1", "Sanasto", "Edistynyt"). Kategoriat ovat hyödyllisiä:

* Suurten kysymyspankkien järjestämiseen
* Satunnaisvalinnan mahdollistamiseen kategorian mukaan (esim. "5 kysymystä moduulista 1, 3 moduulista 2")
* Pisteiden tarkastelemiseen kategorioittain raporteissa

## Kysymysten uudelleenkäyttö

Kysymyksiä voidaan käyttää uudelleen saman kurssin harjoituksissa. Kysymystä lisättäessä voit luoda uuden tai valita olemassa olevan kysymyksen kysymyspankista.

## Harjoitusten tuonti

Chamilo tukee harjoitusten tuontia ulkoisista muodoista:

* **IMS QTI / Common Cartridge** — Vakio e-oppimisen tenttimuoto
* **Moodle-muoto** — Tuo tenttejä Moodle-vienneistä

Tuodaksesi etsi **Tuo**-vaihtoehto harjoitustyökalusta ja lataa tiedostosi.

## Vinkkejä

* **Sekoita kysymystyyppejä** — Yhdistä monivalinta, aukkotehtävät ja avoimet kysymykset kattavaa arviointia varten
* **Käytä kategorioita** — Järjestä kysymykset aiheen mukaan kohdennetun satunnaisvalinnan mahdollistamiseksi
* **Aseta läpäisyprosentti** — Anna oppijoille selkeä tavoite ja yhdistä se todistusten luontiin Gradebookin kautta
* **Käytä välitöntä palautetta harjoittelussa** — Luo arvioimattomia harjoitusharjoituksia välittömällä palautteella, jotta oppijat oppivat virheistään
* **Satunnaista rehellisyyden vuoksi** — Ota käyttöön satunnainen kysymysjärjestys ja satunnaiset vastaukset kopioinnin todennäköisyyden vähentämiseksi