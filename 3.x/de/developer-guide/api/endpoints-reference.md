# Endpunkte-Referenz

API Platform generiert automatisch REST-Endpunkte für Entitäten, die mit `#[ApiResource]` annotiert sind. Chamilo stellt über 100 Ressourcen bereit.

## Standardoperationen

Für jede API-Ressource stehen in der Regel die folgenden Operationen zur Verfügung:

| Method | Path | Description |
|--------|------|-------------|
| `GET` | `/api/{resources}` | Auflisten (Sammlung) |
| `POST` | `/api/{resources}` | Erstellen |
| `GET` | `/api/{resources}/{id}` | Lesen (einzelnes Element) |
| `PUT` | `/api/{resources}/{id}` | Vollständige Aktualisierung |
| `PATCH` | `/api/{resources}/{id}` | Teilweise Aktualisierung |
| `DELETE` | `/api/{resources}/{id}` | Löschen |

Nicht alle Operationen sind für jede Ressource aktiviert — es gelten Sicherheitsbeschränkungen.

## Wichtige API-Ressourcen

### Plattformressourcen

| Resource | Path | Description |
|----------|------|-------------|
| Users | `/api/users` | Benutzerkonten |
| Courses | `/api/courses` | Kurse |
| Sessions | `/api/sessions` | Trainingssitzungen |
| Resource Nodes | `/api/resource_nodes` | Vereinheitlichte Inhaltsknoten |
| Access URLs | `/api/access_urls` | Multi-URL-Portale |
| Messages | `/api/messages` | Plattformnachrichten |

### Kursinhaltsressourcen

| Resource | Path | Description |
|----------|------|-------------|
| Documents | `/api/documents` | Kursdokumente |
| Learning Paths | `/api/learning_paths` | Lernpfade |
| Glossaries | `/api/glossaries` | Glossarbegriffe |
| Links | `/api/links` | Externe Links |
| Calendar Events | `/api/c_calendar_events` | Termine der Agenda |
| Student Publications | `/api/c_student_publications` | Aufgaben |
| Blogs | `/api/c_blogs` | Kursblogs |
| Groups | `/api/c_groups` | Kursgruppen |

### Tracking-Ressourcen

| Resource | Path | Description |
|----------|------|-------------|
| Gradebook Categories | `/api/gradebook_categories` | Notenbuch-Einrichtung |
| Gradebook Results | `/api/gradebook_results` | Noten |

## Filterung und Paginierung

API Platform unterstützt:

* **Paginierung**: `?page=2&itemsPerPage=30`
* **Filterung**: `?title=Introduction` (abhängig von den konfigurierten Filtern)
* **Sortierung**: `?order[title]=asc`
* **Suche**: Volltextsuche auf konfigurierten Feldern

## Content Negotiation

Die API unterstützt mehrere Formate:

* `application/ld+json` (Standard — JSON-LD)
* `application/json`
* `text/html` (API-Dokumentation)

Setzen Sie den Header `Accept`, um das Antwortformat festzulegen.

## Sicherheit

Jeder Endpunkt setzt Sicherheit durch:

* JWT-Authentifizierung (für die meisten Endpunkte erforderlich)
* Symfony-Security-Voters (Berechtigungen auf Ressourcenebene)
* Rollenbasierte Zugriffskontrolle (z. B. nur für Administratoren verfügbare Endpunkte)