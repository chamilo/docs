# 追蹤設定

追蹤相關的預設值 — 記錄什麼、暴露哪些報告、時間計算規則。

在 **管理 > 設定值 > 追蹤** 下存取這些設定。此類別包含 **10 個設定**，以下列出平台設定固定資料 (`SettingsCurrentFixtures.php`) 中提供的標題和註解。

> 程式碼中的變數名稱以等寬字體顯示。使用 API 進行腳本編寫時，或需要透過編輯 [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) 在全域層級變更這些設定時，請使用它。

## 設定

### `block_my_progress_page`

**防止存取「我的進度」**

在特定實作如線上考試中，您可能希望防止使用者存取「我的進度」頁面。

*預設值：`false`*

### `footer_extra_content`

**頁尾額外內容**

您可以新增 HTML 程式碼如 meta 標籤

### `header_extra_content`

**頁首額外內容**

您可以新增 HTML 程式碼如 meta 標籤

### `meta_description`

**Meta 描述**

這將在網站頁首顯示 OpenGraph 描述 meta (og:description)

### `meta_image_path`

**Meta 圖像路徑**

此 Meta 圖像路徑是 Chamilo 目錄內檔案的路徑 (例如 home/image.png)，當顯示指向 LMS 的連結時，應顯示在 Twitter 卡片或 OpenGraph 卡片中。Twitter 建議圖像尺寸為 120 x 120 像素，有時可能會被裁剪為 120x90。

### `meta_title`

**OpenGraph meta 標題**

這將在網站頁首顯示 OpenGraph 標題 meta (og:title)

### `meta_twitter_creator`

**Twitter 建立者帳戶**

Twitter 建立者是一個 Twitter 帳戶 (例如 @ywarnier)，代表建立網站的*個人*。此欄位為選填。

### `meta_twitter_site`

**Twitter 網站帳戶**

Twitter 網站是一個與您的網站相關的 Twitter 帳戶 (例如 @chamilo_news)。它通常比 Twitter 建立者帳戶更臨時，或代表一個實體 (而非個人)。若要顯示 Twitter 卡片 meta 欄位，則此欄位為必填。

### `my_progress_course_tools_order`

**「我的進度」頁面工具順序**

變更學習者在「我的進度」頁面顯示的工具順序。選項包括 'quizzes'、'learning_paths' 和 'skills'。

### `tracking_skip_generic_data`

**在學習者自我追蹤頁面略過一般資料**

如果「我的進度」頁面載入過慢，您可能希望移除使用者的通用統計資料處理。在此情況下，請啟用此設定。

*預設值：`false`*