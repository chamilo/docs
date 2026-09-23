# Webhooks

Chamilos webhook-støtte er for øyeblikket avgrenset til **BigBlueButton (BBB)-pluginen**. I stedet for å sende webhooks til eksterne systemer, opptrer Chamilo som en webhook-*mottaker*: den eksponerer endepunkter som BigBlueButton kaller når romhendelser inntreffer, og bruker disse hendelsene til å bygge aktivitetsmålinger per deltaker.

## How It Works

Når et BBB-møte avholdes, sender BBB-serveren sanntids hendelsesvarsler til en signert tilbakekallings-URL på Chamilo-installasjonen din. Chamilo behandler hver hendelse og lagrer aggregerte målinger (taletid, kameratid, meldinger, reaksjoner, håndsopprekking) i databasetabellen `conference_activity`.

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

Håndterer alle BBB-romhendelser. Validerer HMAC-signaturen, og utfører deretter upsert av en `ConferenceActivity`-rad og oppdaterer metrics-JSON-feltet.

### Modern Symfony endpoint

```
POST /api/videoconference/callback
Headers:
  X-Chamilo-Timestamp: <unix timestamp>
  X-Chamilo-Signature: <hmac-sha256>
```

Definert via API Platform på entiteten `ConferenceActivity`. Krever signaturhodene for aktivitetsregistrering; forespørsler uten gyldig signatur aksepteres, men ingen aktivitetsrad skrives.

## Configuration (BBB Plugin)

Under **Administrasjon → Plugins → BigBlueButton** er følgende webhook-innstillinger tilgjengelige:

| Setting | Values | Description |
|---|---|---|
| `webhooks_enabled` | `true` / `false` | Aktiver eller deaktiver webhook-registrering |
| `webhooks_scope` | `per_meeting` / `global` | Registrer én hook per møte eller én global hook for alle møter |
| `webhooks_hash_algo` | `sha256` / `sha1` | HMAC-algoritme for signaturverifisering |
| `webhooks_event_filter` | comma-separated string | Valgfri liste over BBB-hendelsesnavn som skal mottas (tom = alle hendelser) |

Når et møte opprettes og webhooks er aktivert, kaller Chamilo BBB-API-et `hooks/create` for å registrere tilbakekallings-URL-en. URL-en inkluderer en tidsbegrenset HMAC-signatur.

## Signature Validation

Det eldre endepunktet bruker parametere i spørringsstrengen:

```
sig = HMAC-{algo}("{accessUrlId}|{meetingId}|{timestamp}", salt)
```

- `salt` er saltverdien som er konfigurert i BBB-pluginen.
- Forespørsler eldre enn **15 minutter** avvises for å begrense replay-angrep.

Det moderne endepunktet bruker hoder:

```
sig = HMAC-SHA256("{timestamp}\n{rawBody}", kernelSecret)
```

- Forespørsler eldre enn **5 minutter** avvises.

## Example: BigBlueButton Webhook Event

BBB sender en JSON-kropp som inneholder en tabell av hendelser. Hver hendelse har en `data.id` (hendelsesnavn) og et `data.attributes`-objekt.

**Forespørsel fra BBB:**

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

**Hva Chamilo gjør:**

1. Validerer HMAC-signaturen og tidsstempelet.
2. Slår opp `ConferenceMeeting` etter `remote_id`.
3. Slår opp (eller oppretter) en åpen `ConferenceActivity`-rad for det møtet + brukeren.
4. Registrerer `temp.talk_started_at = 1715520123` i metrics-JSON.

Når den tilsvarende hendelsen `user-talking-stopped` ankommer, beregner Chamilo de forløpte sekundene og legger dem til `totals.talk_seconds`.

## Tracked Events and Metrics

| BBB event(s) | Metric updated |
|---|---|
| `user-joined` / `participantjoined` | Aktivitetsrad opprettet |
| `user-talking-started` / `uservoiceactivated` | Tidtaker startet for `totals.talk_seconds` |
| `user-talking-stopped` / `uservoicedeactivated` | `totals.talk_seconds` økt |
| `camera-share-started` / `webcamsharestarted` | Tidtaker startet for `totals.camera_seconds` |
| `camera-share-stopped` / `webcamsharestopped` | `totals.camera_seconds` økt |
| `chat-message-posted` / `publicchatmessageposted` | `counts.messages` økt |
| `user-reaction-changed` / `useremojichanged` | `counts.reactions` + fordeling per emoji |
| `user-hand-raised` / `userraisedhand` | `counts.hands` økt |
| `user-left` / `participantleft` | Åpne tidtakere tømmes, aktivitetsrad lukkes |

## Datastruktur for målinger

Målinger lagres som en JSON-kolonne på `ConferenceActivity`:

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

Feltene i `temp` holder starttidsstempler for pågående tidtakere; de tømmes når den tilhørende stopphendelsen kommer, eller når deltakeren forlater.

## Webhook-dashbord

Et administratordashbord er tilgjengelig på `/plugin/Bbb/webhook_dashboard.php`. Det viser sanntids- og historiske målinger per deltaker for et gitt møte: tilkoblingstid, taletid, kameratid, antall meldinger, antall reaksjoner og håndsopprekkinger. Data kan eksporteres som CSV.

## Registrering og opprydding av hooks

Klassen `BbbLib` tilbyr metoder for å administrere hook-registrering på BBB-serveren:

| Metode | Beskrivelse |
|---|---|
| `ensureHookForMeeting($remoteId)` | Registrer (eller bekreft) en hook per møte etter at en bruker har blitt med |
| `ensureGlobalWebhook()` | Registrer én global hook som dekker alle møter |
| `cleanupWebhooks($meetingId)` | Slett Chamilo-registrerte hooks fra BBB-serveren |
| `BbbPlugin::checkWebhooksHealth()` | Valider at BBB-endepunktet `hooks/list` er tilgjengelig |

## Utvidelse til andre hendelseskilder

Det finnes foreløpig ikke noe generisk utgående webhook-system i Chamilo (dvs. ingen innebygd måte å POST-e til en ekstern URL når en bruker melder seg på eller fullfører et kurs). Hvis du trenger slik atferd, omfatter alternativene:

- Å skrive et plugin som lytter til Symfony-hendelser og sender HTTP-kall (se [Plugins](../plugins/README.md) og [Event System](../events.md)).
- Å bruke REST API til å polle etter tilstandsendringer fra et eksternt system.