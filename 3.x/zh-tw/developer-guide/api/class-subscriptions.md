# 班級成員與註冊 API

對於整合情境，Chamilo 提供端點，用以讀取並同步與既有**班級**相關聯的成員、課程場次與課程。班級是類型為*一般班級*的 `Usergroup`；這些路由**不**適用於社交群組。

與課程場次學員 API 不同，三個班級 `PUT` 動作會**取代整個指定清單**。未包含的 ID 會從該關聯中移除。更新前請先讀取既有清單，並避免僅為新增一名成員而使用 `PUT`，除非同時提交所有應保留的成員。

## 授權

下列所有路由皆要求已驗證的平台 `ROLE_ADMIN` 角色。目標班級必須可在目前的存取 URL 中使用。缺少或超出範圍的班級會回傳 `404`；非一般班級的 usergroup 會回傳 `409 Conflict`。

控制器會檢查所提交的使用者、課程與課程場次 ID 是否存在。在多 URL 安裝中，所提交的**課程與課程場次 ID** 會依目前入口網站篩選；然而，目前的實作**不會**對**使用者 ID** 套用相同的入口網站篩選。整合開發者不應將此端點視為使用者層級入口網站隔離的保證。關於此尚未解決的安全性考量，請參閱交付審查說明。

## 讀取班級關聯

```http
GET /api/usergroups/31/subscriptions
Authorization: Bearer <admin-token>
```

回應範例：

```json
{
  "userIds": [17, 23],
  "sessionIds": [42],
  "courseIds": [8, 11]
}
```

## 取代單一關聯清單

| 方法 | 端點 | 請求屬性 |
|--------|----------|------------------|
| `PUT` | `/api/usergroups/{id}/users` | `userIds` |
| `PUT` | `/api/usergroups/{id}/sessions` | `sessionIds` |
| `PUT` | `/api/usergroups/{id}/courses` | `courseIds` |

例如，若要設定完整的班級名冊：

```http
PUT /api/usergroups/31/users
Authorization: Bearer <admin-token>
Content-Type: application/json
```

```json
{ "userIds": [17, 23, 29] }
```

回應範例：

```json
{
  "success": true,
  "applied": [17, 23, 29],
  "ignored": []
}
```

`applied` 列出已接受的 ID，不一定是新加入的 ID。`ignored` 標示無法套用的請求 ID（例如未知 ID，或位於目前入口網站之外的課程／課程場次）。非正值會被省略，重複項目會被移除；格式錯誤的 JSON 或非陣列的請求屬性會回傳 `400`。

若要改為取代已連結的課程場次，請以 `{ "sessionIds": [42, 57] }` 呼叫 `PUT /api/usergroups/31/sessions`。若要取代已連結的課程，請以 `{ "courseIds": [8, 11] }` 呼叫 `PUT /api/usergroups/31/courses`。

**重要：** Chamilo 透過 `UsergroupHelper` 同步方法套用這些變更。變更班級名冊或其課程場次／課程綁定，也可能變更相關註冊。請勿直接操作 usergroup 關聯資料表，並在執行正式環境整合前檢視取代清單的影響。

關於介面與概念，請參閱[班級](../../admin-guide/sessions/classes.md)。若要在*不*取代所有成員的情況下，於單一課程場次中新增或移除特定學習者，請使用[課程場次學員註冊 API](session-students.md)。

**實作：** `src/CoreBundle/Controller/Api/UsergroupSubscriptionController.php`。於 Chamilo LMS 提交 `d8809925a4` 中新增。