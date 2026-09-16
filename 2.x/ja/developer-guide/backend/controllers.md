# コントローラー

Chamilo 2.0では、バンドル全体にわたって多数のコントローラー（数十のオーダー）が使用されています。正確な数はバージョンによって変動します。以下の名前は例示的なものであり、網羅的なものではありません。

## コントローラーの種類

### 管理者コントローラー

`src/CoreBundle/Controller/Admin/` に配置されています。プラットフォームの管理を処理します：

* `AdminController` — ダッシュボード、ファイル情報、メールテスト
* `UserListController` — ユーザーのCRUD操作
* `CourseListController` — コース管理
* `SessionAdminController` — セッション管理
* `SettingsController` — プラットフォーム設定
* `SecurityController` — ログイン試行、IDSイベント
* `PluginsController` — プラグイン管理
* `RoomController` — ルーム管理

### APIアクションコントローラー

`src/CoreBundle/Controller/Api/` にあるカスタムAPI Platformアクション：

これらはAPI Platformの組み込みCRUDをカスタムビジネスロジックで拡張します。例：

* `CreateDocumentFileAction` — ドキュメント用のファイルアップロード
* `CreateStudentPublicationFileAction` — 課題提出のアップロード
* `UpdateVisibilityDocument` — ドキュメントの可視性切り替え
* `ExportCGlossaryAction` — 用語集のエクスポート
* `MoveDocumentAction` — ドキュメントを別のフォルダに移動

専用のHTTPコントローラーが不要な読み書き操作、つまりアイテムやコレクションの取得や保存方法を変更するだけの場合は、**State Provider** または **State Processor** を優先してください（以下参照）。APIアクションコントローラーは、リクエストレベルのロジック（ファイルアップロード、カスタムレスポンス形式、複数ステップのフロー）が必要なエンドポイントに最適です。

### AIコントローラー

`src/CoreBundle/Controller/AiController.php` は、AI関連のエンドポイント（Aiken形式の質問生成、ラーニングパスの生成、画像/動画生成、自由回答の採点、ドキュメント分析など）のエントリーポイントです。ルートの正確なセットは急速に進化します。ここにコピーを頼るのではなく、コントローラーの `#[Route]` 属性を参照して最新のリストを確認してください。

### チャットコントローラー

`src/CoreBundle/Controller/ChatController.php` は、リアルタイムチャットとAIチューターを処理します：

* ユーザー間メッセージング
* AIチューターチャット（ドッキングされたチャットパネル）
* メッセージ履歴とポーリング

## API PlatformのState ProviderとProcessor

すべてのAPIエンドポイントがコントローラーに裏打ちされているわけではありません。API Platform 3では、作業が2つのインターフェースに分割されています：

* **State Providers** (`ApiPlatform\State\ProviderInterface`) — `GET` 操作（単一アイテムまたはコレクション）のデータを返します。
* **State Processors** (`ApiPlatform\State\ProcessorInterface`) — `POST`、`PUT`、`PATCH`、`DELETE` 操作の書き込みを処理します。

Chamiloの実装は `src/CoreBundle/State/` に存在し（約35以上のクラス）、ルートではなく `#[ApiResource]` 操作の `provider:` および `processor:` 引数を介してエンティティに結び付けられています。

### 使用するタイミング

以下の場合に、APIアクションコントローラーの代わりにプロバイダー/プロセッサーを使用してください：

* エンドポイントが標準的なREST形状（リスト/読み取り/作成/更新/削除）に従うが、カスタムデータ組み立てや永続化ロジックが必要な場合。
* コレクションやアイテムの読み取り結果をフィルタリング、正規化、または充実させる必要がある場合（例：現在のアクセスURL、コースコンテキスト、または可視性ルールを尊重する）。
* 書き込み時に副作用（監査ログ、ファイル生成、関連エンティティの更新）を実行する必要があるが、API Platformの正規化、検証、ページネーションパイプラインを維持したい場合。
* カスタムルートを登録せずに、操作をOpenAPI / Hydraスキーマで発見可能に保ちたい場合。

一方で、エンドポイントが生の `Request` アクセスを必要とする、非リソースペイロード（ファイルダウンロード、CSV、リダイレクト）を返す、または複数ステップのフローを調整する場合、`src/CoreBundle/Controller/Api/` にあるAPIアクションコントローラーがより適しています。

### エンティティへの結び付け

操作上でクラスを参照します：

```php
#[ApiResource(
    operations: [
        new GetCollection(provider: UserCollectionStateProvider::class),
        new Post(processor: ColorThemeStateProcessor::class),
    ]
)]
class ColorTheme { ... }
```

### プロバイダーの例

`src/CoreBundle/State/DocumentProvider.php` はURI変数によって `CDocument` を解決し、見つからない場合は `NotFoundHttpException` をスローします：

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

### プロセッサの例

`src/CoreBundle/State/ColorThemeStateProcessor.php` はデフォルトの Doctrine `persistProcessor` に処理を委譲し、その後で副作用を実行します（テーマの Flysystem ファイルシステム上に CSS ファイルを生成し、テーマを現在のアクセス URL にリンクします）：

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

* **デフォルトプロセッサとの連携**：`ProcessorInterface $persistProcessor`（Doctrine の組み込み）をデコレートすることで、Chamilo 固有のロジックが標準の永続化処理の「周囲」で実行されるようにし、標準処理を置き換えるのではなく連携します。
* **コレクションプロバイダは独自のページネーションを行う**：コレクションプロバイダがカスタムクエリを構築する場合、`?page`、`?itemsPerPage`、および検索フィルタを尊重する必要があります。API Platform の自動ページネーターはデフォルトの Doctrine コレクションプロバイダでのみ機能します。
* **リソース＋操作種別ごとに1つのクラスが一般的**：ただし、プロバイダは複数の操作を提供することも可能です（`UsergroupStateProvider` を参照。これは `Usergroup` に対する4つの操作で再利用されています）。
* **命名規則**：リソース全体のハンドラには `<Entity>StateProvider` / `<Entity>StateProcessor` を使用し、特定の操作には `<Entity><Action>Processor`（例：`CBlogAssignAuthorProcessor`、`CStudentPublicationDeleteProcessor`）を使用します。

## ルーティング

コントローラはルート定義に **PHP 8 の属性** を使用します：

```php
#[Route('/admin/user-list')]
class UserListController extends AbstractController
{
    #[Route('/', name: 'admin_user_list')]
    public function index(): Response { ... }
}
```

API Platform のリソースはエンティティに `#[ApiResource]` 属性を使用し、カスタム操作はコントローラのアクションを指します。

## トレイト

コントローラは共通の機能のために共有トレイトを使用します：

* `ControllerTrait` — 設定、シリアライザ、および共通サービスへのアクセス
* `CourseControllerTrait` — コースコンテキストのヘルパー
* `ResourceControllerTrait` — リソースノードの操作