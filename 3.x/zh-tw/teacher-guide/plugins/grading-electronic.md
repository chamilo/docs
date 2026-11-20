# Grading Electronic

Grading Electronic <img src="../../.gitbook/assets/icons/mdi-export.svg" alt="Grading Electronic" data-size="line"> 會將通過您課程的學員及其成績簿分數，匯出為外部認證機構所匯入的檔案：固定格式的文字檔，或名冊試算表。

## 開啟匯出區塊

啟用後，課程 **Assessments**（成績簿）工具的工具列會出現 **Export** 圖示。點選該圖示，即可在同一頁面顯示 **Grading Electronic** 區塊；再次點選則將其隱藏。

此區塊包含三個欄位：

* **Preview** — 預設為勾選。勾選時不會儲存任何內容：此區塊僅顯示匯出內容的預覽
* **Date range** — 課程的開始與結束日期。開始日期會寫入文字檔的標頭列，結束日期則是每位學員的通過日期
* **Course ID** — 課程在認證機構的識別碼。系統會預先填入上次匯出所使用的值

## 預覽匯出內容

勾選 **Preview** 時，區塊只提供一個 **Preview** 按鈕。它會列出課程（或您目前所在場次）的每位學員及其分數，並標示 **PASS** 或 **SKIP** 狀態，同時顯示文字檔的內容。只有符合成績簿及格條件的學員會標示為 **PASS**；其餘學員不會納入匯出。

## 產生檔案

取消勾選 **Preview** 後，**Preview** 按鈕會被兩個按鈕取代：

* **Generate TXT** — 下載固定格式的文字檔：標頭列包含提供者 ID、課程 ID 與開始日期，其後每位通過的學員各佔一行
* **Generate XLSX** — 下載名冊試算表，每位通過的學員佔一列，欄位為 **FireTRAQ ID**、**First Name**、**Last Name**、**Score**、**Grade**、**Date Earned** 與 **Comment**

這兩個按鈕除了所產生的檔案不同之外，作用相同：它們會儲存 **Course ID** 供下次匯出使用；若成績簿會產生證書，也會為每位通過的學員產生證書。

## 試算表內容

* **FireTRAQ ID** — 學員在認證機構的 ID，讀取其個人資料欄位 `fcdice_or_acadis_student_id`
* **Score** — 成績簿分數，以整數百分比表示（0 至 100），不論成績簿的總權重為何
* **Grade** — 一律為 **Pass**，因為只匯出通過的學員。若您需要編輯檔案，儲存格仍提供 **Pass**、**Fail** 與 **Incomplete** 選項
* **Date Earned** — 日期範圍的結束日期
* **Comment** — 留空

## 提示

* **先檢查學員 ID** — 個人資料中沒有 ID 的學員仍會被匯出，但其 **FireTRAQ ID** 為空。請先使用預覽找出這些學員，再產生檔案
* **提供者 ID 與課程時數** 來自課程的額外欄位，由管理員在安裝此外掛時設定