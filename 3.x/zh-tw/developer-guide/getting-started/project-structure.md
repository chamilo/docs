# 專案結構

## 頂層目錄

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

## 原始碼（`src/`）

### CoreBundle

最大的 bundle。值得注意的子目錄：

| 目錄 | 內容 |
|-----------|----------|
| `Entity/` | Doctrine 實體（User、Course、Session、ResourceNode 等） |
| `Controller/` | 管理、API action 與頁面控制器（Api/ 子資料夾存放自訂 API Platform actions） |
| `Settings/` | 設定結構描述檔（平台組態） |
| `Repository/` | Doctrine repositories |
| `AiProvider/` | AI 供應商實作（OpenAI、Gemini、Mistral、DeepSeek、Grok） |
| `Tool/` | 課程工具定義 |
| `Security/` | Voters、authenticators、授權 |
| `EventListener/` | 事件監聽器 |
| `EventSubscriber/` | 事件訂閱者 |
| `Command/` | Symfony 主控台命令 |
| `Migrations/` | 資料庫遷移 |
| `Twig/` | Twig 擴充 |
| `Storage/` | Flysystem 儲存配接器 |

### CourseBundle

課程專屬實體與邏輯：

| 目錄 | 內容 |
|-----------|----------|
| `Entity/` | 課程內容實體（CDocument、CQuiz、CLp、CForum、CStudentPublication 等） |
| `Controller/` | 課程控制器 |
| `Settings/` | 課程層級設定結構描述 |
| `Component/CourseCopy/` | 課程匯入／匯出（Common Cartridge、Moodle） |

### LtiBundle

LTI 1.3 整合：

| 目錄 | 內容 |
|-----------|----------|
| `Entity/` | LTI 平台、工具與部署實體 |
| `Controller/` | LTI 啟動與組態端點 |

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

## 組態（`config/`）

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

Symfony 會自動將基礎的 `packages/*.yaml` 檔案與對應環境子目錄（`dev/`、`prod/` 或 `test/`）中的檔案合併，因此環境專屬檔案只需覆寫相異的值即可。

## 測試（`tests/`）

`tests/` **不會包含在封裝後的 Chamilo 下載檔**（發行版 ZIP／tarball）中——會被剔除，因為執行時期沒有用途，且其中部分指令稿若留在正式伺服器上可能構成風險。僅在透過 `git clone` 取得專案時才會存在。

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

