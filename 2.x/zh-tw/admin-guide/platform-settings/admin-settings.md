# 管理員身份設定

平台管理員的身份和聯絡資訊。這些值會出現在平台頁尾以及某些系統產生的電子郵件中。

在 **管理 > 設定 > 管理員身份** 下存取這些設定。此類別包含 **12 個設定**，以下列出平台設定預設值 (`SettingsCurrentFixtures.php`) 中提供的標題和註解。

> 程式碼中的變數名稱以等寬字體顯示。使用 API 進行腳本編寫，或需透過編輯 [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) 在全域層級變更這些設定時，請使用它。

## 設定

### `administrator_email`

**入口網站管理員：電子郵件**

平台管理員的電子郵件地址（出現在頁尾左側）

### `administrator_name`

**入口網站管理員：名字**

平台管理員的名字（出現在頁尾左側）

### `administrator_phone`

**入口網站管理員：電話號碼**

平台管理員的電話號碼（出現在頁尾左側）

### `administrator_surname`

**入口網站管理員：姓氏**

平台管理員的姓氏（出現在頁尾左側）

### `chamilo_latest_news`

**最新消息**

直接在您的管理面板中取得 Chamilo 的最新消息，包括安全性漏洞和活動。這些消息每次載入管理頁面時都會在 Chamilo 新聞伺服器上檢查，且僅對管理員可見。

*預設值：`true`*

### `chamilo_support`

**Chamilo 支援區塊**

直接從 Chamilo 製作團隊取得專業提示以及聯絡官方服務提供者的簡易方式，以獲得專業支援。此區塊會出現在您的管理頁面，僅對管理員可見，且每次載入管理頁面時都會重新整理。

*預設值：`true`*

### `max_anonymous_users`

**多個匿名使用者**

啟用此選項以允許多個系統使用者供匿名使用者使用。這在將此平台用作某些課程的公開展示間時非常有用。擁有多个匿名使用者將允許追蹤功能在多位使用者的體驗期間正常運作，而不會混淆他們的資料（否則可能會讓他們感到困惑）。

*預設值：`0`*

### `redirect_admin_to_courses_list`

**將管理員重新導向至課程清單**

預設行為是將管理員直接送至管理面板（而教師和學生則被送至課程清單或平台首頁）。啟用此選項以將管理員也重新導向至其課程清單。

*預設值：`false`*

### `send_inscription_notification_to_general_admin_only`

**僅通知全域管理員新使用者**

啟用時，僅全域管理員會收到新使用者註冊的電子郵件通知，而非所有管理員。

*預設值：`false`*

### `show_link_request_hrm_user`

**顯示要求使用者與 HRM 連結的連結**

在個人檔案頁面上顯示連結，允許人力資源主管要求與使用者帳戶連結。

*預設值：`false`*

### `user_status_option_only_for_admin_enabled`

**對一般使用者隱藏角色**

當此選項設為 true 且下列陣列將對應角色設為 'true' 時，允許隱藏使用者的角色。

*預設值：`false`*

### `user_status_option_show_only_for_admin`

**定義對一般使用者隱藏哪些角色**

設為 'true' 的角色僅會對管理員顯示。其他使用者將無法看到它們。