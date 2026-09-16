# Twig 模板

Chamilo 使用 Twig 來渲染伺服器端頁面。模板位於 `src/CoreBundle/Resources/views/` 目錄中，並使用 `@ChamiloCore/` 命名空間前綴來引用（例如 `@ChamiloCore/Layout/base-layout.html.twig`）。

沒有頂層 `templates/` 目錄 — 所有 Twig 模板都位於 `src/CoreBundle/Resources/views/` 之下。

## Twig 和 Vue 如何共存

大多數頁面遵循以下流程：

1. Symfony 控制器渲染一個擴展佈局的 Twig 模板。
2. 佈局包含 `vue_setup.html.twig`，其發出 `<div id="app">` 並透過 `vue_js_setup.html.twig` 注入運行時全域變數（`window.user`、`window.breadcrumb` 等）。
3. Vue 掛載到 `#app` 上，並處理該元素內的所有 UI 渲染。
4. Vue 應用程式透過 REST API 與後端通訊。

對於尚未遷移至 Vue 的舊版頁面，Symfony 透過 Twig 渲染完整的頁面 HTML，並將內容置於 `#sectionMainContent` 內。Vue 仍會掛載（提供側邊欄和頂部導航列框架），但主要內容區域為伺服器端渲染的 HTML。

## 佈局模板

所有佈局都擴展 `@ChamiloCore/Layout/base-layout.html.twig`，其提供 `<html>`、`<head>` 和 `<body>` 結構。可用的佈局變體：

| 模板 | 用途 |
|----------|---------|
| `Layout/base-layout.html.twig` | 根模板 — `<html>` 框架、匯入巨集、發出 `<head>` 和 `<body>` |
| `Layout/layout.html.twig` | 標準完整佈局，包含側邊欄、頂部導航列和內容區域 |
| `Layout/layout_one_col.html.twig` | 單欄佈局（無側邊欄） |
| `Layout/layout_two_col.html.twig` | 雙欄佈局 |
| `Layout/layout_content.html.twig` | 僅內容包裝器 |
| `Layout/layout_empty.html.twig` | 最小化框架的空佈局 |
| `Layout/no_layout.html.twig` | 無標頭/頁尾；內容直接置於 `<body>` 內 |
| `Layout/no_layout_scorm.html.twig` | SCORM 內容框架的極簡佈局 |
| `Layout/blank.html.twig` | 完全空白頁面 |
| `Layout/skill_layout.html.twig` | 技能輪頁面的佈局 |

## 關鍵部分模板

| 模板 | 用途 |
|----------|---------|
| `Layout/head.html.twig` | `<head>` 內容：meta 標籤、所有 Encore CSS 項目、主題 `colors.css`、舊版 JS 項目、OpenGraph/Twitter 標籤 |
| `Layout/foot.html.twig` | body 結尾：Vue JS 入口點、`tracking.footer_extra_content` 注入 |
| `Layout/vue_setup.html.twig` | 發出 `<div id="app">` 並包含 `vue_js_setup.html.twig` |
| `Layout/vue_js_setup.html.twig` | 注入 `window.user`、`window.breadcrumb`、`window.languages` 等 |
| `Layout/cookie_banner.html.twig` | GDPR  Cookie 同意橫幅 |
| `Layout/footer.html.twig` | 頁面頁尾列 |
| `Layout/course_navigation.html.twig` | 課程工具導航麵包屑 |

## Webpack Encore 整合

`head.html.twig` 載入所有項目的 CSS；`foot.html.twig` 載入 Vue JS 套件：

```twig
{# In head.html.twig — CSS entries #}
{{ encore_entry_link_tags('legacy_free-jqgrid') }}
{{ encore_entry_link_tags('legacy_app') }}
{{ encore_entry_link_tags('legacy_lp') }}
{{ encore_entry_link_tags('legacy_exercise') }}
{{ encore_entry_link_tags('legacy_document') }}
{{ encore_entry_link_tags('vue') }}
{{ encore_entry_link_tags('app') }}
{{ theme_asset_link_tag('colors.css') }}

{# In foot.html.twig — Vue JS (loaded at end of body) #}
{{ encore_entry_script_tags('vue') }}
```

舊版 JS 項目（`legacy_app`、`legacy_lp` 等）在 `<head>` 中載入，因為舊版 PHP 頁面依賴其在 DOM 準備就緒前可用。

## 巨集

可重用的 Twig 巨集位於 `Macros/` 目錄，並在 `base-layout.html.twig` 頂部匯入：

| 巨集檔案 | 提供 |
|-----------|---------|
| `Macros/box.html.twig` | 內容方塊輔助工具 |
| `Macros/actions.html.twig` | 動作按鈕渲染 |
| `Macros/buttons.html.twig` | 按鈕 HTML 輔助工具 |
| `Macros/headers.html.twig` | 頁面標頭輔助工具 |
| `Macros/image.html.twig` | 圖像渲染輔助工具 |
| `Macros/modals.html.twig` | 模態對話框輔助工具 |

在任何擴展 `base-layout.html.twig` 的模板中使用：

```twig
{{ macro_buttons.submit('Save') }}
{{ macro_box.content_box('Title', content) }}
```

## 自訂 Vue 模板

Chamilo 支援透過 `APP_CUSTOM_VUE_TEMPLATE` 環境變數進行每個安裝的 Vue 頁面覆寫。設定後，Webpack 建置透過 `DefinePlugin` 暴露 `ENV_CUSTOM_VUE_TEMPLATE` 常數，Vue 路由器有條件地從 `var/vue_templates/` 匯入覆寫組件。

目前的覆寫位置：

```
var/vue_templates/
├── pages/
│   └── AppIndex.vue   # Replaces the default / entry page
└── components/
    ├── layout/
    └── SidebarLogin.vue
```

僅 `var/vue_templates/` 中存在的檔案會被覆寫 — 所有其他頁面和組件使用核心原始檔案。

---
## Twig 函數參考

所有範本中可用的關鍵 Twig 函數（在 `ChamiloExtension` 中註冊）：

| Function | Purpose |
|----------|---------|
| `chamilo_settings_get('ns.key')` | 讀取平台設定 |
| `chamilo_settings_has('ns.key')` | 檢查設定是否存在 |
| `chamilo_settings_all()` | 以陣列取得所有設定 |
| `theme_asset('path')` | 目前使用主題中資產的 URL |
| `theme_asset_link_tag('path')` | 主題 CSS 檔案的 `<link>` 標籤 |
| `theme_asset_script_tag('path')` | 主題 JS 檔案的 `<script>` 標籤 |
| `theme_asset_base64('path')` | 主題資產的 Base64 資料 URI |
| `theme_logo('header'\|'email')` | 偏好標誌的 URL |
| `is_allowed_to_edit(...)` | 權限檢查輔助函數 |