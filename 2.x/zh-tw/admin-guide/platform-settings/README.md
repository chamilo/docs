# 平台設定

Chamilo 擁有廣泛的設定系統，將設定組織成類別。下列完整類別清單反映管理面板中的 **Configuration settings** 頁面 — 以及原始碼中的底層 `SettingsCurrentFixtures.php`，這是變數名稱、標題和描述的真相來源。

從管理面板點擊 **Configuration settings** 來存取平台設定。

![顯示依功能區域組織的設定類別的平台設定頁面](/.gitbook/assets/admin-settings-categories.png)

## 所有類別

總共有 **39 個設定類別**，下列依字母順序列出。每個連結後的數字是該類別中的設定數量。

### 平台範圍

* **[Administrator Identity](admin-settings.md)** (12) — 平台管理員的身分和聯絡資訊。
* **[Platform](platform-settings.md)** (29) — 平台層級身分、時區、註冊政策、線上使用者、效能旗標。
* **[Display](display-settings.md)** (24) — 首頁版面配置、gravatar、選單、品牌行為。
* **[Editor](editor-settings.md)** (26) — 富文字編輯器 (TinyMCE) 工具列、外掛、AI 助手。
* **[Languages](language-settings.md)** (12) — 可用語言、預設語言、後備語言。
* **[Mail](mail-settings.md)** (18) — 寄出郵件版面配置、寄件者身分、簽名。
* **[Workflows](workflows-settings.md)** (23) — 跨領域工作流程切換（課程建立、註冊驗證…）。

### 驗證、安全與隱私

* **[Security](security-settings.md)** (31) — 登入保護、密碼政策、標頭、2FA、IDS。
* **[Registration](registration-settings.md)** (20) — 自行註冊政策及註冊後重新導向。
* **[Privacy](privacy-settings.md)** (6) — 同意、資料匯出、帳戶刪除請求。
* **[CAS](cas-settings.md)** (7) — 從 1.x 延續的舊版 CAS 設定。

### 課程與工作階段生命週期

* **[Course](course-settings.md)** (45) — 平台範圍適用於課程的預設值和政策。
* **[Sessions](session-settings.md)** (68) — 工作階段生命週期、導師存取時間窗、可见性。
* **[Course Catalog](catalog-settings.md)** (13) — 公開課程目錄的行為。
* **[Profile](profile-settings.md)** (29) — 使用者個人檔案中顯示的欄位。

### 課程工具

* **[Agenda](agenda-settings.md)** (11)
* **[Announcements](announcement-settings.md)** (9)
* **[Assignments (Work)](work-settings.md)** (12)
* **[Attendance](attendance-settings.md)** (4)
* **[Chat](chat-settings.md)** (5)
* **[Documents](document-settings.md)** (29)
* **[Dropbox](dropbox-settings.md)** (8)
* **[Exercises (Tests)](exercise-settings.md)** (63)
* **[Forums](forum-settings.md)** (9)
* **[Glossary](glossary-settings.md)** (3)
* **[Groups](group-settings.md)** (3)
* **[Learning Paths](lp-settings.md)** (51)
* **[Surveys](survey-settings.md)** (12)

### 評量與認證

* **[Gradebook (Assessments)](gradebook-settings.md)** (34) — 分數顯示、小數位、證書門檻。
* **[Certificates](certificate-settings.md)** (9) — 學習者獲得證書時應用的預設值。
* **[Skills](skill-settings.md)** (13) — 技能樹、頒發規則、個人檔案整合。
* **[Tracking](tracking-settings.md)** (10) — 記錄的內容、公開的報告。

### 通訊與社群

* **[Messaging](message-settings.md)** (7)
* **[Social Network](social-settings.md)** (7)

### AI

* **[AI Helpers](ai-helpers-settings.md)** (13) — 依任務類型（文字、影像、影片、導師、評分）的提供者。

### 營運與整合

* **[Cron Jobs](crons-settings.md)** (3)
* **[Search](search-settings.md)** (3) — Xapian 全文搜尋設定。
* **[Tickets](ticket-settings.md)** (7) — 求助台系統。
* **[Web Services](webservice-settings.md)** (7) — 舊版 SOAP/REST 端點。

## 設定運作方式

* 設定儲存在資料庫（`settings` 表格）中，並透過網頁介面管理
* 在多 URL 設定中，有些設定是 **URL-locked**（其值適用於整個平台，且無法依每個 URL 覆寫 — 請參閱 `settings` 表格中的 `access_url_locked` 和 `access_url_changeable` 欄位）；其他（大多數）設定可依存取 URL 覆寫
* 變更立即生效（無需重新啟動伺服器），雖然您的使用者工作階段可能會將某些設定保留在記憶體中。如果變更未立即反映，請登出並重新登入以清除工作階段。
* 有些設定具有相依性 — 變更一項可能影響其他項目的行為
* 每個頁面顯示的變數名稱（例如 `2fa_enable`）符合 `settings` 資料庫表格中的列（`variable` 欄位）以及適用時用於覆寫的鍵值（`config/settings_overrides.yaml`）。

更多資訊，請參閱我們的 wiki 中的 [Configurations](https://github.com/chamilo/chamilo-lms/wiki/Configurations)。
---

---
## 提示

* **記錄您的設定** — 保留非預設設定的記錄，以及您變更它們的原因
* **一次變更一項** — 在進行疑難排解時，一次修改一項設定，以便您能辨識其影響
* **在預備環境中測試** — 對於重大的設定變更，請先在預備伺服器上測試