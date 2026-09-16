# AI 輔助工具設定

AI 輔助工具（文字產生、影像產生、影片產生、AI 導師、AI 評分）的設定。各供應商可依任務類型分別啟用。另請參閱 [AI 設定](../integrations/ai-configuration.md)。

請至 **管理 > 組態設定 > AI 輔助工具** 存取這些設定。此類別包含 **14 項設定**，以下列出平台設定 fixtures（`SettingsCurrentFixtures.php`）中隨附的標題與註解。

> 程式碼中的變數名稱以等寬字體顯示。透過 API 撰寫指令碼，或需在全域層級編輯 [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) 以變更這些設定時，請使用該名稱。

## 設定

### `ai_providers`

**AI 供應商連線資料**

用於連線外部 AI 服務的組態資料。

### `content_analyser`

**內容分析器**

分析學習教材以擷取洞察或提升品質。

*預設值：`false`*

### `course_analyser`

**課程分析器**

分析一門或多門課程中的所有資源，並預先訓練 AI 模型，使其能回答與此課程或這些課程相關的任何問題（請確認內容可與已設定的 AI 服務共用）。

*預設值：`false`*

### `disclose_ai_assistance`

**揭露 AI 協助**

在任何由 AI 系統產生或共同產生的內容或回饋上顯示標籤，向使用者表明該內容是在某種 AI 系統協助下建立。關於各案例使用了哪個 AI 系統的細節會保留於資料庫中以供稽核，但最終使用者無法直接存取。

*預設值：`true`*

### `enable_ai_helpers`

**啟用 AI 輔助工具**

啟用平台中所有可用的 AI 功能。

*預設值：`false`*

### `exercise_generator`

**測驗產生器**

依據課程內容以 AI 產生個人化測驗。

*預設值：`false`*

### `glossary_terms_generator`

**詞彙表詞條產生器**

允許教師在其課程中請求由 AI 產生的詞彙表詞條。將依課程標題與課程說明工具中的一般說明產生 20 個詞條。若重複使用，會排除該詞彙表中已存在的詞條（請確認內容可與已設定的 AI 服務共用）。

*預設值：`false`*

### `image_generator`

**影像產生器**

依據提示或內容以 AI 產生影像。

*預設值：`false`*

### `learning_path_generator`

**學習路徑產生器**

依據 AI 建議產生個人化學習路徑。

*預設值：`false`*

### `open_answers_grader`

**開放式作答評分器**

以 AI 自動評分開放式作答。

*預設值：`false`*

### `task_grader`

**作業評分器**

以 AI 評估並評分已上傳的作業。

*預設值：`false`*

### `tutor_chatbot`

**由 AI 驅動的導師聊天機器人**

為學生提供由 AI 驅動的輔導助理。

*預設值：`false`*

### `video_generator`

**影片產生器**

依據提示或內容以 AI 產生影片（可能消耗大量 token）。

*預設值：`false`*

### `wysiwyg_translation_all_languages` **v3**

**允許在 WYSIWYG 編輯器中以 AI 翻譯至所有啟用語言**

允許教師在一次 WYSIWYG 操作中，為平台所有啟用語言產生翻譯。這可能消耗大量 AI token。

*預設值：`true`*