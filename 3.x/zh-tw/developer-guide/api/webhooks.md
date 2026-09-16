# Webhooks

Chamilo 的 webhook 支援目前僅限於 **BigBlueButton (BBB) 外掛**。Chamilo 並非向外部系統發送 webhook，而是作為 webhook *接收端*：它公開供 BigBlueButton 在會議室事件發生時呼叫的端點，並利用這些事件建立每位參與者的活動指標。

## How It Works

當 BBB 會議進行時，BBB 伺服器會將即時事件通知推送到您 Chamilo 安裝上已簽署的回呼 URL。Chamilo 處理每個事件，並將彙總指標（發言時間、鏡頭時間、訊息、反應、舉手）儲存在 `conference_activity` 資料庫資料表中。

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

處理所有 BBB 會議室事件。驗證 HMAC 簽章後，upsert 一筆 `ConferenceActivity` 列並更新 metrics JSON 欄位。

### Modern Symfony endpoint

```
POST /api/videoconference/callback
Headers:
  X-Chamilo-Timestamp: <unix timestamp>
  X-Chamilo-Signature: <hmac-sha256>
```

透過 API Platform 定義於 `ConferenceActivity` 實體。記錄活動時需要簽章標頭；沒有有效簽章的請求仍會被接受，但不會寫入活動列。

## Configuration (BBB Plugin)

在 **Administration → Plugins → BigBlueButton** 中，可使用下列 webhook 設定：

| Setting | Values | Description |
|---|---|---|
| `webhooks_enabled` | `true` / `false` | 啟用或停用 webhook 註冊 |
| `webhooks_scope` | `per_meeting` / `global` | 為每次會議註冊一個 hook，或為所有會議註冊單一全域 hook |
| `webhooks_hash_algo` | `sha256` / `sha1` | 用於簽章驗證的 HMAC 演算法 |
| `webhooks_event_filter` | comma-separated string | 可選的 BBB 事件名稱清單（空白 = 所有事件） |

當會議建立且 webhook 已啟用時，Chamilo 會呼叫 BBB `hooks/create` API 以註冊回呼 URL。該 URL 包含有時效限制的 HMAC 簽章。

## Signature Validation

舊版端點使用查詢字串參數：

```
sig = HMAC-{algo}("{accessUrlId}|{meetingId}|{timestamp}", salt)
```

- `salt` 為 BBB 外掛所設定的 salt 值。
- 超過 **15 分鐘** 的請求會被拒絕，以限制重放攻擊。

新版端點使用標頭：

```
sig = HMAC-SHA256("{timestamp}\n{rawBody}", kernelSecret)
```

- 超過 **5 分鐘** 的請求會被拒絕。

## Example: BigBlueButton Webhook Event

BBB 會張貼包含事件陣列的 JSON 主體。每個事件具有 `data.id`（事件名稱）以及 `data.attributes` 物件。

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

1. 驗證 HMAC 簽章與時間戳。
2. 依 `remote_id` 查找 `ConferenceMeeting`。
3. 查找（或建立）該會議與使用者的開放 `ConferenceActivity` 列。
4. 在 metrics JSON 中記錄 `temp.talk_started_at = 1715520123`。

當對應的 `user-talking-stopped` 事件到達時，Chamilo 會計算經過的秒數並加到 `totals.talk_seconds`。

## Tracked Events and Metrics

| BBB event(s) | Metric updated |
|---|---|
| `user-joined` / `participantjoined` | 建立活動列 |
| `user-talking-started` / `uservoiceactivated` | 為 `totals.talk_seconds` 啟動計時器 |
| `user-talking-stopped` / `uservoicedeactivated` | 累加 `totals.talk_seconds` |
| `camera-share-started` / `webcamsharestarted` | 為 `totals.camera_seconds` 啟動計時器 |
| `camera-share-stopped` / `webcamsharestopped` | 累加 `totals.camera_seconds` |
| `chat-message-posted` / `publicchatmessageposted` | 累加 `counts.messages` |
| `user-reaction-changed` / `useremojichanged` | `counts.reactions` + 各表情符號細項 |
| `user-hand-raised` / `userraisedhand` | 累加 `counts.hands` |
| `user-left` / `participantleft` | 刷新開放計時器並關閉活動列 |

## 指標資料結構

指標以 JSON 欄位儲存在 `ConferenceActivity` 上：

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

`temp` 欄位保存進行中計時器的起始時間戳；當對應的停止事件到達，或參與者離開時，這些欄位會被清除。

## Webhook 儀表板

管理員儀表板位於 `/plugin/Bbb/webhook_dashboard.php`。它會顯示指定會議中每位參與者的即時與歷史指標：連線時間、發言時間、攝影機時間、訊息數、反應數與舉手次數。資料可匯出為 CSV。

## 註冊與清理 Hook

`BbbLib` 類別提供在 BBB 伺服器上管理 hook 註冊的方法：

| Method | Description |
|---|---|
| `ensureHookForMeeting($remoteId)` | 使用者加入後，為該會議註冊（或確認）專屬 hook |
| `ensureGlobalWebhook()` | 註冊涵蓋所有會議的單一全域 hook |
| `cleanupWebhooks($meetingId)` | 從 BBB 伺服器刪除由 Chamilo 註冊的 hook |
| `BbbPlugin::checkWebhooksHealth()` | 驗證 BBB `hooks/list` 端點是否可連線 |

## 擴充至其他事件來源

Chamilo 目前沒有通用的對外 webhook 系統（亦即沒有內建方式，在使用者選課或完成課程時 POST 到外部 URL）。若需要此行為，可考慮：

- 撰寫外掛，監聽 Symfony 事件並發送 HTTP 呼叫（參見 [Plugins](../plugins/README.md) 與 [Event System](../events.md)）。
- 使用 REST API，由外部系統輪詢狀態變更。