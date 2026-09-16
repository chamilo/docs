# 使用者個人資料設定

哪些欄位會出現在使用者個人資料中、使用者可以編輯哪些欄位，以及相關偏好設定。

請至 **管理 > 組態設定 > 使用者個人資料** 存取這些設定。此類別包含 **29 項設定**，以下列出平台設定 fixtures（`SettingsCurrentFixtures.php`）中隨附的標題與註解。

> 程式碼中的變數名稱以等寬字體顯示。透過 API 撰寫指令碼，或需要以編輯 [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) 的方式在全域層級變更這些設定時，請使用該名稱。

## Settings

### `account_valid_duration`

**帳號有效期限**

使用者帳號自建立後，於此天數內有效

*Default: `3660`*


### `add_user_course_information_in_mailto`

**在頁尾聯絡 mailto 中預填使用者與課程資訊**

在 mailto: 頁尾中加入主旨與內文。

*Default: `false`*


### `allow_show_linkedin_url`

**允許顯示使用者的 LinkedIn URL**

在使用者社群區塊加入連結，以便造訪該使用者的 LinkedIn 個人檔案

### `allow_show_skype_account`

**允許顯示使用者的 Skype 帳號**

在使用者社群區塊加入連結，以便透過 Skype 開始聊天

### `allow_social_map_fields`

**地圖上的使用者地理位置**

啟用社群網路中的地圖顯示，以便定位其他使用者。這包含數個位置（目前位置與目的地），必須以獨立的額外欄位定義為地址或座標。額外欄位必須在此以陣列設定。

### `allow_teachers_to_classes`

**允許教師管理班級**

讓教師能夠管理系統內的班級群組及其成員。

*Default: `false`*


### `allow_user_headings`

**允許在課程內進行使用者剖析**

教師是否可以定義學習者個人資料欄位，以取得額外資訊？

### `allow_users_to_change_email_with_no_password`

**允許使用者在不輸入密碼的情況下變更電子郵件**

變更帳號資訊時

*Default: `false`*

### `changeable_options`

**使用者可在個人資料中變更的欄位**

選取使用者將能在其個人資料頁面上變更的欄位。


### `enable_profile_user_address_geolocalization`

**啟用使用者地理位置定位**

啟用使用者地址欄位，並使用地理位置定位功能在地圖上顯示

### `extended_profile`

**作品集**

若開啟此設定，使用者可填寫下列（選填）欄位：「我的個人開放區」、「我的能力」、「我的文憑」、「我能夠教授的內容」

*Default: `false`*

### `hide_username_in_course_chat`

**在課程聊天中隱藏使用者名稱**

在課程聊天中隱藏使用者名稱。僅顯示人員姓名。

*Default: `false`*


### `hide_username_with_complete_name`

**已顯示完整姓名時隱藏使用者名稱**

部分內部函式在回傳使用者完整姓名時會一併回傳使用者名稱。啟用此選項後，可確保使用者名稱不會出現。

*Default: `false`*


### `linkedin_organization_id`

**LinkedIn 組織 ID**

在 LinkedIn 上分享徽章時，LinkedIn 允許您設定組織 ID，該 ID 會連結至貴組織的 LinkedIn 頁面（以連結頒發徽章的組織）。

*Default: `false`*


### `login_is_email`

**使用電子郵件作為使用者名稱**

使用電子郵件登入系統

*Default: `false`*

### `my_space_users_items_per_page`

**mySpace 每頁預設項目數**

MySpace 追蹤區段（使用者、作業統計、學生清單）中每頁顯示的紀錄數。

*Default: `10`*


### `pass_reminder_custom_link`

**密碼提醒自訂頁面**

設定您自己的密碼重設頁面 URL。在使用聯合帳號管理系統時相當有用。

### `profile_fields_visibility`

**個人資料頁面上可見的欄位**

欄位陣列，以及各欄位在使用者個人資料頁面上是否可見（布林值）（亦適用於額外欄位標籤）。

### `registration_add_helptext_for_2_names`

**在註冊時加入協助輸入兩個姓名的說明**

當雙姓氏常見時，在註冊表單中為使用者加入協助文字，以便輸入兩個姓名。

*Default: `false`*


### `send_notification_when_user_added`

**建立使用者時寄信給管理員**

建立使用者時向管理員傳送電子郵件通知。

### `show_conditions_to_user`

**顯示特定註冊條件**

在註冊過程中向使用者顯示多項條件。提供一個陣列，每個元素包含 'variable'（內部額外欄位名稱）、'display_text'（核取方塊的簡短文字）、'text_area'（條件的長篇文字）。

### `show_official_code_whoisonline`

**「誰在線上」顯示正式代碼**

在「誰在線上」頁面的使用者名稱下方顯示正式代碼。

*Default: `false`*

### `show_terms_if_profile_completed`

**僅在個人資料完成時顯示條款與條件**

啟用此選項後，條款與條件僅會在使用者完成以「terms_」開頭且設為可見的額外個人資料欄位後，才對該使用者顯示。

*預設值：`false`*


### `split_users_upload_directory`

**分割使用者上傳目錄**

在高負載入口網站中，若有大量使用者註冊並上傳個人照片，上傳目錄（main/upload/users/）可能包含過多檔案，導致檔案系統難以處理（曾有 Debian 伺服器上回報超過 36000 個檔案的情況）。變更此選項將啟用上傳目錄的一層目錄分割。基底目錄中會使用 9 個子目錄，之後所有使用者目錄都會存放於這 9 個目錄其中之一。變更此選項不會影響磁碟上的目錄結構，但會影響 Chamilo 程式碼的行為，因此若您變更此選項，必須自行在伺服器上建立新目錄並移動既有目錄。請注意，建立並移動這些目錄時，必須將使用者 1 至 9 的目錄移入同名的子目錄中。若您不確定此選項，最好不要啟用。

*預設值：`true`*

### `use_users_timezone`

**啟用使用者時區**

啟用使用者自行選擇時區的功能。設定完成後，使用者將能以自己的時區查看作業截止日期及其他時間相關資訊，從而減少繳交時的錯誤。

*預設值：`true`*

### `user_import_settings`

**使用者匯入選項**

在 CSV/XML 使用者匯入中作為預設參數套用的選項陣列。

### `user_search_on_extra_fields`

**管理員在使用者清單中依額外欄位搜尋使用者**

在使用者搜尋中自然納入指定的額外欄位（額外欄位標籤陣列）。

### `user_selected_theme`

**使用者佈景主題選擇**

允許使用者在個人資料中選擇自己的視覺佈景主題。這會改變該使用者所見的 Chamilo 外觀，但不會影響入口網站的預設樣式。若特定課程或時段已指定特定佈景主題，其優先順序高於使用者自訂主題。

*預設值：`false`*

### `visible_options`

**個人資料中可見欄位清單**

控制哪些個人資料欄位對使用者及其他人可見。