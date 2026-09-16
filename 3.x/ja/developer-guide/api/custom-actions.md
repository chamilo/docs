# カスタムアクション

標準的な CRUD 操作に加え、Chamilo には専門的な処理を担うカスタム API アクションコントローラーが多数（数十件規模）あります。正確な件数はリリースによって異なります。現行の一覧は `src/CoreBundle/Controller/Api/` を参照してください。

## 配置場所

カスタムアクションは `src/CoreBundle/Controller/Api/` にあります。

## 主なカスタムアクション

### ドキュメント

| Controller | Purpose |
|-----------|---------|
| `CreateDocumentFileAction` | ファイルのアップロード、またはフォルダー／リンクドキュメントの作成 |
| `UpdateDocumentFileAction` | ドキュメントのファイルを置き換える |
| `ReplaceDocumentFileAction` | ID を維持したままドキュメントファイルを置き換える |
| `MoveDocumentAction` | ドキュメントを別のフォルダーへ移動する |
| `UpdateVisibilityDocument` | 学習者向けのドキュメント可視性を切り替える |
| `DownloadAllDocumentsAction` | フォルダー内の全ドキュメントを ZIP としてダウンロードする |
| `DownloadSelectedDocumentsAction` | 選択したドキュメント一式を ZIP としてダウンロードする |
| `DocumentUsageAction` | ドキュメントが使用されているコース／セッションを一覧する |
| `DocumentLearningPathUsageAction` | ドキュメントが使用されているラーニングパスを一覧する |

### 用語集

| Controller | Purpose |
|-----------|---------|
| `CreateCGlossaryAction` | 用語集の用語を作成する |
| `UpdateCGlossaryAction` | 用語集の用語を更新する |
| `ExportCGlossaryAction` | 用語集をファイルへエクスポートする |
| `ImportCGlossaryAction` | ファイルから用語集をインポートする |
| `ExportGlossaryToDocumentsAction` | 用語集をコース内のドキュメントとしてエクスポートする |
| `GetGlossaryCollectionController` | カスタムフィルタ付きで用語集コレクションを取得する |

### リンク

| Controller | Purpose |
|-----------|---------|
| `CreateCLinkAction` | 外部リンクを作成する |
| `UpdateCLinkAction` | 外部リンクを更新する |
| `CreateCLinkCategoryAction` | リンクカテゴリを作成する |
| `UpdateCLinkCategoryAction` | リンクカテゴリを更新する |
| `CheckCLinkAction` | リンク URL が到達可能かを確認する |
| `ExportCLinksAction` | リンクをファイルへエクスポートする |
| `CLinkDetailsController` | リンクの詳細を取得する |
| `CLinkImageController` | リンクのプレビュー画像を取得または設定する |
| `GetLinksCollectionController` | カスタムフィルタ付きでリンクコレクションを取得する |
| `UpdateVisibilityLink` | リンクの可視性を切り替える |
| `UpdateVisibilityLinkCategory` | リンクカテゴリの可視性を切り替える |
| `UpdatePositionLink` | リンクの並び順を変更する |

### ラーニングパス

| Controller | Purpose |
|-----------|---------|
| `CreateCLpAction` | ラーニングパスを作成する |
| `LpReorderController` | ラーニングパス項目の並び順を変更する |

### カレンダー

| Controller | Purpose |
|-----------|---------|
| `UpdateCCalendarEventAction` | コースカレンダーのイベントを更新する |
| `CalendarMyStudentsScheduleAction` | 教師の担当学習者のスケジュールを取得する |

### ブログ

| Controller | Purpose |
|-----------|---------|
| `CreateCBlogAction` | ブログ投稿を作成する |
| `CreateBlogAttachmentAction` | ブログ投稿にファイルを添付する |
| `UpdateVisibilityBlog` | ブログの可視性を切り替える |

### ドロップボックス

