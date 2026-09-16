# 创建插件

本指南介绍如何为 Chamilo 创建一个基本插件。更多详细信息，请参阅[关于插件开发的 wiki 页面](https://github.com/chamilo/chamilo-lms/wiki/Plugin-development)。

## 步骤 1：创建插件目录

在 `public/plugin/` 中创建一个目录。目录名称应与您的插件标识符一致：

```
public/plugin/MyPlugin/
```

## 步骤 2：定义插件类

创建文件 `src/MyPluginPlugin.php`。该类继承自 `Plugin` 并遵循单例模式：

```php
<?php

class MyPluginPlugin extends Plugin
{
    protected function __construct()
    {
        $settings = [
            'tool_enable' => 'boolean',
            'api_key'     => 'text',
        ];
        parent::__construct('1.0', 'Your Name', $settings);
    }

    public static function create(): static
    {
        static $instance = null;
        return $instance ??= new static();
    }
}
```

### 可用的配置类型

| 类型       | 描述                     |
|------------|--------------------------|
| `boolean`  | 开/关复选框             |
| `text`     | 单行文本输入框          |
| `select`   | 下拉菜单（提供 `options` 数组） |
| `wysiwyg`  | 富文本编辑器            |
| `html`     | 原始 HTML 字段          |
| `checkbox` | 复选框                 |
| `user`     | 用户选择器             |

对于类型为 `select` 的配置：

```php
$settings = [
    'mode' => [
        'type'             => 'select',
        'options'          => ['auto' => 'Automatic', 'manual' => 'Manual'],
        'translate_options' => true,
    ],
];
```

在运行时访问配置：

```php
$plugin = MyPluginPlugin::create();
$key  = $plugin->get('api_key');       // 单个值
$all  = $plugin->get_settings();       // 所有配置
```

## 步骤 3：创建 plugin.php 文件

插件根目录下的 `plugin.php` 文件是**必需的**。它必须赋值 `$plugin_info`：

```php
<?php
$plugin_info = MyPluginPlugin::create()->get_info();
```

## 步骤 4：创建安装和卸载脚本

`install.php`：

```php
<?php
MyPluginPlugin::create()->install();
```

`uninstall.php`：

```php
<?php
MyPluginPlugin::create()->uninstall();
```

在类中使用 Doctrine 的 `SchemaTool` 实现模式的创建/删除。

## 步骤 5：添加翻译

在 `lang/` 目录下使用语言环境代码创建语言文件（例如 `en_US.php`、`fr_FR.php`、`es_ES.php`）。默认回退文件为 `en_US.php`。

```php
<?php
// lang/en_US.php
$strings['plugin_title']   = 'My Plugin';
$strings['plugin_comment'] = 'Description of what this plugin does.';
$strings['tool_enable']    = 'Enable plugin';
$strings['api_key']        = 'API Key';
$strings['api_key_help']   = 'Enter the API key from your account.';
```

通过 `$plugin->get_lang('key')` 访问翻译。

## 步骤 6：通过显示区域注入内容

插件可以在 Vue 前端的 18 个预定义区域中注入 HTML。在您的类中重写 `renderRegion()`：

```php
public function renderRegion(string $region): string
{
    if ('header_right' !== $region) {
        return '';
    }
    return '<div class="my-plugin-widget">Hello!</div>';
}
```

可用的区域包括：`content_bottom`、`content_top`、`course_tool_plugin`、`footer_center`、`footer_left`、`footer_right`、`header_center`、`header_left`、`header_main`、`header_right`、`login_bottom`、`login_top`、`main_bottom`、`main_top`、`menu_administrator`、`menu_bottom`、`menu_top`、`pre_footer`。

## 步骤 7：响应平台事件（可选）

插件可以使用 Symfony 的事件订阅者来响应平台事件。在 `src/EventSubscriber/` 内创建一个以 `EventSubscriber.php` 结尾的文件——它会通过 `PluginEventSubscriberPass` 自动注册。

```php
<?php
// src/EventSubscriber/MyPluginEventSubscriber.php

use Chamilo\CoreBundle\Event\Events;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class MyPluginEventSubscriber implements EventSubscriberInterface
{
    private MyPluginPlugin $plugin;

    public function __construct()
    {
        // 插件类不是 Symfony 服务——使用单例 create()。
        $this->plugin = MyPluginPlugin::create();
    }

    public static function getSubscribedEvents(): array
    {
        return [
            Events::COURSE_CREATED => 'onCourseCreated',
        ];
    }

    public function onCourseCreated($event): void
    {
        if (!$this->plugin->isEnabled()) {
            return;
        }
        // 您的逻辑在此处
    }
}
```

请参阅 `src/CoreBundle/Event/Events.php` 获取完整的事件列表（用户、课程、会话、学习路径、练习、作品集、认证等）。

## 步骤 8：生命周期钩子

在您的插件类中重写这些方法，以响应平台操作：

| 方法 | 触发时机 |
|--------|------------------|
| `install()` | 插件被激活时 |
| `uninstall()` | 插件被移除时 |
| `performActionsAfterConfigure()` | 管理员保存配置表单时 |
| `course_settings_updated(array $values)` | 课程级别的设置被更改时 |
| `validateCourseSetting(string $variable)` | 保存课程设置时（返回 `false` 以拒绝） |
| `doWhenDeletingUser(int $userId)` | 删除用户时 |
| `doWhenDeletingCourse(int $courseId)` | 删除课程时 |
| `doWhenDeletingSession(int $sessionId)` | 删除会话时 |

## 步骤 9：激活

以管理员身份登录，导航到 **管理插件**，找到您的插件并点击 **激活**。

## 小贴士

* **参考现有插件作为示例** — `public/plugin/HelloWorld/` 和 `public/plugin/TopLinks/` 是简单的良好参考
* **使用翻译** — 始终使用 `lang/` 系统处理面向用户的文本
* **卸载时清理** — 在卸载脚本中删除数据库表和配置
* **检查激活状态** — 在事件订阅者中，始终在执行逻辑前调用 `$this->plugin->isEnabled()`