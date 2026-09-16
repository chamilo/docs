# 訊息設定

**訊息／收件匣**系統的行為。

可於 **管理 > 組態設定 > 訊息** 存取這些設定。此類別包含 **7 項設定**，以下列出平台設定 fixtures（`SettingsCurrentFixtures.php`）中隨附的標題與說明。

> 程式碼中的變數名稱以等寬字體顯示。透過 API 撰寫指令碼，或需以編輯 [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) 的方式在全域層級變更這些設定時，請使用該名稱。

## 設定

### `allow_message_tool`

**內部訊息工具**

啟用內部訊息工具後，使用者可向平台上的其他使用者傳送訊息，並擁有訊息收件匣。

*預設值：`true`*

### `allow_send_message_to_all_platform_users`

**允許傳送訊息給任何平台使用者**

允許您傳送訊息給平台上的任何使用者，而不僅限於您的好友或目前在線的人員。

*預設值：`false`*

### `allow_user_message_tracking`

**管理員可檢視私人訊息**

允許管理員檢視教師與學習者之間的私人訊息。請務必在您的條款與條件中加入說明，因為這可能影響隱私保護。

*預設值：`false`*


### `filter_interactivity_messages`

**教師僅能在課程時段內存取學習者訊息**

依課程開始與結束日期篩選教師與學習者之間的訊息

*預設值：`false`*


### `message_max_upload_filesize`

**訊息中的檔案上傳大小上限**

訊息工具中檔案上傳的大小上限（以位元組為單位）

*預設值：`20971520`*

### `private_messages_about_user`

**允許教師之間就學習者交換私人訊息**

允許教師／主管從該使用者的追蹤頁面，就該使用者交換訊息。

*預設值：`false`*


### `private_messages_about_user_visible_to_user`

**允許學習者檢視教師之間關於自己的訊息**

若已啟用關於某使用者的訊息交換，此選項將允許該使用者檢視這些訊息。此舉旨在符合組織可能需要遵守的透明度規範。

*預設值：`false`*