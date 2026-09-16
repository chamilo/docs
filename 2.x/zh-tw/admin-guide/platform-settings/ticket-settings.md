# 票務設定

**Tickets**（服務台）系統的行為。

在 **Administration > Configuration settings > Tickets** 下存取這些設定。此類別包含 **7 個設定**，以下列出平台設定預設值（`SettingsCurrentFixtures.php`）中提供的標題和註解。

> 程式碼中的變數名稱以等寬字體顯示。當透過 API 進行腳本編寫，或需要透過編輯 [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) 在全域層級變更這些設定時，請使用它。

## 設定

### `show_link_bug_notification`

**顯示回報錯誤連結**

在標頭中顯示回報錯誤至我們支援平台的連結（http://support.chamilo.org）。點擊連結時，使用者將被導向支援平台上的 wiki 頁面，該頁面描述錯誤回報流程。

*預設值：`false`*


### `show_link_ticket_notification`

**顯示票務建立連結**

在入口網站右側向使用者顯示票務建立連結

*預設值：`false`*


### `ticket_allow_category_edition`

**允許票務類別編輯**

允許管理員編輯類別。

*預設值：`false`*

### `ticket_allow_student_add`

**允許使用者新增票務**

允許所有使用者新增票務，而不僅限於管理員。

*預設值：`false`*

### `ticket_project_user_roles`

**票務專案依角色存取**

允許票務專案由特定使用者角色存取。例如：['permissions' => [1 => [17]]，其中 project_id = 1，STUDENT_BOSS = 17。

### `ticket_send_warning_to_all_admins`

**向管理員發送票務警告訊息**

如果票務未指定類別，或類別未指派任何管理員，則發送訊息。

*預設值：`false`*


### `ticket_warn_admin_no_user_in_category`

**如果票務類別無負責人，向管理員發送警示**

如果類別未指派使用者，則向所有管理員發送警告訊息（電子郵件和 Chamilo 訊息）。

*預設值：`false`*