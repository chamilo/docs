# 调查问卷设置

**调查问卷**工具的默认值与行为。

在 **管理 > 配置设置 > 调查问卷** 下访问这些设置。此类别包含 **12 项设置**，下方列出平台设置固件（`SettingsCurrentFixtures.php`）中附带的标题与说明。

> 代码中的变量名以等宽字体显示。在通过 API 编写脚本，或需要通过编辑 [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) 在全局层面更改这些设置时，请使用该名称。

## 设置

### `extend_rights_for_coach_on_survey`

**扩展辅导教师在调查问卷上的权限**

启用此选项以允许辅导教师创建和编辑调查问卷

*默认值：`true`*


### `hide_survey_edition`

**禁止编辑调查问卷**

禁止编辑此处列出的所有调查问卷（按代码）。使用 * 可禁止编辑全部调查问卷。

### `hide_survey_reporting_button`

**隐藏调查问卷报告按钮**

允许管理员在调查问卷用于调查教师时隐藏调查问卷报告按钮。

*默认值：`false`*


### `show_pending_survey_in_menu`

**在菜单中显示“待完成的调查问卷”**

显示一个菜单项，让用户访问其待完成的调查问卷。

*默认值：`false`*


### `show_surveys_base_in_sessions`

**在所有学期课程中显示基础课程的调查问卷**

[推断] 使基础课程中的调查问卷对所有相关学期课程中的学习者可见且可用。

*默认值：`false`*


### `survey_additional_teacher_modify_actions`

**为教师的调查问卷列表添加额外操作（以链接形式）**

在调查问卷列表中添加操作（通常与插件关联）。使用数组语法 ['myplugin' => ['MyPlugin', 'urlGeneratorCallback']]。

### `survey_allow_answered_question_edit`

**允许教师在学生作答后编辑调查问卷题目**

[推断] 即使学习者已提交回答，仍允许教师修改调查问卷题目。

*默认值：`false`*


### `survey_anonymous_show_answered`

**允许教师查看匿名调查问卷中谁已作答**

允许教师查看哪些学习者已回答匿名调查问卷。仅在超过一名用户作答后才会显示，因此仍难以识别谁回答了什么。

*默认值：`false`*


### `survey_backwards_enable`

**在调查问卷中启用“上一题”按钮**

[推断] 启用“上一题”导航按钮，以便学习者回顾先前的调查问卷题目。

*默认值：`false`*


### `survey_duplicate_order_by_name`

**使用调查问卷复制功能时按学生姓名排序**

调查问卷复制功能面向教师，旨在让教师按顺序对每位学生给出评价。此选项将按学习者的姓氏对题目排序。

*默认值：`true`*


### `survey_email_sender_noreply`

**调查问卷电子邮件发件人（no-reply）**

调查问卷邀请应使用辅导教师的电子邮件地址，还是主配置部分中定义的 no-reply 地址？

*默认值：`coach`*（“课程辅导教师电子邮件发件人”选项——存储值与早期 Chamilo 版本相同，但界面中该选项标注为“tutor”）


### `survey_mark_question_as_required`

**默认将所有调查问卷题目标记为“必填”**

[推断] 自动将所有新创建的调查问卷题目默认标记为必填回答。

*默认值：`false`*