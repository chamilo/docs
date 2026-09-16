# Ρυθμίσεις Γλωσσαρίου

Συμπεριφορά του εργαλείου **Glossary** του μαθήματος.

Πρόσβαση σε αυτές τις ρυθμίσεις μέσω **Administration > Configuration settings > Glossary**. Αυτή η κατηγορία περιέχει **3 ρυθμίσεις**, που παρατίθενται παρακάτω με τον τίτλο και το σχόλιο που παρέχονται στα fixtures των ρυθμίσεων της πλατφόρμας (`SettingsCurrentFixtures.php`).

> Το όνομα της μεταβλητής στον κώδικα εμφανίζεται σε monospace. Χρησιμοποιήστε το κατά την προγραμματισμό μέσω API ή όταν χρειάζεται να αλλάξετε αυτές τις ρυθμίσεις σε παγκόσμιο επίπεδο επεξεργαζόμενοι το [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Ρυθμίσεις

### `allow_remove_tags_in_glossary_export`

**Remove HTML tags in glossary export**

Όταν είναι ενεργοποιημένη, τα HTML tags αφαιρούνται από τους ορισμούς όρων του γλωσσαρίου κατά την εξαγωγή.

*Προεπιλογή: `false`*

### `default_glossary_view`

**Default glossary view**

Επιλέξτε ποια προβολή ('table' ή 'list') θα χρησιμοποιείται από προεπιλογή στο εργαλείο γλωσσαρίου.

*Προεπιλογή: `table`*

### `show_glossary_in_extra_tools`

**Show the glossary terms in extra tools**

Από εδώ μπορείτε να ρυθμίσετε πώς θα προστεθούν οι όροι του γλωσσαρίου στα επιπλέον εργαλεία όπως το εργαλείο learning path και exercice tool