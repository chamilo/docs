# CSS en Tailwind

## Stylesheet-architectuur

De stijlen van Chamilo zijn in deze volgorde gelaagd:

1. **Tailwind CSS** — Utility-klassen voor layout, spatiëring en kleur. Geconfigureerd met `important: true` zodat utilities de standaardstijlen van PrimeVue-componenten overschrijven.
2. **SCSS** — Aangepaste stijlen in `assets/css/scss/`, georganiseerd in lagen voor atoms, molecules, organisms, layout en components.
3. **PrimeVue-componentstijlen** — Per component overschreven in `assets/css/scss/atoms/`.
4. **Thema `colors.css`** — CSS custom properties voor het actieve kleurthema, als laatste geladen zodat ze over alles heen cascadren.

PrimeFlex is verwijderd uit `package.json` — Tailwind dekt alle utility-behoeften.

## Hoofdstylesheet (`assets/css/app.scss`)

`app.scss` is het Webpack-ingangspunt voor de hoofdstylesheet. Het importeert:

1. `_tailwind.scss` — De `@tailwind base / components / utilities`-directives van Tailwind
2. `scss/index.scss` — Barrel-bestand dat alle SCSS-partials importeert
3. CSS van derden (cropper, select2, daterangepicker, TinyMCE-skin, fancybox, timepicker, qtip)
4. `editor_content.scss` — Stijlen die in de body van het TinyMCE-editor-iframe worden geïnjecteerd

## Tailwind-configuratie (`tailwind.config.js`)

Belangrijke instellingen:

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

Content-paden scannen Vue-componenten, legacy PHP-pagina's, pluginbestanden en Twig-templates, zodat ongebruikte utilities bij productiebuilds worden verwijderd.

### Kleurensysteem met CSS-variabelen

Alle kleurtokens zijn gebaseerd op CSS custom properties in plaats van hardgecodeerde waarden:

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

De helper `colorWithOpacity` genereert `rgb(var(--color-primary-base) / <opacity>)`, waardoor opaciteitsvarianten zoals `bg-primary/50` mogelijk zijn. De daadwerkelijke RGB-waarden worden per thema gedefinieerd in `var/themes/{slug}/colors.css` en tijdens runtime geladen — zie [Kleurthema's](color-themes.md).

### Tailwind-plugins

`@tailwindcss/forms` en `@tailwindcss/typography` zijn ingeschakeld.

### Aangepaste typografische schaal

Vier extra combinaties van lettergrootte en regelhoogte worden toegevoegd via `theme.extend.fontSize`:

| Klasse | Grootte / Regelhoogte |
|-------|--------------------|
| `text-body-1` | 16px / 24px |
| `text-body-2` | 14px / 16px |
| `text-caption` | 13px / 16px |
| `text-tiny` | 11px / 16px |

## PostCSS

PostCSS (Tailwind + Autoprefixer) is inline geconfigureerd in `webpack.config.js` via `enablePostCssLoader()`. Er is geen zelfstandig `postcss.config.js`-bestand.

## Gespecialiseerde stylesheets

| Bestand | Webpack-entry | Doel |
|------|--------------|---------|
| `assets/css/app.scss` | `app` | Hoofdstijlen van de applicatie |
| `assets/css/chat.scss` | `css/chat` | Stijlen van de chatinterface |
| `assets/css/document.scss` | `css/document` | Stijlen van de documentviewer |
| `assets/css/editor.scss` | `css/editor` | Stijlen van de TinyMCE-editorshell |
| `assets/css/editor_content.scss` | `css/editor_content` | Stijlen die in de body van het editor-iframe worden geïnjecteerd |
| `assets/css/markdown.scss` | `css/markdown` | Als Markdown weergegeven inhoud |
| `assets/css/print.scss` | `css/print` | Printstylesheet |
| `assets/css/responsive.scss` | `css/responsive` | Responsieve overrides |
| `assets/css/scorm.scss` | `css/scorm` | Stijlen van de SCORM-speler |

## SCSS-modulestructuur (`assets/css/scss/`)

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

## Tailwind gebruiken in Vue-componenten

```vue
<template>
  <div class="flex gap-2 p-4">
    <BaseButton class="bg-primary text-white" label="Save" />
  </div>
</template>
```

Omdat `important: true` is ingesteld in `tailwind.config.js`, overschrijven Tailwind-utilities betrouwbaar de stijlen van PrimeVue-componenten zonder extra specificiteit.