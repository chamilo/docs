# Läsnäoloasetukset

**Läsnäolo**-työkalun oletusarvot ja toiminta.

Näihin asetuksiin pääsee kohdasta **Hallinta > Määritysasetukset > Läsnäolo**. Tässä kategoriassa on **5 asetusta**, jotka on lueteltu alla alustan asetusten fixtureissa (`SettingsCurrentFixtures.php`) toimitetun otsikon ja kommentin kanssa.

> Muuttujan nimi koodissa näytetään tasalevyisenä. Käytä sitä, kun skriptaat API:n kautta tai kun haluat muuttaa näitä asetuksia globaalilla tasolla muokkaamalla tiedostoa [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Asetukset

### `allow_delete_attendance`

**Läsnäolot: ota poisto käyttöön**

Chamilon oletustoiminta on piilottaa läsnäololistat niiden poistamisen sijaan, siltä varalta että opettaja tekisi sen vahingossa. Ota tämä valinta käyttöön, jotta opettajat voivat *todella* poistaa läsnäololistat.

*Oletus: `true`*

### `attendance_allow_comments`

**Salli kommentit läsnäololistoissa**

Opettajat ja opiskelijat voivat kommentoida kutakin yksittäistä läsnäoloa (perustelua varten).

*Oletus: `false`*

### `attendance_calendar_set_duration` **v3**

**Läsnäolotapahtumien kesto**

Valinta, jolla määritetään tapahtuman kesto läsnäololistassa.

*Oletus: `false`*

### `enable_sign_attendance_sheet`

**Läsnäolon allekirjoittaminen**

Ota käyttöön allekirjoitusten kerääminen läsnäolon vahvistamiseksi.

*Oletus: `false`*

### `multilevel_grading`

**Ota käyttöön monitasoinen läsnäoloarviointi**

Mahdollistaa läsnäolon arvioinnin useilla tasoilla yksinkertaisen paikalla/poissa -järjestelmän sijaan.

*Oletus: `false`*