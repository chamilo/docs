# AI Toolbox

**AI Toolbox** on kurssityökalu, joka luo vuorovaikutteisia opetussovelluksia opettajan ohjeiden perusteella. Chamilo paketoi kunkin luodun sovelluksen muodossa **SCORM 1.2**, jotta alusta voi seurata oppijan edistymistä, pisteitä ja jatkamistietoja.

> Ylläpitäjän on otettava käyttöön sekä `ai_helpers.enable_ai_helpers` että `ai_helpers.toolbox` kohdassa **Hallinta > Määritysasetukset > Tekoälyavustajat**, ja vähintään yksi tekstipohjainen tekoälypalvelu on määritettävä.

## Vuorovaikutteisen sovelluksen luominen

1. Avaa **AI Toolbox** kurssissa.
2. Napsauta **Luo**.
3. Anna **Otsikko** ja halutessasi **Kuvaus**.
4. Kohdassa **Mitä sovelluksen tulisi tehdä?** kuvaile haluamasi toiminta kokonaisuudessaan. Sisällytä oppimistavoite, säännöt, tasot, pisteytys ja se, mitä tapahtuu, kun oppija suorittaa toiminnan loppuun.
5. Valitse **Tekoälypalvelu**, jos käytettävissä on useampi kuin yksi.
6. Napsauta **Generoi**.

Ensimmäinen luonti tallennetaan **versiona 1**. Se alkaa luonnoksena, joten voit esikatsella sitä ennen kuin teet sen näkyväksi oppijoille.

## Parantaminen ja versiointi

Avaa sovelluksen **Asetukset** hallitaksesi sitä. Voit:

* esikatsella tai ladata nykyisen sovelluksen;
* käyttää toimintoa **Paranna tekoälyllä** kuvaillaksesi muutoksen ja luodaksesi uuden version;
* tarkastella **Versiohistoriaa**;
* esikatsella, ladata tai palauttaa aiemman version;
* julkaista tai piilottaa sovelluksen;
* avata **Raportoinnin** tarkastellaksesi oppijoiden seurantaa.

Parannuksen luominen ei poista aiempia versioita. Aiemman version palauttaminen tekee kyseisestä versiosta jälleen nykyisen.

## Sovelluksen lisääminen oppimispolkuun

[Oppimispolkujen rakennustyökalussa](../adding-content/learning-paths.md) opettajat voivat valita luodun AI Toolbox -sovelluksen resurssiksi. Sovelluksella on oltava luotu versio, mutta sitä ei tarvitse julkaista ennen kuin opettaja lisää sen oppimispolkuun. Julkaisematon sovellus ei silti ole oppijoiden käytettävissä, ennen kuin se julkaistaan.

Kun valtuutettu opettaja avaa Toolbox-sisällön **Esikatselutilassa**, Chamilo näyttää tekstin **”Edistymistä ja pisteitä ei tallenneta esikatselutilassa.”** Toiminnan testaaminen tällä tavalla ei luo oppijaseurantaa eikä päivitä pisteitä. Käytä tavallista oppijakokemusta varmistaaksesi SCORM-edistymisen ja pisteet julkaisun jälkeen.

## Luonnin validointi ja vianmääritys

Tekoälyluonnin jälkeen Chamilo tarkistaa luodun sovelluksen lähdekoodin ennen version asettamista saataville. Tämä sisältää JavaScript-syntaksin tai rakenteen tarkistukset sekä rajoitukset vaarallisille selain-API:ille. Jos validointi epäonnistuu, Chamilo pyytää tekoälypalvelua **korjaamaan tuloksen kerran**; jos korjattu versio epäonnistuu yhä, luonti päättyy virheeseen. Onnistunut validointi ei korvaa toiminnan oppimissääntöjen, saavutettavuuden ja SCORM-pisteytyksen testaamista ennen julkaisua.

Jos luonti ilmoittaa **HTTP 504**, verkkopalvelin tai yhdyskäytävä lakkasi odottamasta pyyntöä. Tämä eroaa tekoälyn tekstipalvelun asettamasta aikakatkaisusta. Virhe voi sisältää likimääräisen kuluneen ajan; kokeile yksinkertaisempaa toimintapyyntöä ja pyydä ylläpitäjää tarkistamaan yhdyskäytävän, PHP-/verkkopalvelimen ja palveluntarjoajan aikakatkaisut. Palveluntarjoajan aikakatkaisu tai nopeusrajoitusvirhe edellyttää sen sijaan määritetyn mallin ja palveluntarjoajan asetusten tarkistamista. Älä oleta, että sovellus tallennettiin onnistuneesti virheen jälkeen.

Nämä validointi- ja diagnostiikkaparannukset esiteltiin kohteessa [PR #9198](https://github.com/chamilo/chamilo-lms/pull/9198).

## Oppijakokemus

Oppijat näkevät vain julkaistut sovellukset. Toolboxista he voivat avata sovelluksen, jatkaa viimeisimmästä SCORM-tilasta ja nähdä **Edistymisensä** ja **Pisteensä**. Kun uusi yritys on sallittu, **Yritä uudelleen** aloittaa uuden yrityksen.

Toolbox-sovellukset toimivat oppimispolun ajonaikaisessa ympäristössä rajoitetussa iframe-kehyksessä ja raportoivat SCORM-tilansa takaisin Chamiloon. Niitä hallitaan Toolboxista eikä tavallisesta oppimispolkujen luettelosta.

Valtuutetut MCP-asiakkaat voivat myös luoda tai päivittää Toolbox-sovelluksia, kun samat AI Toolbox -asetukset ovat käytössä.