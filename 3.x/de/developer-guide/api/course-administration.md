# Kursverwaltungs-API

Chamilo 3.1 ermöglicht Administrator-Integrationen, Kursmetadaten zu aktualisieren und Kurse über die API-Ressource `Course` zu löschen. Diese Operationen wurden für die Synchronisation mit externen Verwaltungssystemen, beispielsweise einem ERP, hinzugefügt.

## Berechtigungen

| Operation | Methode und Endpunkt | Erforderliche Rolle |
|-----------|----------------------|---------------------|
| Kurse auflisten | `GET /api/courses` | Lehrkraft oder Plattformadministrator |
| Einen Kurs anzeigen | `GET /api/courses/{id}` | Berechtigung, diesen Kurs anzuzeigen |
| Einen Kurs erstellen | `POST /api/courses` | Lehrkraft oder Plattformadministrator |
| Einen Kurs aktualisieren | `PATCH /api/courses/{id}` | **Plattformadministrator (`ROLE_ADMIN`)** |
| Einen Kurs löschen | `DELETE /api/courses/{id}` | **Plattformadministrator (`ROLE_ADMIN`)** |

`PUT` ist für diese Ressource nicht als Operation konfiguriert. Lehrkräfte sollten ihre eigenen Kurse weiterhin über die Oberfläche der Kurseinstellungen bearbeiten; die neuen Schreiboperationen der API sind ausschließlich Administratoren vorbehalten.

Verwenden Sie ein authentifiziertes Konto oder Integrationszugangsdaten mit den erforderlichen Berechtigungen. Siehe [API-Authentifizierung](authentication.md).

## Kursmetadaten aktualisieren

Senden Sie eine JSON-Merge-Patch-Anfrage von API Platform, um nur die im Body angegebenen Eigenschaften zu ändern:

```http
PATCH /api/courses/42
Authorization: Bearer <admin-token>
Content-Type: application/merge-patch+json
Accept: application/ld+json
```

```json
{
  "title": "Introduction to Accounting - 2026"
}
```

Die Anfrage aktualisiert den bestehenden Kurs, anstatt einen neuen zu erstellen. Die API akzeptiert schreibbare Eigenschaften, die durch die Serializer-Gruppe `course:write` definiert sind, vorbehaltlich der Entitätsvalidierung. Beispiele sind `title`, `visibility`, `categories`, `departmentUrl`, `videoUrl`, `sticky` und `duration`. Beziehungseigenschaften wie `categories` erfordern die von der API erwartete Ressourcendarstellung; prüfen Sie die OpenAPI-Dokumentation, anstatt beliebige Datenbank-IDs zu senden.

**Wichtig:** Der interne Kurs-`code` ist über diese PATCH-Operation **nicht** schreibbar. Versuchen Sie nicht, den internen Code eines Kurses umzubenennen, indem Sie ein Feld `code` oder `visualCode` senden.

## Einen Kurs löschen

```http
DELETE /api/courses/42
Authorization: Bearer <admin-token>
```

Dies ist eine **destruktive** Verwaltungsoperation. Chamilo ruft denselben Hilfsmechanismus zur Kurslöschung auf, der von der Kurswartung verwendet wird, anstatt die Doctrine-Entität direkt zu löschen. Dabei werden zugehörige Einschreibungen, Sitzungs- und Klassenverknüpfungen, Tracking-Daten sowie die zugehörige Suchindexierung bereinigt, soweit zutreffend.

In einer **Multi-URL**-Installation kann die Löschung den Kurs lediglich von der aktuellen Zugriffs-URL lösen, anstatt ihn überall zu löschen. Kursdokumente werden nicht über die separate Option *exklusive Dokumente löschen* der Wartungsoberfläche gelöscht. Interpretieren Sie eine API-Löschung nicht als Garantie dafür, dass jedes Dokument physisch entfernt wird.

Wenn eine aktive Abhängigkeit die Löschung verhindert (beispielsweise eine Ressourcenfolge), kann der Endpunkt mit `409 Conflict` antworten. Prüfen Sie Kursabhängigkeiten und Sicherungen, bevor Sie DELETE-Anfragen senden, insbesondere bei Stapelintegrationen.

## Fehler und betriebliche Hinweise

* Ein Aufrufer ohne die erforderliche Administratorrolle wird abgewiesen; verwenden Sie für PATCH oder DELETE ein korrekt autorisiertes Konto und keine Lehrkraft-Zugangsdaten.
* Ungültige Anfragedaten können die Entitätsvalidierung fehlschlagen lassen. Rufen Sie den aktuellen Kurs ab, bevor Sie ihn patchen, und senden Sie nur Eigenschaften, die Sie ändern möchten.
* Diese Operationen werden von API Platform bereitgestellt; konsultieren Sie die OpenAPI-Dokumentation der installierten Instanz für das genaue Antwortschema und die akzeptierten Feldformate.
* Testen Sie die Kurslöschung an einem entbehrlichen Kurs, nicht an einem Kurs, der produktive Lernerdatensätze enthält.

Zur Kursverwaltung in der Oberfläche siehe [Kurse verwalten](../../admin-guide/courses/managing-courses.md). Zu Integrationen der Sitzungseinschreibung siehe [Einschreibung von Sitzungsteilnehmenden](session-students.md).

**Implementierung:** `src/CoreBundle/Entity/Course.php` (Operationen `Patch` und `Delete`) sowie `src/CoreBundle/State/CourseDeleteProcessor.php`. Hinzugefügt in Chamilo LMS mit Commit `8cc9d4b33d`.