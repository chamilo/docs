# 消息设置

**消息 / 收件箱** 系统的行为。

可在 **管理 > 配置设置 > 消息** 下访问这些设置。此类别包含 **7 项设置**，以下列出平台设置固件（`SettingsCurrentFixtures.php`）中附带的标题与说明。

> 代码中的变量名以等宽字体显示。在通过 API 编写脚本，或需要通过编辑 [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) 在全局层面更改这些设置时，请使用该名称。

## 设置

### `allow_message_tool`

**站内消息工具**

启用站内消息工具后，用户可以向平台上的其他用户发送消息，并拥有消息收件箱。

*默认值：`true`*

### `allow_send_message_to_all_platform_users`

**允许向任意平台用户发送消息**

允许向平台上的任意用户发送消息，而不仅限于好友或当前在线用户。

*默认值：`false`*

### `allow_user_message_tracking`

**管理员可查看私人消息**

允许管理员查看教师与学员之间的私人消息。请务必在您的条款与条件中加入说明，因为这可能影响隐私保护。

*默认值：`false`*


### `filter_interactivity_messages`

**教师仅可在学期时间范围内访问学员消息**

按学期起止日期筛选教师与学员之间的消息

*默认值：`false`*


### `message_max_upload_filesize`

**消息中的最大上传文件大小**

消息工具中文件上传的最大大小（以字节为单位）

*默认值：`20971520`*

### `private_messages_about_user`

**允许教师之间就某位学员发送私人消息**

允许教师/主管从该用户的跟踪页面就该用户交换消息。

*默认值：`false`*


### `private_messages_about_user_visible_to_user`

**允许学员查看教师之间关于自己的消息**

若已启用关于某用户的消息交换，此选项将允许对应用户查看这些消息。此举旨在满足组织可能需要遵守的透明度规则。

*默认值：`false`*