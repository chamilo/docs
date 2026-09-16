# 建置系統

Chamilo 透過 **Symfony Webpack Encore** 使用 **Webpack 5** 建置前端資產。完整建置設定位於專案根目錄的 `webpack.config.js`。

輸出寫入 `public/build/`，並以 `/build` 公開路徑提供服務。

## 進入點

### JavaScript

| 進入點 | 來源 | 用途 |
|-------|--------|---------|
| `vue` | `assets/vue/main.js` | 主要 Vue 3 應用程式 |
| `vue_installer` | `assets/vue/main_installer.js` | 安裝精靈 |
| `legacy_app` | `assets/js/legacy/app.js` | 舊版 JavaScript |
| `legacy_exercise` | `assets/js/legacy/exercise.js` | 練習播放器 |
| `legacy_lp` | `assets/js/legacy/lp.js` | 學習路徑播放器 |
| `legacy_document` | `assets/js/legacy/document.js` | 文件檢視器 |
| `legacy_free-jqgrid` | `assets/js/legacy/free-jqgrid.js` | 舊版表格小工具 |
| `legacy_framereadyloader` | `assets/js/legacy/frameReadyLoader.js` | 舊版 iframe 的 frame-ready 載入器 |
| `translatehtml` | `assets/js/translatehtml.js` | HTML 翻譯輔助工具 |
| `glossary_auto` | `assets/js/glossary-auto.js` | 詞彙表詞條自動標示 |

### CSS

| 進入點 | 來源 |
|-------|--------|
| `app` | `assets/css/app.scss` |
| `css/chat` | `assets/css/chat.scss` |
| `css/document` | `assets/css/document.scss` |
| `css/editor` | `assets/css/editor.scss` |
| `css/editor_content` | `assets/css/editor_content.scss` |
| `css/markdown` | `assets/css/markdown.scss` |
| `css/print` | `assets/css/print.scss` |
| `css/responsive` | `assets/css/responsive.scss` |
| `css/scorm` | `assets/css/scorm.scss` |

## 建置功能

* **Vue 3 SFC** — 由 `vue-loader` 編譯 `.vue` 單檔元件；執行時期編譯器已停用（`runtimeCompilerBuild: false`），因此所有模板皆須預先編譯
* **TypeScript** — 僅轉譯模式（`transpileOnly: true`）以加快建置，建置期間不進行型別檢查
* **Sass/SCSS** — 透過 `sass-loader` 提供完整 SCSS 支援
* **Tailwind CSS** — 以 PostCSS 內嵌處理的 utility-first CSS（設定於 `webpack.config.js` 內；沒有獨立的 `postcss.config.js`）
* **Babel** — 以 `@babel/preset-env` 進行 ES6+ 轉譯，並搭配 `core-js@3` polyfill（`useBuiltIns: "usage"`）
* **jQuery 自動提供** — `autoProvidejQuery()` 讓 `$` 與 `jQuery` 全域可用，無需明確匯入，以支援舊版程式碼
* **Source maps** — 僅在開發環境啟用
* **單一 runtime chunk** — 所有進入點共用 runtime
* **檔案系統快取** — 啟用 Webpack 的持久化檔案系統快取，以加速增量重建
* **Chunk 命名空間** — `output.uniqueName` 與 `output.chunkLoadingGlobal` 設為 `"chamilo"` / `"webpackChunkChamilo"`，避免同一頁面共存多個 Webpack 套件時發生 chunk 載入衝突

## 僅限正式環境的功能

* **版本標記** — 所有輸出檔名加上內容雜湊後綴（`enableVersioning()`）
* **子資源完整性** — 在 `<script>` 與 `<link>` 標籤加上 `integrity` 屬性（`enableIntegrityHashes()`）
* **輸出清理** — 每次正式建置前會清空 `public/build/`

### 未雜湊資產複本（`CopyUnhashedAssetsPlugin`）

部分舊版 PHP 頁面以固定檔名參照資產，無法使用 Webpack manifest。自訂的 `CopyUnhashedAssetsPlugin`（定義於 `webpack.config.js` 底部）會在每次建置後，將特定已雜湊的正式檔案再複製到未雜湊路徑：

| 已雜湊檔案 | 未雜湊複本 |
|-------------|--------------|
| `legacy_document.[hash].js` | `legacy_document.js` |
| `legacy_exercise.[hash].js` | `legacy_exercise.js` |
| `legacy_framereadyloader.[hash].js` / `.css` | `legacy_framereadyloader.js` / `.css` |
| `css/document.[hash].css` | `css/document.css` |
| `css/editor_content.[hash].css` | `css/editor_content.css` |
| `glossary_auto.[hash].js` | `glossary_auto.js` |

## 複製的函式庫資產

`copyFiles()` 會將若干 npm 套件直接複製到 `public/build/libs/`，不進行打包，供舊版模板以 `<script>` / `<link>` 標籤使用：

* `flatpickr`（JS + CSS + 語系）
* `chart.js`
* `mediaelement` + `mediaelement-plugins`
* `moment` 語系
* `select2`（JS + CSS）
* `qtip2`
* `readmore-js`
* `js-cookie`
* `pwstrength-bootstrap`
* `multiselect-two-sides`

## 建置指令

```bash
# Development build
yarn encore dev

# Development build with file watching
yarn encore dev --watch

# Production build (minified, versioned, integrity hashes)
yarn encore production
```

## Tailwind 設定

Tailwind 於 `tailwind.config.js` 中設定。重點如下：

* **`important: true`** — 所有產生的 utility 皆包含 `!important`，使其能覆寫 PrimeVue 元件樣式，而無須額外提高選擇器權重
* **內容路徑** — Tailwind 會掃描 `assets/**/*.{js,vue}`、`public/main/**/*.{php,twig,tpl}`、`public/plugin/**/*.{php,twig,tpl}` 以及 `src/CoreBundle/Resources/views/**/*.html.twig`，以偵測 class 的使用情形
* **CSS 變數色彩系統** — 每個色彩權杖（primary、secondary、tertiary、success、info、warning、danger）皆對應一個 CSS 自訂屬性（例如 `--color-primary-base`），並依主題定義於 `var/themes/[theme-name]/colors.css`。數值為以空格分隔的 RGB 通道三元組，因此可使用 Tailwind 的透明度 utility（`bg-primary/50`）
* **自訂字級** — 透過 `theme.extend.fontSize` 新增 `body-1`、`body-2`、`caption`、`tiny` 的字級／行高配對
* **外掛** — 已啟用 `@tailwindcss/forms` 與 `@tailwindcss/typography`

PostCSS（Tailwind + Autoprefixer）透過 `enablePostCssLoader()` 於 `webpack.config.js` 內嵌設定 — 並無獨立的 `postcss.config.js` 檔案。