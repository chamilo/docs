# 定时任务设置

Chamilo 附带的定时任务（cron 任务）的配置。

在 **管理 > 配置设置 > 定时任务** 下访问这些设置。此类别包含 **3 个设置**，以下列出平台设置固定数据（`SettingsCurrentFixtures.php`）中提供的标题和注释。

> 代码中的变量名以等宽字体显示。在通过 API 进行脚本编写或需要通过编辑 [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) 在全局级别更改这些设置时使用它。

## 设置

### `cron_remind_course_expiration_activate`

**提醒课程到期定时任务**

启用提醒课程到期定时任务

*默认值：`false`*

### `cron_remind_course_expiration_frequency`

**提醒课程到期定时任务的频率**

在课程到期前考虑发送提醒邮件的天数

### `cron_remind_course_finished_activate`

**发送课程完成通知**

是否在课程（会话）结束时向学生发送电子邮件。这需要配置定时任务（参见 main/cron/ 目录）。

*默认值：`false`*