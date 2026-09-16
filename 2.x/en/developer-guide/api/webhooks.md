# Webhooks

Chamilo's webhook support is currently scoped to the **BigBlueButton (BBB) plugin**. Rather than sending webhooks to external systems, Chamilo acts as a webhook *receiver*: it exposes endpoints that BigBlueButton calls when room events occur, and uses those events to build per-participant activity metrics.

## How It Works

When a BBB meeting takes place, the BBB server pushes real-time event notifications to a signed callback URL on your Chamilo installation. Chamilo processes each event and stores aggregated metrics (talk time, camera time, messages, reactions, hand raises) in the `conference_activity` database table.

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

Handles all BBB room events. Validates the HMAC signature, then upserts a `ConferenceActivity` row and updates the metrics JSON field.

### Modern Symfony endpoint

```
POST /api/videoconference/callback
Headers:
  X-Chamilo-Timestamp: <unix timestamp>
  X-Chamilo-Signature: <hmac-sha256>
```

Defined via API Platform on the `ConferenceActivity` entity. Requires the signature headers for activity recording; requests without a valid signature are accepted but no activity row is written.

## Configuration (BBB Plugin)

In **Administration → Plugins → BigBlueButton**, the following webhook settings are available:

| Setting | Values | Description |
|---|---|---|
| `webhooks_enabled` | `true` / `false` | Enable or disable webhook registration |
| `webhooks_scope` | `per_meeting` / `global` | Register one hook per meeting or a single global hook for all meetings |
| `webhooks_hash_algo` | `sha256` / `sha1` | HMAC algorithm for signature verification |
| `webhooks_event_filter` | comma-separated string | Optional list of BBB event names to receive (empty = all events) |

When a meeting is created and webhooks are enabled, Chamilo calls the BBB `hooks/create` API to register the callback URL. The URL includes a time-bound HMAC signature.

## Signature Validation

The legacy endpoint uses query-string parameters:

```
sig = HMAC-{algo}("{accessUrlId}|{meetingId}|{timestamp}", salt)
```

- The `salt` is the BBB plugin's configured salt value.
- Requests older than **15 minutes** are rejected to limit replay attacks.

The modern endpoint uses headers:

```
sig = HMAC-SHA256("{timestamp}\n{rawBody}", kernelSecret)
```

- Requests older than **5 minutes** are rejected.

## Example: BigBlueButton Webhook Event

BBB posts a JSON body containing an array of events. Each event has an `data.id` (event name) and a `data.attributes` object.

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

1. Validates the HMAC signature and timestamp.
2. Looks up the `ConferenceMeeting` by `remote_id`.
3. Looks up (or creates) an open `ConferenceActivity` row for that meeting + user.
4. Records `temp.talk_started_at = 1715520123` in the metrics JSON.

When the matching `user-talking-stopped` event arrives, Chamilo computes the elapsed seconds and adds them to `totals.talk_seconds`.

## Tracked Events and Metrics

| BBB event(s) | Metric updated |
|---|---|
| `user-joined` / `participantjoined` | Activity row created |
| `user-talking-started` / `uservoiceactivated` | Timer started for `totals.talk_seconds` |
| `user-talking-stopped` / `uservoicedeactivated` | `totals.talk_seconds` incremented |
| `camera-share-started` / `webcamsharestarted` | Timer started for `totals.camera_seconds` |
| `camera-share-stopped` / `webcamsharestopped` | `totals.camera_seconds` incremented |
| `chat-message-posted` / `publicchatmessageposted` | `counts.messages` incremented |
| `user-reaction-changed` / `useremojichanged` | `counts.reactions` + per-emoji breakdown |
| `user-hand-raised` / `userraisedhand` | `counts.hands` incremented |
| `user-left` / `participantleft` | Open timers flushed, activity row closed |

## Metrics Data Structure

Metrics are stored as a JSON column on `ConferenceActivity`:

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

The `temp` fields hold in-progress timer start timestamps; they are cleared when the corresponding stop event arrives or when the participant leaves.

## Webhook Dashboard

An admin dashboard is available at `/plugin/Bbb/webhook_dashboard.php`. It shows real-time and historical metrics per participant for a given meeting: connection time, talk time, camera time, message count, reaction count, and hand raises. Data can be exported as CSV.

## Registering and Cleaning Up Hooks

The `BbbLib` class provides methods for managing hook registration on the BBB server:

| Method | Description |
|---|---|
| `ensureHookForMeeting($remoteId)` | Register (or confirm) a per-meeting hook after a user joins |
| `ensureGlobalWebhook()` | Register a single global hook covering all meetings |
| `cleanupWebhooks($meetingId)` | Delete Chamilo-registered hooks from the BBB server |
| `BbbPlugin::checkWebhooksHealth()` | Validate that the BBB `hooks/list` endpoint is reachable |

## Extending to Other Event Sources

There is currently no generic outbound webhook system in Chamilo (i.e., no built-in way to POST to an external URL when a user enrolls or completes a course). If you need that behaviour, options include:

- Writing a plugin that listens to Symfony events and dispatches HTTP calls (see [Plugins](../plugins/README.md) and [Event System](../events.md)).
- Using the REST API to poll for state changes from an external system.
