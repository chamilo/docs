# 定时任务设置

Chamilo 自带的计划任务（cron 任务）配置。

可在 **管理 > 配置设置 > 定时任务** 下访问这些设置。本分类包含 **5 项设置**，下方列出平台设置固件（`SettingsCurrentFixtures.php`）中附带的标题与说明。

> 代码中的变量名以等宽字体显示。通过 API 编写脚本，或需要通过编辑 [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) 在全局层面更改这些设置时，请使用该名称。

## 设置

### `cron_remind_course_expiration_activate`

**课程到期提醒定时任务**

启用课程到期提醒定时任务

*默认值：`false`*

### `cron_remind_course_expiration_frequency`

**课程到期提醒定时任务的频率**

在课程到期前多少天发送提醒邮件

### `cron_remind_course_finished_activate`

**发送课程结束通知**

是否在学生的课程（学期）结束时向其发送电子邮件。这需要配置定时任务（参见 main/cron/ 目录）。

*默认值：`false`*

### `cron_certificate_expiry_reminder_activate`

**证书到期提醒定时任务**

启用 `app:send-certificate-expiry-reminders` 定时任务，用于提醒证书已过期或即将过期的学习者。

*默认值：`false`*

### `cron_certificate_expiry_reminder_days`

**证书到期提醒窗口（天数）**

扫描即将过期证书的默认提前天数，除非定时任务以 `--days-ahead` 运行，否则使用该值。

*默认值：`30`*

## 证书到期提醒

成绩册证书可设置有效期（以天计），按成绩册类别配置——参见 [证书与技能](../../teacher-guide/tracking-and-reporting/certificates-and-skills.md)。证书一旦具有到期日期，Chamilo 即可在临近（或已过）该到期日期时，通过电子邮件和站内消息提醒学习者。

启用上述 `cron_certificate_expiry_reminder_activate` 仅开启*功能*；提醒实际由控制台命令发送，仍需在操作系统层面进行调度（例如通过 `crontab`），因为 Chamilo 不运行自有的后台调度器：

```bash
php bin/console app:send-certificate-expiry-reminders
```

常用选项：

| 选项 | 作用 |
|--------|--------|
| `--days-ahead=N` | 到期前多少天纳入扫描范围（默认取 `cron_certificate_expiry_reminder_days`） |
| `--force` | 实际发送提醒。不加此选项时，命令仅报告*将会*发送的内容——在接入 cron 前用于检查是安全的 |
| `--resend` | 即使某证书/到期日组合已通知过，仍重新发送提醒 |
| `--access-url-id=N` | 将扫描限制为某一个门户（多 URL 安装） |
| `--include-unsubscribed-users` | 同时通知已退订平台电子邮件的学习者 |

教师可手动发送相同提醒，无需此定时任务——参见 [证书与技能](../../teacher-guide/tracking-and-reporting/certificates-and-skills.md#certificate-validity-and-expiry)。