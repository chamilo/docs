# Webhooks

El soporte de webhooks en Chamilo está actualmente limitado al **plugin BigBlueButton (BBB)**. En lugar de enviar webhooks a sistemas externos, Chamilo actúa como un *receptor* de webhooks: expone endpoints que BigBlueButton invoca cuando ocurren eventos en las salas, y utiliza esos eventos para construir métricas de actividad por participante.

## Cómo funciona

Cuando se lleva a cabo una reunión en BBB, el servidor de BBB envía notificaciones de eventos en tiempo real a una URL de callback firmada en tu instalación de Chamilo. Chamilo procesa cada evento y almacena métricas agregadas (tiempo de habla, tiempo de cámara, mensajes, reacciones, levantadas de mano) en la tabla de base de datos `conference_activity`.

```
Servidor BigBlueButton
        │  POST (firmado)
        ▼
Endpoint de webhook de Chamilo
        │
        ▼
conference_activity (métricas JSON)
        │
        ▼
Panel de control de webhooks (/plugin/Bbb/webhook_dashboard.php)
```

## Endpoints

### Endpoint PHP legado

```
POST /plugin/Bbb/webhook.php?au={accessUrlId}&mid={meetingId}&ts={timestamp}&sig={hmac}
```

Maneja todos los eventos de las salas de BBB. Valida la firma HMAC, luego inserta o actualiza una fila de `ConferenceActivity` y actualiza el campo JSON de métricas.

### Endpoint moderno de Symfony

```
POST /api/videoconference/callback
Headers:
  X-Chamilo-Timestamp: <unix timestamp>
  X-Chamilo-Signature: <hmac-sha256>
```

Definido a través de API Platform en la entidad `ConferenceActivity`. Requiere los encabezados de firma para el registro de actividad; las solicitudes sin una firma válida son aceptadas, pero no se escribe ninguna fila de actividad.

## Configuración (Plugin BBB)

En **Administración → Plugins → BigBlueButton**, están disponibles las siguientes configuraciones de webhooks:

| Configuración | Valores | Descripción |
|---|---|---|
| `webhooks_enabled` | `true` / `false` | Habilitar o deshabilitar el registro de webhooks |
| `webhooks_scope` | `per_meeting` / `global` | Registrar un hook por reunión o un único hook global para todas las reuniones |
| `webhooks_hash_algo` | `sha256` / `sha1` | Algoritmo HMAC para la verificación de firma |
| `webhooks_event_filter` | cadena separada por comas | Lista opcional de nombres de eventos de BBB a recibir (vacío = todos los eventos) |

Cuando se crea una reunión y los webhooks están habilitados, Chamilo invoca la API `hooks/create` de BBB para registrar la URL de callback. La URL incluye una firma HMAC limitada en el tiempo.

## Validación de firma

El endpoint legado utiliza parámetros de cadena de consulta:

```
sig = HMAC-{algo}("{accessUrlId}|{meetingId}|{timestamp}", salt)
```

- El `salt` es el valor de sal configurado en el plugin BBB.
- Las solicitudes con más de **15 minutos** de antigüedad son rechazadas para limitar ataques de repetición.

El endpoint moderno utiliza encabezados:

```
sig = HMAC-SHA256("{timestamp}\n{rawBody}", kernelSecret)
```

- Las solicitudes con más de **5 minutos** de antigüedad son rechazadas.

## Ejemplo: Evento de Webhook de BigBlueButton

BBB envía un cuerpo JSON que contiene un arreglo de eventos. Cada evento tiene un `data.id` (nombre del evento) y un objeto `data.attributes`.

**Solicitud desde BBB:**

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
3. Busca (o crea) una fila abierta de `ConferenceActivity` para esa reunión y usuario.
4. Registra `temp.talk_started_at = 1715520123` en el JSON de métricas.

Cuando llega el evento correspondiente `user-talking-stopped`, Chamilo calcula los segundos transcurridos y los suma a `totals.talk_seconds`.

## Eventos rastreados y métricas

| Evento(s) de BBB | Métrica actualizada |
|---|---|
| `user-joined` / `participantjoined` | Fila de actividad creada |
| `user-talking-started` / `uservoiceactivated` | Temporizador iniciado para `totals.talk_seconds` |
| `user-talking-stopped` / `uservoicedeactivated` | `totals.talk_seconds` incrementado |
| `camera-share-started` / `webcamsharestarted` | Temporizador iniciado para `totals.camera_seconds` |
| `camera-share-stopped` / `webcamsharestopped` | `totals.camera_seconds` incrementado |
| `chat-message-posted` / `publicchatmessageposted` | `counts.messages` incrementado |
| `user-reaction-changed` / `useremojichanged` | `counts.reactions` + desglose por emoji |
| `user-hand-raised` / `userraisedhand` | `counts.hands` incrementado |
| `user-left` / `participantleft` | Temporizadores abiertos vaciados, fila de actividad cerrada |

---
## Estructura de Datos de Métricas

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

Los campos `temp` contienen marcas de tiempo de inicio de temporizadores en curso; se borran cuando llega el evento de parada correspondiente o cuando el participante abandona la sesión.

## Panel de Control de Webhooks

Un panel de control para administradores está disponible en `/plugin/Bbb/webhook_dashboard.php`. Muestra métricas en tiempo real e históricas por participante para una reunión específica: tiempo de conexión, tiempo de habla, tiempo de cámara, cantidad de mensajes, cantidad de reacciones y levantadas de mano. Los datos pueden exportarse como CSV.

## Registro y Limpieza de Hooks

La clase `BbbLib` proporciona métodos para gestionar el registro de hooks en el servidor BBB:

| Método | Descripción |
|---|---|
| `ensureHookForMeeting($remoteId)` | Registra (o confirma) un hook por reunión después de que un usuario se une |
| `ensureGlobalWebhook()` | Registra un único hook global que cubre todas las reuniones |
| `cleanupWebhooks($meetingId)` | Elimina los hooks registrados por Chamilo del servidor BBB |
| `BbbPlugin::checkWebhooksHealth()` | Valida que el endpoint `hooks/list` de BBB sea accesible |

## Ampliación a Otras Fuentes de Eventos

Actualmente, no existe un sistema genérico de webhooks salientes en Chamilo (es decir, no hay una forma integrada de realizar un POST a una URL externa cuando un usuario se inscribe o completa un curso). Si necesitas ese comportamiento, las opciones incluyen:

- Escribir un plugin que escuche eventos de Symfony y despache llamadas HTTP (consulta [Plugins](../plugins/README.md) y [Sistema de Eventos](../events.md)).
- Usar la API REST para sondear cambios de estado desde un sistema externo.