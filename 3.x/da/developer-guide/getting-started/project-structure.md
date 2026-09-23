# Projektstruktur

## Mapper på øverste niveau

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

## Kildekode (`src/`)

### CoreBundle

Den største bundle. Bemærkelsesværdige undermapper:

| Mappe | Indhold |
|-----------|----------|
| `Entity/` | Doctrine-entiteter (User, Course, Session, ResourceNode osv.) |
| `Controller/` | Admin-, API-action- og sidecontrollere (undermappen Api/ indeholder tilpassede API Platform-actions) |
| `Settings/` | Skemafiler til indstillinger (platformkonfiguration) |
| `Repository/` | Doctrine-repositorier |
| `AiProvider/` | Implementeringer af AI-udbydere (OpenAI, Gemini, Mistral, DeepSeek, Grok) |
| `Tool/` | Definitioner af kursusværktøjer |
| `Security/` | Voters, authenticators, autorisation |
| `EventListener/` | Event listeners |
| `EventSubscriber/` | Event subscribers |
| `Command/` | Symfony-konsolkommandoer |
| `Migrations/` | Databasemigrationer |
| `Twig/` | Twig-udvidelser |
| `Storage/` | Flysystem-lageradaptere |

### CourseBundle

Kursusspecifikke entiteter og logik:

| Mappe | Indhold |
|-----------|----------|
| `Entity/` | Entiteter for kursusindhold (CDocument, CQuiz, CLp, CForum, CStudentPublication osv.) |
| `Controller/` | Kursuscontrollere |
| `Settings/` | Skemaer til indstillinger på kursusniveau |
| `Component/CourseCopy/` | Import/eksport af kurser (Common Cartridge, Moodle) |

### LtiBundle

LTI 1.3-integration:

| Mappe | Indhold |
|-----------|----------|
| `Entity/` | Entiteter for LTI-platform, -værktøj og -udrulning |
| `Controller/` | Endpoints til LTI-start og -konfiguration |

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

## Konfiguration (`config/`)

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

Symfony fletter automatisk de grundlæggende `packages/*.yaml`-filer med filerne i den tilsvarende miljøundermappe (`dev/`, `prod/` eller `test/`), så miljøspecifikke filer kun behøver at overskrive de værdier, der afviger.

## Tests (`tests/`)

