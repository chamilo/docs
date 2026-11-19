# API d’appartenance et d’inscription aux classes

Pour les intégrations, Chamilo fournit des points de terminaison permettant de lire et de synchroniser les membres, les sessions et les cours associés à une **classe** existante. Une classe est un `Usergroup` de type *classe normale* ; ces routes ne s’appliquent **pas** aux groupes sociaux.

Contrairement à l’API des étudiants de session, les trois actions `PUT` de classe **remplacent l’intégralité de la liste spécifiée**. Les identifiants omis sont retirés de cette relation. Lisez la liste existante avant de la mettre à jour, et évitez d’utiliser `PUT` pour ajouter un seul membre, sauf si vous soumettez également toutes les personnes qui doivent rester.

## Autorisation

Toutes les routes ci-dessous exigent le rôle authentifié de la plateforme `ROLE_ADMIN`. La classe cible doit être disponible dans l’URL d’accès courante. Une classe absente ou hors périmètre renvoie `404` ; un usergroup qui n’est pas une classe normale renvoie `409 Conflict`.

Le contrôleur vérifie que les identifiants d’utilisateur, de cours et de session soumis existent. Dans une installation multi-URL, les **identifiants de cours et de session** soumis sont filtrés selon le portail courant ; toutefois, l’implémentation actuelle n’applique **pas** ce même filtre de portail aux **identifiants d’utilisateur**. Les intégrateurs ne doivent pas considérer ce point de terminaison comme une garantie d’isolation des utilisateurs au niveau du portail. Consultez les notes de revue de livraison concernant cette considération de sécurité encore ouverte.

## Lire les relations d’une classe

```http
GET /api/usergroups/31/subscriptions
Authorization: Bearer <admin-token>
```

Exemple de réponse :

```json
{
  "userIds": [17, 23],
  "sessionIds": [42],
  "courseIds": [8, 11]
}
```

## Remplacer une liste de relations

| Méthode | Point de terminaison | Propriété de la requête |
|--------|----------|------------------|
| `PUT` | `/api/usergroups/{id}/users` | `userIds` |
| `PUT` | `/api/usergroups/{id}/sessions` | `sessionIds` |
| `PUT` | `/api/usergroups/{id}/courses` | `courseIds` |

Par exemple, pour définir la liste complète des membres de la classe :

```http
PUT /api/usergroups/31/users
Authorization: Bearer <admin-token>
Content-Type: application/json
```

```json
{ "userIds": [17, 23, 29] }
```

Exemple de réponse :

```json
{
  "success": true,
  "applied": [17, 23, 29],
  "ignored": []
}
```

`applied` liste les identifiants acceptés, et pas nécessairement les identifiants nouvellement ajoutés. `ignored` identifie les identifiants demandés qui n’ont pas pu être appliqués (par exemple, un identifiant inconnu ou un cours/une session hors du portail courant). Les valeurs non positives sont omises, les doublons sont supprimés, et un JSON mal formé ou une propriété de requête qui n’est pas un tableau renvoie `400`.

Pour remplacer plutôt les sessions liées, appelez `PUT /api/usergroups/31/sessions` avec `{ "sessionIds": [42, 57] }`. Pour remplacer les cours liés, appelez `PUT /api/usergroups/31/courses` avec `{ "courseIds": [8, 11] }`.

**Important :** Chamilo applique ces modifications via les méthodes de synchronisation de `UsergroupHelper`. Modifier la liste des membres de la classe ou ses liaisons de session/cours peut également modifier les inscriptions associées. Ne manipulez pas directement les tables de relations des usergroups, et examinez l’effet du remplacement des listes avant d’exécuter une intégration en production.

Pour l’interface et le concept, voir [Classes](../../admin-guide/sessions/classes.md). Pour ajouter ou retirer des apprenants précis d’une session *sans* remplacer tous les membres, utilisez l’[API d’inscription des étudiants de session](session-students.md).

**Implémentation :** `src/CoreBundle/Controller/Api/UsergroupSubscriptionController.php`. Ajouté dans le commit Chamilo LMS `d8809925a4`.