# Riferimento Endpoint

API Platform genera automaticamente endpoint REST per le entità annotate con `#[ApiResource]`. Chamilo espone oltre 100 risorse.

## Operazioni Standard

Per ciascuna risorsa API, le seguenti operazioni sono generalmente disponibili:

| Method | Path | Description |
|--------|------|-------------|
| `GET` | `/api/{resources}` | Elenco (collezione) |
| `POST` | `/api/{resources}` | Creazione |
| `GET` | `/api/{resources}/{id}` | Lettura (elemento singolo) |
| `PUT` | `/api/{resources}/{id}` | Aggiornamento completo |
| `PATCH` | `/api/{resources}/{id}` | Aggiornamento parziale |
| `DELETE` | `/api/{resources}/{id}` | Eliminazione |

Non tutte le operazioni sono abilitate per ogni risorsa — si applicano vincoli di sicurezza.

## Risorse API Principali

### Risorse di Piattaforma

| Resource | Path | Description |
|----------|------|-------------|
| Users | `/api/users` | Account utente |
| Courses | `/api/courses` | Corsi |
| Sessions | `/api/sessions` | Sessioni formative |
| Resource Nodes | `/api/resource_nodes` | Nodi di contenuto unificati |
| Access URLs | `/api/access_urls` | Portali multi-URL |
| Messages | `/api/messages` | Messaggi di piattaforma |

### Risorse di Contenuto del Corso

| Resource | Path | Description |
|----------|------|-------------|
| Documents | `/api/documents` | Documenti del corso |
| Learning Paths | `/api/learning_paths` | Percorsi di apprendimento |
| Glossaries | `/api/glossaries` | Termini del glossario |
| Links | `/api/links` | Collegamenti esterni |
| Calendar Events | `/api/c_calendar_events` | Eventi dell'agenda |
| Student Publications | `/api/c_student_publications` | Compiti |
| Blogs | `/api/c_blogs` | Blog del corso |
| Groups | `/api/c_groups` | Gruppi del corso |

### Risorse di Tracking

| Resource | Path | Description |
|----------|------|-------------|
| Gradebook Categories | `/api/gradebook_categories` | Configurazione del registro voti |
| Gradebook Results | `/api/gradebook_results` | Voti |

## Filtri e Paginazione

API Platform supporta:

* **Paginazione**: `?page=2&itemsPerPage=30`
* **Filtri**: `?title=Introduction` (dipende dai filtri configurati)
* **Ordinamento**: `?order[title]=asc`
* **Ricerca**: ricerca full-text sui campi configurati

## Content Negotiation

L'API supporta più formati:

* `application/ld+json` (predefinito — JSON-LD)
* `application/json`
* `text/html` (documentazione API)

Impostare l'header `Accept` per scegliere il formato della risposta.

## Sicurezza

Ciascun endpoint applica la sicurezza tramite:

* Autenticazione JWT (richiesta per la maggior parte degli endpoint)
* Voter di sicurezza Symfony (permessi a livello di risorsa)
* Controllo degli accessi basato sui ruoli (ad es. endpoint riservati agli amministratori)