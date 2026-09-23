# Webhooks

Chamilon webhook-tuki on tällä hetkellä rajattu **BigBlueButton (BBB) -lisäosaan**. Sen sijaan, että Chamilo lähettäisi webhookeja ulkoisiin järjestelmiin, se toimii webhookien *vastaanottajana*: se tarjoaa päätepisteitä, joita BigBlueButton kutsuu huonetapahtumien yhteydessä, ja käyttää näitä tapahtumia osallistujakohtaisten aktiviteettimittareiden muodostamiseen.

## How It Works

Kun BBB-kokous pidetään, BBB-palvelin lähettää reaaliaikaisia tapahtumailmoituksia allekirjoitettuun takaisinkutsu-URL-osoitteeseen Chamilo-asennuksessasi. Chamilo käsittelee kunkin tapahtuman ja tallentaa aggregoidut mittarit (puheaika, kamera-aika, viestit, reaktiot, kädennostot) `conference_activity`-tietokantatauluun.

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

Käsittelee kaikki BBB-huonetapahtumat. Vahvistaa HMAC-allekirjoituksen, sen jälkeen tekee upsertin `ConferenceActivity`-riville ja päivittää mittareiden JSON-kentän.

### Modern Symfony endpoint

```
POST /api/videoconference/callback
Headers:
  X-Chamilo-Timestamp: <unix timestamp>
  X-Chamilo-Signature: <hmac-sha256>
```

Määritelty API Platformin kautta `ConferenceActivity`-entiteetille. Aktiviteetin tallentaminen edellyttää allekirjoitusotsikoita; pyynnöt ilman kelvollista allekirjoitusta hyväksytään, mutta aktiviteettiriviä ei kirjoiteta.

## Configuration (BBB Plugin)

Kohdassa **Hallinta → Lisäosat → BigBlueButton** ovat käytettävissä seuraavat webhook-asetukset:

| Setting | Values | Description |
|---|---|---|
| `webhooks_enabled` | `true` / `false` | Ota webhook-rekisteröinti käyttöön tai poista se käytöstä |
| `webhooks_scope` | `per_meeting` / `global` | Rekisteröi yksi koukku kokousta kohden tai yksi globaali koukku kaikille kokouksille |
| `webhooks_hash_algo` | `sha256` / `sha1` | HMAC-algoritmi allekirjoituksen tarkistukseen |
| `webhooks_event_filter` | comma-separated string | Valinnainen luettelo vastaanotettavista BBB-tapahtumien nimistä (tyhjä = kaikki tapahtumat) |

Kun kokous luodaan ja webhookit ovat käytössä, Chamilo kutsuu BBB:n `hooks/create`-rajapintaa rekisteröidäkseen takaisinkutsu-URL-osoitteen. URL sisältää aikarajoitetun HMAC-allekirjoituksen.

## Signature Validation

Vanha päätepiste käyttää kyselymerkkijonon parametreja:

```
sig = HMAC-{algo}("{accessUrlId}|{meetingId}|{timestamp}", salt)
```

- `salt` on BBB-lisäosan määritetty suola-arvo.
- Yli **15 minuuttia** vanhat pyynnöt hylätään uudelleentoistohyökkäysten rajoittamiseksi.

Moderni päätepiste käyttää otsikoita:

```
sig = HMAC-SHA256("{timestamp}\n{rawBody}", kernelSecret)
```

- Yli **5 minuuttia** vanhat pyynnöt hylätään.

## Example: BigBlueButton Webhook Event

BBB lähettää JSON-rungon, joka sisältää tapahtumataulukon. Jokaisella tapahtumalla on `data.id` (tapahtuman nimi) ja `data.attributes`-objekti.

**Pyyntö BBB:ltä:**

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

**Mitä Chamilo tekee:**

1. Vahvistaa HMAC-allekirjoituksen ja aikaleiman.
2. Hakee `ConferenceMeeting`-tietueen `remote_id`-kentän perusteella.
3. Hakee (tai luo) avoimen `ConferenceActivity`-rivin kyseiselle kokoukselle ja käyttäjälle.
4. Tallentaa `temp.talk_started_at = 1715520123` mittareiden JSON-kenttään.

Kun vastaava `user-talking-stopped`-tapahtuma saapuu, Chamilo laskee kuluneet sekunnit ja lisää ne kenttään `totals.talk_seconds`.

## Tracked Events and Metrics

| BBB event(s) | Metric updated |
|---|---|
| `user-joined` / `participantjoined` | Aktiviteettirivi luodaan |
| `user-talking-started` / `uservoiceactivated` | Ajastin käynnistetään kentälle `totals.talk_seconds` |
| `user-talking-stopped` / `uservoicedeactivated` | `totals.talk_seconds` kasvatetaan |
| `camera-share-started` / `webcamsharestarted` | Ajastin käynnistetään kentälle `totals.camera_seconds` |
| `camera-share-stopped` / `webcamsharestopped` | `totals.camera_seconds` kasvatetaan |
| `chat-message-posted` / `publicchatmessageposted` | `counts.messages` kasvatetaan |
| `user-reaction-changed` / `useremojichanged` | `counts.reactions` + emoji-kohtainen erittely |
| `user-hand-raised` / `userraisedhand` | `counts.hands` kasvatetaan |
| `user-left` / `participantleft` | Avoimet ajastimet tyhjennetään, aktiviteettirivi suljetaan |

## Mittareiden tietorakenne

Mittarit tallennetaan JSON-sarakkeena tauluun `ConferenceActivity`:

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

Kentät `temp` sisältävät käynnissä olevien ajastimien alkuaikaleimoja; ne tyhjennetään, kun vastaava pysäytystapahtuma saapuu tai kun osallistuja poistuu.

## Webhook-hallintapaneeli

Ylläpitäjän hallintapaneeli on saatavilla osoitteessa `/plugin/Bbb/webhook_dashboard.php`. Se näyttää reaaliaikaiset ja historialliset mittarit osallistujittain tietylle kokoukselle: yhteysaika, puheaika, kamera-aika, viestien määrä, reaktioiden määrä ja kädennostot. Tiedot voidaan viedä CSV-muodossa.

## Hookien rekisteröinti ja siivous

Luokka `BbbLib` tarjoaa metodit hookien hallintaan BBB-palvelimella:

| Metodi | Kuvaus |
|---|---|
| `ensureHookForMeeting($remoteId)` | Rekisteröi (tai vahvista) kokouskohtainen hook sen jälkeen, kun käyttäjä liittyy |
| `ensureGlobalWebhook()` | Rekisteröi yksi globaali hook, joka kattaa kaikki kokoukset |
| `cleanupWebhooks($meetingId)` | Poista Chamiloon rekisteröidyt hookit BBB-palvelimelta |
| `BbbPlugin::checkWebhooksHealth()` | Varmista, että BBB:n päätepiste `hooks/list` on saavutettavissa |

## Laajentaminen muihin tapahtumalähteisiin

Chamilossa ei tällä hetkellä ole yleistä lähtevää webhook-järjestelmää (eli sisäänrakennettua tapaa lähettää POST ulkoiseen URL-osoitteeseen, kun käyttäjä ilmoittautuu kurssille tai suorittaa sen). Jos tarvitset tällaista toimintaa, vaihtoehtoja ovat:

- Pluginin kirjoittaminen, joka kuuntelee Symfony-tapahtumia ja lähettää HTTP-kutsuja (ks. [Plugins](../plugins/README.md) ja [Event System](../events.md)).
- REST API:n käyttäminen tilamuutosten kyselyyn ulkoisesta järjestelmästä.