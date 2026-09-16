# Θέματα Χρωμάτων

Το Chamilo 3.0 χρησιμοποιεί ένα σύστημα θεμάτων χρωμάτων που βασίζεται στη βάση δεδομένων. Τα θέματα διαχειρίζονται μέσω του περιβάλλοντος διαχείρισης, αποθηκεύονται στη βάση δεδομένων και εγγράφονται στον δίσκο ως αρχεία CSS. Μπορούν να προσαρμοστούν ανά URL πρόσβασης, επιτρέποντας σε εγκαταστάσεις πολλαπλών URL να έχουν διαφορετικές οπτικές ταυτότητες.

## Μοντέλο Δεδομένων

Δύο οντότητες οδηγούν το σύστημα θεμάτων:

**`ColorTheme`** (`src/CoreBundle/Entity/ColorTheme.php`)

| Πεδίο | Τύπος | Περιγραφή |
|-------|------|-------------|
| `id` | int | Πρωτεύον κλειδί |
| `title` | string | Ανθρώπινα αναγνώσιμο όνομα |
| `slug` | string | Παράγεται αυτόματα από το `title` (π.χ. `"My Theme"` → `my-theme`)· χρησιμοποιείται ως όνομα καταλόγου στο `var/themes/` |
| `variables` | array (JSON) | Αντιστοίχιση ονόματος προσαρμοσμένης ιδιότητας CSS → τιμή (π.χ. `{"--color-primary-base": "46 117 163"}`) |

**`AccessUrlRelColorTheme`** (`src/CoreBundle/Entity/AccessUrlRelColorTheme.php`)

Συσχετίζει ένα `ColorTheme` με ένα `AccessUrl`. Η λογική σημαία `active` δηλώνει ποιο θέμα είναι ενεργό για το συγκεκριμένο URL. Μόνο ένα θέμα μπορεί να είναι ενεργό ανά URL πρόσβασης κάθε φορά.

## Πώς Αποθηκεύονται τα Θέματα

Όταν δημιουργείται ή ενημερώνεται ένα θέμα μέσω του API, ο `ColorThemeStateProcessor` παράγει το αρχείο CSS και το γράφει στο Flysystem `themes_filesystem` (με βάση το `var/themes/`):

```
var/themes/
└── {slug}/
    └── colors.css   ← generated from ColorTheme.variables
```

Το παραγόμενο `colors.css` περικλείει όλες τις μεταβλητές σε ένα μπλοκ `:root`:

```css
:root {
  --color-primary-base: 46 117 163;
  --color-secondary-base: 243 126 47;
  --color-tertiary-base: 51 51 51;
  /* ... */
}
```

Οι τιμές είναι τριπλέτες καναλιών RGB διαχωρισμένες με κενά (όχι `rgb()`), γεγονός που επιτρέπει στο Tailwind να συνθέτει παραλλαγές αδιαφάνειας όπως `bg-primary/50` χωρίς επιπλέον ρύθμιση.

## Προτεραιότητα Επίλυσης Θέματος

Η `ThemeHelper::getVisualTheme()` επιλύει ποιο slug θέματος θα εφαρμοστεί σε οποιαδήποτε σελίδα, με αυτή τη σειρά:

1. **Ενεργό θέμα για το τρέχον AccessUrl** — η εγγραφή `AccessUrlRelColorTheme` με `active = true`
2. **Θέμα επιλεγμένο από τον χρήστη** — το θέμα που είναι αποθηκευμένο στην οντότητα `User`, εάν είναι ενεργοποιημένη η ρύθμιση πλατφόρμας `profile.user_selected_theme`
3. **Θέμα μαθήματος** — η ρύθμιση μαθήματος `course_theme`, εάν είναι ενεργοποιημένη η ρύθμιση πλατφόρμας `course.allow_course_theme`
4. **Θέμα διαδρομής μάθησης** — η τιμή `$lp_theme_css` του LP, εάν είναι ενεργοποιημένη η ρύθμιση μαθήματος `allow_learning_path_theme`
5. **Μεταβλητή περιβάλλοντος `THEME_FALLBACK`** — ορίζεται στο `.env` ως `THEME_FALLBACK='chamilo'`
6. **Προεπιλογή** — `chamilo` (σταθερά κωδικοποιημένο ως `ThemeHelper::DEFAULT_THEME`)

## Εξυπηρέτηση Πόρων

Οι πόροι θεμάτων εξυπηρετούνται από τον `ThemeController` (`src/CoreBundle/Controller/ThemeController.php`) κάτω από το πρόθεμα `/themes`.

| Διαδρομή | Σκοπός |
|-------|---------|
| `GET /themes/{name}/{path}` | Εξυπηρέτηση οποιουδήποτε πόρου θέματος (CSS, JS, εικόνες)· επιστρέφει στο θέμα `chamilo` εάν δεν βρεθεί στο ζητούμενο θέμα |
| `GET /themes/{slug}/logo/{type}` | Εξυπηρέτηση του προτιμώμενου λογότυπου (`header` ή `email`), με εναλλακτική SVG → PNG |
| `POST /themes/{slug}/logos` | Ανέβασμα λογότυπων κεφαλίδας/email (SVG και/ή PNG) |
| `DELETE /themes/{slug}/logos/{type}` | Διαγραφή συγκεκριμένου λογότυπου |

Η γενική διαδρομή πόρων (`/{name}/{path}`) επιστρέφει αυτόματα στο προεπιλεγμένο θέμα `chamilo` όταν λείπει ένα αρχείο από το ζητούμενο θέμα, ώστε τα θέματα να χρειάζεται να περιλαμβάνουν μόνο τα αρχεία που πραγματικά αντικαθιστούν.

