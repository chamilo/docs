# Webhooks

Die Webhook-Unterstützung von Chamilo ist derzeit auf das **BigBlueButton (BBB)-Plugin** beschränkt. Anstatt Webhooks an externe Systeme zu senden, fungiert Chamilo als Webhook-*Empfänger*: Es stellt Endpunkte bereit, die BigBlueButton bei Raumereignissen aufruft, und verwendet diese Ereignisse, um aktivitätsbezogene Kennzahlen pro Teilnehmer zu erstellen.

## How It Works

Wenn ein BBB-Meeting stattfindet, sendet der BBB-Server Echtzeit-Ereignisbenachrichtigungen an eine signierte Callback-URL auf Ihrer Chamilo-Installation. Chamilo verarbeitet jedes Ereignis und speichert aggregierte Kennzahlen (Sprechzeit, Kamerazeit, Nachrichten, Reaktionen, Handhebungen) in der Datenbanktabelle `conference_activity`.

```
BigBlueButton server
        │  POST (signed)
        ▼
Chamilo webhook endpoint
        │
        ▼
conference_activity (metrics JSON)
        │
        ▼
Webhook dashboard (/plugin/Bbb/webhook_dashboard.php)
```

## Endpoints

### Legacy PHP endpoint

```
POST /plugin/Bbb/webhook.php?au={accessUrlId}&mid={meetingId}&ts={timestamp}&sig={hmac}
```

Verarbeitet alle BBB-Raumereignisse. Validiert die HMAC-Signatur, führt anschließend ein Upsert einer `ConferenceActivity`-Zeile durch und aktualisiert das Kennzahlen-JSON-Feld.

### Modern Symfony endpoint

```
POST /api/videoconference/callback
Headers:
  X-Chamilo-Timestamp: <unix timestamp>
  X-Chamilo-Signature: <hmac-sha256>
```

Definiert über API Platform an der Entität `ConferenceActivity`. Für die Aktivitätsaufzeichnung sind die Signatur-Header erforderlich; Anfragen ohne gültige Signatur werden angenommen, es wird jedoch keine Aktivitätszeile geschrieben.

## Configuration (BBB Plugin)

Unter **Administration → Plugins → BigBlueButton** stehen die folgenden Webhook-Einstellungen zur Verfügung:

| Setting | Values | Description |
|---|---|---|
| `webhooks_enabled` | `true` / `false` | Webhook-Registrierung aktivieren oder deaktivieren |
| `webhooks_scope` | `per_meeting` / `global` | Einen Hook pro Meeting oder einen einzelnen globalen Hook für alle Meetings registrieren |
| `webhooks_hash_algo` | `sha256` / `sha1` | HMAC-Algorithmus für die Signaturprüfung |
| `webhooks_event_filter` | comma-separated string | Optionale Liste der zu empfangenden BBB-Ereignisnamen (leer = alle Ereignisse) |

Wenn ein Meeting erstellt wird und Webhooks aktiviert sind, ruft Chamilo die BBB-API `hooks/create` auf, um die Callback-URL zu registrieren. Die URL enthält eine zeitlich begrenzte HMAC-Signatur.

## Signature Validation

Der Legacy-Endpunkt verwendet Query-String-Parameter:

```
sig = HMAC-{algo}("{accessUrlId}|{meetingId}|{timestamp}", salt)
```

- Das `salt` ist der im BBB-Plugin konfigurierte Salt-Wert.
- Anfragen, die älter als **15 Minuten** sind, werden abgelehnt, um Replay-Angriffe einzuschränken.

Der moderne Endpunkt verwendet Header:

```
sig = HMAC-SHA256("{timestamp}\n{rawBody}", kernelSecret)
```

- Anfragen, die älter als **5 Minuten** sind, werden abgelehnt.

## Example: BigBlueButton Webhook Event

BBB sendet einen JSON-Body mit einem Array von Ereignissen. Jedes Ereignis hat eine `data.id` (Ereignisname) und ein Objekt `data.attributes`.

**Request from BBB:**

