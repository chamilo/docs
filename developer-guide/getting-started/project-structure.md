---
# Structure du Projet

## Répertoires de niveau supérieur

```
chamilo/
├── assets/          # Code source frontend
│   ├── vue/         # Application Vue 3 (composants, vues, routeur, stores)
│   ├── css/         # Feuilles de style SCSS
│   └── js/          # JavaScript legacy
├── config/          # Configuration Symfony (routes, services, packages)
├── public/          # Racine web (index.php, pages PHP legacy, plugins)
│   ├── main/        # Modules PHP legacy (un sous-répertoire par outil)
│   └── plugin/      # Plugins intégrés et personnalisés
├── src/             # Code source PHP (bundles Symfony)
│   ├── CoreBundle/  # Logique de la plateforme principale
│   ├── CourseBundle/# Fonctionnalités spécifiques aux cours
│   └── LtiBundle/   # Intégration LTI 1.3
├── templates/       # Modèles Twig
├── var/             # Cache, journaux, téléversements (généré)
├── vendor/          # Dépendances Composer (généré)
├── node_modules/    # Dépendances npm (généré)
└── translations/    # Fichiers de traduction
```

---
## Code source (`src/`)

### CoreBundle

Le plus grand bundle. Sous-répertoires notables :

| Répertoire | Contenu |
|------------|---------|
| `Entity/` | Entités Doctrine (User, Course, Session, ResourceNode, etc.) |
| `Controller/` | Contrôleurs d'administration, d'actions API et de pages (le sous-dossier Api/ contient des actions personnalisées pour API Platform) |
| `Settings/` | Fichiers de schéma de configuration (configuration de la plateforme) |
| `Repository/` | Référentiels Doctrine |
| `AiProvider/` | Implémentations de fournisseurs d'IA (OpenAI, Gemini, Mistral, DeepSeek, Grok) |
| `Tool/` | Définitions des outils de cours |
| `Security/` | Voters, authentificateurs, autorisation |
| `EventListener/` | Écouteurs d'événements |
| `EventSubscriber/` | Abonnés aux événements |
| `Command/` | Commandes de console Symfony |
| `Migrations/` | Migrations de base de données |
| `Twig/` | Extensions Twig |
| `Storage/` | Adaptateurs de stockage Flysystem |

### CourseBundle

Entités et logique spécifiques aux cours :

| Répertoire | Contenu |
|------------|---------|
| `Entity/` | Entités de contenu de cours (CDocument, CQuiz, CLp, CForum, CStudentPublication, etc.) |
| `Controller/` | Contrôleurs de cours |
| `Settings/` | Schémas de configuration au niveau des cours |
| `Component/CourseCopy/` | Import/export de cours (Common Cartridge, Moodle) |

### LtiBundle

Intégration LTI 1.3 :

| Répertoire | Contenu |
|------------|---------|
| `Entity/` | Entités de plateforme, d'outil et de déploiement LTI |
| `Controller/` | Points de terminaison de lancement et de configuration LTI |

---
## Frontend (`assets/vue/`)

