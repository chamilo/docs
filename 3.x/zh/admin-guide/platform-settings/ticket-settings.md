# 工单设置

**工单**（服务台）系统的行为。

可在 **管理 > 配置设置 > 工单** 下访问这些设置。此分类包含 **7 项设置**，下方列出平台设置固件（`SettingsCurrentFixtures.php`）中附带的标题与说明。

> 代码中的变量名以等宽字体显示。在通过 API 编写脚本，或需要通过编辑 [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) 在全局层面更改这些设置时，请使用该名称。

## 设置

### `show_link_bug_notification`

**显示报告缺陷的链接**

在页眉中显示指向我们支持平台（http://support.chamilo.org）以报告缺陷的链接。点击该链接后，用户将被转到支持平台上描述缺陷报告流程的 wiki 页面。

*默认值：`false`*


### `show_link_ticket_notification`

**显示创建工单的链接**

在门户右侧向用户显示创建工单的链接

*默认值：`false`*


### `ticket_allow_category_edition`

**允许编辑工单分类**

允许管理员编辑分类。

*默认值：`false`*

### `ticket_allow_student_add`

**允许用户添加工单**

允许所有用户（不仅限于管理员）添加工单。

*默认值：`false`*

### `ticket_project_user_roles`

**按角色访问工单项目**

允许特定用户角色访问工单项目。示例：['permissions' => [1 => [17]]，其中 project_id = 1，STUDENT_BOSS = 17。

> 此设置对非管理员用户是必需的：若此处未定义角色映射，则仅管理员可访问支持工单。若要让其他角色访问某个工单项目，请将该角色的 ID 添加到此设置中该项目的权限中。

### `ticket_send_warning_to_all_admins`

**向管理员发送工单警告消息**

若创建的工单没有分类，或某分类未分配任何管理员，则发送消息。

*默认值：`false`*


### `ticket_warn_admin_no_user_in_category`

**若工单分类无人负责则向管理员发送警报**

若某分类未分配用户，则向所有管理员发送警告消息（电子邮件和 Chamilo 消息）。

*默认值：`false`*