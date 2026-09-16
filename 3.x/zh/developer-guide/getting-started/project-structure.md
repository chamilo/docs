# 项目结构

## 顶层目录

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

## 源代码（`src/`）

### CoreBundle

最大的 bundle。主要子目录如下：

| 目录 | 内容 |
|-----------|----------|
| `Entity/` | Doctrine 实体（User、Course、Session、ResourceNode 等） |
| `Controller/` | 管理、API action 以及页面控制器（Api/ 子文件夹存放自定义 API Platform actions） |
| `Settings/` | 设置模式文件（平台配置） |
| `Repository/` | Doctrine 仓储 |
| `AiProvider/` | AI 提供商实现（OpenAI、Gemini、Mistral、DeepSeek、Grok） |
| `Tool/` | 课程工具定义 |
| `Security/` | Voters、authenticators、授权 |
| `EventListener/` | 事件监听器 |
| `EventSubscriber/` | 事件订阅器 |
| `Command/` | Symfony 控制台命令 |
| `Migrations/` | 数据库迁移 |
| `Twig/` | Twig 扩展 |
| `Storage/` | Flysystem 存储适配器 |

### CourseBundle

课程相关实体与逻辑：

| 目录 | 内容 |
|-----------|----------|
| `Entity/` | 课程内容实体（CDocument、CQuiz、CLp、CForum、CStudentPublication 等） |
| `Controller/` | 课程控制器 |
| `Settings/` | 课程级设置模式 |
| `Component/CourseCopy/` | 课程导入/导出（Common Cartridge、Moodle） |

### LtiBundle

LTI 1.3 集成：

| 目录 | 内容 |
|-----------|----------|
| `Entity/` | LTI 平台、工具与部署实体 |
| `Controller/` | LTI 启动与配置端点 |

## 前端 (`assets/vue/`)

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

## 配置（`config/`）

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

Symfony 会自动将基础的 `packages/*.yaml` 文件与匹配环境子目录（`dev/`、`prod/` 或 `test/`）中的文件合并，因此特定环境的文件只需覆盖有差异的值。

## 测试（`tests/`）

`tests/` **不会包含在打包后的 Chamilo 下载包中**（发行版 ZIP/tarball）——因其在运行时没有用途，且其中部分脚本若留在生产服务器上可能构成风险，故会被剥离。仅当通过 `git clone` 获取项目时才会存在。

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

| 目录 | 内容 |
|-----------|----------|
| `CoreBundle/` | 镜像 `src/CoreBundle/` 的 PHPUnit 测试：`Api/`、`ApiResource/`、`Command/`、`Controller/`、`DataFixtures/`、`Entity/`、`Event/`、`EventListener/`、`Filter/`、`fixtures/`、`Helpers/`、`Mcp/`、`Migrations/`、`Repository/`、`Security/`、`Serializer/`、`Service/`、`Settings/`、`State/`、`Tool/`、`Traits/`、`Twig/` |
| `CourseBundle/` | 镜像 `src/CourseBundle/` 的 PHPUnit 测试：`Api/`、`Component/CourseCopy/`、`Repository/`、`Settings/` |
| `datafiller/` | 向测试安装填充演示内容的脚本：`data_courses.php`、`data_users.php`、`fill_courses.php`、`fill_users.php`、`fill_many_users.php`、`fill_whoisonline.php`、`generate_users.php`、`fill_all.php`（运行其余脚本），以及 `images/` 和一个大型 CSV 用户导入示例 |
| `history/` | 记录 Chamilo 在过往发行版中结构的快照（`1.8.8.2`、`1.9.0`、`1.10.0`、`1.11.0`、`2.0`） |
| `phpstan/` | `doctrine-orm-bootstrap.php`，由 PHPStan 在分析 Doctrine ORM 代码时加载 |
| `playwright/` | 端到端浏览器测试：`features/*.feature`（通过 [playwright-bdd](https://vitalets.github.io/playwright-bdd/) 运行的 Gherkin 场景）、`steps/common.steps.ts`（TypeScript 步骤定义）、`fixtures/`（测试文件，例如电子表格）、`scripts/check-results.mjs`、`playwright.config.ts`，以及生成的 `.features-gen/` 输出。用于替代旧的 Behat 套件，其场景仍保留在 git 历史中以供参考 |
| `procedures/` | 电子表格（目前为 `spanish/`），用作功能人工质量审查的检查清单基础 |
| `scripts/` | 面向现有 Chamilo 门户的一次性维护/修复/迁移脚本（大多针对较旧版本），以及 `git-hooks/`、`img/`、`lang/` 和 `packaging/` 子文件夹 |

关于如何配置测试数据库并运行 PHPUnit 与 Playwright 套件，请参见 [测试](../contributing/testing.md)。

## 构建配置

| 文件 | 用途 |
|------|---------|
| `webpack.config.js` | Webpack Encore 配置（入口、加载器、插件） |
| `tailwind.config.js` | Tailwind CSS 配置（内容路径、主题扩展、插件） |
| `tsconfig.json` | TypeScript 配置 |
| `eslint.config.mjs` | ESLint 规则（扁平配置） |
| `.prettierrc.json` | Prettier 格式化规则 |

所有文件均位于项目根目录。PostCSS 插件（Tailwind + Autoprefixer）通过 `enablePostCssLoader()` 在 `webpack.config.js` 内联配置——没有独立的 `postcss.config.js`。`webpack.config.js` 通过 PostCSS 间接读取 `tailwind.config.js`，因此对 Tailwind 的 `content` 或 `theme` 部分的修改会在下一次运行 `yarn encore dev` / `yarn encore production` 时生效。

## Webpack 入口点

构建会生成以下打包文件：

**JavaScript：**
* `vue` — 主 Vue 3 应用（`assets/vue/main.js`）
* `vue_installer` — 安装向导（`assets/vue/main_installer.js`）
* `legacy_app`、`legacy_exercise`、`legacy_lp`、`legacy_document` — 尚未迁移到 Vue 的页面所用的遗留 JS

**CSS：**
* `app` — 主样式表（`assets/css/app.scss`）
* 以及专用样式表：`chat`、`document`、`editor`、`editor_content`、`markdown`、`print`、`responsive`、`scorm`

## CSS 结构（`assets/css/`）

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

Tailwind 通过 PostCSS 集成。`assets/css/_tailwind.scss` 输出 base、component 和 utility 层；`assets/css/app.scss` 首先导入该文件，以便在所有其他 partial 中均可使用 Tailwind 工具类。Tailwind 配置——用于 purge 的内容路径、主题扩展以及插件——位于项目根目录的 `tailwind.config.js`（`/var/www/chamilo/tailwind.config.js`）。

使用 `@layer` 定义的自定义工具类和组件类（可见于 `app.scss`）遵循 Tailwind 的分层约定，使用户自定义类与生成的工具类遵循相同的特异性规则。

### 颜色主题

Chamilo 支持可直接在管理界面（**管理 > 颜色主题**）中配置的颜色主题系统。每个已保存的主题会将其文件写入 `var/themes/` 下的专用目录：

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

`colors.css` 将 CSS 自定义属性定义为以空格分隔的 RGB 通道三元组，而非 `rgb()` 值，从而使 Tailwind 无需额外配置即可组合透明度变体（例如 `bg-primary/50`）：

```css
:root {
    --color-primary-base: 46 117 163;
    --color-secondary-base: 243 126 47;
    /* ... */
}
```

主题层位于已编译的 Tailwind/SCSS 包之上：浏览器在主样式表之后加载 `colors.css`，因此主题更改无需构建步骤即可立即生效。