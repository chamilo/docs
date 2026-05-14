# Στοιχεία Vue

Το Chamilo διαθέτει ένα μεγάλο σύνολο στοιχείων Vue που οργανώνονται ανά περιοχή λειτουργίας στο `assets/vue/components/`.

## Βασικά Στοιχεία

Η οικογένεια `Base*` στο `assets/vue/components/basecomponents/` τυλίγει τα πρωτότυπα του PrimeVue με προεπιλογές ειδικές για το Chamilo (διάταξη FloatLabel, εικονίδια MDI μέσω `chamiloIconToClass`, συνεπή μηνύματα επικύρωσης, μέγεθος Tailwind). Πάντα προτιμάτε ένα στοιχείο `Base*` πριν εισάγετε το υποκείμενο στοιχείο του PrimeVue — έτσι διατηρείται η συνέπεια της διεπαφής χρήστη σε όλο το SPA και έτσι μπορούν να εφαρμοστούν αλλαγές σχεδιασμού από ένα ενιαίο σημείο.

Τα στοιχεία **δεν** καταχωρούνται παγκοσμίως (το μόνο παγκοσμίως καταχωρημένο πρωτότυπο του PrimeVue είναι το `Column`, που χρησιμοποιείται μέσα στο `BaseTable`). Εισάγετε το καθένα ρητά:

```js
import BaseButton from "@/components/basecomponents/BaseButton.vue"
import BaseDialog from "@/components/basecomponents/BaseDialog.vue"
```

---
### Είσοδοι φορμών

Η πλειονότητα δέχεται την τιμή μέσω `v-model`, εκθέτει ιδιότητες `id` + `label` για προσβασιμότητα/σύνδεση πλωτής ετικέτας, και εμφανίζει επικύρωση μέσω ενός ζεύγους `isInvalid` / `errorText` (ή `messageText`).

| Component                        | Wraps                                                | Purpose                                                                                                                                                                                            |
|----------------------------------|------------------------------------------------------|----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|
| `BaseInputText.vue`              | `InputText` + `FloatLabel`                           | Μονόγραμμη είσοδος κειμένου. Εναλλάσσεται σε στατική ετικέτα για εισόδους `date`/`time`/`datetime-local` (όπου η πλωτή ετικέτα θα επικαλυπτόταν με τον εγγενή placeholder).                                      |
| `BaseInputTextWithVuelidate.vue` | `BaseInputText`                                      | Λεπτός προσαρμογέας Vuelidate: προωθεί το `$error` στο `isInvalid` και αποδίδει το `$errors[].$message` στη θέση `errors`. Συνδυάστε το με αντικείμενο πεδίου Vuelidate.                                             |
| `BaseTextArea.vue`               | `Textarea` + `FloatLabel`                            | Πολυγραμμική είσοδος κειμένου.                                                                                                                                                                             |
| `BaseTextAreaWithVuelidate.vue`  | `BaseTextArea`                                       | Ίδιο μοτίβο προσαρμογέα Vuelidate με το `BaseInputTextWithVuelidate`.                                                                                                                                    |
| `BaseInputNumber.vue`            | `InputNumber`                                        | Αριθμητική είσοδος με `min` / `max` / `step` και κουμπιά spinner.                                                                                                                                     |
| `BaseInputTags.vue`              | (custom)                                             | Ετικέτες τσιπ ελεύθερου κειμένου· οι ετικέτες προστίθενται με enter/κόμμα και αφαιρούνται με backspace.                                                                                                                       |
| `BaseInputGroup.vue`             | `InputGroup` + `BaseButton`                          | Είσοδος κειμένου συνδυασμένη με κουμπί ενέργειας (τύπου αναζήτησης).                                                                                                                                            |
| `BaseCheckbox.vue`               | `Checkbox`                                           | Δυαδικό ή checkbox δεμένο με τιμή με ετικέτα.                                                                                                                                                         |
| `BaseRadioButtons.vue`           | `RadioButton`                                        | Ομάδα κουμπιών radio που οδηγείται από πίνακα `options: [{label, value}]`.                                                                                                                             |
| `BaseToggleButton.vue`           | `BaseButton`                                         | Κουμπί δύο καταστάσεων (ετικέτες και εικονίδια on / off) δεμένο μέσω `v-model`.                                                                                                                              |
| `BaseCalendar.vue`               | `DatePicker` + `FloatLabel`                          | Επιλογέας ημερομηνίας / ημερομηνίας-ώρας. Τιμά το `platform.timepicker_increment` και τη γλώσσα του χρήστη μέσω `calendarLocales`.                                                                                       |
| `BaseColorPicker.vue`            | native `<input type="color">` + `InputText`          | Επιλογέας χρώματος με εφεδρική είσοδο hex κειμένου· χρησιμοποιεί το `colorjs.io` για επικύρωση χειροκίνητης εισόδου hex.                                                                                                               |
| `BaseRating.vue`                 | `Rating`                                             | Είσοδος βαθμολόγησης με αστέρια.                                                                                                                                                                                 |
| `BaseFileUpload.vue`             | native `<input type="file">` + `BaseButton`          | Επιλογέας ενός αρχείου που ενεργοποιεί κουμπί τύπου επισύναψης.                                                                                                                                       |
| `BaseFileUploadMultiple.vue`     | native `<input type="file" multiple>` + `BaseButton` | Πολυαρχειακή παραλλαγή του `BaseFileUpload`.                                                                                                                                                            |
| `BaseUploader.vue`               | Uppy `Dashboard`                                     | Πλήρης uploader Uppy (webcam, ήχος, επεξεργαστής εικόνας, XHR upload) με γλώσσες συνδεδεμένες στην τρέχουσα `appLocale`. Χρησιμοποιήστε το για πλούσιες μεταφορτώσεις με πρόοδο· χρησιμοποιήστε `BaseFileUpload*` για απλές επισυνάψεις. |

