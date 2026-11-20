# Kurssien hallinta

Ylläpitäjänä voit hallita kaikkia alustan kursseja riippumatta siitä, kuka ne on luonut.

## Kurssiluettelo

![Kurssiluettelo, jossa näkyvät kaikki kurssit otsikon, koodin, kategorian, ilmoittautuneiden käyttäjien ja näkyvyystilan kanssa](/.gitbook/assets/admin-course-list.png)

Napsauta hallintapaneelissa **Kurssiluettelo** nähdäksesi kaikki kurssit. Luettelossa näkyvät:

* Kurssin otsikko ja koodi
* Kieli
* Kategoriat
* Näkyvyystila

Käytä **Tarkennettu haku** -työkalua tiettyjen kurssien löytämiseen.

## Kurssin luominen

Ylläpitäjänä voit luoda kursseja ja määrittää ne mille tahansa opettajalle:

1. Napsauta **Lisää kurssi** hallintapaneelista
2. Täytä kurssin tiedot (otsikko, koodi, kategoria, kieli)
3. Määritä opettaja kurssille
4. Tallenna

Huomautus: Chamilo 1.11.x:ssä kurssikoodi näkyi osana kurssin URL-osoitetta, eikä sitä voinut muuttaa kurssin luomisen jälkeen. Tämä toiminta muuttui versiosta 2.x alkaen. Kurssikoodi ei enää näy URL-osoitteessa, ja tulevissa versioissa opettajat saattavat voida muuttaa kurssikoodia jälkikäteen, koska se on alustalle vähemmän keskeinen.

## Olemassa olevan kurssin hallinta

Etsi kurssi luettelosta päästäksesi hallintavaihtoehtoihin *Toiminnot*-sarakkeessa:

* **Tiedot** — Näytä kurssin tiedot 
* **Kurssin etusivu** — Siirtää suoraan kurssin etusivulle 
* **Raportointi** — Näytä sitoutumis- ja suorituskykytiedot
* **Muokkaa** — Muuta kurssin otsikkoa, kategoriaa, näkyvyyttä ja muita asetuksia
* **Luo varmuuskopio** — Siirry kurssin ylläpito-osioon, jossa voit luoda kopioita ja tehdä muita toimia
* **Lisää katalogiin** — Lisää tämä kurssi kurssikatalogiin
* **Poista** — Poista kurssi ja kaikki sen sisältö pysyvästi

> Kurssin poistaminen poistaa pysyvästi kaiken sisällön, oppijoiden tiedot, arvosanat ja seurantatiedot. Harkitse kurssin viemistä ensin varmuuskopiona.

## Joukkotoiminnot

Valitse luettelosta useita kursseja suorittaaksesi erätoimintoja, kuten niiden poistamisen. Kurssin viemiseksi siirry kurssille ja käytä **Ylläpito**-työkalua — hallinnan kurssiluettelossa ei ole joukkovientitoimintoa.

## Kurssin näkyvyysasetukset

Ylläpitäjät voivat ohittaa opettajien asettaman näkyvyyden:

| Näkyvyys | Vaikutus |
|-----------|--------|
| **Julkinen** | Kaikkien saatavilla, myös anonyymeille vierailijoille |
| **Avoin** | Kaikkien kirjautuneiden käyttäjien saatavilla |
| **Yksityinen** | Vain ilmoittautuneet käyttäjät voivat käyttää kurssia |
| **Suljettu** | Kukaan ei voi käyttää kurssia (paitsi opettaja ja ylläpitäjät) |
| **Piilotettu** | Kukaan ei voi nähdä tai käyttää kurssia (paitsi ylläpitäjät) |