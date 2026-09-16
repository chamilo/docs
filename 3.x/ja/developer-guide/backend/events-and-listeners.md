# イベントとリスナー

Chamilo は、コンポーネント間の疎結合な通信に Symfony のイベントシステムを使用します。

## イベントリスナー

Chamilo は次の 2 つのリスナー配置場所を使用します。

* **`src/CoreBundle/EventListener/`** — Symfony のカーネル／HTTP リスナー（リクエスト、レスポンス、例外、ログイン／ログアウト、コース／セッションアクセスなど）。例: `CidReqListener`、`CourseAccessListener`、`LoginSuccessHandler`、`LogoutListener`、`ExceptionListener`、`ResourceDoctrineListener`。
* **`src/CoreBundle/Entity/Listener/`** — 特定のエンティティに紐づく Doctrine エンティティリスナー。例: `ResourceNodeListener`、`CourseListener`、`SessionListener`、`LanguageListener`、`UserListener`、`MessageListener`。

反応したい対象に合わせて配置場所を選びます。HTTP パイプラインのイベントは `EventListener/` へ、エンティティのライフサイクルフックは `Entity/Listener/` へ置きます。

## イベントサブスクライバー

配置場所は `src/CoreBundle/EventSubscriber/` です。

イベントサブスクライバーは複数のイベントを購読できます。

* **セキュリティサブスクライバー** — ログイン／ログアウトイベントの処理、ログイン試行の追跡
* **API サブスクライバー** — API リクエストの前処理／後処理
* **Doctrine サブスクライバー** — エンティティのライフサイクルイベントへの反応

## Doctrine ライフサイクルイベント

エンティティはデータベースレベルのイベントに `#[ORM\HasLifecycleCallbacks]` を使用します。

```php
#[ORM\PrePersist]
public function prePersist(): void
{
    $this->createdAt = new DateTime();
}
```

## カスタムリスナーの作成

カスタム動作を追加するには次の手順です。

1. 適切なバンドルにリスナー／サブスクライバークラスを作成する
2. サービス設定でイベントリスナーまたはサブスクライバーとしてタグ付けする
3. ハンドラーメソッドを実装する

```php
class MyListener
{
    public function onKernelRequest(RequestEvent $event): void
    {
        // Your logic here
    }
}
```

## 主要なイベント

| イベント | 発火タイミング |
|-------|--------------|
| `kernel.request` | すべての HTTP リクエスト |
| `kernel.response` | HTTP レスポンス送信前 |
| `security.interactive_login` | ユーザーがログインしたとき |
| `doctrine.prePersist` | エンティティが初めて保存される前 |
| `doctrine.postUpdate` | エンティティが更新された後 |

## Chamilo 固有のイベント

これらのイベントは Chamilo 自身のコードからディスパッチされ、プラグインの主要な統合ポイントです。定数は `Chamilo\CoreBundle\Event\Events` で定義されています。

| 定数 | イベント文字列 | 発火タイミング |
|----------|-------------|---------------|
| `Events::COURSE_CREATED` | `chamilo.event.course_created` | コース作成後 |
| `Events::COURSE_ACCESS_CHECK` | `chamilo.course_access_check` | ユーザーがコースにアクセスする前 |
| `Events::COURSE_USER_SUBSCRIPTION_CHECK` | `chamilo.event.course_user_subscription_check` | ユーザーがコースに登録する前 |
| `Events::SESSION_RESUBSCRIPTION` | `chamilo.event.session_resubscription` | ユーザーがセッションへの再登録を試みたとき |
| `Events::LOGIN_CREDENTIALS_CHECKED` | `chamilo.event.login_credentials_checked` | ログイン資格情報が検証された後 |
| `Events::LOGIN_CONDITION_CHECKED` | `chamilo.event.login_condition_checked` | 追加のログイン条件が確認された後 |
| `Events::DOCUMENT_ACTION` | `chamilo.event.document_action` | ドキュメントツールのツールバーが描画されるとき |
| `Events::DOCUMENT_ITEM_ACTION` | `chamilo.event.document_item_action` | ファイルごとのアクションボタンが描画されるとき |
| `Events::DOCUMENT_ITEM_VIEW` | `chamilo.event.document_item_view` | ドキュメントが閲覧のために開かれたとき |
| `Events::EXERCISE_REPORT_ACTION` | `chamilo.event.exercise_report_action` | 演習レポートページがアクションリンクを描画するとき |
| `Events::EXERCISE_ENDED` | `chamilo.event.exercise_ended` | 学習者が演習を提出した後 |
| `Events::EXERCISE_QUESTION_ANSWERED` | `chamilo.event.question_answered` | 各設問に回答した後 |
| `Events::LP_CREATED` | `chamilo.event.learning_path_created` | ラーニングパス作成後 |
| `Events::LP_ITEM_VIEWED` | `chamilo.event.learning_path_item_viewed` | 学習者が LP アイテムを開いたとき |
| `Events::LP_ENDED` | `chamilo.event.learning_path_ended` | 学習者がラーニングパスを完了した後 |
| `Events::ADMIN_BLOCK_DISPLAYED` | `chamilo.event.admin_block_displayed` | 管理ダッシュボードがブロック一覧を構築するとき |
| `Events::USER_CREATED` | `chamilo.event.user_created` | ユーザーアカウント作成後 |
| `Events::USER_UPDATED` | `chamilo.event.user_updated` | ユーザーアカウント更新後 |
| `Events::USER_DELETED` | `chamilo.event.user_deleted` | ユーザーアカウント削除後 |
| `Events::PORTFOLIO_ITEM_ADDED` | `chamilo.event.portfolio_item_added` | ポートフォリオアイテム作成後 |
| `Events::NOTIFICATION_CONTENT_FORMATTED` | `chamilo_hook_event.notification_content` | 通知本文が整形されるとき |

