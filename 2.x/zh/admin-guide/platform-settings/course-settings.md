# 课程设置

适用于平台上所有课程的默认设置和策略——包括可见性、创建权限、允许的工具、学习者权限等。

在 **管理 > 配置设置 > 课程** 下访问这些设置。此类别包含 **45 个设置项**，以下列出平台设置固定数据（`SettingsCurrentFixtures.php`）中提供的标题和注释。

> 代码中的变量名以等宽字体显示。在通过 API 进行脚本编写或需要通过编辑 [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) 在全局级别更改这些设置时使用。

## 设置项

### `active_tools_on_create`

**课程创建时激活的工具**

选择在创建课程后将处于*激活*状态的工具。

*默认值：*
```
agenda,announcement,attendance,bbb,blog,chat,course_description,course_progress,customcertificate,document,dropbox,forum,global,glossary,gradebook,group,learnpath,link,mobidico,notebook,notebookteacher,portfolio,positioning,quiz,student_publication,survey,test2pdf,tracking,user,wiki,zoom
```

### `allow_base_course_category`

**使用顶级 URL 的课程类别**

在多 URL 设置中，允许管理员和教师将顶级 URL 的类别分配给子 URL 中的课程。

*默认值：`false`*

### `allow_course_theme`

**允许课程主题**

允许课程图形主题，并可以更改课程使用的样式表为 Chamilo 提供的任何可用样式表。用户进入课程时，课程的样式表将优先于用户自己的样式表和平台的默认样式表。

*默认值：`true`*

### `allow_public_course_with_no_terms_conditions`

**访问带有条款和条件的公开课程**

启用此选项后，如果课程具有公开可见性并设有条款和条件，则在课程公开期间这些条款将被禁用。

*默认值：`false`*

### `block_registered_users_access_to_open_course_contents`

**阻止已认证用户访问公开课程**

仅显示公开课程。不允许已注册用户访问具有“开放”可见性的课程，除非他们已订阅这些课程。

*默认值：`false`*

### `breadcrumbs_course_homepage`

**课程首页面包屑导航**

面包屑导航是页面左上角的水平链接导航系统。此选项选择在课程首页面包屑导航中显示的内容。

*默认值：`course_title`*

### `course_about_teacher_name_hide`

**在课程详情页面隐藏教师信息**

在课程详情页面上隐藏教师信息。

*默认值：`false`*

### `course_category_code_to_use_as_model`

**将课程模板限制为一个课程类别**

提供一个类别代码作为课程模板使用。只有这些课程会在课程创建时的下拉菜单中显示，用户在课程目录中将看不到此类别中的课程。

### `course_configuration_tool_extra_fields_to_show_and_edit`

**在课程设置中显示的额外字段**

在此数组中定义的字段将显示在课程设置页面上。

### `course_creation_by_teacher_extra_fields_to_show`

**在课程创建表单中显示的额外字段**

在此数组中定义的字段将作为额外字段显示在课程创建表单中。

### `course_creation_donate_link`

**课程创建页面上的捐款链接**

捐款消息应链接到的页面（完整 URL）。

### `course_creation_donate_message_show`

**在课程创建页面显示捐款消息**

在课程创建页面为教师添加一个消息框，请求他们为项目捐款。

*默认值：`false`*

### `course_creation_form_hide_course_code`

**从课程创建表单中移除课程代码字段**

如果未提供课程代码，默认情况下会根据课程标题生成课程代码，因此启用此选项可完全从课程创建表单中移除代码字段。

*默认值：`false`*

### `course_creation_form_set_course_category_mandatory`

**将课程类别设置为必填项**

在创建课程时，将课程类别设为必填设置。

*默认值：`false`*

### `course_creation_form_set_extra_fields_mandatory`

**课程创建表单中要求填写的额外字段**

在此数组中定义的字段将在课程创建表单中设为必填项。

### `course_creation_splash_screen`

**课程启动画面**

在创建新课程时显示启动画面。

*默认值：`true`*

### `course_creation_use_template`

**为新课程使用模板课程**

设置此选项以对平台上创建的所有新课程使用相同的模板课程（通过数据库中的课程数字ID标识）。请注意，如果没有妥善规划，此设置可能会对空间使用产生巨大影响。模板课程将像教师使用课程备份工具复制课程一样被使用，因此不会复制用户内容，仅复制教师材料。所有其他课程备份规则均适用。留空（或设置为0）以禁用此功能。

### `course_creation_user_course_extra_field_relation_to_prefill`

**用用户字段预填充课程字段**

如果不为空，课程创建过程将查找用户档案中的某些字段并自动填充到课程中。例如，专注于数字营销的教师可以自动为他/她创建的每个课程设置“数字营销”标志。

### `course_hide_tools`

**对教师隐藏工具**

勾选您希望对教师隐藏的工具。这将禁止访问该工具。

