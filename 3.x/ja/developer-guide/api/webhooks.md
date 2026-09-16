# Webhooks

Chamilo の webhook 対応は現在 **BigBlueButton (BBB) プラグイン** に限定されています。外部システムへ webhook を送信するのではなく、Chamilo は webhook の *受信側* として動作します。ルームイベント発生時に BigBlueButton が呼び出すエンドポイントを公開し、それらのイベントを用いて参加者ごとの活動メトリクスを構築します。

## How It Works

BBB ミーティングが開催されると、BBB サーバーはリアルタイムのイベント通知を、Chamilo インストール上の署名付きコールバック URL へプッシュします。Chamilo は各イベントを処理し、集計メトリクス（発話時間、カメラ時間、メッセージ、リアクション、挙手）を `conference_activity` データベーステーブルに保存します。

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

すべての BBB ルームイベントを処理します。HMAC 署名を検証したうえで、`ConferenceActivity` 行を upsert し、メトリクス JSON フィールドを更新します。

### Modern Symfony endpoint

```
POST /api/videoconference/callback
Headers:
  X-Chamilo-Timestamp: <unix timestamp>
  X-Chamilo-Signature: <hmac-sha256>
```

`ConferenceActivity` エンティティ上で API Platform により定義されています。活動の記録には署名ヘッダーが必要です。有効な署名のないリクエストは受け付けられますが、活動行は書き込まれません。

## Configuration (BBB Plugin)

**管理 → プラグイン → BigBlueButton** では、次の webhook 設定が利用できます。

| Setting | Values | Description |
|---|---|---|
| `webhooks_enabled` | `true` / `false` | webhook 登録の有効化または無効化 |
| `webhooks_scope` | `per_meeting` / `global` | ミーティングごとに 1 つのフックを登録するか、全ミーティング用の単一グローバルフックを登録するか |
| `webhooks_hash_algo` | `sha256` / `sha1` | 署名検証用の HMAC アルゴリズム |
| `webhooks_event_filter` | comma-separated string | 受信する BBB イベント名の任意リスト（空 = すべてのイベント） |

ミーティングが作成され webhook が有効な場合、Chamilo は BBB の `hooks/create` API を呼び出してコールバック URL を登録します。URL には有効期限付きの HMAC 署名が含まれます。

## Signature Validation

レガシーエンドポイントはクエリ文字列パラメーターを使用します。

```
sig = HMAC-{algo}("{accessUrlId}|{meetingId}|{timestamp}", salt)
```

- `salt` は BBB プラグインで設定された salt 値です。
- **15 分** より古いリクエストは、リプレイ攻撃を制限するために拒否されます。

モダンエンドポイントはヘッダーを使用します。

```
sig = HMAC-SHA256("{timestamp}\n{rawBody}", kernelSecret)
```

- **5 分** より古いリクエストは拒否されます。

## Example: BigBlueButton Webhook Event

BBB はイベント配列を含む JSON ボディを POST します。各イベントには `data.id`（イベント名）と `data.attributes` オブジェクトがあります。

**BBB からのリクエスト:**

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

**Chamilo の処理内容:**

1. HMAC 署名とタイムスタンプを検証します。
2. `remote_id` により `ConferenceMeeting` を検索します。
3. そのミーティングとユーザーに対する未完了の `ConferenceActivity` 行を検索（または作成）します。
4. メトリクス JSON に `temp.talk_started_at = 1715520123` を記録します。

対応する `user-talking-stopped` イベントが到着すると、Chamilo は経過秒数を計算し、`totals.talk_seconds` に加算します。

## Tracked Events and Metrics

| BBB event(s) | Metric updated |
|---|---|
| `user-joined` / `participantjoined` | 活動行を作成 |
| `user-talking-started` / `uservoiceactivated` | `totals.talk_seconds` のタイマーを開始 |
| `user-talking-stopped` / `uservoicedeactivated` | `totals.talk_seconds` を加算 |
| `camera-share-started` / `webcamsharestarted` | `totals.camera_seconds` のタイマーを開始 |
| `camera-share-stopped` / `webcamsharestopped` | `totals.camera_seconds` を加算 |
| `chat-message-posted` / `publicchatmessageposted` | `counts.messages` を加算 |
| `user-reaction-changed` / `useremojichanged` | `counts.reactions` + 絵文字ごとの内訳 |
| `user-hand-raised` / `userraisedhand` | `counts.hands` を加算 |
| `user-left` / `participantleft` | 開いているタイマーをフラッシュし、活動行をクローズ |

## メトリクスのデータ構造

メトリクスは `ConferenceActivity` の JSON カラムとして保存されます。

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

`temp` フィールドは進行中のタイマー開始タイムスタンプを保持します。対応する停止イベントが到着したとき、または参加者が退出したときにクリアされます。

## Webhook ダッシュボード

管理者向けダッシュボードは `/plugin/Bbb/webhook_dashboard.php` で利用できます。指定したミーティングについて、参加者ごとのリアルタイムおよび履歴メトリクス（接続時間、発話時間、カメラ時間、メッセージ数、リアクション数、挙手数）を表示します。データは CSV としてエクスポートできます。

## フックの登録とクリーンアップ

`BbbLib` クラスは、BBB サーバー上のフック登録を管理するためのメソッドを提供します。

| Method | Description |
|---|---|
| `ensureHookForMeeting($remoteId)` | ユーザー参加後に、ミーティング単位のフックを登録（または確認）する |
| `ensureGlobalWebhook()` | すべてのミーティングを対象とする単一のグローバルフックを登録する |
| `cleanupWebhooks($meetingId)` | Chamilo が登録したフックを BBB サーバーから削除する |
| `BbbPlugin::checkWebhooksHealth()` | BBB の `hooks/list` エンドポイントに到達できることを検証する |

## 他のイベントソースへの拡張

現時点では、Chamilo に汎用のアウトバウンド Webhook システムはありません（ユーザーがコースに登録したときや完了したときに外部 URL へ POST する組み込みの仕組みはありません）。そのような動作が必要な場合の選択肢は次のとおりです。

- Symfony イベントを購読し HTTP 呼び出しを発行するプラグインを作成する（[Plugins](../plugins/README.md) および [Event System](../events.md) を参照）。
- REST API を使い、外部システムから状態変化をポーリングする。