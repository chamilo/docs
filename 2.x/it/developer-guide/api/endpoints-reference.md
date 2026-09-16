# Riferimento agli Endpoint

API Platform genera automaticamente endpoint REST per le entità annotate con `#[ApiResource]`. Chamilo espone oltre 100 risorse.

## Operazioni Standard

Per ogni risorsa API, le seguenti operazioni sono generalmente disponibili:

| Metodo | Percorso | Descrizione |
|--------|----------|-------------|
| `GET` | `/api/{resources}` | Elenco (collezione) |
| `POST` | `/api/{resources}` | Crea |
| `GET` | `/api/{resources}/{id}` | Leggi (singolo elemento) |
| `PUT` | `/api/{resources}/{id}` | Aggiornamento completo |
| `PATCH` | `/api/{resources}/{id}` | Aggiornamento parziale |
| `DELETE` | `/api/{resources}/{id}` | Elimina |

Non tutte le operazioni sono abilitate per ogni risorsa — si applicano vincoli di sicurezza.

## Principali Risorse API

### Risorse della Piattaforma

| Risorsa | Percorso | Descrizione |
|----------|----------|-------------|
| Utenti | `/api/users` | Account utente |
| Corsi | `/api/courses` | Corsi |
| Sessioni | `/api/sessions` | Sessioni di formazione |
| Nodi di Risorsa | `/api/resource_nodes` | Nodi di contenuto unificati |
| URL di Accesso | `/api/access_urls` | Portali multi-URL |
| Messaggi | `/api/messages` | Messaggi della piattaforma |

### Risorse dei Contenuti dei Corsi

| Risorsa | Percorso | Descrizione |
|----------|----------|-------------|
| Documenti | `/api/documents` | Documenti del corso |
| Percorsi di Apprendimento | `/api/learning_paths` | Percorsi di apprendimento |
| Glossari | `/api/glossaries` | Termini del glossario |
| Collegamenti | `/api/links` | Collegamenti esterni |
| Eventi del Calendario | `/api/c_calendar_events` | Eventi dell'agenda |
| Pubblicazioni degli Studenti | `/api/c_student_publications` | Compiti |
| Blog | `/api/c_blogs` | Blog del corso |
| Gruppi | `/api/c_groups` | Gruppi del corso |

### Risorse di Monitoraggio

| Risorsa | Percorso | Descrizione |
|----------|----------|-------------|
| Categorie del Registro dei Voti | `/api/gradebook_categories` | Configurazione del registro dei voti |
| Risultati del Registro dei Voti | `/api/gradebook_results` | Voti |

## Filtraggio e Paginazione

API Platform supporta:

* **Paginazione**: `?page=2&itemsPerPage=30`
* **Filtraggio**: `?title=Introduction` (dipende dai filtri configurati)
* **Ordinamento**: `?order[title]=asc`
* **Ricerca**: Ricerca full-text sui campi configurati

## Negoziazione dei Contenuti

L'API supporta diversi formati:

* `application/ld+json` (predefinito — JSON-LD)
* `application/json`
* `text/html` (documentazione API)

Imposta l'intestazione `Accept` per scegliere il formato della risposta.

## Sicurezza

Ogni endpoint applica la sicurezza attraverso:

* Autenticazione JWT (richiesta per la maggior parte degli endpoint)
* Voter di sicurezza di Symfony (permessi a livello di risorsa)
* Controllo di accesso basato sui ruoli (ad esempio, endpoint riservati agli amministratori)