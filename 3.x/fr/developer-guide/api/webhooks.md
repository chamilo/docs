# Webhooks

La prise en charge des webhooks dans Chamilo est actuellement limitée au **plugin BigBlueButton (BBB)**. Plutôt que d’envoyer des webhooks vers des systèmes externes, Chamilo agit comme *récepteur* de webhooks : il expose des points de terminaison que BigBlueButton appelle lorsque des événements de salle se produisent, et utilise ces événements pour construire des métriques d’activité par participant.

## How It Works

Lorsqu’une réunion BBB a lieu, le serveur BBB envoie des notifications d’événements en temps réel vers une URL de rappel signée sur votre installation Chamilo. Chamilo traite chaque événement et stocke des métriques agrégées (temps de parole, temps caméra, messages, réactions, levées de main) dans la table de base de données `conference_activity`.

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

Traite tous les événements de salle BBB. Valide la signature HMAC, puis insère ou met à jour une ligne `ConferenceActivity` et actualise le champ JSON des métriques.

### Modern Symfony endpoint

```
POST /api/videoconference/callback
Headers:
  X-Chamilo-Timestamp: <unix timestamp>
  X-Chamilo-Signature: <hmac-sha256>
```

Défini via API Platform sur l’entité `ConferenceActivity`. Les en-têtes de signature sont requis pour l’enregistrement de l’activité ; les requêtes sans signature valide sont acceptées mais aucune ligne d’activité n’est écrite.

## Configuration (BBB Plugin)

Dans **Administration → Plugins → BigBlueButton**, les paramètres de webhook suivants sont disponibles :

| Setting | Values | Description |
|---|---|---|
| `webhooks_enabled` | `true` / `false` | Activer ou désactiver l’enregistrement des webhooks |
| `webhooks_scope` | `per_meeting` / `global` | Enregistrer un hook par réunion ou un hook global unique pour toutes les réunions |
| `webhooks_hash_algo` | `sha256` / `sha1` | Algorithme HMAC pour la vérification de signature |
| `webhooks_event_filter` | comma-separated string | Liste facultative de noms d’événements BBB à recevoir (vide = tous les événements) |

Lorsqu’une réunion est créée et que les webhooks sont activés, Chamilo appelle l’API BBB `hooks/create` pour enregistrer l’URL de rappel. L’URL inclut une signature HMAC limitée dans le temps.

## Signature Validation

Le point de terminaison historique utilise des paramètres de chaîne de requête :

```
sig = HMAC-{algo}("{accessUrlId}|{meetingId}|{timestamp}", salt)
```

- Le `salt` est la valeur de sel configurée du plugin BBB.
- Les requêtes datant de plus de **15 minutes** sont rejetées afin de limiter les attaques par rejeu.

Le point de terminaison moderne utilise des en-têtes :

```
sig = HMAC-SHA256("{timestamp}\n{rawBody}", kernelSecret)
```

- Les requêtes datant de plus de **5 minutes** sont rejetées.

## Example: BigBlueButton Webhook Event

BBB envoie un corps JSON contenant un tableau d’événements. Chaque événement possède un `data.id` (nom de l’événement) et un objet `data.attributes`.

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

1. Valide la signature HMAC et l’horodatage.
2. Recherche le `ConferenceMeeting` par `remote_id`.
3. Recherche (ou crée) une ligne `ConferenceActivity` ouverte pour cette réunion et cet utilisateur.
4. Enregistre `temp.talk_started_at = 1715520123` dans le JSON des métriques.

Lorsque l’événement correspondant `user-talking-stopped` arrive, Chamilo calcule les secondes écoulées et les ajoute à `totals.talk_seconds`.

## Tracked Events and Metrics

| BBB event(s) | Metric updated |
|---|---|
| `user-joined` / `participantjoined` | Ligne d’activité créée |
| `user-talking-started` / `uservoiceactivated` | Minuteur démarré pour `totals.talk_seconds` |
| `user-talking-stopped` / `uservoicedeactivated` | `totals.talk_seconds` incrémenté |
| `camera-share-started` / `webcamsharestarted` | Minuteur démarré pour `totals.camera_seconds` |
| `camera-share-stopped` / `webcamsharestopped` | `totals.camera_seconds` incrémenté |
| `chat-message-posted` / `publicchatmessageposted` | `counts.messages` incrémenté |
| `user-reaction-changed` / `useremojichanged` | `counts.reactions` + ventilation par emoji |
| `user-hand-raised` / `userraisedhand` | `counts.hands` incrémenté |
| `user-left` / `participantleft` | Minuteurs ouverts vidés, ligne d’activité fermée |

## Structure des données de métriques

Les métriques sont stockées dans une colonne JSON sur `ConferenceActivity` :

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

Les champs `temp` contiennent les horodatages de début des minuteries en cours ; ils sont effacés lorsque l’événement d’arrêt correspondant arrive ou lorsque le participant quitte.

## Tableau de bord des webhooks

Un tableau de bord d’administration est disponible à `/plugin/Bbb/webhook_dashboard.php`. Il affiche des métriques en temps réel et historiques par participant pour une réunion donnée : temps de connexion, temps de parole, temps caméra, nombre de messages, nombre de réactions et levées de main. Les données peuvent être exportées au format CSV.

## Enregistrement et nettoyage des hooks

La classe `BbbLib` fournit des méthodes pour gérer l’enregistrement des hooks sur le serveur BBB :

| Method | Description |
|---|---|
| `ensureHookForMeeting($remoteId)` | Register (or confirm) a per-meeting hook after a user joins |
| `ensureGlobalWebhook()` | Register a single global hook covering all meetings |
| `cleanupWebhooks($meetingId)` | Delete Chamilo-registered hooks from the BBB server |
| `BbbPlugin::checkWebhooksHealth()` | Validate that the BBB `hooks/list` endpoint is reachable |

## Extension à d’autres sources d’événements

Il n’existe actuellement aucun système générique de webhooks sortants dans Chamilo (c’est-à-dire aucun moyen intégré d’effectuer un POST vers une URL externe lorsqu’un utilisateur s’inscrit ou termine un cours). Si vous avez besoin de ce comportement, les options comprennent :

- Écrire un plugin qui écoute les événements Symfony et déclenche des appels HTTP (voir [Plugins](../plugins/README.md) et [Système d’événements](../events.md)).
- Utiliser l’API REST pour interroger les changements d’état depuis un système externe.