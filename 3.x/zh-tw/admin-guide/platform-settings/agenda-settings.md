# 議程設定

議程（**Agenda**）工具（行事曆／活動）的預設值與行為。

請至 **管理 > 組態設定 > 議程** 存取這些設定。此分類包含 **11 項設定**，以下列出平台設定 fixtures（`SettingsCurrentFixtures.php`）中隨附的標題與說明。

> 程式碼中的變數名稱以等寬字體顯示。透過 API 撰寫指令碼，或需以編輯 [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) 的方式在全域層級變更這些設定時，請使用該名稱。

## 設定

### `agenda_colors`

**議程顏色**

為各類型活動設定 HTML 色碼，以變更顯示活動時的顏色。

### `agenda_legend`

**議程顏色圖例**

新增簡短文字作為圖例，說明活動所使用的顏色。

### `agenda_on_hover_info`

**議程懸停資訊**

自訂游標懸停於議程時的顯示內容。顯示議程註解及／或說明。

### `agenda_reminders_sender_id`

**正式發送議程提醒的使用者 ID**

設定議程提醒電子郵件中顯示為寄件者的使用者。

*預設值：`0`*

### `allow_agenda_edit_for_hrm`

**允許 HRM 角色編輯或刪除議程活動**

賦予 HRM 稍多權限，允許其在課程工作階段中編輯／刪除議程活動。

*預設值：`false`*

### `allow_careers_in_global_agenda`

**將全域行事曆活動與職涯及晉升連結**

啟用後，全域行事曆活動可與職涯及晉升關聯，以便進行針對性排程。

*預設值：`false`*

### `allow_personal_agenda`

**個人議程**

學習者是否可將個人活動新增至議程？

*預設值：`true`*

### `default_calendar_view`

**預設行事曆顯示模式**

將此項設為 dayGridMonth、basicWeek、agendaWeek 或 agendaDay，以變更行事曆的預設檢視。

*預設值：`month`*

### `fullcalendar_settings`

**行事曆自訂**

議程的額外設定，讓您可設定我們所使用的特定行事曆函式庫。

### `personal_agenda_show_all_session_events`

**在個人議程中顯示所有議程活動**

不隱藏已過期工作階段的活動。

*預設值：`false`*

### `personal_calendar_show_sessions_occupation`

**在個人議程中顯示工作階段佔用情形**

啟用後，工作階段時程與佔用情形會顯示於使用者的個人行事曆中。

*預設值：`false`*