# API de administración de cursos

Chamilo 3.1 permite que las integraciones de administrador actualicen los metadatos de un curso y eliminen cursos a través del recurso de API `Course`. Estas operaciones se añadieron para la sincronización con sistemas de administración externos, como un ERP.

## Permisos

| Operación | Método y endpoint | Rol requerido |
|-----------|-------------------|---------------|
| Listar cursos | `GET /api/courses` | Docente o administrador de la plataforma |
| Ver un curso | `GET /api/courses/{id}` | Permiso para ver ese curso |
| Crear un curso | `POST /api/courses` | Docente o administrador de la plataforma |
| Actualizar un curso | `PATCH /api/courses/{id}` | **Administrador de la plataforma (`ROLE_ADMIN`)** |
| Eliminar un curso | `DELETE /api/courses/{id}` | **Administrador de la plataforma (`ROLE_ADMIN`)** |

`PUT` no está configurado como operación en este recurso. Los docentes deben seguir editando sus propios cursos a través de la interfaz de configuración del curso; las nuevas operaciones de escritura de la API son exclusivas del administrador.

Utilice una cuenta autenticada o una credencial de integración con los permisos necesarios. Consulte [Autenticación de la API](authentication.md).

## Actualizar los metadatos del curso

Envíe una solicitud JSON Merge Patch de API Platform para cambiar únicamente las propiedades indicadas en el cuerpo:

```http
PATCH /api/courses/42
Authorization: Bearer <admin-token>
Content-Type: application/merge-patch+json
Accept: application/ld+json
```

```json
{
  "title": "Introduction to Accounting - 2026"
}
```

La solicitud actualiza el curso existente en lugar de crear uno nuevo. La API acepta las propiedades editables definidas por el grupo de serialización `course:write`, sujetas a la validación de la entidad. Entre los ejemplos se incluyen `title`, `visibility`, `categories`, `departmentUrl`, `videoUrl`, `sticky` y `duration`. Las propiedades de relación, como `categories`, requieren la representación de recurso esperada por la API; consulte la documentación OpenAPI en lugar de enviar identificadores arbitrarios de la base de datos.

**Importante:** el `code` interno del curso **no** es editable mediante esta operación PATCH. No intente renombrar el código interno de un curso enviando un campo `code` o `visualCode`.

## Eliminar un curso

```http
DELETE /api/courses/42
Authorization: Bearer <admin-token>
```

Se trata de una operación de administración **destructiva**. Chamilo invoca el mismo asistente de eliminación de cursos utilizado por el mantenimiento de cursos, en lugar de eliminar directamente la entidad de Doctrine. Limpia las inscripciones asociadas, los vínculos de sesión y de clase, los datos de seguimiento y la indexación de búsqueda relacionada, según corresponda.

En una instalación **multi-URL**, la eliminación puede limitarse a desvincular el curso de la URL de acceso actual en lugar de eliminarlo en todas partes. Los documentos del curso no se eliminan mediante la opción independiente *eliminar documentos exclusivos* de la interfaz de mantenimiento. No interprete una eliminación a través de la API como una garantía de que todos los documentos se eliminan físicamente.

Si una dependencia activa impide la eliminación (por ejemplo, una secuencia de recursos), el endpoint puede responder con `409 Conflict`. Revise las dependencias del curso y las copias de seguridad antes de enviar solicitudes DELETE, especialmente en integraciones por lotes.

## Errores y notas operativas

* Un llamante sin el rol de administrador requerido es rechazado; utilice una cuenta correctamente autorizada en lugar de una credencial de docente para PATCH o DELETE.
* Los datos de solicitud no válidos pueden provocar un fallo en la validación de la entidad. Obtenga el curso actual antes de aplicar el parche y envíe únicamente las propiedades que pretenda modificar.
* Estas operaciones las expone API Platform; consulte la documentación OpenAPI de la instancia instalada para conocer el esquema de respuesta exacto y los formatos de campo aceptados.
* Pruebe la eliminación de cursos en un curso desechable, no en un curso que contenga registros de estudiantes de producción.

Para la administración de cursos en la interfaz, consulte [Gestión de cursos](../../admin-guide/courses/managing-courses.md). Para las integraciones de inscripción en sesiones, consulte [Inscripción de estudiantes en sesiones](session-students.md).

**Implementación:** `src/CoreBundle/Entity/Course.php` (operaciones `Patch` y `Delete`) y `src/CoreBundle/State/CourseDeleteProcessor.php`. Añadido en el commit `8cc9d4b33d` de Chamilo LMS.