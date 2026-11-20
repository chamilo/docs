# 会话复制

`POST /api/sessions/{id}/duplicate` 根据现有的**模型会话**创建新会话。它是 Chamilo 3 对 1.11.x `webservices/api/v2.php` Web 服务中 `create_session_from_model` 操作的替代实现，供从模板会话开启新一轮培训的集成使用。

## 访问权限

| 调用方 | 是否允许 |
|--------|---------|
| `ROLE_ADMIN` | 任意会话 |
| `ROLE_SESSION_MANAGER` | 仅限其管理的会话（其为模型会话的会话管理员），除非已启用**允许会话管理员查看所有会话**设置 |
| 其他任何人 | `403 Forbidden` |

请使用 JWT 或外部 API 密钥进行身份验证，详见 [身份验证](authentication.md)。

## 请求

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

| 字段 | 是否必填 | 说明 |
|-------|----------|-------------|
| `title` | 是 | 新会话的标题。不得与其他会话已使用的标题重复（最多 150 个字符）。 |
| `startDate` | 是 | ISO 8601 日期时间。用作访问、显示以及教练访问的开始日期。 |
| `endDate` | 是 | ISO 8601 日期时间，不得早于 `startDate`。用作访问、显示以及教练访问的结束日期。 |
| `extraFields` | 否 | 以字段变量为键的会话额外字段值。它们会覆盖从模型复制的值。每个变量都必须是已存在的会话额外字段。 |
| `copySessionContent` | 否 | 默认为 `false`。为 `true` 时，每门课程的会话专属内容（文档、学习路径、测验、日历事件、公告、成绩册……）会被复制到新会话中。课程基础内容始终共享，从不复制。此标志独立于**启用将会话专属内容复制到另一会话**平台设置。 |

## 复制内容

| 从模型复制 | 不复制 |
|-----------------------|------------|
| 类别、可见性、时长、描述以及“显示描述” | 课程教练 |
| 会话额外字段值 | 人力资源经理（DRH） |
| 课程，且顺序相同 | 学员 |
| 总教练 | |
| 会话管理员（若模型没有，则调用方成为会话管理员） | |
| “发送订阅通知”选项 | |
| 推广 | |
| 会话专属课程内容，仅当 `copySessionContent` 为 `true` 时 | |

学员被有意排除：每一轮培训都有自己的学习者。之后可使用 `POST /api/course-sessions/actions/subscribe-users` 为其订阅。

新会话会关联到当前访问 URL。

## 响应

`201 Created`，并返回新会话：

```json
{
  "id": 57,
  "title": "Accounting basics - October 2026",
  "nbrCourses": 3,
  "visibility": 1,
  "generalCoachesSubscriptions": [{ "user": "/api/users/7" }]
}
```

## 错误

| 状态 | 发生时机 |
|--------|------|
| `401` | 无凭据或凭据无效 |
| `403` | 调用方无权管理该模型会话 |
| `404` | 模型会话不存在 |
| `422` | 字段缺失或无效、`endDate` 早于 `startDate`、标题已被使用，或额外字段变量未知 |

所有检查均在创建任何内容之前执行，因此被拒绝的请求不会留下不完整的会话。

## 实现

* 操作：`Session` 资源上的 `duplicate_session`（`src/CoreBundle/Entity/Session.php`）
* 输入：`src/CoreBundle/Dto/SessionDuplicateInput.php`
* 处理器：`src/CoreBundle/State/Session/SessionDuplicateProcessor.php`，它调用 `SessionManager::copy()`（会话列表的**复制**操作也会使用），然后应用所请求的标题、日期和额外字段，以及模型的推广、会话管理员、通知选项和课程顺序。