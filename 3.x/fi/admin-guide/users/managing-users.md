# Käyttäjien hallinta

Tällä sivulla käsitellään käyttäjätilien luomisen, muokkaamisen ja hallinnan päivittäisiä tehtäviä.

## Käyttäjäluettelo

![Käyttäjäluettelo, jossa näkyvät tilit sekä sarakkeet nimi, sähköposti, rooli ja tila](/.gitbook/assets/admin-user-list.png)

Napsauta hallintapaneelissa **Käyttäjäluettelo** nähdäksesi kaikki alustan käyttäjät. Luettelossa näkyvät:

* Avatar
* Nimi
* Käyttäjätunnus
* Sähköpostiosoite
* Roolit
* Aktiivinen/passiivinen tila
* Rekisteröitymispäivä
* Viimeisin kirjautumispäivä

Käytä **Tarkennettu haku** -työkalua löytääksesi tiettyjä käyttäjiä nimen, sähköpostin, roolin tai muiden kriteerien perusteella.

## Käyttäjän luominen

![Käyttäjän luomislomake kentillä nimi, sähköposti, käyttäjätunnus, salasana, rooli ja kieli](/.gitbook/assets/admin-user-create-form.png)

1. Napsauta hallintapaneelissa **Lisää käyttäjä**
2. Täytä pakolliset kentät:
   * **Etunimi** ja **Sukunimi**
   * **Sähköposti** — On oltava yksilöllinen alustalla
   * **Käyttäjätunnus** — Kirjautumisnimi (on oltava yksilöllinen)
   * **Salasana** — Aseta alkusalasana
   * **Roolit** — Valitse käyttäjän alustarooli(t) (opiskelija, opettaja, ylläpitäjä jne.)
   * **Kieli** — Käyttäjän ensisijainen käyttöliittymäkieli
3. Täytä tarvittaessa lisäkentät:
   * Virallinen koodi (esim. organisaation yksilöllinen tunniste)
   * Puhelinnumero
   * Vanhenemispäivä — Poistaa tilin automaattisesti käytöstä tietyn päivän jälkeen
   * Aktiivinen/passiivinen tila
   * Lisäprofiilikentät (jos määritetty)
4. Tallenna

## Käyttäjien tuonti

![Käyttäjien tuontikäyttöliittymä CSV- tai XML-tiedostojen lataamiseen käyttäjätiedoilla](/.gitbook/assets/admin-user-import.png)

Useiden käyttäjien luomiseen voit tuoda käyttäjiä tiedostosta:

1. Napsauta hallintapaneelissa **Tuo käyttäjiä**
2. Lataa **CSV**- tai **XML**-tiedosto, jossa on käyttäjätiedot
3. Yhdistä tiedoston sarakkeet Chamilo-käyttäjäkenttiin
4. Valitse, miten olemassa olevia käyttäjiä käsitellään (päivitä tai ohita)
5. Tuo

Tuontitiedostossa tulee olla sarakkeet vähintään seuraaville: etunimi, sukunimi, sähköposti, käyttäjätunnus ja salasana.

Huomautus: **Status**-sarake on **Rooli**-kentän vanha nimi, ja se hyväksyy vain muutamia arvoja, kuten 1 opettajalle ja 5 opiskelijalle. Roolien tarkempi säätö voidaan tehdä myöhemmin vain käsin käyttäjää muokkaamalla.

## Käyttäjien vienti

Napsauta **Vie käyttäjiä** ladataksesi käyttäjäluettelon CSV- tai XML-tiedostona. Voit suodattaa vietävät käyttäjät roolin, rekisteröitymispäivän tai muiden kriteerien mukaan.

## Käyttäjän muokkaaminen

Napsauta käyttäjän nimeä käyttäjäluettelossa muokataksesi tiliä. Voit muuttaa:

* Henkilötietoja (nimi, sähköposti, puhelin)
* Rooleja
* Salasanaa (nollaus)
* Aktiivinen/passiivinen tilaa
* Vanhenemispäivää
* Lisäprofiilikenttiä

## Käyttäjän poistaminen

Kun poistetaan käyttäjiä (yleensä opettajia), jotka ovat luoneet sisältöä alustalle, järjestelmä saattaa estää käyttäjien pysyvän poistamisen ja näyttää varoitusviestin, jossa kerrotaan, että käyttäjä on yhä liitetty joihinkin resursseihin. Jos vahvistat poiston, järjestelmä ei poista itse sisältöä vaan liittää sen neutraaliin käyttäjään (kutsumme sitä "varakäyttäjäksi", Fallback user) tietojen eheyden vuoksi.

Tämän välttämiseksi tarkista käyttäjän tiedot, poista kunkin kurssin yksi kerrallaan ja poista sitten käyttäjä.

## Käyttäjätoiminnot

| Toiminto | Kuvaus |
|--------|-------------|
| **Poista käytöstä** | Poistaa käyttäjän tilin käytöstä poistamatta sitä. Käyttäjä ei voi kirjautua, mutta tiedot säilyvät. |
| **Ota käyttöön** | Ottaa aiemmin käytöstä poistetun tilin uudelleen käyttöön. |
| **Kirjaudu käyttäjänä** | Kirjautuu alustalle kyseisenä käyttäjänä (impersonointi). Hyödyllinen vianmäärityksessä. |
| **Anonymisoi** | Poistaa kaikki tilin henkilötiedot EU:n GDPR:n mukaisesti. |
| **Poista** | Pehmeä poisto käyttäjätilistä. Käytä **Poistetut käyttäjät** -välilehteä tilin ja siihen liittyvien tietojen pysyvään poistamiseen. |

> **Kirjaudu käyttäjänä** on tehokas ominaisuus. Käytä sitä vastuullisesti ja vain perusteltuihin tukitarkoituksiin.

## Erätoiminnot

Valitse käyttäjäluettelosta useita käyttäjiä suorittaaksesi erätoimintoja:

* Ota käyttöön tai poista käytöstä useita käyttäjiä kerralla
* Poista useita käyttäjiä
* Liitä käyttäjiä kurssiin tai sessioon

## Vinkkejä

* **Käytä CSV-tuontia suuriin ilmoittautumisiin** — Kun otat käyttöön monia käyttäjiä koulutusohjelman alussa, valmistele CSV-tiedosto ja tuo joukkona
* **Aseta vanhenemispäiviä** — Väliaikaisille käyttäjille (työpajan osallistujat, kokeilukäyttäjät) aseta vanhenemispäivä, jotta tilit poistetaan automaattisesti käytöstä
* **Poista käytöstä mieluummin kuin poista** — Kun käyttäjä lähtee, poista tili ensin käytöstä. Näin koulutustiedot säilyvät. Poista vasta, kun olet varma, ettei tietoja enää tarvita.