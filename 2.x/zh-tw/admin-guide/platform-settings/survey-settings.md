# 調查設定

**調查**工具的預設值和行為。

在 **管理 > 設定 > 調查** 下存取這些設定。此類別包含 **12 個設定**，以下列出平台設定預設資料 (`SettingsCurrentFixtures.php`) 中提供的標題和註解。

> 程式碼中的變數名稱以等寬字體顯示。使用 API 進行腳本編寫或需要透過編輯 [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) 在全域層級變更這些設定時，請使用它。

## 設定

### `extend_rights_for_coach_on_survey`

**擴充調查的導師權限**

啟用此選項將允許導師建立和編輯調查。

*預設值：`true`*


### `hide_survey_edition`

**防止調查編輯**

防止在此列出的所有調查（依程式碼）的編輯。使用 * 防止所有調查的編輯。

### `hide_survey_reporting_button`

**隱藏調查報表按鈕**

允許管理員隱藏調查報表按鈕，如果調查用於調查教師。

*預設值：`false`*


### `show_pending_survey_in_menu`

**在選單中顯示「待處理調查」**

顯示一個選單項目，讓使用者存取其待處理調查。

*預設值：`false`*


### `show_surveys_base_in_sessions`

**在所有課程場次中顯示基礎課程的調查**

[inferred] 使基礎課程的調查在所有相關課程場次中對學習者可見且可用。

*預設值：`false`*


### `survey_additional_teacher_modify_actions`

**為教師的調查清單新增額外動作（作為連結）**

在調查清單中新增動作（通常連接到外掛程式）。使用陣列語法 ['myplugin' => ['MyPlugin', 'urlGeneratorCallback']]。

### `survey_allow_answered_question_edit`

**允許教師在學生回答後編輯調查問題**

[inferred] 允許教師即使在學習者提交回應後仍修改調查問題。

*預設值：`false`*


### `survey_anonymous_show_answered`

**允許教師查看匿名調查中誰已回答**

允許教師查看哪些學習者已回答匿名調查。此功能僅在超過一名使用者回答後出現，因此仍難以辨識誰回答了什麼。

*預設值：`false`*


### `survey_backwards_enable`

**在調查中啟用「前一個問題」按鈕**

[inferred] 啟用「前一個問題」導航按鈕，讓學習者檢視先前的調查問題。

*預設值：`false`*


### `survey_duplicate_order_by_name`

**使用調查複製功能時依學生姓名排序**

調查複製功能針對教師設計，旨在讓教師依順序對每個學生給予評價。此選項將依學習者的姓氏排序問題。

*預設值：`true`*


### `survey_email_sender_noreply`

**調查電子郵件寄件者（無回覆）**

調查邀請應使用導師的電子郵件地址，還是主要設定區段中定義的無回覆地址？

*預設值：`coach`*


### `survey_mark_question_as_required`

**預設將所有調查問題標記為「必填」**

[inferred] 自動將所有新建立的調查問題預設標記為必填回應。

*預設值：`false`*