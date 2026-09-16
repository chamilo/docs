# 会话设置

**会话**的默认值和行为——会话生命周期、教练访问窗口、会话内课程可见性等类似设置。

在**管理 > 配置设置 > 会话**下访问这些设置。此类别包含**68个设置**，以下列出平台设置固定数据（`SettingsCurrentFixtures.php`）中提供的标题和注释。

> 代码中的变量名以等宽字体显示。在通过API进行脚本编写或需要通过编辑[`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml)全局更改这些设置时使用它。

## 设置

### `add_users_by_coach`

**教练注册用户**

教练用户可以创建平台用户并将用户订阅到会话中。

*默认值：`false`*

### `allow_career_diagram`

**启用职业图表**

职业图表允许您展示职业、技能和课程的图表。

*默认值：`false`*

### `allow_career_users`

**为用户启用职业图表**

如果启用了职业图表，只有在启用此选项时，用户才能查看它们（且只能查看与其学习相关的图表）。

*默认值：`false`*

### `allow_coach_to_edit_course_session`

**允许教练在课程会话内编辑**

允许教练在课程会话内进行编辑。

*默认值：`true`*

### `allow_delete_user_for_session_admin`

**会话管理员可以删除用户**

会话管理员在管理其会话时可以从平台中删除用户。

*默认值：`false`*

### `allow_disable_user_for_session_admin`

**会话管理员可以禁用用户**

会话管理员可以禁用用户账户以防止登录，同时保留其会话中的注册记录。

*默认值：`false`*

### `allow_edit_tool_visibility_in_session`

**允许在会话中编辑工具可见性**

在使用会话时，默认行为是使用基础课程中定义的工具可见性。此设置更改此行为，允许会话课程中的教练根据需要调整工具可见性。

*默认值：`true`*

### `allow_redirect_to_session_after_inscription_about`

**在会话“关于”页面注册后重定向到会话**

在新用户通过会话的“关于”页面完成注册后，自动将其重定向到会话页面。

*默认值：`false`*

### `allow_search_diagnostic`

**启用会话搜索诊断**

允许导师获取诊断，以便为学习者搜索最佳会话。

*默认值：`false`*

### `allow_session_admin_extra_access`

**会话管理员可以访问批量用户导入、更新和导出**

会话管理员除了标准权限外，还可以访问批量用户导入、更新和导出功能。

*默认值：`false`*

### `allow_session_admin_login_as_teacher`

**会话管理员可以以教师身份登录**

会话管理员可以模拟教师账户，以预览其会话内的课程内容和学生体验。

*默认值：`false`*

### `allow_session_admin_read_careers`

**会话管理员可以查看职业**

[推测] 会话管理员可以查看和管理与其管理的会话相关的职业路径和晋升流程。

*默认值：`false`*

### `allow_session_admins_to_manage_all_sessions`

**允许会话管理员查看所有会话**

当此选项未启用（默认）时，会话管理员只能看到他们创建的会话。在开放环境中，这可能会造成混淆，因为会话管理员可能需要在两个会话之间共享支持时间。

*默认值：`false`*

### `allow_session_course_copy_for_teachers`

**允许教师进行会话间复制**

启用此选项后，教师可以将内容从一个会话中的课程复制到另一个会话中的课程。默认情况下，此选项仅对平台管理员可用。

*默认值：`false`*

### `allow_teachers_to_create_sessions`

**允许教师创建会话**

教师可以创建、编辑和删除自己的会话。

*默认值：`false`*

### `allow_tutors_to_assign_students_to_session`

**导师可以将学生分配到会话**

启用后，会话中的课程教练/导师可以将新用户订阅到他们的会话中。否则，此选项仅对管理员和会话管理员可用。

*默认值：`false`*

### `allow_user_session_collapsable`

**允许用户在“我的会话”中折叠会话**

用户可以在“我的会话”页面中折叠会话卡片或组，以减少视觉混乱并改善导航。

*默认值：`false`*

### `assignment_base_course_teacher_access_to_all_session`

**基础课程教师可以查看所有会话的作业**

在基础课程的work/pending.php页面中显示所有学习者的发布内容（来自基础课程和所有会话）。

*默认值：`false`*

---
### `career_diagram_disclaimer`

**在职业图表下方显示免责声明**

在职业图表下方添加免责声明。您的子语言中必须存在一个名为“职业图表免责声明”的语言变量。

*默认值：`false`*

### `career_diagram_legend`

**在职业图表下方显示图例**

在职业图表下方添加职业图例。您的子语言中必须存在一个名为“职业图表图例”的语言变量。

*默认值：`false`*

### `courses_list_session_title_link`

**会话标题的链接类型**

在课程/会话页面上，会话标题可以是以下类型之一：0 = 无链接（隐藏会话标题）；1 = 将标题链接到特定的会话页面；2 = 如果只有一门课程，则链接到该课程；3 = 会话标题使课程列表可折叠；4 = 无链接（显示会话标题）。

*默认值：`1`*

### `default_session_list_view`

**默认会话列表视图**

选择作为管理员打开会话列表时希望看到的默认选项卡。

*默认值：`all`*

### `drh_can_access_all_session_content`

**人力资源主管访问所有会话内容**

如果启用，人力资源主管将能够访问其所关注的会话中的所有内容和用户。

*默认值：`true`*

### `duplicate_specific_session_content_on_session_copy`

**启用会话特定内容复制到另一个会话**

允许在复制会话时，复制会话中创建的资源。

*默认值：`false`*

### `email_template_subscription_to_session_confirmation_lost_password`

**在会话订阅确认邮件中添加重置密码链接**

在用户注册会话时发送的订阅确认邮件中包含密码重置链接。

*默认值：`false`*

### `email_template_subscription_to_session_confirmation_username`

**在会话订阅确认邮件中添加用户名**

在用户注册会话时发送的订阅确认邮件中包含用户的用户名。

*默认值：`false`*

### `enable_auto_reinscription`

**启用自动重新注册**

在课程有效期到期时启用或禁用自动重新注册。相关的定时任务也必须激活。

*默认值：`false`*

### `enable_session_replication`

**启用会话复制**

启用或禁用自动会话复制。相关的定时任务也必须激活。

*默认值：`false`*

### `extend_rights_for_coach`

**扩展教练权限**

激活此选项将赋予教练与培训师在创作工具上的相同权限。

*默认值：`false`*

### `hide_courses_in_sessions`

**在会话中隐藏课程列表**

在课程页面显示会话块时，隐藏该会话内的课程列表（仅在特定会话屏幕内显示）。

*默认值：`false`*

### `hide_reporting_session_list`

**在报告工具中隐藏会话列表**

在报告工具中，包含课程的会话会列在课程内部，如果同一课程用于数百个会话，这可能会增加相当大的负担。此选项将移除该列表。

*默认值：`false`*

### `hide_search_form_in_session_list`

**在会话列表中隐藏搜索表单**

在管理界面中的会话列表视图中移除搜索输入框。

*默认值：`false`*

### `hide_session_graph_in_my_progress`

**在“我的进度”中隐藏会话图表**

在学习者仪表板的“我的进度”页面中隐藏会话进度图表和可视化内容。

*默认值：`false`*

### `hide_tab_list`

**在会话页面上隐藏选项卡**

从会话详情页面中移除导航选项卡以简化界面。

### `limit_session_admin_list_users`

**禁止会话管理员访问用户列表**

阻止会话管理员在管理界面中访问全局用户列表。

*默认值：`false`*

### `limit_session_admin_role`

**限制会话管理员权限**

如果启用，会话管理员将只能看到用户块中的“添加用户”选项和会话块中的“会话列表”选项。

*默认值：`false`*

### `my_courses_session_order`

**更改“我的会话”中会话的默认排序**

默认情况下，会话按开始日期排序。可以通过提供一个类型为 ['field' => 'end_date', 'order' => 'desc'] 的数组来更改排序方式。

### `my_courses_view_by_session`

**按会话查看我的课程**

启用一个额外的“我的课程”页面，其中会话作为课程的一部分显示，而不是相反。

*默认值：`false`*

### `my_progress_session_show_all_courses`

**我的进度：在会话中显示课程详情**

在点击会话详情时，显示会话中每门课程的所有详细信息。

*默认值：`false`*

### `prevent_session_admins_to_manage_all_users`

**阻止会话管理员管理所有用户**

启用此选项后，会话管理员在管理页面中只能看到他们创建的用户。

*默认值：`false`*

---
### `remove_session_url`

**隐藏会话页面链接**

从会话列表中隐藏指向会话页面的链接。

*默认值：`false`*


### `session_admins_access_all_content`

**会话管理员可以访问所有课程内容**

会话管理员可以查看其会话内的所有课程内容，包括受限或归档的材料。

*默认值：`false`*


### `session_admins_edit_courses_content`

**会话管理员可以编辑课程内容**

会话管理员可以修改分配给其会话的课程内容（文档、练习、工具）。

*默认值：`false`*


### `session_automatic_creation_user_id`

**自动创建会话的创建者ID**

设置用于自动创建会话的创建者用户（以避免将每个会话都分配给用户'1'，通常是门户管理员）。

*默认值：`1`*


### `session_classes_tab_disable`

**对非管理员禁用会话课程中的添加班级选项卡**

对非管理员用户禁用在会话课程中添加班级的选项卡。

*默认值：`false`*


### `session_coach_access_after_duration_end`

**会话持续时间结束后教练始终可以访问**

否则，会话教练只能在活动持续时间内访问按持续时间设置的会话。

*默认值：`false`*


### `session_course_ordering`

**会话课程手动排序**

启用此选项，允许会话管理员手动对会话内的课程进行排序。如果禁用，课程将按课程标题的字母顺序排列。

*默认值：`false`*


### `session_course_users_subscription_limited_to_session_users`

**限制课程订阅仅限于会话用户**

限制课程会话中可订阅的学生列表，并禁用从“恢复会话”页面在所有课程中注册用户。

*默认值：`false`*


### `session_courses_read_only_mode`

**在会话中设置课程为只读模式**

允许教师在通过会话打开课程时将其设置为只读模式。在课程属性中，勾选“在会话中锁定课程”选项。

*默认值：`false`*


### `session_creation_form_set_extra_fields_mandatory`

**在会话创建表单中设置必填额外字段**

在会话创建过程中要求填写列出的字段。


### `session_creation_user_course_extra_field_relation_to_prefill`

**使用用户字段预填充会话字段**

用户额外字段与会话额外字段之间的关系数组，以便会话可以预填充与用户数据匹配的数据。


### `session_days_after_coach_access`

**会话结束后教练默认访问天数**

会话正式结束日期后，教练可以访问会话的默认天数。


### `session_days_before_coach_access`

**会话开始前教练默认访问天数**

会话正式开始日期前，教练可以访问会话的默认天数。


### `session_import_settings`

**会话导入选项**

在CSV/XML会话导入中作为默认参数应用的选项数组。


### `session_list_order`

**会话支持手动排序**

在管理会话列表中通过拖放或类似机制启用会话的手动重新排序。

*默认值：`false`*


### `session_list_show_count_users`

**在会话列表中显示用户数量**

管理员可以看到每个会话中的用户数量。这会增加会话列表的额外负担，因此如果您经常使用此功能，请仔细考虑是否愿意接受额外的等待时间。

*默认值：`false`*


### `session_list_view_remaining_days`

**在“我的会话”中显示剩余天数**

如果启用，在“我的会话”页面上的会话日期将被替换为剩余天数。

*默认值：`false`*


### `session_model_list_field_ordered_by_id`

**在会话创建表单中按ID排序会话模板**

在会话创建表单的下拉菜单中按数字ID而非按名称字母顺序对会话模板进行排序。

*默认值：`false`*


### `session_multiple_subscription_students_list_avoid_emptying`

**防止在会话订阅中清空已订阅用户**

在使用多学员订阅会话时，防止点击提交时将不在右侧面板中的用户取消订阅的默认行为。保留所有用户。

*默认值：`false`*


### `show_all_sessions_on_my_course_page`

**在“我的课程”页面显示所有会话**

如果启用，此选项将在基于日历的视图中显示用户的所有会话。

*默认值：`true`*


### `show_session_coach`

**显示会话教练**

在课程列表的会话标题框中显示全局会话教练名称。

*默认值：`false`*


### `show_session_data`

**显示会话数据标题**

显示会话数据注释。

*默认值：`false`*


### `show_session_description`

**显示会话描述**

在实现此选项的地方（会话跟踪页面等）显示会话描述。

*默认值：`false`*

---
### `show_simple_session_info`

**显示简易课程会话信息**

在课程会话列表中，将教练和日期添加到课程会话的副标题中。

*默认值：`true`*


### `show_users_in_active_sessions_in_tracking`

**仅在跟踪中显示活跃课程会话中的用户**

在学习者跟踪和报告视图中，仅显示当前活跃课程会话中的用户。

*默认值：`false`*


### `tracking_columns`

**自定义课程会话跟踪列**

为以下报告定义一组列：'course_session'、'my_students_lp'、'my_progress_lp'、'my_progress_courses'。

### `user_s_session_duration`

**自动创建的课程会话持续时间**

单用户自动创建的课程会话的持续时间（以天为单位）。到期后，用户无法注册同一课程（不会创建其他课程会话）。

*默认值：`1095`*


### `user_session_display_mode`

**我的课程会话显示模式**

选择“我的课程会话”页面的显示方式：现代视觉块（卡片）视图或经典列表样式。

*默认值：`list`*