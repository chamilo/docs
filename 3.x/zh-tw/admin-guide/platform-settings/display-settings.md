# 顯示設定

平台呈現給使用者的方式——首頁版面、Gravatar、選單、品牌行為及類似的視覺偏好。

請至 **管理 > 組態設定 > 顯示** 存取這些設定。此分類包含 **28 項設定**，以下列出平台設定 fixtures（`SettingsCurrentFixtures.php`）中隨附的標題與說明。

> 程式碼中的變數名稱以等寬字體顯示。透過 API 撰寫指令碼，或需要以編輯 [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) 的方式在全域層級變更這些設定時，請使用該名稱。

## 設定

### `accessibility_font_resize`

**字型縮放無障礙功能**

啟用此選項後，會在校園畫面右上角顯示一組字型縮放選項。這可讓視障使用者更輕鬆地閱讀課程內容。

*預設值：`false`*

### `display_categories_on_homepage`

**在首頁顯示分類**

此選項會在入口網站首頁顯示或隱藏課程分類

*預設值：`false`*

### `enable_help_link`

**啟用說明連結**

說明連結位於畫面右上角

*預設值：`true`*

### `gravatar_enabled`

**Gravatar 使用者圖片**

啟用此選項後，若使用者尚未在本機定義圖片，系統會至 Gravatar 儲存庫搜尋目前使用者的圖片。這非常適合自動填入網站上的圖片，尤其當您的使用者是活躍的網際網路使用者時。Gravatar 圖片可依使用者的電子郵件地址輕鬆設定，請見 http://en.gravatar.com/

*預設值：`false`*

### `gravatar_type`

**Gravatar 頭像類型**

若已啟用 Gravatar 選項，且使用者尚未在 Gravatar 上設定圖片，此選項可讓您選擇 Gravatar 為每位使用者產生的頭像類型。頭像類型範例請見 <a href='http://en.gravatar.com/site/implement/images#default-image'>http://en.gravatar.com/site/implement/images#default-image</a>。

*預設值：`mm`*

### `hide_complete_name_in_whoisonline`

**在「誰在線上」中隱藏完整使用者名稱**

「誰在線上」頁面（若已啟用）會為每位目前在線的使用者顯示圖片與名稱。啟用此選項可隱藏名稱。

*預設值：`false`*

### `hide_home_top_when_connected` **v3**

**登入後隱藏首頁頂部內容**

在平台首頁上，此選項可讓您對所有已登入的使用者隱藏介紹區塊（例如只留下公告）。尚未登入的使用者仍會看到一般介紹區塊。

*預設值：`false`*

### `hide_logout_button`

**隱藏登出按鈕**

隱藏登出按鈕。這通常僅在使用外部登入／登出方法時有用，例如使用某種單一登入（Single Sign On）時。

*預設值：`false`*

### `hide_main_navigation_menu`

**隱藏主導覽選單**

當將 Chamilo 用於特定用途（例如一場大規模線上考試）時，您可能希望進一步減少干擾，因而移除側邊選單。

*預設值：`false`*

### `hide_social_media_links`

**隱藏社群媒體連結**

部分頁面允許您在社群網路上推廣入口網站或課程。啟用此設定可移除這些連結。

*預設值：`false`*

### `order_user_list_by_official_code`

**依正式代碼排序使用者**

使用「正式代碼」來排序平台上大多數學生清單，而非依其姓氏或名字。

*預設值：`false`*

### `pdf_logo_header`

**PDF 頁首標誌**

是否使用 var/themes/[your-theme]/images/pdf_logo_header.png 的圖片，作為所有 PDF 匯出的 PDF 頁首標誌（而非一般入口網站標誌）

### `show_admin_toolbar`

**顯示管理工具列**

對指定的使用者角色，在頁面頂端顯示全域工具列。此工具列與 Wordpress 及 Google 的黑色工具列非常相似，可大幅加快複雜操作並增加學習內容可用空間，但對部分使用者可能造成困惑

*預設值：`do_not_show`*

### `show_administrator_data` **v3**

**頁尾中的平台管理員資訊**

是否在頁尾顯示平台管理員資訊？

*預設值：`true`*

### `show_back_link_on_top_of_tree`

**顯示來自分類／課程的返回連結**

顯示返回課程階層的連結。清單底部本來就有連結可用。

*預設值：`false`*

### `show_closed_courses`

**是否在登入頁與入口網站起始頁顯示已關閉的課程？**

是否在登入頁與課程起始頁顯示已關閉的課程？在入口網站起始頁上，課程旁會出現圖示，以便快速報名各課程。這僅會在使用者已登入、且使用者尚未報名入口網站時，出現在入口網站起始頁上。

*預設值：`false`*

### `show_email_addresses`

**顯示電子郵件地址**

向使用者顯示電子郵件地址

*預設值：`false`*

### `show_empty_course_categories`

**顯示空白課程類別**

即使課程類別為空，仍在首頁顯示這些類別

*預設值：`true`*

### `show_hot_courses`

**顯示熱門課程**

熱門課程清單將新增至首頁

*預設值：`true`*

### `show_number_of_courses`

**顯示課程數量**

在首頁的課程類別中，顯示各類別的課程數量

*預設值：`false`*

### `show_tabs`

**主選單項目**

勾選您希望出現在主選單中的項目

*預設值：*
```json
{"menu":{"campus_homepage":true,"my_courses":true,"reporting":true,"platform_administration":true,"my_agenda":true,"social":true,"videoconference":false,"diagnostics":false,"catalogue":true,"session_admin":true,"search":true,"question_manager":false},"topbar":{"topbar_my_certificates":true,"topbar_my_custom_certificate":false,"topbar_skills":true}}
```

### `show_tabs_per_role`

**依角色顯示主選單項目**

依角色定義頁首分頁的可見性。

*預設值：`{}`*

### `show_teacher_data` **v3**

**在頁尾顯示教師資訊**

是否在頁尾顯示教師參考資訊（姓名，以及若有則顯示電子郵件）？

*預設值：`true`*

### `show_tutor_data` **v3**

**在頁尾顯示期程導師資料。**

是否在頁尾顯示期程導師參考資訊（姓名，以及若有則顯示電子郵件）？

*預設值：`true`*

### `showonline`

**誰在線上**

是否顯示目前在線人數？

*預設值：`world`*

### `table_default_row`

**表格預設列數**

所有表格預設應顯示多少列。

*預設值：`20`*

### `table_row_list`

**表格預設提供的分頁列數選項**

設定您希望出現在表格導覽中的選項，以在單一頁面顯示較少或較多列。例如 [50, 100, 200, 500]。

*預設值：`[10,20,50,100]`*

### `time_limit_whosonline`

**「誰在線上」的時間限制**

此時間限制定義使用者在最後一次操作後，多少分鐘內仍被視為*在線*

*預設值：`30`*