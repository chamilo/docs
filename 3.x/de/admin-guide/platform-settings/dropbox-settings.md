# Dropbox-Einstellungen

Verhalten des Dateiaustausch-Werkzeugs **Dropbox**.

Diese Einstellungen finden Sie unter **Administration > Konfigurationseinstellungen > Dropbox**. Diese Kategorie enthält **8 Einstellungen**, die nachfolgend mit dem Titel und dem Kommentar aufgeführt sind, die in den Einstellungs-Fixtures der Plattform (`SettingsCurrentFixtures.php`) mitgeliefert werden.

> Der Variablenname im Code wird in Monospace dargestellt. Verwenden Sie ihn beim Skripten über die API oder wenn Sie diese Einstellungen global ändern müssen, indem Sie [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) bearbeiten.

## Einstellungen

### `dropbox_allow_group`

**Dropbox: Gruppe zulassen**

Benutzer können Dateien an Gruppen senden

*Standard: `true`*

### `dropbox_allow_just_upload`

**Dropbox: In den eigenen Dropbox-Bereich hochladen?**

Trainern und Benutzern erlauben, Dokumente in ihre Dropbox hochzuladen, ohne die Dokumente an sich selbst zu senden

*Standard: `true`*

### `dropbox_allow_mailing`

**Dropbox: Mailing zulassen**

Mit der Mailing-Funktion können Sie jedem Lernenden ein persönliches Dokument senden

*Standard: `false`*

### `dropbox_allow_overwrite`

**Dropbox: Können Dokumente überschrieben werden**

Kann das Originaldokument überschrieben werden, wenn ein Benutzer oder Trainer ein Dokument mit dem Namen eines bereits vorhandenen Dokuments hochlädt? Wenn Sie ja antworten, verlieren Sie den Versionsmechanismus.

*Standard: `true`*

### `dropbox_allow_student_to_student`

**Dropbox: Lernender <-> Lernender**

Benutzern erlauben, Dokumente an andere Benutzer zu senden (Peer-to-Peer). Benutzer könnten dies auch für weniger relevante Dokumente nutzen (mp3, Testlösungen, ...). Wenn Sie dies deaktivieren, können die Benutzer Dokumente nur an den Trainer senden.

*Standard: `true`*

### `dropbox_hide_course_coach`

**Dropbox: Kurs-Tutor ausblenden**

Den Sitzungs-Kurs-Tutor in der Dropbox ausblenden, wenn ein Dokument vom Tutor an Studierende gesendet wird

*Standard: `false`*

### `dropbox_hide_general_coach`

**Allgemeinen Tutor in der Dropbox ausblenden**

Den Namen des allgemeinen Tutors im Dropbox-Werkzeug ausblenden, wenn der allgemeine Tutor die Datei hochgeladen hat

*Standard: `false`*


### `dropbox_max_filesize`

**Dropbox: Maximale Dateigröße eines Dokuments**

Wie groß (in MB) darf ein Dropbox-Dokument sein?

*Standard: `100000000`*