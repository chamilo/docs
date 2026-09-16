# 聊天設定

課程 **聊天** 工具的行為。

可於 **管理 > 組態設定 > 聊天** 存取這些設定。此類別包含 **5 項設定**，以下列出平台設定 fixtures（`SettingsCurrentFixtures.php`）中隨附的標題與說明。

> 程式碼中的變數名稱以等寬字體顯示。透過 API 撰寫指令碼，或需以編輯 [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) 的方式在全域層級變更這些設定時，請使用該名稱。

## 設定

### `allow_global_chat`

**允許全域聊天**

使用者可彼此聊天

*預設值：`false`*

### `course_chat_restrict_to_coach`

**將課程聊天限制為僅限導師**

僅允許學生與課程中的導師交談（不可與其他學生交談）。

*預設值：`false`*

### `hide_chat_video`

**在全域聊天中隱藏視訊聊天選項**

啟用後，視訊聊天功能會停用，且無法在全域聊天工具中使用。

*預設值：`true`*

### `save_private_conversations_in_documents`

**將私人對話儲存至文件**

若啟用，一對一私人聊天訊息會鏡像至課程聊天歷程文件。基於隱私考量，建議維持停用。

*預設值：`false`*

### `show_chat_folder`

**顯示聊天對話的歷程資料夾**

這會向教師顯示包含聊天中所有工作階段的資料夾，教師可將其設為對學習者可見或不可見，並作為資源使用

*預設值：`true`*