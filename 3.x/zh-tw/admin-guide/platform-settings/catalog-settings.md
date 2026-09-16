# 課程目錄設定

課程目錄（使用者可瀏覽並自行註冊的公開清單）的行為。

請於 **管理 > 組態設定 > 課程目錄** 存取這些設定。此分類包含 **13 項設定**，以下列出平台設定 fixtures（`SettingsCurrentFixtures.php`）中隨附的標題與註解。

> 程式碼中的變數名稱以等寬字體顯示。透過 API 撰寫指令碼，或需以編輯 [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) 的方式在全域層級變更這些設定時，請使用該名稱。

## 設定

### `allow_session_auto_subscription`

**自動工作階段訂閱**

啟用使用者自動訂閱工作階段。

*預設值：`false`*

### `allow_students_to_browse_courses`

**允許學生瀏覽**

允許學生瀏覽並篩選課程目錄。

*預設值：`true`*

### `course_catalog_display_in_home`

**於首頁顯示目錄**

在平台首頁顯示課程目錄區塊。

*預設值：`false`*

### `course_catalog_hide_private`

**隱藏私人課程**

從目錄顯示中排除私人課程。

*預設值：`true`*

### `course_catalog_published`

**發佈課程目錄**

讓匿名使用者（一般大眾）無需登入即可使用課程目錄。

*預設值：`false`*

### `course_catalog_settings`

**課程目錄設定**

課程目錄的 JSON 組態：連結設定、篩選器、排序選項等。

### `course_subscription_in_user_s_session`

**於工作階段檢視中訂閱**

允許使用者直接從其工作階段頁面訂閱課程。

*預設值：`false`*

### `hide_public_link`

**隱藏公開連結**

從課程卡片移除公開 URL 連結。

*預設值：`false`*

### `only_show_course_from_selected_category`

**課程目錄僅顯示相符類別**

當不為空時，課程目錄中僅會顯示指定類別的課程。

### `only_show_selected_courses`

**僅顯示選定課程**

目錄中僅顯示手動選定的課程。

*預設值：`false`*

### `session_catalog_settings`

**工作階段目錄設定**

工作階段目錄的 JSON 組態：篩選器與顯示選項。

### `show_courses_descriptions_in_catalog`

**顯示課程說明**

在目錄清單中顯示課程說明。

*預設值：`false`*

### `show_courses_sessions`

**顯示課程與工作階段**

在目錄結果中同時包含課程與工作階段。

*預設值：`0`*