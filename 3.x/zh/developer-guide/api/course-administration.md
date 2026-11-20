# 课程管理 API

Chamilo 3.1 允许管理员集成通过 `Course` API 资源更新课程元数据并删除课程。这些操作是为与外部管理系统（例如 ERP）同步而添加的。

## 权限

| 操作 | 方法与端点 | 所需角色 |
|-----------|---------------------|---------------|
| 列出课程 | `GET /api/courses` | 教师或平台管理员 |
| 查看课程 | `GET /api/courses/{id}` | 查看该课程的权限 |
| 创建课程 | `POST /api/courses` | 教师或平台管理员 |
| 更新课程 | `PATCH /api/courses/{id}` | **平台管理员（`ROLE_ADMIN`）** |
| 删除课程 | `DELETE /api/courses/{id}` | **平台管理员（`ROLE_ADMIN`）** |

此资源未将 `PUT` 配置为一项操作。教师应继续通过课程设置界面编辑自己的课程；新增的 API 写入操作仅限管理员使用。

请使用具备必要权限的已认证账户或集成凭据。参见 [API 身份验证](authentication.md)。

## 更新课程元数据

发送 API Platform JSON Merge Patch 请求，仅更改请求体中提供的属性：

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

该请求更新现有课程，而不是创建新课程。API 接受由 `course:write` 序列化组定义的可写属性，并受实体验证约束。示例包括 `title`、`visibility`、`categories`、`departmentUrl`、`videoUrl`、`sticky` 和 `duration`。诸如 `categories` 之类的关系属性需要 API 所期望的资源表示；请查阅 OpenAPI 文档，而不要发送任意数据库 ID。

**重要：** 内部课程 `code` **不可**通过此 PATCH 操作写入。请勿尝试通过发送 `code` 或 `visualCode` 字段来重命名课程的内部代码。

## 删除课程

```http
DELETE /api/courses/42
Authorization: Bearer <admin-token>
```

这是一项**破坏性**管理操作。Chamilo 调用与课程维护相同的课程删除辅助程序，而不是直接删除 Doctrine 实体。它会按适用情况清理关联的注册、会话与班级链接、跟踪数据以及相关搜索索引。

在**多 URL** 安装中，删除可能仅将课程从当前访问 URL 分离，而不是在所有位置删除。课程文档不会使用维护界面中单独的*删除独占文档*选项进行删除。请勿将 API 删除理解为保证每份文档均已被物理移除。

如果活动依赖项阻止删除（例如资源序列），端点可能以 `409 Conflict` 响应。在发送 DELETE 请求之前，请检查课程依赖项和备份，尤其是在批量集成中。

## 错误与操作说明

* 不具备所需管理员角色的调用方将被拒绝；对 PATCH 或 DELETE 请使用正确授权的账户，而不是教师凭据。
* 无效的请求数据可能导致实体验证失败。在修补课程之前先获取当前课程，并且只发送您打算更改的属性。
* 这些操作由 API Platform 公开；请查阅已安装实例的 OpenAPI 文档，以了解其确切的响应模式和可接受的字段格式。
* 请在一次性课程上测试课程删除，而不是在包含生产学习者记录的课程上测试。

有关界面中的课程管理，请参见 [管理课程](../../admin-guide/courses/managing-courses.md)。有关会话注册集成，请参见 [会话学生注册](session-students.md)。

**实现：** `src/CoreBundle/Entity/Course.php`（`Patch` 与 `Delete` 操作），以及 `src/CoreBundle/State/CourseDeleteProcessor.php`。添加于 Chamilo LMS 提交 `8cc9d4b33d`。