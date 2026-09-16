# 日程设置

**日程**工具（日历 / 事件）的默认值与行为。

可在 **管理 > 配置设置 > 日程** 下访问这些设置。该类别包含 **11 项设置**，下方列出平台设置固件（`SettingsCurrentFixtures.php`）中附带的标题与说明。

> 代码中的变量名以等宽字体显示。在通过 API 编写脚本，或需要通过编辑 [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) 在全局层面更改这些设置时，请使用该名称。

## 设置

### `agenda_colors`

**日程颜色**

为每种事件类型设置 HTML 颜色代码，以更改事件显示时的颜色。

### `agenda_legend`

**日程颜色图例**

添加一小段文字作为图例，说明事件所用颜色的含义。

### `agenda_on_hover_info`

**日程悬停信息**

自定义鼠标悬停在日程上时的显示内容。可显示日程备注和/或描述。

### `agenda_reminders_sender_id`

**正式发送日程提醒的用户 ID**

设置在日程提醒邮件中显示为发件人的用户。

*默认值：`0`*

### `allow_agenda_edit_for_hrm`

**允许 HRM 角色编辑或删除日程事件**

通过允许 HRM 在课程会话中编辑/删除日程事件，赋予其稍多权限。

*默认值：`false`*

### `allow_careers_in_global_agenda`

**将全局日历事件与职业和晋升关联**

启用后，全局日历事件可与职业和晋升关联，从而实现有针对性的日程安排。

*默认值：`false`*

### `allow_personal_agenda`

**个人日程**

学习者能否向日程中添加个人事件？

*默认值：`true`*

### `default_calendar_view`

**默认日历显示模式**

将其设置为 dayGridMonth、basicWeek、agendaWeek 或 agendaDay，以更改日历的默认视图。

*默认值：`month`*

### `fullcalendar_settings`

**日历自定义**

日程的额外设置，用于配置我们所使用的特定日历库。

### `personal_agenda_show_all_session_events`

**在个人日程中显示全部日程事件**

不隐藏已过期会话中的事件。

*默认值：`false`*

### `personal_calendar_show_sessions_occupation`

**在个人日程中显示会话占用情况**

启用后，会话时间表与占用情况会显示在用户的个人日历中。

*默认值：`false`*