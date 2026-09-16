# 問卷調查設定

**問卷調查**工具的預設值與行為。

可於 **管理 > 組態設定 > 問卷調查** 存取這些設定。此類別包含 **12 項設定**，以下列出平台設定 fixtures（`SettingsCurrentFixtures.php`）中隨附的標題與說明。

> 程式碼中的變數名稱以等寬字體顯示。透過 API 撰寫指令碼，或需以編輯 [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) 的方式在全域層級變更這些設定時，請使用該名稱。

## 設定

### `extend_rights_for_coach_on_survey`

**擴充導師在問卷調查上的權限**

啟用此選項以允許導師建立與編輯問卷調查

*預設值：`true`*


### `hide_survey_edition`

**禁止編輯問卷調查**

禁止編輯此處列出的所有問卷調查（依代碼）。使用 * 可禁止編輯所有問卷調查。

### `hide_survey_reporting_button`

**隱藏問卷調查報表按鈕**

若問卷調查用於調查教師，允許管理員隱藏問卷調查報表按鈕。

*預設值：`false`*


### `show_pending_survey_in_menu`

**在選單中顯示「待填問卷調查」**

顯示一個選單項目，讓使用者可存取其待填的問卷調查。

*預設值：`false`*


### `show_surveys_base_in_sessions`

**在所有期次課程中顯示基礎課程的問卷調查**

[推斷] 使基礎課程的問卷調查對所有相關期次課程中的學習者可見且可用。

*預設值：`false`*


### `survey_additional_teacher_modify_actions`

**為教師的問卷調查清單新增額外動作（以連結形式）**

在問卷調查清單中新增動作（通常與外掛程式相關）。請使用陣列語法 ['myplugin' => ['MyPlugin', 'urlGeneratorCallback']]。

### `survey_allow_answered_question_edit`

**允許教師在學生作答後編輯問卷調查題目**

[推斷] 即使學習者已提交回應，仍允許授課教師修改問卷調查題目。

*預設值：`false`*


### `survey_anonymous_show_answered`

**允許教師查看匿名問卷調查中誰已作答**

允許教師查看哪些學習者已回答匿名問卷調查。此資訊僅在超過一位使用者作答後才會出現，因此仍難以辨識誰回答了什麼。

*預設值：`false`*


### `survey_backwards_enable`

**在問卷調查中啟用「上一題」按鈕**

[推斷] 啟用「上一題」導覽按鈕，讓學習者可回顧先前的問卷調查題目。

*預設值：`false`*


### `survey_duplicate_order_by_name`

**使用問卷調查複製功能時依學生姓名排序**

問卷調查複製功能面向教師，用意是請教師依序對每位學生給予評價。此選項會依學習者的姓氏排序題目。

*預設值：`true`*


### `survey_email_sender_noreply`

**問卷調查電子郵件寄件者（no-reply）**

問卷調查邀請應使用導師的電子郵件地址，或主組態區段中定義的 no-reply 地址？

*預設值：`coach`*（「課程導師電子郵件寄件者」選項——儲存值與較早版本的 Chamilo 相同，但介面上標示為「tutor」）


### `survey_mark_question_as_required`

**預設將所有問卷調查題目標示為「必填」**

[推斷] 自動將所有新建立的問卷調查題目預設標示為必填回應。

*預設值：`false`*