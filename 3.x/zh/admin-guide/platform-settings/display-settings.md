# 显示设置

平台向用户展示的方式——首页布局、Gravatar、菜单、品牌行为及类似的视觉偏好。

可在 **管理 > 配置设置 > 显示** 下访问这些设置。此分类包含 **28 项设置**，下方列出平台设置固件（`SettingsCurrentFixtures.php`）中附带的标题与说明。

> 代码中的变量名以等宽字体显示。在通过 API 编写脚本，或需要通过编辑 [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) 在全局层面更改这些设置时，请使用该名称。

## 设置

### `accessibility_font_resize`

**字体缩放无障碍功能**

启用此选项后，将在校园页面右上角显示一组字体缩放选项。这将帮助视力障碍用户更轻松地阅读课程内容。

*默认值：`false`*

### `display_categories_on_homepage`

**在首页显示分类**

此选项将在门户首页显示或隐藏课程分类

*默认值：`false`*

### `enable_help_link`

**启用帮助链接**

帮助链接位于屏幕右上角

*默认值：`true`*

### `gravatar_enabled`

**Gravatar 用户头像**

启用此选项后，若当前用户尚未在本地定义头像，将在 Gravatar 仓库中搜索该用户的图片。这对于在站点上自动填充头像非常有用，尤其当您的用户是活跃的互联网用户时。Gravatar 头像可基于用户的电子邮件地址轻松配置，参见 http://en.gravatar.com/

*默认值：`false`*

### `gravatar_type`

**Gravatar 头像类型**

若已启用 Gravatar 选项且用户未在 Gravatar 上配置图片，此选项允许您选择 Gravatar 为每位用户生成的头像类型。头像类型示例请参见 <a href='http://en.gravatar.com/site/implement/images#default-image'>http://en.gravatar.com/site/implement/images#default-image</a>。

*默认值：`mm`*

### `hide_complete_name_in_whoisonline`

**在“谁在线”中隐藏完整用户名**

“谁在线”页面（若已启用）会为每位当前在线用户显示头像和姓名。启用此选项可隐藏姓名。

*默认值：`false`*

### `hide_home_top_when_connected` **v3**

**登录后隐藏首页顶部内容**

在平台首页上，此选项允许您对所有已登录用户隐藏介绍区块（例如仅保留公告）。尚未登录的用户仍会看到通用介绍区块。

*默认值：`false`*

### `hide_logout_button`

**隐藏退出按钮**

隐藏退出按钮。通常仅在使用外部登录/退出方式时有用，例如使用某种单点登录时。

*默认值：`false`*

### `hide_main_navigation_menu`

**隐藏主导航菜单**

当将 Chamilo 用于特定目的（例如一场大规模在线考试）时，您可能希望通过移除侧边菜单来进一步减少干扰。

*默认值：`false`*

### `hide_social_media_links`

**隐藏社交媒体链接**

部分页面允许您在社交网络上推广门户或课程。启用此设置可移除这些链接。

*默认值：`false`*

### `order_user_list_by_official_code`

**按官方编号排序用户**

使用“官方编号”对平台上大多数学生列表进行排序，而不是按其姓或名排序。

*默认值：`false`*

### `pdf_logo_header`

**PDF 页眉徽标**

是否使用 var/themes/[your-theme]/images/pdf_logo_header.png 处的图像作为所有 PDF 导出的页眉徽标（而非普通门户徽标）

### `show_admin_toolbar`

**显示管理工具栏**

向指定用户角色在页面顶部显示全局工具栏。该工具栏与 Wordpress 和 Google 的黑色工具栏非常相似，可显著加快复杂操作并增加学习内容的可用空间，但对部分用户可能造成困惑

*默认值：`do_not_show`*

### `show_administrator_data` **v3**

**页脚中的平台管理员信息**

是否在页脚中显示平台管理员信息？

*默认值：`true`*

### `show_back_link_on_top_of_tree`

**显示分类/课程的返回链接**

显示用于在课程层级中返回的链接。列表底部无论如何都会提供一个链接。

*默认值：`false`*

### `show_closed_courses`

**是否在登录页和门户起始页显示已关闭的课程？**

是否在登录页和课程起始页显示已关闭的课程？在门户起始页上，课程旁将出现图标以便快速报名各门课程。仅当用户已登录且尚未报名该门户时，才会出现在门户起始页上。

*默认值：`false`*

### `show_email_addresses`

**显示电子邮件地址**

向用户显示电子邮件地址

*默认值：`false`*

### `show_empty_course_categories`

**显示空课程分类**

即使课程分类为空，也在首页显示这些分类

*默认值：`true`*

### `show_hot_courses`

**显示热门课程**

热门课程列表将添加到首页

*默认值：`true`*

### `show_number_of_courses`

**显示课程数量**

在首页的课程分类中显示每个分类下的课程数量

*默认值：`false`*

### `show_tabs`

**主菜单项**

勾选希望在主菜单中显示的条目

*默认值：*
```json
{"menu":{"campus_homepage":true,"my_courses":true,"reporting":true,"platform_administration":true,"my_agenda":true,"social":true,"videoconference":false,"diagnostics":false,"catalogue":true,"session_admin":true,"search":true,"question_manager":false},"topbar":{"topbar_my_certificates":true,"topbar_my_custom_certificate":false,"topbar_skills":true}}
```

### `show_tabs_per_role`

**按角色显示的主菜单项**

按角色定义页眉标签的可见性。

*默认值：`{}`*

### `show_teacher_data` **v3**

**在页脚显示教师信息**

是否在页脚显示教师信息（姓名以及可用时的电子邮件）？

*默认值：`true`*

### `show_tutor_data` **v3**

**在页脚显示学期辅导教师数据。**

是否在页脚显示学期辅导教师信息（姓名以及可用时的电子邮件）？

*默认值：`true`*

### `showonline`

**谁在线**

是否显示在线人数？

*默认值：`world`*

### `table_default_row`

**表格默认行数**

所有表格默认应显示多少行。

*默认值：`20`*

### `table_row_list`

**表格默认提供的分页数量**

设置希望在表格导航中出现的选项，以便在一页上显示更少或更多行。例如 [50, 100, 200, 500]。

*默认值：`[10,20,50,100]`*

### `time_limit_whosonline`

**“谁在线”的时间限制**

此时间限制定义用户在最后一次操作之后多少分钟内仍被视为*在线*

*默认值：`30`*