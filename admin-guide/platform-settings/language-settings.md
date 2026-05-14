# 语言设置

可用语言、默认语言以及Chamilo如何决定显示哪种语言。

在**管理 > 配置设置 > 语言**下访问这些设置。此类别包含**12个设置**，以下列出平台设置固定数据（`SettingsCurrentFixtures.php`）中提供的标题和注释。

> 代码中的变量名以等宽字体显示。在通过API进行脚本编写或需要通过编辑[`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml)全局更改这些设置时使用。

## 设置

### `allow_course_multiple_languages`

**多语言课程**

启用以支持课程以多种语言管理。此选项在课程页面中添加语言选择器，使用户可以轻松切换，并为课程添加一个'multiple_language'额外字段，允许远程管理程序。

*默认值：`false`*

### `allow_use_sub_language`

**允许定义和使用子语言**

启用此选项后，您将能够为平台界面中使用的每个语言术语定义变体，以基于并扩展现有语言的新语言形式。您可以在管理面板的语言部分找到此选项。

*默认值：`false`*

### `auto_detect_language_custom_pages`

**在自定义页面中启用语言自动检测**

如果您使用自定义页面，启用此选项可以在页面中根据用户的浏览器语言呈现页面，或禁用此选项以强制使用平台默认语言。

*默认值：`true`*

### `language_flags_by_country`

**语言旗帜**

使用国家旗帜代表语言。默认情况下未启用，因为某些语言并非严格与某个国家相关联，这可能会让一些用户感到不满。

*默认值：`false`*

### `language_priority_1`

**最高优先级语言**

当设置了多种语言上下文时，首选的主要语言。

*默认值：`course_lang`*

### `language_priority_2`

**次级优先级语言**

如果首选语言不可用或不在上下文中，则作为次要备选语言。

*默认值：`user_profil_lang`*

### `language_priority_3`

**第三优先级语言**

如果更高优先级的语言失败，则作为第三备选语言。

*默认值：`user_selected_lang`*

### `language_priority_4`

**第四优先级语言**

按优先级顺序排列的最后备选语言。

*默认值：`platform_lang`*

### `platform_language`

**默认平台语言**

主要语言，当未设置用户语言时默认使用。

*默认值：`en`*

### `show_different_course_language`

**显示课程语言**

在首页课程列表中，在课程标题旁边显示每门课程的语言。

*默认值：`true`*

### `show_language_selector_in_menu`

**主菜单中的语言切换器**

在主菜单中显示语言选择器，立即更新用户的语言偏好。这在多语言门户网站中非常有用，学习者需要为学习切换语言。

*默认值：`true`*

### `template_activate_language_filter`

**多语言文档模板**

启用文档模板（在平台或课程级别）以针对特定语言进行配置。

*默认值：`false`*