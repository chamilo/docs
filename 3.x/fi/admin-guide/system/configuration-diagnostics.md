# Turvallinen määritysten diagnostiikkavienti

Chamilo 3.1 tarjoaa ladattavan JSON-raportin määritysongelmien diagnosointiin ilman, että luottamuksellisia asetusarvoja viedään tarkoituksella. Raportti rajoittuu **nykyiseen käyttö-URL-osoitteeseen** ja edellyttää järjestelmänvalvojan roolia.

## Lataa raportti

1. Avaa **Hallinta > Asetukset** portaalissa, jota haluat tarkastella.
2. Valitse **Lataa määritykset virheenkorjausta varten**.
3. Tallenna luotu `chamilo-configuration-dump.json`-tiedosto turvallisesti.
4. **Tarkista koko tiedosto ennen sen lähettämistä kenellekään**, vaikka se näyttäisi puhdistetulta.

Raportti sisältää viennin aikaleiman, käyttö-URL-osoitteen laajuuden, puhdistetut alustan asetukset sekä lisäosien asennus- ja aktiivisuustilan ja puhdistetun lisäosamäärityksen. Kyseessä on vain luku -vienti; sen lataaminen ei muuta järjestelmän asetuksia.

## Luottamuksellisuus ja käyttö-URL-osoitteen rajat

Arkaluonteiset arvot peitetään puhdistuskerroksessa. Lisäosien asetuksia käsitellään oletuksena luottamuksellisina, ellei niitä ole erikseen luokiteltu turvallista vientiä varten. Silti asetusten nimet, lisäosien nimet ja muu diagnostiikkametadata voivat paljastaa toteutuksen yksityiskohtia, joten jaa tiedosto vain luotetulle tukihenkilöstölle.

Usean URL-osoitteen asennuksissa taustajärjestelmä tarkistaa, että ratkaistu käyttö-URL vastaa pyynnön isäntää sen sijaan, että se veisi hiljaa toisen portaalin määritykset. Vahvista portaalin osoite ennen lataamista.

## Vianmääritys

Jos vienti ei ole käytettävissä, varmista, että tilillä on järjestelmänvalvojan oikeudet ja että pyydetty portaali ratkeaa omaan käyttö-URL-osoitteeseensa. Tarkista verkkopalvelimen ja sovelluksen lokit kopioimatta tunnuksia tai henkilötietoja tukipyyntöihin.

Katso [Järjestelmätyökalut](system-tools.md) ja [Tietoturva-asetukset](../platform-settings/security-settings.md). Toteutus: [PR #9476](https://github.com/chamilo/chamilo-lms/pull/9476).