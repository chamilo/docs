# 术语表设置

课程 **Glossary** 工具的行为。

可在 **管理 > 配置设置 > 术语表** 下访问这些设置。此分类包含 **3 项设置**，下方列出平台设置固件（`SettingsCurrentFixtures.php`）中附带的标题与说明。

> 代码中的变量名以等宽字体显示。在通过 API 编写脚本，或需要通过编辑 [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) 在全局层面更改这些设置时，请使用该名称。

## 设置

### `allow_remove_tags_in_glossary_export`

**在术语表导出中移除 HTML 标签**

启用后，导出时将从术语表词条定义中移除 HTML 标签。

*默认值：`false`*

### `default_glossary_view`

**默认术语表视图**

选择术语表工具默认使用的视图（'table' 或 'list'）。

*默认值：`table`*

### `show_glossary_in_extra_tools`

**在其他工具中显示术语表词条**

可在此配置如何将术语表词条添加到学习路径和练习等其他工具中