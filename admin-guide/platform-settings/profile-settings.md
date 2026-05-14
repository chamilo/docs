# 用户资料设置

用户资料中显示哪些字段，用户可以编辑哪些字段，以及相关的偏好设置。

通过 **管理 > 配置设置 > 用户资料** 访问这些设置。此类别包含 **29 个设置项**，以下列出平台设置固定值 (`SettingsCurrentFixtures.php`) 中提供的标题和注释。

> 代码中的变量名以等宽字体显示。在通过 API 进行脚本编写或需要通过编辑 [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) 在全局级别更改这些设置时使用。

## 设置项

### `account_valid_duration`

**账户有效期**

用户账户在创建后的有效天数

*默认值：`3660`*

### `add_user_course_information_in_mailto`

**在页脚联系方式中预填用户和课程信息的邮件**

在 mailto: 页脚中添加主题和正文。

*默认值：`false`*

### `allow_show_linkedin_url`

**允许显示用户的 LinkedIn URL**

在用户社交模块中添加一个链接，允许访问用户的 LinkedIn 个人资料

### `allow_show_skype_account`

**允许显示用户的 Skype 账户**

在用户社交模块中添加一个链接，允许通过 Skype 发起聊天

### `allow_social_map_fields`

**用户在地图上的地理位置**

在社交网络中启用地图显示，允许定位其他用户。这包括多个位置（当前和目标），这些位置必须定义为地址或坐标，并分别存储在额外的字段中。额外字段必须在此处设置为数组。

### `allow_teachers_to_classes`

**允许教师管理班级**

启用教师管理系统内的班级组及其成员资格。

*默认值：`false`*

### `allow_user_headings`

**允许在课程内进行用户画像**

教师是否可以定义学习者资料字段以获取额外信息？

### `allow_users_to_change_email_with_no_password`

**允许用户无需密码即可更改电子邮件**

在更改账户信息时

*默认值：`false`*

### `changeable_options`

**用户允许在资料中更改的字段**

选择用户在其资料页面上可以更改的字段。

### `enable_profile_user_address_geolocalization`

**启用用户的地理定位**

启用用户的地址字段，并使用地理定位功能在地图上显示

### `extended_profile`

**作品集**

如果启用此设置，用户可以填写以下（可选）字段：“我的个人开放区域”、“我的能力”、“我的文凭”、“我能教授的内容”

*默认值：`false`*

### `hide_username_in_course_chat`

**在课程聊天中隐藏用户名**

在课程聊天中隐藏用户名，仅显示人名。

*默认值：`false`*

### `hide_username_with_complete_name`

**在显示完整姓名时隐藏用户名**

某些内部功能在返回用户的完整姓名时会返回用户名。启用此选项后，确保用户名不会显示。

*默认值：`false`*

### `linkedin_organization_id`

**LinkedIn 组织 ID**

在 LinkedIn 上分享徽章时，LinkedIn 允许您设置一个组织 ID，该 ID 将链接到您组织的 LinkedIn 页面（以链接颁发徽章的组织）。

*默认值：`false`*

### `login_is_email`

**使用电子邮件作为用户名**

使用电子邮件登录系统

*默认值：`false`*

### `my_space_users_items_per_page`

**我的空间中每页默认项目数**

在“我的空间”跟踪部分（用户、工作统计、学生列表）中每页显示的记录数。

*默认值：`10`*

### `pass_reminder_custom_link`

**密码提醒自定义页面**

设置您自己的密码重置页面 URL。在使用联合账户管理系统时非常有用。

### `profile_fields_visibility`

**资料页面上可见的字段**

字段数组及其在用户资料页面上是否可见（布尔值）（也适用于额外字段标签）。

### `registration_add_helptext_for_2_names`

**在注册时添加两个姓名的帮助文本**

在注册表单中为用户添加帮助文本，以便在常见双姓的情况下输入两个姓名。

*默认值：`false`*

### `send_notification_when_user_added`

**用户创建时向管理员发送邮件**

当用户被创建时，向管理员发送电子邮件通知。

### `show_conditions_to_user`

**向用户显示特定注册条件**

在注册过程中向用户显示多个条件。提供一个数组，每个元素包含 'variable'（内部额外字段名称）、'display_text'（复选框的简单文本）、'text_area'（条件长文本）。

### `show_official_code_whoisonline`

**“在线用户”页面上的官方代码**

在“在线用户”页面上，在用户名下方显示官方代码。

*默认值：`false`*

---
### `show_terms_if_profile_completed`

**仅在个人资料完整时显示条款和条件**

启用此选项后，只有当以“terms_”开头且设置为可见的额外个人资料字段被填写完整时，用户才能查看条款和条件。

*默认值：`false`*


### `split_users_upload_directory`

**分割用户上传目录**

在高负载的门户网站上，如果注册用户众多且上传了大量图片，上传目录（main/upload/users/）可能会包含过多的文件，导致文件系统无法处理（在Debian服务器上曾报告超过36000个文件）。更改此选项将启用上传目录的一级分割。将在基础目录中使用9个目录，所有后续用户的目录将被存储在这9个目录之一中。更改此选项不会影响磁盘上的目录结构，但会影响Chamilo代码的行为，因此如果您更改此选项，必须在服务器上自行创建新目录并移动现有目录。请注意，在创建和移动这些目录时，您需要将用户1到9的目录移动到同名的子目录中。如果您不确定此选项，最好不要激活它。

*默认值：`true`*


### `use_users_timezone`

**启用用户时区**

启用此选项后，用户可以选择自己的时区。一旦配置完成，用户将能够以自己的时区查看作业截止日期和其他时间参考，从而减少交付时的错误。

*默认值：`true`*


### `user_import_settings`

**用户导入选项**

在CSV/XML用户导入中作为默认参数应用的一组选项。


### `user_search_on_extra_fields`

**管理员在用户列表中按额外字段搜索用户**

在用户搜索中自然包含给定的额外字段（额外字段标签数组）。


### `user_selected_theme`

**用户主题选择**

允许用户在个人资料中选择自己的视觉主题。这将更改Chamilo对他们的显示效果，但不会影响门户网站的默认样式。如果特定课程或会话分配了特定主题，则该主题将优先于用户定义的主题。

*默认值：`false`*


### `visible_options`

**个人资料中可见字段列表**

控制哪些个人资料字段对用户和其他人可见。