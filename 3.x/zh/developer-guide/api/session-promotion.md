# 会话届别（Promotion）

一个会话可以归属于某个**届别**（某一专业的同期学员群体，在**管理 > 专业与届别（Careers and promotions）**中管理）。集成方通过标准的 `PATCH /api/sessions/{id}` 操作进行设置，该操作取代了 1.11.x 版 `update_session` Web 服务中的 `promotion_id` 参数。

不要将届别与会话类别（`/api/session_categories`）混淆，后者是另一种分组方式。

## 访问权限

只有平台管理员（`ROLE_ADMIN`）可以读取届别并更改会话的届别。其他用户将收到 `403 Forbidden`。

## 查找届别

届别以只读方式公开。届别的创建和编辑仍在管理后台中进行。

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

`status` 为 `1` 表示届别处于活动状态，为 `0` 表示处于非活动状态。

## 设置会话的届别

```http
PATCH /api/sessions/42
Authorization: Bearer <token>
Content-Type: application/merge-patch+json
```

```json
{ "promotion": "/api/promotions/3" }
```

发送 `{ "promotion": null }` 可将会话与其届别解除关联。

届别必须以 IRI 形式提供。数字 id，或与任何届别都不匹配的 IRI，将被拒绝并返回 `400 Bad Request`。

## 读取会话的届别

`GET /api/sessions/{id}` 返回届别的 IRI；若会话没有届别，则省略该字段：

```json
{
  "@id": "/api/sessions/42",
  "title": "Accounting basics - October 2026",
  "promotion": "/api/promotions/3"
}
```

通过[会话复制](session-duplication.md)创建的会话会保留其模型会话的届别。