# 學習路徑設定

**學習路徑**工具的預設值與行為——自動啟動、預設檢視、先決條件、SCORM 行為等。

可於 **管理 > 組態設定 > 學習路徑** 存取這些設定。此分類包含 **51 項設定**，以下列出平台設定 fixtures（`SettingsCurrentFixtures.php`）中隨附的標題與說明。

> 程式碼中的變數名稱以等寬字體顯示。透過 API 撰寫指令碼，或需以編輯 [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) 的方式在全域層級變更這些設定時，請使用該名稱。

## 設定

### `add_all_files_in_lp_export`

**匯出學習路徑時匯出所有檔案**

匯出學習路徑時，與 HTML 位於同一路徑的所有檔案與資料夾也會一併匯出。

*預設值：`false`*


### `allow_htaccess_import_from_scorm`

**允許來自 SCORM 套件的 .htaccess**

一般而言，在 Chamilo 匯入內容時，所有 .htaccess 檔案都會被過濾並移除。此功能允許在 SCORM 套件中若存在 .htaccess 時予以匯入。

*預設值：`false`*


### `allow_import_scorm_package_in_course_builder`

**課程匯入時一併匯入 SCORM**

啟用後，還原課程時（透過課程維護工具）會複製 SCORM 套件的目錄結構。

*預設值：`false`*


### `allow_lp_chamilo_export`

**以 Chamilo 備份格式匯出學習路徑**

啟用將任一學習路徑匯出為 Chamilo 課程備份格式的功能。

*預設值：`false`*


### `allow_lp_return_link`

**顯示學習路徑返回連結**

停用此選項可隱藏學習路徑中的「返回首頁」按鈕

*預設值：`true`*


### `allow_lp_subscription_to_usergroups`

**班級訂閱學習路徑**

啟用將學習路徑及學習路徑類別訂閱至群組／班級。

*預設值：`false`*


### `allow_session_lp_category`

**可在期程中管理學習路徑類別**

[推斷] 讓學習者與講師能在期程課程中依類別組織並管理學習路徑。

*預設值：`false`*


### `allow_teachers_to_access_blocked_lp_by_prerequisite`

**教師可存取被封鎖的學習路徑**

教師無需完成整個學習路徑，即可存取因先決條件而被封鎖的學習路徑。

*預設值：`false`*


### `disable_js_in_lp_view`

**在學習路徑檢視中停用 JS**

停用 Chamilo 通常會加入學習路徑 HTML 檔案（顯示時）的 JS 檔案。

*預設值：`false`*


### `disable_my_lps_page`

**隱藏「我的學習路徑」頁面**

「我的學習路徑」頁面於 1.11 新增。使用此選項可將其隱藏。

*預設值：`false`*

### `download_files_after_all_lp_finished`

**完成學習路徑後顯示下載按鈕**

完成所有學習路徑後顯示下載檔案按鈕。範例：若 ABC 為課程代碼，1 與 100 為文件 ID，請選擇：['courses' => ['ABC' => [1, 100]]]。

### `force_edit_exercise_in_lp`

**編輯已納入學習路徑的測驗**

即使測驗已納入學習路徑，仍允許編輯。預設行為是若測驗位於學習路徑中則禁止編輯，因為若測驗修改幅度較大，可能影響眾多學習者追蹤資料的一致性。

*預設值：`false`*

### `hide_accessibility_label_on_lp_item`

**隱藏學習路徑中的需求標籤**

隱藏學習路徑項目上的先決條件工具提示。此多半為美觀考量。

*預設值：`true`*

### `hide_lp_time`

**隱藏學習路徑紀錄中的時間**

在一般報表中隱藏學習路徑所花費的時間。

*預設值：`false`*

### `hide_scorm_copy_link`

**隱藏 SCORM 複製**

從學習路徑清單中隱藏「學習路徑複製」圖示

*預設值：`false`*

### `hide_scorm_export_link`

**隱藏 SCORM 匯出**

從學習路徑清單中隱藏「SCORM 匯出」圖示

*預設值：`false`*

### `hide_scorm_pdf_link`

**隱藏學習路徑 PDF 匯出**

