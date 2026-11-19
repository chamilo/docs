# API d'administration des cours

Chamilo 3.1 permet aux intégrations d'administration de mettre à jour les métadonnées des cours et de supprimer des cours via la ressource API `Course`. Ces opérations ont été ajoutées pour la synchronisation avec des systèmes d'administration externes, tels qu'un ERP.

## Autorisations

| Opération | Méthode et point de terminaison | Rôle requis |
|-----------|---------------------|---------------|
| Lister les cours | `GET /api/courses` | Enseignant ou administrateur de la plateforme |
| Consulter un cours | `GET /api/courses/{id}` | Autorisation de consulter ce cours |
| Créer un cours | `POST /api/courses` | Enseignant ou administrateur de la plateforme |
| Mettre à jour un cours | `PATCH /api/courses/{id}` | **Administrateur de la plateforme (`ROLE_ADMIN`)** |
| Supprimer un cours | `DELETE /api/courses/{id}` | **Administrateur de la plateforme (`ROLE_ADMIN`)** |

`PUT` n'est pas configuré comme opération sur cette ressource. Les enseignants doivent continuer à modifier leurs propres cours via l'interface des paramètres du cours ; les nouvelles opérations d'écriture de l'API sont réservées aux administrateurs.

Utilisez un compte authentifié ou des identifiants d'intégration disposant des autorisations nécessaires. Voir [Authentification de l'API](authentication.md).

## Mettre à jour les métadonnées d'un cours

Envoyez une requête JSON Merge Patch d'API Platform pour modifier uniquement les propriétés fournies dans le corps :

```http
PATCH /api/courses/42
Authorization: Bearer <admin-token>
Content-Type: application/merge-patch+json
Accept: application/ld+json
```

```json
{
  "title": "Introduction to Accounting - 2026"
}
```

La requête met à jour le cours existant au lieu d'en créer un nouveau. L'API accepte les propriétés accessibles en écriture définies par le groupe de sérialisation `course:write`, sous réserve de la validation de l'entité. Parmi les exemples figurent `title`, `visibility`, `categories`, `departmentUrl`, `videoUrl`, `sticky` et `duration`. Les propriétés de relation telles que `categories` exigent la représentation de ressource attendue par l'API ; consultez la documentation OpenAPI plutôt que d'envoyer des identifiants de base de données arbitraires.

**Important :** le `code` interne du cours n'est **pas** accessible en écriture via cette opération PATCH. N'essayez pas de renommer le code interne d'un cours en envoyant un champ `code` ou `visualCode`.

## Supprimer un cours

```http
DELETE /api/courses/42
Authorization: Bearer <admin-token>
```

Il s'agit d'une opération d'administration **destructive**. Chamilo appelle le même assistant de suppression de cours que celui utilisé par la maintenance des cours, au lieu de supprimer directement l'entité Doctrine. Il nettoie les inscriptions associées, les liens de session et de classe, les données de suivi et l'indexation de recherche associée, le cas échéant.

Dans une installation **multi-URL**, la suppression peut uniquement détacher le cours de l'URL d'accès actuelle plutôt que de le supprimer partout. Les documents du cours ne sont pas supprimés au moyen de l'option distincte *supprimer les documents exclusifs* de l'interface de maintenance. N'interprétez pas une suppression via l'API comme une garantie que chaque document est physiquement retiré.

Si une dépendance active empêche la suppression (par exemple, une séquence de ressources), le point de terminaison peut répondre par `409 Conflict`. Examinez les dépendances du cours et les sauvegardes avant d'envoyer des requêtes DELETE, en particulier dans les intégrations par lots.

## Erreurs et notes opérationnelles

* Un appelant ne disposant pas du rôle d'administrateur requis est refusé ; utilisez un compte correctement autorisé plutôt que des identifiants d'enseignant pour PATCH ou DELETE.
* Des données de requête non valides peuvent faire échouer la validation de l'entité. Récupérez le cours actuel avant de le modifier, et n'envoyez que les propriétés que vous souhaitez changer.
* Ces opérations sont exposées par API Platform ; consultez la documentation OpenAPI de l'instance installée pour connaître le schéma de réponse exact et les formats de champs acceptés.
* Testez la suppression de cours sur un cours jetable, et non sur un cours contenant des dossiers d'apprenants de production.

Pour l'administration des cours dans l'interface, voir [Gestion des cours](../../admin-guide/courses/managing-courses.md). Pour les intégrations d'inscription aux sessions, voir [Inscription des étudiants aux sessions](session-students.md).

**Implémentation :** `src/CoreBundle/Entity/Course.php` (opérations `Patch` et `Delete`), et `src/CoreBundle/State/CourseDeleteProcessor.php`. Ajouté dans le commit Chamilo LMS `8cc9d4b33d`.