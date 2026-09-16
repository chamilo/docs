# Sistema di Build

Chamilo utilizza **Webpack 5** tramite **Symfony Webpack Encore** per la costruzione delle risorse frontend. La configurazione completa del build si trova in `webpack.config.js` alla radice del progetto.

L'output viene scritto in `public/build/` e servito sotto il percorso pubblico `/build`.

## Punti di Ingresso

### JavaScript

| Ingresso | Sorgente | Scopo |
|----------|----------|-------|
| `vue` | `assets/vue/main.js` | Applicazione principale Vue 3 |
| `vue_installer` | `assets/vue/main_installer.js` | Procedura guidata di installazione |
| `legacy_app` | `assets/js/legacy/app.js` | JavaScript legacy |
| `legacy_exercise` | `assets/js/legacy/exercise.js` | Lettore di esercizi |
| `legacy_lp` | `assets/js/legacy/lp.js` | Lettore di percorsi di apprendimento |
| `legacy_document` | `assets/js/legacy/document.js` | Visualizzatore di documenti |
| `legacy_free-jqgrid` | `assets/js/legacy/free-jqgrid.js` | Widget griglia legacy |
| `legacy_framereadyloader` | `assets/js/legacy/frameReadyLoader.js` | Caricatore frame-ready per iframe legacy |
| `translatehtml` | `assets/js/translatehtml.js` | Helper per la traduzione HTML |
| `glossary_auto` | `assets/js/glossary-auto.js` | Evidenziazione automatica dei termini del glossario |

### CSS

| Ingresso | Sorgente |
|----------|----------|
| `app` | `assets/css/app.scss` |
| `css/chat` | `assets/css/chat.scss` |
| `css/document` | `assets/css/document.scss` |
| `css/editor` | `assets/css/editor.scss` |
| `css/editor_content` | `assets/css/editor_content.scss` |
| `css/markdown` | `assets/css/markdown.scss` |
| `css/print` | `assets/css/print.scss` |
| `css/responsive` | `assets/css/responsive.scss` |
| `css/scorm` | `assets/css/scorm.scss` |

## Funzionalità di Build

* **Vue 3 SFC** — Componenti a file singolo `.vue` compilati da `vue-loader`; il compilatore runtime è disabilitato (`runtimeCompilerBuild: false`), quindi tutti i template devono essere pre-compilati
* **TypeScript** — Modalità solo transpilation (`transpileOnly: true`) per build veloci, senza controllo dei tipi durante il build
* **Sass/SCSS** — Supporto completo per SCSS tramite `sass-loader`
* **Tailwind CSS** — CSS utility-first elaborato inline tramite PostCSS (configurato all'interno di `webpack.config.js`; non esiste un file separato `postcss.config.js`)
* **Babel** — Transpilazione ES6+ con `@babel/preset-env` e polyfill `core-js@3` (`useBuiltIns: "usage"`)
* **jQuery auto-provision** — `autoProvidejQuery()` rende `$` e `jQuery` disponibili globalmente senza import espliciti, supportando codice legacy
* **Source maps** — Abilitate solo in sviluppo
* **Single runtime chunk** — Runtime condiviso per tutti gli ingressi
* **Filesystem cache** — La cache persistente del filesystem di Webpack è abilitata per accelerare i rebuild incrementali
* **Chunk namespacing** — `output.uniqueName` e `output.chunkLoadingGlobal` sono impostati su `"chamilo"` / `"webpackChunkChamilo"` per evitare collisioni nel caricamento dei chunk quando più bundle Webpack coesistono su una pagina

## Funzionalità Solo per Produzione

* **Versionamento** — Suffissi di hash del contenuto su tutti i nomi dei file di output (`enableVersioning()`)
* **Subresource Integrity** — Attributi `integrity` sui tag `<script>` e `<link>` (`enableIntegrityHashes()`)
* **Pulizia dell'output** — `public/build/` viene svuotata prima di ogni build di produzione

### Copie di risorse non hashate (`CopyUnhashedAssetsPlugin`)

Alcune pagine PHP legacy fanno riferimento alle risorse tramite un nome file fisso e non possono utilizzare il manifest di Webpack. Un plugin personalizzato `CopyUnhashedAssetsPlugin` (definito in fondo a `webpack.config.js`) copia determinati file di produzione hashati in un percorso aggiuntivo non hashato dopo ogni build:

| File hashato | Copia non hashata |
|--------------|-------------------|
| `legacy_document.[hash].js` | `legacy_document.js` |
| `legacy_exercise.[hash].js` | `legacy_exercise.js` |
| `legacy_framereadyloader.[hash].js` / `.css` | `legacy_framereadyloader.js` / `.css` |
| `css/document.[hash].css` | `css/document.css` |
| `css/editor_content.[hash].css` | `css/editor_content.css` |
| `glossary_auto.[hash].js` | `glossary_auto.js` |

## Risorse di Libreria Copiate

`copyFiles()` copia una serie di pacchetti npm direttamente in `public/build/libs/` senza bundle, per l'uso tramite tag `<script>` / `<link>` nei template legacy:

* `flatpickr` (JS + CSS + localizzazioni)
* `chart.js`
* `mediaelement` + `mediaelement-plugins`
* Localizzazioni di `moment`
* `select2` (JS + CSS)
* `qtip2`
* `readmore-js`
* `js-cookie`
* `pwstrength-bootstrap`
* `multiselect-two-sides`

## Comandi di Build

```bash
# Build di sviluppo
yarn encore dev

# Build di sviluppo con osservazione dei file
yarn encore dev --watch

# Build di produzione (minificato, versionato, hash di integrità)
yarn encore production
```

---
## Configurazione di Tailwind

Tailwind è configurato in `tailwind.config.js`. Punti chiave:

* **`important: true`** — Tutte le utility generate includono `!important`, consentendo loro di sovrascrivere gli stili dei componenti PrimeVue senza necessità di trucchi di specificità aggiuntivi
* **Percorsi dei contenuti** — Tailwind analizza `assets/**/*.{js,vue}`, `public/main/**/*.{php,twig,tpl}`, `public/plugin/**/*.{php,twig,tpl}` e `src/CoreBundle/Resources/views/**/*.html.twig` per l'utilizzo delle classi
* **Sistema di colori con variabili CSS** — Ogni token di colore (primario, secondario, terziario, successo, informazione, avviso, pericolo) è supportato da una proprietà personalizzata CSS (ad esempio `--color-primary-base`) definita per tema in `var/themes/[theme-name]/colors.css`. I valori sono triplette di canali RGB separate da spazi, che abilitano le utility di opacità di Tailwind (`bg-primary/50`)
* **Scala di font personalizzata** — Le coppie di dimensioni/altezza della linea `body-1`, `body-2`, `caption`, `tiny` sono aggiunte tramite `theme.extend.fontSize`
* **Plugin** — `@tailwindcss/forms` e `@tailwindcss/typography` sono abilitati

PostCSS (Tailwind + Autoprefixer) è configurato inline all'interno di `webpack.config.js` tramite `enablePostCssLoader()` — non esiste un file standalone `postcss.config.js`.