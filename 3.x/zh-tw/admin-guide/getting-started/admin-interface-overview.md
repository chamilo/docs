# 管理介面總覽

管理面板是您管理 Chamilo 平台的指揮中心。請在側邊欄點選 **Administration** <img src="../../.gitbook/assets/icons/mdi-cogs.svg" alt="管理" data-size="line"> 以進入。

## 管理儀表板

![管理儀表板，顯示使用者、課程、時段與設定等功能區塊](../../.gitbook/assets/admin-dashboard-overview.png)

管理儀表板依功能區塊組織。每個區塊彙整相關的管理工具：

### Users

* **User list** — 檢視、搜尋、編輯並管理平台上的所有使用者
* **Add a user** — 建立個別使用者帳號
* **Classes** — 管理使用者班級，以便批次報名時段

詳見 [Users](../users/README.md) 章節。

### Courses

* **Course list** — 檢視並管理平台上的所有課程
* **Create a course** — 建立新課程
* **Course categories** — 將課程整理為類別，供目錄使用

詳見 [Courses](../courses/README.md) 章節。

### Sessions

* **Session list** — 檢視並管理訓練時段
* **Create a session** — 設定含課程與報名的新時段
* **Session categories** — 將時段整理為類別
* **Careers and promotions** — 管理職涯路徑與晉升工作流程

詳見 [Sessions](../sessions/README.md) 章節。

### Platform

* **Configuration settings**、**Languages**、**Portal news**、**Global agenda**、**Pages**、**Extra fields**、**Mail templates**、**Contact form categories** 等 — 詳見 [Platform](../platform/README.md) 章節。「Configuration settings」連結是進入獨立 [Platform Settings](../platform-settings/README.md) 章節的入口。

### Analytics

* **Global statistics**、**Reports catalog**、**Learning analytics**、**Quarterly report**、**Teachers time report**、**Corporate report**、**Special exports**、**Tickets** — 平台統計與報表；詳見 [Analytics](../analytics/README.md) 章節

### Skills

* **Skills wheel**、**Skills import**、**Manage skills**、**Manage skills levels**、**Skills ranking**、**Skills and assessments** — 與成績冊結果連結的能力徽章；詳見 [Skills](../skills/README.md) 章節

### System

* **Clean temporary files**、**System status**、**System update**、**Colors**、**File info**、**Resources by type**、**List icons** — 伺服器維護、自我更新與品牌識別；詳見 [System](../system/README.md) 章節

### Rooms

* **Branches**、**Rooms**、**Room availability finder** — 實體據點與可預約的訓練教室；詳見 [Rooms](../rooms/README.md) 章節

### Security

* **Activities audit**、**Login attempts**、**Simple IDS**、**Password strength checker**、**File integrity** — 安全監控與稽核工具；詳見 [Security](../security/README.md) 章節

### Plugins

* 已安裝且宣告管理選單頁面的外掛捷徑，以及一般外掛管理 — 詳見 [Plugins](../plugins/README.md) 章節

### Health Check

* 即時通過／失敗檢查（郵件設定、管理 URL 指派、檔案權限）— 詳見 [Health Check](../health-check.md) 頁面

### Other Blocks

* **Chamilo.org**、**Version check**、**Professional support**、**News from Chamilo** — 從 Chamilo 專案擷取內容的連結與狀態面板；詳見 [Other Admin Blocks](../other-admin-blocks/README.md)

本指南各對應章節會詳細說明每一區塊。

OAuth2、LDAP、CAS 及其他外部驗證提供者等驗證方法，並非在管理儀表板中設定，而是在 `config/authentication.yaml` 中設定。