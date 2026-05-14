# 郵件設定

如何建構寄出郵件 — 寄件者身分、版面配置、簽名，以及特殊用途地址。

在 **管理 > 設定值 > 郵件** 下存取這些設定。此類別包含 **18 個設定**，以下列出平台設定預設值 (`SettingsCurrentFixtures.php`) 中的標題與註解。

> 程式碼中的變數名稱以等寬字體顯示。當透過 API 進行腳本撰寫，或需要透過編輯 [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) 在全域層級變更這些設定時，請使用它。

## 設定

### `allow_email_editor_for_anonymous`

**匿名使用者的電子郵件編輯器**

允許匿名使用者從平台發送電子郵件。在資訊安全當今時代，這不是推薦的選項。

*預設值：`true`*


### `cron_notification_help_desk`

**發送排程工作執行報告的電子郵件地址**

以電子郵件地址陣列形式提供。目前尚未適用於所有排程工作。

### `mail_content_style`

**額外的電子郵件 HTML 本文屬性**

應用於產生的通知電子郵件 body 標籤的額外 HTML 屬性。

### `mail_header_style`

**額外的電子郵件 HTML 標頭屬性**

應用於產生的通知電子郵件標頭區段的額外 HTML 屬性。

### `mailer_debug_enable`

**郵件：除錯**

選擇是否啟用電子郵件發送除錯記錄。這些記錄將提供連接郵件服務時發生什麼的更多資訊，但並不優雅且可能破壞頁面設計。僅在無使用者活動時使用。

*預設值：`false`*


### `mailer_dkim`

**郵件：DKIM 標頭**

輸入您的 DKIM 設定值 JSON 陣列（參見範例）。

### `mailer_dsn`

**郵件 DSN**

DSN 完全包含連接郵件服務所需的所有參數。您可以在 https://symfony.com/doc/6.4/mailer.html#using-built-in-transports 了解更多。這裡有一些支援的 DSN 語法範例：https://symfony.com/doc/6.4/mailer.html#using-a-3rd-party-transport

*預設值：`null://null`*


### `mailer_exclude_json`

**郵件：避免使用 LD+JSON**

某些電子郵件客戶端無法理解描述性的 LD+JSON 格式，將其顯示為鬆散的 JSON 字串給最終使用者。如果是您的情況，您可能希望將以下變數設為 'false' 以停用此標頭。

*預設值：`false`*


### `mailer_from_email`

**所有電子郵件均從此電子郵件地址發送**

設定電子郵件「from」欄位中使用預設電子郵件地址。

### `mailer_from_name`

**所有電子郵件均顯示為來自此（組織）名稱**

設定發送平台電子郵件時使用的預設顯示名稱。例如「支援團隊」。

### `mailer_mails_charset`

**郵件：字元集**

如果需要定義發送這些電子郵件時使用的字元集，請在此設定。若不確定，請留空。

*預設值：`UTF-8`*


### `mailer_xoauth2`

**郵件：XOAuth2 選項**

如果您使用基於 XOAuth2 的電子郵件服務，請使用此 JSON 設定儲存您的特定設定（參見範例），並在郵件服務設定中選擇 XOAuth2。

### `messages_hide_mail_content`

**隱藏電子郵件內容以引導使用者至平台**

偏好簡短的電子郵件版本，包含連結至平台上的訊息空間，以增加基於平台的參與度。

*預設值：`false`*


### `notifications_extended_footer_message`

**擴充的通知頁尾**

為特定語言的通知電子郵件新增自訂額外頁尾，例如隱私政策通知。可以新增多種語言與段落。

### `send_notification_score_in_percentage`

**在測驗結果通知中以百分比發送分數**

在測驗結果通知電子郵件中，將測驗分數以百分比而非分數發送。

*預設值：`false`*


### `send_two_inscription_confirmation_mail`

**發送 2 封註冊電子郵件**

註冊時發送兩封獨立的電子郵件。一封用於使用者名稱，另一封用於密碼。

*預設值：`false`*


### `show_user_email_in_notification`

**在通知中顯示寄件者的電子郵件地址**

在個人訊息與通知電子郵件中，包含寄件者的電子郵件地址與其名稱。

*預設值：`false`*


### `update_users_email_to_dummy_except_admins`

**在匯入期間將使用者電子郵件更新為虛擬值（管理員除外）**

在特殊 CSV 使用者排程匯入期間，自動將電子郵件取代為虛擬電子郵件 username@example.com。

*預設值：`false`*