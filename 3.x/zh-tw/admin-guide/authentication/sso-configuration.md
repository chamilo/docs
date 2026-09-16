# SSO 設定

本頁涵蓋適用於各種驗證方法的主題。

## 多個提供者

您可以同時啟用一種以上的驗證方法。每個已啟用的提供者會在登入頁面上，與標準使用者名稱／密碼表單並列顯示各自的按鈕。使用者可選擇偏好的方法。

請保持標準表單啟用，以便平台管理員即使在外部提供者設定錯誤時仍能登入。

## 驗證優先順序

當多種方法同時啟用時，系統會依下列順序檢查憑證：

1. LDAP（若已設定 `force_as_login_method`）
2. OAuth2 提供者（依其在 `authentication.yaml` 中出現的順序）
3. 內部 Chamilo 資料庫

## 用於 API 存取的 JWT 權杖

Chamilo 的 REST API 使用 JWT（JSON Web Tokens）。權杖有效期間與重新整理行為在 `config/packages/lexik_jwt_authentication.yaml` 中設定。此設定與 SSO 登入流程分開，僅適用於 API 用戶端。

## 疑難排解

### 設定後登入按鈕未出現

每次變更 `authentication.yaml` 後都必須清除快取：

```bash
php bin/console cache:clear && php bin/console cache:warmup
```

### 使用者無法透過 SSO 登入

* **重新導向 URI 不符** — 在身分提供者中註冊的 URI 必須與 `https://your-chamilo-url/connect/<provider>/check` 完全相符。
* **時鐘偏移** — SSO 權杖對時間敏感。請確保伺服器時鐘已同步（NTP）。
* **SSL 憑證** — Chamilo 必須信任身分提供者的憑證。請檢查是否有自行簽署憑證的問題。
* **日誌** — 檢視 `var/log/` 以及身分提供者的日誌以取得具體錯誤訊息。

### 使用者被建立為錯誤的角色

請檢查該提供者的角色對應設定。除非群組或屬性對應將其提升，否則新使用者預設為學生角色。

### 使用者存在於提供者中但無法存取 Chamilo

* 若 `allow_create_new_users` 為 false，該使用者必須已有 Chamilo 帳號，且電子郵件或使用者名稱與提供者的資料相符。
* 請確認該使用者在 Chamilo 中未被停用。
* 對於 Azure，請檢視 `existing_user_verification_order`，以了解 Chamilo 如何將傳入使用者對應到既有帳號。