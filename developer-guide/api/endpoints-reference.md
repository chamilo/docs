# Endpunkte-Referenz

API Platform generiert automatisch REST-Endpunkte für Entitäten, die mit `#[ApiResource]` annotiert sind. Chamilo stellt über 100 Ressourcen bereit.

## Standardoperationen

Für jede API-Ressource sind in der Regel folgende Operationen verfügbar:

| Methode | Pfad | Beschreibung |
|--------|------|-------------|
| `GET` | `/api/{resources}` | Liste (Sammlung) |
| `POST` | `/api/{resources}` | Erstellen |
| `GET` | `/api/{resources}/{id}` | Lesen (einzelnes Element) |
| `PUT` | `/api/{resources}/{id}` | Vollständige Aktualisierung |
| `PATCH` | `/api/{resources}/{id}` | Teilweise Aktualisierung |
| `DELETE` | `/api/{resources}/{id}` | Löschen |

Nicht alle Operationen sind für jede Ressource aktiviert — Sicherheitsbeschränkungen gelten.

## Wichtige API-Ressourcen

### Plattform-Ressourcen

| Ressource | Pfad | Beschreibung |
|----------|------|-------------|
| Benutzer | `/api/users` | Benutzerkonten |
| Kurse | `/api/courses` | Kurse |
| Sitzungen | `/api/sessions` | Trainingssitzungen |
| Ressourcen-Knoten | `/api/resource_nodes` | Einheitliche Inhaltsknoten |
| Zugriffs-URLs | `/api/access_urls` | Multi-URL-Portale |
| Nachrichten | `/api/messages` | Plattformnachrichten |

### Kursinhalt-Ressourcen

| Ressource | Pfad | Beschreibung |
|----------|------|-------------|
| Dokumente | `/api/documents` | Kursdokumente |
| Lernpfade | `/api/learning_paths` | Lernpfade |
| Glossare | `/api/glossaries` | Glossarbegriffe |
| Links | `/api/links` | Externe Links |
| Kalenderereignisse | `/api/c_calendar_events` | Agenda-Ereignisse |
| Studentenveröffentlichungen | `/api/c_student_publications` | Aufgaben |
| Blogs | `/api/c_blogs` | Kursblogs |
| Gruppen | `/api/c_groups` | Kursgruppen |

### Tracking-Ressourcen

| Ressource | Pfad | Beschreibung |
|----------|------|-------------|
| Notenbuch-Kategorien | `/api/gradebook_categories` | Notenbuch-Einrichtung |
| Notenbuch-Ergebnisse | `/api/gradebook_results` | Noten |

## Filterung und Paginierung

API Platform unterstützt:

* **Paginierung**: `?page=2&itemsPerPage=30`
* **Filterung**: `?title=Introduction` (abhängig von konfigurierten Filtern)
* **Sortierung**: `?order[title]=asc`
* **Suche**: Volltextsuche in konfigurierten Feldern

## Inhaltsverhandlung

Die API unterstützt mehrere Formate:

* `application/ld+json` (Standard — JSON-LD)
* `application/json`
* `text/html` (API-Dokumentation)

Setzen Sie den `Accept`-Header, um das Antwortformat auszuwählen.

## Sicherheit

Jeder Endpunkt setzt Sicherheit durch:

* JWT-Authentifizierung (für die meisten Endpunkte erforderlich)
* Symfony-Sicherheitswähler (Berechtigungen auf Ressourcenebene)
* Rollenbasierte Zugriffskontrolle (z. B. Endpunkte nur für Administratoren)