# 資料庫架構

Chamilo 2.0 將大量 Doctrine 實體對應到資料庫表格。各版本之間的確切數量會有所變動 — 請閱讀下列列出的實體目錄以了解目前狀態。

## 實體位置

| Bundle | Where | Prefix |
|--------|-------|--------|
| CoreBundle | `src/CoreBundle/Entity/` | None (e.g., `user`, `course`, `session`) |
| CourseBundle | `src/CourseBundle/Entity/` | `c_` (e.g., `c_document`, `c_quiz`, `c_lp`) |
| LtiBundle | `src/LtiBundle/Entity/` | `lti_` |

## 關鍵表格

### 使用者與認證

| Table | Purpose |
|-------|---------|
| `user` | 使用者帳戶 |
| `access_url` | 多 URL 入口網站 |
| `access_url_rel_user` | 使用者-入口網站指派 |
| `usergroup` | 平台範圍使用者群組 |

### 課程

| Table | Purpose |
|-------|---------|
| `course` | 課程 |
| `course_category` | 課程分類 |
| `course_rel_user` | 課程註冊 |

### 課程階段

| Table | Purpose |
|-------|---------|
| `session` | 訓練課程階段 |
| `session_rel_user` | 課程階段註冊 |
| `session_rel_course` | 課程階段中的課程 |
| `session_rel_course_rel_user` | 每個課程階段-課程的使用者註冊 |

### 資源系統

| Table | Purpose |
|-------|---------|
| `resource_node` | 統一內容抽象 |
| `resource_file` | 檔案附件 |
| `resource_link` | 每個情境的可见性/存取權 |
| `resource_type` | 資源類型登錄表 |

### 課程內容 (c_ 前綴)

| Table | Purpose |
|-------|---------|
| `c_document` | 文件 |
| `c_quiz` | 練習/測驗 |
| `c_quiz_question` | 測驗題目 |
| `c_quiz_answer` | 題目答案 |
| `c_lp` | 學習路徑 |
| `c_lp_item` | 學習路徑項目 |
| `c_forum_category` | 論壇分類 |
| `c_forum_forum` | 論壇 |
| `c_forum_thread` | 論壇主題 |
| `c_forum_post` | 論壇貼文 |
| `c_student_publication` | 作業/提交 |
| `c_survey` | 調查 |
| `c_glossary` | 詞彙術語 |
| `c_calendar_event` | 日曆事件 |
| `c_attendance` | 出席表 |

### 追蹤

| Table | Purpose |
|-------|---------|
| `track_e_login` | 登入追蹤 |
| `track_e_online` | 線上使用者追蹤 |
| `track_e_default` | 一般活動追蹤 |
| `gradebook_category` | 成績冊分類 |
| `gradebook_result` | 成績 |

### 設定

| Table | Purpose |
|-------|---------|
| `settings` | 平台設定 |
| `settings_options` | 設定選項定義 |

## 遷移

資料庫架構變更透過位於 `src/CoreBundle/Migrations/` 的 Doctrine Migrations 進行管理。執行遷移使用：

```bash
php bin/console doctrine:migrations:migrate
```