# Endpoints-reference

API Platform genererer automatisk REST-endpoints for entiteter annoteret med `#[ApiResource]`. Chamilo eksponerer 100+ ressourcer.

## Standardoperationer

For hver API-ressource er følgende operationer typisk tilgængelige:

| Method | Path | Description |
|--------|------|-------------|
| `GET` | `/api/{resources}` | List (collection) |
| `POST` | `/api/{resources}` | Create |
| `GET` | `/api/{resources}/{id}` | Read (single item) |
| `PUT` | `/api/{resources}/{id}` | Full update |
| `PATCH` | `/api/{resources}/{id}` | Partial update |
| `DELETE` | `/api/{resources}/{id}` | Delete |

Ikke alle operationer er aktiveret for hver ressource — der gælder sikkerhedsbegrænsninger.

## Centrale API-ressourcer

### Platformressourcer

| Resource | Path | Description |
|----------|------|-------------|
| Users | `/api/users` | Brugerkonti |
| Courses | `/api/courses` | Kurser |
| Sessions | `/api/sessions` | Uddannelsessessioner |
| Resource Nodes | `/api/resource_nodes` | Forenede indholds-noder |
| Access URLs | `/api/access_urls` | Multi-URL-portaler |
| Messages | `/api/messages` | Platformbeskeder |

### Kursusindholdsressourcer

| Resource | Path | Description |
|----------|------|-------------|
| Documents | `/api/documents` | Kursusdokumenter |
| Learning Paths | `/api/learning_paths` | Læringsstier |
| Glossaries | `/api/glossaries` | Ordlisteudtryk |
| Links | `/api/links` | Eksterne links |
| Calendar Events | `/api/c_calendar_events` | Agenda-begivenheder |
| Student Publications | `/api/c_student_publications` | Afleveringer |
| Blogs | `/api/c_blogs` | Kursusblogs |
| Groups | `/api/c_groups` | Kursusgrupper |

### Sporingsressourcer

| Resource | Path | Description |
|----------|------|-------------|
| Gradebook Categories | `/api/gradebook_categories` | Karakterbog-opsætning |
| Gradebook Results | `/api/gradebook_results` | Karakterer |

## Filtrering og paginering

API Platform understøtter:

* **Pagination**: `?page=2&itemsPerPage=30`
* **Filtering**: `?title=Introduction` (afhænger af konfigurerede filtre)
* **Ordering**: `?order[title]=asc`
* **Search**: Fuldtekstsøgning på konfigurerede felter

## Content Negotiation

API'et understøtter flere formater:

* `application/ld+json` (standard — JSON-LD)
* `application/json`
* `text/html` (API-dokumentation)

Angiv `Accept`-headeren for at vælge svarformatet.

## Sikkerhed

Hvert endpoint håndhæver sikkerhed via:

* JWT-autentificering (påkrævet for de fleste endpoints)
* Symfony security voters (tilladelser på ressourceniveau)
* Rollebaseret adgangskontrol (f.eks. endpoints kun for administratorer)