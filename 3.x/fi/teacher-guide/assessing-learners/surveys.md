# Kyselyt

Kyselytyökalulla voit luoda kyselylomakkeita oppijoiden palautteen keräämiseen. Kyselyt sopivat kurssiarviointeihin, tarvekartoituksiin ja mielipidekyselyihin.

## Kyselyn luominen

1. Avaa **Kyselyt**-työkalu <img src="/.gitbook/assets/icons/mdi-form-dropdown.svg" alt="Kyselyt" data-size="line"> kurssin etusivulta
2. Napsauta **Luo kysely**
3. Täytä kyselyn tiedot:
   * **Koodi** — Tämä on kyselyn yksilöllinen koodi. Sitä käytetään sähköposteissa ja linkeissä.
   * **Otsikko** — Kyselyn nimi
   * **Alaotsikko** — Valinnainen toissijainen otsikko
   * **Alkamispäivä** — Mistä lähtien kysely on avoinna osallistumiselle
   * **Päättymispäivä** — Mihin asti kysely on avoinna osallistumiselle
   * **Anonyymi** — Ovatko vastaukset anonyymejä vai kytkettyjä yksittäisiin oppijoihin
   * **Tulosten näkyvyys** — Kuka näkee tulokset (vain ohjaaja, ohjaaja ja opiskelijat, kaikki)
   * **Johdanto** — Viesti, joka näytetään oppijoille ennen kyselyn aloittamista
   * **Kiitosviesti** — Viesti, joka näytetään lähettämisen jälkeen
4. Tallenna

### Lisäasetukset

* **Arviointi arviointityökalussa** — Sisällytetäänkö tämän kyselyn vastaustila arviointityökaluun (arviointikirjaan). Kyselyn täyttäneet saavat 100 %, muut 0 %
* **Yläkysely** — Ei tällä hetkellä käytössä (vanha ominaisuus)
* **Yksi kysymys sivua kohden** — Kysymysten esitystapa
* **Ota sekoitustila käyttöön** — Sekoitetaanko kysymykset
* **Näytä kysymyksen numero** — Näytetäänkö (automaattisesti luodut) kysymysnumerot

## Kysymysten lisääminen

Kun kysely on luotu, lisää kysymyksiä:

1. Valitse kysymystyyppi:
   * **Kyllä/Ei** — Yksinkertainen kaksivaihtoehtoinen valinta
   * **Monivalinta** — Valitse yksi vastaus useista vaihtoehdoista
   * **Useita vastauksia** — Valitse yksi tai useampi vastaus useista vaihtoehdoista
   * **Avoin** — Vapaa tekstivastaus
   * **Pudotusvalikko** — Valitse pudotusvalikosta
   * **Prosentti** — Valitse prosenttiarvo
   * **Pisteet** — Arvioi numeerisella asteikolla
   * **Kommentti** — Tekstilohko (ei kysymys) ohjeiden lisäämiseen kysymysten väliin
   * **Monivalinta ja vaihtoehto ”muu”** — Valitse yksi vastaus useista vaihtoehdoista, mukana vaihtoehtoinen valinta
   * **Valikoiva näyttö** — Erityistyyppi, jolla voit mukauttaa kysymysten kulkua aiempien vastausten perusteella
   * **Sivunvaihto** — Lisää sivunvaihtoja kysymysvirtaan. Hyödyllinen vain, jos edellisessä vaiheessa **ei** valittu asetusta ”Yksi kysymys sivua kohden”
2. Määritä kysymysteksti ja vastausvaihtoehdot
3. Tallenna

Kukin kysymys voidaan merkitä pakolliseksi. Jos et merkitse, minkä tahansa kysymyksen ohittaminen on hyväksyttävää.

## Kyselyn julkaiseminen

Kun kaikki kysymykset on lisätty:

1. Napsauta **Julkaise**
2. Valitse vastaanottajat — Valitse tietyt oppijat tai ryhmät (valitset ne). **Lisää oppijat** -painike lisää kaikki oppijat yhdellä kertaa ja jättää opettajat pois
3. Lisää muita käyttäjiä — Voit kutsua Chamilon ulkopuolisia käyttäjiä osallistumaan kyselyyn. He saavat sähköpostin, jossa on linkki, ja näkyvät kyselyn tiedoissa sähköpostiosoitteellaan
4. Sähköpostin aihe
5. Sähköpostin teksti — Kerro, mistä kyselyssä on kyse ja milloin/miten siihen vastataan
6. Toistuville kutsuille on saatavilla eri vaihtoehtoja
7. Vahvista

Oppijat saavat kutsun (sähköpostina) kyselyn täyttämiseen.

Julkaisusivun alareunassa on linkki, jolla voi kutsua vielä lisää ulkoisia käyttäjiä osallistumaan. Tätä linkkiä käyttävät osallistujat eivät ole tunnistettavissa ja näkyvät kyselyn tuloksissa anonyymeinä.

## Tulosten tarkastelu

![Kyselyn tulokset kaavioineen ja prosenttijakaumineen kullekin kysymykselle](/.gitbook/assets/survey-results-charts.png)

Kun oppijat ovat vastanneet:

1. Avaa kysely
2. Napsauta **Tulokset** tai **Raportti**
3. Tarkastele vastaustiivistelmiä:
   * Kaaviot ja prosentit suljetuille kysymyksille
   * Yksittäiset tekstivastaukset avoimille kysymyksille
   * Vastausaste (kuinka moni kutsutuista vastasi)

Voit viedä tulokset taulukkolaskentaan jatkokäsittelyä varten.

## Vinkkejä

* **Pidä lyhyenä** — Oppijat täyttävät todennäköisemmin lyhyempiä kyselyitä
* **Käytä anonyymitilaa** — Rehellistä palautetta varten ota anonyymit vastaukset käyttöön
* **Ajoita oikein** — Lähetä kyselyitä kurssin puolivälissä säätöjä varten, älä vain kurssin loppuarviointeina