# 社交网络设置

**社交网络** 的行为 — 好友、群组、墙贴、相册。

在 **管理 > 配置设置 > 社交网络** 下访问这些设置。此类别包含 **7 项设置**，下方列出平台设置 fixtures（`SettingsCurrentFixtures.php`）中附带的标题与说明。

> 代码中的变量名以等宽字体显示。在通过 API 编写脚本，或需要通过编辑 [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) 在全局层面更改这些设置时，请使用该名称。

## 设置

### `allow_social_tool`

**社交网络工具（类似 Facebook）**

社交网络工具允许用户与其他用户建立关系，并由此定义好友群组。结合内部消息工具，该工具可在门户环境内实现与好友的紧密沟通。

*默认值：`true`*

### `allow_students_to_create_groups_in_social`

**允许学员在社交网络中创建群组**

允许学员在社交网络中创建群组

*默认值：`false`*


### `disable_dislike_option`

**禁用社交帖子的“不喜欢”**

移除社交帖子反馈中的向下拇指选项。仅保留向上拇指（点赞）。

*默认值：`false`*

### `hide_social_groups_block`

**在社交网络中隐藏群组区块**

从社交网络视图中移除群组部分。

*默认值：`false`*


### `social_enable_messages_feedback`

**社交帖子的点赞/不喜欢**

允许用户对社交墙上的帖子添加反馈（点赞或不喜欢）。

*默认值：`false`*

### `social_make_teachers_friend_all`

**教师和管理员在社交网络上将学员视为好友**

在社交网络模块中，自动使教师和管理员对所有学员显示为好友。

*默认值：`false`*


### `social_show_language_flag_in_profile`

**在社交网络中于头像旁显示语言旗帜**

在社交网络个人资料中，将用户的语言偏好以旗帜图标显示在头像旁边。

*默认值：`false`*