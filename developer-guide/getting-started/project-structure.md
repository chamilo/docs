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
│   ├── basecomponents/  # BaseButton, BaseIcon, ChamiloIcons.js, etc.
│   ├── layout/          # DashboardLayout, Sidebar, Topbar
│   ├── course/          # Course cards, catalogs, forms
│   ├── session/         # Session components
│   ├── assignments/     # Assignment forms and lists
│   ├── chat/            # Chat and AI tutor
│   ├── filemanager/     # File browser components
│   ├── installer/       # Installation wizard (Step1-7)
│   └── ...
├── views/               # Page-level Vue views
│   ├── course/          # Course pages
│   ├── documents/       # Document management
│   ├── glossary/        # Glossary pages
│   ├── admin/           # Admin pages
│   └── ...
├── router/              # Vue Router configuration (per-feature route modules)
├── store/               # Pinia stores (security, course settings, enrollment)
└── composables/         # Shared composition functions
```

## Configuration (`config/`)

| File | Purpose |
|------|---------|
| `packages/security.yaml` | Security configuration, role hierarchy, firewalls |
| `packages/doctrine.yaml` | Database ORM configuration |
| `packages/nelmio_cors.yaml` | CORS settings for API |
| `packages/framework.yaml` | Symfony framework settings |
| `routes/` | Route definitions |

## Build Configuration

| File | Purpose |
|------|---------|
| `webpack.config.js` | Webpack Encore configuration (entries, loaders, plugins) |
| `tailwind.config.js` | Tailwind CSS configuration |
| `postcss.config.js` | PostCSS plugins |
| `tsconfig.json` | TypeScript configuration |
| `.eslintrc.js` | ESLint rules |

## Webpack Entry Points

The build produces these bundles:

**JavaScript:**
* `vue` — Main Vue 3 application (`assets/vue/main.js`)
* `vue_installer` — Installation wizard (`assets/vue/main_installer.js`)
* `legacy_app`, `legacy_exercise`, `legacy_lp`, `legacy_document` — Legacy JS for pages not yet migrated to Vue

**CSS:**
* `app` — Main stylesheet (`assets/css/app.scss`)
* Plus specialized sheets for chat, documents, editor, print, SCORM
