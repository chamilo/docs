# Webhooks

O suporte a webhooks do Chamilo está atualmente limitado ao **plugin BigBlueButton (BBB)**. Em vez de enviar webhooks para sistemas externos, o Chamilo atua como um *receptor* de webhooks: ele expõe endpoints que o BigBlueButton chama quando ocorrem eventos em salas, e utiliza esses eventos para construir métricas de atividade por participante.

## Como Funciona

Quando uma reunião BBB ocorre, o servidor BBB envia notificações de eventos em tempo real para uma URL de callback assinada na sua instalação do Chamilo. O Chamilo processa cada evento e armazena métricas agregadas (tempo de fala, tempo de câmera, mensagens, reações, mãos levantadas) na tabela de banco de dados `conference_activity`.

```
Servidor BigBlueButton
        │  POST (assinado)
        ▼
Endpoint de webhook do Chamilo
        │
        ▼
conference_activity (JSON de métricas)
        │
        ▼
Painel de webhooks (/plugin/Bbb/webhook_dashboard.php)
```

## Endpoints

### Endpoint PHP legado

```
POST /plugin/Bbb/webhook.php?au={accessUrlId}&mid={meetingId}&ts={timestamp}&sig={hmac}
```

Gerencia todos os eventos de salas BBB. Valida a assinatura HMAC, depois insere ou atualiza uma linha `ConferenceActivity` e atualiza o campo JSON de métricas.

### Endpoint moderno do Symfony

```
POST /api/videoconference/callback
Headers:
  X-Chamilo-Timestamp: <unix timestamp>
  X-Chamilo-Signature: <hmac-sha256>
```

Definido via API Platform na entidade `ConferenceActivity`. Requer os cabeçalhos de assinatura para registro de atividade; solicitações sem uma assinatura válida são aceitas, mas nenhuma linha de atividade é gravada.

## Configuração (Plugin BBB)

Em **Administração → Plugins → BigBlueButton**, as seguintes configurações de webhook estão disponíveis:

| Configuração | Valores | Descrição |
|---|---|---|
| `webhooks_enabled` | `true` / `false` | Ativar ou desativar o registro de webhooks |
| `webhooks_scope` | `per_meeting` / `global` | Registrar um hook por reunião ou um único hook global para todas as reuniões |
| `webhooks_hash_algo` | `sha256` / `sha1` | Algoritmo HMAC para verificação de assinatura |
| `webhooks_event_filter` | string separada por vírgulas | Lista opcional de nomes de eventos BBB a serem recebidos (vazio = todos os eventos) |

Quando uma reunião é criada e os webhooks estão ativados, o Chamilo chama a API `hooks/create` do BBB para registrar a URL de callback. A URL inclui uma assinatura HMAC limitada por tempo.

## Validação de Assinatura

O endpoint legado utiliza parâmetros de query-string:

```
sig = HMAC-{algo}("{accessUrlId}|{meetingId}|{timestamp}", salt)
```

- O `salt` é o valor de salt configurado no plugin BBB.
- Solicitações com mais de **15 minutos** são rejeitadas para limitar ataques de repetição.

O endpoint moderno utiliza cabeçalhos:

```
sig = HMAC-SHA256("{timestamp}\n{rawBody}", kernelSecret)
```

- Solicitações com mais de **5 minutos** são rejeitadas.

## Exemplo: Evento de Webhook do BigBlueButton

O BBB envia um corpo JSON contendo um array de eventos. Cada evento possui um `data.id` (nome do evento) e um objeto `data.attributes`.

**Solicitação do BBB:**

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
2. Pesquisa o `ConferenceMeeting` por `remote_id`.
3. Pesquisa (ou cria) uma linha aberta de `ConferenceActivity` para essa reunião + usuário.
4. Registra `temp.talk_started_at = 1715520123` no JSON de métricas.

Quando o evento correspondente `user-talking-stopped` chega, o Chamilo calcula os segundos decorridos e os adiciona a `totals.talk_seconds`.

## Eventos Rastreados e Métricas

| Evento(s) BBB | Métrica atualizada |
|---|---|
| `user-joined` / `participantjoined` | Linha de atividade criada |
| `user-talking-started` / `uservoiceactivated` | Temporizador iniciado para `totals.talk_seconds` |
| `user-talking-stopped` / `uservoicedeactivated` | `totals.talk_seconds` incrementado |
| `camera-share-started` / `webcamsharestarted` | Temporizador iniciado para `totals.camera_seconds` |
| `camera-share-stopped` / `webcamsharestopped` | `totals.camera_seconds` incrementado |
| `chat-message-posted` / `publicchatmessageposted` | `counts.messages` incrementado |
| `user-reaction-changed` / `useremojichanged` | `counts.reactions` + detalhamento por emoji |
| `user-hand-raised` / `userraisedhand` | `counts.hands` incrementado |
| `user-left` / `participantleft` | Temporizadores abertos finalizados, linha de atividade fechada |

---
## Estrutura de Dados de Métricas

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

Os campos `temp` armazenam carimbos de tempo de início de temporizadores em andamento; eles são limpos quando o evento de parada correspondente chega ou quando o participante sai.

## Painel de Controle de Webhook

Um painel de controle administrativo está disponível em `/plugin/Bbb/webhook_dashboard.php`. Ele exibe métricas em tempo real e históricas por participante para uma determinada reunião: tempo de conexão, tempo de fala, tempo de câmera, contagem de mensagens, contagem de reações e levantadas de mão. Os dados podem ser exportados como CSV.

## Registro e Limpeza de Hooks

A classe `BbbLib` fornece métodos para gerenciar o registro de hooks no servidor BBB:

| Método | Descrição |
|---|---|
| `ensureHookForMeeting($remoteId)` | Registra (ou confirma) um hook por reunião após um usuário ingressar |
| `ensureGlobalWebhook()` | Registra um único hook global que cobre todas as reuniões |
| `cleanupWebhooks($meetingId)` | Exclui hooks registrados pelo Chamilo do servidor BBB |
| `BbbPlugin::checkWebhooksHealth()` | Valida se o endpoint `hooks/list` do BBB está acessível |

## Extensão para Outras Fontes de Eventos

Atualmente, não há um sistema genérico de webhook de saída no Chamilo (ou seja, não há uma maneira integrada de fazer POST para uma URL externa quando um usuário se inscreve ou conclui um curso). Se você precisar desse comportamento, as opções incluem:

- Escrever um plugin que escute eventos do Symfony e dispare chamadas HTTP (consulte [Plugins](../plugins/README.md) e [Sistema de Eventos](../events.md)).
- Usar a API REST para sondar alterações de estado a partir de um sistema externo.