| 目錄 | 內容 |
|-----------|----------|
| `CoreBundle/` | 對應 `src/CoreBundle/` 的 PHPUnit 測試：`Api/`、`ApiResource/`、`Command/`、`Controller/`、`DataFixtures/`、`Entity/`、`Event/`、`EventListener/`、`Filter/`、`fixtures/`、`Helpers/`、`Mcp/`、`Migrations/`、`Repository/`、`Security/`、`Serializer/`、`Service/`、`Settings/`、`State/`、`Tool/`、`Traits/`、`Twig/` |
| `CourseBundle/` | 對應 `src/CourseBundle/` 的 PHPUnit 測試：`Api/`、`Component/CourseCopy/`、`Repository/`、`Settings/` |
| `datafiller/` | 為測試安裝填入示範內容的指令稿：`data_courses.php`、`data_users.php`、`fill_courses.php`、`fill_users.php`、`fill_many_users.php`、`fill_whoisonline.php`、`generate_users.php`、`fill_all.php`（會執行其餘指令稿），以及 `images/` 與一份大型 CSV 使用者匯入範例 |
| `history/` | 記錄 Chamilo 過去發行版結構的快照（`1.8.8.2`、`1.9.0`、`1.10.0`、`1.11.0`、`2.0`） |
| `phpstan/` | `doctrine-orm-bootstrap.php`，由 PHPStan 在分析 Doctrine ORM 程式碼時載入 |
| `playwright/` | 端對端瀏覽器測試：`features/*.feature`（透過 [playwright-bdd](https://vitalets.github.io/playwright-bdd/) 執行的 Gherkin 情境）、`steps/common.steps.ts`（TypeScript 步驟定義）、`fixtures/`（測試檔案，例如試算表）、`scripts/check-results.mjs`、`playwright.config.ts`，以及產生的 `.features-gen/` 輸出。取代舊有 Behat 套件，其情境仍保留於 git 歷史中供參考 |
| `procedures/` | 試算表（目前為 `spanish/`），作為功能手動品質檢核的清單基礎 |
| `scripts/` | 針對既有 Chamilo 入口網站的一次性維護／修復／遷移指令稿（多半針對較舊版本），以及 `git-hooks/`、`img/`、`lang/` 與 `packaging/` 子資料夾 |

請參閱[測試](../contributing/testing.md)，了解如何設定測試資料庫並執行 PHPUnit 與 Playwright 套件。

## 建置組態

| 檔案 | 用途 |
|------|---------|
| `webpack.config.js` | Webpack Encore 組態（進入點、載入器、外掛） |
| `tailwind.config.js` | Tailwind CSS 組態（內容路徑、主題擴充、外掛） |
| `tsconfig.json` | TypeScript 組態 |
| `eslint.config.mjs` | ESLint 規則（flat config） |
| `.prettierrc.json` | Prettier 格式化規則 |

所有檔案皆位於專案根目錄。PostCSS 外掛（Tailwind + Autoprefixer）透過 `enablePostCssLoader()` 內嵌於 `webpack.config.js` 中設定——沒有獨立的 `postcss.config.js`。`webpack.config.js` 經由 PostCSS 間接讀取 `tailwind.config.js`，因此對 Tailwind 的 `content` 或 `theme` 區段所做的變更，會在下一次執行 `yarn encore dev`／`yarn encore production` 時生效。

## Webpack 進入點

建置會產生下列套件：

**JavaScript：**
* `vue` — 主要 Vue 3 應用程式（`assets/vue/main.js`）
* `vue_installer` — 安裝精靈（`assets/vue/main_installer.js`）
* `legacy_app`、`legacy_exercise`、`legacy_lp`、`legacy_document` — 尚未遷移至 Vue 之頁面所用的舊版 JS

**CSS：**
* `app` — 主要樣式表（`assets/css/app.scss`）
* 以及專門樣式表：`chat`、`document`、`editor`、`editor_content`、`markdown`、`print`、`responsive`、`scorm`

## CSS 結構（`assets/css/`）

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

Tailwind 透過 PostCSS 整合。`assets/css/_tailwind.scss` 會輸出 base、component 與 utility 層；`assets/css/app.scss` 會最先匯入它，使 Tailwind utilities 在所有其他 partials 中皆可使用。Tailwind 設定——用於清除未使用樣式的 content 路徑、主題擴充與外掛——位於專案根目錄的 `tailwind.config.js`（`/var/www/chamilo/tailwind.config.js`）。

以 `@layer` 定義的自訂 utility 類別與 component 類別（可見於 `app.scss`）遵循 Tailwind 的分層慣例，讓使用者自訂類別與產生的 utilities 遵守相同的選擇器優先順序規則。

### 色彩主題

Chamilo 支援可直接從管理介面設定的色彩主題系統（**管理 > 色彩主題**）。每個已儲存的主題會將其檔案寫入 `var/themes/` 下的專屬目錄：

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

`colors.css` 以空格分隔的 RGB 通道三元組定義 CSS 自訂屬性，而非 `rgb()` 值，如此 Tailwind 無需額外設定即可組合透明度變體（例如 `bg-primary/50`）：

```css
:root {
    --color-primary-base: 46 117 163;
    --color-secondary-base: 243 126 47;
    /* ... */
}
```

主題層疊加在已編譯的 Tailwind/SCSS 套件之上：瀏覽器在主要樣式表之後載入 `colors.css`，因此主題變更會立即生效，無需建置步驟。