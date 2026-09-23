# Tilstandsstyring

Chamilo bruger to biblioteker til tilstandsstyring side om side:

* **Pinia** — den aktuelle standard for alle nye stores. Størstedelen af kodebasen bruger Pinia.
* **Vuex** — ældre store, som stadig findes og bruges af ældre visninger. Ny kode bør bruge Pinia.

## Pinia-stores

Pinia-stores ligger direkte i `assets/vue/store/`:

| Store-fil | Composable | Formål |
|-----------|-----------|---------|
| `securityStore.js` | `useSecurityStore` | Autentificeret bruger, login/logout, sessionskontrol |
| `cidReq.js` | `useCidReqStore` | Aktuel kursus-/sessionskontekst (kursus-ID, sessions-ID) |
| `courseSettingStore.js` | `useCourseSettings` | Cache af indstillinger på kursusniveau |
| `enrolledStore.js` | `useEnrolledStore` | Brugerens tilmeldingsdata |
| `platformConfig.js` | `usePlatformConfig` | Platformkonfiguration, plugins, tema, OAuth2-udbydere |
| `messageRelUserStore.js` | `useMessageRelUserStore` | Beskedtilstand |
| `socialStore.js` | `useSocialStore` | Tilstand for det sociale netværk |

### Security Store

```javascript
const securityStore = useSecurityStore()

// Check if user is logged in
if (securityStore.isAuthenticated) { ... }

// Access current user object
const user = securityStore.user
```

### CID Request Store

Holder styr på den aktuelle kursus-/sessionskontekst — påkrævet for enhver kursusafgrænset API-operation:

```javascript
const cidReqStore = useCidReqStore()

// Current course and session objects
const course = cidReqStore.course
const session = cidReqStore.session
```

### Course Settings Store

Cacher indstillinger på kursusniveau for at undgå gentagne API-kald:

```javascript
const courseSettings = useCourseSettings()
const value = courseSettings.getSetting('exercise_generator')
```

### Platform Config Store

Indeholder platformdækkende konfiguration hentet fra `/platform-config/list`:

```javascript
const platformConfig = usePlatformConfig()

// Loaded settings array, active theme, enabled plugins, OAuth2 providers
const theme = platformConfig.visualTheme
const plugins = platformConfig.plugins
```

## Vuex-store (ældre)

Vuex-storen er defineret i `assets/vue/store/index.js` og indeholder:

| Modul | Formål |
|--------|---------|
| `modules/crud.js` | Fabrik (`makeCrudModule`), der genererer et komplet CRUD-Vuex-modul til en given service — bruges af ældre liste-/opret-/opdater-visninger |
| `modules/notifications.js` | Tilstand for toast-notifikationer (vis, farve, tekst, timeout) |
| `modules/ux.js` | UX-tilstand (besked om forbudt adgang) |
| `security.js` | Ældre Vuex-sikkerhedsmodul (erstattet af `securityStore.js`) |

Undgå at tilføje nye Vuex-moduler. Brug Pinia til al ny tilstand.

## Composables

Ud over stores indeholder `assets/vue/composables/` delte composition-funktioner. Bemærkelsesværdige eksempler:

| Fil | Formål |
|------|---------|
| `useFileManager.js` | Tilstand og handlinger for filbrowser |
| `useTopbarLoggedIn.js` / `useTopbarNotLoggedIn.js` | Tilkobling af topbjælkemenu |
| `useTopbarTour.js` | Guidet tur for topbjælken |
| `useDocumentCreate.js` / `useDocumentUpdate.js` / `useDocumentTemplates.js` | Hjælpere til dokumentværktøjet |
| `useCertificateTags.js` | Hjælpere til tags i certifikatskabeloner |
| `sidebarMenu.js` | Navigationsstruktur i sidebjælken |
| `theme.js` | Indlæsning og skift af tema |
| `pluginRegion.js` | Rendering af plugin-injicerede UI-regioner |
| `userPermissions.js` | Rettighedstjek for den aktuelle bruger |
| `notification.js` | Hjælpere til push-notifikationer |
| `locale.js` | Registrering og skift af sprog |
| `datatableList.js` / `datatableCreate.js` / `datatableUpdate.js` | Genbrugelige CRUD-mønstre til datatabeller |
| `useSocialInfo.js` / `useSocialMenuItems.js` | Hjælpere til det sociale netværk |
| `usePushSubscription.js` | Administration af Web Push-abonnementer |
| `upload.js` | Hjælpere til filupload |
| `useConfirmation.js` | Hjælper til bekræftelsesdialog |

Composables er også organiseret i funktionsundermapper (`course/`, `session/`, `document/`, `calendar/`, `admin/`, `auth/`, `message/`, `skill/` osv.). Den fulde liste findes i `assets/vue/composables/`.