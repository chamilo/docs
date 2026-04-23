# Managing Plugins

## Accessing the Plugin Manager

![The plugin manager showing a list of available plugins with activation toggles and configuration options](/.gitbook/assets/admin-plugin-manager.png)

From the administration panel, click **Manage plugins** to see the list of available plugins.

## Plugin States

Each plugin has one of two states:

* **Active** — The plugin is enabled and its features are available on the platform
* **Inactive** — The plugin is installed but disabled

## Activating a Plugin

1. Find the plugin in the list
2. Click **Activate** or toggle it on
3. Configure the plugin settings (if applicable)
4. Save

Some plugins add tools to courses, new pages to the platform, or additional functionality to existing features.

## Configuring a Plugin

Many plugins have configuration options. After activating a plugin:

1. Click the **Settings** or **Configure** button next to the plugin
2. Fill in the required configuration (API keys, URLs, options, etc.)
3. Save

## Deactivating a Plugin

1. Find the plugin in the list
2. Click **Deactivate** or toggle it off
3. The plugin's features are immediately removed from the platform

Deactivating a plugin does not delete its data. If you reactivate it later, the data is still available.

## Plugin Categories

Plugins fall into several categories:

| Category | Examples |
|----------|---------|
| **Course tools** | Add new tools to the course homepage (e.g., video conference, advanced chat) |
| **Platform features** | Add new platform-wide functionality (e.g., custom pages, dashboard widgets) |
| **Authentication** | Add authentication methods |
| **Integration** | Connect to external services |

## Tips

* **Only activate what you need** — Each active plugin adds some overhead. Keep unused plugins deactivated.
* **Test before production** — Activate new plugins in a test environment first
* **Check compatibility** — After upgrading Chamilo, verify that all active plugins still work correctly
