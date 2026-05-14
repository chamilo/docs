# 編輯器設定

平台中使用的富文本編輯器 (TinyMCE) 的配置 — 工具列、外掛、編輯器中的 AI 助手。

在 **管理 > 配置設定 > 編輯器** 下存取這些設定。此類別包含 **26 個設定**，以下列出平台設定預設值 (`SettingsCurrentFixtures.php`) 中提供的標題和註解。

> 程式碼中的變數名稱以等寬字體顯示。使用 API 進行腳本編寫或需要透過編輯 [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) 在全域層級變更這些設定時，請使用它。

## 設定

### `allow_email_editor`

**啟用線上電子郵件編輯器**

如果啟用此選項，點擊電子郵件地址將開啟線上編輯器。

### `allow_spellcheck`

**拼字檢查**

啟用拼字檢查

### `block_copy_paste_for_students`

**封鎖學習者複製和貼上**

封鎖學習者在 WYSIWYG 編輯器中複製和貼上的能力

### `editor_block_image_copy_paste`

**防止在 WYSIWYG 編輯器中複製貼上圖像**

防止在編輯器中使用 base64 格式的圖像複製貼上，以避免資料庫充斥圖像。

*預設值：`false`*


### `editor_driver_list`

**WYSIWYG 檔案驅動程式清單**

包含從 WYSIWYG 編輯器存取檔案的驅動程式名稱的陣列。

### `editor_settings`

**WYSIWYG 編輯器設定**

用於全域重新配置 WYSIWYG 編輯器的通用配置陣列。

### `enable_iframe_inclusion`

**在 HTML 編輯器中允許 iframe**

允許在 HTML 編輯器中使用任意 iframe 將提升使用者的編輯功能，但可能構成安全風險。在啟用此功能前，請確保您能夠信任使用者（即您知道他們是誰）。

### `enable_uploadimage_editor`

**在 WYSIWYG 編輯器中允許圖像拖曳與放下**

啟用在內容複製或拖曳放下時將圖像上傳為檔案。

*預設值：`false`*


### `enabled_asciisvg`

**啟用 AsciiSVG**

在 WYSIWYG 編輯器中啟用 AsciiSVG 外掛，以從數學函數繪製圖表。

### `enabled_googlemaps`

**啟用 Google 地圖**

啟用插入 Google 地圖的按鈕。如果未先前編輯檔案 main/inc/lib/fckeditor/myconfig.php 並新增 Google 地圖 API 金鑰，則啟用不會完全實現。

### `enabled_imgmap`

**啟用圖像地圖**

啟用插入圖像地圖的按鈕。這允許您將 URL 關聯到圖像的區域，創建熱點。

### `enabled_insertHtml`

**允許插入小工具**

這允許您在網頁中嵌入喜愛的影片和應用程式，例如 vimeo 或 slideshare，以及各種小工具和配件

### `enabled_mathjax`

**啟用 MathJax**

啟用 MathJax 函式庫以視覺化數學公式。這僅在啟用 ASCIIMathML 或 ASCIISVG 設定時有用。

### `enabled_support_svg`

**建立和編輯 SVG 檔案**

此選項允許您線上建立和編輯 SVG (Scalable Vector Graphics) 多層檔案，並將其匯出為 png 格式圖像。

### `enabled_wiris`

**WIRIS 數學編輯器**

啟用 WIRIS 數學編輯器。安裝此外掛後，您將獲得 WIRIS 編輯器和 WIRIS CAS。<br/>除非先前下載 <a href='http://www.wiris.com/es/plugins3/ckeditor/download' target='_blank'>CKeditor WIRIS 的 PHP 外掛</a> 並將其內容解壓縮到 Chamilo 的目錄 main/inc/lib/javascript/ckeditor/plugins/ 中，否則此啟用不會完全實現。<br/>這是必要的，因為 Wiris 是專有軟體，其服務是<a href='http://www.wiris.com/store/who-pays' target='_blank'>商業</a>的。要調整外掛，請編輯 configuration.ini 檔案，或以 Chamilo 隨附的 configuration.ini.default 檔案取代其內容。

### `force_wiki_paste_as_plain_text`

**強制在維基中以純文字貼上**

這將防止許多從其他文字複製的隱藏標籤、不正確或非標準標籤，在多次問題後停止損壞維基文字；但在編輯時將失去某些功能。

### `full_editor_toolbar_set`

**完整 WYSIWYG 編輯器工具列**

在平台各處的所有 WYSIWYG 編輯器方塊中顯示完整工具列。

*預設值：`false`*


### `htmlpurifier_wiki`

**在維基中啟用 HTMLPurifier**

在維基工具中啟用 HTML purifier（將提升安全性但減少樣式功能）

### `include_asciimathml_script`

**在所有系統頁面載入 Mathjax 函式庫**

如果您希望不僅在「文件」工具中，還在系統其他地方顯示基於 MathML 的數學公式和基於 ASCIIsvg 的數學圖形，請啟用此設定。

### `math_asciimathML`

**ASCIIMathML 數學編輯器**

啟用 ASCIIMathML 數學編輯器

### `more_buttons_maximized_mode`

**擴展按鈕列**

當 WYSIWYG 編輯器最大化時啟用擴展按鈕列

*預設值：`true`*

---
### `save_titles_as_html`

**將標題儲存為 HTML**

允許使用者在多個位置的標題欄位中包含 HTML。這允許對標題進行一些樣式設定，特別是在測驗題目中。

*預設值：`false`*

### `translate_html`

**支援多語言 HTML 內容**

如果啟用此選項，使用者可以在 HTML 元素中使用 ‘lang’ 屬性來定義該元素內容所使用的語言。啟用多個具有不同 ‘lang’ 屬性的元素，Chamilo 將僅顯示使用者語言的內容。

*預設值：`false`*


### `video_context_menu_hidden`

**隱藏影片播放器的右鍵選單**

啟用時，HTML5 影片播放器的右鍵選單將被停用。

*預設值：`false`*


### `video_player_renderers`

**影片播放器渲染器**

啟用 YouTube、Vimeo、Facebook、DailyMotion、Twitch 媒體的播放器渲染器

### `youtube_for_students`

**允許學習者插入來自 YouTube 的影片**

啟用學習者插入 YouTube 影片的可能性