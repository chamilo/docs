# Autenticazione

L'API di Chamilo utilizza **JWT (JSON Web Tokens)** per l'autenticazione, implementata tramite `lexik/jwt-authentication-bundle`.

## Ottenere un Token

Invia una richiesta POST all'endpoint di autenticazione:

```
POST /api/authentication_token
Content-Type: application/json

{
  "username": "admin",
  "password": "your-password"
}
```

Risposta:

```json
{
  "token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9..."
}
```

## Utilizzo del Token

Includi il token nell'intestazione `Authorization` delle richieste successive:

```
GET /api/users
Authorization: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9...
```

## Ciclo di Vita del Token

* I token hanno un tempo di scadenza configurabile
* Quando un token scade, il client deve richiederne uno nuovo
* Le chiavi JWT sono memorizzate in `config/jwt/` (chiavi private e pubbliche)

## Generazione delle Chiavi JWT

```bash
php bin/console lexik:jwt:generate-keypair
```

Questo crea:
* `config/jwt/private.pem` — Chiave privata per la firma dei token
* `config/jwt/public.pem` — Chiave pubblica per la verifica dei token

Configura la passphrase in `.env`:

```env
JWT_PASSPHRASE=your-passphrase
```

## Documentazione API

Quando `APP_ENABLE_API_ENTRYPOINT=1` è impostato nell'ambiente, la documentazione API è disponibile all'indirizzo `/api`. Questo fornisce un'interfaccia interattiva Swagger/OpenAPI per esplorare e testare gli endpoint.