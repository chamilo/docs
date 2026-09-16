# Σύστημα Build

Το Chamilo χρησιμοποιεί **Webpack 5** μέσω του **Symfony Webpack Encore** για τη δημιουργία των frontend assets. Η πλήρης διαμόρφωση του build βρίσκεται στο `webpack.config.js` στη ρίζα του έργου.

Η έξοδος γράφεται στο `public/build/` και εξυπηρετείται κάτω από τη δημόσια διαδρομή `/build`.

## Σημεία εισόδου

### JavaScript

| Entry | Source | Purpose |
|-------|--------|---------|
| `vue` | `assets/vue/main.js` | Κύρια εφαρμογή Vue 3 |
| `vue_installer` | `assets/vue/main_installer.js` | Οδηγός εγκατάστασης |
| `legacy_app` | `assets/js/legacy/app.js` | Κληρονομημένο JavaScript |
| `legacy_exercise` | `assets/js/legacy/exercise.js` | Αναπαραγωγέας ασκήσεων |
| `legacy_lp` | `assets/js/legacy/lp.js` | Αναπαραγωγέας μαθησιακής διαδρομής |
| `legacy_document` | `assets/js/legacy/document.js` | Προβολέας εγγράφων |
| `legacy_free-jqgrid` | `assets/js/legacy/free-jqgrid.js` | Κληρονομημένο widget πλέγματος |
| `legacy_framereadyloader` | `assets/js/legacy/frameReadyLoader.js` | Φορτωτής frame-ready για κληρονομημένα iframes |
| `translatehtml` | `assets/js/translatehtml.js` | Βοηθητικό εργαλείο μετάφρασης HTML |
| `glossary_auto` | `assets/js/glossary-auto.js` | Αυτόματη επισήμανση όρων γλωσσαρίου |

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

## Χαρακτηριστικά του Build

* **Vue 3 SFC** — τα single file components `.vue` μεταγλωττίζονται από το `vue-loader`· ο μεταγλωττιστής χρόνου εκτέλεσης είναι απενεργοποιημένος (`runtimeCompilerBuild: false`), επομένως όλα τα templates πρέπει να είναι προμεταγλωττισμένα
* **TypeScript** — λειτουργία μόνο μεταγλώττισης (`transpileOnly: true`) για γρήγορα builds, χωρίς έλεγχο τύπων κατά το build
* **Sass/SCSS** — πλήρης υποστήριξη SCSS μέσω `sass-loader`
* **Tailwind CSS** — CSS με προτεραιότητα στα utilities, επεξεργασμένο ενσωματωμένα μέσω PostCSS (διαμορφωμένο μέσα στο `webpack.config.js`· δεν υπάρχει ξεχωριστό `postcss.config.js`)
* **Babel** — μεταγλώττιση ES6+ με `@babel/preset-env` και polyfills `core-js@3` (`useBuiltIns: "usage"`)
* **Αυτόματη παροχή jQuery** — το `autoProvidejQuery()` καθιστά τα `$` και `jQuery` διαθέσιμα καθολικά χωρίς ρητά imports, υποστηρίζοντας κληρονομημένο κώδικα
* **Source maps** — ενεργοποιημένα μόνο στην ανάπτυξη
* **Ενιαίο runtime chunk** — κοινό runtime για όλα τα entries
* **Cache συστήματος αρχείων** — η επίμονη cache συστήματος αρχείων του Webpack είναι ενεργοποιημένη για επιτάχυνση των σταδιακών επανακατασκευών
* **Ονοματοδοσία chunks** — τα `output.uniqueName` και `output.chunkLoadingGlobal` ορίζονται σε `"chamilo"` / `"webpackChunkChamilo"` ώστε να αποφεύγονται συγκρούσεις φόρτωσης chunks όταν συνυπάρχουν πολλά Webpack bundles σε μία σελίδα

## Χαρακτηριστικά μόνο παραγωγής

