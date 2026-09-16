# Struttura del progetto

## Directory di primo livello

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

## Codice sorgente (`src/`)

### CoreBundle

Il bundle più grande. Sottodirectory rilevanti:

| Directory | Contenuti |
|-----------|----------|
| `Entity/` | Entità Doctrine (User, Course, Session, ResourceNode, ecc.) |
| `Controller/` | Controller di amministrazione, azioni API e pagine (la sottocartella Api/ contiene le azioni personalizzate di API Platform) |
| `Settings/` | File di schema delle impostazioni (configurazione della piattaforma) |
| `Repository/` | Repository Doctrine |
| `AiProvider/` | Implementazioni dei provider di IA (OpenAI, Gemini, Mistral, DeepSeek, Grok) |
| `Tool/` | Definizioni degli strumenti del corso |
| `Security/` | Voter, authenticator, autorizzazione |
| `EventListener/` | Event listener |
| `EventSubscriber/` | Event subscriber |
| `Command/` | Comandi della console Symfony |
| `Migrations/` | Migrazioni del database |
| `Twig/` | Estensioni Twig |
| `Storage/` | Adapter di storage Flysystem |

### CourseBundle

Entità e logica specifiche del corso:

| Directory | Contenuti |
|-----------|----------|
| `Entity/` | Entità dei contenuti del corso (CDocument, CQuiz, CLp, CForum, CStudentPublication, ecc.) |
| `Controller/` | Controller del corso |
| `Settings/` | Schemi delle impostazioni a livello di corso |
| `Component/CourseCopy/` | Importazione/esportazione del corso (Common Cartridge, Moodle) |

### LtiBundle

Integrazione LTI 1.3:

| Directory | Contenuti |
|-----------|----------|
| `Entity/` | Entità di piattaforma, tool e deployment LTI |
| `Controller/` | Endpoint di avvio e configurazione LTI |

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

## Configurazione (`config/`)

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

Symfony unisce automaticamente i file di base `packages/*.yaml` con quelli nella sottodirectory dell'ambiente corrispondente (`dev/`, `prod/` o `test/`), quindi i file specifici dell'ambiente devono sovrascrivere soltanto i valori che differiscono.

## Test (`tests/`)

