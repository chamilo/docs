# SSO 配置

本页涵盖适用于所有身份验证方法的主题。

## 多个提供商

您可以同时启用多种身份验证方法。每个已启用的提供商都会在登录页上显示各自的按钮，与标准的用户名/密码表单并列。用户可选择其偏好的方法。

请保持标准表单处于启用状态，以便平台管理员始终能够登录，即使外部提供商配置错误。

## 身份验证优先级

当多种方法同时处于活动状态时，系统按以下顺序检查凭据：

1. LDAP（如果设置了 `force_as_login_method`）
2. OAuth2 提供商（按其在 `authentication.yaml` 中出现的顺序）
3. 内部 Chamilo 数据库

## 用于 API 访问的 JWT 令牌

Chamilo 对其 REST API 使用 JWT（JSON Web Tokens）。令牌生存期和刷新行为在 `config/packages/lexik_jwt_authentication.yaml` 中配置。这与 SSO 登录流程相互独立，仅适用于 API 客户端。

## 故障排除

### 配置后登录按钮未出现

每次更改 `authentication.yaml` 后都必须清除缓存：

```bash
php bin/console cache:clear && php bin/console cache:warmup
```

### 用户无法通过 SSO 登录

* **重定向 URI 不匹配** — 在身份提供商中注册的 URI 必须与 `https://your-chamilo-url/connect/<provider>/check` 完全一致。
* **时钟偏差** — SSO 令牌对时间敏感。请确保服务器时钟已同步（NTP）。
* **SSL 证书** — Chamilo 必须信任身份提供商的证书。请检查是否存在自签名证书问题。
* **日志** — 查看 `var/log/` 以及身份提供商的日志以获取具体错误信息。

### 用户被创建为错误的角色

请检查该提供商的角色映射配置。除非通过组或属性映射提升，新用户默认获得学生角色。

### 用户存在于提供商中但无法访问 Chamilo

* 如果 `allow_create_new_users` 为 false，该用户必须已有 Chamilo 账户，且其电子邮件或用户名与提供商的数据匹配。
* 检查该用户在 Chamilo 中是否未被停用。
* 对于 Azure，请查看 `existing_user_verification_order`，以了解 Chamilo 如何将传入用户与现有账户进行匹配。