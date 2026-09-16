# 使用者個人檔案設定

使用者個人檔案上顯示哪些欄位、使用者的可編輯欄位，以及相關偏好設定。

在 **管理 > 設定 > 使用者個人檔案** 下存取這些設定。此類別包含 **29 個設定**，以下列出平台設定預設值（`SettingsCurrentFixtures.php`）中的標題與註解。

> 程式碼中的變數名稱以等寬字體顯示。透過 API 撰寫腳本或需要透過編輯 [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) 在全域層級變更這些設定時，請使用該名稱。

## 設定

### `account_valid_duration`

**帳戶有效期限**

使用者帳戶在建立後有效天數

*預設值：`3660`*


### `add_user_course_information_in_mailto`

**在頁尾連絡資訊中預填使用者與課程資訊至郵件**

在 mailto: 頁尾新增主旨與內容。

*預設值：`false`*


### `allow_show_linkedin_url`

**允許顯示使用者的 LinkedIn URL**

在使用者社群區塊新增連結，允許造訪使用者的 LinkedIn 個人檔案

### `allow_show_skype_account`

**允許顯示使用者的 Skype 帳戶**

在使用者社群區塊新增連結，允許透過 Skype 開始聊天

### `allow_social_map_fields`

**在地圖上顯示使用者的地理位置**

啟用社群網路中的地圖顯示，允許定位其他使用者。這包含多個位置（目前位置與目的地），需在額外欄位中定義為地址或座標。此處需將額外欄位設定為陣列。

### `allow_teachers_to_classes`

**允許教師管理班級**

啟用教師管理系統中的班級群組及其成員資格。

*預設值：`false`*


### `allow_user_headings`

**允許在課程中進行使用者剖析**

教師是否能定義學習者個人檔案欄位以擷取額外資訊？

### `allow_users_to_change_email_with_no_password`

**允許使用者無需密碼即可變更電子郵件**

變更帳戶資訊時

*預設值：`false`*

### `changeable_options`

**使用者可在個人檔案中變更的欄位**

選取使用者可在個人檔案頁面變更的欄位。


### `enable_profile_user_address_geolocalization`

**啟用使用者的地理定位**

啟用使用者地址欄位，並使用地理定位功能在地圖上顯示

### `extended_profile`

**作品集**

啟用此設定時，使用者可填寫以下（選填）欄位：「我的個人開放區」、「我的能力」、「我的文憑」、「我能教授的內容」

*預設值：`false`*

### `hide_username_in_course_chat`

**在課程聊天中隱藏使用者名稱**

在課程聊天中隱藏使用者名稱，僅顯示人員姓名。

*預設值：`false`*


### `hide_username_with_complete_name`

**在已顯示完整姓名時隱藏使用者名稱**

某些內部函式在傳回使用者完整姓名時會傳回使用者名稱。啟用此選項可確保使用者名稱不會出現。

*預設值：`false`*


### `linkedin_organization_id`

**LinkedIn 組織 ID**

在 LinkedIn 上分享徽章時，LinkedIn 允許設定組織 ID，該 ID 將連結至貴組織的 LinkedIn 頁面（連結頒發徽章的組織）。

*預設值：`false`*


### `login_is_email`

**使用電子郵件作為使用者名稱**

使用電子郵件登入系統

*預設值：`false`*

### `my_space_users_items_per_page`

**mySpace 中每頁預設項目數**

MySpace 追蹤區段（使用者、工作統計、學生清單）中每頁顯示的記錄數。

*預設值：`10`*


### `pass_reminder_custom_link`

**密碼提醒的自訂頁面**

設定您自己的密碼重設頁面 URL。使用聯邦帳戶管理系統時非常有用。

### `profile_fields_visibility`

**個人檔案頁面上的可見欄位**

欄位陣列及其在使用者個人檔案頁面上是否可見（布林值），亦適用於額外欄位標籤。

### `registration_add_helptext_for_2_names`

**在註冊中新增兩個姓名的說明文字**

當雙姓氏常見時，為使用者在註冊表單中輸入兩個姓名新增說明文字。

*預設值：`false`*


### `send_notification_when_user_added`

**使用者建立時寄送郵件給管理員**

使用者建立時寄送電子郵件通知給管理員。

### `show_conditions_to_user`

**顯示特定的註冊條件**

在註冊過程中向使用者顯示多個條件。提供陣列，每個元素包含 'variable'（內部額外欄位名稱）、'display_text'（核取方塊的簡單文字）、'text_area'（條件的長文字）。

### `show_official_code_whoisonline`

**在「誰在線上」中顯示官方代碼**

在「誰在線上」頁面上方使用者名稱下方顯示官方代碼。

*預設值：`false`*

---
### `show_terms_if_profile_completed`

**僅在個人資料完成時顯示條款與條件**

啟用此選項後，僅當以 'terms_' 開頭且設定為可見的額外個人資料欄位完成填寫時，使用者才能看到條款與條件。

*預設值：`false`*


### `split_users_upload_directory`

**分割使用者的上傳目錄**

在高負載入口網站中，當大量使用者註冊並上傳圖片時，上傳目錄 (main/upload/users/) 可能包含過多檔案，導致檔案系統無法處理（在 Debian 伺服器上曾報告超過 36000 個檔案）。變更此選項將啟用上傳目錄的一層分割。基礎目錄將使用 9 個子目錄，所有後續使用者的目錄將儲存至這些 9 個目錄之一。變更此選項不會影響磁碟上的目錄結構，但會影響 Chamilo 程式碼的行為，因此若變更此選項，您必須自行在伺服器上建立新目錄並移動現有目錄。請注意，在建立並移動這些目錄時，您必須將使用者 1 至 9 的目錄移動至同名子目錄中。若不確定此選項，建議勿啟用。

*預設值：`true`*

### `use_users_timezone`

**啟用使用者時區**

啟用使用者選擇自身時區的可能性。一旦設定，使用者即可在其自身時區中查看作業截止日期及其他時間參考，從而減少提交時的錯誤。

*預設值：`true`*

### `user_import_settings`

**使用者匯入選項**

在 CSV/XML 使用者匯入中套用為預設參數的選項陣列。

### `user_search_on_extra_fields`

**管理員使用者清單中依額外欄位搜尋使用者**

自然地將指定的額外欄位（額外欄位標籤陣列）納入使用者搜尋中。

### `user_selected_theme`

**使用者主題選擇**

允許使用者在其個人資料中選擇視覺主題。這將變更其 Chamilo 外觀，但不會影響入口網站的預設樣式。若特定課程或課程期間有指定主題，則優先於使用者定義的主題。

*預設值：`false`*

### `visible_options`

**個人資料中可見欄位清單**

控制哪些個人資料欄位對使用者及其他使用者可見。