# Symfony 架構

## Bundles

Chamilo 2.0 結構化為三個 Symfony bundles：

### CoreBundle (`src/CoreBundle/`)

最大的 bundle，處理所有平台範圍的關注點：

* **用戶與認證** — User entity、角色、JWT tokens、OAuth2 providers
* **資源系統** — ResourceNode 和 ResourceFile（統一的內容抽象）
* **平台設定** — `src/CoreBundle/Settings/` 中的設定架構，涵蓋每個可配置面向
* **管理** — 用戶、課程、工作坊和插件管理的管理控制器
* **AI 提供者** — OpenAI、Gemini、Mistral、DeepSeek、Grok 的工廠模式
* **檔案儲存** — 基於 Flysystem 的儲存適配器（local、S3、Azure、GCS）
* **安全性** — Voters、存取控制、角色階層
* **工具** — 透過工具系統註冊的課程工具定義

### CourseBundle (`src/CourseBundle/`)

所有特定於課程內容的功能：

* **內容實體** — 101 個實體，用於文件、測驗、學習路徑、論壇、詞彙表、調查、出席、部落格、作業等
* **課程複製** — 支援 Common Cartridge 1.3 和 Moodle 格式的匯入/匯出
* **課程設定** — 課程層級的設定架構

### LtiBundle (`src/LtiBundle/`)

LTI 1.3 標準實作：

* **平台與工具註冊** — 管理外部工具連線
* **啟動處理** — LTI 啟動流程控制器
* **成績回傳** — 從外部工具將成績回傳至 Chamilo

## Service Container

Chamilo 使用 Symfony 的依賴注入容器。服務配置於：

* `config/services.yaml` — 全球服務定義
* 每個 bundle 的 `DependencyInjection/` 目錄 — Bundle 特定服務

## Security Architecture

安全性系統配置於 `config/packages/security.yaml`：

* **密碼雜湊** — 支援 bcrypt（預設），並從舊版 SHA1 和 MD5 遷移
* **角色階層** — 18 個角色階層式組織（ROLE_GLOBAL_ADMIN > ROLE_ADMIN > ROLE_TEACHER > ROLE_STUDENT > ROLE_USER；額外角色包括 ROLE_HR、ROLE_INVITEE、ROLE_STUDENT_BOSS、ROLE_SESSION_MANAGER、ROLE_QUESTION_MANAGER）
* **情境敏感角色** — 課程層級角色（ROLE_CURRENT_COURSE_TEACHER、ROLE_CURRENT_COURSE_STUDENT）根據註冊每請求計算
* **防火牆** — API 使用 JWT 認證，網頁介面使用基於工作階段的認證
* **Voters** — 透過 Symfony voters 實現資源層級存取控制

## Legacy Code

某些功能仍使用 `public/main/` 中的舊版 PHP 程式碼：

* 測驗渲染與互動
* 學習路徑播放器
* 某些管理工具

這些功能正逐步遷移至 Symfony+Vue 架構。舊版頁面透過啟動 Symfony kernel 的相容層提供服務。