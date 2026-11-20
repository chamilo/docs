# Kompetenzen

Der Block **Kompetenzen** im Administrations-Dashboard gruppiert die Werkzeuge zum Definieren, Organisieren und Nachverfolgen von Kompetenzabzeichen („Skills“) auf der gesamten Plattform. Eine Kompetenz kann automatisch vergeben werden, wenn eine lernende Person einen Schwellenwert im Notenbuch erreicht oder bestimmte Kurse abschließt, oder manuell durch eine Lehrkraft, und kann ein abzeichenartiges Symbol sowie eine Stufe (zum Beispiel Bronze/Silber/Gold) tragen.

![Der Block Kompetenzen im Administrations-Dashboard mit den Einträgen Kompetenzrad, Kompetenzen importieren, Kompetenzen verwalten, Kompetenzstufen verwalten, Kompetenzrangliste sowie Kompetenzen und Bewertungen](../../.gitbook/assets/admin-skills-block.png)

Der gesamte Block erscheint nur, wenn die Einstellung **Kompetenzwerkzeug aktivieren** (`skill.allow_skills_tool`, unter Konfigurationseinstellungen > Kompetenzen) aktiviert ist — sie ist standardmäßig aktiviert.

## Auf den Kompetenzen-Block zugreifen

Im Administrationsbereich erscheint der Block **Kompetenzen** neben den anderen Dashboard-Blöcken. Klicken Sie auf einen seiner Links, um das entsprechende Werkzeug zu öffnen.

## Inhalt des Blocks

* **[Kompetenzen verwalten](managing-skills.md)** — Kompetenzen anlegen, gesammelt importieren und jeweils einer Stufenskala zuordnen
* **[Kompetenzrad](skills-wheel.md)** — Eine zoomfähige visuelle Karte des gesamten Kompetenzbaums
* **[Kompetenzrangliste](skills-ranking.md)** — Eine Rangliste der Benutzer nach erworbenen Kompetenzen
* **[Kompetenzen und Bewertungen](skills-assessments.md)** — Notenbuchkategorien mit den Kompetenzen verknüpfen, die sie vergeben

## Zugehörige Einstellungen

Einige weitere Einstellungen unter Konfigurationseinstellungen > Kompetenzen legen fest, wer mit diesem Block was tun darf:

* **HR-Kompetenzverwaltung zulassen** (`allow_hr_skills_management`) — Ermöglicht Benutzern mit der Rolle Human Resources Manager, Kompetenzen neben Administratoren zu verwalten
* **Private Kompetenzen zulassen** (`allow_private_skills`)
* **Lehrkräfte können Kompetenzen zuweisen** (`skills_teachers_can_assign_skills`)
* **Kompetenzstufen ausblenden** (`hide_skill_levels`)
* **Vollständigen Kompetenznamen im Kompetenzrad anzeigen** (`show_full_skill_name_on_skill_wheel`)