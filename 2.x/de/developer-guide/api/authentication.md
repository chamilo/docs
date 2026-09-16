# Authentifizierung

Die Chamilo API verwendet **JWT (JSON Web Tokens)** zur Authentifizierung, implementiert über `lexik/jwt-authentication-bundle`.

## Token erhalten

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

Fügen Sie den Token in den `Authorization`-Header nachfolgender Anfragen ein:

```
GET /api/users
Authorization: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9...
```

## Token-Lebenszyklus

* Tokens haben eine konfigurierbare Ablaufzeit
* Wenn ein Token abläuft, muss der Client einen neuen anfordern
* JWT-Schlüssel werden in `config/jwt/` gespeichert (private und öffentliche Schlüssel)

## JWT-Schlüssel generieren

```bash
php bin/console lexik:jwt:generate-keypair
```

Dies erstellt:
* `config/jwt/private.pem` — Privater Schlüssel zum Signieren von Tokens
* `config/jwt/public.pem` — Öffentlicher Schlüssel zum Verifizieren von Tokens

Konfigurieren Sie die Passphrase in `.env`:

```env
JWT_PASSPHRASE=your-passphrase
```

## API-Dokumentation

Wenn `APP_ENABLE_API_ENTRYPOINT=1` in der Umgebung gesetzt ist, ist die API-Dokumentation unter `/api` verfügbar. Dies bietet eine interaktive Swagger/OpenAPI-Schnittstelle zum Erkunden und Testen von Endpunkten.