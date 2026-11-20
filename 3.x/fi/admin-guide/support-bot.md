# Tukibotti (päätöspuuavustaja)

**Tukibotti** on määriteltävä apuavustaja, joka rakentuu kiinteästä päätöspuusta. Se toteutettiin muutoksessa [PR #9224](https://github.com/chamilo/chamilo-lms/pull/9224) pyyntöä [issue #8754](https://github.com/chamilo/chamilo-lms/issues/8754) varten. Se **ei ole generatiiviseen tekoälyyn perustuva chatbot**: ylläpitäjät kirjoittavat kysymykset ja valittavat vastaukset, jotka ohjaavat käyttäjät selitykseen, sivulle tai tukipyyntöön.

## Ota käyttöön

1. Kohdassa **Hallinta > Määritysasetukset > Tukipyynnöt** ota käyttöön `ticket.ticket_support_bot_enabled` (oletuksena pois käytöstä).
2. Avaa **Hallinta > Tukibotti** ja luo **luonnos**-päätöspuu. Anna otsikko ja vähintään yksi aloitussolmu, jossa on vaihtoehtoja.
3. Määritä kunkin solmun kysymys tai tieto ja linkitä vaihtoehdot seuraavaan toimintoon.
4. Julkaise kelvollinen puu. Käyttäjien saatavilla on vain julkaistu puu, jossa on kelvollinen aloitussolmu ja valittavia vaihtoehtoja.

Moottori valitsee julkaistun puun nykyisen käyttöosoitteen mukaan; sen saatavuus on siis portaalikohtainen. Ylläpitäjällä on oltava `ROLE_ADMIN`-rooli puiden hallintaan.

## Suunnittele tukiprosessi

Kukin vaihtoehto voi suorittaa yhden neljästä toiminnosta:

| Toiminto | Tulos |
| --- | --- |
| **Siirry toiseen solmuun** | Jatka keskustelua saman puun toisessa kysymyksessä |
| **Avaa linkki** | Linkitä Chamilo-sivulle saman sivuston suhteellisella polulla, esimerkiksi `/tickets` |
| **Lopeta keskustelu** | Merkitse asia ratkaistuksi ja näytä halutessasi lopetusviesti |
| **Luo tukipyyntö** | Eskaloi keskustelu Tukipyynnöt-järjestelmään |

Tukipyynnön eskalointia varten valitse **Oletustukipyyntöprojekti** ja kyseiseen projektiin kuuluva luokka. Kurssia edellyttäviä luokkia ei voi käyttää tähän tukibotin eskalointiin. Luotu tukipyyntö sisältää käyttäjän päätöspuun keskustelulokin, jotta tukihenkilöstö näkee eskalointiin johtaneet valinnat.

Editori tarkistaa puun rakenteen ennen julkaisua. **Julkaistu**- ja **Arkistoitu**-versiot ovat vain luku -tilassa; luo uusi muokattava luonnos toiminnolla **Monista**. Korvaavan version julkaiseminen arkistoi aiemmin julkaistun version samassa laajuudessa. Luettelosta ylläpitäjät voivat myös tuoda tai viedä puun ja tarkastella sen keskusteluhistoriaa. Julkaistu puu on arkistoitava ennen poistamista, eikä puuta, jolla on keskusteluhistoriaa, voi poistaa.

## Esimerkkien tuonti ja keskustelujen tarkastelu

Avaa **Hallinta > Tukibotti** ja valitse **Tuo**. Tuontivalintaikkuna tarjoaa toiminnot **Lataa JSON-esimerkki** ja **Lataa CSV-esimerkki**. Lataa esimerkki, korvaa sen kysymykset ja vaihtoehdot omillasi, valitse sitten muokattu `.json`- tai `.csv`-tiedosto ja tuo se. Jokainen tuotu puu alkaa **uutena luonnoksena**; tarkista se ja julkaise se erikseen, kun se on valmis.

Esimerkit eivät edellytä olemassa olevaa tukipyyntöprojektia. Jos työnkulkusi tulee luoda tukipyyntöjä, määritä tarvittava projekti ja kelvollinen luokka tuonnin jälkeen.

Puuluettelossa voit tarkastella tietyn puun keskustelulokeja toiminnolla **Näytä keskustelut**, myös puiden, joiden keskustelumäärä on nolla. Keskusteluhistoriat pysyvät kyseisen käyttäjän ja portaalin laajuudessa. Katso [PR #9419](https://github.com/chamilo/chamilo-lms/pull/9419).

## Miten käyttäjät käyttävät sitä

Kun asetus on käytössä ja portaalilla on kelvollinen julkaistu puu, kirjautuneet käyttäjät näkevät **Tukibotti**-yhteystiedon telakoidussa chatissa. He vastaavat valitsemalla tarjotut vaihtoehdot. Botti voi ratkaista keskustelun, avata saman sivuston sivun tai luoda tukipyynnön ja näyttää linkin siihen. Käyttäjät voivat aloittaa uuden keskustelun aiemman päätyttyä.

Tämä on erillinen **AI Tutor** -toiminnosta, joka vastaa avoimiin oppimiskysymyksiin. Tukibotti noudattaa vain ylläpitäjien määrittämiä reittejä ja vaihtoehtoja.

## Vianmääritys ja tietoturva

* **Bottia ei näy chatissa:** tarkista Tukipyynnöt-asetus, että nykyiselle portaalille on julkaistu puu ja että sen aloitussolmussa on vaihtoehtoja.
* **Julkaisu ei onnistu:** tarkista luonnoksesta puuttuvat solmut, ratkaisemattomat kohdesolmut ja virheelliset toiminnot.
* **Tukipyyntöä ei voi luoda:** tarkista valittu tukipyyntöprojekti ja luokka. Älä käytä kurssia edellyttävää tukipyyntöluokkaa.
* **Vanhemmat keskustelut puuttuvat:** ylläpitäjät voivat tarkastella keskusteluhistoriaa vastaavasta puusta; keskustelut on sidottu käyttäjään ja käyttöosoitteeseen.

Aiheeseen liittyvästä asetuksesta katso [Tukipyyntöjen asetukset](platform-settings/ticket-settings.md).