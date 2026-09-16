# 註冊設定

自助註冊政策與註冊後重新導向——新使用者需填寫哪些資料，以及註冊後會進入何處。

可於 **管理 > 組態設定 > 註冊** 存取這些設定。此類別包含 **21 項設定**，以下列出平台設定 fixtures（`SettingsCurrentFixtures.php`）中隨附的標題與註解。

> 程式碼中的變數名稱以等寬字體顯示。透過 API 撰寫指令碼，或需以編輯 [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) 的方式在全域層級變更這些設定時，請使用該名稱。

## 設定

### `allow_double_validation_in_registration`

**註冊流程雙重驗證**

僅在註冊頁面顯示確認請求，再繼續建立使用者。

*預設值：`false`*


### `allow_fields_inscription`

**限制註冊時顯示的欄位**

若只想顯示部分可用的個人資料欄位，可在此完成陣列，並以子元素 'fields' 與 'extra_fields' 填入要顯示的欄位清單陣列。

### `allow_invitation_registration` **v3**

**允許透過課程邀請連結註冊**

啟用後，教師／管理員可從課程的「使用者」工具傳送一次性邀請連結，讓尚未註冊者進入註冊表單並完成註冊，即使一般自助註冊（`allow_registration`）已停用。

*預設值：`false`*

教師端操作請參閱 [訂閱使用者](../../teacher-guide/assessing-learners/subscribing-users.md#inviting-users-by-email)。

### `allow_lostpassword`

**忘記密碼**

是否允許使用者申請遺失的密碼？

*預設值：`true`*

### `allow_registration`

**註冊**

是否允許以新使用者身分註冊？使用者能否建立新帳號？

*預設值：`false`*

### `allow_registration_as_teacher`

**以教師身分註冊**

是否可以教師身分註冊（具備建立課程的能力）？

*預設值：`false`*

### `allow_terms_conditions`

**啟用條款與條件**

此選項會在新使用者的註冊表單中顯示條款與條件。需先於入口網站管理頁面完成設定。

*預設值：`false`*


### `drh_autosubscribe`

**人力資源主管自動訂閱**

人力資源主管自動訂閱 - 尚未提供

### `extendedprofile_registration`

**註冊時的作品集欄位**

作品集中下列哪些欄位須在使用者註冊流程中提供？此功能需先啟用作品集選項（見上方）。

### `extendedprofile_registrationrequired`

**註冊時必填的作品集欄位**

作品集中下列哪些欄位在使用者註冊流程中為*必填*？此功能需先啟用作品集選項，且該欄位亦須出現在註冊表單中（見上方）。

### `extldap_config`

**LDAP 連線組態**

定義 LDAP 伺服器主機與連接埠的陣列。

### `hide_legal_accept_checkbox`

**在條款與條件頁面隱藏法律接受核取方塊**

若設為 true，會在條款與條件頁面流程中移除「我已閱讀並接受」核取方塊。

*預設值：`false`*


### `platform_unsubscribe_allowed`

**允許自平台取消訂閱**

啟用此選項後，任何使用者皆可永久刪除自己的帳號及平台上所有相關資料。此為相當徹底的動作，但對開放給公眾、使用者可自行註冊的入口網站而言是必要的。使用者個人資料中將出現額外項目，經確認後即可取消訂閱。

*預設值：`false`*


### `redirect_after_login`

**登入後重新導向（依個人資料）**

使用 JSON 物件依個人資料定義登入後重新導向，例如 {"STUDENT":"", "ADMIN":"admin-dashboard"}

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

使用者註冊時必須填寫的額外欄位識別碼陣列。

### `required_profile_fields`

**註冊時必填欄位**

註冊時必須提供的個人資料欄位名稱陣列（email、phone、language、official_code）。

### `send_inscription_msg_to_inbox`

**將歡迎訊息同時傳送至電子郵件與收件匣**

預設情況下，歡迎訊息（含憑證）僅以電子郵件傳送。啟用此選項後，亦會傳送至使用者的 Chamilo 收件匣。

*預設值：`false`*


### `sessionadmin_autosubscribe`

**工作階段管理員自動訂閱**

工作階段管理員自動訂閱 - 尚未提供

### `student_autosubscribe`

**學習者自動訂閱**

學習者自動訂閱 - 尚未提供

### `teacher_autosubscribe`

**教師自動訂閱**

教師自動訂閱 - 尚未提供

### `user_hide_never_expire_option`

**隱藏使用者「永不過期」選項**

建立／編輯使用者帳號時，移除「永不過期」選項。

*預設值：`false`*