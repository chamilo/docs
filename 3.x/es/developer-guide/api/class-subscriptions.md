# API de pertenencia a clases e inscripción

Para las integraciones, Chamilo proporciona puntos de acceso para leer y sincronizar los miembros, las sesiones y los cursos asociados a una **clase** existente. Una clase es un `Usergroup` del tipo *clase normal*; estas rutas **no** se aplican a los grupos sociales.

A diferencia de la API de estudiantes de sesión, las tres acciones `PUT` de clase **reemplazan por completo la lista especificada**. Los identificadores omitidos se eliminan de esa relación. Lea la lista existente antes de actualizarla y evite usar `PUT` para añadir un solo miembro, a menos que también envíe a todas las personas que deban permanecer.

## Autorización

Todas las rutas siguientes requieren el rol autenticado de la plataforma `ROLE_ADMIN`. La clase de destino debe estar disponible en la URL de acceso actual. Una clase inexistente o fuera de alcance devuelve `404`; un grupo de usuarios que no sea una clase normal devuelve `409 Conflict`.

El controlador comprueba que existan los identificadores de usuario, curso y sesión enviados. En una instalación multi-URL, los **identificadores de curso y de sesión** enviados se filtran según el portal actual; sin embargo, la implementación actual **no** aplica ese mismo filtro de portal a los **identificadores de usuario**. Los integradores no deben considerar este punto de acceso como una garantía de aislamiento de usuarios a nivel de portal. Consulte las notas de revisión de la entrega para esta consideración de seguridad pendiente.

## Leer las relaciones de la clase

```http
GET /api/usergroups/31/subscriptions
Authorization: Bearer <admin-token>
```

Ejemplo de respuesta:

```json
{
  "userIds": [17, 23],
  "sessionIds": [42],
  "courseIds": [8, 11]
}
```

## Reemplazar una lista de relaciones

| Método | Punto de acceso | Propiedad de la solicitud |
|--------|----------|------------------|
| `PUT` | `/api/usergroups/{id}/users` | `userIds` |
| `PUT` | `/api/usergroups/{id}/sessions` | `sessionIds` |
| `PUT` | `/api/usergroups/{id}/courses` | `courseIds` |

Por ejemplo, para establecer la lista completa de la clase:

```http
PUT /api/usergroups/31/users
Authorization: Bearer <admin-token>
Content-Type: application/json
```

```json
{ "userIds": [17, 23, 29] }
```

Ejemplo de respuesta:

```json
{
  "success": true,
  "applied": [17, 23, 29],
  "ignored": []
}
```

`applied` enumera los identificadores aceptados, no necesariamente los identificadores recién añadidos. `ignored` identifica los identificadores solicitados que no pudieron aplicarse (por ejemplo, un identificador desconocido o un curso o una sesión fuera del portal actual). Los valores no positivos se omiten, los duplicados se eliminan y un JSON mal formado o una propiedad de solicitud que no sea un array devuelve `400`.

Para reemplazar en su lugar las sesiones vinculadas, llame a `PUT /api/usergroups/31/sessions` con `{ "sessionIds": [42, 57] }`. Para reemplazar los cursos vinculados, llame a `PUT /api/usergroups/31/courses` con `{ "courseIds": [8, 11] }`.

**Importante:** Chamilo aplica estos cambios mediante los métodos de sincronización de `UsergroupHelper`. Cambiar la lista de la clase o sus vinculaciones de sesión o curso también puede modificar las inscripciones relacionadas. No manipule directamente las tablas de relaciones de grupos de usuarios y revise el efecto de reemplazar las listas antes de ejecutar una integración en producción.

Para la interfaz y el concepto, consulte [Clases](../../admin-guide/sessions/classes.md). Para añadir o eliminar estudiantes concretos de una sesión *sin* reemplazar a todos los miembros, utilice la [API de inscripción de estudiantes de sesión](session-students.md).

**Implementación:** `src/CoreBundle/Controller/Api/UsergroupSubscriptionController.php`. Añadido en el commit de Chamilo LMS `d8809925a4`.