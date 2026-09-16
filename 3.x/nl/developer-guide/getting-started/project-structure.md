# Projectstructuur

## Mappen op het hoogste niveau

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

## Broncode (`src/`)

### CoreBundle

De grootste bundle. Opvallende submappen:

| Directory | Contents |
|-----------|----------|
| `Entity/` | Doctrine-entiteiten (User, Course, Session, ResourceNode, enz.) |
| `Controller/` | Beheer-, API-actie- en paginacontrollers (de submap Api/ bevat aangepaste API Platform-acties) |
| `Settings/` | Schemabestanden voor instellingen (platformconfiguratie) |
| `Repository/` | Doctrine-repositories |
| `AiProvider/` | Implementaties van AI-providers (OpenAI, Gemini, Mistral, DeepSeek, Grok) |
| `Tool/` | Definities van cursushulpmiddelen |
| `Security/` | Voters, authenticators, autorisatie |
| `EventListener/` | Event listeners |
| `EventSubscriber/` | Event subscribers |
| `Command/` | Symfony-consolecommando's |
| `Migrations/` | Databasemigraties |
| `Twig/` | Twig-extensies |
| `Storage/` | Flysystem-opslagadapters |

### CourseBundle

Cursusspecifieke entiteiten en logica:

| Directory | Contents |
|-----------|----------|
| `Entity/` | Entiteiten voor cursusinhoud (CDocument, CQuiz, CLp, CForum, CStudentPublication, enz.) |
| `Controller/` | Cursuscontrollers |
| `Settings/` | Schema's voor instellingen op cursusniveau |
| `Component/CourseCopy/` | Cursusimport/-export (Common Cartridge, Moodle) |

### LtiBundle

LTI 1.3-integratie:

| Directory | Contents |
|-----------|----------|
| `Entity/` | Entiteiten voor LTI-platform, -tool en -deployment |
| `Controller/` | Eindpunten voor LTI-launch en -configuratie |

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

## Configuratie (`config/`)

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

Symfony voegt automatisch de basisbestanden `packages/*.yaml` samen met die in de bijbehorende omgevings-subdirectory (`dev/`, `prod/` of `test/`), zodat omgevingspecifieke bestanden alleen de waarden hoeven te overschrijven die afwijken.

## Tests (`tests/`)