```
assets/vue/
├── main.js              # Point d'entrée de l'application
├── main_installer.js    # Point d'entrée de l'installateur
├── components/          # Composants Vue réutilisables
│   ├── accessurl/       # Composants multi-URL (portail)
│   ├── admin/           # Composants spécifiques à l'administration
│   ├── assignments/     # Formulaires et listes de devoirs
│   ├── attendance/      # Composants de feuille de présence
│   ├── basecomponents/  # Composants de base partagés (BaseButton, BaseIcon, BaseTable, BaseTinyEditor, etc.) et ChamiloIcons.js
│   ├── blog/            # Composants de blog
│   ├── branch/          # Composants de campus/filiale/réseau
│   ├── ccalendarevent/  # Composants d'événements du calendrier de cours
│   ├── chat/            # Chat et tuteur IA
│   ├── course/          # Cartes de cours, catalogues, formulaires
│   ├── coursecategory/  # Composants de catégorie de cours
│   ├── coursemaintenance/ # Composants de sauvegarde/restauration de cours
│   ├── ctoolintro/      # Composants d'introduction aux outils de cours
│   ├── documents/       # Composants de gestion de documents
│   ├── dropbox/         # Composants Dropbox (échange de fichiers)
│   ├── filemanager/     # Composants de navigateur de fichiers
│   ├── glossary/        # Composants de glossaire
│   ├── installer/       # Assistant d'installation
│   ├── layout/          # Barre latérale, barre supérieure, mise en page de la coquille
│   ├── links/           # Composants de liens externes
│   ├── login/           # Composants de formulaire de connexion
│   ├── lp/              # Composants de parcours d'apprentissage
│   ├── message/         # Composants de messagerie
│   ├── page/            # Composants de page statique
│   ├── pageLayout/      # Composants d'enveloppe de mise en page
│   ├── personalfile/    # Composants d'espace de fichiers personnels
│   ├── platform/        # Composants d'interface au niveau de la plateforme
│   ├── resource_links/  # Composants de gestion des liens de ressources
│   ├── room/            # Composants de salle virtuelle
│   ├── session/         # Composants de session (campagne d'apprentissage)
│   ├── sessionadmin/    # Composants d'administration de session
│   ├── skill/           # Composants de compétences et aptitudes
│   ├── social/          # Composants de réseau social
│   ├── systemannouncement/ # Composants d'annonces système
│   ├── user/            # Composants de profil et gestion des utilisateurs
│   ├── usergroup/       # Composants de groupe d'utilisateurs (classe)
│   └── userreluser/     # Composants de relation entre utilisateurs (ami/suivi)
├── views/               # Vues Vue au niveau de la page (reflète la structure de components/)
│   ├── accessurl/       ├── account/         ├── admin/
│   ├── assignments/     ├── attendance/      ├── blog/
│   ├── branch/          ├── buycourses/      ├── ccalendarevent/
│   ├── course/          ├── coursecategory/  ├── coursemaintenance/
│   ├── ctoolintro/      ├── documents/       ├── dropbox/
│   ├── filemanager/     ├── glossary/        ├── links/
│   ├── lp/              ├── message/         ├── page/
│   ├── pageLayout/      ├── personalfile/    ├── room/
│   ├── sessionadmin/    ├── skill/           ├── social/
│   ├── terms/           ├── user/            ├── usergroup/
│   └── userreluser/
├── router/              # Vue Router (index.js + un module par domaine de fonctionnalité)
├── store/               # Magasins Pinia
│   └── modules/         # crud.js, notifications.js, ux.js
├── composables/         # Fonctions de composition partagées (sous-répertoires par fonctionnalité)
├── services/            # Couche de service API (un fichier par entité/domaine)
├── utils/               # Aides utilitaires (dates, hydra, fetch, sanitizeHtml, etc.)
├── config/              # Configuration d'exécution (api.js, env.js)
├── constants/           # Constantes partagées
│   └── entity/          # Constantes spécifiques aux entités (session, message, extrafield, etc.)
├── layouts/             # Composants de mise en page de haut niveau (MyCourses.vue)
├── pages/               # Composants de page autonomes (Home, Login, Faq, Demo)
├── mixins/              # Mixins de style Vue 2 hérités (ListMixin, CreateMixin, etc.)
├── hooks/               # Hooks composables (useSidebar, useState)
├── plugins/             # Enregistrements de plugins Vue (httpErrors, vuetify)
├── validators/          # Validateurs personnalisés Vuelidate
└── error/               # Composants de gestion des erreurs
```

---
## Configuration (`config/`)

