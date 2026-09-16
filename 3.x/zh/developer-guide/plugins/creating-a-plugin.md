# 创建插件

本指南将逐步介绍如何创建一个基础的 Chamilo 插件。更多细节请参阅 [Plugin development wiki page](https://github.com/chamilo/chamilo-lms/wiki/Plugin-development)。

## 步骤 1：创建插件目录

在 `public/plugin/` 中创建一个目录。目录名应与插件标识符一致：

```
public/plugin/MyPlugin/
```

## 步骤 2：定义插件类

创建 `src/MyPluginPlugin.php`。该类继承 `Plugin` 并遵循单例模式：

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

### 可用的设置类型

| Type | Description |
|------|-------------|
| `boolean` | 开/关复选框 |
| `text` | 单行文本输入 |
| `select` | 下拉列表（提供 `options` 数组） |
| `wysiwyg` | 富文本编辑器 |
| `html` | 原始 HTML 字段 |
| `checkbox` | 复选框 |
| `user` | 用户选择器 |

对于 `select` 设置：

```php
$settings = [
    'mode' => [
        'type'             => 'select',
        'options'          => ['auto' => 'Automatic', 'manual' => 'Manual'],
        'translate_options' => true,
    ],
];
```

在运行时访问设置：

```php
$plugin = MyPluginPlugin::create();
$key  = $plugin->get('api_key');       // single value
$all  = $plugin->get_settings();       // all settings
```

## 步骤 3：创建 plugin.php

插件根目录下的 `plugin.php` **是必需的**。它必须赋值 `$plugin_info`：

```php
<?php
$plugin_info = MyPluginPlugin::create()->get_info();
```

## 步骤 4：创建安装与卸载脚本

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

在类内部使用 Doctrine 的 `SchemaTool` 实现实际的模式创建/删除。

## 步骤 5：添加翻译

在 `lang/` 中使用区域代码创建语言文件（例如 `en_US.php`、`fr_FR.php`、`es.php`）。回退文件为 `en_US.php`。

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

插件可以向界面中 18 个预定义区域注入 HTML。具体由哪种机制渲染某个区域，取决于该区域本身：

* **`course_tool_plugin`** 是唯一通过在插件类中重写 `renderRegion(string $region): string` 来渲染的区域。仅当课程范围内的插件（`is_course_plugin`）且当前打开的是课程页面时，才会（通过 `PluginRegionController`）调用该方法：

  ```php
  public function renderRegion(string $region): string
  {
      if ('course_tool_plugin' !== $region) {
          return '';
      }
      return '<div class="my-plugin-widget">Hello!</div>';
  }
  ```

* **16 个通用区域** — `content_bottom`、`content_top`、`footer_center`、`footer_left`、`footer_right`、`header_center`、`header_left`、`header_main`、`header_right`、`login_bottom`、`login_top`、`main_bottom`、`main_top`、`menu_bottom`、`menu_top`、`pre_footer` — 通过引入插件自身的 `index.php` 来渲染，而不是 `renderRegion()`。框架在引入该文件之前会设置 `$plugin_info['current_region']`，因此该文件既可以直接对该区域 `echo` HTML，也可以通过 `$plugin_info['templates']` 声明要渲染的 Twig 模板：

  ```php
  <?php
  // index.php
  if (!class_exists('MyPluginPlugin', false)) {
      require_once __DIR__.'/src/MyPluginPlugin.php';
  }

  $region = (string) ($plugin_info['current_region'] ?? '');

  if ('header_right' === $region) {
      echo '<div class="my-plugin-widget">Hello!</div>';
  }
  ```

  `public/plugin/HelloWorld/index.php` 是一个完整可用的示例 — HelloWorld 完全没有重写 `renderRegion()`；它填充的每个区域都经过 `index.php`。

* **`menu_administrator`** 是一种特殊情况，专用于在旧版管理仪表板中显示仅管理员可见的链接，而非上述两种机制。`Dashboard` 和 `CleanDeletedFiles` 是使用该区域的真实插件。

无论使用哪种机制，管理员仍须在 **管理插件** 页面上该插件旁的 **区域** 按钮中为你的插件开启相应区域（参见 [步骤 9](#step-9-activate)）——若某区域未在该处被明确启用，插件不会在该区域渲染任何内容。

## 第 7 步：响应平台事件（可选）

插件可通过 Symfony 事件订阅者响应平台事件。在 `src/EventSubscriber/` 中创建一个以 `EventSubscriber.php` 结尾的文件——它会通过 `PluginEventSubscriberPass` 自动注册。

须满足两项要求，否则订阅者会被静默跳过：类必须位于**全局命名空间**（该 Pass 根据文件名解析类），并且添加后必须运行 `composer dump-autoload`（`public/plugin` 是 classmap 条目）。可用 `php bin/console debug:event-dispatcher <event.name>` 检查结果。

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
        // Plugin classes are not Symfony services — use the create() singleton.
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
        // your logic here
    }
}
```

完整可用事件列表见 `src/CoreBundle/Event/Events.php`（用户、课程、学期、学习路径、练习、作品集、身份验证等）。

### 在课程、学期或用户被删除时进行清理

若插件按课程、学期或用户存储行数据，请订阅 `Events::COURSE_DELETED`、`Events::SESSION_DELETED` 或 `Events::USER_DELETED`。这是清理数据的唯一方式——旧的 `doWhenDeleting*` 方法已不存在。这些监听器须遵守三条规则：

* **在 `AbstractEvent::TYPE_PRE` 上执行** — 事件在行被移除之前触发，这是外键仍可解析、数据仍可读的唯一时机。`USER_DELETED` 也会以 `TYPE_POST` 触发，因此该检查在此处并非可选项。
* **以已安装而非已启用为守卫条件** — 使用 `AppPlugin::getInstance()->isInstalled($this->plugin->get_name())`。插件停用后，或仅在另一访问 URL 上启用时，行数据仍会保留，其外键无论哪种情况都会阻止删除。
* **在 `USER_DELETED` 上检查 `$event->isHardDelete()`** — 软删除会保留用户以便恢复，因此其数据必须保留。

```php
public function onUserDeleted(UserDeletedEvent $event): void
{
    if (AbstractEvent::TYPE_PRE !== $event->getType() || !$event->isHardDelete()) {
        return;
    }

    $userId = $event->getUser()?->getId();

    if (empty($userId) || !AppPlugin::getInstance()->isInstalled($this->plugin->get_name())) {
        return;
    }

    Database::getManager()->getConnection()->executeStatement(
        'DELETE FROM my_plugin_table WHERE user_id = :userId',
        ['userId' => $userId]
    );
}
```

`StudentFollowUp` 插件是用户相关的参考实现；`Bbb`、`BuyCourses` 和 `EmbedRegistry` 则对应课程与学期的等价实现。

## 第 8 步：生命周期钩子

在插件类中重写这些方法以响应平台操作：

| 方法 | 触发时机 |
|--------|----------------|
| `install()` | 插件被激活 |
| `uninstall()` | 插件被移除 |
| `performActionsAfterConfigure()` | 管理员保存配置表单 |
| `course_settings_updated(array $values)` | 课程级设置发生变化 |
| `validateCourseSetting(string $variable)` | 课程设置被保存（返回 `false` 以拒绝） |

`doWhenDeletingUser()`、`doWhenDeletingCourse()` 和 `doWhenDeletingSession()` 已被移除，连同调用它们的 `AppPlugin::performActionsWhenDeletingItem()` 触发器——现在重写它们不会产生任何效果。请改用[第 7 步](#cleaning-up-when-a-course-session-or-user-is-deleted)中的删除事件。

## 第 9 步：激活

以管理员身份登录，进入管理仪表板的 **Platform** 区块，然后打开 **Plugins** — 这将打开 **Manage plugins** 页面。找到你的插件并点击 **Install**；安装完成后，点击 **Enable** 以激活（已启用的插件会显示 **Disable** 按钮）。

## 提示

* **以现有插件为范例** — `public/plugin/HelloWorld/` 和 `public/plugin/TopLinks/` 是很好的简单参考
* **使用翻译** — 面向用户的文本始终使用 `lang/` 系统
* **卸载时清理** — 在卸载脚本中移除数据库表和设置
* **检查启用状态** — 在事件订阅者中，执行逻辑前调用 `$this->plugin->isEnabled()`。删除时的清理是例外：应以已安装为守卫条件，因为行数据会在插件被禁用后继续存在