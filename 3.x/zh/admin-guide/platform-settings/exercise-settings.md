# 练习（测验）设置

**练习（测验）** 工具的默认值与行为——题目显示、评分、作答次数等。

可在 **管理 > 配置设置 > 练习（测验）** 下访问这些设置。此类别包含 **64 项设置**，下方列出平台设置固件（`SettingsCurrentFixtures.php`）中附带的标题与说明。

> 代码中的变量名以等宽字体显示。通过 API 编写脚本，或需要通过编辑 [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) 在全局层面更改这些设置时，请使用该名称。

## 设置

### `add_exercise_best_attempt_in_report`

**启用最佳成绩作答的显示**

提供课程与测验 ID 列表，以便在报表中显示任意学员的最佳成绩作答。

### `allow_coach_feedback_exercises`

**允许辅导教师在审阅练习时发表评论**

允许辅导教师在审阅练习时编辑反馈

*默认值：`true`*

### `allow_edit_exercise_in_lp`

**允许教师编辑学习路径中的测验**

默认情况下，Chamilo 会阻止您编辑已包含在学习路径中的测验。这是为了避免改动导致学员（过去与未来）在学习路径的成绩和/或进度上受到不同影响。此选项允许教师绕过该限制。


### `allow_exercise_categories`

**启用测验类别**

测验类别默认未启用，因为它们会增加一层复杂度。启用此功能后，将显示所有与测验类别相关的管理图标。

*默认值：`false`*

### `allow_mandatory_question_in_category`

**启用必答题选择**

在使用随机类别时，允许在测验中选择必答题。

*默认值：`false`*

### `allow_notification_setting_per_exercise`

**测验级别的测验通知设置**

允许在测验级别而非课程级别配置测验提交通知。若未在测验级别定义，则回退到课程级别设置。

*默认值：`false`*

### `allow_quick_question_description_popup`

**快速向题目添加图片**

在测验题目列表中启用额外图标，以便将图片添加为题目说明。当题目内容在标题中、说明仅包含一张图片时，可大幅加快题目编辑速度。

*默认值：`false`*

### `allow_quiz_question_feedback`

**答错时添加题目反馈**

默认情况下，Chamilo 允许您为题目中的每个答案显示反馈。启用此选项后，将额外创建一个字段，用于向整道题目提供预定义反馈。该反馈仅在用户答错时出现。

*默认值：`false`*

### `allow_quiz_results_page_config`

**启用测验结果页配置**

定义要应用于所有测验结果页的设置数组。设置可以是 ‘hide_question_score’、‘hide_expected_answer’、‘hide_category_table’、‘hide_correct_answered_questions’、‘hide_total_score’，将来可能还有更多。请在代码中查找 ‘getPageConfigurationAttribute’ 以查看当前正在使用的项。

*默认值：`false`*

### `allow_quiz_show_previous_button_setting`

**在测验中显示“上一题”按钮以浏览题目**

将此项设为 false 可在测验作答时禁用“上一题”按钮，从而强制用户始终向前作答。

*默认值：`false`*

### `allow_teacher_comment_audio`

**对已提交答案的音频反馈**

允许教师通过音频（作为文本的替代方式）就测验中的每道题目向用户提供反馈。

*默认值：`true`*

### `allow_time_per_question`

**启用测验中的单题限时**

默认情况下，仅可限制整场测验的时间。按题目限时增加了额外一层可能性，您可以（谨慎地）将两者结合使用。

*默认值：`false`*

### `block_category_questions`

**锁定测验中先前类别的题目**

使用此选项时，测验配置中将出现一项额外选项。当测验包含多个题目类别并要求按类别分发时，这将允许用户按类别浏览题目。某一类别完成后，用户进入下一类别，且无法返回上一类别。

*默认值：`false`*

### `block_quiz_mail_notification_general_coach`

**阻止向总辅导教师发送测验通知**

学员完成测验后，通常会向辅导教师发送通知，包括总会话辅导教师。启用此选项可从这些通知中排除总辅导教师。

*默认值：`false`*

### `configure_exercise_visibility_in_course`

**启用以在基础课程级别绕过“会话中练习不可见”的配置**

启用后，可在基础课程中配置会话内练习的不可见性，以绕过全局配置。若未设置，则使用全局参数。

*默认值：`false`*

### `disable_clean_exercise_results_for_teachers`

**对教师禁用“清除结果”**

禁用从测验列表中删除测验结果的选项。当由不够谨慎的教师管理课程时经常使用此设置，以避免严重失误。

*默认值：`true`*

### `email_alert_manager_on_new_quiz`

**新测验的默认电子邮件提醒设置**

是否希望在学生作答测验时通过电子邮件通知课程管理者（教师）。此为所有新课程的默认值，但每位教师仍可在其课程中更改此设置。

*默认值：`true`*

### `enable_quiz_scenario`

**启用测验情景**

由此您将能够创建根据用户答案提出不同题目的练习。

