# 詞彙表

Chamilo 3.0 管理中使用的關鍵術語。

## 平台概念

| 術語 | 定義 |
|------|------------|
| **Access URL** | 在多 URL 設定中，每個 Access URL 是一個獨立的虛擬入口，共用同一套 Chamilo 安裝與資料庫。每個 URL 可擁有各自的品牌識別、使用者、課程與設定。 |
| **Course** | Chamilo 中最基本的內容容器。課程可容納學習教材、測驗、論壇及其他工具。課程可獨立存在，或指派至 Session。 |
| **Session** | 一個或多個課程的時限性實例。Session 可讓相同課程內容交付給不同學習者群組，並具備獨立追蹤與獨立導師。 |
| **Learning path** | 內容項目（文件、測驗、連結、SCORM 模組）的結構化序列，依既定順序引導學習者研讀教材。 |
| **Gradebook** | 彙整工具，將測驗、作業及其他活動的分數合併為課程的加權最終成績。 |
| **Skill** | 能力或徽章，可在學習者完成特定課程、測驗或達到 Gradebook 門檻時授予。 |
| **Extra field** | 由管理員為使用者、課程或 Session 新增的自訂資料欄位，用以擷取機構專屬中繼資料。 |
| **Plugin** | 在不修改核心程式碼的情況下為 Chamilo 增加功能的擴充套件。Plugin 可新增頁面、工具或整合。 |
| **Catalog** | 可瀏覽的可用課程清單，使用者可檢視說明並自行註冊。 |

## 使用者角色

| 術語 | 定義 |
|------|------------|
| **Learner (Student)** | 預設使用者角色。可註冊課程並使用內容。 |
| **Teacher (Trainer)** | 可建立與管理課程、新增內容，並為學習者評分。 |
| **Session administrator** | 可建立與管理 Session 及註冊。 |
| **Human Resources Manager (HRM)** | 可檢視所指派使用者的追蹤與報表資料。 |
| **Portal administrator** | 擁有平台所有管理功能的完整存取權限。 |
| **Global administrator** | 在多 URL 設定中，可跨所有 Access URL 存取的 Portal administrator。 |
| **Tutor** | Session 層級角色。Session tutor 監督 Session 中的所有課程；course tutor 管理 Session 內的特定課程。在 Chamilo 3.0 之前的版本中稱為「coach」。 |

## 標準與協定

| 術語 | 定義 |
|------|------------|
| **SCORM** | Sharable Content Object Reference Model。一種電子學習封裝標準，可匯入課程並進行追蹤。Chamilo 支援 SCORM 1.2 與 2004。 |
| **xAPI (Tin Can API)** | 用於追蹤學習經驗的電子學習規範。範圍比 SCORM 更廣，可記錄發生於 LMS 之外的活動。xAPI 陳述會儲存在 Learning Record Store (LRS) 中。 |
| **LTI** | Learning Tools Interoperability。IMS Global 標準，可將外部工具與內容嵌入 LMS。Chamilo 支援 LTI 1.1 與 1.3，可同時作為消費者與提供者。 |
| **SCIM** | System for Cross-domain Identity Management。用於在身分提供者與應用程式之間自動化使用者佈建與解除佈建的標準。 |
| **OAuth2** | 授權框架，允許第三方應用程式代表使用者存取 Chamilo，而無須分享密碼。用於 API 存取與 SSO 整合。 |
| **LDAP** | Lightweight Directory Access Protocol。用於存取目錄服務（例如 Active Directory）以驗證使用者並同步帳號資料的協定。 |
| **CAS** | Central Authentication Service。單一登入協定，讓使用者驗證一次即可存取多個應用程式。 |
| **JWT** | JSON Web Token。精簡且經簽署的權杖格式，用於 API 驗證與工作階段管理。 |
| **SAML** | Security Assertion Markup Language。以 XML 為基礎的標準，用於在身分提供者與服務提供者之間交換驗證資料。 |

## 技術術語

| 術語 | 定義 |
|------|------------|
| **Symfony** | Chamilo 3.0 所採用的 PHP 框架。Symfony 提供路由、相依注入、ORM（Doctrine）、樣板引擎（Twig）及其他基礎建設。 |
| **Doctrine** | Chamilo 用來與資料庫互動的物件關聯對應器（ORM）。Doctrine 將 PHP 物件對應至資料庫資料表。 |
| **Twig** | Symfony 與 Chamilo 用來呈現 HTML 的樣板引擎。 |
| **Flysystem** | PHP 檔案系統抽象層。Chamilo 使用 Flysystem，以便在本機儲存、Amazon S3、Azure Blob 與 Google Cloud Storage 之間互換使用。 |
| **Composer** | PHP 相依套件管理工具。用於安裝與更新 Chamilo 的 PHP 函式庫。 |
| **Mailer DSN** | 電子郵件傳輸的資料來源名稱（Data Source Name）。此連線字串告知 Symfony 如何寄送電子郵件（例如透過 SMTP、Amazon SES 或 Mailjet）。 |
| **OPcache** | PHP 內建的 opcode 快取。將 PHP 指令碼編譯為位元組碼並快取於記憶體中，可顯著提升效能。 |
| **APCu** | 提供使用者層級記憶體內快取的 PHP 擴充套件。Symfony 用來快取中繼資料與組態。 |

## 縮寫

| 縮寫 | 全稱 |
|---------|-----------|
| **LMS** | 學習管理系統（Learning Management System） |
| **LRS** | 學習紀錄儲存庫（Learning Record Store，用於 xAPI 陳述） |
| **SSO** | 單一登入（Single Sign-On） |
| **CSV** | 逗號分隔值（Comma-Separated Values，用於使用者／課程匯入） |
| **API** | 應用程式介面（Application Programming Interface） |
| **REST** | 表現層狀態轉換（Representational State Transfer，API 架構風格） |
| **GDPR** | 一般資料保護規則（General Data Protection Regulation，歐盟資料隱私法規） |
| **HSTS** | HTTP 嚴格傳輸安全（HTTP Strict Transport Security） |
| **CDN** | 內容傳遞網路（Content Delivery Network） |
| **DNS** | 網域名稱系統（Domain Name System） |
| **SPF** | 寄件者政策架構（Sender Policy Framework，電子郵件驗證） |
| **DKIM** | DomainKeys Identified Mail（電子郵件驗證） |
| **DMARC** | 網域為基礎的訊息驗證、回報與一致性（Domain-based Message Authentication, Reporting, and Conformance） |