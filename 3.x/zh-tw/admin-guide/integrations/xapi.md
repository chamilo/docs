# xAPI

**xAPI**（Experience API，亦稱為 Tin Can API）是用於追蹤學習體驗的標準。Chamilo 既能產生也能接收 xAPI 陳述。

## xAPI 的功能

xAPI 以「主體對客體執行動詞」（Actor did Verb on Object）的格式，將學習活動追蹤為**陳述**（statements）。例如：

* 「Jane 完成了模組 1」
* 「John 在期末考獲得 85%」
* 「Maria 觀看了介紹影片」

這些陳述會儲存在**學習紀錄儲存庫（Learning Record Store, LRS）**中，提供學習活動的完整紀錄。

## 設定

1. 在平台設定中，設定 **LRS 端點**：
   * **LRS URL** — 您的 Learning Record Store 位址
   * **LRS authentication** — 用於將資料傳送至 LRS 的認證資訊
2. 為所需活動啟用 xAPI 追蹤

## Chamilo 透過 xAPI 追蹤的內容

Chamilo 可為下列項目產生 xAPI 陳述：

* 課程存取與完成
* 測驗嘗試與分數
* 學習路徑項目進度
* 學習歷程項目

其他工具（例如文件與論壇）目前不會由外掛以 xAPI 事件發出。

## 使用情境

* **跨平台追蹤** — 在單一 LRS 中追蹤多種工具與平台上的學習活動
* **進階分析** — 使用 LRS 分析工具產生超越 Chamilo 內建報表的洞察
* **合規報表** — 為法規要求產生訓練完成的稽核軌跡