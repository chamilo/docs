# 存取 URL

存取 URL 允許單一 Chamilo 安裝提供多個獨立的入口網站。

## 使用案例

* **多租戶部署** — 在單一伺服器上為不同組織託管獨立的訓練入口網站
* **部門入口網站** — 為每個部門提供專屬品牌化的入口網站（例如，`hr.training.company.com`、`it.training.company.com`）
* **區域入口網站** — 為不同地區或語言提供獨立的入口網站

## 運作原理

每個存取 URL 都是通往相同 Chamilo 安裝的獨立入口點：

* 使用者可以指派到一個或多個存取 URL
* 課程和工作坊屬於特定的存取 URL
* 平台設定可以針對每個存取 URL 自訂
* 品牌化和主題可以針對每個 URL 不同
* 一個入口網站的使用者無法看到另一個入口網站的使用者或課程（除非明確共享）

## 設定

### 啟用多 URL

多 URL 必須在 Chamilo 設定中啟用（通常在環境設定中）。這通常在初始設定期間完成。

### 建立存取 URL

1. 從管理面板導航至 **Access URLs**
2. 按一下 **Add a URL**
3. 輸入 URL（例如，`https://portal2.yoursite.com`）
4. 設定此 URL 特定的選項
5. 儲存

### 指派使用者與課程

* **Users** — 將使用者指派至特定的存取 URL。一個使用者可以屬於多個 URL。
* **Courses** — 將課程指派至特定的存取 URL
* **Sessions** — 將工作坊指派至特定的存取 URL

### 每個 URL 的設定

每個存取 URL 可以擁有自己的：

* **Color theme** — 不同的視覺品牌化
* **Platform name and logo** — 自訂身份識別
* **Settings overrides** — 某些平台設定可以針對每個 URL 自訂

## 提示

* **Decide early** — 如果選擇多 URL 設定，您應該在 Chamilo 專案開始時進行，因為這需要讓第一個 URL 相對空置內容。之後啟用多 URL 更具挑戰性（需要手動資料庫變更）。
* **Plan URL structure** — 在建立存取 URL 之前決定 URL 結構，因為之後變更 URL 會影響所有現有連結與書籤
* **DNS configuration** — 每個存取 URL 必須解析至相同的 Chamilo 伺服器。相應地設定 DNS 記錄。
* **Global administrator** — 使用全域管理員角色來管理所有存取 URL