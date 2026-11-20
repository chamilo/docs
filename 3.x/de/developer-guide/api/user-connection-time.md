# Verbindungszeit des Benutzers

`GET /api/users/{id}/connection-time` gibt die Gesamtzeit zurück, die ein Benutzer mit der Plattform verbunden war. Der Endpunkt ersetzt die Aktion `get_user_total_connexion_time` des Webservice `webservices/api/v2.php` in Version 1.11.x und kann auf einen Zeitraum eingeschränkt werden.

## Zugriff

| Aufrufer | Zulässig |
|--------|---------|
| `ROLE_ADMIN` | Jeder Benutzer der aktuellen Zugriffs-URL |
| Jeder authentifizierte Benutzer | Nur die eigene Verbindungszeit |
| Alle anderen | `403 Forbidden` |

Der Endpunkt erwartet die numerische ID des Benutzers. Um von einem Benutzernamen auszugehen, suchen Sie den Benutzer zunächst mit `GET /api/users?username=...`.

## Anfrage

```http
GET /api/users/42/connection-time?startDate=2026-10-01T00:00:00%2B02:00&endDate=2026-12-15T23:59:59%2B01:00
Authorization: Bearer <token>
```

| Abfrageparameter | Erforderlich | Beschreibung |
|-----------------|----------|-------------|
| `startDate` | Nein | Datum und Uhrzeit nach ISO 8601. Es werden nur Verbindungen gezählt, die zu diesem Zeitpunkt oder danach **begonnen** haben. |
| `endDate` | Nein | Datum und Uhrzeit nach ISO 8601, nicht vor `startDate`. Es werden nur Verbindungen gezählt, die zu diesem Zeitpunkt oder davor **beendet** wurden. |

Ohne einen der beiden Parameter wird jede Verbindung gezählt. Nur mit `startDate` werden Verbindungen ab diesem Datum ohne Endgrenze gezählt. Nur mit `endDate` werden Verbindungen bis zu diesem Datum ohne Anfangsgrenze gezählt.

Eine Verbindung, die eine Grenze überschneidet (beispielsweise eine, die vor `startDate` begonnen hat), wird überhaupt nicht gezählt: Verbindungszeiten werden niemals aufgeteilt. Dies entspricht der Regel des benutzerdefinierten Zeitraumsfilters in den Berichten von Version 1.11.x.

Geben Sie den Zeitzonenversatz an. In einer URL muss `+` als `%2B` kodiert werden. Ein Wert ohne Versatz wird in der Zeitzone des Servers gelesen.

## Antwort

```json
{
  "id": 42,
  "username": "jdupont",
  "totalConnectionTime": 5025,
  "totalConnectionTimeFormatted": "01:23:45"
}
```

| Feld | Beschreibung |
|-------|-------------|
| `totalConnectionTime` | Gesamtzeit in Sekunden |
| `totalConnectionTimeFormatted` | Dieselbe Gesamtzeit als `HH:MM:SS`, das Format, das der Webservice von Version 1.11.x zurückgab. Die Stunden können 24 überschreiten. |

## Fehler

| Status | Wann |
|--------|------|
| `400` | Ein Datum, das nicht analysiert werden kann, oder `endDate` vor `startDate` |
| `401` | Keine oder ungültige Anmeldedaten |
| `403` | Der Aufrufer ist weder Administrator noch der betreffende Benutzer |
| `404` | Der Benutzer existiert nicht oder gehört nicht zur aktuellen Zugriffs-URL |

## Wie die Zeit berechnet wird

Die Gesamtzeit ist die Summe von `logout_date − login_date` über die Zeilen des Benutzers in der Tabelle `track_e_login`.

Eine Verbindung beginnt bei der Anmeldung und wird verlängert, solange der Benutzer aktiv ist: Die vom Benutzer geöffnete Seite sendet jede Minute ein Anwesenheitssignal, solange ihr Tab sichtbar ist, wie es jede Seitenansicht in Chamilo 1.11.x tat. Nach einer Inaktivität, die länger als die Sitzungslebensdauer dauert, öffnet die nächste Aktivität eine neue Verbindung, sodass die Leerlaufzeit nicht gezählt wird. Durch Abmelden wird die aktuelle Verbindung geschlossen. Die Zeit, die ein Administrator mit **Anmelden als** verbringt, wird dem Benutzer nicht hinzugefügt.

> **Hinweis:** Verbindungen, die aufgezeichnet wurden, bevor diese Nachverfolgung wiederhergestellt wurde, haben möglicherweise kein Abmeldedatum. Sie zählen als null, sodass Summen über Zeiträume vor dem Upgrade niedriger sein können als die tatsächlich verbrachte Zeit.