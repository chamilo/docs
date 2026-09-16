# 学习路径设置

**学习路径**工具的默认值与行为——自动启动、默认视图、先决条件、SCORM 行为等。

可在 **管理 > 配置设置 > 学习路径** 下访问这些设置。此分类包含 **51 项设置**，下方列出平台设置固件（`SettingsCurrentFixtures.php`）中附带的标题与说明。

> 代码中的变量名以等宽字体显示。在通过 API 编写脚本，或需要通过编辑 [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) 在全局层面更改这些设置时，请使用该名称。

## 设置

### `add_all_files_in_lp_export`

**导出学习路径时导出所有文件**

导出学习路径时，与 HTML 位于同一路径下的所有文件和文件夹也会一并导出。

*默认值：`false`*


### `allow_htaccess_import_from_scorm`

**允许来自 SCORM 包的 .htaccess**

通常，在 Chamilo 中导入内容时，所有 .htaccess 文件都会被过滤并移除。此功能允许在 SCORM 包中存在 .htaccess 时将其导入。

*默认值：`false`*


### `allow_import_scorm_package_in_course_builder`

**课程导入中的 SCORM 导入**

启用后，在还原课程（通过课程维护工具）时复制 SCORM 包的目录结构。

*默认值：`false`*


### `allow_lp_chamilo_export`

**以 Chamilo 备份格式导出学习路径**

启用将任意学习路径导出为 Chamilo 课程备份格式的功能。

*默认值：`false`*


### `allow_lp_return_link`

**显示学习路径返回链接**

禁用此选项可隐藏学习路径中的“返回主页”按钮

*默认值：`true`*


### `allow_lp_subscription_to_usergroups`

**班级的学习路径订阅**

启用将学习路径及学习路径分类订阅到群组/班级。

*默认值：`false`*


### `allow_session_lp_category`

**可在学期中管理学习路径分类**

[推断] 使学习者和教师能够在学期课程中按分类组织和管理学习路径。

*默认值：`false`*


### `allow_teachers_to_access_blocked_lp_by_prerequisite`

**教师可访问被阻止的学习路径**

教师无需完成整个学习路径即可访问因先决条件而被阻止的学习路径。

*默认值：`false`*


### `disable_js_in_lp_view`

**在学习路径视图中禁用 JS**

禁用 Chamilo 通常在学习路径中向 HTML 文件添加的 JS 文件（在显示它们时）。

*默认值：`false`*


### `disable_my_lps_page`

**隐藏“我的学习路径”页面**

“我的学习路径”页面于 1.11 版本添加。使用此选项可将其隐藏。

*默认值：`false`*

### `download_files_after_all_lp_finished`

**完成学习路径后显示下载按钮**

完成所有学习路径后显示下载文件按钮。示例：若 ABC 为课程代码，1 和 100 为文档 ID，则选择：['courses' => ['ABC' => [1, 100]]]。

### `force_edit_exercise_in_lp`

**编辑包含在学习路径中的测验**

即使测验已被包含在学习路径中，也允许编辑。默认情况下，若测验位于学习路径中则禁止编辑，因为若测验修改幅度较大，可能影响众多学习者跟踪数据的一致性。

*默认值：`false`*

### `hide_accessibility_label_on_lp_item`

**隐藏学习路径中的要求标签**

隐藏学习路径项目上的先决条件提示。这主要是美观方面的选择。

*默认值：`true`*

### `hide_lp_time`

**隐藏学习路径记录中的时间**

在报告中总体上隐藏学习路径所用时间。

*默认值：`false`*

### `hide_scorm_copy_link`

**隐藏 SCORM 复制**

从学习路径列表中隐藏学习路径复制图标

*默认值：`false`*

### `hide_scorm_export_link`

**隐藏 SCORM 导出**

从学习路径列表中隐藏 SCORM 导出图标

*默认值：`false`*

### `hide_scorm_pdf_link`

