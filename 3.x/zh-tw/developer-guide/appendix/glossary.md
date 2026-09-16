# 詞彙表

本指南中使用的開發者導向術語。

| 術語 | 定義 |
|------|-----------|
| **API Platform** | 用於建置 REST 與 GraphQL API 的 PHP 框架，並與 Symfony 整合。Chamilo 使用它從 Doctrine 實體自動產生 API 端點。 |
| **Bundle** | Symfony 的組織單位，類似外掛或模組。Chamilo 有三個：CoreBundle、CourseBundle、LtiBundle。 |
| **Composable** | Vue 3 用於擷取並重用響應式邏輯的模式。存放於 `assets/vue/composables/`。 |
| **Doctrine ORM** | Chamilo 所使用的 PHP 物件關聯對應器。將 PHP 實體類別對應至資料庫資料表。 |
| **Entity** | 以 Doctrine 屬性標註、對應至資料庫資料表的 PHP 類別。 |
| **Encore** | Symfony Webpack Encore — 包覆 Webpack 的工具，簡化前端建置設定。 |
| **Flysystem** | PHP 檔案系統抽象函式庫。Chamilo 使用它以支援本機、S3、Azure 與 GCS 儲存。 |
| **JWT** | JSON Web Token — REST API 的驗證機制。 |
| **Pinia** | Vue 3 建議使用的狀態管理函式庫。Chamilo 的新 store 使用它；既有的 Vuex store 仍與其並存。 |
| **PrimeVue** | Chamilo 所使用的 Vue 3 UI 元件函式庫。提供按鈕、表格、對話框等。 |
| **ResourceNode** | Chamilo 資源系統中的核心實體。每一份課程內容都有一個 ResourceNode。 |
| **ResourceFile** | 代表附加於 ResourceNode 之檔案的實體。透過 Flysystem 儲存。 |
| **ResourceLink** | 控制各課程／場次／群組情境下可見性與存取權限的實體。 |
| **SCORM** | Sharable Content Object Reference Model。用於封裝內容的數位學習標準。 |
| **Settings Schema** | 定義一類平台設定的 PHP 類別（例如 SecuritySettingsSchema）。 |
| **Voter** | Symfony 安全性元件，用來決定使用者是否可對某資源執行某項操作。 |
| **Webpack** | JavaScript 模組打包器，將 Vue 元件、SCSS 與 TypeScript 編譯為瀏覽器可用的套件。 |