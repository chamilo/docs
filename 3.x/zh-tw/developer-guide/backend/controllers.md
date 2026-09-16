# 控制器

Chamilo 3.0 使用大量控制器（數量級為數十個），並依套件（bundle）組織。確切數量會隨版本變動——以下名稱僅供說明，並非完整清單。

## 控制器類型

### 管理控制器

位於 `src/CoreBundle/Controller/Admin/`。處理平台管理：

* `AdminController` — 儀表板、檔案資訊、電子郵件測試
* `UserListController` — 使用者 CRUD
* `CourseListController` — 課程管理
* `SessionAdminController` — 學期（Session）管理
* `SettingsController` — 平台設定
* `SecurityController` — 登入嘗試、IDS 事件
* `PluginsController` — 外掛管理
* `RoomController` — 教室（Room）管理

### API Action 控制器

位於 `src/CoreBundle/Controller/Api/` 的自訂 API Platform actions：

這些控制器在 API Platform 內建 CRUD 之上擴充自訂業務邏輯。範例：

* `CreateDocumentFileAction` — 文件檔案上傳
* `CreateStudentPublicationFileAction` — 作業繳交上傳
* `UpdateVisibilityDocument` — 切換文件可見性
* `ExportCGlossaryAction` — 匯出詞彙表
* `MoveDocumentAction` — 將文件移至不同資料夾

對於不需要專用 HTTP 控制器的讀寫操作——亦即當你只想改變項目或集合的擷取或持久化*方式*時——請優先使用 **State Provider** 或 **State Processor**（見下文）。API Action 控制器最適合真正需要請求層級邏輯的端點（檔案上傳、自訂回應格式、多步驟流程）。

### AI 控制器

`src/CoreBundle/Controller/AiController.php` 是 AI 相關端點的進入點（Aiken 題目產生、學習路徑產生、影像／影片產生、開放式作答評分、文件分析……）。路由集合演進很快——請閱讀該控制器的 `#[Route]` 屬性以取得目前清單，勿依賴此處的副本。

### 聊天控制器

`src/CoreBundle/Controller/ChatController.php` 處理即時聊天與 AI 導師：

* 使用者對使用者傳訊
* AI 導師聊天（停駐式聊天面板）
* 訊息歷史與輪詢

## API Platform State Providers 與 Processors

並非每個 API 端點都由控制器支撐。API Platform 4 將工作拆分到兩個介面：

* **State Providers** (`ApiPlatform\State\ProviderInterface`) — 為 `GET` 操作回傳資料（單一項目或集合）。
* **State Processors** (`ApiPlatform\State\ProcessorInterface`) — 處理 `POST`、`PUT`、`PATCH` 與 `DELETE` 操作的寫入。

Chamilo 的實作位於 `src/CoreBundle/State/`（約 35+ 個類別）。它們透過 `#[ApiResource]` 操作的 `provider:` 與 `processor:` 引數綁定到實體，而非透過路由。

### 何時使用它們

在下列情況應使用 provider/processor，而非 API Action 控制器：

* 端點遵循標準 REST 形狀（列表／讀取／建立／更新／刪除），但需要自訂資料組裝或持久化邏輯。
* 你需要過濾、反序列化或豐富集合或項目讀取的結果（例如遵守目前的 Access URL、課程脈絡或可見性規則）。
* 你需要在寫入時執行副作用（稽核日誌、檔案產生、相關實體更新），同時保留 API Platform 的正規化、驗證與分頁管線。
* 你希望該操作可在 OpenAPI / Hydra schema 中被發現，而無須註冊自訂路由。

若端點反而需要原始 `Request` 存取、回傳非資源負載（檔案下載、CSV、重新導向），或編排多步驟流程，則 `src/CoreBundle/Controller/Api/` 中的 API Action 控制器更為合適。

### 在實體上綁定

在操作上引用該類別：

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

`src/CoreBundle/State/DocumentProvider.php` 依 URI 變數解析 `CDocument`，缺失時拋出 `NotFoundHttpException`：

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

### Processor 範例

`src/CoreBundle/State/ColorThemeStateProcessor.php` 會委派給預設的 Doctrine `persistProcessor`，接著執行副作用（在 themes 的 Flysystem 檔案系統上產生 CSS 檔，並將佈景主題連結到目前的 Access URL）：

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

### 應掌握的模式

* **與預設 processor 組合使用。** 裝飾 `ProcessorInterface $persistProcessor`（Doctrine 內建）讓 Chamilo 專屬邏輯在標準 persist **周圍**執行，而非取而代之。
* **集合 provider 自行處理分頁。** 當集合 provider 建立自訂查詢時，必須尊重 `?page`、`?itemsPerPage` 以及搜尋篩選條件——API Platform 的自動分頁器僅會對預設的 Doctrine 集合 provider 生效。
* **每個資源加上一種操作類型對應一個類別很常見**，但一個 provider 也可以服務多個操作（參見 `UsergroupStateProvider`，在 `Usergroup` 的四個操作中重複使用）。
* **命名慣例**：資源層級處理器使用 `<Entity>StateProvider` / `<Entity>StateProcessor`；較窄的操作使用 `<Entity><Action>Processor`（例如 `CBlogAssignAuthorProcessor`、`CStudentPublicationDeleteProcessor`）。

## Routing

控制器使用 **PHP 8 attributes** 定義路由：

```php
#[Route('/admin/user-list')]
class UserListController extends AbstractController
{
    #[Route('/', name: 'admin_user_list')]
    public function index(): Response { ... }
}
```

API Platform 資源在實體上使用 `#[ApiResource]` attributes，自訂操作則指向控制器動作。

## Traits

控制器使用共用 traits 提供常見功能：

* `ControllerTrait` — 存取設定、序列化器與常用服務
* `CourseControllerTrait` — 課程脈絡輔助方法
* `ResourceControllerTrait` — 資源節點操作