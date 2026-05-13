# Autenticación

La API de Chamilo utiliza **JWT (JSON Web Tokens)** para la autenticación, implementada a través de `lexik/jwt-authentication-bundle`.

## Obtener un Token

Envía una solicitud POST al endpoint de autenticación:

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

## Usar el Token

Incluye el token en el encabezado `Authorization` de las solicitudes posteriores:

```
GET /api/users
Authorization: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9...
```

## Ciclo de Vida del Token

* Los tokens tienen un tiempo de expiración configurable
* Cuando un token expira, el cliente debe solicitar uno nuevo
* Las claves JWT se almacenan en `config/jwt/` (claves privada y pública)

## Generar Claves JWT

```bash
php bin/console lexik:jwt:generate-keypair
```

Esto crea:
* `config/jwt/private.pem` — Clave privada para firmar tokens
* `config/jwt/public.pem` — Clave pública para verificar tokens

Configura la frase de contraseña en `.env`:

```env
JWT_PASSPHRASE=your-passphrase
```

## Documentación de la API

Cuando `APP_ENABLE_API_ENTRYPOINT=1` está configurado en el entorno, la documentación de la API está disponible en `/api`. Esto proporciona una interfaz interactiva Swagger/OpenAPI para explorar y probar los endpoints.