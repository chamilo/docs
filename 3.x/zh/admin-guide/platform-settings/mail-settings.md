# 邮件设置

出站邮件的构建方式——发件人身份、版式、签名以及特殊用途地址。

在 **管理 > 配置设置 > 邮件** 下访问这些设置。此类别包含 **17 项设置**，下方列出平台设置固件（`SettingsCurrentFixtures.php`）中附带的标题与说明。

> 代码中的变量名以等宽字体显示。在通过 API 编写脚本，或需要通过编辑 [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) 在全局层面更改这些设置时，请使用该名称。

## 设置

### `allow_email_editor_for_anonymous`

**匿名用户的电子邮件编辑器**

允许匿名用户从平台发送电子邮件。在当今信息安全环境下，不建议启用此选项。

*默认值：`true`*


### `cron_notification_help_desk`

**用于发送定时任务执行报告的电子邮件地址**

以电子邮件地址数组形式给出。目前尚非对所有定时任务均生效。

### `mail_content_style`

**额外的电子邮件 HTML 正文属性**

应用于所生成通知邮件 body 标签的额外 HTML 属性。

### `mail_header_style`

**额外的电子邮件 HTML 页眉属性**

应用于所生成通知邮件页眉部分的额外 HTML 属性。

### `mailer_debug_enable`

**邮件：调试**

选择是否启用电子邮件发送调试日志。这些日志会提供连接邮件服务时发生情况的更多信息，但不够美观，并可能破坏页面设计。仅在无用户活动时使用。

*默认值：`false`*


### `mailer_dkim`

**邮件：DKIM 头**

输入 DKIM 配置设置的 JSON 数组（参见示例）。

### `mailer_dsn`

**邮件 DSN**

DSN 完整包含连接邮件服务所需的全部参数。可在 https://symfony.com/doc/7.4/mailer.html#using-built-in-transports 了解更多信息。以下是若干受支持的 DSN 语法示例：https://symfony.com/doc/7.4/mailer.html#using-a-3rd-party-transport。对于 Microsoft 365（基本身份验证的 SMTP 正在停用），请改用 Microsoft Graph API 发送，DSN 为 `microsoftgraph+api://CLIENT_ID:CLIENT_SECRET@default?tenantId=TENANT_ID`（客户端密钥中的特殊字符需进行 URL 编码）。这需要已授予 `Mail.Send` 应用程序权限的 Entra ID 应用程序注册——参见 [电子邮件配置](../installation/email-configuration.md)。

*默认值：`null://null`*


### `mailer_exclude_json`

**邮件：避免使用 LD+JSON**

部分电子邮件客户端无法理解描述性 LD+JSON 格式，会将其作为松散的 JSON 字符串展示给最终用户。若属于这种情况，可将下方变量设为 'false' 以禁用此头。

*默认值：`false`*


### `mailer_from_email`

**所有电子邮件均从此电子邮件地址发送**

设置电子邮件“发件人”字段中使用的默认电子邮件地址。

### `mailer_from_name`

**所有电子邮件均以此（组织）名称作为发件来源**

设置发送平台电子邮件时使用的默认显示名称。例如“Support team”。

### `mailer_mails_charset`

**邮件：字符集**

如需定义发送这些电子邮件时使用的字符集。若不确定请留空。

*默认值：`UTF-8`*


### `messages_hide_mail_content`

**隐藏电子邮件内容以引导用户进入平台**

优先使用带有指向平台消息空间链接的简短电子邮件版本，以提高基于平台的参与度。

*默认值：`false`*


### `notifications_extended_footer_message`

**扩展通知页脚**

为特定语言的通知电子邮件添加自定义额外页脚，例如隐私政策声明。可添加多种语言和多个段落。

### `send_notification_score_in_percentage`

**在测验结果通知中以百分比发送分数**

在测验结果通知电子邮件中以百分比而非分数发送练习成绩。

*默认值：`false`*


### `send_two_inscription_confirmation_mail`

**发送 2 封注册电子邮件**

注册时发送两封独立电子邮件。一封用于用户名，另一封用于密码。

*默认值：`false`*


### `show_user_email_in_notification`

**在通知中显示发件人的电子邮件地址**

在个人消息和通知电子邮件中，将发件人的电子邮件地址与其姓名一并包含。

*默认值：`false`*


### `update_users_email_to_dummy_except_admins`

**导入期间将用户电子邮件更新为虚拟值**

在特殊的用户 CSV 定时导入期间，自动将电子邮件替换为虚拟电子邮件 username@example.com。

*默认值：`false`*