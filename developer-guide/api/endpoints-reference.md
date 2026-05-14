# API 端點參考

API Platform 會自動為標註了 `#[ApiResource]` 的實體產生 REST 端點。Chamilo 暴露了 100 多個資源。

## 標準操作

對於每個 API 資源，通常提供以下操作：

| Method | Path | Description |
|--------|------|-------------|
| `GET` | `/api/{resources}` | 列表（集合） |
| `POST` | `/api/{resources}` | 建立 |
| `GET` | `/api/{resources}/{id}` | 讀取（單一項目） |
| `PUT` | `/api/{resources}/{id}` | 完整更新 |
| `PATCH` | `/api/{resources}/{id}` | 部分更新 |
| `DELETE` | `/api/{resources}/{id}` | 刪除 |

並非每個資源都啟用所有操作 — 會套用安全性限制。

## 主要 API 資源

### 平台資源

| Resource | Path | Description |
|----------|------|-------------|
| Users | `/api/users` | 使用者帳戶 |
| Courses | `/api/courses` | 課程 |
| Sessions | `/api/sessions` | 訓練課程 |
| Resource Nodes | `/api/resource_nodes` | 統一內容節點 |
| Access URLs | `/api/access_urls` | 多 URL 入口網站 |
| Messages | `/api/messages` | 平台訊息 |

### 課程內容資源

| Resource | Path | Description |
|----------|------|-------------|
| Documents | `/api/documents` | 課程文件 |
| Learning Paths | `/api/learning_paths` | 學習路徑 |
| Glossaries | `/api/glossaries` | 詞彙表條目 |
| Links | `/api/links` | 外部連結 |
| Calendar Events | `/api/c_calendar_events` | 行事曆事件 |
| Student Publications | `/api/c_student_publications` | 作業 |
| Blogs | `/api/c_blogs` | 課程部落格 |
| Groups | `/api/c_groups` | 課程群組 |

### 追蹤資源

| Resource | Path | Description |
|----------|------|-------------|
| Gradebook Categories | `/api/gradebook_categories` | 成績簿設定 |
| Gradebook Results | `/api/gradebook_results` | 成績 |

## 篩選與分頁

API Platform 支援：

* **分頁**：`?page=2&itemsPerPage=30`
* **篩選**：`?title=Introduction`（取決於設定的篩選器）
* **排序**：`?order[title]=asc`
* **搜尋**：在設定的欄位上進行全文搜尋

## 內容協商

API 支援多種格式：

* `application/ld+json`（預設 — JSON-LD）
* `application/json`
* `text/html`（API 文件）

設定 `Accept` 標頭以選擇回應格式。

## 安全性

每個端點透過以下方式強制執行安全性：

* JWT 驗證（大多數端點需要）
* Symfony 安全性投票者（資源層級權限）
* 基於角色的存取控制（例如，僅管理員端點）