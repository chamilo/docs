# 工单设置

**工单**（帮助台）系统的行为设置。

通过 **管理 > 配置设置 > 工单** 访问这些设置。此类别包含 **7 个设置项**，以下列出平台设置固定数据（`SettingsCurrentFixtures.php`）中提供的标题和注释。

> 代码中的变量名以等宽字体显示。在通过 API 进行脚本编写或需要通过编辑 [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) 在全局级别更改这些设置时使用它。

## 设置项

### `show_link_bug_notification`

**显示报告错误的链接**

在页眉中显示一个链接，用于在我们的支持平台（http://support.chamilo.org）上报告错误。点击链接后，用户将被引导至支持平台上的一个 wiki 页面，该页面描述了错误报告流程。

*默认值：`false`*

### `show_link_ticket_notification`

**显示工单创建链接**

在门户右侧向用户显示工单创建链接。

*默认值：`false`*

### `ticket_allow_category_edition`

**允许编辑工单类别**

允许管理员编辑类别。

*默认值：`false`*

### `ticket_allow_student_add`

**允许用户添加工单**

允许所有用户添加工单，而不仅仅是管理员。

*默认值：`false`*

### `ticket_project_user_roles`

**按角色访问工单项目**

允许特定用户角色访问工单项目。例如：['permissions' => [1 => [17]]，其中 project_id = 1，STUDENT_BOSS = 17。

### `ticket_send_warning_to_all_admins`

**向管理员发送工单警告消息**

如果工单创建时未选择类别或类别未分配管理员，则发送消息通知。

*默认值：`false`*

### `ticket_warn_admin_no_user_in_category`

**如果工单类别无人负责，则向管理员发送警报**

如果某个类别未分配用户，则向所有管理员发送警告消息（电子邮件和 Chamilo 消息）。

*默认值：`false`*