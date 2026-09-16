# Datenbankschema

Chamilo 2.0 bildet eine große Menge an Doctrine-Entitäten auf Datenbanktabellen ab. Die genauen Zahlen variieren zwischen den Versionen — lesen Sie die unten aufgeführten Entitätsverzeichnisse für den aktuellen Stand.

## Speicherorte der Entitäten

| Bundle | Wo | Präfix |
|--------|-------|--------|
| CoreBundle | `src/CoreBundle/Entity/` | Kein (z. B. `user`, `course`, `session`) |
| CourseBundle | `src/CourseBundle/Entity/` | `c_` (z. B. `c_document`, `c_quiz`, `c_lp`) |
| LtiBundle | `src/LtiBundle/Entity/` | `lti_` |

## Wichtige Tabellen

### Benutzer und Authentifizierung

| Tabelle | Zweck |
|-------|---------|
| `user` | Benutzerkonten |
| `access_url` | Multi-URL-Portale |
| `access_url_rel_user` | Benutzer-Portal-Zuweisungen |
| `usergroup` | Plattformweite Benutzergruppen |

### Kurse

| Tabelle | Zweck |
|-------|---------|
| `course` | Kurse |
| `course_category` | Kurskategorien |
| `course_rel_user` | Kurseinschreibungen |

### Sitzungen

| Tabelle | Zweck |
|-------|---------|
| `session` | Trainingssitzungen |
| `session_rel_user` | Sitzungseinschreibungen |
| `session_rel_course` | Kurse in Sitzungen |
| `session_rel_course_rel_user` | Benutzereinschreibung pro Sitzung-Kurs |

### Ressourcensystem

| Tabelle | Zweck |
|-------|---------|
| `resource_node` | Einheitliche Inhaltsabstraktion |
| `resource_file` | Dateianhänge |
| `resource_link` | Sichtbarkeit/Zugriff pro Kontext |
| `resource_type` | Ressourcentyp-Registrierung |

### Kursinhalte (Präfix c_)

| Tabelle | Zweck |
|-------|---------|
| `c_document` | Dokumente |
| `c_quiz` | Übungen/Tests |
| `c_quiz_question` | Quizfragen |
| `c_quiz_answer` | Antworten auf Fragen |
| `c_lp` | Lernpfade |
| `c_lp_item` | Lernpfad-Elemente |
| `c_forum_category` | Forumskategorien |
| `c_forum_forum` | Foren |
| `c_forum_thread` | Forumsthemen |
| `c_forum_post` | Forenbeiträge |
| `c_student_publication` | Aufgaben/Einreichungen |
| `c_survey` | Umfragen |
| `c_glossary` | Glossarbegriffe |
| `c_calendar_event` | Kalenderereignisse |
| `c_attendance` | Anwesenheitslisten |

### Nachverfolgung

| Tabelle | Zweck |
|-------|---------|
| `track_e_login` | Login-Tracking |
| `track_e_online` | Online-Benutzer-Tracking |
| `track_e_default` | Generisches Aktivitäts-Tracking |
| `gradebook_category` | Notenbuch-Kategorien |
| `gradebook_result` | Noten |

### Einstellungen

| Tabelle | Zweck |
|-------|---------|
| `settings` | Plattformeinstellungen |
| `settings_options` | Definitionen von Einstellungsoptionen |

## Migrationen

Änderungen am Datenbankschema werden durch Doctrine Migrations in `src/CoreBundle/Migrations/` verwaltet. Führen Sie Migrationen mit folgendem Befehl aus:

```bash
php bin/console doctrine:migrations:migrate
```