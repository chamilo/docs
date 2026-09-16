# ウェブフック

Chamiloのウェブフックサポートは現在、**BigBlueButton (BBB) プラグイン**に限定されています。外部システムにウェブフックを送信するのではなく、Chamiloはウェブフックの*受信者*として機能します。BigBlueButtonがルームイベントが発生した際に呼び出すエンドポイントを公開し、それらのイベントを利用して参加者ごとのアクティビティメトリクスを構築します。

## 仕組み

BBBミーティングが行われる際、BBBサーバーはChamiloインストール上の署名付きコールバックURLにリアルタイムのイベント通知をプッシュします。Chamiloは各イベントを処理し、集計されたメトリクス（発言時間、カメラ時間、メッセージ、リアクション、手を挙げる）を`conference_activity`データベーステーブルに保存します。

```
BigBlueButtonサーバー
        │  POST (署名付き)
        ▼
Chamiloウェブフックエンドポイント
        │
        ▼
conference_activity (メトリクスJSON)
        │
        ▼
ウェブフックダッシュボード (/plugin/Bbb/webhook_dashboard.php)
```

## エンドポイント

### レガシーPHPエンドポイント

```
POST /plugin/Bbb/webhook.php?au={accessUrlId}&mid={meetingId}&ts={timestamp}&sig={hmac}
```

すべてのBBBルームイベントを処理します。HMAC署名を検証し、`ConferenceActivity`行を更新または挿入し、メトリクスJSONフィールドを更新します。

### モダンSymfonyエンドポイント

```
POST /api/videoconference/callback
Headers:
  X-Chamilo-Timestamp: <unix timestamp>
  X-Chamilo-Signature: <hmac-sha256>
```

`ConferenceActivity`エンティティ上でAPI Platformを通じて定義されています。アクティビティ記録には署名ヘッダーが必要です。有効な署名がないリクエストは受け入れられますが、アクティビティ行は書き込まれません。

## 設定 (BBBプラグイン)

**管理 → プラグイン → BigBlueButton**で、以下のウェブフック設定が利用可能です：

| 設定 | 値 | 説明 |
|---|---|---|
| `webhooks_enabled` | `true` / `false` | ウェブフック登録を有効または無効にする |
| `webhooks_scope` | `per_meeting` / `global` | ミーティングごとに1つのフックを登録するか、すべてのミーティングに対して単一のグローバルフックを登録するか |
| `webhooks_hash_algo` | `sha256` / `sha1` | 署名検証のためのHMACアルゴリズム |
| `webhooks_event_filter` | カンマ区切りの文字列 | 受信するBBBイベント名のオプションリスト（空の場合＝すべてのイベント） |

ミーティングが作成され、ウェブフックが有効になっている場合、ChamiloはBBBの`hooks/create` APIを呼び出してコールバックURLを登録します。URLには時間制限付きのHMAC署名が含まれます。

## 署名検証

レガシーエンドポイントはクエリ文字列パラメータを使用します：

```
sig = HMAC-{algo}("{accessUrlId}|{meetingId}|{timestamp}", salt)
```

- `salt`はBBBプラグインで設定されたsalt値です。
- リプレイ攻撃を制限するため、**15分**を超える古いリクエストは拒否されます。

モダンエンドポイントはヘッダーを使用します：

```
sig = HMAC-SHA256("{timestamp}\n{rawBody}", kernelSecret)
```

- **5分**を超える古いリクエストは拒否されます。

## 例：BigBlueButtonウェブフックイベント

BBBはイベントの配列を含むJSONボディを投稿します。各イベントには`data.id`（イベント名）と`data.attributes`オブジェクトが含まれます。

**BBBからのリクエスト：**

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

**Chamiloの処理：**

1. HMAC署名とタイムスタンプを検証します。
2. `remote_id`で`ConferenceMeeting`を検索します。
3. そのミーティングとユーザーに対してオープンな`ConferenceActivity`行を検索（または作成）します。
4. メトリクスJSONに`temp.talk_started_at = 1715520123`を記録します。

対応する`user-talking-stopped`イベントが到着すると、Chamiloは経過秒数を計算し、`totals.talk_seconds`に加算します。

## 追跡されるイベントとメトリクス

| BBBイベント | 更新されるメトリクス |
|---|---|
| `user-joined` / `participantjoined` | アクティビティ行が作成される |
| `user-talking-started` / `uservoiceactivated` | `totals.talk_seconds`のタイマーが開始 |
| `user-talking-stopped` / `uservoicedeactivated` | `totals.talk_seconds`が増加 |
| `camera-share-started` / `webcamsharestarted` | `totals.camera_seconds`のタイマーが開始 |
| `camera-share-stopped` / `webcamsharestopped` | `totals.camera_seconds`が増加 |
| `chat-message-posted` / `publicchatmessageposted` | `counts.messages`が増加 |
| `user-reaction-changed` / `useremojichanged` | `counts.reactions`と絵文字ごとの内訳が増加 |
| `user-hand-raised` / `userraisedhand` | `counts.hands`が増加 |
| `user-left` / `participantleft` | オープンなタイマーがフラッシュされ、アクティビティ行が閉じられる |

---
## メトリクスデータ構造

メトリクスは `ConferenceActivity` の JSON カラムとして保存されます：

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

`temp` フィールドには進行中のタイマーの開始タイムスタンプが保持されます。これらは対応する停止イベントが到着したとき、または参加者が退出したときにクリアされます。

## ウェブフックダッシュボード

管理ダッシュボードは `/plugin/Bbb/webhook_dashboard.php` で利用可能です。このダッシュボードでは、特定の会議における参加者ごとのリアルタイムおよび過去のメトリクス（接続時間、発言時間、カメラ時間、メッセージ数、リアクション数、手を挙げる回数）を表示します。データは CSV 形式でエクスポート可能です。

## フックの登録とクリーンアップ

`BbbLib` クラスは、BBB サーバー上でのフック登録を管理するためのメソッドを提供します：

| メソッド | 説明 |
|---|---|
| `ensureHookForMeeting($remoteId)` | ユーザーが参加した後に会議ごとのフックを登録（または確認）する |
| `ensureGlobalWebhook()` | すべての会議を対象とする単一のグローバルフックを登録する |
| `cleanupWebhooks($meetingId)` | BBB サーバーから Chamilo によって登録されたフックを削除する |
| `BbbPlugin::checkWebhooksHealth()` | BBB の `hooks/list` エンドポイントが到達可能であることを検証する |

## 他のイベントソースへの拡張

現在、Chamilo には汎用のアウトバウンドウェブフックシステムはありません（つまり、ユーザーがコースに登録したり、コースを修了したりした際に外部 URL に POST する組み込みの方法はありません）。そのような動作が必要な場合のオプションには以下が含まれます：

- Symfony イベントをリッスンし、HTTP 呼び出しをディスパッチするプラグインを作成する（[プラグイン](../plugins/README.md) および [イベントシステム](../events.md) を参照）。
- REST API を使用して、外部システムから状態変化をポーリングする。