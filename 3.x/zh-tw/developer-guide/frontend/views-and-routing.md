# 檢視與路由

Chamilo 擁有大量透過 Vue Router 連接的 Vue 檢視（頁面層級元件）。實際檔案位於 `assets/vue/views/`。

## 路由器架構

路由器定義於 `assets/vue/router/index.js`，使用 `createWebHistory` 以提供乾淨的 URL。

路由採模組化設計——依功能拆成多個路由檔，再匯入主路由器：

| 路由模組 | 頁面 |
|-------------|-------|
| `admin` | 管理後台頁面 |
| `sessionAdmin` | 課程期次管理頁面 |
| `course` | 課程清單、建立、首頁、目錄 |
| `account` | 使用者個人資料與設定 |
| `personalfile` | 個人檔案空間 |
| `message` | 訊息／收件匣 |
| `user` | 使用者管理頁面 |
| `usergroup` | 使用者群組（班級）頁面 |
| `userreluser` | 使用者關係（好友／追蹤）頁面 |
| `ccalendarevent` | 課程行事曆與議程 |
| `ctoolintro` | 課程工具介紹頁面 |
| `page` | 靜態 CMS 頁面 |
| `pageLayout` | 頁面版面包裝器 |
| `publicPage` | 公開可存取頁面 |
| `social` | 社群網路頁面 |
| `filemanager` | 檔案管理員（課程文件瀏覽器） |
| `skill` | 技能與能力頁面 |
| `accessurl` | 多 URL（入口網站）管理頁面 |
| `branch` | 分校／網路校區頁面 |
| `room` | 虛擬教室頁面 |
| `buycourses` | 課程購買頁面 |
| `documents` | 文件管理 |
| `assignments` | 作業流程 |
| `links` | 外部連結管理 |
| `glossary` | 詞彙表管理 |
| `attendance` | 出席追蹤 |
| `lp` | 學習路徑播放器與編輯器 |
| `dropbox` | 投遞箱／檔案交換 |
| `blog` | 部落格頁面 |
| `blogAdmin` | 部落格管理 |
| `coursemaintenance` | 課程備份與還原 |
| `catalogue` | 課程與期次目錄 |

## 主要路由

| 路徑 | 檢視 | 說明 |
|------|------|-------------|
| `/` | `AppIndex.vue`（或自訂） | 應用程式進入點 |
| `/home` | `pages/Home.vue` | 平台首頁 |
| `/login` | `pages/Login.vue` | 登入頁面 |
| `/courses` | `views/user/courses/List.vue` | 使用者已註冊課程 |
| `/sessions` | `views/user/sessions/SessionsCurrent.vue` | 目前期次 |
| `/sessions/past` | `views/user/sessions/SessionsPast.vue` | 過去期次 |
| `/sessions/upcoming` | `views/user/sessions/SessionsUpcoming.vue` | 即將到來的期次 |
| `/course/:id/home` | `views/course/CourseHome.vue` | 課程首頁 |
| `/account/home` | `views/account/Home.vue` | 使用者個人資料 |
| `/admin` | 管理檢視 | 管理後台 |
| `/faq` | `pages/Faq.vue` | 常見問題頁面 |

## 路由守衛

路由器使用導航守衛（以 `beforeEach` 與 `afterEach` 宣告）以：

* 透過 `useSecurityStore` 檢查驗證狀態，並將未驗證使用者重新導向至 `/login`
* 透過 `useCidReqStore` 驗證課程脈絡
* 在 SPA 導覽期間套用頁面類型 CSS 類別（取代完整頁面載入時 Twig 的 `PageHelper` 所做之事）
* 支援自訂 Vue 範本覆寫——當啟用自訂 Vue 範本時，`/` 的進入元件會替換為自訂的 `AppIndex.vue`（`var/vue_templates/pages/AppIndex.vue`）

## 檢視組織

檢視位於 `assets/vue/views/`，依功能組織：

```
views/
├── account/          # User profile and settings
├── admin/            # Admin pages
├── assignments/      # Assignment submission and grading
├── attendance/       # Attendance sheets
├── blog/             # Blog posts and comments
├── branch/           # Network campus management
├── buycourses/       # Course purchase flow
├── ccalendarevent/   # Course calendar
├── course/           # Course list, home, creation, catalog
├── coursecategory/   # Course category management
├── coursemaintenance/# Course backup/restore
├── ctoolintro/       # Tool introduction pages
├── documents/        # Document list, creation, media generation
├── dropbox/          # Dropbox / file exchange
├── filemanager/      # File browser
├── glossary/         # Glossary list and term management
├── links/            # External links
├── lp/               # Learning path player and editor
├── message/          # Inbox and messaging
├── page/             # CMS static pages
├── pageLayout/       # Page layout wrappers
├── personalfile/     # Personal file space
├── room/             # Virtual rooms
├── sessionadmin/     # Session administration
├── skill/            # Skills and competencies
├── social/           # Social network
├── terms/            # Terms of service
├── user/             # User management and course/session lists
├── usergroup/        # User groups (classes)
└── userreluser/      # User relationships (friends/follows)
```