# Vistas y Enrutamiento

Chamilo cuenta con un amplio conjunto de vistas Vue (componentes a nivel de página) conectadas a través de Vue Router. Los archivos reales se encuentran en `assets/vue/views/`.

## Arquitectura del Enrutador

El enrutador está definido en `assets/vue/router/index.js` utilizando `createWebHistory` para URLs limpias.

Las rutas son modulares, organizadas en archivos de rutas por funcionalidad que se importan al enrutador principal:

| Módulo de ruta | Páginas |
|----------------|---------|
| `admin` | Páginas del panel de administración |
| `sessionAdmin` | Páginas de administración de sesiones |
| `course` | Lista de cursos, creación, inicio, catálogo |
| `account` | Perfil y configuraciones del usuario |
| `personalfile` | Espacio de archivos personales |
| `message` | Mensajería / bandeja de entrada |
| `user` | Páginas de gestión de usuarios |
| `usergroup` | Páginas de grupos de usuarios (clases) |
| `userreluser` | Páginas de relaciones entre usuarios (amigos/seguidos) |
| `ccalendarevent` | Calendario y agenda del curso |
| `ctoolintro` | Páginas de introducción a herramientas del curso |
| `page` | Páginas estáticas de CMS |
| `pageLayout` | Envolturas de diseño de página |
| `publicPage` | Páginas de acceso público |
| `social` | Páginas de red social |
| `filemanager` | Gestor de archivos (navegador de documentos del curso) |
| `skill` | Páginas de habilidades y competencias |
| `accessurl` | Páginas de gestión de múltiples URLs (portales) |
| `branch` | Páginas de campus de red / sucursales |
| `room` | Páginas de salas virtuales |
| `buycourses` | Páginas de compra de cursos |
| `documents` | Gestión de documentos |
| `assignments` | Flujo de trabajo de tareas |
| `links` | Gestión de enlaces externos |
| `glossary` | Gestión de glosarios |
| `attendance` | Seguimiento de asistencia |
| `lp` | Reproductor y editor de rutas de aprendizaje |
| `dropbox` | Dropbox / intercambio de archivos |
| `blog` | Páginas de blog |
| `blogAdmin` | Administración de blogs |
| `coursemaintenance` | Copia de seguridad y restauración de cursos |
| `catalogue` | Catálogos de cursos y sesiones |

## Rutas Clave

| Ruta | Vista | Descripción |
|------|-------|-------------|
| `/` | `AppIndex.vue` (o personalizada) | Punto de entrada de la aplicación |
| `/home` | `pages/Home.vue` | Página de inicio de la plataforma |
| `/login` | `pages/Login.vue` | Página de inicio de sesión |
| `/courses` | `views/user/courses/List.vue` | Cursos inscritos del usuario |
| `/sessions` | `views/user/sessions/SessionsCurrent.vue` | Sesiones actuales |
| `/sessions/past` | `views/user/sessions/SessionsPast.vue` | Sesiones pasadas |
| `/sessions/upcoming` | `views/user/sessions/SessionsUpcoming.vue` | Sesiones próximas |
| `/course/:id/home` | `views/course/CourseHome.vue` | Página de inicio del curso |
| `/account/home` | `views/account/Home.vue` | Perfil del usuario |
| `/admin` | Vistas de administración | Panel de administración |
| `/faq` | `pages/Faq.vue` | Página de preguntas frecuentes |

## Guardias de Ruta

El enrutador utiliza guardias de navegación (declarados con `beforeEach` y `afterEach`) para:

* Verificar el estado de autenticación a través de `useSecurityStore` y redirigir a usuarios no autenticados a `/login`
* Verificar el contexto del curso a través de `useCidReqStore`
* Aplicar clases CSS de tipo de página durante la navegación SPA (reemplazando lo que haría `PageHelper` de Twig en una carga completa de página)
* Soportar anulaciones de plantillas Vue personalizadas — el componente de entrada en `/` se cambia por un `AppIndex.vue` personalizado cuando una plantilla Vue personalizada está habilitada (`var/vue_templates/pages/AppIndex.vue`)

## Organización de Vistas

Las vistas se encuentran en `assets/vue/views/`, organizadas por funcionalidad:

```
views/
├── account/          # Perfil y configuraciones del usuario
├── admin/            # Páginas de administración
├── assignments/      # Envío y calificación de tareas
├── attendance/       # Hojas de asistencia
├── blog/             # Publicaciones y comentarios de blog
├── branch/           # Gestión de campus de red
├── buycourses/       # Flujo de compra de cursos
├── ccalendarevent/   # Calendario del curso
├── course/           # Lista de cursos, inicio, creación, catálogo
├── coursecategory/   # Gestión de categorías de cursos
├── coursemaintenance/# Copia de seguridad/restauración de cursos
├── ctoolintro/       # Páginas de introducción a herramientas
├── documents/        # Lista de documentos, creación, generación de medios
├── dropbox/          # Dropbox / intercambio de archivos
├── filemanager/      # Navegador de archivos
├── glossary/         # Lista y gestión de términos de glosario
├── links/            # Enlaces externos
├── lp/               # Reproductor y editor de rutas de aprendizaje
├── message/          # Bandeja de entrada y mensajería
├── page/             # Páginas estáticas de CMS
├── pageLayout/       # Envolturas de diseño de página
├── personalfile/     # Espacio de archivos personales
├── room/             # Salas virtuales
├── sessionadmin/     # Administración de sesiones
├── skill/            # Habilidades y competencias
├── social/           # Red social
├── terms/            # Términos de servicio
├── user/             # Gestión de usuarios y listas de cursos/sesiones
├── usergroup/        # Grupos de usuarios (clases)
└── userreluser/      # Relaciones entre usuarios (amigos/seguidos)
```