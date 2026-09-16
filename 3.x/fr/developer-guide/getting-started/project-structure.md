# Structure du projet

## Répertoires de premier niveau

```
chamilo/
├── assets/          # Frontend source code
│   ├── vue/         # Vue 3 application (components, views, router, stores)
│   ├── css/         # SCSS stylesheets
│   └── js/          # Legacy JavaScript
├── config/          # Symfony configuration (routes, services, packages)
├── public/          # Web root (index.php, legacy PHP pages, plugins)
│   ├── main/        # Legacy PHP modules (one subdirectory per tool)
│   └── plugin/      # Bundled and custom plugins
├── src/             # PHP source code (Symfony bundles)
│   ├── CoreBundle/  # Core platform logic
│   ├── CourseBundle/# Course-specific features
│   └── LtiBundle/   # LTI 1.3 integration
├── templates/       # Twig templates
├── var/             # Cache, logs, uploads (generated)
├── vendor/          # Composer dependencies (generated)
├── node_modules/    # npm dependencies (generated)
└── translations/    # Translation files
```

## Code source (`src/`)

### CoreBundle

Le plus volumineux des bundles. Sous-répertoires notables :

| Répertoire | Contenu |
|-----------|----------|
| `Entity/` | Entités Doctrine (User, Course, Session, ResourceNode, etc.) |
| `Controller/` | Contrôleurs d’administration, d’actions API et de pages (le sous-dossier Api/ contient les actions API Platform personnalisées) |
| `Settings/` | Fichiers de schéma des paramètres (configuration de la plateforme) |
| `Repository/` | Dépôts Doctrine |
| `AiProvider/` | Implémentations de fournisseurs d’IA (OpenAI, Gemini, Mistral, DeepSeek, Grok) |
| `Tool/` | Définitions des outils de cours |
| `Security/` | Voters, authentificateurs, autorisation |
| `EventListener/` | Écouteurs d’événements |
| `EventSubscriber/` | Abonnés aux événements |
| `Command/` | Commandes de la console Symfony |
| `Migrations/` | Migrations de base de données |
| `Twig/` | Extensions Twig |
| `Storage/` | Adaptateurs de stockage Flysystem |

### CourseBundle

Entités et logique spécifiques aux cours :

| Répertoire | Contenu |
|-----------|----------|
| `Entity/` | Entités de contenu de cours (CDocument, CQuiz, CLp, CForum, CStudentPublication, etc.) |
| `Controller/` | Contrôleurs de cours |
| `Settings/` | Schémas des paramètres au niveau du cours |
| `Component/CourseCopy/` | Import/export de cours (Common Cartridge, Moodle) |

### LtiBundle

Intégration LTI 1.3 :

| Répertoire | Contenu |
|-----------|----------|
| `Entity/` | Entités de plateforme, d’outil et de déploiement LTI |
| `Controller/` | Points de terminaison de lancement et de configuration LTI |

## Frontend (`assets/vue/`)

