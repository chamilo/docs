# 課程設定

適用於整個平台課程的預設值與政策——可見性、建立權限、允許的工具、學習者權限等。

可於 **管理 > 組態設定 > 課程** 存取這些設定。此分類包含 **45 項設定**，以下列出平台設定 fixtures（`SettingsCurrentFixtures.php`）中隨附的標題與註解。

> 程式碼中的變數名稱以等寬字體顯示。透過 API 撰寫指令碼，或需要以全域方式變更這些設定而編輯 [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) 時，請使用該名稱。

## 設定

### `active_tools_on_create`

**建立課程時啟用的工具**

選取課程建立後將處於*啟用*狀態的工具。

*預設值:*
```
agenda,announcement,attendance,bbb,blog,chat,course_description,course_progress,customcertificate,document,dropbox,forum,global,glossary,gradebook,group,learnpath,link,mobidico,notebook,notebookteacher,portfolio,positioning,quiz,student_publication,survey,test2pdf,tracking,user,wiki,zoom
```

### `allow_base_course_category`

**使用頂層 URL 的課程類別**

在多 URL 環境中，允許管理員與教師將頂層 URL 的類別指派給子 URL 中的課程。

*預設值: `false`*

### `allow_course_theme`

**允許課程佈景主題**

允許課程圖形佈景主題，並可將課程使用的樣式表變更為 Chamilo 可用的任一樣式表。當使用者進入課程時，課程樣式表優先於使用者個人樣式表及平台預設樣式表。

*預設值: `true`*

### `allow_public_course_with_no_terms_conditions`

**公開課程存取與使用條款**

啟用此選項後，若課程為公開可見且設有使用條款，則在課程為公開期間將停用該等條款。

*預設值: `false`*

### `block_registered_users_access_to_open_course_contents`

**阻擋已驗證使用者存取公開課程**

僅顯示公開課程。不允許已註冊使用者存取可見性為「開放」的課程，除非他們已訂閱各該課程。

*預設值: `false`*

### `breadcrumbs_course_homepage`

**課程首頁麵包屑**

麵包屑是通常位於頁面左上方的水平連結導覽系統。此選項決定課程首頁麵包屑中要顯示的內容。

*預設值: `course_title`*

### `course_about_teacher_name_hide`

**在課程詳情頁隱藏課程教師資訊**

在課程詳情頁隱藏教師資訊。

*預設值: `false`*

### `course_category_code_to_use_as_model`

**將課程範本限制為單一課程類別**

指定要用作課程範本的類別代碼。僅這些課程會顯示於建立課程時的下拉選單，且使用者不會在課程目錄中看到此類別的課程。

### `course_configuration_tool_extra_fields_to_show_and_edit`

**要在課程設定中顯示的額外欄位**

此陣列中定義的欄位將出現在課程設定頁面上。

### `course_creation_by_teacher_extra_fields_to_show`

**要在課程建立表單中顯示的額外欄位**

此陣列中定義的欄位將作為額外欄位出現在課程建立表單中。

### `course_creation_donate_link`

**課程建立頁面上的捐款連結**

捐款訊息應連結到的頁面（完整 URL）。

### `course_creation_donate_message_show`

**在課程建立頁面顯示捐款訊息**

在教師的課程建立頁面加入訊息方塊，請他們捐款支持專案。

*預設值: `false`*

### `course_creation_form_hide_course_code`

**從課程建立表單移除課程代碼欄位**

若未提供，課程代碼預設會依課程標題產生，因此啟用此選項可完全從課程建立表單移除代碼欄位。

*預設值: `false`*

### `course_creation_form_set_course_category_mandatory`

**將課程類別設為必填**

建立課程時，將課程類別設為必填設定。

*預設值: `false`*

### `course_creation_form_set_extra_fields_mandatory`

**課程建立表單上必填的額外欄位**

此陣列中定義的欄位在課程建立表單中將為必填。

### `course_creation_splash_screen`

**課程啟動畫面**

建立新課程時顯示啟動畫面。

*預設值: `true`*

### `course_creation_use_template`

**以範本課程建立新課程**

設定此選項後，平台上所有新建立的課程都會使用同一個範本課程（以其在資料庫中的課程數字 ID 識別）。請注意，若未妥善規劃，此設定可能對磁碟空間用量造成巨大影響。範本課程的使用方式等同於教師以課程備份工具複製課程，因此不會複製使用者內容，僅複製教師教材。其餘課程備份規則同樣適用。留空（或設為 0）即可停用。

### `course_creation_user_course_extra_field_relation_to_prefill`

**以使用者欄位預填課程欄位**

若非空白，建立課程時會從使用者個人檔案中尋找部分欄位，並自動填入課程。例如，專精數位行銷的教師可在其建立的每門課程上自動設定「數位行銷」標記。

### `course_hide_tools`

**對教師隱藏工具**

勾選您要對教師隱藏的工具。這將禁止存取該工具。

