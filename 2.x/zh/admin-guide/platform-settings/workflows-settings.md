# 工作流程设置

跨领域的工作流程开关——课程创建、注册验证、作业流程等类似功能。

在 **管理 > 配置设置 > 工作流程** 下访问这些设置。此类别包含 **23 个设置**，以下列出平台设置固定数据（`SettingsCurrentFixtures.php`）中提供的标题和注释。

> 代码中的变量名以等宽字体显示。在通过 API 进行脚本编写或需要通过编辑 [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) 在全局级别更改这些设置时使用。

## 设置

### `allow_user_course_subscription_by_course_admin`

**允许课程管理员订阅用户**

激活此选项将允许课程管理员在课程内订阅用户

*默认值：`true`*

### `allow_users_to_create_courses`

**允许非管理员创建课程**

允许非管理员（教师）在服务器上创建新课程

*默认值：`false`*

### `allow_working_time_edition`

**启用课程工作时间的编辑**

启用此功能，让教师可以手动更新学习者在课程中花费的时间。

*默认值：`false`*

### `course_visibility_change_only_admin`

**仅管理员可更改课程可见性**

禁止非管理员更改课程可见性。当教师数量过多难以直接控制时，可见性可能成为问题。强制设置可见性有助于组织更好地管理课程目录。

*默认值：`false`*

### `default_menu_entry_for_course_or_session`

**课程的默认菜单项**

定义用户未注册任何课程或会话时，“课程”条目显示的默认子元素。

*默认值：`my_courses`*

### `disable_user_conditions_sender_id`

**用于发送禁用账户通知的用户的内部ID**

通过使用“机器人”账户向用户发送电子邮件，避免在账户因某些原因被禁用时过于个人化。

*默认值：`0`*

### `disabled_edit_session_coaches_course_editing_course`

**禁用编辑课程教练的能力**

禁用后，管理员在课程编辑页面上将没有快速分配教练到会话课程的链接。

*默认值：`false`*

### `drh_allow_access_to_all_students`

**人力资源经理可访问所有学生的报告页面**

[推测] 授予人力资源/部门负责人经理访问平台上所有学习者的报告页面。

*默认值：`false`*

### `gamification_mode`

**游戏化模式**

在学习路径中激活星级成就

### `go_to_course_after_login`

**登录后直接进入课程**

当用户注册了一个课程时，登录后直接进入该课程

*默认值：`false`*

### `load_term_conditions_section`

**加载条款条件部分**

法律协议将在登录时或进入课程时显示。

*默认值：`login`*

### `multiple_url_hide_disabled_settings`

**在子URL中隐藏禁用的设置**

设置为“是”后，如果主URL中禁用了某个设置（即 access_url_changeable 字段 = 0），则在子URL中完全隐藏该设置

*默认值：`false`*

### `plugin_redirection_enabled`

**启用重定向插件**

仅在使用重定向插件时启用

*默认值：`false`*

### `redirect_index_to_url_for_logged_users`

**为已认证用户将 index.php 重定向到指定URL**

如果您不希望使用索引页面（公告、热门课程等），可以在此定义用户尝试加载索引时将被重定向到的脚本（从文档根目录开始）。

### `send_all_emails_to`

**将所有电子邮件发送至**

提供一个电子邮件地址列表，平台发送的所有电子邮件都将发送到这些地址。这些地址将作为可见的目的地接收电子邮件。

### `session_admin_user_subscription_search_extra_field_to_search`

**用于搜索和命名会话的额外用户字段**

此设置定义了用于搜索用户和在 /admin-dashboard/register 注册学生时定义会话名称的额外用户字段键（例如，“company”）。

### `teacher_can_select_course_template`

**教师可以选择课程作为模板**

允许选择一个课程作为教师创建的新课程的模板

*默认值：`true`*

### `update_student_expiration_x_date`

**首次登录时设置到期日期**

定义在用户首次登录时设置账户到期日期的“天数”和“月份”的数组。

### `user_edition_extra_field_to_check`

**设置额外字段作为前学习者注册的触发条件**

在此提供一个额外字段标签。如果任何用户的此额外字段被更新，将触发一个流程，检查该用户是否可以访问具有相同额外字段的课程。

---
### `user_number_of_days_for_default_expiration_date_per_role`

**按角色设置的默认过期天数**

一个角色 => 天数的数组，表示根据角色不同，账户在过期前的天数。

### `usergroup_do_not_unsubscribe_users_from_course_nor_session_on_user_unsubscribe`

**在用户从组/班级取消订阅时，不自动取消其课程或会话的订阅**

[推断] 当从组/班级中移除用户时，不自动取消其与相关课程或会话的订阅。

*默认值：`false`*


### `usergroup_do_not_unsubscribe_users_from_course_on_course_unsubscribe`

**在从组/班级移除课程时，不自动取消用户的课程订阅**

[推断] 当从组/班级中移除课程时，不自动取消用户对该课程的订阅。

*默认值：`false`*


### `usergroup_do_not_unsubscribe_users_from_session_on_session_unsubscribe`

**在从组/班级移除会话时，不自动取消用户的会话订阅**

[推断] 当从组/班级中移除会话时，不自动取消用户对该会话的订阅。

*默认值：`false`*