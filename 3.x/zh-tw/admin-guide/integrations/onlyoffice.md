# OnlyOffice

**OnlyOffice** 整合可讓使用者在 Chamilo 瀏覽器中直接編輯文件（Word、Excel、PowerPoint），無需下載。

## OnlyOffice 提供的功能

* **文件編輯** — 在瀏覽器中編輯 .docx、.xlsx、.pptx 檔案
* **格式相容性** — 與 Microsoft Office 格式完全相容
* **無需桌面軟體** — 一切皆在瀏覽器中執行

> 即時協作編輯取決於 OnlyOffice Document Server 本身；Chamilo 的外掛透過該伺服器開啟與儲存文件，但不會新增或限制該能力。

## 設定

1. 在您的伺服器上安裝 **OnlyOffice Document Server**（或使用 OnlyOffice 雲端服務）
2. 在 Chamilo 平台設定中設定：
   * **OnlyOffice Document Server URL** — 您的 OnlyOffice 伺服器位址
   * **Secret key** — 用於 Chamilo 與 OnlyOffice 之間的安全通訊
3. 啟用整合

## 運作方式

設定完成後，使用者在「文件」工具中檢視支援的文件類型時，會看到 **使用 OnlyOffice 編輯** 選項。點選後，文件會在 Chamilo 介面內的 OnlyOffice 編輯器中開啟。

變更會自動儲存回 Chamilo 的文件儲存空間。

## 提示

* **建議使用獨立伺服器** — 與 BigBlueButton 類似，OnlyOffice Document Server 應在獨立伺服器上執行以獲得最佳效能
* **必須使用 HTTPS** — Chamilo 與 OnlyOffice 皆應透過 HTTPS 提供服務，整合才能正常運作
* **檢查格式** — OnlyOffice 最適合 Office 格式（.docx、.xlsx、.pptx）。其他格式的編輯支援可能有限。