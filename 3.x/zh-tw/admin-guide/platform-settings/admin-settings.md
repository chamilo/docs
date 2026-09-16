# 管理員身分設定

平台管理員的身分與聯絡資訊。這些值會顯示於平台頁尾，以及部分系統產生的電子郵件中。

可於 **管理 > 組態設定 > 管理員身分** 存取這些設定。此類別包含 **12 項設定**，以下列出平台設定 fixtures（`SettingsCurrentFixtures.php`）中隨附的標題與說明。

> 程式碼中的變數名稱以等寬字體顯示。透過 API 撰寫指令碼，或需以編輯 [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) 的方式在全域層級變更這些設定時，請使用該名稱。

## 設定

### `administrator_email`

**入口網站管理員：電子郵件**

平台管理員的電子郵件地址（顯示於頁尾左側）

### `administrator_name`

**入口網站管理員：名字**

平台管理員的名字（顯示於頁尾左側）

### `administrator_phone`

**入口網站管理員：電話號碼**

平台管理員的電話號碼（顯示於頁尾左側）

### `administrator_surname`

**入口網站管理員：姓氏**

平台管理員的姓氏（顯示於頁尾左側）

### `chamilo_latest_news`

**最新消息**

直接在管理面板中取得來自 Chamilo 的最新消息，包括安全性漏洞與活動。每次載入管理頁面時，系統會向 Chamilo 新聞伺服器檢查這些消息，且僅管理員可見。

*預設值：`true`*

### `chamilo_support`

**Chamilo 支援區塊**

直接從 Chamilo 開發者取得專業建議，以及聯絡官方服務供應商以取得專業支援的簡便方式。此區塊顯示於管理頁面，僅管理員可見，並於每次載入管理頁面時重新整理。

*預設值：`true`*

### `max_anonymous_users`

**多個匿名使用者**

啟用此選項可為匿名使用者允許多個系統使用者。當本平台作為部分課程的公開展示空間時相當有用。擁有多個匿名使用者，可讓追蹤在體驗期間對多名使用者正常運作，而不會混合其資料（否則可能造成混淆）。

*預設值：`0`*

### `redirect_admin_to_courses_list`

**將管理員重新導向至課程清單**

預設行為是將管理員直接送往管理面板（教師與學生則被送往課程清單或平台首頁）。啟用後，管理員也會被重新導向至其課程清單。

*預設值：`false`*

### `send_inscription_notification_to_general_admin_only`

**僅通知全域管理員有新使用者**

啟用後，僅全域管理員會收到新使用者註冊的電子郵件通知，而非所有管理員。

*預設值：`false`*

### `show_link_request_hrm_user`

**顯示請求使用者與 HRM 連結的連結**

在個人資料頁面上顯示連結，讓人力資源主管可請求與某個使用者帳號建立連結。

*預設值：`false`*

### `user_status_option_only_for_admin_enabled`

**對一般使用者隱藏角色**

當此選項設為 true，且下列陣列將對應角色設為 'true' 時，可隱藏使用者的角色。

*預設值：`false`*

### `user_status_option_show_only_for_admin`

**定義對一般使用者隱藏的角色**

設為 'true' 的角色僅會對管理員顯示。其他使用者將無法看見這些角色。