```
config/
├── packages/            # Configuration des bundles et du framework (un fichier YAML par paquet)
│   ├── security.yaml    # Hiérarchie des rôles, pare-feu, contrôle d'accès
│   ├── doctrine.yaml    # Paramètres de Doctrine ORM et DBAL
│   ├── api_platform.yaml# Configuration de API Platform
│   ├── framework.yaml   # Paramètres principaux de Symfony
│   ├── lexik_jwt_authentication.yaml  # Paramètres des tokens JWT
│   ├── nelmio_cors.yaml # En-têtes CORS pour les consommateurs d'API
│   ├── oneup_flysystem.yaml  # Adaptateurs de stockage cloud
│   ├── webpack_encore.yaml   # Intégration de Webpack Encore
│   ├── ... (plus de 30 fichiers de paquets)
│   ├── dev/             # Surcharges spécifiques au développement (profiliseur web, débogage, routage)
│   ├── prod/            # Surcharges spécifiques à la production (actuellement un espace réservé vide)
│   └── test/            # Surcharges pour l'environnement de test (JWT, validateur, profileur web)
├── routes/              # Définitions des routes
│   ├── api_platform.yaml     # Préfixe des routes de API Platform
│   ├── attributes.yaml       # Routes basées sur les annotations des contrôleurs
│   ├── fos_js_routing.yaml   # Exposition des routes FOS JS Routing
│   ├── legacy.yaml           # Routes pour les pages PHP héritées sous public/main/
│   ├── security.yaml         # Routes de connexion/déconnexion/OAuth2
│   ├── dev/                  # Routes spécifiques au développement (profiliseur, bundle Maker)
│   └── test/                 # Surcharges des routes spécifiques aux tests
├── jwt/                 # Paire de clés JWT (clés privée/publique)
└── jwt-test/            # Clés JWT pour l'environnement de test
```

Symfony fusionne automatiquement les fichiers de base `packages/*.yaml` avec ceux du sous-répertoire correspondant à l'environnement (`dev/`, `prod/`, ou `test/`), de sorte que les fichiers spécifiques à un environnement n'ont besoin de surcharger que les valeurs qui diffèrent.

---
## Configuration de la compilation

| Fichier | Objectif |
|---------|----------|
| `webpack.config.js` | Configuration de Webpack Encore (entrées, chargeurs, plugins) |
| `tailwind.config.js` | Configuration de Tailwind CSS (chemins de contenu, extensions de thème, plugins) |
| `tsconfig.json` | Configuration de TypeScript |
| `eslint.config.mjs` | Règles d'ESLint (configuration plate) |
| `.prettierrc.json` | Règles de formatage de Prettier |

Tous les fichiers se trouvent à la racine du projet. Les plugins PostCSS (Tailwind + Autoprefixer) sont configurés directement dans `webpack.config.js` via `enablePostCssLoader()` — il n'y a pas de fichier indépendant `postcss.config.js`. Le fichier `webpack.config.js` lit `tailwind.config.js` indirectement via PostCSS, donc les modifications apportées aux sections `content` ou `theme` de Tailwind prennent effet lors de la prochaine exécution de `yarn encore dev` / `yarn encore production`.

---
## Points d'entrée Webpack

La compilation produit ces bundles :

**JavaScript :**
* `vue` — Application principale Vue 3 (`assets/vue/main.js`)
* `vue_installer` — Assistant d'installation (`assets/vue/main_installer.js`)
* `legacy_app`, `legacy_exercise`, `legacy_lp`, `legacy_document` — JS legacy pour les pages non encore migrées vers Vue

**CSS :**
* `app` — Feuille de style principale (`assets/css/app.scss`)
* Plus des feuilles spécialisées : `chat`, `document`, `editor`, `editor_content`, `markdown`, `print`, `responsive`, `scorm`

## Structure CSS (`assets/css/`)

