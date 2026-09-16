# Web Services 設定

舊版 SOAP / REST Web 服務的組態（與現代 API Platform 端點分開）。

請至 **管理 > 組態設定 > Web Services** 存取這些設定。此類別包含 **7 項設定**，以下列出平台設定 fixtures（`SettingsCurrentFixtures.php`）中隨附的標題與註解。

> 程式碼中的變數名稱以等寬字體顯示。透過 API 撰寫指令碼，或需以全域層級變更這些設定而編輯 [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) 時，請使用該名稱。

## 設定

### `allow_download_documents_by_api_key`

**允許以 API Key 下載課程文件**

下載文件時驗證使用者的 REST API 金鑰

*預設值：`false`*


### `disable_webservices`

**停用 Web 服務**

若您未使用 Web 服務，請啟用此項以避免任何不必要的安全風險。

*預設值：`false`*


### `messaging_allow_send_push_notification`

**允許向 Chamilo Messaging 行動應用程式傳送推播通知**

透過 Google 的 Firebase Console 傳送推播通知

*預設值：`false`*


### `messaging_gdc_api_key`

**Firebase Console 雲端訊息的伺服器金鑰**

專案憑證中的伺服器金鑰（舊版權杖）

### `messaging_gdc_project_number`

**Firebase Console 雲端訊息的寄件者 ID**

您需要在 <a href='https://console.firebase.google.com/'>Google Firebase Console</a> 註冊一個專案

### `webservice_enable_adminonly_api`

**啟用僅限管理員的 Web 服務**

部分 REST Web 服務標示為僅限管理員，且預設為停用。啟用此功能即可存取這些 Web 服務（顯然僅限具備管理員憑證的使用者）。

*預設值：`false`*

### `webservice_return_user_field`

**Web 服務回傳的使用者欄位**

要求 REST Web 服務（v2.php）針對與使用者 ID 相關的欄位回傳另一個識別碼。若外部系統並非以 Chamilo 中的使用者 ID 處理資料，此設定有助於外部系統將回傳的使用者資料與 Chamilo 已知的某些外部資料對應。例如，若您使用外部驗證系統，可回傳用來將使用者與外部驗證系統對應的額外欄位，而非 user.id。

*預設值：`oauth2_id`*