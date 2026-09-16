# 隱私設定

隱私和資料保護（GDPR 風格）控制 — 同意、資料匯出、帳戶刪除請求等類似功能。

在 **Administration > Configuration settings > Privacy** 下存取這些設定。此類別包含 **6 個設定**，以下列出平台設定預設值（`SettingsCurrentFixtures.php`）中提供的標題和註解。

> 程式碼中的變數名稱以等寬字體顯示。透過 API 撰寫腳本或需要透過編輯 [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) 在全域層級變更這些設定時，請使用它。

## 設定

### `data_protection_officer_email`

**資料保護官員電子郵件地址**

指定資料保護官員的電子郵件地址，在 GDPR/隱私區段中顯示。

### `data_protection_officer_name`

**資料保護官員名稱**

指定資料保護官員的全名，在個人資料和隱私頁面中顯示。

### `data_protection_officer_role`

**資料保護官員角色**

指定資料保護官員的職稱或角色，在隱私資訊中與其名稱一起顯示。

### `disable_change_user_visibility_for_public_courses`

**停用在公開課程中使工具使用者可見**

避免任何人將「使用者」工具在公開課程中設為可見。

*預設值：`true`*

### `disable_gdpr`

**停用 GDPR 功能**

如果您已在其他地方向使用者管理個人資料保護聲明，您可以安全地停用此功能。

*預設值：`true`*

### `hide_user_field_from_list`

**從課程使用者清單中隱藏欄位**

預設情況下，我們會在課程中的使用者工具顯示所有使用者資料。此陣列允許您指定不想顯示的欄位。僅影響主要欄位（不影響額外欄位）。