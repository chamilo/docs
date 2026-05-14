# プラグインアーキテクチャ

## プラグインの場所

プラグインは `public/plugin/` に保存されています。各プラグインは独自のディレクトリを持っています：

```
public/plugin/
├── Bbb/                    # BigBlueButtonとの統合
├── Zoom/                   # Zoomとの統合
├── Onlyoffice/             # OnlyOfficeでのドキュメント編集
├── XApi/                   # xAPI/Tin Can
├── ...                     # 含まれているプラグインは public/plugin/ に提供されています
```

## プラグインの構造

典型的なプラグインディレクトリには以下が含まれます：

```
public/plugin/MyPlugin/
├── plugin.php              # 必須 — $plugin_info を定義
├── install.php             # インストールスクリプト
├── uninstall.php           # アンインストールスクリプト
├── index.php               # 地域のレンダリングのためのエントリーポイント（該当する場合）
├── admin.php               # 管理インターフェース（オプション）
├── lang/                   # 翻訳ファイル（ロケールコード：en_US.php, fr_FR.php, …）
├── src/
│   ├── MyPluginPlugin.php        # プラグインのメインクラス（Pluginを拡張）
│   ├── Entity/                   # Doctrineエンティティ（自動的に検出）
│   ├── Repository/               # Doctrineリポジトリ
│   └── EventSubscriber/          # Symfonyイベントサブスクライバー（自動的に登録）
├── templates/              # Twigテンプレート
└── resources/              # CSS/JSアセット
```

## プラグインクラス

各プラグインはベースクラス `Plugin`（`public/main/inc/lib/plugin.class.php`）を拡張し、シングルトンパターンに従います：

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

### クラスの主要プロパティ

| プロパティ | タイプ | 効果 |
|-------------|------|--------|
| `$isCoursePlugin` | bool | プラグインをコースツールとして登録 |
| `$isAdminPlugin` | bool | 管理インターフェースページを追加 |
| `$isMailPlugin` | bool | メールシステムと統合 |
| `$addCourseTool` | bool | コースのホームページにアイコンを追加 |
| `$course_settings` | array | コースごとの設定フィールドを定義 |

## プラグインのライフサイクル

1. **インストール** — 管理者がプラグインを有効化し、`install.php` を実行
2. **設定** — 設定は管理パネルで定義および管理され、`access_url_rel_plugin` に保存（マルチテナント対応）
3. **実行** — プラグインは表示領域にコンテンツを注入するか、プラットフォームのイベントに反応
4. **無効化** — プラグインは無効化されるが、データは保持される
5. **アンインストール** — `uninstall.php` を実行してデータとテーブルをクリア

## 表示領域

プラグインは `renderRegion()` をオーバーライドすることで、Vueフロントエンドの18の定義済み領域にHTMLを注入します：

```php
public function renderRegion(string $region): string
{
    if ('footer_left' !== $region) {
        return '';
    }
    return '<p>私のプラグインのフッターコンテンツ</p>';
}
```

利用可能な領域：`content_bottom`, `content_top`, `course_tool_plugin`, `footer_center`, `footer_left`, `footer_right`, `header_center`, `header_left`, `header_main`, `header_right`, `login_bottom`, `login_top`, `main_bottom`, `main_top`, `menu_administrator`, `menu_bottom`, `menu_top`, `pre_footer`。

## Symfonyとの統合

### イベントサブスクライバー

`src/EventSubscriber/` 内に配置された `EventSubscriber.php` で終わるファイルは、`PluginEventSubscriberPass` を介して自動的に登録されます。これらは `EventSubscriberInterface` を実装し、`src/CoreBundle/Event/Events.php` で定義されたイベントに反応します。

プラグインクラス（`MyPluginPlugin`）はSymfonyサービスではないため、サブスクライバーのコンストラクタに自動的に注入できません。代わりにシングルトン `create()` を使用してください：

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

### Doctrineエンティティ

`src/Entity/` に配置されたDoctrineエンティティは、`PluginEntityPass` によって自動的に検出されます。マッピングにはPHP 8の属性を使用してください。名前空間は `Chamilo\PluginBundle\{PluginName}` に従う必要があります。衝突を避けるために、テーブル名には一意のプレフィックス（例：`my_plugin_*`）を使用してください。

---
### PluginHelper サービス

Symfony の主要サービスからプラグインの状態にアクセスするには、プラグインクラスを直接インスタンス化するのではなく、`PluginHelper` を注入してください：

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

利用可能なメソッド：

| メソッド | 目的 |
|--------|------------|
| `isPluginEnabled(string $name): bool` | 現在のアクセスURLに対してプラグインがインストールされ、アクティブであるかを確認します |
| `loadLegacyPlugin(string $name): ?object` | プラグインのシングルトンをインスタンス化して返します |
| `getPluginSetting(string $name, string $key): mixed` | プラグインの単一の設定値を読み取ります |
| `getPluginOverrides(string $name): array` | プラグインの `plugin.yaml` からの上書き設定（デフォルト＋アクセスURL固有）を取得します |

## 主要ファイルの参照

| ファイル | 目的 |
|------|------------|
| `public/main/inc/lib/plugin.class.php` | プラグインのベースクラス |
| `public/main/inc/lib/plugin.lib.php` | プラグインマネージャ |
| `src/CoreBundle/Entity/Plugin.php` | プラグインのDoctrineエンティティ |
| `src/CoreBundle/Helpers/PluginHelper.php` | PluginHelper サービス |
| `src/CoreBundle/Event/Events.php` | イベント定数 |
| `public/plugin/HelloWorld/` | 最小限のプラグイン例 |
| `public/plugin/TopLinks/` | シンプルなプラグイン例 |