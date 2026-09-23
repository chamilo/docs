# Endepunktsreferanse

API Platform genererer automatisk REST-endepunkter for entiteter annotert med `#[ApiResource]`. Chamilo eksponerer mer enn 100 ressurser.

## Standardoperasjoner

For hver API-ressurs er følgende operasjoner vanligvis tilgjengelige:

| Method | Path | Description |
|--------|------|-------------|
| `GET` | `/api/{resources}` | List (collection) |
| `POST` | `/api/{resources}` | Create |
| `GET` | `/api/{resources}/{id}` | Read (single item) |
| `PUT` | `/api/{resources}/{id}` | Full update |
| `PATCH` | `/api/{resources}/{id}` | Partial update |
| `DELETE` | `/api/{resources}/{id}` | Delete |

Ikke alle operasjoner er aktivert for hver ressurs — sikkerhetsbegrensninger gjelder.

## Viktige API-ressurser

### Plattformressurser

| Resource | Path | Description |
|----------|------|-------------|
| Users | `/api/users` | User accounts |
| Courses | `/api/courses` | Courses |
| Sessions | `/api/sessions` | Training sessions |
| Resource Nodes | `/api/resource_nodes` | Unified content nodes |
| Access URLs | `/api/access_urls` | Multi-URL portals |
| Messages | `/api/messages` | Platform messages |

### Kursinnholdsressurser

| Resource | Path | Description |
|----------|------|-------------|
| Documents | `/api/documents` | Course documents |
| Learning Paths | `/api/learning_paths` | Learning paths |
| Glossaries | `/api/glossaries` | Glossary terms |
| Links | `/api/links` | External links |
| Calendar Events | `/api/c_calendar_events` | Agenda events |
| Student Publications | `/api/c_student_publications` | Assignments |
| Blogs | `/api/c_blogs` | Course blogs |
| Groups | `/api/c_groups` | Course groups |

### Sporingsressurser

| Resource | Path | Description |
|----------|------|-------------|
| Gradebook Categories | `/api/gradebook_categories` | Gradebook setup |
| Gradebook Results | `/api/gradebook_results` | Grades |

## Filtrering og paginering

API Platform støtter:

* **Paginering**: `?page=2&itemsPerPage=30`
* **Filtrering**: `?title=Introduction` (avhenger av konfigurerte filtre)
* **Sortering**: `?order[title]=asc`
* **Søk**: Fulltekstsøk på konfigurerte felt

## Innholdsforhandling

API-et støtter flere formater:

* `application/ld+json` (standard — JSON-LD)
* `application/json`
* `text/html` (API-dokumentasjon)

Sett `Accept`-headeren for å velge svarformat.

## Sikkerhet

Hvert endepunkt håndhever sikkerhet gjennom:

* JWT-autentisering (påkrevd for de fleste endepunkter)
* Symfony security voters (tillatelser på ressursnivå)
* Rollebasert tilgangskontroll (f.eks. endepunkter kun for administratorer)