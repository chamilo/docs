# Prosjektstruktur

## Kataloger på øverste nivå

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

Den største bundelen. Viktige underkataloger:

| Katalog | Innhold |
|-----------|----------|
| `Entity/` | Doctrine-entiteter (User, Course, Session, ResourceNode, osv.) |
| `Controller/` | Admin-, API-action- og sidekontrollere (undermappen Api/ inneholder egendefinerte API Platform-actions) |
| `Settings/` | Skjemafiler for innstillinger (plattformkonfigurasjon) |
| `Repository/` | Doctrine-repositorier |
| `AiProvider/` | Implementasjoner av AI-leverandører (OpenAI, Gemini, Mistral, DeepSeek, Grok) |
| `Tool/` | Definisjoner av kursverktøy |
| `Security/` | Voters, autentikatorer, autorisasjon |
| `EventListener/` | Hendelseslyttere |
| `EventSubscriber/` | Hendelsesabonnenter |
| `Command/` | Symfony-konsollkommandoer |
| `Migrations/` | Databasemigreringer |
| `Twig/` | Twig-utvidelser |
| `Storage/` | Flysystem-lagringsadaptere |

### CourseBundle

Kursspesifikke entiteter og logikk:

| Katalog | Innhold |
|-----------|----------|
| `Entity/` | Entiteter for kursinnhold (CDocument, CQuiz, CLp, CForum, CStudentPublication, osv.) |
| `Controller/` | Kurskontrollere |
| `Settings/` | Skjemaer for innstillinger på kursnivå |
| `Component/CourseCopy/` | Import/eksport av kurs (Common Cartridge, Moodle) |

### LtiBundle

LTI 1.3-integrasjon:

| Katalog | Innhold |
|-----------|----------|
| `Entity/` | Entiteter for LTI-plattform, -verktøy og -utrulling |
| `Controller/` | Endepunkter for LTI-oppstart og -konfigurasjon |

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

## Konfigurasjon (`config/`)

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

Symfony slår automatisk sammen de grunnleggende `packages/*.yaml`-filene med filene i den tilhørende miljøundermappen (`dev/`, `prod/` eller `test/`), slik at miljøspesifikke filer bare trenger å overstyre verdiene som er forskjellige.

## Tester (`tests/`)

`tests/` er **ikke inkludert i pakkede Chamilo-nedlastinger** (utgivelses-ZIP-er/tarballer) — den fjernes fordi den ikke har noe formål ved kjøring, og noen av skriptene kan utgjøre en risiko hvis de blir liggende på en produksjonsserver. Den er bare til stede når prosjektet hentes via `git clone`.

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

