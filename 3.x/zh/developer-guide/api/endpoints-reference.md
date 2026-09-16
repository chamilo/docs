# 端点参考

API Platform 会为带有 `#[ApiResource]` 注解的实体自动生成 REST 端点。Chamilo 对外暴露 100 余个资源。

## 标准操作

对于每个 API 资源，通常提供以下操作：

| Method | Path | Description |
|--------|------|-------------|
| `GET` | `/api/{resources}` | 列表（集合） |
| `POST` | `/api/{resources}` | 创建 |
| `GET` | `/api/{resources}/{id}` | 读取（单个条目） |
| `PUT` | `/api/{resources}/{id}` | 完整更新 |
| `PATCH` | `/api/{resources}/{id}` | 部分更新 |
| `DELETE` | `/api/{resources}/{id}` | 删除 |

并非每个资源都启用全部操作 — 会受到安全约束限制。

## 主要 API 资源

### 平台资源

| Resource | Path | Description |
|----------|------|-------------|
| Users | `/api/users` | 用户账户 |
| Courses | `/api/courses` | 课程 |
| Sessions | `/api/sessions` | 培训班次 |
| Resource Nodes | `/api/resource_nodes` | 统一内容节点 |
| Access URLs | `/api/access_urls` | 多 URL 门户 |
| Messages | `/api/messages` | 平台消息 |

### 课程内容资源

| Resource | Path | Description |
|----------|------|-------------|
| Documents | `/api/documents` | 课程文档 |
| Learning Paths | `/api/learning_paths` | 学习路径 |
| Glossaries | `/api/glossaries` | 术语表条目 |
| Links | `/api/links` | 外部链接 |
| Calendar Events | `/api/c_calendar_events` | 日程事件 |
| Student Publications | `/api/c_student_publications` | 作业 |
| Blogs | `/api/c_blogs` | 课程博客 |
| Groups | `/api/c_groups` | 课程小组 |

### 跟踪资源

| Resource | Path | Description |
|----------|------|-------------|
| Gradebook Categories | `/api/gradebook_categories` | 成绩册设置 |
| Gradebook Results | `/api/gradebook_results` | 成绩 |

## 筛选与分页

API Platform 支持：

* **分页**：`?page=2&itemsPerPage=30`
* **筛选**：`?title=Introduction`（取决于已配置的过滤器）
* **排序**：`?order[title]=asc`
* **搜索**：在已配置字段上进行全文搜索

## 内容协商

该 API 支持多种格式：

* `application/ld+json`（默认 — JSON-LD）
* `application/json`
* `text/html`（API 文档）

设置 `Accept` 请求头以选择响应格式。

## 安全

每个端点通过以下方式实施安全控制：

* JWT 身份验证（大多数端点必需）
* Symfony 安全投票器（资源级权限）
* 基于角色的访问控制（例如仅管理员可用的端点）