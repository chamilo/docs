# 公告设置

课程 **公告** 工具的行为——公告如何发送与排程。

可在 **管理 > 配置设置 > 公告** 下访问这些设置。此分类包含 **10 项设置**，下方列出平台设置固件（`SettingsCurrentFixtures.php`）中附带的标题与说明。

> 代码中的变量名以等宽字体显示。在通过 API 编写脚本，或需要通过编辑 [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) 在全局层面更改这些设置时，请使用该名称。

## 设置

### `allow_careers_in_global_announcements`

**将全局公告与职业方向及晋级关联**

启用后，全局公告可与职业方向及晋级关联，以便定向分发。

*默认值：`false`*

### `allow_coach_to_edit_announcements`

**允许辅导教师始终编辑公告**

允许辅导教师始终编辑进行中或已结束学期内的公告。

*默认值：`false`*

### `allow_scheduled_announcements`

**在学期中启用定时公告**

允许学期管理员设置将在特定日期触发，或在学期开始/结束前后若干天触发的公告。启用此功能需要配置 cron 任务。

*默认值：`false`*

### `announcements_hide_send_to_hrm_users`

**隐藏向人力资源用户发送公告的选项**

移除用于向具有人力资源角色的用户发送公告的复选框（仍需在公告工具中确认）。

*默认值：`true`*

### `course_announcement_scheduled_by_date`

**基于日期的公告**

允许教师配置将在特定日期发送的公告。这需要您设置 cron 任务，对 cron/course_announcement.php 至少每日运行一次。

*默认值：`false`*

### `disable_announcement_attachment`

**禁用公告附件**

尽管本版本中附件的处理方式较为优雅且不会在磁盘上重复占用空间，若您希望避免过度使用，仍可完全禁用附件。

*默认值：`false`*

### `disable_delete_all_announcements`

**禁用删除全部公告的按钮**

选择“是”以移除删除全部公告的按钮，因为教师可能误用该功能。

*默认值：`false`*

### `hide_announcement_sent_to_users_info`

**在公告中隐藏“发送至”信息**

选择“是”以避免显示公告已发送给哪些人。

*默认值：`false`*

### `hide_global_announcements_when_not_connected` **v3**

**对匿名用户隐藏全局公告**

对匿名用户隐藏平台公告，仅向已认证用户显示。

*默认值：`false`*

### `hide_send_to_hrm_users`

**隐藏向 HRM 发送公告副本的选项**

在公告表单中，通常会出现一个选项，允许教师将公告副本发送给用户的 HRM。将此项设为“是”以移除该选项（并且*不*发送副本）。