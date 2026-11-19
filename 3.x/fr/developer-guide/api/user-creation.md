# Création d'utilisateur

`POST /api/access_urls/{id}/user` crée un utilisateur de la plateforme et l'ajoute à l'URL d'accès `{id}`. Il s'agit du remplacement, dans Chamilo 3, de l'action `save_user_json` du service web `webservices/api/v2.php` de la version 1.11.x, et il est destiné aux intégrations qui créent des comptes d'apprenants (boutiques, systèmes RH, portails d'inscription).

## Accès

| Appelant | Autorisé |
|--------|---------|
| `ROLE_ADMIN` | Oui |
| `ROLE_SESSION_MANAGER` | Oui |
| Toute autre personne | `403 Forbidden` |

Authentifiez-vous avec un JWT ou une clé d'API externe, comme décrit dans [Authentification](authentication.md).

## Requête

```http
POST /api/access_urls/1/user
Authorization: Bearer <token>
Content-Type: application/json
```

```json
{
  "username": "jdoe-20261022",
  "email": "jane.doe@example.com",
  "firstname": "Jane",
  "lastname": "Doe",
  "password": "S3cret!pass",
  "sendEmail": true,
  "extraFields": { "my_user_field": "value" }
}
```

| Champ | Obligatoire | Description |
|-------|----------|-------------|
| `username` | Oui | Identifiant de connexion du nouvel utilisateur. Il ne doit pas déjà être utilisé par un autre compte (comparaison insensible à la casse). |
| `email` | Oui | Une adresse e-mail valide. Plusieurs comptes peuvent partager la même adresse, sauf si `checkEmailDuplicates` vaut `true`. |
| `firstname`, `lastname` | Non | Prénom et nom. |
| `password` | Non | Mot de passe initial. Lorsqu'il est vide et que `sendEmail` vaut `true`, l'e-mail contient à la place un lien permettant de définir un mot de passe. |
| `locale` | Non | Langue de l'interface, par exemple `fr_FR`. Par défaut, la langue de la plateforme. |
| `timezone` | Non | Par défaut, le fuseau horaire de la plateforme. |
| `status` | Non | `5` (apprenant) par défaut ; `1` pour un enseignant. |
| `sendEmail` | Non | `true` par défaut. Envoie à l'utilisateur un message et un e-mail contenant ses informations d'accès. |
| `checkEmailDuplicates` | Non | `false` par défaut. Lorsque la valeur est `true`, la requête est refusée avec `409 email_already_exists` si un compte utilise déjà cette adresse e-mail (comparaison insensible à la casse). Même comportement que le paramètre `check_email_duplicates` de `save_user_json`. |
| `extraFields` | Non | Valeurs des champs supplémentaires de l'utilisateur, indexées par la variable du champ. Chaque variable doit correspondre à un champ supplémentaire d'utilisateur existant. |

### Adresses e-mail partagées

Chamilo n'exige pas que les adresses e-mail soient uniques : le formulaire de création d'utilisateur de l'administrateur accepte une adresse déjà utilisée par un autre compte, l'importation d'utilisateurs ne la refuse que lorsque l'option **Vérifier l'unicité de l'e-mail** est cochée, et aucun paramètre de la plateforme ne permet de modifier ce comportement. Un cas courant est celui d'un apprenant réinscrit sous un nouvel identifiant qui conserve la même adresse. Envoyez `checkEmailDuplicates: true` uniquement lorsque votre intégration souhaite traiter une adresse existante comme une erreur.

Lorsque le paramètre **L'identifiant est l'e-mail** est activé, le nom d'utilisateur est l'adresse e-mail ; le contrôle du nom d'utilisateur rejette donc déjà les doublons.

## Réponse

`201 Created` avec le nouvel utilisateur (groupe de sérialisation `user:read`), y compris son `id`.

## Erreurs

| Statut | Corps | Quand |
|--------|------|------|
| `401` | | Identifiants absents ou non valides |
| `403` | | L'appelant n'est ni administrateur ni administrateur de session |
| `409` | `{"error": "username_already_exists"}` | Le nom d'utilisateur est déjà utilisé |
| `409` | `{"error": "email_already_exists"}` | `checkEmailDuplicates` vaut `true` et l'adresse e-mail est déjà utilisée |
| `422` | | `username` ou `email` manquant, ou adresse e-mail non valide |

## Implémentation

* Opération : la ressource `AccessUrlUser` déclarée dans `src/CoreBundle/Entity/User.php`
* Entrée : `src/CoreBundle/Dto/CreateUserOnAccessUrlInput.php`
* Contrôleur : `src/CoreBundle/Controller/Api/CreateUserOnAccessUrlAction.php`
* La page **Inscrire un étudiant** de l'administrateur de session (`/admin-dashboard/register/{courseId}`) utilise ce point de terminaison avec `checkEmailDuplicates: true`, de sorte qu'elle avertit lorsque l'adresse est déjà utilisée.