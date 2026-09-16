# SCIM

**SCIM**（跨域身份管理系统，System for Cross-domain Identity Management）可自动完成用户预配——根据身份提供商中的变更创建、更新和停用 Chamilo 账户。与 OAuth2 或 LDAP 不同，SCIM 处理的是预配，而非登录。

| 场景 | SCIM 操作 |
|----------|-------------|
| 新员工入职 | 创建 Chamilo 账户 |
| 员工姓名或角色变更 | 更新 Chamilo 账户 |
| 员工离职 | 停用或删除 Chamilo 账户 |

## 配置

### 1. 设置 SCIM 令牌

在 `.env`（或 `.env.local`）文件中定义一个安全的随机令牌：

```
SCIM_TOKEN=your-secure-random-token
```

身份提供商使用此令牌对其发往 Chamilo SCIM 端点的请求进行身份验证。

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

### 3. 配置身份提供商

在身份提供商（Azure AD、Okta 等）中：

1. 将 Chamilo 添加为 SCIM 应用程序
2. 将 SCIM 基础 URL 设置为 `https://your-chamilo-url/scim/v2/`
3. 将第 1 步中的令牌作为承载令牌（bearer token）填入
4. 将提供商属性映射到 SCIM 标准字段（userName、name.givenName、name.familyName、emails）
5. 启用自动预配

## SCIM 端点

Chamilo 实现了 SCIM 2.0：

| 端点 | 方法 | 操作 |
|----------|--------|--------|
| `/scim/v2/Users` | GET | 列出用户 |
| `/scim/v2/Users` | POST | 创建用户 |
| `/scim/v2/Users/{id}` | GET | 获取用户 |
| `/scim/v2/Users/{id}` | PUT | 替换用户 |
| `/scim/v2/Users/{id}` | PATCH | 更新用户 |
| `/scim/v2/Users/{id}` | DELETE | 删除用户 |

## 提示

* **先从测试组开始** — 在为整个组织启用 SCIM 之前，先预配一小批用户。
* **与 OAuth2 结合使用** — 常见做法是使用 Azure AD OAuth2 进行登录，使用 Azure AD SCIM 进行预配。
* **监控日志** — 同时检查 Chamilo（`var/log/`）和身份提供商的预配日志以排查错误。