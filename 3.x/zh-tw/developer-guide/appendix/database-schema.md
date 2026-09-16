# 資料庫結構描述

Chamilo 3.0 將大量 Doctrine 實體對應至資料庫資料表。確切數量會隨版本變動——請參閱下方列出的實體目錄以取得目前狀態。

## 實體位置

| Bundle | Where | Prefix |
|--------|-------|--------|
| CoreBundle | `src/CoreBundle/Entity/` | 無（例如 `user`、`course`、`session`） |
| CourseBundle | `src/CourseBundle/Entity/` | `c_`（例如 `c_document`、`c_quiz`、`c_lp`） |
| LtiBundle | `src/LtiBundle/Entity/` | `lti_` |

## 主要資料表

### 使用者與驗證

| Table | Purpose |
|-------|---------|
| `user` | 使用者帳號 |
| `access_url` | 多網址入口網站 |
| `access_url_rel_user` | 使用者與入口網站的指派 |
| `usergroup` | 平台層級使用者群組 |

### 課程

| Table | Purpose |
|-------|---------|
| `course` | 課程 |
| `course_category` | 課程類別 |
| `course_rel_user` | 課程註冊 |

### 學期（Sessions）

| Table | Purpose |
|-------|---------|
| `session` | 培訓學期 |
| `session_rel_user` | 學期註冊 |
| `session_rel_course` | 學期中的課程 |
| `session_rel_course_rel_user` | 各學期－課程的使用者註冊 |

### 資源系統

| Table | Purpose |
|-------|---------|
| `resource_node` | 統一內容抽象 |
| `resource_file` | 檔案附件 |
| `resource_link` | 各情境的可見性／存取權 |
| `resource_type` | 資源類型登錄 |

### 課程內容（c_ 前綴）

| Table | Purpose |
|-------|---------|
| `c_document` | 文件 |
| `c_quiz` | 練習／測驗 |
| `c_quiz_question` | 測驗題目 |
| `c_quiz_answer` | 題目答案 |
| `c_lp` | 學習路徑 |
| `c_lp_item` | 學習路徑項目 |
| `c_forum_category` | 論壇類別 |
| `c_forum_forum` | 論壇 |
| `c_forum_thread` | 論壇討論串 |
| `c_forum_post` | 論壇文章 |
| `c_student_publication` | 作業／繳交 |
| `c_survey` | 問卷 |
| `c_glossary` | 詞彙表詞條 |
| `c_calendar_event` | 行事曆事件 |
| `c_attendance` | 出席表 |

### 追蹤

| Table | Purpose |
|-------|---------|
| `track_e_login` | 登入追蹤 |
| `track_e_online` | 線上使用者追蹤 |
| `track_e_default` | 一般活動追蹤 |
| `gradebook_category` | 成績簿類別 |
| `gradebook_result` | 成績 |

### 設定

| Table | Purpose |
|-------|---------|
| `settings` | 平台設定 |
| `settings_options` | 設定選項定義 |

## 遷移

資料庫結構變更透過 `src/CoreBundle/Migrations/` 中的 Doctrine Migrations 管理。執行遷移指令：

```bash
php bin/console doctrine:migrations:migrate
```