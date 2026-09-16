# プラグインの作成

本ガイドでは、基本的な Chamilo プラグインの作成手順を説明します。詳細については、[Plugin development wiki page](https://github.com/chamilo/chamilo-lms/wiki/Plugin-development) を参照してください。

## Step 1: プラグインディレクトリの作成

`public/plugin/` にディレクトリを作成します。ディレクトリ名はプラグインの識別子と一致させてください。

```
public/plugin/MyPlugin/
```

## Step 2: プラグインクラスの定義

`src/MyPluginPlugin.php` を作成します。クラスは `Plugin` を継承し、シングルトンパターンに従います。

```php
<?php

class MyPluginPlugin extends Plugin
{
    protected function __construct()
    {
        $settings = [
            'tool_enable' => 'boolean',
            'api_key'     => 'text',
        ];
        parent::__construct('1.0', 'Your Name', $settings);
    }

    public static function create(): static
    {
        static $instance = null;
        return $instance ??= new static();
    }
}
```

### 利用可能な設定タイプ

| Type | Description |
|------|-------------|
| `boolean` | オン/オフのチェックボックス |
| `text` | 1行テキスト入力 |
| `select` | ドロップダウン（`options` 配列を指定） |
| `wysiwyg` | リッチテキストエディタ |
| `html` | 生 HTML フィールド |
| `checkbox` | チェックボックス |
| `user` | ユーザーセレクタ |

`select` 設定の場合:

```php
$settings = [
    'mode' => [
        'type'             => 'select',
        'options'          => ['auto' => 'Automatic', 'manual' => 'Manual'],
        'translate_options' => true,
    ],
];
```

実行時に設定へアクセスする:

```php
$plugin = MyPluginPlugin::create();
$key  = $plugin->get('api_key');       // single value
$all  = $plugin->get_settings();       // all settings
```

## Step 3: plugin.php の作成

プラグインルートの `plugin.php` は**必須**です。`$plugin_info` を代入する必要があります。

```php
<?php
$plugin_info = MyPluginPlugin::create()->get_info();
```

## Step 4: インストールおよびアンインストールスクリプトの作成

`install.php`:

```php
<?php
MyPluginPlugin::create()->install();
```

`uninstall.php`:

```php
<?php
MyPluginPlugin::create()->uninstall();
```

スキーマの実際の作成・削除は、Doctrine の `SchemaTool` を用いてクラス内で実装します。

## Step 5: 翻訳の追加

`lang/` にロケールコードを用いた言語ファイルを作成します（例: `en_US.php`、`fr_FR.php`、`es.php`）。フォールバックは `en_US.php` です。

```php
<?php
// lang/en_US.php
$strings['plugin_title']   = 'My Plugin';
$strings['plugin_comment'] = 'Description of what this plugin does.';
$strings['tool_enable']    = 'Enable plugin';
$strings['api_key']        = 'API Key';
$strings['api_key_help']   = 'Enter the API key from your account.';
```

翻訳は `$plugin->get_lang('key')` で取得します。

## Step 6: Display Regions によるコンテンツの挿入

プラグインは、インターフェース上のあらかじめ定義された 18 のリージョンに HTML を挿入できます。リージョンの描画メカニズムは、対象リージョンによって異なります。

* **`course_tool_plugin`** は、プラグインクラスで `renderRegion(string $region): string` をオーバーライドして描画される唯一のリージョンです。コーススコープのプラグイン（`is_course_plugin`）で、コースページが開いているときのみ（`PluginRegionController` 経由で）呼び出されます。

  ```php
  public function renderRegion(string $region): string
  {
      if ('course_tool_plugin' !== $region) {
          return '';
      }
      return '<div class="my-plugin-widget">Hello!</div>';
  }
  ```

* **一般リージョン 16 件** — `content_bottom`、`content_top`、`footer_center`、`footer_left`、`footer_right`、`header_center`、`header_left`、`header_main`、`header_right`、`login_bottom`、`login_top`、`main_bottom`、`main_top`、`menu_bottom`、`menu_top`、`pre_footer` — は `renderRegion()` ではなく、プラグイン自身の `index.php` を require して描画されます。フレームワークはそのファイルを require する前に `$plugin_info['current_region']` を設定するため、該当リージョン向けに HTML を直接 `echo` するか、`$plugin_info['templates']` 経由で描画する Twig テンプレートを宣言できます。

  ```php
  <?php
  // index.php
  if (!class_exists('MyPluginPlugin', false)) {
      require_once __DIR__.'/src/MyPluginPlugin.php';
  }

  $region = (string) ($plugin_info['current_region'] ?? '');

  if ('header_right' === $region) {
      echo '<div class="my-plugin-widget">Hello!</div>';
  }
  ```

  `public/plugin/HelloWorld/index.php` は完全に動作する実例です。HelloWorld は `renderRegion()` を一切オーバーライドせず、埋めるすべてのリージョンは `index.php` 経由です。

* **`menu_administrator`** は、上記 2 つのメカニズムではなく、レガシー管理ダッシュボードに表示される管理者専用リンク向けの特別なケースです。`Dashboard` と `CleanDeletedFiles` がこれを利用する実際のプラグインです。

どのメカニズムを使う場合でも、管理者が **Manage plugins** ページで当該プラグイン横の **Regions** ボタンからリージョンを有効にする必要があります（[Step 9](#step-9-activate) を参照）。そこで明示的に有効化されていないリージョンには、プラグインは何も描画しません。

## ステップ 7: プラットフォームイベントへの反応（任意）

プラグインは Symfony のイベントサブスクライバーを使ってプラットフォームイベントに反応できます。`src/EventSubscriber/` 内に `EventSubscriber.php` で終わるファイルを作成してください — `PluginEventSubscriberPass` により自動登録されます。

次の 2 つの要件を満たさないと、サブスクライバーは黙ってスキップされます。クラスは **グローバル名前空間** にあること（パスはファイル名から解決します）、追加後に `composer dump-autoload` を実行すること（`public/plugin` はクラスマップエントリです）。結果は `php bin/console debug:event-dispatcher <event.name>` で確認してください。

```php
<?php
// src/EventSubscriber/MyPluginEventSubscriber.php

use Chamilo\CoreBundle\Event\Events;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class MyPluginEventSubscriber implements EventSubscriberInterface
{
    private MyPluginPlugin $plugin;

    public function __construct()
    {
        // Plugin classes are not Symfony services — use the create() singleton.
        $this->plugin = MyPluginPlugin::create();
    }

    public static function getSubscribedEvents(): array
    {
        return [
            Events::COURSE_CREATED => 'onCourseCreated',
        ];
    }

    public function onCourseCreated($event): void
    {
        if (!$this->plugin->isEnabled()) {
            return;
        }
        // your logic here
    }
}
```

利用可能なイベントの完全な一覧は `src/CoreBundle/Event/Events.php` を参照してください（ユーザー、コース、セッション、LP、演習、ポートフォリオ、認証など）。

### コース、セッション、またはユーザーが削除されたときのクリーンアップ

プラグインがコース、セッション、またはユーザーをキーとする行を保存している場合は、`Events::COURSE_DELETED`、`Events::SESSION_DELETED`、または `Events::USER_DELETED` を購読してください。クリーンアップの唯一の方法です — 旧来の `doWhenDeleting*` メソッドはもう存在しません。これらのリスナーには次の 3 つの規則が適用されます。

* **`AbstractEvent::TYPE_PRE` で処理する** — イベントは行が削除される前に発火し、外部キーがまだ解決できデータがまだ読める唯一のタイミングです。`USER_DELETED` は `TYPE_POST` としても発火するため、そこでのチェックは任意ではありません。
* **有効化ではなくインストール済みでガードする** — `AppPlugin::getInstance()->isInstalled($this->plugin->get_name())` を使用します。行はプラグインが無効化された後も、または別のアクセス URL でのみ有効化された場合も残り、いずれにせよ外部キーが削除をブロックします。
* **`USER_DELETED` では `$event->isHardDelete()` を確認する** — ソフト削除ではユーザーを復元可能なまま残すため、そのデータも残さなければなりません。

```php
public function onUserDeleted(UserDeletedEvent $event): void
{
    if (AbstractEvent::TYPE_PRE !== $event->getType() || !$event->isHardDelete()) {
        return;
    }

    $userId = $event->getUser()?->getId();

    if (empty($userId) || !AppPlugin::getInstance()->isInstalled($this->plugin->get_name())) {
        return;
    }

    Database::getManager()->getConnection()->executeStatement(
        'DELETE FROM my_plugin_table WHERE user_id = :userId',
        ['userId' => $userId]
    );
}
```

ユーザーについては `StudentFollowUp` プラグインが参考になります。コースとセッションの同等処理は `Bbb`、`BuyCourses`、`EmbedRegistry` にあります。

## ステップ 8: ライフサイクルフック

プラットフォームの操作に応答するため、プラグインクラスで次のメソッドをオーバーライドします。

| メソッド | トリガーされるタイミング |
|--------|----------------|
| `install()` | プラグインが有効化されたとき |
| `uninstall()` | プラグインが削除されたとき |
| `performActionsAfterConfigure()` | 管理者が設定フォームを保存したとき |
| `course_settings_updated(array $values)` | コースレベルの設定が変更されたとき |
| `validateCourseSetting(string $variable)` | コース設定が保存されたとき（拒否するには `false` を返す） |

`doWhenDeletingUser()`、`doWhenDeletingCourse()`、`doWhenDeletingSession()` は、それらを呼び出していた `AppPlugin::performActionsWhenDeletingItem()` トリガーとともに削除されました — 現在オーバーライドしても何も起きません。代わりに [ステップ 7](#cleaning-up-when-a-course-session-or-user-is-deleted) の削除イベントを使用してください。

## ステップ 9: 有効化

管理者としてログインし、管理ダッシュボードの **プラットフォーム** ブロックから **プラグイン** へ移動します — **プラグインの管理** ページが開きます。プラグインを見つけて **インストール** をクリックし、インストール後に **有効化** をクリックして有効にします（有効なプラグインには代わりに **無効化** ボタンが表示されます）。

## ヒント

* **既存のプラグインを例にする** — `public/plugin/HelloWorld/` と `public/plugin/TopLinks/` は簡潔な参考になります
* **翻訳を使う** — ユーザー向けテキストには常に `lang/` システムを使用してください
* **アンインストール時にクリーンアップする** — アンインストールスクリプトでデータベーステーブルと設定を削除してください
* **有効状態を確認する** — イベントサブスクライバーでは、ロジックを実行する前に `$this->plugin->isEnabled()` を呼び出してください。例外は削除時のクリーンアップです。行はプラグインが無効化された後も残るため、インストール済みでガードします