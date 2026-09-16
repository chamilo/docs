# CSS 和 Tailwind

## 樣式表架構

Chamilo 的樣式依此順序分層：

1. **Tailwind CSS** — 用於佈局、間距和顏色的實用類別。配置為 `important: true`，因此實用類別會覆寫 PrimeVue 元件預設值。
2. **SCSS** — 自訂樣式位於 `assets/css/scss/`，組織為 atoms、molecules、organisms、layout 和 components 層。
3. **PrimeVue 元件樣式** — 在 `assets/css/scss/atoms/` 中逐元件覆寫。
4. **主題 `colors.css`** — 目前色主題的 CSS 自訂屬性，最後載入，因此會覆蓋所有其他樣式。

PrimeFlex 列於 `package.json` 中但未匯入 — Tailwind 已涵蓋所有實用需求。

## 主要樣式表 (`assets/css/app.scss`)

`app.scss` 是主要樣式表的 Webpack 入口點。它匯入：

1. `_tailwind.scss` — Tailwind 的 `@tailwind base / components / utilities` 指示詞
2. `scss/index.scss` — 匯入所有 SCSS 片段的 barrel 檔案
3. 第三方 CSS (cropper, select2, daterangepicker, TinyMCE skin, fancybox, timepicker, qtip)
4. `editor_content.scss` — 注入至 TinyMCE 編輯器 iframe body 的樣式

## Tailwind 配置 (`tailwind.config.js`)

關鍵設定：

```javascript
module.exports = {
  important: true,   // all utilities get !important
  content: [
    "./assets/**/*.{js,vue}",
    "./public/main/**/*.{php,twig,tpl}",
    "./public/plugin/**/*.{php,twig,tpl}",
    "./src/CoreBundle/Resources/views/**/*.html.twig",
  ],
  // ...
}
```

內容路徑會掃描 Vue 元件、舊版 PHP 頁面、插件檔案和 Twig 範本，以便在生產建置中清除未使用的實用類別。

### CSS 變數顏色系統

所有顏色 token 皆由 CSS 自訂屬性支援，而非硬編碼值：

```javascript
theme: {
  colors: {
    primary: {
      DEFAULT: colorWithOpacity("--color-primary-base"),
      gradient: colorWithOpacity("--color-primary-gradient"),
    },
    secondary: { ... },
    // success, info, warning, danger, tertiary, form
  }
}
```

`colorWithOpacity` 輔助函式會產生 `rgb(var(--color-primary-base) / <opacity>)`，支援如 `bg-primary/50` 的不透明度變體。實際 RGB 值依主題定義於 `var/themes/{slug}/colors.css` 中，並在執行時載入 — 請參閱 [Color Themes](color-themes.md)。

### Tailwind 外掛

已啟用 `@tailwindcss/forms` 和 `@tailwindcss/typography`。

### 自訂類型比例

透過 `theme.extend.fontSize` 新增四組額外的字體大小/行高組合：

| Class | Size / Line-height |
|-------|--------------------|
| `text-body-1` | 16px / 24px |
| `text-body-2` | 14px / 16px |
| `text-caption` | 13px / 16px |
| `text-tiny` | 11px / 16px |

## PostCSS

PostCSS (Tailwind + Autoprefixer) 透過 `enablePostCssLoader()` 在 `webpack.config.js` 中內嵌配置。沒有獨立的 `postcss.config.js` 檔案。

## 專用樣式表

| File | Webpack entry | Purpose |
|------|--------------|---------|
| `assets/css/app.scss` | `app` | 主要應用程式樣式 |
| `assets/css/chat.scss` | `css/chat` | 聊天介面樣式 |
| `assets/css/document.scss` | `css/document` | 文件檢視器樣式 |
| `assets/css/editor.scss` | `css/editor` | TinyMCE 編輯器外殼樣式 |
| `assets/css/editor_content.scss` | `css/editor_content` | 注入至編輯器 iframe body 的樣式 |
| `assets/css/markdown.scss` | `css/markdown` | Markdown 渲染內容 |
| `assets/css/print.scss` | `css/print` | 列印樣式表 |
| `assets/css/responsive.scss` | `css/responsive` | 回應式覆寫 |
| `assets/css/scorm.scss` | `css/scorm` | SCORM 播放器樣式 |

## SCSS 模組結構 (`assets/css/scss/`)

```
scss/
├── index.scss        # Barrel — imports everything below
├── abstracts/        # Mixins and shared functions
├── settings/         # Design tokens (typography, component base)
├── atoms/            # Per-component PrimeVue overrides
├── molecules/        # Small composed patterns (chips, toolbars, empty states)
├── organisms/        # Larger areas (sidebar, datatable, dialog, LP panel)
├── layout/           # Page skeleton (topbar, main container, breadcrumb)
├── components/       # Feature-specific styles (blog, exercise, social, skill, …)
└── libs/             # Third-party overrides (FullCalendar, MediaElement.js)
```

## 在 Vue 元件中使用 Tailwind

```vue
<template>
  <div class="flex gap-2 p-4">
    <BaseButton class="bg-primary text-white" label="Save" />
  </div>
</template>
```

由於 `tailwind.config.js` 中設定了 `important: true`，Tailwind 實用類別可可靠地覆寫 PrimeVue 元件樣式，而無需額外特定性。