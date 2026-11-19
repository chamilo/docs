# Referencia de endpoints

API Platform genera automáticamente endpoints REST para las entidades anotadas con `#[ApiResource]`. Chamilo expone más de 100 recursos.

## Operaciones estándar

Para cada recurso de la API, suelen estar disponibles las siguientes operaciones:

| Método | Ruta | Descripción |
|--------|------|-------------|
| `GET` | `/api/{resources}` | Listar (colección) |
| `POST` | `/api/{resources}` | Crear |
| `GET` | `/api/{resources}/{id}` | Leer (elemento individual) |
| `PUT` | `/api/{resources}/{id}` | Actualización completa |
| `PATCH` | `/api/{resources}/{id}` | Actualización parcial |
| `DELETE` | `/api/{resources}/{id}` | Eliminar |

No todas las operaciones están habilitadas para cada recurso: se aplican restricciones de seguridad.

## Recursos principales de la API

### Recursos de la plataforma

| Recurso | Ruta | Descripción |
|----------|------|-------------|
| Users | `/api/users` | Cuentas de usuario |
| Courses | `/api/courses` | Cursos |
| Sessions | `/api/sessions` | Sesiones de formación |
| Promotions | `/api/promotions` | Promociones de carrera, solo lectura (véase [Promoción de sesión](session-promotion.md)) |
| Resource Nodes | `/api/resource_nodes` | Nodos de contenido unificados |
| Access URLs | `/api/access_urls` | Portales multi-URL |
| Messages | `/api/messages` | Mensajes de la plataforma |

### Recursos de contenido del curso

| Recurso | Ruta | Descripción |
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

| Recurso | Ruta | Descripción |
|----------|------|-------------|
| Gradebook Categories | `/api/gradebook_categories` | Configuración del libro de calificaciones |
| Gradebook Results | `/api/gradebook_results` | Calificaciones |

## Operaciones de administración de cursos

Además de listar y crear cursos, el recurso de API `Course` ofrece las operaciones exclusivas del administrador `PATCH /api/courses/{id}` y `DELETE /api/courses/{id}`. No existe una operación `PUT` para este recurso, y el código interno del curso no se puede modificar mediante PATCH. La eliminación utiliza el proceso de limpieza de mantenimiento de cursos; sus efectos en los portales multi-URL requieren precaución.

Véase [Administración de cursos](course-administration.md) para las solicitudes, los permisos, los efectos secundarios y las limitaciones.

## Acciones administrativas de inscripción

Las siguientes rutas de controlador implementadas de forma explícita **no** son operaciones genéricas de recursos de API Platform. Requieren `ROLE_ADMIN` y tienen sus propios contratos de solicitud y respuesta.

| Método | Ruta | Detalles |
|--------|------|---------|
| `GET` | `/api/sessions/{id}/students` | Listar los ID de los estudiantes inscritos |
| `POST` | `/api/sessions/{id}/students/subscribe` | Añadir los estudiantes especificados |
| `POST` | `/api/sessions/{id}/students/unsubscribe` | Quitar los estudiantes especificados |
| `GET` | `/api/usergroups/{id}/subscriptions` | Leer los ID de usuario, sesión y curso de la clase |
| `PUT` | `/api/usergroups/{id}/users` | Sustituir la lista de miembros de la clase |
| `PUT` | `/api/usergroups/{id}/sessions` | Sustituir la lista de sesiones de la clase |
| `PUT` | `/api/usergroups/{id}/courses` | Sustituir la lista de cursos de la clase |

Véanse [Inscripción de estudiantes en la sesión](session-students.md) y [Suscripciones de clase](class-subscriptions.md) para la validación, los permisos, el ámbito multi-URL y las diferencias importantes entre las operaciones aditivas y las de sustitución.

## Filtrado y paginación

API Platform admite:

* **Paginación**: `?page=2&itemsPerPage=30`
* **Filtrado**: `?title=Introduction` (depende de los filtros configurados)
* **Ordenación**: `?order[title]=asc`
* **Búsqueda**: búsqueda de texto completo en los campos configurados

## Negociación de contenido

La API admite varios formatos:

* `application/ld+json` (predeterminado — JSON-LD)
* `application/json`
* `text/html` (documentación de la API)

Establezca la cabecera `Accept` para elegir el formato de la respuesta.

## Seguridad

Cada endpoint aplica la seguridad mediante:

* Autenticación JWT (obligatoria para la mayoría de los endpoints)
* Voters de seguridad de Symfony (permisos a nivel de recurso)
* Control de acceso basado en roles (por ejemplo, endpoints exclusivos del administrador)