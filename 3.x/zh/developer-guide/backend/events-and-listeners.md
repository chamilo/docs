# 事件与监听器

Chamilo 使用 Symfony 的事件系统实现组件之间的解耦通信。

## 事件监听器

Chamilo 使用两处监听器位置：

* **`src/CoreBundle/EventListener/`** — Symfony 内核/HTTP 监听器（请求、响应、异常、登录/注销、课程/学期访问等）。示例：`CidReqListener`、`CourseAccessListener`、`LoginSuccessHandler`、`LogoutListener`、`ExceptionListener`、`ResourceDoctrineListener`。
* **`src/CoreBundle/Entity/Listener/`** — 挂接到特定实体的 Doctrine 实体监听器。示例：`ResourceNodeListener`、`CourseListener`、`SessionListener`、`LanguageListener`、`UserListener`、`MessageListener`。

请根据需要响应的对象选择位置：HTTP 管道事件放在 `EventListener/`；实体生命周期钩子放在 `Entity/Listener/`。

## 事件订阅器

位于 `src/CoreBundle/EventSubscriber/`：

事件订阅器可以监听多个事件：

* **安全订阅器** — 处理登录/注销事件，跟踪登录尝试
* **API 订阅器** — API 请求的前置/后置处理
* **Doctrine 订阅器** — 响应实体生命周期事件

## Doctrine 生命周期事件

实体使用 `#[ORM\HasLifecycleCallbacks]` 处理数据库级事件：

```php
#[ORM\PrePersist]
public function prePersist(): void
{
    $this->createdAt = new DateTime();
}
```

## 创建自定义监听器

要添加自定义行为：

1. 在相应的 bundle 中创建监听器/订阅器类
2. 在服务配置中将其标记为事件监听器或订阅器
3. 实现处理程序方法

```php
class MyListener
{
    public function onKernelRequest(RequestEvent $event): void
    {
        // Your logic here
    }
}
```

## 关键事件

| 事件 | 触发时机 |
|-------|--------------|
| `kernel.request` | 每一次 HTTP 请求 |
| `kernel.response` | 发送 HTTP 响应之前 |
| `security.interactive_login` | 用户登录时 |
| `doctrine.prePersist` | 实体首次保存之前 |
| `doctrine.postUpdate` | 实体更新之后 |

## Chamilo 特有事件

这些事件由 Chamilo 自身代码派发，是插件的主要集成点。常量定义于 `Chamilo\CoreBundle\Event\Events`。

| 常量 | 事件字符串 | 触发时机 |
|----------|-------------|---------------|
| `Events::COURSE_CREATED` | `chamilo.event.course_created` | 课程创建之后 |
| `Events::COURSE_ACCESS_CHECK` | `chamilo.course_access_check` | 用户访问课程之前 |
| `Events::COURSE_USER_SUBSCRIPTION_CHECK` | `chamilo.event.course_user_subscription_check` | 用户报名课程之前 |
| `Events::SESSION_RESUBSCRIPTION` | `chamilo.event.session_resubscription` | 用户尝试重新订阅学期时 |
| `Events::LOGIN_CREDENTIALS_CHECKED` | `chamilo.event.login_credentials_checked` | 登录凭据验证之后 |
| `Events::LOGIN_CONDITION_CHECKED` | `chamilo.event.login_condition_checked` | 额外登录条件检查之后 |
| `Events::DOCUMENT_ACTION` | `chamilo.event.document_action` | 文档工具工具栏渲染时 |
| `Events::DOCUMENT_ITEM_ACTION` | `chamilo.event.document_item_action` | 逐文件操作按钮渲染时 |
| `Events::DOCUMENT_ITEM_VIEW` | `chamilo.event.document_item_view` | 打开文档进行查看时 |
| `Events::EXERCISE_REPORT_ACTION` | `chamilo.event.exercise_report_action` | 练习报告页渲染其操作链接时 |
| `Events::EXERCISE_ENDED` | `chamilo.event.exercise_ended` | 学习者提交练习之后 |
| `Events::EXERCISE_QUESTION_ANSWERED` | `chamilo.event.question_answered` | 每道题目作答之后 |
| `Events::LP_CREATED` | `chamilo.event.learning_path_created` | 学习路径创建之后 |
| `Events::LP_ITEM_VIEWED` | `chamilo.event.learning_path_item_viewed` | 学习者打开学习路径条目时 |
| `Events::LP_ENDED` | `chamilo.event.learning_path_ended` | 学习者完成学习路径之后 |
| `Events::ADMIN_BLOCK_DISPLAYED` | `chamilo.event.admin_block_displayed` | 管理仪表盘构建其区块列表时 |
| `Events::USER_CREATED` | `chamilo.event.user_created` | 用户账户创建之后 |
| `Events::USER_UPDATED` | `chamilo.event.user_updated` | 用户账户更新之后 |
| `Events::USER_DELETED` | `chamilo.event.user_deleted` | 用户账户删除之后 |
| `Events::PORTFOLIO_ITEM_ADDED` | `chamilo.event.portfolio_item_added` | 作品集条目创建之后 |
| `Events::NOTIFICATION_CONTENT_FORMATTED` | `chamilo_hook_event.notification_content` | 通知正文格式化时 |