## プラグインの例: ドキュメントビューアーへのボタン追加

この節では、プラグインがイベントサブスクライバーを使って既存の Chamilo ページにボタンを挿入する方法を順を追って説明します。コアコードの変更は不要です。

### シナリオ

**MyViewer** というプラグインは、コースのファイルマネージャー内のすべてのドキュメントの横に「Open in MyViewer」ボタンを追加したいと考えています。関連するイベントは `Events::DOCUMENT_ITEM_VIEW` で、ドキュメントが表示されようとするたびに Chamilo がディスパッチし、`CDocument` エンティティと変更可能なリンクのリストを運びます。

### プラグインのディレクトリ構成

```
public/plugin/MyViewer/
├── plugin.php                          # Declares $plugin_info
├── install.php / uninstall.php
├── admin.php                           # Plugin settings page
├── lang/                               # Translation strings
└── src/
    ├── MyViewerPlugin.php              # Main plugin class (extends Plugin)
    └── EventSubscriber/
        └── MyViewerEventSubscriber.php # Event subscriber
```

### メインプラグインクラス（`src/MyViewerPlugin.php`）

```php
declare(strict_types=1);

class MyViewerPlugin extends Plugin
{
    public const SETTING_SERVER_URL = 'server_url';

    protected function __construct()
    {
        parent::__construct('1.0', 'Your Name', [
            self::SETTING_SERVER_URL => 'text',
        ]);
    }

    public static function create(): static
    {
        static $instance = null;
        return $instance ??= new self();
    }

    public function getViewerUrl(int $documentId): string
    {
        $base = $this->get(self::SETTING_SERVER_URL);
        return sprintf('%s/view?doc=%d', rtrim((string) $base, '/'), $documentId);
    }
}
```

`Plugin` 基底クラスは `isEnabled()`、`get($settingKey)`、およびコースツールと設定のインストール用ヘルパーを提供します。シングルトンパターン（`static $instance`）は標準的な Chamilo の慣習です。プラグインクラスは Symfony コンテナの外（レガシー PHP ページ内）でもインスタンス化されるためです。

### イベントサブスクライバー（`src/EventSubscriber/MyViewerEventSubscriber.php`）

```php
declare(strict_types=1);

use Chamilo\CoreBundle\Event\DocumentItemViewEvent;
use Chamilo\CoreBundle\Event\Events;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class MyViewerEventSubscriber implements EventSubscriberInterface
{
    private MyViewerPlugin $plugin;

    public function __construct()
    {
        $this->plugin = MyViewerPlugin::create();
    }

    public static function getSubscribedEvents(): array
    {
        return [
            Events::DOCUMENT_ITEM_VIEW => 'onDocumentItemView',
        ];
    }

    public function onDocumentItemView(DocumentItemViewEvent $event): void
    {
        if (!$this->plugin->isEnabled()) {
            return;
        }

        $document = $event->getDocument();

        $url = $this->plugin->getViewerUrl($document->getIid());
        $label = $this->plugin->get_lang('OpenInMyViewer');

        $event->addLink(sprintf(
            '<a href="%s" target="_blank" class="btn btn--plain">%s</a>',
            htmlspecialchars($url, ENT_QUOTES),
            htmlspecialchars($label, ENT_QUOTES)
        ));
    }
}
```

`addLink()` は、Chamilo のドキュメント表示テンプレートが組み込みの「Download」および「Preview」アクションと並べて描画する配列に HTML を追加します。サブスクライバーは Chamilo のコアファイルを一切変更しません。

### 登録

手動のサービス登録は不要です。Chamilo の `config/services.yaml` は Symfony の `autoconfigure` フラグをグローバルに有効にしており、`EventSubscriberInterface` を実装するクラスは自動的に `kernel.event_subscriber` としてタグ付けされます。プラグインディレクトリが読み込まれていれば（Composer の classmap または PSR-4 オートロード経由）、次のキャッシュクリア時に Symfony がサブスクライバーを検出します。

```bash
php bin/console cache:clear
```

### イベントデータの流れ

```
Document list rendered
        │
        ▼
Chamilo dispatches DocumentItemViewEvent (carries CDocument entity + empty links[])
        │
        ├─► MyViewerEventSubscriber::onDocumentItemView()  → appends HTML link
        ├─► OnlyofficeEventSubscriber::onDocumentItemView() → appends "Edit" button
        │   (any number of plugins can listen to the same event)
        ▼
Template renders event->getLinks() alongside built-in file actions
```

複数のプラグインが同じイベントに独立してサブスクライブできます。それぞれが他を意識せず共有データに追加します。実行順は Symfony の優先度システムに従います。順序が重要な場合は、`getSubscribedEvents()` のハンドラータプルの第 2 要素として優先度の整数を渡します。

```php
public static function getSubscribedEvents(): array
{
    return [
        Events::DOCUMENT_ITEM_VIEW => ['onDocumentItemView', 10], // higher = earlier
    ];
}
```