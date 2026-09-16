# Einstellungen für Kompetenzen

Verhalten des **Kompetenzen**-Systems — Kompetenzbaum, Vergaberegeln, Profilintegration.

Greifen Sie auf diese Einstellungen unter **Verwaltung > Konfigurationseinstellungen > Kompetenzen** zu. Diese Kategorie enthält **13 Einstellungen**, die unten mit dem Titel und dem Kommentar aufgeführt sind, wie sie in den Standardeinstellungen der Plattform (`SettingsCurrentFixtures.php`) bereitgestellt werden.

> Der Variablenname im Code wird in Monospace angezeigt. Verwenden Sie ihn, wenn Sie über die API skripten oder wenn Sie diese Einstellungen auf globaler Ebene durch Bearbeiten von [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) ändern müssen.

## Einstellungen

### `allow_hr_skills_management`

**HR-Kompetenzverwaltung erlauben**

Ermöglicht es der Personalabteilung, Kompetenzen zu verwalten.

*Standard: `true`*

### `allow_private_skills`

**Kompetenzen vor Lernenden verbergen**

Wenn aktiviert, sind Kompetenzen nur für Administratoren, Lehrkräfte (die mit einem Benutzer über einen Kurs verbunden sind) und HRM-Benutzer (wenn sie mit einem Benutzer verbunden sind) sichtbar.

*Standard: `false`*

### `allow_skill_rel_items`

**Verknüpfung von Kompetenzen mit Elementen aktivieren**

Dies aktiviert eine wichtige Funktion, die es ermöglicht, jedes Element mit einer Kompetenz zu verknüpfen (und somit den Erwerb dieser Kompetenz zu erlauben). Die Funktion erfordert jedoch weiterhin, dass der Lehrende den Erwerb der Kompetenz bestätigt, sodass der Erwerb nicht automatisch erfolgt.

*Standard: `false`*

### `allow_skills_tool`

**Kompetenz-Tool erlauben**

Benutzer können ihre Kompetenzen im sozialen Netzwerk und in einem Block auf der Startseite sehen.

*Standard: `true`*

### `allow_teacher_access_student_skills`

**Lehrkräften Zugriff auf die Kompetenzen der Lernenden erlauben**

[abgeleitet] Ermöglicht es Lehrkräften, die von Lernenden in ihren Kursen erworbenen Kompetenzen einzusehen und zu überwachen.

*Standard: `false`*

### `badge_assignation_notification`

**Benachrichtigung an Lernende senden, wenn eine Kompetenz/Abzeichen erworben wurde**

[abgeleitet] Sendet Benachrichtigungen an Lernende, wenn sie eine neue Kompetenz oder ein Abzeichen erwerben.

*Standard: `false`*

### `hide_skill_levels`

**Kompetenzstufen-Funktion ausblenden**

[abgeleitet] Verbirgt die Hierarchie der Kompetenzstufen und die Stufenbezeichnungen in Ansichten, die mit Kompetenzen zusammenhängen.

*Standard: `false`*

### `manual_assignment_subskill_autoload`

**Kompetenzen einem Benutzer zuweisen: Automatisches Laden von Unterkompetenzen**

Beim manuellen Zuweisen von Kompetenzen zu einem Benutzer kann das Formular so eingestellt werden, dass automatisch angeboten wird, eine Unterkompetenz anstelle der ausgewählten Kompetenz zuzuweisen.

*Standard: `false`*

### `openbadges_backpack`

**OpenBadges Backpack-URL**

Die URL des OpenBadges-Backpack-Servers, der standardmäßig für alle Benutzer verwendet wird, die ihre Abzeichen exportieren möchten. Standardmäßig wird das offene und kostenlose Backpack-Repository der Mozilla Foundation verwendet: https://backpack.openbadges.org/

### `show_full_skill_name_on_skill_wheel`

**Vollständigen Kompetenznamen im Kompetenzrad anzeigen**

Im Kompetenzrad wird der Name der Kompetenz angezeigt, wenn sie einen Kurzcode hat.

*Standard: `false`*

### `skill_levels_names`

**Namen der Kompetenzstufen**

Definieren Sie Namen für die Stufen der Kompetenzen als Array von id => name.

### `skills_hierarchical_view_in_user_tracking`

**Kompetenzen als hierarchische Tabelle anzeigen**

[abgeleitet] Zeigt die Kompetenzen der Lernenden als hierarchische Baumstruktur auf Fortschritts- und Berichtsseiten an.

*Standard: `false`*

### `skills_teachers_can_assign_skills`

**Lehrkräften erlauben, festzulegen, welche Kompetenzen durch ihre Kurse erworben werden können**

Standardmäßig können nur Administratoren entscheiden, welche Kompetenzen durch welchen Kurs erworben werden können.

*Standard: `false`*