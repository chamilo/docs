# Webhooks

De webhook-ondersteuning van Chamilo is momenteel beperkt tot de **BigBlueButton (BBB) plugin**. In plaats van webhooks naar externe systemen te verzenden, fungeert Chamilo als een webhook-*ontvanger*: het stelt eindpunten beschikbaar die BigBlueButton aanroept wanneer gebeurtenissen in een ruimte plaatsvinden, en gebruikt deze gebeurtenissen om per deelnemer activiteitsstatistieken op te bouwen.

## Hoe het werkt

Wanneer een BBB-vergadering plaatsvindt, stuurt de BBB-server real-time meldingen van gebeurtenissen naar een ondertekende callback-URL op uw Chamilo-installatie. Chamilo verwerkt elke gebeurtenis en slaat geaggregeerde statistieken (spreektijd, cameragebruik, berichten, reacties, hand opsteken) op in de databasetabel `conference_activity`.

```
BigBlueButton-server
        │  POST (ondertekend)
        ▼
Chamilo webhook-eindpunt
        │
        ▼
conference_activity (statistieken JSON)
        │
        ▼
Webhook-dashboard (/plugin/Bbb/webhook_dashboard.php)
```

## Eindpunten

### Verouderd PHP-eindpunt

```
POST /plugin/Bbb/webhook.php?au={accessUrlId}&mid={meetingId}&ts={timestamp}&sig={hmac}
```

Verwerkt alle BBB-ruimtegebeurtenissen. Valideert de HMAC-handtekening, voert vervolgens een upsert uit op een `ConferenceActivity`-rij en werkt het JSON-veld met statistieken bij.

### Modern Symfony-eindpunt

```
POST /api/videoconference/callback
Headers:
  X-Chamilo-Timestamp: <unix timestamp>
  X-Chamilo-Signature: <hmac-sha256>
```

Gedefinieerd via API Platform op de `ConferenceActivity`-entiteit. Vereist de handtekeningheaders voor het vastleggen van activiteiten; verzoeken zonder een geldige handtekening worden geaccepteerd, maar er wordt geen activiteitsrij geschreven.

## Configuratie (BBB Plugin)

In **Beheer → Plugins → BigBlueButton** zijn de volgende webhook-instellingen beschikbaar:

| Instelling | Waarden | Beschrijving |
|---|---|---|
| `webhooks_enabled` | `true` / `false` | Webhook-registratie in- of uitschakelen |
| `webhooks_scope` | `per_meeting` / `global` | Eén hook per vergadering registreren of een enkele globale hook voor alle vergaderingen |
| `webhooks_hash_algo` | `sha256` / `sha1` | HMAC-algoritme voor handtekeningverificatie |
| `webhooks_event_filter` | kommagescheiden tekenreeks | Optionele lijst van BBB-gebeurtenisnamen om te ontvangen (leeg = alle gebeurtenissen) |

Wanneer een vergadering wordt aangemaakt en webhooks zijn ingeschakeld, roept Chamilo de BBB `hooks/create` API aan om de callback-URL te registreren. De URL bevat een tijdgebonden HMAC-handtekening.

## Handtekeningvalidatie

Het verouderde eindpunt gebruikt querystringparameters:

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

## Voorbeeld: BigBlueButton Webhook-gebeurtenis

BBB stuurt een JSON-body met een array van gebeurtenissen. Elke gebeurtenis heeft een `data.id` (gebeurtenisnaam) en een `data.attributes`-object.

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

1. Valideert de HMAC-handtekening en timestamp.
2. Zoekt de `ConferenceMeeting` op aan de hand van `remote_id`.
3. Zoekt (of maakt) een open `ConferenceActivity`-rij voor die vergadering + gebruiker.
4. Registreert `temp.talk_started_at = 1715520123` in de statistieken-JSON.

Wanneer de bijbehorende `user-talking-stopped`-gebeurtenis arriveert, berekent Chamilo de verstreken seconden en voegt deze toe aan `totals.talk_seconds`.

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
| `user-left` / `participantleft` | Open timers geleegd, activiteitsrij gesloten |

## Gegevensstructuur van Metrics

Metrics worden opgeslagen als een JSON-kolom in `ConferenceActivity`:

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

De `temp`-velden bevatten tijdelijke starttijdstempels van lopende timers; deze worden gewist wanneer het bijbehorende stopgebeurtenis arriveert of wanneer de deelnemer de sessie verlaat.

## Webhook Dashboard

Een beheerdashboard is beschikbaar op `/plugin/Bbb/webhook_dashboard.php`. Het toont real-time en historische metrics per deelnemer voor een bepaalde vergadering: verbindingstijd, spreektijd, cameragebruikstijd, aantal berichten, aantal reacties en handopstekingen. Gegevens kunnen worden geëxporteerd als CSV.

## Hooks Registreren en Opschonen

De `BbbLib`-klasse biedt methoden voor het beheren van hookregistratie op de BBB-server:

| Methode | Beschrijving |
|---|---|
| `ensureHookForMeeting($remoteId)` | Registreer (of bevestig) een hook per vergadering nadat een gebruiker deelneemt |
| `ensureGlobalWebhook()` | Registreer een enkele globale hook die alle vergaderingen dekt |
| `cleanupWebhooks($meetingId)` | Verwijder door Chamilo geregistreerde hooks van de BBB-server |
| `BbbPlugin::checkWebhooksHealth()` | Valideer of het BBB `hooks/list`-eindpunt bereikbaar is |

## Uitbreiden naar Andere Gebeurtenisbronnen

Er is momenteel geen generiek outbound webhook-systeem in Chamilo (d.w.z. geen ingebouwde manier om een POST-verzoek naar een externe URL te sturen wanneer een gebruiker zich inschrijft of een cursus voltooit). Als u dat gedrag nodig heeft, zijn de opties onder andere:

- Het schrijven van een plugin die luistert naar Symfony-gebeurtenissen en HTTP-aanroepen verzendt (zie [Plugins](../plugins/README.md) en [Event System](../events.md)).
- Het gebruik van de REST API om vanuit een extern systeem te pollen naar statuswijzigingen.