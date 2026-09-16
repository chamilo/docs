# 學習路徑設定

**學習路徑** 工具的預設值和行為 — 自動啟動、預設檢視、先決條件、SCORM 行為等。

在 **Administration > Configuration settings > Learning Paths** 下存取這些設定。此類別包含 **51 個設定**，以下列出平台設定預設資料 (`SettingsCurrentFixtures.php`) 中提供的標題和註解。

> 程式碼中的變數名稱以等寬字體顯示。使用 API 進行腳本編寫或需要透過編輯 [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) 在全域層級變更這些設定時，請使用它。

## 設定

### `add_all_files_in_lp_export`

**匯出學習路徑時匯出所有檔案**

匯出 LP 時，與 html 相同路徑中的所有檔案和資料夾也會被匯出。

*預設值：`false`*


### `allow_htaccess_import_from_scorm`

**允許從 SCORM 套件匯入 .htaccess**

通常，在 Chamilo 匯入內容時，所有 .htaccess 檔案都會被過濾並移除。此功能允許如果 SCORM 套件中存在 .htaccess，則匯入它。

*預設值：`false`*


### `allow_import_scorm_package_in_course_builder`

**課程匯入中的 SCORM 匯入**

啟用在還原課程（從課程維護工具）時複製 SCORM 套件的目錄結構。

*預設值：`false`*


### `allow_lp_chamilo_export`

**以 Chamilo 備份格式匯出學習路徑**

啟用將課程中的任何學習路徑匯出為 Chamilo 課程備份格式的可能性。

*預設值：`false`*


### `allow_lp_return_link`

**顯示學習路徑返回連結**

停用此選項以隱藏學習路徑中的「返回首頁」按鈕

*預設值：`true`*


### `allow_lp_subscription_to_usergroups`

**班級的學習路徑訂閱**

啟用群組/班級對學習路徑和學習路徑類別的訂閱。

*預設值：`false`*


### `allow_session_lp_category`

**工作坊中可管理學習路徑類別**

[inferred] 啟用學習者和教師在工作坊課程中透過類別組織和管理學習路徑。

*預設值：`false`*


### `allow_teachers_to_access_blocked_lp_by_prerequisite`

**教師可存取被先決條件封鎖的學習路徑**

教師無需完成學習路徑即可存取被先決條件封鎖的學習路徑。

*預設值：`false`*


### `disable_js_in_lp_view`

**在學習路徑檢視中停用 JS**

停用 Chamilo 通常新增至學習路徑中 HTML 檔案的 JS 檔案（在顯示它們時）。

*預設值：`false`*


### `disable_my_lps_page`

**隱藏「我的學習路徑」頁面**

「我的學習路徑」頁面在 1.11 中新增。使用此選項隱藏它。

*預設值：`false`*

### `download_files_after_all_lp_finished`

**完成所有學習路徑後的下載按鈕**

完成所有 LP 後顯示下載檔案按鈕。例如：如果 ABC 是課程代碼，且 1 和 100 是文件 ID，請選擇：['courses' => ['ABC' => [1, 100]]]。

### `force_edit_exercise_in_lp`

**學習路徑中包含測驗的編輯**

即使測驗已包含在學習路徑中，也啟用編輯測驗。預設情況下，如果測驗在學習路徑中，則防止編輯，因為如果測驗修改重大，可能會影響多位學習者的追蹤一致性。

*預設值：`false`*

### `hide_accessibility_label_on_lp_item`

**在學習路徑中隱藏需求標籤**

隱藏學習路徑項目上的先決條件工具提示。這主要是美學選擇。

*預設值：`true`*

### `hide_lp_time`

**從學習路徑記錄中隱藏時間**

在一般報告中隱藏學習路徑花費的時間。

*預設值：`false`*

### `hide_scorm_copy_link`

**隱藏 SCORM 複製**

從學習路徑清單中隱藏學習路徑複製圖示

*預設值：`false`*

### `hide_scorm_export_link`

**隱藏 SCORM 匯出**

從學習路徑清單中隱藏 SCORM 匯出圖示

*預設值：`false`*

### `hide_scorm_pdf_link`

