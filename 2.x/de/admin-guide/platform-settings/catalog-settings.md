# Kurskatalog-Einstellungen

Verhalten des Kurskatalogs (die öffentliche Liste, in der Benutzer stöbern und sich selbst einschreiben können).

Greifen Sie auf diese Einstellungen unter **Verwaltung > Konfigurationseinstellungen > Kurskatalog** zu. Diese Kategorie enthält **13 Einstellungen**, die unten mit dem Titel und dem Kommentar aufgeführt sind, wie sie in den Standardeinstellungen der Plattform (`SettingsCurrentFixtures.php`) bereitgestellt werden.

> Der Variablenname im Code wird in Monospace angezeigt. Verwenden Sie ihn, wenn Sie über die API Skripte erstellen oder wenn Sie diese Einstellungen auf globaler Ebene ändern möchten, indem Sie [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) bearbeiten.

## Einstellungen

### `allow_session_auto_subscription`

**Automatische Sitzungsanmeldung**

Aktivieren Sie die automatische Anmeldung zu Sitzungen für Benutzer.

*Standard: `false`*

### `allow_students_to_browse_courses`

**Studenten das Durchsuchen erlauben**

Erlauben Sie Studenten, den Kurskatalog zu durchsuchen und zu filtern.

*Standard: `true`*

### `course_catalog_display_in_home`

**Katalog auf der Startseite anzeigen**

Zeigen Sie den Kurskatalog-Block auf der Startseite der Plattform an.

*Standard: `false`*

### `course_catalog_hide_private`

**Private Kurse ausblenden**

Schließen Sie private Kurse aus der Kataloganzeige aus.

*Standard: `true`*

### `course_catalog_published`

**Kurskatalog veröffentlichen**

Machen Sie den Kurskatalog für anonyme Benutzer (die allgemeine Öffentlichkeit) zugänglich, ohne dass eine Anmeldung erforderlich ist.

*Standard: `false`*

### `course_catalog_settings`

**Kurskatalog-Einstellungen**

JSON-Konfiguration für den Kurskatalog: Verlinkungseinstellungen, Filter, Sortieroptionen und mehr.

### `course_subscription_in_user_s_session`

**Anmeldung in der Sitzungsansicht**

Erlauben Sie Benutzern, sich direkt über ihre Sitzungsseite für Kurse anzumelden.

*Standard: `false`*

### `hide_public_link`

**Öffentlichen Link ausblenden**

Entfernen Sie den öffentlichen URL-Link von den Kurskarten.

*Standard: `false`*

### `only_show_course_from_selected_category`

**Nur passende Kategorien im Kurskatalog anzeigen**

Wenn nicht leer, werden nur die Kurse aus den angegebenen Kategorien im Kurskatalog angezeigt.

### `only_show_selected_courses`

**Nur ausgewählte Kurse**

Zeigen Sie nur manuell ausgewählte Kurse im Katalog an.

*Standard: `false`*

### `session_catalog_settings`

**Sitzungskatalog-Einstellungen**

JSON-Konfiguration für den Sitzungskatalog: Filter und Anzeigeoptionen.

### `show_courses_descriptions_in_catalog`

**Kursbeschreibungen anzeigen**

Zeigen Sie Kursbeschreibungen in der Katalogliste an.

*Standard: `false`*

### `show_courses_sessions`

**Kurse & Sitzungen anzeigen**

Schließen Sie sowohl Kurse als auch Sitzungen in die Katalogergebnisse ein.

*Standard: `0`*