```http
POST /plugin/Bbb/webhook.php?au=1&mid=chamilo-meeting-abc123&ts=1715520000&sig=e3b0c44298fc
Content-Type: application/json

{
  "events": [
    {
      "data": {
        "id": "user-talking-started",
        "attributes": {
          "meeting":  { "external-meeting-id": "chamilo-meeting-abc123",
                        "internal-meeting-id": "bbb-internal-xyz" },
          "user":     { "internal-user-id": "w_abc123",
                        "external-user-id": "42",
                        "name": "Jane Smith" }
        },
        "event": { "ts": 1715520123 }
      }
    }
  ]
}
```

**What Chamilo does:**

1. Validiert HMAC-Signatur und Zeitstempel.
2. Sucht das `ConferenceMeeting` anhand von `remote_id`.
3. Sucht (oder erstellt) eine offene `ConferenceActivity`-Zeile für dieses Meeting und diesen Benutzer.
4. Speichert `temp.talk_started_at = 1715520123` im Kennzahlen-JSON.

Wenn das passende Ereignis `user-talking-stopped` eintrifft, berechnet Chamilo die verstrichenen Sekunden und addiert sie zu `totals.talk_seconds`.

## Tracked Events and Metrics

| BBB event(s) | Metric updated |
|---|---|
| `user-joined` / `participantjoined` | Aktivitätszeile erstellt |
| `user-talking-started` / `uservoiceactivated` | Timer für `totals.talk_seconds` gestartet |
| `user-talking-stopped` / `uservoicedeactivated` | `totals.talk_seconds` erhöht |
| `camera-share-started` / `webcamsharestarted` | Timer für `totals.camera_seconds` gestartet |
| `camera-share-stopped` / `webcamsharestopped` | `totals.camera_seconds` erhöht |
| `chat-message-posted` / `publicchatmessageposted` | `counts.messages` erhöht |
| `user-reaction-changed` / `useremojichanged` | `counts.reactions` + Aufschlüsselung pro Emoji |
| `user-hand-raised` / `userraisedhand` | `counts.hands` erhöht |
| `user-left` / `participantleft` | Offene Timer abgeschlossen, Aktivitätszeile geschlossen |

## Metrik-Datenstruktur

Metriken werden als JSON-Spalte in `ConferenceActivity` gespeichert:

```json
{
  "totals": {
    "talk_seconds":   142,
    "camera_seconds": 95
  },
  "counts": {
    "messages":  7,
    "reactions": 3,
    "hands":     1,
    "reactions_breakdown": {
      "👍": 2,
      "❤️": 1
    }
  },
  "temp": {
    "talk_started_at":   0,
    "camera_started_at": 0
  }
}
```

Die Felder unter `temp` enthalten Startzeitstempel laufender Timer; sie werden gelöscht, wenn das zugehörige Stopp-Ereignis eintrifft oder wenn der Teilnehmer die Sitzung verlässt.

## Webhook-Dashboard

Ein Admin-Dashboard ist unter `/plugin/Bbb/webhook_dashboard.php` verfügbar. Es zeigt Echtzeit- und historische Metriken je Teilnehmer für eine gegebene Sitzung: Verbindungszeit, Sprechzeit, Kamerazeit, Nachrichtenanzahl, Reaktionsanzahl und Handhebungen. Die Daten können als CSV exportiert werden.

## Registrieren und Aufräumen von Hooks

Die Klasse `BbbLib` stellt Methoden zur Verwaltung der Hook-Registrierung auf dem BBB-Server bereit:

| Method | Description |
|---|---|
| `ensureHookForMeeting($remoteId)` | Register (or confirm) a per-meeting hook after a user joins |
| `ensureGlobalWebhook()` | Register a single global hook covering all meetings |
| `cleanupWebhooks($meetingId)` | Delete Chamilo-registered hooks from the BBB server |
| `BbbPlugin::checkWebhooksHealth()` | Validate that the BBB `hooks/list` endpoint is reachable |

## Erweiterung auf andere Ereignisquellen

Derzeit gibt es in Chamilo kein generisches ausgehendes Webhook-System (d. h. keine eingebaute Möglichkeit, bei Einschreibung eines Nutzers oder Abschluss eines Kurses an eine externe URL zu POSTen). Wenn Sie dieses Verhalten benötigen, kommen unter anderem folgende Optionen in Betracht:

- Schreiben eines Plugins, das auf Symfony-Ereignisse lauscht und HTTP-Aufrufe auslöst (siehe [Plugins](../plugins/README.md) und [Event System](../events.md)).
- Nutzung der REST-API, um Zustandsänderungen von einem externen System abzufragen.