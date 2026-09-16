# Ressourcen-System

Das Ressourcen-System ist eines der wichtigsten architektonischen Konzepte in Chamilo 3.0. Es bietet eine einheitliche Abstraktion für alle Kursinhalte — Dokumente, Übungen, Lernpfade, Forenbeiträge und mehr.

## Kernkonzept

Jeder Kursinhalt wird durch einen **ResourceNode** repräsentiert. Dadurch erhalten alle Inhaltstypen einen gemeinsamen Satz von Fähigkeiten:

* **Sichtbarkeitssteuerung** — Ein-/Ausblenden für Lernende
* **Zugriffskontrolle** — Security-Voter prüfen Berechtigungen über den ResourceNode
* **Dateispeicherung** — Angehängte Dateien werden über ResourceFile gespeichert
* **Baumstruktur** — ResourceNodes bilden einen Baum (Eltern-Kind-Beziehungen)
* **Prüfpfad** — Ersteller, Erstellungsdatum, Änderungsverfolgung

## Wichtige Entitäten

### ResourceNode (`src/CoreBundle/Entity/ResourceNode.php`)

Die zentrale Entität. Jede Inhaltsentität hat eine Eins-zu-eins-Beziehung zu einem ResourceNode.

Wichtige Felder:

| Field | Type | Description |
|-------|------|-------------|
| `id` | integer | Primärschlüssel |
| `uuid` | UUID v4 | Eindeutiger Bezeichner für die API-Nutzung |
| `title` | string | Anzeigetitel |
| `creator` | User | Der Benutzer, der diese Ressource erstellt hat |
| `resourceFile` | ResourceFile | Die angehängte Datei (falls vorhanden) |
| `resourceType` | ResourceType | Der Ressourcentyp (Dokument, Quiz usw.) |
| `parent` | ResourceNode | Elternknoten im Ressourcenbaum |
| `children` | Collection | Kind-ResourceNodes |
| `resourceLinks` | Collection | Sichtbarkeits- und Zugriffslinks |

Der Baum verwendet Gedmos Strategie des **materialisierten Pfads** für effiziente hierarchische Abfragen.

### ResourceFile (`src/CoreBundle/Entity/ResourceFile.php`)

Speichert die eigentlichen Dateidaten einer Ressource:

| Field | Type | Description |
|-------|------|-------------|
| `id` | integer | Primärschlüssel |
| `title` | string | Ursprünglicher Dateiname |
| `mimeType` | string | MIME-Typ |
| `originalName` | string | Ursprünglicher Upload-Name |
| `size` | integer | Dateigröße in Bytes |
| `crop` | string | Zuschnittdaten (für Bilder) |

Die Dateispeicherung erfolgt über Flysystem, sodass Dateien je nach Konfiguration auf lokaler Festplatte, S3, Azure oder GCS liegen können.

### ResourceLink

Steuert Sichtbarkeit und Zugriff pro Kontext. Es gibt 3 Hauptkontexttypen:

1. Course
2. Session
3. Group (in a course)

Die ResourceLink-Entität bildet also die Kombination dieser 3 Kontexttypen ab und legt eine Sichtbarkeit für diesen vollständigen Kontext fest:

| Field | Type | Description |
|-------|------|-------------|
| `course` | Course | Zu welchem Kurs die Ressource gehört |
| `session` | Session | Welche Session (null für den Basiskurs) |
| `group` | CGroup | Welche Gruppe (null für den gesamten Kurs) |
| `visibility` | integer | Sichtbar, unsichtbar oder gelöscht |

Dadurch kann derselbe ResourceNode in unterschiedlichen Kontexten unterschiedliche Sichtbarkeit haben (z. B. in einer Session sichtbar, in einer anderen verborgen).

Dies wird automatisch gesetzt, wenn man die Oberfläche nutzt und beispielsweise festlegt, dass eine Ressource eine session-spezifische Ressource ist, die für alle Gruppen in einem bestimmten Kurs in einer bestimmten Session sichtbar, im Basiskurs oder in einer anderen Session jedoch unsichtbar ist.

Standardmäßig sind Ressourcen, die in einem Basiskurs sichtbar sind, auch in allen Sessions dieses Kurses sichtbar, der Kurstutor kann jedoch entscheiden, eine Ressource in einer bestimmten Session auszublenden. In diesem Fall wird die spezifische Sichtbarkeit dieser Ressource in dieser Session ermittelt; hat sie den Wert 0, erscheint das Element für Lernende in dieser Session nicht, während das Fehlen einer session-spezifischen Sichtbarkeit in anderen Sessions dazu führt, dass die Ressource die Sichtbarkeit des Basiskurses verwendet (und die Ressource den Lernenden angezeigt wird).

## API-Platform-Integration

ResourceNode wird als API-Platform-Ressource mit Sicherheit bereitgestellt:

```php
#[ApiResource(
    operations: [
        new Get(security: "is_granted('VIEW', object)"),
        new Put(security: "is_granted('EDIT', object)"),
        new Delete(security: "is_granted('DELETE', object)"),
        new GetCollection(security: "is_granted('ROLE_USER')"),
    ]
)]
```

## Wie Inhaltsentitäten verbunden sind

Kursinhaltsentitäten (CDocument, CQuiz, CLp usw.) erweitern `AbstractResource` oder implementieren `ResourceInterface`, wodurch sie eine `resourceNode`-Beziehung erhalten:

```php
// In CDocument entity:
#[ORM\OneToOne(targetEntity: ResourceNode::class)]
private ResourceNode $resourceNode;
```

Beim Erstellen eines CDocument wird automatisch ein ResourceNode mitangelegt und so eine einheitliche Ressourcenverwaltung bereitgestellt.

## Praktische Auswirkungen

Beim Arbeiten mit Kursinhalten:

1. **Inhalte erstellen** — Sowohl die Inhaltsentität ALS AUCH ihren ResourceNode anlegen
2. **Berechtigungen prüfen** — Die Security-Voter des ResourceNode verwenden
3. **Dateien verwalten** — Dateien über ResourceFile anhängen
4. **Sichtbarkeit steuern** — ResourceLinks anlegen/ändern
5. **Bäume aufbauen** — Die Eltern-Kind-Beziehung am ResourceNode für Ordnerstrukturen nutzen (z. B. Dokumentenordner)