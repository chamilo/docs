# Databaseskema

Chamilo 3.0 afbilder et stort sæt Doctrine-entiteter til databasetabeller. De nøjagtige antal ændrer sig mellem udgivelser — læs entitetskatalogerne nedenfor for den aktuelle tilstand.

## Entitetsplaceringer

| Bundle | Where | Prefix |
|--------|-------|--------|
| CoreBundle | `src/CoreBundle/Entity/` | Ingen (f.eks. `user`, `course`, `session`) |
| CourseBundle | `src/CourseBundle/Entity/` | `c_` (f.eks. `c_document`, `c_quiz`, `c_lp`) |
| LtiBundle | `src/LtiBundle/Entity/` | `lti_` |

## Nøgletabeller

### Bruger og autentificering

| Table | Purpose |
|-------|---------|
| `user` | Brugerkonti |
| `access_url` | Multi-URL-portaler |
| `access_url_rel_user` | Bruger-portal-tildelinger |
| `usergroup` | Platformomfattende brugergrupper |

### Kurser

| Table | Purpose |
|-------|---------|
| `course` | Kurser |
| `course_category` | Kursuskategorier |
| `course_rel_user` | Kursustilmelding |

### Sessioner

| Table | Purpose |
|-------|---------|
| `session` | Uddannelsessessioner |
| `session_rel_user` | Sessionstilmeldinger |
| `session_rel_course` | Kurser i sessioner |
| `session_rel_course_rel_user` | Brugertilmelding pr. session-kursus |

### Ressourcesystem

| Table | Purpose |
|-------|---------|
| `resource_node` | Samlet indholdsabstraktion |
| `resource_file` | Filvedhæftninger |
| `resource_link` | Synlighed/adgang pr. kontekst |
| `resource_type` | Register over ressourcetyper |

### Kursusindhold (c_-præfiks)

| Table | Purpose |
|-------|---------|
| `c_document` | Dokumenter |
| `c_quiz` | Øvelser/tests |
| `c_quiz_question` | Quizspørgsmål |
| `c_quiz_answer` | Spørgsmålssvar |
| `c_lp` | Læringsstier |
| `c_lp_item` | Elementer i læringsstier |
| `c_forum_category` | Forumkategorier |
| `c_forum_forum` | Fora |
| `c_forum_thread` | Forumtråde |
| `c_forum_post` | Forumindlæg |
| `c_student_publication` | Opgaver/afleveringer |
| `c_survey` | Spørgeskemaer |
| `c_glossary` | Ordlisteudtryk |
| `c_calendar_event` | Kalenderbegivenheder |
| `c_attendance` | Fremmødelister |

### Sporing

| Table | Purpose |
|-------|---------|
| `track_e_login` | Loginsporing |
| `track_e_online` | Sporing af onlinebrugere |
| `track_e_default` | Generisk aktivitetssporing |
| `gradebook_category` | Karakterbogskategorier |
| `gradebook_result` | Karakterer |

### Indstillinger

| Table | Purpose |
|-------|---------|
| `settings` | Platformindstillinger |
| `settings_options` | Definitioner af indstillingsmuligheder |

## Migrationer

Ændringer i databaseskemaet administreres via Doctrine Migrations i `src/CoreBundle/Migrations/`. Kør migrationer med:

```bash
php bin/console doctrine:migrations:migrate
```