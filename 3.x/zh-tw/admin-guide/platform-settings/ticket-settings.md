# 工單設定

**工單**（客服／服務台）系統的行為。

可於 **管理 > 組態設定 > 工單** 存取這些設定。此類別包含 **7 項設定**，以下列出平台設定 fixtures（`SettingsCurrentFixtures.php`）中隨附的標題與說明。

> 程式碼中的變數名稱以等寬字體顯示。透過 API 撰寫指令碼，或需以編輯 [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) 的方式在全域層級變更這些設定時，請使用該名稱。

## 設定

### `show_link_bug_notification`

**顯示回報錯誤的連結**

在頁首顯示連結，以便在我們的支援平台（http://support.chamilo.org）上回報錯誤。點選該連結後，使用者會被導向支援平台上說明錯誤回報流程的 wiki 頁面。

*預設：`false`*


### `show_link_ticket_notification`

**顯示建立工單的連結**

在入口網站右側向使用者顯示建立工單的連結

*預設：`false`*


### `ticket_allow_category_edition`

**允許編輯工單類別**

允許管理員編輯類別。

*預設：`false`*

### `ticket_allow_student_add`

**允許使用者新增工單**

允許所有使用者新增工單，而不僅限管理員。

*預設：`false`*

### `ticket_project_user_roles`

**依角色存取工單專案**

允許特定使用者角色存取工單專案。範例：['permissions' => [1 => [17]]，其中 project_id = 1，STUDENT_BOSS = 17。

> 此設定對非管理員使用者為必要：若此處未定義角色對應，則僅管理員可存取支援工單。若要讓任何其他角色存取某個工單專案，請將該角色 ID 加入此設定中該專案的 permissions。

### `ticket_send_warning_to_all_admins`

**將工單警告訊息傳送給管理員**

若工單建立時未指定類別，或類別未指派任何管理員，則傳送訊息。

*預設：`false`*


### `ticket_warn_admin_no_user_in_category`

**若工單類別無人負責則向管理員發送警示**

若類別未指派使用者，則向所有管理員發送警告訊息（電子郵件與 Chamilo 訊息）。

*預設：`false`*