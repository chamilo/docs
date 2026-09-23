# Alustan asetukset

Alustatason identiteetti ja toiminta — organisaation nimi, aikavyöhyke, rekisteröitymispolitiikka, verkossa olevat käyttäjät, suorituskykyasetukset.

Näihin asetuksiin pääset kohdasta **Hallinta > Määritysasetukset > Alusta**. Tässä kategoriassa on **29 asetusta**, jotka on lueteltu alla otsikon ja kommentin kanssa sellaisina kuin ne toimitetaan alustan asetusten fixtureissa (`SettingsCurrentFixtures.php`).

> Muuttujan nimi koodissa näytetään tasalevyisellä fontilla. Käytä sitä, kun skriptaat API:n kautta tai kun sinun on muutettava näitä asetuksia globaalilla tasolla muokkaamalla tiedostoa [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Asetukset

### `allow_my_files`

**Ota käyttöön osio 'Omat tiedostot'**

Salli käyttäjien ladata tiedostoja henkilökohtaiseen tilaan alustalla.

*Oletus: `true`*

### `chamilo_database_version`

**Chamilon käyttämän tietokantaskeeman nykyinen versio**

Näyttää nykyisen tietokantaversion Chamilon ytimen versioon vertaamista varten.

### `cookie_warning`

**Evästeiden tietosuojailmoitus**

Jos käytössä, tämä asetus näyttää alustan yläosassa bannerin, jossa käyttäjiä pyydetään hyväksymään, että alusta käyttää evästeitä, jotka ovat välttämättömiä käyttökokemuksen tarjoamiseksi. Käyttäjä voi helposti hyväksyä bannerin ja piilottaa sen. Tämä auttaa Chamiloa noudattamaan EU:n verkkosivujen evästesääntelyä.

*Oletus: `false`*

### `disable_copy_paste`

**Poista kopiointi ja liittäminen käytöstä**

Kun käytössä, tämä asetus poistaa kopiointi- ja liittämismekanismit käytöstä niin hyvin kuin mahdollista. Hyödyllinen rajoittavissa tenttijärjestelyissä.

*Oletus: `false`*

### `donotlistcampus`

**Älä listaa tätä kampusta osoitteessa chamilo.org**

Oletuksena Chamilo-portaalit rekisteröidään automaattisesti julkiseen luetteloon osoitteessa chamilo.org käyttäen vain tälle portaalille antamaasi otsikkoa (ei URL-osoitetta eikä mitään yksityisiä tietoja). Valitse tämä ruutu, jotta portaalisi otsikko ei näy luettelossa.

*Oletus: `false`*

### `generate_random_login`

**Luo satunnainen käyttäjätunnus**

Kun käyttäjiä tuodaan (eräajot), luo automaattisesti satunnainen merkkijono käyttäjätunnukseksi. Muussa tapauksessa käyttäjätunnus muodostetaan etu- ja sukunimen tai sähköpostiosoitteen etuliitteen perusteella.

*Oletus: `false`*

### `hosting_limit_identical_email`

**Rajoita saman sähköpostiosoitteen käyttöä**

Enimmäismäärä tilejä, jotka saavat jakaa saman sähköpostiosoitteen. Aseta arvoksi 0 poistaaksesi rajoituksen käytöstä.

*Oletus: `0`*

### `hosting_limit_users_per_course`

**Globaali käyttäjäraja kurssia kohden**

Määrittää globaalin enimmäismäärän käyttäjiä (opettajat mukaan lukien), jotka saavat olla ilmoittautuneina mihin tahansa yksittäiseen kurssiin alustalla. Aseta arvoksi 0 poistaaksesi rajoituksen käytöstä. Tämä auttaa estämään kurssien ylikuormittumista avoimissa portaaleissa.

*Oletus: `0`*

### `institution`

**Organisaation nimi**

Organisaation nimi (näkyy otsikossa oikealla)

*Oletus: `Chamilo.org`*


### `institution_address`

**Organisaation osoite**

Osoite

### `institution_url`

**Organisaation URL (verkko-osoite)**

Organisaatioiden URL-osoite (linkki, joka näkyy otsikossa oikealla)

*Oletus: `http://www.chamilo.org`*


### `max_courses_per_user`

**Enimmäismäärä kursseja käyttäjää kohden**

Enimmäismäärä kursseja, jotka opettaja/kouluttaja voi luoda. Aseta arvoksi 0 poistaaksesi rajoituksen käytöstä. Voidaan ohittaa käyttäjäkohtaisesti BuyCourses-palvelun ostolla.

*Oletus: `0`*

### `notification_event`

**Ota ilmoitustyökalu käyttöön vaikuttavampaa viestintäkanavaa varten opiskelijoiden kanssa**

Aktivoi ponnahdus- tai järjestelmäilmoitukset tärkeistä alustatapahtumista.

*Oletus: `false`*

### `pdf_img_dpi`

**PDF-viennin resoluutio**

Tämä edustaa luotujen PDF-tiedostojen resoluutiota (pistettä tuumalla, dpi). Oletus on 96. Arvon nostaminen antaa parempiresoluutioisia PDF-tiedostoja, mutta kasvattaa myös tiedostojen kokoa ja luontiaikaa.

*Oletus: `96`*

### `platform_logo_url`

**URL vaihtoehtoiselle alustalogolle**

Korvaa Chamilon logon lataamalla (mahdollisesti etä-) URL-osoitteen. Varmista, että tietoturvakäytäntösi sallivat tämän.

*Oletus: `https://chamilo.org`*


### `portfolio_advanced_sharing`

**Ota käyttöön portfolion edistynyt jakaminen**

Päätä, kuka voi nähdä portfolion julkaisut ja kommentit.

*Oletus: `false`*

### `portfolio_show_base_course_post_in_sessions`

**Näytä peruskurssin julkaisut sessiokurssissa**

Päätä, kuka voi nähdä portfolion julkaisut ja kommentit.

*Oletus: `false`*

### `push_notification_settings`

**Push-ilmoitusten asetukset (JSON)**

JSON-määritys Push-ilmoitusten integrointia varten.

### `server_type`

**Palvelimen tyyppi**

Määrittää ympäristön tyypin: "prod" (normaali tuotanto), "validation" (kuten tuotanto mutta ilman tilastojen raportointia) tai "test" (virheenkorjaustila kehittäjätyökaluilla, kuten kääntämättömien merkkijonojen osoittimilla).

*Oletus: `prod`*

### `session_admin_access_to_all_users_on_all_urls`

**Salli sessiopääkäyttäjien nähdä kaikki käyttäjät kaikissa URL-osoitteissa**

Jos käytössä, sessiopääkäyttäjät voivat hakea ja listata käyttäjiä kaikista käyttö-URL-osoitteista nykyisestä URL-osoitteesta riippumatta.

*Oletus: `false`*

### `site_name`

**E-oppimisportaalin nimi**

Chamilo-portaalisi nimi (näkyy ylätunnisteessa)

*Oletus: `Chamilo site`*


### `timepicker_increment`

**Ajanvalitsimen askel**

Pienin aikaväli (minuutteina), kun päivämäärä ja kellonaika valitaan ajanvalitsin-widgetillä. Esimerkiksi tehtävän palautuksessa, kokeen saatavuudessa, istunnon alkamisajassa tms. alle 5 tai 15 minuutin askel ei välttämättä ole hyödyllinen.

*Oletus: `15`*

### `timezone`

**Oletusaikavyöhyke**

Valitse tämän portaalin oletusaikavyöhyke. Tämä auttaa asettamaan aikavyöhykkeen (jos ominaisuus on käytössä) jokaiselle uudelle käyttäjälle tai käyttäjälle, joka ei ole vielä asettanut omaa aikavyöhykettään. Aikavyöhykkeet auttavat näyttämään kaiken aikaan liittyvän tiedon näytöllä kunkin käyttäjän omassa aikavyöhykkeessä.

*Oletus: `Europe/Paris`*


### `unoconv_binaries`

**UNO-muuntimen binäärit**

Anna järjestelmäpolku UNO-muunninkirjastoon joidenkin lisävientitoimintojen ottamiseksi käyttöön.

*Oletus: `/usr/bin/unoconv`*


### `use_career_external_id_as_identifier_in_diagrams`

**Käytä ulkoista uratunnistetta kaavioissa**

Jos urakaavioita käytetään, näytä ylimääräinen kenttä sisäisen uratunnisteen sijaan.

*Oletus: `false`*

### `use_custom_pages`

**Käytä mukautettuja sivuja**

Ota tämä ominaisuus käyttöön, jotta voit määrittää roolikohtaisia kirjautumissivuja

*Oletus: `false`*

### `use_virtual_keyboard`

**Käytä virtuaalinäppäimistöä**

Näytä virtuaalinäppäimistö. Tämä on hyödyllistä, kun järjestetään rajoittavia kokeita fyysisessä tilassa, jossa opiskelijoilla ei ole näppäimistöä, jotta vilpin mahdollisuuksia voidaan rajoittaa.

*Oletus: `false`*

### `user_status_show_option`

**Roolien näyttöasetukset**

Taulukko muodossa rooli => true/false, joka määrittää, näytetäänkö vai piilotetaanko kyseinen rooli.

### `user_status_show_options_enabled`

**Roolien valikoiva näyttö**

Ota käyttöön taulukon käyttö sen määrittämiseen, mitkä roolit näytetään selkeästi ja mitkä piilotetaan.

*Oletus: `false`*