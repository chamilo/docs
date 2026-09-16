# Eindpunten Referentie

API Platform genereert automatisch REST-eindpunten voor entiteiten die zijn geannoteerd met `#[ApiResource]`. Chamilo biedt meer dan 100 bronnen aan.

## Standaardbewerkingen

Voor elke API-bron zijn doorgaans de volgende bewerkingen beschikbaar:

| Methode | Pad | Beschrijving |
|--------|------|-------------|
| `GET` | `/api/{resources}` | Lijst (collectie) |
| `POST` | `/api/{resources}` | Aanmaken |
| `GET` | `/api/{resources}/{id}` | Lezen (enkel item) |
| `PUT` | `/api/{resources}/{id}` | Volledige update |
| `PATCH` | `/api/{resources}/{id}` | Gedeeltelijke update |
| `DELETE` | `/api/{resources}/{id}` | Verwijderen |

Niet alle bewerkingen zijn voor elke bron ingeschakeld — beveiligingsbeperkingen zijn van toepassing.

## Belangrijke API-bronnen

### Platformbronnen

| Bron | Pad | Beschrijving |
|----------|------|-------------|
| Gebruikers | `/api/users` | Gebruikersaccounts |
| Cursussen | `/api/courses` | Cursussen |
| Sessies | `/api/sessions` | Trainingssessies |
| Bronknooppunten | `/api/resource_nodes` | Uniforme inhoudsknooppunten |
| Toegangs-URL's | `/api/access_urls` | Multi-URL-portalen |
| Berichten | `/api/messages` | Platformberichten |

### Cursusinhoudbronnen

| Bron | Pad | Beschrijving |
|----------|------|-------------|
| Documenten | `/api/documents` | Cursusdocumenten |
| Leertrajecten | `/api/learning_paths` | Leertrajecten |
| Woordenlijsten | `/api/glossaries` | Woordenlijsttermen |
| Links | `/api/links` | Externe links |
| Agenda-evenementen | `/api/c_calendar_events` | Agenda-evenementen |
| Studentpublicaties | `/api/c_student_publications` | Opdrachten |
| Blogs | `/api/c_blogs` | Cursusblogs |
| Groepen | `/api/c_groups` | Cursusgroepen |

### Trackingbronnen

| Bron | Pad | Beschrijving |
|----------|------|-------------|
| Cijferboekcategorieën | `/api/gradebook_categories` | Cijferboekinstellingen |
| Cijferboekresultaten | `/api/gradebook_results` | Cijfers |

## Filteren en Paginering

API Platform ondersteunt:

* **Paginering**: `?page=2&itemsPerPage=30`
* **Filteren**: `?title=Introduction` (afhankelijk van geconfigureerde filters)
* **Sorteren**: `?order[title]=asc`
* **Zoeken**: Volledige tekstzoekopdracht op geconfigureerde velden

## Inhoudsonderhandeling

De API ondersteunt meerdere formaten:

* `application/ld+json` (standaard — JSON-LD)
* `application/json`
* `text/html` (API-documentatie)

Stel de `Accept`-header in om het antwoordformaat te kiezen.

## Beveiliging

Elk eindpunt handhaaft beveiliging door middel van:

* JWT-authenticatie (vereist voor de meeste eindpunten)
* Symfony beveiligingsstemmers (toestemmingen op bron-niveau)
* Rolgebaseerde toegangscontrole (bijv. eindpunten alleen voor beheerders)