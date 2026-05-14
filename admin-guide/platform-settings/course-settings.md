# 課程設定

適用於平台中所有課程的預設值和政策 — 包括可見性、建立權限、允許工具、學習者權限等類似設定。

在 **Administration > Configuration settings > Course** 下存取這些設定。此類別包含 **45 個設定**，以下列出平台設定預設檔案 (`SettingsCurrentFixtures.php`) 中提供的標題和註解。

> 程式碼中的變數名稱以等寬字體顯示。透過 API 撰寫腳本或需要透過編輯 [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) 在全域層級變更這些設定時，請使用它。

## 設定

### `active_tools_on_create`

**課程建立時啟用的工具**

選取課程建立後將*啟用*的工具。

*預設值：*
```
agenda,announcement,attendance,bbb,blog,chat,course_description,course_progress,customcertificate,document,dropbox,forum,global,glossary,gradebook,group,learnpath,link,mobidico,notebook,notebookteacher,portfolio,positioning,quiz,student_publication,survey,test2pdf,tracking,user,wiki,zoom
```

### `allow_base_course_category`

**使用頂層 URL 的課程類別**

在多 URL 設定中，允許管理員和教師將頂層 URL 的類別指派給子 URL 中的課程。

*預設值：`false`*

### `allow_course_theme`

**允許課程主題**

允許課程圖形主題，並可將課程使用的樣式表變更為 Chamilo 可用的任何樣式表。當使用者進入課程時，課程的樣式表將優先於使用者的樣式表和平台的預設樣式表。

*預設值：`true`*

### `allow_public_course_with_no_terms_conditions`

**存取具有條款與條件的公開課程**

啟用此選項時，如果課程具有公開可見性和條款與條件，則在課程公開時停用這些條款。

*預設值：`false`*

### `block_registered_users_access_to_open_course_contents`

**封鎖已驗證使用者存取公開課程**

僅顯示公開課程。不允許已註冊使用者存取「開放」可見性的課程，除非他們已訂閱每個這些課程。

*預設值：`false`*

### `breadcrumbs_course_homepage`

**課程首頁麵包屑**

麵包屑是通常位於頁面左上方的水平連結導航系統。此選項選取要在課程首頁麵包屑中顯示的內容。

*預設值：`course_title`*

### `course_about_teacher_name_hide`

**在課程詳細頁面隱藏課程教師資訊**

在課程詳細頁面隱藏教師資訊。

*預設值：`false`*

### `course_category_code_to_use_as_model`

**將課程範本限制為單一課程類別**

提供用作課程範本的類別代碼。只有這些課程會在課程建立時的下拉清單中顯示，且使用者不會在課程目錄中看到此類別的課程。

### `course_configuration_tool_extra_fields_to_show_and_edit`

**在課程設定中顯示的額外欄位**

此陣列中定義的欄位將出現在課程設定頁面。

### `course_creation_by_teacher_extra_fields_to_show`

**在課程建立表單中顯示的額外欄位**

此陣列中定義的欄位將作為額外欄位出現在課程建立表單中。

### `course_creation_donate_link`

**課程建立頁面的捐款連結**

捐款訊息應連結的頁面（完整 URL）。

### `course_creation_donate_message_show`

**在課程建立頁面顯示捐款訊息**

在課程建立頁面為教師新增一個訊息方塊，請求他們捐款給專案。

*預設值：`false`*

### `course_creation_form_hide_course_code`

**從課程建立表單移除課程代碼欄位**

如果未提供，課程代碼將預設根據課程標題產生，因此啟用此選項以完全從課程建立表單移除代碼欄位。

*預設值：`false`*

### `course_creation_form_set_course_category_mandatory`

**將課程類別設為必填**

在建立課程時，將課程類別設為必要設定。

*預設值：`false`*

### `course_creation_form_set_extra_fields_mandatory`

**在課程建立表單中要求的額外欄位**

此陣列中定義的欄位在課程建立表單中將為必填。

### `course_creation_splash_screen`

**課程的啟動畫面**

在建立新課程時顯示啟動畫面。

*預設值：`true`*

---

---
### `course_creation_use_template`

**使用模板課程建立新課程**

設定此項目以使用相同的模板課程（由資料庫中的課程數字 ID 識別）來建立平台上的所有新課程。請注意，如果未妥善規劃，此設定可能會對空間使用量產生重大影響。模板課程將被用作教師使用課程備份工具複製課程的情況，因此不會複製使用者內容，只複製教師教材。所有其他課程備份規則均適用。留空（或設為 0）以停用。

### `course_creation_user_course_extra_field_relation_to_prefill`

**使用使用者欄位預填課程欄位**

如果不為空，課程建立程序將在使用者設定檔中尋找某些欄位，並自動填入課程。例如，專攻數位行銷的教師可以自動在每個課程上設定「數位行銷」標記。

### `course_hide_tools`

**隱藏教師工具**

勾選您要從教師隱藏的工具。這將禁止存取該工具。

