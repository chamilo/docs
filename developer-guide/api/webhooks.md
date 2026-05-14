# Webhooks

Il supporto ai webhook di Chamilo è attualmente limitato al **plugin BigBlueButton (BBB)**. Invece di inviare webhook a sistemi esterni, Chamilo funge da *ricevitore* di webhook: espone endpoint che BigBlueButton chiama quando si verificano eventi nelle stanze, e utilizza questi eventi per costruire metriche di attività per partecipante.

## Come Funziona

Quando si svolge una riunione BBB, il server BBB invia notifiche di eventi in tempo reale a un URL di callback firmato sulla tua installazione di Chamilo. Chamilo elabora ogni evento e memorizza metriche aggregate (tempo di parola, tempo di utilizzo della telecamera, messaggi, reazioni, alzate di mano) nella tabella del database `conference_activity`.

```
Server BigBlueButton
        │  POST (firmato)
        ▼
Endpoint webhook di Chamilo
        │
        ▼
conference_activity (JSON delle metriche)
        │
        ▼
Dashboard dei webhook (/plugin/Bbb/webhook_dashboard.php)
```

## Endpoint

### Endpoint PHP legacy

```
POST /plugin/Bbb/webhook.php?au={accessUrlId}&mid={meetingId}&ts={timestamp}&sig={hmac}
```

Gestisce tutti gli eventi delle stanze BBB. Valida la firma HMAC, quindi aggiorna o inserisce una riga `ConferenceActivity` e aggiorna il campo JSON delle metriche.

### Endpoint Symfony moderno

```
POST /api/videoconference/callback
Headers:
  X-Chamilo-Timestamp: <unix timestamp>
  X-Chamilo-Signature: <hmac-sha256>
```

Definito tramite API Platform sull'entità `ConferenceActivity`. Richiede gli header di firma per la registrazione dell'attività; le richieste senza una firma valida vengono accettate ma non viene scritta alcuna riga di attività.

## Configurazione (Plugin BBB)

In **Amministrazione → Plugin → BigBlueButton**, sono disponibili le seguenti impostazioni per i webhook:

| Impostazione | Valori | Descrizione |
|---|---|---|
| `webhooks_enabled` | `true` / `false` | Abilita o disabilita la registrazione dei webhook |
| `webhooks_scope` | `per_meeting` / `global` | Registra un hook per ogni riunione o un unico hook globale per tutte le riunioni |
| `webhooks_hash_algo` | `sha256` / `sha1` | Algoritmo HMAC per la verifica della firma |
| `webhooks_event_filter` | stringa separata da virgole | Elenco opzionale di nomi di eventi BBB da ricevere (vuoto = tutti gli eventi) |

Quando viene creata una riunione e i webhook sono abilitati, Chamilo chiama l'API BBB `hooks/create` per registrare l'URL di callback. L'URL include una firma HMAC con limite temporale.

## Validazione della Firma

L'endpoint legacy utilizza parametri nella stringa di query:

```
sig = HMAC-{algo}("{accessUrlId}|{meetingId}|{timestamp}", salt)
```

- Il `salt` è il valore di salt configurato nel plugin BBB.
- Le richieste più vecchie di **15 minuti** vengono rifiutate per limitare gli attacchi di tipo replay.

L'endpoint moderno utilizza gli header:

```
sig = HMAC-SHA256("{timestamp}\n{rawBody}", kernelSecret)
```

- Le richieste più vecchie di **5 minuti** vengono rifiutate.

## Esempio: Evento Webhook di BigBlueButton

BBB invia un corpo JSON contenente un array di eventi. Ogni evento ha un `data.id` (nome dell'evento) e un oggetto `data.attributes`.

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

1. Valida la firma HMAC e il timestamp.
2. Cerca il `ConferenceMeeting` tramite `remote_id`.
3. Cerca (o crea) una riga aperta di `ConferenceActivity` per quella riunione e quell'utente.
4. Registra `temp.talk_started_at = 1715520123` nel JSON delle metriche.

Quando arriva l'evento corrispondente `user-talking-stopped`, Chamilo calcola i secondi trascorsi e li aggiunge a `totals.talk_seconds`.

## Eventi Tracciati e Metriche

| Evento(i) BBB | Metrica aggiornata |
|---|---|
| `user-joined` / `participantjoined` | Riga di attività creata |
| `user-talking-started` / `uservoiceactivated` | Timer avviato per `totals.talk_seconds` |
| `user-talking-stopped` / `uservoicedeactivated` | `totals.talk_seconds` incrementato |
| `camera-share-started` / `webcamsharestarted` | Timer avviato per `totals.camera_seconds` |
| `camera-share-stopped` / `webcamsharestopped` | `totals.camera_seconds` incrementato |
| `chat-message-posted` / `publicchatmessageposted` | `counts.messages` incrementato |
| `user-reaction-changed` / `useremojichanged` | `counts.reactions` + suddivisione per emoji |
| `user-hand-raised` / `userraisedhand` | `counts.hands` incrementato |
| `user-left` / `participantleft` | Timer aperti svuotati, riga di attività chiusa |

## Struttura dei Dati delle Metriche

Le metriche sono memorizzate come una colonna JSON in `ConferenceActivity`:

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

I campi `temp` contengono i timestamp di inizio dei timer in corso; vengono cancellati quando arriva l'evento di stop corrispondente o quando il partecipante lascia la sessione.

## Dashboard dei Webhook

Un dashboard per amministratori è disponibile all'indirizzo `/plugin/Bbb/webhook_dashboard.php`. Mostra metriche in tempo reale e storiche per partecipante per una determinata riunione: tempo di connessione, tempo di parola, tempo di utilizzo della telecamera, conteggio dei messaggi, conteggio delle reazioni e alzate di mano. I dati possono essere esportati in formato CSV.

## Registrazione e Pulizia degli Hook

La classe `BbbLib` fornisce metodi per gestire la registrazione degli hook sul server BBB:

| Metodo | Descrizione |
|---|---|
| `ensureHookForMeeting($remoteId)` | Registra (o conferma) un hook per riunione dopo che un utente si è unito |
| `ensureGlobalWebhook()` | Registra un unico hook globale che copre tutte le riunioni |
| `cleanupWebhooks($meetingId)` | Elimina gli hook registrati da Chamilo dal server BBB |
| `BbbPlugin::checkWebhooksHealth()` | Verifica che l'endpoint `hooks/list` di BBB sia raggiungibile |

## Estensione ad Altre Fonti di Eventi

Attualmente non esiste un sistema generico di webhook in uscita in Chamilo (cioè, non c'è un modo integrato per fare un POST a un URL esterno quando un utente si iscrive o completa un corso). Se hai bisogno di questo comportamento, le opzioni includono:

- Scrivere un plugin che ascolti gli eventi di Symfony e invii chiamate HTTP (vedi [Plugins](../plugins/README.md) e [Sistema di Eventi](../events.md)).
- Utilizzare l'API REST per interrogare i cambiamenti di stato da un sistema esterno.