---
### Επιλογή & αυτόματη συμπλήρωση

| Component              | Wraps                        | Σκοπός                                                                                                                           |
|------------------------|------------------------------|-----------------------------------------------------------------------------------------------------------------------------------|
| `BaseSelect.vue`       | `Dropdown` + `FloatLabel`    | Dropdown μοναδικής επιλογής με προαιρετικό κουμπί διαγραφής.                                                                                |
| `BaseMultiSelect.vue`  | `MultiSelect` + `FloatLabel` | Dropdown πολλαπλής επιλογής που εμφανίζει τα επιλεγμένα στοιχεία ως chips.                                                                      |
| `BaseSearchSelect.vue` | `Dropdown` with `filter`     | Dropdown μοναδικής επιλογής με ενσωματωμένο πλαίσιο αναζήτησης, προαιρετική εικονική κύλιση και πρότυπο επιλογής δύο γραμμών (`label` + `sublabel`). |
| `BaseAutocomplete.vue` | `AutoComplete`               | Ασύγχρονη αυτόματη συμπλήρωση (ελάχιστο 3 χαρακτήρες). Υποστηρίζει μοναδική ή πολλαπλή επιλογή και slot `chip` για προσαρμογή των chips.                  |
| `BaseUserFinder.vue`   | `BaseTable` + `userService`  | Πίνακας αναζήτησης χρηστών με σελιδοποίηση και επιλογή γραμμής. Χρησιμοποιήστε το όταν μια λειτουργία χρειάζεται picker χρηστών στυλ διαχειριστή.                           |

### Κουμπιά & ενέργειες

| Component                        | Wraps               | Σκοπός                                                                                                                                                                                                                                                                                                                                                     |
|----------------------------------|---------------------|-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|
| `BaseButton.vue`                 | `Button` (PrimeVue) | Τυπικό κουμπί Chamilo. Αντιμετωπίζει εικονίδια μέσω `chamiloIconToClass`, κανονικοποιεί το `type` σε `severity`/`variant` του PrimeVue, αποδίδει εσωτερικό `BaseAppLink` όταν δίνεται `route` ή `toUrl` (έτσι το ίδιο στοιχείο χειρίζεται περιπτώσεις router-link, anchor και απλού κουμπιού). Αποδεκτές τιμές `type` παρατίθενται στο `validators.js` → `buttonTypeValidator`. |
| `BaseAdvancedSettingsButton.vue` | `BaseButton`        | Κουμπί αποκάλυψης που εναλλάσσει πάνελ "προχωρημένων ρυθμίσεων" με slot μέσω `v-model`.                                                                                                                                                                                                                                                                           |
| `BaseToolbar.vue`                | `Toolbar`           | Γραμμή εργαλείων ενεργειών με slots `start` / `end` (ή ένα ενιαίο προεπιλεγμένο slot). Προαιρετικό `showTopBorder` για στυλ διαχωριστικού.                                                                                                                                                                                                                                       |

