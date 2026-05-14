# SCIM

**SCIM**（跨域身份管理系统）能够自动化用户配置——根据身份提供商中的变更，创建、更新和停用 Chamilo 账户。与 OAuth2 或 LDAP 不同，SCIM 负责配置，而非登录。

| 场景 | SCIM 操作 |
|------|-----------|
| 新员工加入 | 创建 Chamilo 账户 |
| 员工姓名或角色变更 | 更新 Chamilo 账户 |
| 员工离职 | 停用或删除 Chamilo 账户 |

## 配置

### 1. 设置 SCIM 令牌

在您的 `.env`（或 `.env.local`）文件中，定义一个安全的随机令牌：

```
SCIM_TOKEN=your-secure-random-token
```

此令牌用于身份提供商向 Chamilo 的 SCIM 端点进行身份验证请求。

### 2. 在 authentication.yaml 中启用 SCIM

```yaml
authentication:
  1:
    scim:
      main:
        enabled: true
        auth_source: platform
```

编辑后清除并预热缓存：

```bash
php bin/console cache:clear && php bin/console cache:warmup
```

### 3. 配置您的身份提供商

在您的身份提供商（Azure AD、Okta 等）中：

1. 将 Chamilo 添加为 SCIM 应用程序
2. 将 SCIM 基础 URL 设置为 `https://your-chamilo-url/scim/v2/`
3. 输入步骤 1 中的令牌作为 bearer 令牌
4. 将提供商属性映射到 SCIM 标准字段（userName, name.givenName, name.familyName, emails）
5. 启用自动配置

## SCIM 端点

Chamilo 实现了 SCIM 2.0：

| 端点 | 方法 | 操作 |
|------|------|------|
| `/scim/v2/Users` | GET | 列出用户 |
| `/scim/v2/Users` | POST | 创建用户 |
| `/scim/v2/Users/{id}` | GET | 获取用户 |
| `/scim/v2/Users/{id}` | PUT | 替换用户 |
| `/scim/v2/Users/{id}` | PATCH | 更新用户 |
| `/scim/v2/Users/{id}` | DELETE | 删除用户 |

## 小贴士

* **从测试组开始** —— 在为整个组织启用 SCIM 之前，先配置一小部分用户。
* **与 OAuth2 结合使用** —— 常见的设置是使用 Azure AD OAuth2 进行登录，使用 Azure AD SCIM 进行配置。
* **监控日志** —— 检查 Chamilo（`var/log/`）和您的身份提供商的配置日志以查找错误。