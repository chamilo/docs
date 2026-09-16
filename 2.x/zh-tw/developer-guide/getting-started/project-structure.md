# 專案結構

## 最上層目錄

```
chamilo/
├── assets/          # 前端原始碼
│   ├── vue/         # Vue 3 應用程式（元件、視圖、路由、狀態管理）
│   ├── css/         # SCSS 樣式表
│   └── js/          # 舊版 JavaScript
├── config/          # Symfony 設定（路由、服務、套件）
├── public/          # 網頁根目錄（index.php、舊版 PHP 頁面、外掛）
│   ├── main/        # 舊版 PHP 模組（每個工具一個子目錄）
│   └── plugin/      # 內建及自訂外掛
├── src/             # PHP 原始碼（Symfony 套件）
│   ├── CoreBundle/  # 核心平台邏輯
│   ├── CourseBundle/# 課程專屬功能
│   └── LtiBundle/   # LTI 1.3 整合
├── templates/       # Twig 範本
├── var/             # 快取、記錄、上傳檔案（產生的）
├── vendor/          # Composer 相依套件（產生的）
├── node_modules/    # npm 相依套件（產生的）
└── translations/    # 翻譯檔案
```

## 原始碼 (`src/`)

### CoreBundle

最大的套件。值得注意的子目錄：

| 目錄 | 內容 |
|------|------|
| `Entity/` | Doctrine 實體（User、Course、Session、ResourceNode 等） |
| `Controller/` | 管理、API 動作及頁面控制器（Api/ 子資料夾包含自訂 API Platform 動作） |
| `Settings/` | 設定架構檔案（平台設定） |
| `Repository/` | Doctrine 儲存庫 |
| `AiProvider/` | AI 提供者實作（OpenAI、Gemini、Mistral、DeepSeek、Grok） |
| `Tool/` | 課程工具定義 |
| `Security/` | 投票者、驗證器、授權 |
| `EventListener/` | 事件監聽器 |
| `EventSubscriber/` | 事件訂閱者 |
| `Command/` | Symfony 主控台指令 |
| `Migrations/` | 資料庫遷移 |
| `Twig/` | Twig 延伸模組 |
| `Storage/` | Flysystem 儲存適配器 |

### CourseBundle

課程專屬實體與邏輯：

| 目錄 | 內容 |
|------|------|
| `Entity/` | 課程內容實體（CDocument、CQuiz、CLp、CForum、CStudentPublication 等） |
| `Controller/` | 課程控制器 |
| `Settings/` | 課程層級設定架構 |
| `Component/CourseCopy/` | 課程匯入/匯出（Common Cartridge、Moodle） |

### LtiBundle

LTI 1.3 整合：

| 目錄 | 內容 |
|------|------|
| `Entity/` | LTI 平台、工具及部署實體 |
| `Controller/` | LTI 啟動及設定端點 |

---
## 前端 (`assets/vue/`)

```
assets/vue/
├── main.js              # 應用程式入口點
├── main_installer.js    # 安裝程式入口點
├── components/          # 可重複使用的 Vue 元件
│   ├── accessurl/       # 多 URL (入口網站) 元件
│   ├── admin/           # 管理員專用元件
│   ├── assignments/     # 作業表單與清單
│   ├── attendance/      # 點名表元件
│   ├── basecomponents/  # 共享基礎元件 (BaseButton, BaseIcon, BaseTable, BaseTinyEditor 等) 與 ChamiloIcons.js
│   ├── blog/            # 部落格元件
│   ├── branch/          # 分校/網路校園元件
│   ├── ccalendarevent/  # 課程行事曆事件元件
│   ├── chat/            # 聊天與 AI 導師
│   ├── course/          # 課程卡片、目錄、表單
│   ├── coursecategory/  # 課程分類元件
│   ├── coursemaintenance/ # 課程備份/還原元件
│   ├── ctoolintro/      # 課程工具介紹元件
│   ├── documents/       # 文件管理元件
│   ├── dropbox/         # Dropbox (檔案交換) 元件
│   ├── filemanager/     # 檔案瀏覽器元件
│   ├── glossary/        # 術語表元件
│   ├── installer/       # 安裝精靈
│   ├── layout/          # 側邊欄、頂部列、殼層佈局
│   ├── links/           # 外部連結元件
│   ├── login/           # 登入表單元件
│   ├── lp/              # 學習路徑元件
│   ├── message/         # 訊息元件
│   ├── page/            # 靜態頁面元件
│   ├── pageLayout/      # 頁面佈局包裝元件
│   ├── personalfile/    # 個人檔案空間元件
│   ├── platform/        # 平台層級 UI 元件
│   ├── resource_links/  # 資源連結管理元件
│   ├── room/            # 虛擬教室元件
│   ├── session/         # 課程階段 (學習活動) 元件
│   ├── sessionadmin/    # 課程階段管理元件
│   ├── skill/           # 技能與能力元件
│   ├── social/          # 社群網路元件
│   ├── systemannouncement/ # 系統公告元件
│   ├── user/            # 使用者個人檔案與管理元件
│   ├── usergroup/       # 使用者群組 (班級) 元件
│   └── userreluser/     # 使用者關係 (朋友/追蹤) 元件
├── views/               # 頁面層級 Vue 視圖 (鏡像 components/ 結構)
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
├── router/              # Vue Router (index.js + 每個功能區域一個模組)
├── store/               # Pinia 儲存
│   └── modules/         # crud.js, notifications.js, ux.js
├── composables/         # 共享組合函式 (每個功能子目錄)
├── services/            # API 服務層 (每個實體/領域一個檔案)
├── utils/               # 工具輔助函式 (日期、hydra、fetch、sanitizeHtml 等)
├── config/              # 執行時設定 (api.js, env.js)
├── constants/           # 共享常數
│   └── entity/          # 實體專用常數 (session, message, extrafield 等)
├── layouts/             # 頂層佈局元件 (MyCourses.vue)
├── pages/               # 獨立頁面元件 (Home, Login, Faq, Demo)
├── mixins/              # 舊版 Vue 2 風格混入 (ListMixin, CreateMixin 等)
├── hooks/               # 可組合鉤子 (useSidebar, useState)
├── plugins/             # Vue 外掛註冊 (httpErrors, vuetify)
├── validators/          # Vuelidate 自訂驗證器
└── error/               # 錯誤邊界元件
```

