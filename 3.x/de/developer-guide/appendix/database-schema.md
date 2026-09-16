# Datenbankschema

Chamilo 3.0 bildet eine große Menge von Doctrine-Entitäten auf Datenbanktabellen ab. Die genauen Anzahlen ändern sich zwischen den Releases — lesen Sie die unten aufgeführten Entitätsverzeichnisse für den aktuellen Stand.

## Speicherorte der Entitäten

| Bundle | Where | Prefix |
|--------|-------|--------|
| CoreBundle | `src/CoreBundle/Entity/` | None (e.g., `user`, `course`, `session`) |
| CourseBundle | `src/CourseBundle/Entity/` | `c_` (e.g., `c_document`, `c_quiz`, `c_lp`) |
| LtiBundle | `src/LtiBundle/Entity/` | `lti_` |

## Wichtige Tabellen

### Benutzer und Authentifizierung

| Table | Purpose |
|-------|---------|
| `user` | Benutzerkonten |
| `access_url` | Multi-URL-Portale |
| `access_url_rel_user` | Zuordnungen Benutzer–Portal |
| `usergroup` | Plattformweite Benutzergruppen |

### Kurse

| Table | Purpose |
|-------|---------|
| `course` | Kurse |
| `course_category` | Kurskategorien |
| `course_rel_user` | Kurseinschreibungen |

### Sessions

| Table | Purpose |
|-------|---------|
| `session` | Trainingssessions |
| `session_rel_user` | Session-Einschreibungen |
| `session_rel_course` | Kurse in Sessions |
| `session_rel_course_rel_user` | Benutzereinschreibung pro Session-Kurs |

### Ressourcensystem

| Table | Purpose |
|-------|---------|
| `resource_node` | Einheitliche Inhaltsabstraktion |
| `resource_file` | Dateianhänge |
| `resource_link` | Sichtbarkeit/Zugriff pro Kontext |
| `resource_type` | Registrierung der Ressourcentypen |

### Kursinhalte (Präfix c_)

| Table | Purpose |
|-------|---------|
| `c_document` | Dokumente |
| `c_quiz` | Übungen/Tests |
| `c_quiz_question` | Quizfragen |
| `c_quiz_answer` | Antworten auf Fragen |
| `c_lp` | Lernpfade |
| `c_lp_item` | Lernpfadelemente |
| `c_forum_category` | Forumkategorien |
| `c_forum_forum` | Foren |
| `c_forum_thread` | Forumthreads |
| `c_forum_post` | Forenbeiträge |
| `c_student_publication` | Aufgaben/Abgaben |
| `c_survey` | Umfragen |
| `c_glossary` | Glossarbegriffe |
| `c_calendar_event` | Kalenderereignisse |
| `c_attendance` | Anwesenheitslisten |

### Tracking

| Table | Purpose |
|-------|---------|
| `track_e_login` | Login-Tracking |
| `track_e_online` | Tracking online aktiver Benutzer |
| `track_e_default` | Generisches Aktivitäts-Tracking |
| `gradebook_category` | Notenbuchkategorien |
| `gradebook_result` | Noten |

### Einstellungen

| Table | Purpose |
|-------|---------|
| `settings` | Plattformeinstellungen |
| `settings_options` | Definitionen der Einstellungsoptionen |

## Migrationen

Änderungen am Datenbankschema werden über Doctrine Migrations in `src/CoreBundle/Migrations/` verwaltet. Führen Sie Migrationen aus mit:

```bash
php bin/console doctrine:migrations:migrate
```