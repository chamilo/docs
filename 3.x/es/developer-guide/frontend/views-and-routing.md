# Vistas y enrutamiento

Chamilo dispone de un amplio conjunto de vistas Vue (componentes a nivel de página) conectadas mediante Vue Router. Los archivos reales se encuentran en `assets/vue/views/`.

## Arquitectura del enrutador

El enrutador se define en `assets/vue/router/index.js` utilizando `createWebHistory` para obtener URL limpias.

Las rutas son modulares: se organizan en archivos de rutas por funcionalidad que se importan en el enrutador principal:

| Módulo de rutas | Páginas |
|-------------|-------|
| `admin` | Páginas del panel de administración |
| `sessionAdmin` | Páginas de administración de sesiones |
| `course` | Lista de cursos, creación, inicio, catálogo |
| `account` | Perfil de usuario y ajustes |
| `personalfile` | Espacio de archivos personales |
| `message` | Mensajería / bandeja de entrada |
| `user` | Páginas de gestión de usuarios |
| `usergroup` | Páginas de grupos de usuarios (clases) |
| `userreluser` | Páginas de relaciones entre usuarios (amigos/seguimiento) |
| `ccalendarevent` | Calendario y agenda del curso |
| `ctoolintro` | Páginas de introducción a las herramientas del curso |
| `page` | Páginas CMS estáticas |
| `pageLayout` | Envoltorios de diseño de página |
| `publicPage` | Páginas de acceso público |
| `social` | Páginas de red social |
| `filemanager` | Gestor de archivos (explorador de documentos del curso) |
| `skill` | Páginas de habilidades y competencias |
| `accessurl` | Páginas de gestión multi-URL (portal) |
| `branch` | Páginas de sucursales / campus en red |
| `room` | Páginas de aulas virtuales |
| `buycourses` | Páginas de compra de cursos |
| `documents` | Gestión de documentos |
| `assignments` | Flujo de trabajo de tareas |
| `links` | Gestión de enlaces externos |
| `glossary` | Gestión del glosario |
| `attendance` | Seguimiento de asistencia |
| `lp` | Reproductor y editor de itinerarios de aprendizaje |
| `dropbox` | Buzón / intercambio de archivos |
| `blog` | Páginas de blog |
| `blogAdmin` | Administración del blog |
| `coursemaintenance` | Copia de seguridad y restauración de cursos |
| `catalogue` | Catálogos de cursos y sesiones |

## Rutas principales

| Ruta | Vista | Descripción |
|------|------|-------------|
| `/` | `AppIndex.vue` (o personalizada) | Punto de entrada de la aplicación |
| `/home` | `pages/Home.vue` | Página de inicio de la plataforma |
| `/login` | `pages/Login.vue` | Página de inicio de sesión |
| `/courses` | `views/user/courses/List.vue` | Cursos en los que está inscrito el usuario |
| `/sessions` | `views/user/sessions/SessionsCurrent.vue` | Sesiones actuales |
| `/sessions/past` | `views/user/sessions/SessionsPast.vue` | Sesiones pasadas |
| `/sessions/upcoming` | `views/user/sessions/SessionsUpcoming.vue` | Sesiones próximas |
| `/course/:id/home` | `views/course/CourseHome.vue` | Página de inicio del curso |
| `/account/home` | `views/account/Home.vue` | Perfil de usuario |
| `/admin` | Vistas de administración | Panel de administración |
| `/faq` | `pages/Faq.vue` | Página de preguntas frecuentes |

## Guardianes de ruta

El enrutador utiliza guardianes de navegación (declarados con `beforeEach` y `afterEach`) para:

* Comprobar el estado de autenticación mediante `useSecurityStore` y redirigir a los usuarios no autenticados a `/login`
* Verificar el contexto del curso mediante `useCidReqStore`
* Aplicar clases CSS de tipo de página durante la navegación SPA (sustituyendo lo que haría el `PageHelper` de Twig en una carga completa de página)
* Admitir sobrescrituras de plantillas Vue personalizadas: el componente de entrada en `/` se sustituye por un `AppIndex.vue` personalizado cuando hay habilitada una plantilla Vue personalizada (`var/vue_templates/pages/AppIndex.vue`)

## Organización de las vistas

Las vistas se encuentran en `assets/vue/views/`, organizadas por funcionalidad:

```
views/
├── account/          # User profile and settings
├── admin/            # Admin pages
├── assignments/      # Assignment submission and grading
├── attendance/       # Attendance sheets
├── blog/             # Blog posts and comments
├── branch/           # Network campus management
├── buycourses/       # Course purchase flow
├── ccalendarevent/   # Course calendar
├── course/           # Course list, home, creation, catalog
├── coursecategory/   # Course category management
├── coursemaintenance/# Course backup/restore
├── ctoolintro/       # Tool introduction pages
├── documents/        # Document list, creation, media generation
├── dropbox/          # Dropbox / file exchange
├── filemanager/      # File browser
├── glossary/         # Glossary list and term management
├── links/            # External links
├── lp/               # Learning path player and editor
├── message/          # Inbox and messaging
├── page/             # CMS static pages
├── pageLayout/       # Page layout wrappers
├── personalfile/     # Personal file space
├── room/             # Virtual rooms
├── sessionadmin/     # Session administration
├── skill/            # Skills and competencies
├── social/           # Social network
├── terms/            # Terms of service
├── user/             # User management and course/session lists
├── usergroup/        # User groups (classes)
└── userreluser/      # User relationships (friends/follows)
```