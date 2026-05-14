# 邮件设置

如何构建外发邮件——发件人身份、布局、签名和特殊用途地址。

在 **管理 > 配置设置 > 邮件** 下访问这些设置。此类别包含 **18 个设置项**，以下列出平台设置固定数据（`SettingsCurrentFixtures.php`）中提供的标题和注释。

> 代码中的变量名以等宽字体显示。在通过 API 进行脚本编写或需要通过编辑 [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) 在全局级别更改这些设置时使用。

## 设置项

### `allow_email_editor_for_anonymous`

**匿名用户的邮件编辑器**

允许匿名用户从平台发送邮件。在当今信息安全时代，这不是一个推荐的选项。

*默认值：`true`*

### `cron_notification_help_desk`

**发送定时任务执行报告的邮件地址**

以邮件地址数组形式提供。尚不适用于所有定时任务。

### `mail_content_style`

**额外的邮件 HTML 主体属性**

应用于生成的通知邮件的 body 标签的额外 HTML 属性。

### `mail_header_style`

**额外的邮件 HTML 头部属性**

应用于生成的通知邮件的头部部分的额外 HTML 属性。

### `mailer_debug_enable`

**邮件：调试**

选择是否启用邮件发送调试日志。这些日志将提供更多关于连接邮件服务时发生情况的信息，但不够优雅，可能会破坏页面设计。仅在没有用户活动时使用。

*默认值：`false`*

### `mailer_dkim`

**邮件：DKIM 头部**

输入您的 DKIM 配置设置的 JSON 数组（参见示例）。

### `mailer_dsn`

**邮件 DSN**

DSN 完全包含连接邮件服务所需的所有参数。您可以在 https://symfony.com/doc/6.4/mailer.html#using-built-in-transports 了解更多信息。以下是一些支持的 DSN 语法的示例：https://symfony.com/doc/6.4/mailer.html#using-a-3rd-party-transport

*默认值：`null://null`*

### `mailer_exclude_json`

**邮件：避免使用 LD+JSON**

某些邮件客户端无法理解描述性的 LD+JSON 格式，会将其显示为最终用户的松散 JSON 字符串。如果是这种情况，您可能希望将下面的变量设置为 'false' 以禁用此头部。

*默认值：`false`*

### `mailer_from_email`

**从此邮件地址发送所有邮件**

设置邮件“发件人”字段中使用的默认邮件地址。

### `mailer_from_name`

**以这个（组织）名称作为所有邮件的发件人**

设置用于发送平台邮件的默认显示名称，例如“支持团队”。

### `mailer_mails_charset`

**邮件：字符集**

如果需要定义发送这些邮件时使用的字符集。如果不确定，请留空。

*默认值：`UTF-8`*

### `mailer_xoauth2`

**邮件：XOAuth2 选项**

如果您使用基于 XOAuth2 的邮件服务，请在此设置中使用 JSON 保存您的特定配置（参见示例），并在邮件服务设置中选择 XOAuth2。

### `messages_hide_mail_content`

**隐藏邮件内容以吸引用户访问平台**

优先使用简短的邮件版本，并附上平台消息空间的链接，以增加基于平台的参与度。

*默认值：`false`*

### `notifications_extended_footer_message`

**扩展通知页脚**

为特定语言的通知邮件添加自定义额外页脚，例如隐私政策通知。可以添加多种语言和段落。

### `send_notification_score_in_percentage`

**在测试结果通知中以百分比发送分数**

在测试结果通知邮件中以百分比而非分数发送练习分数。

*默认值：`false`*

### `send_two_inscription_confirmation_mail`

**发送两封注册邮件**

在注册时发送两封单独的邮件。一封用于用户名，另一封用于密码。

*默认值：`false`*

### `show_user_email_in_notification`

**在通知中显示发件人的邮件地址**

在个人消息和通知邮件中包含发件人的邮件地址及其姓名。

*默认值：`false`*

### `update_users_email_to_dummy_except_admins`

**在导入期间将用户邮件更新为虚拟值**

在特殊的 CSV 定时导入用户时，自动将邮件替换为虚拟邮件 username@example.com。

*默认值：`false`*