# Autentikointi

Chamilo-API käyttää autentikointiin **JWT:tä (JSON Web Tokens)**, joka on toteutettu `lexik/jwt-authentication-bundle`-paketilla.

## Tokenin hankkiminen

Lähetä POST-pyyntö autentikointipäätepisteeseen:

```
POST /api/authentication_token
Content-Type: application/json

{
  "username": "admin",
  "password": "your-password"
}
```

Vastaus:

```json
{
  "token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9..."
}
```

## Tokenin käyttäminen

Sisällytä token myöhempien pyyntöjen `Authorization`-otsikkoon:

```
GET /api/users
Authorization: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9...
```

## Tokenin elinkaari

* Tokeneilla on määritettävissä oleva vanhenemisaika
* Kun token vanhenee, asiakkaan on pyydettävä uusi
* JWT-avaimet tallennetaan hakemistoon `config/jwt/` (yksityinen ja julkinen avain)

## JWT-avainten luominen

```bash
php bin/console lexik:jwt:generate-keypair
```

Tämä luo:
* `config/jwt/private.pem` — Yksityinen avain tokenien allekirjoittamiseen
* `config/jwt/public.pem` — Julkinen avain tokenien tarkistamiseen

Määritä salalause tiedostossa `.env`:

```env
JWT_PASSPHRASE=your-passphrase
```

## API-dokumentaatio

Kun ympäristössä on asetettu `APP_ENABLE_API_ENTRYPOINT=true`, API-dokumentaatio on saatavilla osoitteessa `/api`. Se tarjoaa interaktiivisen Swagger/OpenAPI-käyttöliittymän päätepisteiden tutkimiseen ja testaamiseen.

Muuttujan asettaminen ei yksinään riitä — Symfony-välimuisti on tyhjennettävä, jotta muutos tulee voimaan. Katso [Ympäristömuuttujat (.env)](../../admin-guide/installation/configuration.md#enable-the-api-documentation) ylläpito-oppaasta.