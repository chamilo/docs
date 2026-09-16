# Databaseschema

Chamilo 3.0 koppelt een grote verzameling Doctrine-entiteiten aan databasetabellen. De exacte aantallen wijzigen tussen releases — raadpleeg de hieronder vermelde entiteitsmappen voor de huidige stand.

## Locaties van entiteiten

| Bundle | Waar | Prefix |
|--------|-------|--------|
| CoreBundle | `src/CoreBundle/Entity/` | Geen (bijv. `user`, `course`, `session`) |
| CourseBundle | `src/CourseBundle/Entity/` | `c_` (bijv. `c_document`, `c_quiz`, `c_lp`) |
| LtiBundle | `src/LtiBundle/Entity/` | `lti_` |

## Belangrijke tabellen

### Gebruiker en authenticatie

| Tabel | Doel |
|-------|---------|
| `user` | Gebruikersaccounts |
| `access_url` | Multi-URL-portalen |
| `access_url_rel_user` | Toewijzingen van gebruikers aan portalen |
| `usergroup` | Platformbrede gebruikersgroepen |

### Cursussen

| Tabel | Doel |
|-------|---------|
| `course` | Cursussen |
| `course_category` | Cursuscategorieën |
| `course_rel_user` | Cursusinschrijvingen |

### Sessies

| Tabel | Doel |
|-------|---------|
| `session` | Trainingssessies |
| `session_rel_user` | Sessie-inschrijvingen |
| `session_rel_course` | Cursussen in sessies |
| `session_rel_course_rel_user` | Gebruikersinschrijving per sessie-cursus |

### Resourcesysteem

| Tabel | Doel |
|-------|---------|
| `resource_node` | Uniforme abstractie van inhoud |
| `resource_file` | Bestandsbijlagen |
| `resource_link` | Zichtbaarheid/toegang per context |
| `resource_type` | Register van resourcetypen |

### Cursusinhoud (prefix c_)

| Tabel | Doel |
|-------|---------|
| `c_document` | Documenten |
| `c_quiz` | Oefeningen/toetsen |
| `c_quiz_question` | Quizvragen |
| `c_quiz_answer` | Antwoorden op vragen |
| `c_lp` | Leerpaden |
| `c_lp_item` | Leerpaditems |
| `c_forum_category` | Forumcategorieën |
| `c_forum_forum` | Forums |
| `c_forum_thread` | Forumthreads |
| `c_forum_post` | Forumberichten |
| `c_student_publication` | Opdrachten/inzendingen |
| `c_survey` | Enquêtes |
| `c_glossary` | Glossariumtermen |
| `c_calendar_event` | Agenda-evenementen |
| `c_attendance` | Aanwezigheidslijsten |

### Tracking

| Tabel | Doel |
|-------|---------|
| `track_e_login` | Logintracking |
| `track_e_online` | Tracking van online gebruikers |
| `track_e_default` | Generieke activiteitentracking |
| `gradebook_category` | Cijferboekcategorieën |
| `gradebook_result` | Cijfers |

### Instellingen

| Tabel | Doel |
|-------|---------|
| `settings` | Platforminstellingen |
| `settings_options` | Definities van instellingsopties |

## Migraties

Wijzigingen in het databaseschema worden beheerd via Doctrine Migrations in `src/CoreBundle/Migrations/`. Voer migraties uit met:

```bash
php bin/console doctrine:migrations:migrate
```