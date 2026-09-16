# Web Services Settings

传统 SOAP / REST Web 服务的配置（独立于现代 API Platform 端点）。

可在 **管理 > 配置设置 > Web Services** 下访问这些设置。此分类包含 **7 项设置**，下方列出平台设置 fixtures（`SettingsCurrentFixtures.php`）中附带的标题与说明。

> 代码中的变量名以等宽字体显示。在通过 API 编写脚本，或需要通过编辑 [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) 在全局层面更改这些设置时，请使用该名称。

## Settings

### `allow_download_documents_by_api_key`

**允许通过 API Key 下载课程文档**

在验证用户 REST API 密钥后下载文档

*默认值：`false`*


### `disable_webservices`

**禁用 Web 服务**

若未使用 Web 服务，请启用此项以避免不必要的安全风险。

*默认值：`false`*


### `messaging_allow_send_push_notification`

**允许向 Chamilo Messaging 移动应用发送推送通知**

通过 Google 的 Firebase Console 发送推送通知

*默认值：`false`*


### `messaging_gdc_api_key`

**Firebase Console 云消息传递的服务器密钥**

项目凭据中的服务器密钥（旧版令牌）

### `messaging_gdc_project_number`

**Firebase Console 云消息传递的发送方 ID**

您需要在 <a href='https://console.firebase.google.com/'>Google Firebase Console</a> 上注册一个项目

### `webservice_enable_adminonly_api`

**启用仅限管理员的 Web 服务**

部分 REST Web 服务标记为仅限管理员使用，默认处于禁用状态。启用此功能可向这些 Web 服务开放访问（显然仅面向具有管理员凭据的用户）。

*默认值：`false`*

### `webservice_return_user_field`

**Web 服务返回的用户字段**

要求 REST Web 服务（v2.php）为与用户 ID 相关的字段返回另一种标识符。当外部系统并不真正使用 Chamilo 中的用户 ID 时，此功能很有用，有助于外部系统将返回的用户数据与 Chamilo 已知的某些外部数据相匹配。例如，若使用外部身份验证系统，可以返回用于将该用户与外部身份验证系统匹配的额外字段，而不是 user.id。

*默认值：`oauth2_id`*