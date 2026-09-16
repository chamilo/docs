# Glossar-Einstellungen

Verhalten des Kurs-**Glossar**-Tools.

Greifen Sie auf diese Einstellungen unter **Verwaltung > Konfigurationseinstellungen > Glossar** zu. Diese Kategorie enthält **3 Einstellungen**, die unten mit dem Titel und dem Kommentar aufgeführt sind, wie sie in den Standardeinstellungen der Plattform (`SettingsCurrentFixtures.php`) bereitgestellt werden.

> Der Variablenname im Code wird in Monospace angezeigt. Verwenden Sie ihn, wenn Sie über die API skripten oder wenn Sie diese Einstellungen auf globaler Ebene ändern möchten, indem Sie [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) bearbeiten.

## Einstellungen

### `allow_remove_tags_in_glossary_export`

**HTML-Tags beim Glossar-Export entfernen**

Wenn aktiviert, werden HTML-Tags aus den Definitionen der Glossarbegriffe beim Exportieren entfernt.

*Standard: `false`*

### `default_glossary_view`

**Standard-Glossaransicht**

Wählen Sie aus, welche Ansicht ('table' oder 'list') standardmäßig im Glossar-Tool verwendet wird.

*Standard: `table`*

### `show_glossary_in_extra_tools`

**Glossarbegriffe in zusätzlichen Tools anzeigen**

Von hier aus können Sie konfigurieren, wie die Glossarbegriffe in zusätzlichen Tools wie Lernpfad und Übungstool hinzugefügt werden.