---
### Εμφάνιση & δεδομένα

| Component            | Wraps                       | Purpose                                                                                                                                                                                         |
|----------------------|-----------------------------|-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|
| `BaseTable.vue`      | `DataTable` (PrimeVue)      | Τυπικός πίνακας δεδομένων του Chamilo. Υποστηρίζει λειτουργία server-side (`lazy`), ταξινόμηση πολλαπλών στηλών, γενικό φίλτρο, επιλογή γραμμής και σελιδοποίηση. Παραδίδετε στήλες ως παιδιά `<Column>` (καταχωρημένα παγκοσμίως). |
| `BaseCard.vue`       | `Card`                      | Περιτύλιγμα κάρτας που προωθεί τις υποδοχές `header`, `title`, `subtitle`, `footer` και προεπιλεγμένης (περιεχομένου).                                                                                                |
| `BaseChart.vue`      | `Chart`                     | Προκαθορισμένο διάγραμμα πίτας. Παραδίδετε αντικείμενο `data` συμβατό με Chart.js.                                                                                                                                     |
| `BaseChip.vue`       | `Chip`                      | Chip που αποδίδεται από αντικείμενο `{value, labelField, imageField}`, με προαιρετικό κουμπί αφαίρεσης.                                                                                                     |
| `BaseTag.vue`        | `Tag`                       | Έγχρωμη ετικέτα. Χαρτογραφεί το `warning` του Chamilo στο `warn` του PrimeVue.                                                                                                                               |
| `BaseAvatarList.vue` | `Avatar` + `BaseUserAvatar` | Σειρά avatars με μετρητή υπερχείλισης (π.χ. "+3"); ελέγχεται από το `useAvatarList`.                                                                                                                        |
| `BaseUserAvatar.vue` | `Avatar`                    | Avatar χρήστη με εφεδρική εικόνα, κατάσταση φόρτωσης και προσβάσιμη ετικέτα.                                                                                                                           |
| `BaseIcon.vue`       | `<i class="mdi …">`         | Καταγραφέας εικονιδίων του Chamilo. Προσθέτει προαιρετική ετικέτα (κείμενο ή εικονίδιο), tooltip και τροποποιητή μεγέθους. Πάντα παραδίδετε ένα семантическое όνομα του Chamilo (π.χ. `"edit"`), όχι ακατέργαστη κλάση MDI.                             |
| `BaseIconField.vue`  | `IconField` + `InputText`   | Πεδίο εισαγωγής αναζήτησης με εικονίδιο μεγεθυντικού φακού στην αρχή.                                                                                                                                                     |
| `BaseDivider.vue`    | `Divider`                   | Οριζόντιο ή κατακόρυφο διαχωριστικό, με προαιρετικό τίτλο και στοίχιση.                                                                                                                              |

### Πλοήγηση & μενού

| Component                  | Wraps                   | Purpose                                                                                                                                                                                 |
|----------------------------|-------------------------|-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|
| `BaseMenu.vue`             | `Menu` (popup)          | Popup μενού που κατανοεί διαδρομές router μέσα σε αντικείμενα `model[]`.                                                                                                                       |
| `BaseDropdownMenu.vue`     | (custom)                | Ελαφρύ trigger πτυσσόμενου με συντονισμό μοναδικού ανοίγματος (το άνοιγμα του ενός κλείνει τα άλλα).                                                                                             |
| `BaseContextMenu.vue`      | (custom)                | Μενού περιβάλλοντος δεξιού κλικ / τοποθετημένου, ελεγχόμενο από `visible` + `position`.                                                                                                            |
| `BaseSidebarPanelMenu.vue` | `PanelMenu`             | Μενού πλοήγησης τύπου ακορντεόν που χρησιμοποιείται σε πλευρικές μπάρες· παρακολουθεί αυτόματα τα επεκταμένα κλειδιά από το μοντέλο.                                                                                             |
| `BaseRouteTabs.vue`        | `BaseAppLink` row       | Μπάρα καρτελών όπου κάθε καρτέλα είναι σύνδεσμος router. Η ενεργή καρτέλα επισημαίνεται αυτόματα βάσει της τρέχουσας διαδρομής.                                                                        |
| `BaseAppLink.vue`          | `RouterLink` *or* `<a>` | Έξυπνος σύνδεσμος: αποδίδει `<a>` όταν ορίζεται `url` (εξωτερικός/παραδοσιακός), αλλιώς Vue Router `<RouterLink>`. Χρησιμοποιήστε το αντί για οποιοδήποτε πρωτόγονο ώστε η εσωτερική/εξωτερική σύνδεση να παραμένει ομοιόμορφη. |

