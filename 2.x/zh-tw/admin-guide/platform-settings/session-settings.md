# 工作階段設定

**工作階段**的預設值與行為 — 工作階段生命週期、導師存取時間窗、課程在工作階段中的可見度，以及類似設定。

在 **管理 > 設定 > 工作階段** 下存取這些設定。此類別包含 **68 個設定**，以下列出平台設定預設資料 (`SettingsCurrentFixtures.php`) 中提供的標題與註解。

> 程式碼中的變數名稱以等寬字體顯示。透過 API 撰寫腳本或需要透過編輯 [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) 在全域層級變更這些設定時，請使用它。

## 設定

### `add_users_by_coach`

**由導師註冊使用者**

導師使用者可建立平台使用者並將使用者訂閱至工作階段。

*預設值：`false`*

### `allow_career_diagram`

**啟用職涯圖表**

職涯圖表可讓您顯示職涯、技能與課程的圖表。

*預設值：`false`*


### `allow_career_users`

**啟用使用者的職涯圖表**

若啟用職涯圖表，使用者僅能在啟用此選項時看到它們（且僅限對應其學習的圖表）。

*預設值：`false`*

### `allow_coach_to_edit_course_session`

**允許導師編輯課程工作階段內部**

允許導師編輯課程工作階段內部

*預設值：`true`*

### `allow_delete_user_for_session_admin`

**工作階段管理員可刪除使用者**

工作階段管理員在管理其工作階段時，可從平台移除使用者。

*預設值：`false`*


### `allow_disable_user_for_session_admin`

**工作階段管理員可停用使用者**

工作階段管理員可停用使用者帳戶，以防止登入同時保留其工作階段中的註冊記錄。

*預設值：`false`*


### `allow_edit_tool_visibility_in_session`

**允許在工作階段中編輯工具可見度**

使用工作階段時，預設行為是使用基底課程中定義的工具可見度。此設定會變更此行為，允許工作階段課程中的導師依需求調整工具可見度。

*預設值：`true`*

### `allow_redirect_to_session_after_inscription_about`

**在工作階段「關於」頁面註冊後重新導向至工作階段**

在新使用者透過工作階段的「關於」頁面完成註冊後，自動重新導向至其工作階段頁面。

*預設值：`false`*


### `allow_search_diagnostic`

**啟用工作階段搜尋診斷**

允許導師取得診斷，讓他們能為學習者搜尋最佳工作階段。

*預設值：`false`*


### `allow_session_admin_extra_access`

**工作階段管理員可存取批次使用者匯入、更新與匯出**

工作階段管理員除標準權限外，還可存取批次使用者匯入、更新與匯出功能。

*預設值：`false`*


### `allow_session_admin_login_as_teacher`

**工作階段管理員可「以教師身分登入」**

工作階段管理員可模擬教師帳戶，以預覽其工作階段中的課程內容與學生體驗。

*預設值：`false`*


### `allow_session_admin_read_careers`

**工作階段管理員可檢視職涯**

[推斷] 工作階段管理員可檢視並存取與其管理工作階段相關的職涯路徑與晉升工作流程。

*預設值：`false`*


### `allow_session_admins_to_manage_all_sessions`

**允許工作階段管理員檢視所有工作階段**

未啟用此選項（預設）時，工作階段管理員僅能看到其建立的工作階段。在開放環境中，工作階段管理員可能需要在兩個工作階段之間分享支援時間，此設定會造成混淆。

*預設值：`false`*

### `allow_session_course_copy_for_teachers`

**允許教師進行工作階段對工作階段的課程複製**

啟用此選項可讓教師將其工作階段中一門課程的內容複製至另一工作階段的課程。預設情況下，此選項僅供平台管理員使用。

*預設值：`false`*

### `allow_teachers_to_create_sessions`

**允許教師建立工作階段**

教師可建立、編輯與刪除其自身工作階段。

*預設值：`false`*

### `allow_tutors_to_assign_students_to_session`

**導師可將學生指派至工作階段**

啟用時，工作階段中的課程導師/導師可將新使用者訂閱至其工作階段。此選項否則僅供管理員與工作階段管理員使用。

*預設值：`false`*

### `allow_user_session_collapsable`

**允許使用者在「我的工作階段」中收合工作階段**

使用者可在「我的工作階段」頁面收合工作階段卡片或群組，以減少視覺雜亂並改善導航。

*預設值：`false`*


### `assignment_base_course_teacher_access_to_all_session`

**基底課程教師可看到所有工作階段的作業**

在基底課程的 work/pending.php 頁面中顯示所有學習者發佈內容（來自基底課程與所有工作階段）。

*預設值：`false`*

---
### `career_diagram_disclaimer`

**在職業圖表下方顯示免責聲明**

在職業圖表下方新增免責聲明。您的子語言中必須存在名為「Career diagram disclaimer」的語言變數。

*預設值：`false`*

### `career_diagram_legend`

**在職業圖表下方顯示圖例**

在職業圖表下方新增職業圖例。您的子語言中必須存在名為「Career diagram legend」的語言變數。

