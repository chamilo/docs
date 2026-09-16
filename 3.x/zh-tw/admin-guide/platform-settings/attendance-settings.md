# 出席設定

**出席**工具的預設值與行為。

可於 **管理 > 組態設定 > 出席** 存取這些設定。此類別包含 **5 項設定**，以下列出平台設定 fixtures（`SettingsCurrentFixtures.php`）中隨附的標題與說明。

> 程式碼中的變數名稱以等寬字體顯示。透過 API 撰寫指令碼，或需以全域層級變更這些設定而編輯 [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) 時，請使用該名稱。

## 設定

### `allow_delete_attendance`

**出席：啟用刪除**

Chamilo 的預設行為是隱藏出席表而非刪除，以免教師誤刪。啟用此選項可允許教師*真正*刪除出席表。

*預設值：`true`*

### `attendance_allow_comments`

**允許在出席表中留言**

教師與學生可針對每一筆個別出席留下說明（以供請假／說明）。

*預設值：`false`*

### `attendance_calendar_set_duration` **v3**

**出席活動時長**

用於定義出席表中活動時長的選項。

*預設值：`false`*

### `enable_sign_attendance_sheet`

**出席簽名**

啟用簽名以確認本人出席。

*預設值：`false`*

### `multilevel_grading`

**啟用多層級出席評分**

允許以多個層級評分出席，而非僅使用簡單的出席／缺席系統。

*預設值：`false`*