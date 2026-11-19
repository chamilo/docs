# Creación de usuarios

`POST /api/access_urls/{id}/user` crea un usuario de la plataforma y lo añade a la URL de acceso `{id}`. Es el reemplazo en Chamilo 3 de la acción `save_user_json` del servicio web `webservices/api/v2.php` de la versión 1.11.x, y está pensado para integraciones que crean cuentas de estudiantes (tiendas, sistemas de RR. HH., portales de inscripción).

## Acceso

| Llamante | Permitido |
|--------|---------|
| `ROLE_ADMIN` | Sí |
| `ROLE_SESSION_MANAGER` | Sí |
| Cualquier otro | `403 Forbidden` |

Autentíquese con un JWT o una clave de API externa, como se describe en [Autenticación](authentication.md).

## Solicitud

```http
POST /api/access_urls/1/user
Authorization: Bearer <token>
Content-Type: application/json
```

```json
{
  "username": "jdoe-20261022",
  "email": "jane.doe@example.com",
  "firstname": "Jane",
  "lastname": "Doe",
  "password": "S3cret!pass",
  "sendEmail": true,
  "extraFields": { "my_user_field": "value" }
}
```

| Campo | Obligatorio | Descripción |
|-------|----------|-------------|
| `username` | Sí | Nombre de usuario del nuevo usuario. No debe estar ya utilizado por otra cuenta (la comparación no distingue mayúsculas de minúsculas). |
| `email` | Sí | Una dirección de correo electrónico válida. Varias cuentas pueden compartir la misma dirección, salvo que `checkEmailDuplicates` sea `true`. |
| `firstname`, `lastname` | No | Nombre y apellidos. |
| `password` | No | Contraseña inicial. Cuando está vacía y `sendEmail` es `true`, el correo electrónico contiene un enlace para establecer una contraseña en su lugar. |
| `locale` | No | Idioma de la interfaz, p. ej. `fr_FR`. De forma predeterminada, el idioma de la plataforma. |
| `timezone` | No | De forma predeterminada, la zona horaria de la plataforma. |
| `status` | No | `5` (estudiante) de forma predeterminada; `1` para un docente. |
| `sendEmail` | No | `true` de forma predeterminada. Envía al usuario un mensaje y un correo electrónico con sus datos de acceso. |
| `checkEmailDuplicates` | No | `false` de forma predeterminada. Cuando es `true`, la solicitud se rechaza con `409 email_already_exists` si alguna cuenta ya utiliza esta dirección de correo electrónico (la comparación no distingue mayúsculas de minúsculas). El mismo comportamiento que el parámetro `check_email_duplicates` de `save_user_json`. |
| `extraFields` | No | Valores de campos adicionales del usuario, indexados por la variable del campo. Cada variable debe corresponder a un campo adicional de usuario existente. |

### Direcciones de correo electrónico compartidas

Chamilo no exige que las direcciones de correo electrónico sean únicas: el formulario de creación de usuarios del administrador acepta una dirección que otra cuenta ya utiliza, la importación de usuarios solo la rechaza cuando está marcada la opción **Comprobar correo electrónico único**, y no existe ningún ajuste de la plataforma para cambiar este comportamiento. Un caso habitual es el de un estudiante reinscrito con un nuevo identificador que conserva la misma dirección. Envíe `checkEmailDuplicates: true` solo cuando su integración quiera tratar una dirección existente como un error.

Cuando el ajuste **El inicio de sesión es el correo electrónico** está activado, el nombre de usuario es la dirección de correo electrónico, por lo que la comprobación del nombre de usuario ya rechaza los duplicados.

## Respuesta

`201 Created` con el nuevo usuario (grupo de serialización `user:read`), incluido su `id`.

## Errores

| Estado | Cuerpo | Cuándo |
|--------|------|------|
| `401` | | Credenciales ausentes o no válidas |
| `403` | | El llamante no es ni administrador ni administrador de sesión |
| `409` | `{"error": "username_already_exists"}` | El nombre de usuario ya está en uso |
| `409` | `{"error": "email_already_exists"}` | `checkEmailDuplicates` es `true` y la dirección de correo electrónico ya está en uso |
| `422` | | Faltan `username` o `email`, o la dirección de correo electrónico no es válida |

## Implementación

* Operación: el recurso `AccessUrlUser` declarado en `src/CoreBundle/Entity/User.php`
* Entrada: `src/CoreBundle/Dto/CreateUserOnAccessUrlInput.php`
* Controlador: `src/CoreBundle/Controller/Api/CreateUserOnAccessUrlAction.php`
* La página **Registrar estudiante** del administrador de sesión (`/admin-dashboard/register/{courseId}`) utiliza este endpoint con `checkEmailDuplicates: true`, de modo que advierte cuando la dirección ya está en uso.