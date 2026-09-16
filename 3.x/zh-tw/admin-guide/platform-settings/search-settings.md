# 搜尋設定

全文檢索系統（Xapian）的設定。

可於 **管理 > 組態設定 > 搜尋** 存取這些設定。此分類包含 **3 項設定**，以下列出平台設定 fixtures（`SettingsCurrentFixtures.php`）中隨附的標題與說明。

> 程式碼中的變數名稱以等寬字體顯示。透過 API 撰寫指令碼，或需以編輯 [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) 的方式在全域層級變更這些設定時，請使用該名稱。

## 設定

### `search_enabled`

**全文檢索功能**

選取「是」以啟用此功能。此功能高度依賴 PHP 的 Xapian 擴充套件，因此若伺服器未安裝此擴充套件（至少需為 1.x 版），將無法運作。

*預設值：`false`*


### `search_prefilter_prefix`

**預先篩選的特定欄位**

此選項可讓您選擇預先篩選搜尋類型所使用的特定欄位。

### `search_show_unlinked_results`

**全文檢索：顯示未連結的結果**

顯示全文檢索結果時，對於目前使用者無法存取的結果應如何處理？

*預設值：`true`*