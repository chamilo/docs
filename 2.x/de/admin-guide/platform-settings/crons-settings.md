# Einstellungen für Cron-Jobs

Konfiguration von geplanten Aufgaben (Cron-Tasks), die mit Chamilo ausgeliefert werden.

Greifen Sie auf diese Einstellungen unter **Verwaltung > Konfigurationseinstellungen > Cron-Jobs** zu. Diese Kategorie enthält **3 Einstellungen**, die unten mit dem Titel und Kommentar aufgeführt sind, wie sie in den Einstellungs-Fixtures der Plattform (`SettingsCurrentFixtures.php`) bereitgestellt werden.

> Der Variablenname im Code wird in Monospace angezeigt. Verwenden Sie ihn, wenn Sie über die API skripten oder wenn Sie diese Einstellungen auf globaler Ebene ändern möchten, indem Sie [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) bearbeiten.

## Einstellungen

### `cron_remind_course_expiration_activate`

**Erinnerung an Kursablauf-Cron**

Aktivieren Sie den Cron für die Erinnerung an den Kursablauf

*Standard: `false`*

### `cron_remind_course_expiration_frequency`

**Häufigkeit für den Cron zur Erinnerung an den Kursablauf**

Anzahl der Tage vor dem Ablauf des Kurses, die berücksichtigt werden sollen, um eine Erinnerungs-E-Mail zu senden

### `cron_remind_course_finished_activate`

**Benachrichtigung über abgeschlossenen Kurs senden**

Ob eine E-Mail an Studierende gesendet werden soll, wenn ihr Kurs (Sitzung) abgeschlossen ist. Dies erfordert, dass Cron-Tasks konfiguriert sind (siehe Verzeichnis main/cron/).

*Standard: `false`*