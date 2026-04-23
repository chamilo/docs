# Course Tool Plugins

Course tool plugins add new tools to the course homepage alongside built-in tools like Documents, Exercises, and Forums.

## How Course Tool Plugins Work

When a plugin registers itself as a course tool:

1. It appears in the course homepage tool grid
2. Teachers can show/hide it like any other tool
3. Clicking the tool opens the plugin's interface within the course context

## Registering as a Course Tool

In your plugin class, set `$isCoursePlugin = true`. To automatically add a tool icon to the course homepage, also set `$addCourseTool = true`:

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

## Per-Course Settings

Define course-level configuration fields via the `$course_settings` property:

```php
public array $course_settings = [
    ['name' => 'my_plugin_enabled', 'type' => 'checkbox', 'default' => false],
    ['name' => 'my_plugin_limit',   'type' => 'text',     'default' => '10'],
];
```

These appear in the course settings panel and can be validated by overriding `validateCourseSetting(string $variable)` (return `false` to reject a value) or acted on via `course_settings_updated(array $values)`.

## Installation and Uninstallation

To register the plugin fields across all existing courses on install:

```php
public function install(): void
{
    $this->install_course_fields_in_all_courses(add_tool_link: true);
}
```

To install into a single course (e.g., when a new course is created):

```php
$this->course_install(courseId: $courseId, addToolLink: true);
```

To remove fields from a specific course:

```php
$this->uninstall_course_fields(courseId: $courseId);
```

## Integration Points

Course tool plugins integrate through:

* **`LegacyPluginCourseTool`** — Registers the plugin as a tool in the course
* **`LegacyPluginCourseToolResolver`** — Resolves the tool for display on the course homepage
* The tool appears in the `CTool` collection for the course

## Course Context

When a learner clicks your plugin's tool, your plugin code runs within the course context. You can access:

* The current course (via `api_get_course_id()` or the CID request store)
* The current session (if applicable)
* The current user
* Course-level plugin settings

## Examples

Built-in course tool plugins:

* **BigBlueButton** (`bbb/`) — Video conferencing within courses
* **Zoom** (`zoom/`) — Zoom meetings within courses
* **OnlyOffice** (`onlyoffice/`) — Document editing within courses
