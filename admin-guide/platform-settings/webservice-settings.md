# 网络服务设置

配置传统的 SOAP / REST 网络服务（与现代 API Platform 端点分开）。

在 **管理 > 配置设置 > 网络服务** 下访问这些设置。此类别包含 **7 个设置**，以下列出平台设置固定数据（`SettingsCurrentFixtures.php`）中提供的标题和注释。

> 代码中的变量名以等宽字体显示。在通过 API 进行脚本编写或需要通过编辑 [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) 在全局级别更改这些设置时使用它。

## 设置

### `allow_download_documents_by_api_key`

**允许通过 API 密钥下载课程文档**

通过验证用户的 REST API 密钥下载文档

*默认值：`false`*

### `disable_webservices`

**禁用网络服务**

如果您不使用网络服务，请启用此选项以避免任何不必要的安全风险。

*默认值：`false`*

### `messaging_allow_send_push_notification`

**允许向 Chamilo 消息移动应用发送推送通知**

通过 Google 的 Firebase Console 发送推送通知

*默认值：`false`*

### `messaging_gdc_api_key`

**Firebase Console 用于云消息的服务器密钥**

来自项目凭据的服务器密钥（旧版令牌）

### `messaging_gdc_project_number`

**Firebase Console 用于云消息的发送者 ID**

您需要在 <a href='https://console.firebase.google.com/'>Google Firebase Console</a> 上注册一个项目

### `webservice_enable_adminonly_api`

**启用仅限管理员的网络服务**

某些 REST 网络服务仅限管理员使用，默认情况下是禁用的。启用此功能以授予对这些网络服务的访问权限（显然，仅限具有管理员凭据的用户）。

*默认值：`false`*

### `webservice_return_user_field`

**网络服务返回用户字段**

要求 REST 网络服务（v2.php）为与用户 ID 相关的字段返回另一个标识符。如果外部系统无法真正处理 Chamilo 中的用户 ID，这将非常有用，因为它可以帮助外部系统将用户数据返回与 Chamilo 已知的某些外部数据进行匹配。例如，如果您使用外部身份验证系统，可以返回用于将用户与外部身份验证系统匹配的额外字段，而不是 user.id。

*默认值：`oauth2_id`*