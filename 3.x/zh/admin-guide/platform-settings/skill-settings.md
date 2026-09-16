# 技能设置

**技能**系统的行为——技能树、授予规则、个人资料集成。

在 **管理 > 配置设置 > 技能** 下访问这些设置。此类别包含 **13 项设置**，下方列出平台设置固件（`SettingsCurrentFixtures.php`）中附带的标题与说明。

> 代码中的变量名以等宽字体显示。在通过 API 编写脚本，或需要通过编辑 [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) 在全局层面更改这些设置时，请使用该名称。

## 设置

### `allow_hr_skills_management`

**允许人力资源技能管理**

允许人力资源管理人员管理技能

*默认值：`true`*


### `allow_private_skills`

**对学习者隐藏技能**

若启用，技能仅对管理员、教师（通过课程与用户关联）以及人力资源管理人员（若与用户关联）可见。

*默认值：`false`*


### `allow_skill_rel_items`

**启用将技能关联到项目**

此选项启用一项重要功能，使任何项目都可以关联到技能（从而允许获得该技能）。该功能仍需教师确认技能的获得，因此获得并非自动完成。

*默认值：`false`*


### `allow_skills_tool`

**允许技能工具**

用户可在社交网络以及首页的一个区块中查看其技能。

*默认值：`true`*

### `allow_teacher_access_student_skills`

**允许教师访问学习者的技能**

[推断] 允许教师查看并跟踪其课程中学习者已获得的技能。

*默认值：`false`*


### `badge_assignation_notification`

**学习者获得技能/徽章时发送通知**

[推断] 当学习者获得新技能或徽章成就时向其发送通知。

*默认值：`false`*


### `hide_skill_levels`

**隐藏技能等级功能**

[推断] 在与技能相关的视图中隐藏技能等级层次及等级标签。

*默认值：`false`*


### `manual_assignment_subskill_autoload`

**向用户分配技能：子技能自动加载**

在手动向用户分配技能时，可将表单设置为自动提示您分配子技能，而非您所选的技能。

*默认值：`false`*


### `openbadges_backpack`

**OpenBadges backpack URL**

将默认用于所有希望导出徽章的用户的 OpenBadges backpack 服务器 URL。默认为开放且免费的 Mozilla Foundation backpack 仓库：https://backpack.openbadges.org/

### `show_full_skill_name_on_skill_wheel`

**在技能轮盘上显示完整技能名称**

在技能轮盘上，当技能具有短代码时显示技能名称。

*默认值：`false`*


### `skill_levels_names`

**技能等级名称**

以 id => 名称 的数组形式定义技能等级的名称。

### `skills_hierarchical_view_in_user_tracking`

**以层级表格显示技能**

[推断] 在进度与报告页面中以层级树结构显示学习者技能。

*默认值：`false`*


### `skills_teachers_can_assign_skills`

**允许教师设定通过其课程可获得的技能**

默认情况下，仅管理员可决定通过哪门课程可获得哪些技能。

*默认值：`false`*