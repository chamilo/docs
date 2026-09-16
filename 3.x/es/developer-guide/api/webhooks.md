# Webhooks

El soporte de webhooks de Chamilo está actualmente limitado al **plugin BigBlueButton (BBB)**. En lugar de enviar webhooks a sistemas externos, Chamilo actúa como *receptor* de webhooks: expone endpoints que BigBlueButton invoca cuando ocurren eventos de sala, y utiliza esos eventos para construir métricas de actividad por participante.

## How It Works

Cuando tiene lugar una reunión BBB, el servidor BBB envía notificaciones de eventos en tiempo real a una URL de callback firmada en su instalación de Chamilo. Chamilo procesa cada evento y almacena métricas agregadas (tiempo de habla, tiempo de cámara, mensajes, reacciones, levantamiento de mano) en la tabla de base de datos `conference_activity`.

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

Gestiona todos los eventos de sala BBB. Valida la firma HMAC, luego realiza un upsert de una fila `ConferenceActivity` y actualiza el campo JSON de métricas.

### Modern Symfony endpoint

```
POST /api/videoconference/callback
Headers:
  X-Chamilo-Timestamp: <unix timestamp>
  X-Chamilo-Signature: <hmac-sha256>
```

Definido mediante API Platform en la entidad `ConferenceActivity`. Requiere las cabeceras de firma para el registro de actividad; las peticiones sin una firma válida se aceptan, pero no se escribe ninguna fila de actividad.

## Configuration (BBB Plugin)

En **Administración → Plugins → BigBlueButton**, están disponibles los siguientes ajustes de webhook:

| Setting | Values | Description |
|---|---|---|
| `webhooks_enabled` | `true` / `false` | Activar o desactivar el registro de webhooks |
| `webhooks_scope` | `per_meeting` / `global` | Registrar un hook por reunión o un único hook global para todas las reuniones |
| `webhooks_hash_algo` | `sha256` / `sha1` | Algoritmo HMAC para la verificación de firma |
| `webhooks_event_filter` | comma-separated string | Lista opcional de nombres de eventos BBB a recibir (vacío = todos los eventos) |

Cuando se crea una reunión y los webhooks están habilitados, Chamilo llama a la API `hooks/create` de BBB para registrar la URL de callback. La URL incluye una firma HMAC con vigencia temporal.

## Signature Validation

El endpoint heredado utiliza parámetros de query-string:

```
sig = HMAC-{algo}("{accessUrlId}|{meetingId}|{timestamp}", salt)
```

- El `salt` es el valor de salt configurado del plugin BBB.
- Las peticiones con más de **15 minutos** de antigüedad se rechazan para limitar los ataques de repetición.

El endpoint moderno utiliza cabeceras:

```
sig = HMAC-SHA256("{timestamp}\n{rawBody}", kernelSecret)
```

- Las peticiones con más de **5 minutos** de antigüedad se rechazan.

## Example: BigBlueButton Webhook Event

BBB envía un cuerpo JSON que contiene un array de eventos. Cada evento tiene un `data.id` (nombre del evento) y un objeto `data.attributes`.

**Petición desde BBB:**

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

**Qué hace Chamilo:**

1. Valida la firma HMAC y la marca de tiempo.
2. Busca el `ConferenceMeeting` por `remote_id`.
3. Busca (o crea) una fila abierta `ConferenceActivity` para esa reunión + usuario.
4. Registra `temp.talk_started_at = 1715520123` en el JSON de métricas.

Cuando llega el evento coincidente `user-talking-stopped`, Chamilo calcula los segundos transcurridos y los suma a `totals.talk_seconds`.

## Tracked Events and Metrics

| BBB event(s) | Metric updated |
|---|---|
| `user-joined` / `participantjoined` | Se crea la fila de actividad |
| `user-talking-started` / `uservoiceactivated` | Se inicia el temporizador para `totals.talk_seconds` |
| `user-talking-stopped` / `uservoicedeactivated` | Se incrementa `totals.talk_seconds` |
| `camera-share-started` / `webcamsharestarted` | Se inicia el temporizador para `totals.camera_seconds` |
| `camera-share-stopped` / `webcamsharestopped` | Se incrementa `totals.camera_seconds` |
| `chat-message-posted` / `publicchatmessageposted` | Se incrementa `counts.messages` |
| `user-reaction-changed` / `useremojichanged` | `counts.reactions` + desglose por emoji |
| `user-hand-raised` / `userraisedhand` | Se incrementa `counts.hands` |
| `user-left` / `participantleft` | Se vacían los temporizadores abiertos y se cierra la fila de actividad |

## Estructura de datos de métricas

Las métricas se almacenan como una columna JSON en `ConferenceActivity`:

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

Los campos `temp` contienen las marcas de tiempo de inicio de los temporizadores en curso; se borran cuando llega el evento de parada correspondiente o cuando el participante abandona la sesión.

## Panel de webhooks

Hay un panel de administración disponible en `/plugin/Bbb/webhook_dashboard.php`. Muestra métricas en tiempo real e históricas por participante para una reunión determinada: tiempo de conexión, tiempo de habla, tiempo de cámara, recuento de mensajes, recuento de reacciones y manos levantadas. Los datos pueden exportarse como CSV.

## Registro y limpieza de hooks

La clase `BbbLib` proporciona métodos para gestionar el registro de hooks en el servidor BBB:

| Method | Description |
|---|---|
| `ensureHookForMeeting($remoteId)` | Register (or confirm) a per-meeting hook after a user joins |
| `ensureGlobalWebhook()` | Register a single global hook covering all meetings |
| `cleanupWebhooks($meetingId)` | Delete Chamilo-registered hooks from the BBB server |
| `BbbPlugin::checkWebhooksHealth()` | Validate that the BBB `hooks/list` endpoint is reachable |

## Extensión a otras fuentes de eventos

Actualmente no existe en Chamilo un sistema genérico de webhooks de salida (es decir, no hay una forma integrada de hacer POST a una URL externa cuando un usuario se inscribe o completa un curso). Si necesita ese comportamiento, las opciones incluyen:

- Escribir un plugin que escuche eventos de Symfony y dispare llamadas HTTP (véase [Plugins](../plugins/README.md) y [Sistema de eventos](../events.md)).
- Usar la API REST para consultar cambios de estado desde un sistema externo.