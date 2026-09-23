# Databasschema

Chamilo 3.0 mappar en stor uppsättning Doctrine-entiteter till databastabeller. De exakta antalet ändras mellan releaser — läs entitetskatalogerna som listas nedan för aktuellt läge.

## Entitetsplatser

| Bundle | Var | Prefix |
|--------|-------|--------|
| CoreBundle | `src/CoreBundle/Entity/` | Ingen (t.ex. `user`, `course`, `session`) |
| CourseBundle | `src/CourseBundle/Entity/` | `c_` (t.ex. `c_document`, `c_quiz`, `c_lp`) |
| LtiBundle | `src/LtiBundle/Entity/` | `lti_` |

## Viktiga tabeller

### Användare och autentisering

| Tabell | Syfte |
|-------|---------|
| `user` | Användarkonton |
| `access_url` | Portaler med flera URL:er |
| `access_url_rel_user` | Tilldelningar av användare till portal |
| `usergroup` | Plattformsövergripande användargrupper |

### Kurser

| Tabell | Syfte |
|-------|---------|
| `course` | Kurser |
| `course_category` | Kurskategorier |
| `course_rel_user` | Kursregistreringar |

### Sessioner

| Tabell | Syfte |
|-------|---------|
| `session` | Utbildningssessioner |
| `session_rel_user` | Sessionsregistreringar |
| `session_rel_course` | Kurser i sessioner |
| `session_rel_course_rel_user` | Användarregistrering per session-kurs |

### Resurssystem

| Tabell | Syfte |
|-------|---------|
| `resource_node` | Enhetlig innehållsabstraktion |
| `resource_file` | Filbilagor |
| `resource_link` | Synlighet/åtkomst per kontext |
| `resource_type` | Register över resurstyper |

### Kursinnehåll (prefix `c_`)

| Tabell | Syfte |
|-------|---------|
| `c_document` | Dokument |
| `c_quiz` | Övningar/tester |
| `c_quiz_question` | Quizfrågor |
| `c_quiz_answer` | Frågesvar |
| `c_lp` | Lärstigar |
| `c_lp_item` | Objekt i lärstigar |
| `c_forum_category` | Forumkategorier |
| `c_forum_forum` | Forum |
| `c_forum_thread` | Forumtrådar |
| `c_forum_post` | Foruminlägg |
| `c_student_publication` | Uppgifter/inlämningar |
| `c_survey` | Enkäter |
| `c_glossary` | Ordlistetermer |
| `c_calendar_event` | Kalenderhändelser |
| `c_attendance` | Närvarolistor |

### Spårning

| Tabell | Syfte |
|-------|---------|
| `track_e_login` | Inloggningsspårning |
| `track_e_online` | Spårning av användare online |
| `track_e_default` | Generisk aktivitetsspårning |
| `gradebook_category` | Betygskategorier |
| `gradebook_result` | Betyg |

### Inställningar

| Tabell | Syfte |
|-------|---------|
| `settings` | Plattformsinställningar |
| `settings_options` | Definitioner av inställningsalternativ |

## Migrationer

Ändringar i databasschemat hanteras via Doctrine Migrations i `src/CoreBundle/Migrations/`. Kör migrationer med:

```bash
php bin/console doctrine:migrations:migrate
```