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

Legacy plugin installation and configuration code can still define course-level fields via the `$course_settings` property:

```php
public array $course_settings = [
    ['name' => 'my_plugin_enabled', 'type' => 'checkbox', 'default' => false],
    ['name' => 'my_plugin_limit',   'type' => 'text',     'default' => '10'],
];
```

Legacy integrations may use `validateCourseSetting(string $variable)` and `course_settings_updated(array $values)`. Do not assume that this declaration alone adds a section to the modern Vue course settings form. For Chamilo 3.1, register a Symfony course-settings extension as described below.

### Modern Symfony course settings extensions (3.1)

`CourseSettingsManager` delegates plugin sections to `CourseSettingsPluginRegistry`. A third-party plugin can extend the existing Vue/API Platform form without adding branches to CoreBundle or copying a legacy FormValidator form.

Implement `Chamilo\CoreBundle\State\CourseSettings\CourseSettingsPluginInterface`, or extend `AbstractCourseSettingsPlugin` for the common case. The following example assumes an installed plugin named `MyPlugin` and a class autoloadable by Composer; the namespace and service ID must match your own plugin.

```php
<?php

declare(strict_types=1);

namespace Chamilo\PluginBundle\MyPlugin;

use Chamilo\CoreBundle\Entity\Course;
use Chamilo\CoreBundle\Entity\Session;
use Chamilo\CoreBundle\State\CourseSettings\AbstractCourseSettingsPlugin;

final class MyPluginCourseSettings extends AbstractCourseSettingsPlugin
{
    protected function pluginName(): string
    {
        return 'MyPlugin';
    }

    public function getIntegrationKey(): string
    {
        return 'myPlugin';
    }

    public function getSection(Course $course, ?Session $session, array $values): ?array
    {
        return $this->section('my_plugin', 'My plugin', 'admin-settings', [
            $this->field('my_plugin_note', 'Course note', 'text'),
            $this->field('my_plugin_limit', 'Limit', 'number', min: 0, max: 100),
        ], collapsed: true);
    }
}
```

Merge a service definition into the existing `config/plugin.yaml` (keep its existing `parameters` and other service definitions intact):

```yaml
services:
    Chamilo\PluginBundle\MyPlugin\MyPluginCourseSettings:
        autowire: true
        tags: ['chamilo.course_settings_plugin']
```

Bundled extensions under `src/PluginBundle/CourseSettings/` are registered by `config/services.yaml`. The `_instanceof` rule tags implementations of the interface in that file; external services should specify the tag explicitly. The example requires no new controller or Vue route. Once the service is registered and the plugin is active, open the course settings form to inspect and save the section.

| Contract | Responsibility |
|----------|----------------|
| `getIntegrationKey()` / `getIntegration()` | Unique integration ID and enabled state for the context |
| `getSection()` | Section metadata and field descriptors (or `null`) |
| `getValues()` / `saveValues()` | Read and persist values |
| `afterSave()` | Plugin-specific follow-up after saving |
| `managesCourseSetting()` | Declare legacy course-setting variables managed by this integration, when applicable |

The base class checks plugin activation through `PluginHelper` and uses `CourseSettingsPluginStore` by default. This stores values in `c_course_setting` by course ID; receiving a `Session` argument does not automatically create session-specific storage. Override the persistence methods if a plugin genuinely needs its own storage and context rules. The base class defaults text to an empty string, numbers to zero, and checkboxes to false; use the field descriptors and your persistence implementation consistently.

Use unique integration, section and field keys. The registry validates submitted fields, ignores undeclared, disabled or read-only fields, respects global course-setting policies, and preserves existing values for partial saves. Do not accept arbitrary client keys or bypass course permissions. Use the supported field descriptors and verify rendering in the actual form; read-only links and external links are not writable fields. Custom storage must also enforce context and policy boundaries.

Validate the registration in the LMS repository:

```bash
php bin/console debug:container --tag=chamilo.course_settings_plugin
php bin/console lint:container
php bin/phpunit tests/CoreBundle/State/CourseSettings/CourseSettingsPluginRegistryTest.php
```

Test the plugin enabled and disabled, save/reload, invalid values, locked policies, and separate courses/sessions. Use the existing `CourseBlockCourseSettings` as a concrete implementation reference. The migration to tagged services covers BuyCourses, CourseBlock, CourseHomeNotify, CourseLegal, CustomCertificate and IMS/LTI. Paid-course checks have a separate optional `CourseSettingsPaidCourseProviderInterface` contract.

See [Plugin Architecture](plugin-architecture.md) and [LMS PR #9552](https://github.com/chamilo/chamilo-lms/pull/9552).

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

* **`LegacyPluginCourseTool`** (`src/CoreBundle/Tool/LegacyPluginCourseTool.php`) — Registers the plugin as a tool in the course
* **`CToolStateProvider`** (`src/CoreBundle/State/CToolStateProvider.php`) — Resolves which tools (including plugin tools) appear on the course homepage
* The tool appears in the `CTool` collection for the course

## Course Context

When a learner clicks your plugin's tool, your plugin code runs within the course context. You can access:

* The current course (via `api_get_course_id()` or the CID request store)
* The current session (if applicable)
* The current user
* Course-level plugin settings

## Examples

Built-in course tool plugins:

* **BigBlueButton** (`Bbb/`) — Video conferencing within courses
* **Zoom** (`Zoom/`) — Zoom meetings within courses
* **OnlyOffice** (`Onlyoffice/`) — Document editing within courses