**隐藏学习路径 PDF 导出**

从学习路径列表中隐藏学习路径 PDF 导出图标

*默认值：`true`*

### `lp_allow_export_to_students`

**学习者可导出学习路径**

启用此选项以允许学习者将学习路径下载为 SCORM 包。

*默认值：`false`*

### `lp_enable_flow`

**在学习路径之间导航**

增加选择“下一个”学习路径的功能，并在学习路径内显示按钮以便从一个路径转到下一个。

*默认值：`false`*

### `lp_fixed_encoding`

**学习路径中的固定编码**

通过忽略对已导入学习路径中文本编码的检查来降低资源占用。

*默认值：`false`*

### `lp_item_prerequisite_dates`

**基于日期的学习路径项目先决条件**

增加为学习路径项目定义带开始和结束日期的先决条件的选项。

*默认值：`false`*

### `lp_menu_location`

**学习路径菜单位置**

将此项设为 'left' 或 'right'，以更改学习路径菜单所在的一侧。

*默认值：`left`*

### `lp_minimum_time`

**完成学习路径的最短时间**

为学习路径添加最短时间字段。若用户在该学习路径上花费的时间未达到该时长，则无法完成学习路径的最后一项。

*默认值：`false`*

### `lp_prerequisit_on_quiz_unblock_if_max_attempt_reached`

**测验先决条件达到最大尝试次数时解锁学习路径项目**

[推断] 当学习者对作为先决条件的测验用尽最大尝试次数时，自动解锁后续学习路径项目。


### `lp_prerequisite_on_quiz_unblock_if_max_attempt_reached`

**最后一次测验尝试后解锁先决条件**

允许用户在用尽作为其他项目先决条件的测验的全部尝试次数后，继续学习路径。

*默认值：`false`*

### `lp_prerequisite_use_last_attempt_only`

**学习路径测验先决条件使用最后一次成绩**

当测验被用作学习路径中某项目的先决条件时，仅使用该测验的最后一次尝试作为先决条件的验证依据（默认使用最佳尝试）。

*默认值：`false`*

### `lp_prevents_beforeunload`

**在学习路径中阻止 beforeunload JS 事件**

通过阻止棘手的 JS 事件执行，有助于提升浏览器兼容性。

*默认值：`false`*

### `lp_score_as_progress_enable`

**将学习路径成绩用作进度**

在使用仅含一个大型 SCO 的 SCORM 内容时很有用。SCORM 不传递进度，因此这是一种将成绩用作进度的变通方法。启用此选项后，可按学习路径单独配置。

*默认值：`false`*

### `lp_show_max_progress_instead_of_average`

**学习路径报告显示最大进度而非平均值**

[推断] 根据项目完成情况的最大值计算学习路径进度，而非对所有项目取平均。

*默认值：`false`*

### `lp_show_max_progress_or_average_enable_course_level_redefinition`

**在课程级别选择学习路径显示最大进度或平均值**

允许在课程级别重新定义该设置，以便在学习路径报告中显示最佳进度而非平均值。

*默认值：`false`*

### `lp_show_reduced_report`

**学习路径：显示精简报告**

在学习路径工具中，当用户（通过统计图标）查看自己的进度时，显示缩短（细节较少）版本的进度报告。

*默认值：`false`*

### `lp_start_and_end_date_visible_in_student_view`

**向学习者显示学习路径可用时间**

向学习者显示学习路径及其可用日期，而不是在日期到来之前将其隐藏。

*默认值：`false`*

### `lp_subscription_settings`

**学习路径订阅设置**

配置学习路径订阅功能的附加选项。选项包括 'allow_add_users_to_lp' 和 'allow_add_users_to_lp_category'。

### `lp_view_accordion`

**可折叠的学习路径项目**

[推断] 以可折叠手风琴格式显示学习路径项目，以改善导航和内容组织。

*默认值：`false`*

### `lp_view_settings`

