# CSS og Tailwind

## Stylesheet-arkitektur

Chamilos styles er lagdelt i denne rækkefølge:

1. **Tailwind CSS** — Utility-klasser til layout, afstand og farve. Konfigureret med `important: true`, så utilities tilsidesætter PrimeVue-komponenternes standarder.
2. **SCSS** — Brugerdefinerede styles i `assets/css/scss/`, organiseret i lagene atoms, molecules, organisms, layout og components.
3. **PrimeVue-komponentstyles** — Tilsidesat pr. komponent inde i `assets/css/scss/atoms/`.
4. **Temaets `colors.css`** — CSS custom properties for det aktive farvetema, indlæst sidst, så de kaskaderer over alt andet.

PrimeFlex er fjernet fra `package.json` — Tailwind dækker alle utility-behov.

## Hovedstylesheet (`assets/css/app.scss`)

`app.scss` er Webpack-indgangspunktet for hovedstylesheetet. Det importerer:

1. `_tailwind.scss` — Tailwinds `@tailwind base / components / utilities`-direktiver
2. `scss/index.scss` — Barrel-fil, der importerer alle SCSS-partials
3. Tredjeparts-CSS (cropper, select2, daterangepicker, TinyMCE-skin, fancybox, timepicker, qtip)
4. `editor_content.scss` — Styles, der injiceres i TinyMCE-editorens iframe-body

## Tailwind-konfiguration (`tailwind.config.js`)

Vigtige indstillinger:

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

Content-stierne scanner Vue-komponenter, ældre PHP-sider, plugin-filer og Twig-skabeloner, så ubrugte utilities fjernes ved produktionsbuilds.

### CSS-variabel-farvesystem

Alle farvetokens er understøttet af CSS custom properties frem for hardkodede værdier:

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

Hjælpefunktionen `colorWithOpacity` udsender `rgb(var(--color-primary-base) / <opacity>)`, hvilket muliggør opacitet-varianter som `bg-primary/50`. De faktiske RGB-værdier defineres pr. tema i `var/themes/{slug}/colors.css` og indlæses ved kørsel — se [Farvetemaer](color-themes.md).

### Tailwind-plugins

`@tailwindcss/forms` og `@tailwindcss/typography` er aktiveret.

### Brugerdefineret typografisk skala

Fire ekstra font-size/line-height-par tilføjes via `theme.extend.fontSize`:

| Klasse | Størrelse / linjehøjde |
|-------|--------------------|
| `text-body-1` | 16px / 24px |
| `text-body-2` | 14px / 16px |
| `text-caption` | 13px / 16px |
| `text-tiny` | 11px / 16px |

## PostCSS

PostCSS (Tailwind + Autoprefixer) er konfigureret inline inde i `webpack.config.js` via `enablePostCssLoader()`. Der findes ingen selvstændig `postcss.config.js`-fil.

## Specialiserede stylesheets

| Fil | Webpack-entry | Formål |
|------|--------------|---------|
| `assets/css/app.scss` | `app` | Hovedapplikationsstyles |
| `assets/css/chat.scss` | `css/chat` | Chatgrænseflade-styles |
| `assets/css/document.scss` | `css/document` | Dokumentvisnings-styles |
| `assets/css/editor.scss` | `css/editor` | TinyMCE-editor-skal-styles |
| `assets/css/editor_content.scss` | `css/editor_content` | Styles, der injiceres i editorens iframe-body |
| `assets/css/markdown.scss` | `css/markdown` | Markdown-renderet indhold |
| `assets/css/print.scss` | `css/print` | Print-stylesheet |
| `assets/css/responsive.scss` | `css/responsive` | Responsive tilsidesættelser |
| `assets/css/scorm.scss` | `css/scorm` | SCORM-afspiller-styles |

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

## Brug af Tailwind i Vue-komponenter

```vue
<template>
  <div class="flex gap-2 p-4">
    <BaseButton class="bg-primary text-white" label="Save" />
  </div>
</template>
```

Fordi `important: true` er sat i `tailwind.config.js`, tilsidesætter Tailwind-utilities pålideligt PrimeVue-komponentstyles uden behov for ekstra specificitet.