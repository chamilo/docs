# Webhooks

Le support des webhooks dans Chamilo est actuellement limité au **plugin BigBlueButton (BBB)**. Plutôt que d'envoyer des webhooks à des systèmes externes, Chamilo agit en tant que *récepteur* de webhooks : il expose des points de terminaison que BigBlueButton appelle lorsque des événements de salle se produisent, et utilise ces événements pour construire des métriques d'activité par participant.

## Fonctionnement

Lorsqu'une réunion BBB a lieu, le serveur BBB envoie des notifications d'événements en temps réel à une URL de rappel signée sur votre installation Chamilo. Chamilo traite chaque événement et stocke des métriques agrégées (temps de parole, temps de caméra, messages, réactions, levers de main) dans la table de base de données `conference_activity`.

```
Serveur BigBlueButton
        │  POST (signé)
        ▼
Point de terminaison webhook Chamilo
        │
        ▼
conference_activity (métriques JSON)
        │
        ▼
Tableau de bord des webhooks (/plugin/Bbb/webhook_dashboard.php)
```

## Points de terminaison

### Point de terminaison PHP legacy

```
POST /plugin/Bbb/webhook.php?au={accessUrlId}&mid={meetingId}&ts={timestamp}&sig={hmac}
```

Gère tous les événements de salle BBB. Valide la signature HMAC, puis met à jour ou insère une ligne `ConferenceActivity` et actualise le champ JSON des métriques.

### Point de terminaison Symfony moderne

```
POST /api/videoconference/callback
Headers:
  X-Chamilo-Timestamp: <unix timestamp>
  X-Chamilo-Signature: <hmac-sha256>
```

Défini via API Platform sur l'entité `ConferenceActivity`. Nécessite les en-têtes de signature pour l'enregistrement d'activité ; les requêtes sans signature valide sont acceptées, mais aucune ligne d'activité n'est écrite.

## Configuration (Plugin BBB)

Dans **Administration → Plugins → BigBlueButton**, les paramètres de webhook suivants sont disponibles :

| Paramètre | Valeurs | Description |
|---|---|---|
| `webhooks_enabled` | `true` / `false` | Activer ou désactiver l'enregistrement des webhooks |
| `webhooks_scope` | `per_meeting` / `global` | Enregistrer un hook par réunion ou un hook global unique pour toutes les réunions |
| `webhooks_hash_algo` | `sha256` / `sha1` | Algorithme HMAC pour la vérification de la signature |
| `webhooks_event_filter` | chaîne séparée par des virgules | Liste optionnelle des noms d'événements BBB à recevoir (vide = tous les événements) |

Lorsqu'une réunion est créée et que les webhooks sont activés, Chamilo appelle l'API BBB `hooks/create` pour enregistrer l'URL de rappel. L'URL inclut une signature HMAC limitée dans le temps.

## Validation de la signature

Le point de terminaison legacy utilise des paramètres de chaîne de requête :

```
sig = HMAC-{algo}("{accessUrlId}|{meetingId}|{timestamp}", salt)
```

- Le `salt` est la valeur de sel configurée dans le plugin BBB.
- Les requêtes datant de plus de **15 minutes** sont rejetées pour limiter les attaques par rejeu.

Le point de terminaison moderne utilise des en-têtes :

```
sig = HMAC-SHA256("{timestamp}\n{rawBody}", kernelSecret)
```

- Les requêtes datant de plus de **5 minutes** sont rejetées.

## Exemple : Événement Webhook BigBlueButton

BBB envoie un corps JSON contenant un tableau d'événements. Chaque événement possède un `data.id` (nom de l'événement) et un objet `data.attributes`.

**Requête de BBB :**

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

**Ce que fait Chamilo :**

1. Valide la signature HMAC et l'horodatage.
2. Recherche le `ConferenceMeeting` par `remote_id`.
3. Recherche (ou crée) une ligne `ConferenceActivity` ouverte pour cette réunion et cet utilisateur.
4. Enregistre `temp.talk_started_at = 1715520123` dans le JSON des métriques.

Lorsque l'événement correspondant `user-talking-stopped` arrive, Chamilo calcule les secondes écoulées et les ajoute à `totals.talk_seconds`.

## Événements suivis et métriques

| Événement(s) BBB | Métrique mise à jour |
|---|---|
| `user-joined` / `participantjoined` | Ligne d'activité créée |
| `user-talking-started` / `uservoiceactivated` | Minuteur démarré pour `totals.talk_seconds` |
| `user-talking-stopped` / `uservoicedeactivated` | `totals.talk_seconds` incrémenté |
| `camera-share-started` / `webcamsharestarted` | Minuteur démarré pour `totals.camera_seconds` |
| `camera-share-stopped` / `webcamsharestopped` | `totals.camera_seconds` incrémenté |
| `chat-message-posted` / `publicchatmessageposted` | `counts.messages` incrémenté |
| `user-reaction-changed` / `useremojichanged` | `counts.reactions` + répartition par emoji |
| `user-hand-raised` / `userraisedhand` | `counts.hands` incrémenté |
| `user-left` / `participantleft` | Minuteurs ouverts vidés, ligne d'activité fermée |

## Structure des données des métriques

Les métriques sont stockées sous forme de colonne JSON dans `ConferenceActivity` :

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

Les champs `temp` contiennent les horodatages de début des minuteurs en cours ; ils sont effacés lorsque l'événement d'arrêt correspondant arrive ou lorsque le participant quitte.

## Tableau de bord des webhooks

Un tableau de bord administrateur est disponible à l'adresse `/plugin/Bbb/webhook_dashboard.php`. Il affiche des métriques en temps réel et historiques par participant pour une réunion donnée : temps de connexion, temps de parole, temps de caméra, nombre de messages, nombre de réactions et levers de main. Les données peuvent être exportées au format CSV.

## Enregistrement et nettoyage des hooks

La classe `BbbLib` fournit des méthodes pour gérer l'enregistrement des hooks sur le serveur BBB :

| Méthode | Description |
|---|---|
| `ensureHookForMeeting($remoteId)` | Enregistrer (ou confirmer) un hook par réunion après qu'un utilisateur rejoint |
| `ensureGlobalWebhook()` | Enregistrer un hook global unique couvrant toutes les réunions |
| `cleanupWebhooks($meetingId)` | Supprimer les hooks enregistrés par Chamilo du serveur BBB |
| `BbbPlugin::checkWebhooksHealth()` | Valider que le point de terminaison BBB `hooks/list` est accessible |

## Extension à d'autres sources d'événements

Il n'existe actuellement aucun système de webhook sortant générique dans Chamilo (c'est-à-dire aucune méthode intégrée pour envoyer un POST à une URL externe lorsqu'un utilisateur s'inscrit ou termine un cours). Si vous avez besoin de ce comportement, les options incluent :

- Écrire un plugin qui écoute les événements Symfony et envoie des appels HTTP (voir [Plugins](../plugins/README.md) et [Système d'événements](../events.md)).
- Utiliser l'API REST pour interroger les changements d'état depuis un système externe.