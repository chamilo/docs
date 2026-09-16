# 工作流程設定

跨領域的工作流程開關——課程建立、註冊驗證、作業工作流程等。

可於 **管理 > 組態設定 > 工作流程** 存取這些設定。此類別包含 **23 項設定**，以下列出平台設定 fixtures（`SettingsCurrentFixtures.php`）中隨附的標題與註解。

> 程式碼中的變數名稱以等寬字體顯示。透過 API 撰寫指令碼，或需以全域方式變更這些設定而編輯 [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) 時，請使用該名稱。

## 設定

### `allow_user_course_subscription_by_course_admin`

**允許課程管理員為使用者辦理課程註冊**

啟用此選項後，課程管理員即可在課程內為使用者辦理註冊

*預設值：`true`*


### `allow_users_to_create_courses`

**允許非管理員建立課程**

允許非管理員（教師）在伺服器上建立新課程

*預設值：`false`*


### `allow_working_time_edition`

**啟用課程學習時間編輯**

啟用此功能後，教師可手動更新學習者在課程中所花費的時間。

*預設值：`false`*


### `course_visibility_change_only_admin`

**僅管理員可變更課程可見性**

取消非管理員變更課程可見性的權限。當教師人數過多、難以直接控管時，可見性可能成為問題。強制設定可見性有助於機構更好地管理課程目錄。

*預設值：`false`*


### `default_menu_entry_for_course_or_session`

**課程的預設選單項目**

定義當使用者尚未註冊任何課程或 session 時，「課程」項目下要顯示的預設子元素。

*預設值：`my_courses`*


### `disable_user_conditions_sender_id`

**用於傳送停用帳號通知的內部使用者 ID**

使用「機器人」帳號，在使用者帳號因故被停用時寄送電子郵件，以避免對使用者過於個人化。

*預設值：`0`*


### `disabled_edit_session_coaches_course_editing_course`

**停用編輯課程導師的功能**

停用後，管理員在課程編輯頁面上不會看到可快速將導師指派至 session 課程的連結。

*預設值：`false`*


### `drh_allow_access_to_all_students`

**HRM 可從報表頁面存取所有學生**

[推斷] 授予 HR/DRH 管理員存取平台上所有學習者報表頁面的權限。

*預設值：`false`*


### `gamification_mode`

**遊戲化模式**

啟用學習路徑中的星星成就

### `go_to_course_after_login`

**登入後直接進入課程**

當使用者僅註冊一門課程時，登入後直接進入該課程

*預設值：`false`*


### `load_term_conditions_section`

**載入條款與條件區塊**

法律協議將於登入時或進入課程時顯示。

*預設值：`login`*


### `multiple_url_hide_disabled_settings`

**在子網址中隱藏已停用的設定**

設為是時，若某項設定在主網址中已停用（access_url_changeable 欄位 = 0），則在子網址中完全隱藏該設定

*預設值：`false`*


### `plugin_redirection_enabled`

**啟用重新導向外掛**

僅在您使用 Redirection 外掛時才啟用

*預設值：`false`*


### `redirect_index_to_url_for_logged_users`

**將已驗證使用者的 index.php 重新導向至指定 URL**

若您不想使用首頁（公告、熱門課程等），可在此定義腳本（相對於文件根目錄），使用者嘗試載入首頁時將被重新導向至該處。

### `send_all_emails_to`

**將所有電子郵件傳送至**

提供一份電子郵件地址清單，平台寄出的*所有*電子郵件也會寄送給這些地址。這些地址會作為可見收件者收到郵件。

### `session_admin_user_subscription_search_extra_field_to_search`

**用於搜尋及為 session 命名的額外使用者欄位**

此設定定義額外使用者欄位的鍵（例如 "company"），將用於搜尋使用者，以及在從 /admin-dashboard/register 註冊學生時定義 session 名稱。

### `teacher_can_select_course_template`

**教師可選擇課程作為範本**

允許教師在建立新課程時挑選一門課程作為範本

*預設值：`true`*


### `update_student_expiration_x_date`

**於首次登入時設定到期日**

定義「天」與「月」的陣列，用於在使用者首次登入時設定帳號到期日。

### `user_edition_extra_field_to_check`

**將額外欄位設為註冊為前學習者的觸發條件**

在此提供額外欄位標籤。若任何使用者的此額外欄位被更新，將觸發程序以檢查該使用者對具有相同額外欄位之課程的存取權限。

### `user_number_of_days_for_default_expiration_date_per_role`

**依角色設定的預設到期天數**

一個 role => number 的陣列，代表帳號依角色而定、在到期前可使用的天數。

### `usergroup_do_not_unsubscribe_users_from_course_nor_session_on_user_unsubscribe`

**停用從群組／班級取消訂閱使用者時，一併從課程／期程取消訂閱**

[推斷] 當從群組／班級移除使用者時，不要自動將其從相關課程或期程取消訂閱。

*預設值：`false`*


### `usergroup_do_not_unsubscribe_users_from_course_on_course_unsubscribe`

**停用從群組／班級移除課程時，一併從該課程取消訂閱使用者**

[推斷] 當從群組／班級移除課程時，不要自動將使用者從該課程取消訂閱。

*預設值：`false`*


### `usergroup_do_not_unsubscribe_users_from_session_on_session_unsubscribe`

**停用從群組／班級移除期程時，一併從該期程取消訂閱使用者**

[推斷] 當從群組／班級移除期程時，不要自動將使用者從該期程取消訂閱。

*預設值：`false`*