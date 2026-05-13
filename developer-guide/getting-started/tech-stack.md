# Pile Technologique

Ce qui suit décrit la pile technologique de Chamilo 2.0. Toutes les versions mentionnées ici sont susceptibles de changer avec la sortie de nouvelles versions de Chamilo. Les numéros de version utilisent la [notation des versions de Composer](https://getcomposer.org/doc/articles/versions.md), qui établit des règles pour permettre une certaine flexibilité autour des versions.

En incluant les dépendances hiérarchiques, Chamilo utilise plusieurs centaines de bibliothèques de logiciels libres. Cette liste ne comprend que celles que nous utilisons le plus et qui sont susceptibles d’affecter le travail d’un développeur Chamilo chaque semaine environ. Nous sommes reconnaissants envers tous les autres développeurs de logiciels libres qui rendent notre travail plus facile, plus maintenable et plus sécurisé.

## Backend

| Technologie | Version | Objectif |
|-----------|---------|---------|
| PHP | 8.2+ | Environnement d'exécution |
| Symfony | 6.4.* | Framework |
| Doctrine ORM | ^2.16 | Abstraction de base de données |
| API Platform | ^3.0 | Framework d'API REST |
| oneup/flysystem-bundle | ~4.0 | Abstraction de stockage de fichiers |
| vich/uploader-bundle | ^2.8 | Gestion de téléversement de fichiers |
| stof/doctrine-extensions-bundle | ^1.12 | Extensions Doctrine (arbre, horodatage, slug) |
| lexik/jwt-authentication-bundle | ^2.20 | Authentification JWT |
| nelmio/cors-bundle | ^2.2 | En-têtes CORS |
| mpdf/mpdf | ~8.0 | Génération de PDF |
| phpoffice/phpspreadsheet | ~1.16 | Gestion de feuilles de calcul Excel |
| firebase/php-jwt | ^7.0 | Gestion des tokens JWT |
| bigbluebutton/bigbluebutton-api-php | ^2.0 | Intégration BigBlueButton |
| packbackbooks/lti-1p3-tool | ^6.4 | Implémentation LTI 1.3 |

## Frontend

| Technologie | Version | Objectif |
|-----------|---------|---------|
| Vue.js | ^3.5 | Framework d'interface utilisateur |
| PrimeVue | ^4.5 | Bibliothèque de composants |
| Pinia | ^3.0 | Gestion d'état |
| Vue Router | 5.0 | Routage côté client |
| Vue I18n | 11.3 | Internationalisation |
| Axios | ^1.13 | Client HTTP |
| TinyMCE | ^5.10 | Éditeur de texte enrichi |
| Chart.js | ^4.5 | Graphiques et visualisations |
| FullCalendar | ^6.1 | Composant de calendrier |
| Uppy | ^4.5 | Widget de téléversement de fichiers |
| PrimeFlex | ^4.0 | Framework d'utilitaires CSS |

## Outils de Build

| Technologie | Version | Objectif |
|-----------|---------|---------|
| Composer | ^2.8 | Gestionnaire de dépendances PHP |
| Webpack | ^5.105 | Bundler de modules |
| Symfony Webpack Encore | ^5.3 | Wrapper Webpack pour Symfony |
| Tailwind CSS | ^3.4 | Framework CSS orienté utilitaires |
| Sass | ^1.98 | Préprocesseur CSS |
| TypeScript | ^5.9 | JavaScript avec typage |
| ESLint | ^10.0 | Linting |
| Prettier | 3.8 | Formatage de code |

## Icônes

| Bibliothèque | Version | Utilisation |
|---------|---------|-------|
| @mdi/font | 7.4.47 | Material Design Icons (classes CSS `mdi mdi-*`) |

## Base de Données

Chamilo prend en charge :

* MySQL 5.7+
* MariaDB 10.11.2+

## Stockage Cloud

Via les adaptateurs Flysystem :

* Système de fichiers local (par défaut)
* AWS S3 (`league/flysystem-aws-s3-v3`)
* Azure Blob Storage (`league/flysystem-azure-blob-storage`)
* Google Cloud Storage (`league/flysystem-google-cloud-storage`)