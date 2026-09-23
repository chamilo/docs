# Tilstandsadministrasjon

Chamilo bruker to biblioteker for tilstandsadministrasjon side om side:

* **Pinia** — gjeldende standard for alle nye stores. Størstedelen av kodebasen bruker Pinia.
* **Vuex** — eldre store, fortsatt til stede og brukt av eldre visninger. Ny kode bør bruke Pinia.

## Pinia-stores

Pinia-stores ligger direkte i `assets/vue/store/`:

| Store-fil | Composable | Formål |
|-----------|-----------|---------|
| `securityStore.js` | `useSecurityStore` | Autentisert bruker, innlogging/utlogging, sesjonskontroll |
| `cidReq.js` | `useCidReqStore` | Gjeldende kurs-/sesjonskontekst (kurs-ID, sesjons-ID) |
| `courseSettingStore.js` | `useCourseSettings` | Hurtigbuffer for innstillinger på kursnivå |
| `enrolledStore.js` | `useEnrolledStore` | Brukerens påmeldingsdata |
| `platformConfig.js` | `usePlatformConfig` | Plattformkonfigurasjon, plugins, tema, OAuth2-leverandører |
| `messageRelUserStore.js` | `useMessageRelUserStore` | Meldingstilstand |
| `socialStore.js` | `useSocialStore` | Tilstand for sosialt nettverk |

### Security Store

```javascript
const securityStore = useSecurityStore()

// Check if user is logged in
if (securityStore.isAuthenticated) { ... }

// Access current user object
const user = securityStore.user
```

### CID Request Store

Sporer gjeldende kurs-/sesjonskontekst — påkrevd for enhver kursavgrenset API-operasjon:

```javascript
const cidReqStore = useCidReqStore()

// Current course and session objects
const course = cidReqStore.course
const session = cidReqStore.session
```

### Course Settings Store

Bufre innstillinger på kursnivå for å unngå gjentatte API-kall:

```javascript
const courseSettings = useCourseSettings()
const value = courseSettings.getSetting('exercise_generator')
```

### Platform Config Store

Holder plattformomfattende konfigurasjon hentet fra `/platform-config/list`:

```javascript
const platformConfig = usePlatformConfig()

// Loaded settings array, active theme, enabled plugins, OAuth2 providers
const theme = platformConfig.visualTheme
const plugins = platformConfig.plugins
```

## Vuex Store (eldre)

Vuex-storen er definert i `assets/vue/store/index.js` og inneholder:

| Modul | Formål |
|--------|---------|
| `modules/crud.js` | Fabrikk (`makeCrudModule`) som genererer en full CRUD Vuex-modul for en gitt tjeneste — brukt av eldre liste-/opprett-/oppdater-visninger |
| `modules/notifications.js` | Tilstand for toast-varsler (visning, farge, tekst, tidsavbrudd) |
| `modules/ux.js` | UX-tilstand (melding om forbudt tilgang) |
| `security.js` | Eldre Vuex-sikkerhetsmodul (erstattet av `securityStore.js`) |

Unngå å legge til nye Vuex-moduler. Bruk Pinia for all ny tilstand.

## Composables

I tillegg til stores inneholder `assets/vue/composables/` delte komposisjonsfunksjoner. Bemerkelsesverdige eksempler:

| Fil | Formål |
|------|---------|
| `useFileManager.js` | Tilstand og operasjoner for filutforsker |
| `useTopbarLoggedIn.js` / `useTopbarNotLoggedIn.js` | Kabling av toppmeny |
| `useTopbarTour.js` | Veiledet omvisning for toppfeltet |
| `useDocumentCreate.js` / `useDocumentUpdate.js` / `useDocumentTemplates.js` | Hjelpere for dokumentverktøyet |
| `useCertificateTags.js` | Hjelpere for merkelapper i sertifikatmaler |
| `sidebarMenu.js` | Navigasjonstrær i sidemenyen |
| `theme.js` | Innlasting og bytte av tema |
| `pluginRegion.js` | Rendering av plugin-injiserte UI-regioner |
| `userPermissions.js` | Tillatelsessjekker for gjeldende bruker |
| `notification.js` | Hjelpere for push-varsler |
| `locale.js` | Oppdagelse og bytte av locale |
| `datatableList.js` / `datatableCreate.js` / `datatableUpdate.js` | Gjenbrukbare CRUD-mønstre for datatabeller |
| `useSocialInfo.js` / `useSocialMenuItems.js` | Hjelpere for sosialt nettverk |
| `usePushSubscription.js` | Administrasjon av Web Push-abonnement |
| `upload.js` | Hjelpere for filopplasting |
| `useConfirmation.js` | Hjelper for bekreftelsesdialog |

Composables er også organisert i funksjonsundermapper (`course/`, `session/`, `document/`, `calendar/`, `admin/`, `auth/`, `message/`, `skill/`, osv.). Den fullstendige listen finnes i `assets/vue/composables/`.