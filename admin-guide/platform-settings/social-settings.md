# 社交網路設定

**社交網路** 的行為 — 朋友、群組、動態牆貼文、相片相簿。

在 **管理 > 設定 > 社交網路** 下存取這些設定。此類別包含 **7 個設定**，以下列出平台設定預設值 (`SettingsCurrentFixtures.php`) 中的標題與註解。

> 程式碼中的變數名稱以等寬字體顯示。透過 API 撰寫腳本或需要透過編輯 [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) 在全域層級變更這些設定時，請使用它。

## 設定

### `allow_social_tool`

**社交網路工具 (類似 Facebook)**

社交網路工具允許使用者與其他使用者建立關係，並據此定義朋友群組。結合內部訊息工具，此工具可在入口網站環境中實現與朋友的緊密溝通。

*預設值：`true`*

### `allow_students_to_create_groups_in_social`

**允許學習者於社交網路中建立群組**

允許學習者於社交網路中建立群組

*預設值：`false`*


### `disable_dislike_option`

**停用社交貼文的「不喜歡」選項**

移除社交貼文回饋的向下拇指選項。僅保留向上拇指 (喜歡)。

*預設值：`false`*

### `hide_social_groups_block`

**隱藏社交網路中的群組區塊**

從社交網路檢視中移除群組區段。

*預設值：`false`*


### `social_enable_messages_feedback`

**社交貼文的讚/不讚**

允許使用者為社交動態牆貼文新增回饋 (讚或不讚)。

*預設值：`false`*

### `social_make_teachers_friend_all`

**教師與管理員於社交網路中視學生為朋友**

自動使教師與管理員於社交網路模組中對所有學生顯示為朋友。

*預設值：`false`*


### `social_show_language_flag_in_profile`

**於社交網路個人檔案中於頭像旁顯示語言旗標**

於社交網路個人檔案中於使用者頭像旁以旗標圖示顯示使用者的語言偏好。

*預設值：`false`*