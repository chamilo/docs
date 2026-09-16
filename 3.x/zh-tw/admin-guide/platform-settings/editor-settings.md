# 編輯器設定

平台各處所使用的富文字編輯器（TinyMCE）組態——工具列、外掛，以及編輯器中的 AI 輔助功能。

請至 **管理 > 組態設定 > 編輯器** 存取這些設定。此類別包含 **26 項設定**，以下列出平台設定 fixtures（`SettingsCurrentFixtures.php`）中隨附的標題與說明。

> 程式碼中的變數名稱以等寬字體顯示。透過 API 撰寫指令碼，或需以編輯 [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) 的方式在全域層級變更這些設定時，請使用該名稱。

## 設定

### `allow_email_editor`

**啟用線上電子郵件編輯器**

若啟用此選項，點選電子郵件地址將開啟線上編輯器。

### `allow_spellcheck`

**拼字檢查**

啟用拼字檢查

### `block_copy_paste_for_students`

**封鎖學習者複製與貼上**

封鎖學習者在 WYSIWYG 編輯器中複製與貼上的能力

### `editor_block_image_copy_paste`

**防止在 WYSIWYG 編輯器中複製貼上圖片**

防止在編輯器中以 base64 複製貼上圖片，以免資料庫被圖片填滿。

*預設：`false`*


### `editor_driver_list`

**WYSIWYG 檔案驅動程式清單**

陣列，包含從 WYSIWYG 編輯器存取檔案所用驅動程式的名稱。

### `editor_settings`

**WYSIWYG 編輯器設定**

用於全域重新組態 WYSIWYG 編輯器的通用組態陣列。

### `enable_iframe_inclusion`

**允許在 HTML 編輯器中使用 iframe**

允許在 HTML 編輯器中使用任意 iframe 將增強使用者的編輯能力，但可能構成安全風險。啟用此功能前，請確認您可以信賴您的使用者（亦即您知道他們是誰）。

### `enable_uploadimage_editor`

**允許在 WYSIWYG 編輯器中拖放圖片**

在內容中複製或拖放時，啟用將圖片以上傳檔案方式處理。

*預設：`false`*


### `enabled_asciisvg`

**啟用 AsciiSVG**

在 WYSIWYG 編輯器中啟用 AsciiSVG 外掛，以便從數學函數繪製圖表。

### `enabled_googlemaps`

**啟用 Google 地圖**

啟用插入 Google 地圖的按鈕。若未事先編輯檔案 main/inc/lib/fckeditor/myconfig.php 並加入 Google 地圖 API 金鑰，啟用將無法完全生效。

### `enabled_imgmap`

**啟用影像地圖**

啟用插入影像地圖的按鈕。這可讓您將 URL 關聯到圖片的特定區域，建立熱點。

### `enabled_insertHtml`

**允許插入小工具**

這可讓您在網頁中嵌入喜愛的影片與應用程式，例如 vimeo 或 slideshare，以及各類小工具與小裝置

### `enabled_mathjax`

**啟用 MathJax**

啟用 MathJax 函式庫以視覺化數學公式。這會在編輯器工具列新增公式按鈕，公式以 LaTeX 撰寫。請參閱 [數學公式](../../teacher-guide/adding-content/math-formulas.md)。

### `enabled_support_svg`

**建立與編輯 SVG 檔案**

此選項可讓您線上建立與編輯 SVG（可縮放向量圖形）多圖層，並將其匯出為 png 格式圖片。

### `enabled_wiris`

**WIRIS 數學編輯器**

啟用 WIRIS 數學編輯器。安裝此外掛後即可使用 WIRIS 編輯器與 WIRIS CAS。<br/>除非已事先下載 <a href='http://www.wiris.com/es/plugins3/ckeditor/download' target='_blank'>CKeditor 用的 WIRIS PHP 外掛</a>，並將其內容解壓縮至 Chamilo 目錄 main/inc/lib/javascript/ckeditor/plugins/，否則此啟用無法完全生效。<br/>這是必要的，因為 Wiris 為專有軟體，其服務為<a href='http://www.wiris.com/store/who-pays' target='_blank'>商業性質</a>。若要調整外掛，請編輯 configuration.ini 檔案，或以 Chamilo 隨附的 configuration.ini.default 檔案內容取代之。

### `force_wiki_paste_as_plain_text`

**強制在 wiki 中以純文字貼上**

這可防止從其他文字複製而來的許多隱藏、不正確或非標準標籤，在多次問題後繼續破壞 Wiki 文字；但編輯時將失去部分功能。

### `full_editor_toolbar_set`

**完整 WYSIWYG 編輯器工具列**

在平台各處所有 WYSIWYG 編輯器方塊中顯示完整工具列。

*預設：`false`*


### `htmlpurifier_wiki`

**Wiki 中的 HTMLPurifier**

在 wiki 工具中啟用 HTML purifier（將提升安全性，但會減少樣式功能）

### `include_asciimathml_script`

**在所有系統頁面載入 Mathjax 函式庫**

若希望不僅在「文件」工具中，也能在系統其他位置顯示以 MathML 為基礎的數學公式及以 ASCIIsvg 為基礎的數學圖形，請啟用此設定。

### `math_asciimathML`

**ASCIIMathML 數學編輯器**

啟用 ASCIIMathML 數學編輯器

### `more_buttons_maximized_mode`

**擴充按鈕列**

在最大化 WYSIWYG 編輯器時啟用擴充按鈕列

*預設值：`true`*

### `save_titles_as_html`

**以 HTML 儲存標題**

允許使用者在多處標題欄位中加入 HTML。這可讓標題具備部分樣式，尤其是測驗題目。同時也讓這些特定標題欄位能使用與下方 `translate_html` 相同的依語言標記，而純文字標題則無法承載此類標記。

*預設值：`false`*

### `translate_html`

**支援多語 HTML 內容**

若啟用，此選項允許使用者在 HTML 元素中使用 ‘lang’ 屬性，以定義該元素內容所使用的語言。啟用多個具有不同 ‘lang’ 屬性的元素後，Chamilo 將只顯示符合使用者語言的內容。

*預設值：`false`*

完整的教師端操作說明，請參閱教師指南中的 [多語內容](../../teacher-guide/adding-content/multi-language-content.md)。


### `video_context_menu_hidden`

**隱藏影片播放器的操作功能表**

啟用後，將停用 HTML5 影片播放器上的右鍵操作功能表。

*預設值：`false`*


### `video_player_renderers`

**影片播放器轉譯器**

啟用 YouTube、Vimeo、Facebook、DailyMotion、Twitch 媒體的播放器轉譯器

### `youtube_for_students`

**允許學習者插入 YouTube 影片**

啟用學習者插入 Youtube 影片的功能