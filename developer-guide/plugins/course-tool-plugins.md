# 课程工具插件

课程工具插件为课程首页添加了新的工具，与内置工具如文档、练习和论坛并列显示。

## 课程工具插件的工作原理

当一个插件注册为课程工具时：

1. 它会出现在课程首页的工具网格中
2. 教师可以像对待其他工具一样显示或隐藏它
3. 点击该工具会在课程上下文中打开插件的界面

## 注册为课程工具

在您的插件类中，设置 `$isCoursePlugin = true`。要自动在课程首页添加工具图标，还需设置 `$addCourseTool = true`：

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

## 按课程配置

通过 `$course_settings` 属性定义课程级别的配置字段：

```php
public array $course_settings = [
    ['name' => 'my_plugin_enabled', 'type' => 'checkbox', 'default' => false],
    ['name' => 'my_plugin_limit',   'type' => 'text',     'default' => '10'],
];
```

这些字段会显示在课程设置面板中，可以通过重写 `validateCourseSetting(string $variable)`（返回 `false` 以拒绝某个值）进行验证，或者通过 `course_settings_updated(array $values)` 触发相关操作。

## 安装与卸载

在安装过程中为所有现有课程注册插件字段：

```php
public function install(): void
{
    $this->install_course_fields_in_all_courses(add_tool_link: true);
}
```

为单个课程安装（例如，当创建新课程时）：

```php
$this->course_install(courseId: $courseId, addToolLink: true);
```

删除特定课程的字段：

```php
$this->uninstall_course_fields(courseId: $courseId);
```

## 集成点

课程工具插件通过以下方式集成：

* **`LegacyPluginCourseTool`** (`src/CoreBundle/Tool/LegacyPluginCourseTool.php`) — 将插件注册为课程中的工具
* **`CToolStateProvider`** (`src/CoreBundle/State/CToolStateProvider.php`) — 确定哪些工具（包括插件工具）显示在课程首页
* 该工具会出现在课程的 `CTool` 集合中

## 课程上下文

当学生点击您的插件工具时，插件代码会在课程上下文中执行。您可以访问：

* 当前课程（通过 `api_get_course_id()` 或请求存储中的 CID）
* 当前会话（如果适用）
* 当前用户
* 课程级别的插件设置

## 示例

集成的课程工具插件：

* **BigBlueButton** (`Bbb/`) — 课程内的视频会议
* **Zoom** (`Zoom/`) — 课程内的 Zoom 会议
* **OnlyOffice** (`Onlyoffice/`) — 课程内的文档编辑