`tests/` is **niet opgenomen in verpakte Chamilo-downloads** (release-ZIP's/tarballs) — het wordt verwijderd omdat het geen runtime-doel dient en sommige scripts een risico kunnen vormen als ze op een productieserver achterblijven. Het is alleen aanwezig wanneer het project via `git clone` wordt opgehaald.

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

| Directory | Contents |
|-----------|----------|
| `CoreBundle/` | PHPUnit-tests die `src/CoreBundle/` weerspiegelen: `Api/`, `ApiResource/`, `Command/`, `Controller/`, `DataFixtures/`, `Entity/`, `Event/`, `EventListener/`, `Filter/`, `fixtures/`, `Helpers/`, `Mcp/`, `Migrations/`, `Repository/`, `Security/`, `Serializer/`, `Service/`, `Settings/`, `State/`, `Tool/`, `Traits/`, `Twig/` |
| `CourseBundle/` | PHPUnit-tests die `src/CourseBundle/` weerspiegelen: `Api/`, `Component/CourseCopy/`, `Repository/`, `Settings/` |
| `datafiller/` | Scripts die een testinstallatie vullen met demo-inhoud: `data_courses.php`, `data_users.php`, `fill_courses.php`, `fill_users.php`, `fill_many_users.php`, `fill_whoisonline.php`, `generate_users.php`, `fill_all.php` (voert de overige uit), plus `images/` en een groot CSV-voorbeeld voor gebruikersimport |
| `history/` | Snapshots die de structuur van Chamilo bij eerdere releases documenteren (`1.8.8.2`, `1.9.0`, `1.10.0`, `1.11.0`, `2.0`) |
| `phpstan/` | `doctrine-orm-bootstrap.php`, geladen door PHPStan bij het analyseren van Doctrine ORM-code |
| `playwright/` | End-to-end browsertests: `features/*.feature` (Gherkin-scenario's uitgevoerd via [playwright-bdd](https://vitalets.github.io/playwright-bdd/)), `steps/common.steps.ts` (TypeScript-stepdefinities), `fixtures/` (testbestanden, bijv. spreadsheets), `scripts/check-results.mjs`, `playwright.config.ts`, en de gegenereerde `.features-gen/`-uitvoer. Vervangt de oude Behat-suite, waarvan de scenario's in de git-geschiedenis blijven staan ter referentie |
| `procedures/` | Spreadsheets (momenteel `spanish/`) die als checklistbasis dienen voor handmatige kwaliteitsbeoordeling van functionaliteit |
| `scripts/` | Eenmalige onderhouds-/herstel-/migratiescripts voor bestaande Chamilo-portalen (voornamelijk gericht op oudere versies), plus de submappen `git-hooks/`, `img/`, `lang/` en `packaging/` |

Zie [Testing](../contributing/testing.md) voor het opzetten van de testdatabase en het uitvoeren van de PHPUnit- en Playwright-suites.

## Buildconfiguratie

| File | Purpose |
|------|---------|
| `webpack.config.js` | Webpack Encore-configuratie (entries, loaders, plugins) |
| `tailwind.config.js` | Tailwind CSS-configuratie (contentpaden, theme-uitbreidingen, plugins) |
| `tsconfig.json` | TypeScript-configuratie |
| `eslint.config.mjs` | ESLint-regels (flat config) |
| `.prettierrc.json` | Prettier-opmaakregels |

Alle bestanden staan in de projectroot. PostCSS-plugins (Tailwind + Autoprefixer) worden inline geconfigureerd in `webpack.config.js` via `enablePostCssLoader()` — er is geen zelfstandig `postcss.config.js`. `webpack.config.js` leest `tailwind.config.js` indirect via PostCSS, zodat wijzigingen in de `content`- of `theme`-secties van Tailwind van kracht worden bij de volgende uitvoering van `yarn encore dev` / `yarn encore production`.

## Webpack-entrypoints

De build produceert deze bundles:

**JavaScript:**
* `vue` — Hoofdapplicatie Vue 3 (`assets/vue/main.js`)
* `vue_installer` — Installatiewizard (`assets/vue/main_installer.js`)
* `legacy_app`, `legacy_exercise`, `legacy_lp`, `legacy_document` — Legacy-JS voor pagina's die nog niet naar Vue zijn gemigreerd

**CSS:**
* `app` — Hoofdstylesheet (`assets/css/app.scss`)
* Plus gespecialiseerde sheets: `chat`, `document`, `editor`, `editor_content`, `markdown`, `print`, `responsive`, `scorm`

## CSS-structuur (`assets/css/`)

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

Tailwind is geïntegreerd via PostCSS. `assets/css/_tailwind.scss` genereert de lagen base, component en utility; `assets/css/app.scss` importeert dit bestand als eerste, zodat Tailwind-utilities in alle andere partials beschikbaar zijn. De Tailwind-configuratie — contentpaden voor purging, thema-uitbreidingen en plugins — staat in `tailwind.config.js` in de projectroot (`/var/www/chamilo/tailwind.config.js`).

Aangepaste utility-klassen en componentklassen die met `@layer` zijn gedefinieerd (zichtbaar in `app.scss`) volgen de gelaagdheidsconventie van Tailwind, zodat door de gebruiker gedefinieerde klassen dezelfde specificiteitsregels respecteren als de gegenereerde utilities.

### Kleurenthema's

Chamilo ondersteunt een kleurthemasysteem dat rechtstreeks vanuit de beheerinterface kan worden geconfigureerd (**Beheer > Kleurenthema's**). Elk opgeslagen thema schrijft zijn bestanden naar een eigen map onder `var/themes/`:

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

`colors.css` definieert CSS custom properties als door spaties gescheiden RGB-kanaaltripels in plaats van `rgb()`-waarden, zodat Tailwind opaciteitsvarianten kan samenstellen (bijv. `bg-primary/50`) zonder extra configuratie:

```css
:root {
    --color-primary-base: 46 117 163;
    --color-secondary-base: 243 126 47;
    /* ... */
}
```

De themalaag ligt bovenop de gecompileerde Tailwind/SCSS-bundel: de browser laadt `colors.css` na het hoofdstylesheet, zodat themawijzigingen onmiddellijk van kracht worden zonder een buildstap.