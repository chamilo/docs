# Anwesenheitseinstellungen

Standardwerte und Verhalten des Werkzeugs **Anwesenheit**.

Diese Einstellungen finden Sie unter **Administration > Konfigurationseinstellungen > Anwesenheit**. Diese Kategorie enthält **5 Einstellungen**, die nachfolgend mit Titel und Kommentar aus den Einstellungs-Fixtures der Plattform (`SettingsCurrentFixtures.php`) aufgeführt sind.

> Der Variablenname im Code wird in Monospace dargestellt. Verwenden Sie ihn beim Skripten über die API oder wenn Sie diese Einstellungen global ändern müssen, indem Sie [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) bearbeiten.

## Einstellungen

### `allow_delete_attendance`

**Anwesenheiten: Löschen aktivieren**

Das Standardverhalten in Chamilo besteht darin, Anwesenheitslisten auszublenden statt sie zu löschen, falls der Lehrende dies versehentlich tun würde. Aktivieren Sie diese Option, damit Lehrende Anwesenheitslisten *wirklich* löschen können.

*Standard: `true`*

### `attendance_allow_comments`

**Kommentare in Anwesenheitslisten zulassen**

Lehrende und Lernende können jede einzelne Anwesenheit kommentieren (zur Begründung).

*Standard: `false`*

### `attendance_calendar_set_duration` **v3**

**Dauer von Anwesenheitsereignissen**

Option zur Festlegung der Dauer eines Ereignisses in der Anwesenheitsliste.

*Standard: `false`*

### `enable_sign_attendance_sheet`

**Anwesenheitsunterschrift**

Unterschriften zur Bestätigung der eigenen Anwesenheit aktivieren.

*Standard: `false`*

### `multilevel_grading`

**Mehrstufige Anwesenheitsbewertung aktivieren**

Ermöglicht die Bewertung der Anwesenheit mit mehreren Stufen statt eines einfachen Anwesend/Abwesend-Systems.

*Standard: `false`*