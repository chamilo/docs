# Einstellungen zu Kompetenzen

Verhalten des Systems **Kompetenzen** — Kompetenzbaum, Vergaberegeln, Profilintegration.

Diese Einstellungen finden Sie unter **Administration > Konfigurationseinstellungen > Kompetenzen**. Diese Kategorie enthält **13 Einstellungen**, die unten mit dem Titel und dem Kommentar aufgeführt sind, die in den Einstellungs-Fixtures der Plattform (`SettingsCurrentFixtures.php`) mitgeliefert werden.

> Der Variablenname im Code wird in Festbreitenschrift angezeigt. Verwenden Sie ihn beim Skripten über die API oder wenn Sie diese Einstellungen auf globaler Ebene ändern müssen, indem Sie [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) bearbeiten.

## Einstellungen

### `allow_hr_skills_management`

**HR-Kompetenzverwaltung zulassen**

Ermöglicht der Personalabteilung die Verwaltung von Kompetenzen

*Standard: `true`*


### `allow_private_skills`

**Kompetenzen vor Lernenden verbergen**

Wenn aktiviert, sind Kompetenzen nur für Administratoren, Lehrkräfte (die über einen Kurs mit einem Benutzer verknüpft sind) und HRM-Benutzer (sofern mit einem Benutzer verknüpft) sichtbar.

*Standard: `false`*


### `allow_skill_rel_items`

**Verknüpfung von Kompetenzen mit Elementen aktivieren**

Dies aktiviert eine umfangreiche Funktion, mit der jedes Element mit einer Kompetenz verknüpft werden kann (und damit deren Erwerb ermöglicht). Die Funktion erfordert weiterhin, dass die Lehrkraft den Erwerb der Kompetenz bestätigt; der Erwerb erfolgt also nicht automatisch.

*Standard: `false`*


### `allow_skills_tool`

**Kompetenzwerkzeug zulassen**

Benutzer können ihre Kompetenzen im sozialen Netzwerk und in einem Block auf der Startseite sehen.

*Standard: `true`*

### `allow_teacher_access_student_skills`

**Lehrkräften den Zugriff auf die Kompetenzen der Lernenden erlauben**

[abgeleitet] Lehrkräften erlauben, die von Lernenden in ihren Kursen erworbenen Kompetenzen einzusehen und zu überwachen.

*Standard: `false`*


### `badge_assignation_notification`

**Benachrichtigung an Lernende senden, wenn eine Kompetenz/ein Badge erworben wurde**

[abgeleitet] Benachrichtigungen an Lernende senden, wenn sie eine neue Kompetenz oder einen Badge erwerben.

*Standard: `false`*


### `hide_skill_levels`

**Funktion für Kompetenzstufen ausblenden**

[abgeleitet] Die Hierarchie der Kompetenzstufen und die Stufenbezeichnungen in kompetenzbezogenen Ansichten ausblenden.

*Standard: `false`*


### `manual_assignment_subskill_autoload`

**Kompetenzen Benutzern zuweisen: automatisches Laden von Teilkompetenzen**

Beim manuellen Zuweisen von Kompetenzen an einen Benutzer wählen Sie die Kompetenz Stufe für Stufe im Kompetenzbaum aus, anstatt in einer einzigen Liste. Die erste Liste zeigt nur die Kompetenzen der ersten Stufe; die Auswahl einer Kompetenz fügt eine Liste mit ihren Teilkompetenzen hinzu, und so weiter. Die zugewiesene Kompetenz ist die tiefste ausgewählte, sodass Sie auf jeder Stufe anhalten können. Kompetenzen, die nicht erwerbbar sind, werden ebenfalls aufgeführt, um ihre Teilkompetenzen zu erreichen, können aber nicht zugewiesen werden. Die Listen sind mit den in `skill_levels_names` festgelegten Namen beschriftet, sofern diese gesetzt sind. Siehe [Manuelle Kompetenzzuweisung](../skills/managing-skills.md#manual-skill-assignment).

*Standard: `false`*


### `openbadges_backpack`

**OpenBadges-Backpack-URL**

Die URL des OpenBadges-Backpack-Servers, der standardmäßig für alle Benutzer verwendet wird, die ihre Badges exportieren möchten. Standardmäßig wird das offene und kostenlose Backpack-Repository der Mozilla Foundation verwendet: https://backpack.openbadges.org/

### `show_full_skill_name_on_skill_wheel`

**Vollständigen Kompetenznamen im Kompetenzrad anzeigen**

Im Kompetenzrad wird der Name der Kompetenz angezeigt, wenn sie einen Kurzcode hat.

*Standard: `false`*


### `skill_levels_names`

**Namen der Kompetenzstufen**

Definieren Sie Namen für Kompetenzstufen als Array von id => name.

### `skills_hierarchical_view_in_user_tracking`

**Kompetenzen als hierarchische Tabelle anzeigen**

[abgeleitet] Kompetenzen der Lernenden als hierarchische Baumstruktur auf Fortschritts- und Berichtsseiten anzeigen.

*Standard: `false`*


### `skills_teachers_can_assign_skills`

**Lehrkräften erlauben festzulegen, welche Kompetenzen über ihre Kurse erworben werden**

Standardmäßig können nur Administratoren festlegen, welche Kompetenzen über welchen Kurs erworben werden können.

*Standard: `false`*