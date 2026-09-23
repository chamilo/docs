# Autentisering

Chamilo-API-et bruker **JWT (JSON Web Tokens)** for autentisering, implementert via `lexik/jwt-authentication-bundle`.

## Innhenting av et token

Send en POST-forespørsel til autentiseringsendepunktet:

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

## Bruk av tokenet

Inkluder tokenet i `Authorization`-headeren i påfølgende forespørsler:

```
GET /api/users
Authorization: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9...
```

## Tokenets livssyklus

* Tokens har en konfigurerbar utløpstid
* Når et token utløper, må klienten be om et nytt
* JWT-nøkler lagres i `config/jwt/` (privat og offentlig nøkkel)

## Generering av JWT-nøkler

```bash
php bin/console lexik:jwt:generate-keypair
```

Dette oppretter:
* `config/jwt/private.pem` — Privat nøkkel for signering av tokens
* `config/jwt/public.pem` — Offentlig nøkkel for verifisering av tokens

Konfigurer passfrasen i `.env`:

```env
JWT_PASSPHRASE=your-passphrase
```

## API-dokumentasjon

Når `APP_ENABLE_API_ENTRYPOINT=true` er satt i miljøet, er API-dokumentasjonen tilgjengelig på `/api`. Dette gir et interaktivt Swagger/OpenAPI-grensesnitt for å utforske og teste endepunkter.

Det er ikke tilstrekkelig å sette variabelen alene — Symfony-cachen må tømmes for at endringen skal tre i kraft. Se [Miljøvariabler (.env)](../../admin-guide/installation/configuration.md#enable-the-api-documentation) i administratorveiledningen.