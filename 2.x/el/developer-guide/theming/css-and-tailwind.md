# CSS και Tailwind

## Αρχιτεκτονική Φύλλων Στυλ

Τα στυλ του Chamilo είναι ταξινομημένα σε αυτήν τη σειρά:

1. **Tailwind CSS** — Κλάσεις χρησιμότητας για διάταξη, απόσταση και χρώμα. Ρυθμισμένο με `important: true` ώστε οι χρησιμότητες να παρακάμπτουν τις προεπιλεγμένες ρυθμίσεις των στοιχείων PrimeVue.
2. **SCSS** — Προσαρμοσμένα στυλ στο `assets/css/scss/`, οργανωμένα σε επίπεδα atoms, molecules, organisms, layout και components.
3. **Στυλ στοιχείων PrimeVue** — Παρακώλυση ανά στοιχείο στο `assets/css/scss/atoms/`.
4. **Theme `colors.css`** — Ιδιότητες CSS προσαρμοσμένες για το ενεργό χρωματικό θέμα, φορτώνονται τελευταίες ώστε να εφαρμόζονται πάνω από όλα τα υπόλοιπα.

Το PrimeFlex αναφέρεται στο `package.json` αλλά δεν εισάγεται — το Tailwind καλύπτει όλες τις ανάγκες χρησιμοτήτων.

## Κύριο Φύλλο Στυλ (`assets/css/app.scss`)

Το `app.scss` είναι το σημείο εισόδου Webpack για το κύριο φύλλο στυλ. Εισάγει:

1. `_tailwind.scss` — Οδηγίες `@tailwind base / components / utilities` του Tailwind
2. `scss/index.scss` — Barrel αρχείο που εισάγει όλα τα μερικά SCSS
3. CSS τρίτων (`cropper`, `select2`, `daterangepicker`, TinyMCE skin, `fancybox`, `timepicker`, `qtip`)
4. `editor_content.scss` — Στυλ που εγχέονται στο σώμα του iframe του TinyMCE editor

## Ρύθμιση Tailwind (`tailwind.config.js`)

Κύριες ρυθμίσεις:

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

Οι διαδρομές περιεχομένου σαρώνουν στοιχεία Vue, παλιές σελίδες PHP, αρχεία πρόσθετων και πρότυπα Twig ώστε οι μη χρησιμοποιούμενες χρησιμότητες να αφαιρούνται στις παραγωγικές κατασκευές.

### Σύστημα Χρωμάτων CSS-Variable

Όλα τα χρωματικά tokens υποστηρίζονται από ιδιότητες CSS προσαρμοσμένες αντί για hardcoded τιμές:

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

Ο βοηθός `colorWithOpacity` παράγει `rgb(var(--color-primary-base) / <opacity>)`, ενεργοποιώντας παραλλαγές αδιαφανούς όπως `bg-primary/50`. Οι πραγματικές τιμές RGB ορίζονται ανά θέμα στο `var/themes/{slug}/colors.css` και φορτώνονται κατά την εκτέλεση — βλ. [Color Themes](color-themes.md).

### Πρόσθετα Tailwind

Ενεργοποιημένα τα `@tailwindcss/forms` και `@tailwindcss/typography`.

### Προσαρμοσμένη Κλίμακα Τύπων

Προστίθενται τέσσερα επιπλέον ζεύγη μεγέθους γραμματοσειράς/ύψους γραμμής μέσω `theme.extend.fontSize`:

| Κλάση | Μέγεθος / Ύψος γραμμής |
|-------|------------------------|
| `text-body-1` | 16px / 24px |
| `text-body-2` | 14px / 16px |
| `text-caption` | 13px / 16px |
| `text-tiny` | 11px / 16px |

## PostCSS

Το PostCSS (Tailwind + Autoprefixer) ρυθμίζεται εν σειρά μέσα στο `webpack.config.js` μέσω `enablePostCssLoader()`. Δεν υπάρχει ανεξάρτητο αρχείο `postcss.config.js`.

## Ειδικευμένα Φύλλα Στυλ

| Αρχείο | Σημείο εισόδου Webpack | Σκοπός |
|--------|------------------------|--------|
| `assets/css/app.scss` | `app` | Κύρια στυλ εφαρμογής |
| `assets/css/chat.scss` | `css/chat` | Στυλ διεπαφής συνομιλίας |
| `assets/css/document.scss` | `css/document` | Στυλ προβολής εγγράφων |
| `assets/css/editor.scss` | `css/editor` | Στυλ κελύφους TinyMCE editor |
| `assets/css/editor_content.scss` | `css/editor_content` | Στυλ εγχυμένα στο σώμα του iframe του editor |
| `assets/css/markdown.scss` | `css/markdown` | Περιεχόμενο Markdown-rendered |
| `assets/css/print.scss` | `css/print` | Φύλλο στυλ εκτύπωσης |
| `assets/css/responsive.scss` | `css/responsive` | Παρακώλυση responsive |
| `assets/css/scorm.scss` | `css/scorm` | Στυλ αναπαραγωγού SCORM |

## Δομή Μодуλων SCSS (`assets/css/scss/`)

```
scss/
├── index.scss        # Barrel — imports everything below
├── abstracts/        # Mixins and shared functions
├── settings/         # Design tokens (typography, component base)
├── atoms/            # Per-component PrimeVue overrides
├── molecules/        # Small composed patterns (chips, toolbars, empty states)
├── organisms/        # Larger areas (sidebar, datatable, dialog, LP panel)
├── layout/           # Page skeleton (topbar, main container, breadcrumb)
├── components/       # Feature-specific styles (blog, exercise, social, skill, …)
└── libs/             # Third-party overrides (FullCalendar, MediaElement.js)
```

## Χρήση Tailwind σε Στοιχεία Vue

```vue
<template>
  <div class="flex gap-2 p-4">
    <BaseButton class="bg-primary text-white" label="Save" />
  </div>
</template>
```

Επειδή ορίζεται `important: true` στο `tailwind.config.js`, οι χρησιμότητες Tailwind παρακάμπτουν αξιόπιστα τα στυλ στοιχείων PrimeVue χωρίς να απαιτείται επιπλέον ειδικότητα.