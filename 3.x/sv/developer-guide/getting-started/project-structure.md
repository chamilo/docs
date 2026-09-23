# Projektstruktur

## Kataloger på översta nivån

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

## Källkod (`src/`)

### CoreBundle

Det största bundlet. Anmärkningsvärda underkataloger:

| Directory | Contents |
|-----------|----------|
| `Entity/` | Doctrine-entiteter (User, Course, Session, ResourceNode, m.fl.) |
| `Controller/` | Admin-, API-action- och sidkontroller (underkatalogen Api/ innehåller anpassade API Platform-actions) |
| `Settings/` | Schemafiler för inställningar (plattformskonfiguration) |
| `Repository/` | Doctrine-repositorier |
| `AiProvider/` | Implementationer av AI-leverantörer (OpenAI, Gemini, Mistral, DeepSeek, Grok) |
| `Tool/` | Definitioner av kursverktyg |
| `Security/` | Voters, authenticators, auktorisering |
| `EventListener/` | Event listeners |
| `EventSubscriber/` | Event subscribers |
| `Command/` | Symfony-konsolkommandon |
| `Migrations/` | Databasmigreringar |
| `Twig/` | Twig-tillägg |
| `Storage/` | Flysystem-lagringsadaptrar |

### CourseBundle

Kursspecifika entiteter och logik:

| Directory | Contents |
|-----------|----------|
| `Entity/` | Entiteter för kursinnehåll (CDocument, CQuiz, CLp, CForum, CStudentPublication, m.fl.) |
| `Controller/` | Kurskontroller |
| `Settings/` | Scheman för kursnivåinställningar |
| `Component/CourseCopy/` | Import/export av kurser (Common Cartridge, Moodle) |

### LtiBundle

LTI 1.3-integration:

| Directory | Contents |
|-----------|----------|
| `Entity/` | Entiteter för LTI-plattform, verktyg och distribution |
| `Controller/` | Endpoints för LTI-start och konfiguration |

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

Symfony slår automatiskt ihop basfilerna `packages/*.yaml` med filerna i den matchande miljöundermappen (`dev/`, `prod/` eller `test/`), så miljöspecifika filer behöver bara åsidosätta de värden som skiljer sig.

## Tester (`tests/`)

`tests/` **ingår inte i paketerade Chamilo-nedladdningar** (release-ZIP/tarballar) — den tas bort eftersom den saknar syfte vid körning och vissa av dess skript kan utgöra en risk om de lämnas kvar på en produktionsserver. Den finns bara när projektet hämtas via `git clone`.

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

