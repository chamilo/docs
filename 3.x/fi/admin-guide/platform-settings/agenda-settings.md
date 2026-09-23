# Kalenteriasetukset

**Kalenteri**-työkalun (kalenteri / tapahtumat) oletukset ja toiminta.

Näihin asetuksiin pääsee kohdasta **Hallinta > Määritysasetukset > Kalenteri**. Tässä kategoriassa on **11 asetusta**, jotka on lueteltu alla otsikon ja kommentin kanssa sellaisina kuin ne toimitetaan alustan asetusten fixtureissa (`SettingsCurrentFixtures.php`).

> Muuttujan nimi koodissa näytetään tasalevyisenä. Käytä sitä, kun skriptaat API:n kautta tai kun sinun on muutettava näitä asetuksia globaalilla tasolla muokkaamalla tiedostoa [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Asetukset

### `agenda_colors`

**Kalenterin värit**

Aseta HTML-koodivärit kullekin tapahtumatyypille, jotta tapahtuman väri muuttuu näytettäessä.

### `agenda_legend`

**Kalenterin värien selitteet**

Lisää pieni seliteteksti, joka kuvaa tapahtumissa käytettyjä värejä.

### `agenda_on_hover_info`

**Kalenterin hover-tiedot**

Mukauta kalenteria kursorin päällä ollessa. Näytä kalenterin kommentti ja/tai kuvaus.

### `agenda_reminders_sender_id`

**Käyttäjän tunnus, joka virallisesti lähettää kalenterimuistutukset**

Määrittää, kuka käyttäjä näkyy kalenterimuistutussähköpostien lähettäjänä.

*Oletus: `0`*

### `allow_agenda_edit_for_hrm`

**Salli HRM-roolin muokata tai poistaa kalenteritapahtumia**

Tämä antaa HRM:lle hieman enemmän valtaa sallimalla heidän muokata/poistaa kalenteritapahtumia kurssisessiossa.

*Oletus: `false`*

### `allow_careers_in_global_agenda`

**Yhdistä globaalit kalenteritapahtumat urapolkuihin ja ylennyksiin**

Kun käytössä, globaalit kalenteritapahtumat voidaan liittää urapolkuihin ja ylennyksiin, mikä mahdollistaa kohdennetun aikataulutuksen.

*Oletus: `false`*

### `allow_personal_agenda`

**Henkilökohtainen kalenteri**

Voiko oppija lisätä henkilökohtaisia tapahtumia kalenteriin?

*Oletus: `true`*

### `default_calendar_view`

**Kalenterin oletusnäyttötila**

Aseta arvoksi dayGridMonth, basicWeek, agendaWeek tai agendaDay vaihtaaksesi kalenterin oletusnäkymää.

*Oletus: `month`*

### `fullcalendar_settings`

**Kalenterin mukautus**

Lisäasetukset kalenterille, joiden avulla voit määrittää käyttämämme tietyn kalenterikirjaston.

### `personal_agenda_show_all_session_events`

**Näytä kaikki kalenteritapahtumat henkilökohtaisessa kalenterissa**

Älä piilota vanhentuneiden sessioiden tapahtumia.

*Oletus: `false`*

### `personal_calendar_show_sessions_occupation`

**Näytä sessioiden varaukset henkilökohtaisessa kalenterissa**

Kun käytössä, sessioiden aikataulut ja varaukset näytetään käyttäjien henkilökohtaisissa kalentereissa.

*Oletus: `false`*