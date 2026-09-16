# Estructura del proyecto

## Directorios de nivel superior

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

## Código fuente (`src/`)

### CoreBundle

El bundle de mayor tamaño. Subdirectorios destacados:

| Directory | Contents |
|-----------|----------|
| `Entity/` | Entidades Doctrine (User, Course, Session, ResourceNode, etc.) |
| `Controller/` | Controladores de administración, de acciones de API y de páginas (la subcarpeta Api/ contiene acciones personalizadas de API Platform) |
| `Settings/` | Archivos de esquema de ajustes (configuración de la plataforma) |
| `Repository/` | Repositorios Doctrine |
| `AiProvider/` | Implementaciones de proveedores de IA (OpenAI, Gemini, Mistral, DeepSeek, Grok) |
| `Tool/` | Definiciones de herramientas de curso |
| `Security/` | Voters, autenticadores, autorización |
| `EventListener/` | Escuchadores de eventos |
| `EventSubscriber/` | Suscriptores de eventos |
| `Command/` | Comandos de consola de Symfony |
| `Migrations/` | Migraciones de base de datos |
| `Twig/` | Extensiones Twig |
| `Storage/` | Adaptadores de almacenamiento Flysystem |

### CourseBundle

Entidades y lógica específicas del curso:

| Directory | Contents |
|-----------|----------|
| `Entity/` | Entidades de contenido de curso (CDocument, CQuiz, CLp, CForum, CStudentPublication, etc.) |
| `Controller/` | Controladores de curso |
| `Settings/` | Esquemas de ajustes a nivel de curso |
| `Component/CourseCopy/` | Importación/exportación de cursos (Common Cartridge, Moodle) |

### LtiBundle

Integración LTI 1.3:

| Directory | Contents |
|-----------|----------|
| `Entity/` | Entidades de plataforma, herramienta y despliegue LTI |
| `Controller/` | Endpoints de lanzamiento y configuración LTI |

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

## Configuración (`config/`)

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

Symfony fusiona automáticamente los archivos base `packages/*.yaml` con los del subdirectorio de entorno correspondiente (`dev/`, `prod/` o `test/`), de modo que los archivos específicos de cada entorno solo necesitan sobrescribir los valores que difieren.

## Pruebas (`tests/`)

`tests/` **no se incluye en las descargas empaquetadas de Chamilo** (ZIP/tarballs de publicación): se elimina porque no tiene utilidad en tiempo de ejecución y algunos de sus scripts podrían suponer un riesgo si se dejan en un servidor de producción. Solo está presente cuando el proyecto se obtiene mediante `git clone`.

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

