# API zur Einschreibung von Teilnehmenden in Sitzungen

Integrationen können Lernende in einer Sitzung auflisten, einschreiben und entfernen, indem sie ausschließlich für Administratoren verfügbare Endpunkte verwenden. Diese Aktionen nutzen das Einschreibungsverhalten der Administrationsoberflächen von Chamilo. Sie sind getrennt von `/api/course-sessions/actions/*`, das zu einem anderen, tutororientierten Arbeitsablauf gehört.

## Authentifizierung und Zugriff

Jede der folgenden Operationen erfordert eine Authentifizierung mit der Plattformrolle `ROLE_ADMIN`. Die Rolle als Sitzungsadministrator allein gewährt **keinen** Zugriff. Verwenden Sie die in [Authentifizierung](authentication.md) beschriebene Authentifizierungsmethode.

In Installationen mit mehreren URLs muss die angeforderte Sitzung zur aktuellen Zugriffs-URL gehören; andernfalls antwortet der Endpunkt mit `404`.

## Routen

| Methode | Endpunkt | Zweck |
|--------|----------|---------|
| `GET` | `/api/sessions/{id}/students` | Listet die Benutzer-IDs der in dieser Sitzung eingeschriebenen Lernenden auf |
| `POST` | `/api/sessions/{id}/students/subscribe` | Fügt die angegebenen Lernenden hinzu und behält bestehende Lernende bei |
| `POST` | `/api/sessions/{id}/students/unsubscribe` | Entfernt nur die angegebenen Lernenden |

Ersetzen Sie `{id}` durch die numerische Sitzungs-ID. Senden Sie für beide POST-Anfragen JSON mit dem Array `userIds`:

```http
POST /api/sessions/42/students/subscribe
Authorization: Bearer <admin-token>
Content-Type: application/json
```

```json
{ "userIds": [17, 23] }
```

Eine erfolgreiche Einschreibung erzeugt eine Antwort mit der folgenden Struktur; die IDs hängen von Ihrer Installation ab:

```json
{
  "success": true,
  "applied": [17],
  "alreadyThere": [23],
  "ignored": []
}
```

`applied` enthält neu eingeschriebene Lernende; `alreadyThere` enthält bereits eingeschriebene Lernende; `ignored` listet unzulässige oder nicht verfügbare IDs auf. Beim Einschreiben schreibt Chamilo die hinzugefügten Lernenden auch in die Kurse der Sitzung ein. Es ersetzt **nicht** die gesamte Teilnehmerliste der Sitzung.

So prüfen Sie die Mitgliedschaft:

```http
GET /api/sessions/42/students
Authorization: Bearer <admin-token>
```

```json
{ "userIds": [17, 23] }
```

So entfernen Sie ausgewählte Lernende:

```http
POST /api/sessions/42/students/unsubscribe
Authorization: Bearer <admin-token>
Content-Type: application/json
```

```json
{ "userIds": [17] }
```

Die Antwort auf das Abmelden enthält `success`, `applied` (entfernte IDs) und `ignored` (nicht eingeschriebene IDs). Andere Lernende verbleiben in der Sitzung.

## Validierung und Einschränkungen

* `userIds` muss ein Array numerischer IDs sein (Ganzzahlen oder Zeichenketten, die nur aus Ziffern bestehen). Wiederholte IDs werden dedupliziert; nicht positive Werte werden ausgelassen.
* Für die Einschreibung müssen berechtigte Benutzer existieren, dürfen nicht soft-gelöscht sein, dürfen weder anonym noch Personalverantwortliche sein und müssen zur aktuellen Zugriffs-URL gehören.
* Fehlendes oder fehlerhaftes JSON oder `userIds` liefert `400 Bad Request`.
* Fehlende oder außerhalb des Geltungsbereichs liegende Sitzungen liefern `404 Not Found`; Aufrufer ohne Administratorberechtigung können diese Routen nicht verwenden.
* Die Routen zur Einschreibung von Teilnehmenden sind **keine** generischen CRUD-Endpunkte für die Entität `Session` und akzeptieren keine Teilnehmerliste der Sitzung als Ersatzdokument.

Zur entsprechenden Administrationsoberfläche siehe [Sitzungen verwalten](../../admin-guide/sessions/managing-sessions.md). Zum Kopieren einer Modellsitzung vor der Einschreibung von Teilnehmenden siehe [Sitzungsduplizierung](session-duplication.md).

**Implementierung:** `src/CoreBundle/Controller/Api/SessionStudentsController.php`. Hinzugefügt im Chamilo-LMS-Commit `bdfb2dd661`.