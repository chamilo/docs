# Plugins

Plugins extend Chamilo's functionality without modifying the core code. Chamilo 3.0 comes with over 50 plugins that can be activated as needed.

## The Plugins Block

The administration dashboard also has its own **Plugins** block, separate from this chapter's general plugin management. It doesn't list every installed plugin — only the ones whose configuration declares that they should appear in the admin menu region, giving each such plugin a direct shortcut to its own admin page right on the dashboard.

![The Plugins block on the administration dashboard, listing shortcuts to installed plugins that are configured to appear in the admin menu](/.gitbook/assets/admin-plugins-block.png)

If a plugin you've activated doesn't show up here, that's expected — it means that particular plugin hasn't declared itself for the admin menu region, not that something is broken. See [Managing Plugins](managing-plugins.md) for the full list of installed plugins regardless of whether they appear on the dashboard.

## In This Chapter

* **[Managing Plugins](managing-plugins.md)** — Install, activate, configure, and deactivate plugins