| Katalog | Innhold |
|-----------|----------|
| `CoreBundle/` | PHPUnit-tester som speiler `src/CoreBundle/`: `Api/`, `ApiResource/`, `Command/`, `Controller/`, `DataFixtures/`, `Entity/`, `Event/`, `EventListener/`, `Filter/`, `fixtures/`, `Helpers/`, `Mcp/`, `Migrations/`, `Repository/`, `Security/`, `Serializer/`, `Service/`, `Settings/`, `State/`, `Tool/`, `Traits/`, `Twig/` |
| `CourseBundle/` | PHPUnit-tester som speiler `src/CourseBundle/`: `Api/`, `Component/CourseCopy/`, `Repository/`, `Settings/` |
| `datafiller/` | Skript som fyller en testinstallasjon med demo-innhold: `data_courses.php`, `data_users.php`, `fill_courses.php`, `fill_users.php`, `fill_many_users.php`, `fill_whoisonline.php`, `generate_users.php`, `fill_all.php` (kjører de andre), pluss `images/` og et stort CSV-eksempel for brukerimport |
| `history/` | Øyeblikksbilder som dokumenterer Chamilos struktur ved tidligere utgivelser (`1.8.8.2`, `1.9.0`, `1.10.0`, `1.11.0`, `2.0`) |
| `phpstan/` | `doctrine-orm-bootstrap.php`, lastet av PHPStan ved analyse av Doctrine ORM-kode |
| `playwright/` | Ende-til-ende nettlesertester: `features/*.feature` (Gherkin-scenarier kjørt via [playwright-bdd](https://vitalets.github.io/playwright-bdd/)), `steps/common.steps.ts` (TypeScript-stegdefinisjoner), `fixtures/` (testfiler, f.eks. regneark), `scripts/check-results.mjs`, `playwright.config.ts`, og den genererte `.features-gen/`-utdataen. Erstatter den gamle Behat-pakken, hvis scenarier fortsatt ligger i git-historikken til referanse |
| `procedures/` | Regneark (for øyeblikket `spanish/`) brukt som sjekklistegrunnlag for manuell kvalitetsgjennomgang av funksjoner |
| `scripts/` | Engangs skript for vedlikehold/fiks/migrering for eksisterende Chamilo-portaler (hovedsakelig rettet mot eldre versjoner), pluss undermappene `git-hooks/`, `img/`, `lang/` og `packaging/` |

Se [Testing](../contributing/testing.md) for hvordan du setter opp testdatabasen og kjører PHPUnit- og Playwright-pakkene.

## Byggekonfigurasjon

| Fil | Formål |
|------|---------|
| `webpack.config.js` | Webpack Encore-konfigurasjon (oppføringer, lastemotorer, plugins) |
| `tailwind.config.js` | Tailwind CSS-konfigurasjon (innholdsstier, tema-utvidelser, plugins) |
| `tsconfig.json` | TypeScript-konfigurasjon |
| `eslint.config.mjs` | ESLint-regler (flat config) |
| `.prettierrc.json` | Prettier-formateringsregler |

Alle filene ligger i prosjektroten. PostCSS-plugins (Tailwind + Autoprefixer) er konfigurert innebygd i `webpack.config.js` via `enablePostCssLoader()` — det finnes ingen frittstående `postcss.config.js`. `webpack.config.js` leser `tailwind.config.js` indirekte gjennom PostCSS, så endringer i Tailwinds `content`- eller `theme`-seksjoner trer i kraft ved neste kjøring av `yarn encore dev` / `yarn encore production`.

## Webpack-inngangspunkter

Bygget produserer disse buntene:

**JavaScript:**
* `vue` — Hovedapplikasjonen i Vue 3 (`assets/vue/main.js`)
* `vue_installer` — Installasjonsveiviser (`assets/vue/main_installer.js`)
* `legacy_app`, `legacy_exercise`, `legacy_lp`, `legacy_document` — Eldre JS for sider som ennå ikke er migrert til Vue

**CSS:**
* `app` — Hovedstilark (`assets/css/app.scss`)
* Pluss spesialiserte ark: `chat`, `document`, `editor`, `editor_content`, `markdown`, `print`, `responsive`, `scorm`

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

Tailwind er integrert via PostCSS. `assets/css/_tailwind.scss` emitterer base-, komponent- og utility-lagene; `assets/css/app.scss` importerer den først, slik at Tailwind-utilities er tilgjengelige i alle øvrige partials. Tailwind-konfigurasjonen — innholdsstier for purging, tema-utvidelser og plugins — ligger i `tailwind.config.js` i prosjektroten (`/var/www/chamilo/tailwind.config.js`).

Egendefinerte utility-klasser og komponentklasser definert med `@layer` (synlige i `app.scss`) følger Tailwinds lagkonvensjon, slik at brukerdefinerte klasser respekterer de samme spesifisitetsreglene som de genererte utilities.

### Fargetemaer

Chamilo støtter et fargetemasystem som kan konfigureres direkte fra administrasjonsgrensesnittet (**Admin > Color Themes**). Hvert lagrede tema skriver filene sine til en egen katalog under `var/themes/`:

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

`colors.css` definerer CSS custom properties som mellomromsseparerte RGB-kanaltripletter i stedet for `rgb()`-verdier, noe som gjør at Tailwind kan sette sammen opacity-varianter (f.eks. `bg-primary/50`) uten ekstra konfigurasjon:

```css
:root {
    --color-primary-base: 46 117 163;
    --color-secondary-base: 243 126 47;
    /* ... */
}
```

Temalaget ligger oppå den kompilerte Tailwind/SCSS-bundelen: nettleseren laster `colors.css` etter hovedstilarket, slik at temaendringer trer i kraft umiddelbart uten et byggesteg.