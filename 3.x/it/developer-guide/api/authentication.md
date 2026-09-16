# Autenticazione

L'API di Chamilo utilizza i **JWT (JSON Web Tokens)** per l'autenticazione, implementati tramite `lexik/jwt-authentication-bundle`.

## Ottenere un token

Inviare una richiesta POST all'endpoint di autenticazione:

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

## Utilizzo del token

Includere il token nell'header `Authorization` delle richieste successive:

```
GET /api/users
Authorization: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9...
```

## Ciclo di vita del token

* I token hanno un tempo di scadenza configurabile
* Quando un token scade, il client deve richiederne uno nuovo
* Le chiavi JWT sono memorizzate in `config/jwt/` (chiave privata e chiave pubblica)

## Generazione delle chiavi JWT

```bash
php bin/console lexik:jwt:generate-keypair
```

Questo crea:
* `config/jwt/private.pem` — Chiave privata per la firma dei token
* `config/jwt/public.pem` — Chiave pubblica per la verifica dei token

Configurare la passphrase in `.env`:

```env
JWT_PASSPHRASE=your-passphrase
```

## Documentazione API

Quando `APP_ENABLE_API_ENTRYPOINT=true` è impostato nell'ambiente, la documentazione API è disponibile all'indirizzo `/api`. Questa fornisce un'interfaccia interattiva Swagger/OpenAPI per esplorare e testare gli endpoint.

Impostare la variabile non è sufficiente di per sé: la cache di Symfony deve essere svuotata affinché la modifica abbia effetto. Vedere [Variabili d'ambiente (.env)](../../admin-guide/installation/configuration.md#enable-the-api-documentation) nella Guida per l'amministratore.