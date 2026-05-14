# 事件与监听器

Chamilo 使用 Symfony 的事件系统来实现组件之间的解耦通信。

## 事件监听器

Chamilo 使用两个监听器位置：

* **`src/CoreBundle/EventListener/`** — Symfony 内核/HTTP 监听器（请求、响应、异常、登录/登出、课程/会话访问等）。示例：`CidReqListener`、`CourseAccessListener`、`LoginSuccessHandler`、`LogoutListener`、`ExceptionListener`、`ResourceDoctrineListener`。
* **`src/CoreBundle/Entity/Listener/`** — 附加到特定实体的 Doctrine 实体监听器。示例：`ResourceNodeListener`、`CourseListener`、`SessionListener`、`LanguageListener`、`UserListener`、`MessageListener`。

根据您需要响应的内容选择合适的位置：HTTP 管道事件放在 `EventListener/` 中；实体生命周期钩子放在 `Entity/Listener/` 中。

## 事件订阅者

位于 `src/CoreBundle/EventSubscriber/`：

事件订阅者可以监听多个事件：

* **安全订阅者** — 处理登录/登出事件，追踪登录尝试
* **API 订阅者** — 对 API 请求进行前/后处理
* **Doctrine 订阅者** — 响应实体生命周期事件

## Doctrine 生命周期事件

实体使用 `#[ORM\HasLifecycleCallbacks]` 来处理数据库级别的事件：

```php
#[ORM\PrePersist]
public function prePersist(): void
{
    $this->createdAt = new DateTime();
}
```

## 创建自定义监听器

要添加自定义行为：

1. 在适当的 bundle 中创建监听器/订阅者类
2. 在服务配置中将其标记为事件监听器或订阅者
3. 实现处理方法

```php
class MyListener
{
    public function onKernelRequest(RequestEvent $event): void
    {
        // 您的逻辑代码
    }
}
```

## 关键事件

| 事件 | 触发时机 |
|-------|--------------|
| `kernel.request` | 每次 HTTP 请求 |
| `kernel.response` | 发送 HTTP 响应之前 |
| `security.interactive_login` | 用户登录时 |
| `doctrine.prePersist` | 实体首次保存之前 |
| `doctrine.postUpdate` | 实体更新之后 |

## Chamilo 特定事件

这些事件由 Chamilo 自身的代码触发，是插件的主要集成点。常量定义在 `Chamilo\CoreBundle\Event\Events` 中。

| 常量 | 事件字符串 | 触发时机 |
|----------|-------------|---------------|
| `Events::COURSE_CREATED` | `chamilo.event.course_created` | 课程创建后 |
| `Events::COURSE_ACCESS_CHECK` | `chamilo.course_access_check` | 用户访问课程之前 |
| `Events::COURSE_USER_SUBSCRIPTION_CHECK` | `chamilo.event.course_user_subscription_check` | 用户注册课程之前 |
| `Events::SESSION_RESUBSCRIPTION` | `chamilo.event.session_resubscription` | 用户尝试重新订阅会话时 |
| `Events::LOGIN_CREDENTIALS_CHECKED` | `chamilo.event.login_credentials_checked` | 登录凭据验证后 |
| `Events::LOGIN_CONDITION_CHECKED` | `chamilo.event.login_condition_checked` | 额外登录条件检查后 |
| `Events::DOCUMENT_ACTION` | `chamilo.event.document_action` | 文档工具栏渲染时 |
| `Events::DOCUMENT_ITEM_ACTION` | `chamilo.event.document_item_action` | 每个文件的操作按钮渲染时 |
| `Events::DOCUMENT_ITEM_VIEW` | `chamilo.event.document_item_view` | 文档打开查看时 |
| `Events::EXERCISE_REPORT_ACTION` | `chamilo.event.exercise_report_action` | 练习报告页面渲染操作链接时 |
| `Events::EXERCISE_ENDED` | `chamilo.event.exercise_ended` | 学习者提交练习后 |
| `Events::EXERCISE_QUESTION_ANSWERED` | `chamilo.event.question_answered` | 每个问题回答后 |
| `Events::LP_CREATED` | `chamilo.event.learning_path_created` | 学习路径创建后 |
| `Events::LP_ITEM_VIEWED` | `chamilo.event.learning_path_item_viewed` | 学习者打开学习路径项目时 |
| `Events::LP_ENDED` | `chamilo.event.learning_path_ended` | 学习者完成学习路径后 |
| `Events::ADMIN_BLOCK_DISPLAYED` | `chamilo.event.admin_block_displayed` | 管理员仪表板构建块列表时 |
| `Events::USER_CREATED` | `chamilo.event.user_created` | 用户账户创建后 |
| `Events::USER_UPDATED` | `chamilo.event.user_updated` | 用户账户更新后 |
| `Events::USER_DELETED` | `chamilo.event.user_deleted` | 用户账户删除后 |
| `Events::PORTFOLIO_ITEM_ADDED` | `chamilo.event.portfolio_item_added` | 作品集项目创建后 |
| `Events::NOTIFICATION_CONTENT_FORMATTED` | `chamilo_hook_event.notification_content` | 通知内容格式化时 |

