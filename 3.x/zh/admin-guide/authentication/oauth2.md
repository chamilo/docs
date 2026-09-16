# OAuth2

OAuth2 身份验证在 `config/authentication.yaml` 中配置。Chamilo 内置支持 Azure AD、Keycloak、Facebook，以及任何符合 OAuth2 规范的通用提供商。

## 步骤 1 — 在身份提供商中注册 Chamilo

在提供商的管理面板中创建应用程序，并将**重定向 URI** 设置为：

```
https://your-chamilo-url/connect/<provider>/check
```

其中 `<provider>` 为 `azure`、`keycloak`、`facebook`，或您为通用提供商指定的名称。记下 **Client ID** 和 **Client Secret**。

## 步骤 2 — 配置 authentication.yaml

启用提供商并填写其凭据。所有提供商共用以下键：

| 键 | 说明 |
|-----|-------------|
| `enabled` | 设为 `true` 以启用 |
| `title` | 登录按钮上显示的标签 |
| `client_id` | 来自身份提供商 |
| `client_secret` | 来自身份提供商 |
| `allow_create_new_users` | 首次登录时自动创建 Chamilo 账户 |
| `allow_update_user_info` | 每次登录时同步用户数据 |
| `force_as_login_method` | 隐藏其他登录方式，仅显示该提供商的按钮 |
| `force_redirect` | 将匿名访问者自动发送到该提供商，无需点击按钮 |
| `skip_force_redirect_in` | `force_redirect` 不处理的 URL 片段列表 |

### Azure AD (Microsoft Entra ID)

Azure 有独立页面，涵盖应用注册、基于组的角色映射、证书身份验证以及账户预配同步命令 — 参见 [Azure Entra ID](azure-entra-id.md)。

### Keycloak

```yaml
authentication:
  1:
    oauth2:
      keycloak:
        enabled: true
        title: "Sign in with Keycloak"
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
        title: "Sign in with Facebook"
        client_id: "<app-id>"
        client_secret: "<app-secret>"
        graph_api_version: "v20.0"
        allow_create_new_users: true
```

### 通用 OAuth2

用于 Google、GitLab 或任何符合 OAuth2 规范的提供商：

```yaml
authentication:
  1:
    oauth2:
      myprovider:
        enabled: true
        title: "Sign in with MyProvider"
        client_id: "<client-id>"
        client_secret: "<client-secret>"
        urlAuthorize: "https://provider.example.com/oauth/authorize"
        urlAccessToken: "https://provider.example.com/oauth/token"
        urlResourceOwnerDetails: "https://provider.example.com/api/user"
        scopes: ["openid", "email", "profile"]
        allow_create_new_users: true
```

字段映射（提供商属性如何映射到 Chamilo 的 `firstname`、`lastname`、`email` 等）以及角色映射也可配置。完整映射键列表见 [wiki](https://github.com/chamilo/chamilo-lms/wiki/External-Authentication-configuration)。

## 可选 — 将每位访问者自动发送到提供商

有两个键控制访问者仍能看到多少登录页内容。二者相互独立，满足不同需求：

| 键 | 访问者看到的内容 |
|-----|-----------------------|
| `force_as_login_method: true` | 登录页精简为仅该提供商的按钮。访问者需点击它。 |
| `force_redirect: true` | 完全没有登录页。浏览器自行跳转到提供商。 |

当身份提供商拥有全部账户、本地登录表单已无用途时，使用 `force_redirect`：

```yaml
authentication:
  1:
    oauth2:
      keycloak:
        enabled: true
        title: "Sign in with Keycloak"
        force_redirect: true
        skip_force_redirect_in: ['/catalogue']
```

只能有一个提供商强制重定向。若多个提供商都声明了该选项，则以第一个已启用的为准。LDAP 不能声明该选项，因为它通过本地表单进行身份验证。

重定向仅作用于浏览器所显示的页面，不影响其他请求。以下请求始终保持原样：

* API、SCIM、MCP 或 XHR 调用，它们无法跟随面向浏览器的握手流程。
* 图片、样式表或文件下载。
* 任何写操作（POST、PUT、DELETE），因为浏览器会将重定向后的写请求重放为 GET 并丢弃请求体。
* 提供商握手本身（`/connect/...`）以及 `/logout`，否则会形成无限循环。
* 已有会话的访问者，包括公开课程的匿名账户。

对每个必须保持开放的公共区域（例如课程目录），将对应的 URL 片段加入 `skip_force_redirect_in`。

### 逃生通道

若身份提供方不可达，所有账号（包括本地管理员）都会被锁在门外。在任意 URL 后追加 `skipForcedRedirect=1`，即可仍访问本地登录表单：

```
https://your-chamilo-url/login?skipForcedRedirect=1
```

该选择会保存在会话中，因此后续页面会继续显示该表单。它还会在该会话中取消 `force_as_login_method`，从而把所有登录方式重新显示在页面上。若要将平台交还给身份提供方，请使用 `?skipForcedRedirect=0`，或关闭浏览器会话。

该参数仅属于 `force_redirect`。当没有任何提供方声明该键时，该参数完全不起作用，`force_as_login_method` 仍只显示其单个按钮。

请将此 URL 与恢复说明一并保存。在生产环境启用 `force_redirect` 之前务必先测试。

## 步骤 3 — 清除缓存并测试

```bash
php bin/console cache:clear && php bin/console cache:warmup
```

退出 Chamilo。登录页上应出现已配置提供方的按钮。在向全体用户推广之前，请先用专用账号进行测试。

## 提示

* 请保持标准登录表单处于启用状态，以便在 OAuth2 出现问题时管理员始终能够登录。若已设置 `force_redirect`，请改记 `?skipForcedRedirect=1` 这一 URL：这是返回该表单的唯一途径。
* 角色分配默认是学生；可使用组映射（Azure）自动将用户提升为教师或管理员角色 — 有关该功能以及如何将传入用户匹配到现有账号，请参见 [Azure Entra ID](azure-entra-id.md)。