# Referencia de endpoints

API Platform genera automáticamente endpoints REST para las entidades anotadas con `#[ApiResource]`. Chamilo expone más de 100 recursos.

## Operaciones estándar

Para cada recurso de la API, suelen estar disponibles las siguientes operaciones:

| Method | Path | Description |
|--------|------|-------------|
| `GET` | `/api/{resources}` | Listado (colección) |
| `POST` | `/api/{resources}` | Creación |
| `GET` | `/api/{resources}/{id}` | Lectura (elemento individual) |
| `PUT` | `/api/{resources}/{id}` | Actualización completa |
| `PATCH` | `/api/{resources}/{id}` | Actualización parcial |
| `DELETE` | `/api/{resources}/{id}` | Eliminación |

No todas las operaciones están habilitadas para cada recurso: se aplican restricciones de seguridad.

## Recursos clave de la API

### Recursos de la plataforma

| Resource | Path | Description |
|----------|------|-------------|
| Users | `/api/users` | Cuentas de usuario |
| Courses | `/api/courses` | Cursos |
| Sessions | `/api/sessions` | Sesiones de formación |
| Resource Nodes | `/api/resource_nodes` | Nodos de contenido unificados |
| Access URLs | `/api/access_urls` | Portales multi-URL |
| Messages | `/api/messages` | Mensajes de la plataforma |

### Recursos de contenido del curso

| Resource | Path | Description |
|----------|------|-------------|
| Documents | `/api/documents` | Documentos del curso |
| Learning Paths | `/api/learning_paths` | Itinerarios de aprendizaje |
| Glossaries | `/api/glossaries` | Términos del glosario |
| Links | `/api/links` | Enlaces externos |
| Calendar Events | `/api/c_calendar_events` | Eventos de la agenda |
| Student Publications | `/api/c_student_publications` | Tareas |
| Blogs | `/api/c_blogs` | Blogs del curso |
| Groups | `/api/c_groups` | Grupos del curso |

### Recursos de seguimiento

| Resource | Path | Description |
|----------|------|-------------|
| Gradebook Categories | `/api/gradebook_categories` | Configuración del libro de calificaciones |
| Gradebook Results | `/api/gradebook_results` | Calificaciones |

## Filtrado y paginación

API Platform admite:

* **Paginación**: `?page=2&itemsPerPage=30`
* **Filtrado**: `?title=Introduction` (depende de los filtros configurados)
* **Ordenación**: `?order[title]=asc`
* **Búsqueda**: Búsqueda de texto completo en los campos configurados

## Negociación de contenido

La API admite varios formatos:

* `application/ld+json` (predeterminado — JSON-LD)
* `application/json`
* `text/html` (documentación de la API)

Establezca la cabecera `Accept` para elegir el formato de la respuesta.

## Seguridad

Cada endpoint aplica la seguridad mediante:

* Autenticación JWT (necesaria para la mayoría de los endpoints)
* Voters de seguridad de Symfony (permisos a nivel de recurso)
* Control de acceso basado en roles (p. ej., endpoints solo para administradores)