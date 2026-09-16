# State Management

Chamilo uses two state management libraries side by side:

* **Pinia** — the current standard for all new stores. The majority of the codebase uses Pinia.
* **Vuex** — legacy store, still present and used by older views. New code should use Pinia.

## Pinia Stores

The Pinia stores live directly in `assets/vue/store/`:

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

Tracks the current course/session context — required for any course-scoped API operation:

```javascript
const cidReqStore = useCidReqStore()

// Current course and session objects
const course = cidReqStore.course
const session = cidReqStore.session
```

### Course Settings Store

Caches course-level settings to avoid repeated API calls:

```javascript
const courseSettings = useCourseSettings()
const value = courseSettings.getSetting('exercise_generator')
```

### Platform Config Store

Holds platform-wide configuration fetched from `/platform-config/list`:

```javascript
const platformConfig = usePlatformConfig()

// Loaded settings array, active theme, enabled plugins, OAuth2 providers
const theme = platformConfig.visualTheme
const plugins = platformConfig.plugins
```

## Vuex Store (Legacy)

The Vuex store is defined in `assets/vue/store/index.js` and contains:

| Module | Purpose |
|--------|---------|
| `modules/crud.js` | Factory (`makeCrudModule`) that generates a full CRUD Vuex module for a given service — used by older list/create/update views |
| `modules/notifications.js` | Toast notification state (show, color, text, timeout) |
| `modules/ux.js` | UX state (forbidden-access message) |
| `security.js` | Legacy Vuex security module (superseded by `securityStore.js`) |

Avoid adding new Vuex modules. Use Pinia for any new state.

## Composables

In addition to stores, `assets/vue/composables/` contains shared composition functions. Notable examples:

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

Composables are also organized into feature subdirectories (`course/`, `session/`, `document/`, `calendar/`, `admin/`, `auth/`, `message/`, `skill/`, etc.). The full list is in `assets/vue/composables/`.
