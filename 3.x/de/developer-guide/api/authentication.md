# Authentifizierung

Die Chamilo-API verwendet **JWT (JSON Web Tokens)** zur Authentifizierung, implementiert über `lexik/jwt-authentication-bundle`.

## Token beziehen

Senden Sie eine POST-Anfrage an den Authentifizierungsendpunkt:

```
POST /api/authentication_token
Content-Type: application/json

{
  "username": "admin",
  "password": "your-password"
}
```

Antwort:

```json
{
  "token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9..."
}
```

## Token verwenden

Fügen Sie den Token im Header `Authorization` nachfolgender Anfragen ein:

```
GET /api/users
Authorization: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9...
```

## Token-Lebenszyklus

* Tokens haben eine konfigurierbare Ablaufzeit
* Wenn ein Token abläuft, muss der Client einen neuen anfordern
* JWT-Schlüssel werden in `config/jwt/` gespeichert (privater und öffentlicher Schlüssel)

## JWT-Schlüssel erzeugen

```bash
php bin/console lexik:jwt:generate-keypair
```

Dadurch werden erzeugt:
* `config/jwt/private.pem` — Privater Schlüssel zum Signieren von Tokens
* `config/jwt/public.pem` — Öffentlicher Schlüssel zum Prüfen von Tokens

Konfigurieren Sie die Passphrase in `.env`:

```env
JWT_PASSPHRASE=your-passphrase
```

## API-Dokumentation

Wenn `APP_ENABLE_API_ENTRYPOINT=true` in der Umgebung gesetzt ist, steht die API-Dokumentation unter `/api` zur Verfügung. Sie bietet eine interaktive Swagger/OpenAPI-Oberfläche zum Erkunden und Testen von Endpunkten.

Das Setzen der Variable allein reicht nicht aus — der Symfony-Cache muss geleert werden, damit die Änderung wirksam wird. Siehe [Umgebungsvariablen (.env)](../../admin-guide/installation/configuration.md#enable-the-api-documentation) im Admin Guide.