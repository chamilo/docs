# 課程管理 API

Chamilo 3.1 讓管理員整合可透過 `Course` API 資源更新課程中繼資料並刪除課程。這些操作是為了與外部管理系統（例如 ERP）同步而新增。

## 權限

| 操作 | 方法與端點 | 所需角色 |
|-----------|---------------------|---------------|
| 列出課程 | `GET /api/courses` | 教師或平台管理員 |
| 檢視課程 | `GET /api/courses/{id}` | 檢視該課程的權限 |
| 建立課程 | `POST /api/courses` | 教師或平台管理員 |
| 更新課程 | `PATCH /api/courses/{id}` | **平台管理員（`ROLE_ADMIN`）** |
| 刪除課程 | `DELETE /api/courses/{id}` | **平台管理員（`ROLE_ADMIN`）** |

此資源未將 `PUT` 設定為可用操作。教師應繼續透過課程設定介面編輯自己的課程；新的 API 寫入操作僅限管理員使用。

請使用具備必要權限的已驗證帳號或整合憑證。請參閱 [API 驗證](authentication.md)。

## 更新課程中繼資料

傳送 API Platform JSON Merge Patch 請求，僅變更請求本文中提供的屬性：

```http
PATCH /api/courses/42
Authorization: Bearer <admin-token>
Content-Type: application/merge-patch+json
Accept: application/ld+json
```

```json
{
  "title": "Introduction to Accounting - 2026"
}
```

此請求會更新既有課程，而非建立新課程。API 接受由 `course:write` 序列化群組定義、且通過實體驗證的可寫屬性。範例包括 `title`、`visibility`、`categories`、`departmentUrl`、`videoUrl`、`sticky` 與 `duration`。`categories` 等關聯屬性必須使用 API 預期的資源表示方式；請查閱 OpenAPI 文件，不要傳送任意的資料庫 ID。

**重要：** 內部課程 `code` **無法**透過此 PATCH 操作寫入。請勿嘗試傳送 `code` 或 `visualCode` 欄位來重新命名課程的內部代碼。

## 刪除課程

```http
DELETE /api/courses/42
Authorization: Bearer <admin-token>
```

這是一項**破壞性**的管理操作。Chamilo 會呼叫課程維護所使用的同一課程刪除輔助程式，而不是直接刪除 Doctrine 實體。它會視情況清理相關的註冊、會期與班級連結、追蹤資料以及相關的搜尋索引。

在**多 URL** 安裝中，刪除可能只會將課程從目前的存取 URL 解除關聯，而不是在所有位置刪除。課程文件不會使用維護介面中獨立的*刪除專屬文件*選項來刪除。請勿將 API 刪除解讀為保證每份文件都會被實體移除。

若有作用中的相依關係阻止刪除（例如資源序列），端點可能回應 `409 Conflict`。在傳送 DELETE 請求之前，請先檢視課程相依關係與備份，批次整合時尤其如此。

## 錯誤與操作注意事項

* 不具備所需管理員角色的呼叫者會被拒絕；PATCH 或 DELETE 請使用正確授權的帳號，而非教師憑證。
* 無效的請求資料可能無法通過實體驗證。在修補課程之前，請先取得目前的課程，並且只傳送您打算變更的屬性。
* 這些操作由 API Platform 公開；請查閱已安裝實例的 OpenAPI 文件，以了解其確切的回應結構描述與可接受的欄位格式。
* 請在可拋棄的課程上測試課程刪除，不要在包含正式學習者紀錄的課程上測試。

關於介面中的課程管理，請參閱 [管理課程](../../admin-guide/courses/managing-courses.md)。關於會期註冊整合，請參閱 [會期學員註冊](session-students.md)。

**實作：** `src/CoreBundle/Entity/Course.php`（`Patch` 與 `Delete` 操作），以及 `src/CoreBundle/State/CourseDeleteProcessor.php`。於 Chamilo LMS 提交 `8cc9d4b33d` 中新增。