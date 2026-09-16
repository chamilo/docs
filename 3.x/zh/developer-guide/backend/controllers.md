# 控制器

Chamilo 3.0 使用大量控制器（数量级为数十个），分布在各个 bundle 中。确切数量会随版本变化——下文名称仅作示例，并非穷尽列表。

## 控制器类型

### 管理控制器

位于 `src/CoreBundle/Controller/Admin/`。处理平台管理：

* `AdminController` — 仪表盘、文件信息、邮件测试
* `UserListController` — 用户 CRUD
* `CourseListController` — 课程管理
* `SessionAdminController` — 学期管理
* `SettingsController` — 平台设置
* `SecurityController` — 登录尝试、IDS 事件
* `PluginsController` — 插件管理
* `RoomController` — 教室管理

### API Action 控制器

位于 `src/CoreBundle/Controller/Api/` 的自定义 API Platform actions：

这些控制器在 API Platform 内置 CRUD 之上扩展自定义业务逻辑。示例：

* `CreateDocumentFileAction` — 文档文件上传
* `CreateStudentPublicationFileAction` — 作业提交上传
* `UpdateVisibilityDocument` — 切换文档可见性
* `ExportCGlossaryAction` — 导出术语表
* `MoveDocumentAction` — 将文档移动到其他文件夹

对于不需要专用 HTTP 控制器的读写操作——即仅需改变条目或集合的获取或持久化*方式*时——优先使用 **State Provider** 或 **State Processor**（见下文）。API Action 控制器最好留给真正需要请求级逻辑的端点（文件上传、自定义响应格式、多步骤流程）。

### AI 控制器

`src/CoreBundle/Controller/AiController.php` 是 AI 相关端点的入口（Aiken 试题生成、学习路径生成、图像/视频生成、开放作答评分、文档分析……）。路由集合变化很快——请阅读该控制器的 `#[Route]` 属性以获取当前列表，而不要依赖此处的副本。

### 聊天控制器

`src/CoreBundle/Controller/ChatController.php` 处理实时聊天与 AI 导师：

* 用户间消息
* AI 导师聊天（停靠式聊天面板）
* 消息历史与轮询

## API Platform State Providers 与 Processors

并非每个 API 端点都由控制器支撑。API Platform 4 将工作拆分到两个接口：

* **State Providers** (`ApiPlatform\State\ProviderInterface`) — 为 `GET` 操作返回数据（单个条目或集合）。
* **State Processors** (`ApiPlatform\State\ProcessorInterface`) — 处理 `POST`、`PUT`、`PATCH` 和 `DELETE` 操作的写入。

Chamilo 的实现位于 `src/CoreBundle/State/`（约 35+ 个类）。它们通过 `#[ApiResource]` 操作的 `provider:` 和 `processor:` 参数绑定到实体，而非通过路由。

### 何时使用它们

在以下情况应使用 provider/processor，而不是 API Action 控制器：

* 端点遵循标准 REST 形态（列表 / 读取 / 创建 / 更新 / 删除），但需要自定义数据组装或持久化逻辑。
* 需要过滤、反规范化或丰富集合或条目读取的结果（例如遵循当前 Access URL、课程上下文或可见性规则）。
* 需要在写入时执行副作用（审计日志、文件生成、相关实体更新），同时保留 API Platform 的规范化、校验与分页流水线。
* 希望操作在 OpenAPI / Hydra schema 中可被发现，而无需注册自定义路由。

如果端点需要原始 `Request` 访问、返回非资源载荷（文件下载、CSV、重定向），或编排多步骤流程，则更适合使用 `src/CoreBundle/Controller/Api/` 中的 API Action 控制器。

### 在实体上绑定

在操作上引用该类：

```php
#[ApiResource(
    operations: [
        new GetCollection(provider: UserCollectionStateProvider::class),
        new Post(processor: ColorThemeStateProcessor::class),
    ]
)]
class ColorTheme { ... }
```

### Provider 示例

`src/CoreBundle/State/DocumentProvider.php` 通过 URI 变量解析 `CDocument`，缺失时抛出 `NotFoundHttpException`：

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

### Processor 示例

`src/CoreBundle/State/ColorThemeStateProcessor.php` 将处理委托给默认的 Doctrine `persistProcessor`，然后执行副作用（在主题的 Flysystem 文件系统上生成 CSS 文件，并将主题关联到当前 Access URL）：

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

* **与默认 processor 组合使用。** 装饰 `ProcessorInterface $persistProcessor`（Doctrine 内置实现），使 Chamilo 特有逻辑在标准持久化*周围*运行，而不是取而代之。
* **集合 provider 自行处理分页。** 当集合 provider 构建自定义查询时，必须尊重 `?page`、`?itemsPerPage` 以及搜索过滤器——API Platform 的自动分页器仅对默认的 Doctrine 集合 provider 生效。
* **每个资源 + 操作种类对应一个类较为常见**，但一个 provider 也可以服务多个操作（参见 `UsergroupStateProvider`，在 `Usergroup` 的四个操作中复用）。
* **命名约定**：面向整个资源的处理使用 `<Entity>StateProvider` / `<Entity>StateProcessor`；面向更窄操作使用 `<Entity><Action>Processor`（例如 `CBlogAssignAuthorProcessor`、`CStudentPublicationDeleteProcessor`）。

## Routing

控制器使用 **PHP 8 属性** 定义路由：

```php
#[Route('/admin/user-list')]
class UserListController extends AbstractController
{
    #[Route('/', name: 'admin_user_list')]
    public function index(): Response { ... }
}
```

API Platform 资源在实体上使用 `#[ApiResource]` 属性，自定义操作指向控制器动作。

## Traits

控制器使用共享 trait 提供通用功能：

* `ControllerTrait` — 访问设置、序列化器及常用服务
* `CourseControllerTrait` — 课程上下文辅助方法
* `ResourceControllerTrait` — 资源节点操作