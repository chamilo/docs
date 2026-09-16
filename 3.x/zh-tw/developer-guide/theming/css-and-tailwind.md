# CSS 與 Tailwind

## 樣式表架構

Chamilo 的樣式依下列順序分層：

1. **Tailwind CSS** — 用於版面、間距與色彩的工具類別。設定 `important: true`，使工具類別能覆寫 PrimeVue 元件預設樣式。
2. **SCSS** — 自訂樣式位於 `assets/css/scss/`，依 atoms、molecules、organisms、layout 與 components 層組織。
3. **PrimeVue 元件樣式** — 於 `assets/css/scss/atoms/` 內依元件覆寫。
4. **主題 `colors.css`** — 作用中色彩主題的 CSS 自訂屬性，最後載入以便層疊覆寫其餘樣式。

PrimeFlex 已自 `package.json` 移除 — Tailwind 涵蓋所有工具類別需求。

## 主要樣式表（`assets/css/app.scss`）

`app.scss` 是主要樣式表的 Webpack 進入點。它匯入：

1. `_tailwind.scss` — Tailwind 的 `@tailwind base / components / utilities` 指令
2. `scss/index.scss` — 匯入所有 SCSS 部分檔的桶檔（barrel file）
3. 第三方 CSS（cropper、select2、daterangepicker、TinyMCE skin、fancybox、timepicker、qtip）
4. `editor_content.scss` — 注入 TinyMCE 編輯器 iframe 主體的樣式

## Tailwind 設定（`tailwind.config.js`）

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

內容路徑會掃描 Vue 元件、舊版 PHP 頁面、外掛檔案與 Twig 範本，以便在正式環境建置時清除未使用的工具類別。

### CSS 變數色彩系統

所有色彩權杖皆由 CSS 自訂屬性支援，而非寫死數值：

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

`colorWithOpacity` 輔助函式會產出 `rgb(var(--color-primary-base) / <opacity>)`，從而支援如 `bg-primary/50` 的透明度變體。實際 RGB 值依主題定義於 `var/themes/{slug}/colors.css`，並於執行時載入 — 請參閱 [色彩主題](color-themes.md)。

### Tailwind 外掛

已啟用 `@tailwindcss/forms` 與 `@tailwindcss/typography`。

### 自訂字級比例

透過 `theme.extend.fontSize` 額外加入四組字級／行高配對：

| 類別 | 尺寸／行高 |
|-------|--------------------|
| `text-body-1` | 16px / 24px |
| `text-body-2` | 14px / 16px |
| `text-caption` | 13px / 16px |
| `text-tiny` | 11px / 16px |

## PostCSS

PostCSS（Tailwind + Autoprefixer）於 `webpack.config.js` 內透過 `enablePostCssLoader()` 內嵌設定。沒有獨立的 `postcss.config.js` 檔案。

## 專用樣式表

| 檔案 | Webpack 進入點 | 用途 |
|------|--------------|---------|
| `assets/css/app.scss` | `app` | 主要應用程式樣式 |
| `assets/css/chat.scss` | `css/chat` | 聊天介面樣式 |
| `assets/css/document.scss` | `css/document` | 文件檢視器樣式 |
| `assets/css/editor.scss` | `css/editor` | TinyMCE 編輯器外殼樣式 |
| `assets/css/editor_content.scss` | `css/editor_content` | 注入編輯器 iframe 主體的樣式 |
| `assets/css/markdown.scss` | `css/markdown` | Markdown 呈現內容 |
| `assets/css/print.scss` | `css/print` | 列印樣式表 |
| `assets/css/responsive.scss` | `css/responsive` | 響應式覆寫 |
| `assets/css/scorm.scss` | `css/scorm` | SCORM 播放器樣式 |

## SCSS 模組結構（`assets/css/scss/`）

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

由於 `tailwind.config.js` 已設定 `important: true`，Tailwind 工具類別能可靠覆寫 PrimeVue 元件樣式，無需額外提高選擇器權重。