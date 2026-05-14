# Διαχείριση Κατάστασης

Το Chamilo χρησιμοποιεί δύο βιβλιοθήκες διαχείρισης κατάστασης παράλληλα:

* **Pinia** — το τρέχον πρότυπο για όλους τους νέους αποθηκευτικούς χώρους. Η πλειονότητα του κώδικα χρησιμοποιεί Pinia.
* **Vuex** — παλιός αποθηκευτικός χώρος, παρών και χρησιμοποιούμενος από παλαιότερες προβολές. Ο νέος κώδικας πρέπει να χρησιμοποιεί Pinia.

## Pinia Stores

Οι Pinia stores βρίσκονται απευθείας στο `assets/vue/store/`:

| Store file | Composable | Purpose |
|-----------|-----------|---------|
| `securityStore.js` | `useSecurityStore` | Authenticated user, login/logout, session check |
| `cidReq.js` | `useCidReqStore` | Current course/session context (course ID, session ID) |
| `courseSettingStore.js` | `useCourseSettings` | Course-level settings cache |
| `enrolledStore.js` | `useEnrolledStore` | User enrollment data |
| `platformConfig.js` | `usePlatformConfig` | Platform configuration, plugins, theme, OAuth2 providers |
| `messageRelUserStore.js` | `useMessageRelUserStore` | Messaging state |
| `socialStore.js` | `useSocialStore` | Social network state |

### Security Store

```javascript
const securityStore = useSecurityStore()

// Check if user is logged in
if (securityStore.isAuthenticated) { ... }

// Access current user object
const user = securityStore.user
```

### CID Request Store

Παρακολουθεί το τρέχον πλαίσιο μαθήματος/συνεδρίας — απαιτείται για οποιαδήποτε λειτουργία API περιορισμένη σε μάθημα:

```javascript
const cidReqStore = useCidReqStore()

// Current course and session objects
const course = cidReqStore.course
const session = cidReqStore.session
```

### Course Settings Store

Αποθηκεύει προσωρινά ρυθμίσεις επιπέδου μαθήματος για να αποφευχθούν επαναλαμβανόμενες κλήσεις API:

```javascript
const courseSettings = useCourseSettings()
const value = courseSettings.getSetting('exercise_generator')
```

### Platform Config Store

Περιέχει διαμόρφωση σε επίπεδο πλατφόρμας που λαμβάνεται από το `/platform-config/list`:

```javascript
const platformConfig = usePlatformConfig()

// Loaded settings array, active theme, enabled plugins, OAuth2 providers
const theme = platformConfig.visualTheme
const plugins = platformConfig.plugins
```

## Vuex Store (Legacy)

Ο Vuex store ορίζεται στο `assets/vue/store/index.js` και περιέχει:

| Module | Purpose |
|--------|---------|
| `modules/crud.js` | Factory (`makeCrudModule`) that generates a full CRUD Vuex module for a given service — used by older list/create/update views |
| `modules/notifications.js` | Toast notification state (show, color, text, timeout) |
| `modules/ux.js` | UX state (forbidden-access message) |
| `security.js` | Legacy Vuex security module (superseded by `securityStore.js`) |

Αποφύγετε την προσθήκη νέων Vuex modules. Χρησιμοποιήστε Pinia για οποιαδήποτε νέα κατάσταση.

## Composables

Επιπλέον των stores, το `assets/vue/composables/` περιέχει κοινές συναρτήσεις σύνθεσης. Σημαντικά παραδείγματα:

| File | Purpose |
|------|---------|
| `useFileManager.js` | File browser state and operations |
| `useTopbarLoggedIn.js` / `useTopbarNotLoggedIn.js` | Top-bar menu wiring |
| `useTopbarTour.js` | Guided tour for the top bar |
| `useDocumentCreate.js` / `useDocumentUpdate.js` / `useDocumentTemplates.js` | Document tool helpers |
| `useCertificateTags.js` | Certificate-template tag helpers |
| `sidebarMenu.js` | Sidebar navigation tree |
| `theme.js` | Theme loading and switching |
| `pluginRegion.js` | Plugin-injected UI region rendering |
| `userPermissions.js` | Permission checks for the current user |
| `notification.js` | Push notification helpers |
| `locale.js` | Locale detection and switching |
| `datatableList.js` / `datatableCreate.js` / `datatableUpdate.js` | Reusable datatable CRUD patterns |
| `useSocialInfo.js` / `useSocialMenuItems.js` | Social network helpers |
| `usePushSubscription.js` | Web Push subscription management |
| `upload.js` | File upload helpers |
| `useConfirmation.js` | Confirmation dialog helper |

Τα composables οργανώνονται επίσης σε υποκαταλόγους χαρακτηριστικών (`course/`, `session/`, `document/`, `calendar/`, `admin/`, `auth/`, `message/`, `skill/`, κ.λπ.). Η πλήρης λίστα βρίσκεται στο `assets/vue/composables/`.