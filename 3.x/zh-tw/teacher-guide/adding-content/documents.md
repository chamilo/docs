# 文件

文件工具是您課程的檔案存放庫。您可以上傳檔案、以 HTML 格式建立文件、將內容整理到資料夾中，並讓學習者存取他們所需的所有教材。

## 存取文件工具

從課程首頁開啟 **文件** <img src="/.gitbook/assets/icons/mdi-bookshelf.svg" alt="文件" data-size="line"> 工具。您將看到檔案瀏覽器，顯示課程文件庫的根資料夾。

![顯示資料夾與檔案及操作圖示的文件檔案瀏覽器](/.gitbook/assets/documents-file-browser.png)

## 上傳檔案

1. 點選 **上傳** <img src="/.gitbook/assets/icons/mdi-upload.svg" alt="上傳" data-size="line"> 按鈕
2. 從電腦選取一個或多個檔案（您可以將檔案拖放到上傳區域）
3. 檔案會上傳並出現在目前資料夾中

Chamilo 支援大多數常見檔案類型：PDF、辦公室文件（.docx、.odt）、簡報（.pptx、.odp）、試算表（.xlsx、.ods）、影像（PNG、JPG、SVG、GIF）、音訊檔、視訊檔（含 WEBM）、HTML 檔等。

部分格式可能會被入口網站管理員透過管理區安全性設定中的白名單／黑名單篩選而禁止。

為了讓學習者更容易閱讀，我們建議上傳瀏覽器無需額外工具即可檢視或開啟的檔案。這會讓您的課程更具可攜性，因而更便於行動裝置存取，也更利於有特殊需求的人士閱讀。

## 建立內容

除了上傳檔案，您也可以直接在 Chamilo 中建立內容：

### 網頁

1. 點選 **新增文件**
2. 使用富文字編輯器撰寫內容，可加入格式、影像、表格與連結
3. 為頁面輸入 **標題**
4. 儲存

富文字編輯器（TinyMCE）提供類似文書處理器的功能，包括：

* 文字格式（粗體、斜體、標題、清單）
* 表格
* 影像（上傳或連結既有影像）
* 嵌入視訊與音訊
* 連至其他資源的連結
* 進階使用者可用的 HTML 原始碼編輯

### AI 媒體產生

當平台啟用 AI 輔助功能時，您可以請 AI 產生 **影像** 或 **短片**，為正在編輯的文件中的段落作說明。選取一段文字，開啟 **產生 AI 媒體** 對話框，AI 會產出您可檢視並插入的媒體項目。該對話框會遵守課程層級權限，且僅在允許 AI 媒體產生的課程中顯示。

### 音訊錄製

若瀏覽器支援，您可直接在文件工具中錄製音訊——適合製作語音說明或語言學習內容。這需要 Chamilo 採用 HTTPS 設定，因為音訊錄製所使用的技術僅在連線安全時才會被瀏覽器允許。

## 以資料夾整理

使用資料夾讓文件庫保持井然有序：

1. 點選 **新增資料夾** <img src="/.gitbook/assets/icons/mdi-folder-plus.svg" alt="新增資料夾" data-size="line">
2. 輸入資料夾名稱
3. 儲存

您可以建立巢狀資料夾，以建構合乎邏輯的內容層級（例如 `Module 1 > Week 1 > Readings`）。

### 移動檔案

* 在清單中找到您的檔案
* 點選 **移動** <img src="/.gitbook/assets/icons/mdi-folder-move.svg" alt="移動" data-size="line">
* 選取目的資料夾
* 確認

## 管理文件

針對每個檔案或資料夾，您可以：

| 動作 | 圖示 | 說明 |
|--------|------|-------------|
| **編輯** | <img src="/.gitbook/assets/icons/mdi-pencil.svg" alt="編輯" data-size="line"> | 重新命名檔案或編輯其內容（適用於網頁） |
| **刪除** | <img src="/.gitbook/assets/icons/mdi-delete.svg" alt="刪除" data-size="line"> | 移除檔案或資料夾 |
| **下載** | <img src="/.gitbook/assets/icons/mdi-download-box.svg" alt="下載" data-size="line"> | 將檔案下載到您的電腦 |
| **可見性** | <img src="/.gitbook/assets/icons/mdi-eye.svg" alt="可見性" data-size="line"> | 對學習者隱藏或顯示該檔案 |
| **取代** | <img src="/.gitbook/assets/icons/mdi-file-replace.svg" alt="取代" data-size="line"> | 以更新版本取代該檔案 |
| **移動** | <img src="/.gitbook/assets/icons/mdi-folder-move.svg" alt="移動" data-size="line"> | 移至其他資料夾 |

當您使用文件來建立學習路徑時，取代檔案是一項重要功能，因為取代文件可讓內容更新，而不會讓學習者失去該文件已儲存的進度。

### 批次操作

使用核取方塊選取多個檔案，然後使用工具列一次刪除或下載所有選取項目。

## OnlyOffice 整合

若管理員已設定 **OnlyOffice** 外掛，您即可直接在瀏覽器中編輯 Word、Excel 與 PowerPoint（或 LibreOffice）檔案，無需下載。檢視支援的檔案時，請尋找 **以 OnlyOffice 編輯** <img src="/.gitbook/assets/icons/mdi-file-document-edit-outline.svg" alt="OnlyOffice" data-size="line"> 選項。

文件儲存在 Chamilo 中，OnlyOffice 僅用於在瀏覽器中**檢視**或編輯文件，無需任何額外工具。

## 雲端檔案

若您使用雲端儲存（Azure Blob、AWS S3 或 Google Cloud）存放檔案，這些檔案會儲存在雲端，但您可從此處連結它們。對您與學習者而言此過程是透明的——無論儲存後端為何，文件工具的運作方式皆相同。

## 提示

* **及早整理** — 上傳內容前先建立資料夾結構，以免日後重新整理。若您已建立結構正確的其他課程，之後可將那些課程作為範本使用
* **使用描述性檔名** — 以清楚、有意義的名稱協助學習者找到所需內容
* **隱藏進行中的作業** — 使用可見度切換，隱藏仍在準備中的文件
* **從學習路徑連結** — 在學習路徑中參照文件，以建立引導式學習序列
* **檢查磁碟配額** — 若課程有儲存空間上限，請移除過時檔案以釋出空間