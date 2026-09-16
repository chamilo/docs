# Anwesenheitseinstellungen

Standardwerte und Verhalten des **Anwesenheit**-Tools.

Greifen Sie auf diese Einstellungen unter **Verwaltung > Konfigurationseinstellungen > Anwesenheit** zu. Diese Kategorie enthält **4 Einstellungen**, die unten mit dem Titel und dem Kommentar aufgeführt sind, wie sie in den Einstellungsvorlagen der Plattform (`SettingsCurrentFixtures.php`) bereitgestellt werden.

> Der Variablenname im Code wird in Monospace angezeigt. Verwenden Sie ihn, wenn Sie über die API skripten oder wenn Sie diese Einstellungen auf globaler Ebene ändern müssen, indem Sie [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) bearbeiten.

## Einstellungen

### `allow_delete_attendance`

**Anwesenheiten: Löschen aktivieren**

Das Standardverhalten in Chamilo besteht darin, Anwesenheitsblätter auszublenden, anstatt sie zu löschen, falls ein Lehrer dies versehentlich tun sollte. Aktivieren Sie diese Option, um Lehrern zu erlauben, Anwesenheitsblätter *wirklich* zu löschen.

*Standard: `true`*

### `attendance_allow_comments`

**Kommentare in Anwesenheitsblättern erlauben**

Lehrer und Schüler können jede einzelne Anwesenheit kommentieren (zur Begründung).

*Standard: `false`*

### `enable_sign_attendance_sheet`

**Anwesenheitsunterschrift**

Aktivieren Sie die Möglichkeit, Unterschriften zur Bestätigung der Anwesenheit zu sammeln.

*Standard: `false`*

### `multilevel_grading`

**Mehrstufige Anwesenheitsbewertung aktivieren**

Ermöglicht die Bewertung der Anwesenheit mit mehreren Stufen anstelle eines einfachen Anwesend/Abwesend-Systems.

*Standard: `false`*