| Controller | Purpose |
|-----------|---------|
| `CreateDropboxFileAction` | ドロップボックス（ファイル交換ツール）へファイルをアップロードする |

### 学生課題（課題）

| Controller | Purpose |
|-----------|---------|
| `CreateStudentPublicationFileAction` | 課題ファイルを提出する |
| `CreateStudentPublicationCommentAction` | 提出物にコメントを追加する |
| `CreateStudentPublicationCorrectionFileAction` | 提出物の添削ファイルをアップロードする |

### 個人ファイル

| Controller | Purpose |
|-----------|---------|
| `CreatePersonalFileAction` | ユーザーの個人ファイル領域へファイルをアップロードする |
| `UpdatePersonalFileAction` | 個人ファイルを更新する |

### ソーシャル

| Controller | Purpose |
|-----------|---------|
| `LikeSocialPostController` | ソーシャル投稿に「いいね」する |
| `DislikeSocialPostController` | ソーシャル投稿の「いいね」を解除する |
| `CreateSocialPostAttachmentAction` | ソーシャル投稿にファイルを添付する |
| `SocialPostAttachmentsController` | ソーシャル投稿の添付ファイルを一覧する |
| `AbstractFeedbackSocialPostController` | ソーシャル投稿のフィードバックアクション用基底クラス |

### セッション

| Controller | Purpose |
|-----------|---------|
| `CreateSessionWithUsersAndCoursesAction` | セッションを作成し、ユーザーとコースを一度の呼び出しで登録する |

### ユーザーとアクセス URL

| Controller | Purpose |
|-----------|---------|
| `CreateUserOnAccessUrlAction` | ユーザーを作成し、アクセス URL に関連付ける |
| `UserAccessUrlsController` | ユーザーが所属するアクセス URL を一覧する |
| `UserSkillsController` | ユーザーに付与されたスキルを一覧する |

### ビデオ会議

| Controller | Purpose |
|-----------|---------|
| `VideoConferenceCallbackController` | 外部ビデオ会議プロバイダーからのコールバックを処理する |

### 基底クラス

| Class | Purpose |
|-------|---------|
| `BaseResourceFileAction` | ファイルアップロードアクションの基底クラス。マルチパート解析、リソースノード作成、ストレージを扱う |

## カスタムアクションの実装

カスタムアクションは、API Platform のオペレーション定義で参照される標準の Symfony コントローラーです。`#[ApiResource]` 属性は**エンティティ**に付与し、各オペレーションの `controller:` パラメーターがアクションクラスを指します。

```php
// On the entity class (e.g. src/CourseBundle/Entity/CDocument.php):
#[ApiResource(
    shortName: 'Document',
    operations: [
        new Post(
            controller: CreateDocumentFileAction::class,
            deserialize: false,
        ),
        new Put(
            uriTemplate: '/documents/{iid}/move',
            controller: MoveDocumentAction::class,
            deserialize: false,
        ),
    ]
)]
class CDocument extends AbstractResource { ... }
```

アクションクラス自体は、呼び出し可能なプレーンなコントローラーです。サービスは `__invoke()` メソッドの引数として注入されます。

```php
namespace Chamilo\CoreBundle\Controller\Api;

use Chamilo\CourseBundle\Entity\CDocument;
use Symfony\Component\HttpFoundation\Request;

final class CreateDocumentFileAction extends BaseResourceFileAction
{
    public function __invoke(
        Request $request,
        CDocumentRepository $repo,
        // ... other injected services
    ): CDocument {
        // Handle the upload and return the entity
    }
}
```

要点:
- アクションが JSON ボディのデシリアライズを API Platform に任せず、リクエストを直接読み取る場合（例: マルチパートのファイルアップロード）は、`deserialize: false` を設定します。
- ファイルアップロード用のアクションは通常 `BaseResourceFileAction` を継承し、マルチパートの解析とリソースノードの配線を処理します。
- セキュリティはコントローラー内部ではなく、オペレーションの `security:` パラメーターで強制します。