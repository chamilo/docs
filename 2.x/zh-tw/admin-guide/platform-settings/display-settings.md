# 顯示設定

平台向使用者顯示的方式 — 首頁版面配置、Gravatar、選單、品牌行為以及類似的視覺偏好。

在 **管理 > 設定值 > 顯示** 下存取這些設定。此類別包含 **24 個設定**，以下列出平台設定預設值 (`SettingsCurrentFixtures.php`) 中提供的標題與註解。

> 程式碼中的變數名稱以等寬字體顯示。使用 API 進行腳本編寫，或需透過編輯 [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) 在全域層級變更這些設定時，請使用該名稱。

## 設定

### `accessibility_font_resize`

**字體大小調整無障礙功能**

啟用此選項可在校園頂端右側顯示一組字體大小調整選項。這將讓視覺障礙使用者更容易閱讀課程內容。

*預設值：`false`*

### `display_categories_on_homepage`

**在首頁顯示分類**

此選項將顯示或隱藏入口網站首頁上的課程分類

*預設值：`false`*

### `enable_help_link`

**啟用說明連結**

說明連結位於螢幕頂端右側

*預設值：`true`*

### `gravatar_enabled`

**Gravatar 使用者圖片**

啟用此選項以在 Gravatar 儲存庫中搜尋目前使用者的圖片（如果使用者未在本機定義圖片）。這非常適合自動填入網站上的圖片，特別是當您的使用者為活躍的網際網路使用者時。Gravatar 圖片可輕鬆根據使用者的電子郵件地址在 http://en.gravatar.com/ 配置。

*預設值：`false`*

### `gravatar_type`

**Gravatar 頭像類型**

如果啟用 Gravatar 選項且使用者未在 Gravatar 上配置圖片，此選項可讓您選擇 Gravatar 為每個使用者產生的頭像類型。請參閱 <a href='http://en.gravatar.com/site/implement/images#default-image'>http://en.gravatar.com/site/implement/images#default-image</a> 查看頭像類型範例。

*預設值：`mm`*

### `hide_complete_name_in_whoisonline`

**在「誰在線上」中隱藏完整使用者名稱**

「誰在線上」頁面（如果啟用）將顯示目前線上每個使用者的圖片與名稱。啟用此選項以隱藏名稱。

*預設值：`false`*

### `hide_logout_button`

**隱藏登出按鈕**

隱藏登出按鈕。這通常僅在使用外部登入/登出方法時才有意義，例如使用某種單一登入。

*預設值：`false`*

### `hide_main_navigation_menu`

**隱藏主要導覽選單**

當使用 Chamilo 進行特定目的（例如一次大型線上考試）時，您可能希望透過移除側邊選單進一步減少干擾。

*預設值：`false`*

### `hide_social_media_links`

**隱藏社群媒體連結**

某些頁面允許您在社群網路推廣入口網站或課程。啟用此設定以移除這些連結。

*預設值：`false`*

### `order_user_list_by_official_code`

**依官方代碼排序使用者**

使用「官方代碼」排序平台上大多數學生清單，而非姓氏或名字。

*預設值：`false`*

### `pdf_logo_header`

**PDF 標頭圖示**

是否使用 var/themes/[your-theme]/images/pdf_logo_header.png 圖像作為所有 PDF 匯出的 PDF 標頭圖示（而非一般入口網站圖示）

### `show_admin_toolbar`

**顯示管理員工具列**

向指定使用者角色顯示頁面頂端的全球工具列。此工具列類似 Wordpress 和 Google 的黑色工具列，能真正加速複雜動作並改善學習內容可用空間，但可能會讓某些使用者感到困惑

*預設值：`do_not_show`*

### `show_back_link_on_top_of_tree`

**顯示分類/課程的返回連結**

顯示返回課程階層的連結。清單底部無論如何都有一個連結可用。

*預設值：`false`*

### `show_closed_courses`

**在登入頁面和入口網站首頁顯示已關閉課程？**

在登入頁面和課程首頁顯示已關閉課程？在入口網站首頁，課程旁將出現圖示以快速訂閱每個課程。此功能僅在使用已登入且尚未訂閱入口網站時於入口網站首頁顯示。

*預設值：`false`*

### `show_email_addresses`

**顯示電子郵件地址**

向使用者顯示電子郵件地址

*預設值：`false`*

### `show_empty_course_categories`

**顯示空的課程分類**

即使分類為空，也在首頁顯示課程分類

*預設值：`true`*

### `show_hot_courses`

**顯示熱門課程**

熱門課程清單將新增至首頁

*預設值：`true`*

### `show_number_of_courses`

**顯示課程數量**

在首頁的課程分類中顯示每個分類的課程數量

*預設值：`false`*

###

---
### `show_tabs`

**主要選單項目**

勾選您希望在主要選單中顯示的項目

*預設值：*
```json
{"menu":{"campus_homepage":true,"my_courses":true,"reporting":true,"platform_administration":true,"my_agenda":true,"social":true,"videoconference":false,"diagnostics":false,"catalogue":true,"session_admin":true,"search":true,"question_manager":false},"topbar":{"topbar_my_certificates":true,"topbar_my_custom_certificate":false,"topbar_skills":true}}
```

### `show_tabs_per_role`

**依角色設定的主要選單項目**

依角色定義標頭分頁的顯示狀態。

*預設值：`{}`*

### `showonline`

**誰在線上**

顯示目前在線上的人數嗎？

*預設值：`world`*

### `table_default_row`

**表格預設行數**

所有表格預設應顯示多少行。

*預設值：`20`*

### `table_row_list`

**表格預設提供的分頁選項數字**

設定您希望在表格周圍的導覽中顯示的選項，以在單頁顯示更少或更多的行。例如 [50, 100, 200, 500]。

*預設值：`[10,20,50,100]`*

### `time_limit_whosonline`

**誰在線上的時間限制**

此時間限制定義使用者在其最後動作後多少分鐘內仍被視為*在線上*

*預設值：`30`*