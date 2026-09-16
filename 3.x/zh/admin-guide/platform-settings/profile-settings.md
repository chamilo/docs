# 用户个人资料设置

用户个人资料中显示哪些字段、用户可编辑哪些字段，以及相关偏好设置。

在 **管理 > 配置设置 > 用户个人资料** 下访问这些设置。此类别包含 **29 项设置**，下方列出平台设置固件（`SettingsCurrentFixtures.php`）中随附的标题与说明。

> 代码中的变量名以等宽字体显示。在通过 API 编写脚本，或需要通过编辑 [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) 在全局层面更改这些设置时，请使用该名称。

## 设置

### `account_valid_duration`

**账户有效期**

用户账户自创建起在此天数内有效

*默认值：`3660`*


### `add_user_course_information_in_mailto`

**在页脚联系邮件中预填用户与课程信息**

在 mailto: 页脚中添加主题与正文。

*默认值：`false`*


### `allow_show_linkedin_url`

**允许显示用户的 LinkedIn URL**

在用户社交区块添加链接，以便访问该用户的 LinkedIn 个人资料

### `allow_show_skype_account`

**允许显示用户的 Skype 账户**

在用户社交区块添加链接，以便通过 Skype 发起聊天

### `allow_social_map_fields`

**用户在地图上的地理位置**

在社交网络中启用地图显示，以便定位其他用户。这包括若干位置（当前位置与目的地），须在独立的扩展字段中定义为地址或坐标。扩展字段必须在此处设置为数组。

### `allow_teachers_to_classes`

**允许教师管理班级**

使教师能够管理系统中的班级组及其成员。

*默认值：`false`*


### `allow_user_headings`

**允许在课程内进行用户画像**

教师能否定义学习者个人资料字段以获取额外信息？

### `allow_users_to_change_email_with_no_password`

**允许用户在不输入密码的情况下更改电子邮件**

在更改账户信息时

*默认值：`false`*

### `changeable_options`

**用户可在其个人资料中更改的字段**

选择用户可在其个人资料页面上更改的字段。


### `enable_profile_user_address_geolocalization`

**启用用户地理定位**

启用用户地址字段，并使用地理定位功能在地图上显示

### `extended_profile`

**作品集**

若启用此设置，用户可填写以下（可选）字段：“我的个人开放区域”、“我的能力”、“我的文凭”、“我能够教授的内容”

*默认值：`false`*

### `hide_username_in_course_chat`

**在课程聊天中隐藏用户名**

在课程聊天中隐藏用户名，仅显示人员姓名。

*默认值：`false`*


### `hide_username_with_complete_name`

**在已显示完整姓名时隐藏用户名**

某些内部函数在返回用户完整姓名时会同时返回用户名。启用此选项可确保用户名不会出现。

*默认值：`false`*


### `linkedin_organization_id`

**LinkedIn 组织 ID**

在 LinkedIn 上分享徽章时，LinkedIn 允许您设置组织 ID，该 ID 将链接到贵组织的 LinkedIn 页面（以关联颁发徽章的组织）。

*默认值：`false`*


### `login_is_email`

**使用电子邮件作为用户名**

使用电子邮件登录系统

*默认值：`false`*

### `my_space_users_items_per_page`

**mySpace 中每页默认条目数**

MySpace 跟踪分区（用户、作业统计、学生列表）中每页显示的记录数。

*默认值：`10`*


### `pass_reminder_custom_link`

**密码提醒自定义页面**

设置您自己的密码重置页面 URL。在使用联合账户管理系统时很有用。

### `profile_fields_visibility`

**个人资料页面上可见的字段**

字段数组以及它们在用户个人资料页面上是否可见（布尔值）（也适用于扩展字段标签）。

### `registration_add_helptext_for_2_names`

**在注册中添加填写两个姓名的帮助**

当双姓较为常见时，为用户在注册表单中输入两个姓名添加帮助文本。

*默认值：`false`*


### `send_notification_when_user_added`

**创建用户时向管理员发送邮件**

创建用户时向管理员发送电子邮件通知。

### `show_conditions_to_user`

**向用户显示特定注册条件**

在注册过程中向用户显示多项条件。提供一个数组，每个元素包含 'variable'（内部扩展字段名）、'display_text'（复选框的简短文本）、'text_area'（条件的长文本）。

### `show_official_code_whoisonline`

**在“谁在线”中显示官方代码**

在“谁在线”页面上、用户名下方显示官方代码。

*默认值：`false`*

### `show_terms_if_profile_completed`

**仅在个人资料完整时显示条款与条件**

启用此选项后，条款与条件仅在用户完成以 “terms_” 开头且设置为可见的额外个人资料字段后，才对该用户可用。

*默认值：`false`*


### `split_users_upload_directory`

**拆分用户上传目录**

在高负载门户中，注册用户众多且会上传头像时，上传目录（main/upload/users/）可能包含过多文件，导致文件系统难以处理（曾有 Debian 服务器上超过 36000 个文件的报告）。更改此选项将在上传目录中启用一级目录拆分。基础目录中将使用 9 个目录，此后所有用户目录将存储到这 9 个目录之一中。更改此选项不会影响磁盘上的目录结构，但会影响 Chamilo 代码的行为，因此若更改此选项，必须自行在服务器上创建新目录并移动现有目录。请注意，在创建和移动这些目录时，必须将用户 1 至 9 的目录移动到同名子目录中。若不确定此选项，最好不要启用。

*默认值：`true`*

### `use_users_timezone`

**启用用户时区**

允许用户选择自己的时区。配置完成后，用户将能以自己的时区查看作业截止日期及其他时间相关信息，从而减少提交时的错误。

*默认值：`true`*

### `user_import_settings`

**用户导入选项**

在 CSV/XML 用户导入中作为默认参数应用的选项数组。

### `user_search_on_extra_fields`

**管理员在用户列表中按额外字段搜索用户**

在用户搜索中自然包含给定的额外字段（额外字段标签数组）。

### `user_selected_theme`

**用户主题选择**

允许用户在个人资料中选择自己的视觉主题。这将改变该用户所见的 Chamilo 外观，但不会改动门户的默认样式。若特定课程或学期已指定主题，则优先于用户自定义主题。

*默认值：`false`*

### `visible_options`

**个人资料中可见字段列表**

控制哪些个人资料字段对用户及其他人可见。