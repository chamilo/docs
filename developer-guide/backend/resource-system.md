# Ressourcensystem

Das Ressourcensystem ist eines der wichtigsten architektonischen Konzepte in Chamilo 2.0. Es bietet eine einheitliche Abstraktion für alle Kursinhalte – Dokumente, Übungen, Lernpfade, Forenbeiträge und mehr.

## Kernkonzept

Jeder Kursinhalt wird durch einen **ResourceNode** repräsentiert. Dies verleiht allen Inhaltstypen eine gemeinsame Reihe von Fähigkeiten:

- **Sichtbarkeitskontrolle** – Anzeigen/Verbergen für Lernende
- **Zugriffskontrolle** – Sicherheitsprüfer überprüfen Berechtigungen über den ResourceNode
- **Dateispeicherung** – Angefügte Dateien werden über ResourceFile gespeichert
- **Baumstruktur** – ResourceNodes bilden einen Baum (Eltern-Kind-Beziehungen)
- **Prüfprotokoll** – Ersteller, Erstellungsdatum, Änderungsverfolgung

## Schlüsselentitäten

### ResourceNode (`src/CoreBundle/Entity/ResourceNode.php`)

Die zentrale Entität. Jede Inhaltsentität hat eine Eins-zu-Eins-Beziehung zu einem ResourceNode.

Wichtige Felder:

| Feld | Typ | Beschreibung |
|-------|------|-------------|
| `id` | integer | Primärschlüssel |
| `uuid` | UUID v4 | Eindeutiger Identifikator für API-Nutzung |
| `title` | string | Anzeigetitel |
| `creator` | User | Der Benutzer, der diese Ressource erstellt hat |
| `resourceFile` | ResourceFile | Die angefügte Datei (falls vorhanden) |
| `resourceType` | ResourceType | Der Typ der Ressource (Dokument, Quiz etc.) |
| `parent` | ResourceNode | Elternknoten im Ressourcenbaum |
| `children` | Collection | Kind-ResourceNodes |
| `resourceLinks` | Collection | Sichtbarkeits- und Zugriffslinks |

Der Baum verwendet die **materialized path**-Strategie von Gedmo für effiziente hierarchische Abfragen.

### ResourceFile (`src/CoreBundle/Entity/ResourceFile.php`)

Speichert die tatsächlichen Dateidaten für eine Ressource:

| Feld | Typ | Beschreibung |
|-------|------|-------------|
| `id` | integer | Primärschlüssel |
| `title` | string | Ursprünglicher Dateiname |
| `mimeType` | string | MIME-Typ |
| `originalName` | string | Ursprünglicher Upload-Name |
| `size` | integer | Dateigröße in Bytes |
| `crop` | string | Zuschneidedaten (für Bilder) |

Die Dateispeicherung wird von Flysystem übernommen, sodass Dateien je nach Konfiguration auf lokalem Speicher, S3, Azure oder GCS gespeichert werden können.

### ResourceLink

Steuert Sichtbarkeit und Zugriff pro Kontext. Es gibt 3 Hauptkontexttypen:

1. Kurs
2. Sitzung
3. Gruppe (in einem Kurs)

Die ResourceLink-Entität spiegelt die Kombination dieser 3 Kontexttypen wider und legt eine Sichtbarkeit für diesen vollständigen Kontext fest:

| Feld | Typ | Beschreibung |
|-------|------|-------------|
| `course` | Course | Zu welchem Kurs die Ressource gehört |
| `session` | Session | Zu welcher Sitzung (null für Basiskurs) |
| `group` | CGroup | Zu welcher Gruppe (null für den gesamten Kurs) |
| `visibility` | integer | Sichtbar, unsichtbar oder gelöscht |

Dies ermöglicht es, dass derselbe ResourceNode in verschiedenen Kontexten unterschiedliche Sichtbarkeit hat (z. B. sichtbar in einer Sitzung, aber verborgen in einer anderen).

Dies wird automatisch eingestellt, wenn die Benutzeroberfläche verwendet wird und beispielsweise entschieden wird, dass eine Ressource eine sitzungsspezifische Ressource ist, die für alle Gruppen in einem bestimmten Kurs in einer bestimmten Sitzung sichtbar ist, aber im Basiskurs oder in einer anderen Sitzung unsichtbar bleibt.

Standardmäßig sind Ressourcen, die in einem Basiskurs sichtbar sind, auch in allen Sitzungen dieses Kurses sichtbar, aber der Kurstutor kann entscheiden, eine Ressource für eine bestimmte Sitzung zu verbergen. In diesem Fall rufen wir die spezifische Sichtbarkeit für diese Ressource in dieser Sitzung ab und sehen, dass sie eine Sichtbarkeit von 0 hat, sodass das Element für Lernende in dieser Sitzung nicht angezeigt wird, während das Fehlen einer sitzungsspezifischen Sichtbarkeit in anderen Sitzungen dazu führt, dass die Ressource die Sichtbarkeit des Basiskurses verwendet (und die Ressource den Lernenden angezeigt wird).

## API Platform Integration

ResourceNode wird als API Platform-Ressource mit Sicherheit freigegeben:

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

Kursinhaltsentitäten (CDocument, CQuiz, CLp etc.) erweitern `AbstractResource` oder implementieren `ResourceInterface`, was ihnen eine `resourceNode`-Beziehung verleiht:

```php
// In CDocument entity:
#[ORM\OneToOne(targetEntity: ResourceNode::class)]
private ResourceNode $resourceNode;
```

Wenn Sie ein CDocument erstellen, wird automatisch ein ResourceNode daneben erstellt, was ein einheitliches Ressourcenmanagement ermöglicht.

## Praktische Auswirkungen

Bei der Arbeit mit Kursinhalten:

1. **Inhalte erstellen** – Erstellen Sie sowohl die Inhaltsentität ALS AUCH ihren ResourceNode
2. **Berechtigungen prüfen** – Verwenden Sie die Sicherheitsprüfer des ResourceNode
3. **Dateien verwalten** – Hängen Sie Dateien über ResourceFile an
4. **Sichtbarkeit steuern** – Erstellen/Ändern Sie ResourceLinks
5. **Bäume aufbauen** – Verwenden Sie die Eltern-Kind-Beziehung auf ResourceNode für Ordnerstrukturen (z. B. Dokumentenordner)