### `course_images_in_courses_list`

**課程自訂圖示**

在課程清單中使用課程圖像作為課程圖示（而非預設的綠色黑板圖示）。

*預設值：`true`*

### `course_log_default_extra_fields`

**課程統計頁面預設使用者額外欄位**

使用此陣列配置您要在主要課程統計頁面預設顯示的額外欄位內部 ID。

### `course_log_hide_columns`

**隱藏課程記錄欄位**

此陣列讓您可以配置在主要課程統計頁面和總時間報告中隱藏哪些欄位。

### `course_sequence_valid_only_in_same_session`

**僅在相同工作階段內驗證先決條件**

啟用時，僅在目前工作階段內通過的課程才被視為已驗證。如果停用，其他工作階段通過的課程也將解鎖相依課程。

*預設值：`false`*

### `course_student_info`

**課程學生資訊顯示**

在「我的課程」/「我的工作階段」頁面上，顯示學生分數、進度及/或證書取得的額外資訊。

### `course_validation`

**課程驗證**

啟用「課程驗證」功能時，教師無法獨自建立課程。他們需填寫課程請求。平台管理員審核請求後批准或拒絕。<br />此功能依賴自動電子郵件訊息；請設定 Chamilo 存取電子郵件伺服器並使用專用電子郵件帳戶。

*預設值：`false`*

### `course_validation_terms_and_conditions_url`

**課程驗證 - 條款與條件連結**

這是提出課程請求有效的「條款與條件」文件 URL。如果在此設定地址，使用者須在送出課程請求前閱讀並同意這些條款與條件。<br />如果您啟用 Chamilo 的「條款與條件」模組並希望使用其 URL，請將此設定留空。

### `courses_default_creation_visibility`

**預設課程可見性**

建立新課程時的預設課程可見性

*預設值：`2`*

### `display_coursecode_in_courselist`

**在課程名稱中顯示代碼**

在課程清單中顯示課程代碼

*預設值：`false`*

### `display_teacher_in_courselist`

**在課程名稱中顯示教師**

在課程清單中顯示教師

*預設值：`true`*

### `enable_tool_introduction`

**啟用工具簡介**

在每個工具的主頁上啟用簡介

*預設值：`false`*

### `enable_unsubscribe_button_on_my_course_page`

**在「我的課程」中顯示取消訂閱按鈕**

在「我的課程」頁面上新增取消課程訂閱按鈕。

*預設值：`false`*

### `example_material_course_creation`

**課程建立時的範例教材**

建立新課程時自動建立範例教材

*預設值：`true`*

### `hide_course_rating`

**隱藏課程評分**

課程評分功能預設出現在不同位置。如果不想要，請啟用此選項。

*預設值：`false`*

### `hide_course_sidebar`

**隱藏側邊欄課程區塊**

在左側選單可見的畫面上，不顯示「課程」區段。

*預設值：`true`*

### `multiple_access_url_show_shared_course_marker`

**顯示多 URL 共享課程標記**

為在 URL 之間共享的課程新增連結圖示，讓使用者（特別是教師）知道編輯課程內容時需特別注意。

*預設值：`false`*

### `my_courses_show_courses_in_user_language_only`

**僅顯示使用者語言的課程**

啟用時，此選項將隱藏所有未設定為使用者語言的課程。

*預設值：`false`*

---
### `profiling_filter_adding_users`

**在課程訂閱時依據個人檔案欄位篩選使用者**

允許教師在將使用者訂閱至課程的頁面中，依據額外欄位篩選使用者。

*預設值：`false`*


### `resource_sequence_show_dependency_in_course_intro`

**在課程簡介中顯示依賴關係**

當使用資源排序功能於課程或工作坊時，在課程首頁顯示課程的依賴關係。

*預設值：`false`*

### `scorm_cumulative_session_time`

**SCORM 的累計工作坊時間**

啟用時，SCORM 學習路徑的工作坊時間將為累計時間，否則僅計算自上次更新時間起。此為全域設定。用於建立新的學習路徑，但之後可針對每個學習路徑重新定義。

*預設值：`true`*


### `send_email_to_admin_when_create_course`

**課程建立時發送電子郵件警示**

每次教師建立新課程時，向平台管理員發送電子郵件

*預設值：`false`*


### `show_course_duration`

**顯示課程持續時間**

在課程目錄和課程清單中，於課程標題旁顯示課程持續時間。

*預設值：`false`*

### `show_navigation_menu`

**顯示課程導航選單**

顯示導航選單，以加速存取工具

*預設值：`false`*


### `show_toolshortcuts`

**工具捷徑**

在橫幅中顯示工具捷徑？

*預設值：`false`*

### `student_view_enabled`

**啟用學習者檢視**

啟用學習者檢視，允許教師或管理員以學習者視角檢視課程

*預設值：`true`*


### `view_grid_courses`

**以格狀版面檢視課程**

以每行多個課程的格狀版面檢視課程。否則，每行僅顯示一個課程。

*預設值：`true`*