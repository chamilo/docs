# 消息设置

**消息/收件箱**系统的行为设置。

通过**管理 > 配置设置 > 消息**访问这些设置。此类别包含**7个设置**，以下列出平台设置固定数据（`SettingsCurrentFixtures.php`）中提供的标题和注释。

> 代码中的变量名以等宽字体显示。在通过API进行脚本编写或需要通过编辑[`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) 在全局级别更改这些设置时使用它。

## 设置

### `allow_message_tool`

**内部消息工具**

启用内部消息工具后，用户可以向平台上的其他用户发送消息，并拥有一个消息收件箱。

*默认值：`true`*

### `allow_send_message_to_all_platform_users`

**允许向任何平台用户发送消息**

允许您向平台上的任何用户发送消息，而不仅仅是您的好友或当前在线的人。

*默认值：`false`*

### `allow_user_message_tracking`

**管理员可以查看个人消息**

允许管理员查看教师与学习者之间的个人消息。请确保在您的条款和条件中包含一条说明，因为这可能会影响隐私保护。

*默认值：`false`*

### `filter_interactivity_messages`

**教师只能在会话时间范围内访问学习者的消息**

在会话开始和结束日期之间过滤教师与学习者之间的消息。

*默认值：`false`*

### `message_max_upload_filesize`

**消息中上传文件的最大大小**

消息工具中文件上传的最大大小（以字节为单位）。

*默认值：`20971520`*

### `private_messages_about_user`

**允许教师之间就学习者进行私人消息交流**

允许教师/上级在该用户的跟踪页面上就该用户进行消息交流。

*默认值：`false`*

### `private_messages_about_user_visible_to_user`

**允许学习者查看教师之间关于他们的消息**

如果启用了关于用户的消息交流，此选项将允许相应用户查看这些消息。这是为了遵守组织可能需要遵循的透明度规则。

*默认值：`false`*