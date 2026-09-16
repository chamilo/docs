# Endpointsreferentie

API Platform genereert automatisch REST-endpoints voor entiteiten die zijn geannoteerd met `#[ApiResource]`. Chamilo stelt 100+ resources beschikbaar.

## Standaardbewerkingen

Voor elke API-resource zijn doorgaans de volgende bewerkingen beschikbaar:

| Method | Path | Description |
|--------|------|-------------|
| `GET` | `/api/{resources}` | Lijst (collectie) |
| `POST` | `/api/{resources}` | Aanmaken |
| `GET` | `/api/{resources}/{id}` | Lezen (enkel item) |
| `PUT` | `/api/{resources}/{id}` | Volledige update |
| `PATCH` | `/api/{resources}/{id}` | Gedeeltelijke update |
| `DELETE` | `/api/{resources}/{id}` | Verwijderen |

Niet alle bewerkingen zijn voor elke resource ingeschakeld — er gelden beveiligingsbeperkingen.

## Belangrijke API-resources

### Platformresources

| Resource | Path | Description |
|----------|------|-------------|
| Users | `/api/users` | Gebruikersaccounts |
| Courses | `/api/courses` | Cursussen |
| Sessions | `/api/sessions` | Trainingssessies |
| Resource Nodes | `/api/resource_nodes` | Geünificeerde contentnodes |
| Access URLs | `/api/access_urls` | Multi-URL-portalen |
| Messages | `/api/messages` | Platformberichten |

### Cursusinhoudsresources

| Resource | Path | Description |
|----------|------|-------------|
| Documents | `/api/documents` | Cursusdocumenten |
| Learning Paths | `/api/learning_paths` | Leerpaden |
| Glossaries | `/api/glossaries` | Glossariumtermen |
| Links | `/api/links` | Externe links |
| Calendar Events | `/api/c_calendar_events` | Agenda-evenementen |
| Student Publications | `/api/c_student_publications` | Opdrachten |
| Blogs | `/api/c_blogs` | Cursusblogs |
| Groups | `/api/c_groups` | Cursusgroepen |

### Trackingresources

| Resource | Path | Description |
|----------|------|-------------|
| Gradebook Categories | `/api/gradebook_categories` | Gradebook-inrichting |
| Gradebook Results | `/api/gradebook_results` | Cijfers |

## Filteren en paginering

API Platform ondersteunt:

* **Paginering**: `?page=2&itemsPerPage=30`
* **Filteren**: `?title=Introduction` (afhankelijk van geconfigureerde filters)
* **Sorteren**: `?order[title]=asc`
* **Zoeken**: Full-text search op geconfigureerde velden

## Content negotiation

De API ondersteunt meerdere formaten:

* `application/ld+json` (standaard — JSON-LD)
* `application/json`
* `text/html` (API-documentatie)

Stel de `Accept`-header in om het responseformaat te kiezen.

## Beveiliging

Elk endpoint dwingt beveiliging af via:

* JWT-authenticatie (vereist voor de meeste endpoints)
* Symfony security voters (machtigingen op resourceniveau)
* Role-based access control (bijv. endpoints alleen voor beheerders)