# コースツールプラグイン

コースツールプラグインは、コースのホームページに新しいツールを追加し、ドキュメント、演習、フォーラムなどの組み込みツールと並べて表示します。

## コースツールプラグインの仕組み

プラグインがコースツールとして登録されると：

1. コースのホームページのツールグリッドに表示されます
2. 教師は他のツールと同様に表示または非表示にすることができます
3. ツールをクリックすると、コースのコンテキスト内でプラグインのインターフェースが開きます

## コースツールとしての登録

プラグインクラス内で `$isCoursePlugin = true` を定義します。コースのホームページに自動的にツールアイコンを追加するには、`$addCourseTool = true` も定義します：

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

## コースごとの設定

コースレベルでの設定フィールドは、プロパティ `$course_settings` を通じて定義します：

```php
public array $course_settings = [
    ['name' => 'my_plugin_enabled', 'type' => 'checkbox', 'default' => false],
    ['name' => 'my_plugin_limit',   'type' => 'text',     'default' => '10'],
];
```

これらのフィールドはコースの設定パネルに表示され、`validateCourseSetting(string $variable)` をオーバーライドすることで検証（値を拒否する場合は `false` を返す）したり、`course_settings_updated(array $values)` を通じてトリガーしたりすることができます。

## インストールとアンインストール

インストール時に既存のすべてのコースにプラグインのフィールドを登録するには：

```php
public function install(): void
{
    $this->install_course_fields_in_all_courses(add_tool_link: true);
}
```

単一のコースにインストールする場合（たとえば、新しいコースが作成されたとき）：

```php
$this->course_install(courseId: $courseId, addToolLink: true);
```

特定のコースからフィールドを削除する場合：

```php
$this->uninstall_course_fields(courseId: $courseId);
```

## 統合ポイント

コースツールプラグインは以下の方法で統合されます：

* **`LegacyPluginCourseTool`** (`src/CoreBundle/Tool/LegacyPluginCourseTool.php`) — プラグインをコース内のツールとして登録します
* **`CToolStateProvider`** (`src/CoreBundle/State/CToolStateProvider.php`) — コースのホームページに表示されるツール（プラグインツールを含む）を決定します
* ツールはコースの `CTool` コレクションに表示されます

## コースのコンテキスト

学生がプラグインのツールをクリックすると、プラグインのコードはコースのコンテキスト内で実行されます。以下にアクセスできます：

* 現在のコース（`api_get_course_id()` またはリクエストストレージの CID を通じて）
* 現在のセッション（該当する場合）
* 現在のユーザー
* コースレベルのプラグイン設定

## 例

統合されたコースツールプラグインの例：

* **BigBlueButton** (`Bbb/`) — コース内でのビデオ会議
* **Zoom** (`Zoom/`) — コース内でのZoomミーティング
* **OnlyOffice** (`Onlyoffice/`) — コース内でのドキュメント編集