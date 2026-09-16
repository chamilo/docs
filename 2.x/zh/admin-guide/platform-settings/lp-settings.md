# 学习路径设置

**学习路径**工具的默认设置和行为——自动启动、默认视图、前置条件、SCORM 行为等。

在 **管理 > 配置设置 > 学习路径** 下访问这些设置。此类别包含 **51 个设置**，以下列出平台设置固定数据 (`SettingsCurrentFixtures.php`) 中提供的标题和注释。

> 代码中的变量名以等宽字体显示。在通过 API 进行脚本编写或需要通过编辑 [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) 在全局级别更改这些设置时使用它。

## 设置

### `add_all_files_in_lp_export`

**导出学习路径时导出所有文件**

导出学习路径时，HTML 文件所在路径中的所有文件和文件夹也将被导出。

*默认值：`false`*

### `allow_htaccess_import_from_scorm`

**允许从 SCORM 包中导入 .htaccess 文件**

通常，在 Chamilo 中导入内容时，所有 .htaccess 文件都会被过滤和删除。此功能允许在 SCORM 包中存在 .htaccess 文件时将其导入。

*默认值：`false`*

### `allow_import_scorm_package_in_course_builder`

**课程导入中的 SCORM 导入**

启用此选项后，在恢复课程（通过课程维护工具）时会复制 SCORM 包的目录结构。

*默认值：`false`*

### `allow_lp_chamilo_export`

**以 Chamilo 备份格式导出学习路径**

启用此选项后，可以将您的任何学习路径导出为 Chamilo 课程备份格式。

*默认值：`false`*

### `allow_lp_return_link`

**显示学习路径返回链接**

禁用此选项以隐藏学习路径中的“返回首页”按钮。

*默认值：`true`*

### `allow_lp_subscription_to_usergroups`

**班级订阅学习路径**

启用对学习路径和学习路径类别的组/班级订阅。

*默认值：`false`*

### `allow_session_lp_category`

**会话中可以管理学习路径类别**

[推测] 启用学习者和教师在会话课程中按类别组织和管理学习路径。

*默认值：`false`*

### `allow_teachers_to_access_blocked_lp_by_prerequisite`

**教师可以访问被前置条件阻止的学习路径**

教师无需完成学习路径即可访问被前置条件阻止的学习路径。

*默认值：`false`*

### `disable_js_in_lp_view`

**在学习路径视图中禁用 JS**

禁用 Chamilo 通常在学习路径中添加到 HTML 文件的 JS 文件（在显示时）。

*默认值：`false`*

### `disable_my_lps_page`

**隐藏“我的学习路径”页面**

“我的学习路径”页面在 1.11 版本中添加。使用此选项可隐藏该页面。

*默认值：`false`*

### `download_files_after_all_lp_finished`

**完成所有学习路径后显示下载按钮**

在完成所有学习路径后显示下载文件按钮。例如：如果 ABC 是课程代码，1 和 100 是文档 ID，则选择：['courses' => ['ABC' => [1, 100]]]。

### `force_edit_exercise_in_lp`

**编辑包含在学习路径中的测试**

即使测试已包含在学习路径中，也启用编辑测试。默认情况下，如果测试在学习路径中，则禁止编辑，因为如果测试修改较大，可能会影响众多学习者的跟踪一致性。

*默认值：`false`*

### `hide_accessibility_label_on_lp_item`

**在学习路径项目中隐藏要求标签**

在学习路径项目上隐藏前置条件工具提示。这主要是一个美学选择。

*默认值：`true`*

### `hide_lp_time`

**在学习路径记录中隐藏时间**

在报告中隐藏学习路径所花费的时间。

*默认值：`false`*

### `hide_scorm_copy_link`

**隐藏 SCORM 复制**

从学习路径列表中隐藏学习路径复制图标。

*默认值：`false`*

### `hide_scorm_export_link`

**隐藏 SCORM 导出**

从学习路径列表中隐藏 SCORM 导出图标。

