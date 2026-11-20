# 班级成员与选课 API

对于集成场景，Chamilo 提供若干端点，用于读取并同步与现有**班级**关联的成员、课程会话和课程。班级是类型为*普通班级*的 `Usergroup`；这些路由**不**适用于社交群组。

与课程会话学员 API 不同，三个班级 `PUT` 操作会**替换所指定的完整列表**。被省略的 ID 将从该关系中移除。更新前请先读取现有列表；除非同时提交所有应保留的成员，否则不要使用 `PUT` 仅添加一名成员。

## 授权

以下所有路由均要求已认证的平台角色 `ROLE_ADMIN`。目标班级必须在当前访问 URL 中可用。缺失或超出范围的班级返回 `404`；不是普通班级的用户组返回 `409 Conflict`。

控制器会检查所提交的用户、课程和课程会话 ID 是否存在。在多 URL 安装中，所提交的**课程和课程会话 ID** 会按当前门户进行筛选；但当前实现**不会**对**用户 ID** 应用相同的门户筛选。集成方不得将此端点视为用户级门户隔离的保证。有关此项尚未解决的安全考量，请参阅交付评审说明。

## 读取班级关系

```http
GET /api/usergroups/31/subscriptions
Authorization: Bearer <admin-token>
```

响应示例：

```json
{
  "userIds": [17, 23],
  "sessionIds": [42],
  "courseIds": [8, 11]
}
```

## 替换某一关系列表

| 方法 | 端点 | 请求属性 |
|--------|----------|------------------|
| `PUT` | `/api/usergroups/{id}/users` | `userIds` |
| `PUT` | `/api/usergroups/{id}/sessions` | `sessionIds` |
| `PUT` | `/api/usergroups/{id}/courses` | `courseIds` |

例如，设置完整的班级名册：

```http
PUT /api/usergroups/31/users
Authorization: Bearer <admin-token>
Content-Type: application/json
```

```json
{ "userIds": [17, 23, 29] }
```

响应示例：

```json
{
  "success": true,
  "applied": [17, 23, 29],
  "ignored": []
}
```

`applied` 列出已接受的 ID，不一定是新添加的 ID。`ignored` 标识无法应用的请求 ID（例如未知 ID，或当前门户之外的课程/课程会话）。非正值会被省略，重复项会被移除；格式错误的 JSON 或非数组请求属性将返回 `400`。

若要改为替换已关联的课程会话，请调用 `PUT /api/usergroups/31/sessions`，请求体为 `{ "sessionIds": [42, 57] }`。若要替换已关联的课程，请调用 `PUT /api/usergroups/31/courses`，请求体为 `{ "courseIds": [8, 11] }`。

**重要：** Chamilo 通过 `UsergroupHelper` 的同步方法应用这些更改。更改班级名册或其课程会话/课程绑定，也可能改变相关的选课关系。请勿直接操作用户组关系表，并在运行生产集成之前审阅替换列表的影响。

有关界面与概念，请参阅[班级](../../admin-guide/sessions/classes.md)。若要在*不*替换全部成员的情况下，向某一课程会话添加或移除特定学员，请使用[课程会话学员选课 API](session-students.md)。

**实现：** `src/CoreBundle/Controller/Api/UsergroupSubscriptionController.php`。于 Chamilo LMS 提交 `d8809925a4` 中添加。