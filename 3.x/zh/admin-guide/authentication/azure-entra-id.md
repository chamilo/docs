# Azure Entra ID

Microsoft 于 2023 年将 Azure Active Directory（Azure AD）更名为 **Microsoft Entra ID**——二者为同一服务，而 Chamilo 的代码与配置仍以 `azure` 指代。本页介绍该集成中 Azure 特有的部分：应用注册、基于组的角色映射、证书认证，以及专用的用户/组同步命令。各提供商共用的配置键（`enabled`、`title`、`allow_create_new_users` 等）以及通用的 `authentication.yaml` 结构，请参见 [OAuth2](oauth2.md)。

## 在 Microsoft Entra ID 中注册 Chamilo

1. 在 Entra 管理中心，为 Chamilo 创建 **应用注册**。
2. 将重定向 URI（平台类型 **Web**）设置为：

   ```
   https://your-chamilo-url/connect/azure/check
   ```

3. 记下 **应用程序（客户端）ID** 和 **目录（租户）ID**——两者都需要。
4. 在 **证书和密码** 下，创建客户端密码或上传证书（参见下方 [证书认证](#certificate-authentication)）。
5. 在 **API 权限** 下，添加下列 Microsoft Graph 权限并授予管理员同意。

| 权限 | 类型 | 用途 |
|------------|------|-------------|
| `User.Read` | 委派 | 基本登录 |
| `GroupMember.Read.All` | 委派 | 登录时基于组的角色映射 |
| `User.Read.All` | 应用程序 | `app:azure-sync-users` |
| `GroupMember.Read.All` 或 `Group.Read.All` | 应用程序 | `app:azure-sync-users` 和 `app:azure-sync-usergroups` |

应用程序权限需要管理员同意，且仅由同步控制台命令使用（通过 `client_credentials` 授权），绝不会用于交互式用户登录。

## 基本配置

```yaml
authentication:
  1:
    oauth2:
      azure:
        enabled: true
        title: "Sign in with Microsoft"
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

### 多租户与单租户

`tenant` 的值必须与应用注册中“受支持的帐户类型”的设置一致：

* 特定租户 GUID — 单租户，仅该组织的帐户可以登录
* `organizations` — 任意 Entra ID 租户
* `common` — 任意 Entra ID 租户以及个人 Microsoft 帐户

## 必需的用户属性

每位需要登录 Chamilo 的 Entra ID 用户都必须填写 `mail` 和 `mailNickname`——若任一为空，登录会报错（以及始终存在的不可变 Entra 对象 ID）。从 Microsoft Graph 到 Chamilo 的字段映射对 Azure 是**固定的**（与可配置字段映射的通用 OAuth2 提供商不同）：

| Chamilo 字段 | Microsoft Graph 来源 |
|---------------|------------------------|
| 名 | `givenName` |
| 姓 | `surname` |
| 电子邮件 | `mail` |
| 用户名 | `userPrincipalName` |
| 电话 | `telephoneNumber`，然后 `businessPhones[0]`，然后 `mobilePhone` |
| 启用 | `accountEnabled` |
| 界面语言 | `preferredLanguage`（匹配已安装的 Chamilo 语言，否则回退到平台默认语言） |

每次成功登录还会写入三个额外字段：`organisationemail`（= `mail`）、`azure_id`（= `mailNickname`）和 `azure_uid`（= Entra 对象 ID）。它们支撑下文的帐户匹配逻辑。

## 将登录匹配到现有 Chamilo 帐户

将 `existing_user_verification_order` 设为数字 `1`–`3` 的逗号分隔列表，以控制传入的 Entra ID 登录如何匹配现有 Chamilo 帐户：

| 值 | 匹配对象 |
|-------|------------------|
| `1` | 额外字段 `organisationemail` == Entra `mail` |
| `2` | 额外字段 `azure_id` == Entra `mailNickname` |
| `3` | 额外字段 `azure_uid` == Entra 对象 ID |

按所列顺序尝试各位；第一个处于活动状态（未软删除）的匹配胜出。无效或空值默认回退为 `1,2,3`。若所配置的各位均未匹配——某用户首次登录时总是如此，因为这些额外字段仅在*成功登录之后*才会填充——Chamilo 会回退为将 Chamilo 自身的 `email` 字段与 Entra `mail` 匹配，然后将 `username` 与 `userPrincipalName` 匹配，无论您如何配置。

## 基于组的角色映射

将 Entra ID 安全组通过其对象 ID（GUID）映射到 Chamilo 角色：

```yaml
authentication:
  1:
    oauth2:
      azure:
        group_id:
          admin: "<entra-group-object-id>"
          session_admin: "<entra-group-object-id>"
          teacher: "<entra-group-object-id>"
```

每次登录时，Chamilo 会使用用户自身的访问令牌调用 Microsoft Graph `/v1.0/me/memberOf`，并按 **admin → session_admin → teacher** 的顺序，将返回的组与上述三个 ID 进行比对。首次匹配即生效——同时属于管理员组和教师组的用户仅会被提升为管理员。未属于任何已配置组的用户将保留其现有角色（首次登录时则为默认的学生角色）。此功能需要上文列出的委托权限 `GroupMember.Read.All`。

## 证书认证

作为 `client_secret` 的替代方案，可改用证书进行认证：

```yaml
authentication:
  1:
    oauth2:
      azure:
        client_certificate_private_key: "<PEM private key, single line, with \\n for line breaks>"
        client_certificate_thumbprint: "<hex SHA1 thumbprint>"
```

在应用注册的 **Certificates & secrets** 下上传对应的公钥证书，并将其指纹（门户中以十六进制显示）复制到 `client_certificate_thumbprint`。当这两个键均已设置时，Chamilo 会构建已签名的 JWT 客户端断言（RS256），而不再发送 `client_secret`——这同时适用于交互式登录以及同步命令的仅应用认证。

## 从 Entra ID 同步用户和组

两条控制台命令可直接从 Entra ID 开通并维护 Chamilo 账户，无需任何人进行交互式登录。二者均使用仅应用认证（`client_credentials`），因此需要上文列出的 **应用程序** Graph 权限，并且均应通过 cron 定时调度，而非手动运行。

### `app:azure-sync-users`

从 Microsoft Graph 拉取用户，并使用与交互式登录相同的字段映射和账户匹配逻辑，开通/更新对应的 Chamilo 账户。

* 默认拉取完整用户列表（`/v1.0/users`，分页）。将 `script_users_delta: true` 设为启用后，改为使用 `/v1.0/users/delta`——Chamilo 会在各次运行之间持久化增量链接，因此后续运行仅获取发生变更的内容。
* 将 `deactivate_nonexisting_users: true` 设为启用后，会停用那些认证源为 Azure、但已不再出现在 Entra ID 拉取结果中的 Chamilo 账户。此功能仅在完整拉取模式下有效——增量模式从不返回完整用户列表，因此在启用 `script_users_delta` 时该设置会被忽略。
* 上述组角色映射会在本次运行中对每一位被同步的用户重新应用，而不仅限于登录时。

### `app:azure-sync-usergroups`

拉取 Entra ID 组，并将其镜像为 Chamilo 班级（`Usergroup`）。

* 拉取完整组列表（`/v1.0/groups`），或在 `script_usergroups_delta: true` 时使用增量端点，并使用其独立跟踪的增量链接。
* `group_filter_regex` 限制同步哪些组，按组的显示名称进行匹配。
* **每次运行都会先清空匹配的 Chamilo 班级中的全部现有成员**，然后再重新订阅 Graph 当前返回的成员。成员仅匹配到*已有*的 Chamilo 用户，使用与登录相同的[账户匹配逻辑](#matching-logins-to-existing-chamilo-accounts)——此命令从不创建新用户账户，无法匹配到现有 Chamilo 账户的组成员会被静默跳过。

## 已知限制

* **无单一注销。** 从 Chamilo 退出登录并不会将用户从 Entra ID 或其他已连接的应用程序中注销。`authentication.yaml` 中存在 `force_logout` 配置键，但目前尚未实现——应将其视为预留项，而非可用功能。
* **对 Azure 账户而言，密码重置没有意义。** 由于认证完全通过 Entra ID 完成，Chamilo 不会为这些账户维护可用的本地密码。

## 故障排除

* 登录失败（缺少必需属性、Graph API 错误）会以登录页上的闪现消息形式呈现给用户。
* 同步命令会以警告形式逐条记录问题，并继续处理批次中的其余记录，而不会在第一条错误时中止——每次运行后请检查命令的控制台输出（或 cron 捕获输出的位置）。
* 请保持标准 Chamilo 登录表单处于启用状态，以便在 Entra ID 集成出现异常时，管理员始终有办法进入系统。