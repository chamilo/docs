# Tiempo de conexión del usuario

`GET /api/users/{id}/connection-time` devuelve el tiempo total que un usuario permaneció conectado a la plataforma. Sustituye la acción `get_user_total_connexion_time` del servicio web `webservices/api/v2.php` de la versión 1.11.x y puede restringirse a un periodo.

## Acceso

| Llamante | Permitido |
|--------|---------|
| `ROLE_ADMIN` | Cualquier usuario de la URL de acceso actual |
| Cualquier usuario autenticado | Solo su propio tiempo de conexión |
| Cualquier otra persona | `403 Forbidden` |

El endpoint recibe el identificador numérico del usuario. Para partir de un nombre de usuario, búsquelo primero con `GET /api/users?username=...`.

## Solicitud

```http
GET /api/users/42/connection-time?startDate=2026-10-01T00:00:00%2B02:00&endDate=2026-12-15T23:59:59%2B01:00
Authorization: Bearer <token>
```

| Parámetro de consulta | Obligatorio | Descripción |
|-----------------|----------|-------------|
| `startDate` | No | Fecha y hora en formato ISO 8601. Solo se contabilizan las conexiones que **comenzaron** en ese momento o después. |
| `endDate` | No | Fecha y hora en formato ISO 8601, no anterior a `startDate`. Solo se contabilizan las conexiones que **finalizaron** en ese momento o antes. |

Sin ninguno de los dos parámetros, se contabilizan todas las conexiones. Solo con `startDate`, las conexiones se contabilizan a partir de esa fecha, sin límite final. Solo con `endDate`, las conexiones se contabilizan hasta esa fecha, sin límite inicial.

Una conexión que se solapa con un límite (por ejemplo, una que comenzó antes de `startDate`) no se contabiliza en absoluto: los tiempos de conexión nunca se dividen. Es la misma regla que el filtro de periodo personalizado de los informes de la versión 1.11.x.

Incluya el desfase horario. En una URL, `+` debe codificarse como `%2B`. Un valor sin desfase se interpreta en la zona horaria del servidor.

## Respuesta

```json
{
  "id": 42,
  "username": "jdupont",
  "totalConnectionTime": 5025,
  "totalConnectionTimeFormatted": "01:23:45"
}
```

| Campo | Descripción |
|-------|-------------|
| `totalConnectionTime` | Total en segundos |
| `totalConnectionTimeFormatted` | El mismo total como `HH:MM:SS`, el formato que devolvía el servicio web de la versión 1.11.x. Las horas pueden superar 24. |

## Errores

| Estado | Cuándo |
|--------|------|
| `400` | Una fecha que no se puede analizar, o `endDate` anterior a `startDate` |
| `401` | Credenciales ausentes o no válidas |
| `403` | El llamante no es ni un administrador ni el usuario en cuestión |
| `404` | El usuario no existe o no pertenece a la URL de acceso actual |

## Cómo se calcula el tiempo

El total es la suma de `logout_date − login_date` sobre las filas del usuario en la tabla `track_e_login`.

Una conexión comienza al iniciar sesión y se prolonga mientras el usuario está activo: la página que el usuario tiene abierta envía una señal de presencia cada minuto mientras su pestaña está visible, como hacía cada visualización de página en Chamilo 1.11.x. Tras una inactividad superior a la duración de la sesión, la siguiente actividad abre una nueva conexión, de modo que el intervalo de inactividad no se contabiliza. Cerrar la sesión cierra la conexión actual. El tiempo que un administrador pasa usando **Iniciar sesión como** no se añade al usuario.

> **Nota:** Las conexiones registradas antes de que se restableciera este seguimiento pueden no tener fecha de cierre de sesión. Se contabilizan como cero, por lo que los totales de periodos anteriores a la actualización pueden ser inferiores al tiempo realmente empleado.