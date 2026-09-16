# 隱私設定

隱私與資料保護（類 GDPR）控制項 — 同意、資料匯出、帳號刪除請求等。

可於 **管理 > 組態設定 > 隱私** 存取這些設定。此類別包含 **6 項設定**，以下列出平台設定 fixtures（`SettingsCurrentFixtures.php`）中隨附的標題與註解。

> 程式碼中的變數名稱以等寬字體顯示。透過 API 撰寫指令碼，或需以編輯 [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) 的方式在全域層級變更這些設定時，請使用該名稱。

## 設定

### `data_protection_officer_email`

**資料保護長電子郵件地址**

指定資料保護長的電子郵件地址，顯示於 GDPR／隱私相關區塊。

### `data_protection_officer_name`

**資料保護長姓名**

指定資料保護長的全名，顯示於個人資料與隱私頁面。

### `data_protection_officer_role`

**資料保護長職稱**

指定資料保護長的職稱或角色，與姓名一併顯示於隱私資訊中。

### `disable_change_user_visibility_for_public_courses`

**停用在公開課程中顯示工具使用者**

避免任何人將「使用者」工具設為在公開課程中可見。

*預設值：`true`*

### `disable_gdpr`

**停用 GDPR 功能**

若您已在其他地方向使用者管理個人資料保護聲明，可安心停用此功能。

*預設值：`true`*

### `hide_user_field_from_list`

**在課程使用者清單中隱藏欄位**

預設會在課程的使用者工具中顯示使用者的所有資料。此陣列可讓您指定不想顯示的欄位。僅影響主要欄位（不含額外欄位）。