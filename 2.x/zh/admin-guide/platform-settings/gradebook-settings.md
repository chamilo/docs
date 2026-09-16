# 成绩册（评估）设置

适用于**成绩册（评估）**工具的默认设置——分数显示、小数精度、证书分数阈值和汇总。

在**管理 > 配置设置 > 成绩册（评估）**下访问这些设置。此类别包含**34个设置**，以下列出平台设置固定数据（`SettingsCurrentFixtures.php`）中提供的标题和注释。

> 代码中的变量名以等宽字体显示。在通过API进行脚本编写或需要通过编辑[`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) 在全局级别更改这些设置时使用它。

## 设置

### `allow_gradebook_comments`

**成绩册评论**

启用成绩册评论，以便教师可以对学习者在课程中的整体表现添加评论。评论将显示在学习者的PDF导出文件中。

*默认值：`false`*

### `allow_gradebook_stats`

**在成绩册中缓存结果**

将一些大型平均值计算放入缓存字段中，用于链接和评估，以提高速度（显著）。潜在的负面影响是刷新成绩册结果表可能需要一些时间。

*默认值：`false`*

### `gradebook_badge_sidebar`

**成绩册徽章侧边栏**

在侧边菜单中生成一个块，显示一些待批准的徽章。需要在此处按（数字）ID列出成绩册。

### `gradebook_default_grade_model_id`

**默认评分模型**

创建课程时默认选择此值

### `gradebook_default_weight`

**成绩册默认权重**

此权重将默认用于所有课程

*默认值：`100`*

### `gradebook_dependency`

**成绩册间依赖关系**

启用成绩册依赖机制，让人们知道在完成成绩册之前需要先完成哪些其他项目。

*默认值：`false`*

### `gradebook_dependency_mandatory_courses`

**成绩册依赖的必修课程**

在使用成绩册间依赖时，可以选择一个必修课程列表，这些课程将在批准任何有依赖关系的成绩册之前要求完成。

### `gradebook_detailed_admin_view`

**在成绩册中显示额外列**

在学生的成绩册视图中显示额外列，包括所有学生的最高分、查看报告的学生的相对位置以及整个学生群体的平均分。

*默认值：`false`*

### `gradebook_display_extra_stats`

**成绩册额外统计**

在成绩册主报告中添加额外列（1 = 排名，2 = 最高分，3 = 平均值）。

### `gradebook_enable`

**评估工具激活**

评估工具允许您通过将课堂和在线活动评估合并到绩效报告中来评估组织中的能力。您要激活它吗？

*默认值：`true`*

### `gradebook_enable_grade_model`

**启用成绩册模型**

根据成绩册模型启用课程内成绩册类别的自动创建。

*默认值：`false`*

### `gradebook_enable_subcategory_skills_independant_assignement`

**启用成绩册子类别的技能**

技能通常因完成整个成绩册而获得。启用此选项后，允许将技能附加到成绩册的子部分。

*默认值：`false`*

### `gradebook_flatview_extrafields_columns`

**成绩册平面视图中的用户额外字段**

将给定的列（'variables' 数组）添加到成绩册的主结果表中。

### `gradebook_hide_graph`

**隐藏成绩册图表**

如果您的门户资源有限，减少生成可能包含数千个结果的动态成绩册图表是一个不错的选择。

*默认值：`false`*

### `gradebook_hide_link_to_item_for_student`

**对学习者隐藏成绩册中的项目链接**

通过移除项目上的链接，避免学习者从成绩册中点击项目。

*默认值：`false`*

### `gradebook_hide_pdf_report_button`

**隐藏成绩册“下载PDF报告”按钮**

从学习者的成绩册视图中移除PDF导出按钮。

*默认值：`false`*

### `gradebook_hide_table`

**对学习者隐藏成绩册表格**

通过隐藏结果表（但仍允许访问证书、技能等）来减少成绩册加载时间。

*默认值：`false`*

---
### `gradebook_locking_enabled`

**启用教师对评估的锁定功能**

启用此选项后，相应课程的教师将能够锁定任何评估。这将防止教师在评估中使用的资源（考试、学习路径、任务等）内修改结果。唯一有权解锁已锁定评估的角色是管理员。教师将被告知这一可能性。成绩簿的锁定和解锁将被记录在系统的重要活动报告中。

*默认值：`false`*

### `gradebook_multiple_evaluation_attempts`

**允许在成绩簿中进行多次评估尝试**

允许在成绩簿和结果表中为多次评估尝试添加评论。

*默认值：`false`*

### `gradebook_number_decimals`

**小数位数**

允许设置分数中允许的小数位数。

*默认值：`0`*

### `gradebook_pdf_export_settings`

**成绩簿PDF导出选项**

根据提供的设置（'hide_score_weight'、'hide_feedback_textarea'等）更改学习者的PDF导出内容。

### `gradebook_report_score_style`

**成绩簿报告分数样式**

在平面视图中添加成绩簿分数样式配置。有关选项，请参见 api.lib.php，例如：SCORE_DIV = 1, SCORE_PERCENT = 2 等。

*默认值：`1`*

### `gradebook_score_display_colorsplit`

**阈值**

分数低于此阈值（百分比）时将显示为红色。

*默认值：`50`*

### `gradebook_score_display_custom`

**能力等级标签**

勾选此框以启用能力等级标签。

*默认值：`false`*

### `gradebook_score_display_custom_standalone`

**成绩簿独立列中的自定义分数显示**

在使用自定义分数显示时，在成绩簿平面视图中以单独列显示自定义能力等级值。

*默认值：`false`*

### `gradebook_score_display_upperlimit`

**显示分数上限**

勾选此框以显示分数的上限。

*默认值：`false`*

### `gradebook_use_apcu_cache`

**使用APCu缓存加速成绩簿**

使用Doctrine APCU缓存提高成绩簿学生报告的渲染速度。APCu是一个可选但推荐的PHP扩展。

*默认值：`true`*

### `gradebook_use_exercise_score_settings_in_categories`

**使用测试设置进行成绩显示**

将练习分数显示设置（百分比或分数）应用于成绩簿中的类别分数。

*默认值：`true`*

### `gradebook_use_exercise_score_settings_in_total`

**在成绩簿中使用全局分数显示设置**

将全局练习分数显示设置应用于成绩簿中的总分计算。

*默认值：`false`*

### `hide_gradebook_percentage_user_result`

**隐藏最佳/平均成绩簿结果中的百分比**

从学习者在成绩簿中看到的最佳/平均分数结果中移除百分比显示。

*默认值：`true`*

### `my_display_coloring`

**在成绩簿中显示分数颜色**

启用颜色编码以提高成绩簿中分数的可见性。

*默认值：`false`*

### `student_publication_to_take_in_gradebook`

**成绩簿中考虑的作业**

在作业工具中，学生可以上传多个文件。如果单个作业有多个文件，在成绩簿中排名时应考虑哪个文件？这取决于您的教学方法。使用 'first' 强调对细节的关注（例如按时提交和首先处理正确的工作）。使用 'last' 强调协作和适应性工作。

*默认值：`first`*

### `teachers_can_change_grade_model_settings`

**教师可以更改成绩簿模型设置**

在编辑成绩簿时。

*默认值：`true`*

### `teachers_can_change_score_settings`

**教师可以更改成绩簿分数设置**

在编辑成绩簿设置时。

*默认值：`true`*