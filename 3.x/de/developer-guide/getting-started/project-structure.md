# Projektstruktur

## Verzeichnisse auf oberster Ebene

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

## Quellcode (`src/`)

### CoreBundle

Das größte Bundle. Bemerkenswerte Unterverzeichnisse:

| Verzeichnis | Inhalt |
|-----------|----------|
| `Entity/` | Doctrine-Entitäten (User, Course, Session, ResourceNode usw.) |
| `Controller/` | Admin-, API-Action- und Seiten-Controller (der Unterordner Api/ enthält benutzerdefinierte API-Platform-Actions) |
| `Settings/` | Schema-Dateien für Einstellungen (Plattformkonfiguration) |
| `Repository/` | Doctrine-Repositories |
| `AiProvider/` | Implementierungen von KI-Anbietern (OpenAI, Gemini, Mistral, DeepSeek, Grok) |
| `Tool/` | Definitionen von Kurswerkzeugen |
| `Security/` | Voters, Authenticators, Autorisierung |
| `EventListener/` | Event-Listener |
| `EventSubscriber/` | Event-Subscriber |
| `Command/` | Symfony-Konsolenbefehle |
| `Migrations/` | Datenbankmigrationen |
| `Twig/` | Twig-Erweiterungen |
| `Storage/` | Flysystem-Speicheradapter |

### CourseBundle

Kursspezifische Entitäten und Logik:

| Verzeichnis | Inhalt |
|-----------|----------|
| `Entity/` | Entitäten für Kursinhalte (CDocument, CQuiz, CLp, CForum, CStudentPublication usw.) |
| `Controller/` | Kurs-Controller |
| `Settings/` | Schemas für Einstellungen auf Kursebene |
| `Component/CourseCopy/` | Kursimport/-export (Common Cartridge, Moodle) |

### LtiBundle

LTI-1.3-Integration:

| Verzeichnis | Inhalt |
|-----------|----------|
| `Entity/` | Entitäten für LTI-Plattform, Tool und Deployment |
| `Controller/` | Endpunkte für LTI-Launch und Konfiguration |

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

Symfony führt die Basisdateien `packages/*.yaml` automatisch mit denen im passenden Umgebungsunterverzeichnis (`dev/`, `prod/` oder `test/`) zusammen, sodass umgebungsspezifische Dateien nur die abweichenden Werte überschreiben müssen.

## Tests (`tests/`)

