# 学期设置

**学期（Sessions）** 的默认值与行为——学期生命周期、辅导教师访问窗口、学期内课程可见性等。

可在 **管理 > 配置设置 > 学期** 下访问这些设置。本类别包含 **68 项设置**，下方列出平台设置固件（`SettingsCurrentFixtures.php`）中附带的标题与说明。

> 代码中的变量名以等宽字体显示。在通过 API 编写脚本，或需要通过编辑 [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) 在全局层面更改这些设置时，请使用该名称。

## 设置

### `add_users_by_coach`

**允许辅导教师注册用户**

辅导教师可在平台上创建用户，并将用户订阅到学期。

*默认值：`false`*

### `allow_career_diagram`

**启用职业图**

职业图可用于展示职业、技能与课程的示意图。

*默认值：`false`*


### `allow_career_users`

**为用户启用职业图**

若已启用职业图，只有在启用本选项后，用户才能查看它们（且仅能查看与其学业对应的示意图）。

*默认值：`false`*

### `allow_coach_to_edit_course_session`

**允许辅导教师在课程学期内编辑**

允许辅导教师在课程学期内进行编辑

*默认值：`true`*

### `allow_delete_user_for_session_admin`

**学期管理员可删除用户**

学期管理员在管理其学期时，可将用户从平台中移除。

*默认值：`false`*


### `allow_disable_user_for_session_admin`

**学期管理员可禁用用户**

学期管理员可禁用用户账户以阻止登录，同时保留其学期中的注册记录。

*默认值：`false`*


### `allow_edit_tool_visibility_in_session`

**允许在学期中编辑工具可见性**

使用学期时，默认行为是沿用基础课程中定义的工具可见性。本设置可改变该行为，允许学期课程中的辅导教师按需调整工具可见性。

*默认值：`true`*

### `allow_redirect_to_session_after_inscription_about`

**在学期“关于”页面注册后重定向到学期**

新用户通过学期的“关于”页面完成注册后，自动重定向到其学期页面。

*默认值：`false`*


### `allow_search_diagnostic`

**启用学期搜索诊断**

允许辅导教师获取诊断结果，以便为学习者搜索最合适的学期。

*默认值：`false`*


### `allow_session_admin_extra_access`

**学期管理员可访问批量用户导入、更新与导出**

学期管理员除标准权限外，还可访问批量用户导入、更新与导出功能。

*默认值：`false`*


### `allow_session_admin_login_as_teacher`

**学期管理员可以“身份登录”教师**

学期管理员可模拟教师账户，以便在其学期内预览课程内容与学生体验。

*默认值：`false`*


### `allow_session_admin_read_careers`

**学期管理员可查看职业路径**

[推断] 学期管理员可查看并访问与其管理学期相关联的职业路径及晋升工作流。

*默认值：`false`*


### `allow_session_admins_to_manage_all_sessions`

**允许学期管理员查看所有学期**

未启用本选项时（默认），学期管理员只能看到自己创建的学期。在开放环境中，学期管理员可能需要在两个学期之间分担支持时间，这会造成困扰。

*默认值：`false`*

### `allow_session_course_copy_for_teachers`

**允许教师进行学期到学期的复制**

启用本选项后，教师可将内容从一个学期中的课程复制到另一个学期中的课程。默认情况下，本选项仅对平台管理员可用。

*默认值：`false`*

### `allow_teachers_to_create_sessions`

**允许教师创建学期**

教师可以创建、编辑和删除自己的学期。

*默认值：`false`*

### `allow_tutors_to_assign_students_to_session`

**辅导教师可将学生分配到学期**

启用后，学期中的课程辅导教师可将新用户订阅到其学期。否则，本选项仅对管理员和学期管理员可用。

*默认值：`false`*

### `allow_user_session_collabsable`

**允许用户在“我的学期”中折叠学期**

用户可在“我的学期”页面折叠学期卡片或分组，以减少视觉干扰并改善导航。

*默认值：`false`*


### `assignment_base_course_teacher_access_to_all_session`

**基础课程教师可查看所有学期的作业**

在基础课程的 work/pending.php 页面中显示所有学习者提交（来自基础课程及所有学期）。

*默认值：`false`*

### `career_diagram_disclaimer`

**在职业图下方显示免责声明**

在职业图下方添加免责声明。您的子语言中必须存在名为“Career diagram disclaimer”的语言变量。

*默认值：`false`*

### `career_diagram_legend`

**在职业图下方显示图例**

在职业图下方添加职业图例。您的子语言中必须存在名为“Career diagram legend”的语言变量。

*默认值：`false`*

### `courses_list_session_title_link`

**会话标题的链接类型**