### `course_images_in_courses_list`

**课程列表中的自定义图标**

在课程列表中使用课程图片作为课程图标（而不是默认的绿色黑板图标）。

*默认值：`true`*

### `course_log_default_extra_fields`

**课程统计页面默认显示的用户额外字段**

配置此数组，设置您希望在主课程统计页面中默认显示的额外字段的内部ID。

### `course_log_hide_columns`

**隐藏课程日志中的列**

此数组允许您配置在主课程统计页面和总时间报告中隐藏哪些列。

### `course_sequence_valid_only_in_same_session`

**仅在同一会话内验证先决条件**

启用后，课程仅在当前会话内通过才被视为已验证。如果禁用，则在其他会话中通过的课程也将解锁依赖课程。

*默认值：`false`*

### `course_student_info`

**课程学生信息显示**

在“我的课程”/“我的会话”页面上，显示有关学生分数、进度和/或证书获取的额外信息。

### `course_validation`

**课程验证**

当启用“课程验证”功能时，教师无法单独创建课程。他/她需要填写课程请求。平台管理员审查请求并批准或拒绝。<br />此功能依赖于自动电子邮件消息传递；请设置Chamilo以访问电子邮件服务器并使用专用的电子邮件账户。

*默认值：`false`*

### `course_validation_terms_and_conditions_url`

**课程验证 - 条款和条件链接**

这是适用于课程请求的“条款和条件”文档的URL。如果在此处设置了地址，用户在发送课程请求之前应阅读并同意这些条款和条件。<br />如果您启用了Chamilo的“条款和条件”模块，并且希望使用其URL，则将此设置留空。

### `courses_default_creation_visibility`

**默认课程可见性**

创建新课程时的默认课程可见性

*默认值：`2`*

### `display_coursecode_in_courselist`

**在课程名称中显示课程代码**

在课程列表中显示课程代码

*默认值：`false`*

### `display_teacher_in_courselist`

**在课程名称中显示教师**

在课程列表中显示教师

*默认值：`true`*

### `enable_tool_introduction`

**启用工具介绍**

在每个工具的主页上启用介绍

*默认值：`false`*

### `enable_unsubscribe_button_on_my_course_page`

**在“我的课程”页面显示取消订阅按钮**

在“我的课程”页面上添加一个取消订阅课程的按钮。

*默认值：`false`*

### `example_material_course_creation`

**课程创建时的示例材料**

在创建新课程时自动创建示例材料

*默认值：`true`*

### `hide_course_rating`

**隐藏课程评分**

课程评分功能默认在不同位置显示。如果您不希望使用此功能，请启用此选项。

*默认值：`false`*

### `hide_course_sidebar`

**隐藏侧边栏中的课程块**

在显示左侧菜单的屏幕上，不显示“课程”部分。

*默认值：`true`*

### `multiple_access_url_show_shared_course_marker`

**显示多URL共享课程标记**

为在多个URL之间共享的课程添加链接图标，以便用户（尤其是教师）知道在编辑课程内容时需要特别注意。

*默认值：`false`*

### `my_courses_show_courses_in_user_language_only`

**仅显示用户语言的课程**

如果启用此选项，将隐藏所有未设置为用户语言的课程。

*默认值：`false`*

### `profiling_filter_adding_users`

**在课程订阅时基于个人资料字段过滤用户**

允许教师在订阅用户到其课程的页面上，根据额外的字段对用户进行过滤。

*默认值：`false`*


### `resource_sequence_show_dependency_in_course_intro`

**在课程介绍中显示依赖关系**

在使用课程或会话的资源排序功能时，在课程主页上显示课程的依赖关系。

*默认值：`false`*


### `scorm_cumulative_session_time`

**SCORM的累积会话时间**

启用后，SCORM学习路径的会话时间将是累积的，否则，仅从上次更新时间开始计算。这是一个全局设置。在创建新的学习路径时使用，但随后可以为每个学习路径重新定义。

*默认值：`true`*


### `send_email_to_admin_when_create_course`

**课程创建时的电子邮件提醒**

每当教师创建新课程时，向平台管理员发送一封电子邮件。

*默认值：`false`*


### `show_course_duration`

**显示课程时长**

在课程目录和课程列表中，在课程标题旁显示课程时长。

*默认值：`false`*


### `show_navigation_menu`

**显示课程导航菜单**

显示一个导航菜单，加快对工具的访问速度。

*默认值：`false`*


### `show_toolshortcuts`

**工具快捷方式**

在横幅中显示工具快捷方式？

*默认值：`false`*


### `student_view_enabled`

**启用学习者视图**

启用学习者视图，允许教师或管理员以学习者的视角查看课程。

*默认值：`true`*


### `view_grid_courses`

**以网格布局查看课程**

以每行显示多个课程的布局查看课程。否则，布局将每行显示一个课程。

*默认值：`true`*