# Σύστημα Μεταγλώττισης

Το Chamilo χρησιμοποιεί το **Webpack 5** μέσω του **Symfony Webpack Encore** για τη μεταγλώττιση των frontend assets. Η πλήρης διαμόρφωση μεταγλώττισης βρίσκεται στο `webpack.config.js` στη ρίζα του έργου.

Η έξοδος γράφεται στο `public/build/`, και παρέχεται μέσω του δημόσιου μονοπατιού `/build`.

## Σημεία Εισόδου

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

## Χαρακτηριστικά Μεταγλώττισης

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

## Χαρακτηριστικά Μόνο για Παραγωγή

* **Versioning** — Content-hash suffixes on all output filenames (`enableVersioning()`)
* **Subresource Integrity** — `integrity` attributes on `<script>` and `<link>` tags (`enableIntegrityHashes()`)
* **Output cleanup** — `public/build/` is wiped before each production build

### Αντιγραφές Assets Χωρίς Hash (`CopyUnhashedAssetsPlugin`)

Ορισμένες legacy PHP σελίδες αναφέρονται σε assets με σταθερό όνομα αρχείου και δεν μπορούν να χρησιμοποιήσουν το Webpack manifest. Ένα προσαρμοσμένο `CopyUnhashedAssetsPlugin` (ορίζεται στο κάτω μέρος του `webpack.config.js`) αντιγράφει ορισμένα hashed αρχεία παραγωγής σε επιπλέον μονοπάτι χωρίς hash μετά από κάθε μεταγλώττιση:

| Hashed file | Unhashed copy |
|-------------|--------------|
| `legacy_document.[hash].js` | `legacy_document.js` |
| `legacy_exercise.[hash].js` | `legacy_exercise.js` |
| `legacy_framereadyloader.[hash].js` / `.css` | `legacy_framereadyloader.js` / `.css` |
| `css/document.[hash].css` | `css/document.css` |
| `css/editor_content.[hash].css` | `css/editor_content.css` |
| `glossary_auto.[hash].js` | `glossary_auto.js` |

## Αντιγραφόμενα Library Assets

Το `copyFiles()` αντιγράφει διάφορα npm πακέτα απευθείας στο `public/build/libs/` χωρίς να τα ενσωματώσει, για χρήση μέσω ετικετών `<script>` / `<link>` σε legacy templates:

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

## Εντολές Μεταγλώττισης

```bash
# Development build
yarn encore dev

# Development build with file watching
yarn encore dev --watch

# Production build (minified, versioned, integrity hashes)
yarn encore production
```

---
## Ρύθμιση Tailwind

Το Tailwind ρυθμίζεται στο `tailwind.config.js`. Βασικά σημεία:

* **`important: true`** — Όλες οι γενόμενες βοηθητικές εντολές περιλαμβάνουν `!important`, επιτρέποντάς τους να παρακάμπτουν τα στυλ των στοιχείων PrimeVue χωρίς επιπλέον κόλπα ειδικότητας
* **Μονοπάτια περιεχομένου** — Το Tailwind σαρώνει τα `assets/**/*.{js,vue}`, `public/main/**/*.{php,twig,tpl}`, `public/plugin/**/*.{php,twig,tpl}` και `src/CoreBundle/Resources/views/**/*.html.twig` για χρήση κλάσεων
* **Σύστημα χρωμάτων CSS-μεταβλητών** — Κάθε διακριτικό χρώματος (primary, secondary, tertiary, success, info, warning, danger) υποστηρίζεται από ιδιότητα CSS προσαρμοσμένης χρήσης (π.χ. `--color-primary-base`) που ορίζεται ανά θέμα στο `var/themes/[theme-name]/colors.css`. Οι τιμές είναι τριάδες καναλιών RGB χωρισμένες με κενά, επιτρέποντας βοηθητικές εντολές αδιαφανούς του Tailwind (`bg-primary/50`)
* **Προσαρμοσμένη κλίμακα γραμματοσειράς** — Τα ζεύγη μεγέθους/ύψους γραμμής `body-1`, `body-2`, `caption`, `tiny` προστίθενται μέσω `theme.extend.fontSize`
* **Πρόσθετα** — Ενεργοποιημένα τα `@tailwindcss/forms` και `@tailwindcss/typography`

Το PostCSS (Tailwind + Autoprefixer) ρυθμίζεται εν σειρά μέσα στο `webpack.config.js` μέσω `enablePostCssLoader()` — δεν υπάρχει ξεχωριστό αρχείο `postcss.config.js`.