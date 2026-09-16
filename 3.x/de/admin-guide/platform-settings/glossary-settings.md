# Glossar-Einstellungen

Verhalten des Kurswerkzeugs **Glossar**.

Zugang zu diesen Einstellungen unter **Administration > Konfigurationseinstellungen > Glossar**. Diese Kategorie enthält **3 Einstellungen**, die nachfolgend mit dem Titel und dem Kommentar aufgeführt sind, die in den Einstellungs-Fixtures der Plattform (`SettingsCurrentFixtures.php`) mitgeliefert werden.

> Der Variablenname im Code wird in Monospace dargestellt. Verwenden Sie ihn beim Skripten über die API oder wenn Sie diese Einstellungen global ändern müssen, indem Sie [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) bearbeiten.

## Einstellungen

### `allow_remove_tags_in_glossary_export`

**HTML-Tags beim Glossar-Export entfernen**

Wenn aktiviert, werden HTML-Tags aus den Definitionen der Glossarbegriffe beim Export entfernt.

*Standard: `false`*

### `default_glossary_view`

**Standardansicht des Glossars**

Wählen Sie, welche Ansicht ('table' oder 'list') standardmäßig im Glossar-Werkzeug verwendet wird.

*Standard: `table`*

### `show_glossary_in_extra_tools`

**Glossarbegriffe in zusätzlichen Werkzeugen anzeigen**

Hier können Sie festlegen, wie die Glossarbegriffe in zusätzlichen Werkzeugen wie Lernpfad und Übungs-Werkzeug hinzugefügt werden.