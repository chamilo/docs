# Authentication

The Chamilo API uses **JWT (JSON Web Tokens)** for authentication, implemented via `lexik/jwt-authentication-bundle`.

## Obtaining a Token

Send a POST request to the authentication endpoint:

```
POST /api/authentication_token
Content-Type: application/json

{
  "username": "admin",
  "password": "your-password"
}
```

Response:

```json
{
  "token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9..."
}
```

## Using the Token

Include the token in the `Authorization` header of subsequent requests:

```
GET /api/users
Authorization: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9...
```

## Token Lifecycle

* Tokens have a configurable expiration time
* When a token expires, the client must request a new one
* JWT keys are stored in `config/jwt/` (private and public keys)

## Generating JWT Keys

```bash
php bin/console lexik:jwt:generate-keypair
```

This creates:
* `config/jwt/private.pem` — Private key for signing tokens
* `config/jwt/public.pem` — Public key for verifying tokens

Configure the passphrase in `.env.local`:

```env
JWT_PASSPHRASE=your-passphrase
```

## API Documentation

When `APP_ENABLE_API_ENTRYPOINT=1` is set in the environment, the API documentation is available at `/api`. This provides an interactive Swagger/OpenAPI interface for exploring and testing endpoints.
