# 開發者指南

歡迎使用 Chamilo 3.0 開發者指南。本指南面向希望了解 Chamilo 架構、以外掛擴充平台、使用 API、自訂介面，或為專案貢獻程式碼的開發者。

## 架構概覽

Chamilo 3.0 建置於：

* **後端**：Symfony 7.4（PHP 8.3–8.5），搭配 Doctrine ORM 與 API Platform 4
* **前端**：Vue 3，搭配 PrimeVue、Pinia 狀態管理與 Vue Router
* **建置系統**：透過 Symfony Webpack Encore 使用 Webpack 5，並搭配 Tailwind CSS
* **驗證**：JWT 權杖（lexik/jwt-authentication-bundle）
* **檔案儲存**：Flysystem（支援本機、AWS S3、Azure Blob、Google Cloud）

程式碼庫組織為三個 Symfony bundle：

| Bundle | 用途 |
|--------|---------|
| **CoreBundle** | 平台核心：使用者、設定、資源、管理、AI 提供者、安全性 |
| **CourseBundle** | 課程專屬功能：文件、練習、學習路徑、論壇等 |
| **LtiBundle** | 外部學習工具的 LTI 1.3 整合 |

## 本指南的組織方式

1. **入門** — 技術堆疊、開發環境設定、專案結構
2. **後端** — Symfony 架構、實體、資源系統、控制器、設定
3. **API** — 透過 API Platform 的 REST API、JWT 驗證、自訂動作
4. **前端** — Vue 元件、檢視、路由、狀態管理、建置系統
5. **主題** — 色彩主題、CSS/Tailwind、Twig 範本
6. **外掛** — 外掛架構與開發
7. **貢獻** — 程式碼慣例、git 工作流程、測試