*預設值：`false`*

### `courses_list_session_title_link`

**課程清單中工作階段標題的連結類型**

在課程/工作階段頁面中，工作階段標題可以是以下任一類型：0 = 無連結（隱藏工作階段標題）；1 = 連結至特殊工作階段頁面；2 = 若僅有一門課程，則連結至課程；3 = 工作階段標題使課程清單可摺疊；4 = 無連結（顯示工作階段標題）。

*預設值：`1`*

### `default_session_list_view`

**預設工作階段清單檢視**

選擇以系統管理員身分開啟工作階段清單時要看到的預設索引標籤。

*預設值：`all`*


### `drh_can_access_all_session_content`

**人力資源主管可存取所有工作階段內容**

若啟用，人力資源主管將可存取其所追蹤工作階段的所有內容與使用者。

*預設值：`true`*

### `duplicate_specific_session_content_on_session_copy`

**啟用將工作階段特定內容複製至另一工作階段**

允許在複製工作階段時複製於該工作階段中建立的資源。

*預設值：`false`*


### `email_template_subscription_to_session_confirmation_lost_password`

**在工作階段註冊確認電子郵件通知中新增重設密碼連結**

在使用者註冊工作階段時寄送的註冊確認電子郵件中包含密碼重設連結。

*預設值：`false`*


### `email_template_subscription_to_session_confirmation_username`

**在工作階段註冊確認電子郵件通知中新增使用者名稱**

在使用者註冊工作階段時寄送的註冊確認電子郵件中包含使用者的使用者名稱。

*預設值：`false`*


### `enable_auto_reinscription`

**啟用自動重新註冊**

啟用或停用課程有效期限屆滿時的自動重新註冊。相關的 cron 工作也必須啟用。

*預設值：`false`*


### `enable_session_replication`

**啟用工作階段複製**

啟用或停用自動工作階段複製。相關的 cron 工作也必須啟用。

*預設值：`false`*


### `extend_rights_for_coach`

**擴展導師權限**

啟用此選項將賦予導師與訓練師相同的製作工具權限

*預設值：`false`*

### `hide_courses_in_sessions`

**在工作階段中隱藏課程清單**

在課程頁面顯示工作階段區塊時，隱藏該工作階段內的課程清單（僅在特定工作階段畫面中顯示）。

*預設值：`false`*

### `hide_reporting_session_list`

**在報告工具中隱藏工作階段清單**

包含課程的工作階段會在課程內的報告工具中列出，若同一課程用於數百個工作階段，這可能會增加相當大的負載。此選項會移除該清單。

*預設值：`false`*


### `hide_search_form_in_session_list`

**在工作階段清單中隱藏搜尋表單**

從系統管理介面中的工作階段清單檢視移除搜尋輸入欄位。

*預設值：`false`*


### `hide_session_graph_in_my_progress`

**在「我的進度」中隱藏工作階段圖表**

在學習者儀表板中的「我的進度」頁面隱藏工作階段進度圖表與視覺化圖形。

*預設值：`false`*


### `hide_tab_list`

**在工作階段頁面隱藏索引標籤**

從工作階段詳細頁面移除導航索引標籤以簡化介面。

### `limit_session_admin_list_users`

**禁止工作階段管理員存取使用者清單**

防止工作階段管理員存取系統管理介面中的全域使用者清單。

*預設值：`false`*


### `limit_session_admin_role`

**限制工作階段管理員權限**

若啟用，工作階段管理員僅能看到包含「新增使用者」選項的使用者區塊，以及包含「工作階段清單」選項的工作階段區塊。

*預設值：`false`*

### `my_courses_session_order`

**變更「我的工作階段」中的工作階段預設排序**

預設情況下，工作階段依開始日期排序。可透過提供類似 ['field' => 'end_date', 'order' => 'desc'] 的陣列來變更。

### `my_courses_view_by_session`

**依工作階段檢視我的課程**

啟用額外的「我的課程」頁面，其中工作階段會顯示為課程的一部分，而非相反。

*預設值：`false`*

### `my_progress_session_show_all_courses`

**我的進度：在工作階段中顯示課程詳細資料**

點選工作階段詳細資料時顯示工作階段中每門課程的所有詳細資料。

*預設值：`false`*


### `prevent_session_admins_to_manage_all_users`

**防止工作階段管理員管理所有使用者**

啟用此選項後，工作階段管理員在系統管理頁面中僅能看到其建立的使用者。

*預設值：`false`*

---
### `remove_session_url`

**隱藏工作階段頁面連結**

從工作階段清單中隱藏工作階段頁面的連結。

*預設值：`false`*


### `session_admins_access_all_content`

**工作階段管理員可存取所有課程內容**

工作階段管理員可在他們的工作階段中檢視所有課程內容，包括受限或封存的資料。

*預設值：`false`*

### `session_admins_edit_courses_content`

**工作階段管理員可編輯課程內容**

工作階段管理員可修改指派至他們工作階段的課程內容（文件、測驗、工具）。

*預設值：`false`*

