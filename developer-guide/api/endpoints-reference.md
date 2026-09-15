# Référence des points de terminaison

API Platform génère automatiquement des points de terminaison REST pour les entités annotées avec `#[ApiResource]`. Chamilo expose plus de 100 ressources.

## Opérations standard

Pour chaque ressource API, les opérations suivantes sont généralement disponibles :

| Method | Path | Description |
|--------|------|-------------|
| `GET` | `/api/{resources}` | Liste (collection) |
| `POST` | `/api/{resources}` | Création |
| `GET` | `/api/{resources}/{id}` | Lecture (élément unique) |
| `PUT` | `/api/{resources}/{id}` | Mise à jour complète |
| `PATCH` | `/api/{resources}/{id}` | Mise à jour partielle |
| `DELETE` | `/api/{resources}/{id}` | Suppression |

Toutes les opérations ne sont pas activées pour chaque ressource — des contraintes de sécurité s’appliquent.

## Ressources API clés

### Ressources de la plateforme

| Resource | Path | Description |
|----------|------|-------------|
| Users | `/api/users` | Comptes utilisateurs |
| Courses | `/api/courses` | Cours |
| Sessions | `/api/sessions` | Sessions de formation |
| Resource Nodes | `/api/resource_nodes` | Nœuds de contenu unifiés |
| Access URLs | `/api/access_urls` | Portails multi-URL |
| Messages | `/api/messages` | Messages de la plateforme |

### Ressources de contenu de cours

| Resource | Path | Description |
|----------|------|-------------|
| Documents | `/api/documents` | Documents de cours |
| Learning Paths | `/api/learning_paths` | Parcours d’apprentissage |
| Glossaries | `/api/glossaries` | Termes de glossaire |
| Links | `/api/links` | Liens externes |
| Calendar Events | `/api/c_calendar_events` | Événements d’agenda |
| Student Publications | `/api/c_student_publications` | Travaux |
| Blogs | `/api/c_blogs` | Blogs de cours |
| Groups | `/api/c_groups` | Groupes de cours |

### Ressources de suivi

| Resource | Path | Description |
|----------|------|-------------|
| Gradebook Categories | `/api/gradebook_categories` | Configuration du carnet de notes |
| Gradebook Results | `/api/gradebook_results` | Notes |

## Filtrage et pagination

API Platform prend en charge :

* **Pagination** : `?page=2&itemsPerPage=30`
* **Filtrage** : `?title=Introduction` (dépend des filtres configurés)
* **Tri** : `?order[title]=asc`
* **Recherche** : recherche en texte intégral sur les champs configurés

## Négociation de contenu

L’API prend en charge plusieurs formats :

* `application/ld+json` (par défaut — JSON-LD)
* `application/json`
* `text/html` (documentation de l’API)

Définissez l’en-tête `Accept` pour choisir le format de réponse.

## Sécurité

Chaque point de terminaison applique la sécurité via :

* l’authentification JWT (requise pour la plupart des points de terminaison)
* les voters de sécurité Symfony (permissions au niveau de la ressource)
* le contrôle d’accès basé sur les rôles (par ex. points de terminaison réservés aux administrateurs)