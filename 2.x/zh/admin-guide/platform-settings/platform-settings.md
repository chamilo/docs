# 平台设置

平台级别的身份和行为设置——机构名称、时区、注册政策、在线用户、性能标志。

通过 **管理 > 配置设置 > 平台** 访问这些设置。此类别包含 **29 个设置**，以下列出平台设置固定数据（`SettingsCurrentFixtures.php`）中提供的标题和注释。

> 代码中的变量名以等宽字体显示。在通过 API 进行脚本编写或需要通过编辑 [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) 在全局级别更改这些设置时使用。

## 设置

### `allow_my_files`

**启用“我的文件”部分**

允许用户上传文件到平台上的个人空间。

*默认值：`true`*

### `chamilo_database_version`

**Chamilo 使用的数据库模式的当前版本**

显示当前数据库版本以匹配 Chamilo 核心版本。

### `cookie_warning`

**Cookie 隐私通知**

如果启用，此选项会在平台顶部显示一个横幅，询问用户是否确认平台使用提供用户体验所需的 cookie。用户可以轻松确认并隐藏此横幅。这使 Chamilo 能够遵守欧盟网络 cookie 法规。

*默认值：`false`*

### `disable_copy_paste`

**禁用复制粘贴**

启用后，此选项会尽可能禁用复制粘贴机制。在限制性考试设置中非常有用。

*默认值：`false`*

### `donotlistcampus`

**不在 chamilo.org 上列出此校园**

默认情况下，Chamilo 门户会自动在 chamilo.org 的公共列表中注册，仅使用您为此门户设置的标题（不包括 URL 或任何私人数据）。勾选此选项以避免您的门户标题出现在列表中。

*默认值：`false`*

### `generate_random_login`

**生成随机用户名**

在导入用户（批量处理）时，自动为用户名生成随机字符串。否则，用户名将基于名字和姓氏或电子邮件前缀生成。

*默认值：`false`*

### `hosting_limit_identical_email`

**限制相同电子邮件的使用**

允许共享同一电子邮件地址的最大账户数。设置为 0 以禁用此限制。

*默认值：`0`*

### `hosting_limit_users_per_course`

**每门课程的用户全局限制**

定义平台上任何单门课程允许订阅的最大用户数（包括教师）。将此值设置为 0 以禁用限制。这有助于避免开放门户中的课程超载。

*默认值：`0`*

### `institution`

**组织名称**

组织的名称（显示在右侧标题中）

*默认值：`Chamilo.org`*

### `institution_address`

**机构地址**

地址

### `institution_url`

**组织 URL（网址）**

机构的 URL（显示在右侧标题中的链接）

*默认值：`http://www.chamilo.org`*

### `max_courses_per_user`

**每用户最大课程数**

教师/培训师可以创建的最大课程数。设置为 0 以禁用限制。可以通过 BuyCourses 服务购买按用户覆盖此限制。

*默认值：`0`*

### `notification_event`

**启用通知工具以实现与学生更具影响力的沟通渠道**

为重要平台事件激活弹出窗口或系统通知。

*默认值：`false`*

### `pdf_img_dpi`

**PDF 导出分辨率**

表示生成的 PDF 文件的分辨率（以每英寸点数或 dpi 为单位）。默认值为 96。增加此值会提高 PDF 文件的分辨率，但也会增加文件的重量和生成时间。

*默认值：`96`*

### `platform_logo_url`

**替代平台标志的 URL**

通过加载（可能是远程的）URL 替换 Chamilo 标志。确保您的安全策略允许此操作。

*默认值：`https://chamilo.org`*

### `portfolio_advanced_sharing`

**启用作品集高级共享**

决定谁可以查看作品集的帖子和评论。

*默认值：`false`*

### `portfolio_show_base_course_post_in_sessions`

**在会话课程中显示基础课程帖子**

决定谁可以查看作品集的帖子和评论。

*默认值：`false`*

### `push_notification_settings`

**推送通知设置 (JSON)**

推送通知集成的 JSON 配置。

### `server_type`

**服务器类型**

定义环境类型：“prod”（正常生产）、“validation”（类似生产但不报告统计数据）或“test”（调试模式，带有开发者工具，如未翻译字符串指示器）。

*默认值：`prod`*

### `session_admin_access_to_all_users_on_all_urls`

**允许会话管理员查看所有 URL 上的所有用户**

如果启用，会话管理员可以搜索并列出所有访问 URL 上的用户，无论其当前 URL 为何。

*默认值：`false`*

---
### `site_name`

**电子学习门户名称**

您的Chamilo门户网站的名称（显示在页眉中）

*默认值：`Chamilo site`*

### `timepicker_increment`

**时间选择器增量**

使用时间选择器小部件选择日期和时间时的最小时间增量（以分钟为单位）。例如，在讨论作业提交、测试可用性、课程开始时间等时，可能不需要小于5分钟或15分钟的增量。

*默认值：`15`*

### `timezone`

**默认时区**

为该门户网站选择默认时区。这将有助于为每个新用户或尚未设置特定时区的用户设置时区（如果启用了该功能）。时区有助于在屏幕上以每个用户的特定时区显示所有与时间相关的信息。

*默认值：`Europe/Paris`*

### `unoconv_binaries`

**UNO转换器二进制文件**

提供UNO转换器库的系统路径，以启用一些额外的导出功能。

*默认值：`/usr/bin/unoconv`*

### `use_career_external_id_as_identifier_in_diagrams`

**在图表中使用外部职业ID**

如果使用职业图表，则显示一个额外的字段，而不是内部职业ID。

*默认值：`false`*

### `use_custom_pages`

**使用自定义页面**

启用此功能以按角色配置特定的登录页面。

*默认值：`false`*

### `use_virtual_keyboard`

**使用虚拟键盘**

显示虚拟键盘。这在设置限制性考试时非常有用，特别是在学生没有键盘的物理房间中，以限制他们作弊的可能性。

*默认值：`false`*

### `user_status_show_option`

**角色显示选项**

一个角色 => true/false 的数组，用于定义该角色是应该显示还是隐藏。

### `user_status_show_options_enabled`

**角色选择性显示**

启用此功能以使用数组定义哪些角色应明确显示，哪些角色应隐藏。

*默认值：`false`*