# Project Structure

## Top-Level Directories

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

## Source Code (`src/`)

### CoreBundle

The largest bundle. Notable subdirectories:

| Directory | Contents |
|-----------|----------|
| `Entity/` | Doctrine entities (User, Course, Session, ResourceNode, etc.) |
| `Controller/` | Admin, API action, and page controllers (the Api/ subfolder holds custom API Platform actions) |
| `Settings/` | Settings schema files (platform configuration) |
| `Repository/` | Doctrine repositories |
| `AiProvider/` | AI provider implementations (OpenAI, Gemini, Mistral, DeepSeek, Grok) |
| `Tool/` | Course tool definitions |
| `Security/` | Voters, authenticators, authorization |
| `EventListener/` | Event listeners |
| `EventSubscriber/` | Event subscribers |
| `Command/` | Symfony console commands |
| `Migrations/` | Database migrations |
| `Twig/` | Twig extensions |
| `Storage/` | Flysystem storage adapters |

### CourseBundle

Course-specific entities and logic:

| Directory | Contents |
|-----------|----------|
| `Entity/` | Course-content entities (CDocument, CQuiz, CLp, CForum, CStudentPublication, etc.) |
| `Controller/` | Course controllers |
| `Settings/` | Course-level settings schemas |
| `Component/CourseCopy/` | Course import/export (Common Cartridge, Moodle) |

### LtiBundle

LTI 1.3 integration:

| Directory | Contents |
|-----------|----------|
| `Entity/` | LTI platform, tool, and deployment entities |
| `Controller/` | LTI launch and configuration endpoints |

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

Symfony automatically merges the base `packages/*.yaml` files with those in the matching environment subdirectory (`dev/`, `prod/`, or `test/`), so environment-specific files only need to override the values that differ.

## Build Configuration

| File | Purpose |
|------|---------|
| `webpack.config.js` | Webpack Encore configuration (entries, loaders, plugins) |
| `tailwind.config.js` | Tailwind CSS configuration (content paths, theme extensions, plugins) |
| `tsconfig.json` | TypeScript configuration |
| `eslint.config.mjs` | ESLint rules (flat config) |
| `.prettierrc.json` | Prettier formatting rules |

All files sit at the project root. PostCSS plugins (Tailwind + Autoprefixer) are configured inline inside `webpack.config.js` via `enablePostCssLoader()` — there is no standalone `postcss.config.js`. `webpack.config.js` reads `tailwind.config.js` indirectly through PostCSS, so changes to Tailwind's `content` or `theme` sections take effect on the next `yarn encore dev` / `yarn encore production` run.

## Webpack Entry Points

The build produces these bundles:

**JavaScript:**
* `vue` — Main Vue 3 application (`assets/vue/main.js`)
* `vue_installer` — Installation wizard (`assets/vue/main_installer.js`)
* `legacy_app`, `legacy_exercise`, `legacy_lp`, `legacy_document` — Legacy JS for pages not yet migrated to Vue

**CSS:**
* `app` — Main stylesheet (`assets/css/app.scss`)
* Plus specialized sheets: `chat`, `document`, `editor`, `editor_content`, `markdown`, `print`, `responsive`, `scorm`

## CSS Structure (`assets/css/`)

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

Tailwind is integrated via PostCSS. `assets/css/_tailwind.scss` emits the base, component, and utility layers; `assets/css/app.scss` imports it first so Tailwind utilities are available throughout all other partials. The Tailwind configuration — content paths for purging, theme extensions, and plugins — lives in `tailwind.config.js` at the project root (`/var/www/chamilo/tailwind.config.js`).

Custom utility classes and component classes defined with `@layer` (visible in `app.scss`) follow Tailwind's layering convention so that user-defined classes respect the same specificity rules as the generated utilities.

### Color Themes

Chamilo supports a color theming system that can be configured directly from the admin interface (**Admin > Color Themes**). Each saved theme writes its files into a dedicated directory under `var/themes/`:

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

`colors.css` defines CSS custom properties as space-separated RGB channel triplets rather than `rgb()` values, which allows Tailwind to compose opacity variants (e.g. `bg-primary/50`) without additional configuration:

```css
:root {
    --color-primary-base: 46 117 163;
    --color-secondary-base: 243 126 47;
    /* ... */
}
```

The theme layer sits on top of the compiled Tailwind/SCSS bundle: the browser loads `colors.css` after the main stylesheet, so theme changes take effect immediately without a build step.
