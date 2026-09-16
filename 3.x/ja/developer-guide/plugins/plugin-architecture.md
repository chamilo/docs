# プラグインアーキテクチャ

## プラグインの配置場所

プラグインは `public/plugin/` に格納されます。各プラグインは独自のディレクトリを持ちます。

```
public/plugin/
├── Bbb/                    # BigBlueButton integration
├── Zoom/                   # Zoom integration
├── Onlyoffice/             # OnlyOffice document editing
├── XApi/                   # xAPI/Tin Can
├── ...                     # bundled plugins ship under public/plugin/
```

## プラグインの構成

典型的なプラグインディレクトリには次のものが含まれます。

```
public/plugin/MyPlugin/
├── plugin.php              # REQUIRED — assigns $plugin_info
├── install.php             # Installation script
├── uninstall.php           # Uninstallation script
├── index.php               # Region rendering entry point (if applicable)
├── admin.php               # Admin interface (optional)
├── lang/                   # Translation files (locale codes: en_US.php, fr_FR.php, …)
├── src/
│   ├── MyPluginPlugin.php        # Main plugin class (extends Plugin)
│   ├── Entity/                   # Doctrine entities (auto-discovered)
│   ├── Repository/               # Doctrine repositories
│   └── EventSubscriber/          # Symfony event subscribers (auto-registered)
├── templates/              # Twig templates
└── resources/              # CSS/JS assets
```

## プラグインクラス

各プラグインは `Plugin` 基底クラス（`public/main/inc/lib/plugin.class.php`）を継承し、シングルトンパターンに従います。

```php
class MyPluginPlugin extends Plugin
{
    protected function __construct()
    {
        $settings = ['api_key' => 'text', 'enabled' => 'boolean'];
        parent::__construct('1.0', 'Author Name', $settings);
    }

    public static function create(): static
    {
        static $instance = null;
        return $instance ??= new static();
    }
}
```

### 主要なクラスプロパティ

| プロパティ | 型 | 効果 |
|----------|------|--------|
| `$isCoursePlugin` | bool | プラグインをコースツールとして登録する |
| `$isAdminPlugin` | bool | 管理画面のページを追加する |
| `$isMailPlugin` | bool | メールシステムと連携する |
| `$addCourseTool` | bool | コースホームページにアイコンを追加する |
| `$course_settings` | array | コース単位の設定項目を定義する |

## プラグインのライフサイクル

1. **インストール** — 管理者がプラグインを有効化し、`install.php` が実行される
2. **設定** — 設定は管理パネルで定義・管理され、`access_url_rel_plugin` に保存される（マルチテナント対応）
3. **実行** — プラグインが表示リージョンにコンテンツを注入するか、プラットフォームイベントに反応する
4. **無効化** — プラグインは無効になるが、データは保持される
5. **アンインストール** — `uninstall.php` を実行し、データとテーブルをクリーンアップする

## 表示リージョン

プラグインは `renderRegion()` をオーバーライドすることで、Vue フロントエンドの 18 の定義済みリージョンに HTML を注入します。

```php
public function renderRegion(string $region): string
{
    if ('footer_left' !== $region) {
        return '';
    }
    return '<p>My Plugin footer content</p>';
}
```

利用可能なリージョン: `content_bottom`、`content_top`、`course_tool_plugin`、`footer_center`、`footer_left`、`footer_right`、`header_center`、`header_left`、`header_main`、`header_right`、`login_bottom`、`login_top`、`main_bottom`、`main_top`、`menu_administrator`、`menu_bottom`、`menu_top`、`pre_footer`。

## Symfony 連携

### イベントサブスクライバー

`src/EventSubscriber/` 内に置かれた `EventSubscriber.php` で終わるファイルは、`PluginEventSubscriberPass` により自動登録されます。これらは `EventSubscriberInterface` を実装し、`src/CoreBundle/Event/Events.php` で定義されたイベントに反応します。

プラグインクラス（`MyPluginPlugin`）は Symfony サービスではないため、サブスクライバーのコンストラクタにオートワイヤできません。代わりに `create()` シングルトンを使用します。

```php
class MyPluginEventSubscriber implements EventSubscriberInterface
{
    private MyPluginPlugin $plugin;

    public function __construct()
    {
        $this->plugin = MyPluginPlugin::create();
    }
}
```

### Doctrine エンティティ

`src/Entity/` に置かれた Doctrine エンティティは、`PluginEntityPass` により自動検出されます。マッピングには PHP 8 の属性を使用します。名前空間は `Chamilo\PluginBundle\{PluginName}` に従う必要があります。衝突を避けるため、一意のテーブル名プレフィックス（例: `my_plugin_*`）を使用してください。

### PluginHelper サービス

コアの Symfony サービスからプラグインの状態にアクセスする場合は、プラグインクラスを直接インスタンス化せず、`PluginHelper` を注入してください。

```php
use Chamilo\CoreBundle\Helpers\PluginHelper;

class SomeService
{
    public function __construct(private readonly PluginHelper $pluginHelper) {}

    public function doSomething(): void
    {
        if ($this->pluginHelper->isPluginEnabled('MyPlugin')) {
            $value = $this->pluginHelper->getPluginSetting('MyPlugin', 'api_key');
        }
    }
}
```

利用可能なメソッド:

| Method | Purpose |
|--------|---------|
| `isPluginEnabled(string $name): bool` | プラグインがインストール済みで、現在のアクセス URL に対して有効かどうかを確認する |
| `loadLegacyPlugin(string $name): ?object` | プラグインのシングルトンをインスタンス化して返す |
| `getPluginSetting(string $name, string $key): mixed` | 単一のプラグイン設定値を読み取る |
| `getPluginOverrides(string $name): array` | プラグインの `plugin.yaml` オーバーライド（デフォルト + アクセス URL 固有）を取得する |

## コアファイル参照

| File | Purpose |
|------|---------|
| `public/main/inc/lib/plugin.class.php` | プラグイン基底クラス |
| `public/main/inc/lib/plugin.lib.php` | プラグインマネージャー |
| `src/CoreBundle/Entity/Plugin.php` | プラグイン Doctrine エンティティ |
| `src/CoreBundle/Helpers/PluginHelper.php` | PluginHelper サービス |
| `src/CoreBundle/Event/Events.php` | イベント定数 |
| `public/plugin/HelloWorld/` | 最小構成のサンプルプラグイン |
| `public/plugin/TopLinks/` | シンプルなサンプルプラグイン |