# Ilmoitusasetukset

Kurssin **Ilmoitukset**-työkalun toiminta — miten ilmoituksia lähetetään ja ajoitetaan.

Näihin asetuksiin pääset kohdasta **Hallinta > Määritysasetukset > Ilmoitukset**. Tässä kategoriassa on **10 asetusta**, jotka on lueteltu alla alustan asetusten fixtureissa (`SettingsCurrentFixtures.php`) toimitetuilla otsikoilla ja kommenteilla.

> Muuttujan nimi koodissa näytetään tasalevyisenä. Käytä sitä, kun skriptaat API:n kautta tai kun sinun on muutettava näitä asetuksia globaalilla tasolla muokkaamalla tiedostoa [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Asetukset

### `allow_careers_in_global_announcements`

**Yhdistä globaalit ilmoitukset urapolkuihin ja ylennyksiin**

Kun asetus on käytössä, globaalit ilmoitukset voidaan yhdistää urapolkuihin ja ylennyksiin kohdennettua jakelua varten.

*Oletus: `false`*

### `allow_coach_to_edit_announcements`

**Salli tutoreiden aina muokata ilmoituksia**

Salli tutoreiden aina muokata ilmoituksia aktiivisissa tai menneissä sessioissa.

*Oletus: `false`*

### `allow_scheduled_announcements`

**Ota käyttöön ajoitetut ilmoitukset sessioissa**

Mahdollistaa sessioiden hallinnoijien asettaa ilmoituksia, jotka laukaistaan tietyillä päivämäärillä tai tietyn määrän päiviä session alun/lopun jälkeen/ennen. Tämän ominaisuuden käyttöönotto edellyttää cron-tehtävän määrittämistä.

*Oletus: `false`*

### `announcements_hide_send_to_hrm_users`

**Piilota vaihtoehto lähettää ilmoituksia HR-käyttäjille**

Poista valintaruutu, jolla ilmoituksia voi lähettää HR-rooleissa oleville käyttäjille (edelleen vaaditaan vahvistus ilmoitustyökalussa).

*Oletus: `true`*

### `course_announcement_scheduled_by_date`

**Päivämäärään perustuvat ilmoitukset**

Salli opettajien määrittää ilmoituksia, jotka lähetetään tietyillä päivämäärillä. Tämä edellyttää cron-tehtävän määrittämistä tiedostolle cron/course_announcement.php, joka suoritetaan vähintään kerran päivässä.

*Oletus: `false`*

### `disable_announcement_attachment`

**Poista liitteet käytöstä ilmoituksissa**

Vaikka liitteet käsitellään tässä versiossa elegantisti eivätkä ne monistu levylle, saatat haluta poistaa liitteet kokonaan käytöstä, jos haluat välttää liiallisuuksia.

*Oletus: `false`*

### `disable_delete_all_announcements`

**Poista käytöstä painike kaikkien ilmoitusten poistamiseen**

Valitse 'Kyllä' poistaaksesi painikkeen, jolla kaikki ilmoitukset poistetaan, koska opettajat voivat käyttää sitä vahingossa.

*Oletus: `false`*

### `hide_announcement_sent_to_users_info`

**Piilota 'lähetetty vastaanottajille' ilmoituksissa**

Valitse 'Kyllä', jotta ei näytetä, kenelle ilmoitus on lähetetty.

*Oletus: `false`*

### `hide_global_announcements_when_not_connected` **v3**

**Piilota globaalit ilmoitukset anonyymeiltä**

Piilota alustan ilmoitukset anonyymeiltä käyttäjiltä ja näytä ne vain tunnistautuneille käyttäjille.

*Oletus: `false`*

### `hide_send_to_hrm_users`

**Piilota vaihtoehto lähettää ilmoituksen kopio HRM:lle**

Ilmoituslomakkeessa näkyy yleensä vaihtoehto, jolla opettajat voivat lähettää ilmoituksen kopion käyttäjän HRM:lle. Aseta tämä arvoon 'Kyllä' poistaaksesi vaihtoehdon (eikä *lähetä* kopiota).