# 課程期設定

**課程期（Sessions）** 的預設值與行為——課程期生命週期、導師存取時段、課程期內課程可見性等。

可於 **管理 > 組態設定 > 課程期** 存取這些設定。此類別包含 **68 項設定**，以下列出平台設定 fixtures（`SettingsCurrentFixtures.php`）中隨附的標題與說明。

> 程式碼中的變數名稱以等寬字體顯示。透過 API 撰寫指令碼，或需以編輯 [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) 的方式在全域層級變更這些設定時，請使用該名稱。

## 設定

### `add_users_by_coach`

**允許導師註冊使用者**

導師可在平台上建立使用者，並將使用者訂閱至課程期。

*預設值：`false`*

### `allow_career_diagram`

**啟用職涯圖**

職涯圖可讓您顯示職涯、技能與課程的圖表。

*預設值：`false`*


### `allow_career_users`

**為使用者啟用職涯圖**

若已啟用職涯圖，僅在您啟用此選項時，使用者才能看見職涯圖（且僅能看見與其學業對應的圖表）。

*預設值：`false`*

### `allow_coach_to_edit_course_session`

**允許導師在課程期課程內編輯**

允許導師在課程期課程內編輯

*預設值：`true`*

### `allow_delete_user_for_session_admin`

**課程期管理員可刪除使用者**

課程期管理員在管理其所屬課程期時，可自平台移除使用者。

*預設值：`false`*


### `allow_disable_user_for_session_admin`

**課程期管理員可停用使用者**

課程期管理員可停用使用者帳號以防止登入，同時保留其所屬課程期中的註冊紀錄。

*預設值：`false`*


### `allow_edit_tool_visibility_in_session`

**允許在課程期中編輯工具可見性**

使用課程期時，預設行為是沿用基礎課程中定義的工具可見性。此設定會改變該行為，允許課程期課程中的導師依需求調整工具可見性。

*預設值：`true`*

### `allow_redirect_to_session_after_inscription_about`

**於課程期「關於」頁面完成註冊後重新導向至課程期**

新使用者透過課程期的「關於」頁面完成註冊後，自動重新導向至其課程期頁面。

*預設值：`false`*


### `allow_search_diagnostic`

**啟用課程期搜尋診斷**

允許導師取得診斷結果，以便為學習者搜尋最適合的課程期。

*預設值：`false`*


### `allow_session_admin_extra_access`

**課程期管理員可存取批次使用者匯入、更新與匯出**

課程期管理員除標準權限外，還可存取批次使用者匯入、更新與匯出功能。

*預設值：`false`*


### `allow_session_admin_login_as_teacher`

**課程期管理員可以「以教師身分登入」**

課程期管理員可模擬教師帳號，以預覽其所屬課程期內的課程內容與學生體驗。

*預設值：`false`*


### `allow_session_admin_read_careers`

**課程期管理員可檢視職涯**

[推斷] 課程期管理員可檢視並存取與其管理之課程期相關的職涯路徑與晉升工作流程。

*預設值：`false`*


### `allow_session_admins_to_manage_all_sessions`

**允許課程期管理員查看所有課程期**

未啟用此選項時（預設），課程期管理員僅能看到自己建立的課程期。在開放環境中，若課程期管理員需要在兩個課程期之間分攤支援時間，這會造成困擾。

*預設值：`false`*

### `allow_session_course_copy_for_teachers`

**允許教師進行課程期對課程期的複製**

啟用此選項可讓教師將某個課程期中某一課程的內容複製到另一課程期中的課程。預設情況下，此選項僅平台管理員可用。

*預設值：`false`*

### `allow_teachers_to_create_sessions`

**允許教師建立課程期**

教師可建立、編輯並刪除自己的課程期。

*預設值：`false`*

### `allow_tutors_to_assign_students_to_session`

**導師可將學生指派至課程期**

啟用後，課程期中的課程導師可將新使用者訂閱至其課程期。否則此選項僅管理員與課程期管理員可用。

*預設值：`false`*

### `allow_user_session_collabsable`

**允許使用者在「我的課程期」中摺疊課程期**

使用者可在「我的課程期」頁面摺疊課程期卡片或群組，以減少視覺雜訊並改善導覽。

*預設值：`false`*


### `assignment_base_course_teacher_access_to_all_session`

**基礎課程教師可查看所有課程期的作業**

在基礎課程的 work/pending.php 頁面顯示所有學習者作品（來自基礎課程以及所有課程期）。

*預設值：`false`*

### `career_diagram_disclaimer`

**在職涯圖表下方顯示免責聲明**

在職涯圖表下方新增免責聲明。您的子語言中必須存在名為「Career diagram disclaimer」的語言變數。

*預設值：`false`*

### `career_diagram_legend`

**在職涯圖表下方顯示圖例**

在職涯圖表下方新增職涯圖例。您的子語言中必須存在名為「Career diagram legend」的語言變數。

*預設值：`false`*

### `courses_list_session_title_link`

**工作階段標題的連結類型**

