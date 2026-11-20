# Referentie van endpoints

API Platform genereert automatisch REST-endpoints voor entiteiten die zijn geannoteerd met `#[ApiResource]`. Chamilo stelt meer dan 100 resources beschikbaar.

## Standaardbewerkingen

Voor elke API-resource zijn doorgaans de volgende bewerkingen beschikbaar:

| Method | Path | Description |
|--------|------|-------------|
| `GET` | `/api/{resources}` | Lijst (collectie) |
| `POST` | `/api/{resources}` | Aanmaken |
| `GET` | `/api/{resources}/{id}` | Lezen (enkel item) |
| `PUT` | `/api/{resources}/{id}` | Volledige bijwerking |
| `PATCH` | `/api/{resources}/{id}` | Gedeeltelijke bijwerking |
| `DELETE` | `/api/{resources}/{id}` | Verwijderen |

Niet alle bewerkingen zijn voor elke resource ingeschakeld — beveiligingsbeperkingen zijn van toepassing.

## Belangrijke API-resources

### Platformresources

| Resource | Path | Description |
|----------|------|-------------|
| Users | `/api/users` | Gebruikersaccounts |
| Courses | `/api/courses` | Cursussen |
| Sessions | `/api/sessions` | Trainingssessies |
| Promotions | `/api/promotions` | Loopbaanpromoties, alleen-lezen (zie [Sessiepromotie](session-promotion.md)) |
| Resource Nodes | `/api/resource_nodes` | Geünificeerde inhoudsknooppunten |
| Access URLs | `/api/access_urls` | Multi-URL-portalen |
| Messages | `/api/messages` | Platformberichten |

### Resources voor cursusinhoud

| Resource | Path | Description |
|----------|------|-------------|
| Documents | `/api/documents` | Cursusdocumenten |
| Learning Paths | `/api/learning_paths` | Leerpaden |
| Glossaries | `/api/glossaries` | Woordenlijsttermen |
| Links | `/api/links` | Externe links |
| Calendar Events | `/api/c_calendar_events` | Agenda-evenementen |
| Student Publications | `/api/c_student_publications` | Opdrachten |
| Blogs | `/api/c_blogs` | Cursusblogs |
| Groups | `/api/c_groups` | Cursusgroepen |

### Trackingresources

| Resource | Path | Description |
|----------|------|-------------|
| Gradebook Categories | `/api/gradebook_categories` | Gradebook-instelling |
| Gradebook Results | `/api/gradebook_results` | Cijfers |

## Cursusbewerkingen voor beheerders

Naast het weergeven en aanmaken van cursussen biedt de API-resource `Course` de alleen-voor-beheerders-bewerkingen `PATCH /api/courses/{id}` en `DELETE /api/courses/{id}`. Er is geen `PUT`-bewerking voor deze resource, en de interne cursuscode kan niet worden gepatcht. Verwijdering gebruikt het opschoningsproces voor cursusonderhoud; de effecten daarvan in multi-URL-portalen vereisen zorgvuldigheid.

Zie [Cursusbeheer](course-administration.md) voor verzoeken, machtigingen, neveneffecten en beperkingen.

## Administratieve inschrijvingsacties

De volgende expliciet geïmplementeerde controllerroutes zijn **geen** generieke resourcebewerkingen van API Platform. Ze vereisen `ROLE_ADMIN` en hebben eigen contracten voor verzoek en antwoord.

| Method | Path | Details |
|--------|------|---------|
| `GET` | `/api/sessions/{id}/students` | Ingeschreven leerder-ID's weergeven |
| `POST` | `/api/sessions/{id}/students/subscribe` | Opgegeven leerders toevoegen |
| `POST` | `/api/sessions/{id}/students/unsubscribe` | Opgegeven leerders verwijderen |
| `GET` | `/api/usergroups/{id}/subscriptions` | Gebruiker-/sessie-/cursus-ID's van de klas lezen |
| `PUT` | `/api/usergroups/{id}/users` | Ledenlijst van de klas vervangen |
| `PUT` | `/api/usergroups/{id}/sessions` | Sessielijst van de klas vervangen |
| `PUT` | `/api/usergroups/{id}/courses` | Cursuslijst van de klas vervangen |

Zie [Inschrijving van sessieleerders](session-students.md) en [Klasabonnementen](class-subscriptions.md) voor validatie, machtigingen, multi-URL-bereik en belangrijke verschillen tussen additieve en vervangende bewerkingen.

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

Stel de header `Accept` in om het antwoordformaat te kiezen.

## Beveiliging

Elk endpoint handhaaft beveiliging via:

* JWT-authenticatie (vereist voor de meeste endpoints)
* Symfony-security voters (machtigingen op resourceniveau)
* Op rollen gebaseerde toegangscontrole (bijv. alleen-voor-beheerders-endpoints)