| Directorio | Contenido |
|-----------|----------|
| `CoreBundle/` | Pruebas PHPUnit que reflejan `src/CoreBundle/`: `Api/`, `ApiResource/`, `Command/`, `Controller/`, `DataFixtures/`, `Entity/`, `Event/`, `EventListener/`, `Filter/`, `fixtures/`, `Helpers/`, `Mcp/`, `Migrations/`, `Repository/`, `Security/`, `Serializer/`, `Service/`, `Settings/`, `State/`, `Tool/`, `Traits/`, `Twig/` |
| `CourseBundle/` | Pruebas PHPUnit que reflejan `src/CourseBundle/`: `Api/`, `Component/CourseCopy/`, `Repository/`, `Settings/` |
| `datafiller/` | Scripts que rellenan una instalación de prueba con contenido de demostración: `data_courses.php`, `data_users.php`, `fill_courses.php`, `fill_users.php`, `fill_many_users.php`, `fill_whoisonline.php`, `generate_users.php`, `fill_all.php` (ejecuta los demás), más `images/` y un ejemplo CSV grande de importación de usuarios |
| `history/` | Instantáneas que documentan la estructura de Chamilo en publicaciones anteriores (`1.8.8.2`, `1.9.0`, `1.10.0`, `1.11.0`, `2.0`) |
| `phpstan/` | `doctrine-orm-bootstrap.php`, cargado por PHPStan al analizar código Doctrine ORM |
| `playwright/` | Pruebas de extremo a extremo en el navegador: `features/*.feature` (escenarios Gherkin ejecutados mediante [playwright-bdd](https://vitalets.github.io/playwright-bdd/)), `steps/common.steps.ts` (definiciones de pasos en TypeScript), `fixtures/` (archivos de prueba, p. ej. hojas de cálculo), `scripts/check-results.mjs`, `playwright.config.ts` y la salida generada `.features-gen/`. Sustituye la antigua suite Behat, cuyos escenarios permanecen en el historial de git como referencia |
| `procedures/` | Hojas de cálculo (actualmente `spanish/`) usadas como base de lista de comprobación para la revisión manual de calidad de las funcionalidades |
| `scripts/` | Scripts puntuales de mantenimiento/corrección/migración para portales Chamilo existentes (en su mayoría orientados a versiones antiguas), más las subcarpetas `git-hooks/`, `img/`, `lang/` y `packaging/` |

Consulte [Pruebas](../contributing/testing.md) para saber cómo configurar la base de datos de pruebas y ejecutar las suites PHPUnit y Playwright.

## Configuración de compilación

| Archivo | Propósito |
|------|---------|
| `webpack.config.js` | Configuración de Webpack Encore (entradas, loaders, plugins) |
| `tailwind.config.js` | Configuración de Tailwind CSS (rutas de contenido, extensiones de tema, plugins) |
| `tsconfig.json` | Configuración de TypeScript |
| `eslint.config.mjs` | Reglas ESLint (configuración plana) |
| `.prettierrc.json` | Reglas de formato de Prettier |

Todos los archivos se encuentran en la raíz del proyecto. Los plugins de PostCSS (Tailwind + Autoprefixer) se configuran en línea dentro de `webpack.config.js` mediante `enablePostCssLoader()`: no existe un `postcss.config.js` independiente. `webpack.config.js` lee `tailwind.config.js` de forma indirecta a través de PostCSS, de modo que los cambios en las secciones `content` o `theme` de Tailwind surten efecto en la siguiente ejecución de `yarn encore dev` / `yarn encore production`.

## Puntos de entrada de Webpack

La compilación genera estos paquetes:

**JavaScript:**
* `vue` — Aplicación principal Vue 3 (`assets/vue/main.js`)
* `vue_installer` — Asistente de instalación (`assets/vue/main_installer.js`)
* `legacy_app`, `legacy_exercise`, `legacy_lp`, `legacy_document` — JS heredado para páginas aún no migradas a Vue

**CSS:**
* `app` — Hoja de estilos principal (`assets/css/app.scss`)
* Más hojas especializadas: `chat`, `document`, `editor`, `editor_content`, `markdown`, `print`, `responsive`, `scorm`

## Estructura CSS (`assets/css/`)

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

Tailwind se integra mediante PostCSS. `assets/css/_tailwind.scss` emite las capas base, de componentes y de utilidades; `assets/css/app.scss` lo importa en primer lugar para que las utilidades de Tailwind estén disponibles en el resto de los parciales. La configuración de Tailwind — rutas de contenido para el purgado, extensiones del tema y plugins — se encuentra en `tailwind.config.js` en la raíz del proyecto (`/var/www/chamilo/tailwind.config.js`).

Las clases de utilidad y de componente personalizadas definidas con `@layer` (visibles en `app.scss`) siguen la convención de capas de Tailwind, de modo que las clases definidas por el usuario respetan las mismas reglas de especificidad que las utilidades generadas.

### Temas de color

Chamilo admite un sistema de temas de color que puede configurarse directamente desde la interfaz de administración (**Administración > Temas de color**). Cada tema guardado escribe sus archivos en un directorio dedicado bajo `var/themes/`:

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

`colors.css` define propiedades personalizadas de CSS como tripletes de canales RGB separados por espacios en lugar de valores `rgb()`, lo que permite a Tailwind componer variantes de opacidad (p. ej. `bg-primary/50`) sin configuración adicional:

```css
:root {
    --color-primary-base: 46 117 163;
    --color-secondary-base: 243 126 47;
    /* ... */
}
```

La capa de tema se sitúa por encima del paquete compilado de Tailwind/SCSS: el navegador carga `colors.css` después de la hoja de estilos principal, de modo que los cambios de tema surten efecto de inmediato sin un paso de compilación.