# 搜尋設定

全文字搜尋系統 (Xapian) 的設定。

在 **管理 > 設定 > 搜尋** 下存取這些設定。此類別包含 **3 個設定**，以下列出平台設定預設資料 (`SettingsCurrentFixtures.php`) 中提供的標題和註解。

> 程式碼中的變數名稱以等寬字體顯示。當透過 API 進行腳本編寫，或需要透過編輯 [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) 在全域層級變更這些設定時，請使用它。

## 設定

### `search_enabled`

**全文字搜尋功能**

選擇「是」以啟用此功能。它高度依賴 PHP 的 Xapian 延伸模組，因此如果您的伺服器未安裝此延伸模組（最低版本 1.x），則無法運作。

*預設值：`false`*


### `search_prefilter_prefix`

**預篩選特定欄位**

此選項讓您選擇用於預篩選搜尋類型的特定欄位。

### `search_show_unlinked_results`

**全文字搜尋：顯示未連結結果**

在顯示全文字搜尋結果時，對於目前使用者無法存取的結果應如何處理？

*預設值：`true`*