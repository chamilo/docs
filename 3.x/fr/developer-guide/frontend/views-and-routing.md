# Vues et routage

Chamilo dispose d’un large ensemble de vues Vue (composants de niveau page) reliées via Vue Router. Les fichiers se trouvent sous `assets/vue/views/`.

## Architecture du routeur

Le routeur est défini dans `assets/vue/router/index.js` à l’aide de `createWebHistory` pour des URL propres.

Les routes sont modulaires — organisées en fichiers de routes par fonctionnalité, importés dans le routeur principal :

| Module de routes | Pages |
|-------------|-------|
| `admin` | Pages du panneau d’administration |
| `sessionAdmin` | Pages d’administration des sessions |
| `course` | Liste des cours, création, accueil, catalogue |
| `account` | Profil utilisateur et paramètres |
| `personalfile` | Espace de fichiers personnels |
| `message` | Messagerie / boîte de réception |
| `user` | Pages de gestion des utilisateurs |
| `usergroup` | Pages des groupes d’utilisateurs (classes) |
| `userreluser` | Pages des relations entre utilisateurs (ami/suivi) |
| `ccalendarevent` | Calendrier et agenda de cours |
| `ctoolintro` | Pages d’introduction aux outils de cours |
| `page` | Pages CMS statiques |
| `pageLayout` | Enveloppes de mise en page |
| `publicPage` | Pages accessibles publiquement |
| `social` | Pages du réseau social |
| `filemanager` | Gestionnaire de fichiers (navigateur de documents de cours) |
| `skill` | Pages des compétences |
| `accessurl` | Pages de gestion multi-URL (portail) |
| `branch` | Pages des campus / réseau de campus |
| `room` | Pages des salles virtuelles |
| `buycourses` | Pages d’achat de cours |
| `documents` | Gestion des documents |
| `assignments` | Flux de travail des devoirs |
| `links` | Gestion des liens externes |
| `glossary` | Gestion du glossaire |
| `attendance` | Suivi des présences |
| `lp` | Lecteur et éditeur de parcours d’apprentissage |
| `dropbox` | Dropbox / échange de fichiers |
| `blog` | Pages de blog |
| `blogAdmin` | Administration du blog |
| `coursemaintenance` | Sauvegarde et restauration de cours |
| `catalogue` | Catalogues de cours et de sessions |

## Routes clés

| Chemin | Vue | Description |
|------|------|-------------|
| `/` | `AppIndex.vue` (ou personnalisé) | Point d’entrée de l’application |
| `/home` | `pages/Home.vue` | Page d’accueil de la plateforme |
| `/login` | `pages/Login.vue` | Page de connexion |
| `/courses` | `views/user/courses/List.vue` | Cours auxquels l’utilisateur est inscrit |
| `/sessions` | `views/user/sessions/SessionsCurrent.vue` | Sessions en cours |
| `/sessions/past` | `views/user/sessions/SessionsPast.vue` | Sessions passées |
| `/sessions/upcoming` | `views/user/sessions/SessionsUpcoming.vue` | Sessions à venir |
| `/course/:id/home` | `views/course/CourseHome.vue` | Page d’accueil du cours |
| `/account/home` | `views/account/Home.vue` | Profil utilisateur |
| `/admin` | Vues d’administration | Panneau d’administration |
| `/faq` | `pages/Faq.vue` | Page FAQ |

## Gardes de routes

Le routeur utilise des gardes de navigation (déclarées avec `beforeEach` et `afterEach`) pour :

* Vérifier l’état d’authentification via `useSecurityStore` et rediriger les utilisateurs non authentifiés vers `/login`
* Vérifier le contexte de cours via `useCidReqStore`
* Appliquer des classes CSS de type de page pendant la navigation SPA (en remplacement de ce que ferait le `PageHelper` de Twig lors d’un chargement de page complète)
* Prendre en charge les surcharges de modèles Vue personnalisés — le composant d’entrée à `/` est remplacé par un `AppIndex.vue` personnalisé lorsqu’un modèle Vue personnalisé est activé (`var/vue_templates/pages/AppIndex.vue`)

## Organisation des vues

Les vues se trouvent dans `assets/vue/views/`, organisées par fonctionnalité :

```
views/
├── account/          # User profile and settings
├── admin/            # Admin pages
├── assignments/      # Assignment submission and grading
├── attendance/       # Attendance sheets
├── blog/             # Blog posts and comments
├── branch/           # Network campus management
├── buycourses/       # Course purchase flow
├── ccalendarevent/   # Course calendar
├── course/           # Course list, home, creation, catalog
├── coursecategory/   # Course category management
├── coursemaintenance/# Course backup/restore
├── ctoolintro/       # Tool introduction pages
├── documents/        # Document list, creation, media generation
├── dropbox/          # Dropbox / file exchange
├── filemanager/      # File browser
├── glossary/         # Glossary list and term management
├── links/            # External links
├── lp/               # Learning path player and editor
├── message/          # Inbox and messaging
├── page/             # CMS static pages
├── pageLayout/       # Page layout wrappers
├── personalfile/     # Personal file space
├── room/             # Virtual rooms
├── sessionadmin/     # Session administration
├── skill/            # Skills and competencies
├── social/           # Social network
├── terms/            # Terms of service
├── user/             # User management and course/session lists
├── usergroup/        # User groups (classes)
└── userreluser/      # User relationships (friends/follows)
```