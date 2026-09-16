# 跟踪设置

与跟踪相关的默认项——记录哪些内容、对外暴露哪些报表、时间计算规则。

可在 **管理 > 配置设置 > 跟踪** 下访问这些设置。本类别包含 **10 项设置**，下方列出平台设置固件（`SettingsCurrentFixtures.php`）中附带的标题与说明。

> 代码中的变量名以等宽字体显示。通过 API 编写脚本，或需要通过编辑 [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) 在全局层面更改这些设置时，请使用该名称。

## 设置

### `block_my_progress_page`

**禁止访问「我的进度」**

在在线考试等特定实现中，您可能希望禁止用户访问「我的进度」页面。

*默认值：`false`*

### `footer_extra_content`

**页脚额外内容**

您可以添加 HTML 代码，例如 meta 标签

### `header_extra_content`

**页头额外内容**

您可以添加 HTML 代码，例如 meta 标签

### `meta_description`

**Meta 描述**

这将在站点页头中显示 OpenGraph Description meta（og:description）

### `meta_image_path`

**Meta 图片路径**

此 Meta 图片路径是 Chamilo 目录内某个文件的路径（例如 home/image.png），在展示指向您 LMS 的链接时，应显示在 Twitter 卡片或 OpenGraph 卡片中。Twitter 建议使用 120 x 120 像素的图片，有时可能会被裁剪为 120x90。

### `meta_title`

**OpenGraph meta 标题**

这将在站点页头中显示 OpenGraph Title meta（og:title）

### `meta_twitter_creator`

**Twitter Creator 账号**

Twitter Creator 是代表创建该站点的*个人*的 Twitter 账号（例如 @ywarnier）。此字段为可选项。

### `meta_twitter_site`

**Twitter Site 账号**

Twitter site 是与您的站点相关的 Twitter 账号（例如 @chamilo_news）。它通常比 Twitter creator 账号更偏临时，或代表某个实体（而非个人）。若希望显示 Twitter 卡片相关的 meta 字段，则此字段为必填。

### `my_progress_course_tools_order`

**「我的进度」页面上的工具顺序**

更改学习者「我的进度」页面上所显示工具的顺序。选项包括 'quizzes'、'learning_paths' 和 'skills'。

### `tracking_skip_generic_data`

**在学习者自助跟踪页面中跳过通用数据**

如果「我的进度」页面加载时间过长，您可能希望取消对该用户通用统计数据的处理。此时请启用本设置。

*默认值：`false`*