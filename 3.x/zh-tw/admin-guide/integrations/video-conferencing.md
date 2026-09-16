# 視訊會議

Chamilo 可與視訊會議平台整合，以便在課程中進行即時線上課程。

## 支援的平台

### BigBlueButton

**BigBlueButton**（BBB）是一套專為線上學習設計的開源網路會議系統，也是與 Chamilo 搭配使用最普遍的視訊會議方案。

#### 設定

1. 在獨立伺服器上安裝 BigBlueButton（請參閱 [BigBlueButton 文件](https://docs.bigbluebutton.org/)）
2. 在 BBB 伺服器上使用 bbb-conf --salt 取得整合所需資訊
3. 在 Chamilo 平台設定的 **Plugins** 中，安裝 Videoconference 外掛並填入設定：
   * **BBB server URL** — BBB 伺服器位址
   * **BBB salt/secret** — 來自 BBB 伺服器的 API 密鑰
4. 儲存
5. **啟用** Videoconference 外掛
6. 部分特殊功能僅供管理員使用，請務必在 *admin_page* 區域中啟用

#### Chamilo 中可用的功能

* 從課程內開始／加入會議
* 依課程自動建立會議室
* 會議錄製（若已啟用）
* 螢幕分享、白板、分組討論室
* 視訊旁的聊天功能

### Zoom

Chamilo 亦可與 **Zoom** 整合以進行視訊會議。

#### 設定

1. 在 Zoom Marketplace 建立 Zoom 應用程式
2. 在 Chamilo 中設定 Zoom API 憑證
3. 啟用 Zoom 整合

#### 運作方式

設定 Zoom 後，教師可從課程內建立並啟動 Zoom 會議。學習者透過 Chamilo 介面加入。

## 在 BBB 與 Zoom 之間選擇

| 功能 | BigBlueButton | Zoom |
|---------|--------------|------|
| 成本 | 免費（開源），但需自備伺服器 | 需 Zoom 訂閱 |
| 託管 | 自行託管 | 由 Zoom 雲端託管 |
| 整合深度 | 深度（專為 LMS 使用打造） | 標準 |
| 錄製 | 伺服器端，儲存於您的基礎設施 | Zoom 雲端或本機 |
| 白板 | 內建 | 內建 |
| 分組討論室 | 是 | 是 |

## 提示

* **為 BBB 使用獨立伺服器** — BigBlueButton 應在專用伺服器上執行以獲得最佳效能，請勿與 Chamilo 共用同一台伺服器
* **上課前先測試** — 進行即時課程前，務必先測試視訊會議設定
* **檢查頻寬** — 確認伺服器與網路能負荷預期的同時線上使用者數量