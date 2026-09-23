# Dropbox-asetukset

**Dropbox**-tiedostovaihtotyökalun toiminta.

Näihin asetuksiin pääsee kohdasta **Hallinta > Määritysasetukset > Dropbox**. Tässä kategoriassa on **8 asetusta**, jotka on lueteltu alla alustan asetusten fixtureissa (`SettingsCurrentFixtures.php`) toimitetuilla otsikoilla ja kommenteilla.

> Muuttujan nimi koodissa näytetään tasalevyisellä fontilla. Käytä sitä, kun skriptaat API:n kautta tai kun sinun on muutettava näitä asetuksia globaalilla tasolla muokkaamalla tiedostoa [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Asetukset

### `dropbox_allow_group`

**Dropbox: salli ryhmä**

Käyttäjät voivat lähettää tiedostoja ryhmille

*Oletus: `true`*

### `dropbox_allow_just_upload`

**Dropbox: Lataus omaan dropbox-tilaan?**

Salli kouluttajien ja käyttäjien ladata asiakirjoja dropboxiinsa lähettämättä asiakirjoja itselleen

*Oletus: `true`*

### `dropbox_allow_mailing`

**Dropbox: Salli postitus**

Postitustoiminnolla voit lähettää kullekin oppijalle henkilökohtaisen asiakirjan

*Oletus: `false`*

### `dropbox_allow_overwrite`

**Dropbox: Voiko asiakirjoja ylikirjoittaa**

Voiko alkuperäisen asiakirjan ylikirjoittaa, kun käyttäjä tai kouluttaja lataa asiakirjan, jonka nimi on jo olemassa olevan asiakirjan nimi? Jos vastaat kyllä, versionhallintamekanismi menetetään.

*Oletus: `true`*

### `dropbox_allow_student_to_student`

**Dropbox: Oppija <-> Oppija**

Salli käyttäjien lähettää asiakirjoja muille käyttäjille (peer 2 peer). Käyttäjät saattavat käyttää tätä myös vähemmän olennaisiin asiakirjoihin (mp3, tenttiratkaisut, ...). Jos poistat tämän käytöstä, käyttäjät voivat lähettää asiakirjoja vain kouluttajalle.

*Oletus: `true`*

### `dropbox_hide_course_coach`

**Dropbox: piilota kurssin tuutori**

Piilota istunnon kurssituutori Dropboxissa, kun tuutori lähettää asiakirjan opiskelijoille

*Oletus: `false`*

### `dropbox_hide_general_coach`

**Piilota yleinen tuutori Dropboxissa**

Piilota yleisen tuutorin nimi Dropbox-työkalussa, kun yleinen tuutori on ladannut tiedoston

*Oletus: `false`*


### `dropbox_max_filesize`

**Dropbox: Asiakirjan enimmäiskoko**

Kuinka suuri (Mt) dropbox-asiakirja voi olla?

*Oletus: `100000000`*