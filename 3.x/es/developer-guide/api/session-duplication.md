# Duplicación de sesiones

`POST /api/sessions/{id}/duplicate` crea una nueva sesión a partir de una **sesión modelo** existente. Es el reemplazo en Chamilo 3 de la acción `create_session_from_model` del servicio web `webservices/api/v2.php` de la versión 1.11.x, y está pensado para integraciones que abren una nueva edición formativa a partir de una sesión plantilla.

## Acceso

| Llamante | Permitido |
|--------|---------|
| `ROLE_ADMIN` | Cualquier sesión |
| `ROLE_SESSION_MANAGER` | Solo las sesiones que gestiona (es administrador de sesión del modelo), salvo que esté activada la opción **Permitir a los administradores de sesión ver todas las sesiones** |
| Cualquier otro | `403 Forbidden` |

Autentíquese con un JWT o una clave de API externa, tal como se describe en [Autenticación](authentication.md).

## Solicitud

```http
POST /api/sessions/42/duplicate
Authorization: Bearer <token>
Content-Type: application/json
```

```json
{
  "title": "Accounting basics - October 2026",
  "startDate": "2026-10-01T09:00:00+02:00",
  "endDate": "2026-12-15T18:00:00+01:00",
  "extraFields": { "my_session_field": "value" },
  "copySessionContent": false
}
```

| Campo | Obligatorio | Descripción |
|-------|----------|-------------|
| `title` | Sí | Título de la nueva sesión. No debe estar ya utilizado por otra sesión (máx. 150 caracteres). |
| `startDate` | Sí | Fecha y hora en formato ISO 8601. Se utiliza como fecha de inicio de acceso, de visualización y de acceso del tutor. |
| `endDate` | Sí | Fecha y hora en formato ISO 8601, no anterior a `startDate`. Se utiliza como fecha de fin de acceso, de visualización y de acceso del tutor. |
| `extraFields` | No | Valores de campos extra de sesión indexados por la variable del campo. Sustituyen los valores copiados del modelo. Cada variable debe corresponder a un campo extra de sesión existente. |
| `copySessionContent` | No | `false` de forma predeterminada. Cuando es `true`, el contenido específico de la sesión de cada curso (documentos, itinerarios de aprendizaje, pruebas, eventos del calendario, anuncios, libro de calificaciones…) se duplica en la nueva sesión. El contenido base del curso siempre se comparte, nunca se copia. Esta opción es independiente del ajuste de plataforma **Activar la copia del contenido específico de la sesión a otra sesión**. |

## Qué se copia

| Copiado del modelo | No se copia |
|-----------------------|------------|
| Categoría, visibilidad, duración, descripción y «mostrar descripción» | Tutores de curso |
| Valores de campos extra de la sesión | Responsables de RR. HH. (DRH) |
| Cursos, en el mismo orden | Estudiantes |
| Tutores generales | |
| Administradores de sesión (si el modelo no tiene ninguno, el llamante pasa a ser el administrador de sesión) | |
| Opción «Enviar notificación de inscripción» | |
| Promoción | |
| Contenido de curso específico de la sesión, solo cuando `copySessionContent` es `true` | |

Los estudiantes se omiten a propósito: cada edición tiene sus propios alumnos. Inscríbalos después con `POST /api/course-sessions/actions/subscribe-users`.

La nueva sesión queda asociada a la URL de acceso actual.

## Respuesta

`201 Created` con la nueva sesión:

```json
{
  "id": 57,
  "title": "Accounting basics - October 2026",
  "nbrCourses": 3,
  "visibility": 1,
  "generalCoachesSubscriptions": [{ "user": "/api/users/7" }]
}
```

## Errores

| Estado | Cuándo |
|--------|------|
| `401` | Credenciales ausentes o no válidas |
| `403` | El llamante no puede gestionar la sesión modelo |
| `404` | La sesión modelo no existe |
| `422` | Campo ausente o no válido, `endDate` anterior a `startDate`, título ya utilizado o variable de campo extra desconocida |

Todas las comprobaciones se ejecutan antes de crear nada, de modo que una solicitud rechazada nunca deja una sesión parcial.

## Implementación

* Operación: `duplicate_session` en el recurso `Session` (`src/CoreBundle/Entity/Session.php`)
* Entrada: `src/CoreBundle/Dto/SessionDuplicateInput.php`
* Procesador: `src/CoreBundle/State/Session/SessionDuplicateProcessor.php`, que llama a `SessionManager::copy()` (también utilizado por la acción **Copiar** de la lista de sesiones) y, a continuación, aplica el título, las fechas y los campos extra solicitados, así como la promoción del modelo, los administradores de sesión, la opción de notificación y el orden de los cursos.