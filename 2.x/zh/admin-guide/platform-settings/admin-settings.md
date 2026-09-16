# 管理员身份设置

平台管理员的身份和联系信息。这些值会显示在平台页脚以及一些系统生成的电子邮件中。

可以通过 **管理 > 配置设置 > 管理员身份** 访问这些设置。此类别包含 **12 个设置**，以下列出平台设置固定数据 (`SettingsCurrentFixtures.php`) 中提供的标题和注释。

> 代码中的变量名以等宽字体显示。在通过 API 进行脚本编写或需要通过编辑 [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) 在全局级别更改这些设置时使用。

## 设置

### `administrator_email`

**门户管理员：电子邮件**

平台管理员的电子邮件地址（显示在页脚左侧）

### `administrator_name`

**门户管理员：名字**

平台管理员的名字（显示在页脚左侧）

### `administrator_phone`

**门户管理员：电话号码**

平台管理员的电话号码（显示在页脚左侧）

### `administrator_surname`

**门户管理员：姓氏**

平台管理员的姓氏（显示在页脚左侧）

### `chamilo_latest_news`

**最新消息**

直接在您的管理面板中获取 Chamilo 的最新消息，包括安全漏洞和活动信息。每次加载管理页面时，这些消息都会在 Chamilo 新闻服务器上进行检查，并且仅对管理员可见。

*默认值：`true`*

### `chamilo_support`

**Chamilo 支持模块**

直接从 Chamilo 的制作者处获取专业建议和联系官方服务提供商以获得专业支持的便捷方式。此模块显示在您的管理页面上，仅对管理员可见，并且每次加载管理页面时都会刷新。

*默认值：`true`*

### `max_anonymous_users`

**多个匿名用户**

启用此选项以允许多个系统用户作为匿名用户。这在使用平台作为某些课程的公共展示平台时非常有用。允许多个匿名用户可以在体验期间为多个用户进行跟踪，而不会混淆他们的数据（否则可能会让他们感到困惑）。

*默认值：`0`*

### `redirect_admin_to_courses_list`

**将管理员重定向到课程列表**

默认行为是将管理员直接发送到管理面板（而教师和学生则被发送到课程列表或平台主页）。启用此选项后，管理员也会被重定向到他/她的课程列表。

*默认值：`false`*

### `send_inscription_notification_to_general_admin_only`

**仅通知全局管理员新用户**

启用后，只有全局管理员会收到有关新用户注册的电子邮件通知，而非所有管理员。

*默认值：`false`*

### `show_link_request_hrm_user`

**显示请求用户与人力资源经理关联的链接**

在个人资料页面上显示一个链接，允许人力资源总监请求与用户账户关联。

*默认值：`false`*

### `user_status_option_only_for_admin_enabled`

**对普通用户隐藏角色**

当此选项设置为 true 并且以下数组将相应角色设置为 'true' 时，允许隐藏用户的角色。

*默认值：`false`*

### `user_status_option_show_only_for_admin`

**定义对普通用户隐藏哪些角色**

设置为 'true' 的角色将仅对管理员可见。其他用户将无法看到这些角色。