*默认值：`true`*

### `exercise_additional_teacher_modify_actions`

**测验列表中面向教师的附加链接**

配置回调元素，以便在测验列表右侧为教师生成新的操作图标，形式为数组，例如 ['myplugin' => ['MyPlugin', 'urlGeneratorCallback']]

### `exercise_attempts_report_show_username`

**在测验结果页显示用户名**

在测验结果页显示用户名（替代或同时显示用户信息）。

*默认值：`false`*

### `exercise_category_report_user_extra_fields`

**在练习分类报告中添加用户扩展字段**

定义一个数组，列出要添加到报告中的用户扩展字段。

### `exercise_category_round_score_in_export`

**在测验导出中四舍五入分数**

启用后，导出练习报告时测验分数将四舍五入为最接近的整数。

*默认值：`false`*

### `exercise_embeddable_extra_types`

**可嵌入的题型**

默认情况下，在判断测验是否可嵌入视频时，仅考虑单选题和多选题。通过此选项，您可以决定提供更多题型。请注意，并非所有题型都能很好地适配分配给视频的空间。题型在代码 question.class.php 中可用。

### `exercise_hide_ip`

**在测验报告中隐藏用户 IP**

默认情况下，我们会显示用户信息及其 IP 地址，但这可能被视为个人数据，因此此选项允许您从所有测验报告中移除该信息。

*默认值：`false`*

### `exercise_hide_label`

**在测验结果中隐藏题目色带（正确/错误）**

在测验结果中，默认会显示色带以标明答案正确或错误。启用此选项可全局移除该色带。

*默认值：`false`*

### `exercise_invisible_in_session`

**会话中练习不可见**

若练习在基础课程中可见，则在会话中显示为不可见。若练习在基础课程中不可见，则不会出现在会话中。

*默认值：`false`*

### `exercise_max_editors_in_page`

**练习结果屏幕中的最大编辑器数量**

由于练习中可能出现大量题目，允许教师为每道答案添加评语的批改屏幕加载可能非常缓慢。将此数字设为 5，可要求平台在屏幕上仅对一定数量的答案显示所见即所得编辑器。这将显著加快批改页面的加载速度，但会移除所见即所得编辑器，仅保留纯文本编辑器。

*默认值：`0`*


### `exercise_max_score`

**练习最高分**

为平台上所有练习定义最高分（一般为 10、20 或 100）。这将决定最终结果如何向用户和教师显示。

*默认值：`20`*


### `exercise_min_score`

**练习最低分**

为平台上所有练习定义最低分（一般为 0）。这将决定最终结果如何向用户和教师显示。

*默认值：`0`*


### `exercise_result_end_text_html_strict_filtering`

**绕过测验结束消息中的 HTML 过滤**

将测验结束时的消息视为始终安全。移除过滤器后即可在其中使用 JavaScript。

*默认值：`false`*


### `exercise_score_format`

**测验分数格式**

在各类报告中显示用户分数时，从以下形式中选择：1 = SCORE_AVERAGE（5 / 10）；2 = SCORE_PERCENT（50%）；3 = SCORE_DIV_PERCENT（5 / 10（50%））。使用您想使用的形式的数字 ID。

*默认值：`0`*

### `exercises_disable_new_attempts`

**禁用新的测验尝试**

全局禁用新的测验尝试。通常在测验普遍出现问题时使用，以便在不封锁整个平台的情况下留出时间进行分析。

*默认值：`false`*

### `hide_free_question_score`

**隐藏开放题得分**

通过在所有面向学习者的报告中隐藏得分显示，隐藏开放题（包括音频和批注）具有得分这一事实。

*默认值：`false`*


### `hide_user_info_in_quiz_result`

**在测验结果页隐藏用户信息**

默认的测验结果页会显示用户资料卡（照片、姓名等），在某些情境下可能被视为超出个人数据处理的合理范围。启用此选项可从测验结果中移除用户详细信息。

*默认值：`false`*


### `limit_exercise_teacher_access`

**限制教师对测验的权限**

启用后，教师无法删除测验或题目、更改测验可见性、下载为 QTI、清除结果等。

*默认值：`false`*


### `my_courses_show_pending_exercise_attempts`

**全局待完成测验列表**

启用以向最终用户显示一个页面，列出其在所有课程中待完成的测验。

*默认值：`false`*


### `question_exercise_html_strict_filtering`

**绕过测验题目中的 HTML 过滤**

将测验中的题目文本视为始终安全。移除过滤器后即可在其中使用 JavaScript。

*默认值：`false`*


### `question_pagination_length`

**教师端题目分页长度**

启用教师端题目分页选项时，每页显示的题目数量。

*默认值：`20`*


### `quiz_answer_extra_recording`

**启用额外测验作答记录**

启用将所有作答（即使是临时作答）记录到 track_e_attempt_recording 表。此功能为实验性功能，在尝试为测验评分时可能在报告页面中引发问题。

