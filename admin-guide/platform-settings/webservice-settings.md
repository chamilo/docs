# Web 服務設定

傳統 SOAP / REST web 服務的設定（與現代 API Platform 端點分開）。

在 **管理 > 設定 > Web 服務** 下存取這些設定。此類別包含 **7 個設定**，以下列出平台設定預設值（`SettingsCurrentFixtures.php`）中提供的標題和註解。

> 程式碼中的變數名稱以等寬字體顯示。透過 API 撰寫腳本或需要透過編輯 [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) 在全域層級變更這些設定時，請使用它。

## 設定

### `allow_download_documents_by_api_key`

**允許透過 API 金鑰下載課程文件**

透過使用者的 REST API 金鑰驗證下載文件

*預設值：`false`*


### `disable_webservices`

**停用 web 服務**

如果您不使用 web 服務，請啟用此選項以避免不必要的資安風險。

*預設值：`false`*


### `messaging_allow_send_push_notification`

**允許推播通知至 Chamilo Messaging 行動應用程式**

透過 Google 的 Firebase Console 發送推播通知

*預設值：`false`*


### `messaging_gdc_api_key`

**Firebase Console 用於 Cloud Messaging 的伺服器金鑰**

來自專案憑證的伺服器金鑰（舊版 token）

### `messaging_gdc_project_number`

**Firebase Console 用於 Cloud Messaging 的發送者 ID**

您需要在 <a href='https://console.firebase.google.com/'>Google Firebase Console</a> 註冊一個專案

### `webservice_enable_adminonly_api`

**啟用僅限管理員的 web 服務**

某些 REST web 服務標記為僅限管理員使用，並預設停用。啟用此功能以授予存取這些 web 服務的權限（顯然僅限具有管理員憑證的使用者）。

*預設值：`false`*


### `webservice_return_user_field`

**Web 服務回傳使用者欄位**

要求 REST web 服務（v2.php）回傳與使用者 ID 相關欄位的另一個識別碼。這對於外部系統不直接處理 Chamilo 中的使用者 ID 很有用，因為它有助於外部系統將使用者資料回傳與 Chamilo 已知的一些外部資料進行比對。例如，如果您使用外部認證系統，您可以回傳用於將使用者與外部認證系統比對的額外欄位，而不是 user.id。

*預設值：`oauth2_id`*