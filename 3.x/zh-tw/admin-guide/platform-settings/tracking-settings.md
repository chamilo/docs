# 追蹤設定

與追蹤相關的預設值——記錄哪些內容、公開哪些報表、時間計算規則。

請至 **管理 > 組態設定 > 追蹤** 存取這些設定。此類別包含 **10 項設定**，以下列出平台設定 fixtures（`SettingsCurrentFixtures.php`）中隨附的標題與註解。

> 程式碼中的變數名稱以等寬字體顯示。透過 API 撰寫指令碼，或需以編輯 [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) 的方式在全域層級變更這些設定時，請使用該名稱。

## 設定

### `block_my_progress_page`

**禁止存取「我的進度」**

在線上考試等特定實作中，您可能希望禁止使用者存取「我的進度」頁面。

*預設值：`false`*

### `footer_extra_content`

**頁尾額外內容**

您可以加入 HTML 程式碼，例如 meta 標籤

### `header_extra_content`

**頁首額外內容**

您可以加入 HTML 程式碼，例如 meta 標籤

### `meta_description`

**Meta 描述**

這會在您網站的標頭中顯示 OpenGraph Description meta（og:description）

### `meta_image_path`

**Meta 圖片路徑**

此 Meta 圖片路徑是 Chamilo 目錄內某個檔案的路徑（例如 home/image.png），當顯示指向您 LMS 的連結時，應出現在 Twitter 卡片或 OpenGraph 卡片中。Twitter 建議使用 120 x 120 像素的圖片，有時可能會被裁切為 120x90。

### `meta_title`

**OpenGraph meta 標題**

這會在您網站的標頭中顯示 OpenGraph Title meta（og:title）

### `meta_twitter_creator`

**Twitter 建立者帳號**

Twitter 建立者是代表建立該網站之*個人*的 Twitter 帳號（例如 @ywarnier）。此欄位為選填。

### `meta_twitter_site`

**Twitter 網站帳號**

Twitter 網站是與您的網站相關的 Twitter 帳號（例如 @chamilo_news）。它通常比 Twitter 建立者帳號更偏向臨時帳號，或代表一個實體（而非個人）。若您希望顯示 Twitter 卡片的 meta 欄位，此欄位為必填。

### `my_progress_course_tools_order`

**「我的進度」頁面上的工具順序**

變更學習者「我的進度」頁面上所顯示工具的順序。選項包括 'quizzes'、'learning_paths' 與 'skills'。

### `tracking_skip_generic_data`

**在學習者自我追蹤頁面略過通用資料**

若「我的進度」頁面載入時間過長，您可能希望移除該使用者通用統計資料的處理。此時請啟用此設定。

*預設值：`false`*