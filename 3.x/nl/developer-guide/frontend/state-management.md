# Statebeheer

Chamilo gebruikt twee libraries voor statebeheer naast elkaar:

* **Pinia** — de huidige standaard voor alle nieuwe stores. Het merendeel van de codebase gebruikt Pinia.
* **Vuex** — legacy-store, nog aanwezig en gebruikt door oudere views. Nieuwe code moet Pinia gebruiken.

## Pinia-stores

De Pinia-stores staan rechtstreeks in `assets/vue/store/`:

| Storebestand | Composable | Doel |
|-----------|-----------|---------|
| `securityStore.js` | `useSecurityStore` | Geauthenticeerde gebruiker, login/logout, sessiecontrole |
| `cidReq.js` | `useCidReqStore` | Huidige cursus-/sessiecontext (cursus-ID, sessie-ID) |
| `courseSettingStore.js` | `useCourseSettings` | Cache van instellingen op cursusniveau |
| `enrolledStore.js` | `useEnrolledStore` | Inschrijvingsgegevens van de gebruiker |
| `platformConfig.js` | `usePlatformConfig` | Platformconfiguratie, plugins, thema, OAuth2-providers |
| `messageRelUserStore.js` | `useMessageRelUserStore` | Berichtstatus |
| `socialStore.js` | `useSocialStore` | Status van het sociale netwerk |

### Security Store

```javascript
const securityStore = useSecurityStore()

// Check if user is logged in
if (securityStore.isAuthenticated) { ... }

// Access current user object
const user = securityStore.user
```

### CID Request Store

Houdt de huidige cursus-/sessiecontext bij — vereist voor elke API-bewerking binnen een cursus:

```javascript
const cidReqStore = useCidReqStore()

// Current course and session objects
const course = cidReqStore.course
const session = cidReqStore.session
```

### Course Settings Store

Cachet instellingen op cursusniveau om herhaalde API-aanroepen te vermijden:

```javascript
const courseSettings = useCourseSettings()
const value = courseSettings.getSetting('exercise_generator')
```

### Platform Config Store

Bevat platformbrede configuratie opgehaald van `/platform-config/list`:

```javascript
const platformConfig = usePlatformConfig()

// Loaded settings array, active theme, enabled plugins, OAuth2 providers
const theme = platformConfig.visualTheme
const plugins = platformConfig.plugins
```

## Vuex-store (legacy)

De Vuex-store is gedefinieerd in `assets/vue/store/index.js` en bevat:

| Module | Doel |
|--------|---------|
| `modules/crud.js` | Factory (`makeCrudModule`) die een volledige CRUD-Vuex-module genereert voor een gegeven service — gebruikt door oudere list/create/update-views |
| `modules/notifications.js` | Status van toastmeldingen (show, color, text, timeout) |
| `modules/ux.js` | UX-status (bericht bij verboden toegang) |
| `security.js` | Legacy Vuex-securitymodule (vervangen door `securityStore.js`) |

Vermijd het toevoegen van nieuwe Vuex-modules. Gebruik Pinia voor elke nieuwe state.

## Composables

Naast stores bevat `assets/vue/composables/` gedeelde composition functions. Opvallende voorbeelden:

| Bestand | Doel |
|------|---------|
| `useFileManager.js` | Status en bewerkingen van de bestandsbrowser |
| `useTopbarLoggedIn.js` / `useTopbarNotLoggedIn.js` | Koppeling van het topbarmenu |
| `useTopbarTour.js` | Begeleide tour voor de topbar |
| `useDocumentCreate.js` / `useDocumentUpdate.js` / `useDocumentTemplates.js` | Helpers voor de documententool |
| `useCertificateTags.js` | Helpers voor tags in certificaatsjablonen |
| `sidebarMenu.js` | Navigatieboom van de zijbalk |
| `theme.js` | Laden en wisselen van thema's |
| `pluginRegion.js` | Weergave van door plugins geïnjecteerde UI-regio's |
| `userPermissions.js` | Permissiecontroles voor de huidige gebruiker |
| `notification.js` | Helpers voor pushmeldingen |
| `locale.js` | Detectie en wisselen van locale |
| `datatableList.js` / `datatableCreate.js` / `datatableUpdate.js` | Herbruikbare CRUD-patronen voor datatables |
| `useSocialInfo.js` / `useSocialMenuItems.js` | Helpers voor het sociale netwerk |
| `usePushSubscription.js` | Beheer van Web Push-abonnementen |
| `upload.js` | Helpers voor bestandsupload |
| `useConfirmation.js` | Helper voor bevestigingsdialogen |

Composables zijn ook georganiseerd in feature-submappen (`course/`, `session/`, `document/`, `calendar/`, `admin/`, `auth/`, `message/`, `skill/`, enz.). De volledige lijst staat in `assets/vue/composables/`.