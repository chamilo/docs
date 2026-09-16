# 单点登录（SSO）配置

本页面涵盖了适用于各种身份验证方法的相关主题。

## 多重提供商

您可以同时启用多种身份验证方法。每个启用的提供商会在登录页面上显示自己的按钮，与标准的用户名/密码表单并列。用户可以选择他们偏好的方法。

请保持标准表单启用，以便平台管理员始终可以登录，即使外部提供商配置错误。

## 身份验证优先级

当多种方法同时激活时，系统会按以下顺序检查凭据：

1. LDAP（如果设置了 `force_as_login_method`）
2. OAuth2 提供商（按 `authentication.yaml` 中出现的顺序）
3. 内部 Chamilo 数据库

## 用于 API 访问的 JWT 令牌

Chamilo 使用 JWT（JSON Web Tokens）来支持其 REST API。令牌的生命周期和刷新行为在 `config/packages/lexik_jwt_authentication.yaml` 中配置。这与 SSO 登录流程无关，仅适用于 API 客户端。

## 故障排除

### 配置后登录按钮未出现

每次对 `authentication.yaml` 进行更改后，必须清除缓存：

```bash
php bin/console cache:clear && php bin/console cache:warmup
```

### 用户无法通过 SSO 登录

* **重定向 URI 不匹配** — 在您的身份提供商中注册的 URI 必须与 `https://your-chamilo-url/connect/<provider>/check` 完全匹配。
* **时钟漂移** — SSO 令牌对时间敏感。确保您的服务器时钟已同步（NTP）。
* **SSL 证书** — Chamilo 必须信任身份提供商的证书。检查是否存在自签名证书问题。
* **日志** — 查看 `var/log/` 以及您的身份提供商的日志，查找具体的错误消息。

### 用户被创建为错误的角色

检查提供商的角色映射配置。新用户默认被分配为学生角色，除非通过组或属性映射提升他们的角色。

### 用户在提供商中存在但无法访问 Chamilo

* 如果 `allow_create_new_users` 设置为 false，则用户必须已经拥有一个 Chamilo 账户，其电子邮件或用户名与提供商的数据匹配。
* 检查用户在 Chamilo 中是否被停用。
* 对于 Azure，查看 `existing_user_verification_order` 以了解 Chamilo 如何将新用户与现有账户匹配。