# 郵件設定

說明外寄郵件的組成方式——寄件者身分、版面、簽名，以及特殊用途位址。

可於 **管理 > 組態設定 > 郵件** 存取這些設定。此類別包含 **17 項設定**，以下列出平台設定 fixtures（`SettingsCurrentFixtures.php`）中隨附的標題與註解。

> 程式碼中的變數名稱以等寬字體顯示。透過 API 撰寫指令碼，或需以全域層級編輯 [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) 來變更這些設定時，請使用該名稱。

## 設定

### `allow_email_editor_for_anonymous`

**匿名使用者的電子郵件編輯器**

允許匿名使用者從平台寄送電子郵件。在當今資訊安全的時代，不建議啟用此選項。

*預設值：`true`*


### `cron_notification_help_desk`

**用於寄送 cronjobs 執行報告的電子郵件地址**

以電子郵件地址陣列提供。目前尚未適用於所有 cronjobs。

### `mail_content_style`

**額外的電子郵件 HTML body 屬性**

套用至所產生通知郵件 body 標籤的額外 HTML 屬性。

### `mail_header_style`

**額外的電子郵件 HTML header 屬性**

套用至所產生通知郵件標頭區段的額外 HTML 屬性。

### `mailer_debug_enable`

**郵件：除錯**

選擇是否啟用電子郵件寄送除錯紀錄。這些紀錄會提供更多連線至郵件服務時的資訊，但並不雅觀，且可能破壞頁面設計。僅在沒有使用者活動時使用。

*預設值：`false`*


### `mailer_dkim`

**郵件：DKIM 標頭**

輸入 DKIM 組態設定的 JSON 陣列（請參見範例）。

### `mailer_dsn`

**郵件 DSN**

DSN 完整包含連線至郵件服務所需的所有參數。詳情請見 https://symfony.com/doc/7.4/mailer.html#using-built-in-transports。以下為若干受支援的 DSN 語法範例：https://symfony.com/doc/7.4/mailer.html#using-a-3rd-party-transport。對於 Microsoft 365（基本驗證的 SMTP 正逐步淘汰），請改以 Microsoft Graph API 寄送，使用 `microsoftgraph+api://CLIENT_ID:CLIENT_SECRET@default?tenantId=TENANT_ID`（用戶端密碼中的特殊字元請進行 URL 編碼）。這需要已授予 `Mail.Send` 應用程式權限的 Entra ID 應用程式註冊——請參閱 [電子郵件組態](../installation/email-configuration.md)。

*預設值：`null://null`*


### `mailer_exclude_json`

**郵件：避免使用 LD+JSON**

部分電子郵件用戶端無法理解描述性的 LD+JSON 格式，會將其以鬆散的 JSON 字串顯示給最終使用者。若屬此情況，您可能希望將下列變數設為 'false' 以停用此標頭。

*預設值：`false`*


### `mailer_from_email`

**所有電子郵件皆由此電子郵件地址寄出**

設定電子郵件「寄件者」欄位所使用的預設電子郵件地址。

### `mailer_from_name`

**所有電子郵件皆以此（組織）名稱作為寄件來源**

設定平台電子郵件寄送時使用的預設顯示名稱。例如「支援團隊」。

### `mailer_mails_charset`

**郵件：字元集**

若需定義寄送這些電子郵件時使用的字元集。若不確定請留空。

*預設值：`UTF-8`*


### `messages_hide_mail_content`

**隱藏電子郵件內容以引導使用者至平台**

偏好簡短的電子郵件版本，並附上通往平台訊息空間的連結，以提升以平台為基礎的參與度。

*預設值：`false`*


### `notifications_extended_footer_message`

**延伸通知頁尾**

為特定語言的通知電子郵件新增自訂額外頁尾，例如隱私權政策聲明。可新增多種語言與多個段落。

### `send_notification_score_in_percentage`

**在測驗結果通知中以百分比寄送分數**

在測驗結果通知電子郵件中，以百分比而非分數寄送練習成績。

*預設值：`false`*


### `send_two_inscription_confirmation_mail`

**寄送 2 封註冊電子郵件**

註冊時分別寄送兩封電子郵件。一封為使用者名稱，另一封為密碼。

*預設值：`false`*


### `show_user_email_in_notification`

**在通知中顯示寄件者的電子郵件地址**

在個人訊息與通知電子郵件中，於寄件者姓名旁一併包含其電子郵件地址。

*預設值：`false`*


### `update_users_email_to_dummy_except_admins`

**匯入期間將使用者電子郵件更新為虛擬值**

在特殊的使用者 CSV cron 匯入期間，自動將電子郵件替換為虛擬電子郵件 username@example.com。

*預設值：`false`*