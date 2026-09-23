# Tilanhallinta

Chamilo käyttää kahta tilanhallintakirjastoa rinnakkain:

* **Pinia** — nykyinen standardi kaikille uusille storeille. Suurin osa koodikannasta käyttää Piniaa.
* **Vuex** — vanha store, joka on yhä olemassa ja jota vanhemmat näkymät käyttävät. Uuden koodin tulee käyttää Piniaa.

## Pinia-storet

Pinia-storet sijaitsevat suoraan hakemistossa `assets/vue/store/`:

| Store-tiedosto | Composable | Tarkoitus |
|-----------|-----------|---------|
| `securityStore.js` | `useSecurityStore` | Kirjautunut käyttäjä, kirjautuminen/uloskirjautuminen, istuntotarkistus |
| `cidReq.js` | `useCidReqStore` | Nykyinen kurssi-/istuntokonteksti (kurssin ID, istunnon ID) |
| `courseSettingStore.js` | `useCourseSettings` | Kurssitason asetusten välimuisti |
| `enrolledStore.js` | `useEnrolledStore` | Käyttäjän ilmoittautumistiedot |
| `platformConfig.js` | `usePlatformConfig` | Alustan konfiguraatio, liitännäiset, teema, OAuth2-tarjoajat |
| `messageRelUserStore.js` | `useMessageRelUserStore` | Viestinnän tila |
| `socialStore.js` | `useSocialStore` | Sosiaalisen verkon tila |

### Security Store

```javascript
const securityStore = useSecurityStore()

// Check if user is logged in
if (securityStore.isAuthenticated) { ... }

// Access current user object
const user = securityStore.user
```

### CID Request Store

Seuraa nykyistä kurssi-/istuntokontekstia — tarvitaan kaikissa kurssikohtaisissa API-operaatioissa:

```javascript
const cidReqStore = useCidReqStore()

// Current course and session objects
const course = cidReqStore.course
const session = cidReqStore.session
```

### Course Settings Store

Välimuistittaa kurssitason asetukset toistuvien API-kutsujen välttämiseksi:

```javascript
const courseSettings = useCourseSettings()
const value = courseSettings.getSetting('exercise_generator')
```

### Platform Config Store

Sisältää alustanlaajuisen konfiguraation, joka haetaan osoitteesta `/platform-config/list`:

```javascript
const platformConfig = usePlatformConfig()

// Loaded settings array, active theme, enabled plugins, OAuth2 providers
const theme = platformConfig.visualTheme
const plugins = platformConfig.plugins
```

## Vuex-store (vanha)

Vuex-store on määritelty tiedostossa `assets/vue/store/index.js` ja sisältää:

| Moduuli | Tarkoitus |
|--------|---------|
| `modules/crud.js` | Tehdas (`makeCrudModule`), joka luo täyden CRUD-Vuex-moduulin annetulle palvelulle — vanhempien lista-/luonti-/päivitysnäkymien käytössä |
| `modules/notifications.js` | Toast-ilmoitusten tila (näyttö, väri, teksti, aikakatkaisu) |
| `modules/ux.js` | UX-tila (pääsy kielletty -viesti) |
| `security.js` | Vanha Vuex-turvallisuusmoduuli (korvattu tiedostolla `securityStore.js`) |

Älä lisää uusia Vuex-moduuleja. Käytä Piniaa kaikelle uudelle tilalle.

## Composablet

Storejen lisäksi hakemisto `assets/vue/composables/` sisältää jaettuja composition-funktioita. Huomionarvoisia esimerkkejä:

| Tiedosto | Tarkoitus |
|------|---------|
| `useFileManager.js` | Tiedostoselaimen tila ja toiminnot |
| `useTopbarLoggedIn.js` / `useTopbarNotLoggedIn.js` | Yläpalkin valikon kytkentä |
| `useTopbarTour.js` | Ohjattu kierros yläpalkille |
| `useDocumentCreate.js` / `useDocumentUpdate.js` / `useDocumentTemplates.js` | Dokumenttityökalun apurit |
| `useCertificateTags.js` | Todistuspohjan tunnisteiden apurit |
| `sidebarMenu.js` | Sivupalkin navigointipuu |
| `theme.js` | Teeman lataus ja vaihto |
| `pluginRegion.js` | Liitännäisten injektoimien käyttöliittymäalueiden renderöinti |
| `userPermissions.js` | Nykyisen käyttäjän käyttöoikeustarkistukset |
| `notification.js` | Push-ilmoitusten apurit |
| `locale.js` | Kielialueen tunnistus ja vaihto |
| `datatableList.js` / `datatableCreate.js` / `datatableUpdate.js` | Uudelleenkäytettävät datatable-CRUD-mallit |
| `useSocialInfo.js` / `useSocialMenuItems.js` | Sosiaalisen verkon apurit |
| `usePushSubscription.js` | Web Push -tilauksen hallinta |
| `upload.js` | Tiedostonlatauksen apurit |
| `useConfirmation.js` | Vahvistusikkunan apuri |

Composablet on myös organisoitu ominaisuuskohtaisiin alihakemistoihin (`course/`, `session/`, `document/`, `calendar/`, `admin/`, `auth/`, `message/`, `skill/` jne.). Täydellinen luettelo on hakemistossa `assets/vue/composables/`.