**学习路径显示设置**

配置学习路径显示的附加选项。选项包括 'show_reporting_icon'、'hide_lp_arrow_navigation'、'show_toolbar_by_default'、'navigation_in_the_middle' 和 'add_extra_quit_to_home_icon'。

### `scorm_api_extrafield_to_use_as_student_id`

**在 SCORM 通信中将扩展字段用作 student\_id**

给出要在所有 SCORM 通信中用作 student_id 的扩展字段名称。

### `scorm_api_username_as_student_id`

**在 SCORM 通信中将用户名用作 student\_id**

[推断] 在 SCORM API 通信中使用学习者用户名作为学生标识符，而非学习者 ID。

*默认值：`false`*

### `scorm_lms_update_sco_status_all_time`

**自主更新 SCO 状态**

若 SCO 未发送状态，则接管并根据 Chamilo 中可观察到的情况更新状态。

*默认值：`false`*

### `scorm_upload_from_cache`

**从缓存目录上传 SCORM**

允许管理员将 SCORM 包（zip 形式）上传到缓存目录，并在 SCORM 上传页面将其用作导入源。

*默认值：`false`*

### `show_hidden_exercise_added_to_lp`

**即使不可见也显示来自学习路径的测验**

在测验列表中显示已添加到学习路径的隐藏测验。若处于学期中，测验在基础课程中不可见、已包含在学习路径中，且未专门将显示设置设为 true，则将其隐藏。

*默认值：`true`*

### `show_invisible_exercise_in_lp_list`

**即使不可见也在学习路径测验列表中显示测验**

[推断] 查看学习路径内容时，在可用测验列表中包含隐藏测验。

*默认值：`false`*

### `show_invisible_exercise_in_lp_toc`

**学习路径中显示不可见测验**

使测验工具中标记为“不可见”的测验在被纳入学习路径时仍然显示。

*默认值：`false`*

### `show_invisible_lp_in_course_home`

**学习路径不可见时仍在课程主页显示链接**

若学习路径被设为不可见，但教师/辅导教师决定从课程主页提供访问，此选项可防止 Chamilo 隐藏课程主页上的该链接。

*默认值：`false`*

### `show_prerequisite_as_blocked`

**学习路径的先修条件**

在学习路径列表中显示可视化元素，以表明其他学习路径当前因某项先修规则而被锁定。

*默认值：`false`*

### `student_follow_page_add_lp_acquisition_info`

**在学习者跟进中添加掌握情况列**

在学习者跟进页面添加一列，显示学习者对某学习路径的掌握状态。

*默认值：`false`*

### `student_follow_page_add_lp_invisible_checkbox`

**在学习者跟进页面添加学习路径可见性信息**

[推断] 在学习者进度跟踪页面显示学习路径的可见性状态指示。

*默认值：`false`*

### `student_follow_page_add_LP_subscription_info`

**学习路径列表中的解锁信息**

若学习者已订阅给定学习路径并拥有访问权限，则在学习路径列表中添加“已解锁”列。

*默认值：`false`*

### `student_follow_page_hide_lp_tests_average`

**在学习者跟进中隐藏学习路径测验平均分的百分号**

在学生跟踪中隐藏“学习路径测验平均分”指示中的百分号图标。

*默认值：`false`*

### `student_follow_page_include_not_subscribed_lp_students`

**在学习者跟进页面包含未订阅的学习路径**

[推断] 即使学习者未订阅，也在进度页面显示学习路径。

*默认值：`false`*

### `ticket_lp_quiz_info_add`

**在工单报告中添加学习路径与测验信息**

[推断] 在支持工单报告中包含学习路径和测验信息，以便更好地跟踪问题。

*默认值：`false`*

### `validate_lp_prerequisite_from_other_session`

**使用其他学期中的学习路径项目状态**

若对应项目已在另一学期中完成，则允许用户完成学习路径中的先修条件。

*默认值：`false`*