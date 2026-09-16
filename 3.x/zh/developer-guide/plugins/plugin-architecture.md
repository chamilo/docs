# 插件架构

## 插件位置

插件存放于 `public/plugin/`。每个插件拥有独立目录：

```
public/plugin/
├── Bbb/                    # BigBlueButton integration
├── Zoom/                   # Zoom integration
├── Onlyoffice/             # OnlyOffice document editing
├── XApi/                   # xAPI/Tin Can
├── ...                     # bundled plugins ship under public/plugin/
```

## 插件结构

典型的插件目录包含：

```
public/plugin/MyPlugin/
├── plugin.php              # REQUIRED — assigns $plugin_info
├── install.php             # Installation script
├── uninstall.php           # Uninstallation script
├── index.php               # Region rendering entry point (if applicable)
├── admin.php               # Admin interface (optional)
├── lang/                   # Translation files (locale codes: en_US.php, fr_FR.php, …)
├── src/
│   ├── MyPluginPlugin.php        # Main plugin class (extends Plugin)
│   ├── Entity/                   # Doctrine entities (auto-discovered)
│   ├── Repository/               # Doctrine repositories
│   └── EventSubscriber/          # Symfony event subscribers (auto-registered)
├── templates/              # Twig templates
└── resources/              # CSS/JS assets
```

## 插件类

每个插件均继承 `Plugin` 基类（`public/main/inc/lib/plugin.class.php`），并遵循单例模式：

```php
class MyPluginPlugin extends Plugin
{
    protected function __construct()
    {
        $settings = ['api_key' => 'text', 'enabled' => 'boolean'];
        parent::__construct('1.0', 'Author Name', $settings);
    }

    public static function create(): static
    {
        static $instance = null;
        return $instance ??= new static();
    }
}
```

### 关键类属性

| 属性 | 类型 | 作用 |
|----------|------|--------|
| `$isCoursePlugin` | bool | 将插件注册为课程工具 |
| `$isAdminPlugin` | bool | 添加管理界面页面 |
| `$isMailPlugin` | bool | 与邮件系统集成 |
| `$addCourseTool` | bool | 在课程主页添加图标 |
| `$course_settings` | array | 定义按课程配置的字段 |

## 插件生命周期

1. **安装** — 管理员激活插件，将运行 `install.php`
2. **配置** — 设置通过管理面板定义与管理；存储于 `access_url_rel_plugin`（支持多租户）
3. **执行** — 插件向显示区域注入内容，或响应平台事件
4. **停用** — 插件被禁用，但其数据予以保留
5. **卸载** — 运行 `uninstall.php` 以清理数据与数据表

## 显示区域

插件通过重写 `renderRegion()`，向 Vue 前端的 18 个预定义区域注入 HTML：

```php
public function renderRegion(string $region): string
{
    if ('footer_left' !== $region) {
        return '';
    }
    return '<p>My Plugin footer content</p>';
}
```

可用区域：`content_bottom`、`content_top`、`course_tool_plugin`、`footer_center`、`footer_left`、`footer_right`、`header_center`、`header_left`、`header_main`、`header_right`、`login_bottom`、`login_top`、`main_bottom`、`main_top`、`menu_administrator`、`menu_bottom`、`menu_top`、`pre_footer`。

## Symfony 集成

### 事件订阅器

置于 `src/EventSubscriber/` 且文件名以 `EventSubscriber.php` 结尾的文件，会通过 `PluginEventSubscriberPass` 自动注册。它们实现 `EventSubscriberInterface`，并对 `src/CoreBundle/Event/Events.php` 中定义的事件作出响应。

由于插件类（`MyPluginPlugin`）不是 Symfony 服务，无法自动装配到订阅器构造函数中。请改用 `create()` 单例：

```php
class MyPluginEventSubscriber implements EventSubscriberInterface
{
    private MyPluginPlugin $plugin;

    public function __construct()
    {
        $this->plugin = MyPluginPlugin::create();
    }
}
```

### Doctrine 实体

置于 `src/Entity/` 的 Doctrine 实体由 `PluginEntityPass` 自动发现。请使用 PHP 8 属性进行映射。命名空间必须遵循 `Chamilo\PluginBundle\{PluginName}`。请使用唯一的表名前缀（例如 `my_plugin_*`）以避免冲突。

### PluginHelper 服务

若需从核心 Symfony 服务中访问插件状态，应注入 `PluginHelper`，而不是直接实例化插件类：

```php
use Chamilo\CoreBundle\Helpers\PluginHelper;

class SomeService
{
    public function __construct(private readonly PluginHelper $pluginHelper) {}

    public function doSomething(): void
    {
        if ($this->pluginHelper->isPluginEnabled('MyPlugin')) {
            $value = $this->pluginHelper->getPluginSetting('MyPlugin', 'api_key');
        }
    }
}
```

可用方法：

| 方法 | 用途 |
|--------|---------|
| `isPluginEnabled(string $name): bool` | 检查插件是否已安装，且对当前访问 URL 处于启用状态 |
| `loadLegacyPlugin(string $name): ?object` | 实例化并返回插件单例 |
| `getPluginSetting(string $name, string $key): mixed` | 读取单个插件设置值 |
| `getPluginOverrides(string $name): array` | 获取某插件的 `plugin.yaml` 覆盖项（默认值 + 特定访问 URL 的覆盖） |

## 核心文件参考

| 文件 | 用途 |
|------|---------|
| `public/main/inc/lib/plugin.class.php` | 插件基类 |
| `public/main/inc/lib/plugin.lib.php` | 插件管理器 |
| `src/CoreBundle/Entity/Plugin.php` | 插件 Doctrine 实体 |
| `src/CoreBundle/Helpers/PluginHelper.php` | PluginHelper 服务 |
| `src/CoreBundle/Event/Events.php` | 事件常量 |
| `public/plugin/HelloWorld/` | 最小示例插件 |
| `public/plugin/TopLinks/` | 简单示例插件 |