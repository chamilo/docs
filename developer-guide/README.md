# 開發者指南

歡迎來到 Chamilo 2.0 開發者指南。本指南適用於希望了解 Chamilo 架構、透過外掛程式擴展平台、使用 API、客製化介面，或是貢獻專案的開發者。

## 架構一覽

Chamilo 2.0 建置於：

* **後端**：Symfony 6.4 (PHP 8.2+) 搭配 Doctrine ORM 和 API Platform 3.0
* **前端**：Vue 3 搭配 PrimeVue、Pinia 狀態管理，以及 Vue Router
* **建置系統**：Webpack 5 透過 Symfony Webpack Encore，搭配 Tailwind CSS
* **認證**：JWT tokens (lexik/jwt-authentication-bundle)
* **檔案儲存**：Flysystem (支援本地、AWS S3、Azure Blob、Google Cloud)

程式碼庫組織成三個 Symfony bundles：

| Bundle | Purpose |
|--------|---------|
| **CoreBundle** | 平台核心：使用者、設定、資源、管理、AI 提供者、安全性 |
| **CourseBundle** | 課程特定功能：文件、測驗、學習路徑、論壇等 |
| **LtiBundle** | LTI 1.3 整合，用於外部學習工具 |

## 本指南組織方式

1. **入門** — 技術堆疊、開發環境設定、專案結構
2. **後端** — Symfony 架構、實體、資源系統、控制器、設定
3. **API** — 透過 API Platform 的 REST API、JWT 認證、自訂動作
4. **前端** — Vue 元件、視圖、路由、狀態管理、建置系統
5. **主題化** — 色彩主題、CSS/Tailwind、Twig 範本
6. **外掛程式** — 外掛程式架構與開發
7. **貢獻** — 程式碼規範、git 工作流程、測試