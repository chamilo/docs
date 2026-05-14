# 注册设置

自助注册政策和注册后重定向——新用户需要提供的信息以及他们登录后的页面。

在 **管理 > 配置设置 > 注册** 下访问这些设置。此类别包含 **20 个设置**，以下列出平台设置固定数据（`SettingsCurrentFixtures.php`）中提供的标题和注释。

> 代码中的变量名以等宽字体显示。在通过 API 进行脚本编写或需要通过编辑 [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) 在全局级别更改这些设置时使用。

## 设置

### `allow_double_validation_in_registration`

**注册过程中的双重验证**

在注册页面上简单显示确认请求，然后再继续创建用户。

*默认值：`false`*

### `allow_fields_inscription`

**限制注册时显示的字段**

如果您只想显示部分可用的个人资料字段，可以在此处完成数组，包含子元素 'fields' 和 'extra_fields'，其中包含要显示的字段列表的数组。

### `allow_lostpassword`

**忘记密码**

是否允许用户请求找回丢失的密码？

*默认值：`true`*

### `allow_registration`

**注册**

是否允许作为新用户注册？用户是否可以创建新账户？

*默认值：`false`*

### `allow_registration_as_teacher`

**以教师身份注册**

是否可以注册为教师（具备创建课程的能力）？

*默认值：`false`*

### `allow_terms_conditions`

**启用条款和条件**

此选项将在新用户注册表单中显示条款和条件。需要在门户管理页面中首先进行配置。

*默认值：`false`*

### `drh_autosubscribe`

**人力资源总监自动订阅**

人力资源总监自动订阅 - 尚未可用

### `extendedprofile_registration`

**注册时的档案字段**

在用户注册过程中，以下档案字段中哪些需要可用？此选项要求档案选项已启用（见上文）。

### `extendedprofile_registrationrequired`

**注册时必需的档案字段**

在用户注册过程中，以下档案字段中哪些是*必需*的？此选项要求档案选项已启用，并且该字段在注册表单中也可用（见上文）。

### `extldap_config`

**LDAP 连接配置**

定义 LDAP 服务器主机和端口的数组。

### `hide_legal_accept_checkbox`

**在条款和条件页面中隐藏法律接受复选框**

如果设置为 true，将在条款和条件页面流程中移除“我已阅读并接受”复选框。

*默认值：`false`*

### `platform_unsubscribe_allowed`

**允许从平台退订**

通过启用此选项，您允许任何用户永久删除自己的账户以及与平台相关的所有数据。这是一个相当激进的行动，但对于向公众开放且用户可以自助注册的门户网站来说是必要的。用户档案中将出现一个额外的条目，以便在确认后退订。

*默认值：`false`*

### `redirect_after_login`

**登录后重定向（按角色）**

使用 JSON 对象定义每个角色登录后的重定向，例如 {"STUDENT":"", "ADMIN":"admin-dashboard"}

*默认值：*
```json
{
  "COURSEMANAGER": "courses",
  "STUDENT": "courses",
  "DRH": "",
  "SESSIONADMIN": "admin-dashboard",
  "STUDENT_BOSS": "main/my_space/student.php",
  "INVITEE": "courses",
  "ADMIN": "admin"
}
```

### `required_extra_fields_in_inscription`

**注册时必需的额外字段**

用户注册时必须填写的额外字段标识符数组。

### `required_profile_fields`

**注册时必需的字段**

用户注册时必须提供的个人资料字段名称数组（email, phone, language, official_code）。

### `send_inscription_msg_to_inbox`

**将欢迎消息发送到电子邮件和收件箱**

默认情况下，欢迎消息（包含凭据）仅通过电子邮件发送。启用此选项后，也会将其发送到用户的 Chamilo 收件箱。

*默认值：`false`*

### `sessionadmin_autosubscribe`

**会话管理员自动订阅**

会话管理员自动订阅 - 尚未可用

### `student_autosubscribe`

**学习者自动订阅**

学习者自动订阅 - 尚未可用

### `teacher_autosubscribe`

**教师自动订阅**

教师自动订阅 - 尚未可用

### `user_hide_never_expire_option`

**对用户隐藏“永不过期”选项**

在创建/编辑用户账户时移除“永不过期”选项。

*默认值：`false`*