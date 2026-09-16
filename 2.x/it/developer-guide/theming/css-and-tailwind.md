# CSS e Tailwind

## Architettura dei Fogli di Stile

Gli stili di Chamilo sono organizzati in quest'ordine:

1. **Tailwind CSS** — Classi di utilità per layout, spaziatura e colore. Configurato con `important: true` in modo che le utilità prevalgano sui valori predefiniti dei componenti PrimeVue.
2. **SCSS** — Stili personalizzati in `assets/css/scss/`, organizzati in livelli di atomi, molecole, organismi, layout e componenti.
3. **Stili dei componenti PrimeVue** — Sovrascritti per componente all'interno di `assets/css/scss/atoms/`.
4. **Tema `colors.css`** — Proprietà personalizzate CSS per il tema di colore attivo, caricato per ultimo in modo da prevalere su tutto il resto.

PrimeFlex è elencato in `package.json` ma non è importato — Tailwind copre tutte le necessità di utilità.

## Foglio di Stile Principale (`assets/css/app.scss`)

`app.scss` è il punto di ingresso Webpack per il foglio di stile principale. Importa:

1. `_tailwind.scss` — Direttive di Tailwind `@tailwind base / components / utilities`
2. `scss/index.scss` — File di aggregazione che importa tutti i partial SCSS
3. CSS di terze parti (cropper, select2, daterangepicker, skin TinyMCE, fancybox, timepicker, qtip)
4. `editor_content.scss` — Stili iniettati nel corpo dell'iframe dell'editor TinyMCE

## Configurazione di Tailwind (`tailwind.config.js`)

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

I percorsi dei contenuti scansionano i componenti Vue, le pagine PHP legacy, i file dei plugin e i template Twig, in modo che le utilità non utilizzate vengano eliminate nelle build di produzione.

### Sistema di Colori con Variabili CSS

Tutti i token di colore sono supportati da proprietà personalizzate CSS invece di valori hardcoded:

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

L'helper `colorWithOpacity` emette `rgb(var(--color-primary-base) / <opacity>)`, consentendo varianti di opacità come `bg-primary/50`. I valori RGB effettivi sono definiti per tema in `var/themes/{slug}/colors.css` e caricati a runtime — vedi [Temi di Colore](color-themes.md).

### Plugin di Tailwind

`@tailwindcss/forms` e `@tailwindcss/typography` sono abilitati.

### Scala Tipografica Personalizzata

Quattro coppie aggiuntive di dimensione del font e altezza della linea sono aggiunte tramite `theme.extend.fontSize`:

| Classe | Dimensione / Altezza linea |
|-------|--------------------|
| `text-body-1` | 16px / 24px |
| `text-body-2` | 14px / 16px |
| `text-caption` | 13px / 16px |
| `text-tiny` | 11px / 16px |

## PostCSS

PostCSS (Tailwind + Autoprefixer) è configurato inline all'interno di `webpack.config.js` tramite `enablePostCssLoader()`. Non esiste un file standalone `postcss.config.js`.

## Fogli di Stile Specializzati

| File | Ingresso Webpack | Scopo |
|------|--------------|---------|
| `assets/css/app.scss` | `app` | Stili principali dell'applicazione |
| `assets/css/chat.scss` | `css/chat` | Stili dell'interfaccia della chat |
| `assets/css/document.scss` | `css/document` | Stili del visualizzatore di documenti |
| `assets/css/editor.scss` | `css/editor` | Stili della shell dell'editor TinyMCE |
| `assets/css/editor_content.scss` | `css/editor_content` | Stili iniettati nel corpo dell'iframe dell'editor |
| `assets/css/markdown.scss` | `css/markdown` | Contenuto renderizzato in Markdown |
| `assets/css/print.scss` | `css/print` | Foglio di stile per la stampa |
| `assets/css/responsive.scss` | `css/responsive` | Sovrascritture responsive |
| `assets/css/scorm.scss` | `css/scorm` | Stili del player SCORM |

## Struttura dei Moduli SCSS (`assets/css/scss/`)

```
scss/
├── index.scss        # Barrel — importa tutto ciò che segue
├── abstracts/        # Mixin e funzioni condivise
├── settings/         # Token di design (tipografia, base dei componenti)
├── atoms/            # Sovrascritture PrimeVue per componente
├── molecules/        # Piccoli pattern composti (chip, barre degli strumenti, stati vuoti)
├── organisms/        # Aree più grandi (sidebar, datatable, dialog, pannello LP)
├── layout/           # Scheletro della pagina (topbar, contenitore principale, breadcrumb)
├── components/       # Stili specifici per funzionalità (blog, esercizio, social, skill, …)
└── libs/             # Sovrascritture di terze parti (FullCalendar, MediaElement.js)
```

## Utilizzo di Tailwind nei Componenti Vue

```vue
<template>
  <div class="flex gap-2 p-4">
    <BaseButton class="bg-primary text-white" label="Save" />
  </div>
</template>
```

Poiché `important: true` è impostato in `tailwind.config.js`, le utilità di Tailwind sovrascrivono in modo affidabile gli stili dei componenti PrimeVue senza necessità di specificità aggiuntiva.