# Build System

Chamilo bruger **Webpack 5** via **Symfony Webpack Encore** til at bygge frontend-assets. Den fulde build-konfiguration ligger i `webpack.config.js` i projektets rod.

Output skrives til `public/build/` og serveres under den offentlige sti `/build`.

## Entry Points

### JavaScript

| Entry | Source | Purpose |
|-------|--------|---------|
| `vue` | `assets/vue/main.js` | Hovedapplikation i Vue 3 |
| `vue_installer` | `assets/vue/main_installer.js` | Installationsguide |
| `legacy_app` | `assets/js/legacy/app.js` | Ældre JavaScript |
| `legacy_exercise` | `assets/js/legacy/exercise.js` | Øvelsesafspiller |
| `legacy_lp` | `assets/js/legacy/lp.js` | Afspiller til læringsstier |
| `legacy_document` | `assets/js/legacy/document.js` | Dokumentviser |
| `legacy_free-jqgrid` | `assets/js/legacy/free-jqgrid.js` | Ældre gitter-widget |
| `legacy_framereadyloader` | `assets/js/legacy/frameReadyLoader.js` | Frame-ready-indlæser til ældre iframes |
| `translatehtml` | `assets/js/translatehtml.js` | Hjælpefunktion til HTML-oversættelse |
| `glossary_auto` | `assets/js/glossary-auto.js` | Automatisk fremhævning af glossartermer |

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

## Build Features

* **Vue 3 SFC** — `.vue` single file components kompileres af `vue-loader`; runtime-compileren er deaktiveret (`runtimeCompilerBuild: false`), så alle skabeloner skal være forudkompilerede
* **TypeScript** — Tilstand med kun transpilering (`transpileOnly: true`) for hurtige builds, ingen typekontrol under build
* **Sass/SCSS** — Fuld SCSS-understøttelse via `sass-loader`
* **Tailwind CSS** — Utility-first CSS behandles inline via PostCSS (konfigureret inde i `webpack.config.js`; der findes ingen separat `postcss.config.js`)
* **Babel** — ES6+-transpilering med `@babel/preset-env` og `core-js@3`-polyfills (`useBuiltIns: "usage"`)
* **jQuery auto-provision** — `autoProvidejQuery()` gør `$` og `jQuery` globalt tilgængelige uden eksplicitte imports og understøtter ældre kode
* **Source maps** — Aktiveret kun i udvikling
* **Single runtime chunk** — Delt runtime for alle entries
* **Filesystem cache** — Webpack's persistente filsystemcache er aktiveret for at gøre inkrementelle genbuilds hurtigere
* **Chunk namespacing** — `output.uniqueName` og `output.chunkLoadingGlobal` er sat til `"chamilo"` / `"webpackChunkChamilo"` for at undgå kollisioner ved chunk-indlæsning, når flere Webpack-bundles sameksisterer på en side

## Production-Only Features

* **Versioning** — Suffikser med indholdshash på alle outputfilnavne (`enableVersioning()`)
* **Subresource Integrity** — `integrity`-attributter på `<script>`- og `<link>`-tags (`enableIntegrityHashes()`)
* **Output cleanup** — `public/build/` tømmes før hvert produktionsbuild

### Unhashed asset copies (`CopyUnhashedAssetsPlugin`)

Nogle ældre PHP-sider refererer til assets med et fast filnavn og kan ikke bruge Webpack-manifestet. En brugerdefineret `CopyUnhashedAssetsPlugin` (defineret nederst i `webpack.config.js`) kopierer visse hashed produktionsfiler til en ekstra unhashed sti efter hvert build:

| Hashed file | Unhashed copy |
|-------------|--------------|
| `legacy_document.[hash].js` | `legacy_document.js` |
| `legacy_exercise.[hash].js` | `legacy_exercise.js` |
| `legacy_framereadyloader.[hash].js` / `.css` | `legacy_framereadyloader.js` / `.css` |
| `css/document.[hash].css` | `css/document.css` |
| `css/editor_content.[hash].css` | `css/editor_content.css` |
| `glossary_auto.[hash].js` | `glossary_auto.js` |

## Copied Library Assets

`copyFiles()` kopierer en række npm-pakker direkte ind i `public/build/libs/` uden at bundle dem, til brug via `<script>`- / `<link>`-tags i ældre skabeloner:

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

## Build Commands

```bash
# Development build
yarn encore dev

# Development build with file watching
yarn encore dev --watch

# Production build (minified, versioned, integrity hashes)
yarn encore production
```

## Tailwind-konfiguration

Tailwind konfigureres i `tailwind.config.js`. Vigtige punkter:

* **`important: true`** — Alle genererede utilities inkluderer `!important`, så de kan tilsidesætte PrimeVue-komponentstile uden ekstra specificitetstricks
* **Content-stier** — Tailwind scanner `assets/**/*.{js,vue}`, `public/main/**/*.{php,twig,tpl}`, `public/plugin/**/*.{php,twig,tpl}` og `src/CoreBundle/Resources/views/**/*.html.twig` for klassebrug
* **CSS-variabel-farvesystem** — Hver farvetoken (primary, secondary, tertiary, success, info, warning, danger) understøttes af en CSS custom property (f.eks. `--color-primary-base`) defineret pr. tema i `var/themes/[theme-name]/colors.css`. Værdierne er mellemrumsseparerede RGB-kanaltripletter, hvilket muliggør Tailwinds opacity-utilities (`bg-primary/50`)
* **Tilpasset skriftstørrelsesskala** — `body-1`, `body-2`, `caption`, `tiny` størrelse/linjehøjde-par tilføjes via `theme.extend.fontSize`
* **Plugins** — `@tailwindcss/forms` og `@tailwindcss/typography` er aktiveret

PostCSS (Tailwind + Autoprefixer) konfigureres inline inde i `webpack.config.js` via `enablePostCssLoader()` — der findes ingen selvstændig `postcss.config.js`-fil.