## 插件示例：在文档查看器中添加按钮

本节将介绍如何通过事件订阅者让插件在现有的 Chamilo 页面中注入一个按钮，而无需修改核心代码。

### 场景

一个名为 **MyViewer** 的插件希望在课程文件管理器中的每个文档旁边添加一个“在 MyViewer 中打开”按钮。相关事件是 `Events::DOCUMENT_ITEM_VIEW`，由 Chamilo 在文档即将显示时触发，携带 `CDocument` 实体和一个可变的链接列表。

### 插件目录结构

```
public/plugin/MyViewer/
├── plugin.php                          # 声明 $plugin_info
├── install.php / uninstall.php
├── admin.php                           # 插件设置页面
├── lang/                               # 翻译字符串
└── src/
    ├── MyViewerPlugin.php              # 主插件类（继承 Plugin）
    └── EventSubscriber/
        └── MyViewerEventSubscriber.php # 事件订阅者
```

### 主插件类 (`src/MyViewerPlugin.php`)

```php
declare(strict_types=1);

class MyViewerPlugin extends Plugin
{
    public const SETTING_SERVER_URL = 'server_url';

    protected function __construct()
    {
        parent::__construct('1.0', 'Your Name', [
            self::SETTING_SERVER_URL => 'text',
        ]);
    }

    public static function create(): static
    {
        static $instance = null;
        return $instance ??= new self();
    }

    public function getViewerUrl(int $documentId): string
    {
        $base = $this->get(self::SETTING_SERVER_URL);
        return sprintf('%s/view?doc=%d', rtrim((string) $base, '/'), $documentId);
    }
}
```

`Plugin` 基类提供了 `isEnabled()`、`get($settingKey)` 以及用于安装课程工具和设置的辅助方法。单例模式（`static $instance`）是 Chamilo 的标准约定，因为插件类也会在 Symfony 容器之外（在旧版 PHP 页面中）被实例化。

### 事件订阅者 (`src/EventSubscriber/MyViewerEventSubscriber.php`)

```php
declare(strict_types=1);

use Chamilo\CoreBundle\Event\DocumentItemViewEvent;
use Chamilo\CoreBundle\Event\Events;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class MyViewerEventSubscriber implements EventSubscriberInterface
{
    private MyViewerPlugin $plugin;

    public function __construct()
    {
        $this->plugin = MyViewerPlugin::create();
    }

    public static function getSubscribedEvents(): array
    {
        return [
            Events::DOCUMENT_ITEM_VIEW => 'onDocumentItemView',
        ];
    }

    public function onDocumentItemView(DocumentItemViewEvent $event): void
    {
        if (!$this->plugin->isEnabled()) {
            return;
        }

        $document = $event->getDocument();

        $url = $this->plugin->getViewerUrl($document->getIid());
        $label = $this->plugin->get_lang('OpenInMyViewer');

        $event->addLink(sprintf(
            '<a href="%s" target="_blank" class="btn btn--plain">%s</a>',
            htmlspecialchars($url, ENT_QUOTES),
            htmlspecialchars($label, ENT_QUOTES)
        ));
    }
}
```

`addLink()` 将 HTML 添加到数组中，Chamilo 的文档视图模板会将其与内置的“下载”和“预览”操作一起渲染。订阅者从不修改 Chamilo 核心文件。

### 注册

无需手动注册服务。Chamilo 的 `config/services.yaml` 全局启用了 Symfony 的 `autoconfigure` 标志，该标志会自动将任何实现 `EventSubscriberInterface` 的类标记为 `kernel.event_subscriber`。只要插件目录被加载（通过 Composer's classmap 或 PSR-4 自动加载），Symfony 会在下一次缓存清除时自动识别订阅者。

```bash
php bin/console cache:clear
```

### 事件数据流转方式

```
文档列表渲染
        │
        ▼
Chamilo 触发 DocumentItemViewEvent (携带 CDocument 实体 + 空的 links[])
        │
        ├─► MyViewerEventSubscriber::onDocumentItemView()  → 添加 HTML 链接
        ├─► OnlyofficeEventSubscriber::onDocumentItemView() → 添加“编辑”按钮
        │   (多个插件可以监听同一事件)
        ▼
模板渲染 event->getLinks()，与内置文件操作一起显示
```

多个插件可以独立订阅同一事件；每个插件都会向共享数据中添加内容，而无需了解其他插件。执行顺序遵循 Symfony 的优先级系统——如果顺序重要，可以在 `getSubscribedEvents()` 中将优先级整数作为处理程序元组的第二个元素传递：

```php
public static function getSubscribedEvents(): array
{
    return [
        Events::DOCUMENT_ITEM_VIEW => ['onDocumentItemView', 10], // 数值越高，执行越早
    ];
}
```