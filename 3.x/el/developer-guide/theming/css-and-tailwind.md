# CSS και Tailwind

## Αρχιτεκτονική φύλλων στυλ

Τα στυλ του Chamilo εφαρμόζονται σε αυτή τη σειρά:

1. **Tailwind CSS** — Κλάσεις βοηθητικών εργαλείων για διάταξη, αποστάσεις και χρώμα. Ρυθμισμένο με `important: true` ώστε τα utilities να υπερισχύουν των προεπιλογών των στοιχείων PrimeVue.
2. **SCSS** — Προσαρμοσμένα στυλ στο `assets/css/scss/`, οργανωμένα σε επίπεδα atoms, molecules, organisms, layout και components.
3. **Στυλ στοιχείων PrimeVue** — Υπερισχύονται ανά στοιχείο μέσα στο `assets/css/scss/atoms/`.
4. **Θέμα `colors.css`** — Προσαρμοσμένες ιδιότητες CSS για το ενεργό χρωματικό θέμα, φορτώνονται τελευταίες ώστε να εφαρμόζονται με cascade πάνω από όλα τα υπόλοιπα.

Το PrimeFlex έχει αφαιρεθεί από το `package.json` — το Tailwind καλύπτει όλες τις ανάγκες σε utilities.

## Κύριο φύλλο στυλ (`assets/css/app.scss`)

Το `app.scss` είναι το σημείο εισόδου Webpack για το κύριο φύλλο στυλ. Εισάγει:

1. `_tailwind.scss` — Οδηγίες `@tailwind base / components / utilities` του Tailwind
2. `scss/index.scss` — Αρχείο barrel που εισάγει όλα τα μερικά αρχεία SCSS
3. CSS τρίτων (cropper, select2, daterangepicker, TinyMCE skin, fancybox, timepicker, qtip)
4. `editor_content.scss` — Στυλ που εγχέονται στο σώμα του iframe του επεξεργαστή TinyMCE

## Ρύθμιση Tailwind (`tailwind.config.js`)

Βασικές ρυθμίσεις:

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

Οι διαδρομές περιεχομένου σαρώνουν στοιχεία Vue, παλαιές σελίδες PHP, αρχεία πρόσθετων και πρότυπα Twig ώστε τα αχρησιμοποίητα utilities να αφαιρούνται στις εκδόσεις παραγωγής.

### Σύστημα χρωμάτων με μεταβλητές CSS

Όλα τα διακριτικά χρώματος βασίζονται σε προσαρμοσμένες ιδιότητες CSS αντί για σταθερές τιμές:

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

Ο βοηθός `colorWithOpacity` εκπέμπει `rgb(var(--color-primary-base) / <opacity>)`, επιτρέποντας παραλλαγές αδιαφάνειας όπως `bg-primary/50`. Οι πραγματικές τιμές RGB ορίζονται ανά θέμα στο `var/themes/{slug}/colors.css` και φορτώνονται κατά την εκτέλεση — βλ. [Χρωματικά θέματα](color-themes.md).

### Πρόσθετα Tailwind

Ενεργοποιούνται τα `@tailwindcss/forms` και `@tailwindcss/typography`.

### Προσαρμοσμένη κλίμακα τυπογραφίας

Προστίθενται τέσσερα επιπλέον ζεύγη μεγέθους γραμματοσειράς/ύψους γραμμής μέσω του `theme.extend.fontSize`:

| Κλάση | Μέγεθος / Ύψος γραμμής |
|-------|--------------------|
| `text-body-1` | 16px / 24px |
| `text-body-2` | 14px / 16px |
| `text-caption` | 13px / 16px |
| `text-tiny` | 11px / 16px |

## PostCSS

Το PostCSS (Tailwind + Autoprefixer) ρυθμίζεται ενσωματωμένα μέσα στο `webpack.config.js` μέσω `enablePostCssLoader()`. Δεν υπάρχει αυτόνομο αρχείο `postcss.config.js`.

## Εξειδικευμένα φύλλα στυλ

| Αρχείο | Σημείο εισόδου Webpack | Σκοπός |
|------|--------------|---------|
| `assets/css/app.scss` | `app` | Κύρια στυλ εφαρμογής |
| `assets/css/chat.scss` | `css/chat` | Στυλ διεπαφής συνομιλίας |
| `assets/css/document.scss` | `css/document` | Στυλ προβολέα εγγράφων |
| `assets/css/editor.scss` | `css/editor` | Στυλ κελύφους επεξεργαστή TinyMCE |
| `assets/css/editor_content.scss` | `css/editor_content` | Στυλ που εγχέονται στο σώμα του iframe του επεξεργαστή |
| `assets/css/markdown.scss` | `css/markdown` | Περιεχόμενο αποδομένο ως Markdown |
| `assets/css/print.scss` | `css/print` | Φύλλο στυλ εκτύπωσης |
| `assets/css/responsive.scss` | `css/responsive` | Υπερισχύσεις για αποκριτικότητα |
| `assets/css/scorm.scss` | `css/scorm` | Στυλ αναπαραγωγέα SCORM |

## Δομή μονάδων SCSS (`assets/css/scss/`)

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

## Χρήση Tailwind σε στοιχεία Vue

```vue
<template>
  <div class="flex gap-2 p-4">
    <BaseButton class="bg-primary text-white" label="Save" />
  </div>
</template>
```

Επειδή έχει οριστεί `important: true` στο `tailwind.config.js`, τα utilities του Tailwind υπερισχύουν αξιόπιστα των στυλ στοιχείων PrimeVue χωρίς να απαιτείται επιπλέον ειδικότητα.