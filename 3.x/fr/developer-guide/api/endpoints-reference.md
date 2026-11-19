# Référence des points de terminaison

API Platform génère automatiquement des points de terminaison REST pour les entités annotées avec `#[ApiResource]`. Chamilo expose plus de 100 ressources.

## Opérations standard

Pour chaque ressource d’API, les opérations suivantes sont généralement disponibles :

| Méthode | Chemin | Description |
|--------|------|-------------|
| `GET` | `/api/{resources}` | Lister (collection) |
| `POST` | `/api/{resources}` | Créer |
| `GET` | `/api/{resources}/{id}` | Lire (élément unique) |
| `PUT` | `/api/{resources}/{id}` | Mise à jour complète |
| `PATCH` | `/api/{resources}/{id}` | Mise à jour partielle |
| `DELETE` | `/api/{resources}/{id}` | Supprimer |

Toutes les opérations ne sont pas activées pour chaque ressource — des contraintes de sécurité s’appliquent.

## Principales ressources d’API

### Ressources de la plateforme

| Ressource | Chemin | Description |
|----------|------|-------------|
| Users | `/api/users` | Comptes utilisateur |
| Courses | `/api/courses` | Cours |
| Sessions | `/api/sessions` | Sessions de formation |
| Promotions | `/api/promotions` | Promotions de parcours, en lecture seule (voir [Promotion de session](session-promotion.md)) |
| Resource Nodes | `/api/resource_nodes` | Nœuds de contenu unifiés |
| Access URLs | `/api/access_urls` | Portails multi-URL |
| Messages | `/api/messages` | Messages de la plateforme |

### Ressources de contenu de cours

| Ressource | Chemin | Description |
|----------|------|-------------|
| Documents | `/api/documents` | Documents de cours |
| Learning Paths | `/api/learning_paths` | Parcours d’apprentissage |
| Glossaries | `/api/glossaries` | Termes du glossaire |
| Links | `/api/links` | Liens externes |
| Calendar Events | `/api/c_calendar_events` | Événements de l’agenda |
| Student Publications | `/api/c_student_publications` | Travaux |
| Blogs | `/api/c_blogs` | Blogs de cours |
| Groups | `/api/c_groups` | Groupes de cours |

### Ressources de suivi

| Ressource | Chemin | Description |
|----------|------|-------------|
| Gradebook Categories | `/api/gradebook_categories` | Configuration du carnet de notes |
| Gradebook Results | `/api/gradebook_results` | Notes |

## Opérations administrateur sur les cours

En plus de la consultation et de la création de cours, la ressource d’API `Course` fournit les opérations réservées aux administrateurs `PATCH /api/courses/{id}` et `DELETE /api/courses/{id}`. Il n’existe pas d’opération `PUT` pour cette ressource, et le code interne du cours ne peut pas être modifié par un correctif. La suppression utilise le processus de nettoyage de maintenance des cours ; ses effets dans les portails multi-URL exigent de la prudence.

Voir [Administration des cours](course-administration.md) pour les requêtes, les permissions, les effets de bord et les limitations.

## Actions administratives d’inscription

Les routes de contrôleur explicitement implémentées ci-dessous ne sont **pas** des opérations génériques de ressource API Platform. Elles exigent `ROLE_ADMIN` et possèdent leurs propres contrats de requête et de réponse.

| Méthode | Chemin | Détails |
|--------|------|---------|
| `GET` | `/api/sessions/{id}/students` | Lister les identifiants des apprenants inscrits |
| `POST` | `/api/sessions/{id}/students/subscribe` | Ajouter les apprenants spécifiés |
| `POST` | `/api/sessions/{id}/students/unsubscribe` | Retirer les apprenants spécifiés |
| `GET` | `/api/usergroups/{id}/subscriptions` | Lire les identifiants utilisateur/session/cours de la classe |
| `PUT` | `/api/usergroups/{id}/users` | Remplacer la liste des membres de la classe |
| `PUT` | `/api/usergroups/{id}/sessions` | Remplacer la liste des sessions de la classe |
| `PUT` | `/api/usergroups/{id}/courses` | Remplacer la liste des cours de la classe |

Voir [Inscription des étudiants à une session](session-students.md) et [Abonnements de classe](class-subscriptions.md) pour la validation, les permissions, la portée multi-URL et les différences importantes entre les opérations additives et de remplacement.

## Filtrage et pagination

API Platform prend en charge :

* **Pagination** : `?page=2&itemsPerPage=30`
* **Filtrage** : `?title=Introduction` (selon les filtres configurés)
* **Tri** : `?order[title]=asc`
* **Recherche** : recherche plein texte sur les champs configurés

## Négociation de contenu

L’API prend en charge plusieurs formats :

* `application/ld+json` (par défaut — JSON-LD)
* `application/json`
* `text/html` (documentation de l’API)

Définissez l’en-tête `Accept` pour choisir le format de la réponse.

## Sécurité

Chaque point de terminaison applique la sécurité au moyen de :

* l’authentification JWT (requise pour la plupart des points de terminaison)
* les voters de sécurité Symfony (permissions au niveau de la ressource)
* le contrôle d’accès fondé sur les rôles (par exemple, les points de terminaison réservés aux administrateurs)