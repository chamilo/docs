# Authentification

L'API de Chamilo utilise **JWT (JSON Web Tokens)** pour l'authentification, implémenté via `lexik/jwt-authentication-bundle`.

## Obtenir un jeton

Envoyez une requête POST au point de terminaison d'authentification :

```
POST /api/authentication_token
Content-Type: application/json

{
  "username": "admin",
  "password": "your-password"
}
```

Réponse :

```json
{
  "token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9..."
}
```

## Utiliser le jeton

Incluez le jeton dans l'en-tête `Authorization` des requêtes suivantes :

```
GET /api/users
Authorization: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9...
```

## Cycle de vie du jeton

* Les jetons ont un temps d'expiration configurable
* Lorsqu'un jeton expire, le client doit en demander un nouveau
* Les clés JWT sont stockées dans `config/jwt/` (clés privée et publique)

## Générer des clés JWT

```bash
php bin/console lexik:jwt:generate-keypair
```

Cela crée :
* `config/jwt/private.pem` — Clé privée pour signer les jetons
* `config/jwt/public.pem` — Clé publique pour vérifier les jetons

Configurez la phrase de passe dans `.env` :

```env
JWT_PASSPHRASE=your-passphrase
```

## Documentation de l'API

Lorsque `APP_ENABLE_API_ENTRYPOINT=1` est défini dans l'environnement, la documentation de l'API est disponible à l'adresse `/api`. Cela fournit une interface interactive Swagger/OpenAPI pour explorer et tester les points de terminaison.