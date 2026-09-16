# Estrutura do Projeto

## Diretórios de Nível Superior

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

## Código-fonte (`src/`)

### CoreBundle

O maior bundle. Subdiretórios notáveis:

| Directory | Contents |
|-----------|----------|
| `Entity/` | Entidades Doctrine (User, Course, Session, ResourceNode, etc.) |
| `Controller/` | Controladores de administração, ações de API e páginas (a subpasta Api/ contém ações personalizadas da API Platform) |
| `Settings/` | Ficheiros de esquema de definições (configuração da plataforma) |
| `Repository/` | Repositórios Doctrine |
| `AiProvider/` | Implementações de fornecedores de IA (OpenAI, Gemini, Mistral, DeepSeek, Grok) |
| `Tool/` | Definições de ferramentas de curso |
| `Security/` | Voters, autenticadores, autorização |
| `EventListener/` | Listeners de eventos |
| `EventSubscriber/` | Subscribers de eventos |
| `Command/` | Comandos de consola Symfony |
| `Migrations/` | Migrações de base de dados |
| `Twig/` | Extensões Twig |
| `Storage/` | Adaptadores de armazenamento Flysystem |

### CourseBundle

Entidades e lógica específicas de curso:

| Directory | Contents |
|-----------|----------|
| `Entity/` | Entidades de conteúdo de curso (CDocument, CQuiz, CLp, CForum, CStudentPublication, etc.) |
| `Controller/` | Controladores de curso |
| `Settings/` | Esquemas de definições ao nível do curso |
| `Component/CourseCopy/` | Importação/exportação de cursos (Common Cartridge, Moodle) |

### LtiBundle

Integração LTI 1.3:

| Directory | Contents |
|-----------|----------|
| `Entity/` | Entidades de plataforma, ferramenta e deployment LTI |
| `Controller/` | Endpoints de lançamento e configuração LTI |

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

## Configuração (`config/`)

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

O Symfony funde automaticamente os ficheiros base `packages/*.yaml` com os do subdiretório de ambiente correspondente (`dev/`, `prod/` ou `test/`), pelo que os ficheiros específicos de cada ambiente só precisam de substituir os valores que diferem.

## Testes (`tests/`)

`tests/` **não está incluído nos pacotes de transferência do Chamilo** (ZIPs/tarballs de lançamento) — é removido porque não tem finalidade em tempo de execução e alguns dos seus scripts poderiam constituir um risco se fossem deixados num servidor de produção. Só está presente quando o projeto é obtido via `git clone`.

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

