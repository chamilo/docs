# Verkkopalveluasetukset

Vanhojen SOAP- / REST-verkkopalveluiden määritys (erillään nykyaikaisista API Platform -päätepisteistä).

Näihin asetuksiin pääsee kohdasta **Hallinta > Määritysasetukset > Verkkopalvelut**. Tässä kategoriassa on **7 asetusta**, jotka on lueteltu alla alustan asetusten fixture-tiedostossa (`SettingsCurrentFixtures.php`) toimitetuilla otsikoilla ja kommenteilla.

> Muuttujan nimi koodissa näytetään tasalevyisenä. Käytä sitä, kun skriptaat API:n kautta tai kun sinun on muutettava näitä asetuksia globaalilla tasolla muokkaamalla tiedostoa [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Asetukset

### `allow_download_documents_by_api_key`

**Salli kurssidokumenttien lataus API-avaimella**

Lataa dokumentteja tarkistamalla käyttäjän REST-API-avain

*Oletus: `false`*


### `disable_webservices`

**Poista verkkopalvelut käytöstä**

Jos et käytä verkkopalveluita, ota tämä käyttöön välttääksesi tarpeettoman tietoturvariskin.

*Oletus: `false`*


### `messaging_allow_send_push_notification`

**Salli push-ilmoitukset Chamilo Messaging -mobiilisovellukseen**

Lähetä push-ilmoituksia Googlen Firebase Consolen kautta

*Oletus: `false`*


### `messaging_gdc_api_key`

**Firebase Consolen palvelinavain Cloud Messagingille**

Palvelinavain (vanha token) projektin tunnistetiedoista

### `messaging_gdc_project_number`

**Firebase Consolen lähettäjätunnus Cloud Messagingille**

Sinun on rekisteröitävä projekti osoitteessa <a href='https://console.firebase.google.com/'>Google Firebase Console</a>

### `webservice_enable_adminonly_api`

**Ota käyttöön vain ylläpitäjille tarkoitetut verkkopalvelut**

Osa REST-verkkopalveluista on merkitty vain ylläpitäjille, ja ne ovat oletuksena pois käytöstä. Ota tämä ominaisuus käyttöön antaaksesi pääsyn näihin verkkopalveluihin (ilmeisesti käyttäjille, joilla on ylläpitäjän tunnukset).

*Oletus: `false`*

### `webservice_return_user_field`

**Verkkopalveluiden palauttama käyttäjäkenttä**

Pyydä REST-verkkopalveluita (v2.php) palauttamaan toinen tunniste käyttäjätunnukseen liittyville kentille. Tämä on hyödyllistä, jos ulkoinen järjestelmä ei oikeastaan käsittele käyttäjätunnuksia sellaisina kuin ne ovat Chamilossa, sillä se auttaa ulkoista järjestelmää yhdistämään palautetut käyttäjätiedot johonkin ulkoiseen tietoon, joka on Chamilolle tunnettua. Jos esimerkiksi käytät ulkoista autentikointijärjestelmää, voit palauttaa sen lisäkentän, jolla käyttäjä yhdistetään ulkoiseen autentikointijärjestelmään, sen sijaan että palauttaisit user.id-kentän.

*Oletus: `oauth2_id`*