# Ylläpitäjän henkilöllisyysasetukset

Alustan ylläpitäjän henkilöllisyys- ja yhteystiedot. Nämä arvot näkyvät alustan alatunnisteessa ja joissakin järjestelmän lähettämissä sähköposteissa.

Näihin asetuksiin pääset kohdasta **Ylläpito > Määritysasetukset > Ylläpitäjän henkilöllisyys**. Tässä kategoriassa on **12 asetusta**, jotka on lueteltu alla otsikoineen ja kommenteineen sellaisina kuin ne toimitetaan alustan asetusten fixtureissa (`SettingsCurrentFixtures.php`).

> Muuttujan nimi koodissa näytetään tasalevyisellä fontilla. Käytä sitä, kun skriptaat API:n kautta tai kun sinun on muutettava näitä asetuksia globaalilla tasolla muokkaamalla tiedostoa [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Asetukset

### `administrator_email`

**Portaalin ylläpitäjä: sähköposti**

Alustan ylläpitäjän sähköpostiosoite (näkyy alatunnisteessa vasemmalla)

### `administrator_name`

**Portaalin ylläpitäjä: etunimi**

Alustan ylläpitäjän etunimi (näkyy alatunnisteessa vasemmalla)

### `administrator_phone`

**Portaalin ylläpitäjä: puhelinnumero**

Alustan ylläpitäjän puhelinnumero (näkyy alatunnisteessa vasemmalla)

### `administrator_surname`

**Portaalin ylläpitäjä: sukunimi**

Alustan ylläpitäjän sukunimi (näkyy alatunnisteessa vasemmalla)

### `chamilo_latest_news`

**Uusimmat uutiset**

Hae Chamilon uusimmat uutiset, mukaan lukien tietoturva-aukot ja tapahtumat, suoraan ylläpitopaneeliin. Nämä uutiset tarkistetaan Chamilon uutispalvelimelta joka kerta, kun lataat ylläpitosivun, ja ne näkyvät vain ylläpitäjille.

*Oletus: `true`*

### `chamilo_support`

**Chamilo-tukilohko**

Saat ammattilaisvinkkejä ja helpon tavan ottaa yhteyttä virallisiin palveluntarjoajiin ammattimaista tukea varten suoraan Chamilon tekijöiltä. Tämä lohko näkyy ylläpitosivullasi, se on näkyvissä vain ylläpitäjille, ja se päivittyy joka kerta, kun lataat ylläpitosivun.

*Oletus: `true`*

### `max_anonymous_users`

**Useita anonyymejä käyttäjiä**

Ota tämä asetus käyttöön, jotta anonyymeille käyttäjille voidaan sallia useita järjestelmäkäyttäjiä. Tämä on hyödyllistä, kun alustaa käytetään joidenkin kurssien julkisena esittelytilana. Useat anonyymit käyttäjät mahdollistavat seurannan toimimisen kokemuksen ajan useille käyttäjille sekoittamatta heidän tietojaan (mikä voisi muuten hämmentää heitä).

*Oletus: `0`*

### `redirect_admin_to_courses_list`

**Ohjaa ylläpitäjä kurssilistalle**

Oletuskäyttäytyminen on lähettää ylläpitäjät suoraan ylläpitopaneeliin (kun taas opettajat ja opiskelijat ohjataan kurssilistalle tai alustan etusivulle). Ota käyttöön, jotta myös ylläpitäjä ohjataan omalle kurssilistalleen.

*Oletus: `false`*

### `send_inscription_notification_to_general_admin_only`

**Ilmoita uusista käyttäjistä vain globaalille ylläpitäjälle**

Kun käytössä, vain globaali ylläpitäjä saa sähköposti-ilmoituksia uusista käyttäjärekisteröinneistä kaikkien ylläpitäjien sijaan.

*Oletus: `false`*

### `show_link_request_hrm_user`

**Näytä linkki käyttäjän ja HRM:n välisen sidoksen pyytämiseen**

Näytä profiilisivulla linkki, jonka avulla henkilöstöjohtajat voivat pyytää sidosta käyttäjätiliin.

*Oletus: `false`*

### `user_status_option_only_for_admin_enabled`

**Piilota rooli tavallisilta käyttäjiltä**

Mahdollistaa käyttäjien roolin piilottamisen, kun tämä asetus on true ja seuraava taulukko asettaa vastaavan roolin arvoksi 'true'.

*Oletus: `false`*

### `user_status_option_show_only_for_admin`

**Määritä, mitkä roolit piilotetaan tavallisilta käyttäjiltä**

Roolit, jotka on asetettu arvoon 'true', näkyvät vain ylläpitäjille. Muut käyttäjät eivät näe niitä.