**隱藏學習路徑 PDF 匯出**

從學習路徑清單中隱藏學習路徑 PDF 匯出圖示

*預設值：`true`*

### `lp_allow_export_to_students`

**學習者可匯出學習路徑**

啟用此功能以允許學習者將學習路徑下載為 SCORM 套件。

*預設值：`false`*

### `lp_enable_flow`

**在學習路徑之間導航**

新增選擇「下一個」學習路徑的可能性，並在學習路徑內顯示按鈕以從一個移至下一個。

*預設值：`false`*

### `lp_fixed_encoding`

**學習路徑中的固定編碼**

透過忽略匯入學習路徑中的文字編碼檢查來減少資源使用量。

*預設值：`false`*

### `lp_item_prerequisite_dates`

**基於日期的學習路徑項目先決條件**

新增為學習路徑項目定義具有開始和結束日期的先決條件的選項。

*預設值：`false`*

---

---
### `lp_menu_location`

**學習路徑選單位置**

將此設定為 'left' 或 'right' 以變更學習路徑選單的位置。

*預設：`left`*

### `lp_minimum_time`

**完成學習路徑的最短時間**

在學習路徑中新增最短時間欄位。如果使用者在學習路徑上未花費足夠時間，則學習路徑的最後項目無法完成。

*預設：`false`*

### `lp_prerequisit_on_quiz_unblock_if_max_attempt_reached`

**如果先決測驗達到最大嘗試次數則解鎖學習路徑項目**

[inferred] 當學習者用盡先決測驗的最大嘗試次數時，自動解鎖後續學習路徑項目。

### `lp_prerequisite_on_quiz_unblock_if_max_attempt_reached`

**最後一次測驗嘗試後解鎖先決條件**

允許使用者在用盡用作其他項目先決條件的測驗嘗試次數後繼續學習路徑。

*預設：`false`*

### `lp_prerequisite_use_last_attempt_only`

**學習路徑測驗先決條件使用最後一次分數**

當測驗用作學習路徑中項目的先決條件時，僅使用測驗的最後一次嘗試作為先決條件的驗證（預設為使用最佳嘗試）。

*預設：`false`*

### `lp_prevents_beforeunload`

**在學習路徑中防止 beforeunload JS 事件**

這有助於瀏覽器相容性，防止棘手的 JS 事件執行。

*預設：`false`*

### `lp_score_as_progress_enable`

**使用學習路徑分數作為進度**

這在僅使用一個大型 SCO 的 SCORM 內容時很有用。SCORM 不傳遞進度，因此這是用分數作為進度的技巧。啟用此選項將允許您在每個學習路徑基礎上配置此設定。

*預設：`false`*

### `lp_show_max_progress_instead_of_average`

**學習路徑報告顯示最大進度而非平均值**

[inferred] 根據最大項目完成度計算學習路徑進度，而非平均所有項目。

*預設：`false`*

### `lp_show_max_progress_or_average_enable_course_level_redefinition`

**課程層級選擇學習路徑的最大進度與平均值**

啟用在課程層級重新定義顯示最佳進度而非平均值的報告設定。

*預設：`false`*

### `lp_show_reduced_report`

**學習路徑：顯示簡化報告**

在學習路徑工具中，當使用者檢視自身進度（透過統計圖示）時，顯示進度報告的縮短（較不詳細）版本。

*預設：`false`*

### `lp_start_and_end_date_visible_in_student_view`

**向學習者顯示學習路徑可用性**

向學習者顯示學習路徑及其可用日期，而非在日期到來前隱藏它們。

*預設：`false`*

### `lp_subscription_settings`

**學習路徑訂閱設定**

配置學習路徑訂閱功能的額外選項。選項包括 'allow_add_users_to_lp' 和 'allow_add_users_to_lp_category'。

### `lp_view_accordion`

**可摺疊學習路徑項目**

[inferred] 以可摺疊手風琴格式顯示學習路徑項目，以改善導航和內容組織。

*預設：`false`*

### `lp_view_settings`

**學習路徑顯示設定**