在课程/会话页面上，会话标题可以是以下之一：0 = 无链接（隐藏会话标题）；1 = 将标题链接到特殊会话页面；2 = 若仅有一门课程则链接到该课程；3 = 会话标题可使课程列表折叠；4 = 无链接（显示会话标题）。

*默认值：`1`*

### `default_session_list_view`

**默认会话列表视图**

选择以管理员身份打开会话列表时希望看到的默认选项卡。

*默认值：`all`*


### `drh_can_access_all_session_content`

**人力资源主管可访问所有会话内容**

若启用，人力资源主管将获得其所关注会话中全部内容和用户的访问权限。

*默认值：`true`*

### `duplicate_specific_session_content_on_session_copy`

**启用将会话特定内容复制到另一会话**

允许在复制会话时复制在该会话中创建的资源。

*默认值：`false`*


### `email_template_subscription_to_session_confirmation_lost_password`

**在订阅会话的电子邮件通知中添加重置密码链接**

在用户被注册到会话时发送的订阅确认邮件中包含密码重置链接。

*默认值：`false`*


### `email_template_subscription_to_session_confirmation_username`

**在订阅会话的电子邮件通知中添加用户名**

在用户被注册到会话时发送的订阅确认邮件中包含该用户的用户名。

*默认值：`false`*


### `enable_auto_reinscription`

**启用自动重新注册**

在课程有效期到期时启用或禁用自动重新注册。相关 cron 作业也必须已激活。

*默认值：`false`*


### `enable_session_replication`

**启用会话复制**

启用或禁用自动会话复制。相关 cron 作业也必须已激活。

*默认值：`false`*


### `extend_rights_for_coach`

**扩展辅导教师权限**

启用此选项可为辅导教师赋予与培训师在创作工具上相同的权限

*默认值：`false`*

### `hide_courses_in_sessions`

**在会话中隐藏课程列表**

在课程页面显示会话区块时，隐藏该会话内的课程列表（仅在特定会话界面中显示它们）。

*默认值：`false`*

### `hide_reporting_session_list`

**在报告工具中隐藏会话列表**

包含该课程的会话会在课程内部的报告工具中列出，若同一课程用于数百个会话，可能显著增加负担。此选项将移除该列表。

*默认值：`false`*


### `hide_search_form_in_session_list`

**在会话列表中隐藏搜索表单**

从管理界面的会话列表视图中移除搜索输入字段。

*默认值：`false`*


### `hide_session_graph_in_my_progress`

**在“我的进度”中隐藏会话图表**

在学习者仪表板的“我的进度”页面中隐藏会话进度图表和可视化内容。

*默认值：`false`*


### `hide_tab_list`

**在会话页面上隐藏选项卡**

从会话详情页移除导航选项卡以简化界面。

### `limit_session_admin_list_users`

**禁止会话管理员访问用户列表**

阻止会话管理员在管理界面中访问全局用户列表。

*默认值：`false`*


### `limit_session_admin_role`

**限制会话管理员权限**

若启用，会话管理员将仅看到带有“添加用户”选项的用户区块，以及带有“会话列表”选项的会话区块。

*默认值：`false`*

### `my_courses_session_order`

**更改“我的会话”中会话的默认排序**

默认情况下，会话按开始日期排序。可通过提供类型为 ['field' => 'end_date', 'order' => 'desc'] 的数组来更改。

### `my_courses_view_by_session`

**按会话查看我的课程**

启用额外的“我的课程”页面，使会话作为课程的一部分显示，而非相反。

*默认值：`false`*

### `my_progress_session_show_all_courses`

**我的进度：在会话中显示课程详情**

点击会话详情时显示会话中每门课程的全部详细信息。

*默认值：`false`*


### `prevent_session_admins_to_manage_all_users`

**阻止会话管理员管理所有用户**

启用此选项后，会话管理员在管理页面中将只能看到其创建的用户。

*默认值：`false`*

### `remove_session_url`

**隐藏指向培训班页面的链接**

在培训班列表中隐藏指向培训班页面的链接。

*默认值：`false`*


### `session_admins_access_all_content`

**培训班管理员可访问所有课程内容**

培训班管理员可以查看其培训班内的所有课程内容，包括受限或已归档的材料。

*默认值：`false`*

### `session_admins_edit_courses_content`

**培训班管理员可编辑课程内容**

培训班管理员可以修改分配给其培训班的课程中的课程内容（文档、练习、工具）。

*默认值：`false`*

### `session_automatic_creation_user_id`

**自动创建培训班的创建者 ID**

设置用作自动创建培训班的创建者的用户（以避免将每个培训班都分配给用户“1”，该用户通常是门户管理员）。

