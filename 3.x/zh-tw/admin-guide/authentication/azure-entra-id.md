# Azure Entra ID

Microsoft 於 2023 年將 Azure Active Directory（Azure AD）重新品牌化為 **Microsoft Entra ID** — 兩者為同一服務，而 Chamilo 的程式碼與設定仍以 `azure` 稱呼。本頁涵蓋整合中 Azure 特有的部分：應用程式註冊、以群組為基礎的角色對應、憑證驗證，以及專用的使用者／群組同步指令。各提供者共用的設定鍵（`enabled`、`title`、`allow_create_new_users` 等）以及一般的 `authentication.yaml` 結構，請參閱 [OAuth2](oauth2.md)。

## 在 Microsoft Entra ID 中註冊 Chamilo

1. 在 Entra 系統管理中心，為 Chamilo 建立一個 **App registration**。
2. 將重新導向 URI（平台類型 **Web**）設為：

   ```
   https://your-chamilo-url/connect/azure/check
   ```

3. 記下 **Application (client) ID** 與 **Directory (tenant) ID** — 兩者皆會用到。
4. 在 **Certificates & secrets** 底下，建立用戶端密碼或上傳憑證（見下方 [憑證驗證](#certificate-authentication)）。
5. 在 **API permissions** 底下，新增下列 Microsoft Graph 權限並授予系統管理員同意。

| 權限 | 類型 | 用途 |
|------------|------|-------------|
| `User.Read` | Delegated | 基本登入 |
| `GroupMember.Read.All` | Delegated | 登入時以群組為基礎的角色對應 |
| `User.Read.All` | Application | `app:azure-sync-users` |
| `GroupMember.Read.All` 或 `Group.Read.All` | Application | `app:azure-sync-users` 與 `app:azure-sync-usergroups` |

應用程式權限需要系統管理員同意，且僅由同步主控台指令使用（透過 `client_credentials` 授權），絕不會用於互動式使用者登入。

## 基本設定

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

### 多租戶與單一租戶

`tenant` 的值必須與應用程式註冊中「支援的帳戶類型」設定相符：

* 特定租戶 GUID — 單一租戶，僅該組織的帳戶可登入
* `organizations` — 任何 Entra ID 租戶
* `common` — 任何 Entra ID 租戶加上個人 Microsoft 帳戶

## 必要的使用者屬性

每位需要登入 Chamilo 的 Entra ID 使用者都必須填寫 `mail` 與 `mailNickname` — 若任一為空，登入會擲出錯誤（連同永遠存在的不可變 Entra 物件 ID）。從 Microsoft Graph 到 Chamilo 的欄位對應對 Azure 而言是**固定的**（與可設定欄位對應的通用 OAuth2 提供者不同）：

| Chamilo 欄位 | Microsoft Graph 來源 |
|---------------|------------------------|
| 名字 | `givenName` |
| 姓氏 | `surname` |
| 電子郵件 | `mail` |
| 使用者名稱 | `userPrincipalName` |
| 電話 | `telephoneNumber`，其次 `businessPhones[0]`，再次 `mobilePhone` |
| 啟用 | `accountEnabled` |
| 介面語言 | `preferredLanguage`（對應至已安裝的 Chamilo 語言，否則回退至平台預設） |

每次成功登入也會寫入三個額外欄位：`organisationemail`（= `mail`）、`azure_id`（= `mailNickname`），以及 `azure_uid`（= Entra 物件 ID）。這些欄位支援下方的帳戶比對邏輯。

## 將登入比對至既有 Chamilo 帳戶

將 `existing_user_verification_order` 設為以逗號分隔的數字 `1`–`3` 清單，以控制傳入的 Entra ID 登入如何比對既有 Chamilo 帳戶：

| 值 | 比對對象 |
|-------|------------------|
| `1` | 額外欄位 `organisationemail` == Entra `mail` |
| `2` | 額外欄位 `azure_id` == Entra `mailNickname` |
| `3` | 額外欄位 `azure_uid` == Entra 物件 ID |

依列出的順序嘗試各位置；第一個作用中（非軟刪除）的比對勝出。無效或空白值預設為 `1,2,3`。若已設定的位置皆無比對 — 某位使用者第一次登入時永遠如此，因為那些額外欄位僅在*成功登入之後*才填入 — Chamilo 會回退為以 Chamilo 自身的 `email` 欄位比對 Entra `mail`，再以 `username` 比對 `userPrincipalName`，無論您如何設定。

## 以群組為基礎的角色對應

將 Entra ID 安全性群組以其物件識別碼（GUID）對應至 Chamilo 角色：

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

每次登入時，Chamilo 會以使用者自身的存取權杖呼叫 Microsoft Graph `/v1.0/me/memberOf`，並依 **admin → session_admin → teacher** 的順序，將回傳的群組與這三個識別碼比對。第一個符合者生效——同時屬於管理員與教師群組的使用者只會被提升為管理員。未屬於任何已設定群組的使用者則保留既有角色（首次登入時則為預設的學生角色）。此功能需要上文所列的委派權限 `GroupMember.Read.All`。

## 憑證驗證

作為 `client_secret` 的替代方案，改以憑證進行驗證：

```yaml
authentication:
  1:
    oauth2:
      azure:
        client_certificate_private_key: "<PEM private key, single line, with \\n for line breaks>"
        client_certificate_thumbprint: "<hex SHA1 thumbprint>"
```

在應用程式註冊的 **Certificates & secrets** 下上傳對應的公開憑證，並將其指紋（入口網站以十六進位顯示）複製到 `client_certificate_thumbprint`。當兩個金鑰都已設定時，Chamilo 會建立已簽署的 JWT 用戶端宣告（RS256），而不再傳送 `client_secret`——此方式同時適用於互動式登入，以及同步指令的僅應用程式驗證。

## 從 Entra ID 同步使用者與群組

兩個主控台指令可直接從 Entra ID 佈建並維護 Chamilo 帳號，與任何人是否以互動方式登入無關。兩者皆以僅應用程式（`client_credentials`）方式驗證，因此需要上文所列的 **應用程式** Graph 權限，且兩者都應排程於 cron 中執行，而非手動執行。

### `app:azure-sync-users`

從 Microsoft Graph 擷取使用者，並以與互動式登入相同的欄位對應及帳號比對邏輯，佈建／更新對應的 Chamilo 帳號。

* 預設會擷取完整使用者清單（`/v1.0/users`，分頁）。將 `script_users_delta: true` 設為啟用則改用 `/v1.0/users/delta`——Chamilo 會在各次執行之間保存 delta 連結，因此後續執行只會擷取有變更的內容。
* 將 `deactivate_nonexisting_users: true` 設為啟用，可停用（驗證來源為 Azure 的）Chamilo 帳號，若其已不再出現於 Entra ID 擷取結果中。此功能僅在完整擷取模式下有效——delta 模式永遠不會回傳完整使用者清單，因此啟用 `script_users_delta` 時會忽略此設定。
* 上述群組角色對應會在此次執行中對每位已同步使用者重新套用，而不僅限於登入時。

### `app:azure-sync-usergroups`

擷取 Entra ID 群組，並將其鏡像為 Chamilo 班級（`Usergroup`）。

* 擷取完整群組清單（`/v1.0/groups`），或在 `script_usergroups_delta: true` 時使用 delta 端點，並各自獨立追蹤 delta 連結。
* `group_filter_regex` 會依群組顯示名稱限制要同步的群組。
* **每次執行都會先清除對應 Chamilo 班級的所有既有成員**，再重新訂閱 Graph 目前回傳的成員。成員僅會比對到*既有*的 Chamilo 使用者，使用與登入相同的[帳號比對邏輯](#matching-logins-to-existing-chamilo-accounts)——此指令絕不會建立新使用者帳號，無法比對到既有 Chamilo 帳號的群組成員會被靜默略過。

## 已知限制

* **沒有單一登出。** 從 Chamilo 登出並不會讓使用者從 Entra ID 或其他已連線應用程式登出。`authentication.yaml` 中存在 `force_logout` 設定鍵，但目前尚未實作——請視為保留項目，而非可用功能。
* **對 Azure 帳號而言，重設密碼沒有意義。** 由於驗證完全透過 Entra ID 進行，Chamilo 不會為這些帳號維護可用的本機密碼。

## 疑難排解

* 登入失敗（缺少必要屬性、Graph API 錯誤）會以登入頁面上的快閃訊息呈現給使用者。
* 同步指令會以警告逐筆記錄問題，並繼續處理批次中的其餘項目，而不會在第一個錯誤時中止——每次執行後請檢查指令的主控台輸出（或您的 cron 所擷取的位置）。
* 請維持啟用標準 Chamilo 登入表單，以便在 Entra ID 整合異常時，管理員仍有進入系統的途徑。