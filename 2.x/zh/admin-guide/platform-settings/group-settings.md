# 群组设置

课程**群组**工具的行为设置。

在**管理 > 配置设置 > 群组**下访问这些设置。此类别包含**3个设置**，以下列出平台设置固定数据（`SettingsCurrentFixtures.php`）中提供的标题和注释。

> 代码中的变量名以等宽字体显示。在通过API进行脚本编写或需要通过编辑[`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) 在全局级别更改这些设置时使用它。

## 设置

### `allow_group_categories`

**群组类别**

是否允许教师在群组工具中创建类别？

*默认值：`false`*

### `hide_course_group_if_no_tools_available`

**如果没有工具则隐藏课程群组**

如果群组中没有可用的工具，并且用户未注册到该群组本身，则在群组列表中完全隐藏该群组。

*默认值：`false`*

### `show_groups_to_users`

**向用户显示班级**

向用户显示班级。班级是一个功能，允许您直接将用户组注册/取消注册到会话或课程中，减少行政管理的麻烦。选择此选项后，学习者将能够通过他们的社交网络界面看到他们所在的班级。

*默认值：`false`*