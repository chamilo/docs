# Course Tool Plugins

Course tool plugins add new tools to the course homepage alongside built-in tools like Documents, Exercises, and Forums.

## How Course Tool Plugins Work

When a plugin registers itself as a course tool:

1. It appears in the course homepage tool grid
2. Teachers can show/hide it like any other tool
3. Clicking the tool opens the plugin's interface within the course context

## Registering as a Course Tool

In your plugin class, indicate that it provides a course tool:

```php
class MyToolPlugin extends Plugin
{
    protected function __construct()
    {
        parent::__construct('1.0', 'Author');
        $this->isCoursePlugin = true;
    }
}
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
