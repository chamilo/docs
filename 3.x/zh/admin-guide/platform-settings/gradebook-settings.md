# 成绩册（评估）设置

应用于整个 **成绩册（评估）** 工具的默认值 — 分数显示、小数精度、证书分数阈值以及汇总方式。

可在 **管理 > 配置设置 > 成绩册（评估）** 下访问这些设置。此类别包含 **34 项设置**，下方列出平台设置固件（`SettingsCurrentFixtures.php`）中附带的标题与说明。

> 代码中的变量名以等宽字体显示。在通过 API 编写脚本，或需要通过编辑 [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) 在全局层面更改这些设置时，请使用该名称。

## 设置

### `allow_gradebook_comments`

**成绩册评语**

启用成绩册评语，以便教师可为学习者在本课程中的整体表现添加评语。该评语将出现在面向学习者的 PDF 导出中。

*默认值：`false`*


### `allow_gradebook_stats`

**在成绩册中缓存结果**

将部分大规模平均值计算放入链接与评价的缓存字段，以显著提升速度。潜在负面影响是刷新成绩册结果表可能需要一定时间。

*默认值：`false`*

### `gradebook_badge_sidebar`

**成绩册徽章侧边栏**

在侧边菜单中生成一个区块，用于显示若干待审批的徽章。需要在此按（数字）ID 列出成绩册。

### `gradebook_default_grade_model_id`

**默认成绩模型**

创建课程时将默认选中此值

### `gradebook_default_weight`

**成绩册默认权重**

此权重将默认用于所有课程

*默认值：`100`*

### `gradebook_dependency`

**成绩册间依赖**

启用成绩册依赖机制，让学习者了解完成该成绩册前需要先完成哪些其他项目。

*默认值：`false`*


### `gradebook_dependency_mandatory_courses`

**成绩册依赖的必修课程**

使用成绩册间依赖时，可选择一份必修课程列表，在批准任何带有依赖的成绩册之前必须完成这些课程。

### `gradebook_detailed_admin_view`

**在成绩册中显示附加列**

在成绩册的学生视图中显示附加列，包括全体学生的最佳分数、查看报告的学生的相对名次，以及全体学生的平均分。

*默认值：`false`*


### `gradebook_display_extra_stats`

**成绩册额外统计**

在成绩册主报告中添加附加列（1 = 排名，2 = 最佳分数，3 = 平均分）。

### `gradebook_enable`

**评估工具激活**

评估工具可将课堂与在线活动评价合并到绩效报告中，从而评估组织内的能力。是否要激活该工具？

*默认值：`true`*


### `gradebook_enable_grade_model`

**启用成绩册模型**

根据成绩册模型，在课程内自动创建成绩册类别。

*默认值：`false`*

### `gradebook_enable_subcategory_skills_independant_assignement`

**按成绩册子类别启用技能**

技能通常在完成整个成绩册后授予。启用此选项后，可将技能附加到成绩册的子部分。

*默认值：`false`*


### `gradebook_flatview_extrafields_columns`

**成绩册平面视图中的用户扩展字段**

将给定列（'variables' 数组）添加到成绩册的主结果表中。

### `gradebook_hide_graph`

**隐藏成绩册图表**

如果门户资源有限，减少生成可能包含数千条结果的动态成绩册图表是较好的选择。

*默认值：`false`*


### `gradebook_hide_link_to_item_for_student`

**对学习者隐藏成绩册中的项目链接**

通过移除项目上的链接，避免学习者从成绩册点击进入各项目。

*默认值：`false`*


### `gradebook_hide_pdf_report_button`

**隐藏成绩册“下载 PDF 报告”按钮**

从面向学习者的成绩册视图中移除 PDF 导出按钮。

*默认值：`false`*


### `gradebook_hide_table`

**对学习者隐藏成绩册表格**

通过隐藏结果表来缩短成绩册加载时间（但仍可访问证书、技能等）。

*默认值：`false`*

### `gradebook_locking_enabled`

**启用教师锁定评估**

启用后，此选项将允许相应课程的教师锁定任何评估。这会进而阻止教师在评估所用资源（考试、学习路径、任务等）内修改成绩。唯一有权解锁已锁定评估的角色是管理员。系统会向教师告知此可能性。成绩册的锁定与解锁将记录在系统的重要活动报告中。

*默认值：`false`*

### `gradebook_multiple_evaluation_attempts`

**允许成绩册中的多次评估尝试**

允许在成绩册和成绩表中为多次评估尝试添加评语。

*默认值：`false`*


### `gradebook_number_decimals`

**小数位数**

允许您设置分数中允许的小数位数

*默认值：`0`*

### `gradebook_pdf_export_settings`

**成绩册 PDF 导出选项**

根据所提供的设置更改面向学习者的 PDF 导出（'hide_score_weight'、'hide_feedback_textarea' 等）

### `gradebook_report_score_style`

**成绩册报告分数样式**

在平面视图中添加成绩册分数样式配置。请参阅 api.lib.php 以查找选项：例如 SCORE_DIV = 1、SCORE_PERCENT = 2 等

*默认值：`1`*


### `gradebook_score_display_colorsplit`

**阈值**

低于该阈值（以 % 计）的分数将显示为红色

*默认值：`50`*


### `gradebook_score_display_custom`

**能力等级标注**

勾选此框以启用能力等级标注

*默认值：`false`*


### `gradebook_score_display_custom_standalone`

**成绩册独立列中的自定义分数显示**

在使用自定义分数显示时，于成绩册平面视图的单独列中显示自定义能力等级值。

*默认值：`false`*


### `gradebook_score_display_upperlimit`

**显示分数上限**

勾选此框以显示分数的上限

*默认值：`false`*


### `gradebook_use_apcu_cache`

**使用 APCu 缓存以加速成绩册**

使用 Doctrine APCU 缓存提升呈现成绩册学生报告时的速度。APCu 是可选但推荐的 PHP 扩展。

*默认值：`true`*


### `gradebook_use_exercise_score_settings_in_categories`

**使用测验设置显示成绩**

将练习分数显示设置（百分比与分数）应用于成绩册中的类别分数。

*默认值：`true`*


### `gradebook_use_exercise_score_settings_in_total`

**在成绩册中使用全局分数显示设置**

将全局练习分数显示设置应用于成绩册中的总分计算。

*默认值：`false`*


### `hide_gradebook_percentage_user_result`

**在最佳/平均成绩册结果中隐藏百分比**

从向学习者显示的成绩册最佳/平均分结果中移除百分比显示。

*默认值：`true`*


### `my_display_coloring`

**在成绩册中为分数显示颜色**

启用颜色编码，以便在成绩册中更清晰地查看分数。

*默认值：`false`*


### `student_publication_to_take_in_gradebook`

**计入成绩册的作业**

在作业工具中，学生可以上传多个文件。若同一作业有多个文件，在成绩册中排名时应考虑哪一个？这取决于您的教学方法。使用 'first' 以强调对细节的关注（如按时提交并首先提交正确作业）。使用 'last' 以突出协作与适应性工作。

*默认值：`first`*


### `teachers_can_change_grade_model_settings`

**教师可以更改成绩册模型设置**

在编辑成绩册时

*默认值：`true`*


### `teachers_can_change_score_settings`

**教师可以更改成绩册分数设置**

在编辑成绩册设置时

*默认值：`true`*