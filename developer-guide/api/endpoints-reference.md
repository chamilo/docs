# Referencia de Endpoints

API Platform genera automáticamente endpoints REST para entidades anotadas con `#[ApiResource]`. Chamilo expone más de 100 recursos.

## Operaciones Estándar

Para cada recurso de la API, las siguientes operaciones suelen estar disponibles:

| Método | Ruta | Descripción |
|--------|------|-------------|
| `GET` | `/api/{resources}` | Listar (colección) |
| `POST` | `/api/{resources}` | Crear |
| `GET` | `/api/{resources}/{id}` | Leer (elemento individual) |
| `PUT` | `/api/{resources}/{id}` | Actualización completa |
| `PATCH` | `/api/{resources}/{id}` | Actualización parcial |
| `DELETE` | `/api/{resources}/{id}` | Eliminar |

No todas las operaciones están habilitadas para cada recurso — se aplican restricciones de seguridad.

## Recursos Clave de la API

### Recursos de la Plataforma

| Recurso | Ruta | Descripción |
|----------|------|-------------|
| Usuarios | `/api/users` | Cuentas de usuario |
| Cursos | `/api/courses` | Cursos |
| Sesiones | `/api/sessions` | Sesiones de formación |
| Nodos de Recursos | `/api/resource_nodes` | Nodos de contenido unificado |
| URLs de Acceso | `/api/access_urls` | Portales multi-URL |
| Mensajes | `/api/messages` | Mensajes de la plataforma |

### Recursos de Contenido de Cursos

| Recurso | Ruta | Descripción |
|----------|------|-------------|
| Documentos | `/api/documents` | Documentos del curso |
| Rutas de Aprendizaje | `/api/learning_paths` | Rutas de aprendizaje |
| Glosarios | `/api/glossaries` | Términos de glosario |
| Enlaces | `/api/links` | Enlaces externos |
| Eventos de Calendario | `/api/c_calendar_events` | Eventos de agenda |
| Publicaciones de Estudiantes | `/api/c_student_publications` | Tareas |
| Blogs | `/api/c_blogs` | Blogs del curso |
| Grupos | `/api/c_groups` | Grupos del curso |

### Recursos de Seguimiento

| Recurso | Ruta | Descripción |
|----------|------|-------------|
| Categorías de Libro de Calificaciones | `/api/gradebook_categories` | Configuración del libro de calificaciones |
| Resultados de Libro de Calificaciones | `/api/gradebook_results` | Calificaciones |

## Filtrado y Paginación

API Platform soporta:

* **Paginación**: `?page=2&itemsPerPage=30`
* **Filtrado**: `?title=Introduction` (depende de los filtros configurados)
* **Ordenamiento**: `?order[title]=asc`
* **Búsqueda**: Búsqueda de texto completo en campos configurados

## Negociación de Contenido

La API soporta múltiples formatos:

* `application/ld+json` (predeterminado — JSON-LD)
* `application/json`
* `text/html` (documentación de la API)

Establece el encabezado `Accept` para elegir el formato de respuesta.

## Seguridad

Cada endpoint aplica seguridad a través de:

* Autenticación JWT (requerida para la mayoría de los endpoints)
* Votantes de seguridad de Symfony (permisos a nivel de recurso)
* Control de acceso basado en roles (por ejemplo, endpoints exclusivos para administradores)