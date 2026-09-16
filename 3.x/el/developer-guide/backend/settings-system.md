# Σύστημα Ρυθμίσεων

Η διαμόρφωση του Chamilo διαχειρίζεται μέσω ενός συνόλου σχημάτων ρυθμίσεων (περίπου 40, που ποικίλλουν ανά έκδοση) τα οποία ορίζουν κάθε παραμετροποιήσιμη πτυχή της πλατφόρμας. Βρίσκονται στο `src/CoreBundle/Settings/` — η ακριβής λίστα εκεί αποτελεί την πηγή αλήθειας.

## Πώς Λειτουργεί

Οι ρυθμίσεις:

1. **Ορίζονται** σε κλάσεις σχημάτων (`src/CoreBundle/Settings/*SettingsSchema.php`)
2. **Αποθηκεύονται** στη βάση δεδομένων (πίνακας `settings_current`)
3. **Προσπελάζονται** μέσω της υπηρεσίας `SettingsManager`
4. **Διαχειρίζονται** μέσω της διαδικτυακής διεπαφής διαχείρισης

## Σχήματα Ρυθμίσεων

Κάθε αρχείο σχήματος ορίζει μια κατηγορία ρυθμίσεων. Κύρια σχήματα:

| Schema | Purpose |
|--------|---------|
| `PlatformSettingsSchema` | Institution info, timezone, server type, portal features |
| `SecuritySettingsSchema` | Login attempts, CAPTCHA, password policy, HTTP headers, 2FA |
| `RegistrationSettingsSchema` | Self-registration, required fields, auto-subscribe |
| `CourseSettingsSchema` | Course creation defaults, tools, catalog |
| `SessionSettingsSchema` | Session defaults, visibility |
| `MailSettingsSchema` | Email configuration, DKIM, notifications |
| `AiHelpersSettingsSchema` | AI providers, feature toggles per AI tool |
| `ExerciseSettingsSchema` | Quiz scoring, feedback, question options |
| `LearningPathSettingsSchema` | LP display, prerequisites, SCORM settings |
| `DocumentSettingsSchema` | Upload limits, allowed file types, storage |
| `DisplaySettingsSchema` | UI tabs, sidebar items, theme |
| `LanguageSettingsSchema` | Available languages, default locale |
| `AdminSettingsSchema` | Admin email, admin-specific options |

## Πρόσβαση στις Ρυθμίσεις

Σε κώδικα PHP:

```php
// Via SettingsManager service
$value = $settingsManager->getSetting('platform.site_name');

// In legacy code
$value = api_get_setting('platform.site_name');
```

Στα πρότυπα:

```twig
{# Read a single setting #}
{{ chamilo_settings_get('platform.site_name') }}

{# Check whether a setting exists #}
{% if chamilo_settings_has('platform.allow_registration') %}
    ...
{% endif %}

{# Get all settings as an array #}
{% set settings = chamilo_settings_all() %}
```

## Δομή Ρύθμισης

Κάθε ρύθμιση έχει:

* **Namespace** — Η κατηγορία σχήματος (π.χ. `platform`, `security`, `ai_helpers`)
* **Variable** — Το όνομα της ρύθμισης (π.χ. `site_name`, `allow_registration`)
* **Value** — Η τρέχουσα τιμή
* **Type** — Τύπος δεδομένων (string, boolean, array κ.λπ.)

## Ρυθμίσεις σε Επίπεδο Μαθήματος

Ορισμένες ρυθμίσεις μπορούν να παρακαμφθούν σε επίπεδο μαθήματος. Ορίζονται στο `src/CourseBundle/Settings/` και περιλαμβάνουν:

* Ρυθμίσεις ασκήσεων ανά μάθημα
* Ρυθμίσεις εργασιών ανά μάθημα
* Εναλλαγές λειτουργιών AI ανά μάθημα

## Ρυθμίσεις Πολλαπλών URL

Σε εγκαταστάσεις πολλαπλών URL, ορισμένες ρυθμίσεις μπορούν να προσαρμοστούν ανά URL πρόσβασης, επιτρέποντας διαφορετικές διαμορφώσεις πύλης από την ίδια εγκατάσταση.

Αυτές οι ρυθμίσεις εμφανίζονται πολλές φορές στον πίνακα `settings`, με διαφορετικές τιμές `access_url`. Από προεπιλογή, όλες οι ρυθμίσεις συνδέονται με `access_url=1`.

## Προσθήκη Νέας Ρύθμισης

1. Προσθέστε τον ορισμό της ρύθμισης στην κατάλληλη κλάση σχήματος
2. Παρέχετε μια προεπιλεγμένη τιμή
3. Εκτελέστε μεταναστεύσεις βάσης δεδομένων εάν χρειάζεται
4. Προσπελάστε τη ρύθμιση μέσω του `SettingsManager`