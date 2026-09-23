# Sosiaalisen verkoston asetukset

**Sosiaalisen verkoston** toiminta — ystävät, ryhmät, seinäjulkaisut, valokuva-albumit.

Näihin asetuksiin pääsee kohdasta **Hallinta > Määritysasetukset > Sosiaalinen verkosto**. Tässä kategoriassa on **7 asetusta**, jotka on lueteltu alla alustan asetusten fixtureissa (`SettingsCurrentFixtures.php`) toimitetun otsikon ja kommentin kanssa.

> Muuttujan nimi koodissa näytetään tasalevyisenä. Käytä sitä, kun skriptaat API:n kautta tai kun sinun on muutettava näitä asetuksia globaalilla tasolla muokkaamalla tiedostoa [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Asetukset

### `allow_social_tool`

**Sosiaalisen verkoston työkalu (Facebookin kaltainen)**

Sosiaalisen verkoston työkalu antaa käyttäjille mahdollisuuden määritellä suhteita muihin käyttäjiin ja siten määritellä ystäväryhmiä. Yhdistettynä sisäiseen viestityökaluun tämä työkalu mahdollistaa tiiviin viestinnän ystävien kanssa portaaliympäristössä.

*Oletus: `true`*

### `allow_students_to_create_groups_in_social`

**Salli oppijoiden luoda ryhmiä sosiaalisessa verkostossa**

Salli oppijoiden luoda ryhmiä sosiaalisessa verkostossa

*Oletus: `false`*


### `disable_dislike_option`

**Poista käytöstä 'ei pidä' sosiaalisten julkaisujen kohdalla**

Poistaa peukku alas -vaihtoehdon sosiaalisten julkaisujen palautteesta. Säilytä vain peukku ylös (tykkäys).

*Oletus: `false`*

### `hide_social_groups_block`

**Piilota ryhmälohko sosiaalisessa verkostossa**

Poistaa ryhmäosion sosiaalisen verkoston näkymästä.

*Oletus: `false`*


### `social_enable_messages_feedback`

**Tykkäys/ei pidä sosiaalisille julkaisuille**

Antaa käyttäjien lisätä palautetta (tykkäyksiä tai ei pidä -merkintöjä) sosiaalisen seinän julkaisuihin.

*Oletus: `false`*

### `social_make_teachers_friend_all`

**Opettajat ja ylläpitäjät näkevät opiskelijat ystävinä sosiaalisessa verkostossa**

Tekee automaattisesti opettajista ja ylläpitäjistä ystäviä kaikille opiskelijoille sosiaalisen verkoston modulissa.

*Oletus: `false`*


### `social_show_language_flag_in_profile`

**Näytä kielilippu avatarin vieressä sosiaalisessa verkostossa**

Näyttää käyttäjän kielivalinnan lippukuvakkeena avatarin vieressä sosiaalisen verkoston profiileissa.

*Oletus: `false`*