`tests/` ist **nicht in den paketierten Chamilo-Downloads enthalten** (Release-ZIPs/Tarballs) — es wird entfernt, weil es zur Laufzeit keinen Zweck erfüllt und einige seiner Skripte ein Risiko darstellen könnten, wenn sie auf einem Produktionsserver verbleiben. Es ist nur vorhanden, wenn das Projekt per `git clone` bezogen wird.

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
| `CoreBundle/` | PHPUnit-Tests, die `src/CoreBundle/` spiegeln: `Api/`, `ApiResource/`, `Command/`, `Controller/`, `DataFixtures/`, `Entity/`, `Event/`, `EventListener/`, `Filter/`, `fixtures/`, `Helpers/`, `Mcp/`, `Migrations/`, `Repository/`, `Security/`, `Serializer/`, `Service/`, `Settings/`, `State/`, `Tool/`, `Traits/`, `Twig/` |
| `CourseBundle/` | PHPUnit-Tests, die `src/CourseBundle/` spiegeln: `Api/`, `Component/CourseCopy/`, `Repository/`, `Settings/` |
| `datafiller/` | Skripte, die eine Testinstallation mit Demo-Inhalten füllen: `data_courses.php`, `data_users.php`, `fill_courses.php`, `fill_users.php`, `fill_many_users.php`, `fill_whoisonline.php`, `generate_users.php`, `fill_all.php` (führt die übrigen aus), plus `images/` und ein großes CSV-Beispiel für den Benutzerimport |
| `history/` | Snapshots, die die Struktur von Chamilo bei früheren Releases dokumentieren (`1.8.8.2`, `1.9.0`, `1.10.0`, `1.11.0`, `2.0`) |
| `phpstan/` | `doctrine-orm-bootstrap.php`, von PHPStan geladen, wenn Doctrine-ORM-Code analysiert wird |
| `playwright/` | Browserbasierte End-to-End-Tests: `features/*.feature` (Gherkin-Szenarien, ausgeführt über [playwright-bdd](https://vitalets.github.io/playwright-bdd/)), `steps/common.steps.ts` (TypeScript-Step-Definitionen), `fixtures/` (Testdateien, z. B. Tabellenkalkulationen), `scripts/check-results.mjs`, `playwright.config.ts` und die erzeugte Ausgabe `.features-gen/`. Ersetzt die alte Behat-Suite, deren Szenarien in der Git-Historie zur Referenz verbleiben |
| `procedures/` | Tabellenkalkulationen (derzeit `spanish/`), die als Checklisten-Grundlage für die manuelle Qualitätsprüfung von Funktionen dienen |
| `scripts/` | Einmalige Wartungs-/Korrektur-/Migrationsskripte für bestehende Chamilo-Portale (überwiegend für ältere Versionen), plus die Unterordner `git-hooks/`, `img/`, `lang/` und `packaging/` |

Siehe [Testing](../contributing/testing.md) für die Einrichtung der Testdatenbank und das Ausführen der PHPUnit- und Playwright-Suites.

## Build Configuration

| File | Purpose |
|------|---------|
| `webpack.config.js` | Webpack-Encore-Konfiguration (Entries, Loader, Plugins) |
| `tailwind.config.js` | Tailwind-CSS-Konfiguration (Content-Pfade, Theme-Erweiterungen, Plugins) |
| `tsconfig.json` | TypeScript-Konfiguration |
| `eslint.config.mjs` | ESLint-Regeln (Flat Config) |
| `.prettierrc.json` | Prettier-Formatierungsregeln |

Alle Dateien liegen im Projektstamm. PostCSS-Plugins (Tailwind + Autoprefixer) werden inline in `webpack.config.js` über `enablePostCssLoader()` konfiguriert — es gibt keine eigenständige `postcss.config.js`. `webpack.config.js` liest `tailwind.config.js` indirekt über PostCSS, sodass Änderungen an den Tailwind-Abschnitten `content` oder `theme` beim nächsten Lauf von `yarn encore dev` / `yarn encore production` wirksam werden.

## Webpack Entry Points

Der Build erzeugt diese Bundles:

**JavaScript:**
* `vue` — Hauptanwendung Vue 3 (`assets/vue/main.js`)
* `vue_installer` — Installationsassistent (`assets/vue/main_installer.js`)
* `legacy_app`, `legacy_exercise`, `legacy_lp`, `legacy_document` — Legacy-JS für Seiten, die noch nicht nach Vue migriert sind

**CSS:**
* `app` — Hauptstylesheet (`assets/css/app.scss`)
* Plus spezialisierte Stylesheets: `chat`, `document`, `editor`, `editor_content`, `markdown`, `print`, `responsive`, `scorm`

## CSS-Struktur (`assets/css/`)

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

Tailwind ist über PostCSS integriert. `assets/css/_tailwind.scss` gibt die Base-, Component- und Utility-Layer aus; `assets/css/app.scss` importiert diese Datei zuerst, sodass Tailwind-Utilities in allen übrigen Partials verfügbar sind. Die Tailwind-Konfiguration — Content-Pfade für das Purging, Theme-Erweiterungen und Plugins — liegt in `tailwind.config.js` im Projektstamm (`/var/www/chamilo/tailwind.config.js`).

Benutzerdefinierte Utility- und Komponentenklassen, die mit `@layer` definiert sind (sichtbar in `app.scss`), folgen der Layer-Konvention von Tailwind, sodass benutzerdefinierte Klassen denselben Spezifitätsregeln unterliegen wie die generierten Utilities.

### Farbthemen

Chamilo unterstützt ein Farbschema-System, das direkt über die Administrationsoberfläche konfiguriert werden kann (**Admin > Color Themes**). Jedes gespeicherte Theme schreibt seine Dateien in ein eigenes Verzeichnis unter `var/themes/`:

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

`colors.css` definiert CSS Custom Properties als durch Leerzeichen getrennte RGB-Kanal-Tripel statt als `rgb()`-Werte, sodass Tailwind Opacity-Varianten (z. B. `bg-primary/50`) ohne zusätzliche Konfiguration zusammensetzen kann:

```css
:root {
    --color-primary-base: 46 117 163;
    --color-secondary-base: 243 126 47;
    /* ... */
}
```

Die Theme-Schicht liegt über dem kompilierten Tailwind/SCSS-Bundle: Der Browser lädt `colors.css` nach dem Hauptstylesheet, sodass Theme-Änderungen sofort ohne Build-Schritt wirksam werden.