*默认值：`false`*


### `quiz_check_all_answers_before_end_test`

**提交测验前检查全部作答**

在提交测验前显示弹窗，列出已作答/未作答的题目。

*默认值：`false`*


### `quiz_check_button_enable`

**测验前增加作答保存过程检查**

通过在进入测验前提供题目保存过程的模拟，确保用户已准备好开始测验。这有助于尽早发现部分连接问题，并减少用户体验摩擦。

*默认值：`false`*


### `quiz_confirm_saved_answers`

**增加作答数量确认复选框**

此选项在每份测验末尾增加一个复选框，要求用户确认已保存的作答数量。这可为关键测验提供更好的审计数据。

*默认值：`false`*


### `quiz_discard_orphan_in_course_export`

**课程导出时丢弃孤立题目**

导出课程时，不导出不属于任何测验的题目。

*默认值：`false`*


### `quiz_generate_certificate_ending`

**测验结束时生成证书**

结束测验时生成证书。该测验需在成绩册工具中关联，并已配置及格百分比。

*默认值：`false`*


### `quiz_hide_attempts_table_on_start_page`

**在测验开始页隐藏测验尝试表格**

在测验开始页隐藏显示所有以往尝试的表格。

*默认值：`false`*


### `quiz_hide_question_number`

**隐藏题号**

参加测验时隐藏题目的递增编号。

*默认值：`false`*


### `quiz_image_zoom`

**启用测验图片缩放**

启用此功能以允许用户缩放测验中使用的图片。

### `quiz_keep_alive_ping_interval`

**在测验中保持会话活动**

通过每隔 x 秒向服务器发送定期 ping 信号来保持会话活动，在此定义间隔。建议每 300 秒一次。

*默认值：`0`*


### `quiz_open_question_decimal_score`

**开放题类型使用小数得分**

允许教师对开放题、口头表达题和批注题类型使用小数得分进行评分。

*默认值：`false`*


### `quiz_prevent_copy_paste`

**在测验中阻止复制粘贴**

在练习中阻止复制/粘贴/保存/打印快捷键以及右键点击。

*默认值：`false`*

### `quiz_question_category_destinations` **v3**

**按类别目标启用渐进式自适应测验**

启用渐进式自适应测验，每个题目类别可根据学习者得分将其重定向到另一类别。

*默认值：`true`*


### `quiz_question_delete_automatically_when_deleting_exercise`

**删除测验时自动删除题目**

默认行为是：当使用这些题目的唯一测验被删除时，题目变为孤立题目。启用此选项后，将确保本会变为孤立的所有题目一并被删除。

*默认值：`false`*


### `quiz_results_answers_report`

**显示下载测验结果的链接**

在测验结果页显示用于将结果下载为文件的链接。

*默认值：`false`*


### `quiz_show_description_on_results_page`

**始终在结果页显示测验说明**

启用后，测验完成后结果页始终显示测验说明。

*默认值：`false`*

### `score_grade_model`

**成绩等级模型**

定义成绩区间与颜色的数组，以便按此模型显示报告。这样可以用颜色而非数字成绩来呈现结果。

### `send_score_in_exam_notification_mail_to_manager`

**在测验提交邮件通知中加入成绩**

在学习者提交测验后发送给教师的电子邮件通知中，加入该学习者的成绩。

*默认值：`false`*


### `show_exercise_attempts_in_all_user_sessions`

**在待处理测验报告中显示所有学期的测验尝试**

在待处理测验报告中，显示总导师有权访问的所有学期中用户的测验尝试。

*默认值：`false`*


### `show_exercise_expected_choice`

**在测验结果中显示预期选项**

在测验结果页面上，为每道答案显示预期选项及状态（正确/错误）（前提是该测验已配置为显示结果）。

*默认值：`false`*


### `show_exercise_question_certainty_ribbon_result`

**显示确信度题型的得分**

默认情况下，Chamilo 不为确信度题型显示得分。

*默认值：`false`*


### `show_exercise_session_attempts_in_base_course`

**在基础课程中显示所有学期的测验尝试**

在基础课程中向教师显示用户在所有学期中的测验尝试。

*默认值：`false`*


### `show_official_code_exercise_result_list`

**在测验结果中显示官方编号**

是否在测验结果报告中显示学生的官方编号

*默认值：`false`*

### `show_question_id`

**在测验中显示题目 ID**

显示题目的内部 ID，以便用户记录特定题目的问题并更高效地反馈。

*默认值：`false`*


### `show_question_pagination`

**为教师显示题目分页**

对于题目较多的测验，当题目数量高于此设置时使用分页。设为 0 可禁用分页。

*默认值：`100`*


### `tracking_my_progress_show_deleted_exercises`

**在“我的进度”中显示已删除的测验**

启用此选项后，可在“我的进度”页面上显示您已参加的所有测验结果，即使这些测验已被删除。

*默认值：`false`*