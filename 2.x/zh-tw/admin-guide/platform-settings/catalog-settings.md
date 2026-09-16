# 課程目錄設定

課程目錄（使用者可以瀏覽並自行註冊的公開清單）的行為。

在 **管理 > 設定 > 課程目錄** 下存取這些設定。此類別包含 **13 個設定**，以下列出平台設定預設值（`SettingsCurrentFixtures.php`）中的標題和註解。

> 程式碼中的變數名稱以等寬字體顯示。透過 API 撰寫腳本或需要透過編輯 [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) 在全域層級變更這些設定時，請使用它。

## 設定

### `allow_session_auto_subscription`

**自動工作坊訂閱**

啟用使用者對工作坊的自動訂閱。

*預設值：`false`*

### `allow_students_to_browse_courses`

**允許學生瀏覽**

允許學生瀏覽和篩選課程目錄。

*預設值：`true`*

### `course_catalog_display_in_home`

**在首頁顯示目錄**

在平台首頁顯示課程目錄區塊。

*預設值：`false`*

### `course_catalog_hide_private`

**隱藏私人課程**

從目錄顯示中排除私人課程。

*預設值：`true`*

### `course_catalog_published`

**發佈課程目錄**

讓課程目錄可供匿名使用者（一般大眾）存取，而無需登入。

*預設值：`false`*

### `course_catalog_settings`

**課程目錄設定**

課程目錄的 JSON 設定：連結設定、篩選器、排序選項等。

### `course_subscription_in_user_s_session`

**在工作坊檢視中訂閱**

允許使用者直接從其工作坊頁面訂閱課程。

*預設值：`false`*

### `hide_public_link`

**隱藏公開連結**

從課程卡片中移除公開 URL 連結。

*預設值：`false`*

### `only_show_course_from_selected_category`

**僅在課程目錄中顯示符合的類別**

當不為空時，僅給定類別中的課程會出現在課程目錄中。

### `only_show_selected_courses`

**僅選定課程**

在目錄中僅顯示手動選定的課程。

*預設值：`false`*

### `session_catalog_settings`

**工作坊目錄設定**

工作坊目錄的 JSON 設定：篩選器和顯示選項。

### `show_courses_descriptions_in_catalog`

**顯示課程描述**

在目錄清單中顯示課程描述。

*預設值：`false`*

### `show_courses_sessions`

**顯示課程與工作坊**

在目錄結果中包含課程和工作坊。

*預設值：`0`*