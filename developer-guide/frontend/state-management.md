# Gestión de Estado

Chamilo utiliza dos bibliotecas de gestión de estado de manera conjunta:

- **Pinia** — el estándar actual para todas las nuevas tiendas. La mayoría del código base utiliza Pinia.
- **Vuex** — tienda heredada, aún presente y utilizada por vistas más antiguas. El nuevo código debe usar Pinia.

## Tiendas Pinia

Las tiendas Pinia se encuentran directamente en `assets/vue/store/`:

| Archivo de tienda | Composable | Propósito |
|-------------------|------------|-----------|
| `securityStore.js` | `useSecurityStore` | Usuario autenticado, inicio/cierre de sesión, verificación de sesión |
| `cidReq.js` | `useCidReqStore` | Contexto actual del curso/sesión (ID del curso, ID de la sesión) |
| `courseSettingStore.js` | `useCourseSettings` | Caché de configuraciones a nivel de curso |
| `enrolledStore.js` | `useEnrolledStore` | Datos de inscripción del usuario |
| `platformConfig.js` | `usePlatformConfig` | Configuración de la plataforma, complementos, tema, proveedores OAuth2 |
| `messageRelUserStore.js` | `useMessageRelUserStore` | Estado de mensajería |
| `socialStore.js` | `useSocialStore` | Estado de la red social |

### Tienda de Seguridad

```javascript
const securityStore = useSecurityStore()

// Verificar si el usuario está autenticado
if (securityStore.isAuthenticated) { ... }

// Acceder al objeto del usuario actual
const user = securityStore.user
```

### Tienda de Solicitud CID

Rastrea el contexto actual del curso/sesión — necesario para cualquier operación de API con alcance de curso:

```javascript
const cidReqStore = useCidReqStore()

// Objetos actuales de curso y sesión
const course = cidReqStore.course
const session = cidReqStore.session
```

### Tienda de Configuraciones del Curso

Almacena en caché las configuraciones a nivel de curso para evitar llamadas repetidas a la API:

```javascript
const courseSettings = useCourseSettings()
const value = courseSettings.getSetting('exercise_generator')
```

### Tienda de Configuración de la Plataforma

Contiene la configuración general de la plataforma obtenida de `/platform-config/list`:

```javascript
const platformConfig = usePlatformConfig()

// Arreglo de configuraciones cargadas, tema activo, complementos habilitados, proveedores OAuth2
const theme = platformConfig.visualTheme
const plugins = platformConfig.plugins
```

## Tienda Vuex (Heredada)

La tienda Vuex está definida en `assets/vue/store/index.js` y contiene:

| Módulo | Propósito |
|--------|-----------|
| `modules/crud.js` | Fábrica (`makeCrudModule`) que genera un módulo Vuex CRUD completo para un servicio dado — utilizado por vistas antiguas de lista/creación/actualización |
| `modules/notifications.js` | Estado de notificaciones toast (mostrar, color, texto, tiempo de espera) |
| `modules/ux.js` | Estado de experiencia de usuario (mensaje de acceso prohibido) |
| `security.js` | Módulo de seguridad Vuex heredado (reemplazado por `securityStore.js`) |

Evite agregar nuevos módulos Vuex. Use Pinia para cualquier nuevo estado.

## Composables

Además de las tiendas, `assets/vue/composables/` contiene funciones de composición compartidas. Ejemplos destacados:

| Archivo | Propósito |
|---------|-----------|
| `useFileManager.js` | Estado y operaciones del explorador de archivos |
| `useTopbarLoggedIn.js` / `useTopbarNotLoggedIn.js` | Conexión del menú de la barra superior |
| `useTopbarTour.js` | Recorrido guiado para la barra superior |
| `useDocumentCreate.js` / `useDocumentUpdate.js` / `useDocumentTemplates.js` | Ayudantes para la herramienta de documentos |
| `useCertificateTags.js` | Ayudantes para etiquetas de plantillas de certificados |
| `sidebarMenu.js` | Árbol de navegación de la barra lateral |
| `theme.js` | Carga y cambio de temas |
| `pluginRegion.js` | Renderizado de regiones de interfaz de usuario inyectadas por complementos |
| `userPermissions.js` | Verificaciones de permisos para el usuario actual |
| `notification.js` | Ayudantes para notificaciones push |
| `locale.js` | Detección y cambio de idioma |
| `datatableList.js` / `datatableCreate.js` / `datatableUpdate.js` | Patrones CRUD reutilizables para tablas de datos |
| `useSocialInfo.js` / `useSocialMenuItems.js` | Ayudantes para redes sociales |
| `usePushSubscription.js` | Gestión de suscripciones Web Push |
| `upload.js` | Ayudantes para la carga de archivos |
| `useConfirmation.js` | Ayudante para diálogos de confirmación |

Los composables también están organizados en subdirectorios de características (`course/`, `session/`, `document/`, `calendar/`, `admin/`, `auth/`, `message/`, `skill/`, etc.). La lista completa se encuentra en `assets/vue/composables/`.