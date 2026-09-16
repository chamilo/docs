# 课程工具插件

课程工具插件会在课程主页上新增工具，与文档、测验和论坛等内置工具并列显示。

## 课程工具插件的工作原理

当插件将自身注册为课程工具时：

1. 它会出现在课程主页的工具网格中
2. 教师可以像对待其他任何工具一样显示或隐藏它
3. 点击该工具会在课程上下文中打开插件界面

## 注册为课程工具

在插件类中，设置 `$isCoursePlugin = true`。若要自动在课程主页添加工具图标，还需设置 `$addCourseTool = true`：

```php
class MyToolPlugin extends Plugin
{
    protected function __construct()
    {
        parent::__construct('1.0', 'Author');
        $this->isCoursePlugin = true;
        $this->addCourseTool = true;
    }
}
```

## 按课程设置

通过 `$course_settings` 属性定义课程级配置字段：

```php
public array $course_settings = [
    ['name' => 'my_plugin_enabled', 'type' => 'checkbox', 'default' => false],
    ['name' => 'my_plugin_limit',   'type' => 'text',     'default' => '10'],
];
```

这些字段会出现在课程设置面板中，可通过重写 `validateCourseSetting(string $variable)` 进行校验（返回 `false` 以拒绝某个值），或通过 `course_settings_updated(array $values)` 作出响应。

## 安装与卸载

要在安装时为所有现有课程注册插件字段：

```php
public function install(): void
{
    $this->install_course_fields_in_all_courses(add_tool_link: true);
}
```

要安装到单个课程（例如新建课程时）：

```php
$this->course_install(courseId: $courseId, addToolLink: true);
```

要从特定课程中移除字段：

```php
$this->uninstall_course_fields(courseId: $courseId);
```

## 集成点

课程工具插件通过以下方式集成：

* **`LegacyPluginCourseTool`** (`src/CoreBundle/Tool/LegacyPluginCourseTool.php`) — 将插件注册为课程中的工具
* **`CToolStateProvider`** (`src/CoreBundle/State/CToolStateProvider.php`) — 解析课程主页上显示哪些工具（包括插件工具）
* 该工具会出现在课程的 `CTool` 集合中

## 课程上下文

当学习者点击您的插件工具时，插件代码会在课程上下文中运行。您可以访问：

* 当前课程（通过 `api_get_course_id()` 或 CID 请求存储）
* 当前学期（如适用）
* 当前用户
* 课程级插件设置

## 示例

内置课程工具插件：

* **BigBlueButton** (`Bbb/`) — 课程内视频会议
* **Zoom** (`Zoom/`) — 课程内 Zoom 会议
* **OnlyOffice** (`Onlyoffice/`) — 课程内文档编辑