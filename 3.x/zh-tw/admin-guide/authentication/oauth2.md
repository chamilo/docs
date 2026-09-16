# OAuth2

OAuth2 驗證於 `config/authentication.yaml` 中設定。Chamilo 內建支援 Azure AD、Keycloak、Facebook，以及任何符合 OAuth2 規範的通用提供者。

## Step 1 — 在身分提供者中註冊 Chamilo

於提供者的管理介面建立應用程式，並將**重新導向 URI** 設為：

```
https://your-chamilo-url/connect/<provider>/check
```

其中 `<provider>` 為 `azure`、`keycloak`、`facebook`，或您為通用提供者指定的名稱。請記下 **Client ID** 與 **Client Secret**。

## Step 2 — 設定 authentication.yaml

啟用提供者並填入其憑證。所有提供者共用下列鍵值：

| Key | Description |
|-----|-------------|
| `enabled` | 設為 `true` 以啟用 |
| `title` | 顯示於登入按鈕上的標籤 |
| `client_id` | 來自您的身分提供者 |
| `client_secret` | 來自您的身分提供者 |
| `allow_create_new_users` | 首次登入時自動建立 Chamilo 帳號 |
| `allow_update_user_info` | 每次登入時同步使用者資料 |
| `force_as_login_method` | 隱藏其他登入方式，僅顯示此提供者的按鈕 |
| `force_redirect` | 將匿名訪客自動導向此提供者，無需點擊按鈕 |
| `skip_force_redirect_in` | `force_redirect` 不會套用的 URL 片段清單 |

### Azure AD (Microsoft Entra ID)

Azure 另有專頁說明應用程式註冊、以群組為基礎的角色對應、憑證驗證，以及帳號佈建同步指令 — 請參閱 [Azure Entra ID](azure-entra-id.md)。

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

### Generic OAuth2

適用於 Google、GitLab，或任何符合 OAuth2 規範的提供者：

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

欄位對應（提供者屬性如何對應至 Chamilo 的 `firstname`、`lastname`、`email` 等）以及角色對應亦可設定。完整對應鍵清單請見 [wiki](https://github.com/chamilo/chamilo-lms/wiki/External-Authentication-configuration)。

## Optional — 自動將每位訪客導向提供者

兩個鍵值控制訪客仍會看到多少登入頁面內容。兩者彼此獨立，並對應不同需求：

| Key | What the visitor sees |
|-----|-----------------------|
| `force_as_login_method: true` | 登入頁面精簡為此提供者的按鈕。訪客需點擊該按鈕。 |
| `force_redirect: true` | 完全不顯示登入頁面。瀏覽器自行前往提供者。 |

當身分提供者擁有所有帳號、且本機登入表單已無用途時，請使用 `force_redirect`：

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

僅能有一個提供者強制重新導向。若有多個宣告此設定，以第一個已啟用者為準。LDAP 無法宣告此設定，因為它透過本機表單進行驗證。

重新導向僅套用於瀏覽器所顯示的頁面，其餘請求不受影響。下列請求一律維持原位：

* API、SCIM、MCP 或 XHR 呼叫，無法跟隨專為瀏覽器設計的握手流程。
* 圖片、樣式表或檔案下載。
* 任何寫入（POST、PUT、DELETE），因為瀏覽器會將重新導向後的寫入重播為 GET 並丟棄主體。
* 提供者握手本身（`/connect/...`）以及 `/logout`，否則會形成無窮迴圈。
* 已具有工作階段的訪客，包括公開課程的匿名帳號。

請為每個必須保持開放的公開區域（例如課程目錄）在 `skip_force_redirect_in` 中加入 URL 片段。

### 逃生艙口

若提供者無法連線，將會把所有帳號（包含本機管理員）一併鎖在門外。在任何 URL 後方附加 `skipForcedRedirect=1`，即可仍進入本機登入表單：

```
https://your-chamilo-url/login?skipForcedRedirect=1
```

此選擇會保留在工作階段中，因此後續頁面會持續顯示該表單。它也會對該工作階段取消 `force_as_login_method`，讓所有登入方式重新出現在頁面上。若要將平台交還給提供者，請使用 `?skipForcedRedirect=0`，或關閉瀏覽器工作階段。

此參數僅屬於 `force_redirect`。當沒有任何提供者宣告該鍵時，此參數完全不會作用，而 `force_as_login_method` 仍只顯示單一按鈕。

請將此 URL 一併保存在復原備註中。在正式環境啟用 `force_redirect` 之前，請先測試它。

## 步驟 3 — 清除快取並測試

```bash
php bin/console cache:clear && php bin/console cache:warmup
```

從 Chamilo 登出。已設定之提供者的按鈕應會出現在登入頁面上。在對所有使用者全面推出之前，請先以專用帳號進行測試。

## 提示

* 請維持標準登入表單為啟用狀態，以便在 OAuth2 發生問題時，管理員仍能登入。若您設定了 `force_redirect`，請改為記住 `?skipForcedRedirect=1` 這個 URL：那是回到該表單的唯一途徑。
* 角色指派預設為學生；請使用群組對應（Azure）自動將使用者提升為教師或管理員角色 — 相關細節以及如何將傳入使用者對應到既有帳號，請參閱 [Azure Entra ID](azure-entra-id.md)。