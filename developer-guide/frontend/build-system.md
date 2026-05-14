# 建置系統

Chamilo 使用 **Webpack 5** 透過 **Symfony Webpack Encore** 來建置前端資產。完整的建置設定檔位於專案根目錄的 `webpack.config.js`。

輸出會寫入 `public/build/`，並在 `/build` 公開路徑下提供服務。

## 進入點

### JavaScript

| 進入點 | 來源 | 用途 |
|--------|------|------|
| `vue` | `assets/vue/main.js` | 主要的 Vue 3 應用程式 |
| `vue_installer` | `assets/vue/main_installer.js` | 安裝精靈 |
| `legacy_app` | `assets/js/legacy/app.js` | 舊版 JavaScript |
| `legacy_exercise` | `assets/js/legacy/exercise.js` | 練習播放器 |
| `legacy_lp` | `assets/js/legacy/lp.js` | 學習路徑播放器 |
| `legacy_document` | `assets/js/legacy/document.js` | 文件檢視器 |
| `legacy_free-jqgrid` | `assets/js/legacy/free-jqgrid.js` | 舊版網格元件 |
| `legacy_framereadyloader` | `assets/js/legacy/frameReadyLoader.js` | 舊版 iframe 的框架就緒載入器 |
| `translatehtml` | `assets/js/translatehtml.js` | HTML 翻譯輔助工具 |
| `glossary_auto` | `assets/js/glossary-auto.js` | 自動詞彙術語高亮顯示 |

### CSS

| 進入點 | 來源 |
|--------|------|
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

* **Vue 3 SFC** — 由 `vue-loader` 編譯 `.vue` 單一檔案元件；停用運行時編譯器 (`runtimeCompilerBuild: false`)，因此所有範本必須預先編譯
* **TypeScript** — 僅轉譯模式 (`transpileOnly: true`) 以加速建置，建置期間不進行類型檢查
* **Sass/SCSS** — 透過 `sass-loader` 提供完整的 SCSS 支援
* **Tailwind CSS** — 透過 PostCSS 內嵌處理的實用優先 CSS（設定在 `webpack.config.js` 內；無獨立的 `postcss.config.js`）
* **Babel** — 使用 `@babel/preset-env` 和 `core-js@3` 填充進行 ES6+ 轉譯 (`useBuiltIns: "usage"`)
* **jQuery 自動提供** — `autoProvidejQuery()` 使 `$` 和 `jQuery` 在不需明確匯入的情況下全域可用，以支援舊版程式碼
* **原始碼對應** — 僅在開發環境中啟用
* **單一運行時區塊** — 所有進入點共用運行時
* **檔案系統快取** — 啟用 Webpack 的持久檔案系統快取，以加速增量重建
* **區塊命名空間** — 設定 `output.uniqueName` 和 `output.chunkLoadingGlobal` 為 `"chamilo"` / `"webpackChunkChamilo"`，以避免頁面上多個 Webpack 套件共存時的區塊載入衝突

## 僅生產環境功能

* **版本控制** — 所有輸出檔案名稱附加內容雜湊後綴 (`enableVersioning()`)
* **子資源完整性** — `<script>` 和 `<link>` 標籤上的 `integrity` 屬性 (`enableIntegrityHashes()`)
* **輸出清理** — 每次生產建置前清空 `public/build/`

### 未雜湊資產複製 (`CopyUnhashedAssetsPlugin`)

某些舊版 PHP 頁面以固定檔案名稱參照資產，無法使用 Webpack 清單。自訂的 `CopyUnhashedAssetsPlugin`（定義於 `webpack.config.js` 底部）會在每次建置後將特定雜湊生產檔案複製到額外的未雜湊路徑：

| 雜湊檔案 | 未雜湊複製 |
|----------|------------|
| `legacy_document.[hash].js` | `legacy_document.js` |
| `legacy_exercise.[hash].js` | `legacy_exercise.js` |
| `legacy_framereadyloader.[hash].js` / `.css` | `legacy_framereadyloader.js` / `.css` |
| `css/document.[hash].css` | `css/document.css` |
| `css/editor_content.[hash].css` | `css/editor_content.css` |
| `glossary_auto.[hash].js` | `glossary_auto.js` |

## 複製的程式庫資產

`copyFiles()` 將多個 npm 套件直接複製到 `public/build/libs/`，而不進行套裝，以供舊版範本中的 `<script>` / `<link>` 標籤使用：

* `flatpickr` (JS + CSS + 地區設定)
* `chart.js`
* `mediaelement` + `mediaelement-plugins`
* `moment` 地區設定
* `select2` (JS + CSS)
* `qtip2`
* `readmore-js`
* `js-cookie`
* `pwstrength-bootstrap`
* `multiselect-two-sides`

## 建置指令

```bash
# 開發建置
yarn encore dev

# 開發建置並監控檔案變更
yarn encore dev --watch

# 生產建置（最小化、版本控制、完整性雜湊）
yarn encore production
```

---
## Tailwind 配置

Tailwind 在 `tailwind.config.js` 中進行配置。主要要點：

* **`important: true`** — 所有產生的工具類都包含 `!important`，讓它們能夠覆寫 PrimeVue 元件樣式，而無需額外的特異性技巧
* **內容路徑** — Tailwind 會掃描 `assets/**/*.{js,vue}`、`public/main/**/*.{php,twig,tpl}`、`public/plugin/**/*.{php,twig,tpl}` 和 `src/CoreBundle/Resources/views/**/*.html.twig` 以查找類別使用
* **CSS 變數顏色系統** — 每個顏色 token（primary、secondary、tertiary、success、info、warning、danger）都由 CSS 自訂屬性（例如 `--color-primary-base`）支援，這些屬性在 `var/themes/[theme-name]/colors.css` 中依主題定義。值為以空格分隔的 RGB 通道三元組，讓 Tailwind 不透明度工具（`bg-primary/50`）能夠運作
* **自訂字體比例** — 透過 `theme.extend.fontSize` 新增 `body-1`、`body-2`、`caption`、`tiny` 大小/行高配對
* **外掛程式** — 已啟用 `@tailwindcss/forms` 和 `@tailwindcss/typography`

PostCSS（Tailwind + Autoprefixer）透過 `enablePostCssLoader()` 在 `webpack.config.js` 中內嵌配置 — 沒有獨立的 `postcss.config.js` 檔案。