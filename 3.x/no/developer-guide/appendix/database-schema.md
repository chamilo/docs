# Databaseskjema

Chamilo 3.0 mapper et stort sett av Doctrine-entiteter til databasetabeller. De nøyaktige antallene endrer seg mellom utgivelser — les entitetskatalogene listet nedenfor for gjeldende tilstand.

## Entitetsplasseringer

| Bundle | Where | Prefix |
|--------|-------|--------|
| CoreBundle | `src/CoreBundle/Entity/` | None (e.g., `user`, `course`, `session`) |
| CourseBundle | `src/CourseBundle/Entity/` | `c_` (e.g., `c_document`, `c_quiz`, `c_lp`) |
| LtiBundle | `src/LtiBundle/Entity/` | `lti_` |

## Nøkkeltabeller

### Bruker og autentisering

| Table | Purpose |
|-------|---------|
| `user` | Brukerkontoer |
| `access_url` | Portaler med flere URL-er |
| `access_url_rel_user` | Bruker–portal-tilordninger |
| `usergroup` | Plattformomfattende brukergrupper |

### Kurs

| Table | Purpose |
|-------|---------|
| `course` | Kurs |
| `course_category` | Kurskategorier |
| `course_rel_user` | Kursinnmeldinger |

### Sesjoner

| Table | Purpose |
|-------|---------|
| `session` | Opplæringsøkter |
| `session_rel_user` | Sesjonsinnmeldinger |
| `session_rel_course` | Kurs i sesjoner |
| `session_rel_course_rel_user` | Brukerinnmelding per sesjon-kurs |

### Ressurssystem

| Table | Purpose |
|-------|---------|
| `resource_node` | Enhetlig innholdsabstraksjon |
| `resource_file` | Filvedlegg |
| `resource_link` | Synlighet/tilgang per kontekst |
| `resource_type` | Register over ressurstyper |

### Kursinnhold (c_-prefiks)

| Table | Purpose |
|-------|---------|
| `c_document` | Dokumenter |
| `c_quiz` | Øvelser/tester |
| `c_quiz_question` | Quizspørsmål |
| `c_quiz_answer` | Spørsmålssvar |
| `c_lp` | Læringsstier |
| `c_lp_item` | Elementer i læringssti |
| `c_forum_category` | Forumkategorier |
| `c_forum_forum` | Forum |
| `c_forum_thread` | Forumtråder |
| `c_forum_post` | Foruminnlegg |
| `c_student_publication` | Oppgaver/innleveringer |
| `c_survey` | Undersøkelser |
| `c_glossary` | Ordlistebegreper |
| `c_calendar_event` | Kalenderhendelser |
| `c_attendance` | Oppmøtelister |

### Sporing

| Table | Purpose |
|-------|---------|
| `track_e_login` | Innloggingssporing |
| `track_e_online` | Sporing av brukere som er pålogget |
| `track_e_default` | Generisk aktivitetssporing |
| `gradebook_category` | Karakterbok-kategorier |
| `gradebook_result` | Karakterer |

### Innstillinger

| Table | Purpose |
|-------|---------|
| `settings` | Plattforminnstillinger |
| `settings_options` | Definisjoner av innstillingsvalg |

## Migrasjoner

Endringer i databaseskjemaet håndteres gjennom Doctrine Migrations i `src/CoreBundle/Migrations/`. Kjør migrasjoner med:

```bash
php bin/console doctrine:migrations:migrate
```