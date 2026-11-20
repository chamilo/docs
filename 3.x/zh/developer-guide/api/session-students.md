# 会话学员注册 API

集成可通过仅限管理员的端点列出会话中的学员、注册学员以及移除学员。这些操作使用 Chamilo 管理界面中的会话注册行为。它们与 `/api/course-sessions/actions/*` 相互独立，后者属于面向辅导教师的另一套工作流。

## 身份验证与访问权限

以下每一项操作都要求使用平台角色 `ROLE_ADMIN` 进行身份验证。仅担任会话管理员**并不能**获得访问权限。请使用 [身份验证](authentication.md) 中所述的身份验证方法。

在多 URL 安装中，所请求的会话必须属于当前访问 URL；否则端点将返回 `404`。

## 路由

| 方法 | 端点 | 用途 |
|--------|----------|---------|
| `GET` | `/api/sessions/{id}/students` | 列出已注册到此会话的学员用户 ID |
| `POST` | `/api/sessions/{id}/students/subscribe` | 添加指定学员，并保留现有学员 |
| `POST` | `/api/sessions/{id}/students/unsubscribe` | 仅移除指定学员 |

将 `{id}` 替换为数字形式的会话 ID。对于两个 POST 请求，请发送包含 `userIds` 数组的 JSON：

```http
POST /api/sessions/42/students/subscribe
Authorization: Bearer <admin-token>
Content-Type: application/json
```

```json
{ "userIds": [17, 23] }
```

成功注册后，响应具有如下结构；ID 取决于您的安装：

```json
{
  "success": true,
  "applied": [17],
  "alreadyThere": [23],
  "ignored": []
}
```

`applied` 包含新注册的学员；`alreadyThere` 包含已经注册的学员；`ignored` 列出不符合条件或不可用的 ID。注册时，Chamilo 还会将新增学员注册到该会话的课程中。它**不会**替换整个会话名册。

要查看成员资格：

```http
GET /api/sessions/42/students
Authorization: Bearer <admin-token>
```

```json
{ "userIds": [17, 23] }
```

要移除选定的学员：

```http
POST /api/sessions/42/students/unsubscribe
Authorization: Bearer <admin-token>
Content-Type: application/json
```

```json
{ "userIds": [17] }
```

取消注册的响应包含 `success`、`applied`（已移除的 ID）以及 `ignored`（未注册的 ID）。其他学员仍保留在会话中。

## 校验与限制

* `userIds` 必须是由数字 ID（整数或仅含数字的字符串）组成的数组。重复的 ID 会被去重；非正值会被忽略。
* 对于注册，符合条件的用户必须存在、未被软删除、不是匿名用户或人力资源经理，并且属于当前访问 URL。
* 缺失或格式错误的 JSON 或 `userIds` 将返回 `400 Bad Request`。
* 缺失或超出范围的会话将返回 `404 Not Found`；没有管理员权限的调用方无法使用这些路由。
* 学员注册路由**不是**针对 `Session` 实体的通用 CRUD 端点，也不接受将会话名册作为替换文档提交。

有关对应的管理界面，请参阅 [管理会话](../../admin-guide/sessions/managing-sessions.md)。有关在注册学员之前复制模型会话的说明，请参阅 [会话复制](session-duplication.md)。

**实现：** `src/CoreBundle/Controller/Api/SessionStudentsController.php`。于 Chamilo LMS 提交 `bdfb2dd661` 中添加。