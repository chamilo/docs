# 詞彙表

本指南中使用的開發者專屬術語。

| Term | Definition |
|------|-----------|
| **API Platform** | 用於建置 REST 和 GraphQL API 的 PHP 框架，與 Symfony 整合。Chamilo 使用它從 Doctrine 實體自動產生 API 端點。 |
| **Bundle** | Symfony 的組織單位，類似外掛或模組。Chamilo 有三個：CoreBundle、CourseBundle、LtiBundle。 |
| **Composable** | Vue 3 用於提取和重用反應式邏輯的模式。儲存在 `assets/vue/composables/` 中。 |
| **Doctrine ORM** | Chamilo 使用的 PHP 物件關聯映射器。將 PHP 實體類別對應至資料庫表格。 |
| **Entity** | 使用 Doctrine 屬性註解的 PHP 類別，對應至資料庫表格。 |
| **Encore** | Symfony Webpack Encore — Webpack 的包裝器，簡化前端建置設定。 |
| **Flysystem** | PHP 檔案系統抽象程式庫。Chamilo 使用它支援本地、S3、Azure 和 GCS 儲存。 |
| **JWT** | JSON Web Token — REST API 的認證機制。 |
| **Pinia** | Vue 3 的推薦狀態管理程式庫。用於 Chamilo 的新 store；舊的 Vuex store 仍與之並存。 |
| **PrimeVue** | Chamilo 使用的 Vue 3 UI 元件程式庫。提供按鈕、表格、對話框等。 |
| **ResourceNode** | Chamilo 資源系統的核心實體。每個課程內容片段皆有一個 ResourceNode。 |
| **ResourceFile** | 表示附加至 ResourceNode 的檔案的實體。透過 Flysystem 儲存。 |
| **ResourceLink** | 控制每個課程/工作階段/群組脈絡中可見性和存取權的實體。 |
| **SCORM** | Sharable Content Object Reference Model。用於封裝內容的電子學習標準。 |
| **Settings Schema** | 定義平台設定類別的 PHP 類別（例如 SecuritySettingsSchema）。 |
| **Voter** | Symfony 安全性元件，用於決定使用者是否能對資源執行動作。 |
| **Webpack** | JavaScript 模組打包器，將 Vue 元件、SCSS 和 TypeScript 編譯成瀏覽器就緒的套件。 |