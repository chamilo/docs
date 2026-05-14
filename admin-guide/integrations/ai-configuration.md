# AI 配置

Chamilo 2.0 包含需要配置才能对教师和学习者开放的 AI 驱动功能。

## 支持的 AI 提供商

Chamilo 支持多个 AI 提供商：

| 提供商 | 功能 |
|----------|-------------|
| **DeepSeek** | 文本生成 |
| **Google Gemini** | 文本、图像、视频生成 |
| **Grok** | 文本、图像、视频生成 |
| **Mistral** | 文本生成 |
| **OpenAI** | 文本、图像、视频生成 |

每个提供商可针对不同类型的 AI 任务进行配置：

* **文本** — 用于练习生成、学习路径生成、AI 评分和 AI 导师
* **图像** — 用于 AI 图像生成
* **视频** — 用于 AI 视频生成（在支持的情况下）
* **文档** — 用于 AI 文档分析

## 配置步骤

### 1. 获取 API 密钥

在您选择的 AI 提供商处注册账户并获取 API 密钥：

* **DeepSeek**: [platform.deepseek.com](https://platform.deepseek.com/)
* **Google Gemini**: Google AI Studio 或 Google Cloud
* **Grok**: [console.x.ai](https://console.x.ai/)
* **Mistral**: [console.mistral.ai](https://console.mistral.ai/)
* **OpenAI**: [platform.openai.com](https://platform.openai.com/)

### 2. 在 Chamilo 中配置提供商

![AI 助手配置页面，显示提供商设置，包括 API 密钥、模型和端点字段](/.gitbook/assets/admin-ai-helpers-config.png)

在平台设置中，导航到 **AI 助手** 部分：

1. **启用 AI 助手** — 全局开启 AI 功能
2. **配置 AI 提供商** — 添加一个或多个提供商，包括：
   * **提供商名称** (deepseek, gemini, grok, mistral, openai)
   * **API 密钥** — 提供商的 API 密钥
   * **模型** — 使用的具体模型（例如，`gpt-4`, `gemini-pro`, `mistral-large`）
   * **API URL** — 端点 URL（标准提供商已预配置）

您可以配置多个提供商。配置中的第一个提供商将成为默认提供商。

### 3. 按课程启用功能

AI 功能可以在课程级别启用或禁用。教师可以切换：

* **AI 导师聊天机器人** — 学习者的 AI 助手
* **作业评分器** — AI 生成的评分建议
* **练习生成器** — AI 生成的测验问题
* **学习路径生成器** — AI 生成的学习序列
* **图像/视频生成器** — 在文档中生成 AI 图像和视频

这允许不同的课程根据需求使用不同的 AI 配置。

## 成本考虑

AI API 调用会产生相关成本。请考虑：

* **设置使用限制** — 监控并限制 AI API 使用以控制成本
* **明智选择模型** — 较小、成本较低的模型可能足以满足许多教育任务
* **跟踪使用情况** — Chamilo 记录 AI 请求以帮助您监控消耗

## 小贴士

* **从一个提供商开始** — 在添加更多提供商之前，先配置并测试一个提供商
* **在课程中测试** — 首先在测试课程中启用 AI 功能，以验证其是否按预期工作
* **与教师沟通** — 让教师了解哪些 AI 功能可用以及如何使用它们
* **监控质量** — 定期审查 AI 生成的内容，确保其符合您的教育标准