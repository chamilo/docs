# 搜索设置

全文搜索系统（Xapian）的配置。

可在 **管理 > 配置设置 > 搜索** 下访问这些设置。此分类包含 **3 项设置**，下方列出平台设置 fixtures（`SettingsCurrentFixtures.php`）中附带的标题与说明。

> 代码中的变量名以等宽字体显示。在通过 API 编写脚本，或需要通过编辑 [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) 在全局层面更改这些设置时，请使用该名称。

## 设置

### `search_enabled`

**全文搜索功能**

选择“是”以启用此功能。该功能高度依赖 PHP 的 Xapian 扩展，因此若服务器上未安装该扩展（最低版本为 1.x），将无法使用。

*默认值：`false`*


### `search_prefilter_prefix`

**预过滤所用的特定字段**

此选项允许您选择在预过滤搜索类型中使用的特定字段。

### `search_show_unlinked_results`

**全文搜索：显示未关联结果**

在显示全文搜索结果时，对于当前用户无法访问的结果应如何处理？

*默认值：`true`*