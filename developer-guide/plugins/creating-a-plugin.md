# Creating a Plugin

This guide walks through creating a basic Chamilo plugin.

## Step 1: Create the Plugin Directory

Create a directory in `public/plugin/`:

```
public/plugin/my_plugin/
```

## Step 2: Define the Plugin Class

Create `plugin.php`:

```php
<?php

class MyPlugin extends Plugin
{
    protected function __construct()
    {
        parent::__construct(
            '1.0',
            'Your Name',
            [
                'tool_enable' => 'boolean',
                'api_key' => 'text',
            ]
        );
    }

    public static function create(): static
    {
        static $result = null;
        return $result ??= new static();
    }

    public function getName(): string
    {
        return 'my_plugin';
    }
}
```

## Step 3: Create Install and Uninstall Scripts

`install.php`:

```php
<?php
MyPlugin::create()->install();
```

`uninstall.php`:

```php
<?php
MyPlugin::create()->uninstall();
```

## Step 4: Add Translations

Create `lang/english.php`:

```php
<?php
$strings['plugin_title'] = 'My Plugin';
$strings['plugin_comment'] = 'Description of what this plugin does.';
$strings['tool_enable'] = 'Enable plugin';
$strings['api_key'] = 'API Key';
```

## Step 5: Add Functionality

Create `index.php` or additional PHP files in `src/` for your plugin's logic.

## Step 6: Activate

Log in as administrator, navigate to **Manage plugins**, find your plugin, and click **Activate**.

## Tips

* **Follow existing plugins as examples** — Look at simpler plugins like the ones in `public/plugin/` for reference implementations
* **Use translations** — Always use the `lang/` system for user-facing text to support internationalization
* **Clean up on uninstall** — Remove database tables and settings in the uninstall script
