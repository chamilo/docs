# Authentification

L’API de Chamilo utilise des **JWT (JSON Web Tokens)** pour l’authentification, implémentés via `lexik/jwt-authentication-bundle`.

## Obtention d’un jeton

Envoyez une requête POST vers le point de terminaison d’authentification :

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

## Utilisation du jeton

Incluez le jeton dans l’en-tête `Authorization` des requêtes suivantes :

```
GET /api/users
Authorization: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9...
```

## Cycle de vie du jeton

* Les jetons ont une durée d’expiration configurable
* Lorsqu’un jeton expire, le client doit en demander un nouveau
* Les clés JWT sont stockées dans `config/jwt/` (clés privée et publique)

## Génération des clés JWT

```bash
php bin/console lexik:jwt:generate-keypair
```

Cela crée :
* `config/jwt/private.pem` — Clé privée pour signer les jetons
* `config/jwt/public.pem` — Clé publique pour vérifier les jetons

Configurez la phrase secrète dans `.env` :

```env
JWT_PASSPHRASE=your-passphrase
```

## Documentation de l’API

Lorsque `APP_ENABLE_API_ENTRYPOINT=true` est défini dans l’environnement, la documentation de l’API est disponible à `/api`. Elle fournit une interface interactive Swagger/OpenAPI pour explorer et tester les points de terminaison.

Le simple réglage de la variable ne suffit pas — le cache Symfony doit être vidé pour que le changement prenne effet. Voir [Variables d’environnement (.env)](../../admin-guide/installation/configuration.md#enable-the-api-documentation) dans le Guide d’administration.