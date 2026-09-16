# Πρότυπα Twig

Το Chamilo χρησιμοποιεί το Twig για σελίδες που αποδίδονται από τον διακομιστή. Τα πρότυπα βρίσκονται στο `src/CoreBundle/Resources/views/` και αναφέρονται με το πρόθεμα χώρου ονομάτων `@ChamiloCore/` (π.χ. `@ChamiloCore/Layout/base-layout.html.twig`).

Δεν υπάρχει κατάλογος `templates/` υψηλού επιπέδου — όλα τα πρότυπα Twig βρίσκονται κάτω από το `src/CoreBundle/Resources/views/`.

## Πώς Συνυπάρχουν το Twig και το Vue

Οι περισσότερες σελίδες ακολουθούν αυτή τη ροή:

1. Ένας ελεγκτής Symfony αποδίδει ένα πρότυπο Twig που επεκτείνει ένα layout.
2. Το layout περιλαμβάνει το `vue_setup.html.twig`, το οποίο παράγει `<div id="app">` και εγχέει μεταβλητές παγκόσμιου εύρους εκτέλεσης (`window.user`, `window.breadcrumb` κ.λπ.) μέσω του `vue_js_setup.html.twig`.
3. Το Vue προσαρτάται στο `#app` και χειρίζεται όλη την απόδοση UI μέσα σε αυτό το στοιχείο.
4. Η εφαρμογή Vue επικοινωνεί με τον backend μέσω του REST API.

Για παλιές σελίδες που δεν έχουν ακόμη μεταφερθεί στο Vue, το Symfony αποδίδει το πλήρες HTML της σελίδας μέσω Twig και το περιεχόμενο τοποθετείται μέσα στο `#sectionMainContent`. Το Vue εξακολουθεί να προσαρτάται (παρέχοντας το πλαίσιο sidebar και topbar), αλλά η κύρια περιοχή περιεχομένου είναι HTML που αποδίδεται από τον διακομιστή.

## Πρότυπα Layout

Όλα τα layouts επεκτείνουν το `@ChamiloCore/Layout/base-layout.html.twig`, το οποίο παρέχει τη δομή `<html>`, `<head>` και `<body>`. Διαθέσιμες παραλλαγές layout:

| Πρότυπο | Σκοπός |
|---------|--------|
| `Layout/base-layout.html.twig` | Ριζικό πρότυπο — κέλυφος `<html>`, εισάγει Macros, παράγει `<head>` και `<body>` |
| `Layout/layout.html.twig` | Τυπικό πλήρες layout με sidebar, topbar και περιοχή περιεχομένου |
| `Layout/layout_one_col.html.twig` | Layout μίας στήλης (χωρίς sidebar) |
| `Layout/layout_two_col.html.twig` | Layout δύο στηλών |
| `Layout/layout_content.html.twig` | Περιτύλιξη μόνο περιεχομένου |
| `Layout/layout_empty.html.twig` | Άδειο layout με ελάχιστο chrome |
| `Layout/no_layout.html.twig` | Χωρίς header/footer· το περιεχόμενο πηγαίνει απευθείας μέσα στο `<body>` |
| `Layout/no_layout_scorm.html.twig` | Γυμνό layout για πλαίσια περιεχομένου SCORM |
| `Layout/blank.html.twig` | Εντελώς κενή σελίδα |
| `Layout/skill_layout.html.twig` | Layout για τη σελίδα τροχού δεξιοτήτων |

## Βασικά Partials

| Πρότυπο | Σκοπός |
|---------|--------|
| `Layout/head.html.twig` | Περιεχόμενο `<head>`: meta tags, όλες οι καταχωρήσεις CSS Encore, `colors.css` θέματος, παλιές καταχωρήσεις JS, OpenGraph/Twitter tags |
| `Layout/foot.html.twig` | Τέλος body: σημείο εισόδου Vue JS, έγχυση `tracking.footer_extra_content` |
| `Layout/vue_setup.html.twig` | Παράγει `<div id="app">` και περιλαμβάνει `vue_js_setup.html.twig` |
| `Layout/vue_js_setup.html.twig` | Εγχέει `window.user`, `window.breadcrumb`, `window.languages` κ.λπ. |
| `Layout/cookie_banner.html.twig` | Banner συναίνεσης GDPR για cookies |
| `Layout/footer.html.twig` | Μπάρα υποσέλιδου σελίδας |
| `Layout/course_navigation.html.twig` | Breadcrumb πλοήγησης εργαλείων μαθήματος |

