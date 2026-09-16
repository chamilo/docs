# Référence des Points de Terminaison

API Platform génère automatiquement des points de terminaison REST pour les entités annotées avec `#[ApiResource]`. Chamilo expose plus de 100 ressources.

## Opérations Standard

Pour chaque ressource API, les opérations suivantes sont généralement disponibles :

| Méthode | Chemin | Description |
|--------|------|-------------|
| `GET` | `/api/{resources}` | Liste (collection) |
| `POST` | `/api/{resources}` | Créer |
| `GET` | `/api/{resources}/{id}` | Lire (élément unique) |
| `PUT` | `/api/{resources}/{id}` | Mise à jour complète |
| `PATCH` | `/api/{resources}/{id}` | Mise à jour partielle |
| `DELETE` | `/api/{resources}/{id}` | Supprimer |

Toutes les opérations ne sont pas activées pour chaque ressource — des contraintes de sécurité s'appliquent.

## Principales Ressources API

### Ressources de la Plateforme

| Ressource | Chemin | Description |
|----------|------|-------------|
| Utilisateurs | `/api/users` | Comptes utilisateurs |
| Cours | `/api/courses` | Cours |
| Sessions | `/api/sessions` | Sessions de formation |
| Nœuds de Ressources | `/api/resource_nodes` | Nœuds de contenu unifiés |
| URLs d'Accès | `/api/access_urls` | Portails multi-URL |
| Messages | `/api/messages` | Messages de la plateforme |

### Ressources de Contenu de Cours

| Ressource | Chemin | Description |
|----------|------|-------------|
| Documents | `/api/documents` | Documents de cours |
| Parcours d'Apprentissage | `/api/learning_paths` | Parcours d'apprentissage |
| Glossaires | `/api/glossaries` | Termes de glossaire |
| Liens | `/api/links` | Liens externes |
| Événements de Calendrier | `/api/c_calendar_events` | Événements d'agenda |
| Publications des Étudiants | `/api/c_student_publications` | Devoirs |
| Blogs | `/api/c_blogs` | Blogs de cours |
| Groupes | `/api/c_groups` | Groupes de cours |

### Ressources de Suivi

| Ressource | Chemin | Description |
|----------|------|-------------|
| Catégories de Carnet de Notes | `/api/gradebook_categories` | Configuration du carnet de notes |
| Résultats de Carnet de Notes | `/api/gradebook_results` | Notes |

## Filtrage et Pagination

API Platform prend en charge :

* **Pagination** : `?page=2&itemsPerPage=30`
* **Filtrage** : `?title=Introduction` (dépend des filtres configurés)
* **Tri** : `?order[title]=asc`
* **Recherche** : Recherche en texte intégral sur les champs configurés

## Négociation de Contenu

L'API prend en charge plusieurs formats :

* `application/ld+json` (par défaut — JSON-LD)
* `application/json`
* `text/html` (documentation de l'API)

Définissez l'en-tête `Accept` pour choisir le format de réponse.

## Sécurité

Chaque point de terminaison applique la sécurité à travers :

* Authentification JWT (requise pour la plupart des points de terminaison)
* Votants de sécurité Symfony (permissions au niveau des ressources)
* Contrôle d'accès basé sur les rôles (par exemple, points de terminaison réservés aux administrateurs)