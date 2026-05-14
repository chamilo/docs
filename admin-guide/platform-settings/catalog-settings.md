# 课程目录设置

课程目录（用户可以浏览和自行注册的公共列表）的行为设置。

通过 **管理 > 配置设置 > 课程目录** 访问这些设置。此类别包含 **13 个设置**，以下列出平台设置固定数据 (`SettingsCurrentFixtures.php`) 中提供的标题和注释。

> 代码中的变量名以等宽字体显示。在通过 API 进行脚本编写或需要通过编辑 [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) 在全局级别更改这些设置时使用它。

## 设置

### `allow_session_auto_subscription`

**自动会话订阅**

启用用户自动订阅会话的功能。

*默认值：`false`*

### `allow_students_to_browse_courses`

**允许学生浏览**

允许学生浏览和筛选课程目录。

*默认值：`true`*

### `course_catalog_display_in_home`

**在首页显示目录**

在平台首页显示课程目录模块。

*默认值：`false`*

### `course_catalog_hide_private`

**隐藏私有课程**

从目录显示中排除私有课程。

*默认值：`true`*

### `course_catalog_published`

**发布课程目录**

使课程目录对匿名用户（公众）开放，无需登录即可访问。

*默认值：`false`*

### `course_catalog_settings`

**课程目录设置**

课程目录的 JSON 配置：链接设置、筛选器、排序选项等。

### `course_subscription_in_user_s_session`

**会话视图中的订阅**

允许用户直接从他们的会话页面订阅课程。

*默认值：`false`*

### `hide_public_link`

**隐藏公共链接**

从课程卡片中移除公共 URL 链接。

*默认值：`false`*

### `only_show_course_from_selected_category`

**仅在课程目录中显示匹配的类别**

当不为空时，仅显示来自指定类别的课程。

### `only_show_selected_courses`

**仅显示选定课程**

在目录中仅显示手动选择的课程。

*默认值：`false`*

### `session_catalog_settings`

**会话目录设置**

会话目录的 JSON 配置：筛选器和显示选项。

### `show_courses_descriptions_in_catalog`

**显示课程描述**

在目录列表中显示课程描述。

*默认值：`false`*

### `show_courses_sessions`

**显示课程和会话**

在目录结果中同时包含课程和会话。

*默认值：`0`*