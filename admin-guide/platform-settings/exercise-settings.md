# 练习（测试）设置

**练习（测试）**工具的默认设置和行为——问题显示、评分、尝试次数等相关设置。

在**管理 > 配置设置 > 练习（测试）**下访问这些设置。此类别包含**63个设置**，以下列出平台设置固定数据（`SettingsCurrentFixtures.php`）中提供的标题和注释。

> 代码中的变量名以等宽字体显示。在通过API进行脚本编写或需要通过编辑[`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml)全局更改这些设置时使用。

## 设置

### `add_exercise_best_attempt_in_report`

**启用显示最佳得分尝试**

提供课程和测试ID列表，以便在报告中显示任何学习者的最佳得分尝试。

### `allow_coach_feedback_exercises`

**允许教练在练习评审中发表评论**

允许教练在练习评审期间编辑反馈。

*默认值：`true`*

### `allow_edit_exercise_in_lp`

**允许教师在学习路径中编辑测试**

默认情况下，Chamilo 禁止编辑包含在学习路径中的测试。这是为了避免更改对学习者（过去和未来）的结果和/或学习路径进度产生不同影响。此选项允许教师绕过此限制。

### `allow_exercise_categories`

**启用测试类别**

测试类别默认情况下未启用，因为它们增加了一层复杂性。启用此功能后，将显示与测试类别管理相关的所有图标。

*默认值：`false`*

### `allow_mandatory_question_in_category`

**启用选择必答问题**

在使用随机类别时，启用测试中必答问题的选择。

*默认值：`false`*

### `allow_notification_setting_per_exercise`

**测试级别的测试通知设置**

启用在测试级别而非课程级别配置测试提交通知。如果未在测试级别定义，则回退到课程级别设置。

*默认值：`false`*

### `allow_quick_question_description_popup`

**快速将图片添加到问题中**

在测试问题列表中启用一个额外的图标，以便将图片添加为问题描述。当问题在标题中且描述仅包含图片时，这大大加快了问题编辑速度。

*默认值：`false`*

### `allow_quiz_question_feedback`

**如果回答错误则添加问题反馈**

默认情况下，Chamilo 允许您在每个问题的答案上显示反馈。通过此选项，将创建一个额外的字段，为整个问题提供预定义的反馈。此反馈仅在用户回答错误时显示。

*默认值：`false`*

### `allow_quiz_results_page_config`

**启用测试结果页面配置**

定义一组您希望应用于所有测试结果页面的设置。设置可以是‘hide_question_score’、‘hide_expected_answer’、‘hide_category_table’、‘hide_correct_answered_questions’、‘hide_total_score’，未来可能还会有更多设置。在代码中查找‘getPageConfigurationAttribute’以查看当前使用的设置。

*默认值：`false`*

### `allow_quiz_show_previous_button_setting`

**在测试中显示“上一题”按钮以导航问题**

将其设置为 false 以禁用在测试中回答问题时的“上一题”按钮，从而强制用户始终向前移动。

*默认值：`false`*

### `allow_teacher_comment_audio`

**对提交的答案提供音频反馈**

允许教师通过音频（替代文本）对测试中的每个问题向用户提供反馈。

*默认值：`true`*

### `allow_time_per_question`

**在测试中启用每题时间限制**

默认情况下，只能限制每个测试的时间。按问题限制时间增加了一层额外的可能性，您可以（谨慎地）结合两者使用。

*默认值：`false`*

### `block_category_questions`

**锁定测试中前一类别的题目**

使用此选项时，测试配置中将出现一个额外的选项。当使用包含多个问题类别的测试并要求按类别分布时，这将允许用户按类别导航问题。一旦一个类别完成，用户将进入下一个类别，无法返回到前一个类别。

*默认值：`false`*

### `block_quiz_mail_notification_general_coach`

**阻止向总教练发送测试通知**

学习者完成测试通常会向教练发送通知，包括总会话教练。启用此选项可将总教练从这些通知中排除。

*默认值：`false`*

### `configure_exercise_visibility_in_course`

**启用以绕过基础课程级别上会话中练习不可见的配置**

启用基础课程中会话练习不可见的配置，以绕过全局配置。如果未设置，则使用全局参数。

*默认值：`false`*

### `disable_clean_exercise_results_for_teachers`

**禁用教师的“清除结果”选项**

禁用从测试列表中删除测试结果的选项。这通常在不太谨慎的教师管理课程时使用，以避免重大错误。

*默认值：`true`*

### `email_alert_manager_on_new_quiz`

**新测验的默认电子邮件提醒设置**

是否希望课程管理者（教师）在学生回答测验时收到电子邮件通知。这是所有新课程的默认值，但每位教师仍可在自己的课程中更改此设置。

*默认值：`true`*

### `enable_quiz_scenario`

**启用测验场景**

从这里您可以创建根据用户回答提出不同问题的练习。

*默认值：`true`*

### `exercise_additional_teacher_modify_actions`

**测试列表中教师的额外链接**

配置回调元素以生成教师在测试列表右侧的新操作图标，格式为数组，例如 ['myplugin' => ['MyPlugin', 'urlGeneratorCallback']]

### `exercise_attempts_report_show_username`

**在测试结果页面显示用户名**

在测试结果页面显示用户名（代替或与用户信息一起显示）。

*默认值：`false`*

### `exercise_category_report_user_extra_fields`

**在练习类别报告中添加用户额外字段**

定义一个包含用户额外字段列表的数组，以添加到报告中。

### `exercise_category_round_score_in_export`

**在测试导出中四舍五入分数**

启用后，测试分数在导出练习报告时将四舍五入到最接近的整数。

*默认值：`false`*

### `exercise_embeddable_extra_types`

**可嵌入的问题类型**

默认情况下，在决定测试是否可以嵌入视频时，仅考虑单选和多选问题。通过此选项，您可以决定更多问题类型可用。请注意，并非所有问题类型都适合视频分配的空间。问题类型可在 question.class.php 代码中找到。

### `exercise_hide_ip`

**从测试报告中隐藏用户IP**

默认情况下，我们会显示用户信息及其IP地址，但这可能被视为个人数据，因此此选项允许您从所有测试报告中删除此信息。

*默认值：`false`*

### `exercise_hide_label`

**在测试结果中隐藏问题标签（正确/错误）**

在测试结果中，默认情况下会显示一个标签以指示答案是正确还是错误。启用此选项可全局移除该标签。

*默认值：`false`*

### `exercise_invisible_in_session`

**会话中练习不可见**

如果练习在基础课程中可见，则在会话中不可见。如果练习在基础课程中不可见，则在会话中不显示。

*默认值：`false`*

### `exercise_max_editors_in_page`

**练习结果屏幕中的最大编辑器数量**

由于练习中可能出现大量问题，允许教师为每个答案添加评论的批改屏幕可能加载非常缓慢。将此数字设置为5，要求平台在屏幕上仅显示一定数量答案的WYSIWYG编辑器。这将显著加快批改页面加载时间，但会移除WYSIWYG编辑器，仅保留纯文本编辑器。

*默认值：`0`*

### `exercise_max_score`

**练习的最高分数**

为平台上的所有练习定义最高分数（通常为10、20或100）。这将决定最终结果如何显示给用户和教师。

*默认值：`20`*

### `exercise_min_score`

**练习的最低分数**

为平台上的所有练习定义最低分数（通常为0）。这将决定最终结果如何显示给用户和教师。

*默认值：`0`*

### `exercise_result_end_text_html_strict_filtering`

**绕过测试结束消息中的HTML过滤**

认为测试结束时的消息始终是安全的。移除过滤器后可以在那里使用JavaScript。

*默认值：`false`*

### `exercise_score_format`

**测试分数格式**

在各种报告中选择用户分数的显示形式：1 = SCORE_AVERAGE (5 / 10)；2 = SCORE_PERCENT (50%)；3 = SCORE_DIV_PERCENT (5 / 10 (50%))。使用您想使用的形式的数字ID。

*默认值：`0`*

### `exercises_disable_new_attempts`

**禁用新的测试尝试**

全局禁用新的测试尝试。通常在测试出现问题时使用，您需要一些时间进行分析，而无需阻止整个平台。

*默认值：`false`*

### `hide_free_question_score`

**隐藏开放性问题的分数**

在所有面向学习者的报告中隐藏开放性问题（包括音频和注释）的分数显示。

*默认值：`false`*


### `hide_user_info_in_quiz_result`

**在测试结果页面隐藏用户信息**

默认的测试结果页面会显示用户数据表（照片、姓名等），在某些情况下，这可能被视为超出个人数据处理的限制。启用此选项可从测试结果中移除用户详细信息。

*默认值：`false`*


### `limit_exercise_teacher_access`

**限制教师对测试的权限**

启用后，教师无法删除测试或问题、更改测试可见性、下载为 QTI 格式、清除结果等。

*默认值：`false`*


### `my_courses_show_pending_exercise_attempts`

**全局待完成测试列表**

启用后，向最终用户显示一个页面，列出所有课程中待完成的测试。

*默认值：`false`*


### `question_exercise_html_strict_filtering`

**绕过测试问题中的 HTML 过滤**

认为测试中的问题文本始终是安全的。移除过滤器后，可以在其中使用 JavaScript。

*默认值：`false`*


### `question_pagination_length`

**教师问题分页长度**

在使用教师问题分页选项时，每页显示的问题数量。

*默认值：`20`*


### `quiz_answer_extra_recording`

**启用额外测试答案记录**

启用后，将所有答案（即使是临时的）记录到 track_e_attempt_recording 表中。此功能是实验性的，可能会在尝试评分测试时导致报告页面出现问题。

*默认值：`false`*


### `quiz_check_all_answers_before_end_test`

**提交测试前检查所有答案**

在提交测试前显示一个弹出窗口，列出已回答/未回答的问题。

*默认值：`false`*


### `quiz_check_button_enable`

**在测试前添加答案保存过程检查**

通过在进入测试前提供问题保存过程的模拟，确保用户已做好开始测试的准备。这有助于提早检测某些连接问题，减少用户体验中的摩擦。

*默认值：`false`*


### `quiz_confirm_saved_answers`

**添加答案数量确认复选框**

此选项在每次测试结束时添加一个复选框，要求用户确认已保存的答案数量。这为关键测试提供了更好的审计数据。

*默认值：`false`*


### `quiz_discard_orphan_in_course_export`

**在课程导出时丢弃孤立问题**

在导出课程时，不导出未包含在任何测试中的问题。

*默认值：`false`*


### `quiz_generate_certificate_ending`

**测试结束时生成证书**

在测试结束时生成证书。测试需要在成绩簿工具中链接，并配置及格百分比。

*默认值：`false`*


### `quiz_hide_attempts_table_on_start_page`

**在测试开始页面隐藏尝试表格**

在测试开始页面隐藏显示所有先前尝试的表格。

*默认值：`false`*


### `quiz_hide_question_number`

**隐藏问题编号**

在进行测试时隐藏问题的递增编号。

*默认值：`false`*


### `quiz_image_zoom`

**启用测试图片缩放**

启用此功能，允许用户在测试中对图片进行缩放。

### `quiz_keep_alive_ping_interval`

**在测试中保持会话活跃**

通过每隔 x 秒向服务器发送定期 ping 信号来保持会话活跃，在此定义。我们建议每 300 秒一次。

*默认值：`0`*


### `quiz_open_question_decimal_score`

**开放性问题类型的小数分数**

允许教师对开放性、口语表达和注释类型的问题使用小数分数进行评分。

*默认值：`false`*


### `quiz_prevent_copy_paste`

**在测试中阻止复制粘贴**

在练习中阻止复制/粘贴/保存/打印键和右键点击。

*默认值：`false`*


### `quiz_question_delete_automatically_when_deleting_exercise`

**删除测试时自动删除问题**

默认行为是当唯一使用这些问题的测试被删除时，问题会变成孤立。启用此选项后，确保所有原本会变成孤立的问题也会被删除。

*默认值：`false`*


### `quiz_results_answers_report`

**显示下载测试结果的链接**

在测试结果页面上显示一个链接，用于将结果下载为文件。

*默认值：`false`*


### `quiz_show_description_on_results_page`

**在结果页面始终显示测试描述**

启用后，测试完成后，结果页面上始终显示测试描述。

*默认值：`false`*


### `score_grade_model`

**分数等级模型**

定义一个分数范围和颜色的数组，使用此模型显示报告。这允许您显示颜色而非数字等级。

### `send_score_in_exam_notification_mail_to_manager`

**在考试提交的邮件通知中添加分数**

在考试提交后发送给教师的电子邮件通知中添加学习者的分数。

*默认值：`false`*


### `show_exercise_attempts_in_all_user_sessions`

**在待处理考试报告中显示所有会话的考试尝试**

在待处理考试报告中显示总教练有权访问的所有会话中的用户考试尝试。

*默认值：`false`*


### `show_exercise_expected_choice`

**在考试结果中显示预期选择**

在考试结果页面上显示每个答案的预期选择和状态（正确/错误）（如果考试已配置为显示结果）。

*默认值：`false`*


### `show_exercise_question_certainty_ribbon_result`

**显示确定度问题的分数**

默认情况下，Chamilo 不会显示确定度问题类型的分数。

*默认值：`false`*


### `show_exercise_session_attempts_in_base_course`

**在基础课程中显示所有会话的考试尝试**

在基础课程中向教师显示所有会话中用户的考试尝试。

*默认值：`false`*


### `show_official_code_exercise_result_list`

**在考试结果中显示官方代码**

是否在考试结果报告中显示学生的官方代码。

*默认值：`false`*


### `show_question_id`

**在考试中显示问题ID**

显示问题的内部ID，以便用户记录特定问题的问题并更有效地报告。

*默认值：`false`*


### `show_question_pagination`

**为教师显示问题分页**

对于包含大量问题的考试，如果问题数量超过此设置，则使用分页。设置为0以防止使用分页。

*默认值：`100`*


### `tracking_my_progress_show_deleted_exercises`

**在“我的进度”中显示已删除的考试**

启用此选项后，在“我的进度”页面上显示您参加过的所有考试的结果，即使是已删除的考试。

*默认值：`false`*