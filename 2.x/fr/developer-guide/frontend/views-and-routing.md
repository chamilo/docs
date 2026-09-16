# Vues et Routage

Chamilo dispose d'un large ensemble de vues Vue (composants au niveau de la page) connectées via Vue Router. Les fichiers réels se trouvent sous `assets/vue/views/`.

## Architecture du Routeur

Le routeur est défini dans `assets/vue/router/index.js` en utilisant `createWebHistory` pour des URL propres.

Les routes sont modulaires — organisées en fichiers de routes par fonctionnalité, importés dans le routeur principal :

| Module de route | Pages |
|-----------------|-------|
| `admin` | Pages du panneau d'administration |
| `sessionAdmin` | Pages d'administration des sessions |
| `course` | Liste des cours, création, page d'accueil, catalogue |
| `account` | Profil utilisateur et paramètres |
| `personalfile` | Espace de fichiers personnels |
| `message` | Messagerie / boîte de réception |
| `user` | Pages de gestion des utilisateurs |
| `usergroup` | Pages des groupes d'utilisateurs (classes) |
| `userreluser` | Pages des relations entre utilisateurs (amis/suivis) |
| `ccalendarevent` | Calendrier et agenda des cours |
| `ctoolintro` | Pages d'introduction aux outils de cours |
| `page` | Pages statiques CMS |
| `pageLayout` | Enveloppes de mise en page |
| `publicPage` | Pages accessibles publiquement |
| `social` | Pages de réseau social |
| `filemanager` | Gestionnaire de fichiers (navigateur de documents de cours) |
| `skill` | Pages des compétences et aptitudes |
| `accessurl` | Pages de gestion multi-URL (portail) |
| `branch` | Pages des campus de réseau / branches |
| `room` | Pages des salles virtuelles |
| `buycourses` | Pages d'achat de cours |
| `documents` | Gestion des documents |
| `assignments` | Flux de travail des travaux |
| `links` | Gestion des liens externes |
| `glossary` | Gestion du glossaire |
| `attendance` | Suivi de la présence |
| `lp` | Lecteur et éditeur de parcours d'apprentissage |
| `dropbox` | Dropbox / échange de fichiers |
| `blog` | Pages de blog |
| `blogAdmin` | Administration du blog |
| `coursemaintenance` | Sauvegarde et restauration des cours |
| `catalogue` | Catalogues de cours et de sessions |

## Routes Clés

| Chemin | Vue | Description |
|--------|-----|-------------|
| `/` | `AppIndex.vue` (ou personnalisé) | Point d'entrée de l'application |
| `/home` | `pages/Home.vue` | Page d'accueil de la plateforme |
| `/login` | `pages/Login.vue` | Page de connexion |
| `/courses` | `views/user/courses/List.vue` | Cours auxquels l'utilisateur est inscrit |
| `/sessions` | `views/user/sessions/SessionsCurrent.vue` | Sessions actuelles |
| `/sessions/past` | `views/user/sessions/SessionsPast.vue` | Sessions passées |
| `/sessions/upcoming` | `views/user/sessions/SessionsUpcoming.vue` | Sessions à venir |
| `/course/:id/home` | `views/course/CourseHome.vue` | Page d'accueil du cours |
| `/account/home` | `views/account/Home.vue` | Profil utilisateur |
| `/admin` | Vues d'administration | Panneau d'administration |
| `/faq` | `pages/Faq.vue` | Page FAQ |

## Gardes de Route

Le routeur utilise des gardes de navigation (déclarés avec `beforeEach` et `afterEach`) pour :

* Vérifier l'état d'authentification via `useSecurityStore` et rediriger les utilisateurs non authentifiés vers `/login`
* Vérifier le contexte du cours via `useCidReqStore`
* Appliquer des classes CSS de type de page lors de la navigation SPA (remplaçant ce que `PageHelper` de Twig ferait lors d'un chargement complet de page)
* Supporter les surcharges de modèles Vue personnalisés — le composant d'entrée à `/` est remplacé par un `AppIndex.vue` personnalisé lorsqu'un modèle Vue personnalisé est activé (`var/vue_templates/pages/AppIndex.vue`)

## Organisation des Vues

Les vues se trouvent dans `assets/vue/views/`, organisées par fonctionnalité :

```
views/
├── account/          # Profil utilisateur et paramètres
├── admin/            # Pages d'administration
├── assignments/      # Soumission et notation des travaux
├── attendance/       # Feuilles de présence
├── blog/             # Articles de blog et commentaires
├── branch/           # Gestion des campus de réseau
├── buycourses/       # Flux d'achat de cours
├── ccalendarevent/   # Calendrier de cours
├── course/           # Liste des cours, page d'accueil, création, catalogue
├── coursecategory/   # Gestion des catégories de cours
├── coursemaintenance/# Sauvegarde/restauration des cours
├── ctoolintro/       # Pages d'introduction aux outils
├── documents/        # Liste des documents, création, génération de médias
├── dropbox/          # Dropbox / échange de fichiers
├── filemanager/      # Navigateur de fichiers
├── glossary/         # Liste et gestion des termes du glossaire
├── links/            # Liens externes
├── lp/               # Lecteur et éditeur de parcours d'apprentissage
├── message/          # Boîte de réception et messagerie
├── page/             # Pages statiques CMS
├── pageLayout/       # Enveloppes de mise en page
├── personalfile/     # Espace de fichiers personnels
├── room/             # Salles virtuelles
├── sessionadmin/     # Administration des sessions
├── skill/            # Compétences et aptitudes
├── social/           # Réseau social
├── terms/            # Conditions d'utilisation
├── user/             # Gestion des utilisateurs et listes de cours/sessions
├── usergroup/        # Groupes d'utilisateurs (classes)
└── userreluser/      # Relations entre utilisateurs (amis/suivis)
```