* **Έκδοση (versioning)** — επιθήματα content-hash σε όλα τα ονόματα αρχείων εξόδου (`enableVersioning()`)
* **Subresource Integrity** — χαρακτηριστικά `integrity` στις ετικέτες `<script>` και `<link>` (`enableIntegrityHashes()`)
* **Καθαρισμός εξόδου** — ο κατάλογος `public/build/` εκκαθαρίζεται πριν από κάθε production build

### Αντίγραφα assets χωρίς hash (`CopyUnhashedAssetsPlugin`)

Ορισμένες κληρονομημένες σελίδες PHP αναφέρονται σε assets με σταθερό όνομα αρχείου και δεν μπορούν να χρησιμοποιήσουν το Webpack manifest. Ένα προσαρμοσμένο `CopyUnhashedAssetsPlugin` (ορισμένο στο κάτω μέρος του `webpack.config.js`) αντιγράφει ορισμένα hashed αρχεία παραγωγής σε μια επιπλέον διαδρομή χωρίς hash μετά από κάθε build:

| Hashed file | Unhashed copy |
|-------------|--------------|
| `legacy_document.[hash].js` | `legacy_document.js` |
| `legacy_exercise.[hash].js` | `legacy_exercise.js` |
| `legacy_framereadyloader.[hash].js` / `.css` | `legacy_framereadyloader.js` / `.css` |
| `css/document.[hash].css` | `css/document.css` |
| `css/editor_content.[hash].css` | `css/editor_content.css` |
| `glossary_auto.[hash].js` | `glossary_auto.js` |

## Αντιγραμμένα assets βιβλιοθηκών

Το `copyFiles()` αντιγράφει έναν αριθμό πακέτων npm απευθείας στο `public/build/libs/` χωρίς να τα ενσωματώνει σε bundle, για χρήση μέσω ετικετών `<script>` / `<link>` σε κληρονομημένα templates:

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

## Εντολές Build

```bash
# Development build
yarn encore dev

# Development build with file watching
yarn encore dev --watch

# Production build (minified, versioned, integrity hashes)
yarn encore production
```

## Ρύθμιση του Tailwind

Το Tailwind ρυθμίζεται στο `tailwind.config.js`. Κύρια σημεία:

* **`important: true`** — Όλα τα παραγόμενα utilities περιλαμβάνουν `!important`, επιτρέποντάς τους να υπερκαλύπτουν τα στυλ των στοιχείων PrimeVue χωρίς επιπλέον τεχνάσματα ειδικότητας
* **Διαδρομές περιεχομένου** — Το Tailwind σαρώνει τα `assets/**/*.{js,vue}`, `public/main/**/*.{php,twig,tpl}`, `public/plugin/**/*.{php,twig,tpl}` και `src/CoreBundle/Resources/views/**/*.html.twig` για χρήση κλάσεων
* **Σύστημα χρωμάτων με CSS-variable** — Κάθε διακριτικό χρώματος (primary, secondary, tertiary, success, info, warning, danger) υποστηρίζεται από μια προσαρμοσμένη ιδιότητα CSS (π.χ. `--color-primary-base`) που ορίζεται ανά θέμα στο `var/themes/[theme-name]/colors.css`. Οι τιμές είναι τριπλέτες καναλιών RGB διαχωρισμένες με κενά, επιτρέποντας τα utilities αδιαφάνειας του Tailwind (`bg-primary/50`)
* **Προσαρμοσμένη κλίμακα γραμματοσειράς** — Τα ζεύγη μεγέθους/ύψους γραμμής `body-1`, `body-2`, `caption`, `tiny` προστίθενται μέσω του `theme.extend.fontSize`
* **Πρόσθετα** — Ενεργοποιούνται τα `@tailwindcss/forms` και `@tailwindcss/typography`

Το PostCSS (Tailwind + Autoprefixer) ρυθμίζεται ενσωματωμένα μέσα στο `webpack.config.js` μέσω του `enablePostCssLoader()` — δεν υπάρχει αυτόνομο αρχείο `postcss.config.js`.