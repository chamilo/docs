# Gestione dello stato

Chamilo utilizza due librerie di gestione dello stato in parallelo:

* **Pinia** — lo standard attuale per tutti i nuovi store. La maggior parte del codice utilizza Pinia.
* **Vuex** — store legacy, ancora presente e utilizzato dalle viste più datate. Il nuovo codice dovrebbe usare Pinia.

## Store Pinia

Gli store Pinia si trovano direttamente in `assets/vue/store/`:

| File dello store | Composable | Scopo |
|-----------|-----------|---------|
| `securityStore.js` | `useSecurityStore` | Utente autenticato, login/logout, verifica della sessione |
| `cidReq.js` | `useCidReqStore` | Contesto corrente di corso/sessione (ID corso, ID sessione) |
| `courseSettingStore.js` | `useCourseSettings` | Cache delle impostazioni a livello di corso |
| `enrolledStore.js` | `useEnrolledStore` | Dati di iscrizione dell'utente |
| `platformConfig.js` | `usePlatformConfig` | Configurazione della piattaforma, plugin, tema, provider OAuth2 |
| `messageRelUserStore.js` | `useMessageRelUserStore` | Stato della messaggistica |
| `socialStore.js` | `useSocialStore` | Stato del social network |

### Security Store

```javascript
const securityStore = useSecurityStore()

// Check if user is logged in
if (securityStore.isAuthenticated) { ... }

// Access current user object
const user = securityStore.user
```

### CID Request Store

Traccia il contesto corrente di corso/sessione — necessario per qualsiasi operazione API con ambito di corso:

```javascript
const cidReqStore = useCidReqStore()

// Current course and session objects
const course = cidReqStore.course
const session = cidReqStore.session
```

### Course Settings Store

Memorizza in cache le impostazioni a livello di corso per evitare chiamate API ripetute:

```javascript
const courseSettings = useCourseSettings()
const value = courseSettings.getSetting('exercise_generator')
```

### Platform Config Store

Contiene la configurazione a livello di piattaforma recuperata da `/platform-config/list`:

```javascript
const platformConfig = usePlatformConfig()

// Loaded settings array, active theme, enabled plugins, OAuth2 providers
const theme = platformConfig.visualTheme
const plugins = platformConfig.plugins
```

## Store Vuex (legacy)

Lo store Vuex è definito in `assets/vue/store/index.js` e contiene:

| Modulo | Scopo |
|--------|---------|
| `modules/crud.js` | Factory (`makeCrudModule`) che genera un modulo Vuex CRUD completo per un dato servizio — utilizzata dalle viste list/create/update più datate |
| `modules/notifications.js` | Stato delle notifiche toast (show, color, text, timeout) |
| `modules/ux.js` | Stato UX (messaggio di accesso vietato) |
| `security.js` | Modulo di sicurezza Vuex legacy (sostituito da `securityStore.js`) |

Evitare di aggiungere nuovi moduli Vuex. Usare Pinia per qualsiasi nuovo stato.

## Composable

Oltre agli store, `assets/vue/composables/` contiene funzioni di composition condivise. Esempi rilevanti:

| File | Scopo |
|------|---------|
| `useFileManager.js` | Stato e operazioni del file browser |
| `useTopbarLoggedIn.js` / `useTopbarNotLoggedIn.js` | Collegamento del menu della barra superiore |
| `useTopbarTour.js` | Tour guidato per la barra superiore |
| `useDocumentCreate.js` / `useDocumentUpdate.js` / `useDocumentTemplates.js` | Helper dello strumento Documenti |
| `useCertificateTags.js` | Helper per i tag dei modelli di certificato |
| `sidebarMenu.js` | Albero di navigazione della barra laterale |
| `theme.js` | Caricamento e cambio del tema |
| `pluginRegion.js` | Rendering delle regioni UI iniettate dai plugin |
| `userPermissions.js` | Controlli dei permessi per l'utente corrente |
| `notification.js` | Helper per le notifiche push |
| `locale.js` | Rilevamento e cambio della lingua |
| `datatableList.js` / `datatableCreate.js` / `datatableUpdate.js` | Pattern CRUD riutilizzabili per datatable |
| `useSocialInfo.js` / `useSocialMenuItems.js` | Helper del social network |
| `usePushSubscription.js` | Gestione delle sottoscrizioni Web Push |
| `upload.js` | Helper per il caricamento dei file |
| `useConfirmation.js` | Helper per i dialoghi di conferma |

I composable sono inoltre organizzati in sottodirectory per funzionalità (`course/`, `session/`, `document/`, `calendar/`, `admin/`, `auth/`, `message/`, `skill/`, ecc.). L'elenco completo si trova in `assets/vue/composables/`.