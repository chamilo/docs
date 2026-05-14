# 插件架构

## 插件位置

插件存储在 `public/plugin/` 目录中。每个插件都有自己的目录：

```
public/plugin/
├── Bbb/                    # 与 BigBlueButton 集成
├── Zoom/                   # 与 Zoom 集成
├── Onlyoffice/             # 使用 OnlyOffice 编辑文档
├── XApi/                   # xAPI/Tin Can
├── ...                     # 包含的插件存放在 public/plugin/ 中
```

## 插件结构

一个典型的插件目录包含以下内容：

```
public/plugin/MyPlugin/
├── plugin.php              # 必需 — 定义 $plugin_info
├── install.php             # 安装脚本
├── uninstall.php           # 卸载脚本
├── index.php               # 区域渲染的入口点（如果适用）
├── admin.php               # 管理界面（可选）
├── lang/                   # 翻译文件（语言代码：en_US.php, fr_FR.php, …）
├── src/
│   ├── MyPluginPlugin.php        # 插件主类（继承 Plugin）
│   ├── Entity/                   # Doctrine 实体（自动发现）
│   ├── Repository/               # Doctrine 存储库
│   └── EventSubscriber/          # Symfony 事件订阅者（自动注册）
├── templates/              # Twig 模板
└── resources/              # CSS/JS 资源
```

## 插件类

每个插件都继承基础类 `Plugin`（`public/main/inc/lib/plugin.class.php`）并遵循单例模式：

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

### 类的主要属性

| 属性 | 类型 | 作用 |
|-------------|------|--------|
| `$isCoursePlugin` | bool | 将插件注册为课程工具 |
| `$isAdminPlugin` | bool | 添加管理界面页面 |
| `$isMailPlugin` | bool | 与电子邮件系统集成 |
| `$addCourseTool` | bool | 在课程首页添加图标 |
| `$course_settings` | array | 定义课程配置字段 |

## 插件生命周期

1. **安装** — 管理员激活插件，执行 `install.php`
2. **配置** — 配置通过管理面板设置和管理；存储在 `access_url_rel_plugin` 中（支持多租户）
3. **执行** — 插件在显示区域注入内容或对平台事件作出反应
4. **停用** — 插件被停用，但其数据被保留
5. **卸载** — 执行 `uninstall.php` 清理数据和表

## 显示区域

插件通过重写 `renderRegion()` 在 Vue 前端的 18 个预定义区域中注入 HTML：

```php
public function renderRegion(string $region): string
{
    if ('footer_left' !== $region) {
        return '';
    }
    return '<p>我的插件页脚内容</p>';
}
```

可用区域：`content_bottom`, `content_top`, `course_tool_plugin`, `footer_center`, `footer_left`, `footer_right`, `header_center`, `header_left`, `header_main`, `header_right`, `login_bottom`, `login_top`, `main_bottom`, `main_top`, `menu_administrator`, `menu_bottom`, `menu_top`, `pre_footer`。

## 与 Symfony 集成

### 事件订阅者

位于 `src/EventSubscriber/` 中的以 `EventSubscriber.php` 结尾的文件通过 `PluginEventSubscriberPass` 自动注册。它们实现 `EventSubscriberInterface` 并对 `src/CoreBundle/Event/Events.php` 中定义的事件作出反应。

由于插件类（`MyPluginPlugin`）不是 Symfony 服务，因此无法自动注入到订阅者的构造函数中。请改用单例 `create()`：

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

位于 `src/Entity/` 中的 Doctrine 实体通过 `PluginEntityPass` 自动发现。使用 PHP 8 属性进行映射。命名空间必须遵循 `Chamilo\PluginBundle\{PluginName}`。使用唯一的表名前缀（例如 `my_plugin_*`）以避免冲突。

### 服务 PluginHelper

要从 Symfony 的主要服务访问插件状态，请注入 `PluginHelper`，而不是直接实例化插件类：

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
|--------|------------|
| `isPluginEnabled(string $name): bool` | 检查插件是否已安装并对当前访问的 URL 处于激活状态 |
| `loadLegacyPlugin(string $name): ?object` | 实例化并返回插件的单例对象 |
| `getPluginSetting(string $name, string $key): mixed` | 读取插件的单个配置值 |
| `getPluginOverrides(string $name): array` | 获取插件的 `plugin.yaml` 中的覆盖设置（默认值 + 特定于访问 URL 的设置） |

## 主要文件参考

| 文件 | 用途 |
|------|------------|
| `public/main/inc/lib/plugin.class.php` | 插件基类 |
| `public/main/inc/lib/plugin.lib.php` | 插件管理器 |
| `src/CoreBundle/Entity/Plugin.php` | 插件的 Doctrine 实体 |
| `src/CoreBundle/Helpers/PluginHelper.php` | PluginHelper 服务 |
| `src/CoreBundle/Event/Events.php` | 事件常量 |
| `public/plugin/HelloWorld/` | 最小插件示例 |
| `public/plugin/TopLinks/` | 简单插件示例 |