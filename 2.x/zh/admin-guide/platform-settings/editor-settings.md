# 编辑器设置

配置平台上使用的富文本编辑器（TinyMCE）的设置，包括工具栏、插件和编辑器中的AI助手。

在**管理 > 配置设置 > 编辑器**下访问这些设置。此类别包含**26个设置**，以下列出平台设置固定数据（`SettingsCurrentFixtures.php`）中提供的标题和注释。

> 代码中的变量名以等宽字体显示。在通过API进行脚本编写或需要通过编辑[`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml)全局更改这些设置时使用。

## 设置

### `allow_email_editor`

**启用在线电子邮件编辑器**

如果激活此选项，点击电子邮件地址将打开在线编辑器。

### `allow_spellcheck`

**拼写检查**

启用拼写检查功能

### `block_copy_paste_for_students`

**阻止学习者复制和粘贴**

阻止学习者在所见即所得编辑器中复制和粘贴的能力

### `editor_block_image_copy_paste`

**阻止在所见即所得编辑器中复制粘贴图片**

阻止在编辑器中使用图片的复制粘贴作为base64编码，以避免数据库中充满图片。

*默认值：`false`*

### `editor_driver_list`

**所见即所得文件驱动程序列表**

包含从所见即所得编辑器访问文件的驱动程序名称的数组。

### `editor_settings`

**所见即所得编辑器设置**

用于全局重新配置所见即所得编辑器的通用配置数组。

### `enable_iframe_inclusion`

**在HTML编辑器中允许使用iframe**

在HTML编辑器中允许任意iframe将增强用户的编辑能力，但可能带来安全风险。在启用此功能之前，请确保您可以信任您的用户（即您知道他们的身份）。

### `enable_uploadimage_editor`

**在所见即所得编辑器中允许图片拖放**

启用在内容中进行复制或拖放时将图片作为文件上传的功能。

*默认值：`false`*

### `enabled_asciisvg`

**启用AsciiSVG**

在所见即所得编辑器中启用AsciiSVG插件，以绘制数学函数图表。

### `enabled_googlemaps`

**激活Google地图**

激活插入Google地图的按钮。如果未事先编辑文件main/inc/lib/fckeditor/myconfig.php并添加Google地图API密钥，则激活未完全实现。

### `enabled_imgmap`

**激活图像地图**

激活插入图像地图的按钮。这允许您将URL关联到图像的区域，创建热点。

### `enabled_insertHtml`

**允许插入小部件**

这允许您在网页上嵌入您喜欢的视频和应用程序，如vimeo或slideshare，以及各种小部件和工具。

### `enabled_mathjax`

**启用MathJax**

启用MathJax库以可视化数学公式。仅在启用ASCIIMathML或ASCIISVG设置时有用。

### `enabled_support_svg`

**创建和编辑SVG文件**

此选项允许您在线创建和编辑SVG（可缩放矢量图形）多层文件，并将其导出为png格式图像。

### `enabled_wiris`

**WIRIS数学编辑器**

启用WIRIS数学编辑器。安装此插件后，您将获得WIRIS编辑器和WIRIS CAS。<br/>除非事先下载了<a href='http://www.wiris.com/es/plugins3/ckeditor/download' target='_blank'>CKeditor WIRIS的PHP插件</a>并将其内容解压到Chamilo的目录main/inc/lib/javascript/ckeditor/plugins/中，否则此激活未完全实现。<br/>这是必要的，因为Wiris是专有软件，其服务是<a href='http://www.wiris.com/store/who-pays' target='_blank'>商业化的</a>。要调整插件，请编辑configuration.ini文件或将其内容替换为Chamilo附带的configuration.ini.default文件。

### `force_wiki_paste_as_plain_text`

**在Wiki中强制粘贴为纯文本**

这将防止许多隐藏标签、不正确或非标准的标签从其他文本复制后破坏Wiki文本，但会在编辑时丢失一些功能。

### `full_editor_toolbar_set`

**完整的所见即所得编辑器工具栏**

在平台上所有所见即所得编辑器框中显示完整工具栏。

*默认值：`false`*

### `htmlpurifier_wiki`

**Wiki中的HTMLPurifier**

在Wiki工具中启用HTML purifier（将提高安全性但减少样式功能）

### `include_asciimathml_script`

**在所有系统页面中加载Mathjax库**

如果您希望不仅在“文档”工具中，而且在系统的其他地方显示基于MathML的数学公式和基于ASCIIsvg的数学图形，请激活此设置。

### `math_asciimathML`

**ASCIIMathML数学编辑器**

启用ASCIIMathML数学编辑器

### `more_buttons_maximized_mode`

**扩展按钮栏**

在所见即所得编辑器最大化时启用扩展按钮栏

*默认值：`true`*

---
### `save_titles_as_html`

**将标题保存为HTML**

允许用户在多个地方的标题字段中包含HTML。这使得标题可以进行一些样式设计，特别是在测试问题中。

*默认值：`false`*

### `translate_html`

**支持多语言HTML内容**

如果启用此选项，用户可以在HTML元素中使用‘lang’属性来定义该元素内容的语言。启用具有不同‘lang’属性的多个元素，Chamilo将仅显示用户语言的内容。

*默认值：`false`*

### `video_context_menu_hidden`

**隐藏视频播放器的上下文菜单**

启用后，HTML5视频播放器上的右键上下文菜单将被禁用。

*默认值：`false`*

### `video_player_renderers`

**视频播放器渲染器**

为YouTube、Vimeo、Facebook、DailyMotion、Twitch媒体启用播放器渲染器

### `youtube_for_students`

**允许学习者插入YouTube视频**

启用学习者插入YouTube视频的可能性