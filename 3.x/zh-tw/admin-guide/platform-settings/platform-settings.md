# 平台設定

平台層級的識別與行為 — 機構名稱、時區、註冊政策、線上使用者、效能旗標。

可於 **管理 > 組態設定 > 平台** 存取這些設定。此類別包含 **29 項設定**，以下列出平台設定 fixtures（`SettingsCurrentFixtures.php`）中隨附的標題與註解。

> 程式碼中的變數名稱以等寬字體顯示。透過 API 撰寫指令碼，或需以編輯 [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) 的方式在全域層級變更這些設定時，請使用該名稱。

## 設定

### `allow_my_files`

**啟用「我的檔案」區段**

允許使用者將檔案上傳至平台上的個人空間。

*預設值：`true`*

### `chamilo_database_version`

**Chamilo 目前使用的資料庫結構描述版本**

顯示目前的資料庫版本，以便與 Chamilo 核心版本對應。

### `cookie_warning`

**Cookie 隱私通知**

若啟用，此選項會在平台頂端顯示橫幅，請使用者確認平台使用提供使用體驗所必需的 cookie。使用者可輕易確認並隱藏該橫幅。這使 Chamilo 得以符合歐盟網路 cookie 相關規範。

*預設值：`false`*

### `disable_copy_paste`

**停用複製貼上**

啟用時，此選項會盡可能停用複製貼上機制。適用於限制較嚴的考試環境。

*預設值：`false`*

### `donotlistcampus`

**請勿將此校園列於 chamilo.org**

預設情況下，Chamilo 入口網站會自動以您為此入口網站所設定的標題（非網址，亦非任何私人資料）登錄於 chamilo.org 的公開清單。勾選此方塊可避免您的入口網站標題出現於該清單。

*預設值：`false`*

### `generate_random_login`

**產生隨機使用者名稱**

匯入使用者（批次處理）時，自動為使用者名稱產生隨機字串。否則，使用者名稱將依名字與姓氏，或電子郵件的前置部分產生。

*預設值：`false`*

### `hosting_limit_identical_email`

**限制相同電子郵件的使用**

允許共用同一電子郵件地址的帳號數量上限。設為 0 可停用此限制。

*預設值：`0`*

### `hosting_limit_users_per_course`

**每門課程的全域使用者上限**

定義平台上任一單一課程允許訂閱的使用者（含教師）全域數量上限。將此值設為 0 可停用限制。這有助於避免開放式入口網站中的課程過載。

*預設值：`0`*

### `institution`

**機構名稱**

機構名稱（顯示於頁首右側）

*預設值：`Chamilo.org`*


### `institution_address`

**機構地址**

地址

### `institution_url`

**機構網址（網站位址）**

機構的網址（顯示於頁首右側的連結）

*預設值：`http://www.chamilo.org`*


### `max_courses_per_user`

**每位使用者的課程上限**

教師／培訓者可建立的課程數量上限。設為 0 可停用限制。可透過 BuyCourses 服務購買，依使用者覆寫。

*預設值：`0`*

### `notification_event`

**啟用通知工具，作為與學生溝通的更有影響力管道**

針對重要平台事件啟用彈出式或系統通知。

*預設值：`false`*

### `pdf_img_dpi`

**PDF 匯出解析度**

此值代表產生之 PDF 檔案的解析度（每英吋點數，即 dpi）。預設為 96。提高此值可獲得較高解析度的 PDF 檔案，但亦會增加檔案大小與產生時間。

*預設值：`96`*

### `platform_logo_url`

**替代平台標誌的網址**

透過載入（可能為遠端的）網址取代 Chamilo 標誌。請確認此做法符合您的安全政策。

*預設值：`https://chamilo.org`*


### `portfolio_advanced_sharing`

**啟用作品集進階分享**

決定誰可以檢視作品集的文章與評論。

*預設值：`false`*

### `portfolio_show_base_course_post_in_sessions`

**在工作階段課程中顯示基礎課程文章**

決定誰可以檢視作品集的文章與評論。

*預設值：`false`*

### `push_notification_settings`

**推播通知設定（JSON）**

推播通知整合的 JSON 組態。

### `server_type`

**伺服器類型**

定義環境類型：「prod」（一般正式環境）、「validation」（類似正式環境但不回報統計資料），或「test」（除錯模式，含未翻譯字串指示等開發者工具）。

*預設值：`prod`*

### `session_admin_access_to_all_users_on_all_urls`

**允許工作階段管理員查看所有網址上的所有使用者**

若啟用，工作階段管理員可搜尋並列出所有存取網址的使用者，不受其目前網址限制。

*預設值：`false`*

### `site_name`

**電子學習入口網站名稱**

您的 Chamilo 入口網站名稱（顯示於頁首）

*預設值：`Chamilo site`*


### `timepicker_increment`

**時間選擇器增量**

使用時間選擇器小工具選取日期與時間時的最小時間增量（以分鐘為單位）。例如，在作業繳交、測驗可用時間、課程時段開始時間等情境中，增量小於 5 或 15 分鐘可能並不實用。

*預設值：`15`*

### `timezone`

**預設時區**

為此入口網站選取預設時區。這將有助於為每位新使用者，或尚未設定特定時區的使用者設定時區（若已啟用此功能）。時區可讓畫面上所有與時間相關的資訊，以各使用者的特定時區顯示。

*預設值：`Europe/Paris`*


### `unoconv_binaries`

**UNO 轉換器二進位檔**

提供 UNO 轉換器程式庫的系統路徑，以啟用部分額外匯出功能。

*預設值：`/usr/bin/unoconv`*


### `use_career_external_id_as_identifier_in_diagrams`

**在圖表中使用外部職涯 ID**

若使用職涯圖表，顯示額外欄位而非內部職涯 ID。

*預設值：`false`*

### `use_custom_pages`

**使用自訂頁面**

啟用此功能以依角色設定特定登入頁面

*預設值：`false`*

### `use_virtual_keyboard`

**使用虛擬鍵盤**

顯示虛擬鍵盤。這在實體教室中進行限制性考試時很有用，學生沒有實體鍵盤，可降低其作弊能力。

*預設值：`false`*

### `user_status_show_option`

**角色顯示選項**

一個 role => true/false 的陣列，定義該角色應顯示或隱藏。

### `user_status_show_options_enabled`

**選擇性顯示角色**

啟用以使用陣列定義哪些角色應清楚顯示、哪些應隱藏。

*預設值：`false`*