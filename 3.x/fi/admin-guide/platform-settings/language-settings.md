# Kieliasetukset

Saatavilla olevat kielet, oletuskieli ja se, miten Chamilo ratkaisee, mikä kieli näytetään.

Näihin asetuksiin pääset kohdasta **Hallinta > Määritysasetukset > Kielet**. Tässä kategoriassa on **13 asetusta**, jotka on lueteltu alla alustan asetusten fixtureissa (`SettingsCurrentFixtures.php`) toimitetuilla otsikoilla ja kommenteilla.

> Muuttujan nimi koodissa näytetään tasalevyisellä fontilla. Käytä sitä, kun skriptaat API:n kautta tai kun sinun on muutettava näitä asetuksia globaalisti muokkaamalla tiedostoa [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Asetukset

### `allow_course_multiple_languages`

**Monikieliset kurssit**

Ota käyttöön kursseja, joita hallitaan useammalla kuin yhdellä kielellä. Tämä valinta lisää kurssisivulle kielivalitsimen, jotta käyttäjät voivat vaihtaa kieltä helposti, ja lisää kursseille extra-kentän 'multiple_language', joka mahdollistaa etähallintamenettelyt.

*Oletus: `false`*


### `allow_use_sub_language`

**Salli alikielten määrittely ja käyttö**

Ottamalla tämän valinnan käyttöön voit määritellä muunnelmia kullekin alustan käyttöliittymässä käytetylle kielitermille uuden kielen muodossa, joka perustuu olemassa olevaan kieleen ja laajentaa sitä. Löydät tämän valinnan hallintapaneelin kielten osiosta.

*Oletus: `false`*

### `auto_detect_language_custom_pages`

**Ota kielen automaattinen tunnistus käyttöön mukautetuilla sivuilla**

Jos käytät mukautettuja sivuja, ota tämä käyttöön, jos haluat, että kielentunnistin esittää sivun käyttäjän selaimen kielellä, tai poista se käytöstä pakottaaksesi kieleksi alustan oletuskielen.

*Oletus: `true`*


### `language_by_resource` **v3**

**Kieli resurssin mukaan**

Salli tietyn kielen määrittäminen yksittäisille resursseille.

*Oletus: `false`*

### `language_flags_by_country`

**Kieliliput**

Käytä maiden lippuja kielille. Tätä ei ole oletuksena käytössä, koska jotkin kielet eivät ole tiukasti sidoksissa yhteen maahan, mikä voi aiheuttaa turhautumista joillekin käyttäjille.

*Oletus: `false`*


### `language_priority_1`

**Korkeimman prioriteetin kieli**

Ensisijainen kieli, joka valitaan, kun useita kielikonteksteja on asetettu.

*Oletus: `course_lang`*


### `language_priority_2`

**Toissijaisen prioriteetin kieli**

Toissijainen varakieli, jos ensimmäinen prioriteetti ei ole käytettävissä tai se on kontekstin ulkopuolella.

*Oletus: `user_profil_lang`*


### `language_priority_3`

**Kolmannen prioriteetin kieli**

Kolmannen tason varakieli, jos korkeammat prioriteetit epäonnistuvat.

*Oletus: `user_selected_lang`*


### `language_priority_4`

**Neljännen prioriteetin kieli**

Viimeinen varakielivaihtoehto prioriteettijärjestyksessä.

*Oletus: `platform_lang`*


### `platform_language`

**Alustan oletuskieli**

Pääkieli, jota käytetään oletuksena, kun käyttäjän kieltä ei ole asetettu.

*Oletus: `en`*


### `show_different_course_language`

**Näytä kurssien kielet**

Näytä kunkin kurssin kieli kurssin otsikon vieressä etusivun kurssilistassa

*Oletus: `true`*


### `show_language_selector_in_menu`

**Kielenvaihtaja päävalikossa**

Näytä päävalikossa kielivalitsin, joka päivittää käyttäjän kieliasetuksen välittömästi. Tämä voi olla hyödyllistä monikielisissä portaaleissa, joissa oppijoiden on vaihdettava kielestä toiseen oppimistaan varten.

*Oletus: `true`*


### `template_activate_language_filter`

**Monikieliset asiakirjamallit**

Ota käyttöön asiakirjamallien (alusta- tai kurssitasolla) määrittäminen tietyille kielille.

*Oletus: `false`*