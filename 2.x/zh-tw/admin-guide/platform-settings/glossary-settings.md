# 詞彙表設定

課程 **詞彙表** 工具的行為。

在 **管理 > 設定 > 詞彙表** 下存取這些設定。此類別包含 **3 個設定**，以下列出平台設定預設值 (`SettingsCurrentFixtures.php`) 中提供的標題和註解。

> 程式碼中的變數名稱以等寬字體顯示。當透過 API 進行腳本編寫，或需要透過編輯 [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) 在全域層級變更這些設定時，請使用它。

## 設定

### `allow_remove_tags_in_glossary_export`

**在詞彙表匯出中移除 HTML 標籤**

啟用時，在匯出詞彙表條目定義時會移除 HTML 標籤。

*預設值：`false`*

### `default_glossary_view`

**預設詞彙表檢視**

選擇詞彙表工具中預設使用的檢視方式 ('table' 或 'list')。

*預設值：`table`*

### `show_glossary_in_extra_tools`

**在額外工具中顯示詞彙表條目**

從這裡您可以設定如何在額外工具中新增詞彙表條目，例如學習路徑和練習工具