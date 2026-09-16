# 隐私设置

隐私与数据保护（类 GDPR）控制 — 同意、数据导出、账户删除请求等。

在 **管理 > 配置设置 > 隐私** 下访问这些设置。此类别包含 **6 项设置**，下方列出平台设置固件（`SettingsCurrentFixtures.php`）中附带的标题与说明。

> 代码中的变量名以等宽字体显示。通过 API 编写脚本，或通过编辑 [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) 在全局层面更改这些设置时，请使用该名称。

## 设置

### `data_protection_officer_email`

**数据保护官电子邮件地址**

指定数据保护官的电子邮件地址，显示在 GDPR/隐私相关区域。

### `data_protection_officer_name`

**数据保护官姓名**

指定数据保护官的全名，显示在个人数据与隐私页面。

### `data_protection_officer_role`

**数据保护官职务**

指定数据保护官的职位或角色，与其姓名一并显示在隐私信息中。

### `disable_change_user_visibility_for_public_courses`

**禁止在公开课程中显示工具用户**

避免任何人将“用户”工具在公开课程中设为可见。

*默认值：`true`*

### `disable_gdpr`

**禁用 GDPR 功能**

如果您已在其他位置向用户管理个人数据保护声明，可以安全地禁用此功能。

*默认值：`true`*

### `hide_user_field_from_list`

**在课程用户列表中隐藏字段**

默认情况下，我们会在课程的用户工具中显示用户的全部数据。此数组允许您指定不希望显示的字段。仅影响主字段（不影响额外字段）。