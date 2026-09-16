# 搜索设置

全文搜索系统（Xapian）的配置。

在**管理 > 配置设置 > 搜索**下访问这些设置。此类别包含**3个设置**，以下列出平台设置固定数据（`SettingsCurrentFixtures.php`）中提供的标题和注释。

> 代码中的变量名以等宽字体显示。在通过API进行脚本编写或需要通过编辑[`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) 在全局级别更改这些设置时使用它。

## 设置

### `search_enabled`

**全文搜索功能**

选择“是”以启用此功能。此功能高度依赖于PHP的Xapian扩展，如果您的服务器上未安装此扩展（至少1.x版本），则此功能将无法使用。

*默认值：`false`*

### `search_prefilter_prefix`

**预过滤的特定字段**

此选项允许您选择用于预过滤搜索类型的特定字段。

### `search_show_unlinked_results`

**全文搜索：显示未链接的结果**

在显示全文搜索结果时，对于当前用户无法访问的结果应如何处理？

*默认值：`true`*