---
### Διάλογοι

`BaseDialog` είναι η βάση· οι υπόλοιποι βασίζονται σε αυτό για τις κοινές ροές επιβεβαίωσης/ακύρωσης και διαγραφής.

| Component                     | Wraps                     | Purpose                                                                                                                             |
|-------------------------------|---------------------------|-------------------------------------------------------------------------------------------------------------------------------------|
| `BaseDialog.vue`              | `Dialog`                  | Modal dialog με τίτλο header (προαιρετικό `headerIcon`) και slotted body/footer. Η κατάσταση ανοίγματος είναι ένα `defineModel("isVisible")`.      |
| `BaseDialogConfirmCancel.vue` | `BaseDialog`              | Modal επιβεβαίωσης/ακύρωσης με δύο κουμπιά. Ρυθμιζόμενος τύπος `type` επιβεβαίωσης (σοβαρότητα) και `icon`· εκπέμπει `confirmClicked` / `cancelClicked`. |
| `BaseDialogDelete.vue`        | `BaseDialogConfirmCancel` | Προ-κατασκευασμένο modal "Είστε σίγουροι ότι θέλετε να διαγράψετε αυτό το στοιχείο;" με κουμπί επιβεβαίωσης σε στυλ κινδύνου.                                   |

### Επεξεργαστής & πλούσιο περιεχόμενο

