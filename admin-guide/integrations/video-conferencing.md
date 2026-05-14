# 視訊會議

Chamilo 整合視訊會議平台，以在課程中啟用即時會議。

## 支援的平台

### BigBlueButton

**BigBlueButton** (BBB) 是一款專為線上學習設計的開源網頁會議系統。它是 Chamilo 最常用的視訊會議解決方案。

#### 設定

1. 在獨立的伺服器上安裝 BigBlueButton（參閱 [BigBlueButton 文件](https://docs.bigbluebutton.org/)）
2. 在 BBB 伺服器上使用 `bbb-conf --salt` 取得整合詳細資訊
3. 在 Chamilo 平台設定中，**外掛**，安裝 Videoconference 外掛並輸入其設定以設定：
   * **BBB server URL** — 您的 BBB 伺服器位址
   * **BBB salt/secret** — 來自您的 BBB 伺服器的 API 金鑰
4. 儲存
5. **啟用** Videoconference 外掛
6. 某些特殊功能僅供管理員使用，因此請確保在 *admin_page* 區域中啟用它

#### Chamilo 中可用的功能

* 從課程內啟動/加入會議
* 每個課程自動建立會議室
* 會議錄影（如果啟用）
* 螢幕分享、電子白板、分組討論室
* 視訊旁邊的聊天功能

### Zoom

Chamilo 也可以整合 **Zoom** 進行視訊會議。

#### 設定

1. 在 Zoom Marketplace 中建立 Zoom 應用程式
2. 在 Chamilo 中設定 Zoom API 認證資訊
3. 啟用 Zoom 整合

#### 運作方式

當 Zoom 設定完成後，教師可以從其課程內建立並啟動 Zoom 會議。學習者透過 Chamilo 介面加入。

## BBB 與 Zoom 的選擇

| 功能 | BigBlueButton | Zoom |
|---------|--------------|------|
| 成本 | 免費（開源），但需要自己的伺服器 | 需要 Zoom 訂閱 |
| 託管 | 自託管 | 由 Zoom 雲端託管 |
| 整合深度 | 深度（專為 LMS 使用而建） | 標準 |
| 錄影 | 伺服器端，儲存在您的基礎設施上 | Zoom 雲端或本機 |
| 電子白板 | 內建 | 內建 |
| 分組討論室 | 是 | 是 |

## 提示

* **BBB 的獨立伺服器** — 為了獲得最佳效能，BigBlueButton 應運行在其專用伺服器上，而非與 Chamilo 相同的伺服器
* **上課前測試** — 總是在即時會議前測試視訊會議設定
* **檢查頻寬** — 確保您的伺服器和網路能夠處理預期的並行使用者數量