從學習路徑清單中隱藏「學習路徑 PDF 匯出」圖示

*預設值：`true`*

### `lp_allow_export_to_students`

**學習者可匯出學習路徑**

啟用此選項以允許學習者將學習路徑下載為 SCORM 套件。

*預設值：`false`*

### `lp_enable_flow`

**在學習路徑之間導覽**

新增選取「下一個」學習路徑的功能，並在學習路徑內顯示按鈕以便從一個路徑移至下一個。

*預設值：`false`*

### `lp_fixed_encoding`

**學習路徑中的固定編碼**

略過對已匯入學習路徑文字編碼的檢查，以降低資源使用。

*預設值：`false`*

### `lp_item_prerequisite_dates`

**以日期為基礎的學習路徑項目先決條件**

新增為學習路徑項目定義含開始與結束日期之先決條件的選項。

*預設值：`false`*

### `lp_menu_location`

**學習路徑選單位置**

將此設定為 'left' 或 'right'，以變更學習路徑選單所在的一側。

*預設值：`left`*

### `lp_minimum_time`

**完成學習路徑的最短時間**

為學習路徑新增最短時間欄位。若使用者在該學習路徑上花費的時間未達此值，則無法完成學習路徑的最後一個項目。

*預設值：`false`*

### `lp_prerequisit_on_quiz_unblock_if_max_attempt_reached`

**若測驗先決條件已達最大嘗試次數則解鎖學習路徑項目**

[推斷] 當學習者對作為先決條件的測驗已用盡最大嘗試次數時，自動解鎖後續的學習路徑項目。


### `lp_prerequisite_on_quiz_unblock_if_max_attempt_reached`

**最後一次測驗嘗試後解鎖先決條件**

允許使用者在用盡作為其他項目先決條件之測驗的所有嘗試次數後，仍可繼續學習路徑。

*預設值：`false`*

### `lp_prerequisite_use_last_attempt_only`

**學習路徑測驗先決條件使用最後一次分數**

當測驗被用作學習路徑中某項目的先決條件時，僅以該測驗的最後一次嘗試作為先決條件驗證（預設為使用最佳嘗試）。

*預設值：`false`*

### `lp_prevents_beforeunload`

**在學習路徑中阻止 beforeunload JS 事件**

透過阻止棘手的 JS 事件執行，有助於瀏覽器相容性。

*預設值：`false`*

### `lp_score_as_progress_enable`

**以學習路徑分數作為進度**

當使用僅含一個大型 SCO 的 SCORM 內容時相當有用。SCORM 不會傳遞進度，因此這是將分數當作進度的變通作法。啟用此選項後，您可依個別學習路徑進行設定。

*預設值：`false`*

### `lp_show_max_progress_instead_of_average`

**學習路徑報表顯示最大進度而非平均值**

[推斷] 依項目完成的最大值計算學習路徑進度，而非對所有項目取平均。

*預設值：`false`*

### `lp_show_max_progress_or_average_enable_course_level_redefinition`

**在課程層級選擇學習路徑顯示最大進度或平均值**

允許在課程層級重新定義設定，使學習路徑報表顯示最佳進度而非平均值。

*預設值：`false`*

### `lp_show_reduced_report`

**學習路徑：顯示精簡報表**

在學習路徑工具中，當使用者檢視自己的進度（透過統計圖示）時，顯示較精簡（較少細節）的進度報表。

*預設值：`false`*

### `lp_start_and_end_date_visible_in_student_view`

**向學習者顯示學習路徑可用期間**

向學習者顯示學習路徑及其可用日期，而非在日期到來前將其隱藏。

*預設值：`false`*

### `lp_subscription_settings`

**學習路徑訂閱設定**

設定學習路徑訂閱功能的額外選項。選項包括 'allow_add_users_to_lp' 與 'allow_add_users_to_lp_category'。

### `lp_view_accordion`

**可摺疊的學習路徑項目**

[推斷] 以可摺疊的手風琴格式顯示學習路徑項目，以改善導覽與內容組織。

*預設值：`false`*

### `lp_view_settings`

**學習路徑顯示設定**

