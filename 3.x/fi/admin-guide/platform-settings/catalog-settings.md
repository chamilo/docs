# Kurssiluettelon asetukset

Kurssiluettelon (julkinen lista, jossa käyttäjät voivat selata kursseja ja ilmoittautua itse) toiminta.

Näihin asetuksiin pääset kohdasta **Hallinta > Määritysasetukset > Kurssiluettelo**. Tässä kategoriassa on **13 asetusta**, jotka on lueteltu alla otsikoineen ja kommenteineen sellaisina kuin ne toimitetaan alustan asetusten fixtureissa (`SettingsCurrentFixtures.php`).

> Muuttujan nimi koodissa näytetään tasalevyisellä fontilla. Käytä sitä, kun skriptaat API:n kautta tai kun sinun on muutettava näitä asetuksia globaalisti muokkaamalla tiedostoa [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Asetukset

### `allow_session_auto_subscription`

**Automaattinen istuntoon ilmoittautuminen**

Ota käyttöön käyttäjien automaattinen ilmoittautuminen istuntoihin.

*Oletus: `false`*

### `allow_students_to_browse_courses`

**Salli opiskelijoiden selaus**

Salli opiskelijoiden selata ja suodattaa kurssiluetteloa.

*Oletus: `true`*

### `course_catalog_display_in_home`

**Näytä luettelo etusivulla**

Näytä kurssiluettelolohko alustan etusivulla.

*Oletus: `false`*

### `course_catalog_hide_private`

**Piilota yksityiset kurssit**

Jätä yksityiset kurssit pois luettelon näytöstä.

*Oletus: `true`*

### `course_catalog_published`

**Julkaise kurssiluettelo**

Tee kurssiluettelo saataville anonyymeille käyttäjille (yleisölle) ilman kirjautumista.

*Oletus: `false`*

### `course_catalog_settings`

**Kurssiluettelon asetukset**

JSON-määritys kurssiluettelolle: linkkiasetukset, suodattimet, lajitteluvaihtoehdot ja muuta.

### `course_subscription_in_user_s_session`

**Ilmoittautuminen istentonäkymässä**

Salli käyttäjien ilmoittautua kursseille suoraan istuntosivultaan.

*Oletus: `false`*

### `hide_public_link`

**Piilota julkinen linkki**

Poista julkinen URL-linkki kurssikorteista.

*Oletus: `false`*

### `only_show_course_from_selected_category`

**Näytä kurssiluettelossa vain vastaavat kategoriat**

Kun ei ole tyhjä, kurssiluettelossa näkyvät vain annettujen kategorioiden kurssit.

### `only_show_selected_courses`

**Vain valitut kurssit**

Näytä luettelossa vain manuaalisesti valitut kurssit.

*Oletus: `false`*

### `session_catalog_settings`

**Istuntoluettelon asetukset**

JSON-määritys istuntoluettelolle: suodattimet ja näyttöasetukset.

### `show_courses_descriptions_in_catalog`

**Näytä kurssikuvaukset**

Näytä kurssikuvaukset luettelolistauksessa.

*Oletus: `false`*

### `show_courses_sessions`

**Näytä kurssit ja istunnot**

Sisällytä luettelon tuloksiin sekä kurssit että istunnot.

*Oletus: `0`*