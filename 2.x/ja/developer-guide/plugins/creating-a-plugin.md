# プラグインの作成

このガイドでは、Chamilo用の基本的なプラグインの作成について説明します。詳細については、[プラグイン開発に関するWikiページ](https://github.com/chamilo/chamilo-lms/wiki/Plugin-development)を参照してください。

## ステップ1：プラグインディレクトリの作成

`public/plugin/`内にディレクトリを作成します。ディレクトリ名はプラグインの識別子と一致する必要があります：

```
public/plugin/MyPlugin/
```

## ステップ2：プラグインクラスの定義

`src/MyPluginPlugin.php`ファイルを作成します。このクラスは`Plugin`を継承し、シングルトンパターンに従います：

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

| タイプ       | 説明                          |
|------------|-------------------------------|
| `boolean`  | オン/オフのチェックボックス       |
| `text`     | 1行のテキスト入力               |
| `select`   | ドロップダウンメニュー（`options`配列を提供） |
| `wysiwyg`  | リッチテキストエディタ          |
| `html`     | 生のHTMLフィールド             |
| `checkbox` | チェックボックス              |
| `user`     | ユーザーセレクター            |

`select`タイプの設定の場合：

```php
$settings = [
    'mode' => [
        'type'             => 'select',
        'options'          => ['auto' => 'Automatic', 'manual' => 'Manual'],
        'translate_options' => true,
    ],
];
```

実行時に設定にアクセス：

```php
$plugin = MyPluginPlugin::create();
$key  = $plugin->get('api_key');       // 単一の値
$all  = $plugin->get_settings();       // すべての設定
```

## ステップ3：plugin.phpファイルの作成

プラグインのルートにある`plugin.php`ファイルは**必須**です。このファイルでは`$plugin_info`を割り当てる必要があります：

```php
<?php
$plugin_info = MyPluginPlugin::create()->get_info();
```

## ステップ4：インストールおよびアンインストールスクリプトの作成

`install.php`：

```php
<?php
MyPluginPlugin::create()->install();
```

`uninstall.php`：

```php
<?php
MyPluginPlugin::create()->uninstall();
```

Doctrineの`SchemaTool`を使用して、クラス内でスキーマの作成/削除を実装します。

## ステップ5：翻訳の追加

`lang/`内に言語ファイルを作成し、ロケールコードを使用します（例：`en_US.php`、`fr_FR.php`、`es_ES.php`）。フォールバックは`en_US.php`です。

```php
<?php
// lang/en_US.php
$strings['plugin_title']   = 'My Plugin';
$strings['plugin_comment'] = 'Description of what this plugin does.';
$strings['tool_enable']    = 'Enable plugin';
$strings['api_key']        = 'API Key';
$strings['api_key_help']   = 'Enter the API key from your account.';
```

翻訳には`$plugin->get_lang('key')`を介してアクセスします。

## ステップ6：表示領域を介したコンテンツの注入

プラグインは、Vueフロントエンドの18の定義済み領域にHTMLを注入できます。クラス内で`renderRegion()`をオーバーライドします：

```php
public function renderRegion(string $region): string
{
    if ('header_right' !== $region) {
        return '';
    }
    return '<div class="my-plugin-widget">Hello!</div>';
}
```

利用可能な領域には以下が含まれます：`content_bottom`、`content_top`、`course_tool_plugin`、`footer_center`、`footer_left`、`footer_right`、`header_center`、`header_left`、`header_main`、`header_right`、`login_bottom`、`login_top`、`main_bottom`、`main_top`、`menu_administrator`、`menu_bottom`、`menu_top`、`pre_footer`。

## ステップ7：プラットフォームイベントへの反応（オプション）

プラグインは、Symfonyのイベントサブスクライバを使用してプラットフォームイベントに反応できます。`src/EventSubscriber/`内に`EventSubscriber.php`で終わるファイルを作成すると、`PluginEventSubscriberPass`を介して自動的に登録されます。

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
        // プラグインクラスはSymfonyサービスではありません — create()シングルトンを使用します。
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
        // ここにロジックを記述
    }
}
```

利用可能なイベントの完全なリストについては、`src/CoreBundle/Event/Events.php`を参照してください（ユーザー、コース、セッション、LP、演習、ポートフォリオ、認証など）。

## ステップ8：ライフサイクルフック

プラットフォームのアクションに応答するために、プラグインクラス内で以下のメソッドをオーバーライドしてください：

| メソッド | トリガーされるタイミング |
|--------|------------------|
| `install()` | プラグインが有効化されたとき |
| `uninstall()` | プラグインが削除されたとき |
| `performActionsAfterConfigure()` | 管理者が設定フォームを保存したとき |
| `course_settings_updated(array $values)` | コースレベルの設定が変更されたとき |
| `validateCourseSetting(string $variable)` | コース設定が保存されたとき（拒否する場合は `false` を返す） |
| `doWhenDeletingUser(int $userId)` | ユーザーが削除されたとき |
| `doWhenDeletingCourse(int $courseId)` | コースが削除されたとき |
| `doWhenDeletingSession(int $sessionId)` | セッションが削除されたとき |

## ステップ9：有効化

管理者としてログインし、**プラグイン管理**に移動して、作成したプラグインを見つけ、**有効化**をクリックしてください。

## ヒント

* **既存のプラグインを参考にする** — `public/plugin/HelloWorld/` や `public/plugin/TopLinks/` はシンプルな参考例として役立ちます
* **翻訳を使用する** — ユーザー向けのテキストには常に `lang/` システムを利用してください
* **アンインストール時にクリーンアップする** — アンインストールスクリプトでデータベーステーブルや設定を削除してください
* **有効化状態を確認する** — イベントサブスクライバーでは、常に `$this->plugin->isEnabled()` を呼び出してロジックを実行する前に確認してください