設定學習路徑顯示的額外選項。選項包括 'show_reporting_icon'、'hide_lp_arrow_navigation'、'show_toolbar_by_default'、'navigation_in_the_middle' 與 'add_extra_quit_to_home_icon'。

### `scorm_api_extrafield_to_use_as_student_id`

**在 SCORM 通訊中使用額外欄位作為 student\_id**

指定要作為所有 SCORM 通訊中 student_id 使用的額外欄位名稱。

### `scorm_api_username_as_student_id`

**在 SCORM 通訊中使用使用者名稱作為 student\_id**

[推斷] 在 SCORM API 通訊中使用學習者使用者名稱作為學生識別碼，而非學習者 ID。

*預設值：`false`*

### `scorm_lms_update_sco_status_all_time`

**自主更新 SCO 狀態**

若 SCO 未傳送狀態，則由系統接手，並依 Chamilo 中可觀察到的情況更新狀態。

*預設值：`false`*

### `scorm_upload_from_cache`

**從快取目錄上傳 SCORM**

允許管理員將 SCORM 套件（zip 形式）上傳至快取目錄，並在 SCORM 上傳頁面將其作為匯入來源使用。

*預設值：`false`*

### `show_hidden_exercise_added_to_lp`

**即使不可見也顯示來自學習路徑的測驗**

在測驗清單中顯示已加入學習路徑的隱藏測驗。若處於工作階段中，該測驗在基礎課程中為不可見、已包含於學習路徑中，且未特別將顯示設定設為 true，則將其隱藏。

*預設值：`true`*

### `show_invisible_exercise_in_lp_list`

**即使不可見也在學習路徑測驗清單中顯示測驗**

[推斷] 檢視學習路徑內容時，將隱藏測驗納入可用測驗清單。

*預設值：`false`*

### `show_invisible_exercise_in_lp_toc`

**學習路徑中顯示隱藏測驗**

使測驗工具中標記為「隱藏」的測驗，在被納入學習路徑時仍會顯示。

*預設值：`false`*

### `show_invisible_lp_in_course_home`

**學習路徑設為隱藏時仍在課程首頁顯示連結**

若學習路徑已設為隱藏，但教師／助教決定從課程首頁提供該路徑，此選項可避免 Chamilo 隱藏課程首頁上的連結。

*預設值：`false`*

### `show_prerequisite_as_blocked`

**學習路徑的先修條件**

在學習路徑清單中顯示視覺元素，以表示其他學習路徑目前因先修條件規則而被封鎖。

*預設值：`false`*

### `student_follow_page_add_lp_acquisition_info`

**在學習者追蹤頁面新增習得欄**

在學習者追蹤頁面新增欄位，顯示學習者在學習路徑上的習得狀態。

*預設值：`false`*

### `student_follow_page_add_lp_invisible_checkbox`

**在學習者追蹤頁面新增學習路徑可見性資訊**

[推斷] 在學習者進度追蹤頁面上顯示學習路徑的可見性狀態指示。

*預設值：`false`*

### `student_follow_page_add_LP_subscription_info`

**學習路徑清單中的解鎖資訊**

若學習者已訂閱該學習路徑並可存取，則在學習路徑清單中新增「已解鎖」欄。

*預設值：`false`*

### `student_follow_page_hide_lp_tests_average`

**在學習者追蹤中隱藏學習路徑測驗平均的百分比符號**

在學生追蹤的「學習路徑測驗平均」指示中隱藏百分比圖示。

*預設值：`false`*

### `student_follow_page_include_not_subscribed_lp_students`

**在學習者追蹤頁面包含未訂閱的學習路徑**

[推斷] 即使學習者未訂閱，仍在進度頁面上顯示學習路徑。

*預設值：`false`*

### `ticket_lp_quiz_info_add`

**在工單回報中新增學習路徑與測驗資訊**

[推斷] 在支援工單回報中納入學習路徑與測驗資訊，以便更完善地追蹤問題。

*預設值：`false`*

### `validate_lp_prerequisite_from_other_session`

**使用其他期次的學習路徑項目狀態**

若對應項目已在另一個期次完成，則允許使用者完成學習路徑中的先修條件。

*預設值：`false`*