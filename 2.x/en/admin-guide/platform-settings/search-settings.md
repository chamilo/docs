# Search Settings

Configuration of the full-text search system (Xapian).

Access these settings under **Administration > Configuration settings > Search**. This category contains **3 settings**, listed below with the title and comment shipped in the platform's settings fixtures (`SettingsCurrentFixtures.php`).

> The variable name in code is shown in monospace. Use it when scripting via the API or when you need to change those settings at a global level by editing [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Settings

### `search_enabled`

**Full-text search feature**

Select 'Yes' to enable this feature. It is highly dependent on the Xapian extension for PHP, so this will not work if this extension is not installed on your server, in version 1.x at minimum.

*Default: `false`*


### `search_prefilter_prefix`

**Specific Field for prefilter**

This option let you choose the Specific field to use on prefilter search type.

### `search_show_unlinked_results`

**Full-text search: show unlinked results**

When showing the results of a full-text search, what should be done with the results that are not accessible to the current user?

*Default: `true`*

