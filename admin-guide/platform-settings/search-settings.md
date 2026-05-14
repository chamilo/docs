# Such-Einstellungen

Konfiguration des Volltextsuchsystems (Xapian).

Greifen Sie auf diese Einstellungen unter **Verwaltung > Konfigurationseinstellungen > Suche** zu. Diese Kategorie enthält **3 Einstellungen**, die unten mit dem Titel und Kommentar aufgeführt sind, wie sie in den Standardeinstellungen der Plattform (`SettingsCurrentFixtures.php`) bereitgestellt werden.

> Der Variablenname im Code wird in Monospace angezeigt. Verwenden Sie ihn, wenn Sie über die API skripten oder wenn Sie diese Einstellungen auf globaler Ebene ändern müssen, indem Sie [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) bearbeiten.

## Einstellungen

### `search_enabled`

**Volltextsuchfunktion**

Wählen Sie 'Ja', um diese Funktion zu aktivieren. Sie ist stark abhängig von der Xapian-Erweiterung für PHP, daher funktioniert dies nicht, wenn diese Erweiterung nicht auf Ihrem Server installiert ist, mindestens in Version 1.x.

*Standard: `false`*

### `search_prefilter_prefix`

**Spezifisches Feld für Vorfilter**

Mit dieser Option können Sie das spezifische Feld auswählen, das für die Vorfiltersuchart verwendet werden soll.

### `search_show_unlinked_results`

**Volltextsuche: Nicht verknüpfte Ergebnisse anzeigen**

Was soll mit den Ergebnissen geschehen, die für den aktuellen Benutzer nicht zugänglich sind, wenn die Ergebnisse einer Volltextsuche angezeigt werden?

*Standard: `true`*