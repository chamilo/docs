# 隐私设置

隐私和数据保护（GDPR风格）控制——同意、数据导出、账户删除请求等类似功能。

在 **管理 > 配置设置 > 隐私** 下访问这些设置。此类别包含 **6 个设置**，以下列出平台设置固定数据（`SettingsCurrentFixtures.php`）中提供的标题和注释。

> 代码中的变量名以等宽字体显示。在通过 API 进行脚本编写或需要通过编辑 [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) 在全局级别更改这些设置时使用它。

## 设置

### `data_protection_officer_email`

**数据保护官电子邮件地址**

指定数据保护官的电子邮件地址，显示在 GDPR/隐私部分。

### `data_protection_officer_name`

**数据保护官姓名**

指定数据保护官的全名，显示在个人数据和隐私页面中。

### `data_protection_officer_role`

**数据保护官角色**

指定数据保护官的职位或角色，与其姓名一起显示在隐私信息中。

### `disable_change_user_visibility_for_public_courses`

**禁止在公共课程中使工具用户可见**

防止任何人使公共课程中的“用户”工具可见。

*默认值：`true`*

### `disable_gdpr`

**禁用 GDPR 功能**

如果您已经在其他地方管理用户的个人数据保护声明，可以安全地禁用此功能。

*默认值：`true`*

### `hide_user_field_from_list`

**在课程的用户列表中隐藏字段**

默认情况下，我们会在课程的用户工具中显示用户的所有数据。此数组允许您指定不想显示的字段。仅影响主要字段（不包括额外字段）。