# Controllers

Chamilo 3.0 は、バンドル全体に整理された多数のコントローラー（数十のオーダー）を使用します。正確な数はバージョンごとに変動します。以下の名前は網羅的ではなく、例示として扱ってください。

## Controller Types

### Admin Controllers

`src/CoreBundle/Controller/Admin/` にあります。プラットフォーム管理を担当します。

* `AdminController` — ダッシュボード、ファイル情報、メールテスト
* `UserListController` — ユーザー CRUD
* `CourseListController` — コース管理
* `SessionAdminController` — セッション管理
* `SettingsController` — プラットフォーム設定
* `SecurityController` — ログイン試行、IDS イベント
* `PluginsController` — プラグイン管理
* `RoomController` — ルーム管理

### API Action Controllers

`src/CoreBundle/Controller/Api/` にあるカスタム API Platform アクションです。

これらは API Platform 組み込みの CRUD をカスタムビジネスロジックで拡張します。例:

* `CreateDocumentFileAction` — ドキュメント用ファイルアップロード
* `CreateStudentPublicationFileAction` — 課題提出のアップロード
* `UpdateVisibilityDocument` — ドキュメントの可視性の切り替え
* `ExportCGlossaryAction` — 用語集のエクスポート
* `MoveDocumentAction` — ドキュメントを別フォルダへ移動

専用の HTTP コントローラーを必要としない読み書き操作、つまりアイテムやコレクションの取得・永続化の*方法*だけを変えたい場合は、**State Provider** または **State Processor**（後述）を優先してください。API Action Controllers は、リクエストレベルのロジックが本当に必要なエンドポイント（ファイルアップロード、カスタム応答形式、多段階フロー）に予約するのが最適です。

### AI Controller

`src/CoreBundle/Controller/AiController.php` は AI 関連エンドポイント（Aiken 問題生成、学習パス生成、画像/動画生成、自由記述採点、ドキュメント分析など）のエントリーポイントです。ルートの正確な集合は急速に変化します。ここにコピーした内容に頼らず、コントローラーの `#[Route]` 属性を読んで現在の一覧を確認してください。

### Chat Controller

`src/CoreBundle/Controller/ChatController.php` はリアルタイムチャットと AI チューターを扱います。

* ユーザー間メッセージング
* AI チューターチャット（ドッキングされたチャットパネル）
* メッセージ履歴とポーリング

## API Platform State Providers & Processors

すべての API エンドポイントがコントローラーに裏打ちされているわけではありません。API Platform 4 は作業を 2 つのインターフェースに分割します。

* **State Providers** (`ApiPlatform\State\ProviderInterface`) — `GET` 操作（単一アイテムまたはコレクション）のデータを返します。
* **State Processors** (`ApiPlatform\State\ProcessorInterface`) — `POST`、`PUT`、`PATCH`、`DELETE` 操作の書き込みを処理します。

Chamilo の実装は `src/CoreBundle/State/` にあります（約 35 以上のクラス）。ルートではなく、`#[ApiResource]` 操作の `provider:` および `processor:` 引数を通じてエンティティに配線されます。

### When to use them

API Action Controller ではなく、プロバイダー/プロセッサーを使うのは次の場合です。

* エンドポイントが標準的な REST 形状（一覧 / 読み取り / 作成 / 更新 / 削除）に従うが、カスタムのデータ組み立てや永続化ロジックが必要なとき。
* コレクションまたはアイテム読み取りの結果をフィルタ、非正規化、または補強する必要があるとき（例: 現在の Access URL、コースコンテキスト、可視性ルールの尊重）。
* 書き込み時に副作用（監査ログ、ファイル生成、関連エンティティの更新）を実行しつつ、API Platform の正規化、検証、ページネーションパイプラインを維持したいとき。
* カスタムルートを登録せずに、操作を OpenAPI / Hydra スキーマで発見可能にしたいとき。

