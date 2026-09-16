# 控制器

Chamilo 2.0 使用大量控制器（數量達數十個），這些控制器組織在各個 bundle 中。確切數量會隨版本而變化——以下名稱僅供說明，並非窮盡。

## 控制器類型

### 管理控制器

位於 `src/CoreBundle/Controller/Admin/`。處理平台管理：

* `AdminController` — 儀表板、檔案資訊、電子郵件測試
* `UserListController` — 使用者 CRUD
* `CourseListController` — 課程管理
* `SessionAdminController` — 課程期管理
* `SettingsController` — 平台設定
* `SecurityController` — 登入嘗試、IDS 事件
* `PluginsController` — 外掛管理
* `RoomController` — 教室管理

### API 動作控制器

位於 `src/CoreBundle/Controller/Api/` 的自訂 API Platform 動作：

這些擴展 API Platform 內建的 CRUD，並加入自訂業務邏輯。範例：

* `CreateDocumentFileAction` — 文件上傳
* `CreateStudentPublicationFileAction` — 作業提交上傳
* `UpdateVisibilityDocument` — 切換文件可見性
* `ExportCGlossaryAction` — 匯出詞彙表
* `MoveDocumentAction` — 將文件移至不同資料夾

對於不需要專用 HTTP 控制器的讀寫操作——即僅需變更項目或集合的擷取或儲存 *方式*——請優先使用 **State Provider** 或 **State Processor**（見下文）。API 動作控制器最適合真正需要請求層級邏輯的端點（檔案上傳、自訂回應格式、多步驟流程）。

### AI 控制器

`src/CoreBundle/Controller/AiController.php` 是 AI 相關端點的入口（Aiken 問題產生、學習路徑產生、影像/影片產生、開放式答案評分、文件分析等）。確切路由集合變化迅速——請閱讀控制器的 `#[Route]` 屬性以取得目前清單，而非依賴此處的副本。

### 聊天控制器

`src/CoreBundle/Controller/ChatController.php` 處理即時聊天與 AI 導師：

* 使用者對使用者訊息
* AI 導師聊天（固定聊天面板）
* 訊息歷史與輪詢

## API Platform State Providers & Processors

並非每個 API 端點都由控制器支援。API Platform 3 將工作分割為兩個介面：

* **State Providers** (`ApiPlatform\State\ProviderInterface`) — 為 `GET` 操作傳回資料（單一項目或集合）。
* **State Processors** (`ApiPlatform\State\ProcessorInterface`) — 處理 `POST`、`PUT`、`PATCH` 和 `DELETE` 操作的寫入。

Chamilo 的實作位於 `src/CoreBundle/State/`（約 35+ 個類別）。它們透過 `#[ApiResource]` 操作的 `provider:` 和 `processor:` 引數連接到實體，而非透過路由。

### 何時使用它們

在以下情況下，請使用 provider/processor——而非 API 動作控制器：

* 端點遵循標準 REST 結構（清單 / 讀取 / 建立 / 更新 / 刪除），但需要自訂資料組裝或持久化邏輯。
* 需要篩選、反標準化或豐富集合或項目讀取的結果（例如，遵守目前的 Access URL、課程脈絡或可見性規則）。
* 需要在寫入時執行副作用（稽核記錄、檔案產生、相關實體更新），同時保留 API Platform 的標準化、驗證與分頁管線。
* 希望操作能在 OpenAPI / Hydra 結構描述中被發現，而無需註冊自訂路由。

若端點反而需要原始 `Request` 存取、傳回非資源酬載（檔案下載、CSV、重導向），或協調多步驟流程，則位於 `src/CoreBundle/Controller/Api/` 的 API 動作控制器更適合。

### 在實體上的連線

在操作中參照類別：

```php
#[ApiResource(
    operations: [
        new GetCollection(provider: UserCollectionStateProvider::class),
        new Post(processor: ColorThemeStateProcessor::class),
    ]
)]
class ColorTheme { ... }
```

### Provider 範例

`src/CoreBundle/State/DocumentProvider.php` 依 URI 變數解析 `CDocument`，並在遺失時擲出 `NotFoundHttpException`：

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

---
### Processor 範例

`src/CoreBundle/State/ColorThemeStateProcessor.php` 會委派給預設的 Doctrine `persistProcessor`，然後執行副作用（在 themes Flysystem 檔案系統上產生 CSS 檔案，並將主題連結至目前的 Access URL）：

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

### 需要了解的模式

* **與預設 processor 組合。** 裝飾 `ProcessorInterface $persistProcessor`（Doctrine 內建的），讓 Chamilo 專屬邏輯在標準 persist 的*周圍*執行，而不是取代它。
* **Collection providers 自行處理分頁。** 當 collection provider 建構自訂查詢時，它必須遵守 `?page`、`?itemsPerPage` 和搜尋篩選器 — API Platform 的自動分頁器僅適用於預設的 Doctrine collection provider。
* **每個資源 + 操作類型一個類別很常見**，但一個 provider 可以服務多個操作（參見 `UsergroupStateProvider`，在 `Usergroup` 的四個操作中重複使用）。
* **命名慣例**：`<Entity>StateProvider` / `<Entity>StateProcessor` 用於資源範圍的處理器；`<Entity><Action>Processor`（例如 `CBlogAssignAuthorProcessor`、`CStudentPublicationDeleteProcessor`）用於較狹窄的操作。

## Routing

Controller 使用 **PHP 8 attributes** 來定義路由：

```php
#[Route('/admin/user-list')]
class UserListController extends AbstractController
{
    #[Route('/', name: 'admin_user_list')]
    public function index(): Response { ... }
}
```

API Platform 資源在 entity 上使用 `#[ApiResource]` attributes，並以自訂操作指向 controller 動作。

## Traits

Controller 使用共享 traits 來實現常見功能：

* `ControllerTrait` — 存取設定、serializer 和常見服務
* `CourseControllerTrait` — 課程上下文輔助
* `ResourceControllerTrait` — 資源節點操作