## 插件示例：向文档查看器添加按钮

本节演示插件如何通过事件订阅器向现有 Chamilo 页面注入按钮——无需修改核心代码。

### 场景

一个名为 **MyViewer** 的插件希望在课程文件管理器中每个文档旁添加“在 MyViewer 中打开”按钮。相关事件为 `Events::DOCUMENT_ITEM_VIEW`，由 Chamilo 在即将显示文档时派发，并携带 `CDocument` 实体以及一份可变的链接列表。

### 插件目录结构

```
public/plugin/MyViewer/
├── plugin.php                          # Declares $plugin_info
├── install.php / uninstall.php
├── admin.php                           # Plugin settings page
├── lang/                               # Translation strings
└── src/
    ├── MyViewerPlugin.php              # Main plugin class (extends Plugin)
    └── EventSubscriber/
        └── MyViewerEventSubscriber.php # Event subscriber
```

### 主插件类（`src/MyViewerPlugin.php`）

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

`Plugin` 基类提供 `isEnabled()`、`get($settingKey)`，以及用于安装课程工具与设置的辅助方法。单例模式（`static $instance`）是 Chamilo 的标准约定，因为插件类也会在 Symfony 容器之外（遗留 PHP 页面中）被实例化。

### 事件订阅者（`src/EventSubscriber/MyViewerEventSubscriber.php`）

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

`addLink()` 会将 HTML 追加到数组中，Chamilo 的文档视图模板会在内置的“下载”和“预览”操作旁渲染该数组。订阅者从不修改 Chamilo 核心文件。

### 注册

无需手动注册服务。Chamilo 的 `config/services.yaml` 全局启用了 Symfony 的 `autoconfigure` 标志，会自动将任何实现 `EventSubscriberInterface` 的类标记为 `kernel.event_subscriber`。只要插件目录已被加载（通过 Composer 的 classmap 或 PSR-4 自动加载），Symfony 会在下次清除缓存时拾取该订阅者。

```bash
php bin/console cache:clear
```

### 事件数据如何流动

```
Document list rendered
        │
        ▼
Chamilo dispatches DocumentItemViewEvent (carries CDocument entity + empty links[])
        │
        ├─► MyViewerEventSubscriber::onDocumentItemView()  → appends HTML link
        ├─► OnlyofficeEventSubscriber::onDocumentItemView() → appends "Edit" button
        │   (any number of plugins can listen to the same event)
        ▼
Template renders event->getLinks() alongside built-in file actions
```

多个插件可以彼此独立地订阅同一事件；各自向共享数据追加内容，而无需了解其他插件。执行顺序遵循 Symfony 的优先级系统——若顺序重要，可在 `getSubscribedEvents()` 的处理程序元组中将优先级整数作为第二个元素传入：

```php
public static function getSubscribedEvents(): array
{
    return [
        Events::DOCUMENT_ITEM_VIEW => ['onDocumentItemView', 10], // higher = earlier
    ];
}
```