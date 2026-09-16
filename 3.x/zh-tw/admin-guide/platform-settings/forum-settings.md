# 論壇設定

課程 **論壇** 工具的行為。

可於 **管理 > 組態設定 > 論壇** 存取這些設定。此分類包含 **9 項設定**，以下列出平台設定 fixtures（`SettingsCurrentFixtures.php`）中隨附的標題與說明。

> 程式碼中的變數名稱以等寬字體顯示。透過 API 撰寫指令碼，或需要以全域層級變更這些設定而編輯 [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) 時，請使用該名稱。

## 設定

### `allow_forum_category_language_filter`

**論壇分類語言篩選**

在論壇檢視中新增語言篩選，僅顯示設定為特定語言的分類。需在 `forum_category` 實體上使用 `language` 額外欄位。

*預設值：`false`*

### `allow_forum_post_revisions`

**論壇貼文審閱**

啟用此選項後，可針對論壇中自己的貼文請求審閱或翻譯。經過充分設定後，可用於語言學習論壇中與其他使用者協作。

*預設值：`false`*

### `community_managers_user_list`

**社群管理員清單**

提供使用者 ID 陣列，這些使用者將被視為指定為全域論壇之特殊課程中的社群管理員。社群管理員在全域論壇上擁有額外權限。

### `default_forum_view`

**預設論壇檢視**

建立新論壇時應使用的預設選項。不過，任何教師仍可為每個個別論壇選擇不同的檢視方式。

*預設值：`flat`*

### `display_groups_forum_in_general_tool`

**在一般論壇中顯示小組論壇**

在課程層級的論壇工具中顯示小組論壇。此選項預設為啟用（此時小組論壇的個別可見性仍會作為額外條件）。若停用，無論是否公開，小組論壇僅能透過小組工具看見。

*預設值：`true`*

### `forum_fold_categories`

**摺疊論壇分類**

啟用論壇分類摺疊／展開的視覺效果。

*預設值：`false`*

### `global_forums_course_id`

**將課程作為全域論壇**

設定保留作為全域論壇使用之課程的課程 ID（數字）。這會將社交網路中的「社交群組」連結，改為指向該課程論壇的連結。

*預設值：`0`*

### `hide_forum_post_revision_language`

**隱藏論壇貼文審閱語言**

隱藏為論壇貼文審閱指定語言的可能性。

*預設值：`false`*

### `subscribe_users_to_forum_notifications_also_in_base_course`

**同時接收基礎課程的論壇通知**

啟用此選項後，即使是透過工作階段修習課程，仍可接收來自基礎課程論壇的通知。

*預設值：`false`*