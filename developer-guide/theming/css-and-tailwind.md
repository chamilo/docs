# CSS en Tailwind

## Stijlbladarchitectuur

De stijlen van Chamilo zijn opgebouwd in deze volgorde:

1. **Tailwind CSS** — Utility-klassen voor lay-out, spacing en kleur. Geconfigureerd met `important: true` zodat utilities de standaardinstellingen van PrimeVue-componenten overschrijven.
2. **SCSS** — Aangepaste stijlen in `assets/css/scss/`, georganiseerd in lagen voor atomen, moleculen, organismen, lay-out en componenten.
3. **PrimeVue-componentstijlen** — Overschreven per component in `assets/css/scss/atoms/`.
4. **Thema `colors.css`** — CSS aangepaste eigenschappen voor het actieve kleurenthema, als laatste geladen zodat ze over alles heen cascaderen.

PrimeFlex staat vermeld in `package.json` maar wordt niet geïmporteerd — Tailwind dekt alle utility-behoeften.

## Hoofdstijlblad (`assets/css/app.scss`)

`app.scss` is het Webpack-invoerpunt voor het hoofdstijlblad. Het importeert:

1. `_tailwind.scss` — Tailwind's `@tailwind base / components / utilities` richtlijnen
2. `scss/index.scss` — Barrel-bestand dat alle SCSS-partials importeert
3. CSS van derden (cropper, select2, daterangepicker, TinyMCE skin, fancybox, timepicker, qtip)
4. `editor_content.scss` — Stijlen die worden geïnjecteerd in de body van de TinyMCE-editor iframe

## Tailwind Configuratie (`tailwind.config.js`)

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

Inhoudspaden scannen Vue-componenten, legacy PHP-pagina's, pluginbestanden en Twig-templates zodat ongebruikte utilities worden verwijderd bij productie-builds.

### CSS-Variabele Kleursysteem

Alle kleurtokens worden ondersteund door CSS aangepaste eigenschappen in plaats van hardcoded waarden:

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

De `colorWithOpacity` helper genereert `rgb(var(--color-primary-base) / <opacity>)`, wat opacity-varianten mogelijk maakt zoals `bg-primary/50`. De daadwerkelijke RGB-waarden worden per thema gedefinieerd in `var/themes/{slug}/colors.css` en worden tijdens runtime geladen — zie [Kleurenthema's](color-themes.md).

### Tailwind Plugins

`@tailwindcss/forms` en `@tailwindcss/typography` zijn ingeschakeld.

### Aangepaste Typografie Schaal

Vier extra lettergrootte/lijnafstand paren zijn toegevoegd via `theme.extend.fontSize`:

| Klasse | Grootte / Lijnafstand |
|-------|-----------------------|
| `text-body-1` | 16px / 24px |
| `text-body-2` | 14px / 16px |
| `text-caption` | 13px / 16px |
| `text-tiny` | 11px / 16px |

## PostCSS

PostCSS (Tailwind + Autoprefixer) is inline geconfigureerd in `webpack.config.js` via `enablePostCssLoader()`. Er is geen apart `postcss.config.js` bestand.

## Gespecialiseerde Stijlbladen

| Bestand | Webpack-invoerpunt | Doel |
|------|-------------------|-------|
| `assets/css/app.scss` | `app` | Hoofdtoepassingsstijlen |
| `assets/css/chat.scss` | `css/chat` | Chatinterface stijlen |
| `assets/css/document.scss` | `css/document` | Documentviewer stijlen |
| `assets/css/editor.scss` | `css/editor` | TinyMCE-editor shell stijlen |
| `assets/css/editor_content.scss` | `css/editor_content` | Stijlen geïnjecteerd in de editor iframe body |
| `assets/css/markdown.scss` | `css/markdown` | Markdown-gerenderde inhoud |
| `assets/css/print.scss` | `css/print` | Afdrukstijlblad |
| `assets/css/responsive.scss` | `css/responsive` | Responsieve overschrijvingen |
| `assets/css/scorm.scss` | `css/scorm` | SCORM-speler stijlen |

## SCSS Module Structuur (`assets/css/scss/`)

```
scss/
├── index.scss        # Barrel — importeert alles hieronder
├── abstracts/        # Mixins en gedeelde functies
├── settings/         # Ontwerptokens (typografie, componentbasis)
├── atoms/            # Per-component PrimeVue overschrijvingen
├── molecules/        # Kleine samengestelde patronen (chips, werkbalken, lege staten)
├── organisms/        # Grotere gebieden (zijbalk, datatabel, dialoog, LP-paneel)
├── layout/           # Paginaskelet (bovenbalk, hoofdcontainer, breadcrumb)
├── components/       # Functie-specifieke stijlen (blog, oefening, sociaal, vaardigheid, …)
└── libs/             # Overschrijvingen van derden (FullCalendar, MediaElement.js)
```

## Tailwind Gebruiken in Vue Componenten

```vue
<template>
  <div class="flex gap-2 p-4">
    <BaseButton class="bg-primary text-white" label="Save" />
  </div>
</template>
```

Omdat `important: true` is ingesteld in `tailwind.config.js`, overschrijven Tailwind utilities betrouwbaar de PrimeVue-componentstijlen zonder extra specificiteit nodig te hebben.