*默认值：`false`*

### `hide_scorm_pdf_link`

**隐藏学习路径 PDF 导出**

从学习路径列表中隐藏学习路径 PDF 导出图标。

*默认值：`true`*

### `lp_allow_export_to_students`

**学习者可以导出学习路径**

启用此选项后，允许学习者将学习路径下载为 SCORM 包。

*默认值：`false`*

### `lp_enable_flow`

**在学习路径之间导航**

添加选择“下一个”学习路径的可能性，并在学习路径内部显示按钮以从一个学习路径移动到下一个。

*默认值：`false`*

### `lp_fixed_encoding`

**学习路径中的固定编码**

通过忽略对导入学习路径中文本编码的检查来减少资源使用。

*默认值：`false`*

### `lp_item_prerequisite_dates`

**基于日期的学习路径项目前置条件**

添加为学习路径项目定义具有开始和结束日期的前置条件的选项。

*默认值：`false`*

### `lp_menu_location`

**学习路径菜单位置**

将此设置为 'left' 或 'right' 以更改学习路径菜单所在的一侧。

*默认值：`left`*

### `lp_minimum_time`

**完成学习路径的最短时间**

为学习路径添加一个最短时间字段。如果用户在学习路径上花费的时间不足，则无法完成学习路径的最后一个项目。

*默认值：`false`*

### `lp_prerequisit_on_quiz_unblock_if_max_attempt_reached`

**测试前置条件达到最大尝试次数时解锁学习路径项目**

[推测] 当学习者在作为前置条件的测试中用尽最大尝试次数时，自动解锁后续的学习路径项目。

### `lp_prerequisite_on_quiz_unblock_if_max_attempt_reached`

**最后一次测试尝试后解锁前置条件**

允许用户在用尽作为其他项目前置条件的测试的所有尝试次数后，继续学习路径。

*默认值：`false`*

### `lp_prerequisite_use_last_attempt_only`

**在学习路径测试前置条件中使用最后一次得分**

当测试作为学习路径中某个项目的前置条件时，仅使用测试的最后一次尝试作为前置条件的验证（默认使用最佳尝试）。

*默认值：`false`*

### `lp_prevents_beforeunload`

**在学习路径中阻止 beforeunload JS 事件**

这有助于浏览器兼容性，防止执行复杂的 JS 事件。

*默认值：`false`*

### `lp_score_as_progress_enable`

**将学习路径得分用作进度**

当使用只有单个大型 SCO 的 SCORM 内容时，此选项很有用。SCORM 不会传递进度信息，因此这是一个将得分用作进度的技巧。启用此选项后，您可以在每个学习路径的基础上进行配置。

*默认值：`false`*

### `lp_show_max_progress_instead_of_average`

**在学习路径报告中显示最大进度而非平均值**

[推测] 基于最大项目完成情况而非所有项目的平均值来计算学习路径进度。

*默认值：`false`*

### `lp_show_max_progress_or_average_enable_course_level_redefinition`

**在课程级别选择学习路径的最大进度或平均值**

启用在课程级别重新定义设置，以在学习路径报告中显示最佳进度而非平均值。

*默认值：`false`*

### `lp_show_reduced_report`

**学习路径：显示简化报告**

在学习路径工具中，当用户通过统计图标查看自己的进度时，显示简化的（较少细节的）进度报告。

*默认值：`false`*

### `lp_start_and_end_date_visible_in_student_view`

**向学习者显示学习路径的可用性**

向学习者显示学习路径及其可用日期，而不是在日期到来之前隐藏它们。

*默认值：`false`*

### `lp_subscription_settings`

**学习路径订阅设置**

配置学习路径订阅功能的额外选项。选项包括 'allow_add_users_to_lp' 和 'allow_add_users_to_lp_category'。

### `lp_view_accordion`

**可折叠的学习路径项目**

[推测] 以可折叠的手风琴格式显示学习路径项目，以改善导航和内容组织。

*默认值：`false`*