## Πώς Φορτώνονται τα Θέματα στα Πρότυπα

Το πρότυπο διάταξης `head.html.twig` φορτώνει τους πόρους του ενεργού θέματος μέσω βοηθητικών συναρτήσεων Twig:

```twig
{# Inject the theme's color variables #}
{{ theme_asset_link_tag('colors.css') }}

{# Inject TinyMCE color palette #}
{{ theme_asset_script_tag('tiny-settings.js') }}

{# Reference other theme assets #}
<link rel="shortcut icon" href="{{ theme_asset('images/favicon.ico') }}" type="image/x-icon" />
```

Οι τρεις συναρτήσεις Twig (καταχωρισμένες στο `ChamiloExtension`) επιλύουν τη διαδρομή του πόρου μέσω του `ThemeHelper`, εφαρμόζοντας την ίδια αλυσίδα εναλλακτικών όπως παραπάνω:

| Συνάρτηση | Επιστρέφει |
|----------|---------|
| `theme_asset('path')` | URL προς τον πόρο στο επιλυμένο θέμα |
| `theme_asset_link_tag('path')` | Πλήρης ετικέτα `<link rel="stylesheet">` |
| `theme_asset_script_tag('path')` | Πλήρης ετικέτα `<script src="...">` |
| `theme_asset_base64('path')` | URI δεδομένων κωδικοποιημένο σε Base64 του πόρου |
| `theme_logo('header'\|'email')` | URL προς το καλύτερο διαθέσιμο λογότυπο |

## Σημεία Τερματισμού API

Η διαχείριση θεμάτων εκτίθεται μέσω του REST API του API Platform (μόνο για διαχειριστές):

| Μέθοδος | Σημείο τερματισμού | Σκοπός |
|--------|----------|---------|
| `POST` | `/api/color_themes` | Δημιουργία νέου θέματος |
| `PUT` | `/api/color_themes/{id}` | Ενημέρωση υπάρχοντος θέματος |
| `POST` | `/api/access_url_rel_color_themes` | Συσχέτιση/ενεργοποίηση θέματος για ένα URL πρόσβασης |
| `GET` | `/api/access_url_rel_color_themes` | Λίστα συσχετίσεων θεμάτων για το τρέχον URL πρόσβασης |

## Δημιουργία προσαρμοσμένου θέματος

Η τυπική ροή εργασίας γίνεται μέσω του περιβάλλοντος διαχείρισης (**Admin → Color Themes**), το οποίο καλεί τα παραπάνω API endpoints. Για να δημιουργήσετε ένα θέμα προγραμματιστικά:

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

Αυτό αποθηκεύει την οντότητα και γράφει το `var/themes/my-theme/colors.css`.

2. `POST /api/access_url_rel_color_themes` για να το συσχετίσετε και να το ενεργοποιήσετε για το τρέχον access URL:

```json
{
  "colorTheme": "/api/color_themes/{id}"
}
```

Για να προσθέσετε προσαρμοσμένες εικόνες (λογότυπο, favicon, φόντα), ανεβάστε τις μέσω `POST /themes/{slug}/logos` ή τοποθετήστε τις απευθείας στο `var/themes/{slug}/images/`.

## Αναφορά μεταβλητών χρώματος

Όλες οι μεταβλητές που αναμένει η προεπιλεγμένη διαμόρφωση Tailwind:

| Μεταβλητή | Σκοπός |
|----------|---------|
| `--color-primary-base` | Κύριο χρώμα επωνυμίας |
| `--color-primary-gradient` | Σκουρότερη στάση διαβάθμισης για το κύριο χρώμα |
| `--color-primary-button-text` | Χρώμα κειμένου στα κύρια κουμπιά |
| `--color-primary-button-alternative-text` | Εναλλακτικό χρώμα κειμένου στα κύρια κουμπιά |
| `--color-secondary-base` | Δευτερεύον χρώμα έμφασης |
| `--color-secondary-gradient` | Στάση διαβάθμισης για το δευτερεύον χρώμα |
| `--color-secondary-button-text` | Χρώμα κειμένου στα δευτερεύοντα κουμπιά |
| `--color-tertiary-base` | Τριτεύον χρώμα |
| `--color-tertiary-gradient` | Στάση διαβάθμισης για το τριτεύον χρώμα |
| `--color-tertiary-button-text` | Χρώμα κειμένου στα τριτεύοντα κουμπιά |
| `--color-success-base` | Χρώμα κατάστασης επιτυχίας |
| `--color-success-gradient` | Στάση διαβάθμισης για την επιτυχία |
| `--color-success-button-text` | Χρώμα κειμένου στα κουμπιά επιτυχίας |
| `--color-info-base` | Χρώμα κατάστασης πληροφορίας |
| `--color-info-gradient` | Στάση διαβάθμισης για την πληροφορία |
| `--color-info-button-text` | Χρώμα κειμένου στα κουμπιά πληροφορίας |
| `--color-warning-base` | Χρώμα κατάστασης προειδοποίησης |
| `--color-warning-gradient` | Στάση διαβάθμισης για την προειδοποίηση |
| `--color-warning-button-text` | Χρώμα κειμένου στα κουμπιά προειδοποίησης |
| `--color-danger-base` | Χρώμα κατάστασης κινδύνου/σφάλματος |
| `--color-danger-gradient` | Στάση διαβάθμισης για τον κίνδυνο |
| `--color-danger-button-text` | Χρώμα κειμένου στα κουμπιά κινδύνου |
| `--color-form-base` | Χρώμα έμφασης στοιχείων φόρμας |