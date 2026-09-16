# Database Schema

Chamilo 2.0 koppelt een grote set Doctrine-entiteiten aan databasetabellen. Het exacte aantal varieert tussen releases — raadpleeg de onderstaande entiteitmappen voor de huidige stand van zaken.

## Locaties van Entiteiten

| Bundle | Waar | Voorvoegsel |
|--------|------|-------------|
| CoreBundle | `src/CoreBundle/Entity/` | Geen (bijv. `user`, `course`, `session`) |
| CourseBundle | `src/CourseBundle/Entity/` | `c_` (bijv. `c_document`, `c_quiz`, `c_lp`) |
| LtiBundle | `src/LtiBundle/Entity/` | `lti_` |

## Belangrijke Tabellen

### Gebruiker en Authenticatie

| Tabel | Doel |
|-------|------|
| `user` | Gebruikersaccounts |
| `access_url` | Multi-URL-portalen |
| `access_url_rel_user` | Gebruiker-portaaltoewijzingen |
| `usergroup` | Platformbrede gebruikersgroepen |

### Cursussen

| Tabel | Doel |
|-------|------|
| `course` | Cursussen |
| `course_category` | Cursuscategorieën |
| `course_rel_user` | Cursusinschrijvingen |

### Sessies

| Tabel | Doel |
|-------|------|
| `session` | Trainingssessies |
| `session_rel_user` | Sessie-inschrijvingen |
| `session_rel_course` | Cursussen in sessies |
| `session_rel_course_rel_user` | Gebruikersinschrijving per sessie-cursus |

### Bronnensysteem

| Tabel | Doel |
|-------|------|
| `resource_node` | Uniforme inhoudsabstractie |
| `resource_file` | Bestandsbijlagen |
| `resource_link` | Zichtbaarheid/toegang per context |
| `resource_type` | Register van brontypen |

### Cursusinhoud (c_ voorvoegsel)

| Tabel | Doel |
|-------|------|
| `c_document` | Documenten |
| `c_quiz` | Oefeningen/tests |
| `c_quiz_question` | Quizvragen |
| `c_quiz_answer` | Antwoorden op vragen |
| `c_lp` | Leertrajecten |
| `c_lp_item` | Items in leertrajecten |
| `c_forum_category` | Forumcategorieën |
| `c_forum_forum` | Forums |
| `c_forum_thread` | Forumthreads |
| `c_forum_post` | Forumberichten |
| `c_student_publication` | Opdrachten/inzendingen |
| `c_survey` | Enquêtes |
| `c_glossary` | Woordenlijsttermen |
| `c_calendar_event` | Kalendergebeurtenissen |
| `c_attendance` | Aanwezigheidslijsten |

### Tracking

| Tabel | Doel |
|-------|------|
| `track_e_login` | Inlogtracking |
| `track_e_online` | Tracking van online gebruikers |
| `track_e_default` | Algemene activiteitstracking |
| `gradebook_category` | Categorieën in cijferboek |
| `gradebook_result` | Cijfers |

### Instellingen

| Tabel | Doel |
|-------|------|
| `settings` | Platforminstellingen |
| `settings_options` | Definitie van instellingsopties |

## Migraties

Wijzigingen in het databaseschema worden beheerd via Doctrine Migrations in `src/CoreBundle/Migrations/`. Voer migraties uit met:

```bash
php bin/console doctrine:migrations:migrate
```