# Grading Electronic

Grading Electronic <img src="../../.gitbook/assets/icons/mdi-export.svg" alt="Grading Electronic" data-size="line"> vie kurssisi hyväksytysti suorittaneet oppijat arvosanakirjan pisteineen tiedostoon, jonka ulkoinen sertifiointielin tuo järjestelmäänsä: joko kiinteämuotoiseen tekstitiedostoon tai osallistujaluettelon laskentataulukkoon.

## Vientilohkon avaaminen

Kun toiminto on otettu käyttöön, kurssisi **Arvioinnit** (arvosanakirja) -työkalun työkalupalkkiin ilmestyy **Vie**-kuvake. Napsauta sitä, niin **Grading Electronic** -lohko näkyy samalla sivulla; napsauta sitä uudelleen piilottaaksesi lohkon.

Lohkossa on kolme kenttää:

* **Esikatselu** — oletuksena valittuna. Kun se on valittuna, mitään ei tallenneta: lohko näyttää vain, mitä vienti sisältäisi
* **Aikaväli** — kurssin alku- ja loppupäivämäärät. Alkamispäivä sijoitetaan tekstitiedoston otsikkoriville, ja loppupäivä on päivä, jona kukin oppija suoritti kurssin hyväksytysti
* **Kurssitunnus** — kurssin tunniste sertifiointielimessä. Se on esitäytetty edellisessä viennissä käytetyllä arvolla

## Viennin esikatselu

Kun **Esikatselu** on valittuna, lohko tarjoaa yhden **Esikatselu**-painikkeen. Se luettelee kurssin (tai sen istunnon, jossa olet) kaikki oppijat pisteineen ja **PASS**- tai **SKIP**-tilan sekä näyttää tekstitiedoston sisällön. Vain oppijat, jotka täyttävät arvosanakirjan hyväksymiskriteerit, merkitään **PASS**-tilaan; muut jätetään viennin ulkopuolelle.

## Tiedoston luominen

Poista **Esikatselu**-valinta, jolloin **Esikatselu**-painike korvautuu kahdella painikkeella:

* **Luo TXT** — lataa kiinteämuotoisen tekstitiedoston: otsikkorivi, jossa ovat palveluntarjoajan tunnus, kurssitunnus ja alkamispäivä, ja sen jälkeen yksi rivi kutakin hyväksytysti suorittanutta oppijaa kohden
* **Luo XLSX** — lataa osallistujaluettelon laskentataulukon, jossa on yksi rivi kutakin hyväksytysti suorittanutta oppijaa kohden ja sarakkeet **FireTRAQ ID**, **First Name**, **Last Name**, **Score**, **Grade**, **Date Earned** ja **Comment**

Molemmat painikkeet tekevät tiedoston lisäksi saman asian: ne tallentavat **kurssitunnuksen** seuraavaa vientiä varten ja, jos arvosanakirja luo todistuksia, luovat todistuksen kullekin hyväksytysti suorittaneelle oppijalle.

## Laskentataulukon sisältö

* **FireTRAQ ID** — oppijan tunnus sertifiointielimessä; se luetaan hänen `fcdice_or_acadis_student_id`-profiilikentästään
* **Score** — arvosanakirjan pisteet kokonaisprosentteina (0–100) riippumatta arvosanakirjan kokonaispainosta
* **Grade** — aina **Pass**, koska vain hyväksytysti suorittaneet oppijat viedään. Solu tarjoaa silti vaihtoehdot **Pass**, **Fail** ja **Incomplete**, jos tiedostoa tarvitsee muokata
* **Date Earned** — aikavälin loppupäivä
* **Comment** — jätetään tyhjäksi

## Vinkkejä

* **Tarkista oppijatunnukset ensin** — Oppija, jolla ei ole tunnusta profiilissaan, viedään silti, ja **FireTRAQ ID** jää tyhjäksi. Käytä esikatselua heidän löytämiseensä ennen tiedoston luomista
* **Palveluntarjoajan tunnus ja kurssin tuntimäärä** tulevat kurssin lisäkentistä, jotka järjestelmänvalvojasi on määrittänyt lisäosan asennuksen yhteydessä