在課程／工作階段頁面上，工作階段標題可為下列其中一種：0 = 無連結（隱藏工作階段標題）；1 = 將標題連結至特殊工作階段頁面；2 = 若僅有一門課程則連結至該課程；3 = 工作階段標題可使課程清單可摺疊；4 = 無連結（顯示工作階段標題）。

*預設值：`1`*

### `default_session_list_view`

**預設工作階段清單檢視**

選擇以管理員身分開啟工作階段清單時，預設要看到的分頁。

*預設值：`all`*


### `drh_can_access_all_session_content`

**人力資源主管可存取所有工作階段內容**

若啟用，人力資源主管將可存取其追蹤之工作階段中的所有內容與使用者。

*預設值：`true`*

### `duplicate_specific_session_content_on_session_copy`

**啟用將工作階段專屬內容複製到另一個工作階段**

允許在複製工作階段時，一併複製於該工作階段中建立的資源。

*預設值：`false`*


### `email_template_subscription_to_session_confirmation_lost_password`

**在訂閱工作階段的電子郵件通知中加入重設密碼連結**

在使用者被註冊至工作階段時所發送的訂閱確認電子郵件中，包含密碼重設連結。

*預設值：`false`*


### `email_template_subscription_to_session_confirmation_username`

**在訂閱工作階段的電子郵件通知中加入使用者名稱**

在使用者被註冊至工作階段時所發送的訂閱確認電子郵件中，包含該使用者的使用者名稱。

*預設值：`false`*


### `enable_auto_reinscription`

**啟用自動重新註冊**

啟用或停用課程有效期限到期時的自動重新註冊。相關的 cron 工作亦必須啟用。

*預設值：`false`*


### `enable_session_replication`

**啟用工作階段複製**

啟用或停用自動工作階段複製。相關的 cron 工作亦必須啟用。

*預設值：`false`*


### `extend_rights_for_coach`

**擴充導師權限**

啟用此選項，可讓導師在編輯工具上擁有與培訓者相同的權限

*預設值：`false`*

### `hide_courses_in_sessions`

**隱藏工作階段中的課程清單**

在課程頁面顯示工作階段區塊時，隱藏該工作階段內的課程清單（僅在特定工作階段畫面中顯示）。

*預設值：`false`*

### `hide_reporting_session_list`

**在報表工具中隱藏工作階段清單**

包含該課程的工作階段會列於課程本身的報表工具中，若同一課程用於數百個工作階段，可能造成相當大的負擔。此選項會移除該清單。

*預設值：`false`*


### `hide_search_form_in_session_list`

**在工作階段清單中隱藏搜尋表單**

從管理介面的工作階段清單檢視中移除搜尋輸入欄位。

*預設值：`false`*


### `hide_session_graph_in_my_progress`

**在「我的進度」中隱藏工作階段圖表**

從學習者儀表板的「我的進度」頁面隱藏工作階段進度圖表與視覺化內容。

*預設值：`false`*


### `hide_tab_list`

**隱藏工作階段頁面上的分頁**

從工作階段詳細頁面移除導覽分頁，以簡化介面。

### `limit_session_admin_list_users`

**禁止工作階段管理員存取使用者清單**

防止工作階段管理員在管理介面中存取全域使用者清單。

*預設值：`false`*


### `limit_session_admin_role`

**限制工作階段管理員權限**

若啟用，工作階段管理員將僅能看到「使用者」區塊中的「新增使用者」選項，以及「工作階段」區塊中的「工作階段清單」選項。

*預設值：`false`*

### `my_courses_session_order`

**變更「我的工作階段」中工作階段的預設排序**

預設情況下，工作階段依開始日期排序。可提供類型為 ['field' => 'end_date', 'order' => 'desc'] 的陣列來變更此設定。

### `my_courses_view_by_session`

**依工作階段檢視我的課程**

啟用額外的「我的課程」頁面，使工作階段作為課程的一部分顯示，而非相反。

*預設值：`false`*

### `my_progress_session_show_all_courses`

**我的進度：在工作階段中顯示課程詳細資料**

點選工作階段詳細資料時，顯示該工作階段中每門課程的所有詳細資料。

*預設值：`false`*


### `prevent_session_admins_to_manage_all_users`

**防止工作階段管理員管理所有使用者**

啟用此選項後，工作階段管理員在管理頁面中將僅能看到自己所建立的使用者。

*預設值：`false`*

### `remove_session_url`

**隱藏工作階段頁面連結**

從工作階段清單中隱藏通往工作階段頁面的連結。

*預設值：`false`*


### `session_admins_access_all_content`

**工作階段管理員可存取所有課程內容**

工作階段管理員可檢視其工作階段內的所有課程內容，包括受限制或已封存的教材。

*預設值：`false`*

### `session_admins_edit_courses_content`

**工作階段管理員可編輯課程內容**

工作階段管理員可修改指派給其工作階段之課程中的課程內容（文件、練習、工具）。

*預設值：`false`*

### `session_automatic_creation_user_id`

**自動建立之工作階段的建立者 ID**

