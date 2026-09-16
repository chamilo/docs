# 議程設定

**議程**工具（日曆 / 事件）的預設值和行為。

在 **管理 > 設定 > 議程** 下存取這些設定。此類別包含 **11 個設定**，以下列出平台設定預設資料 (`SettingsCurrentFixtures.php`) 中提供的標題和註解。

> 程式碼中的變數名稱以等寬字體顯示。透過 API 撰寫腳本或需要透過編輯 [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) 在全域層級變更這些設定時，請使用它。

## 設定

### `agenda_colors`

**議程顏色**

為每種類型的事件設定 HTML 程式碼顏色，以變更顯示事件時的顏色。

### `agenda_legend`

**議程顏色圖例**

新增一段簡短文字作為圖例，描述用於事件的顏色。

### `agenda_on_hover_info`

**議程懸停資訊**

自訂游標懸停時的議程顯示。顯示議程註解和/或描述。

### `agenda_reminders_sender_id`

**正式發送議程提醒的使用者 ID**

設定議程提醒電子郵件顯示的發送者使用者。

*預設值：`0`*

### `allow_agenda_edit_for_hrm`

**允許 HRM 角色編輯或刪除議程事件**

這賦予 HRM 更多權限，允許他們在課程工作階段中編輯/刪除議程事件。

*預設值：`false`*

### `allow_careers_in_global_agenda`

**將全域日曆事件連結至職涯和升遷**

啟用時，全域日曆事件可與職涯和升遷關聯，允許針對性排程。

*預設值：`false`*

### `allow_personal_agenda`

**個人議程**

學習者是否可新增個人事件至議程？

*預設值：`true`*

### `default_calendar_view`

**預設日曆顯示模式**

設定為 dayGridMonth、basicWeek、agendaWeek 或 agendaDay，以變更日曆的預設檢視。

*預設值：`month`*

### `fullcalendar_settings`

**日曆自訂**

議程的額外設定，允許您設定我們使用的特定日曆程式庫。

### `personal_agenda_show_all_session_events`

**在個人議程中顯示所有議程事件**

不隱藏過期工作階段的事件。

*預設值：`false`*

### `personal_calendar_show_sessions_occupation`

**在個人議程中顯示工作階段佔用**

啟用時，使用者個人日曆中會顯示工作階段排程和佔用。

*預設值：`false`*