### `course_images_in_courses_list`

**課程自訂圖示**

在課程清單中使用課程圖片作為課程圖示（取代預設的綠色黑板圖示）。

*預設：`true`*

### `course_log_default_extra_fields`

**課程統計頁面預設顯示的使用者額外欄位**

以此陣列設定您希望在主要課程統計頁面預設顯示的額外欄位內部 ID。

### `course_log_hide_columns`

**隱藏課程紀錄中的欄位**

此陣列讓您設定要在主要課程統計頁面與總時數報表中隱藏哪些欄位。

### `course_sequence_valid_only_in_same_session`

**僅在同一期次內驗證先修條件**

啟用後，課程僅在當前期次內通過才視為已驗證。若停用，在其他期次通過的課程也會解鎖相依課程。

*預設：`false`*


### `course_student_info`

**課程學員資訊顯示**

在「我的課程」／「我的期次」頁面上，顯示學員分數、進度及／或證書取得的額外資訊。

### `course_validation`

**課程審核**

啟用「課程審核」功能後，教師無法單獨建立課程。教師需填寫課程申請，由平台管理員審核並核准或駁回。<br />此功能依賴自動電子郵件訊息；請設定 Chamilo 連線至電子郵件伺服器，並使用專用電子郵件帳號。

*預設：`false`*


### `course_validation_terms_and_conditions_url`

**課程審核 - 條款與條件連結**

此為提出課程申請時有效的「條款與條件」文件 URL。若在此設定網址，使用者在送出課程申請前應閱讀並同意這些條款與條件。<br />若您啟用 Chamilo 的「條款與條件」模組，並希望使用其 URL，請將此設定留空。

### `courses_default_creation_visibility`

**預設課程可見性**

建立新課程時的預設課程可見性

*預設：`2`*


### `display_coursecode_in_courselist`

**在課程名稱中顯示代碼**

在課程清單中顯示課程代碼

*預設：`false`*


### `display_teacher_in_courselist`

**在課程名稱中顯示教師**

在課程清單中顯示教師

*預設：`true`*


### `enable_tool_introduction`

**啟用工具簡介**

在各工具首頁啟用簡介

*預設：`false`*


### `enable_unsubscribe_button_on_my_course_page`

**在「我的課程」顯示取消訂閱按鈕**

在「我的課程」頁面新增取消訂閱課程的按鈕。

*預設：`false`*

### `example_material_course_creation`

**建立課程時的範例教材**

建立新課程時自動建立範例教材

*預設：`true`*


### `hide_course_rating`

**隱藏課程評分**

課程評分功能預設會出現在多處。若您不需要，請啟用此選項。

*預設：`false`*

### `hide_course_sidebar`

**隱藏側邊欄中的課程區塊**

在左側選單可見的畫面中，不顯示「課程」區段。

*預設：`true`*

### `multiple_access_url_show_shared_course_marker`

**顯示多 URL 共用課程標記**

為在 URL 之間共用的課程加上連結圖示，讓使用者（尤其是教師）知道編輯課程內容時需特別小心。

*預設：`false`*

### `my_courses_show_courses_in_user_language_only`

**僅顯示使用者語言的課程**

啟用後，此選項將隱藏所有未設定為使用者語言的課程。

*預設：`false`*

### `profiling_filter_adding_users`

**依個人檔案欄位篩選訂閱課程的使用者**

允許教師在將使用者訂閱至其課程的頁面上，依額外欄位篩選使用者。

*預設值：`false`*


### `resource_sequence_show_dependency_in_course_intro`

**在課程簡介中顯示相依關係**

當對課程或時段使用資源排序時，在課程首頁顯示該課程的相依關係。

*預設值：`false`*

### `scorm_cumulative_session_time`

**SCORM 的累計時段時間**

啟用時，SCORM 學習路徑的時段時間將採累計方式；否則僅從上次更新時間起計算。此為全域設定。建立新學習路徑時會套用，之後仍可針對各學習路徑重新定義。

*預設值：`true`*


### `send_email_to_admin_when_create_course`

**建立課程時的電子郵件警示**

每當教師建立新課程時，向平台管理員傳送電子郵件

*預設值：`false`*


### `show_course_duration`

**顯示課程時長**

在課程目錄與課程清單中，於課程標題旁顯示課程時長。

*預設值：`false`*

### `show_navigation_menu`

**顯示課程導覽選單**

顯示可加快工具存取的導覽選單

*預設值：`false`*


### `show_toolshortcuts`

**工具捷徑**

是否在橫幅中顯示工具捷徑？

*預設值：`false`*

### `student_view_enabled`

**啟用學習者檢視**

啟用學習者檢視，讓教師或管理員能以學習者的視角檢視課程

*預設值：`true`*


### `view_grid_courses`

**以格狀版面檢視課程**

以每列顯示多門課程的版面檢視課程。否則版面將每列僅顯示一門課程。

*預設值：`true`*