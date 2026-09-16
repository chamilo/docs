# 注册设置

自助注册策略与注册后重定向——新用户需要填写哪些信息，以及注册完成后将进入何处。

可在 **管理 > 配置设置 > 注册** 下访问这些设置。本类别包含 **21 项设置**，下方列出平台设置固件（`SettingsCurrentFixtures.php`）中附带的标题与说明。

> 代码中的变量名以等宽字体显示。通过 API 编写脚本，或需要通过编辑 [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) 在全局层面更改这些设置时，请使用该名称。

## 设置

### `allow_double_validation_in_registration`

**注册流程双重验证**

仅在注册页面显示确认请求，然后再继续创建用户。

*默认值：`false`*


### `allow_fields_inscription`

**限制注册时显示的字段**

若只需显示部分可用的个人资料字段，可在此填写数组，其子元素 `fields` 和 `extra_fields` 为包含待显示字段列表的数组。

### `allow_invitation_registration` **v3**

**允许通过课程邀请链接注册**

启用后，教师/管理员可从课程的“用户”工具发送一次性邀请链接，使未注册人员能够到达注册表单并完成注册，即使已禁用一般自助注册（`allow_registration`）。

*默认值：`false`*

教师侧功能说明见 [订阅用户](../../teacher-guide/assessing-learners/subscribing-users.md#inviting-users-by-email)。

### `allow_lostpassword`

**忘记密码**

是否允许用户申请找回丢失的密码？

*默认值：`true`*

### `allow_registration`

**注册**

是否允许以新用户身份注册？用户能否创建新账户？

*默认值：`false`*

### `allow_registration_as_teacher`

**以教师身份注册**

是否可以注册为教师（具备创建课程的能力）？

*默认值：`false`*

### `allow_terms_conditions`

**启用条款与条件**

此选项将在新用户注册表单中显示条款与条件。需先在门户管理页面中完成配置。

*默认值：`false`*


### `drh_autosubscribe`

**人力资源主管自动订阅**

人力资源主管自动订阅 - 尚不可用

### `extendedprofile_registration`

**注册时的作品集字段**

作品集中的下列哪些字段需在用户注册流程中可用？这要求已启用作品集选项（见上文）。

### `extendedprofile_registrationrequired`

**注册时的必填作品集字段**

作品集中的下列哪些字段在用户注册流程中为*必填*？这要求已启用作品集选项，且该字段也已在注册表单中可用（见上文）。

### `extldap_config`

**LDAP 连接配置**

定义 LDAP 服务器主机与端口的数组。

### `hide_legal_accept_checkbox`

**在条款与条件页面隐藏法律接受复选框**

若设为 true，将在条款与条件页面流程中移除“我已阅读并接受”复选框。

*默认值：`false`*


### `platform_unsubscribe_allowed`

**允许从平台取消订阅**

启用此选项后，任何用户均可从平台上彻底删除其账户及所有相关数据。这是相当彻底的操作，但对于向公众开放、用户可自助注册的门户而言是必要的。用户个人资料中将出现额外条目，经确认后即可取消订阅。

*默认值：`false`*


### `redirect_after_login`

**登录后重定向（按角色）**

使用类似 {"STUDENT":"", "ADMIN":"admin-dashboard"} 的 JSON 对象，按角色定义登录后的重定向。

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

**注册时的必填扩展字段**

用户注册期间必须填写的扩展字段标识符数组。

### `required_profile_fields`

**注册时的必填字段**

注册期间必须提供的个人资料字段名称数组（email、phone、language、official_code）。

### `send_inscription_msg_to_inbox`

**将欢迎消息发送至电子邮件和收件箱**

默认情况下，欢迎消息（含凭据）仅通过电子邮件发送。启用此选项后，也会将其发送到用户的 Chamilo 收件箱。

*默认值：`false`*


### `sessionadmin_autosubscribe`

**学期管理员自动订阅**

学期管理员自动订阅 - 尚不可用

### `student_autosubscribe`

**学习者自动订阅**

学习者自动订阅 - 尚不可用

### `teacher_autosubscribe`

**教师自动订阅**

教师自动订阅 - 尚不可用

### `user_hide_never_expire_option`

**隐藏用户的“永不过期”选项**

在创建/编辑用户账户时移除“永不过期”选项。

*默认值：`false`*