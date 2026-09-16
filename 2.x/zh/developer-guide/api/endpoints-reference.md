# 端点参考

API Platform 会自动为标注了 `#[ApiResource]` 的实体生成 REST 端点。Chamilo 提供了超过 100 个资源。

## 标准操作

对于每个 API 资源，通常提供以下操作：

| 方法 | 路径 | 描述 |
|--------|------|-------------|
| `GET` | `/api/{resources}` | 列出（集合） |
| `POST` | `/api/{resources}` | 创建 |
| `GET` | `/api/{resources}/{id}` | 读取（单个项目） |
| `PUT` | `/api/{resources}/{id}` | 完整更新 |
| `PATCH` | `/api/{resources}/{id}` | 部分更新 |
| `DELETE` | `/api/{resources}/{id}` | 删除 |

并非所有资源都启用了所有操作——安全限制适用。

## 关键 API 资源

### 平台资源

| 资源 | 路径 | 描述 |
|----------|------|-------------|
| 用户 | `/api/users` | 用户账户 |
| 课程 | `/api/courses` | 课程 |
| 会话 | `/api/sessions` | 培训会话 |
| 资源节点 | `/api/resource_nodes` | 统一内容节点 |
| 访问 URL | `/api/access_urls` | 多 URL 门户 |
| 消息 | `/api/messages` | 平台消息 |

### 课程内容资源

| 资源 | 路径 | 描述 |
|----------|------|-------------|
| 文档 | `/api/documents` | 课程文档 |
| 学习路径 | `/api/learning_paths` | 学习路径 |
| 词汇表 | `/api/glossaries` | 词汇表术语 |
| 链接 | `/api/links` | 外部链接 |
| 日历事件 | `/api/c_calendar_events` | 日程事件 |
| 学生出版物 | `/api/c_student_publications` | 作业 |
| 博客 | `/api/c_blogs` | 课程博客 |
| 小组 | `/api/c_groups` | 课程小组 |

### 跟踪资源

| 资源 | 路径 | 描述 |
|----------|------|-------------|
| 成绩簿类别 | `/api/gradebook_categories` | 成绩簿设置 |
| 成绩簿结果 | `/api/gradebook_results` | 成绩 |

## 过滤和分页

API Platform 支持：

* **分页**：`?page=2&itemsPerPage=30`
* **过滤**：`?title=Introduction`（取决于配置的过滤器）
* **排序**：`?order[title]=asc`
* **搜索**：在配置的字段上进行全文搜索

## 内容协商

API 支持多种格式：

* `application/ld+json`（默认 — JSON-LD）
* `application/json`
* `text/html`（API 文档）

设置 `Accept` 头以选择响应格式。

## 安全性

每个端点通过以下方式强制执行安全性：

* JWT 认证（大多数端点都需要）
* Symfony 安全投票者（资源级权限）
* 基于角色的访问控制（例如，仅限管理员的端点）