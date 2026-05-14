# 显示设置

平台如何向用户展示——首页布局、Gravatar、菜单、品牌行为及类似的视觉偏好。

通过 **管理 > 配置设置 > 显示** 访问这些设置。此类别包含 **24 个设置**，以下列出平台设置固定数据（`SettingsCurrentFixtures.php`）中提供的标题和注释。

> 代码中的变量名以等宽字体显示。在通过 API 进行脚本编写或需要通过编辑 [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) 在全局级别更改这些设置时使用它。

## 设置

### `accessibility_font_resize`

**字体调整辅助功能**

启用此选项后，将在校园页面的右上角显示一组字体调整选项。这将帮助视障人士更轻松地阅读课程内容。

*默认值：`false`*

### `display_categories_on_homepage`

**在首页显示类别**

此选项将在门户首页显示或隐藏课程类别。

*默认值：`false`*

### `enable_help_link`

**启用帮助链接**

帮助链接位于屏幕右上角。

*默认值：`true`*

### `gravatar_enabled`

**Gravatar 用户图片**

启用此选项后，如果用户未在本地设置图片，将在 Gravatar 存储库中搜索当前用户的图片。这对于自动填充您网站上的图片非常有用，特别是如果您的用户是活跃的互联网用户。Gravatar 图片可以基于用户的电子邮件地址轻松配置，详见 http://en.gravatar.com/

*默认值：`false`*

### `gravatar_type`

**Gravatar 头像类型**

如果启用了 Gravatar 选项且用户未在 Gravatar 上配置图片，此选项允许您选择 Gravatar 为每个用户生成的头像类型。查看头像类型示例，请访问 <a href='http://en.gravatar.com/site/implement/images#default-image'>http://en.gravatar.com/site/implement/images#default-image</a>。

*默认值：`mm`*

### `hide_complete_name_in_whoisonline`

**在“谁在线”中隐藏完整用户名**

如果启用了“谁在线”页面，将显示当前在线的每个用户的图片和名称。启用此选项可隐藏名称。

*默认值：`false`*

### `hide_logout_button`

**隐藏退出按钮**

隐藏退出按钮。通常只有在使用外部登录/退出方法时（例如某种单点登录）才有用。

*默认值：`false`*

### `hide_main_navigation_menu`

**隐藏主导航菜单**

当将 Chamilo 用于特定目的（例如大规模在线考试）时，您可能希望通过移除侧边菜单进一步减少干扰。

*默认值：`false`*

### `hide_social_media_links`

**隐藏社交媒体链接**

某些页面允许您在社交网络上推广门户或课程。启用此设置可移除这些链接。

*默认值：`false`*

### `order_user_list_by_official_code`

**按官方代码排序用户**

使用“官方代码”对平台上的大多数学生列表进行排序，而不是按姓氏或名字排序。

*默认值：`false`*

### `pdf_logo_header`

**PDF 页眉标志**

是否使用 var/themes/[your-theme]/images/pdf_logo_header.png 图像作为所有 PDF 导出的 PDF 页眉标志（而不是普通的门户标志）。

### `show_admin_toolbar`

**显示管理员工具栏**

为指定的用户角色在页面顶部显示全局工具栏。此工具栏与 Wordpress 和 Google 的黑色工具栏非常相似，可以真正加快复杂操作的速度并增加学习内容可用空间，但可能会让某些用户感到困惑。

*默认值：`do_not_show`*

### `show_back_link_on_top_of_tree`

**显示类别/课程的返回链接**

显示一个链接以返回课程层级。无论如何，列表底部都会有一个链接可用。

*默认值：`false`*

### `show_closed_courses`

**在登录页面和门户起始页面显示已关闭的课程？**

是否在登录页面和课程起始页面显示已关闭的课程？在门户起始页面上，课程旁边会显示一个图标，以便快速订阅每个课程。这仅在用户登录且尚未订阅门户时在门户起始页面上显示。

*默认值：`false`*

### `show_email_addresses`

**显示电子邮件地址**

向用户显示电子邮件地址。

*默认值：`false`*

### `show_empty_course_categories`

**显示空的课程类别**

在首页显示课程类别，即使它们是空的。

*默认值：`true`*

### `show_hot_courses`

**显示热门课程**

热门课程列表将添加到索引页面中。

*默认值：`true`*

### `show_number_of_courses`

**显示课程数量**

在首页的课程类别中显示每个类别的课程数量。

*默认值：`false`*

---
### `show_tabs`

**主菜单项**

勾选您希望在主菜单中显示的条目

*默认值：*
```json
{"menu":{"campus_homepage":true,"my_courses":true,"reporting":true,"platform_administration":true,"my_agenda":true,"social":true,"videoconference":false,"diagnostics":false,"catalogue":true,"session_admin":true,"search":true,"question_manager":false},"topbar":{"topbar_my_certificates":true,"topbar_my_custom_certificate":false,"topbar_skills":true}}
```

### `show_tabs_per_role`

**按角色显示主菜单项**

定义按角色显示的头部标签可见性。

*默认值：`{}`*

### `showonline`

**在线用户**

是否显示当前在线的人数？

*默认值：`world`*

### `table_default_row`

**表格默认行数**

默认情况下，所有表格应显示多少行。

*默认值：`20`*

### `table_row_list`

**表格中默认提供的分页选项**

设置您希望在表格导航中显示的选项，以便在一页上显示更少或更多的行。例如：[50, 100, 200, 500]。

*默认值：`[10,20,50,100]`*

### `time_limit_whosonline`

**在线用户时间限制**

此时间限制定义了用户在最后一次操作后多少分钟内仍被视为“在线”。

*默认值：`30`*