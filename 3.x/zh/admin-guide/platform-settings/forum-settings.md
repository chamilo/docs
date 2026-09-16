# 论坛设置

课程 **Forums** 工具的行为。

可在 **Administration > Configuration settings > Forums** 下访问这些设置。此类别包含 **9 项设置**，下方列出平台设置固件（`SettingsCurrentFixtures.php`）中附带的标题与说明。

> 代码中的变量名以等宽字体显示。在通过 API 编写脚本，或需要通过编辑 [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) 在全局层面更改这些设置时，请使用该名称。

## 设置

### `allow_forum_category_language_filter`

**论坛分类语言筛选**

在论坛视图中添加语言筛选，以便仅查看配置为特定语言的分类。需要在 `forum_category` 实体上使用 `language` 额外字段。

*默认值：`false`*

### `allow_forum_post_revisions`

**论坛帖子审阅**

启用此选项后，可请求对论坛中自己的帖子进行审阅或翻译。经过充分配置后，可用于在语言学习论坛中与其他用户协作。

*默认值：`false`*

### `community_managers_user_list`

**社区管理员列表**

提供一组用户 ID，这些用户将在指定为全局论坛的特殊课程中被视为社区管理员。社区管理员在全局论坛上拥有额外权限。

### `default_forum_view`

**默认论坛视图**

创建新论坛时应使用的默认选项。不过，任何培训师都可以为每个单独的论坛选择不同的视图。

*默认值：`flat`*

### `display_groups_forum_in_general_tool`

**在通用论坛中显示小组论坛**

在课程级别的论坛工具中显示小组论坛。此选项默认启用（在此情况下，小组论坛各自的可见性仍作为额外条件生效）。若禁用，小组论坛无论是否公开，都只能通过小组工具查看。

*默认值：`true`*

### `forum_fold_categories`

**折叠论坛分类**

用于启用论坛分类折叠/展开的视觉效果。

*默认值：`false`*

### `global_forums_course_id`

**将课程用作全局论坛**

设置一门预留用作全局论坛的课程的课程 ID（数字）。这将用指向该课程论坛的链接替换社交网络中的“社交小组”链接。

*默认值：`0`*

### `hide_forum_post_revision_language`

**隐藏论坛帖子审阅语言**

隐藏为论坛帖子审阅指定语言的功能。

*默认值：`false`*

### `subscribe_users_to_forum_notifications_also_in_base_course`

**同时接收基础课程的论坛通知**

启用此选项后，即使通过学期关注课程，也可接收来自基础课程论坛的通知。

*默认值：`false`*