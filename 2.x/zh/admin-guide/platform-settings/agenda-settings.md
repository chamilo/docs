# 日程设置

**日程**工具（日历/事件）的默认设置和行为。

在**管理 > 配置设置 > 日程**下访问这些设置。此类别包含**11个设置**，以下列出平台设置固定数据（`SettingsCurrentFixtures.php`）中提供的标题和注释。

> 代码中的变量名以等宽字体显示。在通过API进行脚本编写或需要通过编辑[`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) 在全局级别更改这些设置时使用它。

## 设置

### `agenda_colors`

**日程颜色**

为每种事件类型设置HTML代码颜色，以在显示事件时更改颜色。

### `agenda_legend`

**日程颜色图例**

添加小段文字作为图例，描述事件使用的颜色。

### `agenda_on_hover_info`

**日程悬停信息**

自定义光标悬停时的日程显示。显示日程评论和/或描述。

### `agenda_reminders_sender_id`

**正式发送日程提醒的用户ID**

设置哪个用户作为日程提醒邮件的发送者。

*默认值：`0`*

### `allow_agenda_edit_for_hrm`

**允许HRM角色编辑或删除日程事件**

这赋予HRM更多权限，允许他们在课程会话中编辑/删除日程事件。

*默认值：`false`*

### `allow_careers_in_global_agenda`

**将全局日历事件与职业和晋升关联**

启用后，全局日历事件可以与职业和晋升相关联，允许有针对性的调度。

*默认值：`false`*

### `allow_personal_agenda`

**个人日程**

学习者是否可以将个人事件添加到日程中？

*默认值：`true`*

### `default_calendar_view`

**默认日历显示模式**

将其设置为dayGridMonth、basicWeek、agendaWeek或agendaDay以更改日历的默认视图。

*默认值：`month`*

### `fullcalendar_settings`

**日历自定义**

日程的额外设置，允许您配置我们使用的特定日历库。

### `personal_agenda_show_all_session_events`

**在个人日程中显示所有日程事件**

不隐藏已过期会话的事件。

*默认值：`false`*

### `personal_calendar_show_sessions_occupation`

**在个人日程中显示会话占用情况**

启用后，会话安排和占用情况将显示在用户的个人日历中。

*默认值：`false`*