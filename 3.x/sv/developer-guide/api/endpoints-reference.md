# Endpunktsreferens

API Platform genererar automatiskt REST-endpunkter för entiteter annoterade med `#[ApiResource]`. Chamilo exponerar mer än 100 resurser.

## Standardoperationer

För varje API-resurs är följande operationer vanligtvis tillgängliga:

| Method | Path | Description |
|--------|------|-------------|
| `GET` | `/api/{resources}` | Lista (samling) |
| `POST` | `/api/{resources}` | Skapa |
| `GET` | `/api/{resources}/{id}` | Läs (enskilt objekt) |
| `PUT` | `/api/{resources}/{id}` | Fullständig uppdatering |
| `PATCH` | `/api/{resources}/{id}` | Partiell uppdatering |
| `DELETE` | `/api/{resources}/{id}` | Ta bort |

Alla operationer är inte aktiverade för varje resurs — säkerhetsbegränsningar gäller.

## Viktiga API-resurser

### Plattformsresurser

| Resource | Path | Description |
|----------|------|-------------|
| Users | `/api/users` | Användarkonton |
| Courses | `/api/courses` | Kurser |
| Sessions | `/api/sessions` | Utbildningssessioner |
| Resource Nodes | `/api/resource_nodes` | Enhetliga innehållsnoder |
| Access URLs | `/api/access_urls` | Portaler med flera URL:er |
| Messages | `/api/messages` | Plattformsmeddelanden |

### Kursinnehållsresurser

| Resource | Path | Description |
|----------|------|-------------|
| Documents | `/api/documents` | Kursdokument |
| Learning Paths | `/api/learning_paths` | Lärstigar |
| Glossaries | `/api/glossaries` | Ordlistetermer |
| Links | `/api/links` | Externa länkar |
| Calendar Events | `/api/c_calendar_events` | Agenda-händelser |
| Student Publications | `/api/c_student_publications` | Inlämningsuppgifter |
| Blogs | `/api/c_blogs` | Kursbloggar |
| Groups | `/api/c_groups` | Kursgrupper |

### Uppföljningsresurser

| Resource | Path | Description |
|----------|------|-------------|
| Gradebook Categories | `/api/gradebook_categories` | Betygsbokens konfiguration |
| Gradebook Results | `/api/gradebook_results` | Betyg |

## Filtrering och paginering

API Platform stöder:

* **Paginering**: `?page=2&itemsPerPage=30`
* **Filtrering**: `?title=Introduction` (beror på konfigurerade filter)
* **Sortering**: `?order[title]=asc`
* **Sökning**: Fulltextsökning på konfigurerade fält

## Innehållsförhandling

API:et stöder flera format:

* `application/ld+json` (standard — JSON-LD)
* `application/json`
* `text/html` (API-dokumentation)

Ange headern `Accept` för att välja svarsformat.

## Säkerhet

Varje endpunkt tillämpar säkerhet genom:

* JWT-autentisering (krävs för de flesta endpunkter)
* Symfony security voters (behörigheter på resursnivå)
* Rollbaserad åtkomstkontroll (t.ex. endpunkter endast för administratörer)