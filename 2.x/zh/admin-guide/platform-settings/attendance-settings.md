# 考勤设置

**考勤**工具的默认设置和行为。

在**管理 > 配置设置 > 考勤**下访问这些设置。此类别包含**4个设置**，以下列出平台设置固定数据（`SettingsCurrentFixtures.php`）中提供的标题和注释。

> 代码中的变量名以等宽字体显示。在通过API进行脚本编写或需要通过编辑[`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) 在全局级别更改这些设置时使用它。

## 设置

### `allow_delete_attendance`

**考勤：启用删除功能**

Chamilo 的默认行为是隐藏考勤表而不是删除它们，以防教师误操作。启用此选项以允许教师*真正*删除考勤表。

*默认值：`true`*

### `attendance_allow_comments`

**允许在考勤表中添加评论**

教师和学生可以对每个单独的考勤记录进行评论（以作解释）。

*默认值：`false`*

### `enable_sign_attendance_sheet`

**考勤签名**

启用签名功能以确认出席。

*默认值：`false`*

### `multilevel_grading`

**启用多级考勤评分**

允许使用多级评分来评估考勤，而不仅仅是简单的出席/缺席系统。

*默认值：`false`*