```
assets/css/
├── app.scss             # Point d'entrée — importe Tailwind, l'index SCSS et les CSS tiers
├── _tailwind.scss       # Directives Tailwind (@tailwind base / components / utilities)
├── chat.scss            # Styles du panneau de chat et du tuteur IA
├── document.scss        # Styles du visualiseur de documents
├── editor.scss          # Styles de l'enveloppe de l'éditeur TinyMCE
├── editor_content.scss  # Styles injectés dans le corps de l'iframe de l'éditeur
├── markdown.scss        # Styles du contenu rendu en Markdown
├── print.scss           # Feuille de style pour l'impression
├── responsive.scss      # Surcharges responsives
├── scorm.scss           # Styles du lecteur SCORM
├── legacy/              # Styles pour les pages PHP héritées (par ex. frameReadyLoader.scss)
└── scss/                # Partiels SCSS modulaires
    ├── index.scss           # Fichier baril — importe tous les partiels ci-dessous
    ├── abstracts/           # Mixins et fonctions partagées
    ├── settings/            # Jetons de design (typographie, base des composants)
    ├── atoms/               # Surcharges PrimeVue par composant (boutons, entrées, calendrier, etc.)
    ├── molecules/           # Petits motifs d'interface utilisateur composés (puces, barres d'outils, états vides)
    ├── organisms/           # Zones de fonctionnalités plus larges (barre latérale, tableau de données, dialogue, panneau LP, etc.)
    ├── layout/              # Partiels de squelette de page (barre supérieure, conteneur principal, fil d'Ariane)
    ├── components/          # Fichiers spécifiques aux composants hérités (blog, exercice, social, compétence, etc.)
    └── libs/                # Surcharges de bibliothèques tierces (FullCalendar, MediaElement.js)
```

### Tailwind CSS

Tailwind est intégré via PostCSS. `assets/css/_tailwind.scss` génère les couches de base, de composants et d'utilitaires ; `assets/css/app.scss` l'importe en premier afin que les utilitaires Tailwind soient disponibles dans tous les autres partiels. La configuration de Tailwind — chemins de contenu pour le nettoyage, extensions de thème et plugins — se trouve dans `tailwind.config.js` à la racine du projet (`/var/www/chamilo/tailwind.config.js`).

Les classes utilitaires personnalisées et les classes de composants définies avec `@layer` (visibles dans `app.scss`) suivent la convention de superposition de Tailwind afin que les classes définies par l'utilisateur respectent les mêmes règles de spécificité que les utilitaires générés.

### Thèmes de couleurs

Chamilo prend en charge un système de thématisation des couleurs qui peut être configuré directement depuis l'interface d'administration (**Administration > Thèmes de couleurs**). Chaque thème enregistré écrit ses fichiers dans un répertoire dédié sous `var/themes/` :

```
var/themes/
└── [nom-du-thème]/
    ├── colors.css       # Propriétés CSS personnalisées pour la palette de couleurs complète
    ├── default.css      # Règles CSS personnalisées supplémentaires optionnelles
    ├── learnpath.css    # Surcharges spécifiques aux parcours d'apprentissage
    ├── tiny-settings.js # Paramètres de la palette de couleurs de l'éditeur TinyMCE
    └── images/          # Images du thème (logo, favicon, arrière-plans, icônes PWA)
        ├── header-logo.png / header-logo.svg
        ├── favicon.ico
        ├── pwa-icons/   # icon-192.png, icon-512.png
        └── ...          # Images d'arrière-plan, images de blocs d'administration, etc.
```

`colors.css` définit les propriétés CSS personnalisées sous forme de triplets de canaux RVB séparés par des espaces plutôt que des valeurs `rgb()`, ce qui permet à Tailwind de composer des variantes d'opacité (par ex. `bg-primary/50`) sans configuration supplémentaire :

```css
:root {
    --color-primary-base: 46 117 163;
    --color-secondary-base: 243 126 47;
    /* ... */
}
```

La couche de thème se superpose au bundle Tailwind/SCSS compilé : le navigateur charge `colors.css` après la feuille de style principale, de sorte que les modifications de thème prennent effet immédiatement sans étape de compilation.