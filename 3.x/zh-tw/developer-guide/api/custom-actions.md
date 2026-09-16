# 自訂動作

除標準 CRUD 作業外，Chamilo 還有為數不少（約數十個）的自訂 API 動作控制器，用以處理專門作業。確切數量會隨發行版本而異——請列出 `src/CoreBundle/Controller/Api/` 以取得目前集合。

## 位置

自訂動作位於 `src/CoreBundle/Controller/Api/`。

## 值得注意的自訂動作

### 文件

| 控制器 | 用途 |
|-----------|---------|
| `CreateDocumentFileAction` | 上傳檔案或建立資料夾／連結文件 |
| `UpdateDocumentFileAction` | 取代文件的檔案 |
| `ReplaceDocumentFileAction` | 取代文件檔案，並保留其 ID |
| `MoveDocumentAction` | 將文件移至不同資料夾 |
| `UpdateVisibilityDocument` | 切換文件對學習者的可見性 |
| `DownloadAllDocumentsAction` | 將資料夾中的所有文件下載為 ZIP |
| `DownloadSelectedDocumentsAction` | 將所選文件集合下載為 ZIP |
| `DocumentUsageAction` | 列出使用某文件的課程／工作階段 |
| `DocumentLearningPathUsageAction` | 列出使用某文件的學習路徑 |

### 詞彙表

| 控制器 | 用途 |
|-----------|---------|
| `CreateCGlossaryAction` | 建立詞彙表詞條 |
| `UpdateCGlossaryAction` | 更新詞彙表詞條 |
| `ExportCGlossaryAction` | 將詞彙表匯出為檔案 |
| `ImportCGlossaryAction` | 從檔案匯入詞彙表 |
| `ExportGlossaryToDocumentsAction` | 將詞彙表匯出為課程中的文件 |
| `GetGlossaryCollectionController` | 取得具自訂篩選的詞彙表集合 |

### 連結

| 控制器 | 用途 |
|-----------|---------|
| `CreateCLinkAction` | 建立外部連結 |
| `UpdateCLinkAction` | 更新外部連結 |
| `CreateCLinkCategoryAction` | 建立連結類別 |
| `UpdateCLinkCategoryAction` | 更新連結類別 |
| `CheckCLinkAction` | 檢查連結 URL 是否可連線 |
| `ExportCLinksAction` | 將連結匯出為檔案 |
| `CLinkDetailsController` | 取得連結詳細資料 |
| `CLinkImageController` | 取得或設定連結的預覽圖片 |
| `GetLinksCollectionController` | 取得具自訂篩選的連結集合 |
| `UpdateVisibilityLink` | 切換連結可見性 |
| `UpdateVisibilityLinkCategory` | 切換連結類別可見性 |
| `UpdatePositionLink` | 重新排序連結 |

### 學習路徑

| 控制器 | 用途 |
|-----------|---------|
| `CreateCLpAction` | 建立學習路徑 |
| `LpReorderController` | 重新排序學習路徑項目 |

### 行事曆

| 控制器 | 用途 |
|-----------|---------|
| `UpdateCCalendarEventAction` | 更新課程行事曆事件 |
| `CalendarMyStudentsScheduleAction` | 取得教師所屬學生的時程 |

### 部落格

| 控制器 | 用途 |
|-----------|---------|
| `CreateCBlogAction` | 建立部落格文章 |
| `CreateBlogAttachmentAction` | 將檔案附加至部落格文章 |
| `UpdateVisibilityBlog` | 切換部落格可見性 |

### 檔案交換箱

| 控制器 | 用途 |
|-----------|---------|
| `CreateDropboxFileAction` | 將檔案上傳至檔案交換箱（檔案交換工具） |

### 學生成果（作業）

| 控制器 | 用途 |
|-----------|---------|
| `CreateStudentPublicationFileAction` | 繳交作業檔案 |
| `CreateStudentPublicationCommentAction` | 為繳交內容新增評論 |
| `CreateStudentPublicationCorrectionFileAction` | 為繳交內容上傳批改檔案 |

### 個人檔案

| 控制器 | 用途 |
|-----------|---------|
| `CreatePersonalFileAction` | 將檔案上傳至使用者的個人檔案空間 |
| `UpdatePersonalFileAction` | 更新個人檔案 |

### 社群

| 控制器 | 用途 |
|-----------|---------|
| `LikeSocialPostController` | 對社群貼文按讚 |
| `DislikeSocialPostController` | 取消對社群貼文按讚 |
| `CreateSocialPostAttachmentAction` | 將檔案附加至社群貼文 |
| `SocialPostAttachmentsController` | 列出社群貼文上的附件 |
| `AbstractFeedbackSocialPostController` | 社群貼文回饋動作的基底類別 |

### 工作階段

| 控制器 | 用途 |
|-----------|---------|
| `CreateSessionWithUsersAndCoursesAction` | 一次呼叫即建立工作階段並註冊使用者與課程 |

### 使用者與存取 URL

| 控制器 | 用途 |
|-----------|---------|
| `CreateUserOnAccessUrlAction` | 建立使用者並將其與存取 URL 關聯 |
| `UserAccessUrlsController` | 列出使用者所屬的存取 URL |
| `UserSkillsController` | 列出授予使用者的技能 |

### 視訊會議

| 控制器 | 用途 |
|-----------|---------|
| `VideoConferenceCallbackController` | 處理來自外部視訊會議提供者的回呼 |

### 基底類別

| 類別 | 用途 |
|-------|---------|
| `BaseResourceFileAction` | 檔案上傳動作的基底類別；處理 multipart 剖析、資源節點建立與儲存 |

## 實作自訂動作

自訂動作是標準的 Symfony 控制器，並在 API Platform 的操作定義中被引用。`#[ApiResource]` 屬性位於**實體**上，每個操作的 `controller:` 參數則指向該動作類別：

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

動作類別本身是一個普通的可呼叫（invokable）控制器——服務透過 `__invoke()` 方法參數注入：

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

重點：
- 當動作直接讀取請求（例如 multipart 檔案上傳），而非讓 API Platform 反序列化 JSON 主體時，會設定 `deserialize: false`。
- 檔案上傳動作通常會繼承 `BaseResourceFileAction`，由該類別處理 multipart 解析與資源節點的接線。
- 安全性是透過操作上的 `security:` 參數強制執行，而非在控制器內部處理。