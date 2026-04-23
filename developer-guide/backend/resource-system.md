# Resource System

The resource system is one of the most important architectural concepts in Chamilo 2.0. It provides a unified abstraction for all course content — documents, exercises, learning paths, forum posts, and more.

## Core Concept

Every piece of course content is represented by a **ResourceNode**. This gives all content types a common set of capabilities:

* **Visibility control** — Show/hide from learners
* **Access control** — Security voters check permissions via the ResourceNode
* **File storage** — Attached files are stored via ResourceFile
* **Tree structure** — ResourceNodes form a tree (parent-child relationships)
* **Audit trail** — Creator, creation date, modification tracking

## Key Entities

### ResourceNode (`src/CoreBundle/Entity/ResourceNode.php`)

The central entity. Every content entity has a one-to-one relationship with a ResourceNode.

Key fields:

| Field | Type | Description |
|-------|------|-------------|
| `id` | integer | Primary key |
| `uuid` | UUID v4 | Unique identifier for API use |
| `title` | string | Display title |
| `creator` | User | The user who created this resource |
| `resourceFile` | ResourceFile | The attached file (if any) |
| `resourceType` | ResourceType | The type of resource (document, quiz, etc.) |
| `parent` | ResourceNode | Parent in the resource tree |
| `children` | Collection | Child ResourceNodes |
| `resourceLinks` | Collection | Visibility and access links |

The tree uses Gedmo's **materialized path** strategy for efficient hierarchical queries.

### ResourceFile (`src/CoreBundle/Entity/ResourceFile.php`)

Stores the actual file data for a resource:

| Field | Type | Description |
|-------|------|-------------|
| `id` | integer | Primary key |
| `title` | string | Original filename |
| `mimeType` | string | MIME type |
| `originalName` | string | Original upload name |
| `size` | integer | File size in bytes |
| `crop` | string | Crop data (for images) |

File storage is handled by Flysystem, so files can be on local disk, S3, Azure, or GCS depending on configuration.

### ResourceLink

Controls visibility and access per context:

| Field | Type | Description |
|-------|------|-------------|
| `course` | Course | Which course the resource belongs to |
| `session` | Session | Which session (null for base course) |
| `group` | CGroup | Which group (null for whole course) |
| `visibility` | integer | Visible, invisible, or deleted |

This allows the same ResourceNode to have different visibility in different contexts (e.g., visible in one session but hidden in another).

## API Platform Integration

ResourceNode is exposed as an API Platform resource with security:

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

## How Content Entities Connect

Course content entities (CDocument, CQuiz, CLp, etc.) extend `AbstractResource` or implement `ResourceInterface`, which gives them a `resourceNode` relationship:

```php
// In CDocument entity:
#[ORM\OneToOne(targetEntity: ResourceNode::class)]
private ResourceNode $resourceNode;
```

When you create a CDocument, a ResourceNode is automatically created alongside it, providing unified resource management.

## Practical Implications

When working with course content:

1. **Creating content** — Create both the content entity AND its ResourceNode
2. **Checking permissions** — Use the ResourceNode's security voters
3. **Managing files** — Attach files through ResourceFile
4. **Controlling visibility** — Create/modify ResourceLinks
5. **Building trees** — Use the parent-child relationship on ResourceNode for folder structures (e.g., document folders)
