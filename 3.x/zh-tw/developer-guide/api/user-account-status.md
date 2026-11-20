# 使用者帳號狀態

使用者的 `active` 欄位即為帳號狀態。管理員可透過 `PATCH /api/users/{id}` 變更此欄位，以封鎖或解除封鎖帳號。此機制取代 1.11.x 版 `webservices/api/v2.php` 網路服務中的 `active` 欄位。

## 值

| `active` | 意義 |
|----------|------|
| `1` | 啟用：使用者可以登入 |
| `0` | 停用：帳號已被封鎖 |
| `-1` | 由平台自動停用 |
| `-2` | 已刪除（位於垃圾桶） |

API 僅能設定 `1` 或 `0`。刪除須透過 `DELETE /api/users/{id}`，還原已刪除的帳號則須透過管理介面的垃圾桶。

## 讀取狀態

`active` 會由 `GET /api/users/{id}` 以及 `GET /api/users?username=...` 回傳。

```http
GET /api/users/42
Authorization: Bearer <token>
Accept: application/json
```

```json
{ "id": 42, "username": "jdupont", "active": 1 }
```

## 變更狀態

```http
PATCH /api/users/42
Authorization: Bearer <token>
Content-Type: application/merge-patch+json
Accept: application/json

{ "active": 0 }
```

回應內容為更新後的使用者。傳送 `{ "active": 1 }` 即可解除封鎖帳號。`active` 可與使用者的其他欄位一併傳送。

## 存取權限

| 呼叫者 | 允許範圍 |
|--------|----------|
| `ROLE_ADMIN` | 其可編輯的任何使用者，但不包括自己的帳號 |
| 任何其他使用者 | 不允許，即使是自己的帳號 |

傳送目前的值絕不會被拒絕，因此將整個使用者物件回傳的用戶端不會遭到封鎖。

## 錯誤

| 狀態 | 時機 |
|------|------|
| `400` | 值不是 `0` 或 `1` |
| `401` | 未提供憑證或憑證無效 |
| `403` | 呼叫者不是管理員，或變更自己的狀態 |
| `404` | 使用者不存在 |