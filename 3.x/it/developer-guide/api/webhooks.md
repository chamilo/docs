# Webhook

Il supporto webhook di Chamilo è attualmente circoscritto al **plugin BigBlueButton (BBB)**. Piuttosto che inviare webhook a sistemi esterni, Chamilo agisce come *ricevitore* di webhook: espone endpoint che BigBlueButton chiama quando si verificano eventi nelle stanze e utilizza tali eventi per costruire metriche di attività per partecipante.

## Come funziona

Quando si svolge una riunione BBB, il server BBB invia notifiche di eventi in tempo reale a un URL di callback firmato sull’installazione Chamilo. Chamilo elabora ciascun evento e memorizza metriche aggregate (tempo di parlato, tempo di telecamera, messaggi, reazioni, alzate di mano) nella tabella del database `conference_activity`.

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

## Endpoint

### Endpoint PHP legacy

```
POST /plugin/Bbb/webhook.php?au={accessUrlId}&mid={meetingId}&ts={timestamp}&sig={hmac}
```

Gestisce tutti gli eventi delle stanze BBB. Convalida la firma HMAC, quindi esegue l’upsert di una riga `ConferenceActivity` e aggiorna il campo JSON delle metriche.

### Endpoint Symfony moderno

```
POST /api/videoconference/callback
Headers:
  X-Chamilo-Timestamp: <unix timestamp>
  X-Chamilo-Signature: <hmac-sha256>
```

Definito tramite API Platform sull’entità `ConferenceActivity`. Richiede le intestazioni di firma per la registrazione dell’attività; le richieste senza una firma valida vengono accettate ma non viene scritta alcuna riga di attività.

## Configurazione (plugin BBB)

In **Amministrazione → Plugin → BigBlueButton** sono disponibili le seguenti impostazioni webhook:

| Impostazione | Valori | Descrizione |
|---|---|---|
| `webhooks_enabled` | `true` / `false` | Abilita o disabilita la registrazione dei webhook |
| `webhooks_scope` | `per_meeting` / `global` | Registra un hook per riunione oppure un unico hook globale per tutte le riunioni |
| `webhooks_hash_algo` | `sha256` / `sha1` | Algoritmo HMAC per la verifica della firma |
| `webhooks_event_filter` | stringa separata da virgole | Elenco opzionale dei nomi di eventi BBB da ricevere (vuoto = tutti gli eventi) |

Quando viene creata una riunione e i webhook sono abilitati, Chamilo chiama l’API BBB `hooks/create` per registrare l’URL di callback. L’URL include una firma HMAC con validità temporale.

## Validazione della firma

L’endpoint legacy utilizza parametri nella query string:

```
sig = HMAC-{algo}("{accessUrlId}|{meetingId}|{timestamp}", salt)
```

- Il `salt` è il valore salt configurato nel plugin BBB.
- Le richieste più vecchie di **15 minuti** vengono rifiutate per limitare gli attacchi di replay.

L’endpoint moderno utilizza le intestazioni:

```
sig = HMAC-SHA256("{timestamp}\n{rawBody}", kernelSecret)
```

- Le richieste più vecchie di **5 minuti** vengono rifiutate.

## Esempio: evento webhook BigBlueButton

BBB invia un corpo JSON contenente un array di eventi. Ogni evento ha un `data.id` (nome dell’evento) e un oggetto `data.attributes`.

**Richiesta da BBB:**

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

**Cosa fa Chamilo:**

1. Convalida la firma HMAC e il timestamp.
2. Cerca il `ConferenceMeeting` tramite `remote_id`.
3. Cerca (o crea) una riga `ConferenceActivity` aperta per quella riunione + utente.
4. Registra `temp.talk_started_at = 1715520123` nel JSON delle metriche.

Quando arriva l’evento corrispondente `user-talking-stopped`, Chamilo calcola i secondi trascorsi e li aggiunge a `totals.talk_seconds`.

## Eventi tracciati e metriche

| Evento/i BBB | Metrica aggiornata |
|---|---|
| `user-joined` / `participantjoined` | Riga di attività creata |
| `user-talking-started` / `uservoiceactivated` | Timer avviato per `totals.talk_seconds` |
| `user-talking-stopped` / `uservoicedeactivated` | `totals.talk_seconds` incrementato |
| `camera-share-started` / `webcamsharestarted` | Timer avviato per `totals.camera_seconds` |
| `camera-share-stopped` / `webcamsharestopped` | `totals.camera_seconds` incrementato |
| `chat-message-posted` / `publicchatmessageposted` | `counts.messages` incrementato |
| `user-reaction-changed` / `useremojichanged` | `counts.reactions` + dettaglio per emoji |
| `user-hand-raised` / `userraisedhand` | `counts.hands` incrementato |
| `user-left` / `participantleft` | Timer aperti scaricati, riga di attività chiusa |

## Struttura dei Dati delle Metriche

Le metriche sono memorizzate come colonna JSON su `ConferenceActivity`:

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

I campi `temp` contengono i timestamp di avvio dei timer in corso; vengono azzerati quando arriva l'evento di stop corrispondente o quando il partecipante lascia la sessione.

## Dashboard dei Webhook

È disponibile una dashboard di amministrazione all'indirizzo `/plugin/Bbb/webhook_dashboard.php`. Mostra metriche in tempo reale e storiche per ciascun partecipante di una determinata riunione: tempo di connessione, tempo di parlato, tempo di telecamera, numero di messaggi, numero di reazioni e alzate di mano. I dati possono essere esportati in CSV.

## Registrazione e Pulizia degli Hook

La classe `BbbLib` fornisce metodi per gestire la registrazione degli hook sul server BBB:

| Method | Description |
|---|---|
| `ensureHookForMeeting($remoteId)` | Register (or confirm) a per-meeting hook after a user joins |
| `ensureGlobalWebhook()` | Register a single global hook covering all meetings |
| `cleanupWebhooks($meetingId)` | Delete Chamilo-registered hooks from the BBB server |
| `BbbPlugin::checkWebhooksHealth()` | Validate that the BBB `hooks/list` endpoint is reachable |

## Estensione ad Altre Fonti di Eventi

Al momento in Chamilo non esiste un sistema generico di webhook in uscita (ossia, non c'è un modo integrato per inviare un POST a un URL esterno quando un utente si iscrive o completa un corso). Se serve questo comportamento, le opzioni includono:

- Scrivere un plugin che ascolti gli eventi Symfony e invii chiamate HTTP (vedere [Plugin](../plugins/README.md) e [Sistema di eventi](../events.md)).
- Utilizzare l'API REST per interrogare periodicamente i cambiamenti di stato da un sistema esterno.