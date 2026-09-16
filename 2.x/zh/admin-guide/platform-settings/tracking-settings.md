# 跟踪设置

跟踪相关的默认设置——记录的内容、公开的报告、时间计算规则。

在**管理 > 配置设置 > 跟踪**下访问这些设置。此类别包含**10个设置**，以下列出平台设置固定数据（`SettingsCurrentFixtures.php`）中提供的标题和注释。

> 代码中的变量名以等宽字体显示。在通过API进行脚本编写或需要通过编辑[`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) 在全局级别更改这些设置时使用它。

## 设置

### `block_my_progress_page`

**阻止访问“我的进度”页面**

在特定实施场景（如在线考试）中，您可能希望阻止用户访问“我的进度”页面。

*默认值：`false`*

### `footer_extra_content`

**页脚额外内容**

您可以添加HTML代码，如元标签

### `header_extra_content`

**页眉额外内容**

您可以添加HTML代码，如元标签

### `meta_description`

**元描述**

这将在您网站的头部显示一个OpenGraph描述元标签（og:description）

### `meta_image_path`

**元图片路径**

此元图片路径是您Chamilo目录内文件的路径（例如 home/image.png），当显示指向您LMS的链接时，应在Twitter卡片或OpenGraph卡片中显示。Twitter建议使用120 x 120像素的图片，有时可能会裁剪为120x90。

### `meta_title`

**OpenGraph元标题**

这将在您网站的头部显示一个OpenGraph标题元标签（og:title）

### `meta_twitter_creator`

**Twitter创建者账户**

Twitter创建者是一个代表创建网站的*个人*的Twitter账户（例如 @ywarnier）。此字段是可选的。

### `meta_twitter_site`

**Twitter站点账户**

Twitter站点是一个与您的网站相关的Twitter账户（例如 @chamilo_news）。它通常比Twitter创建者账户更临时，或者代表一个实体（而不是个人）。如果您希望显示Twitter卡片元字段，此字段是必需的。

### `my_progress_course_tools_order`

**“我的进度”页面上的工具顺序**

更改学习者在“我的进度”页面上显示的工具顺序。选项包括“测验”、“学习路径”和“技能”。

### `tracking_skip_generic_data`

**在学习者自我跟踪页面中跳过通用数据**

如果“我的进度”页面加载时间过长，您可能希望移除用户的通用统计数据处理。在这种情况下启用此设置。

*默认值：`false`*