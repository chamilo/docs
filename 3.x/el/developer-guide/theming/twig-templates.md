# Πρότυπα Twig

Το Chamilo χρησιμοποιεί το Twig για σελίδες που αποδίδονται στον διακομιστή. Τα πρότυπα βρίσκονται στο `src/CoreBundle/Resources/views/` και αναφέρονται με το πρόθεμα χώρου ονομάτων `@ChamiloCore/` (π.χ. `@ChamiloCore/Layout/base-layout.html.twig`).

Δεν υπάρχει κατάλογος `templates/` στο ανώτερο επίπεδο — όλα τα πρότυπα Twig βρίσκονται κάτω από το `src/CoreBundle/Resources/views/`.

## Πώς συνυπάρχουν Twig και Vue

Οι περισσότερες σελίδες ακολουθούν αυτή τη ροή:

1. Ένας ελεγκτής Symfony αποδίδει ένα πρότυπο Twig που επεκτείνει μια διάταξη.
2. Η διάταξη περιλαμβάνει το `vue_setup.html.twig`, το οποίο εκπέμπει `<div id="app">` και εισάγει καθολικές μεταβλητές χρόνου εκτέλεσης (`window.user`, `window.breadcrumb`, κ.λπ.) μέσω του `vue_js_setup.html.twig`.
3. Το Vue προσαρτάται στο `#app` και χειρίζεται όλη την απόδοση του UI μέσα σε αυτό το στοιχείο.
4. Η εφαρμογή Vue επικοινωνεί με το backend μέσω του REST API.

Για παλαιές σελίδες που δεν έχουν ακόμη μεταφερθεί στο Vue, το Symfony αποδίδει ολόκληρο το HTML της σελίδας μέσω Twig και το περιεχόμενο τοποθετείται μέσα στο `#sectionMainContent`. Το Vue εξακολουθεί να προσαρτάται (παρέχοντας το κέλυφος της πλευρικής γραμμής και της επάνω γραμμής), αλλά η κύρια περιοχή περιεχομένου είναι HTML που αποδίδεται στον διακομιστή.

## Πρότυπα διάταξης

Όλες οι διατάξεις επεκτείνουν το `@ChamiloCore/Layout/base-layout.html.twig`, το οποίο παρέχει τη δομή `<html>`, `<head>` και `<body>`. Διαθέσιμες παραλλαγές διάταξης:

| Πρότυπο | Σκοπός |
|----------|---------|
| `Layout/base-layout.html.twig` | Ριζικό πρότυπο — κέλυφος `<html>`, εισάγει Macros, εκπέμπει `<head>` και `<body>` |
| `Layout/layout.html.twig` | Τυπική πλήρης διάταξη με πλευρική γραμμή, επάνω γραμμή και περιοχή περιεχομένου |
| `Layout/layout_one_col.html.twig` | Διάταξη μίας στήλης (χωρίς πλευρική γραμμή) |
| `Layout/layout_two_col.html.twig` | Διάταξη δύο στηλών |
| `Layout/layout_content.html.twig` | Περιτύλιγμα μόνο περιεχομένου |
| `Layout/layout_empty.html.twig` | Κενή διάταξη με ελάχιστο chrome |
| `Layout/no_layout.html.twig` | Χωρίς κεφαλίδα/υποσέλιδο· το περιεχόμενο πηγαίνει απευθείας μέσα στο `<body>` |
| `Layout/no_layout_scorm.html.twig` | Γυμνή διάταξη για πλαίσια περιεχομένου SCORM |
| `Layout/blank.html.twig` | Πλήρως κενή σελίδα |
| `Layout/skill_layout.html.twig` | Διάταξη για τη σελίδα του τροχού δεξιοτήτων |

## Βασικά μερικά πρότυπα (partials)

| Πρότυπο | Σκοπός |
|----------|---------|
| `Layout/head.html.twig` | Περιεχόμενο `<head>`: meta ετικέτες, όλες οι καταχωρίσεις CSS του Encore, θέμα `colors.css`, παλαιές καταχωρίσεις JS, ετικέτες OpenGraph/Twitter |
| `Layout/foot.html.twig` | Τέλος του body: σημείο εισόδου Vue JS, έγχυση `tracking.footer_extra_content` |
| `Layout/vue_setup.html.twig` | Εκπέμπει `<div id="app">` και περιλαμβάνει το `vue_js_setup.html.twig` |
| `Layout/vue_js_setup.html.twig` | Εισάγει `window.user`, `window.breadcrumb`, `window.languages`, κ.λπ. |
| `Layout/cookie_banner.html.twig` | Πλαίσιο συγκατάθεσης cookies GDPR |
| `Layout/footer.html.twig` | Γραμμή υποσέλιδου σελίδας |
| `Layout/course_navigation.html.twig` | Πλοήγηση εργαλείων μαθήματος (breadcrumb) |

