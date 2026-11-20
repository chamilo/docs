# 用户账户状态

用户的 `active` 字段表示账户状态。管理员通过 `PATCH /api/users/{id}` 更改该字段来锁定或解锁账户。这取代了 1.11.x 中 `webservices/api/v2.php` Web 服务的 `active` 字段。

## 取值

| `active` | 含义 |
|----------|---------|
| `1` | 启用：用户可以登录 |
| `0` | 停用：账户已被锁定 |
| `-1` | 由平台自动停用 |
| `-2` | 已删除（位于回收站） |

API 只能将值设为 `1` 或 `0`。删除通过 `DELETE /api/users/{id}` 完成，恢复已删除账户则通过管理界面的回收站完成。

## 读取状态

`active` 由 `GET /api/users/{id}` 以及 `GET /api/users?username=...` 返回。

```http
GET /api/users/42
Authorization: Bearer <token>
Accept: application/json
```

```json
{ "id": 42, "username": "jdupont", "active": 1 }
```

## 更改状态

```http
PATCH /api/users/42
Authorization: Bearer <token>
Content-Type: application/merge-patch+json
Accept: application/json

{ "active": 0 }
```

响应为更新后的用户。发送 `{ "active": 1 }` 即可解锁账户。`active` 可以与用户的其他字段一并发送。

## 访问权限

| 调用方 | 是否允许 |
|--------|---------|
| `ROLE_ADMIN` | 可编辑其有权编辑的任何用户，但其自身账户除外 |
| 任何其他用户 | 不允许，即使针对其自身账户也不允许 |

发送当前值永远不会被拒绝，因此将整个用户对象回传的客户端不会被阻止。

## 错误

| 状态 | 发生时机 |
|--------|------|
| `400` | 值不是 `0` 或 `1` |
| `401` | 无凭据或凭据无效 |
| `403` | 调用方不是管理员，或正在更改其自身状态 |
| `404` | 用户不存在 |