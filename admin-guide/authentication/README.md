# 認證

Chamilo 支援多種認證方法，從內建的用戶名/密碼系統到企業單一登入解決方案。

## 設定檔案

所有外部認證方法均在 `config/authentication.yaml` 中進行設定。系統提供了一個模板檔案 `config/authentication.dist.yaml`。其基本結構如下：

```yaml
parameters:
  authentication:
    <access_url_id>:
      <auth_method>:
        <provider_name>:
          <config_key>: <value>
```

編輯檔案後，請清除並預熱快取：

```bash
php bin/console cache:clear
php bin/console cache:warmup
```

外部登入按鈕將在快取更新後出現在登入頁面上。

## 支援的方法

* **[OAuth2](oauth2.md)** — Azure AD、Keycloak、Facebook 以及通用 OAuth2 提供者
* **[LDAP](ldap.md)** — 對 LDAP 或 Active Directory 伺服器進行認證
* **[CAS](cas.md)** — 中央認證服務（舊版，在 2.x 中無法使用）
* **[SCIM](scim.md)** — 從外部身份提供者自動化用戶配置
* **[SSO 設定](sso-configuration.md)** — 疑難排解及跨方法注意事項

## 預設認證

預設情況下，Chamilo 使用其內部系統 — 用戶使用儲存在 Chamilo 資料庫中的用戶名和密碼進行登入。外部方法是附加的：標準登入表單將與任何已設定的提供者一起保留可用。

## 進一步參考

有關完整參數參考和進階情境，請參閱[外部認證設定維基頁面](https://github.com/chamilo/chamilo-lms/wiki/External-Authentication-configuration)。