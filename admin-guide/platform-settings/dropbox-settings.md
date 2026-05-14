# Dropbox-Einstellungen

Verhalten des **Dropbox**-Tools zum Dateiaustausch.

Greifen Sie auf diese Einstellungen unter **Verwaltung > Konfigurationseinstellungen > Dropbox** zu. Diese Kategorie enthält **8 Einstellungen**, die unten mit dem Titel und Kommentar aufgeführt sind, wie sie in den Standardeinstellungen der Plattform (`SettingsCurrentFixtures.php`) bereitgestellt werden.

> Der Variablenname im Code wird in Monospace angezeigt. Verwenden Sie ihn, wenn Sie über die API skripten oder wenn Sie diese Einstellungen auf globaler Ebene ändern möchten, indem Sie [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) bearbeiten.

## Einstellungen

### `dropbox_allow_group`

**Dropbox: Gruppe erlauben**

Benutzer können Dateien an Gruppen senden

*Standard: `true`*

### `dropbox_allow_just_upload`

**Dropbox: Hochladen in den eigenen Dropbox-Bereich?**

Erlaubt Trainern und Benutzern, Dokumente in ihre Dropbox hochzuladen, ohne die Dokumente an sich selbst zu senden

*Standard: `true`*

### `dropbox_allow_mailing`

**Dropbox: Mailing erlauben**

Mit der Mailing-Funktion können Sie jedem Lernenden ein persönliches Dokument senden

*Standard: `false`*

### `dropbox_allow_overwrite`

**Dropbox: Können Dokumente überschrieben werden**

Kann das ursprüngliche Dokument überschrieben werden, wenn ein Benutzer oder Trainer ein Dokument mit dem Namen eines bereits existierenden Dokuments hochlädt? Wenn Sie Ja antworten, verlieren Sie den Versionsmechanismus.

*Standard: `true`*

### `dropbox_allow_student_to_student`

**Dropbox: Lernender <-> Lernender**

Erlaubt Benutzern, Dokumente an andere Benutzer zu senden (Peer-to-Peer). Benutzer könnten dies auch für weniger relevante Dokumente nutzen (MP3, Testlösungen, ...). Wenn Sie dies deaktivieren, können Benutzer Dokumente nur an den Trainer senden.

*Standard: `true`*

### `dropbox_hide_course_coach`

**Dropbox: Kurs-Coach ausblenden**

Kurs-Coach der Sitzung in Dropbox ausblenden, wenn ein Dokument vom Coach an die Studierenden gesendet wird

*Standard: `false`*

### `dropbox_hide_general_coach`

**Allgemeinen Coach in Dropbox ausblenden**

Name des allgemeinen Coaches im Dropbox-Tool ausblenden, wenn der allgemeine Coach die Datei hochgeladen hat

*Standard: `false`*

### `dropbox_max_filesize`

**Dropbox: Maximale Dateigröße eines Dokuments**

Wie groß (in MB) darf ein Dropbox-Dokument sein?

*Standard: `100000000`*