配置學習路徑顯示的額外選項。選項包括 'show_reporting_icon'、'hide_lp_arrow_navigation'、'show_toolbar_by_default'、'navigation_in_the_middle' 和 'add_extra_quit_to_home_icon'。

### `scorm_api_extrafield_to_use_as_student_id`

**在 SCORM 通訊中使用額外欄位作為 student\_id**

提供用作所有 SCORM 通訊中 student_id 的額外欄位名稱。

### `scorm_api_username_as_student_id`

**在 SCORM 通訊中使用使用者名稱作為 student\_id**

[inferred] 在 SCORM API 通訊中使用學習者使用者名稱作為學生識別碼，而非學習者 ID。

*預設：`false`*

### `scorm_lms_update_sco_status_all_time`

**自主更新 SCO 狀態**

如果 SCO 未傳送狀態，則接管並根據在 Chamilo 中可觀察到的內容更新狀態。

*預設：`false`*

### `scorm_upload_from_cache`

**從快取目錄上傳 SCORM**

允許管理員將 SCORM 套件（zip 格式）上傳至快取目錄，並在 SCORM 上傳頁面將其用作匯入來源。

*預設：`false`*

### `show_hidden_exercise_added_to_lp`

**即使隱藏也顯示新增至學習路徑的測驗**

在測驗清單中顯示新增至 LP 的隱藏測驗。如果處於工作階段、測驗在基礎課程中為隱藏、包含在 LP 中且未明確設定顯示，則隱藏它。

*預設：`true`*

### `show_invisible_exercise_in_lp_list`

**即使隱藏也顯示學習路徑測驗清單中的測驗**

[inferred] 在檢視學習路徑內容時，將隱藏測驗包含在可用測驗清單中。

*預設：`false`*

---

---
### `show_invisible_exercise_in_lp_toc`

**學習路徑目錄中顯示隱藏測驗**

使在測驗工具中標記為「隱藏」的測驗在包含於學習路徑時顯示。

*預設：`false`*

### `show_invisible_lp_in_course_home`

**課程首頁顯示隱藏學習路徑連結**

如果學習路徑設定為隱藏，但教師/導師決定從課程首頁提供存取，此選項可防止 Chamilo 在課程首頁隱藏該連結。

*預設：`false`*

### `show_prerequisite_as_blocked`

**學習路徑的前置條件**

在學習路徑清單中，顯示視覺元素以表示其他學習路徑目前因某些前置條件規則而被封鎖。

*預設：`false`*

### `student_follow_page_add_LP_acquisition_info`

**在學習者追蹤中新增取得狀態欄位**

在學習者追蹤頁面新增欄位，以顯示學習者在學習路徑上的取得狀態。

*預設：`false`*

### `student_follow_page_add_LP_invisible_checkbox`

**在學習者追蹤頁面新增學習路徑可見性資訊**

[inferred] 在學習者進度追蹤頁面顯示學習路徑的可見性狀態指示器。

*預設：`false`*

### `student_follow_page_add_LP_subscription_info`

**學習路徑清單中的解鎖資訊**

如果學習者已訂閱給定的學習路徑並有存取權限，此設定會在學習路徑清單中新增「已解鎖」欄位。

*預設：`false`*

### `student_follow_page_hide_lp_tests_average`

**在學習者追蹤中隱藏學習路徑測驗平均值的百分比符號**

隱藏學生追蹤中「學習路徑測驗平均值」指示的百分比圖示。

*預設：`false`*

### `student_follow_page_include_not_subscribed_lp_students`

**在學習者追蹤頁面包含未訂閱的學習路徑**

[inferred] 即使學習者未訂閱，也在進度頁面顯示學習路徑。

*預設：`false`*

### `ticket_lp_quiz_info_add`

**在支援票證回報中新增學習路徑和測驗資訊**

[inferred] 在支援票證回報中包含學習路徑和測驗資訊，以利更好的問題追蹤。

*預設：`false`*

### `validate_lp_prerequisite_from_other_session`

**使用其他課程期間的學習路徑項目狀態驗證前置條件**

允許使用者在學習路徑中完成前置條件，如果對應項目已在另一課程期間完成。

*預設：`false`*