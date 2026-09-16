# 语言设置

可用语言、默认语言，以及 Chamilo 如何确定要显示的语言。

可在 **管理 > 配置设置 > 语言** 下访问这些设置。此类别包含 **13 项设置**，下方列出平台设置 fixtures（`SettingsCurrentFixtures.php`）中附带的标题与说明。

> 代码中的变量名以等宽字体显示。在通过 API 编写脚本，或需要通过编辑 [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) 在全局层面更改这些设置时，请使用该名称。

## 设置

### `allow_course_multiple_languages`

**多语言课程**

启用以多种语言管理的课程。此选项会在课程页面中添加语言选择器，方便用户切换，并为课程添加 `multiple_language` 额外字段，以便进行远程管理操作。

*默认值：`false`*


### `allow_use_sub_language`

**允许定义并使用子语言**

启用此选项后，您将能够为平台界面中使用的每个语言术语定义变体，形式为基于并扩展现有语言的新语言。您可在管理面板的语言部分找到此选项。

*默认值：`false`*

### `auto_detect_language_custom_pages`

**在自定义页面中启用语言自动检测**

如果您使用自定义页面，启用此项可在该处使用语言检测器，按用户浏览器语言呈现页面；禁用则强制使用平台默认语言。

*默认值：`true`*


### `language_by_resource` **v3**

**按资源指定语言**

允许为单个资源指定特定语言。

*默认值：`false`*

### `language_flags_by_country`

**语言旗帜**

使用国旗表示语言。默认未启用，因为某些语言并不严格对应某个国家，可能引起部分用户不满。

*默认值：`false`*


### `language_priority_1`

**最高优先级语言**

在设置了多种语言上下文时首选的语言。

*默认值：`course_lang`*


### `language_priority_2`

**次优先级语言**

当第一优先级不可用或不适用时的次级回退语言。

*默认值：`user_profil_lang`*


### `language_priority_3`

**第三优先级语言**

当更高优先级失败时的第三级语言回退。

*默认值：`user_selected_lang`*


### `language_priority_4`

**第四优先级语言**

按优先级顺序的最后语言回退选项。

*默认值：`platform_lang`*


### `platform_language`

**平台默认语言**

主语言，在未设置用户语言时默认使用。

*默认值：`en`*


### `show_different_course_language`

**显示课程语言**

在首页课程列表中，于课程标题旁显示每门课程所使用的语言

*默认值：`true`*


### `show_language_selector_in_menu`

**主菜单中的语言切换器**

在主菜单中显示语言选择器，可立即更新用户的语言偏好。这在多语言门户中很有用，学习者需要在不同语言之间切换以进行学习。

*默认值：`true`*


### `template_activate_language_filter`

**多语言文档模板**

允许将文档模板（平台级或课程级）配置为特定语言。

*默认值：`false`*