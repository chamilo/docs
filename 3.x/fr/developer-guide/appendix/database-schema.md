# Schéma de base de données

Chamilo 3.0 mappe un large ensemble d’entités Doctrine vers des tables de base de données. Les effectifs exacts varient d’une version à l’autre — consultez les répertoires d’entités listés ci-dessous pour l’état actuel.

## Emplacements des entités

| Bundle | Emplacement | Préfixe |
|--------|-------|--------|
| CoreBundle | `src/CoreBundle/Entity/` | Aucun (p. ex. `user`, `course`, `session`) |
| CourseBundle | `src/CourseBundle/Entity/` | `c_` (p. ex. `c_document`, `c_quiz`, `c_lp`) |
| LtiBundle | `src/LtiBundle/Entity/` | `lti_` |

## Tables clés

### Utilisateur et authentification

| Table | Rôle |
|-------|---------|
| `user` | Comptes utilisateurs |
| `access_url` | Portails multi-URL |
| `access_url_rel_user` | Affectations utilisateur–portail |
| `usergroup` | Groupes d’utilisateurs à l’échelle de la plateforme |

### Cours

| Table | Rôle |
|-------|---------|
| `course` | Cours |
| `course_category` | Catégories de cours |
| `course_rel_user` | Inscriptions aux cours |

### Sessions

| Table | Rôle |
|-------|---------|
| `session` | Sessions de formation |
| `session_rel_user` | Inscriptions aux sessions |
| `session_rel_course` | Cours dans les sessions |
| `session_rel_course_rel_user` | Inscription utilisateur par session-cours |

### Système de ressources

| Table | Rôle |
|-------|---------|
| `resource_node` | Abstraction unifiée du contenu |
| `resource_file` | Fichiers joints |
| `resource_link` | Visibilité/accès par contexte |
| `resource_type` | Registre des types de ressources |

### Contenu de cours (préfixe c_)

| Table | Rôle |
|-------|---------|
| `c_document` | Documents |
| `c_quiz` | Exercices/tests |
| `c_quiz_question` | Questions de quiz |
| `c_quiz_answer` | Réponses aux questions |
| `c_lp` | Parcours d’apprentissage |
| `c_lp_item` | Éléments de parcours d’apprentissage |
| `c_forum_category` | Catégories de forums |
| `c_forum_forum` | Forums |
| `c_forum_thread` | Sujets de forum |
| `c_forum_post` | Messages de forum |
| `c_student_publication` | Devoirs/soumissions |
| `c_survey` | Enquêtes |
| `c_glossary` | Termes du glossaire |
| `c_calendar_event` | Événements du calendrier |
| `c_attendance` | Feuilles de présence |

### Suivi

| Table | Rôle |
|-------|---------|
| `track_e_login` | Suivi des connexions |
| `track_e_online` | Suivi des utilisateurs en ligne |
| `track_e_default` | Suivi générique d’activité |
| `gradebook_category` | Catégories du carnet de notes |
| `gradebook_result` | Notes |

### Paramètres

| Table | Rôle |
|-------|---------|
| `settings` | Paramètres de la plateforme |
| `settings_options` | Définitions des options de paramètre |

## Migrations

Les évolutions du schéma de base de données sont gérées via Doctrine Migrations dans `src/CoreBundle/Migrations/`. Exécutez les migrations avec :

```bash
php bin/console doctrine:migrations:migrate
```