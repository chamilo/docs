# Sistema di build

Chamilo utilizza **Webpack 5** tramite **Symfony Webpack Encore** per la compilazione degli asset frontend. La configurazione completa della build si trova in `webpack.config.js` nella radice del progetto.

L'output viene scritto in `public/build/` e servito sotto il percorso pubblico `/build`.

## Punti di ingresso

### JavaScript

| Entry | Source | Purpose |
|-------|--------|---------|
| `vue` | `assets/vue/main.js` | Applicazione principale Vue 3 |
| `vue_installer` | `assets/vue/main_installer.js` | Procedura guidata di installazione |
| `legacy_app` | `assets/js/legacy/app.js` | JavaScript legacy |
| `legacy_exercise` | `assets/js/legacy/exercise.js` | Lettore degli esercizi |
| `legacy_lp` | `assets/js/legacy/lp.js` | Lettore dei percorsi formativi |
| `legacy_document` | `assets/js/legacy/document.js` | Visualizzatore documenti |
| `legacy_free-jqgrid` | `assets/js/legacy/free-jqgrid.js` | Widget griglia legacy |
| `legacy_framereadyloader` | `assets/js/legacy/frameReadyLoader.js` | Loader frame-ready per iframe legacy |
| `translatehtml` | `assets/js/translatehtml.js` | Helper per la traduzione HTML |
| `glossary_auto` | `assets/js/glossary-auto.js` | Evidenziazione automatica dei termini del glossario |

### CSS

| Entry | Source |
|-------|--------|
| `app` | `assets/css/app.scss` |
| `css/chat` | `assets/css/chat.scss` |
| `css/document` | `assets/css/document.scss` |
| `css/editor` | `assets/css/editor.scss` |
| `css/editor_content` | `assets/css/editor_content.scss` |
| `css/markdown` | `assets/css/markdown.scss` |
| `css/print` | `assets/css/print.scss` |
| `css/responsive` | `assets/css/responsive.scss` |
| `css/scorm` | `assets/css/scorm.scss` |

## Funzionalità della build

* **Vue 3 SFC** — componenti single file `.vue` compilati da `vue-loader`; il compilatore runtime è disabilitato (`runtimeCompilerBuild: false`), quindi tutti i template devono essere precompilati
* **TypeScript** — modalità solo transpiling (`transpileOnly: true`) per build rapide, senza type-checking durante la build
* **Sass/SCSS** — supporto SCSS completo tramite `sass-loader`
* **Tailwind CSS** — CSS utility-first elaborato inline tramite PostCSS (configurato all'interno di `webpack.config.js`; non esiste un `postcss.config.js` separato)
* **Babel** — transpiling ES6+ con `@babel/preset-env` e polyfill `core-js@3` (`useBuiltIns: "usage"`)
* **Provision automatica di jQuery** — `autoProvidejQuery()` rende `$` e `jQuery` disponibili globalmente senza import espliciti, a supporto del codice legacy
* **Source map** — abilitate solo in sviluppo
* **Chunk runtime unico** — runtime condiviso per tutti gli entry
* **Cache sul filesystem** — la cache persistente sul filesystem di Webpack è abilitata per accelerare le rebuild incrementali
* **Namespace dei chunk** — `output.uniqueName` e `output.chunkLoadingGlobal` sono impostati su `"chamilo"` / `"webpackChunkChamilo"` per evitare collisioni nel caricamento dei chunk quando più bundle Webpack coesistono sulla stessa pagina

## Funzionalità solo in produzione

* **Versioning** — suffissi con hash del contenuto su tutti i nomi dei file di output (`enableVersioning()`)
* **Subresource Integrity** — attributi `integrity` sui tag `<script>` e `<link>` (`enableIntegrityHashes()`)
* **Pulizia dell'output** — `public/build/` viene svuotato prima di ogni build di produzione

### Copie di asset senza hash (`CopyUnhashedAssetsPlugin`)

Alcune pagine PHP legacy fanno riferimento agli asset con un nome file fisso e non possono usare il manifest di Webpack. Un plugin personalizzato `CopyUnhashedAssetsPlugin` (definito in fondo a `webpack.config.js`) copia determinati file di produzione con hash in un percorso aggiuntivo senza hash dopo ogni build:

| File con hash | Copia senza hash |
|-------------|--------------|
| `legacy_document.[hash].js` | `legacy_document.js` |
| `legacy_exercise.[hash].js` | `legacy_exercise.js` |
| `legacy_framereadyloader.[hash].js` / `.css` | `legacy_framereadyloader.js` / `.css` |
| `css/document.[hash].css` | `css/document.css` |
| `css/editor_content.[hash].css` | `css/editor_content.css` |
| `glossary_auto.[hash].js` | `glossary_auto.js` |

## Asset di librerie copiati

`copyFiles()` copia un certo numero di pacchetti npm direttamente in `public/build/libs/` senza includerli nel bundle, per l'uso tramite tag `<script>` / `<link>` nei template legacy:

* `flatpickr` (JS + CSS + locali)
* `chart.js`
* `mediaelement` + `mediaelement-plugins`
* locali di `moment`
* `select2` (JS + CSS)
* `qtip2`
* `readmore-js`
* `js-cookie`
* `pwstrength-bootstrap`
* `multiselect-two-sides`

## Comandi di build

```bash
# Development build
yarn encore dev

# Development build with file watching
yarn encore dev --watch

# Production build (minified, versioned, integrity hashes)
yarn encore production
```

## Configurazione di Tailwind

Tailwind è configurato in `tailwind.config.js`. Punti chiave:

* **`important: true`** — Tutte le utility generate includono `!important`, consentendo loro di sovrascrivere gli stili dei componenti PrimeVue senza trucchi extra di specificità
* **Percorsi del contenuto** — Tailwind analizza `assets/**/*.{js,vue}`, `public/main/**/*.{php,twig,tpl}`, `public/plugin/**/*.{php,twig,tpl}` e `src/CoreBundle/Resources/views/**/*.html.twig` per l’utilizzo delle classi
* **Sistema di colori basato su variabili CSS** — Ogni token di colore (primary, secondary, tertiary, success, info, warning, danger) è supportato da una proprietà personalizzata CSS (ad es. `--color-primary-base`) definita per tema in `var/themes/[theme-name]/colors.css`. I valori sono triplette di canali RGB separate da spazi, che abilitano le utility di opacità di Tailwind (`bg-primary/50`)
* **Scala tipografica personalizzata** — Le coppie dimensione/interlinea `body-1`, `body-2`, `caption`, `tiny` sono aggiunte tramite `theme.extend.fontSize`
* **Plugin** — `@tailwindcss/forms` e `@tailwindcss/typography` sono abilitati

PostCSS (Tailwind + Autoprefixer) è configurato in linea all’interno di `webpack.config.js` tramite `enablePostCssLoader()` — non esiste un file autonomo `postcss.config.js`.