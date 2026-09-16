# 资源系统

资源系统是 Chamilo 2.0 中最重要的架构概念之一。它为所有课程内容提供了统一的抽象——文档、练习、学习路径、论坛帖子等。

## 核心概念

每项课程内容都由一个 **ResourceNode** 表示。这为所有内容类型提供了一组共同的功能：

* **可见性控制** — 对学习者显示/隐藏
* **访问控制** — 通过 ResourceNode 的安全投票机制检查权限
* **文件存储** — 附加文件通过 ResourceFile 存储
* **树状结构** — ResourceNodes 形成树状结构（父子关系）
* **审计追踪** — 记录创建者、创建日期和修改情况

## 关键实体

### ResourceNode (`src/CoreBundle/Entity/ResourceNode.php`)

核心实体。每个内容实体与一个 ResourceNode 存在一对一的关系。

关键字段：

| 字段 | 类型 | 描述 |
|-------|------|-------------|
| `id` | integer | 主键 |
| `uuid` | UUID v4 | 用于 API 的唯一标识符 |
| `title` | string | 显示标题 |
| `creator` | User | 创建该资源的用户 |
| `resourceFile` | ResourceFile | 附加文件（如果有） |
| `resourceType` | ResourceType | 资源类型（文档、测验等） |
| `parent` | ResourceNode | 资源树中的父节点 |
| `children` | Collection | 子 ResourceNodes |
| `resourceLinks` | Collection | 可见性和访问链接 |

树状结构使用 Gedmo 的 **materialized path** 策略，以便高效地进行层级查询。

### ResourceFile (`src/CoreBundle/Entity/ResourceFile.php`)

存储资源的实际文件数据：

| 字段 | 类型 | 描述 |
|-------|------|-------------|
| `id` | integer | 主键 |
| `title` | string | 原始文件名 |
| `mimeType` | string | MIME 类型 |
| `originalName` | string | 原始上传名称 |
| `size` | integer | 文件大小（字节） |
| `crop` | string | 裁剪数据（用于图片） |

文件存储由 Flysystem 处理，因此文件可以存储在本地磁盘、S3、Azure 或 GCS 上，具体取决于配置。

### ResourceLink

控制每个上下文的可见性和访问权限。主要有 3 种上下文类型：

1. 课程
2. 会话
3. 组（在课程中）

因此，ResourceLink 实体反映了这 3 种上下文类型的组合，并为完整的上下文建立可见性：

| 字段 | 类型 | 描述 |
|-------|------|-------------|
| `course` | Course | 资源所属的课程 |
| `session` | Session | 所属会话（基础课程为 null） |
| `group` | CGroup | 所属组（整个课程为 null） |
| `visibility` | integer | 可见、不可见或已删除 |

这允许同一个 ResourceNode 在不同上下文中具有不同的可见性（例如，在一个会话中可见，但在另一个会话中隐藏）。

在使用界面时会自动设置，例如，决定一个资源是特定会话的资源，在给定课程的给定会话中对所有组可见，但在基础课程或其他会话中不可见。

默认情况下，在基础课程中可见的资源在该课程的所有会话中也可见，但课程导师可以决定对特定会话隐藏资源。在这种情况下，我们会检索该资源在该会话中的特定可见性，发现其可见性为 0，因此该项目不会显示给该会话中的学习者，而在其他会话中没有特定会话可见性时，资源将使用基础课程的可见性（资源将显示给学习者）。

## API Platform 集成

ResourceNode 作为 API Platform 资源暴露，并带有安全性：

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

课程内容实体（CDocument、CQuiz、CLp 等）继承 `AbstractResource` 或实现 `ResourceInterface`，从而具有 `resourceNode` 关系：

```php
// In CDocument entity:
#[ORM\OneToOne(targetEntity: ResourceNode::class)]
private ResourceNode $resourceNode;
```

当您创建 CDocument 时，会自动创建一个 ResourceNode，提供统一的资源管理。

## 实际应用

处理课程内容时：

1. **创建内容** — 同时创建内容实体及其 ResourceNode
2. **检查权限** — 使用 ResourceNode 的安全投票机制
3. **管理文件** — 通过 ResourceFile 附加文件
4. **控制可见性** — 创建/修改 ResourceLinks
5. **构建树状结构** — 使用 ResourceNode 上的父子关系构建文件夹结构（例如，文档文件夹）