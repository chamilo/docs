# 課程期次晉升

課程期次可隸屬於一個**晉升**（職涯中的一屆學員，於**管理 > 職涯與晉升**中管理）。整合程式透過標準的 `PATCH /api/sessions/{id}` 操作設定此關聯，該操作取代 1.11.x `update_session` 網路服務中的 `promotion_id` 參數。

請勿將晉升與課程期次分類（`/api/session_categories`）混淆，後者是另一種分組方式。

## 存取

只有平台管理員（`ROLE_ADMIN`）可以讀取晉升，以及變更課程期次的晉升。其他使用者會收到 `403 Forbidden`。

## 尋找晉升

晉升以唯讀方式公開。其建立與編輯仍須透過管理介面進行。

```http
GET /api/promotions
GET /api/promotions/{id}
```

```json
{
  "@id": "/api/promotions/3",
  "id": 3,
  "title": "Accounting 2026",
  "status": 1
}
```

`status` 為 `1` 表示啟用中的晉升，為 `0` 表示未啟用的晉升。

## 設定課程期次的晉升

```http
PATCH /api/sessions/42
Authorization: Bearer <token>
Content-Type: application/merge-patch+json
```

```json
{ "promotion": "/api/promotions/3" }
```

傳送 `{ "promotion": null }` 可將課程期次與其晉升解除關聯。

晉升必須以 IRI 提供。數字 id，或無法對應任何晉升的 IRI，會以 `400 Bad Request` 拒絕。

## 讀取課程期次的晉升

`GET /api/sessions/{id}` 會回傳晉升的 IRI；若課程期次沒有晉升，則省略該欄位：

```json
{
  "@id": "/api/sessions/42",
  "title": "Accounting basics - October 2026",
  "promotion": "/api/promotions/3"
}
```

以 [課程期次複製](session-duplication.md) 建立的課程期次會保留其範本課程期次的晉升。