### `lp_view_settings`

**学习路径显示设置**

配置学习路径显示的额外选项。选项包括 'show_reporting_icon'、'hide_lp_arrow_navigation'、'show_toolbar_by_default'、'navigation_in_the_middle' 和 'add_extra_quit_to_home_icon'。

### `scorm_api_extrafield_to_use_as_student_id`

**在 SCORM 通信中使用额外字段作为 student_id**

提供用于在所有 SCORM 通信中作为 student_id 的额外字段名称。

### `scorm_api_username_as_student_id`

**在 SCORM 通信中使用用户名作为 student_id**

[推测] 在 SCORM API 通信中使用学习者的用户名作为学生标识符，而非学习者 ID。

*默认值：`false`*

### `scorm_lms_update_sco_status_all_time`

**自主更新 SCO 状态**

如果 SCO 未发送状态，则接管并根据在 Chamilo 中观察到的内容更新状态。

*默认值：`false`*

### `scorm_upload_from_cache`

**从缓存目录上传 SCORM**

允许管理员将 SCORM 包（以 zip 形式）上传到缓存目录，并在 SCORM 上传页面上将其用作导入源。

*默认值：`false`*

### `show_hidden_exercise_added_to_lp`

**即使不可见也显示添加到学习路径的测试**

在练习列表中显示已添加到学习路径的隐藏练习。如果我们在会话中，测试在基础课程中不可见，且包含在学习路径中，并且未明确设置为显示，则隐藏它。

*默认值：`true`*

### `show_invisible_exercise_in_lp_list`

**即使不可见也在学习路径测试列表中显示测试**

[推测] 在查看学习路径内容时，在可用测试列表中包含隐藏的测试。

*默认值：`false`*

---
### `show_invisible_exercise_in_lp_toc`

**学习路径中显示不可见的测试**

使在测试工具中标记为“不可见”的测试在包含于学习路径时显示出来。

*默认值：`false`*

### `show_invisible_lp_in_course_home`

**在课程首页显示不可见学习路径的链接**

如果学习路径设置为不可见，但教师/教练决定在课程首页上使其可用，此选项可防止Chamilo在课程首页上隐藏该链接。

*默认值：`false`*

### `show_prerequisite_as_blocked`

**学习路径的前提条件**

在学习路径列表中，显示一个视觉元素以表明其他学习路径当前因某些前提条件规则而被阻止。

*默认值：`false`*

### `student_follow_page_add_LP_acquisition_info`

**在学习者跟踪页面添加获取状态列**

在学习者跟踪页面添加一列，显示学习者在学习路径上的获取状态。

*默认值：`false`*

### `student_follow_page_add_LP_invisible_checkbox`

**在学习者跟踪页面添加学习路径的可见性信息**

在学习进度跟踪页面上显示学习路径的可见性状态指示器。

*默认值：`false`*

### `student_follow_page_add_LP_subscription_info`

**在学习路径列表中添加解锁信息**

如果学习者已订阅特定的学习路径并有权访问，此选项会在学习路径列表中添加一个“已解锁”列。

*默认值：`false`*

### `student_follow_page_hide_lp_tests_average`

**在学习者跟踪中隐藏学习路径测试平均值的百分比符号**

在学生跟踪页面上的“学习路径测试平均值”指示中隐藏百分比图标。

*默认值：`false`*

### `student_follow_page_include_not_subscribed_lp_students`

**在学习者跟踪页面包含未订阅的学习路径**

在进度页面上显示学习路径，即使学习者未订阅这些路径。

*默认值：`false`*

### `ticket_lp_quiz_info_add`

**在工单报告中添加学习路径和测试信息**

在支持工单报告中包含学习路径和测试信息，以便更好地跟踪问题。

*默认值：`false`*

### `validate_lp_prerequisite_from_other_session`

**使用其他会话中的学习路径项目状态**

允许用户完成学习路径中的前提条件，如果相应的项目已在另一个会话中完成。

*默认值：`false`*