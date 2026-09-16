# Kompetenz-Einstellungen

Verhalten des **Kompetenz**-Systems — Kompetenzbaum, Vergaberegeln, Profilintegration.

Diese Einstellungen finden Sie unter **Administration > Konfigurationseinstellungen > Kompetenzen**. Diese Kategorie enthält **13 Einstellungen**, die nachfolgend mit Titel und Kommentar aus den Einstellungs-Fixtures der Plattform (`SettingsCurrentFixtures.php`) aufgeführt sind.

> Der Variablenname im Code wird in Monospace dargestellt. Verwenden Sie ihn beim Skripten über die API oder wenn Sie diese Einstellungen global ändern möchten, indem Sie [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) bearbeiten.

## Einstellungen

### `allow_hr_skills_management`

**HR-Kompetenzverwaltung zulassen**

Ermöglicht der Personalabteilung (HR) die Verwaltung von Kompetenzen

*Standard: `true`*


### `allow_private_skills`

**Kompetenzen vor Lernenden verbergen**

Wenn aktiviert, sind Kompetenzen nur für Administratoren, Lehrende (bezogen auf einen Benutzer über einen Kurs) und HRM-Benutzer (falls einem Benutzer zugeordnet) sichtbar.

*Standard: `false`*


### `allow_skill_rel_items`

**Verknüpfung von Kompetenzen mit Elementen aktivieren**

Aktiviert eine wesentliche Funktion, mit der jedes Element mit einer Kompetenz verknüpft werden kann (und so deren Erwerb ermöglicht). Die Funktion erfordert weiterhin die Bestätigung des Kompetenzerwerbs durch die Lehrkraft; der Erwerb erfolgt also nicht automatisch.

*Standard: `false`*


### `allow_skills_tool`

**Kompetenz-Werkzeug zulassen**

Benutzer können ihre Kompetenzen im sozialen Netzwerk und in einem Block auf der Startseite einsehen.

*Standard: `true`*

### `allow_teacher_access_student_skills`

**Lehrenden Zugriff auf Kompetenzen der Lernenden gewähren**

[inferred] Ermöglicht Lehrenden, die von Lernenden in ihren Kursen erworbenen Kompetenzen einzusehen und zu überwachen.

*Standard: `false`*


### `badge_assignation_notification`

**Benachrichtigung an Lernende senden, wenn eine Kompetenz/ein Badge erworben wurde**

[inferred] Sendet Benachrichtigungen an Lernende, wenn sie eine neue Kompetenz oder eine Badge-Auszeichnung erwerben.

*Standard: `false`*


### `hide_skill_levels`

**Funktion der Kompetenzstufen ausblenden**

[inferred] Blendet die Hierarchie der Kompetenzstufen und die Stufenbezeichnungen in kompetenzbezogenen Ansichten aus.

*Standard: `false`*


### `manual_assignment_subskill_autoload`

**Kompetenzen einem Benutzer zuweisen: automatisches Laden von Unterkompetenzen**

Beim manuellen Zuweisen von Kompetenzen an einen Benutzer kann das Formular so eingestellt werden, dass automatisch das Zuweisen einer Unterkompetenz anstelle der ausgewählten Kompetenz angeboten wird.

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

[inferred] Zeigt die Kompetenzen der Lernenden als hierarchische Baumstruktur auf Fortschritts- und Berichtsseiten an.

*Standard: `false`*


### `skills_teachers_can_assign_skills`

**Lehrenden erlauben festzulegen, welche Kompetenzen über ihre Kurse erworben werden**

Standardmäßig können nur Administratoren festlegen, welche Kompetenzen über welchen Kurs erworben werden können.

*Standard: `false`*