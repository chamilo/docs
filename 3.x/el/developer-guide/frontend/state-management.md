# Διαχείριση Κατάστασης

Το Chamilo χρησιμοποιεί δύο βιβλιοθήκες διαχείρισης κατάστασης παράλληλα:

* **Pinia** — το τρέχον πρότυπο για όλα τα νέα stores. Το μεγαλύτερο μέρος του κώδικα χρησιμοποιεί Pinia.
* **Vuex** — παλαιό store, εξακολουθεί να υπάρχει και χρησιμοποιείται από παλαιότερες προβολές. Ο νέος κώδικας πρέπει να χρησιμοποιεί Pinia.

## Stores Pinia

Τα stores Pinia βρίσκονται απευθείας στο `assets/vue/store/`:

| Αρχείο store | Composable | Σκοπός |
|-----------|-----------|---------|
| `securityStore.js` | `useSecurityStore` | Αυθεντικοποιημένος χρήστης, σύνδεση/αποσύνδεση, έλεγχος συνεδρίας |
| `cidReq.js` | `useCidReqStore` | Τρέχον πλαίσιο μαθήματος/συνεδρίας (course ID, session ID) |
| `courseSettingStore.js` | `useCourseSettings` | Cache ρυθμίσεων σε επίπεδο μαθήματος |
| `enrolledStore.js` | `useEnrolledStore` | Δεδομένα εγγραφής χρήστη |
| `platformConfig.js` | `usePlatformConfig` | Ρύθμιση πλατφόρμας, πρόσθετα, θέμα, πάροχοι OAuth2 |
| `messageRelUserStore.js` | `useMessageRelUserStore` | Κατάσταση μηνυμάτων |
| `socialStore.js` | `useSocialStore` | Κατάσταση κοινωνικού δικτύου |

### Security Store

```javascript
const securityStore = useSecurityStore()

// Check if user is logged in
if (securityStore.isAuthenticated) { ... }

// Access current user object
const user = securityStore.user
```

### CID Request Store

Παρακολουθεί το τρέχον πλαίσιο μαθήματος/συνεδρίας — απαιτείται για οποιαδήποτε λειτουργία API με εύρος μαθήματος:

```javascript
const cidReqStore = useCidReqStore()

// Current course and session objects
const course = cidReqStore.course
const session = cidReqStore.session
```

### Course Settings Store

Αποθηκεύει σε cache τις ρυθμίσεις σε επίπεδο μαθήματος ώστε να αποφεύγονται επαναλαμβανόμενες κλήσεις API:

```javascript
const courseSettings = useCourseSettings()
const value = courseSettings.getSetting('exercise_generator')
```

### Platform Config Store

Διατηρεί τη ρύθμιση σε επίπεδο πλατφόρμας που ανακτάται από το `/platform-config/list`:

```javascript
const platformConfig = usePlatformConfig()

// Loaded settings array, active theme, enabled plugins, OAuth2 providers
const theme = platformConfig.visualTheme
const plugins = platformConfig.plugins
```

## Store Vuex (Παλαιό)

Το store Vuex ορίζεται στο `assets/vue/store/index.js` και περιέχει:

| Module | Σκοπός |
|--------|---------|
| `modules/crud.js` | Factory (`makeCrudModule`) που δημιουργεί πλήρες CRUD module Vuex για μια δεδομένη υπηρεσία — χρησιμοποιείται από παλαιότερες προβολές λίστας/δημιουργίας/ενημέρωσης |
| `modules/notifications.js` | Κατάσταση ειδοποιήσεων toast (show, color, text, timeout) |
| `modules/ux.js` | Κατάσταση UX (μήνυμα απαγορευμένης πρόσβασης) |
| `security.js` | Παλαιό module ασφαλείας Vuex (αντικαταστάθηκε από το `securityStore.js`) |

Αποφύγετε την προσθήκη νέων modules Vuex. Χρησιμοποιήστε Pinia για οποιαδήποτε νέα κατάσταση.

## Composables

Εκτός από τα stores, ο κατάλογος `assets/vue/composables/` περιέχει κοινές συναρτήσεις σύνθεσης. Αξιοσημείωτα παραδείγματα:

| Αρχείο | Σκοπός |
|------|---------|
| `useFileManager.js` | Κατάσταση και λειτουργίες περιηγητή αρχείων |
| `useTopbarLoggedIn.js` / `useTopbarNotLoggedIn.js` | Σύνδεση μενού επάνω γραμμής |
| `useTopbarTour.js` | Καθοδηγούμενη περιήγηση για την επάνω γραμμή |
| `useDocumentCreate.js` / `useDocumentUpdate.js` / `useDocumentTemplates.js` | Βοηθητικές συναρτήσεις εργαλείου εγγράφων |
| `useCertificateTags.js` | Βοηθητικές συναρτήσεις ετικετών προτύπου πιστοποιητικού |
| `sidebarMenu.js` | Δέντρο πλοήγησης πλευρικής γραμμής |
| `theme.js` | Φόρτωση και εναλλαγή θέματος |
| `pluginRegion.js` | Απόδοση περιοχής διεπαφής που εισάγεται από πρόσθετα |
| `userPermissions.js` | Έλεγχοι δικαιωμάτων για τον τρέχοντα χρήστη |
| `notification.js` | Βοηθητικές συναρτήσεις ειδοποιήσεων push |
| `locale.js` | Ανίχνευση και εναλλαγή τοπικής ρύθμισης |
| `datatableList.js` / `datatableCreate.js` / `datatableUpdate.js` | Επαναχρησιμοποιήσιμα μοτίβα CRUD datatable |
| `useSocialInfo.js` / `useSocialMenuItems.js` | Βοηθητικές συναρτήσεις κοινωνικού δικτύου |
| `usePushSubscription.js` | Διαχείριση συνδρομής Web Push |
| `upload.js` | Βοηθητικές συναρτήσεις μεταφόρτωσης αρχείων |
| `useConfirmation.js` | Βοηθητική συνάρτηση διαλόγου επιβεβαίωσης |

Τα composables οργανώνονται επίσης σε υποκαταλόγους λειτουργιών (`course/`, `session/`, `document/`, `calendar/`, `admin/`, `auth/`, `message/`, `skill/`, κ.λπ.). Η πλήρης λίστα βρίσκεται στο `assets/vue/composables/`.