# Symfony 架構

## Bundles

Chamilo 3.0 由三個 Symfony bundle 組成：

### CoreBundle (`src/CoreBundle/`)

規模最大的 bundle，負責所有平台層級的關注點：

* **使用者與驗證** — User 實體、角色、JWT 權杖、OAuth2 提供者
* **資源系統** — ResourceNode 與 ResourceFile（統一的內容抽象）
* **平台設定** — `src/CoreBundle/Settings/` 中的設定 schema，涵蓋每一項可設定面向
* **管理功能** — 用於使用者、課程、session 與外掛管理的 Admin 控制器
* **AI 提供者** — 針對 OpenAI、Gemini、Mistral、DeepSeek、Grok 的 Factory 模式
* **檔案儲存** — 以 Flysystem 為基礎的儲存配接器（本機、S3、Azure、GCS）
* **安全性** — Voter、存取控制、角色階層
* **工具** — 透過工具系統註冊的課程工具定義

### CourseBundle (`src/CourseBundle/`)

所有與課程內容相關的部分：

* **內容實體** — 101 個實體，涵蓋文件、測驗、學習路徑、論壇、詞彙表、問卷、出缺席、部落格、作業等
* **課程複製** — 匯入／匯出，支援 Common Cartridge 1.3 與 Moodle 格式
* **課程設定** — 課程層級的設定 schema

### LtiBundle (`src/LtiBundle/`)

LTI 1.3 標準實作：

* **平台與工具註冊** — 管理外部工具連線
* **啟動處理** — LTI 啟動流程控制器
* **成績回傳** — 將外部工具的成績回傳至 Chamilo

## 服務容器

Chamilo 使用 Symfony 的相依性注入容器。服務設定位於：

* `config/services.yaml` — 全域服務定義
* 各 bundle 的 `DependencyInjection/` 目錄 — bundle 專屬服務

## 安全性架構

安全性系統設定於 `config/packages/security.yaml`：

* **密碼雜湊** — 支援 bcrypt（預設），並可從舊版 SHA1 與 MD5 遷移
* **角色階層** — 18 個角色依階層組織（ROLE_GLOBAL_ADMIN > ROLE_ADMIN > ROLE_TEACHER > ROLE_STUDENT > ROLE_USER；其他角色包括 ROLE_HR、ROLE_INVITEE、ROLE_STUDENT_BOSS、ROLE_SESSION_MANAGER、ROLE_QUESTION_MANAGER）
* **情境敏感角色** — 課程層級角色（ROLE_CURRENT_COURSE_TEACHER、ROLE_CURRENT_COURSE_STUDENT）依選課狀態於每次請求計算
* **防火牆** — API 使用 JWT 驗證，網頁介面使用 session
* **Voter** — 透過 Symfony voter 進行資源層級存取控制

## 舊版程式碼

部分功能仍使用 `public/main/` 中的舊版 PHP 程式碼：

* 測驗呈現與互動
* 學習路徑播放器
* 部分管理工具

這些功能正逐步遷移至 Symfony+Vue 架構。舊版頁面透過相容層提供服務，該層會啟動 Symfony kernel。