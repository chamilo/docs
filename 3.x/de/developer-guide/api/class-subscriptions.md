# Klassenmitgliedschaft und Einschreibungs-API

Für Integrationen stellt Chamilo Endpunkte bereit, um die Mitglieder, Sitzungen und Kurse zu lesen und zu synchronisieren, die einer bestehenden **Klasse** zugeordnet sind. Eine Klasse ist eine `Usergroup` vom Typ *normale Klasse*; diese Routen gelten **nicht** für soziale Gruppen.

Im Gegensatz zur Sitzungs-Teilnehmer-API **ersetzen** die drei `PUT`-Aktionen für Klassen **die gesamte angegebene Liste**. Ausgelassene IDs werden aus dieser Beziehung entfernt. Lesen Sie die bestehende Liste, bevor Sie sie aktualisieren, und verwenden Sie `PUT` nicht, um nur ein einzelnes Mitglied hinzuzufügen, es sei denn, Sie übermitteln zugleich alle Personen, die verbleiben sollen.

## Autorisierung

Alle nachstehenden Routen erfordern die authentifizierte Plattformrolle `ROLE_ADMIN`. Die Zielklasse muss in der aktuellen Zugriffs-URL verfügbar sein. Eine fehlende oder außerhalb des Geltungsbereichs liegende Klasse liefert `404`; eine Benutzergruppe, die keine normale Klasse ist, liefert `409 Conflict`.

Der Controller prüft, ob die übermittelten Benutzer-, Kurs- und Sitzungs-IDs existieren. In einer Installation mit mehreren URLs werden übermittelte **Kurs- und Sitzungs-IDs** auf das aktuelle Portal gefiltert; die aktuelle Implementierung wendet denselben Portalfilter jedoch **nicht** auf **Benutzer-IDs** an. Integratoren dürfen diesen Endpunkt nicht als Garantie für eine portalbezogene Isolation auf Benutzerebene betrachten. Siehe die Hinweise der Lieferprüfung zu dieser offenen Sicherheitserwägung.

## Klassenbeziehungen lesen

```http
GET /api/usergroups/31/subscriptions
Authorization: Bearer <admin-token>
```

Beispielantwort:

```json
{
  "userIds": [17, 23],
  "sessionIds": [42],
  "courseIds": [8, 11]
}
```

## Eine Beziehungsliste ersetzen

| Methode | Endpunkt | Anforderungseigenschaft |
|--------|----------|------------------|
| `PUT` | `/api/usergroups/{id}/users` | `userIds` |
| `PUT` | `/api/usergroups/{id}/sessions` | `sessionIds` |
| `PUT` | `/api/usergroups/{id}/courses` | `courseIds` |

Um beispielsweise die vollständige Klassenliste festzulegen:

```http
PUT /api/usergroups/31/users
Authorization: Bearer <admin-token>
Content-Type: application/json
```

```json
{ "userIds": [17, 23, 29] }
```

Beispielantwort:

```json
{
  "success": true,
  "applied": [17, 23, 29],
  "ignored": []
}
```

`applied` listet akzeptierte IDs auf, nicht notwendigerweise neu hinzugefügte IDs. `ignored` kennzeichnet angeforderte IDs, die nicht angewendet werden konnten (beispielsweise eine unbekannte ID oder ein Kurs bzw. eine Sitzung außerhalb des aktuellen Portals). Nicht positive Werte werden ausgelassen, Duplikate werden entfernt, und fehlerhaftes JSON oder eine Anforderungseigenschaft, die kein Array ist, liefert `400`.

Um stattdessen die verknüpften Sitzungen zu ersetzen, rufen Sie `PUT /api/usergroups/31/sessions` mit `{ "sessionIds": [42, 57] }` auf. Um verknüpfte Kurse zu ersetzen, rufen Sie `PUT /api/usergroups/31/courses` mit `{ "courseIds": [8, 11] }` auf.

**Wichtig:** Chamilo wendet diese Änderungen über die Synchronisierungsmethoden von `UsergroupHelper` an. Eine Änderung der Klassenliste oder ihrer Sitzungs-/Kursbindungen kann auch zugehörige Einschreibungen ändern. Manipulieren Sie die Beziehungstabellen der Benutzergruppen nicht direkt, und prüfen Sie die Auswirkung des Ersetzens von Listen, bevor Sie eine Produktivintegration ausführen.

Zur Oberfläche und zum Konzept siehe [Klassen](../../admin-guide/sessions/classes.md). Um bestimmte Lernende einer Sitzung hinzuzufügen oder daraus zu entfernen, *ohne* alle Mitglieder zu ersetzen, verwenden Sie die [API zur Einschreibung von Sitzungsteilnehmern](session-students.md).

**Implementierung:** `src/CoreBundle/Controller/Api/UsergroupSubscriptionController.php`. Hinzugefügt im Chamilo-LMS-Commit `d8809925a4`.