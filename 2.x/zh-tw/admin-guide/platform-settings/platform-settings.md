# 平台設定

平台層級的身份與行為 — 機構名稱、時區、註冊政策、線上使用者、效能旗標。

在 **管理 > 設定 > 平台** 下存取這些設定。此類別包含 **29 個設定**，以下列出平台設定預設值 (`SettingsCurrentFixtures.php`) 中的標題與註解。

> 程式碼中的變數名稱以等寬字體顯示。透過 API 撰寫腳本或需要透過編輯 [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) 在全域層級變更這些設定時，請使用它。

## 設定

### `allow_my_files`

**啟用「我的檔案」區段**

允許使用者將檔案上傳至平台上的個人空間。

*預設值：`true`*

### `chamilo_database_version`

**Chamilo 使用的目前資料庫架構版本**

顯示目前的 DB 版本，以符合 Chamilo 核心版本。

### `cookie_warning`

**Cookie 隱私通知**

若啟用，此選項會在平台頂端顯示橫幅，要求使用者確認平台使用 Cookie 以提供使用者體驗。使用者可輕鬆確認並隱藏此橫幅。此功能讓 Chamilo 符合歐盟網頁 Cookie 法規。

*預設值：`false`*

### `disable_copy_paste`

**停用複製貼上**

啟用時，此選項盡可能停用複製貼上機制。在嚴格考試環境中實用。

*預設值：`false`*

### `donotlistcampus`

**不在 chamilo.org 上列出此校園**

預設情況下，Chamilo 入口網站會自動註冊至 chamilo.org 的公開清單中，僅使用您為此入口網站設定的標題（不包含 URL 或任何私人資料）。勾選此項目以避免入口網站標題出現。

*預設值：`false`*

### `generate_random_login`

**產生隨機使用者名稱**

匯入使用者（批次處理）時，自動產生隨機字串作為使用者名稱。否則，使用者名稱將根據名字與姓氏，或電子郵件的前綴產生。

*預設值：`false`*

### `hosting_limit_identical_email`

**限制相同電子郵件使用**

允許共用相同電子郵件地址的帳戶最大數量。設為 0 以停用此限制。

*預設值：`0`*

### `hosting_limit_users_per_course`

**每門課程的全域使用者數量限制**

定義平台中任何單一課程（包含教師）允許訂閱的使用者全域最大數量。設為 0 以停用此限制。此功能有助避免開放入口網站中的課程過載。

*預設值：`0`*

### `institution`

**組織名稱**

組織名稱（出現在標頭右側）

*預設值：`Chamilo.org`*


### `institution_address`

**機構地址**

地址

### `institution_url`

**組織 URL（網址）**

機構的 URL（出現在標頭右側的連結）

*預設值：`http://www.chamilo.org`*


### `max_courses_per_user`

**每位使用者最大課程數量**

教師/訓練師可建立的課程最大數量。設為 0 以停用此限制。可透過 BuyCourses 服務購買每位使用者覆寫。

*預設值：`0`*

### `notification_event`

**啟用通知工具，以提供更具影響力的學生溝通管道**

啟用重要平台事件的快顯視窗或系統通知。

*預設值：`false`*

### `pdf_img_dpi`

**PDF 匯出解析度**

這表示產生的 PDF 檔案解析度（以每英寸點數，或 dpi 為單位）。預設為 96。提高此值可產生更高解析度的 PDF 檔案，但也會增加檔案大小與產生時間。

*預設值：`96`*

### `platform_logo_url`

**替代平台標誌的 URL**

透過載入（可能為遠端）URL 取代 Chamilo 標誌。請確保符合您的安全性政策。

*預設值：`https://chamilo.org`*


### `portfolio_advanced_sharing`

**啟用作品集進階分享**

決定誰可檢視作品集的貼文與評論。

*預設值：`false`*

### `portfolio_show_base_course_post_in_sessions`

**在工作階段課程中顯示基礎課程貼文**

決定誰可檢視作品集的貼文與評論。

*預設值：`false`*

### `push_notification_settings`

**推播通知設定 (JSON)**

推播通知整合的 JSON 設定。

### `server_type`

**伺服器類型**

定義環境類型：「prod」（一般生產環境）、「validation」（類似生產環境但不回報統計資料），或「test」（除錯模式，包含開發人員工具如未翻譯字串指示器）。

*預設值：`prod`*

### `session_admin_access_to_all_users_on_all_urls`

**允許工作階段管理員在所有 URL 上檢視所有使用者**

若啟用，工作階段管理員可搜尋並列出所有存取 URL 的使用者，而不受限於目前 URL。

*預設值：`false`*

---

---
### `site_name`

**電子學習入口網站名稱**

您的 Chamilo 入口網站的名稱（顯示在頁首）

*預設：`Chamilo site`*


### `timepicker_increment`

**時間選擇器增量**

使用時間選擇器小工具選取日期和時間時的最小時間增量（以分鐘為單位）。例如，在討論作業提交、測驗可用性、課程開始時間等時，可能無需小於 5 或 15 分鐘的增量。

*預設：`15`*


### `timezone`

**預設時區**

選取此入口網站的預設時區。這將有助於為每個新使用者或尚未設定特定時區的使用者設定時區（如果啟用此功能）。時區有助於在畫面上以每個使用者的特定時區顯示所有時間相關資訊。

*預設：`Europe/Paris`*


### `unoconv_binaries`

**UNO 轉換器二進位檔案**

提供 UNO 轉換器程式庫的系統路徑，以啟用額外的匯出功能。

*預設：`/usr/bin/unoconv`*


### `use_career_external_id_as_identifier_in_diagrams`

**在圖表中使用外部職涯 ID**

如果使用職涯圖表，則顯示額外欄位而非內部職涯 ID。

*預設：`false`*


### `use_custom_pages`

**使用自訂頁面**

啟用此功能以依角色設定特定登入頁面

*預設：`false`*


### `use_virtual_keyboard`

**使用虛擬鍵盤**

顯示虛擬鍵盤。這在設定實體教室中限制學生作弊能力的嚴格考試時非常有用，學生無鍵盤可用。

*預設：`false`*


### `user_status_show_option`

**角色顯示選項**

一個角色 => true/false 的陣列，用以定義該角色是否應顯示或隱藏。


### `user_status_show_options_enabled`

**角色選擇性顯示**

啟用以使用陣列定義哪些角色應明確顯示以及哪些應隱藏。

*預設：`false`*