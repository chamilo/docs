# 期次學員註冊 API

整合功能可透過僅限管理員使用的端點，列出、註冊及移除期次中的學習者。這些操作採用 Chamilo 管理畫面的期次註冊行為。它們與 `/api/course-sessions/actions/*` 相互獨立，後者屬於另一種以導師為導向的工作流程。

## 驗證與存取

下列每一項操作皆須以 `ROLE_ADMIN` 平台角色進行驗證。僅身為期次管理員**並不**授予存取權限。請使用 [驗證](authentication.md) 所述的驗證方法。

在多 URL 安裝環境中，所請求的期次必須屬於目前的存取 URL；否則端點會回應 `404`。

## 路由

| 方法 | 端點 | 用途 |
|--------|----------|---------|
| `GET` | `/api/sessions/{id}/students` | 列出此期次中已註冊學習者的使用者 ID |
| `POST` | `/api/sessions/{id}/students/subscribe` | 新增指定的學習者，並保留既有學習者 |
| `POST` | `/api/sessions/{id}/students/unsubscribe` | 僅移除指定的學習者 |

將 `{id}` 替換為數字形式的期次 ID。對於這兩個 POST 請求，請傳送包含 `userIds` 陣列的 JSON：

```http
POST /api/sessions/42/students/subscribe
Authorization: Bearer <admin-token>
Content-Type: application/json
```

```json
{ "userIds": [17, 23] }
```

成功的註冊會產生具有下列結構的回應；ID 取決於您的安裝環境：

```json
{
  "success": true,
  "applied": [17],
  "alreadyThere": [23],
  "ignored": []
}
```

`applied` 包含新註冊的學習者；`alreadyThere` 包含已註冊的學習者；`ignored` 列出不符合資格或無法使用的 ID。進行註冊時，Chamilo 也會將新增的學習者註冊到期次的課程中。它**不會**取代整個期次名冊。

若要檢視成員資格：

```http
GET /api/sessions/42/students
Authorization: Bearer <admin-token>
```

```json
{ "userIds": [17, 23] }
```

若要移除所選學習者：

```http
POST /api/sessions/42/students/unsubscribe
Authorization: Bearer <admin-token>
Content-Type: application/json
```

```json
{ "userIds": [17] }
```

取消註冊的回應包含 `success`、`applied`（已移除的 ID）以及 `ignored`（未註冊的 ID）。其他學習者仍保留在期次中。

## 驗證與限制

* `userIds` 必須是數字 ID 的陣列（整數或僅含數字的字串）。重複的 ID 會被去重；非正值會被略過。
* 就註冊而言，符合資格的使用者必須存在、未被軟刪除、不得為匿名使用者或 HR 管理員，且必須屬於目前的存取 URL。
* 缺少或格式錯誤的 JSON 或 `userIds` 會回傳 `400 Bad Request`。
* 缺少或不在範圍內的期次會回傳 `404 Not Found`；沒有管理員權限的呼叫者無法使用這些路由。
* 學員註冊路由**並非** `Session` 實體的通用 CRUD 端點，也不接受以期次名冊作為取代文件。

關於對應的管理介面，請參閱 [管理期次](../../admin-guide/sessions/managing-sessions.md)。若要在註冊學員之前複製範本期次，請參閱 [期次複製](session-duplication.md)。

**實作：** `src/CoreBundle/Controller/Api/SessionStudentsController.php`。於 Chamilo LMS 提交 `bdfb2dd661` 中新增。