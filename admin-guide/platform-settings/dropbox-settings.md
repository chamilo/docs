# Ρυθμίσεις Dropbox

Συμπεριφορά του εργαλείου ανταλλαγής αρχείων **Dropbox**.

Πρόσβαση σε αυτές τις ρυθμίσεις στο **Administration > Configuration settings > Dropbox**. Αυτή η κατηγορία περιέχει **8 ρυθμίσεις**, που παρατίθενται παρακάτω με τον τίτλο και το σχόλιο που παρέχονται στα fixtures των ρυθμίσεων της πλατφόρμας (`SettingsCurrentFixtures.php`).

> Το όνομα της μεταβλητής στον κώδικα εμφανίζεται σε monospace. Χρησιμοποιήστε το όταν προγραμματίζετε μέσω του API ή όταν χρειάζεται να αλλάξετε αυτές τις ρυθμίσεις σε παγκόσμιο επίπεδο επεξεργαζόμενοι το [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Ρυθμίσεις

### `dropbox_allow_group`

**Dropbox: allow group**

Οι χρήστες μπορούν να στέλνουν αρχεία σε ομάδες

*Προεπιλογή: `true`*

### `dropbox_allow_just_upload`

**Dropbox: Upload to own dropbox space?**

Επιτρέπει στους εκπαιδευτές και χρήστες να ανεβάζουν έγγραφα στο dropbox τους χωρίς να τα στέλνουν στον εαυτό τους

*Προεπιλογή: `true`*

### `dropbox_allow_mailing`

**Dropbox: Allow mailing**

Με τη λειτουργικότητα mailing μπορείτε να στείλετε σε κάθε εκπαιδευόμενο ένα προσωπικό έγγραφο

*Προεπιλογή: `false`*

### `dropbox_allow_overwrite`

**Dropbox: Can documents be overwritten**

Μπορεί το αρχικό έγγραφο να αντικατασταθεί όταν ένας χρήστης ή εκπαιδευτής ανεβάζει έγγραφο με το όνομα εγγράφου που υπάρχει ήδη; Αν απαντήσετε ναι, τότε χάνετε τον μηχανισμό έκδοσης.

*Προεπιλογή: `true`*

### `dropbox_allow_student_to_student`

**Dropbox: Learner <-> Learner**

Επιτρέπει στους χρήστες να στέλνουν έγγραφα σε άλλους χρήστες (peer 2 peer). Οι χρήστες μπορεί να χρησιμοποιήσουν αυτή τη λειτουργία και για λιγότερο σχετικά έγγραφα (mp3, λύσεις δοκιμών, ...). Αν την απενεργοποιήσετε, οι χρήστες μπορούν να στέλνουν έγγραφα μόνο στον εκπαιδευτή.

*Προεπιλογή: `true`*

### `dropbox_hide_course_coach`

**Dropbox: hide course coach**

Απόκρυψη του course coach της συνεδρίας στο dropbox όταν ένα έγγραφο αποστέλλεται από τον coach στους μαθητές

*Προεπιλογή: `false`*

### `dropbox_hide_general_coach`

**Hide general coach in dropbox**

Απόκρυψη του ονόματος του general coach στο εργαλείο dropbox όταν ο general coach ανέβασε το αρχείο

*Προεπιλογή: `false`*


### `dropbox_max_filesize`

**Dropbox: Maximum file size of a document**

Πόσο μεγάλο (σε MB) μπορεί να είναι ένα έγγραφο dropbox;

*Προεπιλογή: `100000000`*