## Ενσωμάτωση Webpack Encore

Το `head.html.twig` φορτώνει CSS για όλες τις καταχωρίσεις· το `foot.html.twig` φορτώνει το πακέτο Vue JS:

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

Οι παλαιές καταχωρίσεις JS (`legacy_app`, `legacy_lp`, κ.λπ.) φορτώνονται στο `<head>` επειδή οι παλαιές σελίδες PHP εξαρτώνται από τη διαθεσιμότητά τους πριν είναι έτοιμο το DOM.

## Macros

Επαναχρησιμοποιήσιμα macros Twig βρίσκονται στο `Macros/` και εισάγονται στην κορυφή του `base-layout.html.twig`:

| Αρχείο macro | Παρέχει |
|-----------|---------|
| `Macros/box.html.twig` | Βοηθητικά πλαίσια περιεχομένου |
| `Macros/actions.html.twig` | Απόδοση κουμπιών ενεργειών |
| `Macros/buttons.html.twig` | Βοηθητικά HTML κουμπιών |
| `Macros/headers.html.twig` | Βοηθητικά κεφαλίδων σελίδας |
| `Macros/image.html.twig` | Βοηθητικά απόδοσης εικόνων |
| `Macros/modals.html.twig` | Βοηθητικά παραθύρων διαλόγου (modal) |

Χρήση μέσα σε οποιοδήποτε πρότυπο που επεκτείνει το `base-layout.html.twig`:

```twig
{{ macro_buttons.submit('Save') }}
{{ macro_box.content_box('Title', content) }}
```

## Προσαρμοσμένα πρότυπα Vue

Το Chamilo υποστηρίζει αντικαταστάσεις σελίδων Vue ανά εγκατάσταση μέσω της μεταβλητής περιβάλλοντος `APP_CUSTOM_VUE_TEMPLATE`. Όταν οριστεί, η κατασκευή Webpack εκθέτει μια σταθερά `ENV_CUSTOM_VUE_TEMPLATE` μέσω του `DefinePlugin`, και ο δρομολογητής Vue εισάγει υπό όρους στοιχεία αντικατάστασης από το `var/vue_templates/`.

Τρέχουσες θέσεις αντικατάστασης:

```
var/vue_templates/
├── pages/
│   └── AppIndex.vue   # Replaces the default / entry page
└── components/
    ├── layout/
    └── SidebarLogin.vue
```

Αντικαθίστανται μόνο τα αρχεία που υπάρχουν στο `var/vue_templates/` — όλες οι άλλες σελίδες και στοιχεία χρησιμοποιούν τα πρωτότυπα του πυρήνα.

## Αναφορά συναρτήσεων Twig

Βασικές συναρτήσεις Twig διαθέσιμες σε όλα τα πρότυπα (καταχωρισμένες στο `ChamiloExtension`):

| Function | Purpose |
|----------|---------|
| `chamilo_settings_get('ns.key')` | Ανάγνωση μιας ρύθμισης της πλατφόρμας |
| `chamilo_settings_has('ns.key')` | Έλεγχος αν υπάρχει μια ρύθμιση |
| `chamilo_settings_all()` | Λήψη όλων των ρυθμίσεων ως πίνακα |
| `theme_asset('path')` | URL προς ένα στοιχείο στο ενεργό θέμα |
| `theme_asset_link_tag('path')` | Ετικέτα `<link>` για αρχείο CSS θέματος |
| `theme_asset_script_tag('path')` | Ετικέτα `<script>` για αρχείο JS θέματος |
| `theme_asset_base64('path')` | URI δεδομένων Base64 για στοιχείο θέματος |
| `theme_logo('header'\|'email')` | URL προς το προτιμώμενο λογότυπο |
| `is_allowed_to_edit(...)` | Βοηθητική συνάρτηση ελέγχου δικαιωμάτων |