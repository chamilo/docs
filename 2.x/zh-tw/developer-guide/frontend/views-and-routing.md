# 視圖與路由

Chamilo 擁有大量 Vue 視圖（頁面層級元件），透過 Vue Router 連接。實際檔案位於 `assets/vue/views/`。

## 路由架構

路由定義於 `assets/vue/router/index.js`，使用 `createWebHistory` 以產生乾淨的 URL。

路由採用模組化設計 — 依功能組織成各路由檔案，並匯入至主路由：

| 路由模組 | 頁面 |
|----------|------|
| `admin` | 管理面板頁面 |
| `sessionAdmin` | 課程工作階段管理頁面 |
| `course` | 課程清單、建立、首頁、目錄 |
| `account` | 使用者個人檔案與設定 |
| `personalfile` | 個人檔案空間 |
| `message` | 訊息 / 收件匣 |
| `user` | 使用者管理頁面 |
| `usergroup` | 使用者群組（班級）頁面 |
| `userreluser` | 使用者關係（朋友/追蹤）頁面 |
| `ccalendarevent` | 課程行事曆與議程 |
| `ctoolintro` | 課程工具介紹頁面 |
| `page` | 靜態 CMS 頁面 |
| `pageLayout` | 頁面佈局包裝器 |
| `publicPage` | 公開存取頁面 |
| `social` | 社群網路頁面 |
| `filemanager` | 檔案管理器（課程文件瀏覽器） |
| `skill` | 技能與能力頁面 |
| `accessurl` | 多 URL（入口網站）管理頁面 |
| `branch` | 分支 / 網路校園頁面 |
| `room` | 虛擬教室頁面 |
| `buycourses` | 課程購買頁面 |
| `documents` | 文件管理 |
| `assignments` | 作業工作流程 |
| `links` | 外部連結管理 |
| `glossary` | 詞彙管理 |
| `attendance` | 出席追蹤 |
| `lp` | 學習路徑播放器與編輯器 |
| `dropbox` | Dropbox / 檔案交換 |
| `blog` | 部落格頁面 |
| `blogAdmin` | 部落格管理 |
| `coursemaintenance` | 課程備份與還原 |
| `catalogue` | 課程與工作階段目錄 |

## 主要路由

| 路徑 | 視圖 | 描述 |
|------|------|------|
| `/` | `AppIndex.vue` (或自訂) | 應用程式入口點 |
| `/home` | `pages/Home.vue` | 平台首頁 |
| `/login` | `pages/Login.vue` | 登入頁面 |
| `/courses` | `views/user/courses/List.vue` | 使用者註冊課程 |
| `/sessions` | `views/user/sessions/SessionsCurrent.vue` | 目前工作階段 |
| `/sessions/past` | `views/user/sessions/SessionsPast.vue` | 過去工作階段 |
| `/sessions/upcoming` | `views/user/sessions/SessionsUpcoming.vue` | 即將開始工作階段 |
| `/course/:id/home` | `views/course/CourseHome.vue` | 課程首頁 |
| `/account/home` | `views/account/Home.vue` | 使用者個人檔案 |
| `/admin` | Admin views | 管理面板 |
| `/faq` | `pages/Faq.vue` | 常見問題頁面 |

## 路由守衛

路由使用導航守衛（以 `beforeEach` 和 `afterEach` 宣告）來：

* 透過 `useSecurityStore` 檢查認證狀態，並將未認證使用者重新導向至 `/login`
* 透過 `useCidReqStore` 驗證課程脈絡
* 在 SPA 導航期間套用頁面類型 CSS 類別（取代 Twig 的 `PageHelper` 在完整頁面載入時所做的工作）
* 支援自訂 Vue 範本覆寫 — 當啟用自訂 Vue 範本（`var/vue_templates/pages/AppIndex.vue`）時，入口元件 `/` 會替換為自訂的 `AppIndex.vue`

## 視圖組織

視圖位於 `assets/vue/views/`，依功能組織：

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