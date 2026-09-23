# Byggesystem

Chamilo bruker **Webpack 5** via **Symfony Webpack Encore** for å bygge frontend-ressurser. Den fullstendige byggekonfigurasjonen ligger i `webpack.config.js` i prosjektets rot.

Utdata skrives til `public/build/` og serveres under den offentlige stien `/build`.

## Inngangspunkter

### JavaScript

| Entry | Source | Purpose |
|-------|--------|---------|
| `vue` | `assets/vue/main.js` | Hovedapplikasjon i Vue 3 |
| `vue_installer` | `assets/vue/main_installer.js` | Installasjonsveiviser |
| `legacy_app` | `assets/js/legacy/app.js` | Eldre JavaScript |
| `legacy_exercise` | `assets/js/legacy/exercise.js` | Øvelsesspiller |
| `legacy_lp` | `assets/js/legacy/lp.js` | Læringsstispiller |
| `legacy_document` | `assets/js/legacy/document.js` | Dokumentviser |
| `legacy_free-jqgrid` | `assets/js/legacy/free-jqgrid.js` | Eldre rutenett-widget |
| `legacy_framereadyloader` | `assets/js/legacy/frameReadyLoader.js` | Frame-ready-laster for eldre iframes |
| `translatehtml` | `assets/js/translatehtml.js` | Hjelper for HTML-oversettelse |
| `glossary_auto` | `assets/js/glossary-auto.js` | Automatisk utheving av ordbokstermer |

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

## Byggefunksjoner

* **Vue 3 SFC** — `.vue`-enkeltfilkomponenter kompilert av `vue-loader`; kjøretidskompilatoren er deaktivert (`runtimeCompilerBuild: false`), så alle maler må være forhåndskompilert
* **TypeScript** — Kun transpilering (`transpileOnly: true`) for raske bygg, ingen typesjekking under bygging
* **Sass/SCSS** — Full SCSS-støtte via `sass-loader`
* **Tailwind CSS** — Utility-first CSS behandlet inline via PostCSS (konfigurert inne i `webpack.config.js`; det finnes ingen separat `postcss.config.js`)
* **Babel** — ES6+-transpilering med `@babel/preset-env` og `core-js@3`-polyfills (`useBuiltIns: "usage"`)
* **jQuery auto-provision** — `autoProvidejQuery()` gjør `$` og `jQuery` globalt tilgjengelig uten eksplisitte importer, til støtte for eldre kode
* **Source maps** — Aktivert kun i utvikling
* **Single runtime chunk** — Delt runtime for alle inngangspunkter
* **Filesystem cache** — Webpacks vedvarende filsystembuffer er aktivert for å gjøre inkrementelle ombygg raskere
* **Chunk namespacing** — `output.uniqueName` og `output.chunkLoadingGlobal` er satt til `"chamilo"` / `"webpackChunkChamilo"` for å unngå kollisjoner ved innlasting av chunks når flere Webpack-bunter sameksisterer på en side

## Funksjoner kun for produksjon

* **Versioning** — Innholdshash-suffikser på alle utdatafilnavn (`enableVersioning()`)
* **Subresource Integrity** — `integrity`-attributter på `<script>`- og `<link>`-tagger (`enableIntegrityHashes()`)
* **Output cleanup** — `public/build/` tømmes før hvert produksjonsbygg

### Kopier av ressurser uten hash (`CopyUnhashedAssetsPlugin`)

Noen eldre PHP-sider refererer til ressurser med et fast filnavn og kan ikke bruke Webpack-manifestet. En egendefinert `CopyUnhashedAssetsPlugin` (definert nederst i `webpack.config.js`) kopierer visse hashede produksjonsfiler til en ekstra sti uten hash etter hvert bygg:

| Hashed file | Unhashed copy |
|-------------|--------------|
| `legacy_document.[hash].js` | `legacy_document.js` |
| `legacy_exercise.[hash].js` | `legacy_exercise.js` |
| `legacy_framereadyloader.[hash].js` / `.css` | `legacy_framereadyloader.js` / `.css` |
| `css/document.[hash].css` | `css/document.css` |
| `css/editor_content.[hash].css` | `css/editor_content.css` |
| `glossary_auto.[hash].js` | `glossary_auto.js` |

## Kopierte bibliotekressurser

`copyFiles()` kopierer en rekke npm-pakker direkte inn i `public/build/libs/` uten å bunte dem, for bruk via `<script>`- / `<link>`-tagger i eldre maler:

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

## Byggekommandoer

```bash
# Development build
yarn encore dev

# Development build with file watching
yarn encore dev --watch

# Production build (minified, versioned, integrity hashes)
yarn encore production
```

## Tailwind-konfigurasjon

Tailwind er konfigurert i `tailwind.config.js`. Viktige punkter:

* **`important: true`** — Alle genererte utilities inkluderer `!important`, slik at de kan overstyre PrimeVue-komponentstiler uten ekstra spesifisitetstriks
* **Innholdsstier** — Tailwind skanner `assets/**/*.{js,vue}`, `public/main/**/*.{php,twig,tpl}`, `public/plugin/**/*.{php,twig,tpl}` og `src/CoreBundle/Resources/views/**/*.html.twig` for klassebruk
* **CSS-variabel-fargesystem** — Hver fargetoken (primary, secondary, tertiary, success, info, warning, danger) støttes av en CSS custom property (f.eks. `--color-primary-base`) definert per tema i `var/themes/[theme-name]/colors.css`. Verdiene er mellomromsseparerte RGB-kanaltripletter, som muliggjør Tailwinds opacity-utilities (`bg-primary/50`)
* **Tilpasset skriftstørrelsesskala** — `body-1`, `body-2`, `caption`, `tiny` størrelse/linjehøyde-par legges til via `theme.extend.fontSize`
* **Plugins** — `@tailwindcss/forms` og `@tailwindcss/typography` er aktivert

PostCSS (Tailwind + Autoprefixer) er konfigurert inline inne i `webpack.config.js` via `enablePostCssLoader()` — det finnes ingen frittstående `postcss.config.js`-fil.