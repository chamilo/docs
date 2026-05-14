# 公告設定

課程 **Announcements** 工具的行為 — 公告如何發送和排程。

在 **Administration > Configuration settings > Announcements** 下存取這些設定。此類別包含 **9 個設定**，以下列出平台設定預設值 (`SettingsCurrentFixtures.php`) 中的標題和註解。

> 程式碼中的變數名稱以等寬字體顯示。使用 API 進行腳本編寫，或在全域層級編輯 [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) 變更這些設定時，請使用它。

## 設定

### `allow_careers_in_global_announcements`

**將全域公告連結至職涯和升遷**

啟用時，全域公告可與職涯和升遷關聯，以進行針對性發佈。

*預設值：`false`*

### `allow_coach_to_edit_announcements`

**允許導師始終編輯公告**

允許導師在活躍或過去的課程中始終編輯公告。

*預設值：`false`*

### `allow_scheduled_announcements`

**在課程中啟用排程公告**

允許課程管理員設定將在特定日期或課程開始/結束前後若干天觸發的公告。啟用此功能需要設定 cron 任務。

*預設值：`false`*

### `announcements_hide_send_to_hrm_users`

**隱藏發送公告給 HRM 使用者的選項**

移除啟用發送公告給具 HRM 角色的使用者的核取方塊（仍需在公告工具中確認）。

*預設值：`true`*

### `course_announcement_scheduled_by_date`

**基於日期的公告**

允許教師設定將在特定日期發送的公告。這需要您在 `cron/course_announcement.php` 上設定至少每日執行一次的 cron 任務。

*預設值：`false`*

### `disable_announcement_attachment`

**停用公告附件**

雖然本版本中的附件處理優雅且不會在磁碟上重複，但若要避免過度使用，您可能希望完全停用附件。

*預設值：`false`*

### `disable_delete_all_announcements`

**停用刪除所有公告按鈕**

選擇「是」以移除刪除所有公告的按鈕，因為教師可能會誤用。

*預設值：`false`*

### `hide_announcement_sent_to_users_info`

**在公告中隱藏「發送給」資訊**

選擇「是」以避免顯示公告發送給誰。

*預設值：`false`*

### `hide_send_to_hrm_users`

**隱藏發送公告副本給 HRM 的選項**

在公告表單中，通常會出現一個選項允許教師將公告副本發送給使用者的 HRM。設定為「是」以移除該選項（且*不*發送副本）。