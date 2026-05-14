# Gruppeneinstellungen

Verhalten des Kurs-Tools **Gruppen**.

Greifen Sie auf diese Einstellungen unter **Verwaltung > Konfigurationseinstellungen > Gruppen** zu. Diese Kategorie enthält **3 Einstellungen**, die unten mit dem Titel und dem Kommentar aufgeführt sind, wie sie in den Standardeinstellungen der Plattform (`SettingsCurrentFixtures.php`) bereitgestellt werden.

> Der Variablenname im Code wird in Monospace angezeigt. Verwenden Sie ihn, wenn Sie über die API skripten oder wenn Sie diese Einstellungen auf globaler Ebene ändern müssen, indem Sie [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) bearbeiten.

## Einstellungen

### `allow_group_categories`

**Gruppenkategorien**

Erlauben Sie Lehrern, Kategorien im Gruppen-Tool zu erstellen?

*Standard: `false`*

### `hide_course_group_if_no_tools_available`

**Kursgruppe ausblenden, wenn kein Tool verfügbar**

Wenn kein Tool in einer Gruppe verfügbar ist und der Benutzer nicht in der Gruppe selbst registriert ist, wird die Gruppe in der Gruppenliste vollständig ausgeblendet.

*Standard: `false`*

### `show_groups_to_users`

**Klassen für Benutzer anzeigen**

Zeigen Sie den Benutzern die Klassen an. Klassen sind eine Funktion, die es ermöglicht, Gruppen von Benutzern direkt in eine Sitzung oder einen Kurs einzutragen oder abzumelden, wodurch der administrative Aufwand reduziert wird. Wenn Sie diese Option wählen, können Lernende über ihre soziale Netzwerkschnittstelle sehen, in welcher Klasse sie sich befinden.

*Standard: `false`*