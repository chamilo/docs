# 使用者建立

`POST /api/access_urls/{id}/user` 會建立平台使用者，並將其加入存取 URL `{id}`。此端點是 Chamilo 3 用以取代 1.11.x `webservices/api/v2.php` 網路服務中 `save_user_json` 動作的對應功能，適用於建立學習者帳號的整合情境（商店、人力資源系統、註冊入口網站）。

## 存取權限

| 呼叫者 | 是否允許 |
|--------|---------|
| `ROLE_ADMIN` | 是 |
| `ROLE_SESSION_MANAGER` | 是 |
| 其他任何人 | `403 Forbidden` |

請使用 JWT 或外部 API 金鑰進行驗證，說明見 [驗證](authentication.md)。

## 請求

```http
POST /api/access_urls/1/user
Authorization: Bearer <token>
Content-Type: application/json
```

```json
{
  "username": "jdoe-20261022",
  "email": "jane.doe@example.com",
  "firstname": "Jane",
  "lastname": "Doe",
  "password": "S3cret!pass",
  "sendEmail": true,
  "extraFields": { "my_user_field": "value" }
}
```

| 欄位 | 是否必填 | 說明 |
|-------|----------|-------------|
| `username` | 是 | 新使用者的登入名稱。不得已被其他帳號使用（比對時不區分大小寫）。 |
| `email` | 是 | 有效的電子郵件地址。除非 `checkEmailDuplicates` 為 `true`，否則多個帳號可以共用同一地址。 |
| `firstname`、`lastname` | 否 | 名字與姓氏。 |
| `password` | 否 | 初始密碼。若此欄位為空且 `sendEmail` 為 `true`，電子郵件會改為包含設定密碼的連結。 |
| `locale` | 否 | 介面語言，例如 `fr_FR`。預設為平台語言。 |
| `timezone` | 否 | 預設為平台時區。 |
| `status` | 否 | 預設為 `5`（學習者）；`1` 表示教師。 |
| `sendEmail` | 否 | 預設為 `true`。會向使用者傳送訊息與電子郵件，內容包含其存取資訊。 |
| `checkEmailDuplicates` | 否 | 預設為 `false`。設為 `true` 時，若已有任何帳號使用此電子郵件地址（比對時不區分大小寫），請求會被拒絕並回傳 `409 email_already_exists`。行為與 `save_user_json` 的 `check_email_duplicates` 參數相同。 |
| `extraFields` | 否 | 使用者額外欄位值，以該欄位的變數名稱為鍵。每個變數都必須是已存在的使用者額外欄位。 |

### 共用電子郵件地址

Chamilo 不要求電子郵件地址必須唯一：管理員的使用者建立表單會接受已被其他帳號使用的地址；使用者匯入僅在勾選其 **檢查電子郵件唯一性** 選項時才會拒絕該地址；平台也沒有設定可變更此行為。常見情況是學習者以新識別碼重新註冊，但仍沿用同一地址。僅當您的整合希望將既有地址視為錯誤時，才傳送 `checkEmailDuplicates: true`。

當啟用 **登入名稱即為電子郵件** 設定時，使用者名稱即為電子郵件地址，因此使用者名稱檢查已會拒絕重複項目。

## 回應

`201 Created`，並回傳新使用者（`user:read` 序列化群組），其中包含其 `id`。

## 錯誤

| 狀態 | 內容 | 發生時機 |
|--------|------|------|
| `401` | | 未提供憑證或憑證無效 |
| `403` | | 呼叫者既非管理員也非課程管理員 |
| `409` | `{"error": "username_already_exists"}` | 使用者名稱已被使用 |
| `409` | `{"error": "email_already_exists"}` | `checkEmailDuplicates` 為 `true`，且電子郵件地址已被使用 |
| `422` | | 缺少 `username` 或 `email`，或電子郵件地址無效 |

## 實作

* 操作：宣告於 `src/CoreBundle/Entity/User.php` 的 `AccessUrlUser` 資源
* 輸入：`src/CoreBundle/Dto/CreateUserOnAccessUrlInput.php`
* 控制器：`src/CoreBundle/Controller/Api/CreateUserOnAccessUrlAction.php`
* 課程管理員的 **註冊學生** 頁面（`/admin-dashboard/register/{courseId}`）會以 `checkEmailDuplicates: true` 呼叫此端點，因此當地址已被使用時會提出警告。