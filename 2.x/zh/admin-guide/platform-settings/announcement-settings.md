# 公告设置

课程**公告**工具的行为设置——公告如何发送和安排。

在**管理 > 配置设置 > 公告**下访问这些设置。此类别包含**9个设置**，以下列出平台设置固定数据（`SettingsCurrentFixtures.php`）中提供的标题和注释。

> 代码中的变量名以等宽字体显示。在通过API进行脚本编写或需要通过编辑[`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) 在全局级别更改这些设置时使用它。

## 设置

### `allow_careers_in_global_announcements`

**将全局公告与职业和晋升关联**

启用后，全局公告可以与职业和晋升关联，以便进行有针对性的分发。

*默认值：`false`*

### `allow_coach_to_edit_announcements`

**允许教练始终编辑公告**

允许教练在活动或过去的会话中始终编辑公告。

*默认值：`false`*

### `allow_scheduled_announcements`

**在会话中启用定时公告**

允许会话管理者设置在特定日期或会话开始/结束后的若干天触发的公告。启用此功能需要设置一个定时任务。

*默认值：`false`*

### `announcements_hide_send_to_hrm_users`

**隐藏向人力资源用户发送公告的选项**

移除启用向具有人力资源角色的用户发送公告的复选框（仍需在公告工具中确认）。

*默认值：`true`*

### `course_announcement_scheduled_by_date`

**基于日期的公告**

允许教师配置在特定日期发送的公告。这需要您在cron/course_announcement.php上设置一个定时任务，至少每天运行一次。

*默认值：`false`*

### `disable_announcement_attachment`

**禁用公告附件**

尽管此版本中的附件处理方式优雅且不会在磁盘上重复，您可能仍希望完全禁用附件以避免过度使用。

*默认值：`false`*

### `disable_delete_all_announcements`

**禁用删除所有公告的按钮**

选择“是”以移除删除所有公告的按钮，因为教师可能会误用此功能。

*默认值：`false`*

### `hide_announcement_sent_to_users_info`

**在公告中隐藏“发送至”信息**

选择“是”以避免显示公告已发送给谁。

*默认值：`false`*

### `hide_send_to_hrm_users`

**隐藏向人力资源发送公告副本的选项**

在公告表单中，通常会出现一个选项，允许教师向用户的人力资源管理者发送公告副本。设置为“是”以移除该选项（并且*不*发送副本）。