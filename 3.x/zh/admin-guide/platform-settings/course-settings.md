# 课程设置

适用于全平台课程的默认值与策略——可见性、创建权限、允许的工具、学习者权限等。

在 **管理 > 配置设置 > 课程** 下访问这些设置。此分类包含 **45 项设置**，下方列出平台设置固件（`SettingsCurrentFixtures.php`）中附带的标题与说明。

> 代码中的变量名以等宽字体显示。通过 API 编写脚本，或通过编辑 [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) 在全局层面更改这些设置时，请使用该名称。

## 设置

### `active_tools_on_create`

**课程创建时的活动工具**

选择课程创建后将处于*活动*状态的工具。

*默认值：*
```
agenda,announcement,attendance,bbb,blog,chat,course_description,course_progress,customcertificate,document,dropbox,forum,global,glossary,gradebook,group,learnpath,link,mobidico,notebook,notebookteacher,portfolio,positioning,quiz,student_publication,survey,test2pdf,tracking,user,wiki,zoom
```

### `allow_base_course_category`

**使用顶层 URL 的课程分类**

在多 URL 设置中，允许管理员和教师将顶层 URL 的分类分配给子 URL 中的课程。

*默认值：`false`*

### `allow_course_theme`

**允许课程主题**

允许课程图形主题，并可将课程所用样式表更改为 Chamilo 可用的任意样式表。用户进入课程时，课程样式表优先于用户个人样式表及平台默认样式表。

*默认值：`true`*

### `allow_public_course_with_no_terms_conditions`

**带条款与条件的公开课程访问**

启用此选项后，若课程为公开可见且设有条款与条件，则在课程保持公开期间这些条款将被禁用。

*默认值：`false`*

### `block_registered_users_access_to_open_course_contents`

**阻止已认证用户访问公开课程**

仅显示公开课程。不允许已注册用户访问可见性为“开放”的课程，除非他们已订阅这些课程。

*默认值：`false`*

### `breadcrumbs_course_homepage`

**课程主页面包屑**

面包屑是通常位于页面左上角的横向链接导航系统。此选项选择课程主页面包屑中要显示的内容。

*默认值：`course_title`*

### `course_about_teacher_name_hide`

**在课程详情页隐藏课程教师信息**

在课程详情页上隐藏教师信息。

*默认值：`false`*

### `course_category_code_to_use_as_model`

**将课程模板限制为单一课程分类**

给出用作课程模板的分类代码。仅这些课程会在创建课程时的下拉列表中显示，且用户不会在课程目录中看到该分类下的课程。

### `course_configuration_tool_extra_fields_to_show_and_edit`

**在课程设置中显示的额外字段**

此数组中定义的字段将出现在课程设置页面上。

### `course_creation_by_teacher_extra_fields_to_show`

**在课程创建表单中显示的额外字段**

此数组中定义的字段将作为附加字段出现在课程创建表单中。

### `course_creation_donate_link`

**课程创建页上的捐赠链接**

捐赠消息应链接到的页面（完整 URL）。

### `course_creation_donate_message_show`

**在课程创建页显示捐赠消息**

在教师的课程创建页中添加消息框，请其向项目捐赠。

*默认值：`false`*

### `course_creation_form_hide_course_code`

**从课程创建表单中移除课程代码字段**

若未提供，课程代码默认根据课程标题生成，因此启用此选项可从课程创建表单中完全移除代码字段。

*默认值：`false`*

### `course_creation_form_set_course_category_mandatory`

**将课程分类设为必填**

创建课程时，将课程分类设为必填项。

*默认值：`false`*

### `course_creation_form_set_extra_fields_mandatory`

**课程创建表单中必填的额外字段**

此数组中定义的字段在课程创建表单中将为必填。

### `course_creation_splash_screen`

**课程启动画面**

创建新课程时显示启动画面。

*默认值：`true`*

### `course_creation_use_template`

**使用模板课程创建新课程**

将此项设置为使用同一门模板课程（以其在数据库中的课程数字 ID 标识）来创建平台上的所有新课程。请注意，若规划不当，此设置可能对空间占用产生巨大影响。模板课程的使用方式等同于教师通过课程备份工具复制课程，因此不会复制用户内容，仅复制教师材料。所有其他课程备份规则同样适用。留空（或设为 0）即可禁用。

### `course_creation_user_course_extra_field_relation_to_prefill`

**用用户字段预填课程字段**

若不为空，课程创建过程将在用户个人资料中查找部分字段，并自动填充到课程中。例如，专长数字营销的教师可在其创建的每门课程上自动设置「数字营销」标记。

### `course_hide_tools`

**对教师隐藏工具**

勾选您希望对教师隐藏的工具。这将禁止访问该工具。

