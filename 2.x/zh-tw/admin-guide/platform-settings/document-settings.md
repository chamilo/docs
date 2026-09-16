# 文件設定

課程 **文件** 工具的行為 — 上傳、允許的副檔名、分享和範本。

在 **管理 > 設定 > 文件** 下存取這些設定。此類別包含 **29 個設定**，以下列出平台設定預設值 (`SettingsCurrentFixtures.php`) 中的標題和註解。

> 程式碼中的變數名稱以等寬字體顯示。使用 API 進行腳本編寫或需要透過編輯 [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) 在全域層級變更這些設定時，請使用它。

## 設定

### `access_url_specific_files`

**啟用 URL 特定檔案**

在多 URL 設定中啟用此功能時，您可以前往主 URL 並提供任何檔案（在文件工具中）的 URL 特定版本。從不同 URL 查看時，原檔案將被替代版本取代。這允許您進一步自訂每個 URL，同時享有重複使用相同課程的優勢。

*預設值：`false`*

### `default_document_quotum`

**預設硬碟空間**

課程可用的磁碟空間為何？您可以透過平台管理 > 課程 > 修改來為特定課程覆寫配額。

*預設值：`1000`*


### `default_group_quotum`

**群組可用磁碟空間**

群組文件工具的預設硬碟空間為何？

*預設值：`250`*


### `documents_custom_cloud_link_list`

**設定雲端連結的嚴格主機清單**

文件工具可以整合雲端檔案的連結。雲端服務清單限於硬編碼清單，但您可以定義「links」陣列，包含您自己的服務/URL 清單。此處定義的清單將取代預設清單。

### `documents_default_visibility_defined_in_course`

**課程中定義的文件可見性**

所有課程的預設文件可見性

*預設值：`false`*

### `documents_hide_download_icon`

**隱藏文件下載圖示**

在文件工具中，從使用者隱藏下載圖示。

*預設值：`false`*


### `enable_x_sendfile_headers`

**啟用 X-sendfile 標頭**

如果您已在網頁伺服器層級啟用 X-sendfile，並希望新增瀏覽器拾取所需的標頭，請啟用此功能。

*預設值：`false`*

### `group_category_document_access`

**啟用群組類別內文件分享選項**

啟用時，管理員可以依類別為文件群組設定文件存取和分享權限。

*預設值：`false`*


### `group_document_access`

**啟用群組文件分享選項**

啟用時，可以在群組層級設定文件分享和存取權限。

*預設值：`false`*


### `pdf_export_watermark_by_course`

**啟用依課程定義浮水印**

啟用此選項時，教師可以為其課程中的文件定義自己的浮水印。

*預設值：`false`*


### `pdf_export_watermark_enable`

**啟用 PDF 匯出浮水印**

啟用此選項後，您可以上傳影像或文字，該內容將自動作為系統中所有文件 PDF 匯出的浮水印新增。

*預設值：`false`*

### `pdf_export_watermark_text`

**PDF 浮水印文字**

此文字將作為文件 PDF 匯出的浮水印新增。

### `permanently_remove_deleted_files`

**已刪除檔案無法復原**

在文件工具中刪除檔案將永久刪除該檔案。檔案無法復原

*預設值：`false`*

### `permissions_for_new_directories`

**新目錄權限**

定義指派給每個新建立目錄的權限設定，讓您能提升對駭客上傳危險內容攻擊的安全性。預設設定 (0770) 應足以提供伺服器合理的保護層級。給定格式使用 UNIX 的 Owner-Group-Others 加上 Read-Write-Execute 權限術語。

*預設值：`0770`*


### `permissions_for_new_files`

**新檔案權限**

定義指派給每個新建立檔案的權限設定，讓您能提升對駭客上傳危險內容攻擊的安全性。預設設定 (0550) 應足以提供伺服器合理的保護層級。給定格式使用 UNIX 的 Owner-Group-Others 加上 Read-Write-Execute 權限術語。如果您使用 Oogie，請注意啟動 LibreOffice 的使用者能在課程資料夾中寫入檔案。

*預設值：`0660`*


### `send_notification_when_document_added`

**文件新增時發送通知給學生**

每當有人在文件工具中建立新項目時，向使用者發送通知。

