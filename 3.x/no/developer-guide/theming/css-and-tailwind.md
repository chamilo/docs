# CSS og Tailwind

## Stilarkarkitektur

Chamilos stiler er lagdelt i denne rekkefølgen:

1. **Tailwind CSS** — Utility-klasser for layout, avstand og farge. Konfigurert med `important: true` slik at utilities overstyrer PrimeVue-komponentenes standardstiler.
2. **SCSS** — Egendefinerte stiler i `assets/css/scss/`, organisert i lagene atoms, molecules, organisms, layout og components.
3. **PrimeVue-komponentstiler** — Overstyrt per komponent inne i `assets/css/scss/atoms/`.
4. **Temaets `colors.css`** — CSS-egendefinerte egenskaper for det aktive fargetemaet, lastet sist slik at de kaskaderer over alt annet.

PrimeFlex er fjernet fra `package.json` — Tailwind dekker alle utility-behov.

## Hovedstilark (`assets/css/app.scss`)

`app.scss` er Webpack-inngangspunktet for hovedstilarket. Det importerer:

1. `_tailwind.scss` — Tailwinds `@tailwind base / components / utilities`-direktiver
2. `scss/index.scss` — Barrel-fil som importerer alle SCSS-partials
3. Tredjeparts-CSS (cropper, select2, daterangepicker, TinyMCE-skin, fancybox, timepicker, qtip)
4. `editor_content.scss` — Stiler som injiseres i TinyMCE-editorens iframe-body

## Tailwind-konfigurasjon (`tailwind.config.js`)

Viktige innstillinger:

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

Innholdsstier skanner Vue-komponenter, eldre PHP-sider, plugin-filer og Twig-maler slik at ubrukte utilities fjernes ved produksjonsbygg.

### CSS-variabel-fargesystem

Alle fargetokener er basert på CSS-egendefinerte egenskaper i stedet for hardkodede verdier:

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

Hjelpefunksjonen `colorWithOpacity` emitterer `rgb(var(--color-primary-base) / <opacity>)`, som muliggjør opasitetsvarianter som `bg-primary/50`. De faktiske RGB-verdiene defineres per tema i `var/themes/{slug}/colors.css` og lastes ved kjøretid — se [Fargetemaer](color-themes.md).

### Tailwind-plugins

`@tailwindcss/forms` og `@tailwindcss/typography` er aktivert.

### Egendefinert typografisk skala

Fire ekstra par av skriftstørrelse/linjehøyde er lagt til via `theme.extend.fontSize`:

| Klasse | Størrelse / linjehøyde |
|-------|--------------------|
| `text-body-1` | 16px / 24px |
| `text-body-2` | 14px / 16px |
| `text-caption` | 13px / 16px |
| `text-tiny` | 11px / 16px |

## PostCSS

PostCSS (Tailwind + Autoprefixer) er konfigurert inline inne i `webpack.config.js` via `enablePostCssLoader()`. Det finnes ingen frittstående `postcss.config.js`-fil.

## Spesialiserte stilark

| Fil | Webpack-inngang | Formål |
|------|--------------|---------|
| `assets/css/app.scss` | `app` | Hovedapplikasjonsstiler |
| `assets/css/chat.scss` | `css/chat` | Stiler for chat-grensesnitt |
| `assets/css/document.scss` | `css/document` | Stiler for dokumentvisning |
| `assets/css/editor.scss` | `css/editor` | Stiler for TinyMCE-editorens skall |
| `assets/css/editor_content.scss` | `css/editor_content` | Stiler som injiseres i editorens iframe-body |
| `assets/css/markdown.scss` | `css/markdown` | Markdown-rendret innhold |
| `assets/css/print.scss` | `css/print` | Utskriftsstilark |
| `assets/css/responsive.scss` | `css/responsive` | Responsive overstyringer |
| `assets/css/scorm.scss` | `css/scorm` | Stiler for SCORM-avspiller |

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

## Bruk av Tailwind i Vue-komponenter

```vue
<template>
  <div class="flex gap-2 p-4">
    <BaseButton class="bg-primary text-white" label="Save" />
  </div>
</template>
```

Fordi `important: true` er satt i `tailwind.config.js`, overstyrer Tailwind-utilities pålitelig PrimeVue-komponentstiler uten behov for ekstra spesifisitet.