`tests/` **non è incluso nei download pacchettizzati di Chamilo** (ZIP/tarball di rilascio) — viene rimosso perché non ha alcuna utilità a runtime e alcuni dei suoi script potrebbero costituire un rischio se lasciati su un server di produzione. È presente solo quando il progetto viene ottenuto tramite `git clone`.

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
| `CoreBundle/` | Test PHPUnit che rispecchiano `src/CoreBundle/`: `Api/`, `ApiResource/`, `Command/`, `Controller/`, `DataFixtures/`, `Entity/`, `Event/`, `EventListener/`, `Filter/`, `fixtures/`, `Helpers/`, `Mcp/`, `Migrations/`, `Repository/`, `Security/`, `Serializer/`, `Service/`, `Settings/`, `State/`, `Tool/`, `Traits/`, `Twig/` |
| `CourseBundle/` | Test PHPUnit che rispecchiano `src/CourseBundle/`: `Api/`, `Component/CourseCopy/`, `Repository/`, `Settings/` |
| `datafiller/` | Script che popolano un'installazione di test con contenuti demo: `data_courses.php`, `data_users.php`, `fill_courses.php`, `fill_users.php`, `fill_many_users.php`, `fill_whoisonline.php`, `generate_users.php`, `fill_all.php` (esegue gli altri), più `images/` e un ampio esempio CSV di importazione utenti |
| `history/` | Snapshot che documentano la struttura di Chamilo nelle versioni precedenti (`1.8.8.2`, `1.9.0`, `1.10.0`, `1.11.0`, `2.0`) |
| `phpstan/` | `doctrine-orm-bootstrap.php`, caricato da PHPStan durante l'analisi del codice Doctrine ORM |
| `playwright/` | Test end-to-end nel browser: `features/*.feature` (scenari Gherkin eseguiti tramite [playwright-bdd](https://vitalets.github.io/playwright-bdd/)), `steps/common.steps.ts` (definizioni dei passi in TypeScript), `fixtures/` (file di test, ad es. fogli di calcolo), `scripts/check-results.mjs`, `playwright.config.ts` e l'output generato `.features-gen/`. Sostituisce la vecchia suite Behat, i cui scenari restano nella cronologia git a titolo di riferimento |
| `procedures/` | Fogli di calcolo (attualmente `spanish/`) usati come base di checklist per la revisione qualitativa manuale delle funzionalità |
| `scripts/` | Script una tantum di manutenzione/correzione/migrazione per portali Chamilo esistenti (principalmente rivolti a versioni più vecchie), più le sottocartelle `git-hooks/`, `img/`, `lang/` e `packaging/` |

Vedere [Testing](../contributing/testing.md) per come configurare il database di test ed eseguire le suite PHPUnit e Playwright.

## Configurazione di build

| File | Purpose |
|------|---------|
| `webpack.config.js` | Configurazione di Webpack Encore (entry, loader, plugin) |
| `tailwind.config.js` | Configurazione di Tailwind CSS (percorsi dei contenuti, estensioni del tema, plugin) |
| `tsconfig.json` | Configurazione TypeScript |
| `eslint.config.mjs` | Regole ESLint (flat config) |
| `.prettierrc.json` | Regole di formattazione Prettier |

Tutti i file si trovano nella radice del progetto. I plugin PostCSS (Tailwind + Autoprefixer) sono configurati in linea all'interno di `webpack.config.js` tramite `enablePostCssLoader()` — non esiste un `postcss.config.js` autonomo. `webpack.config.js` legge `tailwind.config.js` indirettamente tramite PostCSS, quindi le modifiche alle sezioni `content` o `theme` di Tailwind hanno effetto alla successiva esecuzione di `yarn encore dev` / `yarn encore production`.

## Punti di ingresso Webpack

La build produce questi bundle:

**JavaScript:**
* `vue` — Applicazione principale Vue 3 (`assets/vue/main.js`)
* `vue_installer` — Procedura guidata di installazione (`assets/vue/main_installer.js`)
* `legacy_app`, `legacy_exercise`, `legacy_lp`, `legacy_document` — JS legacy per le pagine non ancora migrate a Vue

**CSS:**
* `app` — Foglio di stile principale (`assets/css/app.scss`)
* Più fogli specializzati: `chat`, `document`, `editor`, `editor_content`, `markdown`, `print`, `responsive`, `scorm`

## Struttura CSS (`assets/css/`)

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

Tailwind è integrato tramite PostCSS. `assets/css/_tailwind.scss` emette i layer base, component e utility; `assets/css/app.scss` lo importa per primo, così le utility Tailwind sono disponibili in tutti gli altri partial. La configurazione di Tailwind — percorsi dei contenuti per il purging, estensioni del tema e plugin — si trova in `tailwind.config.js` alla radice del progetto (`/var/www/chamilo/tailwind.config.js`).

Le classi utility e le classi component personalizzate definite con `@layer` (visibili in `app.scss`) seguono la convenzione di layering di Tailwind, in modo che le classi definite dall’utente rispettino le stesse regole di specificità delle utility generate.

### Temi colore

Chamilo supporta un sistema di temi colore configurabile direttamente dall’interfaccia di amministrazione (**Amministrazione > Temi colore**). Ogni tema salvato scrive i propri file in una directory dedicata sotto `var/themes/`:

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

`colors.css` definisce le custom properties CSS come triplette di canali RGB separate da spazi anziché come valori `rgb()`, il che consente a Tailwind di comporre le varianti di opacità (ad es. `bg-primary/50`) senza configurazione aggiuntiva:

```css
:root {
    --color-primary-base: 46 117 163;
    --color-secondary-base: 243 126 47;
    /* ... */
}
```

Il layer del tema si sovrappone al bundle Tailwind/SCSS compilato: il browser carica `colors.css` dopo il foglio di stile principale, così le modifiche al tema hanno effetto immediato senza un passaggio di build.