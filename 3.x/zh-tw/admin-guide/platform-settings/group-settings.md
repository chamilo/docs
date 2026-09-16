# 群組設定

課程 **群組** 工具的行為。

可於 **管理 > 組態設定 > 群組** 存取這些設定。此類別包含 **3 項設定**，以下列出平台設定 fixtures（`SettingsCurrentFixtures.php`）中隨附的標題與說明。

> 程式碼中的變數名稱以等寬字體顯示。透過 API 撰寫指令碼，或需以編輯 [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) 的方式在全域層級變更這些設定時，請使用該名稱。

## 設定

### `allow_group_categories`

**群組類別**

是否允許教師在群組工具中建立類別？

*預設值：`false`*


### `hide_course_group_if_no_tools_available`

**若無工具則隱藏課程群組**

若群組中沒有任何可用工具，且使用者本身未註冊該群組，則在群組清單中完全隱藏該群組。

*預設值：`false`*


### `show_groups_to_users`

**向使用者顯示班級**

向使用者顯示班級。班級是一項功能，可讓您將使用者群組直接註冊／取消註冊至工作階段或課程，以減少行政負擔。選取此選項後，學習者即可透過其社群網路介面查看自己所屬的班級。

*預設值：`false`*