# 工作流程設定

跨領域工作流程切換 — 課程建立、註冊驗證、作業工作流程等類似功能。

可在 **管理 > 設定 > 工作流程** 下存取這些設定。此類別包含 **23 個設定**，以下列出平台設定預設值 (`SettingsCurrentFixtures.php`) 中提供的標題與註解。

> 程式碼中的變數名稱以等寬字體顯示。透過 API 撰寫腳本或需全域編輯這些設定時，請使用它，並編輯 [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml)。

## 設定

### `allow_user_course_subscription_by_course_admin`

**允許課程管理員訂閱使用者至課程**

啟用此選項將允許課程管理員在課程內訂閱使用者

*預設值：`true`*


### `allow_users_to_create_courses`

**允許非管理員建立課程**

允許非管理員（教師）在伺服器上建立新課程

*預設值：`false`*


### `allow_working_time_edition`

**啟用課程工作時間編輯**

啟用此功能，讓教師手動更新學習者在課程中花費的時間。

*預設值：`false`*


### `course_visibility_change_only_admin`

**僅限管理員變更課程可見度**

移除非管理員變更課程可見度的可能性。當教師數量過多難以直接控制時，可見度可能成為問題。強制可見度可讓組織更好地管理課程目錄。

*預設值：`false`*


### `default_menu_entry_for_course_or_session`

**課程的預設選單項目**

定義使用者未註冊任何課程或工作坊時，「課程」項目的預設子項目。

*預設值：`my_courses`*


### `disable_user_conditions_sender_id`

**用於傳送停用帳號通知的使用者內部 ID**

避免對使用者過於個人化，當使用者帳號因某原因被停用時，使用「機器人」帳號傳送電子郵件給使用者。

*預設值：`0`*


### `disabled_edit_session_coaches_course_editing_course`

**停用編輯課程教練功能**

停用時，管理員在課程編輯頁面上不會有快速指派教練至工作坊課程的連結。

*預設值：`false`*


### `drh_allow_access_to_all_students`

**HRM 可存取報表頁面中的所有學生**

[推斷] 授予 HR/DRH 經理存取平台所有學習者的報表頁面。

*預設值：`false`*


### `gamification_mode`

**遊戲化模式**

啟用學習路徑中的星星成就

### `go_to_course_after_login`

**登入後直接前往課程**

當使用者註冊單一課程時，登入後直接前往該課程

*預設值：`false`*


### `load_term_conditions_section`

**載入條款條件區段**

法律協議將在登入或進入課程時出現。

*預設值：`login`*


### `multiple_url_hide_disabled_settings`

**在子 URL 中隱藏停用設定**

設為是時，若主 URL（`access_url_changeable` 欄位 = 0）中停用該設定，則在子 URL 中完全隱藏該設定

*預設值：`false`*


### `plugin_redirection_enabled`

**啟用重新導向外掛**

僅在使用 Redirection 外掛時啟用

*預設值：`false`*


### `redirect_index_to_url_for_logged_users`

**將已登入使用者的 index.php 重新導向至指定 URL**

若不希望使用首頁（公告、人氣課程等），可在這裡定義使用者嘗試載入首頁時將被重新導向的腳本（從文件根目錄）。

### `send_all_emails_to`

**傳送所有電子郵件至**

提供一份電子郵件地址清單，平台傳送的*所有*電子郵件將發送至這些地址，作為可見收件人。

### `session_admin_user_subscription_search_extra_field_to_search`

**用於搜尋與命名工作坊的額外使用者欄位**

此設定定義用於搜尋使用者的額外使用者欄位鍵值（例如「company」），並在從 /admin-dashboard/register 註冊學生時定義工作坊名稱。

### `teacher_can_select_course_template`

**教師可選擇課程作為範本**

允許教師在建立新課程時選擇課程作為範本

*預設值：`true`*


### `update_student_expiration_x_date`

**首次登入時設定到期日期**

定義使用者首次登入時設定帳號到期日期的「天數」與「月份」陣列。

### `user_edition_extra_field_to_check`

**設定額外欄位作為前學習者註冊觸發器**

在此提供額外欄位標籤。若任何使用者的此額外欄位更新，將觸發程序檢查該使用者存取具有相同額外欄位的課程。

---
### `user_number_of_days_for_default_expiration_date_per_role`

**依角色設定的預設到期天數**

一個角色 => 數字的陣列，表示帳戶依角色而定的到期前天數。

### `usergroup_do_not_unsubscribe_users_from_course_nor_session_on_user_unsubscribe`

**停用使用者從群組/班級退訂時，從課程或工作坊自動退訂**

[inferred] 當從群組/班級移除使用者時，不要自動將其從相關聯的課程或工作坊退訂。

*預設值：`false`*


### `usergroup_do_not_unsubscribe_users_from_course_on_course_unsubscribe`

**停用課程從群組/班級移除時，使用者從課程自動退訂**

[inferred] 當課程從群組/班級移除時，不要自動將使用者從該課程退訂。

*預設值：`false`*


### `usergroup_do_not_unsubscribe_users_from_session_on_session_unsubscribe`

**停用工作坊從群組/班級移除時，使用者從工作坊自動退訂**

[inferred] 當工作坊從群組/班級移除時，不要自動將使用者從該工作坊退訂。

*預設值：`false`*