# OAuth2

OAuth2 认证在 `config/authentication.yaml` 文件中进行配置。Chamilo 内置支持 Azure AD、Keycloak、Facebook 以及任何符合 OAuth2 标准的提供商。

## 步骤 1 — 在您的身份提供商中注册 Chamilo

在提供商的管理面板中创建一个应用程序，并将**重定向 URI**设置为：

```
https://your-chamilo-url/connect/<provider>/check
```

其中 `<provider>` 可以是 `azure`、`keycloak`、`facebook`，或者您为通用提供商指定的名称。记下**客户端 ID** 和**客户端密钥**。

## 步骤 2 — 配置 authentication.yaml

启用提供商并提供其凭据。所有提供商共享以下通用键：

| 键名 | 描述 |
|-----|-------------|
| `enabled` | 设置为 `true` 以激活 |
| `title` | 登录按钮上显示的标签 |
| `client_id` | 来自您的身份提供商 |
| `client_secret` | 来自您的身份提供商 |
| `allow_create_new_users` | 首次登录时自动创建 Chamilo 账户 |
| `allow_update_user_info` | 每次登录时同步用户数据 |
| `force_as_login_method` | 禁用其他方法并强制使用此方法 |

### Azure AD (Microsoft Entra ID)

```yaml
authentication:
  1:
    oauth2:
      azure:
        enabled: true
        title: "使用 Microsoft 登录"
        client_id: "<application-client-id>"
        client_secret: "<client-secret>"
        tenant: "<tenant-id>"
        url_login: "https://login.microsoftonline.com"
        path_authorize: "/<tenant-id>/oauth2/v2.0/authorize"
        path_token: "/<tenant-id>/oauth2/v2.0/token"
        url_api: "https://graph.microsoft.com"
        allow_create_new_users: true
        allow_update_user_info: true
```

Azure 还支持基于组的角色映射（将 Azure 组 ID 映射到 Chamilo 角色，如教师或管理员）、用户增量同步命令，以及使用证书认证替代客户端密钥。有关这些选项的详细信息，请参见 [wiki](https://github.com/chamilo/chamilo-lms/wiki/External-Authentication-configuration)。

### Keycloak

```yaml
authentication:
  1:
    oauth2:
      keycloak:
        enabled: true
        title: "使用 Keycloak 登录"
        client_id: "<client-id>"
        client_secret: "<client-secret>"
        auth_server_url: "https://keycloak.yourorg.com"
        realm: "your-realm"
        allow_create_new_users: true
```

### Facebook

```yaml
authentication:
  1:
    oauth2:
      facebook:
        enabled: true
        title: "使用 Facebook 登录"
        client_id: "<app-id>"
        client_secret: "<app-secret>"
        graph_api_version: "v20.0"
        allow_create_new_users: true
```

### 通用 OAuth2

适用于 Google、GitLab 或任何符合 OAuth2 标准的提供商：

```yaml
authentication:
  1:
    oauth2:
      myprovider:
        enabled: true
        title: "使用 MyProvider 登录"
        client_id: "<client-id>"
        client_secret: "<client-secret>"
        urlAuthorize: "https://provider.example.com/oauth/authorize"
        urlAccessToken: "https://provider.example.com/oauth/token"
        urlResourceOwnerDetails: "https://provider.example.com/api/user"
        scopes: ["openid", "email", "profile"]
        allow_create_new_users: true
```

字段映射（提供商属性如何映射到 Chamilo 的 `firstname`、`lastname`、`email` 等）以及角色映射也可以配置。有关映射键的完整列表，请参见 [wiki](https://github.com/chamilo/chamilo-lms/wiki/External-Authentication-configuration)。

## 步骤 3 — 清除缓存并测试

```bash
php bin/console cache:clear && php bin/console cache:warmup
```

退出 Chamilo 登录。配置的提供商按钮应出现在登录页面上。在向所有用户推广之前，使用专用账户进行测试。

## 小贴士

* 保留标准登录表单启用，以便管理员在 OAuth2 出现问题时始终可以登录。
* 当使用 Azure 与现有用户时，配置 `existing_user_verification_order` 以控制 Chamilo 如何将新用户匹配到现有账户。
* 角色分配默认设置为学生；使用组映射自动将用户提升为教师或管理员角色。