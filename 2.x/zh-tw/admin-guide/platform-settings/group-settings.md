# 群組設定

課程 **Groups** 工具的行為。

在 **Administration > Configuration settings > Groups** 下存取這些設定。此類別包含 **3 個設定**，以下列出平台設定預設資料 (`SettingsCurrentFixtures.php`) 中提供的標題和註解。

> 程式碼中的變數名稱以等寬字體顯示。使用 API 進行腳本編寫或需要透過編輯 [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) 在全域層級變更這些設定時，請使用它。

## 設定

### `allow_group_categories`

**群組分類**

允許教師在 Groups 工具中建立分類嗎？

*預設值：`false`*


### `hide_course_group_if_no_tools_available`

**無工具時隱藏課程群組**

如果群組中沒有任何工具可用，且使用者未註冊該群組本身，則在群組清單中完全隱藏該群組。

*預設值：`false`*


### `show_groups_to_users`

**向使用者顯示班級**

向使用者顯示班級。班級是一項功能，允許您直接將使用者群組註冊/取消註冊至課程或工作坊，從而減少行政負擔。選擇此選項時，學習者將能夠透過其社群網路介面查看他們屬於哪個班級。

*預設值：`false`*