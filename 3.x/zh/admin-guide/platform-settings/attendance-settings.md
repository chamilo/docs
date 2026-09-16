# 出勤设置

**出勤**工具的默认值与行为。

可在 **管理 > 配置设置 > 出勤** 下访问这些设置。此类别包含 **5 项设置**，下方列出平台设置固件（`SettingsCurrentFixtures.php`）中附带的标题与说明。

> 代码中的变量名以等宽字体显示。在通过 API 编写脚本，或需要通过编辑 [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) 在全局层面更改这些设置时，请使用该名称。

## 设置

### `allow_delete_attendance`

**出勤：启用删除**

Chamilo 的默认行为是隐藏出勤表而非删除它们，以防教师误操作。启用此选项后，教师可以*真正*删除出勤表。

*默认值：`true`*

### `attendance_allow_comments`

**允许在出勤表中添加评论**

教师和学生可以对每条出勤记录进行评论（用于说明原因）。

*默认值：`false`*

### `attendance_calendar_set_duration` **v3**

**出勤事件时长**

用于定义出勤表中事件时长的选项。

*默认值：`false`*

### `enable_sign_attendance_sheet`

**出勤签名**

启用签名以确认本人出勤。

*默认值：`false`*

### `multilevel_grading`

**启用多级出勤评分**

允许使用多个等级对出勤进行评分，而非简单的出席/缺席系统。

*默认值：`false`*