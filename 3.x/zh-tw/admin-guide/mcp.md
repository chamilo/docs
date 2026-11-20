# MCP（Model Context Protocol）

Chamilo 3.0 提供 MCP 伺服器，讓 AI 助理與代理（Claude、ChatGPT 連接器，或任何相容 MCP 的用戶端）能以已驗證使用者的身分在平台內操作，並使用該使用者本身的權限——沒有獨立的服務帳號，也不會提升權限。

## MCP 為 Chamilo 帶來什麼

MCP（Model Context Protocol）是開放標準，讓 AI 用戶端能呼叫伺服器所公開的一組「工具」。Chamilo 的 MCP 伺服器可透過單一端點 `/mcp` 存取，並公開一組經過篩選、面向教師的課程管理工具，而非整個 API 介面。

## 可用功能

每次呼叫都以連線使用者的身分執行，因此工具只會看到並修改該使用者所管理的課程。目前的工具集：

| 工具 | 功能說明 |
|------|---------------|
| Current user | 傳回已驗證使用者的身分與角色 |
| Teacher courses | 列出使用者以教師身分管理的課程 |
| Course overview | 傳回基礎課程資訊與資源數量 |
| Create course | 依平台的課程建立規則建立新課程 |
| Create course assignment | 建立含說明與最高分數的草稿或已發布作業 |
| Create course test | 依主題說明或既有文件，建立 AI 輔助的選擇題測驗 |
| Get course test response status | 回報哪些學生已作答、進行中或尚未作答某測驗 |
| Get user course test score | 傳回學生在某測驗上最新與最佳的完成分數 |
| Create training satisfaction survey | 建立七題滿意度調查 |
| Create course learning path | 依 MCP 用戶端提供的頁面建立學習路徑 |
| List documents | 列出課程「文件」工具中的文件 |
| Read course document | 傳回可編輯文件的 HTML 內容、標題與中繼資料 |
| Edit course document | 取代既有可編輯文件的完整 HTML 內容 |
| Create course document | 在文件根資料夾中建立 AI 輔助的 HTML 文件 |
| Create course illustration | 為主題產生 AI 插圖並存成文件 |
| Illustrate document paragraph | 在文件某段落之前或之後插入既有圖片或影片 |
| Find recent course forum activity | 尋找與某主題相關、近期且可見的論壇貼文 |
| Review course quality | 分析課程的學習路徑、文件、測驗、作業與調查，並傳回改進建議 |

此清單由 Chamilo 核心團隊策展，無法在平台內由使用者自行擴充——教師無法新增自己的工具。

## 使用者如何連線

### 個人 MCP API 金鑰

每位使用者可在 **社群網路** > **MCP API 金鑰** 下產生自己的金鑰：

![MCP API 金鑰頁面，顯示未啟用的金鑰、「產生 API 金鑰」按鈕，以及含端點 URL 與 Authorization 標頭格式的遠端 MCP 連線區塊](/.gitbook/assets/admin-mcp-api-key.png)

* 點選 **產生 API 金鑰** 會建立金鑰並只顯示一次——之後 Chamilo 只儲存遮罩版本，因此必須立即複製並安全保存完整金鑰。
* 產生新金鑰會立即撤銷前一組金鑰。
* 頁面會顯示金鑰狀態（啟用／停用）、要在用戶端設定的 MCP 端點，以及建立與最後使用日期。
* **遠端 MCP 連線** 面板會明確說明 MCP 用戶端應填入的內容：端點 URL 以及 `Authorization: Bearer <your MCP API key>` 標頭。

如頁面所述，金鑰是以該使用者帳號驗證用戶端——不會授予該帳號原本沒有的任何權限。

### OAuth 2.1（遠端用戶端與連接器）

對於支援 OAuth 探索與動態用戶端註冊（而非手動貼上金鑰）的 MCP 用戶端，Chamilo 也作為 OAuth 2.1 授權伺服器：用戶端會探索 Chamilo 的端點、自行註冊，並將使用者重新導向至 `/oauth/authorize` 以核准存取。已核准的應用程式會出現在 **社群網路** > **已授權應用程式**，使用者可撤銷不再使用或不認識的應用程式。

## 安全性考量

* **無權限提升。** 每一次 MCP 工具呼叫以及每一個經 OAuth 授權的應用程式，皆以連線使用者本身的 Chamilo 權限執行——個人 API 金鑰或已授權應用程式永遠無法執行超過該使用者以手動方式所能完成的操作。
* **僅接受 Bearer、並有速率限制。** `/mcp` 僅接受 Bearer 憑證——個人 MCP API 金鑰、OAuth 存取權杖，或（在開發環境中）JWT。驗證嘗試會依 IP 位址進行速率限制，以減緩憑證猜測攻擊。
* **公開介面極為狹窄。** `/mcp` 唯一接受的未驗證流量是 `OPTIONS` 預檢請求；每一次實際呼叫皆需要 `ROLE_USER`。OAuth 探索、動態用戶端註冊與權杖端點依 OAuth 2.1 / MCP 規範刻意保持公開——這本身並不授予存取權，僅讓用戶端得知如何啟動授權流程。
* **刻意停用 `/mcp` 的 DNS 重新綁定防護。** 實作 MCP 的套件通常會將端點限制為 `localhost`，除非另行設定允許的主機名稱靜態清單——這對可透過多個主機名稱存取的多 URL Chamilo 入口並不適用。Chamilo 停用該檢查，因為在此情境下屬多餘：每一個 `/mcp` 請求無論其 `Host`/`Origin` 標頭為何，皆已要求 Bearer 憑證；而 DNS 重新綁定攻擊（仰賴伴隨偽造 Host 一併傳送的環境式、Cookie 風格驗證）無法偽造其尚未持有的 bearer 權杖。

## 設定 MCP 伺服器

與本指南中大多數整合不同，MCP 沒有管理面板設定頁面——它是在檔案層級、於 `config/packages/mcp.yaml` 中設定，且需要伺服器的 shell 存取權：

| 鍵 | 用途 |
|-----|---------|
| `app`、`version`、`description` | Chamilo 向連線的 MCP 用戶端回報的身分識別 |
| `client_transports.stdio` / `client_transports.http` | 啟用哪些傳輸方式；Chamilo 預設兩者皆啟用 |
| `http.path` | MCP HTTP 端點（預設為 `/mcp`） |
| `http.allowed_hosts` | DNS 重新綁定主機允許清單——在 Chamilo 上設為 `false`（見上方安全性考量） |
| `http.session.store`、`.directory`、`.ttl` | MCP 工作階段狀態的持久化位置與保存時間 |

若要完全停用 MCP 伺服器，請將 `client_transports.http: false`（若 CLI 傳輸亦應關閉，則同時設定 `stdio: false`）並清除快取：

```bash
php bin/console cache:clear --env=prod
php bin/console cache:warmup --env=prod
```

## 提示

* 將 MCP API 金鑰視為密碼——任何持有該金鑰的人皆可透過任何 MCP 用戶端以該使用者身分操作。
* 鼓勵使用者定期檢視 **已授權應用程式**，並撤銷任何無法辨識的項目。
* 關於支援上述內容產生工具（測驗建立、文件建立、插圖）的 AI 提供者，請參閱 [AI 設定](integrations/ai-configuration.md)。