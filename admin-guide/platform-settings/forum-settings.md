# 論壇設定

課程 **Forums** 工具的行為。

在 **Administration > Configuration settings > Forums** 下存取這些設定。此類別包含 **9 個設定**，以下列出平台設定預設值 (`SettingsCurrentFixtures.php`) 中提供的標題和註解。

> 程式碼中的變數名稱以等寬字體顯示。使用 API 進行腳本編寫，或在全域層級編輯 [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) 變更這些設定時，請使用它。

## 設定

### `allow_forum_category_language_filter`

**論壇分類語言篩選**

在論壇檢視中新增語言篩選器，以僅顯示特定語言設定的分類。需要使用 'forum_category' 實體上的 'language' 額外欄位。

*預設值：`false`*

### `allow_forum_post_revisions`

**論壇貼文審核**

啟用此選項以允許要求對論壇中的貼文進行審核或翻譯。廣泛設定後，可用於語言學習論壇中與其他使用者合作。

*預設值：`false`*

### `community_managers_user_list`

**社群管理者清單**

提供使用者 ID 陣列，這些使用者將被視為全球論壇指定特殊課程中的社群管理者。社群管理員在全球論壇中擁有額外權限。

### `default_forum_view`

**預設論壇檢視**

建立新論壇時的預設選項。不過，任何教師均可為每個個別論壇選擇不同的檢視。

*預設值：`flat`*

### `display_groups_forum_in_general_tool`

**在一般論壇中顯示群組論壇**

在課程層級的論壇工具中顯示群組論壇。此選項預設啟用（在此情況下，群組論壇的個別可見性仍作為額外標準）。若停用，群組論壇僅可透過群組工具檢視，無論公開與否。

*預設值：`true`*

### `forum_fold_categories`

**摺疊論壇分類**

啟用論壇分類摺疊/展開的視覺效果。

*預設值：`false`*

### `global_forums_course_id`

**使用課程作為全球論壇**

設定保留用作全球論壇的課程 ID（數字）。這會將社群網路中的「Social groups」連結取代為該課程論壇的連結。

*預設值：`0`*

### `hide_forum_post_revision_language`

**隱藏論壇貼文審核語言**

隱藏為論壇貼文審核指派語言的可能性。

*預設值：`false`*

### `subscribe_users_to_forum_notifications_also_in_base_course`

**也包含基礎課程的論壇通知**

啟用此選項以啟用來自基礎課程論壇的通知，即使透過課程工作階段追蹤課程亦然。

*預設值：`false`*