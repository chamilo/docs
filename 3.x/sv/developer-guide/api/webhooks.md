# Webhooks

Chamilos webhook-stöd är för närvarande avgränsat till **BigBlueButton (BBB)-pluginet**. I stället för att skicka webhooks till externa system agerar Chamilo som en webhook-*mottagare*: det exponerar slutpunkter som BigBlueButton anropar när rumshändelser inträffar, och använder dessa händelser för att bygga aktivitetsmått per deltagare.

## How It Works

När ett BBB-möte äger rum skickar BBB-servern realtidshändelser till en signerad callback-URL på din Chamilo-installation. Chamilo bearbetar varje händelse och lagrar aggregerade mått (talartid, kameratid, meddelanden, reaktioner, handuppräckningar) i databastabellen `conference_activity`.

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

Hanterar alla BBB-rumshändelser. Validerar HMAC-signaturen, gör därefter upsert av en `ConferenceActivity`-rad och uppdaterar JSON-fältet för mått.

### Modern Symfony endpoint

```
POST /api/videoconference/callback
Headers:
  X-Chamilo-Timestamp: <unix timestamp>
  X-Chamilo-Signature: <hmac-sha256>
```

Definierad via API Platform på entiteten `ConferenceActivity`. Kräver signaturhuvuden för aktivitetsregistrering; begäranden utan giltig signatur accepteras men ingen aktivitetsrad skrivs.

## Configuration (BBB Plugin)

Under **Administration → Plugins → BigBlueButton** finns följande webhook-inställningar:

| Setting | Values | Description |
|---|---|---|
| `webhooks_enabled` | `true` / `false` | Aktivera eller inaktivera webhook-registrering |
| `webhooks_scope` | `per_meeting` / `global` | Registrera en hook per möte eller en enda global hook för alla möten |
| `webhooks_hash_algo` | `sha256` / `sha1` | HMAC-algoritm för signaturverifiering |
| `webhooks_event_filter` | comma-separated string | Valfri lista med BBB-händelsenamn som ska tas emot (tom = alla händelser) |

När ett möte skapas och webhooks är aktiverade anropar Chamilo BBB-API:et `hooks/create` för att registrera callback-URL:en. URL:en innehåller en tidsbegränsad HMAC-signatur.

## Signature Validation

Den äldre slutpunkten använder parametrar i query-strängen:

```
sig = HMAC-{algo}("{accessUrlId}|{meetingId}|{timestamp}", salt)
```

- `salt` är det saltvärde som är konfigurerat i BBB-pluginet.
- Begäranden äldre än **15 minuter** avvisas för att begränsa replay-attacker.

Den moderna slutpunkten använder headers:

```
sig = HMAC-SHA256("{timestamp}\n{rawBody}", kernelSecret)
```

- Begäranden äldre än **5 minuter** avvisas.

## Example: BigBlueButton Webhook Event

BBB skickar en JSON-kropp som innehåller en array av händelser. Varje händelse har ett `data.id` (händelsenamn) och ett objekt `data.attributes`.

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

1. Validerar HMAC-signaturen och tidsstämpeln.
2. Slår upp `ConferenceMeeting` via `remote_id`.
3. Slår upp (eller skapar) en öppen `ConferenceActivity`-rad för det mötet + användaren.
4. Registrerar `temp.talk_started_at = 1715520123` i mått-JSON.

När den matchande händelsen `user-talking-stopped` anländer beräknar Chamilo förflutna sekunder och lägger till dem i `totals.talk_seconds`.

## Tracked Events and Metrics

| BBB event(s) | Metric updated |
|---|---|
| `user-joined` / `participantjoined` | Aktivitetsrad skapas |
| `user-talking-started` / `uservoiceactivated` | Timer startas för `totals.talk_seconds` |
| `user-talking-stopped` / `uservoicedeactivated` | `totals.talk_seconds` ökas |
| `camera-share-started` / `webcamsharestarted` | Timer startas för `totals.camera_seconds` |
| `camera-share-stopped` / `webcamsharestopped` | `totals.camera_seconds` ökas |
| `chat-message-posted` / `publicchatmessageposted` | `counts.messages` ökas |
| `user-reaction-changed` / `useremojichanged` | `counts.reactions` + uppdelning per emoji |
| `user-hand-raised` / `userraisedhand` | `counts.hands` ökas |
| `user-left` / `participantleft` | Öppna timers spolas, aktivitetsrad stängs |

## Datastruktur för mätvärden

Mätvärden lagras som en JSON-kolumn på `ConferenceActivity`:

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

Fälten `temp` innehåller tidsstämplar för pågående timers start; de rensas när motsvarande stopphändelse anländer eller när deltagaren lämnar.

## Webhook-instrumentpanel

En administratörsinstrumentpanel finns på `/plugin/Bbb/webhook_dashboard.php`. Den visar realtids- och historiska mätvärden per deltagare för ett givet möte: anslutningstid, taltid, kameratid, antal meddelanden, antal reaktioner och handuppräckningar. Data kan exporteras som CSV.

## Registrering och rensning av hooks

Klassen `BbbLib` tillhandahåller metoder för att hantera hook-registrering på BBB-servern:

| Metod | Beskrivning |
|---|---|
| `ensureHookForMeeting($remoteId)` | Registrera (eller bekräfta) en hook per möte efter att en användare anslutit |
| `ensureGlobalWebhook()` | Registrera en enda global hook som täcker alla möten |
| `cleanupWebhooks($meetingId)` | Ta bort Chamilo-registrerade hooks från BBB-servern |
| `BbbPlugin::checkWebhooksHealth()` | Validera att BBB-ändpunkten `hooks/list` är nåbar |

## Utökning till andra händelsekällor

Det finns för närvarande inget generiskt utgående webhook-system i Chamilo (dvs. inget inbyggt sätt att POST:a till en extern URL när en användare anmäler sig eller slutför en kurs). Om du behöver det beteendet inkluderar alternativen:

- Att skriva ett plugin som lyssnar på Symfony-händelser och skickar HTTP-anrop (se [Plugins](../plugins/README.md) och [Event System](../events.md)).
- Att använda REST API för att polla efter tillståndsändringar från ett externt system.