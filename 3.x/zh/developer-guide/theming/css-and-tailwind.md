# CSS 与 Tailwind

## 样式表架构

Chamilo 的样式按以下顺序分层：

1. **Tailwind CSS** — 用于布局、间距和颜色的工具类。配置了 `important: true`，使工具类能够覆盖 PrimeVue 组件的默认样式。
2. **SCSS** — 位于 `assets/css/scss/` 的自定义样式，按原子、分子、有机体、布局和组件等层级组织。
3. **PrimeVue 组件样式** — 在 `assets/css/scss/atoms/` 中按组件进行覆盖。
4. **主题 `colors.css`** — 当前颜色主题的 CSS 自定义属性，最后加载以便层叠覆盖其他所有样式。

PrimeFlex 已从 `package.json` 中移除 — Tailwind 已覆盖全部工具类需求。

## 主样式表（`assets/css/app.scss`）

`app.scss` 是主样式表的 Webpack 入口。它导入：

1. `_tailwind.scss` — Tailwind 的 `@tailwind base / components / utilities` 指令
2. `scss/index.scss` — 导入所有 SCSS 分部文件的桶文件
3. 第三方 CSS（cropper、select2、daterangepicker、TinyMCE 皮肤、fancybox、timepicker、qtip）
4. `editor_content.scss` — 注入到 TinyMCE 编辑器 iframe 正文中的样式

## Tailwind 配置（`tailwind.config.js`）

关键设置：

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

内容路径会扫描 Vue 组件、遗留 PHP 页面、插件文件以及 Twig 模板，以便在生产构建时清除未使用的工具类。

### CSS 变量颜色系统

所有颜色令牌均由 CSS 自定义属性支撑，而非硬编码值：

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

`colorWithOpacity` 辅助函数会生成 `rgb(var(--color-primary-base) / <opacity>)`，从而支持如 `bg-primary/50` 这样的透明度变体。实际 RGB 值按主题定义在 `var/themes/{slug}/colors.css` 中，并在运行时加载 — 参见 [颜色主题](color-themes.md)。

### Tailwind 插件

已启用 `@tailwindcss/forms` 和 `@tailwindcss/typography`。

### 自定义字号阶梯

通过 `theme.extend.fontSize` 额外添加了四组字号/行高：

| 类名 | 字号 / 行高 |
|-------|--------------------|
| `text-body-1` | 16px / 24px |
| `text-body-2` | 14px / 16px |
| `text-caption` | 13px / 16px |
| `text-tiny` | 11px / 16px |

## PostCSS

PostCSS（Tailwind + Autoprefixer）通过 `enablePostCssLoader()` 在 `webpack.config.js` 中内联配置。没有独立的 `postcss.config.js` 文件。

## 专用样式表

| 文件 | Webpack 入口 | 用途 |
|------|--------------|---------|
| `assets/css/app.scss` | `app` | 主应用样式 |
| `assets/css/chat.scss` | `css/chat` | 聊天界面样式 |
| `assets/css/document.scss` | `css/document` | 文档查看器样式 |
| `assets/css/editor.scss` | `css/editor` | TinyMCE 编辑器外壳样式 |
| `assets/css/editor_content.scss` | `css/editor_content` | 注入到编辑器 iframe 正文中的样式 |
| `assets/css/markdown.scss` | `css/markdown` | Markdown 渲染内容 |
| `assets/css/print.scss` | `css/print` | 打印样式表 |
| `assets/css/responsive.scss` | `css/responsive` | 响应式覆盖 |
| `assets/css/scorm.scss` | `css/scorm` | SCORM 播放器样式 |

## SCSS 模块结构（`assets/css/scss/`）

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

## 在 Vue 组件中使用 Tailwind

```vue
<template>
  <div class="flex gap-2 p-4">
    <BaseButton class="bg-primary text-white" label="Save" />
  </div>
</template>
```

由于 `tailwind.config.js` 中设置了 `important: true`，Tailwind 工具类能够可靠地覆盖 PrimeVue 组件样式，而无需额外提高选择器优先级。