# Build System

Chamilo uses **Webpack 5** via **Symfony Webpack Encore** for building frontend assets. The full build configuration is in `webpack.config.js` at the project root.

Output is written to `public/build/`, served under the `/build` public path.

## Entry Points

### JavaScript

| Entry | Source | Purpose |
|-------|--------|---------|
| `vue` | `assets/vue/main.js` | Main Vue 3 application |
| `vue_installer` | `assets/vue/main_installer.js` | Installation wizard |
| `legacy_app` | `assets/js/legacy/app.js` | Legacy JavaScript |
| `legacy_exercise` | `assets/js/legacy/exercise.js` | Exercise player |
| `legacy_lp` | `assets/js/legacy/lp.js` | Learning path player |
| `legacy_document` | `assets/js/legacy/document.js` | Document viewer |
| `legacy_free-jqgrid` | `assets/js/legacy/free-jqgrid.js` | Legacy grid widget |
| `legacy_framereadyloader` | `assets/js/legacy/frameReadyLoader.js` | Frame-ready loader for legacy iframes |
| `translatehtml` | `assets/js/translatehtml.js` | HTML translation helper |
| `glossary_auto` | `assets/js/glossary-auto.js` | Automatic glossary term highlighting |

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

* **Vue 3 SFC** — `.vue` single file components compiled by `vue-loader`; runtime compiler is disabled (`runtimeCompilerBuild: false`), so all templates must be pre-compiled
* **TypeScript** — Transpile-only mode (`transpileOnly: true`) for fast builds, no type-checking during build
* **Sass/SCSS** — Full SCSS support via `sass-loader`
* **Tailwind CSS** — Utility-first CSS processed inline via PostCSS (configured inside `webpack.config.js`; there is no separate `postcss.config.js`)
* **Babel** — ES6+ transpilation with `@babel/preset-env` and `core-js@3` polyfills (`useBuiltIns: "usage"`)
* **jQuery auto-provision** — `autoProvidejQuery()` makes `$` and `jQuery` available globally without explicit imports, supporting legacy code
* **Source maps** — Enabled in development only
* **Single runtime chunk** — Shared runtime for all entries
* **Filesystem cache** — Webpack's persistent filesystem cache is enabled to speed up incremental rebuilds
* **Chunk namespacing** — `output.uniqueName` and `output.chunkLoadingGlobal` are set to `"chamilo"` / `"webpackChunkChamilo"` to avoid chunk-loading collisions when multiple Webpack bundles coexist on a page

## Production-Only Features

* **Versioning** — Content-hash suffixes on all output filenames (`enableVersioning()`)
* **Subresource Integrity** — `integrity` attributes on `<script>` and `<link>` tags (`enableIntegrityHashes()`)
* **Output cleanup** — `public/build/` is wiped before each production build

### Unhashed asset copies (`CopyUnhashedAssetsPlugin`)

Some legacy PHP pages reference assets by a fixed filename and cannot use the Webpack manifest. A custom `CopyUnhashedAssetsPlugin` (defined at the bottom of `webpack.config.js`) copies certain hashed production files to an additional unhashed path after each build:

| Hashed file | Unhashed copy |
|-------------|--------------|
| `legacy_document.[hash].js` | `legacy_document.js` |
| `legacy_exercise.[hash].js` | `legacy_exercise.js` |
| `legacy_framereadyloader.[hash].js` / `.css` | `legacy_framereadyloader.js` / `.css` |
| `css/document.[hash].css` | `css/document.css` |
| `css/editor_content.[hash].css` | `css/editor_content.css` |
| `glossary_auto.[hash].js` | `glossary_auto.js` |

## Copied Library Assets

`copyFiles()` copies a number of npm packages directly into `public/build/libs/` without bundling them, for use via `<script>` / `<link>` tags in legacy templates:

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

## Tailwind Configuration

Tailwind is configured in `tailwind.config.js`. Key points:

* **`important: true`** — All generated utilities include `!important`, allowing them to override PrimeVue component styles without extra specificity tricks
* **Content paths** — Tailwind scans `assets/**/*.{js,vue}`, `public/main/**/*.{php,twig,tpl}`, `public/plugin/**/*.{php,twig,tpl}`, and `src/CoreBundle/Resources/views/**/*.html.twig` for class usage
* **CSS-variable color system** — Every color token (primary, secondary, tertiary, success, info, warning, danger) is backed by a CSS custom property (e.g. `--color-primary-base`) defined per theme in `var/themes/[theme-name]/colors.css`. Values are space-separated RGB channel triplets, enabling Tailwind opacity utilities (`bg-primary/50`)
* **Custom font scale** — `body-1`, `body-2`, `caption`, `tiny` size/line-height pairs are added via `theme.extend.fontSize`
* **Plugins** — `@tailwindcss/forms` and `@tailwindcss/typography` are enabled

PostCSS (Tailwind + Autoprefixer) is configured inline inside `webpack.config.js` via `enablePostCssLoader()` — there is no standalone `postcss.config.js` file.
