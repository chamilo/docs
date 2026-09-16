# Sucheinstellungen

Konfiguration des Volltextsuchsystems (Xapian).

Zugriff auf diese Einstellungen unter **Administration > Konfigurationseinstellungen > Suche**. Diese Kategorie enthält **3 Einstellungen**, die nachfolgend mit dem Titel und dem Kommentar aufgeführt sind, die in den Einstellungs-Fixtures der Plattform (`SettingsCurrentFixtures.php`) mitgeliefert werden.

> Der Variablenname im Code wird in Monospace dargestellt. Verwenden Sie ihn beim Skripten über die API oder wenn Sie diese Einstellungen global ändern müssen, indem Sie [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) bearbeiten.

## Einstellungen

### `search_enabled`

**Volltextsuche-Funktion**

Wählen Sie „Ja“, um diese Funktion zu aktivieren. Sie ist stark von der Xapian-Erweiterung für PHP abhängig; ohne Installation dieser Erweiterung auf Ihrem Server (mindestens Version 1.x) funktioniert sie nicht.

*Standard: `false`*


### `search_prefilter_prefix`

**Spezifisches Feld für den Vorfilter**

Mit dieser Option können Sie das spezifische Feld auswählen, das beim Vorfilter-Suchtyp verwendet werden soll.

### `search_show_unlinked_results`

**Volltextsuche: nicht verknüpfte Ergebnisse anzeigen**

Was soll beim Anzeigen der Ergebnisse einer Volltextsuche mit den Ergebnissen geschehen, auf die der aktuelle Benutzer keinen Zugriff hat?

*Standard: `true`*