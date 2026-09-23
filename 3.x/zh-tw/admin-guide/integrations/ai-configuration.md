# AI 設定

Chamilo 3.0 內建多項 AI 功能，須先完成設定後，教師與學習者才能使用。

## 支援的 AI 供應商

Chamilo 支援多家 AI 供應商：

| 供應商 | 能力 |
|----------|-------------|
| **DeepSeek** | 文字生成 |
| **Google Gemini** | 文字、影像、影片生成 |
| **Grok** | 文字、影像、影片生成 |
| **Mistral** | 文字生成 |
| **OpenAI** | 文字、影像、影片生成 |

各供應商可依不同類型的 AI 任務分別設定：

* **文字** — 用於練習題生成、學習路徑生成、AI 評分，以及 AI 導師
* **影像** — 用於 AI 影像生成
* **影片** — 用於 AI 影片生成（於支援的供應商）
* **文件** — 用於 AI 文件分析

## 設定步驟

### 1. 取得 API 金鑰

向所選 AI 供應商註冊帳號並取得 API 金鑰：

* **DeepSeek**：[platform.deepseek.com](https://platform.deepseek.com/)
* **Google Gemini**：Google AI Studio 或 Google Cloud
* **Grok**：[console.x.ai](https://console.x.ai/)
* **Mistral**：[console.mistral.ai](https://console.mistral.ai/)
* **OpenAI**：[platform.openai.com](https://platform.openai.com/)

### 2. 在 Chamilo 中設定供應商

![AI 輔助功能設定頁面，顯示含 API 金鑰、模型與端點欄位的供應商設定](../../.gitbook/assets/admin-ai-helpers-config.png)

在平台設定中，前往 **AI Helpers** 區段：

1. **啟用 AI 輔助功能** — 全域開啟 AI 功能
2. **設定 AI 供應商** — 新增一或多個供應商，並填寫：
   * **供應商名稱**（deepseek、gemini、grok、mistral、openai）
   * **API 金鑰** — 該供應商的 API 金鑰
   * **模型** — 要使用的特定模型（例如 `gpt-4`、`gemini-pro`、`mistral-large`）
   * **API URL** — 端點 URL（標準供應商已預先設定）

您可設定多個供應商。設定清單中的第一個供應商會成為預設供應商。

### 3. 依課程啟用功能

AI 功能可在課程層級啟用或停用。教師可切換：

* **AI 導師聊天機器人** — 提供給學習者的 AI 助理
* **作業評分器** — AI 產生的評分建議
* **練習題產生器** — AI 產生的測驗題目
* **學習路徑產生器** — AI 產生的學習序列
* **影像／影片產生器** — 在文件中由 AI 產生影像與影片

如此可依各課程需求採用不同的 AI 設定。

## 成本考量

AI API 呼叫會產生費用。請考量：

* **設定使用上限** — 監控並限制 AI API 用量以控制成本
* **審慎選擇模型** — 較小、較便宜的模型往往已足以應付許多教學任務
* **追蹤用量** — Chamilo 會記錄 AI 請求，協助您監控消耗量

## 建議

* **先從單一供應商開始** — 先設定並測試一個供應商，再新增其他供應商
* **以測試課程驗證** — 先在測試課程中啟用 AI 功能，確認運作符合預期
* **與教師溝通** — 告知教師目前可用的 AI 功能及其使用方式
* **監控品質** — 定期檢視 AI 產生的內容，確保符合貴機構的教學標準