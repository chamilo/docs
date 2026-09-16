# Guide du développeur

Bienvenue dans le Guide du développeur de Chamilo 3.0. Ce guide s’adresse aux développeurs qui souhaitent comprendre l’architecture de Chamilo, étendre la plateforme au moyen de plugins, utiliser l’API, personnaliser l’interface ou contribuer au projet.

## Architecture en un coup d’œil

Chamilo 3.0 repose sur :

* **Backend** : Symfony 7.4 (PHP 8.3–8.5) avec Doctrine ORM et API Platform 4
* **Frontend** : Vue 3 avec PrimeVue, gestion d’état Pinia et Vue Router
* **Système de build** : Webpack 5 via Symfony Webpack Encore, avec Tailwind CSS
* **Authentification** : jetons JWT (lexik/jwt-authentication-bundle)
* **Stockage de fichiers** : Flysystem (prend en charge le local, AWS S3, Azure Blob, Google Cloud)

Le code source est organisé en trois bundles Symfony :

| Bundle | Objectif |
|--------|---------|
| **CoreBundle** | Cœur de la plateforme : utilisateurs, paramètres, ressources, administration, fournisseurs d’IA, sécurité |
| **CourseBundle** | Fonctionnalités propres aux cours : documents, exercices, parcours d’apprentissage, forums, etc. |
| **LtiBundle** | Intégration LTI 1.3 pour les outils d’apprentissage externes |

## Organisation de ce guide

1. **Premiers pas** — Pile technologique, environnement de développement, structure du projet
2. **Backend** — Architecture Symfony, entités, système de ressources, contrôleurs, paramètres
3. **API** — API REST via API Platform, authentification JWT, actions personnalisées
4. **Frontend** — Composants Vue, vues, routage, gestion d’état, système de build
5. **Thématisation** — Thèmes de couleurs, CSS/Tailwind, templates Twig
6. **Plugins** — Architecture et développement des plugins
7. **Contribution** — Conventions de codage, flux de travail git, tests