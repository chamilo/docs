# 平台设置

平台级身份与行为——机构名称、时区、注册策略、在线用户、性能相关开关。

在 **管理 > 配置设置 > 平台** 下访问这些设置。本类别包含 **29 项设置**，下列各项均附有平台设置固件（`SettingsCurrentFixtures.php`）中提供的标题与说明。

> 代码中的变量名以等宽字体显示。通过 API 编写脚本，或需要通过编辑 [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) 在全局层面更改这些设置时，请使用该名称。

## 设置

### `allow_my_files`

**启用“我的文件”区域**

允许用户将文件上传到平台上的个人空间。

*默认值：`true`*

### `chamilo_database_version`

**Chamilo 当前使用的数据库架构版本**

显示当前数据库版本，以便与 Chamilo 核心版本对应。

### `cookie_warning`

**Cookie 隐私通知**

若启用，此选项会在平台顶部显示横幅，要求用户确认平台正在使用提供用户体验所必需的 Cookie。用户可轻松确认并隐藏该横幅。这有助于 Chamilo 符合欧盟网络 Cookie 相关法规。

*默认值：`false`*

### `disable_copy_paste`

**禁用复制粘贴**

启用后，此选项会尽可能禁用复制粘贴机制。适用于限制较严的考试场景。

*默认值：`false`*

### `donotlistcampus`

**不在 chamilo.org 上列出本校园站点**

默认情况下，Chamilo 门户会自动登记到 chamilo.org 的公开列表中，仅使用您为本门户指定的标题（不含 URL 或任何私人数据）。勾选此框可避免您的门户标题出现在该列表中。

*默认值：`false`*

### `generate_random_login`

**生成随机用户名**

导入用户（批处理）时，自动为用户名生成随机字符串。否则，用户名将基于名和姓，或电子邮件前缀生成。

*默认值：`false`*

### `hosting_limit_identical_email`

**限制相同电子邮件的使用**

允许共用同一电子邮件地址的账户数量上限。设为 0 可禁用此限制。

*默认值：`0`*

### `hosting_limit_users_per_course`

**每门课程的全局用户上限**

定义平台中任意单门课程允许订阅的用户（含教师）全局最大数量。将此值设为 0 可禁用该限制。这有助于避免开放门户中课程过载。

*默认值：`0`*

### `institution`

**机构名称**

机构名称（显示在页眉右侧）

*默认值：`Chamilo.org`*


### `institution_address`

**机构地址**

地址

### `institution_url`

**机构 URL（网址）**

机构的 URL（页眉右侧显示的链接）

*默认值：`http://www.chamilo.org`*


### `max_courses_per_user`

**每用户课程上限**

教师/培训师可创建的课程数量上限。设为 0 可禁用该限制。可通过 BuyCourses 服务购买按用户覆盖。

*默认值：`0`*

### `notification_event`

**启用通知工具，以提供更具影响力的学生沟通渠道**

为重要平台事件激活弹出或系统通知。

*默认值：`false`*

### `pdf_img_dpi`

**PDF 导出分辨率**

表示生成的 PDF 文件的分辨率（每英寸点数，即 dpi）。默认值为 96。提高该值可获得更高分辨率的 PDF 文件，但也会增加文件体积和生成时间。

*默认值：`96`*

### `platform_logo_url`

**备用平台徽标的 URL**

通过加载（可能为远程的）URL 替换 Chamilo 徽标。请确保这符合您的安全策略。

*默认值：`https://chamilo.org`*


### `portfolio_advanced_sharing`

**启用作品集高级共享**

决定谁可以查看作品集的帖子与评论。

*默认值：`false`*

### `portfolio_show_base_course_post_in_sessions`

**在学期课程中显示基础课程帖子**

决定谁可以查看作品集的帖子与评论。

*默认值：`false`*

### `push_notification_settings`

**推送通知设置（JSON）**

推送通知集成的 JSON 配置。

### `server_type`

**服务器类型**

定义环境类型：“prod”（正常生产）、“validation”（类似生产但不报告统计信息），或 “test”（带开发者工具的调试模式，例如未翻译字符串指示器）。

*默认值：`prod`*

### `session_admin_access_to_all_users_on_all_urls`

**允许学期管理员查看所有 URL 上的全部用户**

若启用，学期管理员可搜索并列出所有访问 URL 中的用户，不受其当前 URL 限制。

*默认值：`false`*

### `site_name`

**在线学习门户名称**

您的 Chamilo 门户名称（显示在页眉中）

*默认值：`Chamilo site`*


### `timepicker_increment`

**时间选择器增量**

使用时间选择器控件选择日期和时间时的最小时间增量（以分钟为单位）。例如，在作业提交、测验可用时间、课程班开始时间等场景中，小于 5 或 15 分钟的增量可能并无实际意义。

*默认值：`15`*

### `timezone`

**默认时区**

选择本门户的默认时区。这将有助于为每位新用户或尚未设置特定时区的用户设定时区（若该功能已启用）。时区有助于按每位用户各自的时区在屏幕上显示所有与时间相关的信息。

*默认值：`Europe/Paris`*


### `unoconv_binaries`

**UNO 转换器二进制文件**

提供 UNO 转换器库的系统路径，以启用部分额外的导出功能。

*默认值：`/usr/bin/unoconv`*


### `use_career_external_id_as_identifier_in_diagrams`

**在图表中使用外部职业 ID**

若使用职业图表，则显示额外字段，而非内部职业 ID。

*默认值：`false`*

### `use_custom_pages`

**使用自定义页面**

启用此功能可按角色配置特定的登录页面

*默认值：`false`*

### `use_virtual_keyboard`

**使用虚拟键盘**

显示虚拟键盘。在实体教室中设置限制性考试、学生没有键盘从而限制其作弊能力时，此功能很有用。

*默认值：`false`*

### `user_status_show_option`

**角色显示选项**

一个 role => true/false 的数组，用于定义该角色应显示还是隐藏。

### `user_status_show_options_enabled`

**角色选择性显示**

启用以使用数组定义哪些角色应明确显示、哪些应隐藏。

*默认值：`false`*