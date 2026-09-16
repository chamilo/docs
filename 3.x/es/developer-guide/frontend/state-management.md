# Gestión de estado

Chamilo utiliza dos bibliotecas de gestión de estado en paralelo:

* **Pinia** — el estándar actual para todos los stores nuevos. La mayor parte del código utiliza Pinia.
* **Vuex** — store heredado, aún presente y usado por vistas antiguas. El código nuevo debe usar Pinia.

## Stores de Pinia

Los stores de Pinia se encuentran directamente en `assets/vue/store/`:

| Archivo del store | Composable | Propósito |
|-----------|-----------|---------|
| `securityStore.js` | `useSecurityStore` | Usuario autenticado, inicio/cierre de sesión, comprobación de sesión |
| `cidReq.js` | `useCidReqStore` | Contexto actual de curso/sesión (ID de curso, ID de sesión) |
| `courseSettingStore.js` | `useCourseSettings` | Caché de ajustes a nivel de curso |
| `enrolledStore.js` | `useEnrolledStore` | Datos de inscripción del usuario |
| `platformConfig.js` | `usePlatformConfig` | Configuración de la plataforma, plugins, tema, proveedores OAuth2 |
| `messageRelUserStore.js` | `useMessageRelUserStore` | Estado de mensajería |
| `socialStore.js` | `useSocialStore` | Estado de la red social |

### Security Store

```javascript
const securityStore = useSecurityStore()

// Check if user is logged in
if (securityStore.isAuthenticated) { ... }

// Access current user object
const user = securityStore.user
```

### CID Request Store

Registra el contexto actual de curso/sesión — necesario para cualquier operación de API con ámbito de curso:

```javascript
const cidReqStore = useCidReqStore()

// Current course and session objects
const course = cidReqStore.course
const session = cidReqStore.session
```

### Course Settings Store

Almacena en caché los ajustes a nivel de curso para evitar llamadas repetidas a la API:

```javascript
const courseSettings = useCourseSettings()
const value = courseSettings.getSetting('exercise_generator')
```

### Platform Config Store

Contiene la configuración de toda la plataforma obtenida de `/platform-config/list`:

```javascript
const platformConfig = usePlatformConfig()

// Loaded settings array, active theme, enabled plugins, OAuth2 providers
const theme = platformConfig.visualTheme
const plugins = platformConfig.plugins
```

## Store de Vuex (heredado)

El store de Vuex se define en `assets/vue/store/index.js` y contiene:

| Módulo | Propósito |
|--------|---------|
| `modules/crud.js` | Fábrica (`makeCrudModule`) que genera un módulo Vuex CRUD completo para un servicio dado — usado por vistas antiguas de listado/creación/actualización |
| `modules/notifications.js` | Estado de notificaciones toast (mostrar, color, texto, tiempo de espera) |
| `modules/ux.js` | Estado de UX (mensaje de acceso prohibido) |
| `security.js` | Módulo de seguridad Vuex heredado (sustituido por `securityStore.js`) |

Evite añadir módulos Vuex nuevos. Use Pinia para cualquier estado nuevo.

## Composables

Además de los stores, `assets/vue/composables/` contiene funciones de composición compartidas. Ejemplos destacados:

| Archivo | Propósito |
|------|---------|
| `useFileManager.js` | Estado y operaciones del explorador de archivos |
| `useTopbarLoggedIn.js` / `useTopbarNotLoggedIn.js` | Cableado del menú de la barra superior |
| `useTopbarTour.js` | Recorrido guiado de la barra superior |
| `useDocumentCreate.js` / `useDocumentUpdate.js` / `useDocumentTemplates.js` | Ayudantes de la herramienta de documentos |
| `useCertificateTags.js` | Ayudantes de etiquetas de plantillas de certificados |
| `sidebarMenu.js` | Árbol de navegación de la barra lateral |
| `theme.js` | Carga y cambio de tema |
| `pluginRegion.js` | Renderizado de regiones de IU inyectadas por plugins |
| `userPermissions.js` | Comprobaciones de permisos del usuario actual |
| `notification.js` | Ayudantes de notificaciones push |
| `locale.js` | Detección y cambio de locale |
| `datatableList.js` / `datatableCreate.js` / `datatableUpdate.js` | Patrones CRUD reutilizables de datatable |
| `useSocialInfo.js` / `useSocialMenuItems.js` | Ayudantes de la red social |
| `usePushSubscription.js` | Gestión de suscripciones Web Push |
| `upload.js` | Ayudantes de carga de archivos |
| `useConfirmation.js` | Ayudante de diálogo de confirmación |

Los composables también se organizan en subdirectorios por funcionalidad (`course/`, `session/`, `document/`, `calendar/`, `admin/`, `auth/`, `message/`, `skill/`, etc.). La lista completa está en `assets/vue/composables/`.