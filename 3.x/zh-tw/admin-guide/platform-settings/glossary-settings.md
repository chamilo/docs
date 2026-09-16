# 詞彙表設定

課程 **Glossary** 工具的行為。

可於 **管理 > 組態設定 > Glossary** 存取這些設定。此類別包含 **3 項設定**，以下列出平台設定 fixtures（`SettingsCurrentFixtures.php`）中隨附的標題與說明。

> 程式碼中的變數名稱以等寬字體顯示。透過 API 撰寫指令碼，或需以全域層級變更這些設定而編輯 [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) 時，請使用該名稱。

## 設定

### `allow_remove_tags_in_glossary_export`

**匯出詞彙表時移除 HTML 標籤**

啟用後，匯出時會從詞彙條目定義中移除 HTML 標籤。

*預設值：`false`*

### `default_glossary_view`

**預設詞彙表檢視**

選擇詞彙表工具預設使用的檢視（'table' 或 'list'）。

*預設值：`table`*

### `show_glossary_in_extra_tools`

**在額外工具中顯示詞彙條目**

您可在此設定如何將詞彙條目加入額外工具，例如學習路徑與測驗（exercice）工具