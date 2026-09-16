# Webhooks

O suporte a webhooks do Chamilo está atualmente limitado ao **plugin BigBlueButton (BBB)**. Em vez de enviar webhooks para sistemas externos, o Chamilo atua como *receptor* de webhooks: ele expõe endpoints que o BigBlueButton chama quando ocorrem eventos de sala e usa esses eventos para construir métricas de atividade por participante.

## Como Funciona

Quando uma reunião BBB ocorre, o servidor BBB envia notificações de eventos em tempo real para uma URL de callback assinada na sua instalação do Chamilo. O Chamilo processa cada evento e armazena métricas agregadas (tempo de fala, tempo de câmera, mensagens, reações, mãos levantadas) na tabela `conference_activity` do banco de dados.

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

### Endpoint PHP legado

```
POST /plugin/Bbb/webhook.php?au={accessUrlId}&mid={meetingId}&ts={timestamp}&sig={hmac}
```

Trata todos os eventos de sala BBB. Valida a assinatura HMAC, em seguida faz upsert de uma linha `ConferenceActivity` e atualiza o campo JSON de métricas.

### Endpoint Symfony moderno

```
POST /api/videoconference/callback
Headers:
  X-Chamilo-Timestamp: <unix timestamp>
  X-Chamilo-Signature: <hmac-sha256>
```

Definido via API Platform na entidade `ConferenceActivity`. Exige os cabeçalhos de assinatura para o registro de atividade; requisições sem uma assinatura válida são aceitas, mas nenhuma linha de atividade é gravada.

## Configuração (Plugin BBB)

Em **Administração → Plugins → BigBlueButton**, as seguintes configurações de webhook estão disponíveis:

| Setting | Values | Description |
|---|---|---|
| `webhooks_enabled` | `true` / `false` | Ativar ou desativar o registro de webhooks |
| `webhooks_scope` | `per_meeting` / `global` | Registrar um hook por reunião ou um único hook global para todas as reuniões |
| `webhooks_hash_algo` | `sha256` / `sha1` | Algoritmo HMAC para verificação de assinatura |
| `webhooks_event_filter` | comma-separated string | Lista opcional de nomes de eventos BBB a receber (vazio = todos os eventos) |

Quando uma reunião é criada e os webhooks estão habilitados, o Chamilo chama a API `hooks/create` do BBB para registrar a URL de callback. A URL inclui uma assinatura HMAC com validade temporal.

## Validação de Assinatura

O endpoint legado usa parâmetros na query string:

```
sig = HMAC-{algo}("{accessUrlId}|{meetingId}|{timestamp}", salt)
```

- O `salt` é o valor de salt configurado no plugin BBB.
- Requisições com mais de **15 minutos** são rejeitadas para limitar ataques de replay.

O endpoint moderno usa cabeçalhos:

```
sig = HMAC-SHA256("{timestamp}\n{rawBody}", kernelSecret)
```

- Requisições com mais de **5 minutos** são rejeitadas.

## Exemplo: Evento de Webhook do BigBlueButton

O BBB envia um corpo JSON contendo um array de eventos. Cada evento possui um `data.id` (nome do evento) e um objeto `data.attributes`.

**Requisição do BBB:**

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

1. Valida a assinatura HMAC e o timestamp.
2. Localiza o `ConferenceMeeting` pelo `remote_id`.
3. Localiza (ou cria) uma linha `ConferenceActivity` aberta para aquela reunião + usuário.
4. Registra `temp.talk_started_at = 1715520123` no JSON de métricas.

Quando o evento correspondente `user-talking-stopped` chega, o Chamilo calcula os segundos decorridos e os adiciona a `totals.talk_seconds`.

## Eventos Rastreados e Métricas

| BBB event(s) | Metric updated |
|---|---|
| `user-joined` / `participantjoined` | Linha de atividade criada |
| `user-talking-started` / `uservoiceactivated` | Temporizador iniciado para `totals.talk_seconds` |
| `user-talking-stopped` / `uservoicedeactivated` | `totals.talk_seconds` incrementado |
| `camera-share-started` / `webcamsharestarted` | Temporizador iniciado para `totals.camera_seconds` |
| `camera-share-stopped` / `webcamsharestopped` | `totals.camera_seconds` incrementado |
| `chat-message-posted` / `publicchatmessageposted` | `counts.messages` incrementado |
| `user-reaction-changed` / `useremojichanged` | `counts.reactions` + detalhamento por emoji |
| `user-hand-raised` / `userraisedhand` | `counts.hands` incrementado |
| `user-left` / `participantleft` | Temporizadores abertos encerrados, linha de atividade fechada |

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

Os campos `temp` armazenam os carimbos de data/hora de início dos temporizadores em andamento; eles são limpos quando o evento de parada correspondente chega ou quando o participante sai.

## Painel de Webhooks

Um painel administrativo está disponível em `/plugin/Bbb/webhook_dashboard.php`. Ele exibe métricas em tempo real e históricas por participante para uma determinada reunião: tempo de conexão, tempo de fala, tempo de câmera, contagem de mensagens, contagem de reações e mãos levantadas. Os dados podem ser exportados como CSV.

## Registro e Limpeza de Hooks

A classe `BbbLib` fornece métodos para gerenciar o registro de hooks no servidor BBB:

| Method | Description |
|---|---|
| `ensureHookForMeeting($remoteId)` | Register (or confirm) a per-meeting hook after a user joins |
| `ensureGlobalWebhook()` | Register a single global hook covering all meetings |
| `cleanupWebhooks($meetingId)` | Delete Chamilo-registered hooks from the BBB server |
| `BbbPlugin::checkWebhooksHealth()` | Validate that the BBB `hooks/list` endpoint is reachable |

## Extensão para Outras Fontes de Eventos

Atualmente não existe um sistema genérico de webhooks de saída no Chamilo (ou seja, não há uma forma nativa de fazer POST para uma URL externa quando um usuário se matricula ou conclui um curso). Se você precisar desse comportamento, as opções incluem:

- Escrever um plugin que escute eventos do Symfony e dispare chamadas HTTP (consulte [Plugins](../plugins/README.md) e [Sistema de Eventos](../events.md)).
- Usar a REST API para consultar periodicamente mudanças de estado a partir de um sistema externo.