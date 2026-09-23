# Statehantering

Chamilo använder två bibliotek för statehantering sida vid sida:

* **Pinia** — den nuvarande standarden för alla nya stores. Merparten av kodbasen använder Pinia.
* **Vuex** — äldre store, fortfarande närvarande och använd av äldre vyer. Ny kod ska använda Pinia.

## Pinia-stores

Pinia-stores ligger direkt i `assets/vue/store/`:

| Store-fil | Composable | Syfte |
|-----------|-----------|---------|
| `securityStore.js` | `useSecurityStore` | Autentiserad användare, inloggning/utloggning, sessionskontroll |
| `cidReq.js` | `useCidReqStore` | Aktuell kurs-/sessionskontext (kurs-ID, sessions-ID) |
| `courseSettingStore.js` | `useCourseSettings` | Cache för kursnivåinställningar |
| `enrolledStore.js` | `useEnrolledStore` | Användarens inskrivningsdata |
| `platformConfig.js` | `usePlatformConfig` | Plattformskonfiguration, plugins, tema, OAuth2-leverantörer |
| `messageRelUserStore.js` | `useMessageRelUserStore` | Meddelandestatus |
| `socialStore.js` | `useSocialStore` | Status för det sociala nätverket |

### Security Store

```javascript
const securityStore = useSecurityStore()

// Check if user is logged in
if (securityStore.isAuthenticated) { ... }

// Access current user object
const user = securityStore.user
```

### CID Request Store

Spårar den aktuella kurs-/sessionskontexten — krävs för varje kursavgränsad API-operation:

```javascript
const cidReqStore = useCidReqStore()

// Current course and session objects
const course = cidReqStore.course
const session = cidReqStore.session
```

### Course Settings Store

Cachar kursnivåinställningar för att undvika upprepade API-anrop:

```javascript
const courseSettings = useCourseSettings()
const value = courseSettings.getSetting('exercise_generator')
```

### Platform Config Store

Håller plattformsomfattande konfiguration hämtad från `/platform-config/list`:

```javascript
const platformConfig = usePlatformConfig()

// Loaded settings array, active theme, enabled plugins, OAuth2 providers
const theme = platformConfig.visualTheme
const plugins = platformConfig.plugins
```

## Vuex-store (äldre)

Vuex-storen definieras i `assets/vue/store/index.js` och innehåller:

| Modul | Syfte |
|--------|---------|
| `modules/crud.js` | Fabrik (`makeCrudModule`) som genererar en fullständig CRUD-Vuex-modul för en given tjänst — används av äldre list-/skapa-/uppdatera-vyer |
| `modules/notifications.js` | Toast-notifikationsstatus (visa, färg, text, timeout) |
| `modules/ux.js` | UX-status (meddelande om förbjuden åtkomst) |
| `security.js` | Äldre Vuex-säkerhetsmodul (ersatt av `securityStore.js`) |

Undvik att lägga till nya Vuex-moduler. Använd Pinia för all ny state.

## Composables

Utöver stores innehåller `assets/vue/composables/` delade composition functions. Anmärkningsvärda exempel:

| Fil | Syfte |
|------|---------|
| `useFileManager.js` | Filbläddrarens state och operationer |
| `useTopbarLoggedIn.js` / `useTopbarNotLoggedIn.js` | Koppling av toppmenyn |
| `useTopbarTour.js` | Guidad tur för toppfältet |
| `useDocumentCreate.js` / `useDocumentUpdate.js` / `useDocumentTemplates.js` | Hjälpfunktioner för dokumentverktyget |
| `useCertificateTags.js` | Hjälpfunktioner för taggar i certifikatmallar |
| `sidebarMenu.js` | Sidomenyns navigeringsträd |
| `theme.js` | Inläsning och byte av tema |
| `pluginRegion.js` | Rendering av plugin-injicerade UI-regioner |
| `userPermissions.js` | Behörighetskontroller för den aktuella användaren |
| `notification.js` | Hjälpfunktioner för push-notifikationer |
| `locale.js` | Språkidentifiering och byte av locale |
| `datatableList.js` / `datatableCreate.js` / `datatableUpdate.js` | Återanvändbara CRUD-mönster för datatabeller |
| `useSocialInfo.js` / `useSocialMenuItems.js` | Hjälpfunktioner för det sociala nätverket |
| `usePushSubscription.js` | Hantering av Web Push-prenumerationer |
| `upload.js` | Hjälpfunktioner för filuppladdning |
| `useConfirmation.js` | Hjälpfunktion för bekräftelsedialog |

Composables är också organiserade i funktionsunderkataloger (`course/`, `session/`, `document/`, `calendar/`, `admin/`, `auth/`, `message/`, `skill/` m.fl.). Den fullständiga listan finns i `assets/vue/composables/`.