### `course_images_in_courses_list`

**课程自定义图标**

在课程列表中使用课程图片作为课程图标（而非默认的绿色黑板图标）。

*默认值：`true`*

### `course_log_default_extra_fields`

**课程统计页面默认显示的用户附加字段**

用您希望在主课程统计页面默认显示的附加字段内部 ID 配置此数组。

### `course_log_hide_columns`

**从课程日志中隐藏列**

此数组使您可以配置在主课程统计页面和总时长报告中要隐藏的列。

### `course_sequence_valid_only_in_same_session`

**仅在同一学期内验证先修条件**

启用后，课程仅在当前学期内通过才视为已验证。若禁用，在其他学期通过的课程也可解锁依赖课程。

*默认值：`false`*


### `course_student_info`

**课程学生信息显示**

在「我的课程」/「我的学期」页面上，显示有关学生成绩、进度和/或证书获取的附加信息。

### `course_validation`

**课程审核**

启用「课程审核」功能后，教师无法单独创建课程。他/她需填写课程申请。平台管理员审核该申请并批准或拒绝。<br />此功能依赖自动电子邮件消息；请将 Chamilo 配置为访问电子邮件服务器并使用专用电子邮件帐户。

*默认值：`false`*


### `course_validation_terms_and_conditions_url`

**课程审核 - 条款与条件链接**

这是适用于提交课程申请的「条款与条件」文档的 URL。若在此设置地址，用户在发送课程申请前应阅读并同意这些条款与条件。<br />若您启用 Chamilo 的「条款与条件」模块并希望使用其 URL，则将此设置留空。

### `courses_default_creation_visibility`

**默认课程可见性**

创建新课程时的默认课程可见性

*默认值：`2`*


### `display_coursecode_in_courselist`

**在课程名称中显示代码**

在课程列表中显示课程代码

*默认值：`false`*


### `display_teacher_in_courselist`

**在课程名称中显示教师**

在课程列表中显示教师

*默认值：`true`*


### `enable_tool_introduction`

**启用工具简介**

在每个工具的主页上启用简介

*默认值：`false`*


### `enable_unsubscribe_button_on_my_course_page`

**在「我的课程」中显示退选按钮**

在「我的课程」页面上添加从课程退选的按钮。

*默认值：`false`*

### `example_material_course_creation`

**课程创建时的示例材料**

创建新课程时自动创建示例材料

*默认值：`true`*


### `hide_course_rating`

**隐藏课程评分**

课程评分功能默认出现在多个位置。若您不需要，请启用此选项。

*默认值：`false`*

### `hide_course_sidebar`

**在侧边栏中隐藏课程区块**

在左侧菜单可见的屏幕上，不显示「课程」部分。

*默认值：`true`*

### `multiple_access_url_show_shared_course_marker`

**显示多 URL 共享课程标记**

为在多个 URL 之间共享的课程添加链接图标，以便用户（尤其是教师）在编辑课程内容时知道需要特别小心。

*默认值：`false`*

### `my_courses_show_courses_in_user_language_only`

**仅显示用户语言的课程**

若启用，此选项将隐藏所有未设置为用户语言的课程。

*默认值：`false`*

### `profiling_filter_adding_users`

**按个人资料字段筛选课程订阅用户**

允许教师在将用户订阅到其课程的页面上，根据扩展字段筛选用户。

*默认值：`false`*


### `resource_sequence_show_dependency_in_course_intro`

**在课程简介中显示依赖关系**

在对课程或学期使用资源排序时，在课程主页上显示该课程的依赖关系。

*默认值：`false`*

### `scorm_cumulative_session_time`

**SCORM 累计会话时间**

启用后，SCORM 学习路径的会话时间将累计计算；否则，仅从上次更新时间起计算。此为全局设置。在创建新学习路径时使用，之后可为每个学习路径单独重新定义。

*默认值：`true`*


### `send_email_to_admin_when_create_course`

**课程创建时的电子邮件提醒**

每当教师创建新课程时，向平台管理员发送电子邮件

*默认值：`false`*


### `show_course_duration`

**显示课程时长**

在课程目录和课程列表中，于课程标题旁显示课程时长。

*默认值：`false`*

### `show_navigation_menu`

**显示课程导航菜单**

显示可加快工具访问的导航菜单

*默认值：`false`*


### `show_toolshortcuts`

**工具快捷方式**

是否在横幅中显示工具快捷方式？

*默认值：`false`*

### `student_view_enabled`

**启用学习者视图**

启用学习者视图，使教师或管理员能够以学习者视角查看课程

*默认值：`true`*


### `view_grid_courses`

**以网格布局查看课程**

以每行显示多门课程的布局查看课程。否则，布局将每行仅显示一门课程。

*默认值：`true`*