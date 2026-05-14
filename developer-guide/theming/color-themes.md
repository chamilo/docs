# Θέματα Χρωμάτων

Το Chamilo 2.0 χρησιμοποιεί ένα σύστημα θεμάτων χρωμάτων βασισμένο σε βάση δεδομένων. Τα θέματα διαχειρίζονται μέσω της διεπαφής χρήστη διαχειριστή, αποθηκεύονται στη βάση δεδομένων και γράφονται σε δίσκο ως αρχεία CSS. Μπορούν να προσαρμοστούν ανά URL πρόσβασης, επιτρέποντας σε εγκαταστάσεις πολλαπλών URL να έχουν διαφορετικές οπτικές ταυτότητες.

## Μοντέλο Δεδομένων

Δύο οντότητες οδηγούν το σύστημα θεμάτων:

**`ColorTheme`** (`src/CoreBundle/Entity/ColorTheme.php`)

| Field | Type | Description |
|-------|------|-------------|
| `id` | int | Κλειδί πρωτεύουσας |
| `title` | string | Ανθρώπινα αναγνώσιμο όνομα |
| `slug` | string | Αυτόματα δημιουργούμενο από το `title` (π.χ. `"My Theme"` → `my-theme`); χρησιμοποιείται ως όνομα καταλόγου στο `var/themes/` |
| `variables` | array (JSON) | Χάρτης ονόματος ιδιότητας CSS προσαρμογής → τιμή (π.χ. `{"--color-primary-base": "46 117 163"}`) |

**`AccessUrlRelColorTheme`** (`src/CoreBundle/Entity/AccessUrlRelColorTheme.php`)

Συνδέει ένα `ColorTheme` με ένα `AccessUrl`. Η σημαία boolean `active` επισημαίνει ποιο θέμα είναι αυτή τη στιγμή ενεργό για αυτό το URL. Μόνο ένα θέμα μπορεί να είναι ενεργό ανά URL πρόσβασης κάθε φορά.

## Πώς Αποθηκεύονται τα Θέματα

Όταν δημιουργείται ή ενημερώνεται ένα θέμα μέσω του API, το `ColorThemeStateProcessor` παράγει το αρχείο CSS και το γράφει στο Flysystem `themes_filesystem` (υποστηριζόμενο από `var/themes/`):

```
var/themes/
└── {slug}/
    └── colors.css   ← generated from ColorTheme.variables
```

Το παραχθέν `colors.css` τυλίγει όλες τις μεταβλητές σε ένα μπλοκ `:root`:

```css
:root {
  --color-primary-base: 46 117 163;
  --color-secondary-base: 243 126 47;
  --color-tertiary-base: 51 51 51;
  /* ... */
}
```

Οι τιμές είναι τρίδυα RGB καναλιών χωρισμένα με κενά (όχι `rgb()`), κάτι που επιτρέπει στο Tailwind να συνθέτει παραλλαγές αδιαφανούς όπως `bg-primary/50` χωρίς επιπλέον διαμόρφωση.

## Προτεραιότητα Ανάλυσης Θεμάτων

Η `ThemeHelper::getVisualTheme()` αναλύει ποιο slug θέματος να εφαρμοστεί σε οποιαδήποτε δεδομένη σελίδα, σε αυτή τη σειρά:

1. **Ενεργό θέμα για το τρέχον AccessUrl** — η εγγραφή `AccessUrlRelColorTheme` με `active = true`
2. **Θέμα επιλεγμένο από χρήστη** — το θέμα που αποθηκεύεται στην οντότητα `User`, αν η ρύθμιση πλατφόρμας `profile.user_selected_theme` είναι ενεργοποιημένη
3. **Θέμα μαθήματος** — η ρύθμιση μαθήματος `course_theme`, αν η ρύθμιση πλατφόρμας `course.allow_course_theme` είναι ενεργοποιημένη
4. **Θέμα διαδρομής μάθησης** — η τιμή `$lp_theme_css` του LP, αν η ρύθμιση μαθήματος `allow_learning_path_theme` είναι ενεργοποιημένη
5. **`THEME_FALLBACK` env var** — ορισμένη στο `.env` ως `THEME_FALLBACK='chamilo'`
6. **Προεπιλογή** — `chamilo` (σκληρά κωδικοποιημένη ως `ThemeHelper::DEFAULT_THEME`)

