# コースツールプラグイン

コースツールプラグインは、ドキュメント、演習、フォーラムなどの組み込みツールと並んで、コースホームページに新しいツールを追加します。

## コースツールプラグインの仕組み

プラグインがコースツールとして自身を登録すると、次のようになります。

1. コースホームページのツールグリッドに表示される
2. 教師は他のツールと同様に表示／非表示を切り替えられる
3. ツールをクリックすると、コースコンテキスト内でプラグインのインターフェースが開く

## コースツールとしての登録

プラグインクラスで `$isCoursePlugin = true` を設定します。コースホームページにツールアイコンを自動追加するには、あわせて `$addCourseTool = true` も設定します。

```php
class MyToolPlugin extends Plugin
{
    protected function __construct()
    {
        parent::__construct('1.0', 'Author');
        $this->isCoursePlugin = true;
        $this->addCourseTool = true;
    }
}
```

## コース単位の設定

`$course_settings` プロパティでコースレベルの設定フィールドを定義します。

```php
public array $course_settings = [
    ['name' => 'my_plugin_enabled', 'type' => 'checkbox', 'default' => false],
    ['name' => 'my_plugin_limit',   'type' => 'text',     'default' => '10'],
];
```

これらはコース設定パネルに表示され、`validateCourseSetting(string $variable)` をオーバーライドして検証できます（値を拒否する場合は `false` を返す）。または `course_settings_updated(array $values)` で処理できます。

## インストールとアンインストール

インストール時に既存のすべてのコースへプラグインフィールドを登録するには:

```php
public function install(): void
{
    $this->install_course_fields_in_all_courses(add_tool_link: true);
}
```

単一のコースへインストールする場合（例: 新しいコースが作成されたとき）:

```php
$this->course_install(courseId: $courseId, addToolLink: true);
```

特定のコースからフィールドを削除するには:

```php
$this->uninstall_course_fields(courseId: $courseId);
```

## 統合ポイント

コースツールプラグインは次を通じて統合されます。

* **`LegacyPluginCourseTool`** (`src/CoreBundle/Tool/LegacyPluginCourseTool.php`) — プラグインをコース内のツールとして登録する
* **`CToolStateProvider`** (`src/CoreBundle/State/CToolStateProvider.php`) — コースホームページに表示されるツール（プラグインツールを含む）を解決する
* ツールはコースの `CTool` コレクションに現れる

## コースコンテキスト

学習者がプラグインのツールをクリックすると、プラグインコードはコースコンテキスト内で実行されます。次にアクセスできます。

* 現在のコース（`api_get_course_id()` または CID リクエストストア経由）
* 現在のセッション（該当する場合）
* 現在のユーザー
* コースレベルのプラグイン設定

## 例

組み込みのコースツールプラグイン:

* **BigBlueButton** (`Bbb/`) — コース内でのビデオ会議
* **Zoom** (`Zoom/`) — コース内での Zoom ミーティング
* **OnlyOffice** (`Onlyoffice/`) — コース内での文書編集