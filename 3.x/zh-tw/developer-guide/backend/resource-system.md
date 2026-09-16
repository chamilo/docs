# 資源系統

資源系統是 Chamilo 3.0 中最重要的架構概念之一。它為所有課程內容——文件、練習、學習路徑、論壇文章等——提供統一的抽象。

## 核心概念

每一項課程內容都以 **ResourceNode** 表示。這讓所有內容類型具備一組共通能力：

* **可見性控制** — 對學習者顯示／隱藏
* **存取控制** — 安全性 voter 透過 ResourceNode 檢查權限
* **檔案儲存** — 附加檔案透過 ResourceFile 儲存
* **樹狀結構** — ResourceNode 形成樹（親子關係）
* **稽核軌跡** — 建立者、建立日期、修改追蹤

## 關鍵實體

### ResourceNode (`src/CoreBundle/Entity/ResourceNode.php`)

核心實體。每個內容實體都與一個 ResourceNode 具有一對一關係。

關鍵欄位：

| Field | Type | Description |
|-------|------|-------------|
| `id` | integer | 主鍵 |
| `uuid` | UUID v4 | 供 API 使用的唯一識別碼 |
| `title` | string | 顯示標題 |
| `creator` | User | 建立此資源的使用者 |
| `resourceFile` | ResourceFile | 附加檔案（若有） |
| `resourceType` | ResourceType | 資源類型（文件、測驗等） |
| `parent` | ResourceNode | 資源樹中的父節點 |
| `children` | Collection | 子 ResourceNode |
| `resourceLinks` | Collection | 可見性與存取連結 |

該樹使用 Gedmo 的 **materialized path** 策略，以便有效率地進行階層查詢。

### ResourceFile (`src/CoreBundle/Entity/ResourceFile.php`)

儲存資源的實際檔案資料：

| Field | Type | Description |
|-------|------|-------------|
| `id` | integer | 主鍵 |
| `title` | string | 原始檔名 |
| `mimeType` | string | MIME 類型 |
| `originalName` | string | 原始上傳名稱 |
| `size` | integer | 檔案大小（位元組） |
| `crop` | string | 裁切資料（用於影像） |

檔案儲存由 Flysystem 處理，因此檔案可依設定位於本機磁碟、S3、Azure 或 GCS。

### ResourceLink

依情境控制可見性與存取。主要有 3 種情境類型：

1. Course
2. Session
3. Group（課程內）

因此 ResourceLink 實體反映這 3 種情境類型的組合，並為該完整情境建立可見性：

| Field | Type | Description |
|-------|------|-------------|
| `course` | Course | 資源所屬的課程 |
| `session` | Session | 所屬 session（基礎課程為 null） |
| `group` | CGroup | 所屬群組（整個課程為 null） |
| `visibility` | integer | 可見、不可見或已刪除 |

這讓同一個 ResourceNode 能在不同情境中有不同可見性（例如在某個 session 可見，在另一個 session 隱藏）。

使用介面時會自動設定，例如將某資源設為特定 session 的資源：在指定課程的指定 session 中對所有群組可見，但在基礎課程或另一個 session 中不可見。

預設情況下，在基礎課程中可見的資源，在該課程的所有 session 中也會可見，但課程導師可決定對特定 session 隱藏某資源。此時我們會取得該資源在此 session 的特定可見性，並發現其可見性為 0，因此該項目不會對此 session 的學習者顯示；而其他 session 若沒有 session 特定可見性，則資源會使用基礎課程的可見性（資源會對學習者顯示）。

## API Platform 整合

ResourceNode 以具安全性的 API Platform 資源公開：

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

## 內容實體如何連接

課程內容實體（CDocument、CQuiz、CLp 等）擴充 `AbstractResource` 或實作 `ResourceInterface`，因而具有 `resourceNode` 關係：

```php
// In CDocument entity:
#[ORM\OneToOne(targetEntity: ResourceNode::class)]
private ResourceNode $resourceNode;
```

建立 CDocument 時，會一併自動建立 ResourceNode，提供統一的資源管理。

## 實務意涵

處理課程內容時：

1. **建立內容** — 同時建立內容實體及其 ResourceNode
2. **檢查權限** — 使用 ResourceNode 的安全性 voter
3. **管理檔案** — 透過 ResourceFile 附加檔案
4. **控制可見性** — 建立／修改 ResourceLink
5. **建立樹狀結構** — 使用 ResourceNode 的親子關係建立資料夾結構（例如文件資料夾）