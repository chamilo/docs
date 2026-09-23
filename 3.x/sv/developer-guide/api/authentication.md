# Autentisering

Chamilo-API:et använder **JWT (JSON Web Tokens)** för autentisering, implementerat via `lexik/jwt-authentication-bundle`.

## Hämta en token

Skicka en POST-förfrågan till autentiseringsändpunkten:

```
POST /api/authentication_token
Content-Type: application/json

{
  "username": "admin",
  "password": "your-password"
}
```

Svar:

```json
{
  "token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9..."
}
```

## Använda tokenen

Inkludera tokenen i headern `Authorization` i efterföljande förfrågningar:

```
GET /api/users
Authorization: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9...
```

## Tokenens livscykel

* Tokens har en konfigurerbar giltighetstid
* När en token har gått ut måste klienten begära en ny
* JWT-nycklar lagras i `config/jwt/` (privat och publik nyckel)

## Generera JWT-nycklar

```bash
php bin/console lexik:jwt:generate-keypair
```

Detta skapar:
* `config/jwt/private.pem` — Privat nyckel för att signera tokens
* `config/jwt/public.pem` — Publik nyckel för att verifiera tokens

Konfigurera lösenfrasen i `.env`:

```env
JWT_PASSPHRASE=your-passphrase
```

## API-dokumentation

När `APP_ENABLE_API_ENTRYPOINT=true` är satt i miljön är API-dokumentationen tillgänglig på `/api`. Detta ger ett interaktivt Swagger/OpenAPI-gränssnitt för att utforska och testa ändpunkter.

Att sätta variabeln räcker inte i sig — Symfony-cachen måste rensas för att ändringen ska träda i kraft. Se [Miljövariabler (.env)](../../admin-guide/installation/configuration.md#enable-the-api-documentation) i administratörsguiden.