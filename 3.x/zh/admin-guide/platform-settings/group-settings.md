# 小组设置

课程 **小组** 工具的行为。

可在 **管理 > 配置设置 > 小组** 下访问这些设置。此分类包含 **3 项设置**，下方列出平台设置固件（`SettingsCurrentFixtures.php`）中附带的标题与说明。

> 代码中的变量名以等宽字体显示。在通过 API 编写脚本，或需要通过编辑 [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) 在全局层面更改这些设置时，请使用该名称。

## 设置

### `allow_group_categories`

**小组分类**

是否允许教师在小组工具中创建分类？

*默认值：`false`*


### `hide_course_group_if_no_tools_available`

**无工具时隐藏课程小组**

若小组中没有任何可用工具，且用户未注册到该小组本身，则在小组列表中完全隐藏该小组。

*默认值：`false`*


### `show_groups_to_users`

**向用户显示班级**

向用户显示班级。班级是一项功能，允许您将用户组直接注册/注销到某个学期或某门课程，从而减少管理负担。选择此选项后，学习者将能够通过其社交网络界面查看自己所属的班级。

*默认值：`false`*