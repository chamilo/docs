# Ρυθμίσεις Cron Jobs

Ρύθμιση προγραμματισμένων εργασιών (cron tasks) που παρέχονται με το Chamilo.

Πρόσβαση σε αυτές τις ρυθμίσεις στο **Administration > Configuration settings > Cron Jobs**. Αυτή η κατηγορία περιέχει **3 ρυθμίσεις**, που παρατίθενται παρακάτω με τον τίτλο και το σχόλιο που παρέχονται στα fixtures των ρυθμίσεων της πλατφόρμας (`SettingsCurrentFixtures.php`).

> Το όνομα της μεταβλητής στον κώδικα εμφανίζεται σε monospace. Χρησιμοποιήστε το κατά την προγραμματισμό μέσω του API ή όταν χρειάζεται να αλλάξετε αυτές τις ρυθμίσεις σε παγκόσμιο επίπεδο επεξεργαζόμενοι το [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Ρυθμίσεις

### `cron_remind_course_expiration_activate`

**Υπενθύμιση Λήξης Μαθήματος cron**

Ενεργοποίηση του cron Υπενθύμισης Λήξης Μαθήματος

*Προεπιλογή: `false`*

### `cron_remind_course_expiration_frequency`

**Συχνότητα για το cron Υπενθύμισης Λήξης Μαθήματος**

Αριθμός ημερών πριν τη λήξη του μαθήματος για να ληφθεί υπόψη η αποστολή email υπενθύμισης

### `cron_remind_course_finished_activate`

**Αποστολή ειδοποίησης ολοκλήρωσης μαθήματος**

Εάν να αποσταλεί email στους φοιτητές όταν το μάθημά τους (session) ολοκληρωθεί. Αυτό απαιτεί να έχουν ρυθμιστεί cron tasks (δείτε τον κατάλογο main/cron/).

*Προεπιλογή: `false`*