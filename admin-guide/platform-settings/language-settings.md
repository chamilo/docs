# 語言設定

可用語言、預設語言，以及 Chamilo 如何決定顯示哪種語言。

在 **Administration > Configuration settings > Languages** 下存取這些設定。此類別包含 **12 個設定**，以下列出平台設定預設值 (`SettingsCurrentFixtures.php`) 中的標題與註解。

> 程式碼中的變數名稱以等寬字體顯示。使用 API 進行腳本編寫，或需全域編輯 [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) 變更這些設定時，請使用該名稱。

## 設定

### `allow_course_multiple_languages`

**多語言課程**

啟用以多於一種語言管理的課程。此選項會在課程頁面新增語言選擇器，讓使用者輕鬆切換，並在課程新增 'multiple_language' 額外欄位，以支援遠端管理程序。

*預設值：`false`*


### `allow_use_sub_language`

**允許定義與使用子語言**

啟用此選項後，您即可為平台介面中使用的每個語言術語定義變體，以新語言形式基於並擴充現有語言。此選項位於管理面板的語言區段。

*預設值：`false`*


### `auto_detect_language_custom_pages`

**啟用自訂頁面的語言自動偵測**

若使用自訂頁面，啟用此選項以在頁面中提供語言偵測器顯示使用者瀏覽器語言的頁面，或停用以強制使用平台預設語言。

*預設值：`true`*


### `language_flags_by_country`

**語言旗幟**

使用國家旗幟代表語言。此功能預設未啟用，因為某些語言並非嚴格依附於特定國家，可能導致部分使用者感到困擾。

*預設值：`false`*


### `language_priority_1`

**最高優先順位語言**

當設定多種語言脈絡時所選取的主要語言。

*預設值：`course_lang`*


### `language_priority_2`

**次要優先順位語言**

若第一優先順位語言無法使用或不符脈絡時的次要備用語言。

*預設值：`user_profil_lang`*


### `language_priority_3`

**第三優先順位語言**

若較高優先順位語言失敗時的三級備用語言。

*預設值：`user_selected_lang`*


### `language_priority_4`

**第四優先順位語言**

依優先順位排序的最後語言備用選項。

*預設值：`platform_lang`*


### `platform_language`

**平台預設語言**

當未設定使用者語言時所使用的預設主要語言。

*預設值：`en`*


### `show_different_course_language`

**顯示課程語言**

在首頁課程清單中，於課程標題旁顯示每個課程的語言。

*預設值：`true`*


### `show_language_selector_in_menu`

**主選單中的語言切換器**

在主選單中顯示語言選擇器，立即更新使用者的語言偏好。此功能在多語言入口網站中對學習者切換學習語言非常有用。

*預設值：`true`*


### `template_activate_language_filter`

**多語言文件範本**

啟用文件範本（平台或課程層級）以針對特定語言進行設定。

*預設值：`false`*