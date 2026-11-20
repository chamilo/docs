# Sitzungsduplizierung

`POST /api/sessions/{id}/duplicate` erstellt eine neue Sitzung aus einer bestehenden **Modell-Sitzung**. Es ist der Ersatz in Chamilo 3 für die Aktion `create_session_from_model` des Webservice `webservices/api/v2.php` von 1.11.x und ist für Integrationen gedacht, die einen neuen Schulungsdurchlauf aus einer Vorlagen-Sitzung eröffnen.

## Zugriff

| Aufrufer | Zulässig |
|--------|---------|
| `ROLE_ADMIN` | Jede Sitzung |
| `ROLE_SESSION_MANAGER` | Nur Sitzungen, die sie verwalten (sie sind Sitzungsadministrator der Modell-Sitzung), sofern die Einstellung **Sitzungsadministratoren erlauben, alle Sitzungen zu sehen** nicht aktiviert ist |
| Alle anderen | `403 Forbidden` |

Authentifizieren Sie sich mit einem JWT oder einem externen API-Schlüssel, wie unter [Authentifizierung](authentication.md) beschrieben.

## Anfrage

```http
POST /api/sessions/42/duplicate
Authorization: Bearer <token>
Content-Type: application/json
```

```json
{
  "title": "Accounting basics - October 2026",
  "startDate": "2026-10-01T09:00:00+02:00",
  "endDate": "2026-12-15T18:00:00+01:00",
  "extraFields": { "my_session_field": "value" },
  "copySessionContent": false
}
```

| Feld | Erforderlich | Beschreibung |
|-------|----------|-------------|
| `title` | Ja | Titel der neuen Sitzung. Darf noch nicht von einer anderen Sitzung verwendet werden (max. 150 Zeichen). |
| `startDate` | Ja | Datum und Uhrzeit nach ISO 8601. Wird als Startdatum für Zugriff, Anzeige und Trainerzugriff verwendet. |
| `endDate` | Ja | Datum und Uhrzeit nach ISO 8601, nicht vor `startDate`. Wird als Enddatum für Zugriff, Anzeige und Trainerzugriff verwendet. |
| `extraFields` | Nein | Werte zusätzlicher Sitzungsfelder, indiziert über die Variable des Feldes. Sie überschreiben die aus dem Modell kopierten Werte. Jede Variable muss ein vorhandenes zusätzliches Sitzungsfeld sein. |
| `copySessionContent` | Nein | Standardmäßig `false`. Bei `true` wird der sitzungsspezifische Inhalt jedes Kurses (Dokumente, Lernpfade, Tests, Kalenderereignisse, Ankündigungen, Notenbuch …) in die neue Sitzung dupliziert. Der Basisinhalt des Kurses wird immer gemeinsam genutzt, niemals kopiert. Dieses Flag ist unabhängig von der Plattformeinstellung **Kopieren sitzungsspezifischer Inhalte in eine andere Sitzung aktivieren**. |

## Was kopiert wird

| Aus dem Modell kopiert | Nicht kopiert |
|-----------------------|------------|
| Kategorie, Sichtbarkeit, Dauer, Beschreibung und „Beschreibung anzeigen“ | Kurstrainer |
| Werte zusätzlicher Sitzungsfelder | Personalverantwortliche (DRH) |
| Kurse, in derselben Reihenfolge | Teilnehmende |
| Allgemeine Trainer | |
| Sitzungsadministratoren (hat das Modell keine, wird der Aufrufer zum Sitzungsadministrator) | |
| Option „Abonnementbenachrichtigung senden“ | |
| Promotion | |
| Sitzungsspezifischer Kursinhalt, nur wenn `copySessionContent` den Wert `true` hat | |

Teilnehmende werden absichtlich ausgelassen: Jeder Durchlauf erhält eigene Lernende. Abonnieren Sie sie anschließend mit `POST /api/course-sessions/actions/subscribe-users`.

Die neue Sitzung wird der aktuellen Zugriffs-URL zugeordnet.

## Antwort

`201 Created` mit der neuen Sitzung:

```json
{
  "id": 57,
  "title": "Accounting basics - October 2026",
  "nbrCourses": 3,
  "visibility": 1,
  "generalCoachesSubscriptions": [{ "user": "/api/users/7" }]
}
```

## Fehler

| Status | Wann |
|--------|------|
| `401` | Keine oder ungültige Anmeldedaten |
| `403` | Der Aufrufer darf die Modell-Sitzung nicht verwalten |
| `404` | Die Modell-Sitzung existiert nicht |
| `422` | Fehlendes oder ungültiges Feld, `endDate` vor `startDate`, Titel bereits verwendet oder unbekannte Variable eines zusätzlichen Feldes |

Alle Prüfungen laufen, bevor etwas erstellt wird; eine abgelehnte Anfrage hinterlässt daher niemals eine unvollständige Sitzung.

## Implementierung

* Operation: `duplicate_session` auf der Ressource `Session` (`src/CoreBundle/Entity/Session.php`)
* Eingabe: `src/CoreBundle/Dto/SessionDuplicateInput.php`
* Prozessor: `src/CoreBundle/State/Session/SessionDuplicateProcessor.php`, der `SessionManager::copy()` aufruft (wird auch von der Aktion **Kopieren** der Sitzungsliste verwendet) und anschließend den angeforderten Titel, die Daten und die zusätzlichen Felder sowie die Promotion des Modells, die Sitzungsadministratoren, die Benachrichtigungsoption und die Kursreihenfolge anwendet.