# 工作流设置

跨模块的工作流开关——课程创建、选课审核、作业工作流等。

可在 **管理 > 配置设置 > 工作流** 下访问这些设置。本类别包含 **23 项设置**，下方列出平台设置固件（`SettingsCurrentFixtures.php`）中附带的标题与说明。

> 代码中的变量名以等宽字体显示。通过 API 编写脚本，或需要通过编辑 [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) 在全局层面更改这些设置时，请使用该名称。

## 设置

### `allow_user_course_subscription_by_course_admin`

**允许课程管理员为用户订阅课程**

启用此选项后，课程管理员可在课程内为用户办理订阅

*默认值：`true`*


### `allow_users_to_create_courses`

**允许非管理员创建课程**

允许非管理员（教师）在服务器上创建新课程

*默认值：`false`*


### `allow_working_time_edition`

**启用课程学习时长编辑**

启用此功能后，教师可手动更新学习者在课程中花费的时间。

*默认值：`false`*


### `course_visibility_change_only_admin`

**仅管理员可更改课程可见性**

取消非管理员更改课程可见性的权限。教师人数过多、难以直接管控时，可见性可能成为问题。强制设置可见性有助于机构更好地管理课程目录。

*默认值：`false`*


### `default_menu_entry_for_course_or_session`

**课程的默认菜单项**

定义当用户未注册任何课程或学期时，“课程”入口下默认显示的子项。

*默认值：`my_courses`*


### `disable_user_conditions_sender_id`

**用于发送账户停用通知的用户内部 ID**

使用“机器人”账户向因故被停用账户的用户发送电子邮件，避免过于个人化。

*默认值：`0`*


### `disabled_edit_session_coaches_course_editing_course`

**禁用编辑课程辅导教师的能力**

禁用后，管理员在课程编辑页面上将没有用于快速为学期课程分配辅导教师的链接。

*默认值：`false`*


### `drh_allow_access_to_all_students`

**人力资源经理可从报表页面访问全部学生**

[推断] 授予人力资源/DRH 经理访问平台上全部学习者报表页面的权限。

*默认值：`false`*


### `gamification_mode`

**游戏化模式**

在学习路径中启用星级成就

### `go_to_course_after_login`

**登录后直接进入课程**

当用户仅注册了一门课程时，登录后直接进入该课程

*默认值：`false`*


### `load_term_conditions_section`

**加载条款与条件区块**

法律协议将在登录时或进入课程时显示。

*默认值：`login`*


### `multiple_url_hide_disabled_settings`

**在子 URL 中隐藏已禁用的设置**

设为是时，若某设置在主 URL 中已禁用（access_url_changeable 字段 = 0），则在子 URL 中完全隐藏该设置

*默认值：`false`*


### `plugin_redirection_enabled`

**启用重定向插件**

仅在使用 Redirection 插件时启用

*默认值：`false`*


### `redirect_index_to_url_for_logged_users`

**将已认证用户的 index.php 重定向到指定 URL**

若不想使用首页（公告、热门课程等），可在此定义脚本（相对于文档根目录），用户尝试加载首页时将被重定向到该脚本。

### `send_all_emails_to`

**将所有电子邮件发送至**

给出一份电子邮件地址列表，平台发出的*所有*电子邮件也将发送到这些地址。这些地址作为可见收件人接收邮件。

### `session_admin_user_subscription_search_extra_field_to_search`

**用于搜索用户及命名学期的用户扩展字段**

此设置定义扩展用户字段键（例如 “company”），用于搜索用户，并在从 /admin-dashboard/register 注册学生时定义学期名称。

### `teacher_can_select_course_template`

**教师可将某门课程选为模板**

允许教师在创建新课程时选择一门课程作为模板

*默认值：`true`*


### `update_student_expiration_x_date`

**首次登录时设置到期日期**

数组，定义用户首次登录时用于设置账户到期日期的“天数”和“月数”。

### `user_edition_extra_field_to_check`

**将扩展字段设为登记为前学习者的触发器**

在此给出扩展字段标签。若任意用户的该扩展字段被更新，将触发流程，检查该用户对具有相同扩展字段的课程的访问权限。

### `user_number_of_days_for_default_expiration_date_per_role`

**按角色设置的默认过期天数**

一个 role => number 的数组，表示账户在过期前的天数，具体取决于角色。

### `usergroup_do_not_unsubscribe_users_from_course_nor_session_on_user_unsubscribe`

**禁用从班级/用户组退订用户时自动从课程/学期退订**

[推断] 当从班级/用户组中移除用户时，不要自动将其从关联的课程或学期中退订。

*默认值：`false`*


### `usergroup_do_not_unsubscribe_users_from_course_on_course_unsubscribe`

**禁用从班级/用户组移除课程时自动从该课程退订用户**

[推断] 当从班级/用户组中移除一门课程时，不要自动将用户从该课程中退订。

*默认值：`false`*


### `usergroup_do_not_unsubscribe_users_from_session_on_session_unsubscribe`

**禁用从班级/用户组移除学期时自动从该学期退订用户**

[推断] 当从班级/用户组中移除一个学期时，不要自动将用户从该学期中退订。

*默认值：`false`*