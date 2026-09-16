# 身份验证

Chamilo 支持多种身份验证方法，从内置的用户名/密码系统到企业单点登录解决方案。

## 配置文件

所有外部身份验证方法都在 `config/authentication.yaml` 中进行配置。提供了一个模板文件 `config/authentication.dist.yaml`。通用结构如下：

```yaml
parameters:
  authentication:
    <access_url_id>:
      <auth_method>:
        <provider_name>:
          <config_key>: <value>
```

编辑文件后，清除并预热缓存：

```bash
php bin/console cache:clear
php bin/console cache:warmup
```

外部登录按钮将在缓存刷新后出现在登录页面上。

## 支持的方法

* **[OAuth2](oauth2.md)** — Azure AD、Keycloak、Facebook 和通用 OAuth2 提供商
* **[LDAP](ldap.md)** — 对 LDAP 或 Active Directory 服务器进行身份验证
* **[CAS](cas.md)** — 中央认证服务（旧版，在 2.x 中不可用）
* **[SCIM](scim.md)** — 从外部身份提供商自动配置用户
* **[SSO 配置](sso-configuration.md)** — 故障排除和跨方法说明

## 默认身份验证

默认情况下，Chamilo 使用其内部系统——用户使用存储在 Chamilo 数据库中的用户名和密码登录。外部方法是附加的：标准登录表单与任何配置的提供商一起保持可用。

## 进一步参考

有关完整参数参考和高级场景，请参见[外部身份验证配置 wiki 页面](https://github.com/chamilo/chamilo-lms/wiki/External-Authentication-configuration)。