# 驗證

Chamilo 支援多種驗證方式，從內建的使用者名稱／密碼系統到企業級單一登入解決方案皆可。

## 設定檔

所有外部驗證方式皆於 `config/authentication.yaml` 中設定。範本檔位於 `config/authentication.dist.yaml`。一般結構如下：

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

快取重新整理後，外部登入按鈕會顯示於登入頁面。

## 支援的方式

* **[OAuth2](oauth2.md)** — Azure AD、Keycloak、Facebook 以及通用 OAuth2 提供者
* **[Azure Entra ID](azure-entra-id.md)** — 詳細的 Azure／Entra ID 設定：應用程式註冊、以群組為基礎的角色對應、憑證驗證，以及使用者／群組同步指令
* **[LDAP](ldap.md)** — 對 LDAP 或 Active Directory 伺服器進行驗證
* **[CAS](cas.md)** — Central Authentication Service（舊版，於 3.x 中無法運作）
* **[SCIM](scim.md)** — 由外部身分提供者自動佈建使用者
* **[SSO Configuration](sso-configuration.md)** — 疑難排解與跨方式注意事項

## 預設驗證

預設情況下，Chamilo 使用其自身的內部系統——使用者以儲存在 Chamilo 資料庫中的使用者名稱與密碼登入。外部方式為附加性質：標準登入表單會與任何已設定的提供者一併保留可用。

## 進一步參考

完整參數參考與進階情境，請參閱 [External Authentication configuration wiki 頁面](https://github.com/chamilo/chamilo-lms/wiki/External-Authentication-configuration)。