# 控制器

Chamilo 2.0 使用了大量的控制器（数量级为数十个），这些控制器分布在各个束（bundle）中。具体数量会随着版本更新而变化——以下名称仅供说明，不代表完整列表。

## 控制器类型

### 管理控制器

位于 `src/CoreBundle/Controller/Admin/`。负责平台管理：

* `AdminController` — 仪表板、文件信息、电子邮件测试
* `UserListController` — 用户增删改查（CRUD）
* `CourseListController` — 课程管理
* `SessionAdminController` — 会话管理
* `SettingsController` — 平台设置
* `SecurityController` — 登录尝试、入侵检测系统（IDS）事件
* `PluginsController` — 插件管理
* `RoomController` — 房间管理

### API 动作控制器

位于 `src/CoreBundle/Controller/Api/` 的自定义 API Platform 动作：

这些控制器扩展了 API Platform 内置的 CRUD 功能，加入了自定义业务逻辑。示例：

* `CreateDocumentFileAction` — 文档文件上传
* `CreateStudentPublicationFileAction` — 作业提交上传
* `UpdateVisibilityDocument` — 切换文档可见性
* `ExportCGlossaryAction` — 导出词汇表
* `MoveDocumentAction` — 将文档移动到不同文件夹

对于不需要专用 HTTP 控制器的读写操作——即当您仅想更改获取或持久化项目或集合的*方式*时——优先使用**状态提供者（State Provider）**或**状态处理器（State Processor）**（见下文）。API 动作控制器最适合用于确实需要请求级逻辑的端点（文件上传、自定义响应格式、多步骤流程）。

### AI 控制器

`src/CoreBundle/Controller/AiController.php` 是与 AI 相关端点的入口（Aiken 问题生成、学习路径生成、图像/视频生成、开放性答案评分、文档分析等）。具体的路由集合会快速演变——请阅读控制器的 `#[Route]` 属性以获取当前列表，而不要依赖此处的副本。

### 聊天控制器

`src/CoreBundle/Controller/ChatController.php` 处理实时聊天和 AI 导师：

* 用户对用户消息
* AI 导师聊天（停靠聊天面板）
* 消息历史记录和轮询

## API Platform 状态提供者和处理器

并非每个 API 端点都由控制器支持。API Platform 3 将工作分为两个接口：

* **状态提供者（State Providers）** (`ApiPlatform\State\ProviderInterface`) — 为 `GET` 操作返回数据（单个项目或集合）。
* **状态处理器（State Processors）** (`ApiPlatform\State\ProcessorInterface`) — 处理 `POST`、`PUT`、`PATCH` 和 `DELETE` 操作的写入。

Chamilo 的实现位于 `src/CoreBundle/State/`（大约 35 个以上类）。它们通过 `#[ApiResource]` 操作的 `provider:` 和 `processor:` 参数与实体连接，而不是通过路由。

### 何时使用它们

在以下情况下，选择使用提供者/处理器——而不是 API 动作控制器：

* 端点遵循标准的 REST 模式（列出/读取/创建/更新/删除），但需要自定义数据组装或持久化逻辑。
* 您需要过滤、反规范化或丰富集合或项目的读取结果（例如，遵守当前的访问 URL、课程上下文或可见性规则）。
* 您需要在写入时运行副作用（审计日志、文件生成、相关实体更新），同时保留 API Platform 的规范化、验证和分页流程。
* 您希望在 OpenAPI / Hydra 模式中保持操作的可发现性，而无需注册自定义路由。

如果端点需要原始 `Request` 访问，返回非资源有效载荷（文件下载、CSV、重定向），或协调多步骤流程，则位于 `src/CoreBundle/Controller/Api/` 的 API 动作控制器是更好的选择。

### 在实体上连接

在操作中引用类：

```php
#[ApiResource(
    operations: [
        new GetCollection(provider: UserCollectionStateProvider::class),
        new Post(processor: ColorThemeStateProcessor::class),
    ]
)]
class ColorTheme { ... }
```

### 提供者示例

`src/CoreBundle/State/DocumentProvider.php` 通过 URI 变量解析 `CDocument`，并在缺失时抛出 `NotFoundHttpException`：

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

### 处理器示例

`src/CoreBundle/State/ColorThemeStateProcessor.php` 将任务委托给默认的 Doctrine `persistProcessor`，然后执行副作用（在 themes Flysystem 文件系统上生成 CSS 文件，将主题链接到当前的访问 URL）：

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

        // …生成 colors.css，链接到当前 AccessUrl，刷新…

        return $colorTheme;
    }
}
```

### 需要了解的模式

* **与默认处理器组合。** 装饰 `ProcessorInterface $persistProcessor`（Doctrine 内置的），以便 Chamilo 特定的逻辑在标准持久化操作*周围*运行，而不是替代它。
* **集合提供者自行处理分页。** 当集合提供者构建自定义查询时，必须遵守 `?page`、`?itemsPerPage` 和搜索过滤器 — API Platform 的自动分页器仅对默认的 Doctrine 集合提供者生效。
* **每个资源 + 操作类型一个类是常见的**，但一个提供者可以服务于多个操作（参见 `UsergroupStateProvider`，在 `Usergroup` 的四个操作中重复使用）。
* **命名约定**：`<Entity>StateProvider` / `<Entity>StateProcessor` 用于资源范围的处理程序；`<Entity><Action>Processor`（例如 `CBlogAssignAuthorProcessor`、`CStudentPublicationDeleteProcessor`）用于更具体的操作。

## 路由

控制器使用 **PHP 8 属性** 来定义路由：

```php
#[Route('/admin/user-list')]
class UserListController extends AbstractController
{
    #[Route('/', name: 'admin_user_list')]
    public function index(): Response { ... }
}
```

API Platform 资源在实体上使用 `#[ApiResource]` 属性，自定义操作指向控制器动作。

## 特性（Traits）

控制器使用共享特性来实现常见功能：

* `ControllerTrait` — 访问设置、序列化器和常见服务
* `CourseControllerTrait` — 课程上下文辅助工具
* `ResourceControllerTrait` — 资源节点操作