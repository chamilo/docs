# 語言設定

可用語言、預設語言，以及 Chamilo 如何決定要顯示哪一種語言。

請至 **管理 > 組態設定 > 語言** 存取這些設定。此類別包含 **13 項設定**，以下列出平台設定 fixtures（`SettingsCurrentFixtures.php`）中隨附的標題與說明。

> 程式碼中的變數名稱以等寬字體顯示。透過 API 撰寫指令碼，或需要以編輯 [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) 的方式在全域層級變更這些設定時，請使用該名稱。

## 設定

### `allow_course_multiple_languages`

**多語言課程**

啟用以一種以上語言管理的課程。此選項會在課程頁面中新增語言選擇器，讓使用者能輕鬆切換，並為課程新增 `multiple_language` 額外欄位，以便進行遠端管理程序。

*預設值：`false`*


### `allow_use_sub_language`

**允許定義與使用子語言**

啟用此選項後，您將能針對平台介面中使用的各個語言詞彙定義變體，形式為以既有語言為基礎並加以擴充的新語言。您可在管理面板的語言區段找到此選項。

*預設值：`false`*

### `auto_detect_language_custom_pages`

**在自訂頁面啟用語言自動偵測**

若您使用自訂頁面，啟用此選項可讓語言偵測器依使用者瀏覽器語言呈現該頁面；停用則強制使用平台預設語言。

*預設值：`true`*


### `language_by_resource` **v3**

**依資源指定語言**

允許為個別資源指定特定語言。

*預設值：`false`*

### `language_flags_by_country`

**語言旗幟**

以國家／地區旗幟代表語言。預設未啟用，因為部分語言並非嚴格對應單一國家，可能造成部分使用者困擾。

*預設值：`false`*


### `language_priority_1`

**最高優先語言**

當存在多個語言脈絡時，優先選用的主要語言。

*預設值：`course_lang`*


### `language_priority_2`

**次要優先語言**

當第一優先語言無法使用或不適用於當前脈絡時的次要後援語言。

*預設值：`user_profil_lang`*


### `language_priority_3`

**第三優先語言**

當較高優先順序失敗時的第三後援語言。

*預設值：`user_selected_lang`*


### `language_priority_4`

**第四優先語言**

依優先順序排列的最後一項語言後援選項。

*預設值：`platform_lang`*


### `platform_language`

**平台預設語言**

主要語言，在未設定使用者語言時預設使用。

*預設值：`en`*


### `show_different_course_language`

**顯示課程語言**

在首頁課程清單中，於課程標題旁顯示各課程所使用的語言

*預設值：`true`*


### `show_language_selector_in_menu`

**主選單中的語言切換器**

在主選單顯示語言選擇器，可立即更新使用者的語言偏好。這在學習者需於學習過程中切換語言的多語入口網站中相當實用。

*預設值：`true`*


### `template_activate_language_filter`

**多語言文件範本**

啟用後，可將文件範本（平台層級或課程層級）設定為特定語言。

*預設值：`false`*