## Ενσωμάτωση Webpack Encore

Το `head.html.twig` φορτώνει CSS για όλες τις καταχωρήσεις· το `foot.html.twig` φορτώνει το bundle Vue JS:

```twig
{# In head.html.twig — CSS entries #}
{{ encore_entry_link_tags('legacy_free-jqgrid') }}
{{ encore_entry_link_tags('legacy_app') }}
{{ encore_entry_link_tags('legacy_lp') }}
{{ encore_entry_link_tags('legacy_exercise') }}
{{ encore_entry_link_tags('legacy_document') }}
{{ encore_entry_link_tags('vue') }}
{{ encore_entry_link_tags('app') }}
{{ theme_asset_link_tag('colors.css') }}

{# In foot.html.twig — Vue JS (loaded at end of body) #}
{{ encore_entry_script_tags('vue') }}
```

Οι παλιές καταχωρήσεις JS (`legacy_app`, `legacy_lp` κ.λπ.) φορτώνονται στο `<head>` επειδή οι παλιές σελίδες PHP εξαρτώνται από την διαθεσιμότητά τους πριν ετοιμαστεί το DOM.

## Macros

Επαναχρησιμοποιήσιμα macros Twig βρίσκονται στο `Macros/` και εισάγονται στην κορυφή του `base-layout.html.twig`:

| Αρχείο Macro | Παρέχει |
|--------------|---------|
| `Macros/box.html.twig` | Βοηθήματα κουτιού περιεχομένου |
| `Macros/actions.html.twig` | Απόδοση κουμπιών ενέργειας |
| `Macros/buttons.html.twig` | Βοηθήματα HTML κουμπιών |
| `Macros/headers.html.twig` | Βοηθήματα κεφαλίδας σελίδας |
| `Macros/image.html.twig` | Βοηθήματα απόδοσης εικόνας |
| `Macros/modals.html.twig` | Βοηθήματα διαλόγου modal |

Χρήση μέσα σε οποιοδήποτε πρότυπο που επεκτείνει το `base-layout.html.twig`:

```twig
{{ macro_buttons.submit('Save') }}
{{ macro_box.content_box('Title', content) }}
```

## Προσαρμοσμένα Πρότυπα Vue

Το Chamilo υποστηρίζει παρακάμψεις σελίδων Vue ανά εγκατάσταση μέσω της μεταβλητής περιβάλλοντος `APP_CUSTOM_VUE_TEMPLATE`. Όταν ορίζεται, η κατασκευή Webpack εκθέτει μια σταθερά `ENV_CUSTOM_VUE_TEMPLATE` μέσω `DefinePlugin`, και ο router Vue εισάγει προαιρετικά συστατικά παρακάμψεων από το `var/vue_templates/`.

Τρέχουσες τοποθεσίες παρακάμψεων:

```
var/vue_templates/
├── pages/
│   └── AppIndex.vue   # Replaces the default / entry page
└── components/
    ├── layout/
    └── SidebarLogin.vue
```

Μόνο τα αρχεία που υπάρχουν στο `var/vue_templates/` παρακάμπτονται — όλες οι άλλες σελίδες και συστατικά χρησιμοποιούν τα αρχικά core.

---
## Αναφορά Λειτουργιών Twig

Κύριες λειτουργίες Twig διαθέσιμες σε όλους τους πίνακες (καταχωρημένες στο `ChamiloExtension`):

| Λειτουργία | Σκοπός |
|------------|--------|
| `chamilo_settings_get('ns.key')` | Ανάγνωση ρύθμισης πλατφόρμας |
| `chamilo_settings_has('ns.key')` | Έλεγχος ύπαρξης ρύθμισης |
| `chamilo_settings_all()` | Λήψη όλων των ρυθμίσεων ως πίνακας |
| `theme_asset('path')` | URL σε πόρο του ενεργού θέματος |
| `theme_asset_link_tag('path')` | Ετικέτα `<link>` για αρχείο CSS θέματος |
| `theme_asset_script_tag('path')` | Ετικέτα `<script>` για αρχείο JS θέματος |
| `theme_asset_base64('path')` | Base64 data URI για πόρο θέματος |
| `theme_logo('header'\|'email')` | URL στην προτιμώμενη εικόνα λογότυπου |
| `is_allowed_to_edit(...)` | Βοηθητική λειτουργία ελέγχου άδειας |