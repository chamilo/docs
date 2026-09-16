# Schéma de la base de données

Chamilo 2.0 mappe un large ensemble d'entités Doctrine à des tables de base de données. Les chiffres exacts varient entre les versions — consultez les répertoires d'entités listés ci-dessous pour connaître l'état actuel.

## Emplacements des entités

| Bundle | Emplacement | Préfixe |
|--------|-------------|---------|
| CoreBundle | `src/CoreBundle/Entity/` | Aucun (par ex., `user`, `course`, `session`) |
| CourseBundle | `src/CourseBundle/Entity/` | `c_` (par ex., `c_document`, `c_quiz`, `c_lp`) |
| LtiBundle | `src/LtiBundle/Entity/` | `lti_` |

## Tables principales

### Utilisateurs et authentification

| Table | Objectif |
|-------|----------|
| `user` | Comptes utilisateurs |
| `access_url` | Portails multi-URL |
| `access_url_rel_user` | Assignations utilisateur-portail |
| `usergroup` | Groupes d'utilisateurs à l'échelle de la plateforme |

### Cours

| Table | Objectif |
|-------|----------|
| `course` | Cours |
| `course_category` | Catégories de cours |
| `course_rel_user` | Inscriptions aux cours |

### Sessions

| Table | Objectif |
|-------|----------|
| `session` | Sessions de formation |
| `session_rel_user` | Inscriptions aux sessions |
| `session_rel_course` | Cours dans les sessions |
| `session_rel_course_rel_user` | Inscription utilisateur par session-cours |

### Système de ressources

| Table | Objectif |
|-------|----------|
| `resource_node` | Abstraction unifiée du contenu |
| `resource_file` | Pièces jointes de fichiers |
| `resource_link` | Visibilité/accès par contexte |
| `resource_type` | Registre des types de ressources |

### Contenu des cours (préfixe c_)

| Table | Objectif |
|-------|----------|
| `c_document` | Documents |
| `c_quiz` | Exercices/tests |
| `c_quiz_question` | Questions de quiz |
| `c_quiz_answer` | Réponses aux questions |
| `c_lp` | Parcours d'apprentissage |
| `c_lp_item` | Éléments de parcours d'apprentissage |
| `c_forum_category` | Catégories de forum |
| `c_forum_forum` | Forums |
| `c_forum_thread` | Fils de discussion du forum |
| `c_forum_post` | Publications du forum |
| `c_student_publication` | Devoirs/soumissions |
| `c_survey` | Enquêtes |
| `c_glossary` | Termes du glossaire |
| `c_calendar_event` | Événements du calendrier |
| `c_attendance` | Feuilles de présence |

### Suivi

| Table | Objectif |
|-------|----------|
| `track_e_login` | Suivi des connexions |
| `track_e_online` | Suivi des utilisateurs en ligne |
| `track_e_default` | Suivi d'activité générique |
| `gradebook_category` | Catégories du carnet de notes |
| `gradebook_result` | Notes |

### Paramètres

| Table | Objectif |
|-------|----------|
| `settings` | Paramètres de la plateforme |
| `settings_options` | Définitions des options de paramètres |

## Migrations

Les modifications du schéma de la base de données sont gérées via Doctrine Migrations dans `src/CoreBundle/Migrations/`. Exécutez les migrations avec :

```bash
php bin/console doctrine:migrations:migrate
```