---
## 組態 (`config/`)

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

Symfony 會自動合併基礎 `packages/*.yaml` 檔案與對應環境子目錄 (`dev/`、`prod/` 或 `test/`) 中的檔案，因此環境特定檔案只需覆寫不同的值即可。

## 建置組態

| 檔案 | 用途 |
|------|---------|
| `webpack.config.js` | Webpack Encore 組態 (entries, loaders, plugins) |
| `tailwind.config.js` | Tailwind CSS 組態 (content paths, theme extensions, plugins) |
| `tsconfig.json` | TypeScript 組態 |
| `eslint.config.mjs` | ESLint 規則 (flat config) |
| `.prettierrc.json` | Prettier 格式化規則 |

所有檔案位於專案根目錄。PostCSS 外掛 (Tailwind + Autoprefixer) 透過 `webpack.config.js` 中的 `enablePostCssLoader()` 進行內嵌組態 — 沒有獨立的 `postcss.config.js`。`webpack.config.js` 透過 PostCSS 間接讀取 `tailwind.config.js`，因此 Tailwind 的 `content` 或 `theme` 區段變更將在下一次執行 `yarn encore dev` / `yarn encore production` 時生效。

## Webpack 進入點

建置會產生以下套件：

**JavaScript:**
* `vue` — 主要 Vue 3 應用程式 (`assets/vue/main.js`)
* `vue_installer` — 安裝精靈 (`assets/vue/main_installer.js`)
* `legacy_app`、`legacy_exercise`、`legacy_lp`、`legacy_document` — 尚未遷移至 Vue 的頁面之舊版 JS

**CSS:**
* `app` — 主要樣式表 (`assets/css/app.scss`)
* 加上專用樣式表：`chat`、`document`、`editor`、`editor_content`、`markdown`、`print`、`responsive`、`scorm`

## CSS 結構 (`assets/css/`)

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

---

---
### Tailwind CSS

Tailwind 是透過 PostCSS 整合的。`assets/css/_tailwind.scss` 會產生 base、component 和 utility 層；`assets/css/app.scss` 會首先匯入它，因此 Tailwind 工具類別可在所有其他 partials 中使用。Tailwind 配置 — 用於 purging 的內容路徑、主題擴充和外掛程式 — 位於專案根目錄的 `tailwind.config.js`（`/var/www/chamilo/tailwind.config.js`）。

使用 `@layer` 定義的自訂工具類別和元件類別（在 `app.scss` 中可見）遵循 Tailwind 的分層慣例，因此使用者定義的類別會遵守與產生的工具類別相同的特異性規則。

### 顏色主題

Chamilo 支援一種顏色主題系統，可直接從管理介面進行配置（**管理 > 顏色主題**）。每個儲存的主題會將其檔案寫入 `var/themes/` 下的專屬目錄：

```
var/themes/
└── [theme-name]/
    ├── colors.css       # CSS 自訂屬性，用於完整顏色調色盤
    ├── default.css      # 選用的額外自訂 CSS 規則
    ├── learnpath.css    # 學習路徑專屬的覆寫
    ├── tiny-settings.js # TinyMCE 編輯器顏色調色盤設定
    └── images/          # 主題圖像（logo、favicon、背景、PWA 圖示）
        ├── header-logo.png / header-logo.svg
        ├── favicon.ico
        ├── pwa-icons/   # icon-192.png, icon-512.png
        └── ...          # 背景圖像、管理區塊圖像等
```

`colors.css` 將 CSS 自訂屬性定義為以空格分隔的 RGB 通道三元組，而非 `rgb()` 值，這允許 Tailwind 在無需額外配置的情況下組合不透明度變體（例如 `bg-primary/50`）：

```css
:root {
    --color-primary-base: 46 117 163;
    --color-secondary-base: 243 126 47;
    /* ... */
}
```

主題層位於編譯後的 Tailwind/SCSS 組合包之上：瀏覽器會在主樣式表之後載入 `colors.css`，因此主題變更會立即生效，無需建置步驟。