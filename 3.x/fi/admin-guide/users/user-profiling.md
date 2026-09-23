# Käyttäjäprofiilit

Chamilo mahdollistaa mukautettujen profiilikenttien (lisäkenttien) määrittämisen, jotta käyttäjistä voidaan kerätä lisätietoja vakionimen, sähköpostin ja roolin lisäksi.

## Lisäprofiilikentät

![Lisäprofiilikenttien luettelo, jossa näkyvät mukautetut kentät nimen, tyypin ja näkyvyysasetusten kanssa](../../.gitbook/assets/admin-extra-fields-list.png)

Lisäkenttien avulla voit tallentaa organisaatiollesi ominaista metadataa, kuten:

* Työntekijätunnus
* Osasto
* Tehtävänimike
* Sijainti/toimisto
* Puhelinnumero
* Mukautetut tunnisteet

## Lisäkenttien luominen

1. Siirry hallintapaneelista kohtaan **Extra fields** tai **Profile fields**
2. Napsauta **Add**
3. Määritä kenttä:
   * **Name** — Käyttäjille näytettävä kentän otsikko
   * **Description** — Valinnainen kuvaus
   * **Helper text** — Näytetään kentän alla kaikissa lomakkeissa, joissa kenttä on mukana
   * **Field type** — Teksti, avattava valikko, päivämäärä, valintaruutu jne.
   * **Field label** — Kentän sisäinen nimi, laajennusten integrointia varten 
   * **Possible values** — Jos kenttä on valitsin näiden arvojen välillä 
   * **Default value** — Valinnainen oletusarvo
   * **Visible to self** — Näkyykö kenttä käyttäjän omassa profiilissa käyttäjälle itselleen
   * **Visible to others** — Näkyykö kenttä alustan muille käyttäjille
   * **Can change** — Voiko käyttäjä muuttaa omaa kenttäänsä itse (vai voivatko vain ylläpitäjät)
   * **Filter** — Jos kyseessä on valitsintyyppinen kenttä, sisällytetäänkö se suodattimeksi hallintasivuille (esim. käyttäjien liittämiseen kursseille tai sessioihin)
   * **Order** — Jos haluat hallita kenttien näyttöjärjestystä, kullekin kentälle on annettava numeerinen järjestys
   * **Remove on anonymization** — Tärkeää tietosuojasääntöjen ja -lakien kannalta: jos käyttäjä anonymisoidaan mutta ei poisteta, tuleeko tätä kenttää pitää mahdollisena henkilötietojen säilyttäjänä? 
4. Tallenna

## Kenttätyypit

Lisäkenttämoottori tukee laajaa joukkoa syöttötyyppejä. Yleisiä ovat:

| Type | Description |
|------|-------------|
| **Text** | Yhden rivin tekstikenttä |
| **Textarea** | Monirivinen tekstikenttä |
| **Radio** | Yhden valinnan valintanappiryhmä |
| **Dropdown / Dropdown multiple** | Ennalta määritettyjen vaihtoehtojen luettelo (yksi- tai monivalinta) |
| **Double select** | Kaksi toisistaan riippuvaa avattavaa valikkoa (esim. maa → kaupunki) |
| **Checkbox** | Kyllä/ei-valitsin |
| **Date / Date and time** | Päivämäärä- tai päivämäärä+aika-valitsin |
| **Integer** | Numeerinen syöttö |
| **Tag** | Useita vapaamuotoisia tunnistearvoja |
| **File** | Tiedoston latauskenttä |
| **Video URL** | Videoon osoittava URL |
| **Mobile phone number** | Muotoiltu puhelinnumerokenttä |
| **Timezone** | Aikavyöhykevalitsin |
| **Social profile** | Linkki sosiaalisen verkoston profiiliin |
| **Divider** | Visuaalinen erotin lomakkeessa (ei arvoa) |

Käytettävien tyyppien tarkka joukko riippuu Chamilo-versiosta; **Extra fields** -hallintasivun kenttätyypin avattava valikko on auktoriteetti.

## Lisäkenttien käyttö

Lisäkentät näkyvät:

* Käyttäjän luonti- (jos visible to self) ja muokkauslomakkeissa
* Käyttäjäprofiilisivuilla (jos visible to self)
* Käyttäjätuonneissa (lisäkenttien arvot voi sisällyttää CSV-tuonteihin)
* Vienneissä ja raporteissa (suodatus tai ryhmittely lisäkentän arvojen mukaan)

## Vinkkejä

* **Suunnittele ennen luomista** — Määritä tarvitsemasi tiedot ennen kenttien luomista, sillä kenttätyyppien muuttaminen tietojen syöttämisen jälkeen voi olla ongelmallista
* **Käytä avattavia valikkoja johdonmukaisuuden vuoksi** — Kun kentällä on tunnettu joukko mahdollisia arvoja, käytä avattavaa valikkoa vapaan tekstin sijaan tietojen johdonmukaisuuden varmistamiseksi
* **Käytä raportointiin** — Lisäkentät ovat hyödyllisiä raporttien suodattamiseen (esim. "näytä kaikki osaston X käyttäjät, jotka ovat suorittaneet koulutuksen Y")