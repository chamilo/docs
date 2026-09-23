# Webhooks

Chamilos webhook-understøttelse er i øjeblikket begrænset til **BigBlueButton (BBB)-pluginnet**. I stedet for at sende webhooks til eksterne systemer fungerer Chamilo som en webhook-*modtager*: det eksponerer endepunkter, som BigBlueButton kalder, når rumhændelser indtræffer, og bruger disse hændelser til at opbygge aktivitetsmålinger pr. deltager.

## How It Works

Når et BBB-møde finder sted, sender BBB-serveren realtidshændelsesnotifikationer til en signeret callback-URL på din Chamilo-installation. Chamilo behandler hver hændelse og gemmer aggregerede målinger (taletid, kameratid, beskeder, reaktioner, håndsoprækninger) i databasetabellen `conference_activity`.

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

Håndterer alle BBB-rumhændelser. Validerer HMAC-signaturen, og udfører derefter upsert af en `ConferenceActivity`-række og opdaterer metrics-JSON-feltet.

### Modern Symfony endpoint

```
POST /api/videoconference/callback
Headers:
  X-Chamilo-Timestamp: <unix timestamp>
  X-Chamilo-Signature: <hmac-sha256>
```

Defineret via API Platform på entiteten `ConferenceActivity`. Kræver signaturheaders til aktivitetsregistrering; anmodninger uden en gyldig signatur accepteres, men der skrives ingen aktivitetsrække.

## Configuration (BBB Plugin)

Under **Administration → Plugins → BigBlueButton** er følgende webhook-indstillinger tilgængelige:

| Setting | Values | Description |
|---|---|---|
| `webhooks_enabled` | `true` / `false` | Aktivér eller deaktivér webhook-registrering |
| `webhooks_scope` | `per_meeting` / `global` | Registrér ét hook pr. møde eller et enkelt globalt hook for alle møder |
| `webhooks_hash_algo` | `sha256` / `sha1` | HMAC-algoritme til signaturverifikation |
| `webhooks_event_filter` | comma-separated string | Valgfri liste over BBB-hændelsesnavne, der skal modtages (tom = alle hændelser) |

Når et møde oprettes, og webhooks er aktiveret, kalder Chamilo BBB-API'et `hooks/create` for at registrere callback-URL'en. URL'en indeholder en tidsbegrænset HMAC-signatur.

## Signature Validation

Det ældre endepunkt bruger parametre i query-strengen:

```
sig = HMAC-{algo}("{accessUrlId}|{meetingId}|{timestamp}", salt)
```

- `salt` er BBB-pluginnets konfigurerede salt-værdi.
- Anmodninger ældre end **15 minutter** afvises for at begrænse replay-angreb.

Det moderne endepunkt bruger headers:

```
sig = HMAC-SHA256("{timestamp}\n{rawBody}", kernelSecret)
```

- Anmodninger ældre end **5 minutter** afvises.

## Example: BigBlueButton Webhook Event

BBB poster en JSON-krop, der indeholder et array af hændelser. Hver hændelse har et `data.id` (hændelsesnavn) og et `data.attributes`-objekt.

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

1. Validerer HMAC-signaturen og tidsstemplet.
2. Slår `ConferenceMeeting` op via `remote_id`.
3. Slår (eller opretter) en åben `ConferenceActivity`-række op for det pågældende møde + bruger.
4. Registrerer `temp.talk_started_at = 1715520123` i metrics-JSON.

Når den matchende hændelse `user-talking-stopped` ankommer, beregner Chamilo de forløbne sekunder og lægger dem til `totals.talk_seconds`.

## Tracked Events and Metrics

| BBB event(s) | Metric updated |
|---|---|
| `user-joined` / `participantjoined` | Aktivitetsrække oprettet |
| `user-talking-started` / `uservoiceactivated` | Timer startet for `totals.talk_seconds` |
| `user-talking-stopped` / `uservoicedeactivated` | `totals.talk_seconds` øget |
| `camera-share-started` / `webcamsharestarted` | Timer startet for `totals.camera_seconds` |
| `camera-share-stopped` / `webcamsharestopped` | `totals.camera_seconds` øget |
| `chat-message-posted` / `publicchatmessageposted` | `counts.messages` øget |
| `user-reaction-changed` / `useremojichanged` | `counts.reactions` + opdeling pr. emoji |
| `user-hand-raised` / `userraisedhand` | `counts.hands` øget |
| `user-left` / `participantleft` | Åbne timere tømmes, aktivitetsrække lukkes |

## Metrics Data Structure

Metrics gemmes som en JSON-kolonne på `ConferenceActivity`:

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

Felterne `temp` indeholder tidsstempler for start af igangværende timere; de nulstilles, når den tilsvarende stop-hændelse ankommer, eller når deltageren forlader mødet.

## Webhook Dashboard

Et administratordashboard er tilgængeligt på `/plugin/Bbb/webhook_dashboard.php`. Det viser realtids- og historiske metrics pr. deltager for et givet møde: tilslutningstid, taletid, kameratid, antal beskeder, antal reaktioner og håndsoprækninger. Data kan eksporteres som CSV.

## Registering and Cleaning Up Hooks

Klassen `BbbLib` stiller metoder til rådighed til at administrere hook-registrering på BBB-serveren:

| Method | Description |
|---|---|
| `ensureHookForMeeting($remoteId)` | Register (or confirm) a per-meeting hook after a user joins |
| `ensureGlobalWebhook()` | Register a single global hook covering all meetings |
| `cleanupWebhooks($meetingId)` | Delete Chamilo-registered hooks from the BBB server |
| `BbbPlugin::checkWebhooksHealth()` | Validate that the BBB `hooks/list` endpoint is reachable |

## Extending to Other Event Sources

Der findes i øjeblikket intet generisk udgående webhook-system i Chamilo (dvs. ingen indbygget måde at POST'e til en ekstern URL, når en bruger tilmelder sig eller gennemfører et kursus). Hvis du har brug for den adfærd, omfatter mulighederne:

- At skrive et plugin, der lytter til Symfony-hændelser og afsender HTTP-kald (se [Plugins](../plugins/README.md) og [Event System](../events.md)).
- At bruge REST API til at polle efter tilstandsændringer fra et eksternt system.