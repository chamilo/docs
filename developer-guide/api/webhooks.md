# Webhooks

Die Unterstützung von Webhooks in Chamilo ist derzeit auf das **BigBlueButton (BBB)-Plugin** beschränkt. Anstatt Webhooks an externe Systeme zu senden, fungiert Chamilo als Webhook-*Empfänger*: Es stellt Endpunkte bereit, die BigBlueButton bei Raumereignissen aufruft, und verwendet diese Ereignisse, um pro Teilnehmer Aktivitätsmetriken zu erstellen.

## Funktionsweise

Wenn ein BBB-Meeting stattfindet, sendet der BBB-Server Echtzeit-Ereignisbenachrichtigungen an eine signierte Callback-URL auf Ihrer Chamilo-Installation. Chamilo verarbeitet jedes Ereignis und speichert aggregierte Metriken (Sprechzeit, Kamerazeit, Nachrichten, Reaktionen, Handheben) in der Datenbanktabelle `conference_activity`.

```
BigBlueButton-Server
        │  POST (signiert)
        ▼
Chamilo-Webhook-Endpunkt
        │
        ▼
conference_activity (Metriken JSON)
        │
        ▼
Webhook-Dashboard (/plugin/Bbb/webhook_dashboard.php)
```

## Endpunkte

### Legacy-PHP-Endpunkt

```
POST /plugin/Bbb/webhook.php?au={accessUrlId}&mid={meetingId}&ts={timestamp}&sig={hmac}
```

Behandelt alle BBB-Raumereignisse. Überprüft die HMAC-Signatur, aktualisiert dann eine `ConferenceActivity`-Zeile und das Metriken-JSON-Feld.

### Moderner Symfony-Endpunkt

```
POST /api/videoconference/callback
Headers:
  X-Chamilo-Timestamp: <unix timestamp>
  X-Chamilo-Signature: <hmac-sha256>
```

Definiert über API Platform auf der `ConferenceActivity`-Entität. Erfordert die Signatur-Header für die Aktivitätsaufzeichnung; Anfragen ohne gültige Signatur werden akzeptiert, aber es wird keine Aktivitätszeile geschrieben.

## Konfiguration (BBB-Plugin)

In **Administration → Plugins → BigBlueButton** stehen folgende Webhook-Einstellungen zur Verfügung:

| Einstellung | Werte | Beschreibung |
|---|---|---|
| `webhooks_enabled` | `true` / `false` | Aktivieren oder Deaktivieren der Webhook-Registrierung |
| `webhooks_scope` | `per_meeting` / `global` | Einen Hook pro Meeting oder einen einzigen globalen Hook für alle Meetings registrieren |
| `webhooks_hash_algo` | `sha256` / `sha1` | HMAC-Algorithmus für die Signaturüberprüfung |
| `webhooks_event_filter` | kommaseparierte Zeichenfolge | Optionale Liste von BBB-Ereignisnamen, die empfangen werden sollen (leer = alle Ereignisse) |

Wenn ein Meeting erstellt wird und Webhooks aktiviert sind, ruft Chamilo die BBB-API `hooks/create` auf, um die Callback-URL zu registrieren. Die URL enthält eine zeitgebundene HMAC-Signatur.

## Signaturvalidierung

Der Legacy-Endpunkt verwendet Query-String-Parameter:

```
sig = HMAC-{algo}("{accessUrlId}|{meetingId}|{timestamp}", salt)
```

- Der `salt` ist der konfigurierte Salt-Wert des BBB-Plugins.
- Anfragen, die älter als **15 Minuten** sind, werden abgelehnt, um Replay-Angriffe zu begrenzen.

Der moderne Endpunkt verwendet Header:

```
sig = HMAC-SHA256("{timestamp}\n{rawBody}", kernelSecret)
```

- Anfragen, die älter als **5 Minuten** sind, werden abgelehnt.

## Beispiel: BigBlueButton-Webhook-Ereignis