*默认值：`1`*


### `session_classes_tab_disable`

**对非管理员禁用在培训班课程中添加班级**

对非管理员禁用在培训班课程中添加班级的选项卡。

*默认值：`false`*


### `session_coach_access_after_duration_end`

**按时长划分的培训班对辅导教师始终可用**

否则，培训班辅导教师仅在有效时长内才能访问按时长划分的培训班。

*默认值：`false`*


### `session_course_ordering`

**培训班课程手动排序**

启用此选项以允许培训班管理员手动排列培训班内的课程顺序。若禁用，课程将按课程标题字母顺序排列。

*默认值：`false`*

### `session_course_users_subscription_limited_to_session_users`

**将课程订阅限制为仅培训班用户**

限制可订阅到课程培训班的学生列表。并禁用从“培训班摘要”页面在所有课程中为用户注册。

*默认值：`false`*


### `session_courses_read_only_mode`

**将培训班中的课程设为只读**

允许教师在通过培训班打开某些课程时将其设为只读模式。在课程属性中，勾选“在培训班中锁定课程”选项。

*默认值：`false`*


### `session_creation_form_set_extra_fields_mandatory`

**在培训班创建表单中设置必填附加字段**

在创建培训班时要求填写所列字段。

### `session_creation_user_course_extra_field_relation_to_prefill`

**用用户字段预填培训班字段**

用户附加字段与培训班附加字段之间的关系数组，以便可用与用户数据匹配的数据预填培训班。

### `session_days_after_coach_access`

**培训班结束后辅导教师的默认访问天数**

辅导教师在正式培训班结束日期之后可访问该培训班的默认天数

### `session_days_before_coach_access`

**培训班开始前辅导教师的默认访问天数**

辅导教师在正式培训班开始日期之前可访问该培训班的默认天数

### `session_import_settings`

**培训班导入选项**

在 CSV/XML 培训班导入中作为默认参数应用的选项数组。

### `session_list_order`

**培训班支持手动排序**

在管理培训班列表中通过拖放或类似机制启用培训班的手动重新排序。

*默认值：`false`*


### `session_list_show_count_users`

**在培训班列表中显示用户数量**

管理员可以查看每个培训班中的用户数量。这会增加培训班列表的额外负担，因此如果经常使用，请仔细考虑是否愿意承担额外的等待时间。

*默认值：`false`*


### `session_list_view_remaining_days`

**在“我的培训班”中显示剩余天数**

若启用，则“我的培训班”页面上的培训班日期将替换为剩余天数。

*默认值：`false`*

### `session_model_list_field_ordered_by_id`

**在培训班创建表单中按 id 对培训班模板排序**

[推断] 在培训班创建表单下拉列表中按数字 ID 对培训班模板排序，而不是按名称字母顺序排序。

*默认值：`false`*


### `session_multiple_subscription_students_list_avoid_emptying`

**防止在培训班订阅中清空已订阅用户**

在将多名学习者订阅到培训班时，阻止点击提交时取消订阅不在右侧面板中的用户这一正常行为。保留所有用户。

*默认值：`false`*


### `show_all_sessions_on_my_course_page`

**在“我的课程”页面显示所有培训班**

若启用，此选项将在基于日历的视图中显示该用户的所有培训班。

*默认值：`true`*


### `show_session_coach`

**显示培训班辅导教师**

在课程列表的培训班标题框中显示总培训班辅导教师姓名

*默认值：`false`*

### `show_session_data`

**显示培训班数据标题**

显示培训班数据备注

*默认值：`false`*

### `show_session_description`

**显示培训班说明**

在已实现此选项的任何位置显示培训班说明（培训班跟踪页面等）

*默认值：`false`*

### `show_simple_session_info`

**显示简洁的课程班信息**

在课程班列表中，将辅导教师和日期添加到课程班子标题。

*默认值：`true`*


### `show_users_in_active_sessions_in_tracking`

**跟踪中仅显示活动课程班的用户**

在学员跟踪与报表视图中，仅显示当前处于活动状态的课程班中的用户。

*默认值：`false`*


### `tracking_columns`

**自定义课程-课程班跟踪列**

为以下报表定义列数组：'course_session'、'my_students_lp'、'my_progress_lp'、'my_progress_courses'。

### `user_s_session_duration`

**自动创建课程班的时长**

单用户、自动创建的课程班的时长（以天为单位）。过期后，该用户无法再注册同一门课程（不会再创建其他课程班）。

*默认值：`1095`*


### `user_session_display_mode`

**“我的课程班”显示模式**

选择“我的课程班”页面的显示方式：现代可视化卡片（card）视图，或经典列表样式。

*默认值：`list`*