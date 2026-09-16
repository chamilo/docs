# 了解介面

Chamilo 2.0 擁有乾淨、現代化的介面，設計目的是讓導航簡單易用。本頁詳細解釋介面的每個部分。

## 上方工具列

![上方工具列帶註解元素，包括標誌、收件匣、支援票證和使用者頭像](/.gitbook/assets/top-bar-annotated.png)

上方工具列始終顯示在每個頁面的頂部。它包含：

* **平台標誌** — 隨時點擊即可返回首頁。
* **收件匣圖示** <img src="/.gitbook/assets/icons/mdi-inbox.svg" alt="Inbox" data-size="line"> — 顯示您的訊息。紅色徽章表示未讀訊息。點擊即可開啟收件匣。
* **支援票證圖示** <img src="/.gitbook/assets/icons/mdi-ticket-account.svg" alt="Support" data-size="line"> — 如果由管理員啟用，此功能可讓您存取支援票證系統。
* **您的頭像** — 位於右上角的圓形圖像。點擊即可開啟下拉選單，包含連結至您的個人檔案、帳戶設定和登出。

## 側邊欄

左側的側邊欄是您主要的導航區域。它可以摺疊以提供更多內容區域空間。點擊其右側邊緣的切換箭頭即可展開或摺疊。Chamilo 會記住您的偏好設定。

側邊欄包含以下連結（某些連結可能因平台設定而隱藏）：

![側邊欄導航面板處於展開狀態，顯示所有選單項目](/.gitbook/assets/sidebar-expanded.png)

| 選單項目 | 圖示 | 描述 |
|----------|------|------|
| **首頁** | <img src="/.gitbook/assets/icons/mdi-home.svg" alt="Home" data-size="line"> | 返回主要儀表板 |
| **我的課程** | <img src="/.gitbook/assets/icons/mdi-book-open-page-variant.svg" alt="Courses" data-size="line"> | 列出您已註冊的所有課程 |
| **我的工作坊** | <img src="/.gitbook/assets/icons/mdi-google-classroom.svg" alt="Sessions" data-size="line"> | 列出您的工作坊（目前、過去、即將開始） |
| **探索更多課程** | <img src="/.gitbook/assets/icons/mdi-bookmark-multiple.svg" alt="Catalogue" data-size="line"> | 瀏覽課程目錄以尋找新課程 |
| **行事曆** | <img src="/.gitbook/assets/icons/mdi-calendar-text.svg" alt="Agenda" data-size="line"> | 您的個人和課程行事曆 |
| **報告** | <img src="/.gitbook/assets/icons/mdi-chart-box.svg" alt="Reporting" data-size="line"> | 存取學習者追蹤和課程報告 |
| **社群網路** | <img src="/.gitbook/assets/icons/mdi-sitemap-outline.svg" alt="Social network" data-size="line"> | 與其他使用者連結、傳送訊息、加入群組 |
| **視訊會議** | <img src="/.gitbook/assets/icons/mdi-video.svg" alt="Video" data-size="line"> | 存取即時視訊工作坊（如果已設定） |
| **管理** | <img src="/.gitbook/assets/icons/mdi-cogs.svg" alt="Admin" data-size="line"> | 平台管理（僅管理員可見） |

在側邊欄的最底部，您會找到**登出**選項，以便在完成時快速登出。此選項也可在右上角頭像圖示的下拉選單中使用。
如果平台透過外部認證方式管理，這些登出選項可能無法使用。

## 主要內容區域

螢幕中央區域顯示目前頁面的內容。在頂部，您經常會看到**麵包屑路徑**，顯示您在平台中的目前位置（例如：首頁 > 搖滾音樂 > 文件）。使用麵包屑來導航返回上層頁面。

## 課程首頁

當您進入課程時，您會看到**課程首頁**。這部分在[建立您的課程](../creating-your-course/)一節中有詳細說明，但這裡提供快速概覽：

* **課程標題** — 醒目顯示在頂部
* **課程簡介** — 可編輯的選用富文字描述
* **工具格** — 表示課程工具（文件、練習、論壇等）的圖示格

身為教師，您會看到額外的控制項目：

* **學生檢視** <img src="/.gitbook/assets/icons/mdi-eye.svg" alt="Student view" data-size="line"> — 切換此項以查看學生會看到的課程樣貌
* **編輯簡介** <img src="/.gitbook/assets/icons/mdi-pencil.svg" alt="Edit" data-size="line"> — 編輯課程簡介文字
* **顯示全部 / 隱藏全部** — 快速變更所有工具對學生的可見性
* **排序** — 啟用拖放以重新排序首頁上的工具

---
## 圖示顏色

這仍是實驗性功能，在 Chamilo 2.0 中尚未完全實作，但我們正試圖在介面中的所有按鈕和動作圖示使用以下規則：

* **綠色** 用於建立動作。這包括新增、建立、匯入、評分、儲存和複製內容。
* **藍色** 用於檢視動作。這包括匯出、檢視、在清單或詳細檢視中預覽、搜尋和下載。
* **橘色** 用於編輯動作。這包括編輯、移動、設定、啟用/停用、隱藏和顯示。
* **紅色** 用於刪除/移除動作。這包括刪除、移除、取消訂閱。
* **灰色** 用於取消動作。只是將事物維持現狀。

## 響應式設計

Chamilo 2.0 會適應不同的螢幕尺寸。在行動裝置或狹窄的瀏覽器視窗中：

* 側邊列預設隱藏，並可透過點選選單圖示來開啟
* 課程卡片以單欄顯示，而非格狀排列
* 表格會變成水平可捲動

這表示您和您的學習者可以從手機、平板電腦或電腦存取平台，但您可能會感受到介面略有不同。