## Εξυπηρέτηση Πόρων

Οι πόροι θεμάτων εξυπηρετούνται από το `ThemeController` (`src/CoreBundle/Controller/ThemeController.php`) κάτω από το πρόθεμα `/themes`.

| Route | Purpose |
|-------|---------|
| `GET /themes/{name}/{path}` | Εξυπηρέτηση οποιουδήποτε πόρου θέματος (CSS, JS, εικόνες); επιστροφή στο θέμα `chamilo` αν δεν βρεθεί στο ζητούμενο θέμα |
| `GET /themes/{slug}/logo/{type}` | Εξυπηρέτηση του προτιμώμενου λογοτύπου (`header` ή `email`), με εφεδρεία SVG → PNG |
| `POST /themes/{slug}/logos` | Ανέβασμα λογοτύπων header/email (SVG και/ή PNG) |
| `DELETE /themes/{slug}/logos/{type}` | Διαγραφή συγκεκριμένου λογοτύπου |

Η γενική διαδρομή πόρου (`/{name}/{path}`) επιστρέφει αυτόματα στο προεπιλεγμένο θέμα `chamilo` όταν λείπει ένα αρχείο από το ζητούμενο θέμα, έτσι τα θέματα χρειάζεται να περιλαμβάνουν μόνο τα αρχεία που πράγματι παρακάμπτουν.

## Πώς Φορτώνονται τα Θέματα στα Πρότυπα

Το πρότυπο διάταξης `head.html.twig` φορτώνει τους πόρους του ενεργού θέματος μέσω συναρτήσεων βοηθών Twig:

```twig
{# Inject the theme's color variables #}
{{ theme_asset_link_tag('colors.css') }}

{# Inject TinyMCE color palette #}
{{ theme_asset_script_tag('tiny-settings.js') }}

{# Reference other theme assets #}
<link rel="shortcut icon" href="{{ theme_asset('images/favicon.ico') }}" type="image/x-icon" />
```

Οι τρεις συναρτήσεις Twig (καταχωρημένες στο `ChamiloExtension`) αναλύουν τη διαδρομή του πόρου μέσω `ThemeHelper`, εφαρμόζοντας την ίδια αλυσίδα εφεδρείας όπως παραπάνω:

| Function | Returns |
|----------|---------|
| `theme_asset('path')` | URL στον πόρο στο αναλυθέν θέμα |
| `theme_asset_link_tag('path')` | Πλήρες tag `<link rel="stylesheet">` |
| `theme_asset_script_tag('path')` | Πλήρες tag `<script src="...">` |
| `theme_asset_base64('path')` | Base64-κωδικοποιημένο data URI του πόρου |
| `theme_logo('header'\|'email')` | URL στο καλύτερο διαθέσιμο λογότυπο |

## Σημεία Επικοινωνίας API

Η διαχείριση θεμάτων εκτίθεται μέσω του REST API της API Platform (μόνο για διαχειριστές):

| Method | Endpoint | Purpose |
|--------|----------|---------|
| `POST` | `/api/color_themes` | Δημιουργία νέου θέματος |
| `PUT` | `/api/color_themes/{id}` | Ενημέρωση υπάρχοντος θέματος |
| `POST` | `/api/access_url_rel_color_themes` | Σύνδεση/ενεργοποίηση θέματος για URL πρόσβασης |
| `GET` | `/api/access_url_rel_color_themes` | Λίστα συνδέσεων θεμάτων για το τρέχον URL πρόσβασης |

