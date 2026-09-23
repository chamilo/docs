# Dropbox-indstillinger

Adfærd for filudvekslingsværktøjet **Dropbox**.

Tilgå disse indstillinger under **Administration > Konfigurationsindstillinger > Dropbox**. Denne kategori indeholder **8 indstillinger**, som er anført nedenfor med den titel og kommentar, der leveres i platformens indstillings-fixtures (`SettingsCurrentFixtures.php`).

> Variabelnavnet i koden vises med monospace. Brug det, når du script'er via API'et, eller når du skal ændre disse indstillinger på globalt niveau ved at redigere [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Indstillinger

### `dropbox_allow_group`

**Dropbox: tillad gruppe**

Brugere kan sende filer til grupper

*Standard: `true`*

### `dropbox_allow_just_upload`

**Dropbox: Upload til eget dropbox-område?**

Tillad undervisere og brugere at uploade dokumenter til deres dropbox uden at sende dokumenterne til sig selv

*Standard: `true`*

### `dropbox_allow_mailing`

**Dropbox: Tillad mailing**

Med mailing-funktionen kan du sende hvert kursusdeltager et personligt dokument

*Standard: `false`*

### `dropbox_allow_overwrite`

**Dropbox: Kan dokumenter overskrives**

Kan det originale dokument overskrives, når en bruger eller underviser uploader et dokument med navnet på et dokument, der allerede findes? Hvis du svarer ja, mister du versionsstyringsmekanismen.

*Standard: `true`*

### `dropbox_allow_student_to_student`

**Dropbox: Kursusdeltager <-> Kursusdeltager**

Tillad brugere at sende dokumenter til andre brugere (peer 2 peer). Brugere kan også bruge dette til mindre relevante dokumenter (mp3, testløsninger, ...). Hvis du deaktiverer dette, kan brugerne kun sende dokumenter til underviseren.

*Standard: `true`*

### `dropbox_hide_course_coach`

**Dropbox: skjul kursusvejleder**

Skjul sessionens kursusvejleder i Dropbox, når et dokument sendes af vejlederen til kursusdeltagerne

*Standard: `false`*

### `dropbox_hide_general_coach`

**Skjul generel vejleder i Dropbox**

Skjul den generelle vejleders navn i Dropbox-værktøjet, når den generelle vejleder har uploadet filen

*Standard: `false`*


### `dropbox_max_filesize`

**Dropbox: Maksimal filstørrelse for et dokument**

Hvor stor (i MB) kan et dropbox-dokument være?

*Standard: `100000000`*