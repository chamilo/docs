# CSS e Tailwind

## Architettura dei fogli di stile

Gli stili di Chamilo sono organizzati a strati in questo ordine:

1. **Tailwind CSS** — Classi utility per layout, spaziatura e colore. Configurato con `important: true` in modo che le utility sovrascrivano i valori predefiniti dei componenti PrimeVue.
2. **SCSS** — Stili personalizzati in `assets/css/scss/`, organizzati nei livelli atoms, molecules, organisms, layout e components.
3. **Stili dei componenti PrimeVue** — Sovrascritti per singolo componente in `assets/css/scss/atoms/`.
4. **`colors.css` del tema** — Proprietà CSS personalizzate per il tema colore attivo, caricate per ultime in modo da sovrascrivere tutto il resto.

PrimeFlex è stato rimosso da `package.json` — Tailwind copre tutte le esigenze di utility.

## Foglio di stile principale (`assets/css/app.scss`)

`app.scss` è il punto di ingresso Webpack per il foglio di stile principale. Importa:

1. `_tailwind.scss` — Le direttive `@tailwind base / components / utilities` di Tailwind
2. `scss/index.scss` — File barrel che importa tutti i partial SCSS
3. CSS di terze parti (cropper, select2, daterangepicker, skin TinyMCE, fancybox, timepicker, qtip)
4. `editor_content.scss` — Stili iniettati nel body dell'iframe dell'editor TinyMCE

## Configurazione Tailwind (`tailwind.config.js`)

Impostazioni principali:

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

I percorsi in content analizzano i componenti Vue, le pagine PHP legacy, i file dei plugin e i template Twig, così che le utility non utilizzate vengano eliminate nelle build di produzione.

### Sistema di colori basato su variabili CSS

Tutti i token di colore si basano su proprietà CSS personalizzate anziché su valori hardcoded:

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

L'helper `colorWithOpacity` emette `rgb(var(--color-primary-base) / <opacity>)`, abilitando varianti di opacità come `bg-primary/50`. I valori RGB effettivi sono definiti per tema in `var/themes/{slug}/colors.css` e caricati a runtime — vedere [Temi colore](color-themes.md).

### Plugin Tailwind

Sono abilitati `@tailwindcss/forms` e `@tailwindcss/typography`.

### Scala tipografica personalizzata

Quattro coppie aggiuntive di dimensione del carattere/interlinea sono aggiunte tramite `theme.extend.fontSize`:

| Classe | Dimensione / Interlinea |
|-------|--------------------|
| `text-body-1` | 16px / 24px |
| `text-body-2` | 14px / 16px |
| `text-caption` | 13px / 16px |
| `text-tiny` | 11px / 16px |

## PostCSS

PostCSS (Tailwind + Autoprefixer) è configurato in linea in `webpack.config.js` tramite `enablePostCssLoader()`. Non esiste un file `postcss.config.js` autonomo.

## Fogli di stile specializzati

| File | Entry Webpack | Scopo |
|------|--------------|---------|
| `assets/css/app.scss` | `app` | Stili principali dell'applicazione |
| `assets/css/chat.scss` | `css/chat` | Stili dell'interfaccia chat |
| `assets/css/document.scss` | `css/document` | Stili del visualizzatore documenti |
| `assets/css/editor.scss` | `css/editor` | Stili del contenitore dell'editor TinyMCE |
| `assets/css/editor_content.scss` | `css/editor_content` | Stili iniettati nel body dell'iframe dell'editor |
| `assets/css/markdown.scss` | `css/markdown` | Contenuto renderizzato in Markdown |
| `assets/css/print.scss` | `css/print` | Foglio di stile per la stampa |
| `assets/css/responsive.scss` | `css/responsive` | Sovrascritture responsive |
| `assets/css/scorm.scss` | `css/scorm` | Stili del player SCORM |

## Struttura dei moduli SCSS (`assets/css/scss/`)

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

## Uso di Tailwind nei componenti Vue

```vue
<template>
  <div class="flex gap-2 p-4">
    <BaseButton class="bg-primary text-white" label="Save" />
  </div>
</template>
```

Poiché in `tailwind.config.js` è impostato `important: true`, le utility Tailwind sovrascrivono in modo affidabile gli stili dei componenti PrimeVue senza necessità di specificità aggiuntiva.