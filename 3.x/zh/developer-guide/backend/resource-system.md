# 资源系统

资源系统是 Chamilo 3.0 中最重要的架构概念之一。它为所有课程内容——文档、练习、学习路径、论坛帖子等——提供统一抽象。

## 核心概念

每一项课程内容都由一个 **ResourceNode** 表示。这使所有内容类型具备一组共同能力：

* **可见性控制** — 对学习者显示/隐藏
* **访问控制** — 安全投票器通过 ResourceNode 检查权限
* **文件存储** — 附加文件通过 ResourceFile 存储
* **树形结构** — ResourceNode 构成树（父子关系）
* **审计追踪** — 创建者、创建日期、修改跟踪

## 关键实体

### ResourceNode (`src/CoreBundle/Entity/ResourceNode.php`)

中心实体。每个内容实体都与一个 ResourceNode 存在一对一关系。

关键字段：

| 字段 | 类型 | 说明 |
|-------|------|-------------|
| `id` | integer | 主键 |
| `uuid` | UUID v4 | 供 API 使用的唯一标识符 |
| `title` | string | 显示标题 |
| `creator` | User | 创建该资源的用户 |
| `resourceFile` | ResourceFile | 附加文件（如有） |
| `resourceType` | ResourceType | 资源类型（文档、测验等） |
| `parent` | ResourceNode | 资源树中的父节点 |
| `children` | Collection | 子 ResourceNode |
| `resourceLinks` | Collection | 可见性与访问链接 |

该树使用 Gedmo 的 **物化路径（materialized path）** 策略，以便高效进行层次查询。

### ResourceFile (`src/CoreBundle/Entity/ResourceFile.php`)

存储资源的实际文件数据：

| 字段 | 类型 | 说明 |
|-------|------|-------------|
| `id` | integer | 主键 |
| `title` | string | 原始文件名 |
| `mimeType` | string | MIME 类型 |
| `originalName` | string | 原始上传名称 |
| `size` | integer | 文件大小（字节） |
| `crop` | string | 裁剪数据（用于图像） |

文件存储由 Flysystem 处理，因此文件可位于本地磁盘、S3、Azure 或 GCS，取决于配置。

### ResourceLink

按上下文控制可见性与访问。主要有 3 种上下文类型：

1. Course
2. Session
3. Group（课程内）

因此 ResourceLink 实体反映这 3 种上下文类型的组合，并为该完整上下文建立可见性：

| 字段 | 类型 | 说明 |
|-------|------|-------------|
| `course` | Course | 资源所属课程 |
| `session` | Session | 所属会话（基础课程为 null） |
| `group` | CGroup | 所属小组（整门课程为 null） |
| `visibility` | integer | 可见、不可见或已删除 |

这使得同一 ResourceNode 可在不同上下文中具有不同可见性（例如在某一会话中可见，在另一会话中隐藏）。

在使用界面并做出决定时会自动设置，例如将某资源设为会话专用资源：在给定课程的给定会话中对所有小组可见，但在基础课程或另一会话中不可见。

默认情况下，在基础课程中可见的资源在该课程的所有会话中也可见，但课程辅导教师可以决定在特定会话中隐藏某资源。此时，我们将检索该资源在该会话中的特定可见性，并发现其可见性为 0，因此该项目不会向该会话中的学习者显示；而在其他会话中若缺少会话级可见性，则资源将使用基础课程的可见性（资源会对学习者显示）。

## API Platform 集成

ResourceNode 作为带安全控制的 API Platform 资源对外暴露：

```php
#[ApiResource(
    operations: [
        new Get(security: "is_granted('VIEW', object)"),
        new Put(security: "is_granted('EDIT', object)"),
        new Delete(security: "is_granted('DELETE', object)"),
        new GetCollection(security: "is_granted('ROLE_USER')"),
    ]
)]
```

## 内容实体如何连接

课程内容实体（CDocument、CQuiz、CLp 等）扩展 `AbstractResource` 或实现 `ResourceInterface`，从而获得 `resourceNode` 关系：

```php
// In CDocument entity:
#[ORM\OneToOne(targetEntity: ResourceNode::class)]
private ResourceNode $resourceNode;
```

创建 CDocument 时，会同时自动创建 ResourceNode，从而提供统一的资源管理。

## 实践含义

处理课程内容时：

1. **创建内容** — 同时创建内容实体及其 ResourceNode
2. **检查权限** — 使用 ResourceNode 的安全投票器
3. **管理文件** — 通过 ResourceFile 附加文件
4. **控制可见性** — 创建/修改 ResourceLink
5. **构建树** — 使用 ResourceNode 上的父子关系实现文件夹结构（例如文档文件夹）