# 社交網路設定

**社交網路**的行為——好友、群組、動態牆貼文、相簿。

可於 **管理 > 組態設定 > 社交網路** 存取這些設定。此類別包含 **7 項設定**，以下列出平台設定 fixtures（`SettingsCurrentFixtures.php`）中隨附的標題與註解。

> 程式碼中的變數名稱以等寬字體顯示。透過 API 撰寫指令碼，或需以全域層級編輯 [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) 來變更這些設定時，請使用該名稱。

## 設定

### `allow_social_tool`

**社交網路工具（類似 Facebook）**

社交網路工具讓使用者能與其他使用者建立關係，並藉此定義好友群組。結合內部訊息工具，此功能可在入口網站環境內與好友進行緊密溝通。

*預設值：`true`*

### `allow_students_to_create_groups_in_social`

**允許學習者在社交網路中建立群組**

允許學習者在社交網路中建立群組

*預設值：`false`*


### `disable_dislike_option`

**停用社交貼文的「不喜歡」**

移除社交貼文回饋的向下拇指選項。僅保留向上拇指（喜歡）。

*預設值：`false`*

### `hide_social_groups_block`

**隱藏社交網路中的群組區塊**

從社交網路檢視中移除群組區段。

*預設值：`false`*


### `social_enable_messages_feedback`

**社交貼文的喜歡／不喜歡**

允許使用者對社交動態牆的貼文加入回饋（喜歡或不喜歡）。

*預設值：`false`*

### `social_make_teachers_friend_all`

**教師與管理員在社交網路上將學生視為好友**

自動讓講師與管理員在社交網路模組中對所有學生顯示為好友。

*預設值：`false`*


### `social_show_language_flag_in_profile`

**在社交網路頭像旁顯示語言旗幟**

在社交網路個人檔案中，於使用者頭像旁以旗幟圖示顯示其語言偏好。

*預設值：`false`*