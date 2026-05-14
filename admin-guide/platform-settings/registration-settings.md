# 註冊設定

自註冊政策與註冊後重新導向 — 新使用者被要求提供的資訊以及他們將被導向的位置。

在 **管理 > 設定 > 註冊** 下存取這些設定。此類別包含 **20 個設定**，以下列出平台設定預設值 (`SettingsCurrentFixtures.php`) 中的標題與註解。

> 程式碼中的變數名稱以等寬字體顯示。使用 API 進行腳本編寫，或需全域編輯這些設定時，請使用它，並編輯 [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml)。

## 設定

### `allow_double_validation_in_registration`

**註冊程序的雙重驗證**

在進行使用者建立之前，僅在註冊頁面顯示確認請求。

*預設值：`false`*


### `allow_fields_inscription`

**限制註冊時顯示的欄位**

如果您只想顯示部分可用的個人資料欄位，您可以在此處完成陣列，包含子元素 'fields' 和 'extra_fields'，其中包含要顯示的欄位清單陣列。

### `allow_lostpassword`

**遺失密碼**

使用者是否允許請求遺失密碼？

*預設值：`true`*

### `allow_registration`

**註冊**

是否允許以新使用者身分註冊？使用者是否能建立新帳戶？

*預設值：`false`*

### `allow_registration_as_teacher`

**以教師身分註冊**

是否能以教師身分註冊（具備建立課程的能力）？

*預設值：`false`*

### `allow_terms_conditions`

**啟用條款與條件**

此選項將在註冊表單中顯示條款與條件，供新使用者閱讀。需先在入口網站管理頁面進行設定。

*預設值：`false`*


### `drh_autosubscribe`

**人力資源主管自動訂閱**

人力資源主管自動訂閱 — 尚未提供

### `extendedprofile_registration`

**註冊時的投資組合欄位**

以下投資組合欄位中的哪些必須在使用者註冊程序中提供？這要求已啟用投資組合選項（見上文）。

### `extendedprofile_registrationrequired`

**註冊時必填的投資組合欄位**

以下投資組合欄位中的哪些在使用者註冊程序中是*必填*的？這要求已啟用投資組合選項，且該欄位也必須在註冊表單中提供（見上文）。

### `extldap_config`

**LDAP 連線設定**

定義 LDAP 伺服器主機與連接埠的陣列。

### `hide_legal_accept_checkbox`

**隱藏條款與條件頁面的法律接受核取方塊**

若設為 true，將移除條款與條件頁面流程中的「我已閱讀並接受」核取方塊。

*預設值：`false`*


### `platform_unsubscribe_allowed`

**允許從平台取消訂閱**

啟用此選項後，您允許任何使用者永久移除其帳戶及其相關所有資料。這是一項相當激烈的動作，但對於開放公眾自註冊的入口網站而言是必要的。使用者個人資料中將出現額外的取消訂閱項目，需經確認後執行。

*預設值：`false`*


### `redirect_after_login`

**登入後重新導向（依個人資料）**

使用 JSON 物件定義依個人資料的登入後重新導向，例如 {"STUDENT":"", "ADMIN":"admin-dashboard"}

*預設值：*
```json
{
  "COURSEMANAGER": "courses",
  "STUDENT": "courses",
  "DRH": "",
  "SESSIONADMIN": "admin-dashboard",
  "STUDENT_BOSS": "main/my_space/student.php",
  "INVITEE": "courses",
  "ADMIN": "admin"
}
```

### `required_extra_fields_in_inscription`

**註冊時必填的額外欄位**

使用者註冊期間必須填寫的額外欄位識別碼陣列。

### `required_profile_fields`

**註冊時必填欄位**

註冊期間必須提供的個人資料欄位名稱陣列（email、phone、language、official_code）。

### `send_inscription_msg_to_inbox`

**將歡迎訊息發送至電子郵件與收件匣**

預設情況下，歡迎訊息（含憑證）僅透過電子郵件發送。啟用此選項可同時發送至使用者的 Chamilo 收件匣。

*預設值：`false`*


### `sessionadmin_autosubscribe`

**課程管理員自動訂閱**

課程管理員自動訂閱 — 尚未提供

### `student_autosubscribe`

**學習者自動訂閱**

學習者自動訂閱 — 尚未提供

### `teacher_autosubscribe`

**教師自動訂閱**

教師自動訂閱 — 尚未提供

### `user_hide_never_expire_option`

**隱藏使用者的「永不過期」選項**

在建立/編輯使用者帳戶時移除「永不過期」選項。

*預設值：`false`*