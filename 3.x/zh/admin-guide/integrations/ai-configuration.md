# AI 配置

Chamilo 3.0 包含由 AI 驱动的功能，需先完成配置后，教师与学习者方可使用。

## 支持的 AI 提供商

Chamilo 支持多家 AI 提供商：

| 提供商 | 能力 |
|----------|-------------|
| **DeepSeek** | 文本生成 |
| **Google Gemini** | 文本、图像、视频生成 |
| **Grok** | 文本、图像、视频生成 |
| **Mistral** | 文本生成 |
| **OpenAI** | 文本、图像、视频生成 |

可为不同类型的 AI 任务分别配置各提供商：

* **文本** — 用于练习生成、学习路径生成、AI 评分以及 AI 导师
* **图像** — 用于 AI 图像生成
* **视频** — 用于 AI 视频生成（在受支持的情况下）
* **文档** — 用于 AI 文档分析

## 配置步骤

### 1. 获取 API 密钥

在所选 AI 提供商处注册账户并获取 API 密钥：

* **DeepSeek**：[platform.deepseek.com](https://platform.deepseek.com/)
* **Google Gemini**：Google AI Studio 或 Google Cloud
* **Grok**：[console.x.ai](https://console.x.ai/)
* **Mistral**：[console.mistral.ai](https://console.mistral.ai/)
* **OpenAI**：[platform.openai.com](https://platform.openai.com/)

### 2. 在 Chamilo 中配置提供商

![AI 助手配置页面，显示包含 API 密钥、模型和端点字段的提供商设置](/.gitbook/assets/admin-ai-helpers-config.png)

在平台设置中，进入 **AI 助手** 部分：

1. **启用 AI 助手** — 全局开启 AI 功能
2. **配置 AI 提供商** — 添加一个或多个提供商，并填写：
   * **提供商名称**（deepseek、gemini、grok、mistral、openai）
   * **API 密钥** — 该提供商的 API 密钥
   * **模型** — 要使用的具体模型（例如 `gpt-4`、`gemini-pro`、`mistral-large`）
   * **API URL** — 端点 URL（标准提供商已预配置）

可配置多个提供商。配置中的第一个提供商将成为默认提供商。

### 3. 按课程启用功能

可在课程级别启用或禁用 AI 功能。教师可切换：

* **AI 导师聊天机器人** — 面向学习者的 AI 助手
* **作业评分器** — AI 生成的评分建议
* **练习生成器** — AI 生成的测验题目
* **学习路径生成器** — AI 生成的学习序列
* **图像/视频生成器** — 在文档中由 AI 生成图像和视频

这样不同课程可根据自身需求使用不同的 AI 配置。

## 成本考量

AI API 调用会产生费用。请考虑：

* **设置用量限制** — 监控并限制 AI API 用量以控制成本
* **明智选择模型** — 许多教学任务使用更小、更便宜的模型即可满足需求
* **跟踪用量** — Chamilo 会记录 AI 请求，便于您监控消耗

## 提示

* **先从一个提供商开始** — 先配置并测试一个提供商，再添加更多
* **用课程进行测试** — 先在测试课程中启用 AI 功能，以确认其按预期工作
* **与教师沟通** — 告知教师哪些 AI 功能可用以及如何使用
* **监控质量** — 定期审阅 AI 生成的内容，确保其符合您的教学标准