BBB sendet einen JSON-Body, der ein Array von Ereignissen enthält. Jedes Ereignis hat eine `data.id` (Ereignisname) und ein `data.attributes`-Objekt.

**Anfrage von BBB:**

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

**Was Chamilo tut:**

1. Überprüft die HMAC-Signatur und den Zeitstempel.
2. Sucht das `ConferenceMeeting` anhand der `remote_id`.
3. Sucht (oder erstellt) eine offene `ConferenceActivity`-Zeile für dieses Meeting + Benutzer.
4. Speichert `temp.talk_started_at = 1715520123` im Metriken-JSON.

Wenn das passende `user-talking-stopped`-Ereignis eintrifft, berechnet Chamilo die verstrichenen Sekunden und addiert sie zu `totals.talk_seconds`.

## Verfolgte Ereignisse und Metriken

| BBB-Ereignis(se) | Aktualisierte Metrik |
|---|---|
| `user-joined` / `participantjoined` | Aktivitätszeile erstellt |
| `user-talking-started` / `uservoiceactivated` | Timer gestartet für `totals.talk_seconds` |
| `user-talking-stopped` / `uservoicedeactivated` | `totals.talk_seconds` erhöht |
| `camera-share-started` / `webcamsharestarted` | Timer gestartet für `totals.camera_seconds` |
| `camera-share-stopped` / `webcamsharestopped` | `totals.camera_seconds` erhöht |
| `chat-message-posted` / `publicchatmessageposted` | `counts.messages` erhöht |
| `user-reaction-changed` / `useremojichanged` | `counts.reactions` + Aufschlüsselung pro Emoji |
| `user-hand-raised` / `userraisedhand` | `counts.hands` erhöht |
| `user-left` / `participantleft` | Offene Timer geleert, Aktivitätszeile geschlossen |

## Datenstruktur der Metriken

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

Die `temp`-Felder enthalten Startzeitstempel für laufende Timer; sie werden gelöscht, wenn das entsprechende Stopp-Ereignis eintrifft oder wenn der Teilnehmer die Sitzung verlässt.

## Webhook-Dashboard

Ein Admin-Dashboard ist unter `/plugin/Bbb/webhook_dashboard.php` verfügbar. Es zeigt Echtzeit- und historische Metriken pro Teilnehmer für ein bestimmtes Meeting: Verbindungsdauer, Sprechzeit, Kamerazeit, Anzahl der Nachrichten, Anzahl der Reaktionen und Handzeichen. Die Daten können als CSV exportiert werden.

## Registrieren und Bereinigen von Hooks

Die Klasse `BbbLib` bietet Methoden zur Verwaltung der Hook-Registrierung auf dem BBB-Server:

| Methode | Beschreibung |
|---|---|
| `ensureHookForMeeting($remoteId)` | Registriert (oder bestätigt) einen Hook pro Meeting, nachdem ein Benutzer beigetreten ist |
| `ensureGlobalWebhook()` | Registriert einen einzelnen globalen Hook, der alle Meetings abdeckt |
| `cleanupWebhooks($meetingId)` | Löscht von Chamilo registrierte Hooks vom BBB-Server |
| `BbbPlugin::checkWebhooksHealth()` | Überprüft, ob der BBB-Endpunkt `hooks/list` erreichbar ist |

## Erweiterung auf andere Ereignisquellen

Derzeit gibt es in Chamilo kein generisches ausgehendes Webhook-System (d. h. keine integrierte Möglichkeit, bei der Einschreibung oder dem Abschluss eines Kurses eine POST-Anfrage an eine externe URL zu senden). Wenn Sie dieses Verhalten benötigen, stehen folgende Optionen zur Verfügung:

- Schreiben Sie ein Plugin, das auf Symfony-Ereignisse lauscht und HTTP-Aufrufe ausführt (siehe [Plugins](../plugins/README.md) und [Ereignissystem](../events.md)).
- Verwenden Sie die REST-API, um von einem externen System aus auf Zustandsänderungen zu prüfen.