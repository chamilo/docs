# Gruppeneinstellungen

Verhalten des Kurs-Tools **Gruppen**.

Greifen Sie auf diese Einstellungen unter **Administration > Konfigurationseinstellungen > Gruppen** zu. Diese Kategorie enthält **3 Einstellungen**, die nachfolgend mit dem Titel und dem Kommentar aufgeführt sind, wie sie in den Einstellungs-Fixtures der Plattform (`SettingsCurrentFixtures.php`) enthalten sind.

> Der Variablenname im Code wird in Monospace dargestellt. Verwenden Sie ihn beim Skripten über die API oder wenn Sie diese Einstellungen global ändern müssen, indem Sie [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) bearbeiten.

## Einstellungen

### `allow_group_categories`

**Gruppenkategorien**

Lehrenden das Anlegen von Kategorien im Gruppen-Tool erlauben?

*Standard: `false`*


### `hide_course_group_if_no_tools_available`

**Kursgruppe ausblenden, wenn kein Tool vorhanden**

Wenn in einer Gruppe kein Tool verfügbar ist und der Benutzer nicht in der Gruppe selbst registriert ist, die Gruppe in der Gruppenliste vollständig ausblenden.

*Standard: `false`*


### `show_groups_to_users`

**Klassen für Benutzer anzeigen**

Die Klassen den Benutzern anzeigen. Klassen sind eine Funktion, mit der Sie Gruppen von Benutzern direkt in einer Sitzung oder einem Kurs an- bzw. abmelden können, wodurch der administrative Aufwand reduziert wird. Wenn Sie diese Option wählen, können Lernende über ihre soziale Netzwerkschnittstelle sehen, in welcher Klasse sie sich befinden.

*Standard: `false`*