---
## Δημιουργία Προσαρμοσμένου Θέματος

Η τυπική ροή εργασιών γίνεται μέσω της διεπαφής χρήστη διαχειριστή (**Admin → Color Themes**), η οποία καλεί τα παραπάνω τελικά σημεία API. Για να δημιουργήσετε ένα θέμα προγραμματιστικά:

1. `POST /api/color_themes` με σώμα JSON:

```json
{
  "title": "My Theme",
  "variables": {
    "--color-primary-base": "30 90 140",
    "--color-primary-gradient": "20 60 100",
    "--color-primary-button-text": "30 90 140",
    "--color-primary-button-alternative-text": "255 255 255",
    "--color-secondary-base": "200 80 30",
    "--color-secondary-gradient": "160 60 20",
    "--color-secondary-button-text": "255 255 255"
  }
}
```

Αυτό αποθηκεύει την οντότητα και γράφει το αρχείο `var/themes/my-theme/colors.css`.

2. `POST /api/access_url_rel_color_themes` για να το συνδέσετε και να το ενεργοποιήσετε για το τρέχον access URL:

```json
{
  "colorTheme": "/api/color_themes/{id}"
}
```

Για να προσθέσετε προσαρμοσμένες εικόνες (logo, favicon, φόντα), ανεβάστε τις μέσω `POST /themes/{slug}/logos` ή τοποθετήστε τις απευθείας στο `var/themes/{slug}/images/`.

## Αναφορά Μεταβλητών Χρωμάτων

Όλες οι μεταβλητές που αναμένονται από τη προεπιλεγμένη διαμόρφωση Tailwind:

| Μεταβλητή | Σκοπός |
|-----------|--------|
| `--color-primary-base` | Κύριο χρώμα επωνυμίας |
| `--color-primary-gradient` | Σκούροτερο σημείο διαβάθμισης για το κύριο |
| `--color-primary-button-text` | Χρώμα κειμένου σε κύρια κουμπιά |
| `--color-primary-button-alternative-text` | Εναλλακτικό χρώμα κειμένου σε κύρια κουμπιά |
| `--color-secondary-base` | Δευτερεύον χρώμα έμφασης |
| `--color-secondary-gradient` | Σημείο διαβάθμισης για το δευτερεύον |
| `--color-secondary-button-text` | Χρώμα κειμένου σε δευτερεύοντα κουμπιά |
| `--color-tertiary-base` | Τριτογενές χρώμα |
| `--color-tertiary-gradient` | Σημείο διαβάθμισης για το τριτογενές |
| `--color-tertiary-button-text` | Χρώμα κειμένου σε τριτογενή κουμπιά |
| `--color-success-base` | Χρώμα κατάστασης επιτυχίας |
| `--color-success-gradient` | Σημείο διαβάθμισης για επιτυχία |
| `--color-success-button-text` | Χρώμα κειμένου σε κουμπιά επιτυχίας |
| `--color-info-base` | Χρώμα κατάστασης πληροφοριών |
| `--color-info-gradient` | Σημείο διαβάθμισης για πληροφορίες |
| `--color-info-button-text` | Χρώμα κειμένου σε κουμπιά πληροφοριών |
| `--color-warning-base` | Χρώμα κατάστασης προειδοποίησης |
| `--color-warning-gradient` | Σημείο διαβάθμισης για προειδοποίηση |
| `--color-warning-button-text` | Χρώμα κειμένου σε κουμπιά προειδοποίησης |
| `--color-danger-base` | Χρώμα κατάστασης κινδύνου/σφάλματος |
| `--color-danger-gradient` | Σημείο διαβάθμισης για κίνδυνο |
| `--color-danger-button-text` | Χρώμα κειμένου σε κουμπιά κινδύνου |
| `--color-form-base` | Χρώμα έμφασης στοιχείου φόρμας |