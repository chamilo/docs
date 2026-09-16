# Guide du Développeur

Bienvenue dans le Guide du Développeur de Chamilo 2.0. Ce guide s'adresse aux développeurs qui souhaitent comprendre l'architecture de Chamilo, étendre la plateforme avec des plugins, utiliser l'API, personnaliser l'interface ou contribuer au projet.

## Aperçu de l'Architecture

Chamilo 2.0 est construit sur :

* **Backend** : Symfony 6.4 (PHP 8.2+) avec Doctrine ORM et API Platform 3.0
* **Frontend** : Vue 3 avec PrimeVue, gestion d'état Pinia et Vue Router
* **Système de build** : Webpack 5 via Symfony Webpack Encore, avec Tailwind CSS
* **Authentification** : Jetons JWT (lexik/jwt-authentication-bundle)
* **Stockage de fichiers** : Flysystem (prend en charge local, AWS S3, Azure Blob, Google Cloud)

Le code source est organisé en trois bundles Symfony :

| Bundle | Objectif |
|--------|----------|
| **CoreBundle** | Noyau de la plateforme : utilisateurs, paramètres, ressources, administration, fournisseurs d'IA, sécurité |
| **CourseBundle** | Fonctionnalités spécifiques aux cours : documents, exercices, parcours d'apprentissage, forums, etc. |
| **LtiBundle** | Intégration LTI 1.3 pour les outils d'apprentissage externes |

## Organisation de ce Guide

1. **Premiers Pas** — Pile technologique, configuration de développement, structure du projet
2. **Backend** — Architecture Symfony, entités, système de ressources, contrôleurs, paramètres
3. **API** — API REST via API Platform, authentification JWT, actions personnalisées
4. **Frontend** — Composants Vue, vues, routage, gestion d'état, système de build
5. **Thématisation** — Thèmes de couleurs, CSS/Tailwind, modèles Twig
6. **Plugins** — Architecture et développement de plugins
7. **Contribution** — Conventions de codage, workflow git, tests