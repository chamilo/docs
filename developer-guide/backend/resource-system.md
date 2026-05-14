# 資源系統

資源系統是 Chamilo 2.0 中最重要的架構概念之一。它為所有課程內容提供統一的抽象層——文件、測驗、學習路徑、論壇貼文等。

## 核心概念

每個課程內容都由一個 **ResourceNode** 表示。這為所有內容類型提供了一組共同的功能：

* **可見性控制** — 對學習者顯示/隱藏
* **存取控制** — 安全性投票透過 ResourceNode 檢查權限
* **檔案儲存** — 附加檔案透過 ResourceFile 儲存
* **樹狀結構** — ResourceNode 形成樹狀結構（父子關係）
* **審計追蹤** — 建立者、建立日期、修改追蹤

## 主要實體

### ResourceNode (`src/CoreBundle/Entity/ResourceNode.php`)

中央實體。每個內容實體與一個 ResourceNode 具有一對一關係。

主要欄位：

| Field | Type | Description |
|-------|------|-------------|
| `id` | integer | 主鍵 |
| `uuid` | UUID v4 | 用於 API 的唯一識別碼 |
| `title` | string | 顯示標題 |
| `creator` | User | 建立此資源的使用者 |
| `resourceFile` | ResourceFile | 附加檔案（如果有） |
| `resourceType` | ResourceType | 資源類型（文件、測驗等） |
| `parent` | ResourceNode | 資源樹中的父節點 |
| `children` | Collection | 子 ResourceNode |
| `resourceLinks` | Collection | 可見性和存取連結 |

該樹狀結構使用 Gedmo 的 **materialized path** 策略，以進行高效的階層式查詢。

### ResourceFile (`src/CoreBundle/Entity/ResourceFile.php`)

儲存資源的實際檔案資料：

| Field | Type | Description |
|-------|------|-------------|
| `id` | integer | 主鍵 |
| `title` | string | 原始檔案名稱 |
| `mimeType` | string | MIME 類型 |
| `originalName` | string | 原始上傳名稱 |
| `size` | integer | 檔案大小（位元組） |
| `crop` | string | 裁剪資料（用於圖片） |

檔案儲存由 Flysystem 處理，因此檔案可根據設定儲存在本地磁碟、S3、Azure 或 GCS。

### ResourceLink

針對每個情境控制可見性和存取權限。主要有 3 種情境類型：

1. 課程
2. 工作階段
3. 群組（在課程中）

因此，ResourceLink 實體反映這 3 種情境類型的組合，並為該完整情境建立可見性：

| Field | Type | Description |
|-------|------|-------------|
| `course` | Course | 資源所屬的課程 |
| `session` | Session | 工作階段（基底課程為 null） |
| `group` | CGroup | 群組（整個課程為 null） |
| `visibility` | integer | 可見、不可見或已刪除 |

這允許相同的 ResourceNode 在不同情境中具有不同的可見性（例如，在一個工作階段中可見，但在另一個中隱藏）。

使用介面時會自動設定，例如決定某資源為特定工作階段的資源，該資源將在給定課程的給定工作階段中對所有群組可見，但在基底課程或其他工作階段中不可見。

預設情況下，在基底課程中可見的資源也會在該課程的所有工作階段中可見，但課程導師可以決定將資源對特定工作階段隱藏。在這種情況下，我們會擷取此資源在此工作階段的特定可見性，並看到其可見性為 0，因此該項目不會出現在此工作階段的學習者面前，而其他工作階段缺乏特定可見性則會使資源使用基底課程的可見性（資源會顯示給學習者）。

## API Platform 整合

ResourceNode 作為 API Platform 資源公開，並具有安全性：

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

## 內容實體的連接方式

課程內容實體（CDocument、CQuiz、CLp 等）擴展 `AbstractResource` 或實作 `ResourceInterface`，這為其提供 `resourceNode` 關係：

```php
// In CDocument entity:
#[ORM\OneToOne(targetEntity: ResourceNode::class)]
private ResourceNode $resourceNode;
```

當您建立 CDocument 時，會自動一併建立 ResourceNode，提供統一的資源管理。

## 實際應用

處理課程內容時：

1. **建立內容** — 同時建立內容實體及其 ResourceNode
2. **檢查權限** — 使用 ResourceNode 的安全性投票
3. **管理檔案** — 透過 ResourceFile 附加檔案
4. **控制可見性** — 建立/修改 ResourceLinks
5. **建構樹狀結構** — 使用 ResourceNode 的父子關係建構資料夾結構（例如，文件資料夾）