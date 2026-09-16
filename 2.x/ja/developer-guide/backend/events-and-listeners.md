# イベントとリスナー

Chamiloは、コンポーネント間の疎結合な通信のためにSymfonyのイベントシステムを使用しています。

## イベントリスナー

Chamiloでは2つのリスナーの場所を使用しています：

* **`src/CoreBundle/EventListener/`** — Symfonyカーネル/HTTPリスナー（リクエスト、レスポンス、例外、ログイン/ログアウト、コース/セッションアクセスなど）。例：`CidReqListener`、`CourseAccessListener`、`LoginSuccessHandler`、`LogoutListener`、`ExceptionListener`、`ResourceDoctrineListener`。
* **`src/CoreBundle/Entity/Listener/`** — 特定のエンティティに紐づけられたDoctrineエンティティリスナー。例：`ResourceNodeListener`、`CourseListener`、`SessionListener`、`LanguageListener`、`UserListener`、`MessageListener`。

反応する必要がある内容に合わせて場所を選んでください：HTTPパイプラインイベントは`EventListener/`に、エンティティライフサイクルフックは`Entity/Listener/`に配置します。

## イベントサブスクライバー

`src/CoreBundle/EventSubscriber/`に配置されています：

イベントサブスクライバーは複数のイベントをリッスンできます：

* **セキュリティサブスクライバー** — ログイン/ログアウトイベントを処理し、ログイン試行を追跡します
* **APIサブスクライバー** — APIリクエストの前後処理を行います
* **Doctrineサブスクライバー** — エンティティライフサイクルイベントに反応します

## Doctrineライフサイクルイベント

エンティティはデータベースレベルのイベントに`#[ORM\HasLifecycleCallbacks]`を使用します：

```php
#[ORM\PrePersist]
public function prePersist(): void
{
    $this->createdAt = new DateTime();
}
```

## カスタムリスナーの作成

カスタム動作を追加するには：

1. 適切なバンドル内にリスナー/サブスクライバークラスを作成します
2. サービス設定でイベントリスナーまたはサブスクライバーとしてタグ付けします
3. ハンドラーメソッドを実装します

```php
class MyListener
{
    public function onKernelRequest(RequestEvent $event): void
    {
        // ここにロジックを記述
    }
}
```

## 主要なイベント

| イベント | 発生タイミング |
|-------|--------------|
| `kernel.request` | すべてのHTTPリクエスト時 |
| `kernel.response` | HTTPレスポンス送信前 |
| `security.interactive_login` | ユーザーがログインした時 |
| `doctrine.prePersist` | エンティティが初めて保存される前 |
| `doctrine.postUpdate` | エンティティが更新された後 |

## Chamilo固有のイベント

これらのイベントはChamilo独自のコードによってディスパッチされ、プラグインの主要な統合ポイントとなります。定数は`Chamilo\CoreBundle\Event\Events`に定義されています。

| 定数 | イベント文字列 | 発生タイミング |
|----------|-------------|---------------|
| `Events::COURSE_CREATED` | `chamilo.event.course_created` | コースが作成された後 |
| `Events::COURSE_ACCESS_CHECK` | `chamilo.course_access_check` | ユーザーがコースにアクセスする前 |
| `Events::COURSE_USER_SUBSCRIPTION_CHECK` | `chamilo.event.course_user_subscription_check` | ユーザーがコースに登録する前 |
| `Events::SESSION_RESUBSCRIPTION` | `chamilo.event.session_resubscription` | ユーザーがセッションに再登録を試みた時 |
| `Events::LOGIN_CREDENTIALS_CHECKED` | `chamilo.event.login_credentials_checked` | ログイン認証情報が検証された後 |
| `Events::LOGIN_CONDITION_CHECKED` | `chamilo.event.login_condition_checked` | 追加のログイン条件がチェックされた後 |
| `Events::DOCUMENT_ACTION` | `chamilo.event.document_action` | ドキュメントツールのツールバーがレンダリングされた時 |
| `Events::DOCUMENT_ITEM_ACTION` | `chamilo.event.document_item_action` | ファイルごとのアクションボタンがレンダリングされた時 |
| `Events::DOCUMENT_ITEM_VIEW` | `chamilo.event.document_item_view` | ドキュメントが閲覧のために開かれた時 |
| `Events::EXERCISE_REPORT_ACTION` | `chamilo.event.exercise_report_action` | 演習レポートページがアクションリンクをレンダリングした時 |
| `Events::EXERCISE_ENDED` | `chamilo.event.exercise_ended` | 学習者が演習を提出した後 |
| `Events::EXERCISE_QUESTION_ANSWERED` | `chamilo.event.question_answered` | 各質問に回答した後 |
| `Events::LP_CREATED` | `chamilo.event.learning_path_created` | 学習パスが作成された後 |
| `Events::LP_ITEM_VIEWED` | `chamilo.event.learning_path_item_viewed` | 学習者がLPアイテムを開いた時 |
| `Events::LP_ENDED` | `chamilo.event.learning_path_ended` | 学習者が学習パスを完了した後 |
| `Events::ADMIN_BLOCK_DISPLAYED` | `chamilo.event.admin_block_displayed` | 管理者ダッシュボードがブロックリストを構築した時 |
| `Events::USER_CREATED` | `chamilo.event.user_created` | ユーザーアカウントが作成された後 |
| `Events::USER_UPDATED` | `chamilo.event.user_updated` | ユーザーアカウントが更新された後 |
| `Events::USER_DELETED` | `chamilo.event.user_deleted` | ユーザーアカウントが削除された後 |
| `Events::PORTFOLIO_ITEM_ADDED` | `chamilo.event.portfolio_item_added` | ポートフォリオアイテムが作成された後 |
| `Events::NOTIFICATION_CONTENT_FORMATTED` | `chamilo_hook_event.notification_content` | 通知本文がフォーマットされた時 |

