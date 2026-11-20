# 課程期次複製

`POST /api/sessions/{id}/duplicate` 會從既有的**範本課程期次**建立新的課程期次。此端點是 Chamilo 3 用以取代 1.11.x `webservices/api/v2.php` 網路服務中 `create_session_from_model` 動作的功能，供整合系統從範本課程期次開啟新的訓練場次。

## 存取權限

| 呼叫者 | 允許範圍 |
|--------|---------|
| `ROLE_ADMIN` | 任何課程期次 |
| `ROLE_SESSION_MANAGER` | 僅限其管理的課程期次（其為範本的課程期次管理員），除非已啟用**允許課程期次管理員檢視所有課程期次**設定 |
| 其他任何人 | `403 Forbidden` |

請使用 JWT 或外部 API 金鑰進行驗證，詳見[驗證](authentication.md)。

## 請求

```http
POST /api/sessions/42/duplicate
Authorization: Bearer <token>
Content-Type: application/json
```

```json
{
  "title": "Accounting basics - October 2026",
  "startDate": "2026-10-01T09:00:00+02:00",
  "endDate": "2026-12-15T18:00:00+01:00",
  "extraFields": { "my_session_field": "value" },
  "copySessionContent": false
}
```

| 欄位 | 必填 | 說明 |
|-------|----------|-------------|
| `title` | 是 | 新課程期次的標題。不得與其他課程期次重複（最多 150 個字元）。 |
| `startDate` | 是 | ISO 8601 日期時間。用作存取、顯示與輔導員存取的開始日期。 |
| `endDate` | 是 | ISO 8601 日期時間，不得早於 `startDate`。用作存取、顯示與輔導員存取的結束日期。 |
| `extraFields` | 否 | 以欄位變數為鍵的課程期次額外欄位值。這些值會覆寫從範本複製的值。每個變數都必須是既有的課程期次額外欄位。 |
| `copySessionContent` | 否 | 預設為 `false`。設為 `true` 時，會將每門課程的課程期次專屬內容（文件、學習路徑、測驗、行事曆事件、公告、成績簿……）複製到新課程期次。課程基礎內容一律共用，不會複製。此旗標與平台設定**啟用將課程期次專屬內容複製到另一課程期次**彼此獨立。 |

## 複製內容

| 從範本複製 | 不複製 |
|-----------------------|------------|
| 分類、可見性、時長、說明以及「顯示說明」 | 課程輔導員 |
| 課程期次額外欄位值 | 人力資源管理員（DRH） |
| 課程（順序相同） | 學員 |
| 總輔導員 | |
| 課程期次管理員（若範本沒有，則呼叫者成為課程期次管理員） | |
| 「傳送訂閱通知」選項 | |
| 推廣 | |
| 課程期次專屬課程內容，僅在 `copySessionContent` 為 `true` 時 | |

刻意不複製學員：每次開課都有自己的學習者。之後請以 `POST /api/course-sessions/actions/subscribe-users` 為其訂閱。

新課程期次會附加至目前的存取 URL。

## 回應

`201 Created`，並回傳新課程期次：

```json
{
  "id": 57,
  "title": "Accounting basics - October 2026",
  "nbrCourses": 3,
  "visibility": 1,
  "generalCoachesSubscriptions": [{ "user": "/api/users/7" }]
}
```

## 錯誤

| 狀態 | 發生時機 |
|--------|------|
| `401` | 沒有憑證或憑證無效 |
| `403` | 呼叫者無權管理該範本課程期次 |
| `404` | 範本課程期次不存在 |
| `422` | 缺少或無效的欄位、`endDate` 早於 `startDate`、標題已被使用，或未知的額外欄位變數 |

所有檢查都會在建立任何內容之前執行，因此被拒絕的請求不會留下不完整的課程期次。

## 實作

* 操作：`Session` 資源上的 `duplicate_session`（`src/CoreBundle/Entity/Session.php`）
* 輸入：`src/CoreBundle/Dto/SessionDuplicateInput.php`
* 處理器：`src/CoreBundle/State/Session/SessionDuplicateProcessor.php`，會呼叫 `SessionManager::copy()`（課程期次清單的**複製**動作亦使用此方法），然後套用所要求的標題、日期與額外欄位，以及範本的推廣、課程期次管理員、通知選項與課程順序。