*預設值：`false`*

---
### `show_default_folders`

**在文件工具中顯示所有包含預設提供的多媒體資源的資料夾**

包含預設提供的檔案的多媒體檔案資料夾，按影片、音訊、圖像和 Flash 動畫類別組織，以供在課程中使用。雖然您可以在文件工具中將其設為不可見，但您仍然可以在平台網頁編輯器中使用這些資源。

*預設值：`true`*

### `show_documents_preview`

**顯示文件預覽**

在文件工具中顯示文件預覽將避免僅為了顯示文件而載入新頁面，但對於某些舊版瀏覽器或較小寬度螢幕可能會導致不穩定。

*預設值：`false`*

### `show_users_folders`

**在文件工具中顯示使用者資料夾**

此選項允許您對教師顯示或隱藏系統為每個造訪文件工具或透過網頁編輯器傳送檔案的使用者生成的資料夾。如果您對教師顯示這些資料夾，他們可以選擇對學習者顯示或隱藏，並允許每個學習者在課程中擁有專屬位置，不僅用於儲存文件，還可以用於建立和編輯網頁並匯出為 PDF、繪圖、製作個人網頁範本、傳送檔案，以及建立、移動和刪除目錄和檔案，並從其資料夾製作備份。課程中的每個使用者都擁有完整的文件管理器。此外，請記住，任何使用者都可以從文件工具中任何可見資料夾（無論是否為擁有者）複製檔案到其作品集或社群網路的個人文件區域，這些檔案將可用於其在其他課程中使用。

*預設值：`true`*

### `students_download_folders`

**允許學習者下載目錄**

允許學習者從文件工具打包並下載完整目錄

*預設值：`true`*

### `students_export2pdf`

**允許學習者在文件和維基工具中將網頁文件匯出為 PDF 格式**

此功能預設啟用，但若伺服器過載濫用，或特定學習環境，可能希望對所有課程停用。

*預設值：`true`*

### `thematic_pdf_orientation`

**課程進度 PDF 方向**

在課程進度工具中，您可以列印不同元素的 PDF。設定「portrait」或「landscape」（技術術語）來變更。

*預設值：`landscape`*

### `upload_extensions_blacklist`

**黑名單 - 設定**

黑名單用於過濾檔案副檔名，移除（或重新命名）其副檔名出現在下方黑名單中的任何檔案。副檔名應不含前導點 (.)，並以分號 (;) 分隔，例如：exe;com;bat;scr;php。無副檔名的檔案會被接受。大小寫無關。

### `upload_extensions_list_type`

**文件上傳過濾類型**

選擇使用黑名單或白名單過濾。請參閱下方黑名單或白名單描述以取得更多詳細資訊。

*預設值：`blacklist`*

### `upload_extensions_replace_by`

**取代副檔名**

輸入您希望用來取代過濾器偵測到的危險副檔名的副檔名。僅在選擇取代過濾時需要。

*預設值：`dangerous`*

### `upload_extensions_skip`

**過濾行為（略過/重新命名）**

若選擇略過，透過黑名單或白名單過濾的檔案將不會上傳至系統。若選擇重新命名，其副檔名將被取代為副檔名取代設定中定義的副檔名。請注意，重新命名並不能真正保護您，且若存在多個同名但不同副檔名的檔案，可能導致名稱衝突。

*預設值：`true`*

### `upload_extensions_whitelist`

**白名單 - 設定**

白名單用於過濾檔案副檔名，移除（或重新命名）其副檔名*不在*下方白名單中的任何檔案。這通常被視為更安全但更嚴格的過濾方式。副檔名應不含前導點 (.)，並以分號 (;) 分隔，例如：htm;html;txt;doc;xls;ppt;jpg;jpeg;gif;sxw。無副檔名的檔案會被接受。大小寫無關。

### `users_copy_files`

**允許使用者從課程複製檔案到個人檔案區域**

允許使用者從課程複製檔案到個人檔案區域，透過社群網路或離開課程時的 HTML 編輯器可見

*預設值：`true`*

### `video_features`

**影片功能**

您可以在 Chamilo 的影片播放器中啟用的額外功能陣列。選項包括 'speed'，允許變更影片播放速度。