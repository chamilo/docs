# カスタムアクション

Chamiloでは、標準的なCRUD操作を超えて、特殊な操作を処理するカスタムAPIアクションコントローラが多数（数十程度）存在します。正確な数はリリースごとに異なります。現在のセットを確認するには、`src/CoreBundle/Controller/Api/` をリストアップしてください。

## 場所

カスタムアクションは `src/CoreBundle/Controller/Api/` にあります。

## 注目すべきカスタムアクション

### ドキュメント

| コントローラ | 目的 |
|-----------|---------|
| `CreateDocumentFileAction` | ファイルのアップロードまたはフォルダ/リンクドキュメントの作成 |
| `UpdateDocumentFileAction` | ドキュメントファイルの置き換え |
| `ReplaceDocumentFileAction` | ドキュメントファイルを置き換え、IDを保持 |
| `MoveDocumentAction` | ドキュメントを別のフォルダに移動 |
| `UpdateVisibilityDocument` | 学習者に対するドキュメントの表示/非表示を切り替え |
| `DownloadAllDocumentsAction` | フォルダ内のすべてのドキュメントをZIPとしてダウンロード |
| `DownloadSelectedDocumentsAction` | 選択したドキュメントセットをZIPとしてダウンロード |
| `DocumentUsageAction` | ドキュメントが使用されているコース/セッションを一覧表示 |
| `DocumentLearningPathUsageAction` | ドキュメントが使用されている学習パスを一覧表示 |

### 用語集

| コントローラ | 目的 |
|-----------|---------|
| `CreateCGlossaryAction` | 用語集の用語を作成 |
| `UpdateCGlossaryAction` | 用語集の用語を更新 |
| `ExportCGlossaryAction` | 用語集をファイルにエクスポート |
| `ImportCGlossaryAction` | 用語集をファイルからインポート |
| `ExportGlossaryToDocumentsAction` | 用語集をコース内のドキュメントとしてエクスポート |
| `GetGlossaryCollectionController` | カスタムフィルタリングを適用した用語集コレクションを取得 |

### リンク

| コントローラ | 目的 |
|-----------|---------|
| `CreateCLinkAction` | 外部リンクを作成 |
| `UpdateCLinkAction` | 外部リンクを更新 |
| `CreateCLinkCategoryAction` | リンクカテゴリを作成 |
| `UpdateCLinkCategoryAction` | リンクカテゴリを更新 |
| `CheckCLinkAction` | リンクURLが到達可能かどうかを確認 |
| `ExportCLinksAction` | リンクをファイルにエクスポート |
| `CLinkDetailsController` | リンクの詳細を取得 |
| `CLinkImageController` | リンクのプレビュー画像を取得または設定 |
| `GetLinksCollectionController` | カスタムフィルタリングを適用したリンクコレクションを取得 |
| `UpdateVisibilityLink` | リンクの表示/非表示を切り替え |
| `UpdateVisibilityLinkCategory` | リンクカテゴリの表示/非表示を切り替え |
| `UpdatePositionLink` | リンクの順序を変更 |

### 学習パス

| コントローラ | 目的 |
|-----------|---------|
| `CreateCLpAction` | 学習パスを作成 |
| `LpReorderController` | 学習パスアイテムの順序を変更 |

### カレンダー

| コントローラ | 目的 |
|-----------|---------|
| `UpdateCCalendarEventAction` | コースカレンダーイベントを更新 |
| `CalendarMyStudentsScheduleAction` | 教師の生徒のスケジュールを取得 |

### ブログ

| コントローラ | 目的 |
|-----------|---------|
| `CreateCBlogAction` | ブログ投稿を作成 |
| `CreateBlogAttachmentAction` | ブログ投稿にファイルを添付 |
| `UpdateVisibilityBlog` | ブログの表示/非表示を切り替え |

### ドロップボックス

| コントローラ | 目的 |
|-----------|---------|
| `CreateDropboxFileAction` | ドロップボックス（ファイル交換ツール）にファイルをアップロード |

### 学生の課題（アサインメント）

| コントローラ | 目的 |
|-----------|---------|
| `CreateStudentPublicationFileAction` | 課題ファイルを提出 |
| `CreateStudentPublicationCommentAction` | 提出物にコメントを追加 |
| `CreateStudentPublicationCorrectionFileAction` | 提出物の修正ファイルをアップロード |

### 個人ファイル

| コントローラ | 目的 |
|-----------|---------|
| `CreatePersonalFileAction` | ユーザーの個人ファイルスペースにファイルをアップロード |
| `UpdatePersonalFileAction` | 個人ファイルを更新 |

### ソーシャル

| コントローラ | 目的 |
|-----------|---------|
| `LikeSocialPostController` | ソーシャル投稿に「いいね」を付ける |
| `DislikeSocialPostController` | ソーシャル投稿の「いいね」を取り消す |
| `CreateSocialPostAttachmentAction` | ソーシャル投稿にファイルを添付 |
| `SocialPostAttachmentsController` | ソーシャル投稿の添付ファイル一覧を表示 |
| `AbstractFeedbackSocialPostController` | ソーシャル投稿フィードバックアクションのベースクラス |

### セッション

| コントローラ | 目的 |
|-----------|---------|
| `CreateSessionWithUsersAndCoursesAction` | セッションを作成し、ユーザーとコースを一括で登録 |

### ユーザーとアクセスURL

| コントローラ | 目的 |
|-----------|---------|
| `CreateUserOnAccessUrlAction` | ユーザーを作成し、アクセスURLに関連付ける |
| `UserAccessUrlsController` | ユーザーが所属するアクセスURLを一覧表示 |
| `UserSkillsController` | ユーザーに授与されたスキルを一覧表示 |

### ビデオ会議

| コントローラ | 目的 |
|-----------|---------|
| `VideoConferenceCallbackController` | 外部ビデオ会議プロバイダからのコールバックを処理 |

### ベースクラス

| クラス | 目的 |
|-------|---------|
| `BaseResourceFileAction` | ファイルアップロードアクションのベースクラス。マルチパート解析、リソースノード作成、ストレージを処理 |

---
## カスタムアクションの実装

カスタムアクションは、API Platformの操作定義で参照される標準的なSymfonyコントローラーです。`#[ApiResource]`属性は**エンティティ**に存在し、各操作の`controller:`パラメータはアクションクラスを指します：

```php
// エンティティクラス（例：src/CourseBundle/Entity/CDocument.php）：
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

アクションクラス自体は、単純な呼び出し可能なコントローラーであり、サービスは`__invoke()`メソッドの引数を介して注入されます：

```php
namespace Chamilo\CoreBundle\Controller\Api;

use Chamilo\CourseBundle\Entity\CDocument;
use Symfony\Component\HttpFoundation\Request;

final class CreateDocumentFileAction extends BaseResourceFileAction
{
    public function __invoke(
        Request $request,
        CDocumentRepository $repo,
        // ... 他の注入されたサービス
    ): CDocument {
        // アップロードを処理し、エンティティを返す
    }
}
```

重要なポイント：
- `deserialize: false`は、アクションがリクエストを直接読み取る場合（例：マルチパートファイルのアップロード）に設定され、API PlatformがJSONボディをデシリアライズするのを防ぎます。
- ファイルアップロードアクションは通常、`BaseResourceFileAction`を拡張しており、これはマルチパートの解析とリソースノードの配線を処理します。
- セキュリティは、コントローラー内ではなく、操作の`security:`パラメータを介して強制されます。