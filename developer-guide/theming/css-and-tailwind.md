# CSS 和 Tailwind

## 样式表架构

Chamilo 的样式按照以下顺序组织：

1. **Tailwind CSS** — 用于布局、间距和颜色的实用类。配置为 `important: true`，以便实用类覆盖 PrimeVue 组件的默认样式。
2. **SCSS** — 自定义样式位于 `assets/css/scss/`，按原子、分子、有机体、布局和组件分层组织。
3. **PrimeVue 组件样式** — 在 `assets/css/scss/atoms/` 内按组件覆盖。
4. **主题 `colors.css`** — 自定义 CSS 属性用于当前活动的颜色主题，最后加载以覆盖所有其他样式。

PrimeFlex 在 `package.json` 中列出，但未被导入 — Tailwind 涵盖了所有实用类需求。

## 主样式表 (`assets/css/app.scss`)

`app.scss` 是 Webpack 的主样式表入口点。它导入：

1. `_tailwind.scss` — Tailwind 指令 `@tailwind base / components / utilities`
2. `scss/index.scss` — 汇总文件，导入所有 SCSS 部分文件
3. 第三方 CSS (cropper, select2, daterangepicker, TinyMCE 皮肤, fancybox, timepicker, qtip)
4. `editor_content.scss` — 注入到 TinyMCE 编辑器 iframe 主体中的样式

## Tailwind 配置 (`tailwind.config.js`)

主要配置：

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

内容路径扫描 Vue 组件、遗留 PHP 页面、插件文件和 Twig 模板，以便在生产构建中清除未使用的实用类。

### 使用 CSS 变量的颜色系统

所有颜色令牌都由自定义 CSS 属性支持，而不是固定值：

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

辅助函数 `colorWithOpacity` 输出 `rgb(var(--color-primary-base) / <opacity>)`，允许使用如 `bg-primary/50` 的透明度变体。实际 RGB 值由主题在 `var/themes/{slug}/colors.css` 中定义，并在运行时加载 — 参见[颜色主题](color-themes.md)。

### Tailwind 插件

`@tailwindcss/forms` 和 `@tailwindcss/typography` 已启用。

### 自定义排版比例

通过 `theme.extend.fontSize` 添加了四个额外的字体大小/行高对：

| 类名 | 字体大小 / 行高 |
|-------|---------------------------|
| `text-body-1` | 16px / 24px |
| `text-body-2` | 14px / 16px |
| `text-caption` | 13px / 16px |
| `text-tiny` | 11px / 16px |

## PostCSS

PostCSS (Tailwind + Autoprefixer) 在 `webpack.config.js` 中通过 `enablePostCssLoader()` 内联配置。没有独立的 `postcss.config.js` 文件。

## 专用样式表

| 文件 | Webpack 入口 | 用途 |
|------|-----------------|------------|
| `assets/css/app.scss` | `app` | 应用主样式 |
| `assets/css/chat.scss` | `css/chat` | 聊天界面样式 |
| `assets/css/document.scss` | `css/document` | 文档查看器样式 |
| `assets/css/editor.scss` | `css/editor` | TinyMCE 编辑器外壳样式 |
| `assets/css/editor_content.scss` | `css/editor_content` | 注入到编辑器 iframe 主体的样式 |
| `assets/css/markdown.scss` | `css/markdown` | Markdown 渲染内容样式 |
| `assets/css/print.scss` | `css/print` | 打印样式表 |
| `assets/css/responsive.scss` | `css/responsive` | 响应式覆盖样式 |
| `assets/css/scorm.scss` | `css/scorm` | SCORM 播放器样式 |

## SCSS 模块结构 (`assets/css/scss/`)

```
scss/
├── index.scss        # 汇总文件 — 导入以下所有内容
├── abstracts/        # 共享的 mixin 和函数
├── settings/         # 设计令牌（排版、组件基础）
├── atoms/            # 按组件覆盖 PrimeVue 样式
├── molecules/        # 小型复合模式（标签、工具栏、空状态）
├── organisms/        # 较大区域（侧边栏、数据表、对话框、LP 面板）
├── layout/           # 页面骨架（顶部栏、主容器、面包屑）
├── components/       # 功能特定样式（博客、练习、社交、技能等）
└── libs/             # 第三方覆盖样式（FullCalendar, MediaElement.js）
```

---
## 在 Vue 组件中使用 Tailwind

```vue
<template>
  <div class="flex gap-2 p-4">
    <BaseButton class="bg-primary text-white" label="Save" />
  </div>
</template>
```

由于在 `tailwind.config.js` 中设置了 `important: true`，Tailwind 的实用类可以可靠地覆盖 PrimeVue 组件的样式，而无需额外的特异性。