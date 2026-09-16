# Bouwsysteem

Chamilo gebruikt **Webpack 5** via **Symfony Webpack Encore** voor het bouwen van frontend-assets. De volledige bouwconfiguratie staat in `webpack.config.js` in de projectroot.

Uitvoer wordt geschreven naar `public/build/` en geserveerd onder het publieke pad `/build`.

## Entry Points

### JavaScript

| Entry | Bron | Doel |
|-------|--------|---------|
| `vue` | `assets/vue/main.js` | Hoofdapplicatie Vue 3 |
| `vue_installer` | `assets/vue/main_installer.js` | Installatiewizard |
| `legacy_app` | `assets/js/legacy/app.js` | Legacy-JavaScript |
| `legacy_exercise` | `assets/js/legacy/exercise.js` | Oefeningenspeler |
| `legacy_lp` | `assets/js/legacy/lp.js` | Leerpadspeler |
| `legacy_document` | `assets/js/legacy/document.js` | Documentviewer |
| `legacy_free-jqgrid` | `assets/js/legacy/free-jqgrid.js` | Legacy-gridwidget |
| `legacy_framereadyloader` | `assets/js/legacy/frameReadyLoader.js` | Frame-ready-loader voor legacy-iframes |
| `translatehtml` | `assets/js/translatehtml.js` | Hulpprogramma voor HTML-vertaling |
| `glossary_auto` | `assets/js/glossary-auto.js` | Automatische markering van glossariumtermen |

### CSS

| Entry | Bron |
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

## Bouwfuncties

* **Vue 3 SFC** — `.vue` single file components gecompileerd door `vue-loader`; de runtime-compiler is uitgeschakeld (`runtimeCompilerBuild: false`), dus alle templates moeten vooraf gecompileerd zijn
* **TypeScript** — Alleen-transpileermodus (`transpileOnly: true`) voor snelle builds, geen typecontrole tijdens de build
* **Sass/SCSS** — Volledige SCSS-ondersteuning via `sass-loader`
* **Tailwind CSS** — Utility-first CSS inline verwerkt via PostCSS (geconfigureerd in `webpack.config.js`; er is geen aparte `postcss.config.js`)
* **Babel** — ES6+-transpilatie met `@babel/preset-env` en `core-js@3`-polyfills (`useBuiltIns: "usage"`)
* **jQuery auto-provision** — `autoProvidejQuery()` maakt `$` en `jQuery` globaal beschikbaar zonder expliciete imports, ter ondersteuning van legacycode
* **Source maps** — Alleen ingeschakeld in development
* **Single runtime chunk** — Gedeelde runtime voor alle entries
* **Filesystem cache** — De persistente filesystem cache van Webpack is ingeschakeld om incrementele rebuilds te versnellen
* **Chunk namespacing** — `output.uniqueName` en `output.chunkLoadingGlobal` zijn ingesteld op `"chamilo"` / `"webpackChunkChamilo"` om botsingen bij het laden van chunks te voorkomen wanneer meerdere Webpack-bundles op één pagina naast elkaar bestaan

## Alleen-productiefuncties

* **Versioning** — Content-hash-achtervoegsels op alle uitvoerbestandsnamen (`enableVersioning()`)
* **Subresource Integrity** — `integrity`-attributen op `<script>`- en `<link>`-tags (`enableIntegrityHashes()`)
* **Output cleanup** — `public/build/` wordt vóór elke productiebuild gewist

### Kopieën van assets zonder hash (`CopyUnhashedAssetsPlugin`)

Sommige legacy-PHP-pagina's verwijzen naar assets met een vaste bestandsnaam en kunnen het Webpack-manifest niet gebruiken. Een aangepaste `CopyUnhashedAssetsPlugin` (gedefinieerd onderaan `webpack.config.js`) kopieert bepaalde gehashte productiebestanden na elke build naar een extra pad zonder hash:

| Gehasht bestand | Kopie zonder hash |
|-------------|--------------|
| `legacy_document.[hash].js` | `legacy_document.js` |
| `legacy_exercise.[hash].js` | `legacy_exercise.js` |
| `legacy_framereadyloader.[hash].js` / `.css` | `legacy_framereadyloader.js` / `.css` |
| `css/document.[hash].css` | `css/document.css` |
| `css/editor_content.[hash].css` | `css/editor_content.css` |
| `glossary_auto.[hash].js` | `glossary_auto.js` |

## Gekopieerde bibliotheekassets

`copyFiles()` kopieert een aantal npm-pakketten rechtstreeks naar `public/build/libs/` zonder ze te bundelen, voor gebruik via `<script>`- / `<link>`-tags in legacytemplates:

* `flatpickr` (JS + CSS + locales)
* `chart.js`
* `mediaelement` + `mediaelement-plugins`
* `moment` locales
* `select2` (JS + CSS)
* `qtip2`
* `readmore-js`
* `js-cookie`
* `pwstrength-bootstrap`
* `multiselect-two-sides`

## Bouwcommando's

```bash
# Development build
yarn encore dev

# Development build with file watching
yarn encore dev --watch

# Production build (minified, versioned, integrity hashes)
yarn encore production
```

## Tailwind-configuratie

Tailwind is geconfigureerd in `tailwind.config.js`. Belangrijke punten:

* **`important: true`** — Alle gegenereerde utilities bevatten `!important`, zodat ze de stijlen van PrimeVue-componenten kunnen overschrijven zonder extra specificiteitstrucs
* **Contentpaden** — Tailwind scant `assets/**/*.{js,vue}`, `public/main/**/*.{php,twig,tpl}`, `public/plugin/**/*.{php,twig,tpl}` en `src/CoreBundle/Resources/views/**/*.html.twig` op klassegebruik
* **Kleurensysteem met CSS-variabelen** — Elk kleurtoken (primary, secondary, tertiary, success, info, warning, danger) wordt ondersteund door een CSS custom property (bijv. `--color-primary-base`) die per thema is gedefinieerd in `var/themes/[theme-name]/colors.css`. Waarden zijn spatiegescheiden RGB-kanaaltripels, waardoor Tailwind-opacity-utilities (`bg-primary/50`) mogelijk zijn
* **Aangepaste lettergrootte-schaal** — De paren `body-1`, `body-2`, `caption`, `tiny` voor grootte/regelhoogte worden toegevoegd via `theme.extend.fontSize`
* **Plugins** — `@tailwindcss/forms` en `@tailwindcss/typography` zijn ingeschakeld

PostCSS (Tailwind + Autoprefixer) is inline geconfigureerd in `webpack.config.js` via `enablePostCssLoader()` — er is geen zelfstandig `postcss.config.js`-bestand.