## プラグインの例：ドキュメントビューアにボタンを追加する

このセクションでは、プラグインがイベントサブスクライバーを使用して、既存のChamiloページにボタンを挿入する方法を説明します。コアコードの変更は必要ありません。

### シナリオ

**MyViewer** というプラグインは、コースファイルマネージャー内のすべてのドキュメントの横に「MyViewer で開く」ボタンを追加したいと考えています。関連するイベントは `Events::DOCUMENT_ITEM_VIEW` であり、Chamilo がドキュメントを表示しようとする際にディスパッチされ、`CDocument` エンティティと変更可能なリンクのリストを保持しています。

### プラグインのディレクトリ構造

```
public/plugin/MyViewer/
├── plugin.php                          # $plugin_info を宣言
├── install.php / uninstall.php
├── admin.php                           # プラグイン設定ページ
├── lang/                               # 翻訳文字列
└── src/
    ├── MyViewerPlugin.php              # メインプラグインクラス (Plugin を継承)
    └── EventSubscriber/
        └── MyViewerEventSubscriber.php # イベントサブスクライバー
```

### メインプラグインクラス (`src/MyViewerPlugin.php`)

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

`Plugin` ベースクラスは、`isEnabled()`、`get($settingKey)`、およびコースツールや設定をインストールするためのヘルパーを提供します。シングルトンパターン (`static $instance`) は、Chamilo の標準的な慣例であり、プラグインクラスが Symfony コンテナの外部 (レガシー PHP ページ内) でもインスタンス化されるためです。

### イベントサブスクライバー (`src/EventSubscriber/MyViewerEventSubscriber.php`)

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

`addLink()` は、Chamilo のドキュメント表示テンプレートが組み込みの「ダウンロード」や「プレビュー」アクションと一緒にレンダリングする配列に HTML を追加します。サブスクライバーは Chamilo のコアファイルを変更することはありません。

### 登録

手動でのサービス登録は必要ありません。Chamilo の `config/services.yaml` は Symfony の `autoconfigure` フラグをグローバルに有効にしており、`EventSubscriberInterface` を実装するクラスを自動的に `kernel.event_subscriber` としてタグ付けします。プラグインディレクトリが読み込まれている限り (Composer's classmap または PSR-4 autoload 経由で)、Symfony は次のキャッシュクリア時にサブスクライバーを認識します。

```bash
php bin/console cache:clear
```

### イベントデータの流れ

```
ドキュメントリストがレンダリングされる
        │
        ▼
Chamilo が DocumentItemViewEvent をディスパッチ (CDocument エンティティ + 空の links[] を保持)
        │
        ├─► MyViewerEventSubscriber::onDocumentItemView()  → HTML リンクを追加
        ├─► OnlyofficeEventSubscriber::onDocumentItemView() → 「編集」ボタンを追加
        │   (複数のプラグインが同じイベントをリッスン可能)
        ▼
テンプレートが event->getLinks() を組み込みのファイルアクションと一緒にレンダリング
```

複数のプラグインが同じイベントに独立してサブスクライブでき、それぞれが他のプラグインを知ることなく共有データに追加します。実行順序は Symfony の優先度システムに従います。順序が重要な場合は、`getSubscribedEvents()` のハンドラータプルの2番目の要素として優先度整数を渡します。

```php
public static function getSubscribedEvents(): array
{
    return [
        Events::DOCUMENT_ITEM_VIEW => ['onDocumentItemView', 10], // 値が大きいほど早い
    ];
}
```