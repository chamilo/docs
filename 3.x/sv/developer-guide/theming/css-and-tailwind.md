# CSS och Tailwind

## Stilarkitektur

Chamilos stilar är lagerindelade i denna ordning:

1. **Tailwind CSS** — Utility-klasser för layout, avstånd och färg. Konfigurerad med `important: true` så att utilities åsidosätter PrimeVue-komponenternas standardvärden.
2. **SCSS** — Anpassade stilar i `assets/css/scss/`, organiserade i lagren atoms, molecules, organisms, layout och components.
3. **PrimeVue-komponentstilar** — Åsidosatta per komponent i `assets/css/scss/atoms/`.
4. **Tema `colors.css`** — CSS-anpassade egenskaper för det aktiva färgtemat, laddas sist så att de kaskaderar över allt annat.

PrimeFlex har tagits bort från `package.json` — Tailwind täcker alla utility-behov.

## Huvudstilmall (`assets/css/app.scss`)

`app.scss` är Webpack-ingångspunkten för huvudstilmallen. Den importerar:

1. `_tailwind.scss` — Tailwinds direktiv `@tailwind base / components / utilities`
2. `scss/index.scss` — Barrel-fil som importerar alla SCSS-partialer
3. Tredjeparts-CSS (cropper, select2, daterangepicker, TinyMCE-skin, fancybox, timepicker, qtip)
4. `editor_content.scss` — Stilar som injiceras i TinyMCE-redigerarens iframe-body

## Tailwind-konfiguration (`tailwind.config.js`)

Viktiga inställningar:

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

Innehållssökvägarna skannar Vue-komponenter, äldre PHP-sidor, plugin-filer och Twig-mallar så att oanvända utilities rensas vid produktionsbyggen.

### Färgsystem med CSS-variabler

Alla färg-tokens backas upp av CSS-anpassade egenskaper i stället för hårdkodade värden:

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

Hjälpfunktionen `colorWithOpacity` emitterar `rgb(var(--color-primary-base) / <opacity>)`, vilket möjliggör opacitetvarianter som `bg-primary/50`. De faktiska RGB-värdena definieras per tema i `var/themes/{slug}/colors.css` och laddas vid körning — se [Färgteman](color-themes.md).

### Tailwind-plugins

`@tailwindcss/forms` och `@tailwindcss/typography` är aktiverade.

### Anpassad typografisk skala

Fyra extra par av fontstorlek/radhöjd läggs till via `theme.extend.fontSize`:

| Klass | Storlek / Radhöjd |
|-------|--------------------|
| `text-body-1` | 16px / 24px |
| `text-body-2` | 14px / 16px |
| `text-caption` | 13px / 16px |
| `text-tiny` | 11px / 16px |

## PostCSS

PostCSS (Tailwind + Autoprefixer) är konfigurerad inline i `webpack.config.js` via `enablePostCssLoader()`. Det finns ingen fristående `postcss.config.js`-fil.

## Specialiserade stilmallar

| Fil | Webpack-ingång | Syfte |
|------|--------------|---------|
| `assets/css/app.scss` | `app` | Huvudapplikationsstilar |
| `assets/css/chat.scss` | `css/chat` | Stilar för chattgränssnittet |
| `assets/css/document.scss` | `css/document` | Stilar för dokumentvisaren |
| `assets/css/editor.scss` | `css/editor` | Stilar för TinyMCE-redigerarens skal |
| `assets/css/editor_content.scss` | `css/editor_content` | Stilar som injiceras i redigerarens iframe-body |
| `assets/css/markdown.scss` | `css/markdown` | Markdown-renderat innehåll |
| `assets/css/print.scss` | `css/print` | Utskriftsstilmall |
| `assets/css/responsive.scss` | `css/responsive` | Responsiva åsidosättningar |
| `assets/css/scorm.scss` | `css/scorm` | Stilar för SCORM-spelaren |

## SCSS-modulstruktur (`assets/css/scss/`)

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

## Använda Tailwind i Vue-komponenter

```vue
<template>
  <div class="flex gap-2 p-4">
    <BaseButton class="bg-primary text-white" label="Save" />
  </div>
</template>
```

Eftersom `important: true` är satt i `tailwind.config.js` åsidosätter Tailwind-utilities tillförlitligt PrimeVue-komponentstilar utan extra specificitet.