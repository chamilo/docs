# Dropbox-innstillinger

Oppførselen til filutvekslingsverktøyet **Dropbox**.

Få tilgang til disse innstillingene under **Administrasjon > Konfigurasjonsinnstillinger > Dropbox**. Denne kategorien inneholder **8 innstillinger**, listet nedenfor med tittel og kommentar som leveres i plattformens innstillingsfiksturer (`SettingsCurrentFixtures.php`).

> Variabelnavnet i koden vises i monospace. Bruk det når du skripter via API-et, eller når du trenger å endre disse innstillingene på globalt nivå ved å redigere [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Innstillinger

### `dropbox_allow_group`

**Dropbox: tillat gruppe**

Brukere kan sende filer til grupper

*Standard: `true`*

### `dropbox_allow_just_upload`

**Dropbox: Last opp til eget dropbox-område?**

Tillat at trenere og brukere laster opp dokumenter til sin dropbox uten å sende dokumentene til seg selv

*Standard: `true`*

### `dropbox_allow_mailing`

**Dropbox: Tillat utsending**

Med utsendingsfunksjonaliteten kan du sende hvert lærende et personlig dokument

*Standard: `false`*

### `dropbox_allow_overwrite`

**Dropbox: Kan dokumenter overskrives**

Kan det opprinnelige dokumentet overskrives når en bruker eller trener laster opp et dokument med navnet til et dokument som allerede finnes? Hvis du svarer ja, mister du versjonsmekanismen.

*Standard: `true`*

### `dropbox_allow_student_to_student`

**Dropbox: Lærende <-> Lærende**

Tillat at brukere sender dokumenter til andre brukere (peer 2 peer). Brukere kan også bruke dette til mindre relevante dokumenter (mp3, testløsninger, ...). Hvis du deaktiverer dette, kan brukerne bare sende dokumenter til treneren.

*Standard: `true`*

### `dropbox_hide_course_coach`

**Dropbox: skjul kursveileder**

Skjul sesjonens kursveileder i Dropbox når et dokument sendes av veilederen til studentene

*Standard: `false`*

### `dropbox_hide_general_coach`

**Skjul generell veileder i Dropbox**

Skjul navnet på den generelle veilederen i Dropbox-verktøyet når den generelle veilederen lastet opp filen

*Standard: `false`*


### `dropbox_max_filesize`

**Dropbox: Maksimal filstørrelse for et dokument**

Hvor stor (i MB) kan et dropbox-dokument være?

*Standard: `100000000`*