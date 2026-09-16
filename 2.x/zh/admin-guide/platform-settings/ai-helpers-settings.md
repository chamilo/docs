# AI助手设置

配置AI助手（文本生成、图像生成、视频生成、AI导师、AI评分）。每个提供商可以按任务类型启用。另请参见[AI配置](../integrations/ai-configuration.md)。

在**管理 > 配置设置 > AI助手**下访问这些设置。此类别包含**13个设置**，以下列出平台设置固定数据（`SettingsCurrentFixtures.php`）中提供的标题和注释。

> 代码中的变量名以等宽字体显示。在通过API进行脚本编写或需要通过编辑[`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml)全局更改这些设置时使用它。

## 设置

### `ai_providers`

**AI提供商连接数据**

配置数据，用于连接外部AI服务。

### `content_analyser`

**内容分析器**

分析学习材料以提取见解或提高质量。

*默认值：`false`*

### `course_analyser`

**课程分析器**

分析一个或多个课程中的所有资源，并预训练AI模型以回答有关此课程或这些课程的任何问题（确保内容可以与配置的AI服务共享）。

*默认值：`false`*

### `disclose_ai_assistance`

**披露AI协助**

在任何由AI系统生成或共同生成的内容或反馈上显示标签，向用户证明该内容是在AI系统的帮助下构建的。有关在哪种情况下使用了哪个AI系统的详细信息保存在数据库中以供审计，但最终用户无法直接访问。

*默认值：`true`*

### `enable_ai_helpers`

**启用AI助手工具**

启用平台中所有可用的AI驱动功能。

*默认值：`false`*

### `exercise_generator`

**练习生成器**

基于课程内容使用AI生成个性化测试。

*默认值：`false`*

### `glossary_terms_generator`

**词汇表术语生成器**

允许教师在他们的课程中请求AI生成的词汇表术语。这将根据课程标题和课程描述工具中的一般描述生成20个术语。如果多次使用，将排除该词汇表中已存在的术语（确保内容可以与配置的AI服务共享）。

*默认值：`false`*

### `image_generator`

**图像生成器**

使用AI基于提示或内容生成图像。

*默认值：`false`*

### `learning_path_generator`

**学习路径生成器**

使用AI建议生成个性化的学习路径。

*默认值：`false`*

### `open_answers_grader`

**开放性答案评分器**

使用AI自动评分开放性答案。

*默认值：`false`*

### `task_grader`

**作业评分器**

使用AI评估和评分上传的作业。

*默认值：`false`*

### `tutor_chatbot`

**由AI驱动的导师聊天机器人**

为学生提供AI驱动的辅导助手。

*默认值：`false`*

### `video_generator`

**视频生成器**

使用AI基于提示或内容生成视频（这可能会消耗大量令牌）。

*默认值：`false`*