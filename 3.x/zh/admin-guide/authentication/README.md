# 身份认证

Chamilo 支持多种身份认证方式，从内置的用户名/密码系统到企业级单点登录解决方案。

## 配置文件

所有外部身份认证方式均在 `config/authentication.yaml` 中配置。模板文件位于 `config/authentication.dist.yaml`。总体结构如下：

```yaml
parameters:
  authentication:
    <access_url_id>:
      <auth_method>:
        <provider_name>:
          <config_key>: <value>
```

编辑该文件后，请清除并预热缓存：

```bash
php bin/console cache:clear
php bin/console cache:warmup
```

缓存刷新后，外部登录按钮将出现在登录页面上。

## 支持的方式

* **[OAuth2](oauth2.md)** — Azure AD、Keycloak、Facebook 以及通用 OAuth2 提供商
* **[Azure Entra ID](azure-entra-id.md)** — 详细的 Azure/Entra ID 设置：应用注册、基于组的角色映射、证书认证，以及用户/组同步命令
* **[LDAP](ldap.md)** — 针对 LDAP 或 Active Directory 服务器进行认证
* **[CAS](cas.md)** — 中央认证服务（遗留方案，在 3.x 中不可用）
* **[SCIM](scim.md)** — 从外部身份提供商自动完成用户开通
* **[SSO Configuration](sso-configuration.md)** — 故障排除及跨方式说明

## 默认身份认证

默认情况下，Chamilo 使用其自身的内部系统——用户使用存储在 Chamilo 数据库中的用户名和密码登录。外部方式为附加方式：标准登录表单仍会保留，并与任何已配置的提供商一并可用。

## 进一步参考

完整参数参考及高级场景，请参阅 [External Authentication configuration wiki 页面](https://github.com/chamilo/chamilo-lms/wiki/External-Authentication-configuration)。