# 编辑器设置

平台所用富文本编辑器（TinyMCE）的配置——工具栏、插件以及编辑器中的 AI 辅助功能。

可在 **管理 > 配置设置 > 编辑器** 下访问这些设置。本类别包含 **26 项设置**，下方列出平台设置 fixtures（`SettingsCurrentFixtures.php`）中附带的标题与说明。

> 代码中的变量名以等宽字体显示。通过 API 编写脚本，或需要通过编辑 [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) 在全局层面更改这些设置时，请使用该名称。

## 设置

### `allow_email_editor`

**启用在线电子邮件编辑器**

若启用此选项，点击电子邮件地址将打开在线编辑器。

### `allow_spellcheck`

**拼写检查**

启用拼写检查

### `block_copy_paste_for_students`

**禁止学习者复制粘贴**

禁止学习者在所见即所得编辑器中复制粘贴

### `editor_block_image_copy_paste`

**禁止在所见即所得编辑器中复制粘贴图片**

禁止在编辑器中以 base64 方式复制粘贴图片，以免数据库被图片填满。

*默认值：`false`*


### `editor_driver_list`

**所见即所得文件驱动列表**

包含从所见即所得编辑器访问文件所用驱动名称的数组。

### `editor_settings`

**所见即所得编辑器设置**

用于全局重新配置所见即所得编辑器的通用配置数组。

### `enable_iframe_inclusion`

**允许在 HTML 编辑器中使用 iframe**

允许在 HTML 编辑器中使用任意 iframe 将增强用户的编辑能力，但可能带来安全风险。启用此功能前，请确保可以信赖您的用户（即您了解他们的身份）。

### `enable_uploadimage_editor`

**允许在所见即所得编辑器中拖放图片**

在内容中复制或拖放时，将图片作为文件上传。

*默认值：`false`*


### `enabled_asciisvg`

**启用 AsciiSVG**

在所见即所得编辑器中启用 AsciiSVG 插件，以便根据数学函数绘制图表。

### `enabled_googlemaps`

**启用 Google 地图**

启用插入 Google 地图的按钮。若未事先编辑文件 main/inc/lib/fckeditor/myconfig.php 并添加 Google 地图 API 密钥，则无法完全生效。

### `enabled_imgmap`

**启用图像映射**

启用插入图像映射的按钮。可将 URL 关联到图像的特定区域，从而创建热点。

### `enabled_insertHtml`

**允许插入微件**

可将您喜爱的视频与应用（如 vimeo 或 slideshare）以及各类微件和小工具嵌入网页。

### `enabled_mathjax`

**启用 MathJax**

启用 MathJax 库以可视化数学公式。这将在编辑器工具栏中添加公式按钮，公式以 LaTeX 编写。参见 [数学公式](../../teacher-guide/adding-content/math-formulas.md)。

### `enabled_support_svg`

**创建和编辑 SVG 文件**

此选项允许在线创建和编辑多层 SVG（可缩放矢量图形），并将其导出为 png 格式图像。

### `enabled_wiris`

**WIRIS 数学编辑器**

启用 WIRIS 数学编辑器。安装此插件后即可使用 WIRIS 编辑器和 WIRIS CAS。<br/>除非事先下载 <a href='http://www.wiris.com/es/plugins3/ckeditor/download' target='_blank'>CKeditor 的 WIRIS PHP 插件</a> 并将其内容解压到 Chamilo 目录 main/inc/lib/javascript/ckeditor/plugins/ 中，否则无法完全生效。<br/>这是必要的，因为 Wiris 是专有软件，其服务为<a href='http://www.wiris.com/store/who-pays' target='_blank'>商业</a>服务。要调整插件，请编辑 configuration.ini 文件，或用 Chamilo 附带的 configuration.ini.default 文件替换其内容。

### `force_wiki_paste_as_plain_text`

**在 Wiki 中强制以纯文本粘贴**

这将防止从其他文本复制而来的许多隐藏、不正确或不标准的标签在多次问题后破坏 Wiki 文本；但编辑时会失去部分功能。

### `full_editor_toolbar_set`

**完整所见即所得编辑器工具栏**

在平台各处所有所见即所得编辑器框中显示完整工具栏。

*默认值：`false`*


### `htmlpurifier_wiki`

**Wiki 中的 HTMLPurifier**

在 Wiki 工具中启用 HTML 净化器（将提高安全性，但会减少样式功能）

### `include_asciimathml_script`

**在所有系统页面中加载 Mathjax 库**

若希望不仅在“文档”工具中，而且在系统其他位置显示基于 MathML 的数学公式和基于 ASCIIsvg 的数学图形，请启用此设置。

### `math_asciimathML`

**ASCIIMathML 数学编辑器**

启用 ASCIIMathML 数学编辑器

### `more_buttons_maximized_mode`

**扩展按钮栏**

在最大化 WYSIWYG 编辑器时启用扩展按钮栏

*默认值：`true`*

### `save_titles_as_html`

**将标题保存为 HTML**

允许用户在多处标题字段中包含 HTML。这样可以对标题进行一定程度的样式设置，尤其是在测验题目中。同时，这些特定标题字段也可以使用与下文 `translate_html` 相同的按语言标记方式，而纯文本标题则无法承载此类标记。

*默认值：`false`*

### `translate_html`

**支持多语言 HTML 内容**

若启用，此选项允许用户在 HTML 元素中使用 ‘lang’ 属性，以标明该元素内容所用的语言。启用多个带有不同 ‘lang’ 属性的元素后，Chamilo 将仅以用户所用语言显示相应内容。

*默认值：`false`*

完整的面向教师操作说明，请参阅教师指南中的 [多语言内容](../../teacher-guide/adding-content/multi-language-content.md)。


### `video_context_menu_hidden`

**隐藏视频播放器的上下文菜单**

启用后，将禁用 HTML5 视频播放器上的右键上下文菜单。

*默认值：`false`*


### `video_player_renderers`

**视频播放器渲染器**

为 YouTube、Vimeo、Facebook、DailyMotion、Twitch 媒体启用播放器渲染器

### `youtube_for_students`

**允许学习者插入来自 YouTube 的视频**

启用学习者插入 Youtube 视频的功能