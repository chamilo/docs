# Endpoints-Referenz

API Platform erzeugt automatisch REST-Endpunkte für Entitäten, die mit `#[ApiResource]` annotiert sind. Chamilo stellt mehr als 100 Ressourcen bereit.

## Standardoperationen

Für jede API-Ressource sind in der Regel die folgenden Operationen verfügbar:

| Methode | Pfad | Beschreibung |
|--------|------|-------------|
| `GET` | `/api/{resources}` | Auflisten (Collection) |
| `POST` | `/api/{resources}` | Erstellen |
| `GET` | `/api/{resources}/{id}` | Lesen (einzelnes Element) |
| `PUT` | `/api/{resources}/{id}` | Vollständige Aktualisierung |
| `PATCH` | `/api/{resources}/{id}` | Teilweise Aktualisierung |
| `DELETE` | `/api/{resources}/{id}` | Löschen |

Nicht alle Operationen sind für jede Ressource aktiviert — es gelten Sicherheitsbeschränkungen.

## Wichtige API-Ressourcen

### Plattformressourcen

| Ressource | Pfad | Beschreibung |
|----------|------|-------------|
| Users | `/api/users` | Benutzerkonten |
| Courses | `/api/courses` | Kurse |
| Sessions | `/api/sessions` | Schulungssitzungen |
| Promotions | `/api/promotions` | Karriere-Promotionen, nur lesend (siehe [Session Promotion](session-promotion.md)) |
| Resource Nodes | `/api/resource_nodes` | Einheitliche Inhaltsknoten |
| Access URLs | `/api/access_urls` | Multi-URL-Portale |
| Messages | `/api/messages` | Plattformnachrichten |

### Kursinhaltsressourcen

| Ressource | Pfad | Beschreibung |
|----------|------|-------------|
| Documents | `/api/documents` | Kursdokumente |
| Learning Paths | `/api/learning_paths` | Lernpfade |
| Glossaries | `/api/glossaries` | Glossarbegriffe |
| Links | `/api/links` | Externe Links |
| Calendar Events | `/api/c_calendar_events` | Terminereignisse |
| Student Publications | `/api/c_student_publications` | Aufgaben |
| Blogs | `/api/c_blogs` | Kursblogs |
| Groups | `/api/c_groups` | Kursgruppen |

### Tracking-Ressourcen

| Ressource | Pfad | Beschreibung |
|----------|------|-------------|
| Gradebook Categories | `/api/gradebook_categories` | Gradebook-Einrichtung |
| Gradebook Results | `/api/gradebook_results` | Noten |

## Administrator-Kursoperationen

Zusätzlich zum Auflisten und Erstellen von Kursen stellt die API-Ressource `Course` ausschließlich für Administratoren die Operationen `PATCH /api/courses/{id}` und `DELETE /api/courses/{id}` bereit. Für diese Ressource gibt es keine `PUT`-Operation, und der interne Kurscode kann nicht per Patch geändert werden. Das Löschen verwendet den Bereinigungsprozess der Kurswartung; seine Auswirkungen in Multi-URL-Portalen erfordern Sorgfalt.

Siehe [Course Administration](course-administration.md) zu Anfragen, Berechtigungen, Nebeneffekten und Einschränkungen.

## Administrative Einschreibungsaktionen

Die folgenden explizit implementierten Controller-Routen sind **keine** generischen Ressourcenoperationen von API Platform. Sie erfordern `ROLE_ADMIN` und haben eigene Anfrage- und Antwortverträge.

| Methode | Pfad | Details |
|--------|------|---------|
| `GET` | `/api/sessions/{id}/students` | Eingeschriebene Lernenden-IDs auflisten |
| `POST` | `/api/sessions/{id}/students/subscribe` | Angegebene Lernende hinzufügen |
| `POST` | `/api/sessions/{id}/students/unsubscribe` | Angegebene Lernende entfernen |
| `GET` | `/api/usergroups/{id}/subscriptions` | Benutzer-/Sitzungs-/Kurs-IDs der Klasse lesen |
| `PUT` | `/api/usergroups/{id}/users` | Mitgliederliste der Klasse ersetzen |
| `PUT` | `/api/usergroups/{id}/sessions` | Sitzungsliste der Klasse ersetzen |
| `PUT` | `/api/usergroups/{id}/courses` | Kursliste der Klasse ersetzen |

Siehe [Session Student Enrollment](session-students.md) und [Class Subscriptions](class-subscriptions.md) zu Validierung, Berechtigungen, Multi-URL-Geltungsbereich und wichtigen Unterschieden zwischen additiven und ersetzenden Operationen.

## Filterung und Paginierung

API Platform unterstützt:

* **Paginierung**: `?page=2&itemsPerPage=30`
* **Filterung**: `?title=Introduction` (abhängig von den konfigurierten Filtern)
* **Sortierung**: `?order[title]=asc`
* **Suche**: Volltextsuche in konfigurierten Feldern

## Inhaltsaushandlung

Die API unterstützt mehrere Formate:

* `application/ld+json` (Standard — JSON-LD)
* `application/json`
* `text/html` (API-Dokumentation)

Setzen Sie den Header `Accept`, um das Antwortformat zu wählen.

## Sicherheit

Jeder Endpunkt setzt Sicherheit durch:

* JWT-Authentifizierung (für die meisten Endpunkte erforderlich)
* Symfony-Security-Voter (Berechtigungen auf Ressourcenebene)
* Rollenbasierte Zugriffskontrolle (z. B. nur für Administratoren verfügbare Endpunkte)