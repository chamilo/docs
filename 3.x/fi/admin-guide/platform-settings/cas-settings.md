# CAS-asetukset

Vanha CAS-konfiguraatio (Central Authentication Service) Chamilo 1.x:stä. Katso [CAS](../authentication/cas.md) CAS-todentajan nykyisestä tilasta Chamilo 3.x:ssä.

Näihin asetuksiin pääset kohdasta **Hallinta > Konfiguraatioasetukset > CAS**. Tässä kategoriassa on **7 asetusta**, jotka on lueteltu alla otsikoineen ja kommentteineen sellaisina kuin ne toimitetaan alustan asetusten fixtureissa (`SettingsCurrentFixtures.php`).

> Muuttujan nimi koodissa näytetään tasalevyisenä. Käytä sitä, kun skriptaat API:n kautta tai kun sinun on muutettava näitä asetuksia globaalilla tasolla muokkaamalla tiedostoa [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Asetukset

### `cas_activate`

**Ota CAS-todennus käyttöön**

CAS-todennuksen käyttöönotto mahdollistaa käyttäjien tunnistautumisen CAS-tunnuksillaan.<br/>Siirry kohtaan <a href='settings.php?category=CAS'>Plugin</a> lisätäksesi konfiguroitavan 'CAS Login' -painikkeen Chamilo-kampuksellesi. Voit myös pakottaa CAS-todennuksen asettamalla cas[force_redirect] tiedostossa app/config/auth.conf.php.

### `cas_add_user_activate`

**Ota CAS-käyttäjän lisäys käyttöön**

Ota CAS-käyttäjän lisäys käyttöön. Jotta käyttäjätili voidaan luoda LDAP-hakemistosta, taulujen extldap_config ja extldap_user_correspondance on oltava täytettyinä tiedostossa app/config/auth.conf.php

### `cas_port`

**Pääasiallisen CAS-palvelimen portti**

Portti, johon pääasialliseen CAS-palvelimeen yhdistetään

### `cas_protocol`

**Pääasiallisen CAS-palvelimen protokolla**

Protokolla, jolla yhdistämme CAS-palvelimeen

### `cas_server`

**Pääasiallinen CAS-palvelin**

Tämä on pääasiallinen CAS-palvelin, jota käytetään todennukseen (IP-osoite tai isäntänimi)

### `cas_server_uri`

**Pääasiallisen CAS-palvelimen URI**

Polku CAS-palveluun

### `update_user_info_cas_with_ldap`

**Päivitä CAS-todennetun käyttäjätilin tiedot LDAP:sta**

Varmistaa, että käyttäjän etunimi, sukunimi ja sähköpostiosoite vastaavat LDAP-hakemiston nykyisiä arvoja