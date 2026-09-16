# CAS 設定

從 Chamilo 1.x 延續而來的舊版 CAS（Central Authentication Service）設定。請參閱 [CAS](../authentication/cas.md) 以了解 Chamilo 2.x 中 CAS 驗證器的目前狀態。

在 **管理 > 設定 > CAS** 下存取這些設定。此類別包含 **7 個設定**，以下列出平台設定預設資料（`SettingsCurrentFixtures.php`）中提供的標題和註解。

> 程式碼中的變數名稱以等寬字體顯示。當透過 API 進行腳本編寫，或需要透過編輯 [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) 在全域層級變更這些設定時，請使用它。

## 設定

### `cas_activate`

**啟用 CAS 驗證**

啟用 CAS 驗證將允許使用者以其 CAS 憑證進行驗證。<br/>前往 <a href='settings.php?category=CAS'>外掛程式</a> 以為您的 Chamilo 校園新增可設定的「CAS 登入」按鈕。或者，您可以透過在 app/config/auth.conf.php 中設定 cas[force_redirect] 來強制 CAS 驗證。

### `cas_add_user_activate`

**啟用 CAS 使用者新增**

啟用 CAS 使用者新增。要從 LDAP 目錄建立使用者帳戶，必須在 app/config/auth.conf.php 中填入 extldap_config 和 extldap_user_correspondance 資料表。

### `cas_port`

**主要 CAS 伺服器連接埠**

連接到主要 CAS 伺服器的連接埠

### `cas_protocol`

**主要 CAS 伺服器通訊協定**

連接到 CAS 伺服器的通訊協定

### `cas_server`

**主要 CAS 伺服器**

這是用於驗證的主要 CAS 伺服器（IP 位址或主機名稱）

### `cas_server_uri`

**主要 CAS 伺服器 URI**

CAS 服務的路徑

### `update_user_info_cas_with_ldap`

**從 LDAP 更新 CAS 驗證的使用者帳戶資訊**

確保使用者的名字、姓氏和電子郵件地址與 LDAP 目錄中的目前值相同