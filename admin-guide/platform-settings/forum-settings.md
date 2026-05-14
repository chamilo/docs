# 论坛设置

课程**论坛**工具的行为设置。

在**管理 > 配置设置 > 论坛**下访问这些设置。此类别包含**9个设置**，以下列出平台设置固定数据（`SettingsCurrentFixtures.php`）中提供的标题和注释。

> 代码中的变量名以等宽字体显示。在通过API进行脚本编写或需要通过编辑[`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) 在全局级别更改这些设置时使用它。

## 设置

### `allow_forum_category_language_filter`

**论坛类别语言过滤器**

在论坛视图中添加语言过滤器，仅查看配置为特定语言的类别。需要在`forum_category`实体上使用`language`额外字段。

*默认值：`false`*

### `allow_forum_post_revisions`

**论坛帖子审核**

启用此选项以允许请求对论坛帖子进行审核或翻译。如果进行广泛配置，可用于在语言学习论坛中与其他用户协作。

*默认值：`false`*

### `community_managers_user_list`

**社区管理者列表**

提供一个用户ID数组，这些用户将被视为指定为全局论坛的特殊课程中的社区管理者。社区管理者在全局论坛上拥有额外的权限。

### `default_forum_view`

**默认论坛视图**

创建新论坛时的默认选项。然而，任何培训师都可以为每个单独的论坛选择不同的视图。

*默认值：`flat`*

### `display_groups_forum_in_general_tool`

**在常规论坛工具中显示小组论坛**

在课程级别的论坛工具中显示小组论坛。此选项默认启用（在这种情况下，小组论坛的个别可见性仍然作为额外标准）。如果禁用，小组论坛将只能通过小组工具查看，无论其是否公开。

*默认值：`true`*

### `forum_fold_categories`

**折叠论坛类别**

启用论坛类别折叠/展开的视觉效果。

*默认值：`false`*

### `global_forums_course_id`

**将课程用作全局论坛**

设置一个保留用作全局论坛的课程ID（数字）。这将社交网络中的“社交小组”链接替换为该课程论坛的链接。

*默认值：`0`*

### `hide_forum_post_revision_language`

**隐藏论坛帖子审核语言**

隐藏为论坛帖子审核分配语言的可能性。

*默认值：`false`*

### `subscribe_users_to_forum_notifications_also_in_base_course`

**同时接收基础课程的论坛通知**

启用此选项以启用来自基础课程论坛的通知，即使是通过会话跟随课程。

*默认值：`false`*