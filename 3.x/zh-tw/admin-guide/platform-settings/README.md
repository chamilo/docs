# 平台設定

Chamilo 具備一套涵蓋廣泛的設定系統，各項設定依類別組織。下列完整類別清單對應管理後台中的 **Configuration settings** 頁面，以及原始碼中作為變數名稱、標題與說明真實來源的 `SettingsCurrentFixtures.php`。

請從管理後台點選 **Configuration settings** 以存取平台設定。

![平台設定頁面，依功能領域組織的設定類別](../../.gitbook/assets/admin-settings-categories.png)

## 所有類別

總共有 **39 個設定類別**，依字母順序列於下方。各連結後方的數字為該類別中的設定數量。

### 全平台

* **[管理員身分](admin-settings.md)** (12) — 平台管理員的身分與聯絡資訊。
* **[平台](platform-settings.md)** (29) — 平台層級身分、時區、註冊政策、線上使用者、效能旗標。
* **[顯示](display-settings.md)** (24) — 首頁版面、gravatar、選單、品牌行為。
* **[編輯器](editor-settings.md)** (26) — 富文字編輯器（TinyMCE）工具列、外掛、AI 輔助。
* **[語言](language-settings.md)** (12) — 可用語言、預設語言、後援語言。
* **[郵件](mail-settings.md)** (18) — 外寄郵件版面、寄件者身分、簽名。
* **[工作流程](workflows-settings.md)** (23) — 跨領域工作流程開關（課程建立、註冊審核……）。

### 驗證、安全性與隱私

* **[安全性](security-settings.md)** (31) — 登入防護、密碼政策、標頭、2FA、IDS。
* **[註冊](registration-settings.md)** (20) — 自行註冊政策與註冊後重新導向。
* **[隱私](privacy-settings.md)** (6) — 同意、資料匯出、帳號刪除請求。
* **[CAS](cas-settings.md)** (7) — 自 1.x 沿用的舊版 CAS 設定。

### 課程與學期生命週期

* **[課程](course-settings.md)** (45) — 適用於全平台課程的預設值與政策。
* **[學期](session-settings.md)** (68) — 學期生命週期、導師存取時段、可見性。
* **[課程目錄](catalog-settings.md)** (13) — 公開課程目錄的行為。
* **[個人檔案](profile-settings.md)** (29) — 使用者個人檔案上顯示哪些欄位。

### 課程工具

* **[行事曆](agenda-settings.md)** (11)
* **[公告](announcement-settings.md)** (9)
* **[作業（Work）](work-settings.md)** (12)
* **[出席](attendance-settings.md)** (4)
* **[聊天](chat-settings.md)** (5)
* **[文件](document-settings.md)** (29)
* **[檔案投遞箱](dropbox-settings.md)** (8)
* **[練習（測驗）](exercise-settings.md)** (63)
* **[論壇](forum-settings.md)** (9)
* **[詞彙表](glossary-settings.md)** (3)
* **[小組](group-settings.md)** (3)
* **[學習路徑](lp-settings.md)** (51)
* **[問卷](survey-settings.md)** (12)

### 評量與認證

* **[成績簿（評量）](gradebook-settings.md)** (34) — 分數顯示、小數位數、證書門檻。
* **[證書](certificate-settings.md)** (9) — 學習者取得證書時套用的預設值。
* **[技能](skill-settings.md)** (13) — 技能樹、授予規則、個人檔案整合。
* **[追蹤](tracking-settings.md)** (10) — 記錄哪些資料、公開哪些報表。

### 溝通與社群

* **[訊息](message-settings.md)** (7)
* **[社群網路](social-settings.md)** (7)

### AI

* **[AI 輔助](ai-helpers-settings.md)** (13) — 依任務類型（文字、影像、影片、導師、評分）的供應商。

### 營運與整合

* **[Cron 工作](crons-settings.md)** (3)
* **[搜尋](search-settings.md)** (3) — Xapian 全文搜尋設定。
* **[工單](ticket-settings.md)** (7) — 服務台系統。
* **[Web 服務](webservice-settings.md)** (7) — 舊版 SOAP/REST 端點。

## 設定如何運作

* 設定儲存在資料庫（`settings` 資料表）中，並透過網頁介面管理
* 在多 URL 環境中，部分設定為 **URL 鎖定**（其值套用至整個平台，無法依 URL 覆寫——請參見 `settings` 資料表中的 `access_url_locked` 與 `access_url_changeable` 欄）；其餘（大多數）可依存取 URL 覆寫
* 變更立即生效（無需重新啟動伺服器），不過您的使用者工作階段可能仍將部分設定保留在記憶體中。若變更未立即反映，請登出再登入以清除工作階段。
* 部分設定具有相依性——變更一項可能影響其他設定的行為
* 各頁面上顯示的變數名稱（例如 `2fa_enable`）對應 `settings` 資料表中的列（`variable` 欄），以及適用時覆寫檔（`config/settings_overrides.yaml`）中使用的鍵。

更多資訊請參閱我們 wiki 上的 [Configurations](https://github.com/chamilo/chamilo-lms/wiki/Configurations)。

## 提示

* **記錄您的設定** — 保留非預設設定及其變更原因的紀錄
* **一次只變更一項** — 疑難排解時，一次只修改一項設定，以便識別其影響
* **在預備環境中測試** — 對於重大設定變更，請先在預備伺服器上測試