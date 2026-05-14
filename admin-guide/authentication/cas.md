# CAS

> **Chamilo 2.x 中的状态。** CAS 配置项（`cas_activate`、`cas_server`、`cas_server_uri`、`cas_port`、`cas_protocol`、`cas_add_user_activate`）作为 Chamilo 1.x 的遗留内容仍然存在于平台设置中，并且 CAS 仍然作为用户表单上的可选身份验证来源显示——但在 Chamilo 2.x 的安全管道中并未接入 CAS 身份验证器。通过 CAS 登录目前**无法开箱即用**。如果您需要在 Chamilo 2.x 上使用单点登录（SSO），请改用 [OAuth2](oauth2.md)（Azure / Keycloak / Generic）或 [LDAP](ldap.md)。

## CAS 的功能（1.x 版本行为）

CAS（中央认证服务）是一种常用于大学和研究机构的单点登录协议。在 Chamilo 1.x 中，点击“使用 CAS 登录”会将用户重定向到 CAS 服务器，验证返回的票据，并根据 CAS 属性创建或匹配本地账户。

## 迁移注意事项

如果您正在升级一个使用 CAS 的 Chamilo 1.x 门户网站，请计划暂时在 OAuth2 或 LDAP 的基础上重新实现该登录流程，直到 CAS 身份验证器在未来的 2.x 版本中恢复为止。