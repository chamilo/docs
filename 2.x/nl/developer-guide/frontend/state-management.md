# Staatbeheer

Chamilo gebruikt twee bibliotheken voor staatbeheer naast elkaar:

- **Pinia** — de huidige standaard voor alle nieuwe stores. Het merendeel van de codebase gebruikt Pinia.
- **Vuex** — verouderde store, nog steeds aanwezig en gebruikt door oudere weergaven. Nieuwe code moet Pinia gebruiken.

## Pinia Stores

De Pinia stores bevinden zich direct in `assets/vue/store/`:

| Storebestand | Composable | Doel |
|--------------|------------|------|
| `securityStore.js` | `useSecurityStore` | Geauthenticeerde gebruiker, inloggen/uitloggen, sessiecontrole |
| `cidReq.js` | `useCidReqStore` | Huidige cursus/sessiecontext (cursus-ID, sessie-ID) |
| `courseSettingStore.js` | `useCourseSettings` | Cache voor cursusniveau-instellingen |
| `enrolledStore.js` | `useEnrolledStore` | Gegevens over inschrijvingen van gebruikers |
| `platformConfig.js` | `usePlatformConfig` | Platformconfiguratie, plugins, thema, OAuth2-providers |
| `messageRelUserStore.js` | `useMessageRelUserStore` | Berichtenstatus |
| `socialStore.js` | `useSocialStore` | Status van sociale netwerken |

### Beveiligingsstore

```javascript
const securityStore = useSecurityStore()

// Controleren of de gebruiker is ingelogd
if (securityStore.isAuthenticated) { ... }

// Toegang tot het huidige gebruikersobject
const user = securityStore.user
```

### CID Verzoekstore

Volgt de huidige cursus/sessiecontext — vereist voor elke cursusgebonden API-operatie:

```javascript
const cidReqStore = useCidReqStore()

// Huidige cursus- en sessieobjecten
const course = cidReqStore.course
const session = cidReqStore.session
```

### Cursusinstellingenstore

Slaat cursusniveau-instellingen op in de cache om herhaalde API-aanroepen te vermijden:

```javascript
const courseSettings = useCourseSettings()
const value = courseSettings.getSetting('exercise_generator')
```

### Platformconfiguratiestore

Bevat platformbrede configuratie opgehaald van `/platform-config/list`:

```javascript
const platformConfig = usePlatformConfig()

// Geladen instellingenarray, actief thema, ingeschakelde plugins, OAuth2-providers
const theme = platformConfig.visualTheme
const plugins = platformConfig.plugins
```

## Vuex Store (Verouderd)

De Vuex store is gedefinieerd in `assets/vue/store/index.js` en bevat:

| Module | Doel |
|--------|------|
| `modules/crud.js` | Fabriek (`makeCrudModule`) die een volledige CRUD Vuex-module genereert voor een bepaalde service — gebruikt door oudere lijst/aanmaken/bijwerken weergaven |
| `modules/notifications.js` | Status van toastmeldingen (weergeven, kleur, tekst, time-out) |
| `modules/ux.js` | UX-status (bericht over verboden toegang) |
| `security.js` | Verouderde Vuex-beveiligingsmodule (vervangen door `securityStore.js`) |

Vermijd het toevoegen van nieuwe Vuex-modules. Gebruik Pinia voor nieuwe statussen.

## Composables

Naast stores bevat `assets/vue/composables/` gedeelde compositiefuncties. Opmerkelijke voorbeelden:

| Bestand | Doel |
|---------|------|
| `useFileManager.js` | Bestandsbrowserstatus en -operaties |
| `useTopbarLoggedIn.js` / `useTopbarNotLoggedIn.js` | Bedrading van het bovenbalkmenu |
| `useTopbarTour.js` | Begeleide tour voor de bovenbalk |
| `useDocumentCreate.js` / `useDocumentUpdate.js` / `useDocumentTemplates.js` | Hulpmiddelen voor documenttools |
| `useCertificateTags.js` | Hulpmiddelen voor certificaat-sjabloontags |
| `sidebarMenu.js` | Navigatieboom voor zijbalk |
| `theme.js` | Laden en wisselen van thema |
| `pluginRegion.js` | Rendering van door plugins geïnjecteerde UI-regio's |
| `userPermissions.js` | Controle van rechten voor de huidige gebruiker |
| `notification.js` | Hulpmiddelen voor pushmeldingen |
| `locale.js` | Detectie en wisseling van taalinstellingen |
| `datatableList.js` / `datatableCreate.js` / `datatableUpdate.js` | Herbruikbare CRUD-patronen voor datatabellen |
| `useSocialInfo.js` / `useSocialMenuItems.js` | Hulpmiddelen voor sociale netwerken |
| `usePushSubscription.js` | Beheer van Web Push-abonnementen |
| `upload.js` | Hulpmiddelen voor bestandsuploads |
| `useConfirmation.js` | Hulpmiddel voor bevestigingsdialoog |

Composables zijn ook georganiseerd in functie-submappen (`course/`, `session/`, `document/`, `calendar/`, `admin/`, `auth/`, `message/`, `skill/`, enz.). De volledige lijst bevindt zich in `assets/vue/composables/`.