| Katalog | Innehåll |
|-----------|----------|
| `CoreBundle/` | PHPUnit-tester som speglar `src/CoreBundle/`: `Api/`, `ApiResource/`, `Command/`, `Controller/`, `DataFixtures/`, `Entity/`, `Event/`, `EventListener/`, `Filter/`, `fixtures/`, `Helpers/`, `Mcp/`, `Migrations/`, `Repository/`, `Security/`, `Serializer/`, `Service/`, `Settings/`, `State/`, `Tool/`, `Traits/`, `Twig/` |
| `CourseBundle/` | PHPUnit-tester som speglar `src/CourseBundle/`: `Api/`, `Component/CourseCopy/`, `Repository/`, `Settings/` |
| `datafiller/` | Skript som fyller en testinstallation med demoinnehåll: `data_courses.php`, `data_users.php`, `fill_courses.php`, `fill_users.php`, `fill_many_users.php`, `fill_whoisonline.php`, `generate_users.php`, `fill_all.php` (kör de övriga), plus `images/` och ett stort CSV-exempel för användarimport |
| `history/` | Ögonblicksbilder som dokumenterar Chamilos struktur vid tidigare utgåvor (`1.8.8.2`, `1.9.0`, `1.10.0`, `1.11.0`, `2.0`) |
| `phpstan/` | `doctrine-orm-bootstrap.php`, som laddas av PHPStan vid analys av Doctrine ORM-kod |
| `playwright/` | End-to-end-webbläsartester: `features/*.feature` (Gherkin-scenarier som körs via [playwright-bdd](https://vitalets.github.io/playwright-bdd/)), `steps/common.steps.ts` (TypeScript-stegdefinitioner), `fixtures/` (testfiler, t.ex. kalkylblad), `scripts/check-results.mjs`, `playwright.config.ts` och den genererade utdata i `.features-gen/`. Ersätter den gamla Behat-sviten, vars scenarier finns kvar i git-historiken som referens |
| `procedures/` | Kalkylblad (för närvarande `spanish/`) som används som checklista för manuell kvalitetsgranskning av funktioner |
| `scripts/` | Engångsskript för underhåll/fix/migrering för befintliga Chamilo-portaler (främst riktade mot äldre versioner), plus undermapparna `git-hooks/`, `img/`, `lang/` och `packaging/` |

Se [Testing](../contributing/testing.md) för hur du sätter upp testdatabasen och kör PHPUnit- och Playwright-sviterna.

## Byggkonfiguration

| Fil | Syfte |
|------|---------|
| `webpack.config.js` | Webpack Encore-konfiguration (entries, loaders, plugins) |
| `tailwind.config.js` | Tailwind CSS-konfiguration (innehållssökvägar, temautökningar, plugins) |
| `tsconfig.json` | TypeScript-konfiguration |
| `eslint.config.mjs` | ESLint-regler (flat config) |
| `.prettierrc.json` | Prettier-formateringsregler |

Alla filer ligger i projektets rot. PostCSS-plugins (Tailwind + Autoprefixer) konfigureras inline i `webpack.config.js` via `enablePostCssLoader()` — det finns ingen fristående `postcss.config.js`. `webpack.config.js` läser `tailwind.config.js` indirekt via PostCSS, så ändringar i Tailwinds avsnitt `content` eller `theme` får effekt vid nästa körning av `yarn encore dev` / `yarn encore production`.

## Webpack-ingångspunkter

Bygget producerar dessa bunches:

**JavaScript:**
* `vue` — Huvudsaklig Vue 3-applikation (`assets/vue/main.js`)
* `vue_installer` — Installationsguiden (`assets/vue/main_installer.js`)
* `legacy_app`, `legacy_exercise`, `legacy_lp`, `legacy_document` — Äldre JS för sidor som ännu inte migrerats till Vue

**CSS:**
* `app` — Huvudstilmall (`assets/css/app.scss`)
* Plus specialiserade mallar: `chat`, `document`, `editor`, `editor_content`, `markdown`, `print`, `responsive`, `scorm`

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

Tailwind integreras via PostCSS. `assets/css/_tailwind.scss` emitterar lagren base, component och utility; `assets/css/app.scss` importerar den först så att Tailwind-utilities är tillgängliga i alla övriga partials. Tailwind-konfigurationen — sökvägar för content-purging, tema-utökningar och plugins — finns i `tailwind.config.js` i projektets rot (`/var/www/chamilo/tailwind.config.js`).

Anpassade utility-klasser och komponentklasser definierade med `@layer` (synliga i `app.scss`) följer Tailwinds lagerkonvention så att användardefinierade klasser respekterar samma specificitetsregler som de genererade utilities.

### Färgteman

Chamilo stöder ett färgtemasystem som kan konfigureras direkt från administratörsgränssnittet (**Admin > Color Themes**). Varje sparat tema skriver sina filer till en dedikerad katalog under `var/themes/`:

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

`colors.css` definierar CSS custom properties som mellanslagsseparerade RGB-kanaltripletter i stället för `rgb()`-värden, vilket gör att Tailwind kan sätta ihop opacitetvarianter (t.ex. `bg-primary/50`) utan ytterligare konfiguration:

```css
:root {
    --color-primary-base: 46 117 163;
    --color-secondary-base: 243 126 47;
    /* ... */
}
```

Temalagret ligger ovanpå det kompilerade Tailwind/SCSS-paketet: webbläsaren läser in `colors.css` efter huvudstilmallen, så temaändringar träder i kraft omedelbart utan ett byggsteg.