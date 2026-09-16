# Twig 範本

Chamilo 使用 Twig 進行伺服器端頁面渲染。範本位於 `src/CoreBundle/Resources/views/`，並以 `@ChamiloCore/` 命名空間前綴參照（例如 `@ChamiloCore/Layout/base-layout.html.twig`）。

沒有頂層的 `templates/` 目錄 — 所有 Twig 範本都位於 `src/CoreBundle/Resources/views/` 之下。

## Twig 與 Vue 如何共存

大多數頁面遵循此流程：

1. Symfony 控制器渲染一個繼承版面配置的 Twig 範本。
2. 該版面配置引入 `vue_setup.html.twig`，其會輸出 `<div id="app">`，並透過 `vue_js_setup.html.twig` 注入執行時期全域變數（`window.user`、`window.breadcrumb` 等）。
3. Vue 掛載於 `#app`，並處理該元素內的所有 UI 渲染。
4. Vue 應用程式透過 REST API 與後端通訊。

對於尚未遷移至 Vue 的舊版頁面，Symfony 會透過 Twig 渲染完整頁面 HTML，內容置於 `#sectionMainContent` 之內。Vue 仍會掛載（提供側邊欄與頂欄外殼），但主要內容區為伺服器端渲染的 HTML。

## 版面配置範本

所有版面配置皆繼承 `@ChamiloCore/Layout/base-layout.html.twig`，該檔提供 `<html>`、`<head>` 與 `<body>` 結構。可用的版面配置變體：

| 範本 | 用途 |
|----------|---------|
| `Layout/base-layout.html.twig` | 根範本 — `<html>` 外殼、匯入 Macros、輸出 `<head>` 與 `<body>` |
| `Layout/layout.html.twig` | 標準完整版面，含側邊欄、頂欄與內容區 |
| `Layout/layout_one_col.html.twig` | 單欄版面（無側邊欄） |
| `Layout/layout_two_col.html.twig` | 雙欄版面 |
| `Layout/layout_content.html.twig` | 僅內容的包裝器 |
| `Layout/layout_empty.html.twig` | 極簡外觀的空白版面 |
| `Layout/no_layout.html.twig` | 無頁首／頁尾；內容直接置於 `<body>` 內 |
| `Layout/no_layout_scorm.html.twig` | 供 SCORM 內容框架使用的精簡版面 |
| `Layout/blank.html.twig` | 完全空白的頁面 |
| `Layout/skill_layout.html.twig` | 技能輪盤頁面的版面 |

## 關鍵片段（Partials）

| 範本 | 用途 |
|----------|---------|
| `Layout/head.html.twig` | `<head>` 內容：meta 標籤、所有 Encore CSS 項目、主題 `colors.css`、舊版 JS 項目、OpenGraph／Twitter 標籤 |
| `Layout/foot.html.twig` | 文件結尾：Vue JS 進入點、`tracking.footer_extra_content` 注入 |
| `Layout/vue_setup.html.twig` | 輸出 `<div id="app">` 並引入 `vue_js_setup.html.twig` |
| `Layout/vue_js_setup.html.twig` | 注入 `window.user`、`window.breadcrumb`、`window.languages` 等 |
| `Layout/cookie_banner.html.twig` | GDPR Cookie 同意橫幅 |
| `Layout/footer.html.twig` | 頁面頁尾列 |
| `Layout/course_navigation.html.twig` | 課程工具導覽麵包屑 |

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

舊版 JS 項目（`legacy_app`、`legacy_lp` 等）於 `<head>` 載入，因為舊版 PHP 頁面依賴它們在 DOM 就緒前即已可用。

## Macros

可重用的 Twig macros 位於 `Macros/`，並於 `base-layout.html.twig` 頂部匯入：

| Macro 檔案 | 提供 |
|-----------|---------|
| `Macros/box.html.twig` | 內容區塊輔助函式 |
| `Macros/actions.html.twig` | 動作按鈕渲染 |
| `Macros/buttons.html.twig` | 按鈕 HTML 輔助函式 |
| `Macros/headers.html.twig` | 頁面標題輔助函式 |
| `Macros/image.html.twig` | 圖片渲染輔助函式 |
| `Macros/modals.html.twig` | 模態對話框輔助函式 |

在任何繼承 `base-layout.html.twig` 的範本中使用：

```twig
{{ macro_buttons.submit('Save') }}
{{ macro_box.content_box('Title', content) }}
```

## 自訂 Vue 範本

Chamilo 支援透過 `APP_CUSTOM_VUE_TEMPLATE` 環境變數，依安裝覆寫 Vue 頁面。設定後，Webpack 建置會透過 `DefinePlugin` 暴露 `ENV_CUSTOM_VUE_TEMPLATE` 常數，且 Vue 路由器會有條件地從 `var/vue_templates/` 匯入覆寫元件。

目前的覆寫位置：

```
var/vue_templates/
├── pages/
│   └── AppIndex.vue   # Replaces the default / entry page
└── components/
    ├── layout/
    └── SidebarLogin.vue
```

僅 `var/vue_templates/` 中實際存在的檔案會被覆寫 — 其餘頁面與元件仍使用核心原始檔。

## Twig 函式參考

所有範本中皆可使用的主要 Twig 函式（於 `ChamiloExtension` 中註冊）：

| 函式 | 用途 |
|----------|---------|
| `chamilo_settings_get('ns.key')` | 讀取平台設定 |
| `chamilo_settings_has('ns.key')` | 檢查設定是否存在 |
| `chamilo_settings_all()` | 以陣列取得所有設定 |
| `theme_asset('path')` | 作用中佈景主題資產的 URL |
| `theme_asset_link_tag('path')` | 佈景主題 CSS 檔案的 `<link>` 標籤 |
| `theme_asset_script_tag('path')` | 佈景主題 JS 檔案的 `<script>` 標籤 |
| `theme_asset_base64('path')` | 佈景主題資產的 Base64 data URI |
| `theme_logo('header'\|'email')` | 偏好標誌的 URL |
| `is_allowed_to_edit(...)` | 權限檢查輔助函式 |