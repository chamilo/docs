# Webhooks

De webhookondersteuning van Chamilo is momenteel beperkt tot de **BigBlueButton (BBB)-plugin**. In plaats van webhooks naar externe systemen te sturen, treedt Chamilo op als webhook-*ontvanger*: het biedt eindpunten die BigBlueButton aanroept wanneer er gebeurtenissen in een ruimte plaatsvinden, en gebruikt die gebeurtenissen om activiteitsstatistieken per deelnemer op te bouwen.

## Hoe het werkt

Wanneer een BBB-vergadering plaatsvindt, stuurt de BBB-server realtime gebeurtenismeldingen naar een ondertekende callback-URL op uw Chamilo-installatie. Chamilo verwerkt elke gebeurtenis en slaat geaggregeerde statistieken (spreektijd, cameratijd, berichten, reacties, handopstekingen) op in de databasetabel `conference_activity`.

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

## Eindpunten

### Legacy PHP-eindpunt

```
POST /plugin/Bbb/webhook.php?au={accessUrlId}&mid={meetingId}&ts={timestamp}&sig={hmac}
```

Verwerkt alle BBB-ruimtegebeurtenissen. Valideert de HMAC-handtekening, voert vervolgens een upsert uit van een `ConferenceActivity`-rij en werkt het JSON-veld met statistieken bij.

### Modern Symfony-eindpunt

```
POST /api/videoconference/callback
Headers:
  X-Chamilo-Timestamp: <unix timestamp>
  X-Chamilo-Signature: <hmac-sha256>
```

Gedefinieerd via API Platform op de entiteit `ConferenceActivity`. Vereist de handtekeningheaders voor het vastleggen van activiteit; verzoeken zonder geldige handtekening worden geaccepteerd, maar er wordt geen activiteitsrij geschreven.

## Configuratie (BBB-plugin)

In **Beheer → Plugins → BigBlueButton** zijn de volgende webhookinstellingen beschikbaar:

| Instelling | Waarden | Beschrijving |
|---|---|---|
| `webhooks_enabled` | `true` / `false` | Webhookregistratie in- of uitschakelen |
| `webhooks_scope` | `per_meeting` / `global` | Eén hook per vergadering registreren of één globale hook voor alle vergaderingen |
| `webhooks_hash_algo` | `sha256` / `sha1` | HMAC-algoritme voor handtekeningverificatie |
| `webhooks_event_filter` | komma-gescheiden tekenreeks | Optionele lijst van BBB-gebeurtenisnamen die ontvangen moeten worden (leeg = alle gebeurtenissen) |

Wanneer een vergadering wordt aangemaakt en webhooks zijn ingeschakeld, roept Chamilo de BBB-API `hooks/create` aan om de callback-URL te registreren. De URL bevat een tijdgebonden HMAC-handtekening.

## Handtekeningvalidatie

Het legacy-eindpunt gebruikt querystringparameters:

```
sig = HMAC-{algo}("{accessUrlId}|{meetingId}|{timestamp}", salt)
```

- De `salt` is de geconfigureerde salt-waarde van de BBB-plugin.
- Verzoeken ouder dan **15 minuten** worden geweigerd om replay-aanvallen te beperken.

Het moderne eindpunt gebruikt headers:

```
sig = HMAC-SHA256("{timestamp}\n{rawBody}", kernelSecret)
```

- Verzoeken ouder dan **5 minuten** worden geweigerd.

## Voorbeeld: BigBlueButton-webhookgebeurtenis

BBB plaatst een JSON-body met een array van gebeurtenissen. Elke gebeurtenis heeft een `data.id` (gebeurtenisnaam) en een object `data.attributes`.

**Verzoek van BBB:**

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

**Wat Chamilo doet:**

1. Valideert de HMAC-handtekening en het tijdstempel.
2. Zoekt de `ConferenceMeeting` op via `remote_id`.
3. Zoekt (of maakt) een open `ConferenceActivity`-rij voor die vergadering + gebruiker.
4. Legt `temp.talk_started_at = 1715520123` vast in de statistieken-JSON.

Wanneer de bijbehorende gebeurtenis `user-talking-stopped` binnenkomt, berekent Chamilo de verstreken seconden en telt die op bij `totals.talk_seconds`.

## Bijgehouden gebeurtenissen en statistieken

| BBB-gebeurtenis(sen) | Bijgewerkte statistiek |
|---|---|
| `user-joined` / `participantjoined` | Activiteitsrij aangemaakt |
| `user-talking-started` / `uservoiceactivated` | Timer gestart voor `totals.talk_seconds` |
| `user-talking-stopped` / `uservoicedeactivated` | `totals.talk_seconds` verhoogd |
| `camera-share-started` / `webcamsharestarted` | Timer gestart voor `totals.camera_seconds` |
| `camera-share-stopped` / `webcamsharestopped` | `totals.camera_seconds` verhoogd |
| `chat-message-posted` / `publicchatmessageposted` | `counts.messages` verhoogd |
| `user-reaction-changed` / `useremojichanged` | `counts.reactions` + uitsplitsing per emoji |
| `user-hand-raised` / `userraisedhand` | `counts.hands` verhoogd |
| `user-left` / `participantleft` | Open timers afgesloten, activiteitsrij gesloten |

## Metricsgegevensstructuur

Metrics worden opgeslagen als een JSON-kolom op `ConferenceActivity`:

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

De velden `temp` bevatten starttijdstempels van timers die nog lopen; ze worden gewist wanneer de bijbehorende stopgebeurtenis binnenkomt of wanneer de deelnemer vertrekt.

## Webhookdashboard

Er is een beheerdersdashboard beschikbaar op `/plugin/Bbb/webhook_dashboard.php`. Het toont realtime- en historische metrics per deelnemer voor een gegeven meeting: verbindingstijd, spreektijd, cameratijd, aantal berichten, aantal reacties en handopstekingen. Gegevens kunnen als CSV worden geëxporteerd.

## Hooks registreren en opruimen

De klasse `BbbLib` biedt methoden voor het beheren van hookregistratie op de BBB-server:

| Method | Description |
|---|---|
| `ensureHookForMeeting($remoteId)` | Register (or confirm) a per-meeting hook after a user joins |
| `ensureGlobalWebhook()` | Register a single global hook covering all meetings |
| `cleanupWebhooks($meetingId)` | Delete Chamilo-registered hooks from the BBB server |
| `BbbPlugin::checkWebhooksHealth()` | Validate that the BBB `hooks/list` endpoint is reachable |

## Uitbreiden naar andere gebeurtenisbronnen

Er is momenteel geen generiek uitgaand webhook-systeem in Chamilo (d.w.z. geen ingebouwde manier om naar een externe URL te POSTen wanneer een gebruiker zich inschrijft of een cursus afrondt). Als u dat gedrag nodig hebt, zijn de opties onder meer:

- Een plugin schrijven die luistert naar Symfony-events en HTTP-aanroepen verzendt (zie [Plugins](../plugins/README.md) en [Event System](../events.md)).
- De REST API gebruiken om vanuit een extern systeem te pollen op statuswijzigingen.