# CAS

> **Chamilo 3.x 中的状态。** CAS 配置项（`cas_activate`、`cas_server`、`cas_server_uri`、`cas_port`、`cas_protocol`、`cas_add_user_activate`）仍作为从 Chamilo 1.x 遗留的配置存在于平台设置中，并且 CAS 仍作为用户表单上可选的认证来源出现——但 Chamilo 3.x 的安全流水线中并未接入 CAS 认证器。通过 CAS 登录目前**无法**开箱即用。若你需要在 Chamilo 3.x 上使用 SSO，请改用 [OAuth2](oauth2.md)（Azure / Keycloak / Generic）或 [LDAP](ldap.md)。

## CAS 原本会做什么（1.x 行为）

CAS（Central Authentication Service，中央认证服务）是一种在高校与科研机构中常用的单点登录协议。在 Chamilo 1.x 中，点击“使用 CAS 登录”会将用户重定向到 CAS 服务器，校验返回的票据，并根据 CAS 属性创建或匹配本地账户。

## 迁移说明

若你正在升级曾使用 CAS 的 Chamilo 1.x 门户，请暂时计划在 OAuth2 或 LDAP 之上重新实现该登录流程，直至未来某个 3.x 版本恢复 CAS 认证器。