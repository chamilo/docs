# API d'inscription des apprenants aux sessions

Les intégrations peuvent lister, inscrire et retirer des apprenants d'une session au moyen de points de terminaison réservés aux administrateurs. Ces actions utilisent le comportement d'inscription aux sessions des écrans d'administration de Chamilo. Elles sont distinctes de `/api/course-sessions/actions/*`, qui relève d'un autre flux de travail orienté tuteur.

## Authentification et accès

Chaque opération ci-dessous exige une authentification avec le rôle de plateforme `ROLE_ADMIN`. Le seul statut d'administrateur de session n'accorde **pas** l'accès. Utilisez la méthode d'authentification décrite dans [Authentification](authentication.md).

Dans les installations multi-URL, la session demandée doit appartenir à l'URL d'accès courante ; sinon, le point de terminaison répond par `404`.

## Routes

| Méthode | Point de terminaison | Objet |
|--------|----------|---------|
| `GET` | `/api/sessions/{id}/students` | Lister les identifiants utilisateur des apprenants inscrits à cette session |
| `POST` | `/api/sessions/{id}/students/subscribe` | Ajouter les apprenants indiqués, en conservant les apprenants existants |
| `POST` | `/api/sessions/{id}/students/unsubscribe` | Retirer uniquement les apprenants indiqués |

Remplacez `{id}` par l'identifiant numérique de la session. Pour les deux requêtes POST, envoyez du JSON contenant le tableau `userIds` :

```http
POST /api/sessions/42/students/subscribe
Authorization: Bearer <admin-token>
Content-Type: application/json
```

```json
{ "userIds": [17, 23] }
```

Une inscription réussie produit une réponse ayant la structure suivante ; les identifiants dépendent de votre installation :

```json
{
  "success": true,
  "applied": [17],
  "alreadyThere": [23],
  "ignored": []
}
```

`applied` contient les apprenants nouvellement inscrits ; `alreadyThere` contient les apprenants déjà inscrits ; `ignored` liste les identifiants inéligibles ou indisponibles. Lors de l'inscription, Chamilo inscrit également les apprenants ajoutés aux cours de la session. Il **ne remplace pas** l'ensemble de la liste des participants de la session.

Pour inspecter l'appartenance :

```http
GET /api/sessions/42/students
Authorization: Bearer <admin-token>
```

```json
{ "userIds": [17, 23] }
```

Pour retirer des apprenants sélectionnés :

```http
POST /api/sessions/42/students/unsubscribe
Authorization: Bearer <admin-token>
Content-Type: application/json
```

```json
{ "userIds": [17] }
```

La réponse de désinscription contient `success`, `applied` (identifiants retirés) et `ignored` (identifiants non inscrits). Les autres apprenants restent dans la session.

## Validation et limitations

* `userIds` doit être un tableau d'identifiants numériques (entiers ou chaînes composées uniquement de chiffres). Les identifiants répétés sont dédupliqués ; les valeurs non positives sont omises.
* Pour l'inscription, les utilisateurs éligibles doivent exister, ne pas être supprimés de manière logique, ne pas être anonymes ni responsables RH, et appartenir à l'URL d'accès courante.
* Un JSON ou un `userIds` manquant ou mal formé renvoie `400 Bad Request`.
* Les sessions manquantes ou hors périmètre renvoient `404 Not Found` ; les appelants sans autorisation d'administrateur ne peuvent pas utiliser ces routes.
* Les routes d'inscription des apprenants ne sont **pas** des points de terminaison CRUD génériques pour l'entité `Session`, et n'acceptent pas une liste de participants de session comme document de remplacement.

Pour l'interface d'administration correspondante, voir [Gestion des sessions](../../admin-guide/sessions/managing-sessions.md). Pour copier une session modèle avant d'inscrire des apprenants, voir [Duplication de session](session-duplication.md).

**Implémentation :** `src/CoreBundle/Controller/Api/SessionStudentsController.php`. Ajouté dans le commit Chamilo LMS `bdfb2dd661`.