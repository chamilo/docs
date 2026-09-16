# SCIM

**SCIM**（System for Cross-domain Identity Management，跨網域身分管理系統）可自動化使用者佈建——依據身分提供者中的變更，建立、更新及停用 Chamilo 帳號。與 OAuth2 或 LDAP 不同，SCIM 處理的是佈建，而非登入。

| 情境 | SCIM 動作 |
|----------|-------------|
| 新員工到職 | 建立 Chamilo 帳號 |
| 員工姓名或角色變更 | 更新 Chamilo 帳號 |
| 員工離職 | 停用或刪除 Chamilo 帳號 |

## Configuration

### 1. Set the SCIM token

在 `.env`（或 `.env.local`）檔案中，定義一組安全的隨機權杖：

```
SCIM_TOKEN=your-secure-random-token
```

此權杖供身分提供者用來驗證其對 Chamilo SCIM 端點的請求。

### 2. Enable SCIM in authentication.yaml

```yaml
authentication:
  1:
    scim:
      main:
        enabled: true
        auth_source: platform
```

編輯後請清除並預熱快取：

```bash
php bin/console cache:clear && php bin/console cache:warmup
```

### 3. Configure your identity provider

在身分提供者（Azure AD、Okta 等）中：

1. 將 Chamilo 新增為 SCIM 應用程式
2. 將 SCIM 基底 URL 設為 `https://your-chamilo-url/scim/v2/`
3. 將步驟 1 的權杖作為 bearer token 輸入
4. 將提供者屬性對應至 SCIM 標準欄位（userName、name.givenName、name.familyName、emails）
5. 啟用自動佈建

## SCIM endpoints

Chamilo 實作 SCIM 2.0：

| 端點 | 方法 | 動作 |
|----------|--------|--------|
| `/scim/v2/Users` | GET | 列出使用者 |
| `/scim/v2/Users` | POST | 建立使用者 |
| `/scim/v2/Users/{id}` | GET | 取得使用者 |
| `/scim/v2/Users/{id}` | PUT | 取代使用者 |
| `/scim/v2/Users/{id}` | PATCH | 更新使用者 |
| `/scim/v2/Users/{id}` | DELETE | 移除使用者 |

## Tips

* **先從測試群組開始** — 在為整個組織啟用 SCIM 之前，先佈建一小群使用者。
* **與 OAuth2 搭配** — 常見做法是以 Azure AD OAuth2 處理登入，並以 Azure AD SCIM 處理佈建。
* **監控日誌** — 同時檢查 Chamilo（`var/log/`）與身分提供者的佈建日誌，以找出錯誤。