# Bouwsysteem

Chamilo gebruikt **Webpack 5** via **Symfony Webpack Encore** voor het bouwen van frontend-assets. De volledige bouwconfiguratie bevindt zich in `webpack.config.js` in de hoofdmap van het project.

De uitvoer wordt geschreven naar `public/build/` en wordt aangeboden onder het publieke pad `/build`.

## Ingangspunten

### JavaScript

| Ingang | Bron | Doel |
|-------|--------|---------|
| `vue` | `assets/vue/main.js` | Hoofd Vue 3-applicatie |
| `vue_installer` | `assets/vue/main_installer.js` | Installatiewizard |
| `legacy_app` | `assets/js/legacy/app.js` | Verouderde JavaScript |
| `legacy_exercise` | `assets/js/legacy/exercise.js` | Oefeningspeler |
| `legacy_lp` | `assets/js/legacy/lp.js` | Leerpadspeler |
| `legacy_document` | `assets/js/legacy/document.js` | Documentviewer |
| `legacy_free-jqgrid` | `assets/js/legacy/free-jqgrid.js` | Verouderde grid-widget |
| `legacy_framereadyloader` | `assets/js/legacy/frameReadyLoader.js` | Frame-ready loader voor verouderde iframes |
| `translatehtml` | `assets/js/translatehtml.js` | HTML-vertaalhulp |
| `glossary_auto` | `assets/js/glossary-auto.js` | Automatische markering van woordenlijsttermen |

### CSS

| Ingang | Bron |
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

## Bouwfunctionaliteiten

* **Vue 3 SFC** — `.vue` single file components gecompileerd door `vue-loader`; runtime compiler is uitgeschakeld (`runtimeCompilerBuild: false`), dus alle templates moeten vooraf worden gecompileerd
* **TypeScript** — Alleen transpilatiemodus (`transpileOnly: true`) voor snelle builds, geen typecontrole tijdens het bouwen
* **Sass/SCSS** — Volledige SCSS-ondersteuning via `sass-loader`
* **Tailwind CSS** — Utility-first CSS inline verwerkt via PostCSS (geconfigureerd in `webpack.config.js`; er is geen apart `postcss.config.js`)
* **Babel** — ES6+ transpilatie met `@babel/preset-env` en `core-js@3` polyfills (`useBuiltIns: "usage"`)
* **jQuery auto-provision** — `autoProvidejQuery()` maakt `$` en `jQuery` globaal beschikbaar zonder expliciete imports, ter ondersteuning van verouderde code
* **Source maps** — Alleen ingeschakeld in ontwikkeling
* **Single runtime chunk** — Gedeelde runtime voor alle ingangspunten
* **Filesystem cache** — Webpack's persistente bestandssysteemcache is ingeschakeld om incrementele rebuilds te versnellen
* **Chunk namespacing** — `output.uniqueName` en `output.chunkLoadingGlobal` zijn ingesteld op `"chamilo"` / `"webpackChunkChamilo"` om conflicten bij het laden van chunks te vermijden wanneer meerdere Webpack-bundles op een pagina naast elkaar bestaan

## Alleen voor productie

* **Versiebeheer** — Content-hash achtervoegsels op alle uitvoerbestandsnamen (`enableVersioning()`)
* **Subresource Integrity** — `integrity`-attributen op `<script>` en `<link>` tags (`enableIntegrityHashes()`)
* **Opschoning uitvoer** — `public/build/` wordt vóór elke productiebouw gewist

### Ongehashte kopieën van assets (`CopyUnhashedAssetsPlugin`)

Sommige verouderde PHP-pagina's verwijzen naar assets met een vaste bestandsnaam en kunnen de Webpack-manifest niet gebruiken. Een aangepaste `CopyUnhashedAssetsPlugin` (gedefinieerd onderaan `webpack.config.js`) kopieert bepaalde gehashte productiebestanden naar een extra ongehasht pad na elke build:

| Gehasht bestand | Ongehashte kopie |
|-------------|--------------|
| `legacy_document.[hash].js` | `legacy_document.js` |
| `legacy_exercise.[hash].js` | `legacy_exercise.js` |
| `legacy_framereadyloader.[hash].js` / `.css` | `legacy_framereadyloader.js` / `.css` |
| `css/document.[hash].css` | `css/document.css` |
| `css/editor_content.[hash].css` | `css/editor_content.css` |
| `glossary_auto.[hash].js` | `glossary_auto.js` |

## Gekopieerde bibliotheekassets

`copyFiles()` kopieert een aantal npm-pakketten rechtstreeks naar `public/build/libs/` zonder ze te bundelen, voor gebruik via `<script>` / `<link>` tags in verouderde templates:

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

## Bouwopdrachten

```bash
# Ontwikkelingsbouw
yarn encore dev

# Ontwikkelingsbouw met bestandswatching
yarn encore dev --watch

# Productiebouw (gecomprimeerd, versiebeheer, integriteitshashes)
yarn encore production
```

---
## Tailwind Configuratie

Tailwind is geconfigureerd in `tailwind.config.js`. Belangrijke punten:

* **`important: true`** — Alle gegenereerde hulpprogrammaclasses bevatten `!important`, waardoor ze de stijlen van PrimeVue-componenten kunnen overschrijven zonder extra specificiteitstrucs
* **Inhoudspaden** — Tailwind scant `assets/**/*.{js,vue}`, `public/main/**/*.{php,twig,tpl}`, `public/plugin/**/*.{php,twig,tpl}` en `src/CoreBundle/Resources/views/**/*.html.twig` op het gebruik van klassen
* **CSS-variabele kleursysteem** — Elke kleurtoken (primair, secundair, tertiair, succes, info, waarschuwing, gevaar) wordt ondersteund door een aangepaste CSS-eigenschap (bijv. `--color-primary-base`), gedefinieerd per thema in `var/themes/[theme-name]/colors.css`. Waarden zijn ruimtegescheiden RGB-kanaaldriehoeken, wat Tailwind-dekkinghulpprogramma's mogelijk maakt (`bg-primary/50`)
* **Aangepaste lettertypeschaal** — `body-1`, `body-2`, `caption`, `tiny` grootte/lijnafstand-paren worden toegevoegd via `theme.extend.fontSize`
* **Plugins** — `@tailwindcss/forms` en `@tailwindcss/typography` zijn ingeschakeld

PostCSS (Tailwind + Autoprefixer) is inline geconfigureerd binnen `webpack.config.js` via `enablePostCssLoader()` — er is geen apart `postcss.config.js`-bestand.