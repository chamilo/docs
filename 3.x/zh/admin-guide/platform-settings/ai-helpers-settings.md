# AI 助手设置

AI 助手（文本生成、图像生成、视频生成、AI 导师、AI 评分）的配置。每种任务类型均可单独启用对应的提供商。另请参阅 [AI 配置](../integrations/ai-configuration.md)。

在 **管理 > 配置设置 > AI 助手** 下访问这些设置。本类别包含 **14 项设置**，下方列出平台设置固件（`SettingsCurrentFixtures.php`）中附带的标题与说明。

> 代码中的变量名以等宽字体显示。在通过 API 编写脚本，或需要通过编辑 [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) 在全局层面更改这些设置时，请使用该名称。

## 设置

### `ai_providers`

**AI 提供商连接数据**

用于连接外部 AI 服务的配置数据。

### `content_analyser`

**内容分析器**

分析学习材料以提取洞见或提升质量。

*默认值：`false`*

### `course_analyser`

**课程分析器**

分析一门或多门课程中的全部资源，并预先训练 AI 模型，使其能够回答与该课程或这些课程相关的任何问题（请确保内容可与已配置的 AI 服务共享）。

*默认值：`false`*

### `disclose_ai_assistance`

**披露 AI 协助**

在任何由 AI 系统生成或共同生成的内容或反馈上显示标签，向用户表明该内容是在某种 AI 系统协助下构建的。关于在何种情况下使用了哪个 AI 系统的详细信息会保存在数据库中以供审计，但最终用户无法直接访问。

*默认值：`true`*

### `enable_ai_helpers`

**启用 AI 助手工具**

启用平台中所有可用的 AI 驱动功能。

*默认值：`false`*

### `exercise_generator`

**练习生成器**

基于课程内容，使用 AI 生成个性化测验。

*默认值：`false`*

### `glossary_terms_generator`

**术语表词条生成器**

允许教师在其课程中请求由 AI 生成的术语表词条。将根据课程标题以及课程描述工具中的总体描述生成 20 个词条。若多次使用，将排除该术语表中已有的词条（请确保内容可与已配置的 AI 服务共享）。

*默认值：`false`*

### `image_generator`

**图像生成器**

使用 AI 根据提示词或内容生成图像。

*默认值：`false`*

### `learning_path_generator`

**学习路径生成器**

使用 AI 建议生成个性化学习路径。

*默认值：`false`*

### `open_answers_grader`

**开放式答案评分器**

使用 AI 自动为开放式答案评分。

*默认值：`false`*

### `task_grader`

**作业评分器**

使用 AI 评估并为已上传的作业评分。

*默认值：`false`*

### `tutor_chatbot`

**由 AI 驱动的导师聊天机器人**

为学生提供由 AI 驱动的辅导助手。

*默认值：`false`*

### `video_generator`

**视频生成器**

使用 AI 根据提示词或内容生成视频（这可能会消耗大量令牌）。

*默认值：`false`*

### `wysiwyg_translation_all_languages` **v3**

**允许在所见即所得编辑器中将内容 AI 翻译为所有已启用语言**

允许教师在一次所见即所得操作中，为平台所有已启用语言生成翻译。这可能会消耗大量 AI 令牌。

*默认值：`true`*