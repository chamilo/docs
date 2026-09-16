# Einstellungen des Kurskatalogs

Verhalten des Kurskatalogs (die öffentliche Liste, in der Benutzer Kurse durchsuchen und sich selbst einschreiben können).

Diese Einstellungen finden Sie unter **Administration > Konfigurationseinstellungen > Kurskatalog**. Diese Kategorie enthält **13 Einstellungen**, die nachfolgend mit Titel und Kommentar aufgeführt sind, wie sie in den Einstellungs-Fixtures der Plattform (`SettingsCurrentFixtures.php`) mitgeliefert werden.

> Der Variablenname im Code wird in Monospace dargestellt. Verwenden Sie ihn beim Skripten über die API oder wenn Sie diese Einstellungen global ändern müssen, indem Sie [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) bearbeiten.

## Einstellungen

### `allow_session_auto_subscription`

**Automatische Sitzungsanmeldung**

Automatische Anmeldung von Benutzern zu Sitzungen aktivieren.

*Standard: `false`*

### `allow_students_to_browse_courses`

**Kursdurchsuchen für Studierende erlauben**

Studierenden erlauben, den Kurskatalog zu durchsuchen und zu filtern.

*Standard: `true`*

### `course_catalog_display_in_home`

**Katalog auf der Startseite anzeigen**

Den Kurskatalog-Block auf der Startseite der Plattform anzeigen.

*Standard: `false`*

### `course_catalog_hide_private`

**Private Kurse ausblenden**

Private Kurse aus der Kataloganzeige ausschließen.

*Standard: `true`*

### `course_catalog_published`

**Kurskatalog veröffentlichen**

Den Kurskatalog für anonyme Benutzer (die allgemeine Öffentlichkeit) ohne Anmeldung verfügbar machen.

*Standard: `false`*

### `course_catalog_settings`

**Einstellungen des Kurskatalogs**

JSON-Konfiguration für den Kurskatalog: Link-Einstellungen, Filter, Sortieroptionen und mehr.

### `course_subscription_in_user_s_session`

**Anmeldung in der Sitzungsansicht**

Benutzern erlauben, sich direkt von ihrer Sitzungsseite aus für Kurse anzumelden.

*Standard: `false`*

### `hide_public_link`

**Öffentlichen Link ausblenden**

Den öffentlichen URL-Link von Kurskarten entfernen.

*Standard: `false`*

### `only_show_course_from_selected_category`

**Nur passende Kategorien im Kurskatalog anzeigen**

Wenn nicht leer, erscheinen im Kurskatalog nur die Kurse der angegebenen Kategorien.

### `only_show_selected_courses`

**Nur ausgewählte Kurse**

Im Katalog nur manuell ausgewählte Kurse anzeigen.

*Standard: `false`*

### `session_catalog_settings`

**Einstellungen des Sitzungskatalogs**

JSON-Konfiguration für den Sitzungskatalog: Filter und Anzeigeoptionen.

### `show_courses_descriptions_in_catalog`

**Kursbeschreibungen anzeigen**

Kursbeschreibungen in der Katalogauflistung anzeigen.

*Standard: `false`*

### `show_courses_sessions`

**Kurse und Sitzungen anzeigen**

Sowohl Kurse als auch Sitzungen in den Katalogergebnissen einbeziehen.

*Standard: `0`*