`tests/` er **ikke inkluderet i pakkede Chamilo-downloads** (release-ZIP/tarballs) — det fjernes, fordi det ikke har noget formål ved kørsel, og nogle af dets scripts kunne udgøre en risiko, hvis de blev efterladt på en produktionsserver. Det er kun til stede, når projektet hentes via `git clone`.

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
| `CoreBundle/` | PHPUnit-tests, der spejler `src/CoreBundle/`: `Api/`, `ApiResource/`, `Command/`, `Controller/`, `DataFixtures/`, `Entity/`, `Event/`, `EventListener/`, `Filter/`, `fixtures/`, `Helpers/`, `Mcp/`, `Migrations/`, `Repository/`, `Security/`, `Serializer/`, `Service/`, `Settings/`, `State/`, `Tool/`, `Traits/`, `Twig/` |
| `CourseBundle/` | PHPUnit-tests, der spejler `src/CourseBundle/`: `Api/`, `Component/CourseCopy/`, `Repository/`, `Settings/` |
| `datafiller/` | Scripts, der fylder en testinstallation med demoindhold: `data_courses.php`, `data_users.php`, `fill_courses.php`, `fill_users.php`, `fill_many_users.php`, `fill_whoisonline.php`, `generate_users.php`, `fill_all.php` (kører de øvrige), plus `images/` og et stort CSV-eksempel til brugerimport |
| `history/` | Snapshots, der dokumenterer Chamilos struktur ved tidligere udgivelser (`1.8.8.2`, `1.9.0`, `1.10.0`, `1.11.0`, `2.0`) |
| `phpstan/` | `doctrine-orm-bootstrap.php`, indlæst af PHPStan ved analyse af Doctrine ORM-kode |
| `playwright/` | End-to-end-browsertests: `features/*.feature` (Gherkin-scenarier kørt via [playwright-bdd](https://vitalets.github.io/playwright-bdd/)), `steps/common.steps.ts` (TypeScript-trindefinitioner), `fixtures/` (testfiler, f.eks. regneark), `scripts/check-results.mjs`, `playwright.config.ts` og det genererede `.features-gen/`-output. Erstatter den gamle Behat-suite, hvis scenarier fortsat findes i git-historikken til reference |
| `procedures/` | Regneark (i øjeblikket `spanish/`) brugt som tjeklistegrundlag til manuel kvalitetsgennemgang af funktioner |
| `scripts/` | Engangs-scripts til vedligeholdelse/rettelse/migrering for eksisterende Chamilo-portaler (primært rettet mod ældre versioner), plus undermapperne `git-hooks/`, `img/`, `lang/` og `packaging/` |

Se [Testing](../contributing/testing.md) for, hvordan testdatabasen sættes op, og hvordan PHPUnit- og Playwright-suiterne køres.

## Build Configuration

| File | Purpose |
|------|---------|
| `webpack.config.js` | Webpack Encore-konfiguration (entries, loaders, plugins) |
| `tailwind.config.js` | Tailwind CSS-konfiguration (content-stier, theme-udvidelser, plugins) |
| `tsconfig.json` | TypeScript-konfiguration |
| `eslint.config.mjs` | ESLint-regler (flat config) |
| `.prettierrc.json` | Prettier-formateringsregler |

Alle filer ligger i projektets rod. PostCSS-plugins (Tailwind + Autoprefixer) konfigureres inline inde i `webpack.config.js` via `enablePostCssLoader()` — der findes ingen selvstændig `postcss.config.js`. `webpack.config.js` læser `tailwind.config.js` indirekte gennem PostCSS, så ændringer i Tailwinds `content`- eller `theme`-sektioner træder i kraft ved næste kørsel af `yarn encore dev` / `yarn encore production`.

## Webpack Entry Points

Bygget producerer disse bundles:

**JavaScript:**
* `vue` — Hovedapplikationen i Vue 3 (`assets/vue/main.js`)
* `vue_installer` — Installationsguiden (`assets/vue/main_installer.js`)
* `legacy_app`, `legacy_exercise`, `legacy_lp`, `legacy_document` — Legacy-JS til sider, der endnu ikke er migreret til Vue

**CSS:**
* `app` — Hovedstylesheet (`assets/css/app.scss`)
* Plus specialiserede stylesheets: `chat`, `document`, `editor`, `editor_content`, `markdown`, `print`, `responsive`, `scorm`

## CSS-struktur (`assets/css/`)

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

Tailwind er integreret via PostCSS. `assets/css/_tailwind.scss` udsender base-, komponent- og utility-lagene; `assets/css/app.scss` importerer den først, så Tailwind-utilities er tilgængelige i alle øvrige partials. Tailwind-konfigurationen — indholdsstier til purging, temaudvidelser og plugins — ligger i `tailwind.config.js` i projektets rod (`/var/www/chamilo/tailwind.config.js`).

Brugerdefinerede utility-klasser og komponentklasser defineret med `@layer` (synlige i `app.scss`) følger Tailwinds lagdelingskonvention, så brugerdefinerede klasser overholder de samme specificitetsregler som de genererede utilities.

### Farvetemaer

Chamilo understøtter et farvetemasystem, der kan konfigureres direkte fra administrationsgrænsefladen (**Admin > Color Themes**). Hvert gemt tema skriver sine filer til en dedikeret mappe under `var/themes/`:

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

`colors.css` definerer CSS custom properties som mellemrumsseparerede RGB-kanaltripletter i stedet for `rgb()`-værdier, hvilket gør det muligt for Tailwind at sammensætte opacitet-varianter (f.eks. `bg-primary/50`) uden yderligere konfiguration:

```css
:root {
    --color-primary-base: 46 117 163;
    --color-secondary-base: 243 126 47;
    /* ... */
}
```

Temalaget ligger oven på det kompilerede Tailwind/SCSS-bundle: browseren indlæser `colors.css` efter det primære stylesheet, så temaændringer træder i kraft med det samme uden et build-trin.