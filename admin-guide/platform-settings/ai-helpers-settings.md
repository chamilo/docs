# AI Helpers 設定

AI 助手（文字生成、影像生成、影片生成、AI 導師、AI 評分）的設定。每個提供者可依任務類型單獨啟用。另請參閱 [AI 設定](../integrations/ai-configuration.md)。

在 **管理 > 設定 > AI Helpers** 下存取這些設定。此類別包含 **13 個設定**，以下列出平台設定預設值（`SettingsCurrentFixtures.php`）中的標題與註解。

> 程式碼中的變數名稱以等寬字體顯示。透過 API 撰寫腳本或需全域編輯 [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) 變更這些設定時，請使用該名稱。

## 設定

### `ai_providers`

**AI 提供者連線資料**

連線外部 AI 服務的設定資料。

### `content_analyser`

**內容分析器**

分析學習材料以擷取洞見或提升品質。

*預設值：`false`*

### `course_analyser`

**課程分析器**

分析一門或多門課程的所有資源，並預訓練 AI 模型以回答關於此課程或這些課程的任何問題（請確保內容可與設定的 AI 服務分享）。

*預設值：`false`*

### `disclose_ai_assistance`

**揭露 AI 協助**

在任何由 AI 系統生成或共同生成的內容或回饋上顯示標籤，向使用者證明該內容是借助某 AI 系統建置的。關於使用哪個 AI 系統的詳細資訊會儲存在資料庫中以供稽核，但最終使用者無法直接存取。

*預設值：`true`*

### `enable_ai_helpers`

**啟用 AI 助手工具**

啟用平台中所有可用的 AI 功能。

*預設值：`false`*

### `exercise_generator`

**測驗生成器**

根據課程內容使用 AI 生成個人化測驗。

*預設值：`false`*

### `glossary_terms_generator`

**詞彙表術語生成器**

允許教師要求 AI 在其課程中生成詞彙表術語。這將根據課程標題及課程描述工具中的一般描述生成 20 個術語。若多次使用，將排除該詞彙表中已存在的術語（請確保內容可與設定的 AI 服務分享）。

*預設值：`false`*

### `image_generator`

**影像生成器**

使用 AI 根據提示或內容生成影像。

*預設值：`false`*

### `learning_path_generator`

**學習路徑生成器**

使用 AI 建議生成個人化學習路徑。

*預設值：`false`*

### `open_answers_grader`

**開放式答案評分器**

使用 AI 自動評分開放式答案。

*預設值：`false`*

### `task_grader`

**作業評分器**

使用 AI 評估並評分上傳的作業。

*預設值：`false`*

### `tutor_chatbot`

**AI 驅動的導師聊天機器人**

為學生提供 AI 驅動的導師助理。

*預設值：`false`*

### `video_generator`

**影片生成器**

使用 AI 根據提示或內容生成影片（這可能會消耗大量 token）。

*預設值：`false`*