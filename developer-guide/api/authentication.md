# Authenticatie

De Chamilo API gebruikt **JWT (JSON Web Tokens)** voor authenticatie, geïmplementeerd via `lexik/jwt-authentication-bundle`.

## Een Token Verkrijgen

Stuur een POST-verzoek naar het authenticatie-eindpunt:

```
POST /api/authentication_token
Content-Type: application/json

{
  "username": "admin",
  "password": "your-password"
}
```

Antwoord:

```json
{
  "token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9..."
}
```

## Het Token Gebruiken

Voeg het token toe aan de `Authorization`-header van volgende verzoeken:

```
GET /api/users
Authorization: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9...
```

## Levenscyclus van het Token

* Tokens hebben een configureerbare vervaltijd
* Wanneer een token verloopt, moet de client een nieuwe aanvragen
* JWT-sleutels worden opgeslagen in `config/jwt/` (privé- en publieke sleutels)

## JWT-sleutels Genereren

```bash
php bin/console lexik:jwt:generate-keypair
```

Dit creëert:
* `config/jwt/private.pem` — Privésleutel voor het ondertekenen van tokens
* `config/jwt/public.pem` — Publieke sleutel voor het verifiëren van tokens

Configureer de wachtwoordzin in `.env`:

```env
JWT_PASSPHRASE=your-passphrase
```

## API-documentatie

Wanneer `APP_ENABLE_API_ENTRYPOINT=1` is ingesteld in de omgeving, is de API-documentatie beschikbaar op `/api`. Dit biedt een interactieve Swagger/OpenAPI-interface voor het verkennen en testen van eindpunten.