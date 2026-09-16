# 公告設定

課程 **公告** 工具的行為——公告如何發送與排程。

可於 **管理 > 組態設定 > 公告** 存取這些設定。此類別包含 **10 項設定**，以下列出平台設定 fixtures（`SettingsCurrentFixtures.php`）中隨附的標題與說明。

> 程式碼中的變數名稱以等寬字體顯示。透過 API 撰寫指令碼，或需以編輯 [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) 的方式在全域層級變更這些設定時，請使用該名稱。

## 設定

### `allow_careers_in_global_announcements`

**將全域公告與職涯及晉升連結**

啟用後，全域公告可與職涯及晉升關聯，以便進行目標式發送。

*預設值：`false`*

### `allow_coach_to_edit_announcements`

**允許導師一律編輯公告**

允許導師一律編輯進行中或已結束時段內的公告。

*預設值：`false`*

### `allow_scheduled_announcements`

**在時段中啟用排程公告**

允許時段管理員設定將於特定日期觸發，或於時段開始／結束前後若干天觸發的公告。啟用此功能需要您設定 cron 工作。

*預設值：`false`*

### `announcements_hide_send_to_hrm_users`

**隱藏將公告發送給人資使用者的選項**

移除用以啟用將公告發送給具人資角色使用者的核取方塊（仍須在公告工具中確認）。

*預設值：`true`*

### `course_announcement_scheduled_by_date`

**依日期發送的公告**

允許教師設定將於特定日期發送的公告。這需要您設定 cron 工作，對 cron/course_announcement.php 至少每日執行一次。

*預設值：`false`*

### `disable_announcement_attachment`

**停用公告附件**

儘管此版本中附件的處理方式相當完善且不會在磁碟上重複倍增，若您想避免過度使用，仍可能希望完全停用附件。

*預設值：`false`*

### `disable_delete_all_announcements`

**停用刪除全部公告的按鈕**

選取「是」以移除刪除全部公告的按鈕，因為教師可能會誤用此功能。

*預設值：`false`*

### `hide_announcement_sent_to_users_info`

**在公告中隱藏「已發送給」**

選取「是」以避免顯示公告已發送給哪些人。

*預設值：`false`*

### `hide_global_announcements_when_not_connected` **v3**

**對匿名使用者隱藏全域公告**

對匿名使用者隱藏平台公告，僅向已驗證使用者顯示。

*預設值：`false`*

### `hide_send_to_hrm_users`

**隱藏將公告副本發送給 HRM 的選項**

在公告表單中，通常會出現一個選項，允許教師將公告副本發送給使用者的 HRM。將此項設為「是」以移除該選項（並且*不*發送副本）。