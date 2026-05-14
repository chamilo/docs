# OAuth2

OAuth2 認證在 `config/authentication.yaml` 中進行設定。Chamilo 內建支援 Azure AD、Keycloak、Facebook 以及任何符合 OAuth2 標準的提供者。

## 步驟 1 — 在您的身份提供者中註冊 Chamilo

在您的提供者管理面板中建立一個應用程式，並將**重定向 URI**設定為：

```
https://your-chamilo-url/connect/<provider>/check
```

其中 `<provider>` 是 `azure`、`keycloak`、`facebook` 或您為通用提供者設定的名稱。記下**客戶端 ID** 和**客戶端密鑰**。

## 步驟 2 — 設定 authentication.yaml

啟用提供者並提供其憑證。所有提供者共享以下通用鍵值：

| 鍵名 | 描述 |
|-----|-------------|
| `enabled` | 設為 `true` 以啟用 |
| `title` | 登入按鈕上顯示的標籤 |
| `client_id` | 來自您的身份提供者 |
| `client_secret` | 來自您的身份提供者 |
| `allow_create_new_users` | 首次登入時自動建立 Chamilo 帳戶 |
| `allow_update_user_info` | 每次登入時同步使用者資料 |
| `force_as_login_method` | 停用其他方法並強制使用此方法 |

### Azure AD (Microsoft Entra ID)

```yaml
authentication:
  1:
    oauth2:
      azure:
        enabled: true
        title: "使用 Microsoft 登入"
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

Azure 還支援基於群組的角色映射（將 Azure 群組 ID 映射到 Chamilo 的角色，例如教師或管理員）、使用者差異同步命令，以及使用證書認證替代客戶端密鑰。有關這些選項，請參閱 [wiki](https://github.com/chamilo/chamilo-lms/wiki/External-Authentication-configuration)。

### Keycloak

```yaml
authentication:
  1:
    oauth2:
      keycloak:
        enabled: true
        title: "使用 Keycloak 登入"
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
        title: "使用 Facebook 登入"
        client_id: "<app-id>"
        client_secret: "<app-secret>"
        graph_api_version: "v20.0"
        allow_create_new_users: true
```

### 通用 OAuth2

適用於 Google、GitLab 或任何符合 OAuth2 標準的提供者：

```yaml
authentication:
  1:
    oauth2:
      myprovider:
        enabled: true
        title: "使用 MyProvider 登入"
        client_id: "<client-id>"
        client_secret: "<client-secret>"
        urlAuthorize: "https://provider.example.com/oauth/authorize"
        urlAccessToken: "https://provider.example.com/oauth/token"
        urlResourceOwnerDetails: "https://provider.example.com/api/user"
        scopes: ["openid", "email", "profile"]
        allow_create_new_users: true
```

欄位映射（提供者屬性如何映射到 Chamilo 的 `firstname`、`lastname`、`email` 等）以及角色映射也可以進行設定。有關映射鍵的完整列表，請參閱 [wiki](https://github.com/chamilo/chamilo-lms/wiki/External-Authentication-configuration)。

## 步驟 3 — 清除快取並測試

```bash
php bin/console cache:clear && php bin/console cache:warmup
```

登出 Chamilo。設定的提供者按鈕應會出現在登入頁面上。在向所有使用者推廣之前，請使用專用帳戶進行測試。

## 小提示

* 保留標準登入表單啟用狀態，以便管理員在 OAuth2 出現問題時仍能登入。
* 當使用 Azure 與現有使用者時，設定 `existing_user_verification_order` 以控制 Chamilo 如何將新進使用者與現有帳戶進行匹配。
* 角色分配預設為學生；使用群組映射自動將使用者提升為教師或管理員角色。