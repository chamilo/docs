# Estado de la cuenta de usuario

El campo `active` de un usuario es el estado de la cuenta. Un administrador bloquea o desbloquea una cuenta modificándolo con `PATCH /api/users/{id}`. Esto sustituye el campo `active` del servicio web `webservices/api/v2.php` de la versión 1.11.x.

## Valores

| `active` | Significado |
|----------|---------|
| `1` | Activo: el usuario puede iniciar sesión |
| `0` | Inactivo: la cuenta está bloqueada |
| `-1` | Desactivado automáticamente por la plataforma |
| `-2` | Eliminado (en la papelera) |

La API solo puede establecer `1` o `0`. La eliminación se realiza mediante `DELETE /api/users/{id}`, y la restauración de una cuenta eliminada, a través de la papelera de la administración.

## Lectura del estado

`active` se devuelve mediante `GET /api/users/{id}` y mediante `GET /api/users?username=...`.

```http
GET /api/users/42
Authorization: Bearer <token>
Accept: application/json
```

```json
{ "id": 42, "username": "jdupont", "active": 1 }
```

## Cambio del estado

```http
PATCH /api/users/42
Authorization: Bearer <token>
Content-Type: application/merge-patch+json
Accept: application/json

{ "active": 0 }
```

La respuesta es el usuario actualizado. Envíe `{ "active": 1 }` para desbloquear la cuenta. `active` puede enviarse junto con otros campos del usuario.

## Acceso

| Llamante | Permitido |
|--------|---------|
| `ROLE_ADMIN` | Cualquier usuario que pueda editar, excepto su propia cuenta |
| Cualquier otro usuario | No permitido, ni siquiera en su propia cuenta |

El envío del valor actual nunca se rechaza, de modo que un cliente que reenvía el usuario completo no queda bloqueado.

## Errores

| Estado | Cuándo |
|--------|------|
| `400` | Un valor distinto de `0` o `1` |
| `401` | Credenciales ausentes o no válidas |
| `403` | El llamante no es administrador, o modifica su propio estado |
| `404` | El usuario no existe |