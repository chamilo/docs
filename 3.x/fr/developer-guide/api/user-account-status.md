# Statut du compte utilisateur

Le champ `active` d'un utilisateur correspond au statut du compte. Un administrateur bloque ou débloque un compte en le modifiant avec `PATCH /api/users/{id}`. Cela remplace le champ `active` du service web `webservices/api/v2.php` de la version 1.11.x.

## Valeurs

| `active` | Signification |
|----------|---------|
| `1` | Actif : l'utilisateur peut se connecter |
| `0` | Inactif : le compte est bloqué |
| `-1` | Désactivé automatiquement par la plateforme |
| `-2` | Supprimé (dans la corbeille) |

L'API ne peut définir que `1` ou `0`. La suppression passe par `DELETE /api/users/{id}`, et la restauration d'un compte supprimé par la corbeille de l'administration.

## Lecture du statut

`active` est renvoyé par `GET /api/users/{id}` et par `GET /api/users?username=...`.

```http
GET /api/users/42
Authorization: Bearer <token>
Accept: application/json
```

```json
{ "id": 42, "username": "jdupont", "active": 1 }
```

## Modification du statut

```http
PATCH /api/users/42
Authorization: Bearer <token>
Content-Type: application/merge-patch+json
Accept: application/json

{ "active": 0 }
```

La réponse est l'utilisateur mis à jour. Envoyez `{ "active": 1 }` pour débloquer le compte. `active` peut être envoyé conjointement avec d'autres champs de l'utilisateur.

## Accès

| Appelant | Autorisé |
|--------|---------|
| `ROLE_ADMIN` | Tout utilisateur qu'il peut modifier, sauf son propre compte |
| Tout autre utilisateur | Non autorisé, même sur son propre compte |

L'envoi de la valeur actuelle n'est jamais refusé, de sorte qu'un client qui renvoie l'utilisateur complet n'est pas bloqué.

## Erreurs

| Statut | Cas |
|--------|------|
| `400` | Une valeur autre que `0` ou `1` |
| `401` | Identifiants absents ou non valides |
| `403` | L'appelant n'est pas administrateur, ou modifie son propre statut |
| `404` | L'utilisateur n'existe pas |