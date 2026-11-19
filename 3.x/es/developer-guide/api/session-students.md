# API de inscripción de estudiantes en sesiones

Las integraciones pueden listar, inscribir y eliminar estudiantes de una sesión mediante endpoints exclusivos para administradores. Estas acciones utilizan el comportamiento de inscripción en sesiones de las pantallas de administración de Chamilo. Son independientes de `/api/course-sessions/actions/*`, que pertenece a un flujo de trabajo distinto orientado a tutores.

## Autenticación y acceso

Todas las operaciones siguientes requieren autenticación con el rol de plataforma `ROLE_ADMIN`. Ser únicamente administrador de la sesión **no** concede acceso. Utilice el método de autenticación descrito en [Autenticación](authentication.md).

En instalaciones multi-URL, la sesión solicitada debe pertenecer a la URL de acceso actual; de lo contrario, el endpoint responde con `404`.

## Rutas

| Método | Endpoint | Finalidad |
|--------|----------|---------|
| `GET` | `/api/sessions/{id}/students` | Listar los ID de usuario de los estudiantes inscritos en esta sesión |
| `POST` | `/api/sessions/{id}/students/subscribe` | Añadir los estudiantes especificados, conservando los estudiantes existentes |
| `POST` | `/api/sessions/{id}/students/unsubscribe` | Eliminar únicamente los estudiantes especificados |

Sustituya `{id}` por el ID numérico de la sesión. En ambas solicitudes POST, envíe JSON que contenga el array `userIds`:

```http
POST /api/sessions/42/students/subscribe
Authorization: Bearer <admin-token>
Content-Type: application/json
```

```json
{ "userIds": [17, 23] }
```

Una suscripción correcta produce una respuesta con la siguiente estructura; los ID dependen de su instalación:

```json
{
  "success": true,
  "applied": [17],
  "alreadyThere": [23],
  "ignored": []
}
```

`applied` contiene los estudiantes recién inscritos; `alreadyThere` contiene los estudiantes que ya estaban inscritos; `ignored` enumera los ID no elegibles o no disponibles. Al suscribir, Chamilo también inscribe a los estudiantes añadidos en los cursos de la sesión. **No** sustituye la lista completa de la sesión.

Para consultar la pertenencia:

```http
GET /api/sessions/42/students
Authorization: Bearer <admin-token>
```

```json
{ "userIds": [17, 23] }
```

Para eliminar estudiantes seleccionados:

```http
POST /api/sessions/42/students/unsubscribe
Authorization: Bearer <admin-token>
Content-Type: application/json
```

```json
{ "userIds": [17] }
```

La respuesta de cancelación de suscripción contiene `success`, `applied` (ID eliminados) e `ignored` (ID no inscritos). Los demás estudiantes permanecen en la sesión.

## Validación y limitaciones

* `userIds` debe ser un array de ID numéricos (enteros o cadenas formadas únicamente por dígitos). Los ID repetidos se deduplican; los valores no positivos se omiten.
* Para la inscripción, los usuarios elegibles deben existir, no estar eliminados de forma lógica, no ser anónimos ni responsables de RR. HH., y pertenecer a la URL de acceso actual.
* Un JSON o `userIds` ausente o mal formado devuelve `400 Bad Request`.
* Las sesiones inexistentes o fuera de alcance devuelven `404 Not Found`; quienes no tengan permiso de administrador no pueden utilizar estas rutas.
* Las rutas de inscripción de estudiantes **no** son endpoints CRUD genéricos para la entidad `Session` y no aceptan la lista de la sesión como documento de sustitución.

Para la interfaz de administración correspondiente, consulte [Gestión de sesiones](../../admin-guide/sessions/managing-sessions.md). Para copiar una sesión modelo antes de inscribir estudiantes, consulte [Duplicación de sesiones](session-duplication.md).

**Implementación:** `src/CoreBundle/Controller/Api/SessionStudentsController.php`. Añadido en el commit `bdfb2dd661` de Chamilo LMS.