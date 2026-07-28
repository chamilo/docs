# CSS and Tailwind

## Stylesheet Architecture

Chamilo's styles are layered in this order:

1. **Tailwind CSS** — Utility classes for layout, spacing, and color. Configured with `important: true` so utilities override PrimeVue component defaults.
2. **SCSS** — Custom styles in `assets/css/scss/`, organized into atoms, molecules, organisms, layout, and components layers.
3. **PrimeVue component styles** — Overridden per-component inside `assets/css/scss/atoms/`.
4. **Theme `colors.css`** — CSS custom properties for the active color theme, loaded last so they cascade over everything else.

PrimeFlex has been removed from `package.json` — Tailwind covers all utility needs.

## Main Stylesheet (`assets/css/app.scss`)

`app.scss` is the Webpack entry point for the main stylesheet. It imports:

1. `_tailwind.scss` — Tailwind's `@tailwind base / components / utilities` directives
2. `scss/index.scss` — Barrel file that imports all SCSS partials
3. Third-party CSS (cropper, select2, daterangepicker, TinyMCE skin, fancybox, timepicker, qtip)
4. `editor_content.scss` — Styles injected into the TinyMCE editor iframe body

## Tailwind Configuration (`tailwind.config.js`)

Key settings:

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

Content paths scan Vue components, legacy PHP pages, plugin files, and Twig templates so unused utilities are purged on production builds.

### CSS-Variable Color System

All color tokens are backed by CSS custom properties rather than hardcoded values:

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

The `colorWithOpacity` helper emits `rgb(var(--color-primary-base) / <opacity>)`, enabling opacity variants such as `bg-primary/50`. The actual RGB values are defined per theme in `var/themes/{slug}/colors.css` and loaded at runtime — see [Color Themes](color-themes.md).

### Tailwind Plugins

`@tailwindcss/forms` and `@tailwindcss/typography` are enabled.

### Custom Type Scale

Four extra font-size/line-height pairs are added via `theme.extend.fontSize`:

| Class | Size / Line-height |
|-------|--------------------|
| `text-body-1` | 16px / 24px |
| `text-body-2` | 14px / 16px |
| `text-caption` | 13px / 16px |
| `text-tiny` | 11px / 16px |

## PostCSS

PostCSS (Tailwind + Autoprefixer) is configured inline inside `webpack.config.js` via `enablePostCssLoader()`. There is no standalone `postcss.config.js` file.

## Specialized Stylesheets

| File | Webpack entry | Purpose |
|------|--------------|---------|
| `assets/css/app.scss` | `app` | Main application styles |
| `assets/css/chat.scss` | `css/chat` | Chat interface styles |
| `assets/css/document.scss` | `css/document` | Document viewer styles |
| `assets/css/editor.scss` | `css/editor` | TinyMCE editor shell styles |
| `assets/css/editor_content.scss` | `css/editor_content` | Styles injected into the editor iframe body |
| `assets/css/markdown.scss` | `css/markdown` | Markdown-rendered content |
| `assets/css/print.scss` | `css/print` | Print stylesheet |
| `assets/css/responsive.scss` | `css/responsive` | Responsive overrides |
| `assets/css/scorm.scss` | `css/scorm` | SCORM player styles |

## SCSS Module Structure (`assets/css/scss/`)

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

## Using Tailwind in Vue Components

```vue
<template>
  <div class="flex gap-2 p-4">
    <BaseButton class="bg-primary text-white" label="Save" />
  </div>
</template>
```

Because `important: true` is set in `tailwind.config.js`, Tailwind utilities reliably override PrimeVue component styles without needing extra specificity.
