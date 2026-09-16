# 詞彙表

Chamilo 2.0 管理中使用的關鍵術語。

## 平台概念

| 術語 | 定義 |
|------|------------|
| **存取網址 (Access URL)** | 在多網址設置中，每個存取網址是一個獨立的虛擬入口，共享相同的 Chamilo 安裝和資料庫。每個網址可以擁有自己的品牌、用戶、課程和設置。 |
| **課程 (Course)** | Chamilo 中的基本內容容器。課程包含學習材料、練習、論壇和其他工具。課程可以獨立存在，也可以分配到會期中。 |
| **會期 (Session)** | 一個或多個課程的時間限定實例。會期允許相同的課程內容交付給不同的學習者群體，並具有獨立的追蹤和獨立的教練。 |
| **學習路徑 (Learning Path)** | 一個結構化的內容項目序列（文件、練習、連結、SCORM 模組），以定義的順序引導學習者完成材料。 |
| **成績簿 (Gradebook)** | 一個匯總工具，將練習、作業和其他活動的成績組合為課程的加權最終成績。 |
| **技能 (Skill)** | 一種能力或徽章，可在學習者完成特定課程、練習或達到成績簿門檻時授予。 |
| **額外欄位 (Extra Field)** | 由管理員添加的自定義數據欄位，用於用戶、課程或會期，以捕捉組織特定的元數據。 |
| **插件 (Plugin)** | 一種擴展功能，不修改核心代碼即可為 Chamilo 增加功能。插件可以添加頁面、工具或整合。 |
| **目錄 (Catalog)** | 一個可瀏覽的可用課程列表，用戶可以在此查看描述並自行註冊。 |

## 用戶角色

| 術語 | 定義 |
|------|------------|
| **學習者 (Learner/Student)** | 默認用戶角色。可以註冊課程並使用內容。 |
| **教師 (Teacher/Trainer)** | 可以創建和管理課程，添加內容並為學習者評分。 |
| **會期管理員 (Session Administrator)** | 可以創建和管理會期及註冊。 |
| **人力資源經理 (Human Resources Manager, HRM)** | 可以查看所分配用戶的追蹤和報告數據。 |
| **入口管理員 (Portal Administrator)** | 完全訪問所有平台管理功能。 |
| **全局管理員 (Global Administrator)** | 在多網址設置中，擁有跨所有存取網址訪問權限的入口管理員。 |
| **教練/導師 (Coach/Tutor)** | 會期級別的角色。會期教練負責監督會期中的所有課程；課程教練管理會期內的特定課程。長期來看，所有教練的稱呼應改為導師。 |

## 標準與協議

| 術語 | 定義 |
|------|------------|
| **SCORM** | 可共享內容對象參考模型。一種電子學習打包標準，允許課程導入和追蹤。Chamilo 支持 SCORM 1.2 和 2004。 |
| **xAPI (Tin Can API)** | 一種用於追蹤學習體驗的電子學習規範。比 SCORM 更廣泛，可以記錄 LMS 之外發生的活動。xAPI 語句存儲在學習記錄存儲 (Learning Record Store, LRS) 中。 |
| **LTI** | 學習工具互操作性。一種 IMS Global 標準，允許外部工具和內容嵌入到 LMS 中。Chamilo 作為消費者和服务提供者支持 LTI 1.1 和 1.3。 |
| **SCIM** | 跨域身份管理系統。一種用於在身份提供者和應用程序之間自動化用戶配置和取消配置的標準。 |
| **OAuth2** | 一種授權框架，允許第三方應用程序代表用戶訪問 Chamilo，而無需共享密碼。用於 API 訪問和單點登錄 (SSO) 整合。 |
| **LDAP** | 輕量級目錄訪問協議。一種用於訪問目錄服務（例如 Active Directory）的協議，以驗證用戶和同步帳戶數據。 |
| **CAS** | 中央認證服務。一種單點登錄協議，允許用戶一次認證即可訪問多個應用程序。 |
| **JWT** | JSON 網絡令牌。一種用於 API 認證和會期管理的緊湊、簽名的令牌格式。 |
| **SAML** | 安全斷言標記語言。一種基於 XML 的標準，用於在身份提供者和服務提供者之間交換認證數據。 |

---
## 技術術語

| 術語 | 定義 |
|------|------------|
| **Symfony** | Chamilo 2.0 所基於的 PHP 框架。Symfony 提供路由、依賴注入、ORM（Doctrine）、模板引擎（Twig）以及其他基礎設施。 |
| **Doctrine** | Chamilo 用於與資料庫互動的物件關聯映射（ORM）。Doctrine 將 PHP 物件映射到資料庫表格。 |
| **Twig** | Symfony 和 Chamilo 用於渲染 HTML 的模板引擎。 |
| **Flysystem** | 一種 PHP 檔案系統抽象層。Chamilo 使用 Flysystem 支援本地儲存、Amazon S3、Azure Blob 和 Google Cloud Storage 的互換使用。 |
| **Composer** | PHP 依賴管理工具。用於安裝和更新 Chamilo 的 PHP 函式庫。 |
| **Mailer DSN** | 電子郵件傳輸的資料來源名稱（Data Source Name）。一個連接字串，告訴 Symfony 如何發送電子郵件（例如透過 SMTP、Amazon SES 或 Mailjet）。 |
| **OPcache** | PHP 內建的操作碼快取。將 PHP 腳本編譯為位元碼並在記憶體中快取，大幅提升效能。 |
| **APCu** | 一種 PHP 擴展，提供使用者層級的記憶體快取。Symfony 使用它來快取元資料和設定。 |

## 縮寫

| 縮寫 | 全稱 |
|---------|-----------|
| **LMS** | 學習管理系統 (Learning Management System) |
| **LRS** | 學習記錄儲存庫 (Learning Record Store，用於 xAPI 陳述) |
| **SSO** | 單一登入 (Single Sign-On) |
| **CSV** | 逗號分隔值 (Comma-Separated Values，用於使用者/課程匯入) |
| **API** | 應用程式介面 (Application Programming Interface) |
| **REST** | 表徵狀態傳輸 (Representational State Transfer，API 架構風格) |
| **GDPR** | 一般資料保護規範 (General Data Protection Regulation，歐盟資料隱私法) |
| **HSTS** | HTTP 嚴格傳輸安全 (HTTP Strict Transport Security) |
| **CDN** | 內容傳遞網路 (Content Delivery Network) |
| **DNS** | 域名系統 (Domain Name System) |
| **SPF** | 發件人策略框架 (Sender Policy Framework，電子郵件認證) |
| **DKIM** | 域名金鑰識別郵件 (DomainKeys Identified Mail，電子郵件認證) |
| **DMARC** | 基於域名的訊息認證、報告與一致性 (Domain-based Message Authentication, Reporting, and Conformance) |