| Component            | Wraps                                           | Purpose                                                                                                                                                              |
|----------------------|-------------------------------------------------|----------------------------------------------------------------------------------------------------------------------------------------------------------------------|
| `BaseTinyEditor.vue` | TinyMCE (via the project's `components/Editor`) | Επεξεργαστής πλούσιου κειμένου με `FloatLabel`, παρακολούθηση κατάστασης focus/κενό, και ενσωμάτωση με το τρέχον πλαίσιο μαθήματος (`cidReq`). Χρησιμοποιήστε το για οποιοδήποτε πεδίο HTML που δημιουργεί ο χρήστης. |

### Βοηθητικά

| File              | Purpose                                                                                                                                                                                                                                                          |
|-------------------|------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|
| `ChamiloIcons.js` | Χαρτογραφεί σημασιολογικά ονόματα εικονιδίων (`edit`, `delete`, `eye-on`, `courses`, …) σε κλάσεις CSS MDI. ~127 καταχωρίσεις. Περιηγηθείτε σε αυτά στο `/admin/list-icons` σε μια εκτελούμενη εγκατάσταση.                                                                                                  |
| `validators.js`   | Κοινά validators prop: `iconValidator` (πρέπει να είναι γνωστό όνομα εικονιδίου Chamilo), `sizeValidator` (`normal` / `small` / `large`), `buttonTypeValidator` (επιτρεπόμενοι τύποι `BaseButton`). Εισάγετέ τα κατά τον ορισμό νέων `Base*` components που αντικατοπτρίζουν αυτές τις συμβάσεις. |

### Συμβάσεις σε όλα τα Base components

* **v-model via `defineModel()`** — η τιμή (και συχνά `isVisible`, `filters`, `selectedItems`) εκτίθενται ως models· περάστε τα με `v-model[:name]` αντί για `:prop` + `@update:prop`.
* **Κινούμενες ετικέτες** — τα περισσότερα πεδία φόρμας τυλίγουν το input τους σε PrimeVue `FloatLabel variant="on"`. Παρέχετε `label` (το εμφανιζόμενο κείμενο) και `id` (χρησιμοποιείται για να συνδεθεί το `<label for>`).
* **Μηνύματα επικύρωσης** — τα πεδία εκθέτουν `isInvalid` και ένα μικρό μήνυμα κάτω από το input (`errorText`, `messageText`, ή `smallText` ανάλογα με το component). Υπάρχουν variants ενήμεροι για Vuelidate για τα πιο κοινά.
* **Εικονίδια** — περάστε σημασιολογικά ονόματα Chamilo, όχι ακατέργαστες κλάσεις MDI. Τα components τα επιλύουν μέσω `chamiloIconToClass`.
* **Μέγεθος** — `size="normal" | "small" | "large"` είναι το συμβατικό prop μεγέθους (δείτε `sizeValidator`).
* **Σύνθεση αντί για αντιγραφή** — `BaseDialogDelete` τυλίγει `BaseDialogConfirmCancel`, που τυλίγει `BaseDialog`· `BaseToggleButton` και `BaseAdvancedSettingsButton` τυλίγουν `BaseButton`. Όταν χρειάζεστε ένα επαναλαμβανόμενο variant ενός υπάρχοντος component, προτιμήστε να συνθέσετε ένα νέο `Base*` από πάνω αντί να το επανεφαρμόσετε σε φάκελο χαρακτηριστικού.

## Components Διάταξης

Βρίσκονται στο `components/layout/`:

| Component | Purpose |
|-----------|---------|
| `DashboardLayout.vue` | Κύρια διάταξη: topbar + sidebar + περιοχή περιεχομένου |
| `Sidebar.vue` | Αριστερό πάνελ πλοήγησης (αναδιπλούμενο) |
| `TopbarLoggedIn.vue` | Μπάρα κορυφής με λογότυπο, inbox, avatar |

---
## Στοιχεία Περιοχής Λειτουργιών

| Κατάλογος | Στοιχεία | Σκοπός |
|-----------|----------|--------|
| `course/` | Course cards, catalog filters, course forms | Course listing and management |
| `session/` | Session cards, catalog | Session listing |
| `assignments/` | Submission lists, grading modals, forms | Assignment workflow |
| `chat/` | DockedChat, chat messages | Real-time chat and AI tutor |
| `filemanager/` | CourseDocuments, PersonalFiles | File browser and management |
| `installer/` | Step1-Step7, EmailSettings | Installation wizard |
| `social/` | GroupInfoCard, social posts | Social network features |
| `attendance/` | AttendanceTable | Attendance tracking |
| `usergroup/` | GroupMembers | User group management |

## Σύστημα Εικονιδίων

Τα εικονίδια χρησιμοποιούν **Material Design Icons (MDI)** ως τη μοναδική βιβλιοθήκη εικονιδίων: `<i class="mdi mdi-pencil"></i>`

Το αρχείο `ChamiloIcons.js` παρέχει χαρτογράφηση σημασιολογικού επιπέδου:

```javascript
export const chamiloIconToClass = {
  "edit": "mdi mdi-pencil",
  "delete": "mdi mdi-delete",
  "eye-on": "mdi mdi-eye",
  "courses": "mdi mdi-book-open-page-variant",
  // ... 127 mappings
}
```

Τα στοιχεία χρησιμοποιούν το `BaseIcon` ή αναφέρονται στο `chamiloIconToClass` για να αποδίδουν εικονίδια με συνέπεια.

Μια αναζητήσιμη αναφορά όλων των διαθέσιμων εικονιδίων στην πλατφόρμα μπορεί να βρεθεί στο `/admin/list-icons` σε οποιαδήποτε εκτελόμενη εγκατάσταση Chamilo.

## Πρότυπα Στοιχείων

* **Composition API** — Τα στοιχεία χρησιμοποιούν τη σύνταξη `<script setup>` του Vue 3
* **PrimeVue integration** — Εντατική χρήση στοιχείων PrimeVue (Button, DataTable, Dialog, Menu, κ.λπ.)
* **Axios for API calls** — HTTP αιτήματα προς το backend API
* **Vue I18n** — Όλος ο κείμενο προς τον χρήστη χρησιμοποιεί κλειδιά μετάφρασης