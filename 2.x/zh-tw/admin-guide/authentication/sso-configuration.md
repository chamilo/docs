# 單點登入 (SSO) 設定

本頁面涵蓋適用於各種認證方法的相關主題。

## 多重提供者

您可以同時啟用多種認證方法。每個啟用的提供者會在登入頁面上顯示自己的按鈕，與標準的用戶名/密碼表單並列。用戶可以選擇他們偏好的方法。

請保持標準表單啟用，以便平台管理員始終能夠登入，即使外部提供者設定錯誤也無影響。

## 認證優先順序

當多種方法同時啟用時，系統會按以下順序檢查憑證：

1. LDAP（如果設定了 `force_as_login_method`）
2. OAuth2 提供者（按 `authentication.yaml` 中出現的順序）
3. 內部 Chamilo 資料庫

## 用於 API 存取的 JWT 令牌

Chamilo 使用 JWT（JSON Web Tokens）來支援其 REST API。令牌的生命週期和更新行為在 `config/packages/lexik_jwt_authentication.yaml` 中進行設定。這與 SSO 登入流程無關，僅適用於 API 客戶端。

## 故障排除

### 設定後登入按鈕未出現

每次對 `authentication.yaml` 進行更改後，必須清除快取：

```bash
php bin/console cache:clear && php bin/console cache:warmup
```

### 用戶無法透過 SSO 登入

* **重定向 URI 不匹配** — 在您的身份提供者中註冊的 URI 必須與 `https://your-chamilo-url/connect/<provider>/check` 完全一致。
* **時鐘漂移** — SSO 令牌對時間敏感。請確保您的伺服器時鐘已同步（NTP）。
* **SSL 證書** — Chamilo 必須信任身份提供者的證書。檢查是否有自簽名證書的問題。
* **日誌** — 檢視 `var/log/` 以及您的身份提供者的日誌，以獲取具體的錯誤訊息。

### 用戶被創建為錯誤的角色

檢查提供者的角色映射設定。新用戶預設為學生角色，除非有群組或屬性映射將其提升。

### 用戶存在於提供者中但無法存取 Chamilo

* 如果 `allow_create_new_users` 設定為 false，則用戶必須已擁有 Chamilo 帳戶，且其電子郵件或用戶名與提供者的資料相符。
* 檢查用戶在 Chamilo 中是否被停用。
* 對於 Azure，請檢視 `existing_user_verification_order`，以了解 Chamilo 如何將新進用戶與現有帳戶進行匹配。