# Authenticatie

De Chamilo API gebruikt **JWT (JSON Web Tokens)** voor authenticatie, geïmplementeerd via `lexik/jwt-authentication-bundle`.

## Een token verkrijgen

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

## Het token gebruiken

Neem het token op in de `Authorization`-header van volgende verzoeken:

```
GET /api/users
Authorization: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9...
```

## Levenscyclus van het token

* Tokens hebben een configureerbare vervaltijd
* Wanneer een token verloopt, moet de client een nieuw token aanvragen
* JWT-sleutels worden opgeslagen in `config/jwt/` (private en publieke sleutels)

## JWT-sleutels genereren

```bash
php bin/console lexik:jwt:generate-keypair
```

Dit maakt aan:
* `config/jwt/private.pem` — Private sleutel voor het ondertekenen van tokens
* `config/jwt/public.pem` — Publieke sleutel voor het verifiëren van tokens

Configureer de wachtwoordzin in `.env`:

```env
JWT_PASSPHRASE=your-passphrase
```

## API-documentatie

Wanneer `APP_ENABLE_API_ENTRYPOINT=true` is ingesteld in de omgeving, is de API-documentatie beschikbaar op `/api`. Dit biedt een interactieve Swagger/OpenAPI-interface om eindpunten te verkennen en te testen.

Het instellen van de variabele alleen is niet voldoende — de Symfony-cache moet worden gewist voordat de wijziging van kracht wordt. Zie [Omgevingsvariabelen (.env)](../../admin-guide/installation/configuration.md#enable-the-api-documentation) in de Admin Guide.