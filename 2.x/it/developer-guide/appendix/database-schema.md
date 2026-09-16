# Schema del Database

Chamilo 2.0 mappa un ampio insieme di entità Doctrine a tabelle del database. I conteggi esatti variano tra le versioni — consulta le directory delle entità elencate di seguito per lo stato attuale.

## Posizioni delle Entità

| Bundle | Dove | Prefisso |
|--------|-------|--------|
| CoreBundle | `src/CoreBundle/Entity/` | Nessuno (ad esempio, `user`, `course`, `session`) |
| CourseBundle | `src/CourseBundle/Entity/` | `c_` (ad esempio, `c_document`, `c_quiz`, `c_lp`) |
| LtiBundle | `src/LtiBundle/Entity/` | `lti_` |

## Tabelle Principali

### Utenti e Autenticazione

| Tabella | Scopo |
|-------|---------|
| `user` | Account utente |
| `access_url` | Portali multi-URL |
| `access_url_rel_user` | Assegnazioni utente-portale |
| `usergroup` | Gruppi utente a livello di piattaforma |

### Corsi

| Tabella | Scopo |
|-------|---------|
| `course` | Corsi |
| `course_category` | Categorie di corsi |
| `course_rel_user` | Iscrizioni ai corsi |

### Sessioni

| Tabella | Scopo |
|-------|---------|
| `session` | Sessioni di formazione |
| `session_rel_user` | Iscrizioni alle sessioni |
| `session_rel_course` | Corsi nelle sessioni |
| `session_rel_course_rel_user` | Iscrizione utente per sessione-corso |

### Sistema delle Risorse

| Tabella | Scopo |
|-------|---------|
| `resource_node` | Astrazione unificata dei contenuti |
| `resource_file` | Allegati file |
| `resource_link` | Visibilità/accesso per contesto |
| `resource_type` | Registro dei tipi di risorsa |

### Contenuti del Corso (prefisso c_)

| Tabella | Scopo |
|-------|---------|
| `c_document` | Documenti |
| `c_quiz` | Esercizi/test |
| `c_quiz_question` | Domande dei quiz |
| `c_quiz_answer` | Risposte alle domande |
| `c_lp` | Percorsi di apprendimento |
| `c_lp_item` | Elementi dei percorsi di apprendimento |
| `c_forum_category` | Categorie del forum |
| `c_forum_forum` | Forum |
| `c_forum_thread` | Discussioni del forum |
| `c_forum_post` | Post del forum |
| `c_student_publication` | Compiti/consegne |
| `c_survey` | Sondaggi |
| `c_glossary` | Termini del glossario |
| `c_calendar_event` | Eventi del calendario |
| `c_attendance` | Fogli di presenza |

### Monitoraggio

| Tabella | Scopo |
|-------|---------|
| `track_e_login` | Monitoraggio degli accessi |
| `track_e_online` | Monitoraggio degli utenti online |
| `track_e_default` | Monitoraggio generico delle attività |
| `gradebook_category` | Categorie del registro dei voti |
| `gradebook_result` | Voti |

### Impostazioni

| Tabella | Scopo |
|-------|---------|
| `settings` | Impostazioni della piattaforma |
| `settings_options` | Definizioni delle opzioni di impostazione |

## Migrazioni

Le modifiche allo schema del database sono gestite tramite Doctrine Migrations in `src/CoreBundle/Migrations/`. Esegui le migrazioni con:

```bash
php bin/console doctrine:migrations:migrate
```