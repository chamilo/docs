# Zustandsverwaltung

Chamilo verwendet zwei Bibliotheken zur Zustandsverwaltung nebeneinander:

* **Pinia** — der aktuelle Standard für alle neuen Stores. Der Großteil der Codebasis verwendet Pinia.
* **Vuex** — Legacy-Store, der weiterhin vorhanden ist und von älteren Views genutzt wird. Neuer Code sollte Pinia verwenden.

## Pinia-Stores

Die Pinia-Stores liegen direkt in `assets/vue/store/`:

| Store-Datei | Composable | Zweck |
|-----------|-----------|---------|
| `securityStore.js` | `useSecurityStore` | Authentifizierter Benutzer, Anmeldung/Abmeldung, Sitzungsprüfung |
| `cidReq.js` | `useCidReqStore` | Aktueller Kurs-/Sitzungskontext (Kurs-ID, Sitzungs-ID) |
| `courseSettingStore.js` | `useCourseSettings` | Cache für kursbezogene Einstellungen |
| `enrolledStore.js` | `useEnrolledStore` | Einschreibungsdaten des Benutzers |
| `platformConfig.js` | `usePlatformConfig` | Plattformkonfiguration, Plugins, Theme, OAuth2-Anbieter |
| `messageRelUserStore.js` | `useMessageRelUserStore` | Messaging-Zustand |
| `socialStore.js` | `useSocialStore` | Zustand des sozialen Netzwerks |

### Security Store

```javascript
const securityStore = useSecurityStore()

// Check if user is logged in
if (securityStore.isAuthenticated) { ... }

// Access current user object
const user = securityStore.user
```

### CID-Request-Store

Verfolgt den aktuellen Kurs-/Sitzungskontext — erforderlich für jede kursbezogene API-Operation:

```javascript
const cidReqStore = useCidReqStore()

// Current course and session objects
const course = cidReqStore.course
const session = cidReqStore.session
```

### Course-Settings-Store

Zwischenspeichert kursbezogene Einstellungen, um wiederholte API-Aufrufe zu vermeiden:

```javascript
const courseSettings = useCourseSettings()
const value = courseSettings.getSetting('exercise_generator')
```

### Platform-Config-Store

Enthält die plattformweite Konfiguration, die von `/platform-config/list` abgerufen wird:

```javascript
const platformConfig = usePlatformConfig()

// Loaded settings array, active theme, enabled plugins, OAuth2 providers
const theme = platformConfig.visualTheme
const plugins = platformConfig.plugins
```

## Vuex-Store (Legacy)

Der Vuex-Store ist in `assets/vue/store/index.js` definiert und enthält:

| Modul | Zweck |
|--------|---------|
| `modules/crud.js` | Factory (`makeCrudModule`), die ein vollständiges CRUD-Vuex-Modul für einen gegebenen Service erzeugt — verwendet von älteren Listen-/Erstellungs-/Aktualisierungs-Views |
| `modules/notifications.js` | Zustand der Toast-Benachrichtigungen (Anzeige, Farbe, Text, Timeout) |
| `modules/ux.js` | UX-Zustand (Meldung bei verweigertem Zugriff) |
| `security.js` | Legacy-Vuex-Sicherheitsmodul (abgelöst durch `securityStore.js`) |

Vermeiden Sie das Hinzufügen neuer Vuex-Module. Verwenden Sie Pinia für jeden neuen Zustand.

## Composables

Zusätzlich zu den Stores enthält `assets/vue/composables/` gemeinsame Composition Functions. Bemerkenswerte Beispiele:

| Datei | Zweck |
|------|---------|
| `useFileManager.js` | Zustand und Operationen des Dateibrowsers |
| `useTopbarLoggedIn.js` / `useTopbarNotLoggedIn.js` | Verdrahtung des Top-Bar-Menüs |
| `useTopbarTour.js` | Geführte Tour für die Top-Bar |
| `useDocumentCreate.js` / `useDocumentUpdate.js` / `useDocumentTemplates.js` | Hilfsfunktionen für das Dokumenten-Tool |
| `useCertificateTags.js` | Hilfsfunktionen für Tags in Zertifikatsvorlagen |
| `sidebarMenu.js` | Navigationsbaum der Seitenleiste |
| `theme.js` | Laden und Wechseln des Themes |
| `pluginRegion.js` | Rendering von durch Plugins injizierten UI-Regionen |
| `userPermissions.js` | Berechtigungsprüfungen für den aktuellen Benutzer |
| `notification.js` | Hilfsfunktionen für Push-Benachrichtigungen |
| `locale.js` | Erkennung und Wechsel der Locale |
| `datatableList.js` / `datatableCreate.js` / `datatableUpdate.js` | Wiederverwendbare Datatable-CRUD-Muster |
| `useSocialInfo.js` / `useSocialMenuItems.js` | Hilfsfunktionen für das soziale Netzwerk |
| `usePushSubscription.js` | Verwaltung von Web-Push-Abonnements |
| `upload.js` | Hilfsfunktionen für Datei-Uploads |
| `useConfirmation.js` | Hilfsfunktion für Bestätigungsdialoge |

Composables sind außerdem in Feature-Unterverzeichnissen organisiert (`course/`, `session/`, `document/`, `calendar/`, `admin/`, `auth/`, `message/`, `skill/` usw.). Die vollständige Liste befindet sich in `assets/vue/composables/`.