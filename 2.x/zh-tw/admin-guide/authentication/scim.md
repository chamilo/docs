# SCIM

**SCIM**（跨域身份管理系統）自動化使用者配置 — 根據您的身份提供者中的變更，創建、更新和停用 Chamilo 帳戶。與 OAuth2 或 LDAP 不同，SCIM 負責配置，而非登入。

| 情境 | SCIM 動作 |
|------|-----------|
| 新員工加入 | 創建 Chamilo 帳戶 |
| 員工姓名或角色變更 | 更新 Chamilo 帳戶 |
| 員工離職 | 停用或刪除 Chamilo 帳戶 |

## 配置

### 1. 設置 SCIM 令牌

在您的 `.env`（或 `.env.local`）文件中，定義一個安全的隨機令牌：

```
SCIM_TOKEN=your-secure-random-token
```

此令牌由您的身份提供者用於驗證其對 Chamilo SCIM 端點的請求。

### 2. 在 authentication.yaml 中啟用 SCIM

```yaml
authentication:
  1:
    scim:
      main:
        enabled: true
        auth_source: platform
```

編輯後清除並預熱緩存：

```bash
php bin/console cache:clear && php bin/console cache:warmup
```

### 3. 配置您的身份提供者

在您的身份提供者（Azure AD、Okta 等）中：

1. 將 Chamilo 添加為 SCIM 應用程式
2. 將 SCIM 基礎 URL 設置為 `https://your-chamilo-url/scim/v2/`
3. 輸入步驟 1 中的令牌作為 bearer 令牌
4. 將提供者屬性映射到 SCIM 標準字段（userName、name.givenName、name.familyName、emails）
5. 啟用自動配置

## SCIM 端點

Chamilo 實現了 SCIM 2.0：

| 端點 | 方法 | 動作 |
|------|------|------|
| `/scim/v2/Users` | GET | 列出使用者 |
| `/scim/v2/Users` | POST | 創建使用者 |
| `/scim/v2/Users/{id}` | GET | 獲取使用者 |
| `/scim/v2/Users/{id}` | PUT | 替換使用者 |
| `/scim/v2/Users/{id}` | PATCH | 更新使用者 |
| `/scim/v2/Users/{id}` | DELETE | 移除使用者 |

## 提示

* **從測試組開始** — 在為整個組織啟用 SCIM 之前，先配置一小組使用者。
* **與 OAuth2 結合使用** — 常見設置是使用 Azure AD OAuth2 進行登入，並使用 Azure AD SCIM 進行配置。
* **監控日誌** — 檢查 Chamilo（`var/log/`）和您的身份提供者的配置日誌以查找錯誤。