| Diretório | Conteúdos |
|-----------|----------|
| `CoreBundle/` | Testes PHPUnit que espelham `src/CoreBundle/`: `Api/`, `ApiResource/`, `Command/`, `Controller/`, `DataFixtures/`, `Entity/`, `Event/`, `EventListener/`, `Filter/`, `fixtures/`, `Helpers/`, `Mcp/`, `Migrations/`, `Repository/`, `Security/`, `Serializer/`, `Service/`, `Settings/`, `State/`, `Tool/`, `Traits/`, `Twig/` |
| `CourseBundle/` | Testes PHPUnit que espelham `src/CourseBundle/`: `Api/`, `Component/CourseCopy/`, `Repository/`, `Settings/` |
| `datafiller/` | Scripts que preenchem uma instalação de teste com conteúdo de demonstração: `data_courses.php`, `data_users.php`, `fill_courses.php`, `fill_users.php`, `fill_many_users.php`, `fill_whoisonline.php`, `generate_users.php`, `fill_all.php` (executa os restantes), além de `images/` e um exemplo CSV grande de importação de utilizadores |
| `history/` | Instantâneos que documentam a estrutura do Chamilo em lançamentos anteriores (`1.8.8.2`, `1.9.0`, `1.10.0`, `1.11.0`, `2.0`) |
| `phpstan/` | `doctrine-orm-bootstrap.php`, carregado pelo PHPStan ao analisar código Doctrine ORM |
| `playwright/` | Testes de ponta a ponta no navegador: `features/*.feature` (cenários Gherkin executados via [playwright-bdd](https://vitalets.github.io/playwright-bdd/)), `steps/common.steps.ts` (definições de passos em TypeScript), `fixtures/` (ficheiros de teste, p. ex. folhas de cálculo), `scripts/check-results.mjs`, `playwright.config.ts` e a saída gerada `.features-gen/`. Substitui a antiga suíte Behat, cujos cenários permanecem no histórico git para referência |
| `procedures/` | Folhas de cálculo (atualmente `spanish/`) usadas como base de lista de verificação para revisão manual de qualidade das funcionalidades |
| `scripts/` | Scripts pontuais de manutenção/correção/migração para portais Chamilo existentes (maioritariamente dirigidos a versões mais antigas), além das subpastas `git-hooks/`, `img/`, `lang/` e `packaging/` |

Consulte [Testes](../contributing/testing.md) para saber como configurar a base de dados de testes e executar as suítes PHPUnit e Playwright.

## Configuração de compilação

| Ficheiro | Finalidade |
|------|---------|
| `webpack.config.js` | Configuração do Webpack Encore (entradas, loaders, plugins) |
| `tailwind.config.js` | Configuração do Tailwind CSS (caminhos de conteúdo, extensões de tema, plugins) |
| `tsconfig.json` | Configuração do TypeScript |
| `eslint.config.mjs` | Regras ESLint (configuração flat) |
| `.prettierrc.json` | Regras de formatação do Prettier |

Todos os ficheiros encontram-se na raiz do projeto. Os plugins PostCSS (Tailwind + Autoprefixer) são configurados em linha dentro de `webpack.config.js` via `enablePostCssLoader()` — não existe um `postcss.config.js` autónomo. `webpack.config.js` lê `tailwind.config.js` indiretamente através do PostCSS, pelo que alterações às secções `content` ou `theme` do Tailwind passam a ter efeito na execução seguinte de `yarn encore dev` / `yarn encore production`.

## Pontos de entrada Webpack

A compilação produz estes bundles:

**JavaScript:**
* `vue` — Aplicação principal Vue 3 (`assets/vue/main.js`)
* `vue_installer` — Assistente de instalação (`assets/vue/main_installer.js`)
* `legacy_app`, `legacy_exercise`, `legacy_lp`, `legacy_document` — JS legado para páginas ainda não migradas para Vue

**CSS:**
* `app` — Folha de estilos principal (`assets/css/app.scss`)
* Mais folhas especializadas: `chat`, `document`, `editor`, `editor_content`, `markdown`, `print`, `responsive`, `scorm`

## Estrutura CSS (`assets/css/`)

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

O Tailwind é integrado via PostCSS. `assets/css/_tailwind.scss` emite as camadas base, component e utility; `assets/css/app.scss` importa-o em primeiro lugar para que as utilities do Tailwind estejam disponíveis em todos os outros parciais. A configuração do Tailwind — caminhos de conteúdo para purging, extensões de tema e plugins — encontra-se em `tailwind.config.js` na raiz do projeto (`/var/www/chamilo/tailwind.config.js`).

As classes de utility e as classes de componente personalizadas definidas com `@layer` (visíveis em `app.scss`) seguem a convenção de camadas do Tailwind, de modo que as classes definidas pelo utilizador respeitem as mesmas regras de especificidade que as utilities geradas.

### Temas de cor

O Chamilo suporta um sistema de temas de cor que pode ser configurado diretamente a partir da interface de administração (**Admin > Color Themes**). Cada tema gravado escreve os seus ficheiros numa diretoria dedicada em `var/themes/`:

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

`colors.css` define propriedades personalizadas CSS como tripletos de canais RGB separados por espaços, em vez de valores `rgb()`, o que permite ao Tailwind compor variantes de opacidade (p. ex. `bg-primary/50`) sem configuração adicional:

```css
:root {
    --color-primary-base: 46 117 163;
    --color-secondary-base: 243 126 47;
    /* ... */
}
```

A camada de tema sobrepõe-se ao pacote Tailwind/SCSS compilado: o navegador carrega `colors.css` depois da folha de estilos principal, pelo que as alterações de tema entram em vigor imediatamente, sem um passo de compilação.