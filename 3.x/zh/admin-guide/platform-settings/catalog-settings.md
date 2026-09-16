# 课程目录设置

课程目录（用户可浏览并自行注册的公开列表）的行为。

可在 **管理 > 配置设置 > 课程目录** 下访问这些设置。此分类包含 **13 项设置**，下列标题与说明与平台设置 fixtures（`SettingsCurrentFixtures.php`）中提供的内容一致。

> 代码中的变量名以等宽字体显示。通过 API 编写脚本，或通过编辑 [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) 在全局层面更改这些设置时，请使用该名称。

## 设置

### `allow_session_auto_subscription`

**自动会话订阅**

启用用户对会话的自动订阅。

*默认值：`false`*

### `allow_students_to_browse_courses`

**允许学生浏览**

允许学生浏览并筛选课程目录。

*默认值：`true`*

### `course_catalog_display_in_home`

**在首页显示目录**

在平台首页显示课程目录区块。

*默认值：`false`*

### `course_catalog_hide_private`

**隐藏私有课程**

从目录显示中排除私有课程。

*默认值：`true`*

### `course_catalog_published`

**发布课程目录**

使课程目录对匿名用户（公众）可用，无需登录。

*默认值：`false`*

### `course_catalog_settings`

**课程目录设置**

课程目录的 JSON 配置：链接设置、筛选器、排序选项等。

### `course_subscription_in_user_s_session`

**在会话视图中订阅**

允许用户直接从其会话页面订阅课程。

*默认值：`false`*

### `hide_public_link`

**隐藏公开链接**

从课程卡片中移除公开 URL 链接。

*默认值：`false`*

### `only_show_course_from_selected_category`

**课程目录中仅显示匹配分类**

当不为空时，课程目录中仅显示给定分类下的课程。

### `only_show_selected_courses`

**仅显示所选课程**

在目录中仅显示手动选定的课程。

*默认值：`false`*

### `session_catalog_settings`

**会话目录设置**

会话目录的 JSON 配置：筛选器与显示选项。

### `show_courses_descriptions_in_catalog`

**显示课程描述**

在目录列表中显示课程描述。

*默认值：`false`*

### `show_courses_sessions`

**显示课程与会话**

在目录结果中同时包含课程和会话。

*默认值：`0`*