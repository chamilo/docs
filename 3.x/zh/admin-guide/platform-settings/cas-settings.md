# CAS 设置

从 Chamilo 1.x 沿用的旧版 CAS（中央认证服务）配置。有关 Chamilo 3.x 中 CAS 认证器的当前状态，请参见 [CAS](../authentication/cas.md)。

可在 **管理 > 配置设置 > CAS** 下访问这些设置。此类别包含 **7 项设置**，下方列出平台设置固件（`SettingsCurrentFixtures.php`）中附带的标题与注释。

> 代码中的变量名以等宽字体显示。在通过 API 编写脚本，或需要通过编辑 [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) 在全局层面更改这些设置时，请使用该名称。

## 设置

### `cas_activate`

**启用 CAS 认证**

启用 CAS 认证后，用户将可以使用其 CAS 凭据进行认证。<br/>请前往 <a href='settings.php?category=CAS'>插件</a>，为您的 Chamilo 校园添加可配置的“CAS 登录”按钮。或者，您可以通过在 app/config/auth.conf.php 中设置 cas[force_redirect] 来强制使用 CAS 认证。

### `cas_add_user_activate`

**启用 CAS 用户添加**

启用 CAS 用户添加。要从 LDAP 目录创建用户账户，必须在 app/config/auth.conf.php 中填写 extldap_config 和 extldap_user_correspondance 表。

### `cas_port`

**主 CAS 服务器端口**

用于连接主 CAS 服务器的端口

### `cas_protocol`

**主 CAS 服务器协议**

用于连接 CAS 服务器的协议

### `cas_server`

**主 CAS 服务器**

用于认证的主 CAS 服务器（IP 地址或主机名）

### `cas_server_uri`

**主 CAS 服务器 URI**

CAS 服务的路径

### `update_user_info_cas_with_ldap`

**从 LDAP 更新经 CAS 认证的用户账户信息**

确保用户的名、姓和电子邮件地址与 LDAP 目录中的当前值一致