エンドポイントが生の `Request` アクセスを必要とする、非リソースのペイロード（ファイルダウンロード、CSV、リダイレクト）を返す、または多段階フローをオーケストレーションする場合は、`src/CoreBundle/Controller/Api/` の API Action Controller の方が適しています。

### Wiring on the entity

操作上でクラスを参照します。

```php
#[ApiResource(
    operations: [
        new GetCollection(provider: UserCollectionStateProvider::class),
        new Post(processor: ColorThemeStateProcessor::class),
    ]
)]
class ColorTheme { ... }
```

### Provider example

`src/CoreBundle/State/DocumentProvider.php` は URI 変数で `CDocument` を解決し、見つからない場合は `NotFoundHttpException` を投げます。

```php
final class DocumentProvider implements ProviderInterface
{
    public function __construct(private readonly EntityManagerInterface $entityManager) {}

    public function provide(Operation $operation, array $uriVariables = [], array $context = []): CDocument
    {
        $document = $this->entityManager->find(CDocument::class, $uriVariables['document_id'] ?? null);

        if (!$document instanceof CDocument) {
            throw new NotFoundHttpException('Document not found.');
        }

        return $document;
    }
}
```

### Processor の例

`src/CoreBundle/State/ColorThemeStateProcessor.php` は、デフォルトの Doctrine `persistProcessor` に処理を委譲したうえで、副作用を実行します（themes の Flysystem ファイルシステム上に CSS ファイルを生成し、テーマを現在の Access URL に関連付けます）。

```php
final readonly class ColorThemeStateProcessor implements ProcessorInterface
{
    public function __construct(
        private ProcessorInterface $persistProcessor,
        private AccessUrlHelper $accessUrlHelper,
        private EntityManagerInterface $entityManager,
        #[Autowire(service: 'oneup_flysystem.themes_filesystem')]
        private FilesystemOperator $filesystem,
    ) {}

    public function process($data, Operation $operation, array $uriVariables = [], array $context = []): ?ColorTheme
    {
        \assert($data instanceof ColorTheme);

        $colorTheme = $this->persistProcessor->process($data, $operation, $uriVariables, $context);

        // …generate colors.css, link to current AccessUrl, flush…

        return $colorTheme;
    }
}
```

### 知っておくべきパターン

* **デフォルトの processor と組み合わせる。** `ProcessorInterface $persistProcessor`（Doctrine 組み込み）をデコレートし、Chamilo 固有のロジックを標準の persist の*代わりに*ではなく、その*前後で*実行します。
* **コレクション用 provider は独自にページネーションを行う。** コレクション用 provider がカスタムクエリを組み立てる場合、`?page`、`?itemsPerPage`、および検索フィルターを尊重する必要があります。API Platform の自動ページネーターは、デフォルトの Doctrine コレクション用 provider に対してのみ動作します。
* **リソース＋操作の種類ごとに 1 クラスとするのが一般的**ですが、1 つの provider が複数の操作を担当することもできます（`Usergroup` 上の 4 つの操作で再利用される `UsergroupStateProvider` を参照）。
* **命名規則**: リソース全体のハンドラーは `<Entity>StateProvider` / `<Entity>StateProcessor`、より狭い操作は `<Entity><Action>Processor`（例: `CBlogAssignAuthorProcessor`、`CStudentPublicationDeleteProcessor`）。

## Routing

コントローラーはルート定義に **PHP 8 の属性** を使用します。

```php
#[Route('/admin/user-list')]
class UserListController extends AbstractController
{
    #[Route('/', name: 'admin_user_list')]
    public function index(): Response { ... }
}
```

API Platform のリソースはエンティティ上の `#[ApiResource]` 属性を使用し、カスタム操作はコントローラーのアクションを指します。

## Traits

コントローラーは共通機能のために共有トレイトを使用します。

* `ControllerTrait` — 設定、シリアライザー、および共通サービスへのアクセス
* `CourseControllerTrait` — コースコンテキストのヘルパー
* `ResourceControllerTrait` — リソースノードの操作