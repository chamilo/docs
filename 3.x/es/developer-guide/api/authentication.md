# Autenticación

La API de Chamilo utiliza **JWT (JSON Web Tokens)** para la autenticación, implementada mediante `lexik/jwt-authentication-bundle`.

## Obtención de un token

Envíe una petición POST al endpoint de autenticación:

```
POST /api/authentication_token
Content-Type: application/json

{
  "username": "admin",
  "password": "your-password"
}
```

Respuesta:

```json
{
  "token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9..."
}
```

## Uso del token

Incluya el token en la cabecera `Authorization` de las peticiones posteriores:

```
GET /api/users
Authorization: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9...
```

## Ciclo de vida del token

* Los tokens tienen un tiempo de caducidad configurable
* Cuando un token caduca, el cliente debe solicitar uno nuevo
* Las claves JWT se almacenan en `config/jwt/` (claves privada y pública)

## Generación de claves JWT

```bash
php bin/console lexik:jwt:generate-keypair
```

Esto crea:
* `config/jwt/private.pem` — Clave privada para firmar los tokens
* `config/jwt/public.pem` — Clave pública para verificar los tokens

Configure la frase de paso en `.env`:

```env
JWT_PASSPHRASE=your-passphrase
```

## Documentación de la API

Cuando `APP_ENABLE_API_ENTRYPOINT=true` está definido en el entorno, la documentación de la API está disponible en `/api`. Esto proporciona una interfaz interactiva Swagger/OpenAPI para explorar y probar los endpoints.

Definir la variable no es suficiente por sí sola: es necesario vaciar la caché de Symfony para que el cambio surta efecto. Consulte [Variables de entorno (.env)](../../admin-guide/installation/configuration.md#enable-the-api-documentation) en la Guía de administración.