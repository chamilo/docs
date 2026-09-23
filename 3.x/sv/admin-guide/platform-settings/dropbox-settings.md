# Inställningar för Dropbox

Beteende för filutbytesverktyget **Dropbox**.

Öppna dessa inställningar under **Administration > Konfigurationsinställningar > Dropbox**. Denna kategori innehåller **8 inställningar**, som listas nedan med den titel och kommentar som levereras i plattformens inställningsfixtures (`SettingsCurrentFixtures.php`).

> Variabelnamnet i koden visas i monospace. Använd det när du skriptar via API:et eller när du behöver ändra dessa inställningar på global nivå genom att redigera [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Inställningar

### `dropbox_allow_group`

**Dropbox: tillåt grupp**

Användare kan skicka filer till grupper

*Standard: `true`*

### `dropbox_allow_just_upload`

**Dropbox: Ladda upp till eget dropbox-utrymme?**

Tillåt utbildare och användare att ladda upp dokument till sin dropbox utan att skicka  dokumenten till sig själva

*Standard: `true`*

### `dropbox_allow_mailing`

**Dropbox: Tillåt utskick**

Med utskicksfunktionen kan du skicka ett personligt dokument till varje deltagare

*Standard: `false`*

### `dropbox_allow_overwrite`

**Dropbox: Kan dokument skrivas över**

Kan originaldokumentet skrivas över när en användare eller utbildare laddar upp ett dokument med samma namn som ett dokument som redan finns? Om du svarar ja förlorar du versionshanteringsmekanismen.

*Standard: `true`*

### `dropbox_allow_student_to_student`

**Dropbox: Deltagare <-> Deltagare**

Tillåt användare att skicka dokument till andra användare (peer 2 peer). Användare kan även använda detta för mindre relevanta dokument (mp3, tentamenslösningar, ...). Om du inaktiverar detta kan användarna endast skicka dokument till utbildaren.

*Standard: `true`*

### `dropbox_hide_course_coach`

**Dropbox: dölj kursens handledare**

Dölj sessionens kurshandledare i Dropbox när ett dokument skickas av handledaren till studenterna

*Standard: `false`*

### `dropbox_hide_general_coach`

**Dölj allmän handledare i Dropbox**

Dölj namnet på den allmänna handledaren i Dropbox-verktyget när den allmänna handledaren har laddat upp filen

*Standard: `false`*


### `dropbox_max_filesize`

**Dropbox: Maximal filstorlek för ett dokument**

Hur stor (i MB) kan ett dropbox-dokument vara?

*Standard: `100000000`*