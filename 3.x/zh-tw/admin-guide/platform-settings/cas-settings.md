# CAS 設定

自 Chamilo 1.x 沿用而來的舊版 CAS（Central Authentication Service）設定。關於 Chamilo 3.x 中 CAS 驗證器的現況，請參閱 [CAS](../authentication/cas.md)。

可於 **管理 > 組態設定 > CAS** 存取這些設定。此分類包含 **7 項設定**，以下列出平台設定 fixtures（`SettingsCurrentFixtures.php`）中隨附的標題與說明。

> 程式碼中的變數名稱以等寬字體顯示。透過 API 撰寫指令碼，或需在全域層級編輯 [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) 以變更這些設定時，請使用該名稱。

## 設定

### `cas_activate`

**啟用 CAS 驗證**

啟用 CAS 驗證後，使用者即可使用其 CAS 憑證進行驗證。<br/>請前往 <a href='settings.php?category=CAS'>外掛</a>，為您的 Chamilo 校園新增可設定的「CAS 登入」按鈕。或者，您也可以在 app/config/auth.conf.php 中設定 cas[force_redirect] 以強制使用 CAS 驗證。

### `cas_add_user_activate`

**啟用 CAS 使用者新增**

啟用 CAS 使用者新增。若要從 LDAP 目錄建立使用者帳號，必須在 app/config/auth.conf.php 中填寫 extldap_config 與 extldap_user_correspondance 資料表。

### `cas_port`

**主要 CAS 伺服器連接埠**

連線至主要 CAS 伺服器所使用的連接埠

### `cas_protocol`

**主要 CAS 伺服器通訊協定**

連線至 CAS 伺服器所使用的通訊協定

### `cas_server`

**主要 CAS 伺服器**

用於驗證的主要 CAS 伺服器（IP 位址或主機名稱）

### `cas_server_uri`

**主要 CAS 伺服器 URI**

CAS 服務的路徑

### `update_user_info_cas_with_ldap`

**以 LDAP 更新經 CAS 驗證的使用者帳號資訊**

確保使用者的名字、姓氏與電子郵件地址與 LDAP 目錄中的目前值相同