```
assets/vue/
├── main.js              # Application entry point
├── main_installer.js    # Installer entry point
├── components/          # Reusable Vue components
│   ├── accessurl/       # Multi-URL (portal) components
│   ├── admin/           # Admin-specific components
│   ├── assignments/     # Assignment forms and lists
│   ├── attendance/      # Attendance sheet components
│   ├── basecomponents/  # Shared base components (BaseButton, BaseIcon, BaseTable, BaseTinyEditor, etc.) and ChamiloIcons.js
│   ├── blog/            # Blog components
│   ├── branch/          # Branch/network campus components
│   ├── ccalendarevent/  # Course calendar event components
│   ├── chat/            # Chat and AI tutor
│   ├── course/          # Course cards, catalogs, forms
│   ├── coursecategory/  # Course category components
│   ├── coursemaintenance/ # Course backup/restore components
│   ├── ctoolintro/      # Course tool introduction components
│   ├── documents/       # Document management components
│   ├── dropbox/         # Dropbox (file exchange) components
│   ├── filemanager/     # File browser components
│   ├── glossary/        # Glossary components
│   ├── installer/       # Installation wizard
│   ├── layout/          # Sidebar, Topbar, shell layout
│   ├── links/           # External links components
│   ├── login/           # Login form components
│   ├── lp/              # Learning path components
│   ├── message/         # Messaging components
│   ├── page/            # Static page components
│   ├── pageLayout/      # Page layout wrapper components
│   ├── personalfile/    # Personal file space components
│   ├── platform/        # Platform-level UI components
│   ├── resource_links/  # Resource link management components
│   ├── room/            # Virtual room components
│   ├── session/         # Session (learning campaign) components
│   ├── sessionadmin/    # Session administration components
│   ├── skill/           # Skills and competencies components
│   ├── social/          # Social network components
│   ├── systemannouncement/ # System announcement components
│   ├── user/            # User profile and management components
│   ├── usergroup/       # User group (class) components
│   └── userreluser/     # User relationship (friend/follow) components
├── views/               # Page-level Vue views (mirrors components/ structure)
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
├── router/              # Vue Router (index.js + one module per feature area)
├── store/               # Pinia stores
│   └── modules/         # crud.js, notifications.js, ux.js
├── composables/         # Shared composition functions (per-feature subdirectories)
├── services/            # API service layer (one file per entity/domain)
├── utils/               # Utility helpers (dates, hydra, fetch, sanitizeHtml, etc.)
├── config/              # Runtime configuration (api.js, env.js)
├── constants/           # Shared constants
│   └── entity/          # Entity-specific constants (session, message, extrafield, etc.)
├── layouts/             # Top-level layout components (MyCourses.vue)
├── pages/               # Standalone page components (Home, Login, Faq, Demo)
├── mixins/              # Legacy Vue 2-style mixins (ListMixin, CreateMixin, etc.)
├── hooks/               # Composable hooks (useSidebar, useState)
├── plugins/             # Vue plugin registrations (httpErrors, vuetify)
├── validators/          # Vuelidate custom validators
└── error/               # Error boundary components
```

## Configuration (`config/`)

```
config/
├── packages/            # Bundle and framework configuration (one YAML file per package)
│   ├── security.yaml    # Role hierarchy, firewalls, access control
│   ├── doctrine.yaml    # Doctrine ORM and DBAL settings
│   ├── api_platform.yaml# API Platform configuration
│   ├── framework.yaml   # Core Symfony settings
│   ├── lexik_jwt_authentication.yaml  # JWT token settings
│   ├── nelmio_cors.yaml # CORS headers for API consumers
│   ├── oneup_flysystem.yaml  # Cloud storage adapters
│   ├── webpack_encore.yaml   # Webpack Encore integration
│   ├── ... (30+ package files)
│   ├── dev/             # Development-only overrides (web profiler, debug, routing)
│   ├── prod/            # Production-only overrides (currently empty placeholder)
│   └── test/            # Test-environment overrides (JWT, validator, web profiler)
├── routes/              # Route definitions
│   ├── api_platform.yaml     # API Platform route prefix
│   ├── attributes.yaml       # Controller annotation-based routes
│   ├── fos_js_routing.yaml   # FOS JS Routing exposure
│   ├── legacy.yaml           # Routes for legacy PHP pages under public/main/
│   ├── security.yaml         # Login/logout/OAuth2 routes
│   ├── dev/                  # Development-only routes (profiler, Maker bundle)
│   └── test/                 # Test-only route overrides
├── jwt/                 # JWT key pair (private/public keys)
└── jwt-test/            # JWT keys for the test environment
```

Symfony fusionne automatiquement les fichiers de base `packages/*.yaml` avec ceux du sous-répertoire d’environnement correspondant (`dev/`, `prod/` ou `test/`) ; les fichiers spécifiques à un environnement n’ont donc à surcharger que les valeurs qui diffèrent.

## Tests (`tests/`)

`tests/` **n’est pas inclus dans les téléchargements empaquetés de Chamilo** (ZIP/tarballs de version) — il est retiré car il n’a aucune utilité à l’exécution et certains de ses scripts pourraient présenter un risque s’ils restaient sur un serveur de production. Il n’est présent que lorsque le projet est obtenu via `git clone`.

