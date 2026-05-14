# Zustandsverwaltung

Chamilo verwendet zwei Zustandsverwaltungsbibliotheken nebeneinander:

- **Pinia** — der aktuelle Standard für alle neuen Stores. Der Großteil des Codes verwendet Pinia.
- **Vuex** — veralteter Store, der noch vorhanden ist und von älteren Ansichten genutzt wird. Neuer Code sollte Pinia verwenden.

## Pinia Stores

Die Pinia Stores befinden sich direkt in `assets/vue/store/`:

| Store-Datei | Composable | Zweck |
|-------------|------------|-------|
| `securityStore.js` | `useSecurityStore` | Authentifizierter Benutzer, Login/Logout, Sitzungsprüfung |
| `cidReq.js` | `useCidReqStore` | Aktueller Kurs-/Sitzungskontext (Kurs-ID, Sitzungs-ID) |
| `courseSettingStore.js` | `useCourseSettings` | Cache für Kurseinstellungen |
| `enrolledStore.js` | `useEnrolledStore` | Daten zur Benutzeranmeldung |
| `platformConfig.js` | `usePlatformConfig` | Plattformkonfiguration, Plugins, Theme, OAuth2-Anbieter |
| `messageRelUserStore.js` | `useMessageRelUserStore` | Zustand für Nachrichten |
| `socialStore.js` | `useSocialStore` | Zustand für soziale Netzwerke |

### Security Store

```javascript
const securityStore = useSecurityStore()

// Prüfen, ob der Benutzer eingeloggt ist
if (securityStore.isAuthenticated) { ... }

// Zugriff auf das aktuelle Benutzerobjekt
const user = securityStore.user
```

### CID Request Store

Verfolgt den aktuellen Kurs-/Sitzungskontext — erforderlich für jede kursbezogene API-Operation:

```javascript
const cidReqStore = useCidReqStore()

// Aktuelle Kurs- und Sitzungsobjekte
const course = cidReqStore.course
const session = cidReqStore.session
```

### Course Settings Store

Speichert Kurseinstellungen im Cache, um wiederholte API-Aufrufe zu vermeiden:

```javascript
const courseSettings = useCourseSettings()
const value = courseSettings.getSetting('exercise_generator')
```

### Platform Config Store

Enthält plattformweite Konfigurationen, die von `/platform-config/list` abgerufen werden:

```javascript
const platformConfig = usePlatformConfig()

// Geladene Einstellungsarrays, aktives Theme, aktivierte Plugins, OAuth2-Anbieter
const theme = platformConfig.visualTheme
const plugins = platformConfig.plugins
```

## Vuex Store (Veraltet)

Der Vuex Store ist in `assets/vue/store/index.js` definiert und enthält:

| Modul | Zweck |
|-------|-------|
| `modules/crud.js` | Factory (`makeCrudModule`), die ein vollständiges CRUD-Vuex-Modul für einen gegebenen Dienst generiert — wird von älteren Listen-/Erstellungs-/Aktualisierungsansichten verwendet |
| `modules/notifications.js` | Zustand für Toast-Benachrichtigungen (Anzeige, Farbe, Text, Timeout) |
| `modules/ux.js` | UX-Zustand (Nachricht bei verbotenem Zugriff) |
| `security.js` | Veraltetes Vuex-Sicherheitsmodul (ersetzt durch `securityStore.js`) |

Vermeiden Sie das Hinzufügen neuer Vuex-Module. Verwenden Sie Pinia für jeden neuen Zustand.

## Composables

Zusätzlich zu den Stores enthält `assets/vue/composables/` gemeinsame Kompositionsfunktionen. Bemerkenswerte Beispiele:

| Datei | Zweck |
|-------|-------|
| `useFileManager.js` | Zustand und Operationen des Dateibrowsers |
| `useTopbarLoggedIn.js` / `useTopbarNotLoggedIn.js` | Verkabelung des oberen Menüs |
| `useTopbarTour.js` | Geführte Tour für die obere Leiste |
| `useDocumentCreate.js` / `useDocumentUpdate.js` / `useDocumentTemplates.js` | Hilfsfunktionen für das Dokumenten-Tool |
| `useCertificateTags.js` | Hilfsfunktionen für Zertifikatvorlagen-Tags |
| `sidebarMenu.js` | Navigationsbaum der Seitenleiste |
| `theme.js` | Laden und Wechseln von Themes |
| `pluginRegion.js` | Rendern von UI-Regionen, die von Plugins eingefügt wurden |
| `userPermissions.js` | Berechtigungsprüfungen für den aktuellen Benutzer |
| `notification.js` | Hilfsfunktionen für Push-Benachrichtigungen |
| `locale.js` | Erkennung und Wechsel der Sprache |
| `datatableList.js` / `datatableCreate.js` / `datatableUpdate.js` | Wiederverwendbare CRUD-Muster für Datentabellen |
| `useSocialInfo.js` / `useSocialMenuItems.js` | Hilfsfunktionen für soziale Netzwerke |
| `usePushSubscription.js` | Verwaltung von Web-Push-Abonnements |
| `upload.js` | Hilfsfunktionen für Datei-Uploads |
| `useConfirmation.js` | Hilfsfunktion für Bestätigungsdialoge |

Composables sind auch in Funktionsunterverzeichnisse organisiert (`course/`, `session/`, `document/`, `calendar/`, `admin/`, `auth/`, `message/`, `skill/` usw.). Die vollständige Liste befindet sich in `assets/vue/composables/`.