# Webhooks

O suporte a webhooks do Chamilo está atualmente limitado ao **plugin BigBlueButton (BBB)**. Em vez de enviar webhooks para sistemas externos, o Chamilo atua como *recetor* de webhooks: expõe endpoints que o BigBlueButton invoca quando ocorrem eventos de sala e utiliza esses eventos para construir métricas de atividade por participante.

## How It Works

Quando uma reunião BBB tem lugar, o servidor BBB envia notificações de eventos em tempo real para um URL de callback assinado na sua instalação Chamilo. O Chamilo processa cada evento e armazena métricas agregadas (tempo de fala, tempo de câmara, mensagens, reações, mãos levantadas) na tabela de base de dados `conference_activity`.

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

Trata todos os eventos de sala BBB. Valida a assinatura HMAC, depois faz upsert de uma linha `ConferenceActivity` e atualiza o campo JSON de métricas.

### Modern Symfony endpoint

```
POST /api/videoconference/callback
Headers:
  X-Chamilo-Timestamp: <unix timestamp>
  X-Chamilo-Signature: <hmac-sha256>
```

Definido via API Platform na entidade `ConferenceActivity`. Exige os cabeçalhos de assinatura para o registo de atividade; pedidos sem uma assinatura válida são aceites, mas nenhuma linha de atividade é escrita.

## Configuration (BBB Plugin)

Em **Administração → Plugins → BigBlueButton**, estão disponíveis as seguintes definições de webhook:

| Setting | Values | Description |
|---|---|---|
| `webhooks_enabled` | `true` / `false` | Ativar ou desativar o registo de webhooks |
| `webhooks_scope` | `per_meeting` / `global` | Registar um hook por reunião ou um único hook global para todas as reuniões |
| `webhooks_hash_algo` | `sha256` / `sha1` | Algoritmo HMAC para verificação da assinatura |
| `webhooks_event_filter` | comma-separated string | Lista opcional de nomes de eventos BBB a receber (vazio = todos os eventos) |

Quando uma reunião é criada e os webhooks estão ativados, o Chamilo chama a API `hooks/create` do BBB para registar o URL de callback. O URL inclui uma assinatura HMAC com validade temporal.

## Signature Validation

O endpoint legado utiliza parâmetros na query string:

```
sig = HMAC-{algo}("{accessUrlId}|{meetingId}|{timestamp}", salt)
```

- O `salt` é o valor de salt configurado no plugin BBB.
- Pedidos com mais de **15 minutos** são rejeitados para limitar ataques de replay.

O endpoint moderno utiliza cabeçalhos:

```
sig = HMAC-SHA256("{timestamp}\n{rawBody}", kernelSecret)
```

- Pedidos com mais de **5 minutos** são rejeitados.

## Example: BigBlueButton Webhook Event

O BBB envia um corpo JSON contendo um array de eventos. Cada evento tem um `data.id` (nome do evento) e um objeto `data.attributes`.

**Pedido proveniente do BBB:**

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

**O que o Chamilo faz:**

1. Valida a assinatura HMAC e o carimbo temporal.
2. Procura a `ConferenceMeeting` por `remote_id`.
3. Procura (ou cria) uma linha `ConferenceActivity` aberta para essa reunião + utilizador.
4. Regista `temp.talk_started_at = 1715520123` no JSON de métricas.

Quando chega o evento correspondente `user-talking-stopped`, o Chamilo calcula os segundos decorridos e adiciona-os a `totals.talk_seconds`.

## Tracked Events and Metrics

| BBB event(s) | Metric updated |
|---|---|
| `user-joined` / `participantjoined` | Linha de atividade criada |
| `user-talking-started` / `uservoiceactivated` | Temporizador iniciado para `totals.talk_seconds` |
| `user-talking-stopped` / `uservoicedeactivated` | `totals.talk_seconds` incrementado |
| `camera-share-started` / `webcamsharestarted` | Temporizador iniciado para `totals.camera_seconds` |
| `camera-share-stopped` / `webcamsharestopped` | `totals.camera_seconds` incrementado |
| `chat-message-posted` / `publicchatmessageposted` | `counts.messages` incrementado |
| `user-reaction-changed` / `useremojichanged` | `counts.reactions` + detalhe por emoji |
| `user-hand-raised` / `userraisedhand` | `counts.hands` incrementado |
| `user-left` / `participantleft` | Temporizadores abertos descarregados, linha de atividade fechada |

## Estrutura de Dados das Métricas

As métricas são armazenadas como uma coluna JSON em `ConferenceActivity`:

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

Os campos `temp` guardam os carimbos de data/hora de início dos temporizadores em curso; são limpos quando chega o evento de paragem correspondente ou quando o participante sai.

## Painel de Webhooks

Está disponível um painel de administração em `/plugin/Bbb/webhook_dashboard.php`. Mostra métricas em tempo real e históricas por participante para uma determinada reunião: tempo de ligação, tempo de fala, tempo de câmara, número de mensagens, número de reações e mãos levantadas. Os dados podem ser exportados como CSV.

## Registo e Limpeza de Hooks

A classe `BbbLib` disponibiliza métodos para gerir o registo de hooks no servidor BBB:

| Method | Description |
|---|---|
| `ensureHookForMeeting($remoteId)` | Register (or confirm) a per-meeting hook after a user joins |
| `ensureGlobalWebhook()` | Register a single global hook covering all meetings |
| `cleanupWebhooks($meetingId)` | Delete Chamilo-registered hooks from the BBB server |
| `BbbPlugin::checkWebhooksHealth()` | Validate that the BBB `hooks/list` endpoint is reachable |

## Extensão a Outras Fontes de Eventos

Atualmente não existe um sistema genérico de webhooks de saída no Chamilo (ou seja, não há uma forma integrada de fazer POST para um URL externo quando um utilizador se inscreve ou conclui um curso). Se precisar desse comportamento, as opções incluem:

- Escrever um plugin que escute eventos Symfony e dispare chamadas HTTP (ver [Plugins](../plugins/README.md) e [Sistema de Eventos](../events.md)).
- Utilizar a REST API para consultar alterações de estado a partir de um sistema externo.