# 社交网络设置

**社交网络**的行为——朋友、群组、墙上帖子、相册。

在**管理 > 配置设置 > 社交网络**下访问这些设置。此类别包含**7个设置**，以下列出平台设置固定数据（`SettingsCurrentFixtures.php`）中提供的标题和注释。

> 代码中的变量名以等宽字体显示。在通过API进行脚本编写或需要通过编辑[`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) 在全局级别更改这些设置时使用它。

## 设置

### `allow_social_tool`

**社交网络工具（类似Facebook）**

社交网络工具允许用户与其他用户建立关系，并通过这样做来定义朋友群组。结合内部消息工具，此工具允许在门户环境中与朋友进行紧密沟通。

*默认值：`true`*

### `allow_students_to_create_groups_in_social`

**允许学习者在社交网络中创建群组**

允许学习者在社交网络中创建群组

*默认值：`false`*

### `disable_dislike_option`

**禁用社交帖子的“踩”选项**

移除社交帖子反馈中的“踩”选项，仅保留“赞”（点赞）。

*默认值：`false`*

### `hide_social_groups_block`

**在社交网络中隐藏群组模块**

从社交网络视图中移除群组部分。

*默认值：`false`*

### `social_enable_messages_feedback`

**社交帖子的点赞/踩**

允许用户对社交墙上的帖子添加反馈（点赞或踩）。

*默认值：`false`*

### `social_make_teachers_friend_all`

**教师和管理员在社交网络上被学生视为朋友**

自动使教师和管理员在社交网络模块中对所有学生显示为朋友。

*默认值：`false`*

### `social_show_language_flag_in_profile`

**在社交网络中头像旁显示语言标志**

在社交网络个人资料中，将用户的语言偏好显示为头像旁边的旗帜图标。

*默认值：`false`*