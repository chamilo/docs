# 出席設定

**Attendance** 工具的預設值與行為。

在 **Administration > Configuration settings > Attendance** 下存取這些設定。此類別包含 **4 個設定**，以下列出平台設定固定資料 (`SettingsCurrentFixtures.php`) 中提供的標題與註解。

> 程式碼中的變數名稱以等寬字體顯示。當透過 API 進行腳本撰寫，或需要透過編輯 [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) 在全域層級變更這些設定時，請使用它。

## 設定

### `allow_delete_attendance`

**出席：啟用刪除**

Chamilo 的預設行為是隱藏出席表單而非刪除它們，以防教師誤操作。啟用此選項可讓教師*真正*刪除出席表單。

*預設值：`true`*

### `attendance_allow_comments`

**允許出席表單中的註解**

教師與學生可對每個個別出席記錄進行註解（用於說明）。

*預設值：`false`*

### `enable_sign_attendance_sheet`

**出席簽名**

啟用簽名以確認出席。

*預設值：`false`*

### `multilevel_grading`

**啟用多層級出席評分**

允許使用多層級評分出席，而非簡單的出席/缺席系統。

*預設值：`false`*