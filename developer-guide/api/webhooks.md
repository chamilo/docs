# Webhooks

Chamilo 的 webhook 支援目前僅限於 **BigBlueButton (BBB) 插件**。Chamilo 並非將 webhook 發送至外部系統，而是作為 webhook *接收者*：它暴露端點，讓 BigBlueButton 在會議室事件發生時呼叫，並使用這些事件來建構每位參與者的活動指標。

## How It Works

當 BBB 會議進行時，BBB 伺服器會將即時事件通知推送至您 Chamilo 安裝上的簽署回呼 URL。Chamilo 會處理每個事件，並將彙總指標（發言時間、攝影機時間、訊息、反應、舉手）儲存至 `conference_activity` 資料庫表格中。

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

處理所有 BBB 會議室事件。驗證 HMAC 簽章，然後插入或更新 `ConferenceActivity` 資料列，並更新 metrics JSON 欄位。

### Modern Symfony endpoint

```
POST /api/videoconference/callback
Headers:
  X-Chamilo-Timestamp: <unix timestamp>
  X-Chamilo-Signature: <hmac-sha256>
```

透過 API Platform 定義於 `ConferenceActivity` 實體上。需要簽章標頭來記錄活動；無效簽章的請求會被接受，但不會寫入活動資料列。

## Configuration (BBB Plugin)

在 **Administration → Plugins → BigBlueButton** 中，有以下 webhook 設定可用：

| Setting | Values | Description |
|---|---|---|
| `webhooks_enabled` | `true` / `false` | 啟用或停用 webhook 註冊 |
| `webhooks_scope` | `per_meeting` / `global` | 每個會議註冊一個 hook，或為所有會議註冊單一全域 hook |
| `webhooks_hash_algo` | `sha256` / `sha1` | 用於簽章驗證的 HMAC 演算法 |
| `webhooks_event_filter` | comma-separated string | 可選的 BBB 事件名稱清單（空白 = 所有事件） |

當會議建立且 webhook 已啟用時，Chamilo 會呼叫 BBB `hooks/create` API 來註冊回呼 URL。該 URL 包含時間限制的 HMAC 簽章。

## Signature Validation

舊版端點使用查詢字串參數：

```
sig = HMAC-{algo}("{accessUrlId}|{meetingId}|{timestamp}", salt)
```

- `salt` 是 BBB 插件設定的 salt 值。
- 超過 **15 分鐘** 的請求會被拒絕，以限制重播攻擊。

現代端點使用標頭：

```
sig = HMAC-SHA256("{timestamp}\n{rawBody}", kernelSecret)
```

- 超過 **5 分鐘** 的請求會被拒絕。

## Example: BigBlueButton Webhook Event

BBB 會發送包含事件陣列的 JSON 本文。每個事件具有 `data.id`（事件名稱）和 `data.attributes` 物件。

**來自 BBB 的請求：**

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

**Chamilo 的處理：**

1. 驗證 HMAC 簽章和時間戳記。
2. 依 `remote_id` 查詢 `ConferenceMeeting`。
3. 查詢（或建立）該會議 + 使用者的開放 `ConferenceActivity` 資料列。
4. 在 metrics JSON 中記錄 `temp.talk_started_at = 1715520123`。

當對應的 `user-talking-stopped` 事件到達時，Chamilo 會計算經過秒數並加入 `totals.talk_seconds`。

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

## 追蹤事件與指標

| BBB 事件 | 更新指標 |
|---|---|
| `user-joined` / `participantjoined` | 建立活動資料列 |
| `user-talking-started` / `uservoiceactivated` | 啟動 `totals.talk_seconds` 計時器 |
| `user-talking-stopped` /

---
## 指標資料結構

指標儲存為 `ConferenceActivity` 上的 JSON 欄位：

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

`temp` 欄位儲存進行中的計時器起始時間戳；當對應的停止事件到達或參與者離開時，它們會被清除。

## Webhook 儀表板

管理員儀表板可在 `/plugin/Bbb/webhook_dashboard.php` 存取。它顯示給定會議中每個參與者的即時和歷史指標：連線時間、發言時間、攝影機時間、訊息計數、反應計數以及舉手次數。資料可匯出為 CSV。

## 註冊與清理 Hooks

`BbbLib` 類別提供管理 BBB 伺服器上 hook 註冊的方法：

| Method | Description |
|---|---|
| `ensureHookForMeeting($remoteId)` | 在使用者加入後註冊（或確認）每個會議的 hook |
| `ensureGlobalWebhook()` | 註冊涵蓋所有會議的單一全域 hook |
| `cleanupWebhooks($meetingId)` | 從 BBB 伺服器刪除 Chamilo 註冊的 hooks |
| `BbbPlugin::checkWebhooksHealth()` | 驗證 BBB `hooks/list` 端點是否可存取 |

## 擴展至其他事件來源

Chamilo 目前沒有通用的出站 webhook 系統（即沒有內建方式在使用者註冊或完成課程時 POST 到外部 URL）。如果需要此行為，可選項包括：

- 撰寫監聽 Symfony 事件並發送 HTTP 呼叫的插件（參見 [Plugins](../plugins/README.md) 和 [Event System](../events.md)）。
- 使用 REST API 從外部系統輪詢狀態變更。