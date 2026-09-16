# 管理员身份设置

平台管理员的身份与联系信息。这些值会显示在平台页脚以及部分系统生成的邮件中。

可在 **管理 > 配置设置 > 管理员身份** 下访问这些设置。此分类包含 **12 项设置**，下方列出平台设置固件（`SettingsCurrentFixtures.php`）中附带的标题与说明。

> 代码中的变量名以等宽字体显示。通过 API 编写脚本，或需要通过编辑 [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) 在全局层面更改这些设置时，请使用该名称。

## 设置

### `administrator_email`

**门户管理员：电子邮件**

平台管理员的电子邮件地址（显示在页脚左侧）

### `administrator_name`

**门户管理员：名**

平台管理员的名（显示在页脚左侧）

### `administrator_phone`

**门户管理员：电话号码**

平台管理员的电话号码（显示在页脚左侧）

### `administrator_surname`

**门户管理员：姓**

平台管理员的姓氏（显示在页脚左侧）

### `chamilo_latest_news`

**最新动态**

在管理面板中直接获取来自 Chamilo 的最新动态，包括安全漏洞与活动信息。每次加载管理页面时，都会向 Chamilo 新闻服务器检查这些动态，且仅对管理员可见。

*默认值：`true`*

### `chamilo_support`

**Chamilo 支持区块**

直接从 Chamilo 开发方获取专业提示，以及联系官方服务提供商以获得专业支持的便捷方式。该区块显示在管理页面上，仅对管理员可见，并在每次加载管理页面时刷新。

*默认值：`true`*

### `max_anonymous_users`

**多个匿名用户**

启用此选项可为匿名用户允许多个系统用户。当将本平台用作部分课程的公开展示厅时，此功能很有用。拥有多个匿名用户可使跟踪在体验期间对若干用户生效，而不会将其数据混在一起（否则可能造成混淆）。

*默认值：`0`*

### `redirect_admin_to_courses_list`

**将管理员重定向到课程列表**

默认行为是将管理员直接送往管理面板（而教师和学生则被送往课程列表或平台首页）。启用以将管理员也重定向到其课程列表。

*默认值：`false`*

### `send_inscription_notification_to_general_admin_only`

**仅向全局管理员通知新用户**

启用后，仅全局管理员会收到有关新用户注册的电子邮件通知，而非所有管理员。

*默认值：`false`*

### `show_link_request_hrm_user`

**显示请求用户与 HRM 关联的链接**

在个人资料页显示一个链接，允许人力资源主管请求与某个用户账户建立关联。

*默认值：`false`*

### `user_status_option_only_for_admin_enabled`

**对普通用户隐藏角色**

当此选项设为 true，且下列数组将相应角色设为 'true' 时，允许隐藏用户的角色。

*默认值：`false`*

### `user_status_option_show_only_for_admin`

**定义对普通用户隐藏的角色**

设为 'true' 的角色将仅对管理员显示。其他用户将无法看到这些角色。