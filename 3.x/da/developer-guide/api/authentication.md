# Autentificering

Chamilo API'en bruger **JWT (JSON Web Tokens)** til autentificering, implementeret via `lexik/jwt-authentication-bundle`.

## Indhentning af et token

Send en POST-forespørgsel til autentificeringsendepunktet:

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

## Brug af tokenet

Inkluder tokenet i `Authorization`-headeren i efterfølgende forespørgsler:

```
GET /api/users
Authorization: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9...
```

## Tokenets livscyklus

* Tokens har en konfigurerbar udløbstid
* Når et token udløber, skal klienten anmode om et nyt
* JWT-nøgler gemmes i `config/jwt/` (private og offentlige nøgler)

## Generering af JWT-nøgler

```bash
php bin/console lexik:jwt:generate-keypair
```

Dette opretter:
* `config/jwt/private.pem` — Privat nøgle til signering af tokens
* `config/jwt/public.pem` — Offentlig nøgle til verifikation af tokens

Konfigurer adgangsfrasen i `.env`:

```env
JWT_PASSPHRASE=your-passphrase
```

## API-dokumentation

Når `APP_ENABLE_API_ENTRYPOINT=true` er sat i miljøet, er API-dokumentationen tilgængelig på `/api`. Dette giver en interaktiv Swagger/OpenAPI-grænseflade til at udforske og teste endepunkter.

Det er ikke tilstrækkeligt at sætte variablen alene — Symfony-cachen skal tømmes, før ændringen træder i kraft. Se [Miljøvariabler (.env)](../../admin-guide/installation/configuration.md#enable-the-api-documentation) i administratorvejledningen.