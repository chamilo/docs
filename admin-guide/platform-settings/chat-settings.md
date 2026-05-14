# 聊天室設定

課程 **Chat** 工具的行為。

在 **Administration > Configuration settings > Chat** 下存取這些設定。此類別包含 **5 個設定**，以下列出平台設定預設值 (`SettingsCurrentFixtures.php`) 中提供的標題和註解。

> 程式碼中的變數名稱以等寬字體顯示。使用 API 進行腳本編寫，或需透過編輯 [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) 在全域層級變更這些設定時，請使用它。

## 設定

### `allow_global_chat`

**允許全域聊天室**

使用者可以互相聊天

*預設值：`false`*

### `course_chat_restrict_to_coach`

**限制課程聊天室僅限導師**

僅允許學生與課程中的導師交談（不允許與其他學生）。

*預設值：`false`*

### `hide_chat_video`

**在全域聊天室中隱藏視訊聊天選項**

啟用時，視訊聊天功能將在全域聊天室工具中停用且無法使用。

*預設值：`true`*

### `save_private_conversations_in_documents`

**將私人對話儲存至文件**

若啟用，1:1 私人聊天訊息將鏡像至課程聊天記錄文件中。為隱私考量，建議保持停用。

*預設值：`false`*

### `show_chat_folder`

**顯示聊天對話記錄資料夾**

這將向教師顯示包含所有聊天室已進行工作階段的資料夾，教師可決定是否對學習者顯示這些資料夾，並將其用作資源

*預設值：`true`*