### `session_automatic_creation_user_id`

**自動建立工作階段的建立者 ID**

設定用作自動建立工作階段的建立者使用者（避免將每個工作階段指派給使用者 '1'，該使用者通常為入口網站管理員）。

*預設值：`1`*


### `session_classes_tab_disable`

**停用非管理員在工作階段課程中新增班級**

停用非管理員在工作階段課程中新增班級的分頁。

*預設值：`false`*


### `session_coach_access_after_duration_end`

**依持續時間的工作階段始終供導師存取**

否則，工作階段導師僅在有效持續期間內可存取依持續時間的工作階段。

*預設值：`false`*


### `session_course_ordering`

**工作階段課程手動排序**

啟用此選項以允許工作階段管理員手動排序工作階段內的課程。若停用，則課程依課程標題字母順序排序。

*預設值：`false`*

### `session_course_users_subscription_limited_to_session_users`

**將課程訂閱限制為僅工作階段使用者**

限制課程工作階段中可訂閱的學生清單，並停用「繼續工作階段」頁面中所有課程的使用者註冊。

*預設值：`false`*


### `session_courses_read_only_mode`

**在工作階段中設定課程為唯讀**

允許教師在透過工作階段開啟課程時，將某些課程設定為唯讀模式。在課程屬性中，勾選「在工作階段中鎖定課程」選項。

*預設值：`false`*


### `session_creation_form_set_extra_fields_mandatory`

**在工作階段建立表單中設定必填額外欄位**

在工作階段建立期間要求列出的欄位。

### `session_creation_user_course_extra_field_relation_to_prefill`

**使用使用者欄位預填工作階段欄位**

使用者額外欄位與工作階段額外欄位之間的關聯陣列，以便工作階段可使用符合使用者資料的資料進行預填。

### `session_days_after_coach_access`

**工作階段結束後導師存取預設天數**

導師在官方工作階段結束日期後可存取其工作階段的預設天數

### `session_days_before_coach_access`

**工作階段開始前導師存取預設天數**

導師在官方工作階段開始日期前可存取其工作階段的預設天數

### `session_import_settings`

**工作階段匯入選項**

在 CSV/XML 工作階段匯入中套用為預設參數的選項陣列。

### `session_list_order`

**工作階段支援手動排序**

啟用管理工作階段清單中的手動重新排序，透過拖放或其他類似機制。

*預設值：`false`*


### `session_list_show_count_users`

**在工作階段清單中顯示使用者數量**

管理員可看到每個工作階段的使用者數量。這會增加工作階段清單的額外負載，因此若經常使用，請仔細考量是否需要額外的等待時間。

*預設值：`false`*


### `session_list_view_remaining_days`

**在「我的工作階段」中顯示剩餘天數**

若啟用，「我的工作階段」頁面的工作階段日期將被替換為剩餘天數。

*預設值：`false`*

### `session_model_list_field_ordered_by_id`

**在工作階段建立表單中依 ID 排序工作階段範本**

[推斷] 在工作階段建立表單的下拉選單中，依數值 ID 而非名稱字母順序排序工作階段範本。

*預設值：`false`*


### `session_multiple_subscription_students_list_avoid_emptying`

**防止在工作階段訂閱中清空已訂閱使用者**

使用多位學習者訂閱工作階段時，防止正常行為，即在按下提交時取消訂閱不在右側面板的使用者。保留所有使用者。

*預設值：`false`*


### `show_all_sessions_on_my_course_page`

**在「我的課程」頁面顯示所有工作階段**

若啟用，此選項將以行事曆檢視顯示使用者的所有工作階段。

*預設值：`true`*


### `show_session_coach`

**顯示工作階段導師**

在課程清單的工作階段標題方塊中顯示全域工作階段導師名稱

*預設值：`false`*

### `show_session_data`

**顯示工作階段資料標題**

顯示工作階段資料註解

*預設值：`false`*

### `show_session_description`

**顯示工作階段描述**

在實作此選項的位置顯示工作階段描述（工作階段追蹤頁面等）

*預設值：`false`*

---
### `show_simple_session_info`

**顯示簡易工作區資訊**

在工作區清單中，將導師和日期新增至工作區的副標題。

*預設值：`true`*


### `show_users_in_active_sessions_in_tracking`

**追蹤中僅顯示活躍工作區的使用者**

在學習者追蹤和報告檢視中，僅顯示目前活躍工作區的使用者。

*預設值：`false`*


### `tracking_columns`

**自訂課程-工作區追蹤欄位**

定義以下報告的欄位陣列：'course_session'、'my_students_lp'、'my_progress_lp'、'my_progress_courses'。

### `user_s_session_duration`

**自動建立工作區的持續時間**

單一使用者自動建立工作區的持續時間（以天為單位）。到期後，使用者無法註冊相同課程（不會建立其他工作區）。

*預設值：`1095`*


### `user_session_display_mode`

**我的工作區顯示模式**

選擇「我的工作區」頁面的顯示方式：現代視覺區塊（卡片）檢視或經典清單樣式。

*預設值：`list`*