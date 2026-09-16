# Gestione dello Stato

Chamilo utilizza due librerie di gestione dello stato fianco a fianco:

- **Pinia** — lo standard attuale per tutti i nuovi store. La maggior parte del codice base utilizza Pinia.
- **Vuex** — store legacy, ancora presente e utilizzato dalle viste più vecchie. Il nuovo codice dovrebbe utilizzare Pinia.

## Store Pinia

Gli store Pinia si trovano direttamente in `assets/vue/store/`:

| File dello store | Composable | Scopo |
|------------------|------------|-------|
| `securityStore.js` | `useSecurityStore` | Utente autenticato, login/logout, controllo sessione |
| `cidReq.js` | `useCidReqStore` | Contesto corrente del corso/sessione (ID corso, ID sessione) |
| `courseSettingStore.js` | `useCourseSettings` | Cache delle impostazioni a livello di corso |
| `enrolledStore.js` | `useEnrolledStore` | Dati di iscrizione dell'utente |
| `platformConfig.js` | `usePlatformConfig` | Configurazione della piattaforma, plugin, tema, provider OAuth2 |
| `messageRelUserStore.js` | `useMessageRelUserStore` | Stato della messaggistica |
| `socialStore.js` | `useSocialStore` | Stato della rete sociale |

### Store di Sicurezza

```javascript
const securityStore = useSecurityStore()

// Verifica se l'utente è loggato
if (securityStore.isAuthenticated) { ... }

// Accedi all'oggetto utente corrente
const user = securityStore.user
```

### Store di Richiesta CID

Tiene traccia del contesto corrente del corso/sessione — necessario per qualsiasi operazione API con ambito corso:

```javascript
const cidReqStore = useCidReqStore()

// Oggetti corso e sessione correnti
const course = cidReqStore.course
const session = cidReqStore.session
```

### Store delle Impostazioni del Corso

Memorizza nella cache le impostazioni a livello di corso per evitare chiamate API ripetute:

```javascript
const courseSettings = useCourseSettings()
const value = courseSettings.getSetting('exercise_generator')
```

### Store di Configurazione della Piattaforma

Contiene la configurazione a livello di piattaforma ottenuta da `/platform-config/list`:

```javascript
const platformConfig = usePlatformConfig()

// Array di impostazioni caricate, tema attivo, plugin abilitati, provider OAuth2
const theme = platformConfig.visualTheme
const plugins = platformConfig.plugins
```

## Store Vuex (Legacy)

Lo store Vuex è definito in `assets/vue/store/index.js` e contiene:

| Modulo | Scopo |
|--------|-------|
| `modules/crud.js` | Factory (`makeCrudModule`) che genera un modulo Vuex CRUD completo per un dato servizio — utilizzato dalle viste più vecchie di elenco/creazione/aggiornamento |
| `modules/notifications.js` | Stato delle notifiche toast (mostra, colore, testo, timeout) |
| `modules/ux.js` | Stato UX (messaggio di accesso vietato) |
| `security.js` | Modulo di sicurezza Vuex legacy (sostituito da `securityStore.js`) |

Evitare di aggiungere nuovi moduli Vuex. Utilizzare Pinia per qualsiasi nuovo stato.

## Composables

Oltre agli store, `assets/vue/composables/` contiene funzioni di composizione condivise. Esempi notevoli:

| File | Scopo |
|------|-------|
| `useFileManager.js` | Stato e operazioni del browser di file |
| `useTopbarLoggedIn.js` / `useTopbarNotLoggedIn.js` | Configurazione del menu della barra superiore |
| `useTopbarTour.js` | Tour guidato per la barra superiore |
| `useDocumentCreate.js` / `useDocumentUpdate.js` / `useDocumentTemplates.js` | Helper per lo strumento di documentazione |
| `useCertificateTags.js` | Helper per i tag dei modelli di certificato |
| `sidebarMenu.js` | Albero di navigazione della barra laterale |
| `theme.js` | Caricamento e cambio del tema |
| `pluginRegion.js` | Rendering delle regioni UI iniettate dai plugin |
| `userPermissions.js` | Controlli dei permessi per l'utente corrente |
| `notification.js` | Helper per le notifiche push |
| `locale.js` | Rilevamento e cambio della lingua |
| `datatableList.js` / `datatableCreate.js` / `datatableUpdate.js` | Pattern CRUD riutilizzabili per datatable |
| `useSocialInfo.js` / `useSocialMenuItems.js` | Helper per la rete sociale |
| `usePushSubscription.js` | Gestione delle sottoscrizioni Web Push |
| `upload.js` | Helper per il caricamento di file |
| `useConfirmation.js` | Helper per la finestra di dialogo di conferma |

I composables sono anche organizzati in sottodirectory per funzionalità (`course/`, `session/`, `document/`, `calendar/`, `admin/`, `auth/`, `message/`, `skill/`, ecc.). L'elenco completo si trova in `assets/vue/composables/`.