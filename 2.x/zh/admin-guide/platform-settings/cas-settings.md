# CAS 设置

从 Chamilo 1.x 继承的传统 CAS（中央认证服务）配置。有关 Chamilo 2.x 中 CAS 认证器的当前状态，请参见 [CAS](../authentication/cas.md)。

在 **管理 > 配置设置 > CAS** 下访问这些设置。此类别包含 **7 个设置**，以下列出平台设置固定数据（`SettingsCurrentFixtures.php`）中提供的标题和注释。

> 代码中的变量名以等宽字体显示。在通过 API 进行脚本编写或需要通过编辑 [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) 在全局级别更改这些设置时使用它。

## 设置

### `cas_activate`

**启用 CAS 认证**

启用 CAS 认证将允许用户使用他们的 CAS 凭据进行身份验证。<br/>前往 <a href='settings.php?category=CAS'>插件</a> 为您的 Chamilo 校园添加一个可配置的“CAS 登录”按钮。或者，您可以通过在 app/config/auth.conf.php 中设置 cas[force_redirect] 来强制进行 CAS 认证。

### `cas_add_user_activate`

**启用 CAS 用户添加**

启用 CAS 用户添加功能。要从 LDAP 目录创建用户账户，必须在 app/config/auth.conf.php 中填写 extldap_config 和 extldap_user_correspondance 表。

### `cas_port`

**主 CAS 服务器端口**

连接到主 CAS 服务器的端口

### `cas_protocol`

**主 CAS 服务器协议**

我们连接到 CAS 服务器所使用的协议

### `cas_server`

**主 CAS 服务器**

这是用于认证的主 CAS 服务器（IP 地址或主机名）

### `cas_server_uri`

**主 CAS 服务器 URI**

CAS 服务的路径

### `update_user_info_cas_with_ldap`

**从 LDAP 更新 CAS 认证的用户账户信息**

确保用户的名字、姓氏和电子邮件地址与 LDAP 目录中的当前值一致