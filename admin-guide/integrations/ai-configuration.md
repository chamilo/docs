# AI 設定

Chamilo 2.0 包含 AI 驅動的功能，這些功能在提供給教師和學習者使用之前需要進行設定。

## 支援的 AI 提供者

Chamilo 支援多個 AI 提供者：

| 提供者 | 功能 |
|--------|------|
| **DeepSeek** | 文字生成 |
| **Google Gemini** | 文字、影像、影片生成 |
| **Grok** | 文字、影像、影片生成 |
| **Mistral** | 文字生成 |
| **OpenAI** | 文字、影像、影片生成 |

每個提供者可以針對不同類型的 AI 任務進行設定：

* **文字** — 用於練習生成、學習路徑生成、AI 評分以及 AI 導師
* **影像** — 用於 AI 影像生成
* **影片** — 用於 AI 影片生成（視支援情況而定）
* **文件** — 用於 AI 文件分析

## 設定步驟

### 1. 取得 API 金鑰

在您選擇的 AI 提供者註冊帳戶並取得 API 金鑰：

* **DeepSeek**： [platform.deepseek.com](https://platform.deepseek.com/)
* **Google Gemini**：Google AI Studio 或 Google Cloud
* **Grok**： [console.x.ai](https://console.x.ai/)
* **Mistral**： [console.mistral.ai](https://console.mistral.ai/)
* **OpenAI**： [platform.openai.com](https://platform.openai.com/)

### 2. 在 Chamilo 中設定提供者

![顯示提供者設定的 AI 助手設定頁面，包括 API 金鑰、模型和端點欄位](/.gitbook/assets/admin-ai-helpers-config.png)

在平台設定中，導航至 **AI Helpers** 區段：

1. **啟用 AI 助手** — 全球啟用 AI 功能
2. **設定 AI 提供者** — 新增一或多個提供者，並設定：
   * **提供者名稱** (deepseek, gemini, grok, mistral, openai)
   * **API 金鑰** — 該提供者的 API 金鑰
   * **模型** — 要使用的特定模型（例如，`gpt-4`、`gemini-pro`、`mistral-large`）
   * **API URL** — 端點 URL（標準提供者已預先設定）

您可以設定多個提供者。設定中第一個提供者將成為預設提供者。

### 3. 每門課程啟用功能

AI 功能可以在課程層級啟用或停用。教師可以切換：

* **AI 導師聊天機器人** — 學習者的 AI 助理
* **作業評分器** — AI 生成的評分建議
* **練習生成器** — AI 生成的測驗問題
* **學習路徑生成器** — AI 生成的學習序列
* **影像/影片生成器** — 文件中的 AI 生成影像和影片

這允許不同課程根據其需求使用不同的 AI 設定。

## 成本考量

AI API 呼叫會產生相關成本。請考慮：

* **設定使用限制** — 監控並限制 AI API 使用量以控制成本
* **明智選擇模型** — 較小且成本較低的模型可能足以應付許多教育任務
* **追蹤使用量** — Chamilo 記錄 AI 請求以幫助您監控消耗量

## 提示

* **從單一提供者開始** — 在新增更多提供者之前，先設定並測試一個提供者
* **使用測試課程** — 先在測試課程中啟用 AI 功能，以驗證其運作是否符合預期
* **與教師溝通** — 告知教師哪些 AI 功能可用以及如何使用
* **監控品質** — 定期檢視 AI 生成的內容，確保符合您的教育標準