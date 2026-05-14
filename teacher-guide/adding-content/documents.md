# 文件

文件工具是您課程的檔案儲存庫。您可以上傳檔案、建立 HTML 格式的文件、將內容組織成資料夾，並授予學習者存取所有所需材料的權限。

## 存取文件工具

從課程首頁開啟 **Documents** <img src="/.gitbook/assets/icons/mdi-bookshelf.svg" alt="Documents" data-size="line"> 工具。您將看到檔案瀏覽器，顯示課程文件庫的根資料夾。

![The documents file browser showing folders and files with action icons](/.gitbook/assets/documents-file-browser.png)

## 上傳檔案

1. 點擊 **Upload** <img src="/.gitbook/assets/icons/mdi-upload.svg" alt="Upload" data-size="line"> 按鈕
2. 從您的電腦選擇一個或多個檔案（您可以將檔案拖放到上傳區域）
3. 檔案上傳並出現在目前資料夾中

Chamilo 支援大多數常見檔案類型：PDF、辦公室文件 (.docx, .odt)、簡報 (.pptx, .odp)、試算表 (.xlsx, .ods)、圖像 (PNG, JPG, SVG, GIF)、音訊檔案、影片檔案（包括 WEBM）、HTML 檔案等。

某些格式可能因管理員在管理的安全性區段中透過白名單/黑名單篩選設定而被禁止。

為了讓學習者更容易閱讀，我們建議上傳瀏覽器可以直接檢視或開啟而無需額外工具的檔案。這使您的課程更具可攜性，因此更適合行動裝置，並對有特殊需求的人士更易閱讀。

## 建立內容

除了上傳檔案，您還可以直接在 Chamilo 中建立內容：

### 網頁

1. 點擊 **New document**
2. 使用富文本編輯器撰寫帶有格式、圖像、表格和連結的內容
3. 輸入頁面的 **title**
4. 儲存

富文本編輯器 (TinyMCE) 提供類似文字處理器的功能，包括：

* 文字格式（粗體、斜體、標題、清單）
* 表格
* 圖像（上傳或連結至現有圖像）
* 嵌入影片和音訊
* 連結至其他資源
* HTML 原始碼編輯（供進階使用者）

### AI 媒體生成

當平台啟用 AI 助手時，您可以要求 AI 生成 **image** 或 **short video** 來圖說您正在編輯的文件中的段落。選擇一段落，開啟 **Generate AI media** 對話框，AI 將產生媒體項目供您檢閱並插入。該對話框會遵守課程層級權限，且僅在允許 AI 媒體生成的課程中出現。

### 音訊錄製

如果您的瀏覽器支援，您可以直接在文件工具中錄製音訊 — 這對於建立音訊指示或語言學習內容非常有用。這需要 Chamilo 的 HTTPS 配置，因為音訊錄製使用瀏覽器僅在安全連線下允許的技術。

## 使用資料夾組織

使用資料夾保持您的文件庫井然有序：

1. 點擊 **New folder** <img src="/.gitbook/assets/icons/mdi-folder-plus.svg" alt="New folder" data-size="line">
2. 輸入資料夾名稱
3. 儲存

您可以建立巢狀資料夾來建構邏輯內容階層（例如，`Module 1 > Week 1 > Readings`）。

### 移動檔案

* 在清單中找到您的檔案
* 點擊 **Move** <img src="/.gitbook/assets/icons/mdi-folder-move.svg" alt="Move" data-size="line">
* 選擇目的地資料夾
* 確認

## 管理文件

對於每個檔案或資料夾，您可以：

| Action | Icon | Description |
|--------|------|-------------|
| **Edit** | <img src="/.gitbook/assets/icons/mdi-pencil.svg" alt="Edit" data-size="line"> | 重新命名檔案或編輯其內容（適用於網頁） |
| **Delete** | <img src="/.gitbook/assets/icons/mdi-delete.svg" alt="Delete" data-size="line"> | 移除檔案或資料夾 |
| **Download** | <img src="/.gitbook/assets/icons/mdi-download-box.svg" alt="Download" data-size="line"> | 下載檔案至您的電腦 |
| **Visibility** | <img src="/.gitbook/assets/icons/mdi-eye.svg" alt="Visibility" data-size="line"> | 對學習者隱藏或顯示檔案 |
| **Replace** | <img src="/.gitbook/assets/icons/mdi-file-replace.svg" alt="Replace" data-size="line"> | 以更新版本取代檔案 |
| **Move** | <img src="/.gitbook/assets/icons/mdi-folder-move.svg" alt="Move" data-size="line"> | 移動至不同資料夾 |

取代檔案是在使用文件建構學習路徑時的重要功能，因為取代文件將允許文件刷新，而學習者不會失去該文件的進度記錄。

### 批次動作

使用核取方塊選擇多個檔案，然後使用工具列一次刪除或下載所有選取項目。

---
## OnlyOffice 整合

如果您的系統管理員已設定 **OnlyOffice** 外掛程式，您可以直接在瀏覽器中編輯 Word、Excel 和 PowerPoint（或 LibreOffice）檔案，而無需下載它們。在檢視支援檔案時，請尋找 **使用 OnlyOffice 編輯** <img src="/.gitbook/assets/icons/mdi-file-document-edit-outline.svg" alt="OnlyOffice" data-size="line"> 選項。

文件儲存在 Chamilo 中，OnlyOffice 僅用於在瀏覽器中**檢視**或編輯文件，無需任何額外工具。

## 雲端檔案

如果您使用雲端儲存（Azure Blob、AWS S3 或 Google Cloud）來儲存檔案，這些檔案會儲存在雲端，但您可以從這裡連結它們。這對您和您的學習者來說是透明的——文件工具無論儲存後端如何，都以相同方式運作。

## 提示

* **及早組織** — 在上傳內容之前建立您的資料夾結構，這樣您就不必稍後重新組織。如果您已建立其他具有正確結構的課程，您可以稍後將那些課程用作範本
* **使用描述性檔案名稱** — 使用清晰、有意義的名稱幫助學習者找到他們需要的內容
* **隱藏進行中工作** — 使用可見度切換來隱藏您仍在準備的文件
* **從學習路徑連結** — 在您的學習路徑中參照文件，以建立引導式學習序列
* **檢查磁碟配額** — 如果您的課程有儲存限制，請移除過時檔案以釋放空間