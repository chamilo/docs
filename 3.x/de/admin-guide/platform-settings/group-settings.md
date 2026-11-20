# Gruppeneinstellungen

Verhalten des Kurswerkzeugs **Gruppen**.

Diese Einstellungen finden Sie unter **Administration > Konfigurationseinstellungen > Gruppen**. Diese Kategorie enthält **4 Einstellungen**, die unten mit dem Titel und dem Kommentar aufgeführt sind, die in den Einstellungs-Fixtures der Plattform (`SettingsCurrentFixtures.php`) mitgeliefert werden.

> Der Variablenname im Code wird in Festbreitenschrift angezeigt. Verwenden Sie ihn beim Skripten über die API oder wenn Sie diese Einstellungen auf globaler Ebene ändern müssen, indem Sie [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) bearbeiten.

## Einstellungen

### `allow_group_categories`

**Gruppenkategorien**

Lehrkräften erlauben, im Werkzeug Gruppen Kategorien zu erstellen?

*Standard: `false`*


### `allow_invite_non_friends_to_social_groups`

**Einladen von Nicht-Freunden in soziale Gruppen erlauben**

Nur eine Plattformadministration oder die Administration bzw. Moderation einer sozialen Gruppe kann Personen dorthin einladen (**Soziales Netzwerk > Gruppen >** die Gruppe **> Freunde einladen**). Diese Einstellung steuert, wen sie einladen können.

* **Aus (Standard)** — die Gruppenadministration oder -moderation kann nur die eigenen bestätigten Freunde einladen. Das Einladungsformular listet nur diese Freunde auf, und der Server lehnt auch jeden anderen Benutzer ab, selbst wenn einer manuell übermittelt wird: Es wird eine Warnung „Einige der ausgewählten Benutzer können nicht eingeladen werden und wurden übersprungen“ angezeigt. Ausstehende Freundschaftsanfragen zählen nicht als Freunde.
* **Ein** — sie können auch jeden anderen Benutzer der Plattform einladen. Unter der Freundesliste des Einladungsformulars erscheint ein zusätzliches Suchfeld **Benutzer**.

Dieselbe Regel gilt für den Gruppeneinladungsbildschirm der neuen sozialen Oberfläche.

Variable: `group.allow_invite_non_friends_to_social_groups`

**Bestehende Installationen:** Die Einstellungszeile wird durch erneutes Ausführen der Migrationssynchronisation der Einstellungen erstellt (`doctrine:migrations:execute 'Chamilo\CoreBundle\Migrations\Schema\V310\Version20261023140000' --up`). Bis dahin verhält sich die Einstellung wie „Aus“ und erscheint nicht auf der Administrationsseite.

*Standard: `false`*


### `hide_course_group_if_no_tools_available`

**Kursgruppe ausblenden, wenn kein Werkzeug**

Wenn in einer Gruppe kein Werkzeug verfügbar ist und der Benutzer nicht in der Gruppe selbst eingeschrieben ist, die Gruppe in der Gruppenliste vollständig ausblenden.

*Standard: `false`*


### `show_groups_to_users`

**Klassen für Benutzer anzeigen**

Die Klassen für Benutzer anzeigen. Klassen sind eine Funktion, mit der Sie Benutzergruppen direkt in einer Sitzung oder einem Kurs an- und abmelden können, wodurch der administrative Aufwand verringert wird. Wenn Sie diese Option wählen, können Lernende über ihre Oberfläche des sozialen Netzwerks sehen, in welcher Klasse sie sich befinden.

*Standard: `false`*