```
tests/
├── CoreBundle/       # PHPUnit tests, mirroring src/CoreBundle/'s subdirectory layout
├── CourseBundle/     # PHPUnit tests, mirroring src/CourseBundle/'s subdirectory layout
├── datafiller/       # Scripts that seed a test installation with demo courses/users/content
├── history/          # Snapshots of what Chamilo looked like at past versions
├── phpstan/          # Bootstrap file used by PHPStan when analyzing Doctrine ORM code
├── playwright/       # Browser-driven end-to-end tests (Gherkin + playwright-bdd)
├── procedures/       # Spreadsheets used as a base for manual QA of features
├── scripts/          # Standalone maintenance/fix/migration scripts for existing portals
├── AbstractApiTest.php                        # Base class for API Platform test cases
├── ApplicationAvailabilityFunctionalTest.php   # Smoke test asserting core pages load
├── ChamiloTestTrait.php                        # Shared fixtures/auth/request helpers
├── bootstrap.php                               # PHPUnit bootstrap
├── deprecations.baseline.json                  # Accepted deprecation warnings, excluded from failing the suite
└── README.md                                   # Setup instructions for PHPUnit and Playwright
```

| Répertoire | Contenu |
|-----------|----------|
| `CoreBundle/` | Tests PHPUnit calqués sur `src/CoreBundle/` : `Api/`, `ApiResource/`, `Command/`, `Controller/`, `DataFixtures/`, `Entity/`, `Event/`, `EventListener/`, `Filter/`, `fixtures/`, `Helpers/`, `Mcp/`, `Migrations/`, `Repository/`, `Security/`, `Serializer/`, `Service/`, `Settings/`, `State/`, `Tool/`, `Traits/`, `Twig/` |
| `CourseBundle/` | Tests PHPUnit calqués sur `src/CourseBundle/` : `Api/`, `Component/CourseCopy/`, `Repository/`, `Settings/` |
| `datafiller/` | Scripts qui remplissent une installation de test avec du contenu de démonstration : `data_courses.php`, `data_users.php`, `fill_courses.php`, `fill_users.php`, `fill_many_users.php`, `fill_whoisonline.php`, `generate_users.php`, `fill_all.php` (exécute les autres), plus `images/` et un large exemple CSV d’import d’utilisateurs |
| `history/` | Instantanés documentant la structure de Chamilo aux versions passées (`1.8.8.2`, `1.9.0`, `1.10.0`, `1.11.0`, `2.0`) |
| `phpstan/` | `doctrine-orm-bootstrap.php`, chargé par PHPStan lors de l’analyse du code Doctrine ORM |
| `playwright/` | Tests de bout en bout dans le navigateur : `features/*.feature` (scénarios Gherkin exécutés via [playwright-bdd](https://vitalets.github.io/playwright-bdd/)), `steps/common.steps.ts` (définitions d’étapes TypeScript), `fixtures/` (fichiers de test, p. ex. tableurs), `scripts/check-results.mjs`, `playwright.config.ts`, et la sortie générée `.features-gen/`. Remplace l’ancienne suite Behat, dont les scénarios restent dans l’historique git à titre de référence |
| `procedures/` | Tableurs (actuellement `spanish/`) servant de base de liste de contrôle pour la revue qualité manuelle des fonctionnalités |
| `scripts/` | Scripts ponctuels de maintenance/correction/migration pour des portails Chamilo existants (visant surtout d’anciennes versions), plus les sous-dossiers `git-hooks/`, `img/`, `lang/` et `packaging/` |

Voir [Tests](../contributing/testing.md) pour la configuration de la base de données de test et l’exécution des suites PHPUnit et Playwright.

## Configuration de compilation

| Fichier | Rôle |
|------|---------|
| `webpack.config.js` | Configuration Webpack Encore (entrées, chargeurs, plugins) |
| `tailwind.config.js` | Configuration Tailwind CSS (chemins de contenu, extensions de thème, plugins) |
| `tsconfig.json` | Configuration TypeScript |
| `eslint.config.mjs` | Règles ESLint (configuration plate) |
| `.prettierrc.json` | Règles de formatage Prettier |

Tous les fichiers se trouvent à la racine du projet. Les plugins PostCSS (Tailwind + Autoprefixer) sont configurés en ligne dans `webpack.config.js` via `enablePostCssLoader()` — il n’existe pas de `postcss.config.js` autonome. `webpack.config.js` lit `tailwind.config.js` indirectement via PostCSS, de sorte que les modifications des sections `content` ou `theme` de Tailwind prennent effet au prochain lancement de `yarn encore dev` / `yarn encore production`.

## Points d’entrée Webpack

La compilation produit ces bundles :

**JavaScript :**
* `vue` — Application principale Vue 3 (`assets/vue/main.js`)
* `vue_installer` — Assistant d’installation (`assets/vue/main_installer.js`)
* `legacy_app`, `legacy_exercise`, `legacy_lp`, `legacy_document` — JS héritée pour les pages non encore migrées vers Vue

**CSS :**
* `app` — Feuille de styles principale (`assets/css/app.scss`)
* Plus des feuilles spécialisées : `chat`, `document`, `editor`, `editor_content`, `markdown`, `print`, `responsive`, `scorm`

## Structure CSS (`assets/css/`)

```
assets/css/
├── app.scss             # Entry point — imports Tailwind, the SCSS index, and third-party CSS
├── _tailwind.scss       # Tailwind directives (@tailwind base / components / utilities)
├── chat.scss            # Chat and AI tutor panel styles
├── document.scss        # Document viewer styles
├── editor.scss          # TinyMCE editor shell styles
├── editor_content.scss  # Styles injected into the editor iframe body
├── markdown.scss        # Markdown-rendered content styles
├── print.scss           # Print stylesheet
├── responsive.scss      # Responsive overrides
├── scorm.scss           # SCORM player styles
├── legacy/              # Styles for legacy PHP pages (e.g. frameReadyLoader.scss)
└── scss/                # Modular SCSS partials
    ├── index.scss           # Barrel file — imports all partials below
    ├── abstracts/           # Mixins and shared functions
    ├── settings/            # Design tokens (typography, component base)
    ├── atoms/               # Per-component PrimeVue overrides (buttons, inputs, calendar, etc.)
    ├── molecules/           # Small composed UI patterns (chips, toolbars, empty states)
    ├── organisms/           # Larger feature areas (sidebar, datatable, dialog, LP panel, etc.)
    ├── layout/              # Page skeleton partials (topbar, main container, breadcrumb)
    ├── components/          # Legacy component-specific files (blog, exercise, social, skill, etc.)
    └── libs/                # Third-party library overrides (FullCalendar, MediaElement.js)
```

### Tailwind CSS

Tailwind est intégré via PostCSS. `assets/css/_tailwind.scss` émet les couches base, component et utility ; `assets/css/app.scss` l’importe en premier afin que les utilitaires Tailwind soient disponibles dans tous les autres partiels. La configuration Tailwind — chemins de contenu pour le purging, extensions de thème et plugins — se trouve dans `tailwind.config.js` à la racine du projet (`/var/www/chamilo/tailwind.config.js`).

Les classes utilitaires et les classes de composants personnalisées définies avec `@layer` (visibles dans `app.scss`) suivent la convention de superposition de Tailwind, de sorte que les classes définies par l’utilisateur respectent les mêmes règles de spécificité que les utilitaires générés.

### Thèmes de couleurs

Chamilo prend en charge un système de thèmes de couleurs configurable directement depuis l’interface d’administration (**Administration > Thèmes de couleurs**). Chaque thème enregistré écrit ses fichiers dans un répertoire dédié sous `var/themes/` :

```
var/themes/
└── [theme-name]/
    ├── colors.css       # CSS custom properties for the full color palette
    ├── default.css      # Optional additional custom CSS rules
    ├── learnpath.css    # Learning path-specific overrides
    ├── tiny-settings.js # TinyMCE editor color palette settings
    └── images/          # Theme images (logo, favicon, backgrounds, PWA icons)
        ├── header-logo.png / header-logo.svg
        ├── favicon.ico
        ├── pwa-icons/   # icon-192.png, icon-512.png
        └── ...          # Background images, admin block images, etc.
```

`colors.css` définit des propriétés CSS personnalisées sous forme de triplets de canaux RGB séparés par des espaces plutôt que de valeurs `rgb()`, ce qui permet à Tailwind de composer des variantes d’opacité (par ex. `bg-primary/50`) sans configuration supplémentaire :

```css
:root {
    --color-primary-base: 46 117 163;
    --color-secondary-base: 243 126 47;
    /* ... */
}
```

La couche de thème se superpose au bundle Tailwind/SCSS compilé : le navigateur charge `colors.css` après la feuille de style principale, de sorte que les changements de thème prennent effet immédiatement, sans étape de compilation.