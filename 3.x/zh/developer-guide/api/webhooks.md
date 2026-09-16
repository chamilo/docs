# Webhooks

Chamilo 的 webhook 支持目前仅限于 **BigBlueButton (BBB) 插件**。Chamilo 并不向外部系统发送 webhook，而是作为 webhook *接收方*：它暴露供 BigBlueButton 在房间事件发生时调用的端点，并利用这些事件构建每位参与者的活动指标。

## How It Works

当 BBB 会议进行时，BBB 服务器会将实时事件通知推送到您 Chamilo 安装上的已签名回调 URL。Chamilo 处理每个事件，并将聚合指标（发言时长、摄像头时长、消息、反应、举手）存储在 `conference_activity` 数据库表中。

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

处理所有 BBB 房间事件。验证 HMAC 签名，然后 upsert 一条 `ConferenceActivity` 记录并更新 metrics JSON 字段。

### Modern Symfony endpoint

```
POST /api/videoconference/callback
Headers:
  X-Chamilo-Timestamp: <unix timestamp>
  X-Chamilo-Signature: <hmac-sha256>
```

通过 API Platform 在 `ConferenceActivity` 实体上定义。活动记录需要签名请求头；没有有效签名的请求会被接受，但不会写入活动行。

## Configuration (BBB Plugin)

在 **管理 → 插件 → BigBlueButton** 中，可使用以下 webhook 设置：

| Setting | Values | Description |
|---|---|---|
| `webhooks_enabled` | `true` / `false` | 启用或禁用 webhook 注册 |
| `webhooks_scope` | `per_meeting` / `global` | 为每次会议注册一个 hook，或为所有会议注册单个全局 hook |
| `webhooks_hash_algo` | `sha256` / `sha1` | 用于签名验证的 HMAC 算法 |
| `webhooks_event_filter` | comma-separated string | 可选的 BBB 事件名称列表（为空 = 全部事件） |

创建会议且已启用 webhook 时，Chamilo 会调用 BBB `hooks/create` API 注册回调 URL。该 URL 包含有时限的 HMAC 签名。

## Signature Validation

旧版端点使用查询字符串参数：

```
sig = HMAC-{algo}("{accessUrlId}|{meetingId}|{timestamp}", salt)
```

- `salt` 是 BBB 插件中配置的 salt 值。
- 超过 **15 分钟** 的请求会被拒绝，以限制重放攻击。

新版端点使用请求头：

```
sig = HMAC-SHA256("{timestamp}\n{rawBody}", kernelSecret)
```

- 超过 **5 分钟** 的请求会被拒绝。

## Example: BigBlueButton Webhook Event

BBB 会 POST 包含事件数组的 JSON 正文。每个事件具有 `data.id`（事件名称）和 `data.attributes` 对象。

**来自 BBB 的请求：**

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

**Chamilo 的处理：**

1. 验证 HMAC 签名和时间戳。
2. 通过 `remote_id` 查找 `ConferenceMeeting`。
3. 查找（或创建）该会议 + 用户的未关闭 `ConferenceActivity` 行。
4. 在 metrics JSON 中记录 `temp.talk_started_at = 1715520123`。

当匹配的 `user-talking-stopped` 事件到达时，Chamilo 计算经过的秒数并将其累加到 `totals.talk_seconds`。

## Tracked Events and Metrics

| BBB event(s) | Metric updated |
|---|---|
| `user-joined` / `participantjoined` | 创建活动行 |
| `user-talking-started` / `uservoiceactivated` | 为 `totals.talk_seconds` 启动计时器 |
| `user-talking-stopped` / `uservoicedeactivated` | 递增 `totals.talk_seconds` |
| `camera-share-started` / `webcamsharestarted` | 为 `totals.camera_seconds` 启动计时器 |
| `camera-share-stopped` / `webcamsharestopped` | 递增 `totals.camera_seconds` |
| `chat-message-posted` / `publicchatmessageposted` | 递增 `counts.messages` |
| `user-reaction-changed` / `useremojichanged` | `counts.reactions` + 按表情细分 |
| `user-hand-raised` / `userraisedhand` | 递增 `counts.hands` |
| `user-left` / `participantleft` | 刷新未关闭计时器，关闭活动行 |

## 指标数据结构

指标以 JSON 列的形式存储在 `ConferenceActivity` 上：

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

`temp` 字段保存进行中的计时器起始时间戳；当对应的停止事件到达或参与者离开时，这些字段会被清除。

## Webhook 仪表盘

管理员仪表盘位于 `/plugin/Bbb/webhook_dashboard.php`。它按会议展示每位参与者的实时与历史指标：连接时长、发言时长、摄像头时长、消息数、反应数以及举手次数。数据可导出为 CSV。

## 注册与清理 Hook

`BbbLib` 类提供在 BBB 服务器上管理 hook 注册的方法：

| Method | Description |
|---|---|
| `ensureHookForMeeting($remoteId)` | 用户加入后注册（或确认）该会议的 per-meeting hook |
| `ensureGlobalWebhook()` | 注册覆盖所有会议的单一全局 hook |
| `cleanupWebhooks($meetingId)` | 从 BBB 服务器删除由 Chamilo 注册的 hook |
| `BbbPlugin::checkWebhooksHealth()` | 验证 BBB `hooks/list` 端点是否可达 |

## 扩展到其他事件源

Chamilo 目前没有通用的出站 webhook 系统（即没有内置方式在用户选课或完成课程时向外部 URL 发起 POST）。若需要此类行为，可选方案包括：

- 编写插件监听 Symfony 事件并分发 HTTP 调用（参见 [插件](../plugins/README.md) 与 [事件系统](../events.md)）。
- 使用 REST API 由外部系统轮询状态变更。