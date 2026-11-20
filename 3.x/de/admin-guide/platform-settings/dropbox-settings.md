# Dropbox-Einstellungen

Verhalten des Dateiaustausch-Tools **Dropbox**.

Zugriff auf diese Einstellungen unter **Administration > Konfigurationseinstellungen > Dropbox**. Diese Kategorie enthält **10 Einstellungen**, die unten mit dem Titel und dem Kommentar aufgeführt sind, die in den Einstellungs-Fixtures der Plattform (`SettingsCurrentFixtures.php`) mitgeliefert werden.

> Der Variablenname im Code wird in Festbreitenschrift angezeigt. Verwenden Sie ihn beim Skripten über die API oder wenn Sie diese Einstellungen auf globaler Ebene ändern müssen, indem Sie [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) bearbeiten.

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

**Dropbox: Versand zulassen**

Mit der Versandfunktion können Sie jedem Lernenden ein persönliches Dokument senden

*Standard: `false`*

### `dropbox_allow_overwrite`

**Dropbox: Können Dokumente überschrieben werden**

Kann das Originaldokument überschrieben werden, wenn ein Benutzer oder Trainer ein Dokument mit dem Namen eines bereits vorhandenen Dokuments hochlädt? Wenn Sie mit Ja antworten, geht der Versionierungsmechanismus verloren.

*Standard: `true`*

### `dropbox_allow_student_to_student`

**Dropbox: Lernender <-> Lernender**

Benutzern erlauben, Dokumente an andere Benutzer zu senden (Peer-to-Peer). Benutzer könnten dies auch für weniger relevante Dokumente verwenden (mp3, Testlösungen, ...). Wenn Sie dies deaktivieren, können die Benutzer Dokumente nur an den Trainer senden.

*Standard: `true`*

### `dropbox_hide_course_coach`

**Dropbox: Kurstutor ausblenden**

Den Sitzungskurstutor in der Dropbox ausblenden, wenn ein Dokument vom Tutor an Studierende gesendet wird

*Standard: `false`*

### `dropbox_hide_general_coach`

**Allgemeinen Tutor in der Dropbox ausblenden**

Den Namen des allgemeinen Tutors im Dropbox-Tool ausblenden, wenn der allgemeine Tutor die Datei hochgeladen hat

*Standard: `false`*


### `dropbox_max_filesize`

**Dropbox: Maximale Dateigröße eines Dokuments**

Wie groß (in MB) darf ein Dropbox-Dokument sein?

*Standard: `100000000`*

### `dropbox_user_quota_mb`

**Dropbox: Gesamtspeicherkontingent pro Benutzer (MB)**

Maximale kombinierte Größe der von einem einzelnen Benutzer kursübergreifend hochgeladenen Dateien. Empfänger werden nicht ein zweites Mal belastet.

*Standard: `0` (unbegrenzt)*

### `dropbox_course_quota_mb`

**Dropbox: Gesamtspeicherkontingent pro Kurs (MB)**

Maximale kombinierte Größe der Dropbox-Dateien für einen Kurs, einschließlich seiner Sitzungen. Getrennt vom Kurskontingent für Dokumente.

*Standard: `0` (unbegrenzt)*

Siehe [Speicherkontingente PR #9358](https://github.com/chamilo/chamilo-lms/pull/9358).