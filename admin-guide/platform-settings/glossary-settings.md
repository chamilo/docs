# 词汇表设置

课程**词汇表**工具的行为设置。

在**管理 > 配置设置 > 词汇表**下访问这些设置。此类别包含**3个设置**，以下列出平台设置固定数据（`SettingsCurrentFixtures.php`）中提供的标题和注释。

> 代码中的变量名以等宽字体显示。在通过API进行脚本编写或需要通过编辑[`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) 在全局级别更改这些设置时使用它。

## 设置

### `allow_remove_tags_in_glossary_export`

**在词汇表导出中移除HTML标签**

启用后，在导出词汇表术语定义时将移除HTML标签。

*默认值：`false`*

### `default_glossary_view`

**默认词汇表视图**

选择词汇表工具中默认使用的视图（'table' 或 'list'）。

*默认值：`table`*

### `show_glossary_in_extra_tools`

**在额外工具中显示词汇表术语**

从这里您可以配置如何在额外工具中添加词汇表术语，例如学习路径和练习工具。