設定自動建立之工作階段所使用的建立者使用者（以避免將每個工作階段都指派給使用者「1」，該使用者通常為入口網站管理員）。

*預設值：`1`*


### `session_classes_tab_disable`

**停用非管理員在工作階段課程中新增班級**

對非管理員停用在工作階段課程中新增班級的分頁。

*預設值：`false`*


### `session_coach_access_after_duration_end`

**依時長計算的工作階段對導師一律可用**

否則，工作階段導師僅能在有效時長內存取依時長計算的工作階段。

*預設值：`false`*


### `session_course_ordering`

**工作階段課程手動排序**

啟用此選項以允許工作階段管理員手動排列工作階段內的課程順序。若停用，課程將依課程標題字母順序排列。

*預設值：`false`*

### `session_course_users_subscription_limited_to_session_users`

**將課程訂閱限制為僅限該工作階段的使用者**

限制可訂閱至課程工作階段的學生清單。並停用從「工作階段摘要」頁面為使用者註冊所有課程。

*預設值：`false`*


### `session_courses_read_only_mode`

**將工作階段中的課程設為唯讀**

讓教師在透過工作階段開啟時，將部分課程設為唯讀模式。請在課程屬性中勾選「在工作階段中鎖定課程」選項。

*預設值：`false`*


### `session_creation_form_set_extra_fields_mandatory`

**在工作階段建立表單中設定必填額外欄位**

在建立工作階段時要求填寫所列欄位。

### `session_creation_user_course_extra_field_relation_to_prefill`

**以使用者欄位預填工作階段欄位**

使用者額外欄位與工作階段額外欄位之間的對應陣列，以便以符合該使用者資料的內容預填工作階段。

### `session_days_after_coach_access`

**工作階段結束後導師預設可存取天數**

導師在正式工作階段結束日期之後仍可存取該工作階段的預設天數

### `session_days_before_coach_access`

**工作階段開始前導師預設可存取天數**

導師在正式工作階段開始日期之前即可存取該工作階段的預設天數

### `session_import_settings`

**工作階段匯入選項**

在 CSV/XML 工作階段匯入中作為預設參數套用的選項陣列。

### `session_list_order`

**工作階段支援手動排序**

啟用在管理介面的工作階段清單中，透過拖放或類似機制手動重新排列工作階段。

*預設值：`false`*


### `session_list_show_count_users`

**在工作階段清單中顯示使用者人數**

管理員可看到每個工作階段的使用者人數。這會增加工作階段清單的負擔，因此若經常使用，請審慎考慮是否願意承受額外的等待時間。

*預設值：`false`*


### `session_list_view_remaining_days`

**在「我的工作階段」中顯示剩餘天數**

若啟用，「我的工作階段」頁面上的工作階段日期將改為顯示剩餘天數。

*預設值：`false`*

### `session_model_list_field_ordered_by_id`

**在工作階段建立表單中依 id 排序工作階段範本**

[推斷] 在工作階段建立表單的下拉選單中，依工作階段範本的數字 ID 排序，而非依名稱字母順序。

*預設值：`false`*


### `session_multiple_subscription_students_list_avoid_emptying`

**防止在工作階段訂閱時清空已訂閱使用者**

使用將多名學習者訂閱至工作階段時，防止按下提交後取消訂閱不在右側面板中之使用者的一般行為。保留所有使用者。

*預設值：`false`*


### `show_all_sessions_on_my_course_page`

**在「我的課程」頁面顯示所有工作階段**

若啟用，此選項會以日曆檢視顯示該使用者的所有工作階段。

*預設值：`true`*


### `show_session_coach`

**顯示工作階段導師**

在課程清單的工作階段標題方塊中顯示一般工作階段導師姓名

*預設值：`false`*

### `show_session_data`

**顯示工作階段資料標題**

顯示工作階段資料註解

*預設值：`false`*

### `show_session_description`

**顯示工作階段說明**

在已實作此選項之處顯示工作階段說明（工作階段追蹤頁面等）

*預設值：`false`*

### `show_simple_session_info`

**顯示簡易課程期資訊**

在課程期清單中，將導師與日期加入課程期副標題。

*預設值：`true`*


### `show_users_in_active_sessions_in_tracking`

**追蹤中僅顯示進行中課程期的使用者**

在學習者追蹤與報表檢視中，僅顯示目前進行中課程期的使用者。

*預設值：`false`*


### `tracking_columns`

**自訂課程－課程期追蹤欄位**

為下列報表定義欄位陣列：'course_session'、'my_students_lp'、'my_progress_lp'、'my_progress_courses'。

### `user_s_session_duration`

**自動建立課程期的持續時間**

單一使用者、自動建立之課程期的持續天數。到期後，該使用者無法再註冊同一課程（不會再建立其他課程期）。

*預設值：`1095`*


### `user_session_display_mode`

**「我的課程期」顯示模式**

選擇「我的課程期」頁面的顯示方式：現代視覺區塊（卡片）檢視，或傳統清單樣式。

*預設值：`list`*