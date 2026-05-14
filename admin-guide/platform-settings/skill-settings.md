# 技能设置

**技能**系统的行为——技能树、授予规则、个人资料整合。

在**管理 > 配置设置 > 技能**下访问这些设置。此类别包含**13个设置**，以下列出平台设置固定数据（`SettingsCurrentFixtures.php`）中提供的标题和注释。

> 代码中的变量名以等宽字体显示。在通过API进行脚本编写或需要通过编辑[`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml)全局更改这些设置时使用。

## 设置

### `allow_hr_skills_management`

**允许人力资源技能管理**

允许人力资源部门管理技能

*默认值：`true`*

### `allow_private_skills`

**对学习者隐藏技能**

如果启用，只有管理员、教师（通过课程与用户相关联）以及人力资源管理用户（如果与用户相关联）才能看到技能。

*默认值：`false`*

### `allow_skill_rel_items`

**启用技能与项目的链接**

此功能启用后，任何项目都可以与技能相关联（从而允许获得技能）。但该功能仍需教师确认技能的获得，因此技能获取不是自动的。

*默认值：`false`*

### `allow_skills_tool`

**允许技能工具**

用户可以在社交网络和首页的一个模块中查看他们的技能。

*默认值：`true`*

### `allow_teacher_access_student_skills`

**允许教师访问学习者的技能**

[推测] 允许教师查看和监控其课程中学习者获得的技能。

*默认值：`false`*

### `badge_assignation_notification`

**当技能/徽章被获得时向学习者发送通知**

[推测] 当学习者获得新技能或徽章成就时，向其发送通知。

*默认值：`false`*

### `hide_skill_levels`

**隐藏技能等级功能**

[推测] 在与技能相关的视图中隐藏技能等级层次结构和等级标签。

*默认值：`false`*

### `manual_assignment_subskill_autoload`

**为用户分配技能：子技能自动加载**

在手动为用户分配技能时，可以设置表单自动提供分配子技能的选项，而不是您选择的技能。

*默认值：`false`*

### `openbadges_backpack`

**OpenBadges 背包 URL**

默认情况下，所有希望导出徽章的用户将使用的 OpenBadges 背包服务器的 URL。默认设置为 Mozilla 基金会的开放免费背包存储库：https://backpack.openbadges.org/

### `show_full_skill_name_on_skill_wheel`

**在技能轮上显示完整技能名称**

在技能轮上，当技能有简称时，显示技能的完整名称。

*默认值：`false`*

### `skill_levels_names`

**技能等级名称**

以 id => name 的数组形式定义技能等级的名称。

### `skills_hierarchical_view_in_user_tracking`

**以分层表格显示技能**

[推测] 在进度和报告页面中以分层树状结构显示学习者的技能。

*默认值：`false`*

### `skills_teachers_can_assign_skills`

**允许教师设置通过其课程获得的技能**

默认情况下，只有管理员可以决定通过哪些课程可以获得哪些技能。

*默认值：`false`*