# Webhooks

Chamilo 的 webhook 支持目前仅限于 **BigBlueButton (BBB) 插件**。Chamilo 并非向外部系统发送 webhook，而是作为 webhook 的*接收者*：它暴露了一些端点，供 BigBlueButton 在房间事件发生时调用，并利用这些事件构建每个参与者的活动指标。

## 工作原理

当 BBB 会议进行时，BBB 服务器会向您的 Chamilo 安装上的一个签名回调 URL 推送实时事件通知。Chamilo 处理每个事件，并将聚合指标（发言时间、摄像头时间、消息、反应、举手）存储在 `conference_activity` 数据库表中。

```
BigBlueButton 服务器
        │  POST (已签名)
        ▼
Chamilo webhook 端点
        │
        ▼
conference_activity (指标 JSON)
        │
        ▼
Webhook 仪表板 (/plugin/Bbb/webhook_dashboard.php)
```

## 端点

### 传统 PHP 端点

```
POST /plugin/Bbb/webhook.php?au={accessUrlId}&mid={meetingId}&ts={timestamp}&sig={hmac}
```

处理所有 BBB 房间事件。验证 HMAC 签名，然后插入或更新 `ConferenceActivity` 行并更新指标 JSON 字段。

### 现代 Symfony 端点

```
POST /api/videoconference/callback
Headers:
  X-Chamilo-Timestamp: <unix timestamp>
  X-Chamilo-Signature: <hmac-sha256>
```

通过 API Platform 在 `ConferenceActivity` 实体上定义。需要签名头信息来进行活动记录；没有有效签名的请求会被接受，但不会写入活动行。

## 配置 (BBB 插件)

在 **管理 → 插件 → BigBlueButton** 中，可以使用以下 webhook 设置：

| 设置 | 值 | 描述 |
|---|---|---|
| `webhooks_enabled` | `true` / `false` | 启用或禁用 webhook 注册 |
| `webhooks_scope` | `per_meeting` / `global` | 为每个会议注册一个钩子，或为所有会议注册一个全局钩子 |
| `webhooks_hash_algo` | `sha256` / `sha1` | 用于签名验证的 HMAC 算法 |
| `webhooks_event_filter` | 逗号分隔的字符串 | 可选的 BBB 事件名称列表，指定要接收的事件（为空表示接收所有事件） |

当创建会议且 webhook 已启用时，Chamilo 会调用 BBB 的 `hooks/create` API 来注册回调 URL。该 URL 包含一个有时限的 HMAC 签名。

## 签名验证

传统端点使用查询字符串参数：

```
sig = HMAC-{algo}("{accessUrlId}|{meetingId}|{timestamp}", salt)
```

- `salt` 是 BBB 插件配置的盐值。
- 超过 **15 分钟** 的请求将被拒绝，以限制重放攻击。

现代端点使用头信息：

```
sig = HMAC-SHA256("{timestamp}\n{rawBody}", kernelSecret)
```

- 超过 **5 分钟** 的请求将被拒绝。

## 示例：BigBlueButton Webhook 事件

BBB 会发送一个包含事件数组的 JSON 主体。每个事件包含一个 `data.id`（事件名称）和一个 `data.attributes` 对象。

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
3. 查找（或创建）该会议和用户的开放 `ConferenceActivity` 行。
4. 在指标 JSON 中记录 `temp.talk_started_at = 1715520123`。

当匹配的 `user-talking-stopped` 事件到达时，Chamilo 会计算经过的秒数并将其添加到 `totals.talk_seconds` 中。

## 跟踪的事件和指标

| BBB 事件 | 更新的指标 |
|---|---|
| `user-joined` / `participantjoined` | 创建活动行 |
| `user-talking-started` / `uservoiceactivated` | 为 `totals.talk_seconds` 启动计时器 |
| `user-talking-stopped` / `uservoicedeactivated` | 增加 `totals.talk_seconds` |
| `camera-share-started` / `webcamsharestarted` | 为 `totals.camera_seconds` 启动计时器 |
| `camera-share-stopped` / `webcamsharestopped` | 增加 `totals.camera_seconds` |
| `chat-message-posted` / `publicchatmessageposted` | 增加 `counts.messages` |
| `user-reaction-changed` / `useremojichanged` | 增加 `counts.reactions` 并按表情细分 |
| `user-hand-raised` / `userraisedhand` | 增加 `counts.hands` |
| `user-left` / `participantleft` | 刷新开放的计时器，关闭活动行 |

## 指标数据结构

指标以 JSON 格式存储在 `ConferenceActivity` 表的列中：

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

`temp` 字段用于存储正在进行的计时器开始时间戳；当相应的停止事件到达或参与者离开时，这些字段会被清空。

## Webhook 仪表板

管理员仪表板可在 `/plugin/Bbb/webhook_dashboard.php` 访问。它显示给定会议中每个参与者的实时和历史指标：连接时间、发言时间、摄像头使用时间、消息数量、反应数量以及举手次数。数据可以导出为 CSV 格式。

## 注册和清理钩子

`BbbLib` 类提供了在 BBB 服务器上管理钩子注册的方法：

| 方法 | 描述 |
|---|---|
| `ensureHookForMeeting($remoteId)` | 在用户加入后为特定会议注册（或确认）钩子 |
| `ensureGlobalWebhook()` | 注册一个覆盖所有会议的全局钩子 |
| `cleanupWebhooks($meetingId)` | 从 BBB 服务器删除 Chamilo 注册的钩子 |
| `BbbPlugin::checkWebhooksHealth()` | 验证 BBB `hooks/list` 端点是否可达 |

## 扩展到其他事件源

目前 Chamilo 中没有通用的出站 webhook 系统（即没有内置的方式在用户注册或完成课程时向外部 URL 发送 POST 请求）。如果您需要此功能，可以考虑以下选项：

- 编写一个插件，监听 Symfony 事件并分发 HTTP 调用（参见 [插件](../plugins/README.md) 和 [事件系统](../events.md)）。
- 使用 REST API 从外部系统轮询状态变化。