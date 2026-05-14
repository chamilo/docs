# 訊息設定

**Messaging / Inbox** 系統的行為。

在 **Administration > Configuration settings > Messaging** 下存取這些設定。此類別包含 **7 個設定**，以下列出平台設定預設值 (`SettingsCurrentFixtures.php`) 中提供的標題和註解。

> 程式碼中的變數名稱以等寬字體顯示。當透過 API 進行腳本編寫，或需要透過編輯 [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) 在全域層級變更這些設定時，請使用它。

## 設定

### `allow_message_tool`

**內部訊息工具**

啟用內部訊息工具可讓使用者向平台上的其他使用者發送訊息，並擁有訊息收件匣。

*預設值：`true`*

### `allow_send_message_to_all_platform_users`

**允許發送訊息給任何平台使用者**

允許您向平台上的任何使用者發送訊息，而不僅限於您的朋友或目前上線的人員。

*預設值：`false`*

### `allow_user_message_tracking`

**管理員可查看個人訊息**

允許管理員查看教師與學習者之間的個人訊息。請確保在您的條款與條件中加入相關說明，因為這可能影響隱私保護。

*預設值：`false`*


### `filter_interactivity_messages`

**教師僅能在課程期間存取學習者訊息**

篩選教師與學習者之間的訊息，限定在課程開始與結束日期之間

*預設值：`false`*


### `message_max_upload_filesize`

**訊息中檔案上傳最大大小**

訊息工具中檔案上傳的最大大小（以位元組為單位）

*預設值：`20971520`*

### `private_messages_about_user`

**允許教師之間關於學習者的私人訊息**

允許教師/主管從該使用者的追蹤頁面交換關於該使用者的訊息。

*預設值：`false`*


### `private_messages_about_user_visible_to_user`

**允許學習者查看教師之間關於他們的訊息**

如果啟用關於使用者的訊息交換，此選項將允許對應使用者查看這些訊息。這是為了符合組織可能需要遵守的透明度規定。

*預設值：`false`*