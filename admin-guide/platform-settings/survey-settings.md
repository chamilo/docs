# 调查设置

**调查**工具的默认设置和行为。

在**管理 > 配置设置 > 调查**下访问这些设置。此类别包含**12个设置**，以下列出平台设置固定数据（`SettingsCurrentFixtures.php`）中提供的标题和注释。

> 代码中的变量名以等宽字体显示。在通过API进行脚本编写或需要通过编辑[`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) 在全局级别更改这些设置时使用它。

## 设置

### `extend_rights_for_coach_on_survey`

**为教练扩展调查权限**

激活此选项将允许教练创建和编辑调查。

*默认值：`true`*

### `hide_survey_edition`

**禁止调查编辑**

禁止编辑此处列出的所有调查（按代码）。使用 * 禁止编辑所有调查。

### `hide_survey_reporting_button`

**隐藏调查报告按钮**

允许管理员隐藏调查报告按钮，如果调查用于评估教师。

*默认值：`false`*

### `show_pending_survey_in_menu`

**在菜单中显示“待完成调查”**

显示一个菜单项，让用户可以访问他们的待完成调查。

*默认值：`false`*

### `show_surveys_base_in_sessions`

**在所有会话课程中显示基础课程的调查**

[推测] 使基础课程中的调查对所有相关会话课程的学习者可见和可用。

*默认值：`false`*

### `survey_additional_teacher_modify_actions`

**为教师的调查列表添加额外操作（作为链接）**

在调查列表中添加操作（通常与插件相关）。使用数组语法 ['myplugin' => ['MyPlugin', 'urlGeneratorCallback']]。

### `survey_allow_answered_question_edit`

**允许教师在学生回答后编辑调查问题**

[推测] 允许教师在学习者提交回答后修改调查问题。

*默认值：`false`*

### `survey_anonymous_show_answered`

**允许教师在匿名调查中查看谁已回答**

允许教师查看哪些学习者已经回答了匿名调查。此功能仅在超过一个用户回答后显示，因此仍然难以识别谁回答了什么。

*默认值：`false`*

### `survey_backwards_enable`

**在调查中启用“上一问题”按钮**

[推测] 启用“上一问题”导航按钮，允许学习者回顾之前的调查问题。

*默认值：`false`*

### `survey_duplicate_order_by_name`

**在使用调查复制功能时按学生姓名排序**

调查复制功能面向教师，旨在让教师按顺序对每个学生进行评价。此选项将按学习者的姓氏对问题进行排序。

*默认值：`true`*

### `survey_email_sender_noreply`

**调查电子邮件发件人（无回复）**

调查邀请应使用教练的电子邮件地址还是在主配置部分定义的无回复地址？

*默认值：`coach`*

### `survey_mark_question_as_required`

**默认将所有调查问题标记为“必填”**

[推测] 默认情况下自动将所有新创建的调查问题标记为必填回答。

*默认值：`false`*