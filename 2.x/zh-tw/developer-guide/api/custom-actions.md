# 自訂動作

除了標準的 CRUD 操作之外，Chamilo 擁有數十個自訂 API 動作控制器，用以處理專門操作。確切數量因版本而異 — 請列出 `src/CoreBundle/Controller/Api/` 以查看目前清單。

## 位置

自訂動作位於 `src/CoreBundle/Controller/Api/`。

## 值得注意的自訂動作

### 文件

| Controller | Purpose |
|-----------|---------|
| `CreateDocumentFileAction` | 上傳檔案或建立資料夾/連結文件 |
| `UpdateDocumentFileAction` | 替換文件檔案 |
| `ReplaceDocumentFileAction` | 替換文件檔案，保留其 ID |
| `MoveDocumentAction` | 將文件移動至不同資料夾 |
| `UpdateVisibilityDocument` | 切換學習者對文件的可見性 |
| `DownloadAllDocumentsAction` | 以 ZIP 格式下載資料夾中的所有文件 |
| `DownloadSelectedDocumentsAction` | 以 ZIP 格式下載選定的文件集合 |
| `DocumentUsageAction` | 列出使用該文件之課程/工作階段 |
| `DocumentLearningPathUsageAction` | 列出使用該文件之學習路徑 |

### 詞彙表

| Controller | Purpose |
|-----------|---------|
| `CreateCGlossaryAction` | 建立詞彙表條目 |
| `UpdateCGlossaryAction` | 更新詞彙表條目 |
| `ExportCGlossaryAction` | 匯出詞彙表至檔案 |
| `ImportCGlossaryAction` | 從檔案匯入詞彙表 |
| `ExportGlossaryToDocumentsAction` | 將詞彙表匯出為課程中的文件 |
| `GetGlossaryCollectionController` | 取得帶有自訂篩選的詞彙表集合 |

### 連結

| Controller | Purpose |
|-----------|---------|
| `CreateCLinkAction` | 建立外部連結 |
| `UpdateCLinkAction` | 更新外部連結 |
| `CreateCLinkCategoryAction` | 建立連結分類 |
| `UpdateCLinkCategoryAction` | 更新連結分類 |
| `CheckCLinkAction` | 檢查連結 URL 是否可存取 |
| `ExportCLinksAction` | 匯出連結至檔案 |
| `CLinkDetailsController` | 取得連結詳細資料 |
| `CLinkImageController` | 取得或設定連結的預覽圖像 |
| `GetLinksCollectionController` | 取得帶有自訂篩選的連結集合 |
| `UpdateVisibilityLink` | 切換連結可見性 |
| `UpdateVisibilityLinkCategory` | 切換連結分類可見性 |
| `UpdatePositionLink` | 重新排序連結 |

### 學習路徑

| Controller | Purpose |
|-----------|---------|
| `CreateCLpAction` | 建立學習路徑 |
| `LpReorderController` | 重新排序學習路徑項目 |

### 日曆

| Controller | Purpose |
|-----------|---------|
| `UpdateCCalendarEventAction` | 更新課程日曆事件 |
| `CalendarMyStudentsScheduleAction` | 取得教師學生之排程 |

### 部落格

| Controller | Purpose |
|-----------|---------|
| `CreateCBlogAction` | 建立部落格文章 |
| `CreateBlogAttachmentAction` | 將檔案附加至部落格文章 |
| `UpdateVisibilityBlog` | 切換部落格可見性 |

### Dropbox

| Controller | Purpose |
|-----------|---------|
| `CreateDropboxFileAction` | 上傳檔案至 Dropbox（檔案交換工具） |

### 學生作業（作業）

| Controller | Purpose |
|-----------|---------|
| `CreateStudentPublicationFileAction` | 提交作業檔案 |
| `CreateStudentPublicationCommentAction` | 為提交新增評論 |
| `CreateStudentPublicationCorrectionFileAction` | 上傳提交的修正檔案 |

### 個人檔案

| Controller | Purpose |
|-----------|---------|
| `CreatePersonalFileAction` | 上傳檔案至使用者個人檔案空間 |
| `UpdatePersonalFileAction` | 更新個人檔案 |

### 社交

| Controller | Purpose |
|-----------|---------|
| `LikeSocialPostController` | 按讚社交貼文 |
| `DislikeSocialPostController` | 取消按讚社交貼文 |
| `CreateSocialPostAttachmentAction` | 將檔案附加至社交貼文 |
| `SocialPostAttachmentsController` | 列出社交貼文之附件 |
| `AbstractFeedbackSocialPostController` | 社交貼文回饋動作之基底類別 |

### 工作階段

| Controller | Purpose |
|-----------|---------|
| `CreateSessionWithUsersAndCoursesAction` | 建立工作階段並在單一呼叫中註冊使用者與課程 |

### 使用者與存取 URL

| Controller | Purpose |
|-----------|---------|
| `CreateUserOnAccessUrlAction` | 建立使用者並將其關聯至存取 URL |
| `UserAccessUrlsController` | 列出使用者所屬之存取 URL |
| `UserSkillsController` | 列出授予使用者的技能 |

### 視訊會議

| Controller | Purpose |
|-----------|---------|
| `VideoConferenceCallbackController` | 處理外部視訊會議提供者之回呼 |

### 基底類別

| Class | Purpose |
|-------|---------|
| `BaseResourceFileAction` | 檔案上傳動作之基底類別；處理多段解析、資源節點建立與儲存 |

---
## 實作自訂動作

自訂動作是標準的 Symfony 控制器，在 API Platform 操作定義中被參照。`#[ApiResource]` 屬性位於 **entity** 上，每個操作的 `controller:` 參數指向動作類別：

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

動作類別本身是一個簡單的可呼叫控制器 — 服務透過 `__invoke()` 方法引數注入：

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
- 當動作直接讀取請求（例如 multipart 檔案上傳）而非讓 API Platform 反序列化 JSON 本文時，設定 `deserialize: false`。
- 檔案上傳動作通常擴展 `BaseResourceFileAction`，該類別處理 multipart 解析與資源節點連接。
- 安全性透過操作上的 `security:` 參數強制執行，而非在控制器內部。